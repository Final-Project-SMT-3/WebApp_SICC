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
                    <h5 class="card-title fw-semibold mb-4">Juara</h5>
                    <div class="d-flex justify-content-between mb-4">
                        <p>Ini adalah halaman untuk mengatur Juara</p>
                        <a href="/admin/MasterJuara/create"><button class="btn btn-primary">Tambah Lomba</button></a>
                    </div>
                    <table id="<?= count($data) > 0 ? 'dataTables' : '' ?>" class="table table-hover"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Lomba</th>
                                <th>Kelompok</th>
                                <th>Kategori Juara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td colspan="5" class="text-center">Belum ada data</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Content End -->
    </div>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/admin/components/scripts.php');
?>