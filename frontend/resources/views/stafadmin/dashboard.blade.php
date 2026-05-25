<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staf Administrasi - Labventory</title>
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
            background-color: var(--bone);
            color: var(--noir);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 260px;
            background-color: var(--denim);
            color: var(--bone);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 24px;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header span {
            color: var(--steel);
        }

        .sidebar-menu {
            flex: 1;
            padding: 20px 0;
            overflow-y: auto;
        }

        .menu-item {
            padding: 15px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--concrete);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .menu-item:hover, .menu-item.active {
            background-color: rgba(97, 150, 170, 0.2);
            color: var(--bone);
            border-left: 4px solid var(--steel);
        }

        .menu-item svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        .sidebar-footer {
            padding: 20px 24px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ff6b6b;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .logout-btn:hover {
            color: #ff4757;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .topbar {
            height: 80px;
            background-color: var(--bone);
            border-bottom: 1px solid var(--concrete);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 1px solid var(--concrete);
            border-radius: 8px;
            padding: 8px 16px;
            width: 300px;
        }

        .search-bar input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
            padding-left: 8px;
            color: var(--noir);
            font-size: 14px;
        }

        .search-bar svg {
            width: 18px;
            height: 18px;
            fill: var(--steel);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--steel);
            color: var(--bone);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 15px;
        }

        .user-role {
            font-size: 12px;
            color: var(--steel);
        }

        .content {
            padding: 40px;
            background-color: var(--bone);
            flex: 1;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 28px;
            color: var(--noir);
        }

        .page-header p {
            color: var(--steel);
            font-size: 15px;
            margin-top: 5px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background-color: #fff;
            border: 1px solid var(--concrete);
            border-radius: 16px;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0,0,0,0.05);
            border-color: var(--steel);
        }

        .stat-info h3 {
            font-size: 14px;
            color: var(--steel);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .stat-info .value {
            font-size: 28px;
            font-weight: 700;
            color: var(--denim);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background-color: rgba(97, 150, 170, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 24px;
            height: 24px;
            fill: var(--steel);
        }

        .section-box {
            background-color: #fff;
            border: 1px solid var(--concrete);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 18px;
            color: var(--denim);
        }

        .btn-view-all {
            color: var(--steel);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.2s;
        }

        .btn-view-all:hover {
            color: var(--denim);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 12px 16px;
            font-size: 13px;
            color: var(--steel);
            font-weight: 600;
            border-bottom: 2px solid var(--bone);
        }

        td {
            padding: 16px;
            font-size: 14px;
            border-bottom: 1px solid var(--bone);
            color: var(--noir);
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .status.masuk {
            background-color: #e3fcef;
            color: #0d8246;
        }

        .status.keluar {
            background-color: #ffebe5;
            color: #d13000;
        }

        .status.dipinjam {
            background-color: #fff4e5;
            color: #b75d00;
        }

    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            Lab<span>ventory</span>
        </div>
        <div class="sidebar-menu">
            <a href="#" class="menu-item active">
                <svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                Dashboard
            </a>
            <a href="#" class="menu-item">
                <svg viewBox="0 0 24 24"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9 14H5v-2h6v2zm0-4H5v-2h6v2zm8-4H5V7h14v2z"/></svg>
                Daftar Inventaris
            </a>
            <a href="#" class="menu-item">
                <svg viewBox="0 0 24 24"><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-2 14l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                Peminjaman
            </a>
            <a href="#" class="menu-item">
                <svg viewBox="0 0 24 24"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                Laporan
            </a>
            <a href="#" class="menu-item">
                <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                Manajemen Pengguna
            </a>
        </div>
        <div class="sidebar-footer">
            <a href="#" class="logout-btn">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
                Logout
            </a>
        </div>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="search-bar">
                <svg viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                <input type="text" placeholder="Cari barang, ID, atau aktivitas...">
            </div>
            <div class="user-profile">
                <div class="user-info" style="text-align: right;">
                    <span class="user-name">Sarah Jenkins</span>
                    <span class="user-role">Staf Administrasi</span>
                </div>
                <div class="avatar">SJ</div>
            </div>
        </header>

        <div class="content">
            <div class="page-header">
                <h1>Selamat Datang, Sarah!</h1>
                <p>Berikut adalah ringkasan aktivitas dan status inventaris laboratorium hari ini.</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>Total Barang</h3>
                        <div class="value">1,248</div>
                    </div>
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24"><path d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm10 16H4V8h16v12z"/></svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>Peminjaman Aktif</h3>
                        <div class="value">42</div>
                    </div>
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>Stok Menipis</h3>
                        <div class="value" style="color: #d13000;">15</div>
                    </div>
                    <div class="stat-icon" style="background-color: rgba(209, 48, 0, 0.1);">
                        <svg viewBox="0 0 24 24" fill="#d13000"><path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/></svg>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-info">
                        <h3>Barang Masuk (Bulan Ini)</h3>
                        <div class="value">+128</div>
                    </div>
                    <div class="stat-icon">
                        <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 9h-2V7h-2v5H6l4 4 4-4z"/></svg>
                    </div>
                </div>
            </div>

            <div class="section-box">
                <div class="section-header">
                    <h2>Aktivitas Terkini</h2>
                    <a href="#" class="btn-view-all">Lihat Semua</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#TRX-0982</td>
                            <td>Mikroskop Binokuler</td>
                            <td>Alat Optik</td>
                            <td>25 Mei 2026</td>
                            <td><span class="status dipinjam">Dipinjam</span></td>
                            <td>Budi Santoso</td>
                        </tr>
                        <tr>
                            <td>#TRX-0981</td>
                            <td>Reagen Asam Sulfat</td>
                            <td>Bahan Kimia</td>
                            <td>24 Mei 2026</td>
                            <td><span class="status masuk">Masuk (+50 botol)</span></td>
                            <td>Sarah Jenkins</td>
                        </tr>
                        <tr>
                            <td>#TRX-0980</td>
                            <td>Pipet Ukur 10ml</td>
                            <td>Alat Kaca</td>
                            <td>24 Mei 2026</td>
                            <td><span class="status keluar">Rusak (-2 buah)</span></td>
                            <td>Dr. Ahmad</td>
                        </tr>
                        <tr>
                            <td>#TRX-0979</td>
                            <td>Tabung Reaksi</td>
                            <td>Alat Kaca</td>
                            <td>23 Mei 2026</td>
                            <td><span class="status dipinjam">Dipinjam</span></td>
                            <td>Kelompok 4</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
</html>
