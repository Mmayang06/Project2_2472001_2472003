<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Detail Draf - Labventory</title>
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
        
        .transition-badge {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
</head>
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex flex-col md:flex-row overflow-x-hidden">

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 min-h-screen md:h-screen md:sticky md:top-0 md:overflow-y-auto">
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
            <a href="/kaprodi/dashboard" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Ketua Program Studi</span>
                    <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">{{ session('user')['username'] ?? 'Kaprodi' }}</span>
                </div>
            </a>
            <a href="/profile" title="Edit Profil" class="p-2 bg-[#6196aa]/10 text-[#6196aa] hover:bg-[#6196aa] hover:text-[#f9f5ed] rounded-lg transition-colors shadow-sm ml-2 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
        </div>
        </div>

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="/kaprodi/dashboard" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                Dashboard
            </a>

            <a href="/kaprodi/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>
        </nav>

        <div class="p-4 border-t border-[#6196aa]/20">
            
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 font-semibold text-sm transition-colors cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-grow flex flex-col min-w-0">
        <!-- Top Navbar -->
        <header class="bg-[#f9f5ed]/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-6 md:px-8 flex items-center justify-between sticky top-0 z-30">
            <div class="flex items-center gap-2">
                <a href="/kaprodi/draf-pengadaan" class="p-2 hover:bg-gray-200 rounded-lg text-gray-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <div>
                    <h2 class="text-xl font-bold text-[#20394a]">Review Item Draf</h2>
                    <div class="text-xs text-gray-500 flex items-center gap-2">
                        <a href="/kaprodi/dashboard" class="hover:text-[#6196aa]">Dashboard</a>
                        <span>/</span>
                        <a href="/kaprodi/draf-pengadaan" class="hover:text-[#6196aa]">Draf Pengadaan</a>
                        <span>/</span>
                        <span class="font-medium text-[#20394a]">Review Item</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-6 md:p-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-7xl">
            <!-- Alert if finalized -->
            @if($draft['status'] !== 'diajukan')
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-xl shadow-sm flex items-center gap-3">
                <svg class="h-6 w-6 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <h4 class="font-bold text-[#20394a] text-sm">Draf Telah Difinalisasi</h4>
                    <p class="text-xs text-gray-600">Draf pengadaan ini berstatus <strong>{{ ucfirst($draft['status']) }}</strong>. Data telah dikunci dan tidak dapat diubah kembali.</p>
                </div>
            </div>
            @else
            <!-- Notification Banner for all items reviewed -->
            <div id="completionBanner" class="hidden bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-xl shadow-sm justify-between items-center gap-3">
                <div class="flex items-center gap-3">
                    <svg class="h-6 w-6 text-emerald-500 shrink-0 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <div>
                        <h4 class="font-bold text-emerald-800 text-sm">Semua Item Selesai Direview!</h4>
                        <p class="text-xs text-emerald-600">Semua item usulan telah disetujui atau ditolak. Silakan lanjutkan untuk memfinalisasi draf ini.</p>
                    </div>
                </div>
                <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/finalize" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-colors shadow-sm shrink-0">
                    Lanjut ke Finalisasi
                </a>
            </div>
            @endif

            <!-- Draft Info -->
            <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">No. Pengajuan</span>
                    <span class="text-lg font-bold text-[#20394a]">PO-{{ $draft['tahun_pengadaan'] }}-{{ str_pad($draft['id_draft'], 4, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Pengusul</span>
                    <span class="text-lg font-bold text-gray-700">{{ $draft['nama_pengaju'] ?? 'Kepala Lab' }}</span>
                </div>
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Tahun Pengadaan</span>
                    <span class="text-lg font-bold text-gray-700">{{ $draft['tahun_pengadaan'] }}</span>
                </div>
                <div>
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Status Draft</span>
                    <span class="mt-1 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border 
                        @if($draft['status'] === 'diajukan') bg-amber-50 text-amber-700 border-amber-200 
                        @elseif($draft['status'] === 'disetujui') bg-emerald-50 text-emerald-700 border-emerald-200 
                        @else bg-red-50 text-red-700 border-red-200 @endif">
                        {{ ucfirst($draft['status']) }}
                    </span>
                </div>
            </div>

            <!-- Items Table -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-[#c9ccc3]/30 flex justify-between items-center bg-[#f9f5ed]/30">
                    <h3 class="font-bold text-lg text-[#20394a]">Daftar Barang yang Diajukan</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="px-6 py-4">Barang</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Harga Satuan</th>
                                <th class="px-6 py-4">Jumlah</th>
                                <th class="px-6 py-4">Subtotal</th>
                                <th class="px-6 py-4 text-center">Status Persetujuan</th>
                                @if($draft['status'] === 'diajukan')
                                <th class="px-6 py-4 text-center">Keputusan</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @foreach ($draft['items'] as $item)
                            <tr class="hover:bg-gray-50/50 transition-colors" id="row-{{ $item['id_detail'] }}">
                                <td class="px-6 py-4">
                                    @if(!empty($item['link_pembelian']))
                                    <a href="{{ $item['link_pembelian'] }}" target="_blank" class="font-bold text-[#6196aa] hover:text-[#20394a] hover:underline inline-flex items-center gap-1.5">
                                        {{ $item['nama_barang'] }}
                                        <svg class="w-3.5 h-3.5 text-[#6196aa]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                    @else
                                    <div class="font-bold text-gray-800">{{ $item['nama_barang'] }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $item['jenis_barang'] }}</td>
                                <td class="px-6 py-4 text-gray-600">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $item['jumlah'] }} Unit</td>
                                <td class="px-6 py-4 font-bold text-[#20394a]">Rp {{ number_format($item['jumlah'] * $item['harga'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span id="badge-{{ $item['id_detail'] }}" class="transition-badge inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border 
                                        @if($item['status_persetujuan'] === 'pending') bg-amber-50 text-amber-700 border-amber-200 
                                        @elseif($item['status_persetujuan'] === 'disetujui') bg-emerald-50 text-emerald-700 border-emerald-200 
                                        @else bg-red-50 text-red-700 border-red-200 @endif">
                                        {{ ucfirst($item['status_persetujuan']) }}
                                    </span>
                                </td>
                                @if($draft['status'] === 'diajukan')
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2" id="actions-{{ $item['id_detail'] }}">
                                        @if($item['status_persetujuan'] === 'pending')
                                            <button onclick="submitReview({{ $item['id_detail'] }}, 'disetujui')" 
                                                class="approve-btn inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                Setujui
                                            </button>
                                            <button onclick="submitReview({{ $item['id_detail'] }}, 'ditolak')" 
                                                class="reject-btn inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                                Tolak
                                            </button>
                                        @elseif($item['status_persetujuan'] === 'disetujui')
                                            <button onclick="submitReview({{ $item['id_detail'] }}, 'ditolak')" 
                                                class="reject-btn inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                                Tolak Barang
                                            </button>
                                        @elseif($item['status_persetujuan'] === 'ditolak')
                                            <button onclick="submitReview({{ $item['id_detail'] }}, 'disetujui')" 
                                                class="approve-btn inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                Setujui Barang
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 bg-white p-6 rounded-2xl border border-[#c9ccc3]/30 shadow-sm">
                <a href="/kaprodi/draf-pengadaan" class="px-5 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors w-full sm:w-auto text-center cursor-pointer">
                    &larr; Kembali ke Daftar Draf
                </a>
                
                @if($draft['status'] === 'diajukan')
                <div class="w-full sm:w-auto flex flex-col sm:flex-row gap-2">
                    <a href="/kaprodi/draf-pengadaan/{{ $draft['id_draft'] }}/finalize" id="btnFinalize" 
                        class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-bold shadow-lg transition-all duration-200 text-center cursor-pointer">
                        Lanjut ke Finalisasi &rarr;
                    </a>
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- CSRF Token for fetch -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // Track the items state locally in JS for interactive UI updates
        const items = @json($draft['items']);
        const draftStatus = "{{ $draft['status'] }}";

        document.addEventListener("DOMContentLoaded", function() {
            if (draftStatus === 'diajukan') {
                checkCompletion();
            }
        });

        async function submitReview(idDetail, approvalStatus) {
            const btnGroup = document.getElementById(`actions-${idDetail}`);
            const originalHTML = btnGroup.innerHTML;
            
            // Show spinner inside button group
            btnGroup.innerHTML = `<span class="text-xs font-semibold text-gray-400 animate-pulse">Menyimpan...</span>`;

            try {
                const response = await fetch('/kaprodi/draf-pengadaan/review-item', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        id_detail: idDetail,
                        status_persetujuan: approvalStatus
                    })
                });

                const result = await response.json();
                
                if (response.ok && result.success) {
                    // Update internal item status
                    const item = items.find(i => i.id_detail == idDetail);
                    if (item) {
                        item.status_persetujuan = approvalStatus;
                    }

                    // Update UI Badge
                    const badge = document.getElementById(`badge-${idDetail}`);
                    badge.innerText = approvalStatus.charAt(0).toUpperCase() + approvalStatus.slice(1);
                    
                    // Reset styling classes
                    badge.className = "transition-badge inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold border";
                    if (approvalStatus === 'disetujui') {
                        badge.classList.add('bg-emerald-50', 'text-emerald-700', 'border-emerald-200');
                    } else {
                        badge.classList.add('bg-red-50', 'text-red-700', 'border-red-200');
                    }

                    // Re-render actions to show only the opposite choice button (acting as edit toggle)
                    btnGroup.innerHTML = renderActionButtons(idDetail, approvalStatus);
                    
                    // Check if all items reviewed
                    checkCompletion();
                } else {
                    alert(result.message || 'Gagal menyimpan persetujuan.');
                    btnGroup.innerHTML = originalHTML;
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan jaringan.');
                btnGroup.innerHTML = originalHTML;
            }
        }

        function checkCompletion() {
            const pendingItems = items.filter(i => i.status_persetujuan === 'pending');
            const hasPending = pendingItems.length > 0;
            
            const banner = document.getElementById('completionBanner');
            const btnFinalize = document.getElementById('btnFinalize');

            if (banner) {
                if (!hasPending) {
                    banner.classList.remove('hidden');
                    banner.classList.add('flex');
                    if (btnFinalize) {
                        btnFinalize.className = "px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-bold shadow-lg transition-all duration-200 text-center cursor-pointer";
                    }
                } else {
                    banner.classList.add('hidden');
                    banner.classList.remove('flex');
                    if (btnFinalize) {
                        btnFinalize.className = "px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-bold shadow-lg transition-all duration-200 text-center cursor-pointer";
                    }
                }
            }
        }

        function renderActionButtons(idDetail, status) {
            if (status === 'disetujui') {
                return `
                    <button onclick="submitReview(${idDetail}, 'ditolak')" 
                        class="reject-btn inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Tolak Barang
                    </button>
                `;
            } else if (status === 'ditolak') {
                return `
                    <button onclick="submitReview(${idDetail}, 'disetujui')" 
                        class="approve-btn inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Setujui Barang
                    </button>
                `;
            } else {
                return `
                    <button onclick="submitReview(${idDetail}, 'disetujui')" 
                        class="approve-btn inline-flex items-center gap-1 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Setujui
                    </button>
                    <button onclick="submitReview(${idDetail}, 'ditolak')" 
                        class="reject-btn inline-flex items-center gap-1 px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-bold transition-all duration-200 hover:scale-105 shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Tolak
                    </button>
                `;
            }
        }
    </script>
</body>
</html>
