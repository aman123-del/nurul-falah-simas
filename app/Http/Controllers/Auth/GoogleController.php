<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            // Menggunakan stateless untuk menghindari masalah session mismatch di beberapa environment
            $googleUser = Socialite::driver('google')->stateless()->user();
            
            $existingUser = User::where('email', $googleUser->email)->first();

            // Jika user sudah ada dan dia adalah santri, kita blokir (sesuai kebijakan awal)
            if ($existingUser && $existingUser->role === 'santri') {
                return redirect(route('login'))->withErrors([
                    'email' => 'Platform ini tidak mengizinkan login untuk akun Santri melalui Google.'
                ]);
            }

            // Cari berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // Update data jika user ditemukan
                $user->update([
                    'google_id' => $googleUser->id,
                    'google_token' => $googleUser->token,
                    'name' => $googleUser->name,
                ]);
            } else {
                // Buat user baru jika belum ada
                // Catatan: Role default di database adalah 'santri'. 
                // Jika ingin Google login otomatis jadi admin/petugas, ganti role di sini.
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'google_token' => $googleUser->token,
                    'password' => bcrypt(str()->random(16)),
                    'role' => 'admin', // Kita asumsikan pendaftar via Google adalah admin/petugas
                ]);
            }
            
            Auth::login($user);
            
            return redirect()->intended(route('dashboard'));
            
        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            
            return redirect(route('login'))->with('status', 'Gagal masuk menggunakan Google: ' . $e->getMessage());
        }
    }
}
