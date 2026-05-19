<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        try {
            $response = \Illuminate\Support\Facades\Http::post('http://localhost:3000/api/login', [
                'username' => $request->username,
                'password' => $request->password,
            ]);

            if ($response->successful() && $response->json('success')) {
                $userData = $response->json('user');
                
                $request->session()->put('user', $userData);
                $request->session()->regenerate();
                
                return redirect()->intended('/dashboard');
            }
        } catch (\Exception $e) {
            return back()->withErrors([
                'username' => 'Gagal terhubung ke backend server.',
            ])->onlyInput('username');
        }

        return back()->withErrors([
            'username' => 'Kombinasi username dan password salah atau tidak ditemukan.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    public function dashboard(Request $request)
    {
        $user = $request->session()->get('user');
        
        if ($user && isset($user['role'])) {
            return "halo, " . $user['role'];
        } else if ($user) {
            return "halo, user tanpa role";
        }
        
        return redirect('/login');
    }
}
