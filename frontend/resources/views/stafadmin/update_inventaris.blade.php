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
                <h1 id="item-name-header" class="text-3xl font-bold text-[#20394a] uppercase tracking-wide">Memuat...</h1>
                <span id="item-code-header" class="px-3 py-1 bg-white border border-[#c9ccc3] rounded-full text-sm font-semibold text-gray-600">Kode: ...</span>
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
                        <p id="item-barcode-text" class="mt-2 text-xl font-mono tracking-widest text-black group-hover:opacity-50 transition-opacity">...</p>
                        
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
                        <span id="count-ready" class="text-3xl font-bold text-[#20394a]">0</span>
                    </div>
                    <div class="border border-gray-100 rounded-lg p-5 bg-gray-50">
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Sedang Dipinjam</span>
                        <span id="count-borrowed" class="text-3xl font-bold text-[#20394a]">0</span>
                    </div>
                    <div class="border border-gray-100 rounded-lg p-5 bg-gray-50">
                        <span class="text-sm font-semibold text-gray-500 block mb-1">Rusak / Servis</span>
                        <span id="count-broken" class="text-3xl font-bold text-[#20394a]">0</span>
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
                            <span id="info-nama" class="text-gray-600">...</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Lokasi Simpan</span>
                            <span id="info-lokasi" class="text-gray-600">...</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Merk / Vendor</span>
                            <span id="info-merk" class="text-gray-600">-</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Kode Lab</span>
                            <span id="info-kode" class="text-gray-600">...</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Nomor Seri</span>
                            <span id="info-seri" class="text-gray-600">-</span>
                        </div>
                        <div class="grid grid-cols-2">
                            <span class="font-semibold text-gray-800">Barcode ID</span>
                            <span id="info-barcode" class="text-gray-600">...</span>
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
                            <span id="info-harga" class="text-gray-600">...</span>
                        </div>
                        <div class="grid grid-cols-2 flex items-center">
                            <span class="font-semibold text-gray-800">Sumber Dana</span>
                            <span id="info-sumber-dana" class="text-gray-600 flex items-center gap-2">...</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const itemId = "{{ $id }}";
            
            try {
                const response = await fetch(`http://localhost:3000/api/staf_admin/inventaris/${itemId}`);
                const result = await response.json();
                
                if (result.success && result.data) {
                    const data = result.data;
                    
                    document.getElementById('item-name-header').textContent = data.nama_barang || 'Tanpa Nama';
                    document.getElementById('item-code-header').textContent = `Kode: ${data.contoh_kode || 'N/A'}`;
                    document.getElementById('item-barcode-text').textContent = data.contoh_qr || data.contoh_kode || 'N/A';
                    
                    document.getElementById('count-ready').textContent = data.stok_baik || 0;
                    document.getElementById('count-borrowed').textContent = 0; // Not available in db currently
                    document.getElementById('count-broken').textContent = data.stok_rusak || 0;
                    
                    document.getElementById('info-nama').textContent = data.nama_barang || '-';
                    document.getElementById('info-lokasi').textContent = data.lokasi_ruangan ? `${data.lokasi_ruangan} (${data.lokasi_detail})` : '-';
                    document.getElementById('info-kode').textContent = data.contoh_kode || '-';
                    document.getElementById('info-barcode').textContent = data.contoh_qr || data.contoh_kode || '-';
                    
                    const formatter = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    });
                    
                    document.getElementById('info-harga').textContent = data.harga ? formatter.format(data.harga) : '-';
                    document.getElementById('info-sumber-dana').innerHTML = data.tahun_pengadaan ? 
                        `Pengadaan <span class="text-[10px] bg-gray-100 px-2 py-0.5 rounded text-gray-500">Tahun: ${data.tahun_pengadaan}</span>` : '-';
                }
            } catch (error) {
                console.error('Error fetching inventory detail:', error);
                alert('Gagal memuat detail barang');
            }
        });
    </script>
</body>
</html>
