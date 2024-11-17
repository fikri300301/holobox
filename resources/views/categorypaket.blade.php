<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/icon/nm.png" type="image/x-icon">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Starter Landing Page Bootstrap 5</title>
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-2 animate__animated animate__fadeInDown" style="background-color: #1169ad;">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#">HOLOBOX</a>
            <button class="navbar-toggler bg-white shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex gap-3 text-center">
                    <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#service">Service</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#project">Project</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#faq">FAQ</a></li>
                    @if (Auth::check())
                        <li class="nav-item"><a class="nav-link text-white" href="/dashboard">Dashboard</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link text-white" href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <style>
        /* Ensure all card images have the same size */
        .card .card-header img {
            width: 100%;
            height: 200px;
            /* Set a fixed height */
            object-fit: cover;
            /* Maintain aspect ratio and cover the area */
        }

        <style>

        /* Ensure the image has a consistent size and aligns with text */
        .custom-card {
            max-width: 800px;
            margin: auto;
        }

        .custom-card .card-body {
            display: flex;
            align-items: center;
        }

        .custom-card .card-body img {
            width: 150px;
            /* Set a fixed width */
            height: 150px;
            /* Set a fixed height */
            object-fit: cover;
            margin-right: 20px;
            /* Space between image and text */
        }

        .custom-card .card-title {
            color: #2b7c4f;
            /* Adjusted to match the color in your example */
            font-size: 1.5rem;
            font-weight: bold;
        }

        .custom-card p {
            margin: 0;
        }

        .custom-card .card-text {
            color: #555;
            /* Subtle color for description and date */
        }
    </style>
    </style>

    <!-- Hero Section -->
    <div class="container my-5">
        <div class="card custom-card">
            <div class="card-body">
                <img src="{{ asset('storage/category/' . $categories['photo']) }}" alt="Gambar dinas">
                <div>
                    <h5 class="card-title">Nama Kategori : {{ $categories['name'] }}</h5>
                    <p class="card-text"><strong>Deskripsi :</strong> </p>
                    <p class="card-text">{{ $categories['description'] }}</p>
                    <p class="card-text">
                        <small>Diposting :
                            {{ \Carbon\Carbon::parse($categories['created_at'])->format('d-m-Y') }}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        @foreach ($data as $dat)
            <div class="col-sm-6 col-lg-3 mb-4 hovered-card">
                <div class="card">
                    <div class="card-header bg-white">
                        <!-- Image now has uniform dimensions -->
                        <img src="{{ asset('storage/paket/' . $dat->photo) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-title">Nama Paket : {{ $dat->nama_paket }}</p>
                        <p class="card-title">Harga Paket : {{ $dat->harga_paket }}</p>
                        <p class="card-title">Diposting : {{ \Carbon\Carbon::parse($dat->created_at)->format('d-m-Y') }}
                        </p>
                        <a href="/paket-detail/{{ $dat->id }}"><button class="btn btn-primary">Detail
                                Paket</button></a>
                    </div>

                </div>
            </div>
        @endforeach

    </div>




    <!-- Footer -->
    <footer class="footer" style="background-color: #1169ad;">
        <div class="container py-4">
            <div class="row justify-content-between gy-4 text-white">
                <div class="col-md-4">
                    <div class="d-flex align-items-center gap-3">
                        <img src="./assets/icon/nm.png" alt="Ngoding Icon" width="30" height="30"
                            class="rounded">
                        <h2 class="fw-bold">Ngoding</h2>
                    </div>
                    <p class="opacity-75">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt repudiandae
                        molestiae officia voluptatum quis ad iste alias sequi omnis. Officiis.</p>
                </div>

                <div class="col-md-2">
                    <h4 class="fw-bold">Menu</h4>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="#about" class="text-white text-decoration-none">About</a></li>
                        <li><a href="#service" class="text-white text-decoration-none">Services</a></li>
                        <li><a href="#project" class="text-white text-decoration-none">Projects</a></li>
                        <li><a href="#faq" class="text-white text-decoration-none">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4 class="fw-bold">Contact Us</h4>
                    <p><i class="fa-solid fa-envelope"></i> fp3175723@gmail.com</p>
                    <p><i class="fa-solid fa-phone"></i> 0875237898</p>
                    <p><i class="fa-solid fa-location-dot"></i> Jl. KH. Hasyim Asyari, Kel. Banjarmlati, Kec. Mojoroto,
                        Kota Kediri, Jawa Timur</p>
                </div>
            </div>
            <div class="text-center text-white mt-3">
                <p class="m-0">&copy; 2024 MFP. All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
