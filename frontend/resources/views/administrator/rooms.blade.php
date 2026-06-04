<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ruangan - Labventory</title>
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased h-screen flex flex-col md:flex-row overflow-hidden">

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-5 right-5 z-50 transform translate-y-[-100px] opacity-0 transition-all duration-300 ease-out bg-[#20394a] text-[#f9f5ed] px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 border border-[#6196aa]/30">
        <span id="toast-message" class="font-medium text-sm">Aksi berhasil dilakukan!</span>
    </div>

    <!-- Sidebar navigasi admin -->
    <aside class="w-full md:w-80 h-full bg-[#20394a] text-[#f9f5ed] flex flex-col flex-shrink-0 border-r border-[#6196aa]/20 overflow-hidden">
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between flex-shrink-0">
            <a href="/administrator/home" class="flex items-center gap-3 group">
                <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                    <span class="text-xs text-[#c9ccc3] tracking-wide block">Panel Administrator</span>
                </div>
            </a>
        </div>

        <div class="p-6 border-b border-[#6196aa]/20 flex items-center gap-4 flex-shrink-0">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] flex items-center justify-center font-bold text-lg text-[#20394a]">
                AD
            </div>
            <div>
                <h4 class="font-semibold text-sm text-[#f9f5ed]">{{ session('user')['username'] ?? 'Administrator' }}</h4>
                <span class="text-xs text-emerald-400">Online</span>
            </div>
        </div>

        <nav class="flex-grow p-4 space-y-1 mt-2 overflow-y-auto">
            <p class="text-[10px] font-bold text-[#6196aa]/60 uppercase tracking-widest px-4 py-2">Menu Utama</p>

            <a href="/administrator/home" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                </svg>
                Dashboard Overview
            </a>

            <a href="/administrator/users" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Kelola Pengguna
            </a>

            <a href="/administrator/rooms" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                Kelola Ruangan
            </a>
        </nav>

        <div class="p-4 border-t border-[#6196aa]/20 flex-shrink-0">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg border border-[#c9ccc3]/20 hover:bg-[#c9ccc3]/10 text-xs font-semibold text-[#c9ccc3] hover:text-[#f9f5ed] transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3 3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-grow flex flex-col min-w-0 h-full overflow-hidden">
        <header class="bg-white/80 backdrop-blur-md border-b border-[#c9ccc3]/40 h-20 px-8 flex items-center justify-between sticky top-0 z-30 flex-shrink-0">
            <div>
                <h2 class="text-xl font-bold text-[#20394a]">Kelola Data Ruangan</h2>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="flex flex-col text-right">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date">Kamis, 4 Juni 2026</span>
                    <span class="text-[10px] text-gray-400" id="current-time">11:22:00 WIB</span>
                </div>
            </div>
        </header>

        <div class="p-8 flex-grow overflow-y-auto max-w-7xl w-full mx-auto pb-16">
            <div class="space-y-6">
                <!-- Baris aksi tambah dan cari -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 p-6 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="relative w-full md:w-96">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" id="search-room" onkeyup="filterRoomTable()" class="pl-10 pr-4 py-2.5 w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all" placeholder="Cari berdasarkan nama atau lokasi...">
                    </div>
                    
                    <button onclick="openRoomModal()" class="w-full md:w-auto px-5 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold shadow-md transition-all duration-200 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Tambah Ruangan baru
                    </button>
                </div>

                <!-- Tabel Data Ruangan -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#20394a]/5 text-[#20394a] border-b border-[#c9ccc3]/30 text-xs font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4">Nama Ruangan / Lab</th>
                                    <th class="px-6 py-4">Lokasi Gedung / Lantai</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm" id="room-table-body">
                                @forelse($rooms as $room)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-[#20394a]">{{ $room['nama_ruangan'] }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $room['lokasi'] }}</td>
                                    <td class="px-6 py-4 text-right space-x-2">
                                        <button onclick="editRoom({{ json_encode($room) }})" class="px-3 py-1.5 border border-amber-500/30 text-amber-600 hover:bg-amber-50 rounded-lg text-xs font-bold transition-all duration-200">
                                            Edit
                                        </button>
                                        <button onclick="deleteRoom({{ $room['id_ruangan'] }})" class="px-3 py-1.5 border border-rose-500/30 text-rose-600 hover:bg-rose-50 rounded-lg text-xs font-bold transition-all duration-200">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-12 text-center text-gray-400">Tidak ada data ruangan</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Form CRUD Ruangan -->
    <div id="modal-room" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeRoomModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 id="modal-title" class="text-lg font-bold text-[#20394a] mb-4">Tambah Ruangan</h3>
            
            <form onsubmit="handleRoomSubmit(event)" class="space-y-4">
                <input type="hidden" id="room-id">
                
                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Nama Ruangan</label>
                    <input type="text" id="room-name" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Misal: Lab INT 1">
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Lokasi Detail</label>
                    <input type="text" id="room-location" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Misal: Gedung Teknik, Lantai 1">
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeRoomModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const holidays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        function updateDateTime() {
            const now = new Date();
            document.getElementById('current-date').textContent = `${holidays[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID') + ' WIB';
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();

        function filterRoomTable() {
            const searchVal = document.getElementById('search-room').value.toLowerCase();
            const rows = document.querySelectorAll('#room-table-body tr');
            
            rows.forEach(row => {
                const nameText = row.querySelector('td:first-child')?.innerText.toLowerCase() || '';
                const locText = row.querySelector('td:nth-child(2)')?.innerText.toLowerCase() || '';
                
                if (nameText.includes(searchVal) || locText.includes(searchVal)) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }

        // Buka modal tambah ruangan
        function openRoomModal() {
            document.getElementById('room-id').value = '';
            document.getElementById('room-name').value = '';
            document.getElementById('room-location').value = '';
            
            document.getElementById('modal-title').textContent = 'Tambah Ruangan';

            const modal = document.getElementById('modal-room');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        // Buka modal edit ruangan
        function editRoom(room) {
            document.getElementById('room-id').value = room.id_ruangan;
            document.getElementById('room-name').value = room.nama_ruangan;
            document.getElementById('room-location').value = room.lokasi;
            
            document.getElementById('modal-title').textContent = 'Ubah Ruangan';

            const modal = document.getElementById('modal-room');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        function closeRoomModal() {
            const modal = document.getElementById('modal-room');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 150);
        }

        // Tutup modal jika mengklik background
        document.getElementById('modal-room').addEventListener('click', function(e) {
            if (e.target === this) {
                closeRoomModal();
            }
        });

        // Submit form tambah/edit ruangan
        async function handleRoomSubmit(e) {
            e.preventDefault();

            const id = document.getElementById('room-id').value;
            const nama_ruangan = document.getElementById('room-name').value;
            const lokasi = document.getElementById('room-location').value;

            const url = id ? `/administrator/rooms/${id}` : '/administrator/rooms';
            const method = id ? 'PUT' : 'POST';

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nama_ruangan,
                        lokasi,
                        _token: '{{ csrf_token() }}'
                    })
                });
                const result = await response.json();

                if (result.success) {
                    showToast(id ? 'Ruangan berhasil diperbarui!' : 'Ruangan berhasil ditambahkan!');
                    closeRoomModal();
                    setTimeout(() => location.reload(), 1000);
                } else {
                    alert('Gagal memproses data: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan koneksi.');
            }
        }

        // Hapus ruangan
        async function deleteRoom(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus ruangan ini?')) return;

            try {
                const response = await fetch(`/administrator/rooms/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const result = await response.json();

                if (result.success) {
                    showToast('Ruangan berhasil dihapus!');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    alert('Gagal menghapus ruangan: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan koneksi.');
            }
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            const msgEl = document.getElementById('toast-message');
            msgEl.textContent = message;
            
            toast.classList.remove('translate-y-[-100px]', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-[-100px]', 'opacity-0');
            }, 2500);
        }
    </script>
</body>
</html>
