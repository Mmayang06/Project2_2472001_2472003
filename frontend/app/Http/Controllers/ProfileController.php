<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect('/login')->withErrors(['username' => 'Silakan login terlebih dahulu.']);
        }

        // Ambil data profile terbaru dari backend
        try {
            $response = Http::get('http://localhost:3000/api/profile/' . $user['id']);
            if ($response->successful() && $response->json('success')) {
                $profileData = $response->json('data');
            } else {
                $profileData = $user; // Fallback jika gagal ambil terbaru
            }
        } catch (\Exception $e) {
            $profileData = $user;
        }

        return view('profile', ['user' => $profileData]);
    }

    public function update(Request $request)
    {
        $user = $request->session()->get('user');
        
        if (!$user) {
            return redirect('/login')->withErrors(['username' => 'Silakan login terlebih dahulu.']);
        }

        $request->validate([
            'nama' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'min:6', 'confirmed'],
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 6 karakter.'
        ]);

        $payload = [
            'nama' => $request->nama,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $payload['password'] = $request->password;
        }
        
        if ($request->filled('tahun_jabatan')) {
            $payload['tahun_jabatan'] = $request->tahun_jabatan;
        }

        try {
            $response = Http::put('http://localhost:3000/api/profile/' . $user['id'], $payload);

            if ($response->successful() && $response->json('success')) {
                // Update session
                $user['username'] = $request->nama; // Asumsi nama adalah username
                $request->session()->put('user', $user);
                
                return back()->with('success', 'Profil berhasil diperbarui!');
            } else {
                return back()->withErrors([
                    'profile' => $response->json('message') ?? 'Gagal memperbarui profil.',
                ]);
            }
        } catch (\Exception $e) {
            return back()->withErrors([
                'profile' => 'Gagal terhubung ke backend server.',
            ]);
        }
    }
}
