<?php

namespace App\Http\Controllers;

use App\Http\Requests\newsCreateRequest;
use App\Http\Requests\newsUpdateRequest;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = news::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('publisher', 'like', "%{$search}%");
            });
        }

        $news = $query->latest('date_publish')->paginate(10)->withQueryString();

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('admin.news-list-partial', compact('news', 'search'));
        }

        return view('admin.news', compact('news', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(newsCreateRequest $request)
{
    try {
        $data = $request->validated();

        // Upload file jika ada
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('news', 'public');
        }

        news::create($data);

        return redirect()->route('news.index')->with('success', 'Artikel Hukum berhasil ditambahkan.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Artikel Hukum: ' . $e->getMessage());
    }
}



    /**
     * Display the specified resource.
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(news $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(newsUpdateRequest $request, news $news)
    {
        try {
            $data = $request->validated();

            // Upload file jika ada
            if ($request->hasFile('picture')) {
                // Hapus file lama jika ada
                if ($news->picture) {
                    Storage::disk('public')->delete($news->picture);
                }
                $data['picture'] = $request->file('picture')->store('news', 'public');
            }

            $news->update($data);

            return redirect()->route('news.index')->with('success', 'Artikel Hukum berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui Artikel Hukum: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(news $news)
    {
        try {
            // Hapus file jika ada
            if ($news->picture) {
                Storage::disk('public')->delete($news->picture);
            }

            $news->delete();

            return redirect()->route('news.index')->with('success', 'Artikel Hukum berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Artikel Hukum: ' . $e->getMessage());
        }
    }
}
