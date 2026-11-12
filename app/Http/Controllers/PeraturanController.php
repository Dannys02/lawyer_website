<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeraturanCreateRequest;
use App\Http\Requests\PeraturanUpdateRequest;
use App\Models\Peraturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeraturanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = Peraturan::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('tentang', 'like', "%{$search}%")
                  ->orWhere('nomor', 'like', "%{$search}%")
                  ->orWhere('jenis_peraturan', 'like', "%{$search}%")
                  ->orWhere('tahun', 'like', "%{$search}%")
                  ->orWhere('materi_pokok', 'like', "%{$search}%")
                  ->orWhere('latar_belakang', 'like', "%{$search}%");
            });
        }

        $peraturans = $query->latest('tahun')->latest('nomor')->paginate(10)->withQueryString();

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('admin.peraturan-list-partial', compact('peraturans', 'search'));
        }

        return view('admin.peraturan', compact('peraturans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.peraturan-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeraturanCreateRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('file_path')) {
                $data['file_path'] = $request->file('file_path')->store('peraturan', 'public');
            }

            Peraturan::create($data);
            return redirect()->route('peraturan.index')->with('success', 'Data peraturan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peraturan $peraturan)
    {
        return view('admin.peraturan-edit', compact('peraturan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peraturan $peraturan)
    {
        return view('admin.peraturan-edit', compact('peraturan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeraturanUpdateRequest $request, Peraturan $peraturan)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('file_path')) {
                // Hapus file lama jika ada
                if ($peraturan->file_path && Storage::disk('public')->exists($peraturan->file_path)) {
                    Storage::disk('public')->delete($peraturan->file_path);
                }
                $data['file_path'] = $request->file('file_path')->store('peraturan', 'public');
            }

            $peraturan->update($data);
            return redirect()->route('peraturan.index')->with('success', 'Data peraturan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peraturan $peraturan)
    {
        try {
            if ($peraturan->file_path && Storage::disk('public')->exists($peraturan->file_path)) {
                Storage::disk('public')->delete($peraturan->file_path);
            }

            $peraturan->delete();
            return redirect()->route('peraturan.index')->with('success', 'Data peraturan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
