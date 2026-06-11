<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Draf Pengadaan - Labventory</title>
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

            <a href="/kaprodi/daftar-inventaris" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
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
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Draf Pengadaan Barang</h2>
                <div class="text-xs text-gray-500 flex items-center gap-2">
                    <a href="/kaprodi/dashboard" class="hover:text-[#6196aa]">Dashboard</a>
                    <span>/</span>
                    <span class="font-medium text-[#20394a]">Draf Pengadaan</span>
                </div>
            </div>
        </header>

        <div class="p-6 md:p-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-7xl">
            <!-- Header Card -->
            <div class="bg-white rounded-2xl p-6 border border-[#c9ccc3]/30 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h3 class="font-bold text-[#20394a] text-lg">Review Draf Pengadaan dari Kepala Lab</h3>
                    <p class="text-sm text-gray-500">Berikut adalah daftar usulan pengadaan barang dari Kepala Laboratorium. Anda dapat meninjau detail barang yang diajukan serta menyetujui, menolak, atau memfinalisasi draf tersebut.</p>
                </div>
            </div>            <!-- Drafts List -->
            <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-[#c9ccc3]/30 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-[#f9f5ed]/30">
                    <h3 class="font-bold text-lg text-[#20394a]">Daftar Pengajuan</h3>
                </div>

                <!-- Filter & Search Bar -->
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 bg-white">
                    <div class="flex flex-wrap gap-4 items-center w-full md:w-auto">
                        <!-- Filter Tahun -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-gray-500">Tahun:</span>
                            <select id="filter-year" onchange="filterAndRender()" class="pl-3 pr-8 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 bg-white shadow-sm cursor-pointer">
                                <option value="all">Semua Tahun</option>
                            </select>
                        </div>
                        
                        <!-- Filter Status -->
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-gray-500">Status:</span>
                            <select id="filter-status" onchange="filterAndRender()" class="pl-3 pr-8 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 bg-white shadow-sm cursor-pointer">
                                <option value="all">Semua Status</option>
                                <option value="perlu_review">Perlu Review</option>
                                <option value="siap_finalisasi">Siap Finalisasi</option>
                                <option value="disetujui">Disetujui</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <div class="relative w-full md:w-64">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" id="search-input" onkeyup="filterAndRender()" placeholder="Cari nomor/pengusul..." class="pl-9 pr-4 py-2 w-full border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 shadow-sm">
                        </div>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="px-6 py-4">No. Pengajuan</th>
                                <th class="px-6 py-4">Pengaju</th>
                                <th class="px-6 py-4">Tahun Pengadaan</th>
                                <th class="px-6 py-4">Jumlah Item</th>
                                <th class="px-6 py-4">Total Estimasi</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="drafts-tbody" class="divide-y divide-gray-100 text-sm">
                            <!-- Data dynamically rendered by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const drafts = @json($drafts);
            const tbody = document.getElementById('drafts-tbody');

            // Populate unique years in dropdown
            const filterYear = document.getElementById('filter-year');
            const years = [...new Set(drafts.map(d => d.tahun_pengadaan))].sort((a, b) => b - a);
            years.forEach(year => {
                const opt = document.createElement('option');
                opt.value = year;
                opt.textContent = year;
                filterYear.appendChild(opt);
            });

            window.filterAndRender = () => {
                const selectedYear = document.getElementById('filter-year').value;
                const selectedStatus = document.getElementById('filter-status').value;
                const searchQuery = document.getElementById('search-input').value.toLowerCase().trim();

                tbody.innerHTML = '';

                let filtered = drafts.map(draft => {
                    // Precompute draft metrics
                    let totalBiaya = 0;
                    let pendingCount = 0;
                    draft.items.forEach(item => {
                        totalBiaya += (item.jumlah * item.harga);
                        if (item.status_persetujuan === 'pending') {
                            pendingCount++;
                        }
                    });

                    // Determine UI status category
                    let statusCategory = draft.status; // 'disetujui', 'ditolak'
                    if (draft.status === 'diajukan') {
                        statusCategory = pendingCount > 0 ? 'perlu_review' : 'siap_finalisasi';
                    }

                    return {
                        ...draft,
                        totalBiaya,
                        pendingCount,
                        statusCategory,
                        noPengajuan: `PO-${draft.tahun_pengadaan}-${draft.id_draft.toString().padStart(4, '0')}`
                    };
                });

                // Apply Filters
                if (selectedYear !== 'all') {
                    filtered = filtered.filter(d => d.tahun_pengadaan.toString() === selectedYear);
                }

                if (selectedStatus !== 'all') {
                    filtered = filtered.filter(d => d.statusCategory === selectedStatus);
                }

                if (searchQuery !== '') {
                    filtered = filtered.filter(d => 
                        d.noPengajuan.toLowerCase().includes(searchQuery) ||
                        (d.nama_pengaju && d.nama_pengaju.toLowerCase().includes(searchQuery))
                    );
                }

                if (filtered.length === 0) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                Tidak ada draf pengadaan yang cocok dengan filter atau pencarian Anda.
                            </td>
                        </tr>
                    `;
                    return;
                }

                filtered.forEach(d => {
                    let statusHtml = '';
                    let actionHtml = '';

                    if (d.status === 'diajukan') {
                        if (d.pendingCount > 0) {
                            statusHtml = `
                                <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 px-3 py-1 rounded-full text-xs font-bold border border-amber-200">
                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                    Perlu Review (${d.pendingCount})
                                </span>
                            `;
                            actionHtml = `
                                <a href="/kaprodi/draf-pengadaan/${d.id_draft}/review" class="inline-flex items-center gap-1 px-4 py-2 bg-[#20394a] text-white hover:bg-[#6196aa] rounded-xl text-xs font-bold transition-all duration-200 shadow-sm cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                                    Review Item
                                </a>
                            `;
                        } else {
                            statusHtml = `
                                <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-xs font-bold border border-blue-200">
                                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                    Siap Finalisasi
                                </span>
                            `;
                            actionHtml = `
                                <a href="/kaprodi/draf-pengadaan/${d.id_draft}/finalize" class="inline-flex items-center gap-1 px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 rounded-xl text-xs font-bold transition-all duration-200 shadow-sm cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                                    Finalisasi Draf
                                </a>
                            `;
                        }
                    } else if (d.status === 'disetujui') {
                        statusHtml = `
                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold border border-emerald-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Disetujui
                            </span>
                        `;
                        actionHtml = `
                            <a href="/kaprodi/draf-pengadaan/${d.id_draft}/review" class="inline-flex items-center gap-1 px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-xl text-xs font-bold transition-all duration-200 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Lihat Detail
                            </a>
                        `;
                    } else if (d.status === 'ditolak') {
                        statusHtml = `
                            <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                Ditolak
                            </span>
                        `;
                        actionHtml = `
                            <a href="/kaprodi/draf-pengadaan/${d.id_draft}/review" class="inline-flex items-center gap-1 px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-xl text-xs font-bold transition-all duration-200 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Lihat Detail
                            </a>
                        `;
                    }

                    const tr = document.createElement('tr');
                    tr.className = 'hover:bg-gray-50/50 transition-colors';
                    tr.innerHTML = `
                        <td class="px-6 py-4 font-semibold text-[#20394a]">${d.noPengajuan}</td>
                        <td class="px-6 py-4 font-medium text-gray-700">${d.nama_pengaju || 'Kepala Lab'}</td>
                        <td class="px-6 py-4 text-gray-600">${d.tahun_pengadaan}</td>
                        <td class="px-6 py-4 font-medium text-gray-800">${d.items.length} Item</td>
                        <td class="px-6 py-4 font-semibold text-gray-700">Rp ${d.totalBiaya.toLocaleString('id-ID')}</td>
                        <td class="px-6 py-4 text-center">${statusHtml}</td>
                        <td class="px-6 py-4 text-right flex items-center justify-end gap-2">${actionHtml}</td>
                    `;
                    tbody.appendChild(tr);
                });
            };

            filterAndRender();
        });
    </script>
</body>
</html>
