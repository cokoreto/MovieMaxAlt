@extends('layouts.main')

@section('title', 'Tambah Film')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">➕ Tambah Film Baru</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul Film</label>
                <input type="text" name="title" class="form-control" placeholder="Masukkan judul film" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" placeholder="Contoh: Action, Drama" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <input type="number" step="0.1" name="rating" class="form-control" placeholder="Masukkan rating (contoh: 8.2)" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Rilis</label>
                <input type="number" name="year" class="form-control" placeholder="Contoh: 2024" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Film</label>
                <textarea name="description" class="form-control" rows="4" placeholder="Masukkan deskripsi film"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Poster Film</label>
                <input type="file" name="poster" class="form-control" accept="image/*">
            </div>

            <div class="text-end">
                <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection