@extends('layouts.main')

@section('title', 'Edit Film')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">✏️ Edit Data Film</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul Film</label>
                <input type="text" name="title" value="{{ $movie->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" name="genre" value="{{ $movie->genre }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <input type="number" step="0.1" name="rating" value="{{ $movie->rating }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Rilis</label>
                <input type="number" name="year" value="{{ $movie->year }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Film</label>
                <textarea name="description" class="form-control" rows="4">{{ $movie->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Poster Film</label>
                <input type="file" name="poster" class="form-control" accept="image/*">
                @if($movie->poster)
                    <div class="mt-2">
                        <img src="{{ asset('assets/posters/' . $movie->poster) }}" 
                             alt="Current Poster" 
                             class="img-thumbnail"
                             style="max-height: 500px; width: auto; object-fit: cover;">
                    </div>
                @endif
            </div>

            <div class="text-end">
                <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection