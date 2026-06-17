<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - Labventory</title>
    <!-- Outfit Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS v4 via CDN -->
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
<body class="bg-[#f9f5ed] text-[#030706] font-sans antialiased min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl overflow-hidden border border-[#c9ccc3]/30">
        
        <!-- Header -->
        <div class="bg-[#20394a] p-8 text-center relative">
            <a href="/dashboard" class="absolute left-6 top-8 text-[#c9ccc3] hover:text-white transition-colors flex items-center gap-2 text-sm font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
            
            <div class="w-24 h-24 mx-auto bg-gradient-to-tr from-[#6196aa] to-[#c9ccc3] rounded-3xl flex items-center justify-center text-4xl font-bold text-[#20394a] shadow-inner mb-4">
                {{ strtoupper(substr($user['nama'] ?? 'User', 0, 2)) }}
            </div>
            <h2 class="text-2xl font-bold text-white">{{ $user['nama'] ?? 'User' }}</h2>
            <p class="text-[#c9ccc3] text-sm mt-1 uppercase tracking-wider font-semibold">{{ $user['role'] ?? 'Unknown Role' }}</p>
        </div>

        <!-- Form Area -->
        <div class="p-8">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 text-emerald-600 p-4 rounded-xl text-sm font-medium border border-emerald-100 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 bg-rose-50 text-rose-600 p-4 rounded-xl text-sm font-medium border border-rose-100">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div class="space-y-2">
                        <label for="nama" class="block text-xs font-bold text-[#20394a] uppercase tracking-wider">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $user['nama'] ?? '') }}" required
                            class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all">
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="block text-xs font-bold text-[#20394a] uppercase tracking-wider">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user['email'] ?? '') }}" required
                            class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all">
                    </div>

                    @if(in_array(($user['role'] ?? ''), ['kaprodi', 'kalab']))
                    <div class="space-y-2 md:col-span-2">
                        <label for="tahun_jabatan" class="block text-xs font-bold text-[#20394a] uppercase tracking-wider">Tahun Jabatan</label>
                        <input type="text" id="tahun_jabatan" name="tahun_jabatan" value="{{ old('tahun_jabatan', $user['tahun_jabatan'] ?? '') }}" required
                            class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all" placeholder="Misal: 2024-2025">
                    </div>
                    @endif

                    <!-- Password Baru -->
                    <div class="space-y-2 md:col-span-2 pt-4 border-t border-gray-100">
                        <h3 class="font-bold text-[#20394a] mb-2">Ubah Password <span class="text-xs font-normal text-gray-400 ml-2">(Biarkan kosong jika tidak ingin mengubah)</span></h3>
                        <label for="password" class="block text-xs font-bold text-[#20394a] uppercase tracking-wider">Password Baru</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all pr-12">
                            <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-[#20394a] focus:outline-none">
                                <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label for="password_confirmation" class="block text-xs font-bold text-[#20394a] uppercase tracking-wider">Konfirmasi Password Baru</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                                class="w-full bg-[#f9f5ed]/30 border border-[#c9ccc3]/60 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#6196aa] focus:ring-1 focus:ring-[#6196aa] transition-all pr-12">
                            <button type="button" onclick="togglePasswordVisibility('password_confirmation')" class="absolute inset-y-0 right-0 px-4 flex items-center text-gray-400 hover:text-[#20394a] focus:outline-none">
                                <svg id="eye-icon-password_confirmation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="pt-6 flex justify-end">
                    <button type="submit" class="px-8 py-3.5 bg-[#20394a] hover:bg-[#6196aa] text-white rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            const icon = document.getElementById('eye-icon-' + id);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />`;
            } else {
                input.type = 'password';
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />`;
            }
        }
    </script>
</body>
</html>
