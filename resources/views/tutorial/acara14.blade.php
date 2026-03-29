<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acara 14: Delete Data - Tutorial Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .header {
            background: white;
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            text-align: center;
        }
        .header-icon {
            font-size: 60px;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }
        .header p {
            color: #64748b;
            font-size: 16px;
        }
        .step {
            background: white;
            border-radius: 20px;
            padding: 35px;
            margin-bottom: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        .step::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background: linear-gradient(180deg, #ef4444, #dc2626);
        }
        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            font-weight: 700;
            font-size: 18px;
            border-radius: 12px;
            margin-bottom: 15px;
        }
        .step h2 {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }
        .step p {
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        .code-block {
            background: #1e293b;
            border-radius: 12px;
            padding: 20px;
            overflow-x: auto;
            margin: 15px 0;
        }
        .code-block code {
            font-family: 'Fira Code', monospace;
            font-size: 13px;
            line-height: 1.6;
            color: #e2e8f0;
            white-space: pre;
            display: block;
        }
        .code-block .comment { color: #64748b; }
        .code-block .keyword { color: #c084fc; }
        .code-block .string { color: #86efac; }
        .code-block .variable { color: #93c5fd; }
        .code-block .function { color: #fcd34d; }
        .warning-box {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border-left: 4px solid #ef4444;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }
        .warning-box h4 {
            color: #991b1b;
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .warning-box p {
            color: #7f1d1d;
            margin: 0;
            font-size: 14px;
        }
        .info-box {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-left: 4px solid #3b82f6;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }
        .info-box h4 {
            color: #1e40af;
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .info-box p {
            color: #1e3a8a;
            margin: 0;
            font-size: 14px;
        }
        .tip-box {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border-left: 4px solid #10b981;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }
        .tip-box h4 {
            color: #065f46;
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .tip-box p {
            color: #064e3b;
            margin: 0;
            font-size: 14px;
        }
        .file-label {
            display: inline-block;
            background: #334155;
            color: #e2e8f0;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            font-family: 'Fira Code', monospace;
            margin-bottom: 10px;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            gap: 20px;
        }
        .nav a {
            flex: 1;
            text-align: center;
            padding: 16px 30px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        .nav a.back {
            background: rgba(255,255,255,0.9);
            color: #64748b;
        }
        .nav a.back:hover {
            background: white;
            transform: translateY(-2px);
        }
        .nav a.next {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }
        .nav a.next:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.5);
        }
        .method-comparison {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .method-card {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            border: 2px solid #e2e8f0;
        }
        .method-card h4 {
            color: #1e293b;
            font-weight: 600;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
        }
        .method-card.orm h4 { border-color: #3b82f6; }
        .method-card.query h4 { border-color: #10b981; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="header-icon">🗑️</div>
            <h1>Acara 14: Delete Data</h1>
            <p>Pelajari cara menghapus data menggunakan Laravel Eloquent ORM dan Query Builder</p>
        </div>

        <!-- Step 1: Konsep Delete -->
        <div class="step">
            <div class="step-number">1</div>
            <h2>Memahami Konsep Delete Data</h2>
            <p>Delete adalah operasi untuk menghapus data dari database. Laravel menyediakan dua cara utama untuk menghapus data:</p>
            
            <div class="method-comparison">
                <div class="method-card orm">
                    <h4>🎯 Cara 1: Menggunakan ORM (Eloquent)</h4>
                    <p style="font-size: 14px; color: #64748b;">
                        Menggunakan Model Eloquent. Lebih mudah dan terstruktur.
                    </p>
                </div>
                <div class="method-card query">
                    <h4>⚡ Cara 2: Menggunakan Query Builder</h4>
                    <p style="font-size: 14px; color: #64748b;">
                        Menggunakan DB facade. Lebih fleksibel untuk query kompleks.
                    </p>
                </div>
            </div>

            <div class="warning-box">
                <h4>⚠️ Perhatian!</h4>
                <p>Operasi delete bersifat <strong>permanen</strong>. Data yang dihapus tidak bisa dikembalikan kecuali ada backup. Selalu tambahkan konfirmasi sebelum menghapus data!</p>
            </div>
        </div>

        <!-- Step 2: Method destroy() dengan ORM -->
        <div class="step">
            <div class="step-number">2</div>
            <h2>Method destroy() menggunakan ORM</h2>
            <p>Ini adalah cara yang paling umum digunakan. Kita mencari data berdasarkan ID, kemudian menghapusnya.</p>
            
            <span class="file-label">app/Http/Controllers/PostController.php</span>
            <div class="code-block">
                <code>{!! "<span class='keyword'>public function</span> <span class='function'>destroy</span>(<span class='variable'>string</span> <span class='variable'>\$id</span>)" !!}
{
    <span class="comment">// Cara 1: Menggunakan findOrFail() lalu delete()</span>
    {!! "<span class='variable'>\$post</span> = <span class='variable'>Post</span>::<span class='function'>findOrFail</span>(<span class='variable'>\$id</span>);" !!}
    {!! "<span class='variable'>\$post</span>-><span class='function'>delete</span>();" !!}

    <span class="comment">// Cara 2: Langsung destroy() - lebih singkat</span>
    <span class="comment">// Post::destroy($id);</span>

    {!! "<span class='keyword'>return</span> <span class='function'>redirect</span>()" !!}
        {!! "-><span class='function'>route</span>(<span class='string'>\'posts.index\'</span>)" !!}
        {!! "-><span class='function'>with</span>(<span class='string'>\'success\'</span>, <span class='string'>\'Data berhasil dihapus!\'</span>);" !!}
}</code>
            </div>

            <div class="info-box">
                <h4>📖 Penjelasan</h4>
                <p>findOrFail($id) - Mencari data berdasarkan ID<br>
                delete() - Menghapus data dari database.<br>
                destroy($id) - Alternatif langsung tanpa find dulu.</p>
            </div>
        </div>

        <!-- Step 3: Method delete() dengan Query Builder -->
        <div class="step">
            <div class="step-number">3</div>
            <h2>Method delete() menggunakan Query Builder</h2>
            <p>Query Builder memberikan kontrol lebih untuk query yang kompleks.</p>
            
            <span class="file-label">app/Http/Controllers/PostController.php</span>
            <div class="code-block">
                <code>{!! "<span class='keyword'>use</span> <span class='variable'>Illuminate\Support\Facades\DB</span>;" !!}

{!! "<span class='keyword'>public function</span> <span class='function'>destroyQueryBuilder</span>(<span class='variable'>string</span> <span class='variable'>\$id</span>)" !!}
{
    <span class="comment">// Menggunakan Query Builder</span>
    {!! "<span class='variable'>\$deleted</span> = <span class='variable'>DB</span>::<span class='function'>table</span>(<span class='string'>\'posts\'</span>)" !!}
        {!! "-><span class='function'>where</span>(<span class='string'>\'id\'</span>, <span class='variable'>\$id</span>)" !!}
        {!! "-><span class='function'>delete</span>();" !!}

    <span class="comment">// Cek apakah data berhasil dihapus</span>
    {!! "<span class='keyword'>if</span> (<span class='variable'>\$deleted</span>) {" !!}
        {!! "<span class='keyword'>return</span> <span class='function'>redirect</span>()" !!}
            {!! "-><span class='function'>route</span>(<span class='string'>\'posts.index\'</span>)" !!}
            {!! "-><span class='function'>with</span>(<span class='string'>\'success\'</span>, <span class='string'>\'Data berhasil dihapus!\'</span>);" !!}
    {!! "}" !!}

    {!! "<span class='keyword'>return</span> <span class='function'>redirect</span>()" !!}
        {!! "-><span class='function'>route</span>(<span class='string'>\'posts.index\'</span>)" !!}
        {!! "-><span class='function'>with</span>(<span class='string'>\'error\'</span>, <span class='string'>\'Data tidak ditemukan!\'</span>);" !!}
}</code>
            </div>

            <div class="tip-box">
                <h4>💡 Kapan menggunakan Query Builder?</h4>
                <p>Gunakan Query Builder ketika: perlu join tabel, kondisi where kompleks, atau tidak perlu model Eloquent.</p>
            </div>
        </div>

        <!-- Step 4: Route -->
        <div class="step">
            <div class="step-number">4</div>
            <h2>Menambahkan Route untuk Delete</h2>
            <p>Route untuk delete menggunakan method DELETE sesuai RESTful convention.</p>
            
            <span class="file-label">routes/web.php</span>
            <div class="code-block">
                <code>{!! "<span class='comment'>// Resource route (sudah include destroy)</span>" !!}
{!! "<span class='variable'>Route</span>::<span class='function'>resource</span>(<span class='string'>\'posts\'</span>, <span class='variable'>PostController</span>::<span class='keyword'>class</span>);" !!}

{!! "<span class='comment'>// Atau manual:</span>" !!}
{!! "<span class='variable'>Route</span>::<span class='function'>delete</span>(<span class='string'>\'/posts/{id}\'</span>, [<span class='variable'>PostController</span>::<span class='keyword'>class</span>, <span class='string'>\'destroy\'</span>])" !!}
    {!! "-><span class='function'>name</span>(<span class='string'>\'posts.destroy\'</span>);" !!}</code>
            </div>
        </div>

        <!-- Step 5: Tombol Delete di View -->
        <div class="step">
            <div class="step-number">5</div>
            <h2>Menambahkan Tombol Delete di View</h2>
            <p>Tombol delete harus menggunakan form dengan method DELETE (HTTP Method Spoofing).</p>
            
            <span class="file-label">resources/views/posts/index.blade.php</span>
            <div class="code-block">
                <code>{!! "<span class='comment'>&lt;!-- Form delete dengan konfirmasi --&gt;</span>" !!}
{!! "&lt;<span class='keyword'>form</span> action=\"{{ route(\'posts.destroy\', \$post->id) }}\"" !!} 
      {!! "method=\"POST\"" !!} 
      {!! "style=\"display: inline;\"" !!}
      {!! "onsubmit=\"return confirm(\'Yakin ingin menghapus data ini?\');\"&gt;" !!}
    
    {!! "<span class='comment'>&lt;!-- Token CSRF untuk keamanan --&gt;</span>" !!}
    @csrf
    
    {!! "<span class='comment'>&lt;!-- Method Spoofing: ubah POST jadi DELETE --&gt;</span>" !!}
    @method('DELETE')
    
    {!! "&lt;<span class='keyword'>button</span> type=\"submit\" class=\"btn-delete\"&gt;" !!}
        🗑️ Hapus
    {!! "&lt;/<span class='keyword'>button</span>&gt;" !!}
{!! "&lt;/<span class='keyword'>form</span>&gt;" !!}</code>
            </div>

            <div class="warning-box">
                <h4>⚠️ Penting!</h4>
                <p>Selalu gunakan @csrf untuk melindungi form dari serangan CSRF. Laravel akan menolak request tanpa token yang valid.</p>
            </div>
        </div>

        <!-- Step 6: Konfirmasi Delete -->
        <div class="step">
            <div class="step-number">6</div>
            <h2>Menambahkan Konfirmasi Delete</h2>
            <p>Selalu konfirmasi sebelum menghapus untuk mencegah penghapusan yang tidak disengaja.</p>
            
            <span class="file-label">Cara 1: Konfirmasi sederhana dengan JavaScript</span>
            <div class="code-block">
                <code>{!! "&lt;<span class='keyword'>form</span> action=\"{{ route(\'posts.destroy\', \$post->id) }}\"" !!} 
      {!! "method=\"POST\"" !!}
      {!! "onsubmit=\"return confirm(\'Yakin ingin menghapus data ini? Data yang dihapus tidak bisa dikembalikan!\');\"&gt;" !!}
    @csrf
    @method('DELETE')
    {!! "&lt;<span class='keyword'>button</span> type=\"submit\"&gt;Hapus&lt;/<span class='keyword'>button</span>&gt;" !!}
{!! "&lt;/<span class='keyword'>form</span>&gt;" !!}</code>
            </div>

            <span class="file-label">Cara 2: Konfirmasi dengan CSS Modal (tanpa JS)</span>
            <div class="code-block">
                <code>{!! "<span class='comment'>&lt;!-- Link yang memunculkan modal --&gt;</span>" !!}
{!! "&lt;<span class='keyword'>a</span> href=\"#modal-delete-{{ \$post->id }}\"&gt;Hapus&lt;/<span class='keyword'>a</span>&gt;" !!}

{!! "<span class='comment'>&lt;!-- Modal konfirmasi --&gt;</span>" !!}
{!! "&lt;<span class='keyword'>div</span> id=\"modal-delete-{{ \$post->id }}\" class=\"modal\"&gt;" !!}
    {!! "&lt;<span class='keyword'>div</span> class=\"modal-content\"&gt;" !!}
        {!! "&lt;<span class='keyword'>h3</span>&gt;Konfirmasi Hapus&lt;/<span class='keyword'>h3</span>&gt;" !!}
        {!! "&lt;<span class='keyword'>p</span>&gt;Yakin ingin menghapus \"{{ \$post->title }}\"?&lt;/<span class='keyword'>p</span>&gt;" !!}
        
        {!! "&lt;<span class='keyword'>form</span> action=\"{{ route(\'posts.destroy\', \$post->id) }}\" method=\"POST\"&gt;" !!}
            @csrf
            @method('DELETE')
            {!! "&lt;<span class='keyword'>button</span> type=\"submit\" class=\"btn-confirm\"&gt;Ya, Hapus&lt;/<span class='keyword'>button</span>&gt;" !!}
            {!! "&lt;<span class='keyword'>a</span> href=\"#\" class=\"btn-cancel\"&gt;Batal&lt;/<span class='keyword'>a</span>&gt;" !!}
        {!! "&lt;/<span class='keyword'>form</span>&gt;" !!}
    {!! "&lt;/<span class='keyword'>div</span>&gt;" !!}
{!! "&lt;/<span class='keyword'>div</span>&gt;" !!}</code>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="step">
            <div class="step-number">✓</div>
            <h2>Perbandingan ORM vs Query Builder</h2>
            
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background: #f1f5f9;">
                        <th style="padding: 15px; text-align: left; border-bottom: 2px solid #e2e8f0;">Aspek</th>
                        <th style="padding: 15px; text-align: left; border-bottom: 2px solid #e2e8f0;">ORM (Eloquent)</th>
                        <th style="padding: 15px; text-align: left; border-bottom: 2px solid #e2e8f0;">Query Builder</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0; font-weight: 600;">Sintaks</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">$post->delete()</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">DB::table('posts')->where('id', $id)->delete()</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0; font-weight: 600;">Event Model</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">✅ Tersedia (deleting, deleted)</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">❌ Tidak ada</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0; font-weight: 600;">Soft Delete</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">✅ Otomatis</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">❌ Manual</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0; font-weight: 600;">Kemudahan</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">✅ Lebih mudah</td>
                        <td style="padding: 12px 15px; border-bottom: 1px solid #e2e8f0;">⚡ Lebih fleksibel</td>
                    </tr>
                </tbody>
            </table>

            <div class="tip-box" style="margin-top: 20px;">
                <h4>💡 Rekomendasi</h4>
                <p>Untuk operasi delete sederhana, gunakan <strong>ORM (Eloquent)</strong>. Untuk query kompleks dengan multiple where atau join, gunakan <strong>Query Builder</strong>.</p>
            </div>
        </div>

        <!-- Navigation -->
        <div class="nav">
            <a href="{{ route('tutorial.acara13') }}" class="back">← Kembali ke Acara 13: Edit</a>
            <a href="{{ route('posts.index') }}" class="next">Coba Aplikasi →</a>
        </div>
    </div>
</body>
</html>
