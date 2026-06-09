<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draf Pengadaan - Labventory</title>
    <!-- Outfit Font -->
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen md:h-screen md:sticky md:top-0 md:overflow-y-auto">
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

            <a href="/stafadmin/daftar-inventaris" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>

            <a href="/stafadmin/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>

        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="bg-[#f9f5ed]/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Draf Pengadaan Disetujui</h2>
                <div class="text-xs text-gray-500 flex items-center gap-2">
                    <a href="/stafadmin" class="hover:text-[#6196aa]">Dashboard</a>
                    <span>/</span>
                    <span class="font-medium text-[#20394a]">Draf Pengadaan</span>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center bg-white rounded-full px-4 py-2 border border-[#c9ccc3]/40 shadow-sm">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    <input type="text" placeholder="Cari nomor PO / referensi..." class="bg-transparent border-none outline-none text-sm ml-2 w-56 text-[#20394a]">
                </div>
            </div>
        </header>

        <div class="p-6 md:p-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-7xl">
            
            <!-- Summary Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm">
                    <span class="text-sm font-semibold text-gray-500 block mb-2">Total Draf (Bulan Ini)</span>
                    <span class="text-3xl font-bold text-[#20394a]">12</span>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm border-b-4 border-b-emerald-500">
                    <span class="text-sm font-semibold text-gray-500 block mb-2">Disetujui Kaprodi</span>
                    <span class="text-3xl font-bold text-emerald-600">8</span>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm border-b-4 border-b-amber-500">
                    <span class="text-sm font-semibold text-gray-500 block mb-2">Menunggu Persetujuan</span>
                    <span class="text-3xl font-bold text-amber-600">4</span>
                </div>
            </div>

            <!-- Drafts List -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-[#c9ccc3]/30 flex justify-between items-center bg-[#f9f5ed]/30">
                    <h3 class="font-bold text-lg text-[#20394a]">Daftar Pengadaan (Telah Disetujui)</h3>
                    <div class="flex gap-2 text-sm font-medium">
                        <button class="px-3 py-1.5 bg-white border border-[#c9ccc3] rounded-md text-[#20394a] shadow-sm flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Export
                        </button>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="px-6 py-4">No. Pengajuan</th>
                                <th class="px-6 py-4">Nama Barang</th>
                                <th class="px-6 py-4">Qty</th>
                                <th class="px-6 py-4">Estimasi Harga</th>
                                <th class="px-6 py-4 text-center">Persetujuan Kaprodi</th>
                                <th class="px-6 py-4 text-center">Status Pengadaan</th>
                                <th class="px-6 py-4 text-right">Link Pembelian & Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse ($drafts as $draft)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 font-semibold text-[#20394a]">PO-{{ $draft['tahun_pengadaan'] }}-{{ str_pad($draft['id_draft'], 4, '0', STR_PAD_LEFT) }}</td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800">{{ $draft['nama_barang'] }}</div>
                                    <div class="text-xs text-gray-500 mt-1">Kategori: {{ $draft['jenis_barang'] }}</div>
                                </td>
                                <td class="px-6 py-4 font-semibold">{{ $draft['jumlah'] }} Unit</td>
                                <td class="px-6 py-4 text-gray-600">Rp {{ number_format($draft['harga'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($draft['status_persetujuan'] == 'disetujui')
                                    <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Disetujui
                                    </span>
                                    @elseif($draft['status_persetujuan'] == 'ditolak')
                                    <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                        Ditolak
                                    </span>
                                    @else
                                    <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 px-3 py-1 rounded-full text-xs font-bold border border-amber-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Pending
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @php
                                        $statusColors = [
                                            'menunggu_dipesan' => 'bg-gray-100 text-gray-700',
                                            'dipesan' => 'bg-blue-100 text-blue-700',
                                            'sedang_dikirim' => 'bg-amber-100 text-amber-700',
                                            'penerimaan_sebagian' => 'bg-purple-100 text-purple-700',
                                            'telah_diterima' => 'bg-emerald-100 text-emerald-700'
                                        ];
                                        $colorClass = $statusColors[$draft['status_pengadaan']] ?? 'bg-gray-100 text-gray-700';
                                    @endphp
                                    <select 
                                        onchange="handleStatusChange(this, {{ $draft['id_detail'] }}, '{{ $draft['nama_barang'] }}', {{ $draft['jumlah'] - $draft['jumlah_diterima'] }}, '{{ $draft['status_pengadaan'] }}')" 
                                        class="border border-gray-200 text-xs font-semibold rounded-lg focus:ring-[#6196aa] focus:border-[#6196aa] block w-full p-2 {{ $colorClass }}"
                                        {{ ($draft['status_pengadaan'] == 'telah_diterima' || $draft['status_persetujuan'] != 'disetujui') ? 'disabled' : '' }}>
                                        <option value="menunggu_dipesan" {{ $draft['status_pengadaan'] == 'menunggu_dipesan' ? 'selected' : '' }}>Menunggu Dipesan</option>
                                        <option value="dipesan" {{ $draft['status_pengadaan'] == 'dipesan' ? 'selected' : '' }}>Dipesan</option>
                                        <option value="sedang_dikirim" {{ $draft['status_pengadaan'] == 'sedang_dikirim' ? 'selected' : '' }}>Sedang Dikirim</option>
                                        <option value="penerimaan_sebagian" {{ $draft['status_pengadaan'] == 'penerimaan_sebagian' ? 'selected' : '' }}>Penerimaan Sebagian</option>
                                        <option value="telah_diterima" {{ $draft['status_pengadaan'] == 'telah_diterima' ? 'selected' : '' }}>Telah Diterima</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 text-right flex flex-col gap-2 items-end justify-center">
                                    @if(!empty($draft['link_pembelian']))
                                    <a href="{{ $draft['link_pembelian'] }}" target="_blank" class="text-xs font-bold text-[#6196aa] border border-[#6196aa] hover:bg-[#6196aa] hover:text-white transition-colors px-3 py-1.5 rounded-lg shadow-sm w-full text-center">
                                        Link Beli
                                    </a>
                                    @endif

                                    @if($draft['jumlah_diterima'] >= $draft['jumlah'])
                                    <span class="text-xs text-emerald-600 font-bold flex items-center justify-end gap-1 w-full mt-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Selesai
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada draf pengadaan yang disetujui.
                                </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </main>

    <!-- Receive Modal -->
    <div id="receiveModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto pt-10 pb-10">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 overflow-hidden flex flex-col max-h-full">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-[#f9f5ed]/50 shrink-0">
                <h3 class="text-lg font-bold text-[#20394a]">Form Penerimaan Barang</h3>
                <button onclick="closeReceiveModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto flex-grow">
                <form id="receiveForm" action="/stafadmin/draf-pengadaan/terima" method="POST" onsubmit="return handleReceiveSubmit(event)">
                    @csrf
                    <input type="hidden" name="id_detail" id="modal_id_detail">
                    
                    <div class="mb-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                        <span class="block text-xs text-blue-500 font-bold uppercase tracking-wider mb-1">Barang</span>
                        <div id="modal_nama_barang" class="font-bold text-[#20394a] text-lg"></div>
                        <div class="text-sm text-blue-600 mt-1">Maksimal bisa diterima: <span id="modal_max_qty" class="font-bold"></span> unit</div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Penerimaan</label>
                            <input type="date" name="tanggal_penerimaan" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alokasi Ruangan (Tujuan Lab)</label>
                            <select name="id_ruangan" required class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                                <option value="">-- Pilih Ruangan --</option>
                                @foreach($ruangan as $r)
                                <option value="{{ $r->id_ruangan }}">{{ $r->nama_ruangan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Unit Diterima Saat Ini</label>
                        <input type="number" id="input_qty" name="input_qty" min="1" required class="w-full md:w-1/3 rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                    </div>

                    <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" onclick="closeReceiveModal()" class="px-5 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                        <button type="submit" id="btn_submit" class="px-5 py-2.5 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors flex items-center gap-2">
                            Simpan Penerimaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- CSRF Token for fetch -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        let currentSelectElement = null;
        let originalStatusValue = null;

        function handleStatusChange(selectElement, id, name, maxQty, oldStatus) {
            const newStatus = selectElement.value;
            if (newStatus === 'telah_diterima') {
                currentSelectElement = selectElement;
                originalStatusValue = oldStatus;
                openReceiveModal(id, name, maxQty);
            } else {
                updateStatus(id, newStatus);
            }
        }

        async function updateStatus(id, newStatus) {
            try {
                const response = await fetch(`/stafadmin/draf-pengadaan/${id}/status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ status_pengadaan: newStatus })
                });
                
                const result = await response.json();
                if (result.success) {
                    window.location.reload();
                } else {
                    alert('Gagal update status');
                }
            } catch (error) {
                console.error(error);
                alert('Terjadi kesalahan jaringan');
            }
        }

        let maxQtyAllowed = 0;

        function openReceiveModal(id, name, maxQty) {
            document.getElementById('modal_id_detail').value = id;
            document.getElementById('modal_nama_barang').innerText = name;
            document.getElementById('modal_max_qty').innerText = maxQty;
            
            const qtyInput = document.getElementById('input_qty');
            qtyInput.max = maxQty;
            qtyInput.value = maxQty; // auto fill max
            maxQtyAllowed = maxQty;
            
            document.getElementById('receiveModal').classList.remove('hidden');
            document.getElementById('receiveModal').classList.add('flex');
        }

        function closeReceiveModal() {
            if (currentSelectElement && originalStatusValue) {
                currentSelectElement.value = originalStatusValue; // reset select
            }
            document.getElementById('receiveModal').classList.add('hidden');
            document.getElementById('receiveModal').classList.remove('flex');
        }

        async function handleReceiveSubmit(e) {
            e.preventDefault();
            const qty = parseInt(document.getElementById('input_qty').value);
            if (qty > maxQtyAllowed) {
                alert(`Maksimal unit yang bisa diterima adalah ${maxQtyAllowed}`);
                return false;
            }

            document.getElementById('btn_submit').disabled = true;
            document.getElementById('btn_submit').innerText = 'Memproses...';
            e.target.submit();
        }
    </script>
    @if(session('qr_univ'))
    <div id="qrUnivModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 overflow-hidden p-6 text-center relative">
            <h3 class="text-xl font-bold text-[#20394a] mb-2">Penerimaan Berhasil</h3>
            <p class="text-sm text-gray-500 mb-4">Berikut adalah QR Otorisasi dari Universitas untuk pemberian label barang ini. Simpan QR ini untuk digunakan saat melabeli barang.</p>
            
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-200 mb-6">
                <span class="block text-xs text-gray-500 mb-1">Kode QR Universitas:</span>
                <span class="text-2xl font-mono font-bold text-[#20394a]">{{ session('qr_univ') }}</span>
            </div>
            
            <div class="flex gap-3">
                <button onclick="downloadQrUniv('{{ session('qr_univ') }}')" class="w-full px-4 py-2 border border-[#c9ccc3] text-[#20394a] rounded-xl text-sm font-semibold hover:bg-gray-50 transition-colors">Download QR</button>
                <button onclick="document.getElementById('qrUnivModal').remove()" class="w-full px-4 py-2 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">Tutup</button>
            </div>
        </div>
    </div>
    <script>
        function downloadQrUniv(qr) {
            const element = document.createElement('a');
            const file = new Blob([qr], {type: 'text/plain'});
            element.href = URL.createObjectURL(file);
            element.download = 'QR_Universitas_' + qr + '.txt';
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
        }
    </script>
    @endif
</body>
</html>
