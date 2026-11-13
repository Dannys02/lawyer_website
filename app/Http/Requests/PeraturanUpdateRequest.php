<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeraturanUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis_peraturan' => 'required|string|max:255',
            'nomor' => 'required|string|max:100',
            'tahun' => 'required|digits:4|integer|min:1945|max:2100',
            'tentang' => 'required|string|max:1000',
            'tanggal_pengundangan' => 'nullable|date',
            'status' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'file_path' => 'nullable|file|mimes:pdf|max:10240',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'jenis_peraturan.required' => 'Jenis peraturan wajib diisi.',
            'nomor.required' => 'Nomor peraturan wajib diisi.',
            'tahun.required' => 'Tahun peraturan wajib diisi.',
            'tahun.digits' => 'Tahun harus berupa 4 digit angka.',
            'tentang.required' => 'Judul/Tentang peraturan wajib diisi.',
            'status.required' => 'Status peraturan wajib diisi.',
            'tanggal_pengundangan.date' => 'Format tanggal pengundangan tidak valid.',
            'file_path.mimes' => 'File peraturan harus berformat PDF.',
            'file_path.max' => 'Ukuran berkas PDF tidak boleh lebih dari 10MB.',
        ];
    }
}
