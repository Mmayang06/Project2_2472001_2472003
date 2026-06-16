<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KalabController extends Controller
{
    public function dashboard(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/api/kalab/dashboard');

        $data = [];
        if ($response->successful() && $response->json('success')) {
            $data = $response->json('data');
        }

        return view('kalab.dashboard', compact('data'));
    }

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

        // Ambil data permintaan BHP dari staf lab
        $bhpResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/api/kalab/draf_pengadaan/permintaan_bhp');

        $permintaan_bhp = [];
        if ($bhpResponse->successful() && $bhpResponse->json('success')) {
            $permintaan_bhp = $bhpResponse->json('data');
        }

        // Ambil data semua barang untuk pilihan opsi
        $semuaBarangResponse = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://localhost:3000/api/kalab/inventaris/semua_barang_dropdown');

        $semua_barang = [];
        if ($semuaBarangResponse->successful() && $semuaBarangResponse->json('success')) {
            $semua_barang = $semuaBarangResponse->json('data');
        }

        return view('kalab.tambah_draf', compact('inventaris_rusak', 'permintaan_bhp', 'semua_barang'));
    }

    public function simpanDraf(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $payload = [
            'tahun_pengadaan' => $request->tahun_pengadaan,
            'action' => $request->action, // 'simpan_draft' atau 'ajukan'
            'items' => is_array($request->items) ? array_values($request->items) : [],
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
    public function editItem(Request $request, $id_detail)
    {
        $token = $request->session()->get('jwt_token');

        $payload = [
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'link_pembelian' => $request->link_pembelian,
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->put('http://localhost:3000/api/kalab/draf_pengadaan/item/' . $id_detail, $payload);

        if ($response->successful() && $response->json('success')) {
            return redirect('/kalab/draf-pengadaan')->with('success', 'Barang berhasil diubah!');
        }

        return redirect('/kalab/draf-pengadaan')->with('error', $response->json('message') ?? 'Gagal mengubah barang.');
    }

    public function deleteItem(Request $request, $id_detail)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete('http://localhost:3000/api/kalab/draf_pengadaan/item/' . $id_detail);

        if ($response->successful() && $response->json('success')) {
            return redirect('/kalab/draf-pengadaan')->with('success', 'Barang berhasil dihapus!');
        }

        return redirect('/kalab/draf-pengadaan')->with('error', $response->json('message') ?? 'Gagal menghapus barang.');
    }

    
    public function mintaMaintenance(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('http://localhost:3000/api/kalab/dashboard/minta_maintenance', [
            'kategori' => $request->kategori
        ]);

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true, 'message' => 'Permintaan berhasil dikirim.']);
        }

        return response()->json(['success' => false, 'message' => $response->json('message') ?? 'Gagal mengirim permintaan.']);
    }

    public function bhpRiwayat(Request $request)
    {
        // Reuse the staf-lab endpoint to get BHP history
        $response = Http::get("http://localhost:3000/api/staf_lab/bhp/riwayat");
        
        $usages = [];
        if ($response->successful() && $response->json('success')) {
            $usages = $response->json('data');
        }

        return view('kalab.bhp_riwayat', compact('usages'));
    }
}
