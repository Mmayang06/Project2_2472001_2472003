<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labventory - Manajemen Inventaris Cerdas</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    
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
            background-color: var(--bone);
            color: var(--noir);
            line-height: 1.6;
            overflow: hidden;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 6%;
            background-color: var(--bone);
            border-bottom: 1px solid var(--concrete);
            height: 80px;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--denim);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .logo span {
            color: var(--steel);
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .btn-login {
            background-color: transparent;
            color: var(--denim);
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid var(--denim);
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-login:hover {
            background-color: var(--concrete);
            color: var(--noir);
            border-color: var(--noir);
        }

        .btn-register {
            background-color: var(--denim);
            color: var(--bone);
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid var(--denim);
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-register:hover {
            background-color: var(--steel);
            border-color: var(--steel);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(3, 7, 6, 0.2);
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
            flex-grow: 1;
            background: linear-gradient(135deg, var(--bone) 0%, #ebe7de 100%);
            position: relative;
        }

        .hero-content {
            max-width: 50%;
            z-index: 2;
        }

        .hero h1 {
            font-size: 54px;
            line-height: 1.15;
            margin-bottom: 24px;
            color: var(--noir);
            font-weight: 700;
        }

        .hero h1 span {
            color: var(--steel);
            position: relative;
        }

        .hero p {
            font-size: 18px;
            color: var(--denim);
            opacity: 0.85;
            max-width: 90%;
        }

        .hero-image-wrapper {
            width: 45%;
            position: relative;
            z-index: 2;
        }

        .hero-image {
            width: 100%;
            height: 400px;
            background-color: var(--denim);
            border-radius: 20px;
            position: relative;
            box-shadow: 25px 25px 0px var(--concrete);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: transform 0.5s ease;
        }

        .hero-image:hover {
            transform: translate(-10px, -10px);
            box-shadow: 35px 35px 0px var(--concrete);
        }
        
        .hero-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(transparent, transparent, transparent, var(--steel));
            animation: rotate 10s linear infinite;
            opacity: 0.2;
        }

        @keyframes rotate {
            100% { transform: rotate(360deg); }
        }

        .hero-image svg {
            width: 180px;
            height: 180px;
            fill: var(--bone);
            z-index: 1;
            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));
        }



        @media (max-width: 900px) {
            .hero {
                flex-direction: column;
                text-align: center;
                justify-content: center;
                padding-top: 40px;
            }

            .hero-content, .hero-image-wrapper {
                max-width: 100%;
                width: 100%;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                margin: 0 auto;
            }

            .hero-image-wrapper {
                margin-top: 50px;
            }

            .hero-image {
                height: 300px;
            }
        }
    </style>
</head>
<body>

    <nav>
        <a href="#" class="logo">Lab<span>ventory</span></a>
        <div class="nav-buttons">
            <a href="/login" class="btn-login">Login</a>
            <a href="/register" class="btn-register">Register</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Kelola Inventaris Anda dengan <span>Akurasi Tinggi</span></h1>
            <p>Tinggalkan pencatatan manual. Labventory membantu Anda melacak stok, menganalisis pergerakan aset laboratorium, dan mengelola inventaris secara real-time yang menghemat waktu dan biaya.</p>
        </div>
        <div class="hero-image-wrapper">
            <div class="hero-image">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M21 16.5c0 .38-.21.71-.53.88l-7.9 4.44c-.16.12-.36.18-.57.18-.21 0-.41-.06-.57-.18l-7.9-4.44A.991.991 0 0 1 3 16.5v-9c0-.38.21-.71.53-.88l7.9-4.44c.16-.12.36-.18.57-.18.21 0 .41.06.57.18l7.9 4.44c.32.17.53.5.53.88v9zM12 4.15L5.6 7.75 12 11.35l6.4-3.6L12 4.15zM5 15.91l6 3.38v-6.71L5 9.19v6.72zm14 0v-6.72l-6 3.39v6.71l6-3.38z"/>
                </svg>
            </div>
        </div>
    </section>



</body>
</html>
