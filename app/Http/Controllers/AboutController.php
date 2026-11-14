<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = about::latest()->paginate(10);
        return view('admin.about', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text_about' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'hero_tagline' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_slogan' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'visi_title' => 'nullable|string|max:255',
            'visi_text' => 'nullable|string',
            'misi_text' => 'nullable|string',
            'values_title' => 'nullable|array',
            'values_desc' => 'nullable|array',
            'reasons_title' => 'nullable|array',
            'reasons_desc' => 'nullable|array',
            'segmentations' => 'nullable|array',
        ]);

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('About', 'public');
            }

            // Pack structured arrays to JSON
            $validated['values_json'] = $this->packTitleDescArray($request->input('values_title', []), $request->input('values_desc', []));
            $validated['reasons_json'] = $this->packTitleDescArray($request->input('reasons_title', []), $request->input('reasons_desc', []));
            $validated['segmentations_json'] = $this->packStringArray($request->input('segmentations', []));

            about::create($validated);
            Cache::forget('chatbot:public-context');

            return redirect()->route('abouts.index')->with('success', 'Data Tentang Kami berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(about $about)
    {
        return view('admin.about-edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, about $about)
    {
        $validated = $request->validate([
            'text_about' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'hero_tagline' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_slogan' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'visi_title' => 'nullable|string|max:255',
            'visi_text' => 'nullable|string',
            'misi_text' => 'nullable|string',
            'values_title' => 'nullable|array',
            'values_desc' => 'nullable|array',
            'reasons_title' => 'nullable|array',
            'reasons_desc' => 'nullable|array',
            'segmentations' => 'nullable|array',
        ]);

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('About', 'public');

                if ($about->image && $validated['image'] !== $about->image) {
                    Storage::disk('public')->delete($about->image);
                }
            } else {
                unset($validated['image']);
            }

            // Pack structured arrays to JSON
            $validated['values_json'] = $this->packTitleDescArray($request->input('values_title', []), $request->input('values_desc', []));
            $validated['reasons_json'] = $this->packTitleDescArray($request->input('reasons_title', []), $request->input('reasons_desc', []));
            $validated['segmentations_json'] = $this->packStringArray($request->input('segmentations', []));

            $about->update($validated);
            Cache::forget('chatbot:public-context');

            return redirect()->route('abouts.index')->with('success', 'Data Tentang Kami berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(about $about)
    {
        try {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }

            $about->delete();
            Cache::forget('chatbot:public-context');

            return redirect()->route('abouts.index')->with('success', 'Data Tentang Kami berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    private function packTitleDescArray(array $titles, array $descs): ?string
    {
        $items = [];
        foreach ($titles as $idx => $title) {
            $t = trim($title ?? '');
            $d = trim($descs[$idx] ?? '');
            if ($t !== '' || $d !== '') {
                $items[] = [
                    'title' => $t,
                    'desc' => $d,
                ];
            }
        }
        return !empty($items) ? json_encode($items, JSON_UNESCAPED_UNICODE) : null;
    }

    private function packStringArray(array $values): ?string
    {
        $cleaned = [];
        foreach ($values as $val) {
            $v = trim($val ?? '');
            if ($v !== '') {
                $cleaned[] = $v;
            }
        }
        return !empty($cleaned) ? json_encode($cleaned, JSON_UNESCAPED_UNICODE) : null;
    }
}
