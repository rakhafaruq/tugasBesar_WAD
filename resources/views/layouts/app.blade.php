<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Jual Beli Mobil')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h4 class="text-center">Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dashboard') }}">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('jual-mobil.index') }}">
                        <i class="bi bi-plus-circle"></i> Jual Mobil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('beli-mobil.index') }}">
                        <i class="bi bi-search"></i> Beli Mobil
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="container-fluid mt-4" style="flex: 1;">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
