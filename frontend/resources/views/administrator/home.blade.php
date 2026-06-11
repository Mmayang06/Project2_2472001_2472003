<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Labventory</title>
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
    </div>
        </div>

        <nav class="flex-grow p-4 space-y-1 mt-2 overflow-y-auto">
            <p class="text-[10px] font-bold text-[#6196aa]/60 uppercase tracking-widest px-4 py-2">Menu Utama</p>

            <a href="/administrator/home" class="w-full flex items-center gap-3 px-4 py-3.5 rounded-xl font-medium text-sm transition-all duration-200 bg-[#6196aa] text-white shadow-lg">
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
                <h2 class="text-xl font-bold text-[#20394a]">Dashboard Administrator</h2>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="flex flex-col text-right">
                    <span class="text-xs font-semibold text-[#20394a]" id="current-date">Kamis, 4 Juni 2026</span>
                    <span class="text-[10px] text-gray-400" id="current-time">11:22:00 WIB</span>
                </div>
            </div>
        </header>

        <div class="p-8 flex-grow overflow-y-auto max-w-7xl w-full mx-auto pb-16">
            <div class="space-y-8">
                <!-- Kartu Statistik Ringkasan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Total Pengguna -->
                    <div class="bg-white p-6 rounded-2xl border border-[#c9ccc3]/30 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
                        <div class="p-4 bg-[#6196aa]/10 text-[#6196aa] rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Pengguna</span>
                            <span class="text-3xl font-bold text-[#20394a]">{{ $totalUsers }} Orang</span>
                            <a href="/administrator/users" class="text-xs text-[#6196aa] font-medium hover:underline block mt-1">Kelola Pengguna &rarr;</a>
                        </div>
                    </div>

                    <!-- Total Ruangan -->
                    <div class="bg-white p-6 rounded-2xl border border-[#c9ccc3]/30 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
                        <div class="p-4 bg-[#20394a]/10 text-[#20394a] rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider block">Total Ruangan</span>
                            <span class="text-3xl font-bold text-[#20394a]">{{ $totalRooms }} Laboratorium</span>
                            <a href="/administrator/rooms" class="text-xs text-[#6196aa] font-medium hover:underline block mt-1">Kelola Ruangan &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Pengguna Online -->
                <div class="bg-white p-8 rounded-2xl border border-[#c9ccc3]/30 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="relative flex items-center justify-center">
                                <span class="relative flex h-3.5 w-3.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-500"></span>
                                </span>
                            </div>
                            <h4 class="text-lg font-bold text-[#20394a]">Pengguna Online Saat Ini</h4>
                        </div>
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-semibold border border-emerald-100 shadow-sm">
                            {{ count($onlineUsers) }} Aktif
                        </span>
                    </div>

                    @if(count($onlineUsers) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($onlineUsers as $user)
                                @php
                                    $words = explode(' ', $user['nama']);
                                    $initials = '';
                                    if (count($words) >= 2) {
                                        $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                                    } else {
                                        $initials = strtoupper(substr($user['nama'], 0, 2));
                                    }
                                    
                                    $roleClass = '';
                                    $roleLabel = '';
                                    $role = strtolower($user['role']);
                                    if ($role === 'administrator' || $role === 'admin') {
                                        $roleClass = 'bg-rose-50 text-rose-700 border-rose-100';
                                        $roleLabel = 'Administrator';
                                    } elseif ($role === 'stafadmin' || $role === 'staf_admin') {
                                        $roleClass = 'bg-blue-50 text-blue-700 border-blue-100';
                                        $roleLabel = 'Staf Admin';
                                    } elseif ($role === 'staflab' || $role === 'staf_lab') {
                                        $roleClass = 'bg-emerald-50 text-emerald-700 border-emerald-100';
                                        $roleLabel = 'Staf Lab';
                                    } else {
                                        $roleClass = 'bg-gray-50 text-gray-700 border-gray-100';
                                        $roleLabel = ucfirst($user['role']);
                                    }
                                @endphp
                                <div class="group relative bg-[#f9f5ed]/40 hover:bg-[#f9f5ed]/10 p-5 rounded-2xl border border-[#c9ccc3]/20 hover:border-[#6196aa]/40 transition-all duration-300 hover:shadow-md flex items-center gap-4">
                                    <div class="relative flex-shrink-0">
                                        <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-[#6196aa] to-[#20394a] text-white flex items-center justify-center font-bold text-sm shadow-md group-hover:scale-105 transition-transform duration-300">
                                            {{ $initials }}
                                        </div>
                                        <div class="absolute -bottom-1 -right-1 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full shadow-sm"></div>
                                    </div>
                                    <div class="min-w-0 flex-grow">
                                        <h5 class="font-bold text-[#20394a] text-sm truncate leading-snug group-hover:text-[#6196aa] transition-colors duration-200">{{ $user['nama'] }}</h5>
                                        <p class="text-xs text-gray-400 truncate leading-relaxed">{{ $user['email'] }}</p>
                                        <div class="mt-2 flex items-center gap-2">
                                            <span class="inline-block px-2.5 py-0.5 rounded-lg text-[10px] font-bold tracking-wider uppercase border {{ $roleClass }}">
                                                {{ $roleLabel }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-12 text-center bg-[#f9f5ed]/30 rounded-2xl border border-dashed border-[#c9ccc3]/50">
                            <div class="p-4 bg-gray-100 rounded-full text-gray-400 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <h5 class="text-sm font-bold text-[#20394a]">Tidak Ada Pengguna Aktif</h5>
                            <p class="text-xs text-gray-400 mt-1">Saat ini tidak ada pengguna lain yang sedang online di dalam sistem.</p>
                        </div>
                    @endif
                </div>
    </main>

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
    </script>
</body>
</html>
