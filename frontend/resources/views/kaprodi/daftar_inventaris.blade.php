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

        <nav class="flex-grow p-4 space-y-2 mt-4">
            <a href="/kaprodi/dashboard" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                Dashboard
            </a>

            <a href="/kaprodi/daftar-inventaris" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>

            <a href="/kaprodi/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
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
            <h2 class="text-2xl font-bold text-[#20394a] uppercase tracking-wider">Daftar Inventaris</h2>
            <div class="flex items-center gap-4">
                @include('components.notification_bell')
            </div>
        </header>

        <div class="px-6 md:px-8 pb-8 flex-grow overflow-y-auto w-full mx-auto space-y-6 max-w-[1400px]">
            
            <!-- Filter & Search Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 pt-2 border-b border-gray-200 pb-4">
                <div class="flex flex-wrap gap-4 items-center w-full md:w-auto">
                    <!-- Filter Ruangan -->
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-semibold text-gray-500">Ruangan:</span>
                        <select id="filter-room" onchange="filterAndRender()" class="pl-3 pr-8 py-2 border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 bg-white shadow-sm cursor-pointer">
                            <option value="all">Semua Ruangan</option>
                        </select>
                    </div>
                </div>
                
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative w-full md:w-64">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" id="search-input" onkeyup="filterAndRender()" placeholder="Cari nama barang..." class="pl-9 pr-4 py-2 w-full border border-gray-300 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] text-gray-700 shadow-sm">
                    </div>
                </div>
            </div>

            <div id="inventory-container" class="space-y-6">
                <!-- Data will be loaded here dynamically -->
                <div class="text-center py-10 text-gray-500">Memuat data dari server...</div>
            </div>

        </div>
    </main>

    <!-- Group Items Modal -->
    <div id="groupItemsModal" class="fixed inset-0 z-[80] hidden items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto pt-10 pb-10">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-3xl mx-4 overflow-hidden flex flex-col max-h-full border border-gray-100">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-[#f9f5ed]/50 shrink-0">
                <div>
                    <h3 id="modal-group-title" class="text-xl font-bold text-[#20394a]">Nama Barang</h3>
                    <p id="modal-group-subtitle" class="text-sm font-semibold text-gray-500 mt-1">Total: 0 Unit | Rusak: 0</p>
                </div>
                <button onclick="closeGroupModal()" class="text-gray-400 hover:text-red-500 transition-colors bg-white p-2 rounded-full shadow-sm border border-gray-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-0 overflow-y-auto flex-grow bg-gray-50 relative max-h-[60vh]">
                <table class="w-full text-left text-sm border-collapse">
                    <thead class="sticky top-0 z-10">
                        <tr class="bg-white text-gray-500 uppercase tracking-wider text-xs font-bold border-b border-gray-200 shadow-sm">
                            <th class="px-6 py-4">Nomor Label</th>
                            <th class="px-6 py-4">Kondisi</th>
                        </tr>
                    </thead>
                    <tbody id="modal-group-tbody" class="divide-y divide-gray-100 bg-white">
                        <!-- Data injected by JS -->
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-gray-100 bg-white text-right shrink-0">
                <button onclick="closeGroupModal()" class="px-5 py-2.5 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const container = document.getElementById('inventory-container');
            let inventoryData = [];
            let filteredInventoryData = [];
            let labPagination = {};

            const renderPagination = (totalItems, itemsPerPage, currentPage, roomId) => {
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                if (totalPages <= 1) return '';

                let pagesHtml = '';
                
                // Prev button
                pagesHtml += `<button onclick="changePage('${roomId}', ${currentPage - 1})" class="px-3 py-1.5 rounded-lg border ${currentPage === 1 ? 'border-gray-200 text-gray-400 cursor-not-allowed' : 'border-[#c9ccc3] text-[#20394a] hover:bg-[#6196aa]/10'}" ${currentPage === 1 ? 'disabled' : ''}>&lt;</button>`;
                
                for (let i = 1; i <= totalPages; i++) {
                    if (i === currentPage) {
                        pagesHtml += `<button class="px-3 py-1.5 rounded-lg bg-[#20394a] text-[#f9f5ed] font-medium shadow-sm">${i}</button>`;
                    } else {
                        if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                            pagesHtml += `<button onclick="changePage('${roomId}', ${i})" class="px-3 py-1.5 rounded-lg border border-[#c9ccc3] text-[#20394a] hover:bg-[#6196aa]/10">${i}</button>`;
                        } else if (i === currentPage - 2 || i === currentPage + 2) {
                            pagesHtml += `<span class="px-1 text-gray-500">...</span>`;
                        }
                    }
                }
                
                // Next button
                pagesHtml += `<button onclick="changePage('${roomId}', ${currentPage + 1})" class="px-3 py-1.5 rounded-lg border ${currentPage === totalPages ? 'border-gray-200 text-gray-400 cursor-not-allowed' : 'border-[#c9ccc3] text-[#20394a] hover:bg-[#6196aa]/10'}" ${currentPage === totalPages ? 'disabled' : ''}>&gt;</button>`;
                
                return `<div class="flex items-center justify-end mt-4 gap-1 px-6 pb-6">${pagesHtml}</div>`;
            };

            window.changePage = (roomId, newPage) => {
                labPagination[roomId] = newPage;
                renderData();
            };

            window.toggleRoom = (roomId) => {
                const content = document.getElementById(`room-content-${roomId}`);
                const icon = document.getElementById(`room-icon-${roomId}`);
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            };

            window.filterAndRender = () => {
                const selectedRoomId = document.getElementById('filter-room').value;
                const searchQuery = document.getElementById('search-input').value.toLowerCase().trim();

                // Clone / Map to avoid mutating original list structure
                filteredInventoryData = inventoryData.map(room => {
                    const filteredBarang = room.barang.filter(item => {
                        return item.nama_barang.toLowerCase().includes(searchQuery);
                    });
                    
                    return {
                        ...room,
                        barang: filteredBarang
                    };
                });

                // Filter by room ID if selected
                if (selectedRoomId !== 'all') {
                    filteredInventoryData = filteredInventoryData.filter(room => room.id.toString() === selectedRoomId);
                }

                renderData();
            };

            const renderData = () => {
                container.innerHTML = '';
                
                let visibleRooms = 0;
                
                filteredInventoryData.forEach((room) => {
                    const searchQuery = document.getElementById('search-input').value.trim();
                    // If searching, hide rooms that have no matching items
                    if (searchQuery !== '' && room.barang.length === 0) {
                        return;
                    }
                    
                    visibleRooms++;
                    
                    if (!labPagination[room.id]) labPagination[room.id] = 1;
                    
                    const itemsPerPage = 4; // 1 row on xl screens
                    const currentPage = labPagination[room.id];
                    const start = (currentPage - 1) * itemsPerPage;
                    const end = start + itemsPerPage;
                    const currentItems = room.barang.slice(start, end);
                    
                    let cardsHtml = '';
                    if (currentItems.length === 0) {
                        cardsHtml = '<div class="col-span-full text-center py-8 text-gray-500 font-medium bg-white/30 backdrop-blur-sm rounded-xl border border-white/40">Tidak ada barang berlabel di ruangan ini.</div>';
                    } else {
                        currentItems.forEach(item => {
                            let badgeHtml = '';
                            if (item.unit_rusak > 0) {
                                badgeHtml = `
                                    <div class="absolute top-3 right-3 z-10">
                                        <span class="bg-red-50 text-red-600 text-[10px] font-bold px-3 py-1.5 rounded-full shadow-sm border border-red-200 flex items-center gap-1.5">
                                            ${item.unit_rusak} Rusak
                                        </span>
                                    </div>
                                `;
                            }
                            
                            cardsHtml += `
                            <div onclick="openGroupModal(${room.id}, ${item.id_detail})" class="cursor-pointer block bg-white/35 backdrop-blur-lg border border-white/40 rounded-xl overflow-hidden hover:-translate-y-1 hover:scale-[1.02] hover:border-[#6196aa] hover:shadow-xl transition-all duration-300 group relative">
                                ${badgeHtml}
                                <div class="aspect-square bg-[#f9f5ed]/50 backdrop-blur-sm w-full flex items-center justify-center p-6 relative">
                                    <svg class="w-20 h-20 text-[#6196aa]/80 group-hover:text-[#6196aa] group-hover:scale-105 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/></svg>
                                    <div class="absolute bottom-3 right-3 bg-white border border-gray-100 text-[#20394a] px-3 py-1 rounded-lg text-sm font-bold shadow-sm">
                                        ${item.total_unit} Unit
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="bg-[#20394a]/5 text-[#20394a] text-[10px] font-bold px-2 py-1 rounded-md uppercase tracking-wide border border-[#20394a]/10">${item.jenis_barang || 'Kategori'}</span>
                                        <span class="text-xs font-semibold text-emerald-600">${item.total_unit - item.unit_rusak} Bagus</span>
                                    </div>
                                    <h4 class="font-bold text-[#20394a] mt-3 group-hover:text-[#6196aa] transition-colors truncate text-lg" title="${item.nama_barang}">${item.nama_barang}</h4>
                                    <p class="text-xs text-gray-500 mt-1 font-medium">Klik untuk lihat rincian ${item.total_unit} barang</p>
                                </div>
                            </div>
                            `;
                        });
                    }

                    const paginationHtml = renderPagination(room.barang.length, itemsPerPage, currentPage, room.id);

                    const groupHtml = `
                    <div class="border border-white/40 rounded-xl overflow-hidden bg-white/20 backdrop-blur-lg shadow-sm">
                        <div onclick="toggleRoom('${room.id}')" class="bg-gradient-to-r from-white/40 to-white/10 backdrop-blur-md px-6 py-4 flex items-center justify-between border-b border-white/40 cursor-pointer group shadow-sm transition-colors hover:bg-white/30">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-[#20394a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <h3 class="font-bold text-lg text-[#20394a]">${room.nama}</h3>
                                <div class="flex gap-2 ml-2 hidden md:flex">
                                    <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-semibold rounded-full">${room.barang.length} jenis alat</span>
                                    <span class="text-xs text-gray-400 self-center">|</span>
                                    <span class="text-xs text-gray-500 self-center">${room.lokasi}</span>
                                </div>
                            </div>
                            <svg id="room-icon-${room.id}" class="w-5 h-5 text-gray-400 group-hover:text-[#20394a] transform transition-transform duration-300 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        
                        <div id="room-content-${room.id}" class="transition-all duration-300 origin-top">
                            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                ${cardsHtml}
                            </div>
                            ${paginationHtml}
                        </div>
                    </div>
                    `;
                    
                    container.insertAdjacentHTML('beforeend', groupHtml);
                });

                if (visibleRooms === 0) {
                    container.innerHTML = '<div class="text-center py-12 text-gray-500 font-medium bg-white rounded-2xl border border-gray-200/50 shadow-sm">Tidak ada barang yang cocok dengan filter atau pencarian Anda.</div>';
                }
            };

            const fetchData = async () => {
                try {
                    const response = await fetch('http://localhost:3000/api/staf_admin/inventaris');
                    const result = await response.json();
                    
                    if (result.success && result.data.length > 0) {
                        inventoryData = result.data;
                        
                        // Populate filter dropdown
                        const filterRoom = document.getElementById('filter-room');
                        filterRoom.innerHTML = '<option value="all">Semua Ruangan</option>';
                        inventoryData.forEach(room => {
                            const opt = document.createElement('option');
                            opt.value = room.id;
                            opt.textContent = room.nama;
                            filterRoom.appendChild(opt);
                        });

                        filterAndRender();
                    } else {
                        container.innerHTML = '<div class="text-center py-10 text-gray-500">Tidak ada data inventaris.</div>';
                    }
                } catch (error) {
                    console.error('Error fetching inventory:', error);
                    container.innerHTML = '<div class="text-center py-10 text-red-500">Gagal memuat data dari server.</div>';
                }
            };

            window.closeGroupModal = () => {
                document.getElementById('groupItemsModal').classList.add('hidden');
                document.getElementById('groupItemsModal').classList.remove('flex');
            };

            window.openGroupModal = (roomId, detailId) => {
                const room = inventoryData.find(r => r.id === roomId);
                if (!room) return;
                const group = room.barang.find(b => b.id_detail === detailId);
                if (!group) return;

                document.getElementById('modal-group-title').textContent = group.nama_barang;
                document.getElementById('modal-group-subtitle').textContent = `Total: ${group.total_unit} Unit | Rusak: ${group.unit_rusak}`;

                const tbody = document.getElementById('modal-group-tbody');
                let html = '';
                group.items.forEach(it => {
                    let condClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                    let condText = 'Bagus';
                    if (it.kondisi !== 'baik') {
                        condClass = 'bg-red-50 text-red-700 border-red-200';
                        condText = 'Rusak';
                    }
                    html += `
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-[#20394a]">${it.nomor_label || '-'}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold border ${condClass}">
                                    ${condText}
                                </span>
                            </td>
                        </tr>
                    `;
                });
                tbody.innerHTML = html;
                
                document.getElementById('groupItemsModal').classList.remove('hidden');
                document.getElementById('groupItemsModal').classList.add('flex');
            };

            fetchData();
        });
    </script>
</body>
</html>
