<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Praktikum - Workshop PWA</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .container {
            max-width: 800px;
            width: 100%;
        }
        .hero {
            background: white;
            border-radius: 30px;
            padding: 60px 50px;
            text-align: center;
            box-shadow: 0 30px 80px rgba(0,0,0,0.2);
        }
        .logo {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 60px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }
        .hero h1 {
            font-size: 42px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }
        .hero .subtitle {
            font-size: 20px;
            color: #64748b;
            margin-bottom: 40px;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .feature {
            background: #f8fafc;
            padding: 25px 20px;
            border-radius: 16px;
            text-align: center;
        }
        .feature-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .feature h3 {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 5px;
        }
        .feature p {
            font-size: 13px;
            color: #64748b;
        }
        .cta-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            padding: 16px 32px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }
        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }
        .btn-secondary:hover {
            background: #e2e8f0;
            transform: translateY(-3px);
        }
        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        }
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.5);
        }
        .tutorial-highlight {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 16px;
            padding: 25px;
            margin-top: 40px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .tutorial-highlight .icon {
            font-size: 40px;
        }
        .tutorial-highlight .content h3 {
            font-size: 18px;
            font-weight: 600;
            color: #1e40af;
            margin-bottom: 5px;
        }
        .tutorial-highlight .content p {
            font-size: 14px;
            color: #1e3a8a;
            margin-bottom: 12px;
        }
        .tutorial-highlight .content a {
            color: #1d4ed8;
            font-weight: 600;
            text-decoration: none;
        }
        .tutorial-highlight .content a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255,255,255,0.8);
            font-size: 14px;
        }
        @media (max-width: 640px) {
            .hero {
                padding: 40px 25px;
            }
            .hero h1 {
                font-size: 28px;
            }
            .cta-buttons {
                flex-direction: column;
            }
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="hero">
            <div class="logo">📚</div>
            <h1>Laravel Praktikum</h1>
            <p class="subtitle">Workshop Progressive Web Apps - Materi Web</p>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">📖</div>
                    <h3>Acara 13</h3>
                    <p>Edit Data dengan Form Request</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🗑️</div>
                    <h3>Acara 14</h3>
                    <p>Delete Data ORM & Query Builder</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🚀</div>
                    <h3>Praktik</h3>
                    <p>Aplikasi CRUD Lengkap</p>
                </div>
            </div>

            <div class="cta-buttons">
                <a href="{{ route('tutorial.index') }}" class="btn btn-success">
                    📚 Lihat Tutorial
                </a>
                <a href="{{ route('posts.index') }}" class="btn btn-primary">
                    🚀 Coba Aplikasi CRUD
                </a>
            </div>

            <div class="tutorial-highlight">
                <div class="icon">🎓</div>
                <div class="content">
                    <h3>Baru mulai belajar?</h3>
                    <p>Pelajari step-by-step cara membuat fitur Edit dan Delete data di Laravel dengan panduan yang mudah dipahami.</p>
                    <a href="{{ route('tutorial.acara13') }}">Mulai dari Acara 13 →</a>
                </div>
            </div>
        </div>

        <footer>
            <p>© 2025 Workshop Progressive Web Apps - Politeknik Negeri Jember</p>
        </footer>
    </div>
</body>
</html>
