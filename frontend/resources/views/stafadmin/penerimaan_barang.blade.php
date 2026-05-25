<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Barang - Labventory</title>
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen overflow-hidden flex flex-col md:flex-row">

    <!-- Sidebar (Blurred in background) -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen opacity-50 blur-sm pointer-events-none">
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                </div>
            </div>
        </div>
        <!-- Dummy sidebar items -->
        <nav class="flex-grow p-4 space-y-2 mt-4">
            <div class="w-full h-12 bg-white/10 rounded-xl mb-2"></div>
            <div class="w-full h-12 bg-white/10 rounded-xl mb-2"></div>
            <div class="w-full h-12 bg-white/10 rounded-xl mb-2"></div>
            <div class="w-full h-12 bg-white/20 rounded-xl mb-2"></div>
        </nav>
    </aside>

    <!-- Main Content Background (Blurred) -->
    <main class="flex-grow flex flex-col min-w-0 bg-[#f9f5ed] relative">
        <header class="h-20 px-6 md:px-8 flex items-center justify-between border-b border-[#c9ccc3]/40 opacity-50 blur-sm pointer-events-none">
            <h2 class="text-2xl font-bold text-[#20394a] uppercase tracking-wider">Penerimaan Barang</h2>
        </header>
        <div class="p-8 opacity-50 blur-sm pointer-events-none">
            <div class="w-full h-16 bg-white rounded-xl border border-gray-200 mb-6"></div>
            <div class="grid grid-cols-4 gap-6">
                <div class="h-64 bg-white rounded-xl border border-gray-200"></div>
                <div class="h-64 bg-white rounded-xl border border-gray-200"></div>
                <div class="h-64 bg-white rounded-xl border border-gray-200"></div>
                <div class="h-64 bg-white rounded-xl border border-gray-200"></div>
            </div>
        </div>

        <!-- Overlay for Modal -->
        <div class="absolute inset-0 bg-[#030706]/40 backdrop-blur-sm z-40 flex justify-center items-start pt-10 overflow-y-auto">
            
            <!-- Modal Container -->
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl mb-10 overflow-hidden flex flex-col">
                
                <!-- Modal Header -->
                <div class="px-8 py-5 border-b border-[#c9ccc3]/40 flex justify-between items-center bg-white sticky top-0 z-10">
                    <h3 class="text-xl font-bold text-[#20394a]">Input Penerimaan Barang</h3>
                    <a href="/stafadmin" class="text-gray-400 hover:text-red-500 transition-colors p-1">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </a>
                </div>

                <!-- Modal Body -->
                <div class="p-8 overflow-y-auto bg-white">
                    
                    <!-- Section: Basic Information -->
                    <div class="mb-8">
                        <h4 class="text-base font-bold text-[#20394a] mb-4 flex items-center justify-between">
                            Informasi Dasar
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/></svg>
                        </h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Nama Barang</label>
                                <input type="text" value="Mikroskop Binokuler" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-[#6196aa]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Lokasi Simpan</label>
                                <div class="relative">
                                    <select class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-[#6196aa] appearance-none">
                                        <option>Laboratorium Dasar - Lemari B</option>
                                        <option>Gudang Utama</option>
                                    </select>
                                    <svg class="w-4 h-4 text-gray-500 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Vendor / Suplier</label>
                                <input type="text" value="PT. Bina Medika" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-[#6196aa]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Kode Barang</label>
                                <input type="text" placeholder="Masukkan Kode (Mis. MKB-001)" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-[#6196aa]">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">No. Referensi PO / SK</label>
                                <input type="text" placeholder="PO-2024-001" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-[#6196aa]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Tanggal Diterima</label>
                                <div class="relative">
                                    <input type="date" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:border-[#6196aa]">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="border-[#c9ccc3]/30 mb-8">

                    <!-- Section: Media -->
                    <div class="mb-8">
                        <h4 class="text-base font-bold text-[#20394a] mb-4">Media <span class="text-xs font-normal text-gray-500">(Foto Barang / Surat Jalan)</span></h4>
                        
                        <div class="flex gap-4">
                            <!-- Image 1 -->
                            <div class="w-32 h-32 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl flex items-center justify-center relative group">
                                <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                            </div>
                            <!-- Upload Button -->
                            <div class="w-32 h-32 border-2 border-dashed border-[#6196aa] rounded-xl flex items-center justify-center cursor-pointer hover:bg-[#6196aa]/5 transition-colors">
                                <svg class="w-8 h-8 text-[#6196aa]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </div>
                        </div>
                    </div>

                    <hr class="border-[#c9ccc3]/30 mb-8">

                    <!-- Section: Sale Information (Procurement Value) -->
                    <div class="mb-8">
                        <h4 class="text-base font-bold text-[#20394a] mb-4">Nilai Pengadaan</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Harga Satuan (Rp)</label>
                                <input type="text" value="5.500.000" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-[#6196aa]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Diskon / Potongan (Rp)</label>
                                <input type="text" value="0" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-[#6196aa]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Kondisi Saat Diterima</label>
                                <select class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-[#6196aa]">
                                    <option>100% Baru / Baik</option>
                                    <option>Ada Cacat Minor</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr class="border-[#c9ccc3]/30 mb-8">

                    <!-- Section: Inventory -->
                    <div class="mb-4">
                        <h4 class="text-base font-bold text-[#20394a] mb-4">Jumlah Inventaris</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Kuantitas Diterima</label>
                                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden bg-gray-50">
                                    <input type="number" value="10" class="w-full bg-transparent px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-[#6196aa]">
                                    <div class="px-3 border-l border-gray-200 flex flex-col justify-center gap-1 cursor-pointer">
                                        <svg class="w-3 h-3 text-gray-500 hover:text-[#20394a]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8l4 4H8z"/></svg>
                                        <svg class="w-3 h-3 text-gray-500 hover:text-[#20394a]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 16l-4-4h8z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#20394a] mb-1.5">Satuan Barang</label>
                                <div class="relative">
                                    <select class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-800 font-medium focus:outline-none focus:border-[#6196aa] appearance-none">
                                        <option>Unit</option>
                                        <option>Set</option>
                                        <option>Kotak / Box</option>
                                        <option>Pcs</option>
                                    </select>
                                    <svg class="w-4 h-4 text-gray-500 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="px-8 py-5 border-t border-[#c9ccc3]/40 bg-gray-50 flex justify-between items-center rounded-b-2xl">
                    <button class="px-4 py-2 text-sm font-semibold text-gray-600 border border-gray-300 bg-white rounded-lg hover:bg-gray-100 transition-colors">
                        Catatan Tambahan
                    </button>
                    <button class="px-6 py-2 text-sm font-bold text-white bg-[#20394a] rounded-lg hover:bg-[#6196aa] shadow-md transition-colors">
                        Simpan Data
                    </button>
                </div>

            </div>
        </div>
    </main>

</body>
</html>
