<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Laravel - Acara 13 & 14</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
            color: white;
        }
        .header h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .header p {
            font-size: 18px;
            opacity: 0.9;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .card {
            background: white;
            border-radius: 24px;
            padding: 40px 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(0,0,0,0.2);
        }
        .card-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 25px;
        }
        .card-icon.edit {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }
        .card-icon.delete {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }
        .card-icon.crud {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .card h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }
        .card p {
            font-size: 15px;
            color: #64748b;
            line-height: 1.7;
            flex-grow: 1;
        }
        .card-footer {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-green {
            background: #d1fae5;
            color: #065f46;
        }
        .badge-red {
            background: #fee2e2;
            color: #991b1b;
        }
        .badge-purple {
            background: #e0e7ff;
            color: #3730a3;
        }
        .arrow {
            font-size: 20px;
            color: #94a3b8;
            transition: all 0.2s;
        }
        .card:hover .arrow {
            color: #667eea;
            transform: translateX(5px);
        }
        .nav-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }
        .nav-link {
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 12px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            transition: all 0.3s;
            font-weight: 500;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.25);
        }
        .progress-bar {
            width: 100%;
            height: 4px;
            background: #e2e8f0;
            border-radius: 2px;
            margin-top: 20px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            border-radius: 2px;
            transition: width 0.5s ease;
        }
        .progress-fill.edit { background: linear-gradient(90deg, #10b981, #059669); width: 100%; }
        .progress-fill.delete { background: linear-gradient(90deg, #ef4444, #dc2626); width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 Tutorial Laravel</h1>
            <p>Pelajari Acara 13 & 14 - Edit dan Delete Data dengan langkah-langkah mudah</p>
        </div>

        <div class="cards">
            <!-- Card Acara 13 -->
            <a href="{{ route('tutorial.acara13') }}" class="card">
                <div class="card-icon edit">✏️</div>
                <h2>Acara 13: Edit Data</h2>
                <p>Pelajari cara mengedit data menggunakan Laravel Eloquent ORM. Mencakup pembuatan Form Request untuk validasi, menampilkan form edit, dan menyimpan perubahan ke database.</p>
                <div class="progress-bar">
                    <div class="progress-fill edit"></div>
                </div>
                <div class="card-footer">
                    <span class="badge badge-green">Step-by-Step</span>
                    <span class="arrow">→</span>
                </div>
            </a>

            <!-- Card Acara 14 -->
            <a href="{{ route('tutorial.acara14') }}" class="card">
                <div class="card-icon delete">🗑️</div>
                <h2>Acara 14: Delete Data</h2>
                <p>Pelajari cara menghapus data menggunakan ORM dan Query Builder. Mencakup pembuatan tombol delete, konfirmasi penghapusan, dan penanganan pesan sukses.</p>
                <div class="progress-bar">
                    <div class="progress-fill delete"></div>
                </div>
                <div class="card-footer">
                    <span class="badge badge-red">Step-by-Step</span>
                    <span class="arrow">→</span>
                </div>
            </a>

            <!-- Card Aplikasi -->
            <a href="{{ route('posts.index') }}" class="card">
                <div class="card-icon crud">🚀</div>
                <h2>Coba Aplikasi CRUD</h2>
                <p>Langsung praktikkan ilmu yang telah dipelajari dengan mencoba aplikasi CRUD lengkap. Tambah, lihat, edit, dan hapus data secara langsung.</p>
                <div class="card-footer">
                    <span class="badge badge-purple">Praktik Langsung</span>
                    <span class="arrow">→</span>
                </div>
            </a>
        </div>

        <div class="nav-links">
            <a href="/" class="nav-link">← Kembali ke Beranda</a>
            <a href="{{ route('posts.index') }}" class="nav-link">Ke Aplikasi →</a>
        </div>
    </div>
</body>
</html>
