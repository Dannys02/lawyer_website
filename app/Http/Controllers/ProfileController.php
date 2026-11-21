<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'current_password' => ['required', 'current_password'],
        ], [
            'email.unique' => 'Email ini sudah digunakan akun lain.',
            'current_password.current_password' => 'Password saat ini salah.',
            'password.min' => 'Password baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ], [
            'current_password' => 'password saat ini',
            'password' => 'password baru',
        ]);

        $emailChanged = $validated['email'] !== $user->email;
        $passwordChanged = filled($validated['password'] ?? null);

        if (! $emailChanged && ! $passwordChanged) {
            return back()->with('info', 'Tidak ada perubahan yang disimpan.');
        }

        if ($emailChanged) {
            $user->email = $validated['email'];
            $user->email_verified_at = null;
        }

        if ($passwordChanged) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        if ($passwordChanged) {
            // Keluarkan sesi login di perangkat lain, pertahankan sesi saat ini.
            Auth::logoutOtherDevices($validated['password']);
            $request->session()->regenerate();
        }

        $message = match (true) {
            $emailChanged && $passwordChanged => 'Email dan password berhasil diperbarui.',
            $emailChanged => 'Email berhasil diperbarui.',
            default => 'Password berhasil diperbarui.',
        };

        return redirect()->route('profile.edit')->with('success', $message);
    }
}
