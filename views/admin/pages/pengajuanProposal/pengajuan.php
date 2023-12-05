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
                    <h5 class="card-title fw-semibold mb-4">Pengajuan</h5>
                    <div class="d-flex justify-content-between mb-4">
                        <p>Ini adalah halaman untuk mengatur pengajuan proposal mahasiswa</p>
                    </div>
                    <table id="<?= count($data) > 0 ? 'dataTables' : '' ?>" class="table table-hover"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kelompok</th>
                                <th>Judul</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($data) > 0) {
                                foreach ($data as $key => $item) { ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1 ?>
                                        </td>
                                        <td>
                                            <?= $item['nama_kelompok'] ?>
                                        </td>
                                        <td>
                                            <?= $item['judul'] ?>
                                        </td>
                                        <td><a href="PengajuanProposal/tinjauan/<?= $item['id'] ?>"><button
                                                    class="btn btn-info"><i class="ti ti-clipboard-text"
                                                        style="font-size: 1rem;"></i></button></a>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
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