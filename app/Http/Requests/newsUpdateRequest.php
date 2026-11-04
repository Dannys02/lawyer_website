<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newsUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'date_publish' => 'required|date',
            'url' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul harus diisi.',
            'publisher.required' => 'Nama penerbit harus diisi.',
            'date_publish.required' => 'Tanggal terbit harus diisi.',
            'url.required' => 'URL berita harus diisi.',
            'picture.image' => 'File yang diunggah harus berupa gambar.',
            'picture.mimes' => 'Gambar harus dalam format jpeg, png, jpg, gif, svg, atau webp.',
            'picture.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];
    }
}
