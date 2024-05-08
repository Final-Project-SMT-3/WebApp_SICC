<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/head.php');
?>


<!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <?php
    include ($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/sidebar.php');
    ?>
    <!--  Sidebar End -->

    <!-- Main wrapper -->
    <div class="body-wrapper">

        <!-- Header Start -->
        <?php
        include ($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/header.php');
        ?>
        <!-- Header End -->

        <!-- Content Start -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Tinjauan Proposal</h5>
                    <p class="mb-5">Ini adalah halaman untuk meninjau proposal</p>

                    <div class="mb-3 col-md-3">
                        <a href="/assets/landing_page/img/404.png" download="Coba File"><button
                                class="btn btn-info">Download File Proposal<i
                                    class="ms-2 ti ti-download"></i></button></a>
                    </div>
                    <form class="row" action="/admin/PengajuanProposal/update" method="POST">
                        <input type="hidden" name="id" value="<?= $data[0]['id'] ?>">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Tanggapan terkait pengajuan proposal</label>
                            <textarea placeholder="Tulis tanggapan disini.." name="review" id="" rows="3"
                                class="form-control"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Tindak lanjut</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio1" value="Accept">
                                <label class="form-check-label" for="radio1">
                                    Disetujui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio2" value="Revision">
                                <label class="form-check-label" for="radio2">
                                    Revisi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio3" value="Decline">
                                <label class="form-check-label" for="radio3">
                                    Ditolak
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Kirim</button>
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
include ($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/scripts.php');
?>