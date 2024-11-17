<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/icon/nm.png" type="image/x-icon">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <title>Booking Form</title>
    <style>
        /* Custom styling for the layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Ensures the footer stays at the bottom */
        }

        .custom-card {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .thumbnail {
            width: 100%;
            height: 200px;
            /* Fixed height for thumbnail */
            object-fit: cover;
            /* Maintain aspect ratio */
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #1169ad;
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0d5c99;
        }

        footer {
            margin-top: auto;
            /* Push footer to the bottom */
            background-color: #1169ad;
        }
    </style>
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-2" style="background-color: #1169ad;">
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

    <!-- Hero Section -->
    <div class="container my-5">
        <div class="custom-card">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/paket/' . $data->photo) }}" alt="thumbnail" class="thumbnail">
                </div>
                <div class="col-md-6">
                    <form action="{{ route('post.orde') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_paket" class="form-label">Nama paket</label>
                            <input type="text" class="form-control" id="nama_paket" value="{{ $data->nama_paket }}"
                                name="nama_paket" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga_paket" class="form-label">Harga paket</label>
                            <input type="number" class="form-control" id="harga_paket"
                                placeholder="Masukkan harga paket"
                                value="{{ number_format($data->harga_paket, 0, ',', '.') }}" name="harga_paket"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="datetime" class="form-label">Tanggal dan Jam Booking</label>
                            <input type="datetime-local" class="form-control" id="datetime" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-custom">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container py-4">
            <div class="text-center text-white mt-3">
                <p class="m-0">&copy; 2024 MFP. All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
