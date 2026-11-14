<?php

namespace App\Http\Controllers;

use App\Http\Requests\galeryCreateRequest;
use App\Http\Requests\galeryUpdateRequest;
use App\Models\galery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeries = galery::latest()->paginate(10);
        return view('admin.galery', compact('galeries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galery-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(galeryCreateRequest $request)
    {
        try {
            $data = $request->validated();

            // Upload file jika ada
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('galery', 'public');
            }

            galery::create($data);
            return redirect()->route('galery.index')->with('success', 'Galery created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(galery $galery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(galery $galery)
    {
        return view('admin.galery-edit', compact('galery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(galeryUpdateRequest $request, galery $galery)
    {
        try {
            $data = $request->validated();

            // Upload file jika ada
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('galery', 'public');
            }

            // hapus file lama
            if ($galery->image && isset($data['image']) && $data['image'] !== $galery->image) {
                Storage::disk('public')->delete($galery->image);
            }

            $galery->update($data);
            return redirect()->route('galery.index')->with('success', 'Galery updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(galery $galery)
    {
        try {
            // Hapus file jika ada
            if ($galery->image) {
                Storage::disk('public')->delete($galery->image);
            }

            $galery->delete();
            return redirect()->route('galery.index')->with('success', 'Galery deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
