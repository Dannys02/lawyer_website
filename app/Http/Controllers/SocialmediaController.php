<?php

namespace App\Http\Controllers;

use App\Models\socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SocialmediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialmedia = socialmedia::latest()->paginate(10);
        return view('admin.socialmedia', compact('socialmedia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.socialmedia-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'wa' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tiktok' => 'required|string|max:255',
            'maps' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        try {
            socialmedia::create($validated);
            Cache::forget('chatbot:public-context');

            return redirect()->route('socialmedia.index')->with('success', 'Data Media Sosial berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(socialmedia $socialmedia)
    {
        return view('admin.socialmedia-edit', compact('socialmedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, socialmedia $socialmedia)
    {
        $validated = $request->validate([
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'wa' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tiktok' => 'required|string|max:255',
            'maps' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        try {
            $socialmedia->update($validated);
            Cache::forget('chatbot:public-context');

            return redirect()->route('socialmedia.index')->with('success', 'Data Media Sosial berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(socialmedia $socialmedia)
    {
        try {
            $socialmedia->delete();
            Cache::forget('chatbot:public-context');

            return redirect()->route('socialmedia.index')->with('success', 'Data Media Sosial berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
