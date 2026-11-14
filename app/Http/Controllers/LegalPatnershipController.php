<?php

namespace App\Http\Controllers;

use App\Http\Requests\legal_patnershipCreateRequest;
use App\Http\Requests\legal_patnershipUpdateRequest;
use App\Models\legal_patnership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegalPatnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = legal_patnership::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $legal_patnerships = $query->latest()->paginate(10)->withQueryString();

        if ($request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return view('admin.legal-patnership-list-partial', compact('legal_patnerships', 'search'));
        }

        return view('admin.legal-patnership', compact('legal_patnerships', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.legal-patnership-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(legal_patnershipCreateRequest $request)
    {
        try {
            $data = $request->validated();

        // Upload file jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('legal_patnership', 'public');
        }

            legal_patnership::create($data);
            return redirect()->route('legal_patnership.index')->with('success', 'Legal Patnership created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage())->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(legal_patnership $legal_patnership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(legal_patnership $legal_patnership)
    {
        return view('admin.legal-patnership-edit', compact('legal_patnership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(legal_patnershipUpdateRequest $request, legal_patnership $legal_patnership)
    {
        try {
            $data = $request->validated();

            // Upload file jika ada
            if ($request->hasFile('photo')) {
                // Hapus file lama jika ada
                if ($legal_patnership->photo && Storage::disk('public')->exists($legal_patnership->photo)) {
                    Storage::disk('public')->delete($legal_patnership->photo);
                }
                $data['photo'] = $request->file('photo')->store('legal_patnership', 'public');
            }

            $legal_patnership->update($data);
            return redirect()->route('legal_patnership.index')->with('success', 'Legal Patnership updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(legal_patnership $legal_patnership)
    {
        try {
            // Hapus file jika ada
            if ($legal_patnership->photo && Storage::disk('public')->exists($legal_patnership->photo)) {
                Storage::disk('public')->delete($legal_patnership->photo);
            }

            $legal_patnership->delete();
            return redirect()->route('legal_patnership.index')->with('success', 'Legal Patnership deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
