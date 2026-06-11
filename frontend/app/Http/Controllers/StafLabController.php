<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StafLabController extends Controller
{
    private $apiUrl = 'http://localhost:3000/api';

    public function dashboard(Request $request)
    {
        // tarik data dashboard sama data bhp dari backend
        $response = Http::get("{$this->apiUrl}/staf_lab/dashboard");
        $bhpResponse = Http::get("{$this->apiUrl}/staf_lab/bhp");
        
        $data = [
            'totalJenisBhp' => 0,
            'maintenanceProses' => 0,
            'totalAset' => 0,
            'activities' => [],
            'chartData' => [],
            'bhpData' => []
        ];

        if ($response->successful() && $response->json('success')) {
            $data = array_merge($data, $response->json('data'));
        }
        
        if ($bhpResponse->successful() && $bhpResponse->json('success')) {
            $data['bhpData'] = $bhpResponse->json('data');
        }

        return view('staf-lab.home', compact('data'));
    }

    public function bhp(Request $request)
    {
        $response = Http::get("{$this->apiUrl}/staf_lab/bhp");
        
        $bhpData = [];
        if ($response->successful() && $response->json('success')) {
            $bhpData = $response->json('data');
        }

        $ruangan = \Illuminate\Support\Facades\DB::table('ruangan')->get();

        return view('staf-lab.bhp', compact('bhpData', 'ruangan'));
    }

    public function bhpRiwayat(Request $request)
    {
        $response = Http::get("{$this->apiUrl}/staf_lab/bhp/riwayat");
        
        $usages = [];
        if ($response->successful() && $response->json('success')) {
            $usages = $response->json('data');
        }

        return view('staf-lab.bhp_riwayat', compact('usages'));
    }

    public function consumeBhp(Request $request)
    {
        $request->validate([
            'id_bhp' => 'required|integer',
            'jumlah' => 'required|integer|min:1',
            'id_ruangan' => 'required|integer'
        ]);

        $response = Http::post("{$this->apiUrl}/staf_lab/bhp/consume", [
            'id_bhp' => $request->id_bhp,
            'jumlah' => $request->jumlah,
            'id_ruangan' => $request->id_ruangan
        ]);

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true, 'message' => $response->json('message')]);
        }

        return response()->json(['success' => false, 'message' => $response->json('message') ?? 'Terjadi kesalahan'], 400);
    }

    public function restockBhp(Request $request)
    {
        $request->validate([
            'id_bhp' => 'required|integer',
            'jumlah' => 'required|integer|min:1'
        ]);

        $response = Http::post("{$this->apiUrl}/staf_lab/bhp/restock", [
            'id_bhp' => $request->id_bhp,
            'jumlah' => $request->jumlah
        ]);

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true, 'message' => $response->json('message')]);
        }

        return response()->json(['success' => false, 'message' => $response->json('message') ?? 'Terjadi kesalahan'], 400);
    }

    public function maintenance(Request $request)
    {
        $response       = Http::get("{$this->apiUrl}/staf_lab/maintenance");
        $bhpResponse    = Http::get("{$this->apiUrl}/staf_lab/bhp");
        $inventResponse = Http::get("{$this->apiUrl}/staf_lab/maintenance/inventaris");

        $maintenanceData = [];
        $bhpData         = [];
        $inventarisData  = [];

        if ($response->successful() && $response->json('success')) {
            $maintenanceData = $response->json('data');
        }
        if ($bhpResponse->successful() && $bhpResponse->json('success')) {
            $bhpData = $bhpResponse->json('data');
        }
        if ($inventResponse->successful() && $inventResponse->json('success')) {
            $inventarisData = $inventResponse->json('data');
        }

        return view('staf-lab.maintenance', compact('maintenanceData', 'bhpData', 'inventarisData'));
    }

    public function storeMaintenance(Request $request)
    {
        $request->validate([
            'id_inventaris'    => 'required|integer',
            'tanggal'          => 'required|date',
            'kondisi_setelah'  => 'required|string',
            'status'           => 'required|string',
        ]);

        $payload = [
            'id_inventaris'    => $request->id_inventaris,
            'id_user'          => session('user')['id'] ?? null,
            'jenis_maintenance'=> $request->jenis_maintenance ?? 'Pemeliharaan',
            'tanggal'          => $request->tanggal,
            'kondisi_sebelum'  => $request->kondisi_sebelum,
            'kondisi_setelah'  => $request->kondisi_setelah,
            'status'           => $request->status,
            'keterangan'       => $request->keterangan,
            'bhp_digunakan'    => $request->bhp_digunakan ?? [],
        ];

        $response = Http::post("{$this->apiUrl}/staf_lab/maintenance", $payload);

        if ($response->successful() && $response->json('success')) {
            return response()->json([
                'success' => true,
                'message' => $response->json('message'),
                'id_pemeliharaan' => $response->json('id_pemeliharaan'),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response->json('message') ?? 'Terjadi kesalahan saat menyimpan log maintenance',
        ], $response->status() >= 400 ? $response->status() : 500);
    }

    public function replaceInventory(Request $request)
    {
        $request->validate([
            'id_inventaris_rusak'     => 'required|integer',
            'id_inventaris_pengganti' => 'required|integer',
        ]);

        $payload = [
            'id_inventaris_rusak'     => $request->id_inventaris_rusak,
            'id_inventaris_pengganti' => $request->id_inventaris_pengganti,
            'id_user'                  => session('user')['id'] ?? null,
        ];

        $response = Http::post("{$this->apiUrl}/staf_lab/maintenance/ganti_inventaris", $payload);

        if ($response->successful() && $response->json('success')) {
            return response()->json([
                'success' => true,
                'message' => $response->json('message'),
                'id_pemeliharaan' => $response->json('id_pemeliharaan'),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response->json('message') ?? 'Terjadi kesalahan saat mengganti inventaris',
        ], $response->status() >= 400 ? $response->status() : 500);
    }
}
