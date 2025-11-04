<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required',
            'rating' => 'required|numeric|min:0|max:10',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/posters'), $filename);
            $validated['poster'] = $filename;
        }

        Movie::create($validated);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Film berhasil ditambahkan!');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required',
            'rating' => 'required|numeric|min:0|max:10',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $movie->update($validated);

        return redirect()->route('admin.movies.index')
            ->with('success', 'Film berhasil diperbarui!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')
            ->with('success', 'Film berhasil dihapus!');
    }
}
