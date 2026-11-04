<?php

namespace App\Http\Controllers;

use App\Http\Requests\legal_opiniCreateRequest;
use App\Http\Requests\legal_opiniUpdateRequest;
use App\Models\legal_opini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LegalOpiniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = legal_opini::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('text', 'like', "%{$search}%");
            });
        }

        $legal_opinis = $query->latest()->paginate(10)->withQueryString();

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('admin.legal-opini-list-partial', compact('legal_opinis', 'search'));
        }

        return view('admin.legal-opini', compact('legal_opinis', 'search'));
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
    public function store(legal_opiniCreateRequest $request)
{
    try {
        $data = $request->validated();

        // Upload file jika ada
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('legal_opini', 'public');
        }

        legal_opini::create($data);

        return redirect()->route('legal_opini.index')->with('success', 'Artikel Hukum berhasil ditambahkan.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Artikel Hukum: ' . $e->getMessage());
    }
}



    /**
     * Display the specified resource.
     */
    public function show(legal_opini $legal_opini)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(legal_opini $legal_opini)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(legal_opiniUpdateRequest $request, legal_opini $legal_opini)
    {
        try {
            $data = $request->validated();

            // Upload file jika ada
            if ($request->hasFile('picture')) {
                // Hapus file lama jika ada
                if ($legal_opini->picture) {
                    Storage::disk('public')->delete($legal_opini->picture);
                }
                $data['picture'] = $request->file('picture')->store('legal_opini', 'public');
            }

            $legal_opini->update($data);

            return redirect()->route('legal_opini.index')->with('success', 'Artikel Hukum berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui Artikel Hukum: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(legal_opini $legal_opini)
    {
        try {
            // Hapus file jika ada
            if ($legal_opini->picture) {
                Storage::disk('public')->delete($legal_opini->picture);
            }

            $legal_opini->delete();

            return redirect()->route('legal_opini.index')->with('success', 'Artikel Hukum berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Artikel Hukum: ' . $e->getMessage());
        }
    }
}
