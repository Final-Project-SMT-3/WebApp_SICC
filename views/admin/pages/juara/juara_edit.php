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
                    <h5 class="card-title fw-semibold mb-4">Tambah Juara</h5>
                    <p class="mb-5">Ini adalah halaman untuk menambah Juara</p>
                    <form class="row" action="/admin/MasterFaq/store" method="POST">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Kelompok</label>
                            <select id="disabledSelect" class="form-select">
                                <option>Isi Kelompok</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Kategori Juara</label>
                            <input name="kategori" class="form-control"></input>
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