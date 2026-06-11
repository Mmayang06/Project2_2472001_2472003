<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Barang - Labventory</title>
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-3xl border border-[#c9ccc3]/40 shadow-xl overflow-hidden flex flex-col">
        <!-- Header -->
        <div class="bg-[#20394a] text-white p-6 text-center relative">
            <div class="w-16 h-16 bg-[#6196aa] text-white rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
            <p class="text-xs text-[#c9ccc3] tracking-wide mt-1">Sistem Informasi Inventaris Laboratorium</p>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-6 flex-grow">
            @if($success && $data)
                <!-- Content State -->
                <div class="space-y-6">
                    <!-- Condition Badge -->
                    <div class="border border-gray-100 rounded-2xl p-4 bg-gray-50 flex items-center justify-between shadow-inner">
                        <span class="text-sm font-semibold text-gray-500">Kondisi Barang</span>
                        @if(($data['kondisi'] ?? '') === 'baik')
                            <span class="text-xs font-bold px-3 py-1 rounded-full uppercase border bg-emerald-50 text-emerald-700 border-emerald-200">Bagus</span>
                        @else
                            <span class="text-xs font-bold px-3 py-1 rounded-full uppercase border bg-red-50 text-red-700 border-red-200">Rusak</span>
                        @endif
                    </div>

                    <!-- Info Table -->
                    <div class="space-y-4">
                        <div class="border-b border-gray-100 pb-2">
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Nama Barang</span>
                            <span class="text-lg font-bold text-[#20394a] block mt-1">{{ $data['nama_barang'] ?? '-' }}</span>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="border-b border-gray-100 pb-2">
                                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Nomor Label</span>
                                <span class="text-sm font-semibold text-gray-800 block mt-1">{{ $data['nomor_label'] ?? '-' }}</span>
                            </div>
                            <div class="border-b border-gray-100 pb-2">
                                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">QR Code ID</span>
                                <span class="text-sm font-semibold text-gray-800 block mt-1">{{ $data['qr_code'] ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="border-b border-gray-100 pb-2">
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Lokasi Ruangan</span>
                            <span class="text-sm font-semibold text-gray-800 block mt-1">
                                {{ isset($data['lokasi_ruangan']) ? $data['lokasi_ruangan'] . ' (' . ($data['lokasi_detail'] ?? '') . ')' : '-' }}
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="border-b border-gray-100 pb-2">
                                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Tahun Pengadaan</span>
                                <span class="text-sm font-semibold text-gray-800 block mt-1">{{ $data['tahun_pengadaan'] ?? '-' }}</span>
                            </div>
                            <div class="border-b border-gray-100 pb-2">
                                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Jenis Barang</span>
                                <span class="text-sm font-semibold text-gray-800 block mt-1">{{ $data['jenis_barang'] ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Error State -->
                <div class="text-center py-8 text-red-500 font-semibold space-y-2">
                    <svg class="w-12 h-12 mx-auto text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <p>Gagal memuat data barang atau barang tidak ditemukan.</p>
                </div>
            @endif
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 text-center text-xs text-gray-400">
            Sistem Informasi Inventaris &copy; 2026
        </div>
    </div>
</body>
</html>
