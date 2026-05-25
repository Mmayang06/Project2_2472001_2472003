<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staf Lab Dashboard - Labventory</title>
    <!-- Outfit Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS v4 via CDN (untuk fallback instant/pengembangan tanpa running compiler) & Vite Asset Loading -->
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

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
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20">
        <!-- Brand Logo & App Name -->
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Staf Laboratorium</span>
                </div>
            </a>
        </div>

        <!-- User profile section -->
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] flex items-center justify-center font-bold text-lg text-[#20394a] shadow-inner">
                SL
            </div>
            <div class="overflow-hidden">
                <h4 class="font-semibold text-sm truncate text-[#f9f5ed]">Staf Lab - John Doe</h4>
                <p class="text-xs text-[#c9ccc3] flex items-center gap-1.5 mt-0.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                    Aktif (Demo Mode)
                </p>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-grow p-4 space-y-2 mt-4">
            <button onclick="switchTab('dashboard')" id="btn-dashboard" class="tab-btn w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                </svg>
                Dashboard Overview
            </button>

            <button onclick="switchTab('bhp')" id="btn-bhp" class="tab-btn w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
                Kelola Stok BHP
                <span id="badge-bhp-low" class="ml-auto bg-amber-500/20 text-amber-300 text-[10px] px-2 py-0.5 rounded-full font-bold">2 Menipis</span>
            </button>

            <button onclick="switchTab('maintenance')" id="btn-maintenance" class="tab-btn w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                Log Maintenance
                <span id="badge-maintenance-pending" class="ml-auto bg-rose-500/20 text-rose-300 text-[10px] px-2 py-0.5 rounded-full font-bold">1 Proses</span>
            </button>

            <button onclick="switchTab('inventaris')" id="btn-inventaris" class="tab-btn w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
                Kondisi Inventaris
            </button>
        </nav>

        <!-- Sidebar Footer / Back to main site -->
        <div class="p-4 border-t border-[#6196aa]/20">
            <a href="/" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-[#c9ccc3]/20 hover:bg-[#c9ccc3]/10 text-xs font-semibold text-[#c9ccc3] hover:text-[#f9f5ed] transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Landing
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h2 id="page-title" class="text-xl font-bold text-[#20394a]">Dashboard Overview</h2>
                <p id="page-subtitle" class="text-xs text-gray-500">Ringkasan aktivitas dan status operasional laboratorium saat ini</p>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Current Time Indicator -->
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date">Senin, 25 Mei 2026</span>
                    <span class="text-[10px] text-gray-400" id="current-time">15:10:00 WIB</span>
                </div>
                <!-- Profile Indicator -->
                <div class="h-10 w-10 rounded-xl bg-[#20394a]/5 border border-[#20394a]/10 flex items-center justify-center text-[#20394a] relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <!-- Notification dot -->
                    <span class="absolute top-1 right-1 w-2.5 h-2.5 rounded-full bg-rose-500 border border-white"></span>
                </div>
            </div>
        </header>

        <!-- Dynamic Section Content Wrapper -->
        <div class="p-6 md:p-8 flex-grow overflow-y-auto max-w-7xl w-full mx-auto">
            
            <!-- SECTION 1: DASHBOARD OVERVIEW -->
            <section id="section-dashboard" class="tab-content space-y-8">
                <!-- Summary cards grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card 1: Total BHP -->
                    <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                        <div class="p-3 bg-emerald-500/10 text-emerald-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total BHP</span>
                            <span id="stat-total-bhp" class="text-2xl font-bold text-[#20394a]">12 Jenis</span>
                        </div>
                    </div>

                    <!-- Card 2: BHP Alert -->
                    <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                        <div class="p-3 bg-amber-500/10 text-amber-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Stok Menipis</span>
                            <span id="stat-low-bhp" class="text-2xl font-bold text-amber-500">2 Produk</span>
                        </div>
                    </div>

                    <!-- Card 3: Pending Maintenance -->
                    <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                        <div class="p-3 bg-rose-500/10 text-rose-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Maintenance Proses</span>
                            <span id="stat-pending-maintenance" class="text-2xl font-bold text-rose-500">1 Alat</span>
                        </div>
                    </div>

                    <!-- Card 4: Total Aset -->
                    <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                        <div class="p-3 bg-indigo-500/10 text-indigo-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Alat Inventaris</span>
                            <span id="stat-total-inventaris" class="text-2xl font-bold text-[#20394a]">8 Alat</span>
                        </div>
                    </div>
                </div>

                <!-- Main dashboard visualization & Quick Actions -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left: Stock warning & Quick info -->
                    <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm lg:col-span-2 space-y-6">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                            <div>
                                <h3 class="font-bold text-lg text-[#20394a]">Peringatan Stok & Konsumsi BHP</h3>
                                <p class="text-xs text-gray-400">Daftar bahan habis pakai yang memerlukan restok segera atau pengawasan</p>
                            </div>
                            <button onclick="switchTab('bhp')" class="text-[#6196aa] hover:text-[#20394a] text-xs font-bold transition-all duration-200 flex items-center gap-1">
                                Kelola BHP
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Mini list of warning BHP -->
                        <div class="space-y-4" id="dashboard-low-bhp-list">
                            <!-- Items will be loaded dynamically by script -->
                        </div>

                        <!-- Dynamic simple graph visualizing weekly consumables activity -->
                        <div class="pt-4 border-t border-gray-100">
                            <h4 class="text-sm font-bold text-[#20394a] mb-4">Grafik Mingguan Pengeluaran BHP</h4>
                            <div class="flex items-end justify-between gap-2 h-44 px-4 pt-4 border-b border-l border-gray-100 relative">
                                <!-- Grid Lines -->
                                <div class="absolute inset-x-0 top-1/4 border-t border-gray-100/50"></div>
                                <div class="absolute inset-x-0 top-2/4 border-t border-gray-100/50"></div>
                                <div class="absolute inset-x-0 top-3/4 border-t border-gray-100/50"></div>

                                <!-- Bars -->
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1 py-0.5">14 pcs</span>
                                    <div class="w-8 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 45%;"></div>
                                    <span class="text-xs text-gray-400">Sen</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1 py-0.5">25 pcs</span>
                                    <div class="w-8 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 75%;"></div>
                                    <span class="text-xs text-gray-400">Sel</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1 py-0.5">18 pcs</span>
                                    <div class="w-8 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 55%;"></div>
                                    <span class="text-xs text-gray-400">Rab</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1 py-0.5">32 pcs</span>
                                    <div class="w-8 bg-[#6196aa] rounded-t-md transition-all duration-300 animate-pulse" style="height: 95%;"></div>
                                    <span class="text-xs text-gray-400">Kam</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1 py-0.5">10 pcs</span>
                                    <div class="w-8 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 30%;"></div>
                                    <span class="text-xs text-gray-400">Jum</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1 py-0.5">5 pcs</span>
                                    <div class="w-8 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 15%;"></div>
                                    <span class="text-xs text-gray-400">Sab</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Quick actions and recent activity -->
                    <div class="space-y-6">
                        <!-- Quick actions card -->
                        <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm">
                            <h3 class="font-bold text-lg text-[#20394a] mb-4">Aksi Cepat Staf</h3>
                            <div class="grid grid-cols-1 gap-3">
                                <button onclick="switchTab('bhp')" class="flex items-center gap-3 p-3 bg-[#20394a]/5 border border-[#20394a]/10 hover:border-[#6196aa] rounded-xl hover:bg-[#6196aa]/10 transition-all duration-200 text-left font-medium text-sm text-[#20394a] group">
                                    <div class="p-2 bg-[#20394a] text-white rounded-lg group-hover:scale-105 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                    Catat BHP Terpakai
                                </button>
                                <button onclick="switchTab('maintenance')" class="flex items-center gap-3 p-3 bg-[#20394a]/5 border border-[#20394a]/10 hover:border-[#6196aa] rounded-xl hover:bg-[#6196aa]/10 transition-all duration-200 text-left font-medium text-sm text-[#20394a] group">
                                    <div class="p-2 bg-[#20394a] text-white rounded-lg group-hover:scale-105 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </div>
                                    Buat Log Maintenance Baru
                                </button>
                                <button onclick="switchTab('inventaris')" class="flex items-center gap-3 p-3 bg-[#20394a]/5 border border-[#20394a]/10 hover:border-[#6196aa] rounded-xl hover:bg-[#6196aa]/10 transition-all duration-200 text-left font-medium text-sm text-[#20394a] group">
                                    <div class="p-2 bg-[#20394a] text-white rounded-lg group-hover:scale-105 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    Update Kondisi Inventaris
                                </button>
                            </div>
                        </div>

                        <!-- Current status checklist/timeline -->
                        <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm">
                            <h3 class="font-bold text-lg text-[#20394a] mb-4">Aktivitas Terkini</h3>
                            <div class="space-y-4" id="recent-activity-list">
                                <div class="flex gap-3 relative pb-4 border-l border-[#c9ccc3]/40 pl-4 last:pb-0 last:border-0">
                                    <span class="absolute left-[-6px] top-1.5 w-3 h-3 rounded-full bg-emerald-500"></span>
                                    <div>
                                        <span class="text-[10px] text-gray-400 block">Baru saja</span>
                                        <h5 class="text-sm font-semibold text-[#20394a]">Update Kondisi Autoclave</h5>
                                        <p class="text-xs text-gray-500">Kondisi diupdate menjadi: <strong>Baik</strong></p>
                                    </div>
                                </div>
                                <div class="flex gap-3 relative pb-4 border-l border-[#c9ccc3]/40 pl-4 last:pb-0 last:border-0">
                                    <span class="absolute left-[-6px] top-1.5 w-3 h-3 rounded-full bg-blue-500"></span>
                                    <div>
                                        <span class="text-[10px] text-gray-400 block">30 menit yang lalu</span>
                                        <h5 class="text-sm font-semibold text-[#20394a]">Restok Bahan BHP</h5>
                                        <p class="text-xs text-gray-500">Alkohol 96% ditambah 10 botol</p>
                                    </div>
                                </div>
                                <div class="flex gap-3 relative pb-4 border-l border-[#c9ccc3]/40 pl-4 last:pb-0 last:border-0">
                                    <span class="absolute left-[-6px] top-1.5 w-3 h-3 rounded-full bg-amber-500"></span>
                                    <div>
                                        <span class="text-[10px] text-gray-400 block">2 jam yang lalu</span>
                                        <h5 class="text-sm font-semibold text-[#20394a]">Pemeliharaan Alat Dijadwalkan</h5>
                                        <p class="text-xs text-gray-500">Kalibrasi Centrifuge - Teknisi: Budi Santoso</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 2: KELOLA STOK BHP -->
            <section id="section-bhp" class="tab-content hidden space-y-6">
                <!-- Search and Restock action header -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="relative w-full md:w-96">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" id="search-bhp" onkeyup="filterBhpTable()" class="pl-10 pr-4 py-2.5 w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all" placeholder="Cari BHP berdasarkan nama...">
                    </div>
                    
                    <div class="flex gap-3 w-full md:w-auto">
                        <button onclick="openRestockModal()" class="flex-grow md:flex-grow-0 px-5 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold shadow-md transition-all duration-200 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Restok / Tambah BHP
                        </button>
                    </div>
                </div>

                <!-- BHP Table Card -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#20394a]/5 text-[#20394a] border-b border-[#c9ccc3]/30 text-xs font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4">Nama Bahan</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Lokasi Rak</th>
                                    <th class="px-6 py-4">Jumlah Stok / Status</th>
                                    <th class="px-6 py-4 text-center">Batas Minimum</th>
                                    <th class="px-6 py-4 text-right">Aksi Cepat</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm" id="bhp-table-body">
                                <!-- BHP items will be loaded here via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- SECTION 3: LOG MAINTENANCE -->
            <section id="section-maintenance" class="tab-content hidden grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left: Form to create new maintenance log -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm h-fit space-y-6">
                    <div>
                        <h3 class="font-bold text-lg text-[#20394a]">Catat Log Pemeliharaan</h3>
                        <p class="text-xs text-gray-500">Mulai pemeliharaan baru atau catat aktivitas yang sudah selesai untuk alat laboratorium</p>
                    </div>

                    <form id="maintenance-form" onsubmit="handleCreateLog(event)" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Pilih Alat Inventaris</label>
                            <select id="maint-asset" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                                <option value="" disabled selected>-- Pilih Alat --</option>
                                <option value="Autoclave Model A1">Autoclave Model A1</option>
                                <option value="Mikroskop Binokuler Olympus">Mikroskop Binokuler Olympus</option>
                                <option value="Sentrifugasi Heraeus">Sentrifugasi Heraeus</option>
                                <option value="Spektrofotometer UV-Vis">Spektrofotometer UV-Vis</option>
                                <option value="Inkubator Memmert">Inkubator Memmert</option>
                                <option value="Laminar Air Flow (LAF)">Laminar Air Flow (LAF)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Jenis Pemeliharaan</label>
                            <select id="maint-type" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                                <option value="Kalibrasi Rutin">Kalibrasi Rutin</option>
                                <option value="Perbaikan Kerusakan">Perbaikan Kerusakan</option>
                                <option value="Pembersihan & Sanitasi">Pembersihan & Sanitasi</option>
                                <option value="Pengecekan Komponen">Pengecekan Komponen</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Petugas / Teknisi</label>
                            <input type="text" id="maint-technician" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Nama teknisi/petugas...">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Tanggal Mulai</label>
                                <input type="date" id="maint-date" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Status Awal</label>
                                <select id="maint-status" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                                    <option value="Proses">Dalam Proses</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Terjadwal">Terjadwal</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Keterangan Aktivitas</label>
                            <textarea id="maint-notes" rows="3" class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Tulis catatan masalah atau penyesuaian yang dilakukan..."></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200 shadow-md">
                            Simpan Log Pemeliharaan
                        </button>
                    </form>
                </div>

                <!-- Right: Table of maintenance logs history -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm lg:col-span-2 space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                        <div>
                            <h3 class="font-bold text-lg text-[#20394a]">Riwayat Maintenance Terkini</h3>
                            <p class="text-xs text-gray-500">Menampilkan seluruh riwayat kalibrasi dan perbaikan mesin laboratorium</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm border-collapse">
                            <thead>
                                <tr class="bg-[#20394a]/5 text-[#20394a] border-b border-[#c9ccc3]/30 text-xs font-bold uppercase tracking-wider">
                                    <th class="px-4 py-3">Nama Alat</th>
                                    <th class="px-4 py-3">Tipe</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3">Petugas</th>
                                    <th class="px-4 py-3 text-center">Status</th>
                                    <th class="px-4 py-3 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100" id="maintenance-table-body">
                                <!-- Table entries loaded from JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- SECTION 4: KONDISI INVENTARIS -->
            <section id="section-inventaris" class="tab-content hidden space-y-6">
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                    <div>
                        <h3 class="font-bold text-lg text-[#20394a]">Kelola Kondisi Barang Inventaris</h3>
                        <p class="text-xs text-gray-500">Perbarui kondisi fisik alat laboratorium untuk menentukan apakah alat dapat digunakan, rusak, atau perlu kalibrasi</p>
                    </div>
                </div>

                <!-- Grid of assets -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="assets-grid-container">
                    <!-- Cards will be populated by JS -->
                </div>
            </section>

        </div>
    </main>

    <!-- MODAL 1: RESTOK BHP -->
    <div id="modal-restock" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeRestockModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 class="text-lg font-bold text-[#20394a] mb-4">Form Tambah Stok BHP</h3>
            
            <form onsubmit="handleRestockSubmit(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Pilih Bahan Habis Pakai</label>
                    <select id="restock-item-select" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                        <!-- Options filled via JS -->
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Jumlah Ditambahkan</label>
                    <input type="number" id="restock-amount" min="1" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Misal: 10">
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeRestockModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200">
                        Simpan Stok
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL 2: UPDATE KONDISI INVENTARIS -->
    <div id="modal-condition" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeConditionModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 class="text-lg font-bold text-[#20394a] mb-2" id="cond-modal-title">Update Kondisi Alat</h3>
            <p class="text-xs text-gray-400 mb-4" id="cond-modal-asset-name">Nama Alat</p>
            
            <form onsubmit="handleConditionSubmit(event)" class="space-y-4">
                <input type="hidden" id="cond-asset-index">

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Pilih Kondisi Baru</label>
                    <div class="grid grid-cols-3 gap-3">
                        <label class="border-2 border-emerald-500/20 hover:border-emerald-500 bg-emerald-50/20 text-emerald-800 rounded-xl p-3 text-center cursor-pointer block relative transition-all">
                            <input type="radio" name="cond-status" value="Baik" checked class="sr-only">
                            <span class="text-xs font-bold block">Baik</span>
                            <span class="text-[9px] text-gray-400">Siap Pakai</span>
                        </label>
                        
                        <label class="border-2 border-amber-500/20 hover:border-amber-500 bg-amber-50/20 text-amber-800 rounded-xl p-3 text-center cursor-pointer block relative transition-all">
                            <input type="radio" name="cond-status" value="Rusak Ringan" class="sr-only">
                            <span class="text-xs font-bold block">Rusak Ringan</span>
                            <span class="text-[9px] text-gray-400">Butuh Servis</span>
                        </label>

                        <label class="border-2 border-rose-500/20 hover:border-rose-500 bg-rose-50/20 text-rose-800 rounded-xl p-3 text-center cursor-pointer block relative transition-all">
                            <input type="radio" name="cond-status" value="Rusak Berat" class="sr-only">
                            <span class="text-xs font-bold block">Rusak Berat</span>
                            <span class="text-[9px] text-gray-400">Mati Total</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Laporan Kejadian / Catatan Kerusakan</label>
                    <textarea id="cond-notes" rows="3" class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Uraikan detail kondisi atau penyebab kerusakan..."></textarea>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeConditionModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200">
                        Simpan Kondisi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SCRIPTS FOR INTERACTIVITY -->
    <script>
        // Mock State Data
        let bhpData = [
            { id: 1, name: 'Alkohol 96% (1 Liter)', category: 'Cairan Kimia', rack: 'Rak A-1', stock: 2, minStock: 5, unit: 'Botol' },
            { id: 2, name: 'Sarung Tangan Nitril (M)', category: 'APD', rack: 'Rak B-3', stock: 1, minStock: 6, unit: 'Box' },
            { id: 3, name: 'Gelas Kimia Pyrex 250ml', category: 'Glassware', rack: 'Rak D-2', stock: 15, minStock: 5, unit: 'Pcs' },
            { id: 4, name: 'Kertas Saring Whatman 41', category: 'Penyaring', rack: 'Laci C-1', stock: 8, minStock: 2, unit: 'Pack' },
            { id: 5, name: 'Masker Medis 3-ply', category: 'APD', rack: 'Rak B-2', stock: 24, minStock: 10, unit: 'Box' },
            { id: 6, name: 'Pipet Mikro 100-1000uL', category: 'Pipette', rack: 'Rak F-1', stock: 4, minStock: 2, unit: 'Pcs' },
            { id: 7, name: 'Aseton Pro Analisis', category: 'Cairan Kimia', rack: 'Lemari Asam', stock: 6, minStock: 2, unit: 'Botol' },
            { id: 8, name: 'Kuvet Polistirena 4.5ml', category: 'Spektrometri', rack: 'Rak E-3', stock: 200, minStock: 50, unit: 'Pcs' },
        ];

        let holidays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        let months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        let maintenanceLogs = [
            { id: 1, assetName: 'Autoclave Model A1', type: 'Kalibrasi Rutin', date: '2026-05-24', technician: 'Budi Santoso', status: 'Selesai', notes: 'Selesai kalibrasi suhu dan tekanan untuk sterilisasi.' },
            { id: 2, assetName: 'Spektrofotometer UV-Vis', type: 'Perbaikan Kerusakan', date: '2026-05-25', technician: 'Ali Wijaya', status: 'Proses', notes: 'Perbaikan lampu deuterium yang redup.' },
            { id: 3, assetName: 'Mikroskop Binokuler Olympus', type: 'Pembersihan & Sanitasi', date: '2026-05-20', technician: 'Staf Lab - John', status: 'Selesai', notes: 'Pembersihan lensa okuler dan lensa objektif dari jamur.' },
            { id: 4, assetName: 'Sentrifugasi Heraeus', type: 'Pengecekan Komponen', date: '2026-05-28', technician: 'Eko Wahyudi', status: 'Terjadwal', notes: 'Pemeriksaan rotor dan motor putaran tinggi.' }
        ];

        let assetsData = [
            { id: 1, name: 'Autoclave Model A1', code: 'INV-LAB-ATC01', image: 'https://images.unsplash.com/photo-1576086213369-97a306d36557?q=80&w=400&auto=format&fit=crop', status: 'Baik', lastCheck: '25 Mei 2026', checkedBy: 'Staf Lab - John', description: 'Mesin sterilisasi uap bertekanan tinggi.' },
            { id: 2, name: 'Mikroskop Binokuler Olympus', code: 'INV-LAB-MIC03', image: 'https://images.unsplash.com/photo-1582719471384-894fbb16e074?q=80&w=400&auto=format&fit=crop', status: 'Baik', lastCheck: '24 Mei 2026', checkedBy: 'Staf Lab - John', description: 'Mikroskop binokuler dengan pembesaran s.d 1000x.' },
            { id: 3, name: 'Sentrifugasi Heraeus', code: 'INV-LAB-CEN02', image: 'https://images.unsplash.com/photo-1614853038014-87bc9c453e08?q=80&w=400&auto=format&fit=crop', status: 'Rusak Ringan', lastCheck: '22 Mei 2026', checkedBy: 'Ahmad S.', description: 'Mesin pemutar cairan berkecepatan tinggi.' },
            { id: 4, name: 'Spektrofotometer UV-Vis', code: 'INV-LAB-SPF01', image: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=400&auto=format&fit=crop', status: 'Rusak Berat', lastCheck: '25 Mei 2026', checkedBy: 'Ali Wijaya', description: 'Alat ukur absorbsi cahaya spektrum UV dan tampak.' },
            { id: 5, name: 'Inkubator Memmert', code: 'INV-LAB-INC01', image: 'https://images.unsplash.com/photo-1579154204601-01588f351167?q=80&w=400&auto=format&fit=crop', status: 'Baik', lastCheck: '18 Mei 2026', checkedBy: 'Staf Lab - John', description: 'Lemari pemanas terkontrol untuk biakan bakteri.' },
            { id: 6, name: 'Laminar Air Flow (LAF)', code: 'INV-LAB-LAF02', image: 'https://images.unsplash.com/photo-1581093588401-f3c22d75ba05?q=80&w=400&auto=format&fit=crop', status: 'Baik', lastCheck: '20 Mei 2026', checkedBy: 'Ahmad S.', description: 'Meja kerja steril steril aliran udara laminar.' }
        ];

        // Format dates and time
        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent = `${holidays[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID') + ' WIB';
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // Switch Active Tab
        function switchTab(tabName) {
            // Update sidebar buttons styling
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => {
                btn.classList.remove('bg-[#6196aa]', 'text-white', 'shadow-lg');
                btn.classList.add('text-[#c9ccc3]', 'hover:bg-[#6196aa]/10', 'hover:text-white');
            });

            const activeBtn = document.getElementById(`btn-${tabName}`);
            activeBtn.classList.remove('text-[#c9ccc3]', 'hover:bg-[#6196aa]/10', 'hover:text-white');
            activeBtn.classList.add('bg-[#6196aa]', 'text-white', 'shadow-lg');

            // Toggle sections
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => content.classList.add('hidden'));

            const activeContent = document.getElementById(`section-${tabName}`);
            activeContent.classList.remove('hidden');

            // Update page headers
            const pageTitle = document.getElementById('page-title');
            const pageSubtitle = document.getElementById('page-subtitle');
            
            if (tabName === 'dashboard') {
                pageTitle.textContent = 'Dashboard Overview';
                pageSubtitle.textContent = 'Ringkasan aktivitas dan status operasional laboratorium saat ini';
                renderDashboardSummary();
            } else if (tabName === 'bhp') {
                pageTitle.textContent = 'Manajemen Stok BHP';
                pageSubtitle.textContent = 'Pantau persediaan bahan habis pakai, kurangi stok terpakai, dan ajukan restok';
                renderBhpTable();
            } else if (tabName === 'maintenance') {
                pageTitle.textContent = 'Log Maintenance Alat';
                pageSubtitle.textContent = 'Catat rutinitas kalibrasi, pelihara mesin, dan lacak riwayat servis mesin';
                renderMaintenanceTable();
            } else if (tabName === 'inventaris') {
                pageTitle.textContent = 'Kondisi Barang Inventaris';
                pageSubtitle.textContent = 'Perbarui status kelayakan pakai alat berat laboratorium untuk menjaga keakuratan pengujian';
                renderAssetsGrid();
            }
        }

        // Show Toast Notification
        function showToast(message) {
            const toast = document.getElementById('toast');
            const msgEl = document.getElementById('toast-message');
            msgEl.textContent = message;
            
            toast.classList.remove('translate-y-[-100px]', 'opacity-0');
            
            setTimeout(() => {
                toast.classList.add('translate-y-[-100px]', 'opacity-0');
            }, 3500);
        }

        // ------------------ TAB 1: DASHBOARD FUNCTIONS ------------------
        function renderDashboardSummary() {
            // Stats
            document.getElementById('stat-total-bhp').textContent = `${bhpData.length} Jenis`;
            
            const lowBhpCount = bhpData.filter(item => item.stock <= item.minStock).length;
            document.getElementById('stat-low-bhp').textContent = `${lowBhpCount} Produk`;
            document.getElementById('badge-bhp-low').textContent = `${lowBhpCount} Menipis`;
            
            const pendingMaint = maintenanceLogs.filter(log => log.status === 'Proses').length;
            document.getElementById('stat-pending-maintenance').textContent = `${pendingMaint} Alat`;
            document.getElementById('badge-maintenance-pending').textContent = `${pendingMaint} Proses`;
            
            document.getElementById('stat-total-inventaris').textContent = `${assetsData.length} Alat`;

            // Dashboard warning list
            const dashboardLowBhpList = document.getElementById('dashboard-low-bhp-list');
            dashboardLowBhpList.innerHTML = '';
            
            const lowItems = bhpData.filter(item => item.stock <= item.minStock).slice(0, 3);
            if (lowItems.length === 0) {
                dashboardLowBhpList.innerHTML = `
                    <div class="text-center py-6 text-gray-400 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Semua stok bahan habis pakai aman.
                    </div>
                `;
            } else {
                lowItems.forEach(item => {
                    const isZero = item.stock === 0;
                    const bgClass = isZero ? 'bg-rose-50/50 border-rose-200/50' : 'bg-amber-50/50 border-amber-200/50';
                    const dotClass = isZero ? 'bg-rose-500' : 'bg-amber-500';
                    
                    dashboardLowBhpList.innerHTML += `
                        <div class="flex items-center justify-between p-4 ${bgClass} border rounded-xl">
                            <div class="flex items-center gap-3">
                                <div class="w-2.5 h-2.5 rounded-full ${dotClass}"></div>
                                <div>
                                    <h4 class="font-semibold text-sm text-[#20394a]">${item.name}</h4>
                                    <p class="text-xs text-gray-400">${item.rack} | Sisa: <strong class="${isZero ? 'text-rose-600' : 'text-amber-600'}">${item.stock} ${item.unit}</strong> (Min: ${item.minStock})</p>
                                </div>
                            </div>
                            <button onclick="openRestockModal('${item.name}')" class="px-3 py-1.5 bg-[#20394a] text-[#f9f5ed] rounded-lg text-xs font-bold hover:bg-[#6196aa] transition-all duration-200">
                                Restok
                            </button>
                        </div>
                    `;
                });
            }
        }

        // ------------------ TAB 2: BHP FUNCTIONS ------------------
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
                            <div class="text-xs text-gray-400">ID: BHP-0${item.id}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">${item.category}</td>
                        <td class="px-6 py-4 text-gray-600 font-medium">${item.rack}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-[#20394a]">${item.stock} ${item.unit}</span>
                                ${badge}
                            </div>
                            <div class="w-28 bg-gray-100 h-1.5 rounded-full mt-2 overflow-hidden">
                                <div class="h-full ${progressColor} rounded-full" style="width: ${pct}%"></div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center text-gray-500 font-medium">${item.minStock} ${item.unit}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick="consumeBhp(${item.id})" class="px-2.5 py-1.5 border border-rose-300/60 text-rose-600 hover:bg-rose-50 rounded-lg text-xs font-bold transition-all duration-200">
                                Pakai 1
                            </button>
                            <button onclick="openRestockModal('${item.name}')" class="px-2.5 py-1.5 bg-[#20394a]/10 text-[#20394a] hover:bg-[#20394a] hover:text-white rounded-lg text-xs font-bold transition-all duration-200">
                                Tambah
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        function consumeBhp(id) {
            const item = bhpData.find(b => b.id === id);
            if (item) {
                if (item.stock > 0) {
                    item.stock -= 1;
                    showToast(`BHP ${item.name} digunakan 1 ${item.unit}.`);
                    
                    // Add to activity logs
                    addActivityLog('BHP Terpakai', `${item.name} dikurangi 1 ${item.unit}. Sisa: ${item.stock}`, 'bg-rose-500');
                    
                    renderBhpTable();
                    renderDashboardSummary();
                } else {
                    alert(`Stok ${item.name} sudah habis! Silakan lakukan restok.`);
                }
            }
        }

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

        // ------------------ TAB 3: MAINTENANCE FUNCTIONS ------------------
        function renderMaintenanceTable() {
            const tableBody = document.getElementById('maintenance-table-body');
            tableBody.innerHTML = '';

            // Sort logs by date descending
            const sortedLogs = [...maintenanceLogs].sort((a, b) => new Date(b.date) - new Date(a.date));

            sortedLogs.forEach(log => {
                let badgeClass = 'bg-emerald-100 text-emerald-800';
                if (log.status === 'Proses') {
                    badgeClass = 'bg-amber-100 text-amber-800 animate-pulse';
                } else if (log.status === 'Terjadwal') {
                    badgeClass = 'bg-blue-100 text-blue-800';
                }

                tableBody.innerHTML += `
                    <tr class="hover:bg-gray-50/50 transition-colors text-xs sm:text-sm">
                        <td class="px-4 py-3.5">
                            <div class="font-bold text-[#20394a]">${log.assetName}</div>
                            <div class="text-[10px] text-gray-400 mt-0.5 italic max-w-xs truncate">${log.notes}</div>
                        </td>
                        <td class="px-4 py-3.5 text-gray-600 font-medium">${log.type}</td>
                        <td class="px-4 py-3.5 text-gray-500">${formatDate(log.date)}</td>
                        <td class="px-4 py-3.5 text-gray-600">${log.technician}</td>
                        <td class="px-4 py-3.5 text-center">
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold ${badgeClass}">
                                ${log.status}
                            </span>
                        </td>
                        <td class="px-4 py-3.5 text-right">
                            ${log.status !== 'Selesai' ? `
                                <button onclick="completeMaintenance(${log.id})" class="px-2 py-1 bg-emerald-500 hover:bg-emerald-600 text-white rounded text-xs font-bold transition-all">
                                    Selesai
                                </button>
                            ` : `
                                <span class="text-xs text-gray-400 font-medium">Clear</span>
                            `}
                        </td>
                    </tr>
                `;
            });
        }

        function handleCreateLog(e) {
            e.preventDefault();
            const assetName = document.getElementById('maint-asset').value;
            const type = document.getElementById('maint-type').value;
            const technician = document.getElementById('maint-technician').value;
            const date = document.getElementById('maint-date').value;
            const status = document.getElementById('maint-status').value;
            const notes = document.getElementById('maint-notes').value || 'Tidak ada catatan tambahan.';

            const newLog = {
                id: maintenanceLogs.length + 1,
                assetName,
                type,
                date,
                technician,
                status,
                notes
            };

            maintenanceLogs.push(newLog);
            showToast(`Log pemeliharaan untuk ${assetName} berhasil disimpan.`);
            
            // Add activity log
            addActivityLog('Maintenance Log', `${type} - ${assetName} didaftarkan status: ${status}`, 'bg-blue-500');

            // Reset form
            document.getElementById('maintenance-form').reset();

            // Re-render
            renderMaintenanceTable();
            renderDashboardSummary();
        }

        function completeMaintenance(id) {
            const log = maintenanceLogs.find(l => l.id === id);
            if (log) {
                log.status = 'Selesai';
                log.notes += ' (Diubah ke Selesai oleh Staf Lab)';
                showToast(`Status pemeliharaan ${log.assetName} ditandai selesai.`);
                
                // Add activity log
                addActivityLog('Maintenance Selesai', `Kalibrasi/servis ${log.assetName} selesai.`, 'bg-emerald-500');

                // Update asset condition to Good if it was bad
                const asset = assetsData.find(a => a.name === log.assetName);
                if (asset && asset.status !== 'Baik') {
                    asset.status = 'Baik';
                    asset.lastCheck = new Date().toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'});
                    asset.checkedBy = 'Staf Lab - John';
                }

                renderMaintenanceTable();
                renderDashboardSummary();
            }
        }

        // ------------------ TAB 4: INVENTARIS FUNCTIONS ------------------
        function renderAssetsGrid() {
            const container = document.getElementById('assets-grid-container');
            container.innerHTML = '';

            assetsData.forEach((asset, index) => {
                let badgeColor = 'bg-emerald-100 text-emerald-800 border-emerald-300/40';
                if (asset.status === 'Rusak Ringan') {
                    badgeColor = 'bg-amber-100 text-amber-800 border-amber-300/40';
                } else if (asset.status === 'Rusak Berat') {
                    badgeColor = 'bg-rose-100 text-rose-800 border-rose-300/40';
                }

                container.innerHTML += `
                    <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition-all duration-300">
                        <div class="h-44 w-full relative overflow-hidden bg-gray-100">
                            <img src="${asset.image}" alt="${asset.name}" class="w-full h-full object-cover">
                            <!-- Overlay status badge -->
                            <span class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold border ${badgeColor} shadow-sm backdrop-blur-sm">
                                ${asset.status}
                            </span>
                        </div>
                        
                        <div class="p-5 flex-grow flex flex-col justify-between space-y-4">
                            <div>
                                <div class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">${asset.code}</div>
                                <h4 class="font-bold text-[#20394a] text-base mt-0.5">${asset.name}</h4>
                                <p class="text-xs text-gray-500 mt-1.5 line-clamp-2">${asset.description}</p>
                            </div>

                            <div class="pt-4 border-t border-gray-100 space-y-3">
                                <div class="flex justify-between items-center text-xs text-gray-400">
                                    <span>Pemeriksaan Terakhir:</span>
                                    <span class="font-semibold text-gray-600">${asset.lastCheck}</span>
                                </div>
                                <div class="flex justify-between items-center text-xs text-gray-400">
                                    <span>Pemeriksa:</span>
                                    <span class="font-semibold text-gray-600">${asset.checkedBy}</span>
                                </div>
                                
                                <button onclick="openConditionModal(${index})" class="w-full mt-2 py-2 bg-[#20394a]/5 border border-[#20394a]/10 hover:border-[#6196aa] hover:bg-[#6196aa]/10 text-[#20394a] font-semibold text-xs rounded-xl transition-all duration-200">
                                    Update Kondisi
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        // ------------------ RESTOCK MODAL FUNCTIONS ------------------
        function openRestockModal(selectedName = '') {
            const selectEl = document.getElementById('restock-item-select');
            selectEl.innerHTML = '';
            
            // Populate select
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

        function handleRestockSubmit(e) {
            e.preventDefault();
            const itemId = parseInt(document.getElementById('restock-item-select').value);
            const amount = parseInt(document.getElementById('restock-amount').value);

            const item = bhpData.find(b => b.id === itemId);
            if (item) {
                item.stock += amount;
                showToast(`Stok ${item.name} berhasil ditambah sebanyak ${amount} ${item.unit}.`);
                
                // Add activity log
                addActivityLog('BHP Restok', `${item.name} ditambahkan ${amount} ${item.unit}`, 'bg-emerald-500');

                closeRestockModal();
                
                // Re-render based on current section
                renderBhpTable();
                renderDashboardSummary();
            }
        }

        // ------------------ CONDITION MODAL FUNCTIONS ------------------
        function openConditionModal(index) {
            const asset = assetsData[index];
            document.getElementById('cond-asset-index').value = index;
            document.getElementById('cond-modal-title').textContent = `Update Kondisi`;
            document.getElementById('cond-modal-asset-name').textContent = `${asset.name} (${asset.code})`;
            document.getElementById('cond-notes').value = '';

            // Set radio value
            const radios = document.getElementsByName('cond-status');
            for(let r of radios) {
                if(r.value === asset.status) {
                    r.checked = true;
                }
            }

            const modal = document.getElementById('modal-condition');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        function closeConditionModal() {
            const modal = document.getElementById('modal-condition');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 150);
        }

        function handleConditionSubmit(e) {
            e.preventDefault();
            const index = parseInt(document.getElementById('cond-asset-index').value);
            const notes = document.getElementById('cond-notes').value || 'Kondisi diperbarui secara berkala.';
            
            let status = 'Baik';
            const radios = document.getElementsByName('cond-status');
            for(let r of radios) {
                if(r.checked) {
                    status = r.value;
                    break;
                }
            }

            const asset = assetsData[index];
            if (asset) {
                asset.status = status;
                asset.lastCheck = new Date().toLocaleDateString('id-ID', {day: 'numeric', month: 'short', year: 'numeric'});
                asset.checkedBy = 'Staf Lab - John';
                
                // If status is damaged, automatically create a scheduled/in-progress maintenance log
                if (status !== 'Baik') {
                    const existsPending = maintenanceLogs.some(l => l.assetName === asset.name && l.status !== 'Selesai');
                    if (!existsPending) {
                        maintenanceLogs.push({
                            id: maintenanceLogs.length + 1,
                            assetName: asset.name,
                            type: status === 'Rusak Berat' ? 'Perbaikan Kerusakan' : 'Pengecekan Komponen',
                            date: new Date().toISOString().split('T')[0],
                            technician: 'Teknisi Vendor',
                            status: 'Proses',
                            notes: `Dibuat otomatis: ${notes}`
                        });
                    }
                }

                showToast(`Kondisi ${asset.name} diperbarui menjadi ${status}.`);
                
                // Add activity log
                let activityDot = 'bg-emerald-500';
                if (status === 'Rusak Ringan') activityDot = 'bg-amber-500';
                if (status === 'Rusak Berat') activityDot = 'bg-rose-500';
                addActivityLog('Kondisi Update', `${asset.name} berstatus ${status}`, activityDot);

                closeConditionModal();
                
                // Re-render
                renderAssetsGrid();
                renderDashboardSummary();
            }
        }

        // Helper to add activity log in dashboard list
        function addActivityLog(action, desc, dotClass = 'bg-[#6196aa]') {
            const list = document.getElementById('recent-activity-list');
            const newLog = `
                <div class="flex gap-3 relative pb-4 border-l border-[#c9ccc3]/40 pl-4 last:pb-0 last:border-0">
                    <span class="absolute left-[-6px] top-1.5 w-3 h-3 rounded-full ${dotClass}"></span>
                    <div>
                        <span class="text-[10px] text-gray-400 block">Baru saja</span>
                        <h5 class="text-sm font-semibold text-[#20394a]">${action}</h5>
                        <p class="text-xs text-gray-500">${desc}</p>
                    </div>
                </div>
            `;
            list.innerHTML = newLog + list.innerHTML;
        }

        // Helper to format date ISO -> Indonesian readable
        function formatDate(dateStr) {
            const listMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            const parts = dateStr.split('-');
            if (parts.length === 3) {
                return `${parseInt(parts[2])} ${listMonths[parseInt(parts[1]) - 1]} ${parts[0]}`;
            }
            return dateStr;
        }

        // Initialize view
        window.onload = function() {
            renderDashboardSummary();
            renderBhpTable();
            renderMaintenanceTable();
            renderAssetsGrid();
        };
    </script>
</body>
</html>
