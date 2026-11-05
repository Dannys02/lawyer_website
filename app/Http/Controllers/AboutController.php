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
        ]);

        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('About', 'public');
            }

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
}
