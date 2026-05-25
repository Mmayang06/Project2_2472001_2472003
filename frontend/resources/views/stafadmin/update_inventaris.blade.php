<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inventaris - Labventory</title>
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen">

    <!-- Top Navbar -->
    <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
        <div class="flex items-center gap-4">
            <a href="/stafadmin/dashboard" class="text-gray-400 hover:text-[#20394a] transition-colors">
                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Update Inventaris Lab</h2>
                <div class="text-xs text-gray-500 flex items-center gap-2">
                    <a href="/stafadmin" class="hover:text-[#6196aa]">Dashboard</a>
                    <span>/</span>
                    <a href="/stafadmin/daftar-inventaris" class="hover:text-[#6196aa]">Daftar Inventaris</a>
                    <span>/</span>
                    <span class="font-medium text-[#20394a]">Detail Barang</span>
                </div>
            </div>
        </div>
        
        <div class="flex items-center gap-4">
            <div class="h-10 w-10 rounded-xl bg-[#20394a]/5 border border-[#20394a]/10 flex items-center justify-center text-[#20394a] font-bold">SA</div>
        </div>
    </header>

    <main class="p-6 md:p-8 max-w-[1400px] mx-auto space-y-6">
        
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <h1 class="text-3xl font-bold text-[#20394a] uppercase tracking-wide">Mikroskop Binokuler</h1>
                <span class="px-3 py-1 bg-white border border-[#c9ccc3] rounded-full text-sm font-semibold text-gray-600">Kode: MKB-001</span>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 text-sm font-medium text-[#6196aa] hover:text-[#20394a] transition-colors bg-transparent">
                    Buat Rencana Kalibrasi
                </button>
                <button class="px-4 py-2 text-sm font-medium border border-[#c9ccc3] rounded-lg hover:bg-gray-50 transition-colors bg-white">
                    Edit Data
                </button>
                <button class="px-4 py-2 text-sm font-semibold text-white bg-[#20394a] rounded-lg hover:bg-[#6196aa] transition-colors shadow-sm">
                    Update Jumlah
                </button>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- Left Column (Images & Barcode) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Product Image Container -->
                <div class="bg-white rounded-xl border border-[#c9ccc3]/40 p-4 shadow-sm flex flex-col items-center">
                    <div class="w-full aspect-square bg-gray-100 rounded-lg flex items-center justify-center mb-4 relative overflow-hidden group cursor-pointer border border-gray-200">
                        <!-- Placeholder Image Icon -->
                        <svg class="h-24 w-24 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                        </svg>
                        <div class="absolute inset-0 bg-[#20394a]/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white font-medium text-sm bg-[#20394a]/80 px-4 py-2 rounded-full backdrop-blur-sm">Ganti Foto</span>
                        </div>
                    </div>
                    <!-- Carousel Indicators -->
                    <div class="flex items-center justify-center gap-2">
                        <button class="p-1 text-gray-400 hover:text-[#20394a]"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></button>
                        <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                        <span class="w-2 h-2 rounded-full bg-gray-200"></span>
                        <span class="w-2 h-2 rounded-full bg-gray-200"></span>
                        <button class="p-1 text-gray-400 hover:text-[#20394a]"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></button>
                    </div>
                </div>

                <!-- Barcode Container -->
                <div class="bg-white rounded-xl border border-[#c9ccc3]/40 p-6 shadow-sm flex flex-col items-center">
                    <h3 class="font-semibold text-lg text-[#20394a] mb-4">Label QR / Barcode</h3>
                    <div class="bg-white p-4 border-2 border-dashed border-gray-300 rounded-lg w-full flex flex-col items-center justify-center group hover:border-[#6196aa] transition-colors cursor-pointer relative">
                        <!-- Barcode SVG Placeholder -->
                        <svg class="h-20 w-full text-black group-hover:opacity-50 transition-opacity" preserveAspectRatio="none" viewBox="0 0 100 30" fill="currentColor">
                            <rect x="0" y="0" width="4" height="30"/>
                            <rect x="6" y="0" width="2" height="30"/>
                            <rect x="10" y="0" width="8" height="30"/>
                            <rect x="20" y="0" width="4" height="30"/>
                            <rect x="26" y="0" width="2" height="30"/>
                            <rect x="30" y="0" width="10" height="30"/>
                            <rect x="42" y="0" width="2" height="30"/>
                            <rect x="46" y="0" width="6" height="30"/>
                            <rect x="54" y="0" width="2" height="30"/>
                            <rect x="58" y="0" width="8" height="30"/>
                            <rect x="68" y="0" width="4" height="30"/>
                            <rect x="74" y="0" width="6" height="30"/>
                            <rect x="82" y="0" width="2" height="30"/>
                            <rect x="86" y="0" width="10" height="30"/>
                            <rect x="98" y="0" width="2" height="30"/>
                        </svg>
                        <p class="mt-2 text-xl font-mono tracking-widest text-black group-hover:opacity-50 transition-opacity">40181 700982</p>
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="bg-[#20394a] text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-lg flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                Cetak Label Baru
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column (Info & Stats) -->
            <div class="lg:col-span-8 bg-white rounded-xl border border-[#c9ccc3]/40 p-6 shadow-sm space-y-8">
                
                <!-- Status Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="border border-gray-100 rounded-lg p-5 bg-gray-50">
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Tersedia (Ready)</span>
                        <span class="text-3xl font-bold text-[#20394a]">20</span>
                    </div>
                    <div class="border border-gray-100 rounded-lg p-5 bg-gray-50">
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Sedang Dipinjam</span>
                        <span class="text-3xl font-bold text-[#20394a]">5</span>
                    </div>
                    <div class="border border-gray-100 rounded-lg p-5 bg-gray-50">
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Rusak / Servis</span>
                        <span class="text-3xl font-bold text-[#20394a]">2</span>
                    </div>
                </div>

                <!-- Basic Information -->
                <div>
                    <h3 class="flex items-center gap-2 text-lg font-bold text-[#20394a] mb-4">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Informasi Dasar
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Nama Barang</span>
                            <span class="text-gray-600">Mikroskop Binokuler</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Lokasi Simpan</span>
                            <span class="text-gray-600">Lemari Kaca B - Rak 2</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Merk / Vendor</span>
                            <span class="text-gray-600">Olympus Corp.</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Kode Lab</span>
                            <span class="text-gray-600">MKB-001</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Nomor Seri</span>
                            <span class="text-gray-600">-</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Barcode ID</span>
                            <span class="text-gray-600">40181700082</span>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Procurement Information -->
                <div>
                    <h3 class="flex items-center gap-2 text-lg font-bold text-[#20394a] mb-4">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Informasi Pengadaan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Harga Satuan</span>
                            <span class="text-gray-600">Rp 5.500.000</span>
                        </div>
                        <div class="grid grid-cols-2 flex items-center">
                            <span class="font-semibold text-gray-800">Sumber Dana</span>
                            <span class="text-gray-600 flex items-center gap-2">Hibah Penelitian <span class="text-[10px] bg-gray-100 px-2 py-0.5 rounded text-gray-500">Tahun: 2024</span></span>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Inventory Summary -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="flex items-center gap-2 text-lg font-bold text-[#20394a]">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            Total Inventaris
                        </h3>
                        <a href="#" class="text-xs text-gray-500 hover:text-[#6196aa] flex items-center gap-1 font-medium transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Riwayat Perubahan Jumlah
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8 text-sm">
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Jumlah Keseluruhan</span>
                            <span class="text-gray-600 font-bold text-lg text-[#20394a]">27</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Satuan</span>
                            <span class="text-gray-600">Unit</span>
                        </div>
                    </div>
                </div>

                <!-- Relevant Plans / Tasks -->
                <div>
                    <h3 class="text-sm font-bold text-[#20394a] mb-3 mt-6">Rencana Pemeliharaan Terkait</h3>
                    <div class="space-y-0 divide-y divide-gray-100 border border-gray-100 rounded-lg">
                        
                        <!-- Item 1 -->
                        <div class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">[Mendesak] Kalibrasi Lensa Objektif</p>
                                    <p class="text-xs text-gray-500">2 Unit Mikroskop</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <span class="px-3 py-1 bg-white border border-gray-300 text-gray-600 text-xs font-semibold rounded-full">Todo</span>
                                <div class="w-24 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="w-0 h-full bg-[#6196aa]"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">[Bulan Ini] Pembersihan Optik Rutin - Lab A</p>
                                    <p class="text-xs text-gray-500">20 Unit Mikroskop</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <span class="px-3 py-1 bg-white border border-gray-300 text-gray-600 text-xs font-semibold rounded-full">Processing</span>
                                <div class="w-24 h-1.5 bg-gray-200 rounded-full overflow-hidden flex">
                                    <div class="w-1/3 h-full bg-[#20394a]"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">[Bulan Lalu] Inspeksi Kondisi Lampu Halogen</p>
                                    <p class="text-xs text-gray-500">27 Unit Mikroskop</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-6">
                                <span class="px-3 py-1 bg-white border border-gray-300 text-gray-600 text-xs font-semibold rounded-full">Completed</span>
                                <div class="w-24 h-1.5 bg-gray-200 rounded-full overflow-hidden flex">
                                    <div class="w-full h-full bg-[#20394a]"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>
