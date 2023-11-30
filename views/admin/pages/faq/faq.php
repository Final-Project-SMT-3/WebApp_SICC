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
                    <h5 class="card-title fw-semibold mb-4">FAQ</h5>
                    <div class="d-flex justify-content-between mb-4">
                        <p>Ini adalah halaman untuk mengatur Frequently Asked Question</p>
                        <a href="/admin/MasterFaq/create"><button class="btn btn-primary">Tambah FAQ</button></a>
                    </div>
                    <table id="<?= count($data) > 0 ? 'dataTables' : '' ?>" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Tipe</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($data) > 0) {
                                foreach ($data as $key => $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $key + 1 ?>
                                        </td>
                                        <td>
                                            <?= $item['pertanyaan'] ?? '-' ?>
                                        </td>
                                        <td>
                                            <?= $item['jawaban'] ?? '-' ?>
                                        </td>
                                        <td>
                                            <?= $item['tipe'] ?? '-' ?>
                                        </td>
                                        <td>
                                            <?= $item['created_at'] ?? '-' ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="text-white" href="/admin/MasterFaq/edit/<?= $item['id'] ?>"><button
                                                        type="button" class="btn btn-warning m-1"><i
                                                            class="ti ti-pencil"></i></button></a>
                                                <a class="text-white" href="/admin/MasterFaq/delete/<?= $item['id'] ?>"><button
                                                        type="button" class="btn btn-danger m-1"><i
                                                            class="ti ti-trash"></i></button></a>
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