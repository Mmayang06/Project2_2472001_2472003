<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draf Pengadaan - Labventory</title>
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
    </style>
</head>
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen md:h-screen md:sticky md:top-0 md:overflow-y-auto">
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Staf Administrasi</span>
                    <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">{{ session('user')['username'] ?? 'Staf Admin' }}</span>
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
            <a href="/stafadmin" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                Dashboard
            </a>

            <a href="/stafadmin/daftar-inventaris" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>

            <a href="/stafadmin/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>

        </nav>

        <div class="p-4 border-t border-[#6196aa]/20">
            
            
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-[#c9ccc3]/20 hover:bg-[#c9ccc3]/10 text-xs font-semibold text-[#c9ccc3] hover:text-[#f9f5ed] transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
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
        <header class="bg-[#f9f5ed]/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Draf Pengadaan</h2>
                <div class="text-xs text-gray-500 flex items-center gap-2">
                    <a href="/stafadmin" class="hover:text-[#6196aa]">Dashboard</a>
                    <span>/</span>
                    <span class="font-medium text-[#20394a]">Draf Pengadaan</span>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center bg-white rounded-full px-4 py-2 border border-[#c9ccc3]/40 shadow-sm">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    <input type="text" placeholder="Cari nomor PO / referensi..." class="bg-transparent border-none outline-none text-sm ml-2 w-56 text-[#20394a]">
                </div>
                @include('components.notification_bell')
            </div>
        </header>

        <div class="p-6 md:p-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-7xl">
            
            @php
                $totalDraf = count($drafts);
                $disetujui = 0;
                $menunggu = 0;
                foreach($drafts as $d) {
                    if(isset($d['status_draft']) && strtolower($d['status_draft']) == 'disetujui') {
                        $disetujui++;
                    }
                    if(isset($d['status_draft']) && strtolower($d['status_draft']) == 'diajukan') {
                        $menunggu++;
                    }
                }
            @endphp
            <!-- Summary Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="p-4 border-b border-[#c9ccc3]/30 bg-[#f9f5ed]/30">
                        <span class="text-sm font-bold text-[#20394a] block">Total Draf (Bulan Ini)</span>
                    </div>
                    <div class="p-6">
                        <span class="text-3xl font-bold text-[#20394a]">{{ $totalDraf }}</span>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm border-b-4 border-b-emerald-500 overflow-hidden">
                    <div class="p-4 border-b border-[#c9ccc3]/30 bg-[#f9f5ed]/30">
                        <span class="text-sm font-bold text-[#20394a] block">Disetujui Kaprodi</span>
                    </div>
                    <div class="p-6">
                        <span class="text-3xl font-bold text-emerald-600">{{ $disetujui }}</span>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm border-b-4 border-b-amber-500 overflow-hidden">
                    <div class="p-4 border-b border-[#c9ccc3]/30 bg-[#f9f5ed]/30">
                        <span class="text-sm font-bold text-[#20394a] block">Menunggu Persetujuan</span>
                    </div>
                    <div class="p-6">
                        <span class="text-3xl font-bold text-amber-600">{{ $menunggu }}</span>
                    </div>
                </div>
            </div>

            <!-- Drafts List -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-[#c9ccc3]/30 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-[#f9f5ed]/30">
                    <h3 class="font-bold text-lg text-[#20394a]">Daftar Pengadaan</h3>
                </div>

                <!-- Filter & Search Bar -->
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-white">
                    <div class="flex flex-wrap gap-4 items-center w-full md:w-auto">
                        <!-- Filter Tahun -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-gray-500">Tahun:</span>
                            <select id="filter-year" onchange="filterDrafts()" class="pl-3 pr-8 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 bg-white shadow-sm cursor-pointer">
                                <option value="all">Semua Tahun</option>
                                @foreach(collect($drafts)->pluck('tahun_pengadaan')->unique()->sortDesc() as $tahun)
                                    <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Filter Status -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-gray-500">Status:</span>
                            <select id="filter-status" onchange="filterDrafts()" class="pl-3 pr-8 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 bg-white shadow-sm cursor-pointer">
                                <option value="all">Semua Status</option>
                                <option value="draft">Draft</option>
                                <option value="diajukan">Diajukan</option>
                                <option value="disetujui">Disetujui</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative w-full md:w-64">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" id="search-input" onkeyup="filterDrafts()" placeholder="Cari nomor/pengaju..." class="pl-9 pr-4 py-2 w-full border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 shadow-sm">
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="px-6 py-4">No. Pengajuan</th>
                                <th class="px-6 py-4">Pengaju</th>
                                <th class="px-6 py-4">Tahun Pengadaan</th>
                                <th class="px-6 py-4 text-center">Jumlah Item</th>
                                <th class="px-6 py-4">Total Estimasi</th>
                                <th class="px-6 py-4 text-center">Status Draf</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse ($drafts as $index => $draft)
                                @php
                                    $jumlahItem = count($draft['items']);
                                    $totalBiaya = 0;
                                    foreach ($draft['items'] as $item) {
                                        $totalBiaya += ($item['jumlah'] * $item['harga']);
                                    }
                                @endphp
                            <!-- Main Row -->
                            <tr class="draft-row hover:bg-gray-50/50 transition-colors cursor-pointer" onclick="toggleAccordion({{ $draft['id_draft'] }})" data-id="{{ $draft['id_draft'] }}" data-tahun="{{ $draft['tahun_pengadaan'] }}" data-status="{{ strtolower($draft['status_draft']) }}" data-nodraf="po-{{ $draft['tahun_pengadaan'] }}-{{ str_pad($draft['id_draft'], 4, '0', STR_PAD_LEFT) }}" data-pengaju="{{ strtolower($draft['nama_pengaju'] ?? 'kepala lab') }}">
                                <td class="px-6 py-4 font-semibold text-[#20394a]">
                                    PO-{{ $draft['tahun_pengadaan'] }}-{{ str_pad($draft['id_draft'], 4, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-700">{{ $draft['nama_pengaju'] ?? 'Kepala Lab' }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $draft['tahun_pengadaan'] }}</td>
                                <td class="px-6 py-4 text-center font-medium text-gray-800">{{ $jumlahItem }} Item</td>
                                <td class="px-6 py-4 font-semibold text-gray-700">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($draft['status_draft'] == 'diajukan')
                                        <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-blue-100 text-blue-700 px-3 py-1 rounded-full">Menunggu Finalisasi</span>
                                    @elseif($draft['status_draft'] == 'disetujui')
                                        <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full">Disetujui</span>
                                    @elseif($draft['status_draft'] == 'ditolak')
                                        <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-red-100 text-red-700 px-3 py-1 rounded-full">Ditolak</span>
                                    @else
                                        <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-gray-100 text-gray-700 px-3 py-1 rounded-full">{{ ucfirst($draft['status_draft']) }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="text-gray-400 hover:text-[#20394a] transition-colors focus:outline-none" id="icon-{{ $draft['id_draft'] }}">
                                        <svg class="w-5 h-5 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Sub Row (Accordion Content) -->
                            <tr id="accordion-{{ $draft['id_draft'] }}" class="hidden bg-[#f9f5ed]/20">
                                <td colspan="7" class="px-6 py-6 border-b-2 border-gray-100">
                                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                                        <table class="w-full text-left border-collapse">
                                            <thead>
                                                <tr class="bg-[#20394a]/5 text-gray-600 text-[11px] font-bold uppercase tracking-wider border-b border-gray-200">
                                                    <th class="px-4 py-3">Nama Barang</th>
                                                    <th class="px-4 py-3">Qty</th>
                                                    <th class="px-4 py-3">Estimasi Harga</th>
                                                    <th class="px-4 py-3 text-center">Persetujuan Kaprodi</th>
                                                    <th class="px-4 py-3 text-center">Status Pengadaan</th>
                                                    <th class="px-4 py-3 text-right">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-100 text-sm">
                                                @forelse ($draft['items'] as $item)
                                                <tr class="hover:bg-gray-50/50">
                                                    <td class="px-4 py-3">
                                                        <div class="font-bold text-gray-800">{{ $item['nama_barang'] }}</div>
                                                        <div class="text-xs text-gray-500 mt-0.5">Kategori: {{ $item['jenis_barang'] }}</div>
                                                    </td>
                                                    <td class="px-4 py-3 font-semibold">{{ $item['jumlah'] }} Unit</td>
                                                    <td class="px-4 py-3 text-gray-600">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                                    <td class="px-4 py-3 text-center">
                                                        @if($item['status_persetujuan'] == 'disetujui')
                                                        <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded text-[10px] font-bold border border-emerald-200">
                                                            Disetujui
                                                        </span>
                                                        @elseif($item['status_persetujuan'] == 'ditolak')
                                                        <span class="inline-flex items-center gap-1 bg-red-50 text-red-700 px-2 py-0.5 rounded text-[10px] font-bold border border-red-200">
                                                            Ditolak
                                                        </span>
                                                        @else
                                                        <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-700 px-2 py-0.5 rounded text-[10px] font-bold border border-amber-200">
                                                            Pending
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 text-center">
                                                        @php
                                                            $statusColors = [
                                                                'menunggu_dipesan' => 'bg-gray-100 text-gray-700',
                                                                'dipesan' => 'bg-blue-100 text-blue-700',
                                                                'sedang_dikirim' => 'bg-amber-100 text-amber-700',
                                                                'penerimaan_sebagian' => 'bg-purple-100 text-purple-700',
                                                                'telah_diterima' => 'bg-emerald-100 text-emerald-700'
                                                            ];
                                                            $colorClass = $statusColors[$item['status_pengadaan']] ?? 'bg-gray-100 text-gray-700';
                                                        @endphp
                                                        <select 
                                                            onchange="handleStatusChange(this, {{ $item['id_detail'] }}, '{{ $item['nama_barang'] }}', {{ $item['jumlah'] - $item['jumlah_diterima'] }}, '{{ $item['status_pengadaan'] }}', '{{ $item['jenis_barang'] }}')" 
                                                            class="border border-gray-200 text-xs font-semibold rounded-lg focus:ring-[#6196aa] focus:border-[#6196aa] block w-full p-1.5 {{ $colorClass }}"
                                                            {{ ($item['status_pengadaan'] == 'telah_diterima' || $item['status_persetujuan'] != 'disetujui' || $draft['status_draft'] != 'disetujui') ? 'disabled' : '' }}>
                                                            <option value="menunggu_dipesan" {{ $item['status_pengadaan'] == 'menunggu_dipesan' ? 'selected' : '' }}>Menunggu Dipesan</option>
                                                            <option value="dipesan" {{ $item['status_pengadaan'] == 'dipesan' ? 'selected' : '' }}>Dipesan</option>
                                                            <option value="sedang_dikirim" {{ $item['status_pengadaan'] == 'sedang_dikirim' ? 'selected' : '' }}>Sedang Dikirim</option>
                                                            <option value="penerimaan_sebagian" {{ $item['status_pengadaan'] == 'penerimaan_sebagian' ? 'selected' : '' }}>Penerimaan Sebagian</option>
                                                            <option value="telah_diterima" {{ $item['status_pengadaan'] == 'telah_diterima' ? 'selected' : '' }}>Telah Diterima</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-4 py-3 text-right">
                                                        @if(!empty($item['qr_univ']))
                                                        <button onclick="openShowQrModal('{{ $item['qr_univ'] }}')" class="text-[11px] font-bold text-white bg-[#6196aa] border border-[#6196aa] hover:bg-[#20394a] transition-colors px-2 py-1 rounded shadow-sm inline-block whitespace-nowrap mr-1 mb-1">
                                                            Lihat QR
                                                        </button>
                                                        @endif
                                                        @if(!empty($item['link_pembelian']))
                                                        <a href="{{ $item['link_pembelian'] }}" target="_blank" class="text-[11px] font-bold text-[#6196aa] border border-[#6196aa] hover:bg-[#6196aa] hover:text-white transition-colors px-2 py-1 rounded shadow-sm inline-block whitespace-nowrap">
                                                            Link Beli
                                                        </a>
                                                        @else
                                                        @if(empty($item['qr_univ']))
                                                        <span class="text-[11px] text-gray-400">-</span>
                                                        @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500 text-xs">Tidak ada item.</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada draf pengadaan yang diajukan.
                                </td>
                            </tr>
                            @endforelse
                            <tr id="empty-filter-state-row" style="display: none;">
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    Tidak ada draf pengadaan yang cocok dengan filter atau pencarian Anda.
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </main>

    <!-- Receive Modal -->
    <div id="receiveModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto pt-10 pb-10">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 overflow-hidden flex flex-col max-h-full">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-[#f9f5ed]/50 shrink-0">
                <h3 class="text-lg font-bold text-[#20394a]" id="receiveModalTitle">Form Penerimaan Barang</h3>
                <button onclick="closeReceiveModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto flex-grow">
                <form id="receiveForm" action="/stafadmin/draf-pengadaan/terima" method="POST" onsubmit="return handleReceiveSubmit(event)">
                    @csrf
                    <input type="hidden" name="id_detail" id="modal_id_detail">
                    <input type="hidden" name="is_bhp" id="modal_is_bhp" value="0">
                    
                    <div class="mb-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                        <span class="block text-xs text-blue-500 font-bold uppercase tracking-wider mb-1">Barang</span>
                        <div id="modal_nama_barang" class="font-bold text-[#20394a] text-lg"></div>
                        <div class="text-sm text-blue-600 mt-1">Jumlah akan diterima: <span id="modal_max_qty" class="font-bold"></span> unit</div>
                    </div>

                    {{-- Banner khusus BHP --}}
                    <div id="bhp_info_banner" class="hidden mb-4 p-4 bg-teal-50 rounded-xl border border-teal-200">
                        <div class="flex items-start gap-3">
                            <div class="p-2 bg-teal-100 rounded-lg text-teal-600 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-teal-800">Barang Habis Pakai (BHP)</p>
                                <p class="text-xs text-teal-700 mt-0.5">Stok BHP akan otomatis bertambah sejumlah unit yang diterima. Tidak perlu pelabelan atau alokasi ruangan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Penerimaan</label>
                            <input type="date" name="tanggal_penerimaan" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                        </div>
                        {{-- Field ruangan: hanya tampil untuk Inventori, sembunyi untuk BHP --}}
                        <div id="ruangan_field">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alokasi Ruangan (Tujuan Lab)</label>
                            <select name="id_ruangan" id="ruangan_select" onchange="handleRoomSelection(this)" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                                <option value="">-- Memuat Ruangan... --</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-6 hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Unit Diterima Saat Ini</label>
                        <input type="number" id="input_qty" name="input_qty" min="1" required class="w-full md:w-1/3 rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                    </div>

                    <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" onclick="closeReceiveModal()" class="px-5 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                        <button type="submit" id="btn_submit" class="px-5 py-2.5 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors flex items-center gap-2">
                            Simpan Penerimaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Suggestion Modal -->
    <div id="suggestionModal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden p-6 text-center relative border border-gray-100">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-amber-100 mb-4">
                <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-[#20394a] mb-2">Perhatian</h3>
            <p id="suggestionModalMessage" class="text-sm text-gray-500 mb-6"></p>
            <button onclick="closeSuggestionModal()" class="w-full px-4 py-2 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-md transition-colors">Saya Mengerti</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal" class="fixed inset-0 z-[80] hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 overflow-hidden p-6 text-center relative border border-gray-100">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-[#20394a] mb-2">Gagal</h3>
            <p id="errorModalMessage" class="text-sm text-gray-500 mb-6"></p>
            <button onclick="closeErrorModal()" class="w-full px-4 py-2 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-md transition-colors">Tutup</button>
        </div>
    </div>

    <!-- CSRF Token for fetch -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        function filterDrafts() {
            const yearFilter = document.getElementById('filter-year').value;
            const statusFilter = document.getElementById('filter-status').value;
            const searchInput = document.getElementById('search-input').value.toLowerCase().trim();
            
            const rows = document.querySelectorAll('.draft-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const year = row.getAttribute('data-tahun');
                const status = row.getAttribute('data-status');
                const noDraf = row.getAttribute('data-nodraf');
                const pengaju = row.getAttribute('data-pengaju');
                const id = row.getAttribute('data-id');

                let matchYear = (yearFilter === 'all' || year === yearFilter);
                let matchStatus = (statusFilter === 'all' || status === statusFilter);
                let matchSearch = (searchInput === '' || noDraf.includes(searchInput) || pengaju.includes(searchInput));

                const accordionRow = document.getElementById('accordion-' + id);

                if (matchYear && matchStatus && matchSearch) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                    if(accordionRow) {
                        accordionRow.classList.add('hidden');
                        const icon = document.getElementById('icon-' + id)?.querySelector('svg');
                        if(icon) icon.classList.remove('rotate-180');
                    }
                }
            });

            const emptyState = document.getElementById('empty-filter-state-row');
            if (emptyState) {
                if (visibleCount === 0 && rows.length > 0) {
                    emptyState.style.display = '';
                } else {
                    emptyState.style.display = 'none';
                }
            }
        }

        function toggleAccordion(id) {
            const accordion = document.getElementById('accordion-' + id);
            const icon = document.getElementById('icon-' + id).querySelector('svg');
            if (accordion.classList.contains('hidden')) {
                accordion.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                accordion.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        let currentSelectElement = null;
        let originalStatusValue = null;
        let currentIsBhp = false;

        function showErrorModal(msg) {
            document.getElementById('errorModalMessage').innerText = msg;
            document.getElementById('errorModal').classList.remove('hidden');
            document.getElementById('errorModal').classList.add('flex');
        }

        function closeErrorModal() {
            document.getElementById('errorModal').classList.add('hidden');
            document.getElementById('errorModal').classList.remove('flex');
        }

        function handleStatusChange(selectElement, id, name, maxQty, oldStatus, jenis) {
            const newStatus = selectElement.value;
            if (newStatus === 'telah_diterima') {
                if (maxQty <= 0) {
                    showErrorModal("Seluruh unit untuk barang ini sudah diterima (kuantitas maksimal sudah tercapai).");
                    selectElement.value = oldStatus;
                    return;
                }
                currentSelectElement = selectElement;
                originalStatusValue = oldStatus;
                currentIsBhp = (jenis && jenis.trim().toUpperCase() === 'BHP');
                openReceiveModal(id, name, maxQty, currentIsBhp);
            } else {
                updateStatus(id, newStatus);
            }
        }

        async function updateStatus(id, newStatus) {
            try {
                const response = await fetch(`/stafadmin/draf-pengadaan/${id}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ status_pengadaan: newStatus })
                });
                
                const result = await response.json();
                if (result.success) {
                    window.location.reload();
                } else {
                    alert('Gagal update status');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan jaringan');
            }
        }

        let recommendedLabsCache = null;
        let storageRoomCache = null;

        async function openReceiveModal(id, name, maxQty, isBhp) {
            document.getElementById('modal_id_detail').value = id;
            document.getElementById('modal_nama_barang').innerText = name;
            document.getElementById('modal_max_qty').innerText = maxQty;
            document.getElementById('modal_is_bhp').value = isBhp ? '1' : '0';
            
            const qtyInput = document.getElementById('input_qty');
            qtyInput.max = maxQty;
            qtyInput.value = maxQty;
            maxQtyAllowed = maxQty;

            const bhpBanner = document.getElementById('bhp_info_banner');
            const ruanganField = document.getElementById('ruangan_field');
            const ruanganSelect = document.getElementById('ruangan_select');

            if (isBhp) {
                // BHP: tampilkan banner, sembunyikan ruangan
                bhpBanner.classList.remove('hidden');
                ruanganField.classList.add('hidden');
                ruanganSelect.removeAttribute('required');
                ruanganSelect.value = '';
                document.getElementById('receiveModalTitle').textContent = 'Konfirmasi Penerimaan BHP';
            } else {
                // Inventori: sembunyikan banner, tampilkan ruangan
                bhpBanner.classList.add('hidden');
                ruanganField.classList.remove('hidden');
                ruanganSelect.setAttribute('required', 'required');
                document.getElementById('receiveModalTitle').textContent = 'Form Penerimaan Barang';

                // Fetch ruangan recommendations hanya untuk Inventori
                const selectEl = ruanganSelect;
                selectEl.innerHTML = '<option value="">-- Memuat Ruangan... --</option>';
                try {
                    const response = await fetch(`http://localhost:3000/api/staf_admin/draf_pengadaan/ruangan-rekomendasi/${id}`);
                    const data = await response.json();
                    if (data.success) {
                        recommendedLabsCache = data.recommended_labs;
                        storageRoomCache = data.storage_room;

                        selectEl.innerHTML = '<option value="">-- Pilih Ruangan --</option>';
                        
                        if (data.storage_room) {
                            selectEl.innerHTML += `<option value="${data.storage_room.id_ruangan}">${data.storage_room.nama_ruangan}</option>`;
                        }
                        
                        data.labs_with_broken.forEach(lab => {
                            selectEl.innerHTML += `<option value="${lab.id_ruangan}">${lab.nama_ruangan}</option>`;
                        });
                    }
                } catch (err) {
                    console.error(err);
                    selectEl.innerHTML = '<option value="">-- Gagal memuat ruangan --</option>';
                }
            }

            document.getElementById('receiveModal').classList.remove('hidden');
            document.getElementById('receiveModal').classList.add('flex');
        }

        function closeReceiveModal() {
            if (currentSelectElement && originalStatusValue) {
                currentSelectElement.value = originalStatusValue; // reset select
            }
            document.getElementById('receiveModal').classList.add('hidden');
            document.getElementById('receiveModal').classList.remove('flex');
        }

        function handleRoomSelection(selectEl) {
            const selectedRoomId = parseInt(selectEl.value);
            if (!selectedRoomId) return;

            if (recommendedLabsCache && storageRoomCache) {
                const isRecommended = recommendedLabsCache.some(r => r.id_ruangan === selectedRoomId);
                const isStorage = (selectedRoomId === storageRoomCache.id_ruangan);
                
                let warningMessage = '';
                if (recommendedLabsCache.length > 0) {
                    if (!isRecommended) {
                        const recNames = recommendedLabsCache.map(r => r.nama_ruangan).join(', ');
                        warningMessage = `Tidak ada nama barang yang rusak di lab ini.<br><br><span class="font-bold text-[#6196aa]">Saran:</span> Silahkan alokasikan ke lab yang memiliki barang rusak yang cocok, yaitu: <strong>${recNames}</strong>`;
                    }
                } else {
                    if (!isStorage) {
                        warningMessage = `Tidak ada nama barang yang rusak di lab ini.<br><br><span class="font-bold text-[#6196aa]">Saran:</span> Tidak ada barang serupa yang rusak di lab manapun. Silahkan masukkan ke ruangan <strong>Storage</strong>.`;
                    }
                }

                if (warningMessage) {
                    // Show modal and reset select
                    document.getElementById('suggestionModalMessage').innerHTML = warningMessage;
                    document.getElementById('suggestionModal').classList.remove('hidden');
                    document.getElementById('suggestionModal').classList.add('flex');
                    // Auto-select the first suggested room or storage
                    if (recommendedLabsCache.length > 0) {
                        selectEl.value = recommendedLabsCache[0].id_ruangan;
                    } else {
                        selectEl.value = storageRoomCache.id_ruangan;
                    }
                }
            }
        }

        function closeSuggestionModal() {
            document.getElementById('suggestionModal').classList.add('hidden');
            document.getElementById('suggestionModal').classList.remove('flex');
        }
    </script>

    <!-- Split Confirmation Modal -->
    <div id="splitConfirmModal" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden p-6 text-center relative border border-gray-100">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 mb-4">
                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-[#20394a] mb-2">Informasi Alokasi</h3>
            <p id="splitConfirmMessage" class="text-sm text-gray-500 mb-6"></p>
            <div class="flex gap-3">
                <button type="button" onclick="closeSplitConfirmModal()" class="w-full px-4 py-2 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                <button type="button" onclick="executeReceiveSubmit()" class="w-full px-4 py-2 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-md transition-colors">Lanjutkan</button>
            </div>
        </div>
    </div>

    <script>
        function closeSplitConfirmModal() {
            document.getElementById('splitConfirmModal').classList.add('hidden');
            document.getElementById('splitConfirmModal').classList.remove('flex');
        }

        async function handleReceiveSubmit(e) {
            e.preventDefault();
            const qty = maxQtyAllowed;
            const isBhp = document.getElementById('modal_is_bhp').value === '1';

            // Untuk BHP: tidak perlu validasi ruangan, langsung submit
            if (isBhp) {
                executeReceiveSubmit();
                return false;
            }

            // Untuk Inventori: validasi ruangan seperti sebelumnya
            const selectedRoomId = parseInt(document.getElementById('ruangan_select').value);
            if (!selectedRoomId) {
                showErrorModal('Silakan pilih ruangan tujuan terlebih dahulu.');
                return false;
            }

            if (recommendedLabsCache && storageRoomCache && selectedRoomId !== storageRoomCache.id_ruangan) {
                const lab = recommendedLabsCache.find(r => r.id_ruangan === selectedRoomId);
                if (lab && qty > lab.broken_count) {
                    const msg = `Barang yang dialokasikan ke lab ini untuk menggantikan barang yang rusak hanya <strong>${lab.broken_count} unit</strong>.<br><br>Sisa barang sebanyak <strong>${qty - lab.broken_count} unit</strong> akan diprioritaskan untuk menggantikan barang rusak di lab lain (jika ada), dan sisanya akan dialokasikan ke ruangan <strong>Storage</strong>.`;
                    document.getElementById('splitConfirmMessage').innerHTML = msg;
                    document.getElementById('splitConfirmModal').classList.remove('hidden');
                    document.getElementById('splitConfirmModal').classList.add('flex');
                    return false;
                }
            }

            executeReceiveSubmit();
        }

        function executeReceiveSubmit() {
            closeSplitConfirmModal();
            document.getElementById('btn_submit').disabled = true;
            document.getElementById('btn_submit').innerText = 'Memproses...';
            document.getElementById('receiveForm').submit();
        }
    </script>
    @if(session('qr_univ'))
    <div id="qrUnivModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 overflow-hidden p-6 text-center relative">
            <h3 class="text-xl font-bold text-[#20394a] mb-2">Penerimaan Berhasil</h3>
            <p class="text-sm text-gray-500 mb-4">Berikut adalah QR Otorisasi dari Universitas untuk pemberian label barang ini. Simpan QR ini untuk digunakan saat melabeli barang.</p>
            
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-200 mb-6">
                <span class="block text-xs text-gray-500 mb-1">Kode QR Universitas:</span>
                <span class="text-2xl font-mono font-bold text-[#20394a]">{{ session('qr_univ') }}</span>
            </div>
            
            <div class="flex gap-3">
                <button onclick="downloadQrUniv('{{ session('qr_univ') }}')" class="w-full px-4 py-2 border border-[#c9ccc3] text-[#20394a] rounded-xl text-sm font-semibold hover:bg-gray-50 transition-colors">Download QR</button>
                <button onclick="document.getElementById('qrUnivModal').classList.add('hidden')" class="w-full px-4 py-2 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">Tutup</button>
            </div>
        </div>
    </div>
    
    <!-- Floating button to reopen QR modal -->
    <button onclick="document.getElementById('qrUnivModal').classList.remove('hidden')" class="fixed bottom-6 right-6 bg-[#6196aa] text-white px-4 py-3 rounded-full shadow-2xl hover:bg-[#20394a] transition-all z-40 flex items-center gap-2 group">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
        <span class="font-bold text-sm">Lihat QR Terakhir</span>
    </button>
    @endif
    
    <!-- Standalone Show QR Modal -->
    <div id="showQrModal" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 overflow-hidden p-6 text-center relative">
            <h3 class="text-xl font-bold text-[#20394a] mb-2">QR Otorisasi Universitas</h3>
            <p class="text-sm text-gray-500 mb-4">Berikut adalah QR Otorisasi dari Universitas untuk pemberian label barang ini.</p>
            
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-200 mb-6">
                <span class="block text-xs text-gray-500 mb-1">Kode QR Universitas:</span>
                <span id="showQrCodeText" class="text-2xl font-mono font-bold text-[#20394a]"></span>
            </div>
            
            <div class="flex gap-3">
                <button id="btnDownloadQrStandalone" class="w-full px-4 py-2 border border-[#c9ccc3] text-[#20394a] rounded-xl text-sm font-semibold hover:bg-gray-50 transition-colors">Download QR</button>
                <button onclick="closeShowQrModal()" class="w-full px-4 py-2 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        function openShowQrModal(qr) {
            document.getElementById('showQrCodeText').innerText = qr;
            document.getElementById('btnDownloadQrStandalone').onclick = () => downloadQrUniv(qr);
            document.getElementById('showQrModal').classList.remove('hidden');
            document.getElementById('showQrModal').classList.add('flex');
        }

        function closeShowQrModal() {
            document.getElementById('showQrModal').classList.add('hidden');
            document.getElementById('showQrModal').classList.remove('flex');
        }

        async function downloadQrUniv(qr) {
            try {
                // Generate QR code using public API
                const response = await fetch(`https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=${qr}`);
                if (!response.ok) throw new Error('Network response was not ok');
                const blob = await response.blob();
                
                const url = window.URL.createObjectURL(blob);
                const element = document.createElement('a');
                element.style.display = 'none';
                element.href = url;
                element.download = 'QR_Universitas_' + qr + '.png';
                document.body.appendChild(element);
                element.click();
                document.body.removeChild(element);
                window.URL.revokeObjectURL(url);
            } catch (error) {
                console.error(error);
                alert('Gagal mendownload gambar QR Code. Silakan coba lagi.');
            }
        }
    </script>
</body>
</html>
