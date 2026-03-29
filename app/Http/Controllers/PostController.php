<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * Menampilkan semua data (Retrieve All)
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * Menampilkan form untuk tambah data
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * Menyimpan data baru ke database (Store Data)
     * Menggunakan Form Request untuk validasi
     */
    public function store(StorePostRequest $request)
    {
        // Data sudah tervalidasi oleh StorePostRequest
        $validated = $request->validated();
        
        // Set default value untuk is_active jika tidak ada
        $validated['is_active'] = $request->is_active ?? true;

        Post::create($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     * 
     * Menampilkan detail satu data (Retrieve Single)
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * ACARA 13: EDIT DATA
     * Step 1: Menampilkan form edit dengan data yang akan diedit
     */
    public function edit(string $id)
    {
        // Ambil data berdasarkan ID
        $post = Post::findOrFail($id);
        
        // Kirim data ke view edit
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * ACARA 13: EDIT DATA
     * Step 2: Menyimpan perubahan data ke database
     * Menggunakan Form Request (UpdatePostRequest) untuk validasi
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        // Data sudah tervalidasi oleh UpdatePostRequest
        $validated = $request->validated();
        
        // Set default value untuk is_active
        $validated['is_active'] = $request->is_active ?? false;

        // Cari data dan update
        $post = Post::findOrFail($id);
        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * ACARA 14: DELETE DATA
     * Menghapus data dari database menggunakan ORM
     */
    public function destroy(string $id)
    {
        // Cari data berdasarkan ID
        $post = Post::findOrFail($id);
        
        // Hapus data
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
