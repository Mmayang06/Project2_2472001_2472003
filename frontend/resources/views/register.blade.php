<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Labventory</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --noir: #030706;
            --denim: #20394a;
            --bone: #f9f5ed;
            --steel: #6196aa;
            --concrete: #c9ccc3;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #e8ecef 0%, var(--concrete) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
            padding: 20px 0;
        }

        .page-wrapper {
            width: 100%;
            max-width: 1200px;
            display: flex;
            align-items: center;
            padding: 0 40px;
            gap: 40px;
            z-index: 10;
        }

        .sidebar {
            height: 550px;
            display: flex;
            align-items: flex-start;
        }

        .layout-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .login-card {
            width: 440px;
            background-color: #ffffff;
            border-radius: 28px;
            padding: 45px;
            box-shadow: 0 24px 48px rgba(32, 57, 74, 0.08);
            position: relative;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: var(--denim);
            text-decoration: none;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo svg {
            width: 24px;
            height: 24px;
            color: var(--steel);
        }

        .register-link {
            text-align: right;
            font-size: 13px;
            color: var(--steel);
            line-height: 1.4;
        }

        .register-link a {
            display: block;
            color: var(--denim);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .register-link a:hover {
            color: var(--steel);
        }

        h2.title {
            font-size: 46px;
            font-weight: 700;
            color: var(--noir);
            margin-bottom: 30px;
            letter-spacing: -1.5px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-labels {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 8px;
        }

        .form-labels label {
            font-size: 13px;
            font-weight: 500;
            color: var(--denim);
            opacity: 0.7;
        }

        .form-control {
            width: 100%;
            padding: 14px 20px;
            background-color: #ffffff;
            border: 2px solid var(--concrete);
            border-radius: 12px;
            color: var(--noir);
            font-size: 15px;
            outline: none;
            transition: all 0.3s;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2320394a' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
        }

        .form-control:focus {
            border-color: var(--steel);
            box-shadow: 0 0 0 4px rgba(97, 150, 170, 0.1);
        }
        
        .form-control::placeholder {
            color: var(--concrete);
            opacity: 0.8;
        }

        .btn-submit {
            width: 130px;
            padding: 14px;
            background-color: var(--noir);
            color: var(--bone);
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: var(--denim);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(3, 7, 6, 0.15);
        }

        .illustration-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            max-width: 550px;
            padding-left: 60px;
        }

        .illustration-container .main-svg {
            width: 100%;
            height: auto;
            max-height: 450px;
            fill: var(--denim);
            filter: drop-shadow(0 20px 30px rgba(32, 57, 74, 0.15));
            animation: float 6s ease-in-out infinite;
            z-index: 2;
            position: relative;
        }

        .shape {
            position: absolute;
            opacity: 0.9;
            z-index: 1;
        }

        .shape-1 {
            width: 120px; height: 120px;
            border-radius: 30px;
            background-color: var(--steel);
            top: 5%; right: 10%;
            transform: rotate(15deg);
            animation: float-alt 8s ease-in-out infinite alternate;
        }

        .shape-2 {
            width: 80px; height: 80px;
            border-radius: 50%;
            background-color: var(--bone);
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            bottom: 20%; left: 15%;
            animation: float 7s ease-in-out infinite alternate-reverse;
        }

        .shape-3 {
            width: 60px; height: 60px;
            border-radius: 15px;
            background-color: var(--concrete);
            top: 35%; left: 0%;
            transform: rotate(-20deg);
            animation: float-alt 9s ease-in-out infinite;
        }
        
        .platform {
            position: absolute;
            bottom: -30px;
            width: 100%;
            height: 80px;
            background-color: rgba(32, 57, 74, 0.05);
            border-radius: 50%;
            filter: blur(10px);
            z-index: 0;
            animation: shadow-pulse 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(4deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        @keyframes float-alt {
            0% { transform: translateY(0px) rotate(15deg); }
            50% { transform: translateY(20px) rotate(5deg); }
            100% { transform: translateY(0px) rotate(15deg); }
        }

        @keyframes shadow-pulse {
            0% { transform: scale(1); opacity: 0.05; }
            50% { transform: scale(0.9); opacity: 0.08; }
            100% { transform: scale(1); opacity: 0.05; }
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--denim);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            padding: 12px 18px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(32, 57, 74, 0.08);
        }

        .btn-back:hover {
            transform: translateX(-5px);
            color: var(--noir);
            box-shadow: 0 6px 15px rgba(32, 57, 74, 0.12);
        }

        @media (max-width: 960px) {
            .btn-back {
                padding: 10px 14px;
                font-size: 13px;
            }
            .page-wrapper {
                flex-direction: column;
                align-items: center;
                padding: 20px;
                gap: 20px;
                overflow-y: auto;
            }
            .sidebar {
                height: auto;
                width: 100%;
                justify-content: flex-start;
            }
            .layout-container {
                flex-direction: column;
                justify-content: center;
                width: 100%;
            }
            .illustration-container {
                display: none;
            }
            .login-card {
                width: 100%;
                max-width: 450px;
            }
        }
    </style>
</head>
<body>

    <div class="page-wrapper">
        <div class="sidebar">
            <a href="/" class="btn-back">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                Kembali
            </a>
        </div>

        <div class="layout-container">
        
        <!-- Left Panel: Login Card -->
        <div class="login-card">
            <div class="card-header">
                <a href="/" class="logo">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 16.5C21 16.88 20.79 17.21 20.47 17.38L12.57 21.82C12.41 21.94 12.21 22 12 22C11.79 22 11.59 21.94 11.43 21.82L3.53 17.38C3.21 17.21 3 16.88 3 16.5V7.5C3 7.12 3.21 6.79 3.53 6.62L11.43 2.18C11.59 2.06 11.79 2 12 2C12.21 2 12.41 2.06 12.57 2.18L20.47 6.62C20.79 6.79 21 7.12 21 7.5V16.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 12L21 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 12L3 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Labventory
                </a>
                <div class="register-link">
                    Already have an account?<br>
                    <a href="/login">Sign in</a>
                </div>
            </div>

            <h2 class="title">Sign up</h2>

            @if ($errors->any())
                <div style="background: #fee2e2; color: #dc2626; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px;">
                    <ul style="margin-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-labels">
                        <label for="nama">Full Name</label>
                    </div>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Enter your full name" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group">
                    <div class="form-labels">
                        <label for="email">Email Address</label>
                    </div>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <div class="form-labels">
                        <label for="role">Role</label>
                    </div>
                    <select id="role" name="role" class="form-control" required onchange="toggleTahunJabatan()">
                        <option value="" disabled selected>Select your role</option>
                        <option value="staflab" {{ old('role') == 'staflab' ? 'selected' : '' }}>Staf Lab</option>
                        <option value="stafadmin" {{ old('role') == 'stafadmin' ? 'selected' : '' }}>Staf Admin</option>
                        <option value="kaprodi" {{ old('role') == 'kaprodi' ? 'selected' : '' }}>Kaprodi</option>
                        <option value="kalab" {{ old('role') == 'kalab' ? 'selected' : '' }}>Kepala Lab</option>
                        <option value="administrator" {{ old('role') == 'administrator' ? 'selected' : '' }}>Administrator</option>
                    </select>
                </div>

                <div class="form-group" id="tahun-jabatan-container" style="display: none;">
                    <div class="form-labels">
                        <label for="tahun_jabatan">Tahun Jabatan</label>
                    </div>
                    <input type="text" id="tahun_jabatan" name="tahun_jabatan" class="form-control" placeholder="Contoh: 2024-2025" value="{{ old('tahun_jabatan') }}">
                </div>

                <div class="form-group">
                    <div class="form-labels">
                        <label for="password">Password</label>
                    </div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-submit">Sign up</button>
            </form>
        </div>

        <!-- Right Panel: Illustration -->
        <div class="illustration-container">
            <div class="platform"></div>
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            
            <svg class="main-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>

        </div>
    </div>

    <script>
        function toggleTahunJabatan() {
            var role = document.getElementById('role').value;
            var container = document.getElementById('tahun-jabatan-container');
            var input = document.getElementById('tahun_jabatan');

            if (role === 'kaprodi' || role === 'kalab') {
                container.style.display = 'block';
                // Remove required so it doesn't block if user hides it later, 
                // but we can add required here if we want it to be strictly required
                input.required = true;
            } else {
                container.style.display = 'none';
                input.required = false;
                input.value = ''; // clear value if not needed
            }
        }

        // Run on page load in case there's an old value after validation error
        document.addEventListener('DOMContentLoaded', function() {
            toggleTahunJabatan();
        });
    </script>
</body>
</html>
