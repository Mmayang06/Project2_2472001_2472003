<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staf Administrasi - Labventory</title>
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
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #c9ccc3;
            border-radius: 8px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6196aa;
        }
    </style>
</head>
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

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
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Staf Administrasi</span>
                </div>
            </a>
        </div>

        <div class="p-6 border-b border-[#6196aa]/20 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] flex items-center justify-center font-bold text-lg text-[#20394a] shadow-inner">
                SA
            </div>
            <div class="overflow-hidden">
                <h4 class="font-semibold text-sm truncate text-[#f9f5ed]">Staf Admin</h4>
                <p class="text-xs text-[#c9ccc3] flex items-center gap-1.5 mt-0.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                    Online
                </p>
            </div>
        </div>

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="/stafadmin" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                </svg>
                Dashboard
            </a>

            <a href="/stafadmin/daftar-inventaris" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>

            <a href="/stafadmin/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>

            <a href="/stafadmin/penerimaan-barang" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-2 14l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                Penerimaan Barang
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

    <main class="flex-grow flex flex-col min-w-0">
        <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Dashboard Administrasi</h2>
                <p class="text-xs text-gray-500">Selamat datang! Berikut ringkasan aktivitas pengadaan dan inventaris hari ini.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right ml-4">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date"></span>
                    <span class="text-[10px] text-gray-400" id="current-time"></span>
                </div>
                <div class="h-10 w-10 rounded-xl bg-[#20394a]/5 border border-[#20394a]/10 flex items-center justify-center text-[#20394a] relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
            </div>
        </header>

        <div class="p-6 md:p-8 flex-grow overflow-y-auto max-w-7xl w-full mx-auto space-y-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Pengajuan Disetujui -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-[#6196aa]/10 text-[#6196aa] rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Draf Disetujui</span>
                        <span class="text-2xl font-bold text-[#20394a]">{{ number_format($data['total_draf_disetujui'] ?? 0) }}</span>
                    </div>
                </div>

                <!-- Pesanan Menunggu Diterima -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-amber-500/10 text-amber-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Dlm Pengiriman</span>
                        <span class="text-2xl font-bold text-[#20394a]">{{ number_format($data['pesanan_dikirim'] ?? 0) }}</span>
                    </div>
                </div>

                <!-- Total Inventaris -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-indigo-500/10 text-indigo-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Inventaris</span>
                        <span class="text-2xl font-bold text-[#20394a]">{{ number_format($data['total_inventaris'] ?? 0) }}</span>
                    </div>
                </div>

                <!-- Barang Baru Bulan Ini -->
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-emerald-500/10 text-emerald-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg viewBox="0 0 24 24" class="h-7 w-7" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 9h-2V7h-2v5H6l4 4 4-4z"/></svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Barang Baru</span>
                        <span class="text-2xl font-bold text-emerald-600">+{{ number_format($data['barang_baru_bulan_ini'] ?? 0) }}</span>
                    </div>
                </div>
            </div>

            <!-- Tabel Aktivitas Terkini (Riwayat Penerimaan) -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-[#c9ccc3]/30 flex justify-between items-center bg-[#f9f5ed]/30">
                    <div>
                        <h3 class="font-bold text-lg text-[#20394a]">Riwayat Penerimaan Barang</h3>
                        <p class="text-xs text-gray-500">5 barang inventaris terakhir yang berhasil didata</p>
                    </div>
                    <a href="/stafadmin/daftar-inventaris" class="text-sm font-semibold text-[#6196aa] hover:text-[#20394a] transition-colors flex items-center gap-1">
                        Lihat Inventaris
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="px-6 py-4">Nomor Label</th>
                                <th class="px-6 py-4">Nama Barang</th>
                                <th class="px-6 py-4">Ruangan (Lab)</th>
                                <th class="px-6 py-4">Tanggal Terima</th>
                                <th class="px-6 py-4">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @if(isset($data['aktivitas_terkini']) && count($data['aktivitas_terkini']) > 0)
                                @foreach($data['aktivitas_terkini'] as $act)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-bold text-[#20394a]">{{ $act['nomor_label'] }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-800">{{ $act['nama_barang'] }}</div>
                                        <div class="text-xs text-gray-500">{{ $act['jenis_barang'] }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $act['lab'] ?? 'Belum dialokasikan' }}</td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ \Carbon\Carbon::parse($act['tanggal_penerimaan'])->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if(strtolower($act['kondisi']) == 'baik')
                                        <span class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">Baik</span>
                                        @elseif(strtolower($act['kondisi']) == 'rusak')
                                        <span class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-xs font-bold">Rusak</span>
                                        @else
                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">{{ ucfirst($act['kondisi']) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                        Belum ada riwayat penerimaan barang.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <script>
        // Update Time Live
        setInterval(() => {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WIB';
            
            // Format date nicely (e.g., Senin, 25 Mei 2026)
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            const dateString = `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;

            const timeEl = document.getElementById('current-time');
            const dateEl = document.getElementById('current-date');
            
            if(timeEl) timeEl.textContent = timeString;
            if(dateEl) dateEl.textContent = dateString;
        }, 1000);
    </script>
</body>
</html>
