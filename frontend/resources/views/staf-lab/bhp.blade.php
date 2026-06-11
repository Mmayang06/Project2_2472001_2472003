<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Stok BHP - Labventory</title>
    <!-- Outfit Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS v4 via CDN & Vite Asset Loading -->
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
    
    @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Custom scrollbar */
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased h-screen flex flex-col md:flex-row overflow-hidden">

    <!-- Toast Notification (Success/Info Feedback) -->
    <div id="toast" class="fixed top-5 right-5 z-50 transform translate-y-[-100px] opacity-0 transition-all duration-300 ease-out bg-[#20394a] text-[#f9f5ed] px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 border border-[#6196aa]/30">
        <span class="p-1 bg-[#6196aa] rounded-full text-white text-xs">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        <span id="toast-message" class="font-medium text-sm">Aksi berhasil dilakukan!</span>
    </div>

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen md:h-screen md:sticky md:top-0 md:overflow-y-auto">
        <!-- Brand Logo & App Name -->
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
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-grow p-4 space-y-2 mt-4 overflow-y-auto">
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
            <a href="{{ url('/staf-lab/bhp') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
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
            <a href="{{ url('/staf-lab/maintenance') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Log Maintenance
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-[#6196aa]/20 flex-shrink-0">
            
            
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
    <main class="flex-grow flex flex-col min-w-0 h-full overflow-hidden">
        <!-- Top Navbar -->
        <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30 flex-shrink-0">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Manajemen Stok BHP</h2>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Current Time Indicator -->
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date">Senin, 25 Mei 2026</span>
                    <span class="text-[10px] text-gray-400" id="current-time">15:10:00 WIB</span>
                </div>
                
                @include('components.notification_bell')
                
            </div>
        </header>

        <!-- Dynamic Section Content Wrapper -->
        <div class="p-6 md:p-8 flex-grow overflow-y-auto max-w-7xl w-full mx-auto pb-16">
            
            <div class="space-y-6">
                <!-- Search and Action Header -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="relative w-full md:w-96">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" id="search-bhp" onkeyup="filterBhpTable()" class="pl-10 pr-4 py-2.5 w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all" placeholder="Cari BHP lab komputer...">
                    </div>
                    
                    <div class="flex gap-3 w-full md:w-auto">
                        <button onclick="openRestockModal()" class="flex-grow md:flex-grow-0 px-5 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold shadow-md transition-all duration-200 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Ajukan Stok BHP
                        </button>
                    </div>
                </div>

                <!-- BHP Table Card -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#20394a]/5 text-[#20394a] border-b border-[#c9ccc3]/30 text-xs font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4">Nama Barang</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Jumlah Stok / Status</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm" id="bhp-table-body">
                                <!-- Loaded via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL: RESTOK BHP -->
    <div id="modal-restock" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeRestockModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 class="text-lg font-bold text-[#20394a] mb-4">Form Pengajuan Stok BHP</h3>
            
            <form onsubmit="handleRestockSubmit(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Pilih Barang BHP</label>
                    <select id="restock-item-select" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                        <!-- Filled via JS -->
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Jumlah Diajukan</label>
                    <input type="number" id="restock-amount" min="1" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Misal: 10">
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeRestockModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200">
                        Ajukan Stok
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL: PAKAI BHP -->
    <div id="modal-consume" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeConsumeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 class="text-lg font-bold text-[#20394a] mb-4">Form Penggunaan BHP</h3>
            
            <form onsubmit="handleConsumeSubmit(event)" class="space-y-4">
                <input type="hidden" id="consume-item-id">
                
                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Nama Barang BHP</label>
                    <input type="text" id="consume-item-name" readonly class="w-full bg-[#f9f5ed]/20 border border-[#c9ccc3]/40 rounded-xl px-4 py-2.5 text-sm text-gray-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Pilih Ruangan Penggunaan</label>
                    <select id="consume-room-select" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                        <option value="">-- Pilih Ruangan --</option>
                        @foreach($ruangan as $r)
                        <option value="{{ $r->id_ruangan }}">{{ $r->nama_ruangan }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Jumlah Digunakan</label>
                    <input type="number" id="consume-amount" min="1" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Misal: 5">
                    <span id="consume-stock-hint" class="text-xs text-gray-400 mt-1 block">Stok tersedia: 0 Pcs</span>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeConsumeModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200">
                        Gunakan BHP
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        // ambil data barang lab dari backend (lewat controller laravel)
        const rawBhpData = {!! json_encode($bhpData ?? []) !!};
        let bhpData = rawBhpData.map(item => ({
            id: item.id_bhp,
            name: item.nama_bhp,
            category: item.kategori || 'Tanpa Kategori',
            rack: item.lokasi_rak || 'Belum Ditentukan',
            stock: item.stok,
            minStock: item.stok_minimal || 5,
            unit: item.satuan || 'Pcs',
            usages: item.usages || []
        }));

        const holidays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // Format dates and time
        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent = `${holidays[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID') + ' WIB';
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // Render Table
        function renderBhpTable() {
            const tableBody = document.getElementById('bhp-table-body');
            tableBody.innerHTML = '';
            
            bhpData.forEach(item => {
                const isLow = item.stock <= item.minStock;
                const isZero = item.stock === 0;
                
                let pct = Math.round((item.stock / (item.minStock * 3)) * 100);
                if (pct > 100) pct = 100;
                
                let progressColor = 'bg-emerald-500';
                let badge = '<span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">Aman</span>';
                
                if (isZero) {
                    progressColor = 'bg-rose-500';
                    badge = '<span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-100 text-rose-800">Habis</span>';
                } else if (isLow) {
                    progressColor = 'bg-amber-500';
                    badge = '<span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">Menipis</span>';
                }

                tableBody.innerHTML += `
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-semibold text-[#20394a]">${item.name}</div>
                            <div class="text-xs text-gray-400 mt-0.5">ID: BHP-0${item.id}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">${item.category}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-[#20394a]">${item.stock} ${item.unit}</span>
                                ${badge}
                            </div>
                            <div class="w-28 bg-gray-100 h-1.5 rounded-full mt-2 overflow-hidden">
                                <div class="h-full ${progressColor} rounded-full" style="width: ${pct}%"></div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="openConsumeModal(${item.id})" class="px-2.5 py-1.5 border border-[#20394a]/30 text-[#20394a] hover:bg-[#20394a]/10 rounded-lg text-xs font-bold transition-all duration-200">
                                Pakai
                            </button>
                            <button onclick="openRestockModal('${item.name}')" class="px-2.5 py-1.5 bg-[#20394a]/10 text-[#20394a] hover:bg-[#20394a] hover:text-white rounded-lg text-xs font-bold transition-all duration-200">
                                Tambah
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        async function consumeBhp(id, jumlah, idRuangan) {
            const item = bhpData.find(b => b.id === id);
            if (item) {
                if (item.stock >= jumlah) {
                    try {
                        const response = await fetch('/staf-lab/bhp/consume', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ id_bhp: id, jumlah: jumlah, id_ruangan: idRuangan })
                        });
                        const result = await response.json();
                        
                        if (result.success) {
                            item.stock -= jumlah;
                            
                            // Add to local usages array
                            const roomOption = document.querySelector(`#consume-room-select option[value="${idRuangan}"]`);
                            const roomName = roomOption ? roomOption.text : 'Ruangan';
                            item.usages.push({
                                jumlah_digunakan: jumlah,
                                nama_ruangan: roomName
                            });

                            showToast(`BHP ${item.name} digunakan sebanyak ${jumlah} ${item.unit}.`);
                            renderBhpTable();
                        } else {
                            alert('Gagal menggunakan BHP: ' + result.message);
                        }
                    } catch (error) {
                        alert('Terjadi kesalahan koneksi.');
                    }
                } else {
                    alert(`BHP yang ingin digunakan tidak mencukupi! Stok ${item.name} saat ini hanya tersisa ${item.stock} ${item.unit}.`);
                }
            }
        }

        // Consume Modal
        function openConsumeModal(itemId) {
            const item = bhpData.find(b => b.id === itemId);
            if (item) {
                document.getElementById('consume-item-id').value = item.id;
                document.getElementById('consume-item-name').value = item.name;
                document.getElementById('consume-amount').value = '';
                document.getElementById('consume-room-select').value = '';
                document.getElementById('consume-stock-hint').textContent = `Stok tersedia: ${item.stock} ${item.unit}`;
                
                const amountInput = document.getElementById('consume-amount');
                amountInput.setAttribute('max', item.stock);

                const modal = document.getElementById('modal-consume');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.querySelector('div').classList.remove('scale-95');
                    modal.querySelector('div').classList.add('scale-100');
                }, 10);
            }
        }

        function closeConsumeModal() {
            const modal = document.getElementById('modal-consume');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 150);
        }

        async function handleConsumeSubmit(e) {
            e.preventDefault();
            const itemId = parseInt(document.getElementById('consume-item-id').value);
            const amount = parseInt(document.getElementById('consume-amount').value);
            const idRuangan = parseInt(document.getElementById('consume-room-select').value);

            const item = bhpData.find(b => b.id === itemId);
            if (item) {
                if (!idRuangan) {
                    alert('Silakan pilih ruangan terlebih dahulu.');
                    return;
                }
                if (amount <= 0) {
                    alert('Jumlah harus minimal 1.');
                    return;
                }
                if (amount > item.stock) {
                    alert(`Stok tidak mencukupi! Hanya tersedia ${item.stock} ${item.unit}.`);
                    return;
                }
                await consumeBhp(itemId, amount, idRuangan);
                closeConsumeModal();
            }
        }

        // Close modals on backdrop click
        ['modal-restock', 'modal-consume'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.addEventListener('click', function(e) {
                    if (e.target === this) {
                        id === 'modal-restock' ? closeRestockModal() : closeConsumeModal();
                    }
                });
            }
        });

        function filterBhpTable() {
            const searchVal = document.getElementById('search-bhp').value.toLowerCase();
            const rows = document.querySelectorAll('#bhp-table-body tr');
            
            rows.forEach(row => {
                const nameText = row.querySelector('td:first-child').innerText.toLowerCase();
                const categoryText = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                
                if (nameText.includes(searchVal) || categoryText.includes(searchVal)) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }

        // Restock Modal
        function openRestockModal(selectedName = '') {
            const selectEl = document.getElementById('restock-item-select');
            selectEl.innerHTML = '';
            
            bhpData.forEach(item => {
                const isSelected = item.name === selectedName ? 'selected' : '';
                selectEl.innerHTML += `<option value="${item.id}" ${isSelected}>${item.name} (${item.unit})</option>`;
            });

            document.getElementById('restock-amount').value = '';

            const modal = document.getElementById('modal-restock');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        function closeRestockModal() {
            const modal = document.getElementById('modal-restock');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 150);
        }

        async function handleRestockSubmit(e) {
            e.preventDefault();
            const itemId = parseInt(document.getElementById('restock-item-select').value);
            const amount = parseInt(document.getElementById('restock-amount').value);

            const item = bhpData.find(b => b.id === itemId);
            if (item) {
                try {
                    const response = await fetch('/staf-lab/bhp/restock', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id_bhp: itemId, jumlah: amount })
                    });
                    const result = await response.json();
                    
                    if (result.success) {
                        showToast(result.message);
                        closeRestockModal();
                        // renderBhpTable(); // No need to re-render because stock is not added directly
                    } else {
                        alert('Gagal menambah stok: ' + result.message);
                    }
                } catch (error) {
                    alert('Terjadi kesalahan koneksi.');
                }
            }
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            const msgEl = document.getElementById('toast-message');
            msgEl.textContent = message;
            
            toast.classList.remove('translate-y-[-100px]', 'opacity-0');
            
            setTimeout(() => {
                toast.classList.add('translate-y-[-100px]', 'opacity-0');
            }, 3500);
        }

        window.onload = function() {
            renderBhpTable();
        };
    </script>
</body>
</html>
