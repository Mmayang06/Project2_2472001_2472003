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
                $token = $response->json('token');
                
                $request->session()->put('user', $userData);
                $request->session()->put('jwt_token', $token);
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
        $user = $request->session()->get('user');
        if ($user && isset($user['id'])) {
            try {
                \Illuminate\Support\Facades\Http::post('http://localhost:3000/api/logout', [
                    'id_user' => $user['id']
                ]);
            } catch (\Exception $e) {
                // Ignore API error to ensure user can still log out
            }
        }

        $request->session()->forget('user');
        $request->session()->forget('jwt_token');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }

    public function dashboard(Request $request)
    {
        $user = $request->session()->get('user');
        
        if ($user && isset($user['role'])) {
            if ($user['role'] === 'administrator' || $user['role'] === 'admin') {
                return redirect('/administrator/home');
            } else if ($user['role'] === 'stafadmin' || $user['role'] === 'staf_admin') {
                return redirect('/stafadmin/dashboard');
            } else if ($user['role'] === 'staflab' || $user['role'] === 'staf_lab') {
                return redirect('/staf-lab/home');
            } else if ($user['role'] === 'kaprodi') {
                return redirect('/kaprodi/dashboard');
            }
        }
        
        return redirect('/login');
    }
}
