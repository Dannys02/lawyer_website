<?php

namespace App\Http\Controllers;

use App\Http\Requests\jurnalCreateRequest;
use App\Http\Requests\jurnalUpdateRequest;
use App\Models\jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnals = jurnal::all();
        return view('admin.jurnal', compact('jurnals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurnal-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(jurnalCreateRequest $request)
    {
        try {
            $data = $request->validated();

            // Upload file jika ada
            if ($request->hasFile('pdf_file')) {
                $data['pdf_file'] = $request->file('pdf_file')->store('jurnal', 'public');
            }
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('jurnal/thumbnails', 'public');
            }

            jurnal::create($data);
            return redirect()->route('jurnal.index')->with('success', 'Jurnal created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jurnal $jurnal)
    {
        return view('admin.jurnal-edit', compact('jurnal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(jurnalUpdateRequest $request, jurnal $jurnal)
    {
        try {
            $data = $request->validated();

            // Upload file jika ada
            if ($request->hasFile('pdf_file')) {
                $data['pdf_file'] = $request->file('pdf_file')->store('jurnal', 'public');
            }
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('jurnal/thumbnails', 'public');
            }
            // Hapus file lama jika ada
            if ($jurnal->pdf_file && isset($data['pdf_file'])) {
                Storage::disk('public')->delete($jurnal->pdf_file);
            }
            if ($jurnal->thumbnail && isset($data['thumbnail'])) {
                Storage::disk('public')->delete($jurnal->thumbnail);
            }

            $jurnal->update($data);
            return redirect()->route('jurnal.index')->with('success', 'Jurnal updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jurnal $jurnal)
    {
        try {
            // Hapus file jika ada
            if ($jurnal->pdf_file) {
                Storage::disk('public')->delete($jurnal->pdf_file);
            }
            if ($jurnal->thumbnail) {
                Storage::disk('public')->delete($jurnal->thumbnail);
            }

            $jurnal->delete();
            return redirect()->route('jurnal.index')->with('success', 'Jurnal deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
