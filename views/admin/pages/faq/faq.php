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
                                                <a class="text-white" href="#"><button type="button" class="btn btn-danger m-1"
                                                        data-bs-toggle="modal" data-bs-target="#delete"><i
                                                            class="ti ti-trash"></i></button></a>
                                            </div>

                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus FAQ</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin ingin menghapus ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="/admin/MasterFaq/delete/<?= $item['id'] ?>"><button type="button"
                                                            class="btn btn-danger">Yakin</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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