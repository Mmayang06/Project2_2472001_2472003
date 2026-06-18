<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventori yang Perlu Diganti - Labventory</title>
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
    </style>
</head>
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-5 right-5 z-50 transform translate-y-[-120px] opacity-0 transition-all duration-300 ease-out bg-[#20394a] text-[#f9f5ed] px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 border border-[#6196aa]/30 max-w-sm">
        <span id="toast-icon" class="p-1 bg-emerald-500 rounded-full text-white flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        <span id="toast-message" class="font-medium text-sm">Berhasil!</span>
    </div>

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen md:h-screen md:sticky md:top-0 md:overflow-y-auto">
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
            <a href="/staf-lab/home" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Staf Laboratorium</span>
                    <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">{{ session('user')['username'] ?? 'Staf Lab' }}</span>
                </div>
            </a>
            <a href="/profile" title="Edit Profil" class="p-2 bg-[#6196aa]/10 text-[#6196aa] hover:bg-[#6196aa] hover:text-[#f9f5ed] rounded-lg transition-colors shadow-sm ml-2 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
        </div>

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="{{ url('/staf-lab/home') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                </svg>
                Dashboard
            </a>
            <a href="{{ url('/staf-lab/daftar-inventaris') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>
            <a href="{{ url('/staf-lab/bhp') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Kelola Stok BHP
            </a>
            <a href="{{ url('/staf-lab/bhp/riwayat') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Riwayat Penggunaan BHP
            </a>
            <a href="{{ url('/staf-lab/maintenance') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31-2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Log Maintenance
            </a>
        </nav>

        <div class="p-4 border-t border-[#6196aa]/20">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-[#c9ccc3]/20 hover:bg-[#c9ccc3]/10 text-xs font-semibold text-[#c9ccc3] hover:text-[#f9f5ed] transition-all duration-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3 3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </a>
            <form id="logout-form" action="/logout" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Daftar Inventori yang Perlu Diganti</h2>
                <div class="text-xs text-gray-500 flex items-center gap-2 mt-0.5">
                    <a href="/staf-lab/home" class="hover:text-[#6196aa]">Dashboard</a>
                    <span>/</span>
                    <a href="/staf-lab/maintenance" class="hover:text-[#6196aa]">Log Maintenance</a>
                    <span>/</span>
                    <span class="font-medium text-[#20394a]">Inventori yang Perlu Diganti</span>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date">–</span>
                    <span class="text-[10px] text-gray-400" id="current-time">–</span>
                </div>
                <a href="{{ url('/staf-lab/maintenance') }}" class="flex items-center gap-2 px-4 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white text-sm font-semibold rounded-xl shadow-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Log Maintenance
                </a>
                @include('components.notification_bell')
            </div>
        </header>

        <!-- Content Body -->
        <div class="p-6 md:p-8 flex-grow overflow-y-auto max-w-7xl w-full mx-auto pb-16 space-y-6">

            <div class="bg-[#20394a] text-white rounded-2xl p-6 shadow-sm border border-[#6196aa]/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-lg">Kelola Penggantian Inventori</h3>
                    <p class="text-xs text-[#c9ccc3] mt-1">Daftar unit inventori yang dilaporkan rusak berat dan membutuhkan penggantian dari ruangan Storage.</p>
                </div>
                <div class="bg-white/10 px-4 py-2 rounded-xl text-center border border-white/10 shrink-0">
                    <span class="text-xs text-[#c9ccc3] uppercase tracking-wider block">Inventori Bermasalah</span>
                    <span class="text-2xl font-bold" id="total-count">{{ count($perluDigantiData) }}</span>
                </div>
            </div>

            <!-- Panduan Status -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm p-4">
                <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Panduan Status Tombol</p>
                <div class="flex flex-wrap gap-5">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-[#6196aa] inline-block shrink-0"></span>
                        <span class="text-xs text-gray-600"><strong>Cek Ketersediaan</strong> – Klik untuk cek apakah ada unit pengganti di Storage</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-amber-500 inline-block shrink-0"></span>
                        <span class="text-xs text-gray-600"><strong>Cek Status / Ganti</strong> – Sudah diajukan ke Kalab, klik untuk cek apakah unit sudah tersedia</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-emerald-600 inline-block shrink-0"></span>
                        <span class="text-xs text-gray-600"><strong>Ganti Unit</strong> – Unit pengganti tersedia & sudah dilabeli, siap untuk diganti</span>
                    </div>
                </div>
            </div>

            <!-- Table Card -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#20394a]/5 text-[#20394a] border-b border-[#c9ccc3]/30 text-xs font-bold uppercase tracking-wider">
                                <th class="px-6 py-4">Nomor Label</th>
                                <th class="px-6 py-4">Nama Barang / Kategori</th>
                                <th class="px-6 py-4">Ruangan Saat Ini</th>
                                <th class="px-6 py-4">Kondisi</th>
                                <th class="px-6 py-4">Tanggal Dilaporkan</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm" id="broken-table-body">
                            @forelse($perluDigantiData as $item)
                            @php
                                $sudahDiajukan = isset($item['sudah_diajukan']) && $item['sudah_diajukan'] > 0;
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 font-bold text-[#20394a] font-mono">{{ $item['nomor_label'] }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-semibold text-gray-800">{{ $item['nama_barang'] }}</div>
                                    <div class="text-[11px] text-gray-400 mt-0.5">Jenis: {{ $item['jenis_barang'] }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-600 font-semibold">{{ $item['nama_ruangan'] ?? '-' }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-50 text-red-700 rounded-full text-xs font-bold border border-red-100">
                                        Perlu Diganti
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 font-medium">
                                    {{ $item['tanggal_dilaporkan'] ? \Carbon\Carbon::parse($item['tanggal_dilaporkan'])->translatedFormat('d F Y') : 'Baru saja' }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    {{-- Tombol awal: Cek Ketersediaan / Cek Status. Setelah JS cek & tersedia, berubah jadi Ganti Unit --}}
                                    <button
                                        id="btn-action-{{ $item['id_inventaris'] }}"
                                        data-id="{{ $item['id_inventaris'] }}"
                                        data-label="{{ addslashes($item['nomor_label']) }}"
                                        data-nama="{{ addslashes($item['nama_barang']) }}"
                                        data-ruangan="{{ addslashes($item['nama_ruangan'] ?? 'Tanpa Ruangan') }}"
                                        data-state="cek"
                                        onclick="handleActionBtn(this)"
                                        class="px-3 py-2 {{ $sudahDiajukan ? 'bg-amber-500 hover:bg-amber-600' : 'bg-[#6196aa] hover:bg-[#20394a]' }} text-white rounded-xl text-xs font-bold shadow-sm transition-all duration-200 inline-flex items-center gap-1.5">
                                        @if($sudahDiajukan)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Cek Status / Ganti
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                        Cek Ketersediaan
                                        @endif
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400 font-medium">
                                    <div class="w-16 h-16 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    Tidak ada inventori yang perlu diganti saat ini.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- ======================================================
         MODAL: Konfirmasi Penggantian Unit (tanpa dropdown)
    ====================================================== -->
    <div id="modal-confirm" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl relative transform scale-95 transition-transform duration-300">
            <div class="px-6 py-4 border-b border-[#c9ccc3]/30 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-[#20394a] text-base">Konfirmasi Penggantian Unit</h3>
                    <p class="text-xs text-gray-400">Pastikan informasi berikut sebelum melanjutkan</p>
                </div>
                <button onclick="closeConfirmModal()" class="text-gray-400 hover:text-gray-600 transition-colors p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 space-y-4">
                <!-- Unit yang Diganti -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Unit yang Diganti (Rusak Berat)</label>
                    <div class="bg-red-50 border border-red-100 rounded-xl p-4">
                        <div class="font-bold text-gray-800" id="confirm-rusak-nama">–</div>
                        <div class="text-xs text-gray-500 mt-1 flex flex-wrap gap-x-3 gap-y-0.5">
                            <span>Label: <strong class="font-mono text-rose-600" id="confirm-rusak-label">–</strong></span>
                            <span>Ruangan: <strong id="confirm-rusak-ruangan">–</strong></span>
                        </div>
                    </div>
                </div>
                <!-- Panah -->
                <div class="flex items-center justify-center gap-3">
                    <div class="flex-1 h-px bg-gray-200"></div>
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-emerald-50 border border-emerald-200 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </div>
                    <div class="flex-1 h-px bg-gray-200"></div>
                </div>
                <!-- Unit Pengganti -->
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Unit Pengganti (Kondisi: Baik ✓)</label>
                    <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-4">
                        <div class="font-bold text-gray-800" id="confirm-pengganti-nama">–</div>
                        <div class="text-xs text-gray-500 mt-1 flex flex-wrap gap-x-3 gap-y-0.5">
                            <span>Label: <strong class="font-mono text-emerald-700" id="confirm-pengganti-label">–</strong></span>
                            <span>Dari Ruangan: <strong id="confirm-pengganti-ruangan">–</strong></span>
                        </div>
                    </div>
                </div>
                <!-- Info -->
                <p class="text-[11px] text-gray-400 bg-gray-50 rounded-lg p-3 leading-relaxed border border-gray-100">
                    ⚠️ Setelah konfirmasi: unit pengganti mengambil alih <strong>nomor label</strong> &amp; <strong>ruangan</strong> unit rusak. Unit lama ditandai <strong>rusak berat</strong> tanpa label. Proses ini dicatat di Log Maintenance.
                </p>
                <div class="flex gap-3 pt-1">
                    <button type="button" onclick="closeConfirmModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="button" id="btn-confirm-ganti" onclick="executeGantiUnit()" class="flex-1 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Konfirmasi Ganti
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================================================
         MODAL: Barang Tidak Ada di Storage (Popup Pengadaan)
    ====================================================== -->
    <div id="modal-not-found" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl relative transform scale-95 transition-transform duration-300">
            <div class="p-6 text-center">
                <div class="w-16 h-16 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center mx-auto mb-4 border border-amber-100 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-[#20394a] mb-2">Barang yang baru tidak ada di storage</h3>
                <p class="text-xs text-gray-500 mb-6 leading-relaxed">
                    Unit pengganti untuk <strong><span id="nf-barang-name">–</span></strong> tidak tersedia di Storage. Anda dapat mengajukan usulan pengadaan barang baru kepada Kepala Laboratorium (Kalab).
                </p>
                
                <div class="flex gap-3">
                    <button type="button" onclick="closeNotFoundModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="button" id="btn-ajukan-kalab" class="flex-1 py-3 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Ajukan ke Kalab
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        // ======================================================
        // Date & Time
        // ======================================================
        const holidays = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        const months   = ['Januari','Februari','Maret','April','Mei','Juni',
                          'Juli','Agustus','September','Oktober','November','Desember'];
        function updateDateTime() {
            const now = new Date();
            const dateEl = document.getElementById('current-date');
            const timeEl = document.getElementById('current-time');
            if (dateEl && timeEl) {
                dateEl.textContent = `${holidays[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
                timeEl.textContent = now.toLocaleTimeString('id-ID') + ' WIB';
            }
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // ======================================================
        // Inventaris Data (semua unit berlabel dari backend)
        // ======================================================
        const rawInventarisData = {!! json_encode($inventarisData ?? []) !!};

        // Data penggantian yang sedang menunggu konfirmasi
        let currentGantiData = null;

        // ======================================================
        // HANDLER UTAMA: dipanggil saat tombol diklik
        // ======================================================
        function handleActionBtn(btn) {
            if (btn.dataset.state === 'ganti') {
                // Sudah ada unit pengganti ditemukan, buka modal konfirmasi
                openConfirmModal(btn);
            } else {
                // Belum dicek, jalankan pengecekan ketersediaan
                cekKetersediaan(btn);
            }
        }

        // ======================================================
        // CEK KETERSEDIAAN UNIT PENGGANTI
        // Mengecek rawInventarisData untuk unit:
        //   - nama_barang sama (case-insensitive)
        //   - kondisi = 'baik'
        //   - sudah berlabel (nomor_label tidak null)
        //   - berada di Storage ATAU di ruangan yang sama dengan unit rusak
        //     (kasus staf admin sudah mengalokasikan barang ke ruangan tsb)
        // ======================================================
        function cekKetersediaan(btn) {
            const idInventaris = parseInt(btn.dataset.id);
            const nomorLabel   = btn.dataset.label;
            const namaBarang   = btn.dataset.nama;
            const namaRuangan  = btn.dataset.ruangan;

            // Tampilkan loading
            btn.disabled = true;
            const originalHTML = btn.innerHTML;
            btn.innerHTML = `
                <svg class="animate-spin h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Mengecek...`;

            setTimeout(() => {
                // Filter: berlabel, kondisi baik, nama sama, di storage atau ruangan yang sama
                const replacements = rawInventarisData.filter(item =>
                    item.kondisi === 'baik' &&
                    item.nama_barang &&
                    item.nama_barang.toLowerCase().trim() === namaBarang.toLowerCase().trim() &&
                    item.nomor_label &&   // wajib sudah dilabeli
                    item.nama_ruangan &&
                    (
                        item.nama_ruangan.toLowerCase().trim() === 'storage' ||
                        item.nama_ruangan.toLowerCase().trim() === namaRuangan.toLowerCase().trim()
                    )
                );

                btn.disabled = false;

                if (replacements.length === 0) {
                    // Cek apakah ada unit yang belum dilabeli (kondisi baik, nama sama)
                    const adaBelumLabel = rawInventarisData.some(item =>
                        item.kondisi === 'baik' &&
                        item.nama_barang &&
                        item.nama_barang.toLowerCase().trim() === namaBarang.toLowerCase().trim() &&
                        !item.nomor_label
                    );

                    btn.innerHTML = originalHTML;

                    if (adaBelumLabel) {
                        // Ada unit tapi belum dilabeli staf admin
                        showToast('Unit pengganti ada di storage namun belum dilabeli. Hubungi Staf Admin untuk pelabelan terlebih dahulu.', true);
                    } else {
                        // Tidak ada sama sekali, ajukan ke kalab
                        document.getElementById('nf-barang-name').textContent = namaBarang;
                        const btnAjukan = document.getElementById('btn-ajukan-kalab');
                        btnAjukan.onclick = () => submitPengajuanKalab(namaBarang, nomorLabel);
                        openModal('modal-not-found');
                    }
                    return;
                }

                // Unit ditemukan!
                // Prioritas: unit di ruangan yang sama (alokasi staf admin) > unit di storage
                const diRuanganSama = replacements.find(r =>
                    r.nama_ruangan && r.nama_ruangan.toLowerCase().trim() === namaRuangan.toLowerCase().trim()
                );
                const selected = diRuanganSama || replacements[0];

                // Update button menjadi "Ganti Unit" (hijau)
                btn.className = 'px-3 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow-sm transition-all duration-200 inline-flex items-center gap-1.5';
                btn.dataset.state            = 'ganti';
                btn.dataset.penggantiId      = selected.id_inventaris;
                btn.dataset.penggantiLabel   = selected.nomor_label || '-';
                btn.dataset.penggantiNama    = selected.nama_barang || namaBarang;
                btn.dataset.penggantiRuangan = selected.nama_ruangan || 'Storage';
                btn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                    Ganti Unit`;

                showToast(`Unit pengganti ditemukan! (${selected.nomor_label}) – Klik "Ganti Unit" untuk konfirmasi.`);
            }, 600); // jeda singkat agar UX lebih natural
        }

        // ======================================================
        // MODAL KONFIRMASI
        // ======================================================
        function openConfirmModal(btn) {
            const idRusak          = parseInt(btn.dataset.id);
            const nomorLabelRusak  = btn.dataset.label;
            const namaBarang       = btn.dataset.nama;
            const namaRuangan      = btn.dataset.ruangan;
            const idPengganti      = parseInt(btn.dataset.penggantiId);
            const labelPengganti   = btn.dataset.penggantiLabel;
            const namaPengganti    = btn.dataset.penggantiNama || namaBarang;
            const ruanganPengganti = btn.dataset.penggantiRuangan;

            currentGantiData = { idRusak, idPengganti };

            document.getElementById('confirm-rusak-nama').textContent      = namaBarang;
            document.getElementById('confirm-rusak-label').textContent     = nomorLabelRusak;
            document.getElementById('confirm-rusak-ruangan').textContent   = namaRuangan;
            document.getElementById('confirm-pengganti-nama').textContent  = namaPengganti;
            document.getElementById('confirm-pengganti-label').textContent = labelPengganti;
            document.getElementById('confirm-pengganti-ruangan').textContent = ruanganPengganti;

            openModal('modal-confirm');
        }

        function closeConfirmModal() {
            closeModal('modal-confirm');
        }

        // ======================================================
        // EKSEKUSI PENGGANTIAN UNIT
        // ======================================================
        async function executeGantiUnit() {
            if (!currentGantiData) return;

            const { idRusak, idPengganti } = currentGantiData;
            const btn = document.getElementById('btn-confirm-ganti');
            btn.disabled = true;
            btn.innerHTML = `
                <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses...`;

            try {
                const resp = await fetch('/staf-lab/maintenance/ganti', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id_inventaris_rusak: idRusak,
                        id_inventaris_pengganti: idPengganti
                    })
                });
                const result = await resp.json();

                if (result.success) {
                    closeConfirmModal();
                    showToast('Unit inventaris berhasil diganti! Status diperbarui menjadi Baik.');
                    setTimeout(() => window.location.reload(), 1500);
                } else {
                    showToast(result.message || 'Gagal mengganti unit inventaris.', true);
                    btn.disabled = false;
                    btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Konfirmasi Ganti`;
                }
            } catch (err) {
                console.error(err);
                showToast('Gagal terhubung ke server.', true);
                btn.disabled = false;
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Konfirmasi Ganti`;
            }
        }

        // ======================================================
        // MODAL NOT FOUND
        // ======================================================
        function closeNotFoundModal() {
            closeModal('modal-not-found');
        }

        async function submitPengajuanKalab(namaBarang, nomorLabel) {
            const btn = document.getElementById('btn-ajukan-kalab');
            btn.disabled = true;
            btn.textContent = 'Mengajukan...';
            
            try {
                const resp = await fetch('/staf-lab/maintenance/ajukan-pengganti', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nama_barang: namaBarang,
                        jumlah: 1,
                        nomor_label: nomorLabel
                    })
                });
                const result = await resp.json();
                
                if (result.success) {
                    showToast('Pengajuan draf pengadaan berhasil dikirim ke Kalab!');
                    closeNotFoundModal();
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    showToast(result.message || 'Gagal mengajukan ke Kalab.', true);
                }
            } catch (err) {
                console.error(err);
                showToast('Terjadi kesalahan koneksi.', true);
            } finally {
                btn.disabled = false;
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg> Ajukan ke Kalab`;
            }
        }

        // ======================================================
        // MODAL HELPERS
        // ======================================================
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => modal.querySelector('div').classList.replace('scale-95', 'scale-100'), 10);
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.querySelector('div').classList.replace('scale-100', 'scale-95');
            setTimeout(() => { modal.classList.add('hidden'); modal.classList.remove('flex'); }, 150);
        }

        // ======================================================
        // TOAST
        // ======================================================
        function showToast(message, isError = false) {
            const toast = document.getElementById('toast');
            const icon  = document.getElementById('toast-icon');
            document.getElementById('toast-message').textContent = message;

            icon.className = `p-1 ${isError ? 'bg-rose-500' : 'bg-emerald-500'} rounded-full text-white flex-shrink-0`;
            icon.innerHTML = isError
                ? `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>`
                : `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>`;

            toast.classList.remove('translate-y-[-120px]', 'opacity-0');
            setTimeout(() => toast.classList.add('translate-y-[-120px]', 'opacity-0'), 4000);
        }

        // Tutup modal saat klik overlay
        document.getElementById('modal-confirm').addEventListener('click', function(e) {
            if (e.target === this) closeConfirmModal();
        });
        document.getElementById('modal-not-found').addEventListener('click', function(e) {
            if (e.target === this) closeNotFoundModal();
        });
    </script>
</body>
</html>
