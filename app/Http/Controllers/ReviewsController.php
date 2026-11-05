<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use App\Models\socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\RateLimiter;

class ReviewsController extends Controller
{
    /**
     * Maximum total reviews allowed across the entire site per day to prevent storage exhaustion.
     */
    private const MAX_DAILY_GLOBAL_REVIEWS = 30;

    /**
     * Maximum reviews allowed per IP address within 24 hours.
     */
    private const MAX_DAILY_IP_REVIEWS = 2;

    /**
     * Minimum time (in seconds) a human needs to fill out the form.
     */
    private const MIN_SUBMISSION_SECONDS = 3;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviews = reviews::latest()->get();
        $socialmedia = socialmedia::latest()->first();
        return view('interface.contact', compact('reviews', 'socialmedia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Honeypot Check: Bot otomatis mengisi field tersembunyi ini.
        // Tolak langsung tanpa menyentuh atau menyimpan ke database.
        if ($request->filled('website_url')) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->with('error', 'Permintaan tidak dapat diproses karena terdeteksi aktivitas otomatis.');
        }

        // 2. Time-trap Check: Manusia membutuhkan minimal 3 detik untuk mengisi form.
        $formToken = $request->input('_form_rendered_at');
        if (empty($formToken)) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->withInput()
                ->with('error', 'Sesi formulir tidak valid. Silakan muat ulang halaman dan coba kembali.');
        }

        try {
            $renderedAt = (int) Crypt::decryptString($formToken);
        } catch (\Throwable $e) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->withInput()
                ->with('error', 'Token keamanan formulir telah kedaluwarsa. Silakan coba kembali.');
        }

        $elapsedSeconds = time() - $renderedAt;
        if ($elapsedSeconds < self::MIN_SUBMISSION_SECONDS || $elapsedSeconds > 7200) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->withInput()
                ->with('error', 'Pengiriman terlalu cepat atau sesi formulir telah berakhir. Mohon isi ulasan secara wajar.');
        }

        // 3. Per-IP Rate Limiting (Maksimal 2 ulasan per 24 jam + jeda antar kiriman)
        $ip = $request->ip() ?? 'unknown';
        $ipRateKey = 'review-submit-ip:' . $ip;
        $sessionSubmittedKey = 'review_last_submitted_at';

        if (RateLimiter::tooManyAttempts($ipRateKey, self::MAX_DAILY_IP_REVIEWS)) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->with('error', 'Anda telah mencapai batas pengiriman ulasan hari ini (maksimal ' . self::MAX_DAILY_IP_REVIEWS . ' ulasan per hari). Terima kasih atas partisipasi Anda.');
        }

        $lastSessionSubmit = (int) $request->session()->get($sessionSubmittedKey, 0);
        if ($lastSessionSubmit > 0 && (time() - $lastSessionSubmit) < 300) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->with('error', 'Anda baru saja mengirim ulasan. Mohon tunggu beberapa saat sebelum mengirim ulasan lainnya.');
        }

        // 4. Kuota Harian Global: Mencegah database penuh apabila diserang botnet (ribuan IP berbeda)
        $todayCount = reviews::whereDate('created_at', now()->toDateString())->count();
        if ($todayCount >= self::MAX_DAILY_GLOBAL_REVIEWS) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->with('error', 'Kuota penerimaan ulasan harian untuk hari ini telah penuh. Silakan kirimkan ulasan Anda kembali besok.');
        }

        // 5. Validasi Input Ketat & Anti-Link Spam
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:60', 'not_regex:/(https?:\/\/|www\.)/i'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'message' => ['required', 'string', 'min:10', 'max:200', 'not_regex:/(https?:\/\/|www\.|\.[a-z]{2,4}\/)/i'],
        ], [
            'name.required' => 'Nama lengkap atau inisial wajib diisi.',
            'name.min' => 'Nama minimal terdiri dari 2 karakter.',
            'name.max' => 'Nama maksimal 60 karakter.',
            'name.not_regex' => 'Nama tidak boleh mengandung tautan/link.',
            'rating.required' => 'Silakan pilih penilaian bintang (1 hingga 5).',
            'rating.integer' => 'Penilaian bintang harus berupa angka yang valid.',
            'rating.between' => 'Penilaian bintang harus berada di antara 1 sampai 5.',
            'message.required' => 'Pesan ulasan wajib diisi.',
            'message.min' => 'Ulasan minimal terdiri dari 10 karakter agar informatif.',
            'message.max' => 'Ulasan maksimal 200 karakter.',
            'message.not_regex' => 'Ulasan tidak diperkenankan mengandung tautan/link eksternal.',
        ]);

        // 6. Cegah Duplikasi Pesan Identik Hari Ini (Tanpa menambah beban kolom di database)
        $cleanName = strip_tags(trim($validated['name']));
        $cleanMessage = strip_tags(trim($validated['message']));
        $contentHashKey = 'review-hash:' . md5(strtolower($cleanName . '|' . $cleanMessage));

        if (Cache::has($contentHashKey)) {
            return redirect()
                ->to(route('contact') . '#review-form')
                ->with('error', 'Ulasan yang sama persis baru saja dikirimkan.');
        }

        reviews::create([
            'name' => $cleanName,
            'rating' => (int) $validated['rating'],
            'message' => $cleanMessage,
            'submitted_at' => now(),
        ]);

        // Catat kuota IP (berlaku 24 jam = 86400 detik), sesi, dan hash pesan (berlaku 24 jam)
        RateLimiter::hit($ipRateKey, 86400);
        $request->session()->put($sessionSubmittedKey, time());
        Cache::put($contentHashKey, true, now()->addHours(24));

        return redirect()
            ->to(route('contact') . '#review-form')
            ->with('success', 'Ulasan Anda telah berhasil disimpan dan dipublikasikan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reviews $review)
    {
        $review->delete();
        return redirect()->route('home')->with('success', 'Ulasan berhasil dihapus.');
    }
}
