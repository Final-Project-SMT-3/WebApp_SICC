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

        <!-- Content End -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Artikel</h5>
                    <div class="d-flex justify-content-between mb-4">
                        <p>Ini adalah halaman untuk mengatur artikel</p>
                        <a href="/admin/MasterArtikel/create"><button class="btn btn-primary">Tambah
                                Artikel</button></a>
                    </div>
                    <table id="<?= count($data) > 0 ? 'dataTables' : '' ?>" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th style="width: 500px;">Isi</th>
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
                                            <?= $item['judul'] ?>
                                        </td>
                                        <td><img class="img-fluid rounded-2"
                                                src="/storage/public/blog/<?= $item['gambar'] ?? '-' ?>" alt="" width="100">
                                        </td>
                                        <td>
                                            <?= $item['isi'] ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-warning m-1">
                                                    <a class="text-white"
                                                        href="/admin/MasterLomba/edit/<?= $item['id_artikel'] ?>"><i
                                                            class="ti ti-pencil"></i></a>
                                                </button>
                                                <button type="button" class="btn btn-danger m-1">
                                                    <a class="text-white"
                                                        href="/admin/MasterLomba/delete/<?= $item['id_artikel'] ?>"><i
                                                            class="ti ti-trash"></i></a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data</td>
                                </tr>
                            <?php } ?>
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