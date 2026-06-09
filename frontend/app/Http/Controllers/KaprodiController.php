<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KaprodiController extends Controller
{
    private $apiUrl = 'http://localhost:3000/api';

    /**
     * Display the Kaprodi dashboard.
     */
    public function dashboard(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("{$this->apiUrl}/kaprodi/dashboard");

        $dashboardData = [
            'pending_review' => 0,
            'total_disetujui' => 0,
            'total_ditolak' => 0,
            'recent_drafts' => []
        ];

        if ($response->successful() && $response->json('success')) {
            $dashboardData = $response->json('data');
        }

        return view('kaprodi.dashboard', compact('dashboardData'));
    }

    /**
     * Display the list of drafts.
     * Activity: Melakukan review draf pengadaan barang dari kepala laboratorium.
     */
    public function drafPengadaan(Request $request)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("{$this->apiUrl}/kaprodi/draf_pengadaan");

        $drafts = [];
        if ($response->successful() && $response->json('success')) {
            $drafts = $response->json('data');
        }

        return view('kaprodi.draf_pengadaan.index', compact('drafts'));
    }

    /**
     * Review detail of items in a draft.
     * Activity: Kaprodi dapat memilih barang mana yang disetujui atau ditolak pengadaannya.
     */
    public function reviewDraft(Request $request, $id)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("{$this->apiUrl}/kaprodi/draf_pengadaan/{$id}");

        if (!$response->successful() || !$response->json('success')) {
            return redirect('/kaprodi/draf-pengadaan')->with('error', 'Draft tidak ditemukan.');
        }

        $draft = $response->json('data');

        return view('kaprodi.draf_pengadaan.review', compact('draft'));
    }

    /**
     * AJAX endpoint to approve or reject a single item.
     */
    public function reviewItem(Request $request)
    {
        $request->validate([
            'id_detail' => 'required|integer',
            'status_persetujuan' => 'required|string|in:disetujui,ditolak'
        ]);

        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("{$this->apiUrl}/kaprodi/draf_pengadaan/review-item", [
            'id_detail' => $request->id_detail,
            'status_persetujuan' => $request->status_persetujuan
        ]);

        if ($response->successful() && $response->json('success')) {
            return response()->json(['success' => true, 'message' => $response->json('message')]);
        }

        return response()->json([
            'success' => false,
            'message' => $response->json('message') ?? 'Gagal memperbarui status item.'
        ], $response->status());
    }

    /**
     * Confirm and lock the draft.
     * Activity: Finalisasi draf pengadaan barang. Setelah melakukan finalisasi maka draf sudah tidak dapat diubah.
     */
    public function finalizePage(Request $request, $id)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get("{$this->apiUrl}/kaprodi/draf_pengadaan/{$id}");

        if (!$response->successful() || !$response->json('success')) {
            return redirect('/kaprodi/draf-pengadaan')->with('error', 'Draft tidak ditemukan.');
        }

        $draft = $response->json('data');

        // Check if there are still pending items
        $hasPending = false;
        foreach ($draft['items'] as $item) {
            if ($item['status_persetujuan'] === 'pending') {
                $hasPending = true;
                break;
            }
        }

        return view('kaprodi.draf_pengadaan.finalize', compact('draft', 'hasPending'));
    }

    /**
     * POST route to finalize draft.
     */
    public function finalizeDraft(Request $request, $id)
    {
        $token = $request->session()->get('jwt_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("{$this->apiUrl}/kaprodi/draf_pengadaan/{$id}/finalize");

        if ($response->successful() && $response->json('success')) {
            return response()->json([
                'success' => true,
                'message' => $response->json('message'),
                'final_status' => $response->json('final_status')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response->json('message') ?? 'Gagal memfinalisasi draft.'
        ], $response->status());
    }
}
