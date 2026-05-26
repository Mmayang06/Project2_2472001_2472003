<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staf Lab Komputer Dashboard - Labventory</title>
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

        /* Low stock alert banner animation */
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .alert-slide-in {
            animation: slideDown 0.4s ease forwards;
        }

        /* Pulsing ring on bell icon */
        @keyframes ring {
            0%   { transform: rotate(0deg); }
            10%  { transform: rotate(12deg); }
            20%  { transform: rotate(-10deg); }
            30%  { transform: rotate(10deg); }
            40%  { transform: rotate(-8deg); }
            50%  { transform: rotate(0deg); }
            100% { transform: rotate(0deg); }
        }
        .bell-ring {
            animation: ring 2s ease-in-out infinite;
            transform-origin: top center;
        }

        /* Stock chip badge */
        .stock-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 2px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.03em;
        }
    </style>
</head>
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20">
        <!-- Brand Logo & App Name -->
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

        <!-- User profile section -->
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] flex items-center justify-center font-bold text-lg text-[#20394a] shadow-inner">
                SK
            </div>
            <div class="overflow-hidden">
                <h4 class="font-semibold text-sm truncate text-[#f9f5ed]">Staf Lab - Budi W.</h4>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-grow p-4 space-y-1 mt-2">
            <p class="text-[10px] font-bold text-[#6196aa]/60 uppercase tracking-widest px-4 py-2">Menu Utama</p>

            <a href="{{ url('/staf-lab/home') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg">
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
            <a href="{{ url('/staf-lab/maintenance') }}" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
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

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Dashboard Staff Lab</h2>
            </div>
            
            <div class="flex items-center gap-4">
                <!-- Current Time Indicator -->
                <div class="hidden sm:flex flex-col text-right">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date">Senin, 25 Mei 2026</span>
                    <span class="text-[10px] text-gray-400" id="current-time">15:10:00 WIB</span>
                </div>

                <!-- Bell Notification Button -->
                <div class="relative" id="bell-wrapper">
                    <button id="bell-btn" onclick="toggleAlertPanel()" class="relative h-10 w-10 rounded-xl bg-[#20394a]/5 border border-[#20394a]/10 flex items-center justify-center text-[#20394a] hover:bg-amber-50 hover:border-amber-300 hover:text-amber-600 transition-all duration-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 bell-ring" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <!-- Badge -->
                        <span id="alert-badge" class="absolute -top-1.5 -right-1.5 min-w-[18px] h-[18px] px-1 rounded-full bg-amber-500 border-2 border-white text-white text-[9px] font-bold flex items-center justify-center hidden">0</span>
                    </button>

                    <!-- Dropdown Alert Panel -->
                    <div id="alert-panel" class="hidden absolute right-0 top-12 w-80 bg-white rounded-2xl shadow-2xl border border-amber-100 z-50 overflow-hidden">
                        <!-- Panel Header -->
                        <div class="bg-amber-500 px-4 py-3 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span class="text-white text-sm font-bold">Peringatan Stok BHP</span>
                            </div>
                            <span id="panel-badge-count" class="bg-white text-amber-600 text-[10px] font-bold px-2 py-0.5 rounded-full">0 item</span>
                        </div>
                        <!-- Panel Body -->
                        <div id="alert-panel-list" class="divide-y divide-amber-50 max-h-72 overflow-y-auto"></div>
                        <!-- Panel Footer -->
                        <div class="px-4 py-3 bg-amber-50 border-t border-amber-100">
                            <a href="{{ url('/staf-lab/bhp') }}" class="flex items-center justify-center gap-1.5 text-xs font-bold text-amber-700 hover:text-amber-900 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                                Kelola Stok BHP
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dynamic Section Content Wrapper -->
        <div class="p-6 md:p-8 flex-grow max-w-7xl w-full mx-auto space-y-8 pb-8">
            
            <!-- Dynamic Alert Banner: rendered by JS if there are low-stock items -->
            <div id="stock-alert-banner" class="hidden mb-8"></div>
            
            <section class="space-y-8">
                <!-- Summary cards grid -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Card 1: Total BHP -->
                    <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                        <div class="p-3 bg-emerald-500/10 text-emerald-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Jenis BHP</span>
                            <span class="text-2xl font-bold text-[#20394a]">8 Jenis</span>
                        </div>
                    </div>

                    <!-- Card 2: Pending Maintenance -->
                    <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                        <div class="p-3 bg-rose-500/10 text-rose-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Maintenance Proses</span>
                            <span class="text-2xl font-bold text-rose-500">1 Aset</span>
                        </div>
                    </div>

                    <!-- Card 3: Total Aset -->
                    <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm hover:shadow-md transition-all duration-300 flex items-center gap-4 group">
                        <div class="p-3 bg-indigo-500/10 text-indigo-600 rounded-xl group-hover:scale-105 transition-transform duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Aset Komputer</span>
                            <span class="text-2xl font-bold text-[#20394a]">6 Unit</span>
                        </div>
                    </div>
                </div>

                <!-- Main dashboard layout -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column: Weekly Activity Chart -->
                    <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm lg:col-span-2 space-y-6 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-lg text-[#20394a] mb-2">Grafik Mingguan Pemakaian BHP</h3>
                            <p class="text-xs text-gray-400">Visualisasi jumlah barang habis pakai lab komputer (kabel, RJ45, dll.) yang dikeluarkan per hari</p>
                        </div>
                        
                        <div class="pt-4">
                            <div class="flex items-end justify-between gap-3 h-56 px-4 pt-4 border-b border-l border-gray-100 relative">
                                <!-- Grid Lines -->
                                <div class="absolute inset-x-0 top-1/4 border-t border-gray-100/50"></div>
                                <div class="absolute inset-x-0 top-2/4 border-t border-gray-100/50"></div>
                                <div class="absolute inset-x-0 top-3/4 border-t border-gray-100/50"></div>

                                <!-- Bars -->
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1.5 py-0.5">8 unit</span>
                                    <div class="w-10 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 35%;"></div>
                                    <span class="text-xs text-gray-400">Sen</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1.5 py-0.5">15 unit</span>
                                    <div class="w-10 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 60%;"></div>
                                    <span class="text-xs text-gray-400">Sel</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1.5 py-0.5">22 unit</span>
                                    <div class="w-10 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 85%;"></div>
                                    <span class="text-xs text-gray-400">Rab</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1.5 py-0.5">12 unit</span>
                                    <div class="w-10 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 48%;"></div>
                                    <span class="text-xs text-gray-400">Kam</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1.5 py-0.5">18 unit</span>
                                    <div class="w-10 bg-[#6196aa] rounded-t-md transition-all duration-300 animate-pulse" style="height: 72%;"></div>
                                    <span class="text-xs text-gray-400">Jum</span>
                                </div>
                                <div class="flex-grow flex flex-col items-center gap-2 group">
                                    <span class="text-[10px] text-gray-400 opacity-0 group-hover:opacity-100 transition-opacity bg-gray-800 text-white rounded px-1.5 py-0.5">3 unit</span>
                                    <div class="w-10 bg-[#20394a] hover:bg-[#6196aa] rounded-t-md transition-all duration-300" style="height: 12%;"></div>
                                    <span class="text-xs text-gray-400">Sab</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Recent Activity -->
                    <div class="space-y-6 flex flex-col justify-between">
                        <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm h-full flex flex-col justify-between">
                            <div>
                                <h3 class="font-bold text-lg text-[#20394a] mb-4">Aktivitas Terkini</h3>
                                <div class="space-y-6">
                                    <div class="flex gap-3 relative pb-4 border-l border-[#c9ccc3]/40 pl-4 last:pb-0 last:border-0">
                                        <span class="absolute left-[-6px] top-1.5 w-3 h-3 rounded-full bg-emerald-500"></span>
                                        <div>
                                            <span class="text-[10px] text-gray-400 block">Baru saja</span>
                                            <h5 class="text-sm font-semibold text-[#20394a]">Update Kondisi PC-02</h5>
                                            <p class="text-xs text-gray-500">Status diupdate menjadi: <strong>Baik</strong></p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3 relative pb-4 border-l border-[#c9ccc3]/40 pl-4 last:pb-0 last:border-0">
                                        <span class="absolute left-[-6px] top-1.5 w-3 h-3 rounded-full bg-blue-500"></span>
                                        <div>
                                            <span class="text-[10px] text-gray-400 block">30 menit yang lalu</span>
                                            <h5 class="text-sm font-semibold text-[#20394a]">Distribusi Konektor RJ45</h5>
                                            <p class="text-xs text-gray-500">Stok RJ45 terpakai sebanyak 10 pcs untuk perbaikan jaringan</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-3 relative pb-4 border-l border-[#c9ccc3]/40 pl-4 last:pb-0 last:border-0">
                                        <span class="absolute left-[-6px] top-1.5 w-3 h-3 rounded-full bg-amber-500"></span>
                                        <div>
                                            <span class="text-[10px] text-gray-400 block">2 jam yang lalu</span>
                                            <h5 class="text-sm font-semibold text-[#20394a]">Jadwal Maintenance Switch Cisco</h5>
                                            <p class="text-xs text-gray-500">Pembaruan firmware switch manageable - Teknisi: Budi Santoso</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 pt-4 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                                <span>Total Log Terpantau:</span>
                                <span class="font-bold text-[#20394a]">3 Aksi Hari Ini</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- SCRIPTS -->
    <script>
        // ======================================================
        // Date & Time
        // ======================================================
        const holidays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months   = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent =
                `${holidays[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            document.getElementById('current-time').textContent =
                now.toLocaleTimeString('id-ID') + ' WIB';
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        // ======================================================
        // BHP Mock Data (same as bhp.blade.php)
        // ======================================================
        const bhpData = [
            { id: 1, name: 'Mouse Optik USB Logitech',   category: 'Aksesori PC',       rack: 'Rak A-1',  stock: 12,  minStock: 5,  unit: 'Pcs'   },
            { id: 2, name: 'Keyboard USB Standar',        category: 'Aksesori PC',       rack: 'Rak A-2',  stock: 8,   minStock: 6,  unit: 'Pcs'   },
            { id: 3, name: 'Konektor RJ-45 Cat6',         category: 'Kabel & Jaringan',  rack: 'Rak B-1',  stock: 75,  minStock: 25, unit: 'Pcs'   },
            { id: 4, name: 'Kabel LAN UTP Cat6',          category: 'Kabel & Jaringan',  rack: 'Rak B-2',  stock: 150, minStock: 50, unit: 'Meter' },
            { id: 5, name: 'Flashdisk Sandisk 32GB',      category: 'Penyimpanan',       rack: 'Laci C-1', stock: 6,   minStock: 3,  unit: 'Pcs'   },
            { id: 6, name: 'Thermal Paste Arctic MX-4',   category: 'Perawatan CPU',     rack: 'Laci C-2', stock: 4,   minStock: 2,  unit: 'Tube'  },
            { id: 7, name: 'Cable Ties 15cm',             category: 'Kabel & Jaringan',  rack: 'Rak B-3',  stock: 2,   minStock: 1,  unit: 'Pack'  },
            { id: 8, name: 'Tisu Pembersih Layar LCD',    category: 'Perawatan CPU',     rack: 'Rak D-1',  stock: 5,   minStock: 2,  unit: 'Pack'  },
        ];

        // ======================================================
        // Low-stock Detection & Alert Rendering
        // ======================================================
        function getLowStockItems() {
            return bhpData.filter(item => item.stock <= item.minStock);
        }

        function renderStockAlerts() {
            const lowItems = getLowStockItems();
            const badge    = document.getElementById('alert-badge');
            const panelList= document.getElementById('alert-panel-list');
            const countLbl = document.getElementById('panel-badge-count');
            const banner   = document.getElementById('stock-alert-banner');
            const bellBtn  = document.getElementById('bell-btn');

            if (lowItems.length === 0) {
                badge.classList.add('hidden');
                banner.classList.add('hidden');
                banner.innerHTML = '';
                panelList.innerHTML = `
                    <div class="px-4 py-6 text-center text-sm text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Semua stok BHP dalam kondisi aman
                    </div>`;
                return;
            }

            // --- Badge count ---
            badge.textContent = lowItems.length;
            badge.classList.remove('hidden');
            countLbl.textContent = `${lowItems.length} item`;

            // --- Dropdown panel list ---
            panelList.innerHTML = lowItems.map(item => {
                const isZero = item.stock === 0;
                const chipClass  = isZero
                    ? 'bg-rose-100 text-rose-700'
                    : 'bg-amber-100 text-amber-700';
                const chipLabel  = isZero ? 'Habis' : 'Menipis';
                const icon = isZero
                    ? `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>`
                    : `<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>`;

                return `
                    <div class="px-4 py-3 flex items-center gap-3 hover:bg-amber-50/60 transition-colors">
                        ${icon}
                        <div class="flex-grow min-w-0">
                            <p class="text-xs font-semibold text-[#20394a] truncate">${item.name}</p>
                            <p class="text-[10px] text-gray-400">${item.rack} &bull; Sisa: <strong class="text-[#20394a]">${item.stock} ${item.unit}</strong> / Min: ${item.minStock}</p>
                        </div>
                        <span class="stock-chip ${chipClass} flex-shrink-0">${chipLabel}</span>
                    </div>`;
            }).join('');

            // --- Top Banner ---
            const criticalNames = lowItems.slice(0, 2).map(i => `<strong>${i.name}</strong>`).join(', ');
            const more = lowItems.length > 2 ? ` dan ${lowItems.length - 2} lainnya` : '';
            banner.classList.remove('hidden');
            banner.innerHTML = `
                <div class="alert-slide-in bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200 rounded-2xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-amber-100 rounded-xl flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-amber-800">⚠️ Stok BHP hampir habis!</p>
                            <p class="text-xs text-amber-700 mt-0.5">${criticalNames}${more} perlu segera direstok.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <a href="/staf-lab/bhp" class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold rounded-xl transition-colors duration-200 whitespace-nowrap">
                            Kelola Stok
                        </a>
                        <button onclick="dismissBanner()" class="p-2 text-amber-500 hover:text-amber-700 hover:bg-amber-100 rounded-xl transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>`;
        }

        function dismissBanner() {
            const banner = document.getElementById('stock-alert-banner');
            banner.style.opacity = '0';
            banner.style.transform = 'translateY(-8px)';
            banner.style.transition = 'all 0.3s ease';
            setTimeout(() => {
                banner.classList.add('hidden');
                banner.style = '';
            }, 300);
        }

        // ======================================================
        // Alert Panel Toggle
        // ======================================================
        let panelOpen = false;

        function toggleAlertPanel() {
            const panel = document.getElementById('alert-panel');
            panelOpen = !panelOpen;
            if (panelOpen) {
                panel.classList.remove('hidden');
                panel.style.animation = 'slideDown 0.2s ease forwards';
            } else {
                panel.classList.add('hidden');
            }
        }

        // Close panel when clicking outside
        document.addEventListener('click', function(e) {
            const wrapper = document.getElementById('bell-wrapper');
            if (wrapper && !wrapper.contains(e.target)) {
                document.getElementById('alert-panel').classList.add('hidden');
                panelOpen = false;
            }
        });

        // ======================================================
        // Init
        // ======================================================
        window.onload = function() {
            renderStockAlerts();
        };
    </script>
</body>
</html>
