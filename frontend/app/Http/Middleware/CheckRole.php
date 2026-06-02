<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->session()->get('user');
        $token = $request->session()->get('jwt_token');

        if (!$user || !$token) {
            return redirect('/login')->withErrors(['username' => 'Silakan login terlebih dahulu.']);
        }

        if (isset($user['role']) && $user['role'] !== $role) {
            // Jika role tidak sesuai, arahkan kembali ke dashboard default mereka
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
