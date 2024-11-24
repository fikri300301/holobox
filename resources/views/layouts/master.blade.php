<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Photography Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f8f9fa;
            margin: 0;
        }

        /* Sidebar Styles */
        .sidebar {
            min-width: 260px;
            background-color: #1d3557;
            color: white;
            display: flex;
            flex-direction: column;
        }

        .sidebar h3 {
            text-align: center;
            padding: 20px;
            font-weight: bold;
            margin: 0;
            background-color: #1d3557;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar a {
            color: #a8dadc;
            text-decoration: none;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            transition: background-color 0.2s;
        }

        .sidebar a:hover {
            background-color: #457b9d;
            color: white;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        /* Content Styles */
        .content {
            flex: 1;
            padding: 30px;
            background-color: #ffffff;
            overflow-y: auto;
        }

        /* Topbar Styles */
        .topbar {
            height: 60px;
            background-color: #457b9d;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        /* Card and Other Elements */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .stats-icon {
            font-size: 40px;
        }

        .form-group label {
            font-weight: bold;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .sidebar {
                min-width: 100%;
                max-width: 100%;
                position: relative;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 10px;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Dashboard</h3>
        <ul class="nav flex-column">
            <!-- Menu untuk Admin -->
            @if (auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fas fa-chart-line"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="fas fa-calendar-alt"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all.order') }}" class="nav-link">
                        <i class="fas fa-calendar-alt"></i> Order
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('galery.index') }}" class="nav-link">
                        <i class="fas fa-calendar-alt"></i> Galery
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('paket.index') }}" class="nav-link">
                        <i class="fas fa-calendar-alt"></i> Paket
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="fas fa-users"></i> Clients
                    </a>
                </li>
            @endif

            <!-- Menu yang tersedia untuk Semua User (Admin & User) -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="fas fa-camera"></i> Home
                </a>
            </li>

            <!-- Menu untuk User Biasa -->
            @if (auth()->user()->role === 'user')
                <li class="nav-item">
                    <a href="{{ route('riwayat-order') }}" class="nav-link">
                        <i class="fas fa-calendar-alt"></i> Riwayat Order
                    </a>
                </li>
            @endif

            <!-- Logout Menu untuk Semua User -->
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="nav-link">
                    @csrf
                    <button type="submit"
                        style="background: none; border: none; padding: 0; color: inherit; cursor: pointer;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Topbar -->
        <div class="topbar">
            <span>Welcome, {{ auth()->user()->name }}</span>
        </div>

        <!-- Main Content -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    @yield('scripts')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>

</html>
