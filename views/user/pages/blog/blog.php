<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/user/components/head.php');
?>


<body style="background-color: #f2f2f2;">
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/views/user/components/navbar.php');
    ?>

    <main id="main">
        <section id="blog" class="blog">
            <div class="container">
                <div class="section-title">
                    <h2>Berita</h2>
                    <p>Berita Terkini</p>
                </div>
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0 img-cropped"
                                    src="/public/assets/landing_page/img/404.png" alt="">
                            </div>
                            <div class="blog_details">
                                <h6>17 November 2023</h6>
                                <a class="d-inline-block" href="/blog/berita/coba-judul">
                                    <h1 style="font-weight: bold">Coba Judul</h1>
                                </a>
                                <p style=" height: 80px; overflow: hidden;">Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Neque illo eaque dolore esse tempora eligendi accusamus explicabo.
                                    Quisquam quia, ipsam ad esse, laudantium voluptas obcaecati deserunt perspiciatis
                                    quasi consectetur cumque.</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="bx bxs-user"></i>admin</a></li>
                                    <li><a href="blog/berita"><i class="bx bx-category"></i>Berita</a>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/views/user/components/footer.php');
    ?>

    <div class="loader-container" id="preloader">
        <span class="loader"></span>
    </div>
    <a href="#heroLomba" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="ti ti-arrow-up"></i></a>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/views/user/components/scripts.php');
    ?>