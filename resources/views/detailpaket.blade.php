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
        /* Styling Kartu Kustom */
        .card {
            border: none;
        }

        .card .card-body {
            padding: 1rem;
        }

        .card .btn-primary {
            background-color: #1169ad;
            border: none;
        }

        .card .btn-primary:hover {
            background-color: #0d5c99;
        }

        .card .btn-secondary {
            background-color: #c4c4c4;
            color: #333;
            border: none;
        }

        .card .btn-secondary:hover {
            background-color: #b1b1b1;
        }

        .collapse .card-body ul {
            list-style: none;
            padding-left: 0;
        }

        .collapse .card-body ul li {
            margin-bottom: 5px;
        }

        /* Ensure all card images have the same size */
        .card .card-header img {
            width: 100%;
            height: 200px;
            /* Set a fixed height */
            object-fit: cover;
            /* Maintain aspect ratio and cover the area */
        }



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


    <!-- Hero Section -->
    <div class="container my-5">
        <div class="card mb-3 p-3 shadow-lg" style="max-width: 900px; margin: auto; border-radius: 8px;">
            <div class="row g-0">
                <!-- Gambar Thumbnail -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('storage/paket/' . $data->photo) }}" alt="Thumbnail" class="img-fluid"
                        style="max-width: 100%; height: auto; border-radius: 8px;">
                </div>

                <!-- Detail Paket -->
                <div class="col-md-8">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h5 class="card-title"> {{ $data->nama_paket }} - {{ $data->category->name }}</h5>
                        <!-- Harga Paket -->
                        <h5 class="text-primary my-2">RP {{ number_format($data->harga_paket, 0, ',', '.') }}</h5>

                        <!-- Form Booking -->
                        <form action="/order/{{ $data->id }}" method="POST" class="w-100">
                            @csrf
                            <!-- Input DateTime -->
                            <div class="mb-3">
                                <label for="tanggal_reservasi" class="form-label">Tanggal dan Waktu Booking</label>
                                <input type="datetime-local" id="tanggal_reservasi" name="tanggal_reservasi"
                                    class="form-control" required>
                            </div>

                            <!-- Tombol Booking -->
                            <button type="submit" class="btn btn-primary w-100">Booking</button>
                        </form>
                    </div>
                </div>
                <button class="btn btn-secondary w-100 my-3" data-bs-toggle="collapse" data-bs-target="#detailPaket"
                    aria-expanded="false" aria-controls="detailPaket">
                    Detail Paket
                </button>
                <div class="collapse" id="detailPaket">
                    <div class="card card-body">
                        <h6 class="fw-bold">Deskripsi Paket:</h6>
                        <p>{{ $data->description_paket }}</p>

                        <ul>
                            <li><strong>Durasi:</strong> {{ $data->durasi }} jam sesi pemotretan</li>
                            <li><strong>Jumlah Foto:</strong></li>
                            <ul>
                                <li>{{ $data->foto_edit }} foto editing</li>
                                <li>{{ $data->foto_no_edit }} foto tanpa editing</li>
                            </ul>
                            <li><strong>Lokasi:</strong> Pilihan Lokasi Outdoor dalam kota</li>
                        </ul>

                        <p class="text-muted"><small>Diposting:
                                {{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    </div>

    <!-- Tombol Detail Paket -->


    <!-- Bagian Detail Paket -->

    </div>
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
