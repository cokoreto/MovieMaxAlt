<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Movie Max Indonesia')</title>

    <!-- External Resources -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Main CSS with absolute path -->
    <link rel="stylesheet" href="{{ asset('assets/Movie_page/css/style.css') }}">

    <!-- Admin Dashboard Resources -->
    @if(request()->is('admin*'))
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Admin Dashboard Theme */
            .admin-container {
                background: #f8f9fa;
                min-height: 100vh;
                padding-top: 20px;
            }

            /* Sidebar Styling */
            .sidebar {
                background: #2c3e50;
                color: white;
                min-height: 100vh;
                padding: 20px 0;
                box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            }
            .sidebar h4 {
                color: #3498db;
                font-weight: 600;
                padding: 0 20px;
            }
            .sidebar .nav-link {
                color: #ecf0f1;
                padding: 12px 20px;
                transition: all 0.3s;
            }
            .sidebar .nav-link:hover {
                background: #34495e;
                color: #3498db;
            }
            .sidebar .nav-link.active {
                background: #3498db;
                color: white;
            }

            /* Content Area */
            .content-wrapper {
                padding: 20px;
            }
            .card {
                border: none;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
                border-radius: 15px;
            }
            .card-header {
                background: white;
                border-bottom: 1px solid #eee;
            }

            /* Table Styling */
            .table {
                margin-bottom: 0;
            }
            .table th {
                border-top: none;
                background: #f8f9fa;
                font-weight: 600;
                color: #2c3e50;
            }
            .table td {
                vertical-align: middle;
            }
            .badge {
                padding: 8px 12px;
                font-weight: 500;
            }

            /* Buttons */
            .btn {
                padding: 8px 16px;
                border-radius: 8px;
            }
            .btn-sm {
                padding: 5px 10px;
            }
            .btn-primary {
                background: #3498db;
                border: none;
            }
            .btn-primary:hover {
                background: #2980b9;
            }
            .btn-warning {
                background: #f1c40f;
                border: none;
                color: white;
            }
            .btn-danger {
                background: #e74c3c;
                border: none;
            }

            /* Alerts */
            .alert {
                border-radius: 10px;
                border: none;
            }
            .alert-success {
                background: #d4edda;
                color: #155724;
            }

            /* Star Rating */
            .text-warning .fas.fa-star {
                color: #f1c40f;
            }
            .text-warning .far.fa-star {
                color: #bdc3c7;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .sidebar {
                    position: fixed;
                    top: 0;
                    left: -250px;
                    width: 250px;
                    z-index: 1000;
                    transition: all 0.3s;
                }
                .content-wrapper {
                    margin-left: 0;
                }
            }
        </style>
    @endif
</head>

<body>
    @yield('content')

    <!-- Scripts -->
    <script>
        feather.replace();
        
        // Fix image paths on page load
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('img').forEach(img => {
                let src = img.getAttribute('src');
                if (src.startsWith('/img/')) {
                    // Convert /img/ paths to absolute paths
                    img.src = "{{ asset('assets/Movie_page') }}" + src;
                }
            });
        });
    </script>

    <!-- Main JavaScript with absolute path -->
    <script src="{{ asset('assets/Movie_page/js/script.js') }}"></script>

    @if(request()->is('admin*'))
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Mobile sidebar toggle
            document.addEventListener('DOMContentLoaded', function() {
                const sidebarToggle = document.querySelector('.sidebar-toggle');
                const sidebar = document.querySelector('.sidebar');
                
                if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', () => {
                        sidebar.classList.toggle('show');
                    });
                }
            });
        </script>
    @endif
</body>

</html>