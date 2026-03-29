<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acara 13: Edit Data - Tutorial Laravel</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(180deg, #10b981, #059669);
        }
        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
        }
        .nav a.next:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
        }
        .flow-diagram {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin: 25px 0;
            flex-wrap: wrap;
        }
        .flow-item {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
        }
        .flow-arrow {
            font-size: 24px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="header-icon">✏️</div>
            <h1>Acara 13: Edit Data</h1>
            <p>Pelajari cara mengedit data dengan Laravel Eloquent ORM dan Form Request</p>
        </div>

        <!-- Step 1: Konsep Edit Data -->
        <div class="step">
            <div class="step-number">1</div>
            <h2>Memahami Konsep Edit Data</h2>
            <p>Edit Data adalah proses memperbarui data yang sudah ada di database. Dalam Laravel, proses ini melibatkan dua method utama di Controller:</p>
            
            <div class="flow-diagram">
                <div class="flow-item">📄 edit()</div>
                <div class="flow-arrow">→</div>
                <div class="flow-item">📝 Form Edit</div>
                <div class="flow-arrow">→</div>
                <div class="flow-item">💾 update()</div>
            </div>

            <div class="info-box">
                <h4>📚 Definisi</h4>
                <p><strong>edit()</strong> - Menampilkan form edit dengan data yang akan diedit.<br>
                <strong>update()</strong> - Menerima data dari form dan menyimpannya ke database.</p>
            </div>
        </div>

        <!-- Step 2: Membuat Form Request -->
        <div class="step">
            <div class="step-number">2</div>
            <h2>Membuat Form Request untuk Validasi</h2>
            <p>Form Request adalah class khusus Laravel untuk menangani validasi data. Kita akan membuat UpdatePostRequest untuk validasi saat edit data.</p>
            
            <div class="tip-box">
                <h4>💡 Tip</h4>
                <p>Gunakan artisan command untuk membuat Form Request dengan cepat:</p>
            </div>

            <span class="file-label">Terminal</span>
            <div class="code-block">
                <code>php artisan make:request UpdatePostRequest</code>
            </div>

            <p>Edit file yang baru dibuat:</p>
            <span class="file-label">app/Http/Requests/UpdatePostRequest.php</span>
            <div class="code-block">
                <code>{!! '<span class="keyword">class</span> <span class="function">UpdatePostRequest</span> <span class="keyword">extends</span> <span class="variable">FormRequest</span>' !!}
{
    <span class="comment">// Ubah menjadi true agar request diizinkan</span>
    {!! '<span class="keyword">public function</span> <span class="function">authorize</span>(): <span class="variable">bool</span>' !!}
    {
        {!! '<span class="keyword">return</span> <span class="variable">true</span>;' !!}
    }

    <span class="comment">// Aturan validasi</span>
    {!! '<span class="keyword">public function</span> <span class="function">rules</span>(): <span class="variable">array</span>' !!}
    {
        {!! '<span class="keyword">return</span> [' !!}
            {!! "<span class='string'>'title'</span> => <span class='string'>'.required|string|max:255',</span>" !!}
            {!! "<span class='string'>'author'</span> => <span class='string'>'required|string|max:255',</span>" !!}
            {!! "<span class='string'>'year'</span> => <span class='string'>'required|integer|min:1900',</span>" !!}
            {!! "<span class='string'>'is_active'</span> => <span class='string'>'boolean',</span>" !!}
        ];
    }
}</code>
            </div>
        </div>

        <!-- Step 3: Method edit() -->
        <div class="step">
            <div class="step-number">3</div>
            <h2>Menambahkan Method edit() di Controller</h2>
            <p>Method edit() bertugas mengambil data berdasarkan ID dan menampilkannya di form edit.</p>
            
            <span class="file-label">app/Http/Controllers/PostController.php</span>
            <div class="code-block">
                <code>{!! '<span class="keyword">public function</span> <span class="function">edit</span>(<span class="variable">string</span> <span class="variable">$id</span>)' !!}
{
    <span class="comment">// Ambil data berdasarkan ID</span>
    {!! '<span class="variable">$post</span> = <span class="variable">Post</span>::<span class="function">findOrFail</span>(<span class="variable">$id</span>);' !!}
    
    <span class="comment">// Kirim data ke view edit</span>
    {!! '<span class="keyword">return</span> <span class="function">view</span>(<span class="string">\'posts.edit\'</span>, <span class="function">compact</span>(<span class="string">\'post\'</span>));' !!}
}</code>
            </div>

            <div class="info-box">
                <h4>📖 Penjelasan</h4>
                <p>findOrFail($id) - Mencari data berdasarkan ID. Jika tidak ditemukan, akan menampilkan error 404.</p>
            </div>
        </div>

        <!-- Step 4: Method update() -->
        <div class="step">
            <div class="step-number">4</div>
            <h2>Menambahkan Method update() di Controller</h2>
            <p>Method update() menerima data dari form, memvalidasinya, dan menyimpan perubahan ke database.</p>
            
            <span class="file-label">app/Http/Controllers/PostController.php</span>
            <div class="code-block">
                <code>{!! '<span class="keyword">use</span> <span class="variable">App\Http\Requests\UpdatePostRequest</span>;' !!}

{!! '<span class="keyword">public function</span> <span class="function">update</span>(<span class="variable">UpdatePostRequest</span> <span class="variable">$request</span>, <span class="variable">string</span> <span class="variable">$id</span>)' !!}
{
    <span class="comment">// Data sudah tervalidasi oleh UpdatePostRequest</span>
    {!! '<span class="variable">$validated</span> = <span class="variable">$request</span>-><span class="function">validated</span>();' !!}
    
    <span class="comment">// Set default value untuk is_active</span>
    {!! '<span class="variable">$validated</span>[<span class="string">\'is_active\'</span>] = <span class="variable">$request</span>-><span class="variable">is_active</span> ?? <span class="variable">false</span>;' !!}

    <span class="comment">// Cari data dan update</span>
    {!! '<span class="variable">$post</span> = <span class="variable">Post</span>::<span class="function">findOrFail</span>(<span class="variable">$id</span>);' !!}
    {!! '<span class="variable">$post</span>-><span class="function">update</span>(<span class="variable">$validated</span>);' !!}

    {!! '<span class="keyword">return</span> <span class="function">redirect</span>()' !!}
        {!! '-><span class="function">route</span>(<span class="string">\'posts.index\'</span>)' !!}
        {!! '-><span class="function">with</span>(<span class="string">\'success\'</span>, <span class="string">\'Data berhasil diperbarui!\'</span>);' !!}
}</code>
            </div>
        </div>

        <!-- Step 5: View edit.blade.php -->
        <div class="step">
            <div class="step-number">5</div>
            <h2>Membuat View edit.blade.php</h2>
            <p>View ini menampilkan form dengan data yang sudah ada, sehingga user bisa mengeditnya.</p>
            
            <span class="file-label">resources/views/posts/edit.blade.php</span>
            <div class="code-block">
                <code>{!! "<span class='comment'>&lt;!-- Gunakan @method('PUT') karena HTML form hanya support GET/POST --&gt;</span>" !!}
{!! "&lt;<span class='keyword'>form</span> action=\"{{ route('posts.update', \$post->id) }}\" method=\"POST\"&gt;" !!}
    @csrf
    @method('PUT')
    
    {!! "&lt;<span class='keyword'>label</span>&gt;Judul:&lt;/<span class='keyword'>label</span>&gt;" !!}
    {!! "&lt;<span class='keyword'>input</span> type=\"text\" name=\"title\"" !!} 
           {!! "value=\"{{ old('title', \$post->title) }}\" required&gt;" !!}
    
    {!! "&lt;<span class='keyword'>label</span>&gt;Penulis:&lt;/<span class='keyword'>label</span>&gt;" !!}
    {!! "&lt;<span class='keyword'>input</span> type=\"text\" name=\"author\"" !!} 
           {!! "value=\"{{ old('author', \$post->author) }}\" required&gt;" !!}
    
    {!! "&lt;<span class='keyword'>label</span>&gt;Tahun:&lt;/<span class='keyword'>label</span>&gt;" !!}
    {!! "&lt;<span class='keyword'>input</span> type=\"number\" name=\"year\"" !!} 
           {!! "value=\"{{ old('year', \$post->year) }}\" required&gt;" !!}
    
    {!! "&lt;<span class='keyword'>label</span>&gt;" !!}
        {!! "&lt;<span class='keyword'>input</span> type=\"checkbox\" name=\"is_active\" value=\"1\"" !!} 
               {!! "{{ \$post->is_active ? 'checked' : '' }}&gt;" !!}
        Aktif
    {!! "&lt;/<span class='keyword'>label</span>&gt;" !!}
    
    {!! "&lt;<span class='keyword'>button</span> type=\"submit\"&gt;Update&lt;/<span class='keyword'>button</span>&gt;" !!}
{!! "&lt;/<span class='keyword'>form</span>&gt;" !!}</code>
            </div>

            <div class="tip-box">
                <h4>💡 Penting!</h4>
                <p>@method('PUT') - Laravel menggunakan "Method Spoofing" karena HTML form hanya mendukung GET dan POST. Directive ini menambahkan hidden field _method=PUT.</p>
            </div>
        </div>

        <!-- Step 6: Route -->
        <div class="step">
            <div class="step-number">6</div>
            <h2>Menambahkan Route</h2>
            <p>Jika menggunakan Resource Controller, route untuk edit dan update sudah otomatis dibuat. Atau bisa ditambahkan manual:</p>
            
            <span class="file-label">routes/web.php</span>
            <div class="code-block">
                <code>{!! "<span class='comment'>// Resource route (sudah include semua CRUD)</span>" !!}
{!! "<span class='variable'>Route</span>::<span class='function'>resource</span>(<span class='string'>'posts'</span>, <span class='variable'>PostController</span>::<span class='keyword'>class</span>);" !!}

{!! "<span class='comment'>// Atau manual:</span>" !!}
{!! "<span class='variable'>Route</span>::<span class='function'>get</span>(<span class='string'>'/posts/{id}/edit'</span>, [<span class='variable'>PostController</span>::<span class='keyword'>class</span>, <span class='string'>'edit'</span>])" !!}
    {!! "-><span class='function'>name</span>(<span class='string'>'posts.edit'</span>);" !!}
{!! "<span class='variable'>Route</span>::<span class='function'>put</span>(<span class='string'>'/posts/{id}'</span>, [<span class='variable'>PostController</span>::<span class='keyword'>class</span>, <span class='string'>'update'</span>])" !!}
    {!! "-><span class='function'>name</span>(<span class='string'>'posts.update'</span>);" !!}</code>
            </div>
        </div>

        <!-- Ringkasan -->
        <div class="step">
            <div class="step-number">✓</div>
            <h2>Ringkasan Alur Edit Data</h2>
            <div class="flow-diagram">
                <div class="flow-item">1. User klik Edit</div>
                <div class="flow-arrow">→</div>
                <div class="flow-item">2. edit() ambil data</div>
                <div class="flow-arrow">→</div>
                <div class="flow-item">3. Tampilkan form</div>
            </div>
            <div class="flow-diagram">
                <div class="flow-item">4. User submit</div>
                <div class="flow-arrow">→</div>
                <div class="flow-item">5. update() validasi</div>
                <div class="flow-arrow">→</div>
                <div class="flow-item">6. Simpan ke DB</div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="nav">
            <a href="{{ route('tutorial.index') }}" class="back">← Kembali ke Daftar Tutorial</a>
            <a href="{{ route('tutorial.acara14') }}" class="next">Lanjut ke Acara 14: Delete →</a>
        </div>
    </div>
</body>
</html>
