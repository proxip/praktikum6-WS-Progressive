# Outline Presentasi Praktikum 6 - Retrieve Data & Store Data Laravel

## Slide 1: Cover
- **Judul**: Retrieve Data & Store Data dengan Laravel
- **Mata Kuliah**: Pemrograman Web Framework
- **Hari/Tanggal**: [Hari, Tanggal]
- **Nama**: [Nama Mahasiswa]
- **NIM**: [NIM Mahasiswa]
- **Kelas**: [Kelas]

---

## Slide 2: Daftar Isi
1. Tujuan
2. Dasar Teori
3. Latihan
   - Latihan 1: Instalasi dan Konfigurasi
   - Latihan 2: Pembuatan Model dan Migration
   - Latihan 3: Pembuatan Controller
   - Latihan 4: Pembuatan Route
   - Latihan 5: Pembuatan View
4. Hasil Output
5. Desain Tampilan

---

## Slide 3: Tujuan Praktikum
1. Mahasiswa dapat memahami konsep **Retrieve Data** (Mengambil Data)
2. Mahasiswa dapat memahami konsep **Store Data** (Menyimpan Data)
3. Mahasiswa dapat memahami cara menggunakan framework Laravel
4. Mahasiswa dapat membuat aplikasi CRUD dengan tampilan modern

---

## Slide 4: Dasar Teori - Laravel Framework
**Apa itu Laravel?**
- Framework web berbasis PHP yang open source
- Menggunakan arsitektur MVC (Model-View-Controller)
- Memudahkan pengembangan aplikasi web dengan sintaks yang elegan
- Versi terbaru: Laravel 11.x

**Fitur Utama:**
- Eloquent ORM
- Blade Template Engine
- Artisan CLI
- Built-in security (CSRF protection)

---

## Slide 5: Dasar Teori - Retrieve Data (Mengambil Data)

**Retrieve Data adalah operasi mengambil/membaca data dari database.**

**Dua jenis Retrieve Data:**
1. **Retrieve All** - Mengambil semua data
   - Digunakan untuk menampilkan daftar data
   - Method: `all()`

2. **Retrieve Single** - Mengambil satu data spesifik
   - Digunakan untuk menampilkan detail data
   - Method: `find()` atau `findOrFail()`

---

## Slide 6: Dasar Teori - Store Data (Menyimpan Data)

**Store Data adalah operasi menyimpan data baru ke database.**

**Langkah-langkah Store Data:**
1. Menerima input dari user (form)
2. Validasi data
3. Simpan ke database
4. Redirect ke halaman tertentu

---

## Slide 7: Dasar Teori - Konsep MVC

```
┌─────────────┐     ┌─────────────┐     ┌─────────────┐
│   Browser   │────▶│  Controller │────▶│    Model    │
│  (Request)  │     │             │     │  (Eloquent) │
└─────────────┘     └──────┬──────┘     └──────┬──────┘
                           │                     │
                           │                     ▼
                           │              ┌─────────────┐
                           │              │  Database   │
                           │              │   (MySQL)   │
                           │              └─────────────┘
                           ▼
                      ┌─────────┐
                      │  View   │
                      │ (Blade) │
                      └─────────┘
```

**Alur Retrieve Data:**
Database → Model → Controller → View → Browser

**Alur Store Data:**
Browser → Controller → Model → Database

---

## Slide 8: Dasar Teori - Model (Eloquent ORM)

**Model adalah representasi tabel database dalam bentuk class PHP.**

```php
class Post extends Model
{
    protected $fillable = ['title', 'author', 'year', 'is_active'];
}
```

**Method untuk Retrieve Data:**
| Method | Fungsi |
|--------|--------|
| `all()` | Mengambil semua data |
| `find($id)` | Mencari data berdasarkan ID |
| `findOrFail($id)` | Mencari data atau error 404 jika tidak ada |

**Method untuk Store Data:**
| Method | Fungsi |
|--------|--------|
| `create($data)` | Membuat dan menyimpan data baru |
| `save()` | Menyimpan model ke database |

---

## Slide 9: Dasar Teori - Migration

**Migration adalah version control untuk struktur database.**

**File Migration:**
```php
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('author');
    $table->year('year');
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

**Command Migration:**
```bash
php artisan migrate        # Jalankan migration
php artisan migrate:rollback # Rollback migration
```

---

## Slide 10: Dasar Teori - Controller

**Controller mengatur alur logika antara Model dan View.**

| Method | Tipe | Fungsi |
|--------|------|--------|
| `index()` | Retrieve | Mengambil semua data |
| `create()` | Store | Menampilkan form tambah |
| `store()` | Store | Menyimpan data baru |
| `show()` | Retrieve | Menampilkan detail satu data |

---

## Slide 11: Dasar Teori - Route

**Route menghubungkan URL dengan method di Controller.**

```php
Route::resource('posts', PostController::class);
```

**Routes untuk Retrieve & Store:**
| Method | URI | Controller | Fungsi |
|--------|-----|------------|--------|
| GET | /posts | index | Retrieve All |
| GET | /posts/create | create | Form Store |
| POST | /posts | store | Store Data |
| GET | /posts/{id} | show | Retrieve Single |

---

## Slide 12: Dasar Teori - View (Blade Template)

**View adalah tampilan yang dilihat user.**

**Directive Blade untuk Retrieve Data:**
- `@foreach($posts as $post)` - Looping data
- `{{ $post->title }}` - Menampilkan data
- `{{ $post->author }}` - Menampilkan data
- `@forelse($posts as $post)` - Looping dengan else jika kosong
- `@empty` - Bagian else jika data kosong

**Directive Blade untuk Store Data:**
- `@csrf` - CSRF token untuk keamanan form
- `{{ old('field') }}` - Menampilkan input lama jika error

---

## Slide 13: Latihan 1 - Instalasi dan Konfigurasi

**Langkah-langkah:**

**1. Membuat Project Laravel**
```bash
composer create-project laravel/laravel praktikum6
```

**2. Konfigurasi Database (.env)**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=praktikum6
DB_USERNAME=root
DB_PASSWORD=
```

**3. Menjalankan Server**
```bash
php artisan serve
# Server berjalan di http://127.0.0.1:8000
```

---

## Slide 14: Latihan 2 - Pembuatan Model dan Migration

**Langkah-langkah:**

**1. Membuat Model dengan Migration**
```bash
php artisan make:model Post -m
```

**2. Edit File Migration**
Lokasi: `database/migrations/xxxx_create_posts_table.php`

**3. Edit File Model**
Lokasi: `app/Models/Post.php`

**4. Jalankan Migration**
```bash
php artisan migrate
```

---

## Slide 15: Latihan 2 - Kode Migration

**File: `database/migrations/xxxx_create_posts_table.php`**

```php
public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->year('year');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
```

**Struktur Tabel:**
| Field | Type | Deskripsi |
|-------|------|-----------|
| id | BIGINT | Primary Key |
| title | VARCHAR(255) | Judul postingan |
| author | VARCHAR(255) | Nama penulis |
| year | YEAR | Tahun publish |
| is_active | BOOLEAN | Status aktif |
| timestamps | TIMESTAMP | Waktu dibuat & diupdate |

---

## Slide 16: Latihan 2 - Kode Model

**File: `app/Models/Post.php`**

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'year', 'is_active'];
}
```

**Penjelasan:**
- `namespace App\Models` - Lokasi folder
- `extends Model` - Mewarisi class Eloquent Model
- `$fillable` - Field yang boleh diisi (mass assignment)

---

## Slide 17: Latihan 3 - Pembuatan Controller (Retrieve Data)

**Membuat Resource Controller:**
```bash
php artisan make:controller PostController --resource
```

**Method index() - Retrieve All Data**
```php
use App\Models\Post;

public function index()
{
    $posts = Post::all();  // Retrieve all data from database
    return view('posts.index', compact('posts'));  // Send to view
}
```

**Penjelasan:**
- `Post::all()` - Mengambil SEMUA data dari tabel posts
- `compact('posts')` - Mengirim data ke view
- View dapat menampilkan data dengan `@foreach`

---

## Slide 18: Latihan 3 - Method show() (Retrieve Single Data)

**Method show() - Retrieve Single Data**
```php
public function show($id)
{
    $post = Post::findOrFail($id);  // Retrieve single data
    return view('posts.show', compact('post'));  // Send to view
}
```

**Penjelasan:**
- `findOrFail($id)` - Mencari data berdasarkan ID
  - Jika ditemukan → kembalikan data
  - Jika tidak ada → error 404

---

## Slide 19: Latihan 3 - Method create() (Untuk Store Data)

**Method create() - Menampilkan Form Store**
```php
public function create()
{
    return view('posts.create');  // Show form
}
```

**Penjelasan:**
- Method ini hanya menampilkan form input
- User mengisi data melalui form ini
- Data dikirim ke method `store()` via POST

---

## Slide 20: Latihan 3 - Method store() (Store Data)

**Method store() - Menyimpan Data Baru**
```php
public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'year' => 'required|integer',
        'is_active' => 'boolean'
    ]);

    // Store data to database
    Post::create([
        'title' => $request->title,
        'author' => $request->author,
        'year' => $request->year,
        'is_active' => $request->is_active ?? true,
    ]);

    // Redirect setelah berhasil
    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}
```

---

## Slide 21: Latihan 4 - Pembuatan Route

**File: `routes/web.php`**

```php
<?php

use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class);
```

**Routes untuk Retrieve & Store Data:**

| Method | URI | Action | Fungsi |
|--------|-----|--------|--------|
| GET | /posts | index | Retrieve All Data |
| GET | /posts/create | create | Form Store Data |
| POST | /posts | store | Store Data |
| GET | /posts/{id} | show | Retrieve Single Data |

---

## Slide 22: Latihan 5 - Pembuatan View (Retrieve)

**View untuk Retrieve Data:**

1. **index.blade.php** - Menampilkan semua data
2. **show.blade.php** - Menampilkan detail satu data

**Buat folder:**
```
resources/views/posts/
```

---

## Slide 23: Latihan 5 - View index.blade.php (Retrieve All)

**Menampilkan semua data post:**

```php
<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Status</th>
        </tr>
        @forelse($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->author }}</td>
            <td>{{ $post->year }}</td>
            <td>{{ $post->is_active ? 'Active' : 'Inactive' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No posts found.</td>
        </tr>
        @endforelse
    </table>
</body>
</html>
```

---

## Slide 24: Latihan 5 - View show.blade.php (Retrieve Single)

**Menampilkan detail satu post:**

```php
<!DOCTYPE html>
<html>
<head>
    <title>View Post</title>
</head>
<body>
    <h1>Post Details</h1>

    <table>
        <tr><td>ID</td><td>: {{ $post->id }}</td></tr>
        <tr><td>Title</td><td>: {{ $post->title }}</td></tr>
        <tr><td>Author</td><td>: {{ $post->author }}</td></tr>
        <tr><td>Year</td><td>: {{ $post->year }}</td></tr>
        <tr>
            <td>Status</td>
            <td>: {{ $post->is_active ? 'Active' : 'Inactive' }}</td>
        </tr>
    </table>

    <a href="{{ route('posts.index') }}">Back to List</a>
</body>
</html>
```

---

## Slide 25: Latihan 5 - View create.blade.php (Store Data)

**Form untuk menyimpan data baru:**

```php
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>

        <label>Author:</label>
        <input type="text" name="author" value="{{ old('author') }}" required>

        <label>Year:</label>
        <input type="number" name="year" value="{{ old('year') }}" required>

        <label>
            <input type="checkbox" name="is_active" value="1" checked>
            Active
        </label>

        <button type="submit">Save Post</button>
    </form>
</body>
</html>
```

---

## Slide 26: Directive Blade untuk Retrieve & Store

| Directive | Fungsi | Kategori |
|-----------|--------|----------|
| `{{ $var }}` | Menampilkan variabel | Retrieve |
| `{!! $var !!}` | Menampilkan HTML (raw) | Retrieve |
| `@foreach($arr as $item)` | Looping array | Retrieve |
| `@forelse($arr as $item)` | Looping dengan else | Retrieve |
| `@empty` | Else jika kosong | Retrieve |
| `@csrf` | CSRF token field | Store |
| `{{ old('field') }}` | Input lama (jika error) | Store |
| `{{ route('name') }}` | Generate URL | Both |
| `@method('PUT')` | HTTP method spoofing | Store |

---

## Slide 27: Desain Tampilan Modern

**Aplikasi menggunakan desain modern dengan:**

1. **Warna & Style**
   - Background gradient purple (#667eea → #764ba2)
   - White cards dengan rounded corners (20-24px)
   - Soft drop shadow

2. **Typography**
   - Font: Inter (Google Fonts)
   - Gradient text pada heading

3. **UI Components**
   - Gradient buttons dengan hover effect
   - Status badges dengan gradient (green/red)
   - SVG icons
   - Modern input fields dengan icons

---

## Slide 28: Desain - Halaman Index

**Fitur Halaman Index:**
- Header dengan gradient title dan tombol "Add New Post"
- Table dengan rounded corners
- Status badges (Active/Inactive)
- Action buttons: View, Edit, Delete
- Empty state dengan icon jika tidak ada data
- Alert message untuk success notification

---

## Slide 29: Desain - Halaman Create

**Fitur Halaman Create:**
- Centered form card
- Input fields dengan icons (SVG)
- Floating label style
- Gradient submit button
- Back link dengan icon
- Error validation alert

---

## Slide 30: Desain - Halaman Show

**Fitur Halaman Show:**
- Post detail card
- Meta badges (Post ID, Status, Year)
- Detail rows dengan divider
- Author section dengan icon
- Action buttons di bagian bawah

---

## Slide 31: Hasil Output - Halaman Index (Retrieve All)

[Placeholder Screenshot - http://127.0.0.1:8000/posts]

**Halaman Index menampilkan:**
- Semua data post dari database
- Data diambil menggunakan `Post::all()`
- Ditampilkan dalam tabel modern dengan `@forelse`

---

## Slide 32: Hasil Output - Halaman Show (Retrieve Single)

[Placeholder Screenshot - http://127.0.0.1:8000/posts/{id}]

**Halaman Show menampilkan:**
- Detail satu post spesifik
- Data diambil menggunakan `Post::findOrFail($id)`
- Menampilkan semua field dari satu record

---

## Slide 33: Hasil Output - Halaman Create (Store Data)

[Placeholder Screenshot - http://127.0.0.1:8000/posts/create]

**Halaman Create menampilkan:**
- Form input data baru dengan desain modern
- Dengan `@csrf` untuk keamanan
- Data dikirim via POST ke route `posts.store`

---

## Slide 34: Kesimpulan

**Retrieve Data (Mengambil Data):**
- `Post::all()` → Mengambil semua data
- `Post::findOrFail($id)` → Mengambil satu data
- Data ditampilkan di View menggunakan `@forelse` dan `{{ $var }}`

**Store Data (Menyimpan Data):**
- Form input dengan `@csrf`
- Validasi input dengan `validate()`
- `Post::create()` → Menyimpan data ke database

**Tampilan Modern:**
- Gradient purple background
- Inter font
- Card-based design
- SVG icons
- Responsive layout

---

## Slide 35: Terima Kasih

**Pertanyaan & Diskusi**

---

## Lampiran 1: Command Artisan

| Command | Fungsi |
|---------|--------|
| `php artisan make:model` | Membuat model |
| `php artisan make:migration` | Membuat migration |
| `php artisan make:controller` | Membuat controller |
| `php artisan migrate` | Jalankan migration |
| `php artisan migrate:rollback` | Rollback migration |
| `php artisan route:list` | Lihat semua route |
| `php artisan serve` | Jalankan development server |

---

## Lampiran 2: Struktur Project

```
praktikum6/
├── app/
│   ├── Models/
│   │   └── Post.php              # Model Post
│   └── Http/
│       └── Controllers/
│           └── PostController.php # Controller
├── database/
│   └── migrations/
│       └── xxxx_create_posts_table.php # Migration
├── resources/
│   └── views/
│       └── posts/
│           ├── index.blade.php   # Retrieve All
│           ├── show.blade.php    # Retrieve Single
│           ├── create.blade.php  # Form Store
│           └── edit.blade.php    # Form Edit
└── routes/
    └── web.php                   # Routes
```
