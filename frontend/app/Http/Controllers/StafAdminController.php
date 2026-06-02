<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class StafAdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/api/staf_admin/dashboard');

        $data = [];
        if ($response->successful() && $response->json('success')) {
            $data = $response->json('data');
        }

        return view('stafadmin.dashboard', compact('data'));
    }

    public function drafPengadaan(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/api/staf_admin/draf_pengadaan');

        $drafts = [];
        if ($response->successful() && $response->json('success')) {
            $drafts = $response->json('data');
        }

        $ruangan = \Illuminate\Support\Facades\DB::table('ruangan')->get();

        return view('stafadmin.draf_pengadaan', compact('drafts', 'ruangan'));
    }

    public function updateStatusPengadaan(Request $request, $id)
    {
        $token = $request->session()->get('jwt_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->put('http://localhost:3000/api/staf_admin/draf_pengadaan/' . $id . '/status', [
            'status_pengadaan' => $request->status_pengadaan
        ]);

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Gagal update status']);
    }

    public function cekLabel(Request $request)
    {
        $token = $request->session()->get('jwt_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://localhost:3000/api/staf_admin/draf_pengadaan/cek-label', [
            'labels' => $request->labels
        ]);
        
        return $response->json();
    }

    public function prosesTerima(Request $request)
    {
        $token = $request->session()->get('jwt_token');
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://localhost:3000/api/staf_admin/draf_pengadaan/terima', $request->all());

        if ($response->successful() && $response->json('success')) {
            return redirect()->back()->with('success', 'Barang berhasil diterima!');
        }
        return redirect()->back()->with('error', 'Gagal memproses penerimaan barang.');
    }
}
