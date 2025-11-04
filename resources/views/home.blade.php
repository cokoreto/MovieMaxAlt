@extends('layouts.main')

@section('title', 'Movie Max Indonesia - Nonton Movie Live Stream Gratis')

@section('content')
    @if(request()->is('admin*'))
        {{-- Admin content will be rendered here --}}
        @yield('admin-content')
    @else
        {{-- Movie site content --}}
        <nav class="navbar">
            <a href="#home" class="navbar-logo">Movie <span>Max ID</span></a>

            <div class="navbar-nav">
                <a href="#home" id="homeBtn">Home</a>
                <a href="#popularmovie" id="popularBtn">Popular Movies</a>
                <a href="#upcoming" id="upcomingBtn">Upcoming Movies</a>
            </div>

            <div class="wrapper">
                <div class="search-container">
                    <div class="search-element">
                        <input type="text" class="form-control" placeholder="Search Movie ..." 
                               id="movie-search-box" onkeyup="findMovies()" onclick="findMovies()" />
                        <div class="search-list" id="search-list"></div>
                    </div>
                </div>

                <div class="navbar-extra">
                    <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div id="movie-page-content">
            @php
                $html = file_get_contents(public_path('assets/Movie_page/index.html'));
                
                // Extract content between body tags
                preg_match('/<body.*?>(.*?)<\/body>/s', $html, $matches);
                $bodyContent = $matches[1] ?? '';
                
                // Fix image paths
                $bodyContent = str_replace(
                    [
                        'src="/img/',
                        'href="../Movie_stream/',
                        'src="../img/',
                        'href="/Movie_stream/',
                        'src="img/',
                        'href="Movie_stream/'
                    ],
                    [
                        'src="' . asset('assets/Movie_page/img') . '/',
                        'href="' . asset('assets/Movie_stream') . '/',
                        'src="' . asset('assets/Movie_page/img') . '/',
                        'href="' . asset('assets/Movie_stream') . '/',
                        'src="' . asset('assets/Movie_page/img') . '/',
                        'href="' . asset('assets/Movie_stream') . '/'
                    ],
                    $bodyContent
                );
                
                // Fix script paths
                $bodyContent = str_replace(
                    'src="../Movie page/js/script.js"',
                    'src="' . asset('assets/Movie_page/js/script.js') . '"',
                    $bodyContent
                );
            @endphp

            {!! $bodyContent !!}
        </div>

        <!-- Footer -->
        <footer>
            <div class="socials">
                <a href="https://t.me/MovieMaxID"><i data-feather="twitter"></i></a>
            </div>

            <div class="links">
                <a href="#home">Home</a>
                <a href="#about">Tentang kami</a>
            </div>

            <div class="credit">
                <p>Movie <a href="#">Max</a> Indonesia | &copy; 2024.</p>
            </div>
        </footer>
    @endif
@endsection