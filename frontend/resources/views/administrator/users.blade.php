<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - Labventory</title>
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
        <div class="p-6 border-b border-[#6196aa]/20 flex items-center justify-between">
        <a href="/administrator/home" class="flex items-center gap-3 group">
            <div class="p-2 bg-[#6196aa] rounded-xl text-[#f9f5ed] shadow-md group-hover:scale-105 transition-transform duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight">Lab<span class="text-[#6196aa]">ventory</span></h1>
                <span class="text-xs text-[#c9ccc3] tracking-wide block">Panel Administrator</span>
                <span class="text-[10px] text-emerald-400 font-semibold tracking-wide block mt-1">{{ session('user')['username'] ?? 'Administrator' }}</span>
            </div>
        </a>
            <a href="/profile" title="Edit Profil" class="p-2 bg-[#6196aa]/10 text-[#6196aa] hover:bg-[#6196aa] hover:text-[#f9f5ed] rounded-lg transition-colors shadow-sm ml-2 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </a>
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

            <a href="/administrator/users" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                Kelola Pengguna
            </a>

            <a href="/administrator/rooms" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 text-[#c9ccc3] hover:bg-[#6196aa]/10 hover:text-white">
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
                <h2 class="text-xl font-bold text-[#20394a]">Kelola Data Pengguna</h2>
            </div>
            
            <div class="flex items-center gap-4">
                @if(isset($resetCount) && $resetCount > 0)
                <div class="relative p-2 bg-red-50 text-red-600 rounded-xl cursor-default" title="{{ $resetCount }} Permintaan Reset Password (buka Dashboard untuk detail)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-red-600 text-[9px] font-bold text-white">
                        {{ $resetCount }}
                    </span>
                </div>
                @endif
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
                        <input type="text" id="search-user" onkeyup="filterUserTable()" class="pl-10 pr-4 py-2.5 w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all" placeholder="Cari berdasarkan nama atau email...">
                    </div>
                    
                    <button onclick="openUserModal()" class="w-full md:w-auto px-5 py-2.5 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold shadow-md transition-all duration-200 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        Tambah Pengguna baru
                    </button>
                </div>

                <!-- Tabel Data Pengguna -->
                <div class="bg-white rounded-2xl border border-[#c9ccc3]/30 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-[#20394a]/5 text-[#20394a] border-b border-[#c9ccc3]/30 text-xs font-bold uppercase tracking-wider">
                                    <th class="px-6 py-4">Nama Lengkap</th>
                                    <th class="px-6 py-4">Alamat Email</th>
                                    <th class="px-6 py-4">Peran (Role)</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm" id="user-table-body">
                                @forelse($users as $user)
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-[#20394a]">
                                        <div class="flex items-center gap-2">
                                            <span>{{ $user['nama'] }}</span>
                                            @if(isset($user['reset_requested']) && $user['reset_requested'] == 1)
                                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-100 text-red-600 border border-red-200 whitespace-nowrap" title="User ini meminta reset password">
                                                    Minta Reset
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $user['email'] }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 uppercase">
                                            {{ $user['role'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <button onclick="resetUserPassword({{ $user['id_user'] }})" class="px-3 py-1.5 border border-indigo-500/30 text-indigo-600 hover:bg-indigo-50 rounded-lg text-xs font-bold transition-all duration-200 whitespace-nowrap">
                                                Reset Password
                                            </button>
                                            <button onclick="editUser({{ json_encode($user) }})" class="px-3 py-1.5 border border-amber-500/30 text-amber-600 hover:bg-amber-50 rounded-lg text-xs font-bold transition-all duration-200 whitespace-nowrap">
                                                Edit
                                            </button>
                                            <button onclick="deleteUser({{ $user['id_user'] }})" class="px-3 py-1.5 border border-rose-500/30 text-rose-600 hover:bg-rose-50 rounded-lg text-xs font-bold transition-all duration-200 whitespace-nowrap">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-400">Tidak ada data pengguna</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Form CRUD User -->
    <div id="modal-user" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <button onclick="closeUserModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 id="modal-title" class="text-lg font-bold text-[#20394a] mb-4">Tambah Pengguna</h3>
            
            <form onsubmit="handleUserSubmit(event)" class="space-y-4">
                <input type="hidden" id="user-id">
                
                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Nama Lengkap</label>
                    <input type="text" id="user-name" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Email</label>
                    <input type="email" id="user-email" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all">
                </div>

                {{-- Notice password otomatis (hanya muncul saat Tambah) --}}
                <div id="password-auto-notice" class="hidden flex items-start gap-3 bg-blue-50 border border-blue-200 rounded-xl px-4 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-xs text-blue-700 leading-relaxed">Password akan <strong>digenerate otomatis</strong> oleh sistem dan dikirimkan ke email pengguna. Pengguna dapat langsung login menggunakan password tersebut.</p>
                </div>

                {{-- Field password manual (hanya muncul saat Edit) --}}
                <div id="password-field" class="hidden">
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Password Baru</label>
                    <input type="password" id="user-password" class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all" placeholder="Kosongkan jika tidak ingin mengubah password">
                    <span class="text-[10px] text-gray-400 mt-1 block">Biarkan kosong jika tidak ingin mengubah password</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#20394a] uppercase tracking-wider mb-2">Role / Peran</label>
                    <select id="user-role" required class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6196aa] transition-all bg-white">
                        <option value="administrator">Administrator</option>
                        <option value="stafadmin">Staf Admin</option>
                        <option value="staflab">Staf Lab</option>
                        <option value="kalab">Kepala Laboratorium</option>
                        <option value="kaprodi">Ketua Program Studi</option>
                    </select>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeUserModal()" class="flex-1 py-3 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all duration-200">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Confirm Reset -->
    <div id="modal-reset" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4 transition-all duration-300">
        <div class="bg-white w-full max-w-sm rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <h3 class="text-lg font-bold text-[#20394a] mb-2">Konfirmasi Reset</h3>
            <p class="text-sm text-gray-500 mb-6">Apakah Anda yakin ingin mereset password pengguna ini? Password baru akan digenerate otomatis dan dikirimkan via email.</p>
            <div class="flex gap-3">
                <button type="button" onclick="closeResetModal()" class="flex-1 py-2.5 bg-[#c9ccc3]/30 hover:bg-[#c9ccc3]/50 text-gray-700 rounded-xl text-sm font-semibold transition-all">Batal</button>
                <button type="button" onclick="confirmResetPassword()" class="flex-1 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-semibold transition-all">Ya, Reset</button>
            </div>
        </div>
    </div>

    <!-- Modal Credential Info (muncul setelah tambah user berhasil) -->
    <div id="modal-credential" class="fixed inset-0 z-50 bg-[#030706]/60 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl border border-[#c9ccc3]/40 shadow-2xl p-6 relative transform scale-95 transition-transform duration-300">
            <!-- Header -->
            <div class="flex items-center gap-3 mb-5">
                <div class="p-2.5 bg-emerald-100 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-[#20394a]">Pengguna Berhasil Ditambahkan</h3>
                    <p class="text-xs text-gray-400">Email notifikasi telah dikirim ke pengguna</p>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-[#f9f5ed] border border-[#c9ccc3]/50 rounded-xl p-4 space-y-3 mb-4">
                <div class="flex justify-between items-center">
                    <span class="text-xs font-bold text-[#6196aa] uppercase tracking-wider">Nama</span>
                    <span id="cred-nama" class="text-sm font-semibold text-[#20394a]"></span>
                </div>
                <div class="border-t border-[#c9ccc3]/30"></div>
                <div class="flex justify-between items-center">
                    <span class="text-xs font-bold text-[#6196aa] uppercase tracking-wider">Email</span>
                    <span id="cred-email" class="text-sm text-gray-600"></span>
                </div>
                <div class="border-t border-[#c9ccc3]/30"></div>
                <div class="flex justify-between items-center">
                    <span class="text-xs font-bold text-[#6196aa] uppercase tracking-wider">Role</span>
                    <span id="cred-role" class="text-xs font-bold px-2.5 py-1 bg-[#6196aa]/10 text-[#20394a] rounded-full border border-[#6196aa]/20"></span>
                </div>
                <div class="border-t border-[#c9ccc3]/30"></div>
                <div class="flex justify-between items-center">
                    <span class="text-xs font-bold text-[#6196aa] uppercase tracking-wider">Password</span>
                    <span id="cred-password" class="font-mono text-base font-bold text-[#20394a] bg-white border border-[#c9ccc3]/50 px-3 py-1 rounded-lg tracking-widest"></span>
                </div>
            </div>

            <!-- Preview URL (simulasi Ethereal) -->
            <div id="cred-preview-section" class="hidden bg-blue-50 border border-blue-200 rounded-xl px-4 py-3 mb-4">
                <p class="text-xs text-blue-700 mb-1.5 font-semibold">📧 Preview Email Simulasi:</p>
                <a id="cred-preview-link" href="#" target="_blank" class="text-xs text-blue-600 underline break-all hover:text-blue-800">Buka Preview Email →</a>
            </div>

            <button onclick="closeCredentialModal()" class="w-full py-3 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold transition-all duration-200">
                Selesai
            </button>
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

        function filterUserTable() {
            const searchVal = document.getElementById('search-user').value.toLowerCase();
            const rows = document.querySelectorAll('#user-table-body tr');
            
            rows.forEach(row => {
                const nameText = row.querySelector('td:first-child')?.innerText.toLowerCase() || '';
                const emailText = row.querySelector('td:nth-child(2)')?.innerText.toLowerCase() || '';
                
                if (nameText.includes(searchVal) || emailText.includes(searchVal)) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }

        // Buka modal tambah pengguna
        function openUserModal() {
            document.getElementById('user-id').value = '';
            document.getElementById('user-name').value = '';
            document.getElementById('user-email').value = '';
            document.getElementById('user-password').value = '';
            document.getElementById('user-role').value = 'administrator';
            
            // Tampilkan notice auto-password, sembunyikan field password manual
            document.getElementById('password-auto-notice').classList.remove('hidden');
            document.getElementById('password-field').classList.add('hidden');
            
            document.getElementById('modal-title').textContent = 'Tambah Pengguna';

            const modal = document.getElementById('modal-user');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        // Buka modal edit pengguna
        function editUser(user) {
            document.getElementById('user-id').value = user.id_user;
            document.getElementById('user-name').value = user.nama;
            document.getElementById('user-email').value = user.email;
            document.getElementById('user-password').value = '';
            document.getElementById('user-role').value = user.role;
            
            // Sembunyikan notice, tampilkan field password manual
            document.getElementById('password-auto-notice').classList.add('hidden');
            document.getElementById('password-field').classList.remove('hidden');
            
            document.getElementById('modal-title').textContent = 'Ubah Pengguna';

            const modal = document.getElementById('modal-user');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }

        function closeUserModal() {
            const modal = document.getElementById('modal-user');
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 150);
        }

        // Tutup modal jika mengklik background
        document.getElementById('modal-user').addEventListener('click', function(e) {
            if (e.target === this) {
                closeUserModal();
            }
        });

        // Submit form tambah/edit user
        async function handleUserSubmit(e) {
            e.preventDefault();

            const id = document.getElementById('user-id').value;
            const nama = document.getElementById('user-name').value;
            const email = document.getElementById('user-email').value;
            const password = document.getElementById('user-password').value;
            const role = document.getElementById('user-role').value;

            const url = id ? `/administrator/users/${id}` : '/administrator/users';
            const method = id ? 'PUT' : 'POST';

            const payload = { nama, email, role, _token: '{{ csrf_token() }}' };
            if (password) payload.password = password;

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });
                const result = await response.json();

                if (result.success) {
                    closeUserModal();
                    if (!id && result.generatedPassword) {
                        // Mode tambah: tampilkan modal info credential
                        showCredentialModal(nama, email, role, result.generatedPassword, result.previewUrl);
                    } else {
                        showToast('Pengguna berhasil diperbarui!');
                        setTimeout(() => location.reload(), 1000);
                    }
                } else {
                    alert('Gagal memproses data: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan koneksi.');
            }
        }

        const roleLabels = {
            administrator: 'Administrator', stafadmin: 'Staf Admin',
            staflab: 'Staf Laboratorium', kalab: 'Kepala Laboratorium', kaprodi: 'Ketua Program Studi'
        };

        function showCredentialModal(nama, email, role, password, previewUrl) {
            const roleLabel = roleLabels[role] || role;
            const modal = document.getElementById('modal-credential');
            document.getElementById('cred-nama').textContent = nama;
            document.getElementById('cred-email').textContent = email;
            document.getElementById('cred-role').textContent = roleLabel;
            document.getElementById('cred-password').textContent = password;

            const previewSection = document.getElementById('cred-preview-section');
            if (previewUrl) {
                previewSection.classList.remove('hidden');
                document.getElementById('cred-preview-link').href = previewUrl;
            } else {
                previewSection.classList.add('hidden');
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.children[0].classList.remove('scale-95');
                modal.children[0].classList.add('scale-100');
            }, 10);
        }

        function closeCredentialModal() {
            const modal = document.getElementById('modal-credential');
            modal.children[0].classList.remove('scale-100');
            modal.children[0].classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                location.reload();
            }, 200);
        }


        // Hapus pengguna
        async function deleteUser(id) {
            if (!confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) return;

            try {
                const response = await fetch(`/administrator/users/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const result = await response.json();

                if (result.success) {
                    showToast('Pengguna berhasil dihapus!');
                    setTimeout(() => location.reload(), 1000);
                } else {
                    alert('Gagal menghapus pengguna: ' + result.message);
                }
            } catch (error) {
                alert('Terjadi kesalahan koneksi.');
            }
        }

        let userIdToReset = null;

        // Buka modal reset
        function resetUserPassword(id) {
            userIdToReset = id;
            const modal = document.getElementById('modal-reset');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.children[0].classList.remove('scale-95');
                modal.children[0].classList.add('scale-100');
            }, 10);
        }

        // Tutup modal reset
        function closeResetModal() {
            const modal = document.getElementById('modal-reset');
            modal.children[0].classList.remove('scale-100');
            modal.children[0].classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                userIdToReset = null;
            }, 300);
        }

        // Eksekusi reset
        async function confirmResetPassword() {
            if (!userIdToReset) return;
            const id = userIdToReset;
            closeResetModal();

            showToast('Sedang memproses dan mengirim email...');

            try {
                const response = await fetch(`/administrator/users/${id}/reset-password`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                const result = await response.json();

                if (result.success) {
                    showToast('Password berhasil direset dan email telah dikirim!');
                    setTimeout(() => location.reload(), 1500); // Reload agar status "Minta Reset" hilang
                } else {
                    alert('Gagal mereset password: ' + result.message);
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
