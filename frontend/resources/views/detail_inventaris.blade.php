<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang - Labventory</title>
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
<body class="bg-bone text-noir font-sans antialiased min-h-screen">

@if($success && $data)
    <main class="max-w-[1200px] mx-auto px-4 md:px-8 py-8">
        <!-- Back Button -->
        <div class="mb-6">
            <button onclick="window.history.back()" class="flex items-center gap-2 text-sm font-bold text-denim hover:text-steel transition-colors px-4 py-2 bg-white rounded-lg shadow-sm border border-concrete/40 w-fit">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali
            </button>
        </div>

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div class="flex items-center gap-4">
                <h1 class="text-2xl font-bold uppercase tracking-wide text-denim">{{ $data['nama_barang'] ?? '-' }}</h1>
                <span class="px-3 py-1 bg-white border border-concrete/40 rounded-full text-xs font-semibold text-denim shadow-sm">Kode: {{ $data['nomor_label'] ?? '-' }}</span>
            </div>
        </div>

        <!-- Main Card Grid -->
        <div class="bg-white border border-concrete/40 rounded-2xl shadow-md p-6 lg:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                
                <!-- Left Column (Images & QR) -->
                <div class="lg:col-span-5 flex flex-col gap-6 h-full">
                    <!-- Image Area -->
                    <div class="border border-concrete/20 bg-bone/30 rounded-2xl p-8 flex flex-col items-center justify-center flex-grow relative shadow-inner min-h-[250px]">
                        <svg class="w-24 h-24 text-concrete/50 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" opacity="0.3"/><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg>
                        
                        <!-- Dots -->
                        <div class="absolute bottom-4 flex gap-1.5">
                            <div class="w-1.5 h-1.5 rounded-full bg-denim"></div>
                            <div class="w-1.5 h-1.5 rounded-full bg-concrete"></div>
                            <div class="w-1.5 h-1.5 rounded-full bg-concrete"></div>
                            <div class="w-1.5 h-1.5 rounded-full bg-concrete"></div>
                        </div>
                    </div>

                    <!-- QR Code Area -->
                    <div class="border border-concrete/20 rounded-2xl p-6 text-center bg-gray-50/50 shrink-0">
                        <h3 class="text-sm font-semibold text-denim mb-4 uppercase tracking-wider">QR Code Label</h3>
                        @php
                            $qrText = $data['qr_code'] ?? $data['nomor_label'] ?? 'No Data';
                        @endphp
                        <div class="relative group mx-auto w-fit cursor-pointer" onclick="printQR()">
                            <img id="qr-image" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($qrText) }}" alt="QR Code" class="w-32 h-32 border border-concrete/20 rounded-md p-1 bg-white shadow-sm transition-opacity group-hover:opacity-30">
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                <span class="bg-denim text-white text-xs font-bold px-3 py-1.5 rounded-md flex items-center gap-1.5 shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                    Cetak
                                </span>
                            </div>
                        </div>
                        <p id="qr-text" class="text-xs text-gray-500 mt-3 font-mono tracking-wider">{{ $qrText }}</p>
                    </div>
                </div>

                <!-- Right Column (Details) -->
                <div class="lg:col-span-7 flex flex-col gap-6 h-full">
                    
                    <!-- Stats row -->
                    <div class="grid grid-cols-3 gap-4 shrink-0">
                        <div class="border border-concrete/30 rounded-2xl p-5 bg-bone/40 shadow-sm">
                            <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">Kondisi</span>
                            @if(($data['kondisi'] ?? '') === 'baik')
                                <span class="text-xl font-bold text-emerald-600">Bagus</span>
                            @else
                                <span class="text-xl font-bold text-red-600">Rusak</span>
                            @endif
                        </div>
                        <div class="border border-concrete/30 rounded-2xl p-5 bg-bone/40 shadow-sm">
                            <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">Tahun Pengadaan</span>
                            <span class="text-xl font-bold text-denim">{{ $data['tahun_pengadaan'] ?? '-' }}</span>
                        </div>
                        <div class="border border-concrete/30 rounded-2xl p-5 bg-bone/40 shadow-sm">
                            <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">Total Unit</span>
                            <span class="text-xl font-bold text-denim">1</span>
                        </div>
                    </div>

                    <!-- Basic info -->
                    <div class="bg-gray-50/50 border border-concrete/20 rounded-2xl p-6 flex-grow flex flex-col">
                        <div class="flex items-center gap-2 mb-6 border-b border-concrete/20 pb-3 shrink-0">
                            <svg class="w-5 h-5 text-steel" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <h2 class="text-lg font-bold text-denim tracking-tight">Informasi Dasar</h2>
                        </div>
                        <div class="grid grid-cols-2 gap-y-8 gap-x-8 text-sm flex-grow items-center">
                            <div>
                                <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">Nama Barang</span>
                                <span class="font-bold text-denim text-base">{{ $data['nama_barang'] ?? '-' }}</span>
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">Lokasi Ruangan</span>
                                <span class="font-bold text-denim text-base">{{ isset($data['lokasi_ruangan']) ? $data['lokasi_ruangan'] . ' (' . ($data['lokasi_detail'] ?? '') . ')' : '-' }}</span>
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">Jenis Barang</span>
                                <span class="font-bold text-denim text-base">{{ $data['jenis_barang'] ?? '-' }}</span>
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">Kode / Nomor Label</span>
                                <span class="font-bold text-denim text-base">{{ $data['nomor_label'] ?? '-' }}</span>
                            </div>
                            <div>
                                <span class="block text-[11px] font-bold text-gray-400 mb-1.5 uppercase tracking-wider">QR Code ID</span>
                                <span class="font-bold text-denim text-base">{{ $data['qr_code'] ?? '-' }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script>
        function printQR() {
            const qrSrc = document.getElementById('qr-image').src;
            const qrText = document.getElementById('qr-text').innerText;
            const printWindow = window.open('', '', 'width=400,height=400');
            printWindow.document.write(`
                <html>
                    <head><title>Print QR Code - ${qrText}</title></head>
                    <body style="display:flex;flex-direction:column;align-items:center;justify-content:center;height:100vh;margin:0;font-family:sans-serif;">
                        <img src="${qrSrc}" style="width:200px;height:200px;margin-bottom:15px;">
                        <p style="font-family:monospace;font-size:16px;font-weight:bold;letter-spacing:1px;margin:0;">${qrText}</p>
                        <script>
                            window.onload = function() { 
                                setTimeout(() => {
                                    window.print(); 
                                    window.close(); 
                                }, 300);
                            }
                        <\/script>
                    </body>
                </html>
            `);
            printWindow.document.close();
        }
    </script>
@else
    <div class="min-h-screen flex items-center justify-center bg-bone p-6">
        <div class="bg-white border border-concrete/40 rounded-3xl p-8 max-w-sm w-full text-center shadow-xl">
            <svg class="w-16 h-16 text-red-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <h2 class="text-xl font-bold text-denim mb-2 tracking-tight">Data Tidak Ditemukan</h2>
            <p class="text-sm text-gray-500 mb-6">Barang yang Anda cari tidak tersedia atau terjadi kesalahan saat mengambil data.</p>
            <button onclick="window.history.back()" class="block w-full py-2.5 bg-denim hover:bg-steel text-white rounded-xl text-sm font-semibold transition-colors shadow-md">Kembali</button>
        </div>
    </div>
@endif

</body>
</html>
