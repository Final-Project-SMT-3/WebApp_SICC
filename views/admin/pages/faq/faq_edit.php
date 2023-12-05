<?php

include($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/head.php');
?>


<!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/sidebar.php');
    ?>
    <!--  Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">

        <!-- Header Start -->
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/header.php');
        ?>
        <!-- Header End -->

        <!-- Content Start -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tambah FAQ</h5>
                    <p class="mb-5">Ini adalah halaman untuk menambah FAQ</p>

                    <form class="row" action="/admin/MasterFaq/update" method="POST">
                        <input type="hidden" name="id" value="<?= $data[0]['id'] ?>">

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Pertanyaan</label>
                            <input name="pertanyaan" type="text" class="form-control" id=""
                                value="<?= $data[0]['pertanyaan'] ?>">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Jawaban</label>
                            <textarea name="jawaban" rows="3" class="form-control"><?= $data[0]['jawaban'] ?></textarea>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Tipe</label>
                            <?php if ($data[0]['tipe'] == 'faq') { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTipe" id="flexRadioDefault1"
                                        checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        FAQ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTipe" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tips
                                    </label>
                                </div>
                            <?php } else { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTipe" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        FAQ
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="radioTipe" id="flexRadioDefault2"
                                        checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tips
                                    </label>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

</div>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/scripts.php');
?>