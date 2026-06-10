<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KalabController extends Controller
{
    public function drafPengadaan(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/api/kalab/draf_pengadaan');

        $drafts = [];
        if ($response->successful() && $response->json('success')) {
            $drafts = $response->json('data');
        }

        return view('kalab.draf_pengadaan', compact('drafts'));
    }

    public function tambahDraf(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        // Ambil data inventaris rusak
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/api/kalab/inventaris/rusak');

        $inventaris_rusak = [];
        if ($response->successful() && $response->json('success')) {
            $inventaris_rusak = $response->json('data');
        }

        return view('kalab.tambah_draf', compact('inventaris_rusak'));
    }

    public function simpanDraf(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $payload = [
            'tahun_pengadaan' => $request->tahun_pengadaan,
            'action' => $request->action, // 'simpan_draft' atau 'ajukan'
            'items' => $request->items, // array of items dari frontend
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://localhost:3000/api/kalab/draf_pengadaan', $payload);

        if ($response->successful() && $response->json('success')) {
            return redirect('/kalab/draf-pengadaan')->with('success', 'Draf pengadaan berhasil disimpan!');
        }

        return redirect()->back()->with('error', 'Gagal menyimpan draf pengadaan: ' . $response->json('message'));
    }

    public function ajukanDraf(Request $request, $id)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://localhost:3000/api/kalab/draf_pengadaan/' . $id . '/ajukan');

        if ($response->successful() && $response->json('success')) {
            return redirect('/kalab/draf-pengadaan')->with('success', 'Draf berhasil diajukan ke Kaprodi!');
        }

        return redirect()->back()->with('error', 'Gagal mengajukan draf: ' . $response->json('message'));
    }
}
