<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holobox - Kategori Galeri</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/icon/nm.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-2" style="background-color: #1169AD;">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="#">HOLOBOX</a>
            <button class="navbar-toggler bg-white shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex gap-3 text-center pt-lg-0 pt-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#service">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#project">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#faq">FAQ</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/dashboard">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/login">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero py-5 text-center bg-light">
        <div class="container">
            <h1 class="display-4 fw-bold">
                @if ($data->isNotEmpty())
                    Galery Kategori {{ $data->first()->category->name }}
                @else
                    Tidak Ada Data
                @endif
            </h1>
            <p class="lead text-muted">Jelajahi berbagai kategori proyek kami dengan kualitas terbaik.</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="project" class="py-5">
        <div class="container">
            <div class="row justify-content-center gap-4">
                @foreach ($data as $dat)
                    <div class="col-md-4 col-12 shadow p-3 rounded"
                        style="width: 300px; border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); overflow: hidden;">
                        <img src="{{ asset('storage/galery/' . $dat->photo) }}" class="img-fluid rounded mb-3"
                            alt="{{ $dat->category->name }}"
                            style="width: 100%; height: 200px; object-fit: cover; margin-bottom: 15px;">
                        <h5 class="text-center fw-bold" style="font-size: 16px; margin: 0;">{{ $dat->category->name }}
                        </h5>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-white" style="background-color: #1169AD;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>HOLOBOX</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, aperiam?
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Menu</h4>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#about" class="text-white text-decoration-none">About</a></li>
                        <li><a href="#service" class="text-white text-decoration-none">Services</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Contact Us</h4>
                    <p>Email: fp3175723@gmail.com</p>
                    <p>Phone: 0875237898</p>
                </div>
            </div>
            <div class="text-center mt-3">
                <small>&copy; 2024 Holobox. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
