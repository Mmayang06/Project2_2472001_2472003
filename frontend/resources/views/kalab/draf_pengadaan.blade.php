<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draf Pengadaan - Kalab</title>
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
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Kepala Laboratorium</span>
                    <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">Kalab</span>
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
            <a href="/kalab/dashboard" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                </svg>
                Dashboard
            </a>

            <a href="/kalab/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>

        </nav>
        
        <div class="mt-auto p-4">
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-red-500/20 hover:text-red-400 cursor-pointer">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow w-full p-6 md:p-8 flex flex-col min-w-0 space-y-6">
        
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-[#20394a]">Draf Pengadaan Saya</h2>
                <p class="text-sm text-gray-500 mt-1">Kelola dan pantau pengajuan pengadaan barang inventaris dan BHP Anda.</p>
            </div>
            <div class="flex items-center gap-4">
                <a href="/kalab/tambah-draf" class="px-5 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl shadow transition-colors font-medium text-sm flex items-center gap-2 whitespace-nowrap">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Buat Draf Baru
                </a>
                @include('components.notification_bell')
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <!-- Status Panel -->
        <div class="w-full">
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm p-6">
                <h3 class="font-bold text-lg text-[#20394a] mb-4 border-b border-gray-100 pb-3">Status Pengajuan Terakhir</h3>
                
                @if(count($drafts) > 0)
                    @php 
                        $latestDraft = $drafts[0]; 
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex items-center justify-between">
                            <div>
                                <span class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Tahun Pengadaan</span>
                                <span class="text-xl font-black text-[#20394a]">{{ $latestDraft['tahun_pengadaan'] }}</span>
                            </div>
                            <span class="bg-gray-200 text-gray-600 text-xs px-3 py-1 rounded-full font-bold">#{{ str_pad($latestDraft['id_draft'], 4, '0', STR_PAD_LEFT) }}</span>
                        </div>

                        <div>
                            @if($latestDraft['status'] == 'disetujui' || $latestDraft['status'] == 'ditolak')
                                <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-xl border border-gray-100">
                                    <div class="h-10 w-10 rounded-full flex items-center justify-center {{ $latestDraft['status'] == 'disetujui' ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }}">
                                        @if($latestDraft['status'] == 'disetujui')
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        @else
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                        @endif
                                    </div>
                                    <div class="flex-grow">
                                        <p class="font-bold text-sm text-[#20394a]">Telah Difinalisasi Kaprodi</p>
                                        <p class="text-xs font-bold {{ $latestDraft['status'] == 'disetujui' ? 'text-emerald-600' : 'text-red-600' }}">
                                            Status: {{ ucfirst($latestDraft['status']) }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center gap-3 bg-amber-50 p-3 rounded-xl border border-amber-100">
                                    <div class="h-10 w-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center animate-pulse">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>
                                    <div class="flex-grow">
                                        <p class="font-bold text-sm text-[#20394a]">Menunggu Review</p>
                                        <p class="text-xs text-amber-600">Status: {{ ucfirst($latestDraft['status']) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @else
                    <p class="text-sm text-gray-500">Belum ada pengajuan draf</p>
                @endif
            </div>
        </div>

        <!-- Draft Cards List -->
        <div class="w-full space-y-6">
            @forelse ($drafts as $draft)
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden flex flex-col">
                    <!-- Draft Header -->
                    <div class="bg-gray-50 border-b border-[#c9ccc3]/30 p-5 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <div class="flex items-center gap-3 mb-1">
                                <h3 class="text-lg font-bold text-[#20394a]">Pengajuan Tahun {{ $draft['tahun_pengadaan'] }}</h3>
                                <span class="bg-gray-200 text-gray-600 text-[10px] px-2 py-0.5 rounded-full font-bold">#{{ str_pad($draft['id_draft'], 4, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <p class="text-xs text-gray-500 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                Diajukan oleh: {{ $draft['nama_pengaju'] ?? 'Anda' }}
                            </p>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            @if($draft['status'] == 'disetujui' || $draft['status'] == 'ditolak')
                                <div class="flex items-center gap-2">
                                    <span class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs rounded-lg font-bold border border-gray-200">
                                        <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                        Locked
                                    </span>
                                    <span class="inline-block px-3 py-1 text-xs rounded-lg font-bold border {{ $draft['status'] == 'disetujui' ? 'bg-emerald-100 text-emerald-700 border-emerald-200' : 'bg-red-100 text-red-700 border-red-200' }}">
                                        {{ ucfirst($draft['status']) }} Kaprodi
                                    </span>
                                </div>
                            @elseif($draft['status'] == 'draft')
                                <div class="flex items-center gap-3">
                                    <span class="inline-block px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg font-bold border border-gray-200">
                                        Draft
                                    </span>
                                    <form method="POST" action="/kalab/ajukan-draf/{{ $draft['id_draft'] }}">
                                        @csrf
                                        <button type="submit" class="px-4 py-1.5 bg-[#20394a] text-white text-xs font-bold rounded-lg hover:bg-[#6196aa] transition-colors shadow-sm flex items-center gap-1 cursor-pointer">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                            Ajukan ke Kaprodi
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span class="inline-block px-3 py-1 bg-amber-100 text-amber-700 text-xs rounded-lg font-bold border border-amber-200">
                                    Status: {{ ucfirst($draft['status']) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Items Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-white text-gray-400 text-[10px] font-bold uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-6 py-3">Nama Barang</th>
                                    <th class="px-6 py-3">Jenis</th>
                                    <th class="px-6 py-3">Jumlah</th>
                                    <th class="px-6 py-3 text-right">Harga Satuan</th>
                                    <th class="px-6 py-3 text-right">Subtotal</th>
                                    <th class="px-6 py-3 text-center">Status Item</th>
                                    @if($draft['status'] == 'draft' || $draft['status'] == 'diajukan')
                                        <th class="px-6 py-3 text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 text-sm">
                                @php $totalHarga = 0; @endphp
                                @foreach ($draft['items'] as $item)
                                    @php 
                                        $subtotal = $item['jumlah'] * $item['harga'];
                                        $totalHarga += $subtotal;
                                    @endphp
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-800">{{ $item['nama_barang'] }}</div>
                                            @if(!empty($item['link_pembelian']))
                                                <a href="{{ $item['link_pembelian'] }}" target="_blank" class="text-xs text-[#6196aa] hover:underline flex items-center gap-1 mt-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                    Link Toko
                                                </a>
                                            @endif
                                            @if(!empty($item['id_inventaris_ganti']))
                                                <div class="mt-2 text-[10px] text-amber-600 bg-amber-50 inline-block px-2 py-0.5 rounded border border-amber-100">
                                                    Ganti Inv ID: {{ $item['id_inventaris_ganti'] }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4"><span class="bg-gray-100 px-2 py-1 rounded text-xs font-semibold text-gray-600">{{ $item['jenis_barang'] }}</span></td>
                                        <td class="px-6 py-4 font-semibold">{{ $item['jumlah'] }}</td>
                                        <td class="px-6 py-4 text-right text-gray-500">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 text-right font-bold text-[#20394a]">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 text-center">
                                            @if($item['status_persetujuan'] == 'disetujui')
                                                <span class="inline-flex items-center text-emerald-600 text-xs font-bold">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                    OK
                                                </span>
                                            @elseif($item['status_persetujuan'] == 'ditolak')
                                                <span class="inline-flex items-center text-red-600 text-xs font-bold">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                                    Tolak
                                                </span>
                                            @else
                                                <span class="inline-flex items-center text-amber-600 text-xs font-bold">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    Pending
                                                </span>
                                            @endif
                                        </td>
                                        @if($draft['status'] == 'draft' || $draft['status'] == 'diajukan')
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center justify-center gap-2">
                                                    <button onclick="openEditModal({{ $item['id_detail'] }}, '{{ $item['nama_barang'] }}', '{{ $item['jenis_barang'] }}', {{ $item['jumlah'] }}, {{ $item['harga'] }}, '{{ $item['link_pembelian'] }}')" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit Item">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                    </button>
                                                    <button onclick="openDeleteModal({{ $item['id_detail'] }})" class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus Item">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    </button>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-[#f9f5ed]/30 border-t border-gray-100">
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-right font-bold text-gray-500 uppercase text-xs tracking-wider">Total Estimasi Draft:</td>
                                    <td class="px-6 py-4 text-right font-black text-[#20394a] text-lg">Rp {{ number_format($totalHarga, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($draft['status'] == 'draft' || $draft['status'] == 'diajukan')
                                            <a href="/kalab/tambah-draf" class="inline-flex px-3 py-1.5 bg-white border border-[#20394a] text-[#20394a] rounded-lg text-xs font-bold hover:bg-gray-50 transition-colors shadow-sm items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                Tambah Barang
                                            </a>
                                        @endif
                                    </td>
                                    @if($draft['status'] == 'draft' || $draft['status'] == 'diajukan')
                                        <td></td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm p-12 text-center flex flex-col justify-center items-center">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <h3 class="text-xl font-bold text-[#20394a] mb-2">Belum Ada Pengajuan Draf</h3>
                    <p class="text-gray-500 mb-6 max-w-md mx-auto">Anda belum membuat draf pengadaan apapun. Silakan buat draf baru untuk memulai pengajuan inventaris atau BHP.</p>
                    <a href="/kalab/tambah-draf" class="inline-flex px-6 py-3 bg-[#20394a] text-white rounded-xl font-semibold hover:bg-[#6196aa] transition-colors shadow">
                        + Buat Draf Pertama
                    </a>
                </div>
            @endforelse
        </div>

    </main>

    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 overflow-hidden border border-[#c9ccc3]/40">
            <div class="bg-[#f9f5ed]/80 border-b border-[#c9ccc3]/40 p-5">
                <h3 class="text-xl font-bold text-[#20394a]">Edit Barang</h3>
                <p class="text-sm text-gray-500 mt-1">Ubah detail barang pada draf ini.</p>
            </div>
            <form id="editForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Barang *</label>
                        <input type="text" id="edit_nama_barang" name="nama_barang" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border bg-white">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis *</label>
                            <select id="edit_jenis_barang" name="jenis_barang" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border bg-white">
                                <option value="BHP">BHP</option>
                                <option value="Inventaris">Inventaris</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah *</label>
                            <input type="number" id="edit_jumlah" name="jumlah" min="1" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Harga Satuan (Estimasi) *</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm font-semibold">Rp</span>
                            </div>
                            <input type="number" id="edit_harga" name="harga" min="1" required class="w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border bg-white">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Link Pembelian Referensi (Opsional)</label>
                        <input type="url" id="edit_link_pembelian" name="link_pembelian" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border bg-white">
                    </div>
                </div>
                <div class="p-5 border-t border-[#c9ccc3]/40 bg-gray-50 flex justify-end gap-3">
                    <button type="button" onclick="closeEditModal()" class="px-5 py-2.5 border border-[#c9ccc3] rounded-xl text-sm font-bold text-gray-700 hover:bg-white transition-colors shadow-sm">Batal</button>
                    <button type="submit" class="px-5 py-2.5 bg-[#20394a] text-white rounded-xl text-sm font-bold hover:bg-[#6196aa] shadow-lg transition-colors flex items-center gap-2">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 overflow-hidden border border-[#c9ccc3]/40 text-center p-6">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-[#20394a] mb-2">Hapus Barang?</h3>
            <p class="text-sm text-gray-500 mb-6">Barang yang dihapus tidak dapat dikembalikan lagi. Apakah Anda yakin?</p>
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()" class="w-full px-4 py-2 border border-[#c9ccc3] rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-xl text-sm font-bold hover:bg-red-700 shadow-md transition-colors">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, nama, jenis, jumlah, harga, link) {
            document.getElementById('editForm').action = '/kalab/draf-pengadaan/item/' + id;
            document.getElementById('edit_nama_barang').value = nama;
            document.getElementById('edit_jenis_barang').value = jenis;
            document.getElementById('edit_jumlah').value = jumlah;
            document.getElementById('edit_harga').value = harga;
            document.getElementById('edit_link_pembelian').value = link === '-' ? '' : link;
            
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = '/kalab/draf-pengadaan/item/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }
    </script>
</body>
</html>
