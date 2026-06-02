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

        return view('staf-lab.bhp', compact('bhpData'));
    }

    public function consumeBhp(Request $request)
    {
        $request->validate([
            'id_bhp' => 'required|integer',
            'jumlah' => 'required|integer|min:1'
        ]);

        $response = Http::post("{$this->apiUrl}/staf_lab/bhp/consume", [
            'id_bhp' => $request->id_bhp,
            'jumlah' => $request->jumlah
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
        $response = Http::get("{$this->apiUrl}/staf_lab/maintenance");
        $bhpResponse = Http::get("{$this->apiUrl}/staf_lab/bhp");
        
        $maintenanceData = [];
        $bhpData = [];

        if ($response->successful() && $response->json('success')) {
            $maintenanceData = $response->json('data');
        }
        if ($bhpResponse->successful() && $bhpResponse->json('success')) {
            $bhpData = $bhpResponse->json('data');
        }

        return view('staf-lab.maintenance', compact('maintenanceData', 'bhpData'));
    }
}
