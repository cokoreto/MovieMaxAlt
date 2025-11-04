@extends('layouts.main')

@section('title', 'Admin Dashboard - Movie Max')

@section('content')
<div class="admin-container">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <h4 class="text-center mb-4">Movie Max Admin</h4>
                <div class="nav flex-column">
                    <a href="{{ route('admin.movies.index') }}" class="active">
                        <i class="fas fa-film me-2"></i> Daftar Film
                    </a>
                    <a href="{{ route('admin.movies.create') }}">
                        <i class="fas fa-plus me-2"></i> Tambah Film
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 content-wrapper">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><i class="fas fa-film text-primary"></i> Daftar Film</h2>
                    <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Film Baru
                    </a>
                </div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card">
                    <div class="card-body p-0">
                        @if($movies->isEmpty())
                            <div class="text-center py-5">
                                <i class="fas fa-film fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada data film yang tersedia.</p>
                                <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">
                                    Tambah Film Pertama
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Genre</th>
                                            <th>Rating</th>
                                            <th>Tahun</th>
                                            <th width="150">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($movies as $index => $movie)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $movie->title }}</td>
                                            <td><span class="badge bg-info">{{ $movie->genre }}</span></td>
                                            <td>
                                                <div class="text-warning">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $movie->rating/2)
                                                            <i class="fas fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </td>
                                            <td>{{ $movie->year }}</td>
                                            <td>
                                                <a href="{{ route('admin.movies.edit', $movie->id) }}" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.movies.destroy', $movie->id) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection