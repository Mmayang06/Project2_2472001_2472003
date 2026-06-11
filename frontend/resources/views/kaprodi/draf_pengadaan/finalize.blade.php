<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalisasi Draf Pengadaan - Labventory</title>
    <!-- Outfit Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        noir: '#030706',
                        denim: '#20394a',
                        bone: '#f9f5ed',
                        steel: '#6196aa',
                        concrete: '#c9ccc3',
                    },
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 8px; }
        ::-webkit-scrollbar-thumb { background: #c9ccc3; border-radius: 8px; }
        ::-webkit-scrollbar-thumb:hover { background: #6196aa; }
        
        @keyframes scaleIn {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        .scale-in {
            animation: scaleIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }
    </style>
</head>
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen md:h-screen md:sticky md:top-0 md:overflow-y-auto">
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
            <a href="/kaprodi/dashboard" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Ketua Program Studi</span>
                    <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">{{ session('user')['username'] ?? 'Kaprodi' }}</span>
                </div>
            </a>
            <a href="/profile" title="Edit Profil" class="p-2 bg-[#6196aa]/10 text-[#6196aa] hover:bg-[#6196aa] hover:text-[#f9f5ed] rounded-lg transition-colors shadow-sm ml-2 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
        </div>
        </div>

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="/kaprodi/dashboard" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                Dashboard
            </a>

            <a href="/kaprodi/daftar-inventaris" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>

            <a href="/kaprodi/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>
        </nav>

        <div class="p-4 border-t border-[#6196aa]/20">
            
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 font-semibold text-sm transition-colors cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="bg-[#f9f5ed]/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div class="flex items-center gap-2">
                <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/review" class="p-2 hover:bg-gray-200 rounded-lg text-gray-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <div>
                    <h2 class="text-xl font-bold text-[#20394a]">Finalisasi Draf</h2>
                    <div class="text-xs text-gray-500 flex items-center gap-2">
                        <a href="/kaprodi/dashboard" class="hover:text-[#6196aa]">Dashboard</a>
                        <span>/</span>
                        <a href="/kaprodi/draf-pengadaan" class="hover:text-[#6196aa]">Draf Pengadaan</a>
                        <span>/</span>
                        <span class="font-medium text-[#20394a]">Finalisasi</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-6 md:p-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-7xl">
            @if($hasPending)
            <!-- Block Page if items are pending -->
            <div class="bg-red-50 border border-red-200 rounded-2xl p-6 md:p-8 text-center space-y-4">
                <div class="mx-auto w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-red-950">Finalisasi Ditangguhkan</h3>
                <p class="text-sm text-red-700 max-w-md mx-auto">Masih terdapat beberapa item barang dalam draf pengadaan ini yang belum ditinjau status persetujuannya (masih berstatus pending). Anda wajib menyetujui atau menolak semua item terlebih dahulu.</p>
                <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/review" class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-bold shadow-md transition-colors cursor-pointer">
                    &larr; Kembali dan Tinjau Item
                </a>
            </div>
            @else
            <!-- Overview Summary -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Summary Metrics Card -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm space-y-6">
                    <h3 class="font-bold text-lg text-[#20394a] border-b pb-4">Ringkasan Persetujuan</h3>
                    
                    @php
                        $approvedCount = 0;
                        $rejectedCount = 0;
                        $approvedTotal = 0;
                        $rejectedTotal = 0;
                        $approvedItemsList = [];
                        $rejectedItemsList = [];

                        foreach ($draft['items'] as $item) {
                            $subtotal = $item['jumlah'] * $item['harga'];
                            if ($item['status_persetujuan'] === 'disetujui') {
                                $approvedCount++;
                                $approvedTotal += $subtotal;
                                $approvedItemsList[] = $item;
                            } else {
                                $rejectedCount++;
                                $rejectedTotal += $subtotal;
                                $rejectedItemsList[] = $item;
                            }
                        }
                    @endphp

                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 bg-emerald-50 rounded-xl border border-emerald-100">
                            <span class="text-xs font-bold text-emerald-700 block mb-1">Item Disetujui</span>
                            <span class="text-2xl font-bold text-emerald-800">{{ $approvedCount }} Barang</span>
                            <span class="text-xs text-emerald-600 block mt-1">Estimasi: Rp {{ number_format($approvedTotal, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="p-4 bg-red-50 rounded-xl border border-red-100">
                            <span class="text-xs font-bold text-red-700 block mb-1">Item Ditolak</span>
                            <span class="text-2xl font-bold text-red-800">{{ $rejectedCount }} Barang</span>
                            <span class="text-xs text-red-600 block mt-1">Estimasi: Rp {{ number_format($rejectedTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="p-4 bg-[#f9f5ed] rounded-xl border border-[#c9ccc3]/30 flex justify-between items-center">
                        <div>
                            <span class="text-xs font-semibold text-gray-500 block">Total Anggaran Disetujui</span>
                            <span class="text-2xl font-bold text-[#20394a]">Rp {{ number_format($approvedTotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="p-2.5 bg-[#20394a] text-white rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Warning & Final Confirmation Card -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm flex flex-col justify-between space-y-6">
                    <div>
                        <h3 class="font-bold text-lg text-[#20394a] border-b pb-4">Finalisasi & Kunci Draf</h3>
                        
                        <div class="mt-4 p-4 bg-amber-50 rounded-xl border border-amber-200 text-amber-900 text-sm space-y-2">
                            <div class="flex gap-2">
                                <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                <span class="font-bold">Konsekuensi Tindakan:</span>
                            </div>
                            <ul class="list-disc pl-5 space-y-1 text-xs text-amber-800">
                                <li>Status draf pengadaan ini akan dikunci secara permanen.</li>
                                <li>Semua item yang Anda setujui akan dikirimkan ke Staf Administrasi untuk segera diproses pemesanannya.</li>
                                <li>Semua item yang ditolak akan dibatalkan otomatis dan tidak bisa diajukan kembali dari draf ini.</li>
                                <li>Anda tidak dapat mengubah keputusan persetujuan ini setelah tombol ditekan.</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <button onclick="confirmFinalize()" id="btnSubmitFinalize" 
                            class="w-full py-4 bg-gradient-to-r from-[#20394a] to-[#6196aa] text-white hover:from-[#6196aa] hover:to-[#20394a] rounded-xl font-bold text-md shadow-lg transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                            Konfirmasi & Finalisasi Draf
                        </button>
                    </div>
                </div>
            </div>

            <!-- List of Approved vs Rejected items for review -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Approved Table -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-emerald-50 border-b border-emerald-100 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <h4 class="font-bold text-emerald-800 text-sm">Daftar Barang Disetujui ({{ count($approvedItemsList) }})</h4>
                    </div>
                    <div class="p-2 overflow-x-auto max-h-96 overflow-y-auto">
                        <table class="w-full text-left text-xs">
                            <thead>
                                <tr class="text-gray-500 font-bold uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3">Qty</th>
                                    <th class="px-4 py-3 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($approvedItemsList as $item)
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-800">{{ $item['nama_barang'] }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $item['jumlah'] }} Unit</td>
                                    <td class="px-4 py-3 text-right font-bold text-gray-700">Rp {{ number_format($item['jumlah'] * $item['harga'], 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-400">Tidak ada barang yang disetujui.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Rejected Table -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 bg-red-50 border-b border-red-100 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-500 animate-pulse"></span>
                        <h4 class="font-bold text-red-800 text-sm">Daftar Barang Ditolak ({{ count($rejectedItemsList) }})</h4>
                    </div>
                    <div class="p-2 overflow-x-auto max-h-96 overflow-y-auto">
                        <table class="w-full text-left text-xs">
                            <thead>
                                <tr class="text-gray-500 font-bold uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-4 py-3">Barang</th>
                                    <th class="px-4 py-3">Qty</th>
                                    <th class="px-4 py-3 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($rejectedItemsList as $item)
                                <tr>
                                    <td class="px-4 py-3 font-semibold text-gray-800">{{ $item['nama_barang'] }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $item['jumlah'] }} Unit</td>
                                    <td class="px-4 py-3 text-right font-bold text-gray-700">Rp {{ number_format($item['jumlah'] * $item['harga'], 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-6 text-center text-gray-400">Tidak ada barang yang ditolak.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Footer Return Actions -->
            <div class="flex justify-start">
                <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/review" class="px-5 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors cursor-pointer">
                    &larr; Kembali ke Halaman Review Detail
                </a>
            </div>
            @endif
        </div>
    </main>

    <!-- Success Feedback Overlay Modal -->
    <div id="successModal" class="fixed inset-0 bg-[#20394a]/90 backdrop-blur-md z-50 hidden items-center justify-center">
        <div class="bg-white rounded-3xl p-8 max-w-md w-full mx-4 shadow-2xl border border-white/20 text-center scale-in space-y-6">
            <div class="w-24 h-24 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto shadow-inner border border-emerald-100">
                <svg class="w-12 h-12 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <div class="space-y-2">
                <h3 class="text-2xl font-bold text-[#20394a]">Draf Berhasil Difinalisasi!</h3>
                <p class="text-sm text-gray-500">Tindakan review selesai, draf pengadaan dikunci, dan status akhir telah diteruskan. Anda akan dialihkan ke dashboard...</p>
            </div>
        </div>
    </div>

    <!-- CSRF Token for fetch -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        async function confirmFinalize() {
            if(!confirm("Apakah Anda yakin ingin memfinalisasi draf pengadaan ini? Keputusan review tidak akan dapat diubah lagi.")) {
                return;
            }

            const btn = document.getElementById('btnSubmitFinalize');
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses Finalisasi...
            `;

            try {
                const response = await fetch('/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/finalize', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                const result = await response.json();
                if (response.ok && result.success) {
                    // Show success overlay modal
                    document.getElementById('successModal').classList.remove('hidden');
                    document.getElementById('successModal').classList.add('flex');
                    
                    // Redirect after 2.5 seconds
                    setTimeout(() => {
                        window.location.href = '/kaprodi/dashboard';
                    }, 2500);
                } else {
                    alert(result.message || 'Gagal memfinalisasi draft.');
                    btn.disabled = false;
                    btn.innerHTML = `
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                        Konfirmasi & Finalisasi Draf
                    `;
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan jaringan.');
                btn.disabled = false;
                btn.innerHTML = `
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    Konfirmasi & Finalisasi Draf
                `;
            }
        }
    </script>
</body>
</html>
