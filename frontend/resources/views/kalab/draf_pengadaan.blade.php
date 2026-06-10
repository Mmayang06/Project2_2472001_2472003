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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Kepala Laboratorium</span>
                </div>
            </a>
        </div>

        <div class="p-6 border-b border-[#6196aa]/20 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] flex items-center justify-center font-bold text-lg text-[#20394a] shadow-inner">
                KL
            </div>
            <div class="overflow-hidden">
                <h4 class="font-semibold text-sm truncate text-[#f9f5ed]">Kalab</h4>
                <p class="text-xs text-[#c9ccc3] flex items-center gap-1.5 mt-0.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                    Online
                </p>
            </div>
        </div>

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="/kalab/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-red-500/20 hover:text-red-400 cursor-pointer">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col min-w-0 p-6 md:p-8">
        
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-[#20394a]">Draf Pengadaan Saya</h2>
                <p class="text-sm text-gray-500 mt-1">Kelola dan pantau pengajuan pengadaan barang inventaris dan BHP Anda.</p>
            </div>
            <a href="/kalab/tambah-draf" class="px-5 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl shadow transition-colors font-medium text-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Buat Draf Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                            <th class="px-6 py-4">Tahun / Status</th>
                            <th class="px-6 py-4">Nama Barang</th>
                            <th class="px-6 py-4">Jenis</th>
                            <th class="px-6 py-4">Jumlah</th>
                            <th class="px-6 py-4 text-right">Harga</th>
                            <th class="px-6 py-4 text-center">Status Item</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse ($drafts as $draft)
                            @foreach ($draft['items'] as $index => $item)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                @if($index === 0)
                                <td class="px-6 py-4 border-r border-gray-100" rowspan="{{ count($draft['items']) }}">
                                    <div class="font-bold text-[#20394a] text-lg">{{ $draft['tahun_pengadaan'] }}</div>
                                    <div class="mt-2 flex flex-col gap-1">
                                        @if($draft['status'] == 'disetujui' || $draft['status'] == 'ditolak')
                                            <span class="inline-block px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-lg font-bold border border-gray-200 text-center">
                                                <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                                Telah Difinalisasi
                                            </span>
                                            @if($draft['status'] == 'disetujui')
                                                <span class="inline-block px-2 py-1 bg-emerald-100 text-emerald-700 text-xs rounded-lg font-bold border border-emerald-200 text-center">
                                                    Disetujui
                                                </span>
                                            @else
                                                <span class="inline-block px-2 py-1 bg-red-100 text-red-700 text-xs rounded-lg font-bold border border-red-200 text-center">
                                                    Ditolak
                                                </span>
                                            @endif
                                        @else
                                            <span class="inline-block px-2 py-1 bg-amber-100 text-amber-700 text-xs rounded-lg font-bold border border-amber-200 text-center">
                                                Menunggu Finalisasi
                                            </span>
                                            <span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 text-xs rounded-lg font-bold border border-blue-200 text-center">
                                                Status: {{ ucfirst($draft['status']) }}
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                @endif
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800">{{ $item['nama_barang'] }}</div>
                                    @if($item['link_pembelian'])
                                        <a href="{{ $item['link_pembelian'] }}" target="_blank" class="text-xs text-[#6196aa] hover:underline flex items-center gap-1 mt-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                            Link Pembelian
                                        </a>
                                    @endif
                                    @if($item['id_inventaris_ganti'])
                                        <div class="mt-2 text-xs text-amber-600 bg-amber-50 inline-block px-2 py-1 rounded border border-amber-100">
                                            Menggantikan barang ID: {{ $item['id_inventaris_ganti'] }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $item['jenis_barang'] }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $item['jumlah'] }}</td>
                                <td class="px-6 py-4 text-right text-gray-600">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($item['status_persetujuan'] == 'disetujui')
                                    <span class="inline-flex items-center bg-emerald-50 text-emerald-700 px-2 py-1 rounded text-xs font-bold">Disetujui</span>
                                    @elseif($item['status_persetujuan'] == 'ditolak')
                                    <span class="inline-flex items-center bg-red-50 text-red-700 px-2 py-1 rounded text-xs font-bold">Ditolak</span>
                                    @else
                                    <span class="inline-flex items-center bg-amber-50 text-amber-700 px-2 py-1 rounded text-xs font-bold">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada draf pengadaan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>
