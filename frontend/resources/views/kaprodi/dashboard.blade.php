<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ketua Program Studi - Labventory</title>
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
            <a href="/kaprodi/dashboard" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Ketua Program Studi</span>
                </div>
            </a>
        </div>

        <div class="p-6 border-b border-[#6196aa]/20 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] flex items-center justify-center font-bold text-lg text-[#20394a] shadow-inner">
                KP
            </div>
            <div class="overflow-hidden">
                <h4 class="font-semibold text-sm truncate text-[#f9f5ed]">{{ session('user')['username'] ?? 'Kaprodi' }}</h4>
                <p class="text-xs text-[#c9ccc3] flex items-center gap-1.5 mt-0.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                    Online
                </p>
            </div>
        </div>

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="/kaprodi/dashboard" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                Dashboard
            </a>

            <a href="/kaprodi/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
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
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Dashboard</h2>
                <div class="text-xs text-gray-500 flex items-center gap-2">
                    <span class="font-medium text-[#20394a]">Dashboard</span>
                </div>
            </div>
        </header>

        <div class="p-6 md:p-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-7xl">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-[#20394a] to-[#6196aa] rounded-2xl p-6 md:p-8 text-white shadow-lg flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="text-2xl font-bold md:text-3xl">Selamat Datang, {{ session('user')['username'] ?? 'Kaprodi' }}!</h3>
                    <p class="text-blue-100 mt-2 text-sm md:text-base">Anda masuk sebagai Ketua Program Studi. Silakan kelola dan lakukan review terhadap draf pengadaan barang laboratorium.</p>
                </div>
                <a href="/kaprodi/draf-pengadaan" class="px-5 py-3 bg-white text-[#20394a] rounded-xl font-bold text-sm hover:bg-[#f9f5ed] transition-colors shadow-md shrink-0">
                    Mulai Review Draf
                </a>
            </div>

            <!-- Summary Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Pending -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm border-b-4 border-b-amber-500 flex justify-between items-center">
                    <div>
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Draf Perlu Review</span>
                        <span class="text-3xl font-bold text-amber-600">{{ $dashboardData['pending_review'] ?? 0 }}</span>
                    </div>
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
                <!-- Approved -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm border-b-4 border-b-emerald-500 flex justify-between items-center">
                    <div>
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Total Draf Disetujui</span>
                        <span class="text-3xl font-bold text-emerald-600">{{ $dashboardData['total_disetujui'] ?? 0 }}</span>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                </div>
                <!-- Rejected -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm border-b-4 border-b-red-500 flex justify-between items-center">
                    <div>
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Total Draf Ditolak</span>
                        <span class="text-3xl font-bold text-red-600">{{ $dashboardData['total_ditolak'] ?? 0 }}</span>
                    </div>
                    <div class="p-3 bg-red-50 text-red-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                </div>
            </div>

            <!-- Recent Drafts -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-[#c9ccc3]/30 flex justify-between items-center bg-[#f9f5ed]/30">
                    <h3 class="font-bold text-lg text-[#20394a]">Aktivitas Pengadaan Terbaru</h3>
                    <a href="/kaprodi/draf-pengadaan" class="text-xs font-bold text-[#6196aa] hover:underline">Lihat Semua Draf &rarr;</a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="px-6 py-4">No. Pengajuan</th>
                                <th class="px-6 py-4">Pengaju</th>
                                <th class="px-6 py-4">Tahun</th>
                                <th class="px-6 py-4">Jumlah Item</th>
                                <th class="px-6 py-4">Total Estimasi</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse ($dashboardData['recent_drafts'] ?? [] as $draft)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 font-semibold text-[#20394a]">PO-{{ $draft['tahun_pengadaan'] }}-{{ str_pad($draft['id_draft'], 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4 font-medium text-gray-700">{{ $draft['nama_pengaju'] ?? 'Kepala Lab' }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $draft['tahun_pengadaan'] }}</td>
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $draft['jumlah_item'] }} Item</td>
                                <td class="px-6 py-4 font-semibold text-gray-700">Rp {{ number_format($draft['total_biaya'] ?? 0, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($draft['status'] == 'diajukan')
                                        @if(($draft['pending_items'] ?? 0) > 0)
                                        <span class="inline-flex items-center gap-1 bg-amber-50 text-amber-700 px-3 py-1 rounded-full text-xs font-bold border border-amber-200">
                                            Perlu Review ({{ $draft['pending_items'] }})
                                        </span>
                                        @else
                                        <span class="inline-flex items-center gap-1 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">
                                            Siap Finalisasi
                                        </span>
                                        @endif
                                    @elseif($draft['status'] == 'disetujui')
                                    <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">
                                        Disetujui
                                    </span>
                                    @elseif($draft['status'] == 'ditolak')
                                    <span class="inline-flex items-center gap-1 bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">
                                        Ditolak
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1 bg-gray-50 text-gray-700 px-3 py-1 rounded-full text-xs font-bold border border-gray-200">
                                        {{ ucfirst($draft['status']) }}
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    @if($draft['status'] == 'diajukan')
                                        @if(($draft['pending_items'] ?? 0) > 0)
                                        <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/review" class="inline-flex items-center px-3 py-1.5 bg-[#20394a] text-white hover:bg-[#6196aa] rounded-lg text-xs font-bold transition-colors shadow-sm">
                                            Review Item
                                        </a>
                                        @else
                                        <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/finalize" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white hover:bg-blue-700 rounded-lg text-xs font-bold transition-colors shadow-sm">
                                            Finalisasi
                                        </a>
                                        @endif
                                    @else
                                    <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/review" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-lg text-xs font-bold transition-colors">
                                        Lihat Detail
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada draf pengadaan terbaru.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
