<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Maintenance - Labventory</title>
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

    @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 8px; }
        ::-webkit-scrollbar-thumb { background: #c9ccc3; border-radius: 8px; }
        ::-webkit-scrollbar-thumb:hover { background: #6196aa; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.3s ease forwards; }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .slide-down { animation: slideDown 0.25s ease forwards; }

        /* Status badge */
        .status-badge {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 3px 10px; border-radius: 999px; font-size: 11px; font-weight: 700;
        }

        /* Timeline dot pulse */
        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.6; transform: scale(1.25); }
        }
        .dot-pulse { animation: pulse-dot 2s ease-in-out infinite; }

        /* Input focus ring */
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #6196aa;
            box-shadow: 0 0 0 3px rgba(97, 150, 170, 0.15);
        }

        /* Drag-over highlight for BHP area */
        .bhp-row { transition: background 0.15s; }
        .bhp-row:hover { background: #f9f5ed; }
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

    <!-- ======================================================
         SIDEBAR
    ====================================================== -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20">
        <!-- Brand -->
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Lab Komputer Kampus</span>
                </div>
            </a>
        </div>

        <!-- User Profile -->
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] flex items-center justify-center font-bold text-lg text-[#20394a] shadow-inner">
                SK
            </div>
            <div class="overflow-hidden">
                <h4 class="font-semibold text-sm truncate text-[#f9f5ed]">Staf Lab - Budi W.</h4>
            </div>
        </div>

        <!-- Nav -->
        <nav class="flex-grow p-4 space-y-1 mt-2">
            <p class="text-[10px] font-bold text-[#6196aa]/60 uppercase tracking-widest px-4 py-2">Menu Utama</p>

            <a href="{{ url('/staf-lab/home') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                </svg>
                Dashboard Overview
            </a>

            <a href="{{ url('/staf-lab/bhp') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Kelola Stok BHP
            </a>

            <!-- ACTIVE: Maintenance -->
            <a href="{{ url('/staf-lab/maintenance') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Log Maintenance
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-[#6196aa]/20">
            <a href="/" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-[#c9ccc3]/20 hover:bg-[#c9ccc3]/10 text-xs font-semibold text-[#c9ccc3] hover:text-[#f9f5ed] transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3 3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Keluar
            </a>
        </div>
    </aside>

    <!-- ======================================================
         MAIN CONTENT
    ====================================================== -->
    <main class="flex-grow flex flex-col min-w-0">

        <!-- Header -->
        <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Log Maintenance & Kondisi Barang</h2>
            </div>
            <div class="flex items-center gap-4">
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date">–</span>
                    <span class="text-[10px] text-gray-400" id="current-time">–</span>
                </div>
                <button onclick="openFormModal()" class="flex items-center gap-2 px-4 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white text-sm font-semibold rounded-xl shadow-md transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Catat Maintenance
                </button>
            </div>
        </header>

        <!-- Content -->
        <div class="p-6 md:p-8 max-w-7xl w-full mx-auto space-y-8 pb-12">

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Total Log -->
                <div class="bg-white rounded-2xl p-5 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-[#6196aa]/10 text-[#6196aa] rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Log</span>
                        <span class="text-2xl font-bold text-[#20394a]" id="stat-total">0</span>
                    </div>
                </div>
                <!-- Proses -->
                <div class="bg-white rounded-2xl p-5 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-amber-500/10 text-amber-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Sedang Proses</span>
                        <span class="text-2xl font-bold text-amber-500" id="stat-proses">0</span>
                    </div>
                </div>
                <!-- Selesai -->
                <div class="bg-white rounded-2xl p-5 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-emerald-500/10 text-emerald-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Selesai</span>
                        <span class="text-2xl font-bold text-emerald-600" id="stat-selesai">0</span>
                    </div>
                </div>
                <!-- BHP Terpakai -->
                <div class="bg-white rounded-2xl p-5 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                    <div class="p-3 bg-rose-500/10 text-rose-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">BHP Terpakai</span>
                        <span class="text-2xl font-bold text-rose-500" id="stat-bhp">0 item</span>
                    </div>
                </div>
            </div>

            <!-- Main Layout: Table + Quick BHP Stock -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

                <!-- Log Table (2/3) -->
                <div class="xl:col-span-2 bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-[#c9ccc3]/30 flex items-center justify-between">
                        <div>
                            <h3 class="font-bold text-[#20394a]">Riwayat Log Maintenance</h3>
                            <p class="text-xs text-gray-400 mt-0.5">Semua aktivitas perawatan aset laboratorium komputer</p>
                        </div>
                        <!-- Filter status -->
                        <select id="filter-status" onchange="renderLogTable()" class="text-xs border border-[#c9ccc3]/60 rounded-lg px-3 py-2 text-gray-600 focus:border-[#6196aa] bg-white">
                            <option value="">Semua Status</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Dibatalkan">Dibatalkan</option>
                        </select>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#20394a]/5 text-[#20394a] border-b border-[#c9ccc3]/30 text-xs font-bold uppercase tracking-wider">
                                    <th class="px-5 py-3.5">Aset / Barang</th>
                                    <th class="px-5 py-3.5">Jenis & Teknisi</th>
                                    <th class="px-5 py-3.5 text-center">Status Kondisi</th>
                                    <th class="px-5 py-3.5 text-center">BHP Pakai</th>
                                    <th class="px-5 py-3.5">Tanggal</th>
                                    <th class="px-5 py-3.5 text-center">Status</th>
                                    <th class="px-5 py-3.5 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="log-table-body" class="divide-y divide-gray-100 text-sm">
                                <!-- Loaded by JS -->
                            </tbody>
                        </table>
                    </div>
                    <!-- Empty state -->
                    <div id="empty-state" class="hidden py-16 text-center">
                        <div class="mx-auto w-16 h-16 rounded-2xl bg-[#f9f5ed] flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#c9ccc3]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <p class="text-gray-400 text-sm font-medium">Belum ada log maintenance</p>
                        <p class="text-gray-300 text-xs mt-1">Klik "Catat Maintenance" untuk menambah entri baru</p>
                    </div>
                </div>

                <!-- Quick BHP Stock Sidebar (1/3) -->
                <div class="space-y-6">
                    <!-- Stok BHP Card -->
                    <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                        <div class="p-5 border-b border-[#c9ccc3]/30 flex items-center gap-2">
                            <div class="p-2 bg-rose-50 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-[#20394a] text-sm">Stok BHP Saat Ini</h3>
                                <p class="text-[10px] text-gray-400">Real-time setelah pemakaian maintenance</p>
                            </div>
                        </div>
                        <div id="bhp-stock-list" class="divide-y divide-gray-50 max-h-80 overflow-y-auto">
                            <!-- Loaded by JS -->
                        </div>
                        <div class="p-4 border-t border-[#c9ccc3]/20">
                            <a href="{{ url('/staf-lab/bhp') }}" class="flex items-center justify-center gap-1.5 text-xs font-bold text-[#6196aa] hover:text-[#20394a] transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                                Kelola Stok BHP
                            </a>
                        </div>
                    </div>

                    <!-- Aset Kondisi Card -->
                    <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                        <div class="p-5 border-b border-[#c9ccc3]/30">
                            <h3 class="font-bold text-[#20394a] text-sm">Status Kondisi Aset</h3>
                            <p class="text-[10px] text-gray-400 mt-0.5">Kondisi terkini setelah maintenance</p>
                        </div>
                        <div id="asset-condition-list" class="divide-y divide-gray-50 max-h-64 overflow-y-auto">
                            <!-- Loaded by JS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ======================================================
         MODAL: Catat Maintenance
    ====================================================== -->
    <div id="modal-form" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-2xl rounded-2xl border border-[#c9ccc3]/40 shadow-2xl relative transform scale-95 transition-transform duration-300 max-h-[92vh] overflow-y-auto">

            <!-- Modal Header -->
            <div class="sticky top-0 bg-white border-b border-[#c9ccc3]/30 px-6 py-4 flex items-center justify-between z-10 rounded-t-2xl">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-[#20394a] rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-[#20394a]">Catat Log Maintenance</h3>
                        <p class="text-xs text-gray-400">Isi detail pekerjaan dan BHP yang digunakan</p>
                    </div>
                </div>
                <button onclick="closeFormModal()" class="text-gray-400 hover:text-gray-600 transition-colors p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="maintenance-form" onsubmit="handleFormSubmit(event)" class="p-6 space-y-5">

                <!-- Row 1: Aset & Teknisi -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Aset / Barang <span class="text-rose-500">*</span></label>
                        <select id="f-asset" required class="w-full border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm bg-white">
                            <option value="">-- Pilih Aset --</option>
                            <option value="PC-01">PC-01 — Desktop Lab</option>
                            <option value="PC-02">PC-02 — Desktop Lab</option>
                            <option value="PC-03">PC-03 — Desktop Lab</option>
                            <option value="PC-04">PC-04 — Desktop Lab</option>
                            <option value="PC-05">PC-05 — Desktop Lab</option>
                            <option value="PC-06">PC-06 — Desktop Lab</option>
                            <option value="Switch-01">Switch Cisco SG350</option>
                            <option value="Router-01">Router Mikrotik RB2011</option>
                            <option value="Proyektor-01">Proyektor Epson EB-X51</option>
                            <option value="AC-01">AC Daikin 1.5 PK</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Teknisi <span class="text-rose-500">*</span></label>
                        <input type="text" id="f-teknisi" required placeholder="Nama teknisi / petugas" class="w-full border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm">
                    </div>
                </div>

                <!-- Row 2: Jenis & Tanggal -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Jenis Maintenance <span class="text-rose-500">*</span></label>
                        <select id="f-jenis" required class="w-full border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm bg-white">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Preventif">Preventif (Rutin)</option>
                            <option value="Korektif">Korektif (Perbaikan)</option>
                            <option value="Darurat">Darurat</option>
                            <option value="Upgrade">Upgrade Hardware/Software</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Tanggal Maintenance <span class="text-rose-500">*</span></label>
                        <input type="date" id="f-tanggal" required class="w-full border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm">
                    </div>
                </div>

                <!-- Kondisi Sebelum & Sesudah -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Kondisi Sebelum</label>
                        <select id="f-kondisi-sebelum" class="w-full border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm bg-white">
                            <option value="Baik">Baik</option>
                            <option value="Perlu Perhatian" selected>Perlu Perhatian</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Kondisi Sesudah</label>
                        <select id="f-kondisi-sesudah" class="w-full border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm bg-white">
                            <option value="Baik" selected>Baik</option>
                            <option value="Perlu Perhatian">Perlu Perhatian</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Status Pekerjaan <span class="text-rose-500">*</span></label>
                    <div class="flex gap-3 flex-wrap">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="f-status" value="Proses" class="accent-amber-500"> <span class="text-sm text-amber-700 font-medium">Sedang Proses</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="f-status" value="Selesai" checked class="accent-emerald-500"> <span class="text-sm text-emerald-700 font-medium">Selesai</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="f-status" value="Dibatalkan" class="accent-rose-500"> <span class="text-sm text-rose-700 font-medium">Dibatalkan</span>
                        </label>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Deskripsi Pekerjaan</label>
                    <textarea id="f-deskripsi" rows="3" placeholder="Jelaskan detail pekerjaan yang dilakukan..." class="w-full border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm resize-none"></textarea>
                </div>

                <!-- ========= BHP YANG DIGUNAKAN ========= -->
                <div class="bg-amber-50/60 border border-amber-100 rounded-2xl p-5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <div class="p-1.5 bg-amber-100 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-amber-800">BHP yang Digunakan</h4>
                                <p class="text-[10px] text-amber-600">Stok akan otomatis berkurang setelah disimpan</p>
                            </div>
                        </div>
                        <button type="button" onclick="addBhpRow()" class="flex items-center gap-1.5 px-3 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah BHP
                        </button>
                    </div>

                    <!-- BHP Rows container -->
                    <div id="bhp-rows" class="space-y-3">
                        <!-- Rows added dynamically -->
                    </div>

                    <!-- Empty hint -->
                    <div id="bhp-empty-hint" class="text-center py-4 text-xs text-amber-600/70">
                        Klik "Tambah BHP" jika ada barang habis pakai yang digunakan
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeFormModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Log
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ======================================================
         MODAL: Detail Log
    ====================================================== -->
    <div id="modal-detail" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-lg rounded-2xl border border-[#c9ccc3]/40 shadow-2xl relative transform scale-95 transition-transform duration-300">
            <div class="px-6 py-4 border-b border-[#c9ccc3]/30 flex items-center justify-between">
                <h3 class="font-bold text-[#20394a]">Detail Log Maintenance</h3>
                <button onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div id="detail-content" class="p-6 space-y-4 max-h-[70vh] overflow-y-auto"></div>
        </div>
    </div>

    <!-- ======================================================
         SCRIPTS
    ====================================================== -->
    <script>
        // ======================================================
        // Date & Time
        // ======================================================
        const holidays = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        const months   = ['Januari','Februari','Maret','April','Mei','Juni',
                          'Juli','Agustus','September','Oktober','November','Desember'];
        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent =
                `${holidays[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            document.getElementById('current-time').textContent =
                now.toLocaleTimeString('id-ID') + ' WIB';
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // Set today as default date
        document.getElementById('f-tanggal').value = new Date().toISOString().split('T')[0];

        // ======================================================
        // BHP Mock Data (shared state)
        // ======================================================
        let bhpData = [
            { id: 1, name: 'Mouse Optik USB Logitech',  category: 'Aksesori PC',      rack: 'Rak A-1',  stock: 12,  minStock: 5,  unit: 'Pcs'   },
            { id: 2, name: 'Keyboard USB Standar',       category: 'Aksesori PC',      rack: 'Rak A-2',  stock: 8,   minStock: 6,  unit: 'Pcs'   },
            { id: 3, name: 'Konektor RJ-45 Cat6',        category: 'Kabel & Jaringan', rack: 'Rak B-1',  stock: 75,  minStock: 25, unit: 'Pcs'   },
            { id: 4, name: 'Kabel LAN UTP Cat6',         category: 'Kabel & Jaringan', rack: 'Rak B-2',  stock: 150, minStock: 50, unit: 'Meter' },
            { id: 5, name: 'Flashdisk Sandisk 32GB',     category: 'Penyimpanan',      rack: 'Laci C-1', stock: 6,   minStock: 3,  unit: 'Pcs'   },
            { id: 6, name: 'Thermal Paste Arctic MX-4',  category: 'Perawatan CPU',    rack: 'Laci C-2', stock: 4,   minStock: 2,  unit: 'Tube'  },
            { id: 7, name: 'Cable Ties 15cm',            category: 'Kabel & Jaringan', rack: 'Rak B-3',  stock: 2,   minStock: 1,  unit: 'Pack'  },
            { id: 8, name: 'Tisu Pembersih Layar LCD',   category: 'Perawatan CPU',    rack: 'Rak D-1',  stock: 5,   minStock: 2,  unit: 'Pack'  },
        ];

        // ======================================================
        // Asset Data
        // ======================================================
        let assetConditions = {
            'PC-01': 'Baik', 'PC-02': 'Baik', 'PC-03': 'Perlu Perhatian',
            'PC-04': 'Baik', 'PC-05': 'Rusak Ringan', 'PC-06': 'Baik',
            'Switch-01': 'Baik', 'Router-01': 'Baik',
            'Proyektor-01': 'Perlu Perhatian', 'AC-01': 'Baik',
        };

        // ======================================================
        // Log Data
        // ======================================================
        let maintenanceLogs = [
            {
                id: 'MNT-001',
                asset: 'PC-03',
                teknisi: 'Budi Santoso',
                jenis: 'Korektif',
                tanggal: '2026-05-24',
                kondisiSebelum: 'Rusak Ringan',
                kondisiSesudah: 'Baik',
                status: 'Selesai',
                deskripsi: 'Penggantian thermal paste dan pembersihan heatsink CPU yang overheat.',
                bhpUsed: [
                    { bhpId: 6, name: 'Thermal Paste Arctic MX-4', qty: 1, unit: 'Tube' }
                ]
            },
            {
                id: 'MNT-002',
                asset: 'Switch-01',
                teknisi: 'Rudi Hartono',
                jenis: 'Preventif',
                tanggal: '2026-05-25',
                kondisiSebelum: 'Baik',
                kondisiSesudah: 'Baik',
                status: 'Selesai',
                deskripsi: 'Update firmware switch ke versi terbaru dan pembersihan debu pada fan.',
                bhpUsed: []
            },
            {
                id: 'MNT-003',
                asset: 'PC-05',
                teknisi: 'Budi Santoso',
                jenis: 'Korektif',
                tanggal: '2026-05-26',
                kondisiSebelum: 'Rusak Berat',
                kondisiSesudah: 'Rusak Ringan',
                status: 'Proses',
                deskripsi: 'Perbaikan koneksi jaringan, kabel LAN putus, mengganti konektor RJ45.',
                bhpUsed: [
                    { bhpId: 3, name: 'Konektor RJ-45 Cat6', qty: 4, unit: 'Pcs' },
                    { bhpId: 4, name: 'Kabel LAN UTP Cat6',  qty: 2, unit: 'Meter' }
                ]
            },
        ];

        // ======================================================
        // Render Functions
        // ======================================================
        function getStatusBadge(status) {
            const map = {
                'Selesai':    'bg-emerald-100 text-emerald-800',
                'Proses':     'bg-amber-100 text-amber-800',
                'Dibatalkan': 'bg-rose-100 text-rose-800',
            };
            return `<span class="status-badge ${map[status] || 'bg-gray-100 text-gray-700'}">${status}</span>`;
        }

        function getKondisiBadge(kondisi) {
            const map = {
                'Baik':            'bg-emerald-100 text-emerald-700',
                'Perlu Perhatian': 'bg-amber-100 text-amber-700',
                'Rusak Ringan':    'bg-orange-100 text-orange-700',
                'Rusak Berat':     'bg-rose-100 text-rose-800',
            };
            return `<span class="status-badge ${map[kondisi] || 'bg-gray-100 text-gray-600'}">${kondisi}</span>`;
        }

        function renderLogTable() {
            const tbody = document.getElementById('log-table-body');
            const emptyState = document.getElementById('empty-state');
            const filterVal = document.getElementById('filter-status').value;

            const filtered = filterVal
                ? maintenanceLogs.filter(l => l.status === filterVal)
                : maintenanceLogs;

            if (filtered.length === 0) {
                tbody.innerHTML = '';
                emptyState.classList.remove('hidden');
                return;
            }
            emptyState.classList.add('hidden');

            tbody.innerHTML = [...filtered].reverse().map(log => {
                const bhpCount = log.bhpUsed.length > 0
                    ? `<span class="inline-flex items-center gap-1 text-xs font-semibold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full">${log.bhpUsed.length} item</span>`
                    : `<span class="text-xs text-gray-300">–</span>`;
                return `
                    <tr class="hover:bg-gray-50/60 transition-colors fade-in">
                        <td class="px-5 py-4">
                            <div class="font-semibold text-[#20394a] text-sm">${log.asset}</div>
                            <div class="text-[10px] text-gray-400">${log.id}</div>
                        </td>
                        <td class="px-5 py-4">
                            <div class="text-xs font-medium text-gray-700">${log.jenis}</div>
                            <div class="text-[10px] text-gray-400">${log.teknisi}</div>
                        </td>
                        <td class="px-5 py-4 text-center">${getKondisiBadge(log.kondisiSesudah)}</td>
                        <td class="px-5 py-4 text-center">${bhpCount}</td>
                        <td class="px-5 py-4 text-xs text-gray-500">${formatDate(log.tanggal)}</td>
                        <td class="px-5 py-4 text-center">${getStatusBadge(log.status)}</td>
                        <td class="px-5 py-4 text-right">
                            <button onclick="openDetailModal('${log.id}')" class="px-3 py-1.5 text-xs font-semibold text-[#20394a] border border-[#c9ccc3]/60 hover:bg-[#20394a] hover:text-white rounded-lg transition-all duration-200">
                                Detail
                            </button>
                        </td>
                    </tr>`;
            }).join('');
        }

        function renderBhpStockList() {
            const container = document.getElementById('bhp-stock-list');
            container.innerHTML = bhpData.map(item => {
                const isLow  = item.stock <= item.minStock;
                const isZero = item.stock === 0;
                let barColor = 'bg-emerald-500';
                let textColor = 'text-emerald-700';
                if (isZero)      { barColor = 'bg-rose-500'; textColor = 'text-rose-600'; }
                else if (isLow)  { barColor = 'bg-amber-500'; textColor = 'text-amber-600'; }
                const pct = Math.min(100, Math.round((item.stock / (item.minStock * 3)) * 100));
                return `
                    <div class="px-5 py-3 bhp-row">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs font-semibold text-[#20394a] truncate max-w-[140px]">${item.name}</span>
                            <span class="text-xs font-bold ${textColor}">${item.stock} ${item.unit}</span>
                        </div>
                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full ${barColor} rounded-full transition-all duration-500" style="width:${pct}%"></div>
                        </div>
                    </div>`;
            }).join('');
        }

        function renderAssetConditionList() {
            const container = document.getElementById('asset-condition-list');
            const entries = Object.entries(assetConditions);
            container.innerHTML = entries.map(([name, cond]) => {
                const dotMap = {
                    'Baik': 'bg-emerald-500',
                    'Perlu Perhatian': 'bg-amber-500',
                    'Rusak Ringan': 'bg-orange-500',
                    'Rusak Berat': 'bg-rose-600',
                };
                return `
                    <div class="px-5 py-3 flex items-center justify-between hover:bg-gray-50/60 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2 h-2 rounded-full ${dotMap[cond] || 'bg-gray-300'} flex-shrink-0"></span>
                            <span class="text-xs font-semibold text-[#20394a]">${name}</span>
                        </div>
                        <span class="text-[10px] font-semibold text-gray-500">${cond}</span>
                    </div>`;
            }).join('');
        }

        function updateStats() {
            const total   = maintenanceLogs.length;
            const proses  = maintenanceLogs.filter(l => l.status === 'Proses').length;
            const selesai = maintenanceLogs.filter(l => l.status === 'Selesai').length;
            const bhpTotal = maintenanceLogs.reduce((acc, l) => acc + l.bhpUsed.length, 0);
            document.getElementById('stat-total').textContent   = total;
            document.getElementById('stat-proses').textContent  = proses;
            document.getElementById('stat-selesai').textContent = selesai;
            document.getElementById('stat-bhp').textContent     = `${bhpTotal} item`;
        }

        function formatDate(d) {
            if (!d) return '–';
            const parts = d.split('-');
            return `${parseInt(parts[2])} ${months[parseInt(parts[1])-1]} ${parts[0]}`;
        }

        // ======================================================
        // BHP Rows in Modal
        // ======================================================
        let bhpRowCount = 0;

        function addBhpRow() {
            bhpRowCount++;
            const hint = document.getElementById('bhp-empty-hint');
            hint.classList.add('hidden');

            const container = document.getElementById('bhp-rows');
            const rowId = `bhp-row-${bhpRowCount}`;

            const options = bhpData.map(b =>
                `<option value="${b.id}" data-unit="${b.unit}" data-stock="${b.stock}">${b.name} (Stok: ${b.stock} ${b.unit})</option>`
            ).join('');

            const row = document.createElement('div');
            row.id = rowId;
            row.className = 'flex items-center gap-3 bg-white border border-amber-100 rounded-xl p-3 fade-in';
            row.innerHTML = `
                <select class="bhp-select flex-grow border border-[#c9ccc3]/50 rounded-lg px-3 py-2 text-sm" onchange="updateBhpUnit(this, '${rowId}')">
                    ${options}
                </select>
                <div class="flex items-center gap-2 flex-shrink-0">
                    <input type="number" min="1" value="1" class="bhp-qty w-20 border border-[#c9ccc3]/50 rounded-lg px-3 py-2 text-sm text-center" placeholder="Qty">
                    <span class="bhp-unit text-xs text-gray-500 w-10">${bhpData[0].unit}</span>
                </div>
                <button type="button" onclick="removeBhpRow('${rowId}')" class="text-rose-400 hover:text-rose-600 transition-colors flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>`;
            container.appendChild(row);
        }

        function updateBhpUnit(selectEl, rowId) {
            const selected = selectEl.options[selectEl.selectedIndex];
            const unit = selected.getAttribute('data-unit');
            const row = document.getElementById(rowId);
            row.querySelector('.bhp-unit').textContent = unit;
        }

        function removeBhpRow(rowId) {
            document.getElementById(rowId)?.remove();
            if (document.getElementById('bhp-rows').children.length === 0) {
                document.getElementById('bhp-empty-hint').classList.remove('hidden');
            }
        }

        // ======================================================
        // Modal Logic
        // ======================================================
        function openFormModal() {
            // Reset form
            document.getElementById('maintenance-form').reset();
            document.getElementById('f-tanggal').value = new Date().toISOString().split('T')[0];
            document.getElementById('bhp-rows').innerHTML = '';
            document.getElementById('bhp-empty-hint').classList.remove('hidden');
            bhpRowCount = 0;

            const modal = document.getElementById('modal-form');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => modal.querySelector('div').classList.replace('scale-95', 'scale-100'), 10);
        }

        function closeFormModal() {
            const modal = document.getElementById('modal-form');
            modal.querySelector('div').classList.replace('scale-100', 'scale-95');
            setTimeout(() => { modal.classList.add('hidden'); modal.classList.remove('flex'); }, 150);
        }

        function openDetailModal(logId) {
            const log = maintenanceLogs.find(l => l.id === logId);
            if (!log) return;

            const bhpRows = log.bhpUsed.length > 0
                ? log.bhpUsed.map(b => `
                    <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-0">
                        <span class="text-sm text-gray-700">${b.name}</span>
                        <span class="text-sm font-semibold text-rose-600">${b.qty} ${b.unit}</span>
                    </div>`).join('')
                : '<p class="text-sm text-gray-400 text-center py-3">Tidak ada BHP yang digunakan</p>';

            document.getElementById('detail-content').innerHTML = `
                <div class="grid grid-cols-2 gap-4">
                    <div><p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">ID Log</p><p class="text-sm font-bold text-[#20394a] mt-1">${log.id}</p></div>
                    <div><p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Aset</p><p class="text-sm font-bold text-[#20394a] mt-1">${log.asset}</p></div>
                    <div><p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Teknisi</p><p class="text-sm text-gray-700 mt-1">${log.teknisi}</p></div>
                    <div><p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Jenis</p><p class="text-sm text-gray-700 mt-1">${log.jenis}</p></div>
                    <div><p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Tanggal</p><p class="text-sm text-gray-700 mt-1">${formatDate(log.tanggal)}</p></div>
                    <div><p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold">Status</p><div class="mt-1">${getStatusBadge(log.status)}</div></div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-1">Kondisi Sebelum</p>
                        ${getKondisiBadge(log.kondisiSebelum)}
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-1">Kondisi Sesudah</p>
                        ${getKondisiBadge(log.kondisiSesudah)}
                    </div>
                </div>
                ${log.deskripsi ? `<div class="bg-gray-50 rounded-xl p-4"><p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-2">Deskripsi</p><p class="text-sm text-gray-700">${log.deskripsi}</p></div>` : ''}
                <div>
                    <p class="text-[10px] text-gray-400 uppercase tracking-wider font-bold mb-2">BHP Digunakan</p>
                    <div class="bg-amber-50 rounded-xl p-4">${bhpRows}</div>
                </div>`;

            const modal = document.getElementById('modal-detail');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => modal.querySelector('div').classList.replace('scale-95', 'scale-100'), 10);
        }

        function closeDetailModal() {
            const modal = document.getElementById('modal-detail');
            modal.querySelector('div').classList.replace('scale-100', 'scale-95');
            setTimeout(() => { modal.classList.add('hidden'); modal.classList.remove('flex'); }, 150);
        }

        // Close on backdrop click
        ['modal-form', 'modal-detail'].forEach(id => {
            document.getElementById(id).addEventListener('click', function(e) {
                if (e.target === this) {
                    id === 'modal-form' ? closeFormModal() : closeDetailModal();
                }
            });
        });

        // ======================================================
        // Form Submit
        // ======================================================
        function handleFormSubmit(e) {
            e.preventDefault();

            const asset    = document.getElementById('f-asset').value;
            const teknisi  = document.getElementById('f-teknisi').value;
            const jenis    = document.getElementById('f-jenis').value;
            const tanggal  = document.getElementById('f-tanggal').value;
            const kondisiSebelum = document.getElementById('f-kondisi-sebelum').value;
            const kondisiSesudah = document.getElementById('f-kondisi-sesudah').value;
            const deskripsi = document.getElementById('f-deskripsi').value;
            const status   = document.querySelector('input[name="f-status"]:checked')?.value || 'Selesai';

            // Collect BHP rows
            const bhpRows = document.querySelectorAll('#bhp-rows > div');
            const bhpUsed = [];
            let bhpError = false;

            bhpRows.forEach(row => {
                const sel = row.querySelector('.bhp-select');
                const qty = parseInt(row.querySelector('.bhp-qty').value) || 0;
                const bhpId = parseInt(sel.value);
                const opt = sel.options[sel.selectedIndex];
                const stock = parseInt(opt.getAttribute('data-stock'));

                if (qty <= 0) { bhpError = true; return; }
                if (qty > stock) {
                    showToast(`Stok ${opt.text.split('(')[0].trim()} tidak mencukupi! (Stok: ${stock})`, true);
                    bhpError = true;
                    return;
                }
                const unit = opt.getAttribute('data-unit');
                bhpUsed.push({ bhpId, name: opt.text.split(' (')[0], qty, unit });
            });

            if (bhpError) return;

            // Reduce BHP stock
            bhpUsed.forEach(used => {
                const item = bhpData.find(b => b.id === used.bhpId);
                if (item) item.stock -= used.qty;
            });

            // Update asset condition
            if (asset) assetConditions[asset] = kondisiSesudah;

            // Create new log
            const newLog = {
                id: `MNT-${String(maintenanceLogs.length + 1).padStart(3, '0')}`,
                asset, teknisi, jenis, tanggal,
                kondisiSebelum, kondisiSesudah, status, deskripsi, bhpUsed
            };
            maintenanceLogs.push(newLog);

            // Refresh UI
            renderLogTable();
            renderBhpStockList();
            renderAssetConditionList();
            updateStats();
            closeFormModal();

            const bhpMsg = bhpUsed.length > 0 ? ` ${bhpUsed.length} item BHP dikurangi dari stok.` : '';
            showToast(`Log ${newLog.id} berhasil disimpan.${bhpMsg}`);
        }

        // ======================================================
        // Toast
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
            setTimeout(() => toast.classList.add('translate-y-[-120px]', 'opacity-0'), 3800);
        }

        // ======================================================
        // Init
        // ======================================================
        window.onload = function () {
            renderLogTable();
            renderBhpStockList();
            renderAssetConditionList();
            updateStats();
        };
    </script>
</body>
</html>
