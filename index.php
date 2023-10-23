<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Competition Center</title>
    <link rel="stylesheet" href="style.css">
    <script src="navbar.js"></script>
</head>

<body>
    <!-- Awalan Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-0 fixed-top sticky-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn"><img src="img/logo.png" alt="Logo SI CC" width="90px" class="p-1"></button>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="#"><button class="btn"><b>Beranda</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#informasi"><button class="btn"><b>Informasi</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#faq"><button class="btn"><b>FAQ</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="#"><button class="btn btn-light text-center rounded-pill"><b>Pendaftaran</b></button></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhiran Navbar -->
    <br><br><br><br><br>
    <!-- Showcase Awal -->
    <section class="p-5 pt-lg-5 text-center text-sm-start" id="home">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h6 class="fs-1" style="color: #094067;"><b>Selamat Datang di SI CC !</b></h6>
                    <p class="lead my-4 fs-5">
                        SI CC adalah sistem Informasi yang <br>
                        menyatukan berbagai macam informasi lomba <br>
                        seperti PKM, KMIPN, Gemastik, dan Pilmapres
                    </p>
                    <a href="#informasi">
                        <button class="btn btn-light rounded-pill btn-lg"><b> Baca Selengkapnya </b></button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Showcase Akhir -->
    <br><br><br><br>
    <!-- Card Kegiatan -->
    <section id="informasi" class="p-5">
        <p class="fs-2 text-center"><u><b>Informasi Lomba</b></u></p>
        <p class="fs-5 text-center">Berikut merupakan informasi tentang lomba yang ada</p>
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-3 mx-auto d-flex align-items-stretch mb-3">
                    <div class="card text-dark">
                        <img src="img/card.jpg" class="card-img-top" alt="card pkm">
                        <div class="card-body text-center">
                            <p class="card-text mb-3">
                                Program Kreatifitas Mahasiswa (PKM)
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary bg-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Baca Selengkapnya ->
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mx-auto d-flex align-items-stretch mb-3">
                    <div class="card text-dark">
                        <img src="img/card.jpg" class="card-img-top" alt="card kmipn">
                        <div class="card-body text-center">
                            <p class="card-text mb-3">
                                Kompetisi Mahasiswa Informatika Politeknik Nasional (KMIPN)
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary bg-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Baca Selengkapnya ->
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mx-auto d-flex align-items-stretch mb-3">
                    <div class="card text-dark">
                        <img src="img/card.jpg" class="card-img-top" alt="card gemastik">
                        <div class="card-body text-center">
                            <p class="card-text mb-3">
                                Pagelaran Mahasiswa Nasional Bidang Teknologi Informasi dan Komunikasi (GEMASTIK)
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary bg-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Baca Selengkapnya ->
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mx-auto d-flex align-items-stretch mb-3">
                    <div class="card text-dark">
                        <img src="img/card.jpg" class="card-img-top" alt="card pilmapres">
                        <div class="card-body text-center">
                            <p class="card-text mb-3">
                                Pemilihan Mahasiswa Berprestasi (Pilmapres)
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary bg-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Baca Selengkapnya ->
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhiran card kegiatan -->
    <br><br><br><br>
    <!-- faq -->
    <section class="p-5" id="faq">
        <p class="fs-2 text-center"><u><b>Frequently Asked Question</b></u></p>
        <p class="fs-5 text-center"> Berikut merupakan beberapa pertanyaan yang selalu ditanyakan, semoga bisa menjawab </p>
        <div class="container">
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bagaimana Cara Mendaftar di Website Ini ?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            Commodi obcaecati harum quam earum atque consectetur distinctio provident dolor minus?
                            Sit ratione odit aut doloremque libero, ad nobis vero praesentium ducimus!
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Bagaimana Cara Kita Menentukan Dosen Pembimbing?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus debitis consequatur eius at veritatis provident.
                            Ipsum voluptatem quod dolor nisi, quis est quo, magnam nemo maiores dolore magni totam rem.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apakah Kita Boleh Satu Tim Dengan Jurusan Lain?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima, fuga.
                            Consectetur voluptatum debitis blanditiis, facilis maiores voluptate culpa
                            et veniam illo suscipit nesciunt, saepe atque consequatur aperiam excepturi, mollitia iste!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Akhir faq -->
    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #094067">
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="my-2 p-1">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <img src="img/logo.png" alt="logo si cc" width="150px" class="my-5">
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-4 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> Jl. Mastrip No.164, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121</p>
                        <p><i class="fas fa-phone mr-3"></i> +62 831-1576-1027</p>
                        <p><i class="fas fa-envelope mr-3"></i> rayasya.dziqi@gmail.com</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Follow Us</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="#!" class="text-white">Instagram</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Twitter</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Facebook</a>
                        </p>
                        <p>
                            <a href="#!" class="text-white">Github</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.5)">
            © 2023 Copyright - Competition Center
        </div>
    </footer>
    <!-- Akhir Footer -->
</body>
</html>