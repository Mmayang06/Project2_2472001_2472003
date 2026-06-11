<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Inventaris - Labventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Portal Staf Administrasi</span>
                    <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">Staf Admin - Sarah J.</span>
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
            <a href="/stafadmin" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                Dashboard
            </a>

            <a href="/stafadmin/daftar-inventaris" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>

            <a href="/stafadmin/draf-pengadaan" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white cursor-pointer">
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                Draf Pengadaan
            </a>

        </nav>

        <div class="p-4 border-t border-[#6196aa]/20">
            
            
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-[#c9ccc3]/20 hover:bg-[#c9ccc3]/10 text-xs font-semibold text-[#c9ccc3] hover:text-[#f9f5ed] transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Logout
            </a>
            <form id="logout-form" action="/logout" method="POST" class="hidden">
                @csrf
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
                <div class="flex gap-4">
                    <button id="tab-all" onclick="switchTab('all')" class="px-4 py-2 font-bold text-[#20394a] border-b-2 border-[#20394a] transition-all">Semua Inventaris</button>
                    <button id="tab-unlabeled" onclick="switchTab('unlabeled')" class="px-4 py-2 font-medium text-gray-500 border-b-2 border-transparent hover:text-[#20394a] transition-all flex items-center gap-2">
                        Belum Dilabeli
                        <span id="badge-unlabeled" class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full hidden">0</span>
                    </button>
                </div>
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative w-full md:w-64">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" placeholder="Cari barang..." class="pl-9 pr-4 py-2 w-full border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6196aa] text-gray-700">
                    </div>
                </div>
            </div>

            <div id="inventory-container" class="space-y-6">
                <!-- Data will be loaded here dynamically -->
                <div class="text-center py-10 text-gray-500">Memuat data dari server...</div>
            </div>
            
            <div id="unlabeled-container" class="space-y-6 hidden">
                <div class="overflow-x-auto bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-500 text-xs font-bold uppercase tracking-wider border-b border-gray-200">
                                <th class="px-6 py-4">ID / Tgl Terima</th>
                                <th class="px-6 py-4">Nama Barang</th>
                                <th class="px-6 py-4">Ruangan</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="unlabeled-tbody" class="divide-y divide-gray-100 text-sm">
                            <!-- Data -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Verify QR Modal -->
    <div id="verifyQrModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto pt-10 pb-10">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden flex flex-col max-h-full">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-[#f9f5ed]/50 shrink-0">
                <h3 class="text-lg font-bold text-[#20394a]">Verifikasi Otorisasi QR</h3>
                <button onclick="closeVerifyModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto flex-grow">
                <form id="verifyQrForm" onsubmit="handleVerifyQr(event)">
                    <input type="hidden" id="modal_qr_id_inventaris">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">QR Universitas</label>
                        
                        <!-- Upload Area -->
                        <div class="mt-2 mb-4">
                            <label for="qr_image_upload" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors relative">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                    <p class="mb-1 text-sm text-gray-500 font-semibold">Klik untuk upload gambar QR Code</p>
                                    <p class="text-xs text-gray-500">PNG, JPG, atau JPEG</p>
                                </div>
                                <input id="qr_image_upload" type="file" accept="image/*" class="hidden" onchange="handleQrUpload(event)" />
                            </label>
                        </div>

                        <div class="flex items-center gap-4 mb-4">
                            <div class="h-px bg-gray-200 flex-1"></div>
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Atau masukkan kode manual</span>
                            <div class="h-px bg-gray-200 flex-1"></div>
                        </div>

                        <input type="text" id="modal_qr_univ" required placeholder="Masukkan teks kode QR secara manual..." class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                        <p class="text-xs text-gray-500 mt-2">Otorisasi universitas diperlukan sebelum dapat memberikan label barang.</p>
                    </div>
                    <canvas id="qr_canvas" hidden></canvas>
                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" onclick="closeVerifyModal()" class="px-5 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                        <button type="submit" id="btn_verify_qr" class="px-5 py-2.5 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">
                            Verifikasi QR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Assign Label Modal -->
    <div id="assignLabelModal" class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/50 backdrop-blur-sm overflow-y-auto pt-10 pb-10">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden flex flex-col max-h-full">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-emerald-50 shrink-0">
                <h3 class="text-lg font-bold text-emerald-800">QR Tervalidasi! Berikan Label</h3>
                <button onclick="closeAssignModal()" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 overflow-y-auto flex-grow">
                <form id="assignLabelForm">
                    <input type="hidden" id="modal_assign_id_inventaris">
                    <input type="hidden" id="modal_assign_qr_univ">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Label</label>
                        <input type="text" id="modal_nomor_label" required placeholder="Contoh: ELEK-001" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#6196aa] focus:ring-[#6196aa] text-sm p-2.5 border">
                        <p class="text-xs text-gray-500 mt-2">Sistem akan secara otomatis men-generate QR Code berdasarkan nomor label yang dimasukkan.</p>
                    </div>
                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <button type="button" onclick="closeAssignModal()" class="px-5 py-2.5 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Batal</button>
                        <button type="button" onclick="handleAssignLabel(event)" id="btn_assign_label" class="px-5 py-2.5 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">
                            Simpan Label
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 overflow-hidden p-6 text-center">
            <div class="w-16 h-16 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h3 class="text-xl font-bold text-[#20394a] mb-2" id="successModalTitle">Berhasil</h3>
            <p class="text-sm text-gray-500 mb-6" id="successModalMsg">Tindakan berhasil dilakukan.</p>
            <button onclick="closeSuccessModal()" class="w-full px-5 py-2.5 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">Tutup</button>
        </div>
    </div>

    <!-- Duplicate Label Modal -->
    <div id="duplicateModal" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 overflow-hidden p-6">
            <div class="flex items-start gap-4 mb-4">
                <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-full flex-shrink-0 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-[#20394a] mb-1">Nomor Label Sudah Digunakan!</h3>
                    <p class="text-sm text-gray-600">Nomor label <strong id="dup-old-label"></strong> sudah dipakai oleh barang lain. Sistem merekomendasikan menggunakan nomor label berikut:</p>
                    
                    <div class="mt-4 p-3 bg-gray-50 border border-gray-200 rounded-lg text-center">
                        <span class="text-sm text-gray-500 block mb-1">Saran Nomor Label:</span>
                        <span class="text-xl font-bold text-[#20394a]" id="dup-suggestion">...</span>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 mt-4">
                <button type="button" onclick="closeDuplicateModal()" class="px-4 py-2 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors">Ketik Ulang Manual</button>
                <button type="button" onclick="useSuggestionLabel()" class="px-4 py-2 bg-[#20394a] text-white rounded-xl text-sm font-semibold hover:bg-[#6196aa] shadow-lg transition-colors">Gunakan Saran Ini</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const container = document.getElementById('inventory-container');
            let inventoryData = [];
            let labPagination = {};

            const renderPagination = (totalItems, itemsPerPage, currentPage, roomIndex) => {
                const totalPages = Math.ceil(totalItems / itemsPerPage);
                if (totalPages <= 1) return '';

                let pagesHtml = '';
                
                // Prev button
                pagesHtml += `<button onclick="changePage(${roomIndex}, ${currentPage - 1})" class="px-3 py-1.5 rounded-lg border ${currentPage === 1 ? 'border-gray-200 text-gray-400 cursor-not-allowed' : 'border-[#c9ccc3] text-[#20394a] hover:bg-[#6196aa]/10'}" ${currentPage === 1 ? 'disabled' : ''}>&lt;</button>`;
                
                for (let i = 1; i <= totalPages; i++) {
                    if (i === currentPage) {
                        pagesHtml += `<button class="px-3 py-1.5 rounded-lg bg-[#20394a] text-[#f9f5ed] font-medium shadow-sm">${i}</button>`;
                    } else {
                        // Show first, last, and pages around current page
                        if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                            pagesHtml += `<button onclick="changePage(${roomIndex}, ${i})" class="px-3 py-1.5 rounded-lg border border-[#c9ccc3] text-[#20394a] hover:bg-[#6196aa]/10">${i}</button>`;
                        } else if (i === currentPage - 2 || i === currentPage + 2) {
                            let isEllipsis = true;
                            // only show ellipsis once
                            pagesHtml += `<span class="px-1 text-gray-500">...</span>`;
                        }
                    }
                }
                
                // Next button
                pagesHtml += `<button onclick="changePage(${roomIndex}, ${currentPage + 1})" class="px-3 py-1.5 rounded-lg border ${currentPage === totalPages ? 'border-gray-200 text-gray-400 cursor-not-allowed' : 'border-[#c9ccc3] text-[#20394a] hover:bg-[#6196aa]/10'}" ${currentPage === totalPages ? 'disabled' : ''}>&gt;</button>`;
                
                return `<div class="flex items-center justify-end mt-4 gap-1 px-6 pb-6">${pagesHtml}</div>`;
            };

            window.changePage = (roomIndex, newPage) => {
                labPagination[roomIndex] = newPage;
                renderData();
            };

            window.toggleRoom = (roomIndex) => {
                const content = document.getElementById(`room-content-${roomIndex}`);
                const icon = document.getElementById(`room-icon-${roomIndex}`);
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            };

            const renderData = () => {
                container.innerHTML = '';
                
                inventoryData.forEach((room, index) => {
                    if (!labPagination[index]) labPagination[index] = 1;
                    
                    const itemsPerPage = 4; // 1 row on xl screens
                    const currentPage = labPagination[index];
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

                        const urlUpdate = '/stafadmin/update-inventaris/' + item.id_detail;
                        
                        cardsHtml += `
                        <div onclick="openGroupModal(${index}, ${item.id_detail})" class="cursor-pointer block bg-white/30 backdrop-blur-lg border border-white/40 rounded-xl overflow-hidden hover:-translate-y-1 hover:scale-[1.02] hover:border-[#6196aa] hover:shadow-xl transition-all duration-300 group relative">
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

                    const paginationHtml = renderPagination(room.barang.length, itemsPerPage, currentPage, index);

                    const groupHtml = `
                    <div class="border border-white/40 rounded-xl overflow-hidden bg-white/20 backdrop-blur-lg shadow-sm">
                        <div onclick="toggleRoom(${index})" class="bg-gradient-to-r from-white/40 to-white/10 backdrop-blur-md px-6 py-4 flex items-center justify-between border-b border-white/40 cursor-pointer group shadow-sm transition-colors hover:bg-white/30">
                            <div class="flex items-center gap-4">
                                <svg class="w-6 h-6 text-[#20394a]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                <h3 class="font-bold text-lg text-[#20394a]">${room.nama}</h3>
                                <div class="flex gap-2 ml-2 hidden md:flex">
                                    <span class="px-2 py-0.5 bg-gray-200 text-gray-700 text-xs font-semibold rounded-full">${room.total_alat} alat</span>
                                    <span class="text-xs text-gray-400 self-center">|</span>
                                    <span class="text-xs text-gray-500 self-center">${room.lokasi}</span>
                                </div>
                            </div>
                            <svg id="room-icon-${index}" class="w-5 h-5 text-gray-400 group-hover:text-[#20394a] transform transition-transform duration-300 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        
                        <div id="room-content-${index}" class="transition-all duration-300 origin-top">
                            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                ${cardsHtml}
                            </div>
                            ${paginationHtml}
                        </div>
                    </div>
                    `;
                    
                    container.insertAdjacentHTML('beforeend', groupHtml);
                });
            };

            let unlabeledData = [];

            window.switchTab = (tab) => {
                const tabAll = document.getElementById('tab-all');
                const tabUnlabeled = document.getElementById('tab-unlabeled');
                const containerAll = document.getElementById('inventory-container');
                const containerUnlabeled = document.getElementById('unlabeled-container');

                if (tab === 'all') {
                    tabAll.classList.replace('text-gray-500', 'text-[#20394a]');
                    tabAll.classList.replace('border-transparent', 'border-[#20394a]');
                    tabAll.classList.add('font-bold');
                    tabAll.classList.remove('font-medium');
                    
                    tabUnlabeled.classList.replace('text-[#20394a]', 'text-gray-500');
                    tabUnlabeled.classList.replace('border-[#20394a]', 'border-transparent');
                    tabUnlabeled.classList.add('font-medium');
                    tabUnlabeled.classList.remove('font-bold');

                    containerAll.classList.remove('hidden');
                    containerUnlabeled.classList.add('hidden');
                } else {
                    tabUnlabeled.classList.replace('text-gray-500', 'text-[#20394a]');
                    tabUnlabeled.classList.replace('border-transparent', 'border-[#20394a]');
                    tabUnlabeled.classList.add('font-bold');
                    tabUnlabeled.classList.remove('font-medium');
                    
                    tabAll.classList.replace('text-[#20394a]', 'text-gray-500');
                    tabAll.classList.replace('border-[#20394a]', 'border-transparent');
                    tabAll.classList.add('font-medium');
                    tabAll.classList.remove('font-bold');

                    containerAll.classList.add('hidden');
                    containerUnlabeled.classList.remove('hidden');
                }
            };

            const renderUnlabeledData = () => {
                const tbody = document.getElementById('unlabeled-tbody');
                const badge = document.getElementById('badge-unlabeled');
                
                if (unlabeledData.length > 0) {
                    badge.textContent = unlabeledData.length;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }

                if (unlabeledData.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">Tidak ada barang yang belum dilabeli.</td></tr>';
                    return;
                }

                let html = '';
                unlabeledData.forEach(item => {
                    const tgl = item.tanggal_penerimaan ? new Date(item.tanggal_penerimaan).toLocaleDateString('id-ID') : '-';
                    html += `
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-bold text-[#20394a]">#${item.id_inventaris}</div>
                            <div class="text-xs text-gray-500 mt-1">${tgl}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-800">${item.nama_barang}</div>
                            <div class="text-xs text-gray-500 mt-1">Kategori: ${item.jenis_barang}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">${item.nama_ruangan ? item.nama_ruangan + ' (' + item.lokasi + ')' : '-'}</td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="openVerifyModal(${item.id_inventaris})" class="text-xs font-bold text-white bg-[#6196aa] hover:bg-[#20394a] transition-colors px-3 py-2 rounded-lg shadow-sm">
                                Berikan Label & QR
                            </button>
                        </td>
                    </tr>
                    `;
                });
                tbody.innerHTML = html;
            };

            window.handleQrUpload = (event) => {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = new Image();
                    img.onload = () => {
                        const canvas = document.getElementById('qr_canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0, img.width, img.height);
                        
                        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        const code = jsQR(imageData.data, imageData.width, imageData.height, {
                            inversionAttempts: "dontInvert",
                        });
                        
                        if (code) {
                            document.getElementById('modal_qr_univ').value = code.data;
                            // Automatically trigger verification to save time
                            document.getElementById('btn_verify_qr').click();
                        } else {
                            alert('Tidak ada QR Code yang terdeteksi pada gambar. Silakan coba gambar lain yang lebih jelas, atau ketik kode teksnya secara manual.');
                        }
                        
                        // Reset file input so same file can be selected again if needed
                        event.target.value = '';
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            };

            window.openVerifyModal = (id) => {
                document.getElementById('modal_qr_id_inventaris').value = id;
                document.getElementById('modal_qr_univ').value = '';
                document.getElementById('verifyQrModal').classList.remove('hidden');
                document.getElementById('verifyQrModal').classList.add('flex');
            };

            window.closeVerifyModal = () => {
                document.getElementById('verifyQrModal').classList.add('hidden');
                document.getElementById('verifyQrModal').classList.remove('flex');
            };

            window.openAssignModal = (id, qr) => {
                document.getElementById('modal_assign_id_inventaris').value = id;
                document.getElementById('modal_assign_qr_univ').value = qr;
                document.getElementById('modal_nomor_label').value = '';
                document.getElementById('assignLabelModal').classList.remove('hidden');
                document.getElementById('assignLabelModal').classList.add('flex');
            };

            window.closeAssignModal = () => {
                document.getElementById('assignLabelModal').classList.add('hidden');
                document.getElementById('assignLabelModal').classList.remove('flex');
            };

            window.showSuccessModal = (msg) => {
                document.getElementById('successModalMsg').textContent = msg;
                document.getElementById('successModal').classList.remove('hidden');
                document.getElementById('successModal').classList.add('flex');
            };
            
            window.closeSuccessModal = () => {
                document.getElementById('successModal').classList.add('hidden');
                document.getElementById('successModal').classList.remove('flex');
            };

            window.showDuplicateModal = (oldLabel, suggestion) => {
                document.getElementById('dup-old-label').textContent = oldLabel;
                document.getElementById('dup-suggestion').textContent = suggestion;
                document.getElementById('duplicateModal').classList.remove('hidden');
                document.getElementById('duplicateModal').classList.add('flex');
            };

            window.closeDuplicateModal = () => {
                document.getElementById('duplicateModal').classList.add('hidden');
                document.getElementById('duplicateModal').classList.remove('flex');
            };

            window.useSuggestionLabel = () => {
                const suggestion = document.getElementById('dup-suggestion').textContent;
                document.getElementById('modal_nomor_label').value = suggestion;
                closeDuplicateModal();
                document.getElementById('btn_assign_label').click();
            };

            window.handleVerifyQr = async (e) => {
                e.preventDefault();
                const id = document.getElementById('modal_qr_id_inventaris').value;
                const qr_univ = document.getElementById('modal_qr_univ').value;

                document.getElementById('btn_verify_qr').disabled = true;
                document.getElementById('btn_verify_qr').innerText = 'Memverifikasi...';

                try {
                    const response = await fetch(`http://localhost:3000/api/staf_admin/inventaris/verify-qr/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ qr_univ })
                    });
                    const result = await response.json();
                    if (result.success) {
                        closeVerifyModal();
                        openAssignModal(id, qr_univ);
                    } else {
                        alert(result.message || 'QR tidak valid');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan jaringan');
                } finally {
                    document.getElementById('btn_verify_qr').disabled = false;
                    document.getElementById('btn_verify_qr').innerText = 'Verifikasi QR';
                }
            };

            window.handleAssignLabel = async (e) => {
                if (e) e.preventDefault();
                const id = document.getElementById('modal_assign_id_inventaris').value;
                const nomor_label = document.getElementById('modal_nomor_label').value;
                const qr_univ = document.getElementById('modal_assign_qr_univ').value;

                if (!nomor_label || nomor_label.trim() === '') {
                    alert('Nomor label wajib diisi!');
                    return;
                }

                document.getElementById('btn_assign_label').disabled = true;
                document.getElementById('btn_assign_label').innerText = 'Menyimpan...';

                try {
                    const response = await fetch(`http://localhost:3000/api/staf_admin/inventaris/update-label/${id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ nomor_label, qr_univ })
                    });
                    const result = await response.json();
                    if (result.success) {
                        closeAssignModal();
                        showSuccessModal(result.message || 'Nomor label berhasil disimpan');
                        fetchData(); // Reload both tabs
                    } else if (result.isDuplicate) {
                        showDuplicateModal(nomor_label, result.suggestion);
                    } else {
                        alert(result.message || 'Gagal update label');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan jaringan');
                } finally {
                    document.getElementById('btn_assign_label').disabled = false;
                    document.getElementById('btn_assign_label').innerText = 'Simpan Label';
                }
            };

            const fetchData = async () => {
                try {
                    const [resAll, resUnlabeled] = await Promise.all([
                        fetch('http://localhost:3000/api/staf_admin/inventaris'),
                        fetch('http://localhost:3000/api/staf_admin/inventaris/belum-dilabeli')
                    ]);
                    
                    const resultAll = await resAll.json();
                    const resultUnlabeled = await resUnlabeled.json();
                    
                    if (resultAll.success && resultAll.data.length > 0) {
                        inventoryData = resultAll.data;
                        renderData();
                    } else {
                        container.innerHTML = '<div class="text-center py-10 text-gray-500">Tidak ada data inventaris.</div>';
                    }

                    if (resultUnlabeled.success) {
                        unlabeledData = resultUnlabeled.data;
                        renderUnlabeledData();
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

            window.openGroupModal = (roomIndex, detailId) => {
                const room = inventoryData[roomIndex];
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
                            <td class="px-6 py-4 text-right">
                                <a href="/stafadmin/update-inventaris/${it.id_inventaris}" class="text-xs font-bold text-[#6196aa] border border-[#6196aa] hover:bg-[#6196aa] hover:text-white transition-colors px-4 py-2 rounded-lg shadow-sm inline-block">
                                    Lihat Unit
                                </a>
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
                            <th class="px-6 py-4 text-right">Aksi</th>
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

    </main>

</body>
</html>
