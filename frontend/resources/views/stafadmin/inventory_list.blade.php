<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Inventaris - Labventory</title>
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
<body class="bg-white text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen">
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
                <h4 class="font-semibold text-sm truncate text-[#f9f5ed]">Staf Admin - Sarah J.</h4>
                <p class="text-xs text-[#c9ccc3] flex items-center gap-1.5 mt-0.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                    Online
                </p>
            </div>
        </div>

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="/stafadmin" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                Dashboard
            </a>

            <a href="/stafadmin/inventory/list" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>

            <a href="#" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>

            <a href="#" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-2 14l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                Penerimaan Barang
            </a>
        </nav>

        <div class="p-4 border-t border-[#6196aa]/20">
            <a href="/" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-[#c9ccc3]/20 hover:bg-[#c9ccc3]/10 text-xs font-semibold text-[#c9ccc3] hover:text-[#f9f5ed] transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col min-w-0 bg-white">
        <!-- Top Navbar (Optional to match other pages, but image doesn't strictly have one except for breadcrumbs. We will keep a very simple one) -->
        <header class="h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30 bg-white">
            <h2 class="text-2xl font-bold text-[#20394a] uppercase tracking-wider">Daftar Inventaris</h2>
            <div class="flex items-center gap-4">
                <button class="px-5 py-2 text-sm font-semibold text-white bg-[#20394a] rounded-lg hover:bg-[#6196aa] transition-colors shadow-sm">
                    + Tambah Inventaris
                </button>
            </div>
        </header>

        <div class="px-6 md:px-8 pb-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-[1400px]">
            
            <!-- Filter & Search Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-2">
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative w-full md:w-64">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Cari barang..." class="pl-9 pr-4 py-2 w-full border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6196aa] text-gray-700">
                    </div>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                        Filter
                    </button>
                </div>

                <div class="flex items-center gap-4 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <span>Dikelompokkan berdasarkan:</span>
                        <select class="border border-gray-300 rounded-lg px-3 py-1.5 focus:outline-none focus:border-[#6196aa] bg-white">
                            <option>Lokasi Lab</option>
                            <option>Kategori Alat</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-1 border border-gray-300 rounded-lg p-0.5 bg-gray-50">
                        <button class="p-1.5 bg-white shadow-sm rounded text-[#20394a]"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h4v4H4V4zm6 0h4v4h-4V4zm6 0h4v4h-4V4zM4 10h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4zM4 16h4v4H4v-4zm6 0h4v4h-4v-4zm6 0h4v4h-4v-4z"/></svg></button>
                        <button class="p-1.5 text-gray-400 hover:text-[#20394a]"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"/></svg></button>
                    </div>
                </div>
            </div>

            <!-- Group 1: Laboratorium Dasar (Warehouse A equivalent) -->
            <div class="border border-gray-200 rounded-xl overflow-hidden bg-gray-50/50">
                <!-- Group Header -->
                <div class="bg-gray-50 px-6 py-4 flex items-center justify-between border-b border-gray-200 cursor-pointer group">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 text-[#20394a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <h3 class="font-bold text-lg text-[#20394a]">Laboratorium Dasar</h3>
                        <div class="flex gap-2 ml-2">
                            <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-semibold rounded-full">50 alat</span>
                            <span class="text-xs text-gray-400 self-center">|</span>
                            <span class="text-xs text-gray-500 self-center">Gedung Fakultas Sains, Lantai 1</span>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-[#20394a] transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                </div>

                <!-- Group Content (Cards Grid) -->
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    
                    <!-- Card 1 -->
                    <a href="/stafadmin/inventory/detail/1" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-[#6196aa] hover:shadow-lg transition-all duration-200 group">
                        <div class="aspect-square bg-gray-100 w-full flex items-center justify-center p-6 relative">
                            <svg class="w-20 h-20 text-gray-300 group-hover:scale-105 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide">Kode: MKB-001</span>
                                <span class="text-xs font-semibold text-gray-500">Alat Optik</span>
                            </div>
                            <h4 class="font-bold text-[#20394a] mb-3 group-hover:text-[#6196aa] transition-colors truncate">Mikroskop Binokuler</h4>
                            <div class="flex justify-between items-end">
                                <span class="text-xs text-gray-500">Stok Tersedia: <strong class="text-gray-800">27 Unit</strong></span>
                            </div>
                        </div>
                    </a>

                    <!-- Card 2 -->
                    <a href="/stafadmin/inventory/detail/2" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-[#6196aa] hover:shadow-lg transition-all duration-200 group relative">
                        <!-- Low Stock Badge -->
                        <div class="absolute top-3 right-3 z-10 bg-[#20394a] text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-sm">
                            Low-Stock Alerts
                        </div>
                        <div class="aspect-square bg-gray-100 w-full flex items-center justify-center p-6">
                            <svg class="w-20 h-20 text-gray-300 group-hover:scale-105 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide">Kode: TBG-045</span>
                                <span class="text-xs font-semibold text-gray-500">Alat Kaca</span>
                            </div>
                            <h4 class="font-bold text-[#20394a] mb-3 group-hover:text-[#6196aa] transition-colors truncate">Tabung Reaksi Kaca</h4>
                            <div class="flex justify-between items-end">
                                <span class="text-xs text-gray-500">Stok Tersedia: <strong class="text-amber-600">5 Pcs</strong></span>
                            </div>
                        </div>
                    </a>

                    <!-- Card 3 -->
                    <a href="/stafadmin/inventory/detail/3" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-[#6196aa] hover:shadow-lg transition-all duration-200 group">
                        <div class="aspect-square bg-gray-100 w-full flex items-center justify-center p-6">
                            <svg class="w-20 h-20 text-gray-300 group-hover:scale-105 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide">Kode: CFG-012</span>
                                <span class="text-xs font-semibold text-gray-500">Alat Mesin</span>
                            </div>
                            <h4 class="font-bold text-[#20394a] mb-3 group-hover:text-[#6196aa] transition-colors truncate">Centrifuge 4000 RPM</h4>
                            <div class="flex justify-between items-end">
                                <span class="text-xs text-gray-500">Stok Tersedia: <strong class="text-gray-800">2 Unit</strong></span>
                            </div>
                        </div>
                    </a>

                    <!-- Card 4 -->
                    <a href="/stafadmin/inventory/detail/4" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-[#6196aa] hover:shadow-lg transition-all duration-200 group">
                        <div class="aspect-square bg-gray-100 w-full flex items-center justify-center p-6">
                            <svg class="w-20 h-20 text-gray-300 group-hover:scale-105 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide">Kode: TMB-003</span>
                                <span class="text-xs font-semibold text-gray-500">Alat Ukur</span>
                            </div>
                            <h4 class="font-bold text-[#20394a] mb-3 group-hover:text-[#6196aa] transition-colors truncate">Timbangan Analitik</h4>
                            <div class="flex justify-between items-end">
                                <span class="text-xs text-gray-500">Stok Tersedia: <strong class="text-gray-800">5 Unit</strong></span>
                            </div>
                        </div>
                    </a>

                    <!-- Card 5 -->
                    <a href="/stafadmin/inventory/detail/5" class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:border-[#6196aa] hover:shadow-lg transition-all duration-200 group relative">
                        <!-- Low Stock Badge -->
                        <div class="absolute top-3 right-3 z-10 bg-[#20394a] text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-sm">
                            Low-Stock Alerts
                        </div>
                        <div class="aspect-square bg-gray-100 w-full flex items-center justify-center p-6">
                            <svg class="w-20 h-20 text-gray-300 group-hover:scale-105 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide">Kode: GGL-021</span>
                                <span class="text-xs font-semibold text-gray-500">APD</span>
                            </div>
                            <h4 class="font-bold text-[#20394a] mb-3 group-hover:text-[#6196aa] transition-colors truncate">Kacamata Pelindung (Goggles)</h4>
                            <div class="flex justify-between items-end">
                                <span class="text-xs text-gray-500">Stok Tersedia: <strong class="text-amber-600">3 Pcs</strong></span>
                            </div>
                        </div>
                    </a>

                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                    <div class="flex gap-1">
                        <button class="px-3 py-1.5 border border-gray-300 text-gray-500 rounded text-sm hover:bg-gray-50">&lt;</button>
                        <button class="px-3 py-1.5 bg-[#20394a] text-white rounded text-sm font-semibold">1</button>
                        <button class="px-3 py-1.5 border border-gray-300 text-gray-600 rounded text-sm hover:bg-gray-50">2</button>
                        <button class="px-3 py-1.5 border border-gray-300 text-gray-600 rounded text-sm hover:bg-gray-50">3</button>
                        <button class="px-3 py-1.5 border border-gray-300 text-gray-600 rounded text-sm hover:bg-gray-50">&gt;</button>
                    </div>
                </div>
            </div>

            <!-- Group 2: Laboratorium Analitik (Warehouse B equivalent) -->
            <div class="border border-gray-200 rounded-xl overflow-hidden bg-gray-50/50">
                <!-- Group Header (Collapsed state) -->
                <div class="bg-gray-50 px-6 py-4 flex items-center justify-between cursor-pointer group">
                    <div class="flex items-center gap-4">
                        <svg class="w-6 h-6 text-[#20394a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <h3 class="font-bold text-lg text-[#20394a]">Laboratorium Analitik</h3>
                        <div class="flex gap-2 ml-2">
                            <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-semibold rounded-full">40 alat</span>
                            <span class="text-xs text-gray-400 self-center">|</span>
                            <span class="text-xs text-gray-500 self-center">Gedung Fakultas Sains, Lantai 2</span>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-[#20394a] transform transition-transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
