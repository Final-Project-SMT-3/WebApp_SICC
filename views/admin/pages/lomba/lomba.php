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
                    <h5 class="card-title fw-semibold mb-4">Lomba</h5>
                    <div class="d-flex justify-content-between mb-4">
                        <p>Ini adalah halaman untuk mengatur Lomba</p>
                        <a href="/admin/MasterLomba/create"><button class="btn btn-primary">Tambah Lomba</button></a>
                    </div>
                    <table id="<?= count($data) > 0 ? 'dataTables' : '' ?>" class="table table-hover"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50px;">Nomor</th>
                                <th>Nama Lomba</th>
                                <th style="width: 300px;">Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($data) > 0) {
                                foreach ($data as $key => $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1 ?>
                                        </td>
                                        <td>
                                            <?= $item['nama_lomba'] ?>
                                        </td>
                                        <td>
                                            <?= $item['detail_lomba'] ?? '-' ?>
                                        </td>
                                        <td><img class="img-fluid rounded-2" src="/storage/public/<?= $item['foto'] ?? '-' ?>"
                                                alt="" width="100"></td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-warning m-1">
                                                    <a class="text-white" href="/admin/MasterLomba/edit/<?= $item['id'] ?>"><i
                                                            class="ti ti-pencil"></i></a>
                                                </button>
                                                <button type="button" class="btn btn-danger m-1">
                                                    <a class="text-white" href="/admin/MasterLomba/delete/<?= $item['id'] ?>"><i
                                                            class="ti ti-trash"></i></a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data</td>
                                </tr>
                                <?php
                            }
                            ?>
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