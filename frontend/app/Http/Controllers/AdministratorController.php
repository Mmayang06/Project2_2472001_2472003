<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdministratorController extends Controller
{
    private $apiUrl = 'http://localhost:3000/api';

    // Dashboard utama admin
    public function home()
    {
        $usersResponse = Http::get("{$this->apiUrl}/administrator/users");
        $roomsResponse = Http::get("{$this->apiUrl}/administrator/rooms");

        $totalUsers = 0;
        $totalRooms = 0;
        $onlineUsers = [];
        $resetCount = 0;
        $pendingResets = [];

        if ($usersResponse->successful() && $usersResponse->json('success')) {
            $users = $usersResponse->json('data');
            $totalUsers = count($users);
            $onlineUsers = array_filter($users, function($u) {
                return isset($u['is_online']) && ($u['is_online'] == 1 || $u['is_online'] === true);
            });
            $pendingResets = array_filter($users, function($u) {
                return isset($u['reset_requested']) && $u['reset_requested'] == 1;
            });
            $resetCount = count($pendingResets);
        }

        if ($roomsResponse->successful() && $roomsResponse->json('success')) {
            $totalRooms = count($roomsResponse->json('data'));
        }

        return view('administrator.home', compact('totalUsers', 'totalRooms', 'onlineUsers', 'resetCount', 'pendingResets'));
    }

    // Tampilan daftar pengguna
    public function users()
    {
        $response = Http::get("{$this->apiUrl}/administrator/users");
        $users = [];
        $resetCount = 0;

        if ($response->successful() && $response->json('success')) {
            $users = $response->json('data');
            $pendingResets = array_filter($users, function($u) {
                return isset($u['reset_requested']) && $u['reset_requested'] == 1;
            });
            $resetCount = count($pendingResets);
        }

        return view('administrator.users', compact('users', 'resetCount'));
    }

    // Tambah pengguna baru
    public function storeUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|string'
        ]);

        $response = Http::post("{$this->apiUrl}/administrator/users", $request->all());

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Gagal menambah user'], 400);
    }

    // Ubah data pengguna
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|string'
        ]);

        $response = Http::put("{$this->apiUrl}/administrator/users/{$id}", $request->all());

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Gagal mengubah user'], 400);
    }

    // Hapus pengguna
    public function deleteUser($id)
    {
        $response = Http::delete("{$this->apiUrl}/administrator/users/{$id}");

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Gagal menghapus user'], 400);
    }

    // Reset password dan kirim email
    public function resetPassword($id)
    {
        $response = Http::post("{$this->apiUrl}/administrator/users/{$id}/reset-password");

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => $response->json('message') ?? 'Gagal mereset password'], 400);
    }

    // Tampilan daftar ruangan
    public function rooms()
    {
        $response = Http::get("{$this->apiUrl}/administrator/rooms");
        $rooms = [];

        if ($response->successful() && $response->json('success')) {
            $rooms = $response->json('data');
        }

        return view('administrator.rooms', compact('rooms'));
    }

    // Tambah ruangan baru
    public function storeRoom(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|string',
            'lokasi' => 'required|string'
        ]);

        $response = Http::post("{$this->apiUrl}/administrator/rooms", $request->all());

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Gagal menambah ruangan'], 400);
    }

    // Ubah data ruangan
    public function updateRoom(Request $request, $id)
    {
        $request->validate([
            'nama_ruangan' => 'required|string',
            'lokasi' => 'required|string'
        ]);

        $response = Http::put("{$this->apiUrl}/administrator/rooms/{$id}", $request->all());

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Gagal mengubah ruangan'], 400);
    }

    // Hapus ruangan
    public function deleteRoom($id)
    {
        $response = Http::delete("{$this->apiUrl}/administrator/rooms/{$id}");

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Gagal menghapus ruangan'], 400);
    }
}
