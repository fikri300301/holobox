<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/icon/nm.png" type="image/x-icon">

    <!-- animate style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- scroll animation by aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- favicon -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Starter Landing Page Bootsrap 5</title>
</head>

<body id="home">

    <!--navbar -->
    <nav class="navbar navbar-expand-lg  py-2 animate__animated animate__fadeInDown"
        style="background-color: rgb(17, 105, 173)">
        <div class="container">
            <a class="navbar-brand" href="#">

                <span class="fw-bold text-white">HOLOBOX</span>
            </a>
            <button class="navbar-toggler bg-white shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex gap-3 text-center pt-lg-0 pt-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#home">Home</a>
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

                    {{-- <li class="nav-item">
                        <a class="nav-link text-white" href="/login">login</a>
                    </li> --}}

                </ul>
            </div>
        </div>
    </nav>

    <!--hero section-->
    <section class="hero" style="margin-bottom: 10%">
        <div class="container">
            <!--pembungkus box-->
            <div
                class="hero-box d-flex align-items-center justify-content-between flex-md-row flex-column gap-md-0 gap-5">

                <!--box pertama-->
                <div class="box animate__animated animate__fadeInLeft animate__delay-1s">
                    <h4 class="fw-bold" style="color: rgb(17, 105, 173) ">JASA FOTOGRAFI<br />
                    </h4>
                    <h2 style="font-weight: 700;font-size: 2.5rem;line-height: 1.2;">
                        Penyedia Jasa Fotografi<br> Murah di Kediri!
                    </h2>
                    <p class="lh-lg mb-4">Kami menyediakan Jasa Fotografi, Jasa Videografi
                        dengan Tim yang profesional sehingga menghasilkan layanan yang berkualitas dengan harga cukup
                        terjangkau.</p>

                    <!--div button-->
                    <div>
                        <a href="#about" class="btn"
                            style="background-color: rgb(17, 105, 173);color: white;">Tentang
                            Kami</a>
                        <a href="#project" class="btn btn-outline-primary">Our Project</a>
                    </div>
                    <!--div button-->
                </div>
                <!--box pertama-->

                <!--box kedua-->
                <div class="box animate__animated animate__fadeInRight animate__delay-1s">
                    <img src={{ asset('/gambar/banner.jpeg') }} alt="Hero Image">
                </div>

            </div>
        </div>
    </section>
    <!--hero section-->
    <div class="service" id="service" style="margin-bottom: 4%">
        <div class="service-box">
            <div class="service p-4 shadow text-white rounded-3 d-flex align-items-center justify-content-center"
                style="background-color: rgb(17, 105, 173);">
                <i class="fa-solid fa-camera-retro me-4" style="font-size: 150px; padding: 70px 20px;"></i>
                <div class="text-center">
                    <h1 class="fw-bold mb-3">We cover all photography service</h1>
                    <p class="lh-lg">
                        Percayakan pada layanan jasa fotografi kami dan nikmati <br>setiap detail yang kami potret untuk
                        menjadikan kenangan Anda abadi.
                    </p>
                    <div class="d-flex gap-3 justify-content-center mt-4">
                        <div class="rounded-circle bg-white p-3">
                            <i class="fa-solid fa-camera" style="font-size: 24px; color: rgb(17, 105, 173);"></i>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fa-solid fa-video" style="font-size: 24px; color: rgb(17, 105, 173);"></i>
                        </div>
                        <div class="rounded-circle bg-white p-3">
                            <i class="fa-solid fa-image" style="font-size: 24px; color: rgb(17, 105, 173);"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--section about-->
    <div class="about" id="about" style="margin-bottom: 4%">
        <div class="container">
            <div class="about-box text-center">
                <h1 class="fw-bold mb-4" data-aos="fade-up" data-aos-duration="1000"
                    style="color: rgb(17, 105, 173) ">
                    Tentang Kami</h1>

                <div class="box pt-4 d-flex gap-3 flex-md-row flex-column">
                    <p class="lh-lg mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        babproduction.id adalah salah satu website penyedia Jasa Fotografer dan dapat menjadi pilihan
                        untuk anda yang sedang mencari Jasa Fotografi Murah di Jakarta. Kami memiliki berbagai Layanan
                        Fotografi dari banyak Fotografer Freelance di seluruh Indonesia. Saat ini Jasa Foto untuk
                        Dokumentasi Acara menjadi kebutuhan yang sangat penting dalam berbagai event dan juga kebutuhan
                        untuk Branding Perusaahan atau Bisnis anda.<br><br>

                        Sejak kurang lebih 6 tahun lalu atau tepatnya pada 2014, kami sudah banyak melakukan Layanan
                        Fotografi untuk berbagai jenis kebutuhan personal dan juga perusahaan di seluruh wilayah
                        Indonesia, baik perusahaan startup mulai dari Level Cockroach, Ponies, Centaurs, Unicorn,
                        Decacorn hingga Hectocorn, beberapa klien juga sudah mempercayakan kami untuk menjadikan salah
                        satu Jasa Fotografi terpercaya yang ada di Indonesia.
                    </p>
                    <img class="content-center" data-aos="fade-up" data-aos-duration="500"
                        src={{ asset('/gambar/dua.jpeg') }} alt="About Image">
                </div>
            </div>
        </div>
    </div>

    <!--section about-->

    <!--section services-->
    <div class="service" id="service">
        <div class="container">
            <div class="service-box">
                <h1 class="fw-bold mb-3 mt-4" style="color: rgb(17, 105, 173); text-align:center">Mengapa Harus
                    Memilih Jasa Fotografi Kami?</h1>
                <div class="box pt-4 d-flex gap-3 flex-md-row flex-column">
                    <div class="service p-4 shadow text-white rounded-3  d-flex flex-column align-items-center"
                        style="background-color:rgb(17, 105, 173) ">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <h4 class="fw-bold mb-4">Konsultasi gratis</h4>
                        <p class="lh-lg">Untuk anda yang sedang bimbang untuk memilih layanan kami, customer service
                            kami siap memberikan anda konsultasi gratis selama 24 Jam</p>
                    </div>

                    <div class="service p-4 shadow text-white rounded-3  d-flex flex-column align-items-center"
                        style="background-color:rgb(17, 105, 173) ">
                        <i class="fa-solid fa-check-to-slot"></i>
                        <h4 class="fw-bold mb-4">Portfolio</h4>
                        <p class="lh-lg">Kami sudah memiliki banyak portofolio yang terdiri dari berbagai jenis
                            perusahaan dan juga kebutuhan pribadi seperti foto wedding, event, produk dan seminar.</p>
                    </div>

                    <div class="service p-4 shadow  text-white rounded-3 d-flex flex-column align-items-center"
                        style="background-color:rgb(17, 105, 173) ">
                        <i class="fa-solid fa-check-to-slot mb-3"></i>
                        <h4 class="fw-bold mb-4">Layanan Lengkap</h4>
                        <p class="lh-lg">Banyak pilihan Jasa Fotografi sesuai dengan kebutuhan yang anda inginkan dan
                            untuk lebih lengkapnya anda bisa cek Layanan di Bawah ini secara lengkap.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--section services-->

    <!--section project-->
    <div class="projects overflow-hidden" id="project">
        <div class="container px-4">
            <div class="project-box">
                <h1 class="fw-bold mb-3 text-center" style="margin-top: 100px;">Kategori Kami</h1>
                <div class="row justify-content-center pt-4 gap-4">
                    @foreach ($categories as $category)
                        <div class="col col-md-5 col-12 shadow p-3 rounded mb-4">
                            <img src="{{ asset('storage/category/' . $category->photo) }}" alt="{{ $category->name }}"
                                class="project-image">
                            <h4 class="pt-4">{{ $category->name }}</h4>
                            <p>{{ $category->description }}</p>
                            <div>
                                <a href="/kategory-paket/{{ $category->id }}" class="btn btn-dark" target="_blank"
                                    style="background-color: rgb(17, 105, 173); border-color: rgb(17, 105, 173);">
                                    Detail Category
                                </a>

                                {{-- <a href="#" class="btn btn-danger" target="_blank">View website</a> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!--section project-->

    <!--section faq-->
    <div class="faq" id="faq">
        <div class="container">
            <div class="faq-box">
                <h1 class="fw-bold mb-3 text-center" style="margin-top: 100px;">FAQ</h1>
                <p class="lh-lg mb-3 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, similique possimus quasi
                    aspernatur ut sed explicabo!
                </p>
                <div class="accordion pt-4" id="accordionExample">
                    <div class="row row-cols-md-2 row-cols-1 g-4">



                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button
                                        class="accordion-button collapsed bg-danger text-white fw-bold lh-lg rounded-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">
                                        Bagaimana saya menghubungi layanan?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is shown by
                                        default, until the collapse plugin adds the appropriate classes that we use to
                                        style each element. These classes control the overall appearance, as well as the
                                        showing and hiding via CSS transitions. You can modify any of this with custom
                                        CSS or overriding our default variables. It's also worth noting that just about
                                        any HTML can go within the <code>.accordion-body</code>, though the transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button
                                        class="accordion-button collapsed bg-danger text-white fw-bold lh-lg rounded-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="true" aria-controls="collapseFour">
                                        Apakah layanan ini gratis?
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the fourth item's accordion body.</strong> It is shown by
                                        default, until the collapse plugin adds the appropriate classes that we use to
                                        style each element. These classes control the overall appearance, as well as the
                                        showing and hiding via CSS transitions. You can modify any of this with custom
                                        CSS or overriding our default variables. It's also worth noting that just about
                                        any HTML can go within the <code>.accordion-body</code>, though the transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button
                                        class="accordion-button collapsed bg-danger text-white fw-bold lh-lg rounded-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                        aria-expanded="true" aria-controls="collapseFive">
                                        Apa yang bisa saya dapatkan?
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the fifth item's accordion body.</strong> It is shown by
                                        default, until the collapse plugin adds the appropriate classes that we use to
                                        style each element. These classes control the overall appearance, as well as the
                                        showing and hiding via CSS transitions. You can modify any of this with custom
                                        CSS or overriding our default variables. It's also worth noting that just about
                                        any HTML can go within the <code>.accordion-body</code>, though the transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix"
                                    style="background-color:rgb(17, 105, 173) ">
                                    <button
                                        class="accordion-button collapsed bg-danger text-white fw-bold lh-lg rounded-3"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                        aria-expanded="true" aria-controls="collapseSix">
                                        Bagaimana cara mengakses layanan ini?
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the sixth item's accordion body.</strong> It is shown by
                                        default, until the collapse plugin adds the appropriate classes that we use to
                                        style each element. These classes control the overall appearance, as well as the
                                        showing and hiding via CSS transitions. You can modify any of this with custom
                                        CSS or overriding our default variables. It's also worth noting that just about
                                        any HTML can go within the <code>.accordion-body</code>, though the transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--section faq-->

    <!-- footer -->
    <section class="footer" style="background-color: rgb(17, 105, 173);">
        <div class="container">
            <div class="footer-box">
                <div class="row justify-content-between gy-4">
                    <div class="col col-md-4 col-12 text-white">
                        <div class="d-flex align-items-center gap-3">
                            <img src="./assets/icon/nm.png" alt="" width="30" height="30"
                                class="d-inline-block align-text-top rounded">
                            <h2 class="fw-bold text-white">Ngoding</h2>
                        </div>
                        <p class="lh-lg opacity-75 m-0">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Nesciunt repudiandae molestiae officia voluptatum quis ad
                            iste alias sequi omnis. Officiis.
                        </p>
                    </div>

                    <div class="col col-md-2 col-12 d-flex flex-column text-white gap-2">
                        <h4 class="fw-bold">Menu</h4>
                        <a href="#home" class="text-white text-decoration-none">Home</a>
                        <a href="#about" class="text-white text-decoration-none">About</a>
                        <a href="#service" class="text-white text-decoration-none">Services</a>
                        <a href="#projek" class="text-white text-decoration-none">Projects</a>
                        <a href="#faq" class="text-white text-decoration-none">FAQ</a>
                    </div>

                    <div class="col col-md-4 col-12 d-flex flex-column text-white gap-2">
                        <h4 class="fw-bold">Contact Us</h4>
                        <p class="m-0 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-envelope"></i>
                            fp3175723@gmail.com
                        </p>

                        <p class="m-0 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-phone"></i>
                            0875237898
                        </p>

                        <p class="m-0 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-location-dot"></i>
                            Jl. KH. Hasyim Asyari, Kel. Banjarmlati, Kec. Mojoroto, Kota Kediri, Jawa Timur
                        </p>
                    </div>
                </div>
            </div>
            <div class="copyright text-center text-white">
                <p class="lh-lg">&copy; copyright by <span class="fw-bold"> MFP</span> 2024, All Rights Reserved</p>
            </div>
        </div>
    </section>
    <!-- footer -->





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
