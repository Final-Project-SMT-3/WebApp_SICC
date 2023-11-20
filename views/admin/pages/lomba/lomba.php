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
                        <a href="lomba/add"><button class="btn btn-primary">Tambah Lomba</button></a>
                    </div>
                    <table id="dataTables" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Lomba</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($data) > 0){
                                    foreach($data as $key => $item){
                                        ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $item['nama_lomba'] ?></td>
                                                <td><?= $item['deskripsi'] ?? '-' ?></td>
                                                <td><img class="img-fluid rounded-2" src="https://picsum.photos/237/" alt=""></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning">
                                                        <a href="/admin/MasterLomba/edit/<?= $item['id'] ?>">Edit</a>
                                                    </button>
                                                    <button type="button" class="btn btn-danger">
                                                        <a href="/admin/MasterLomba/delete/<?= $item['id'] ?>">Delete</a>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                        <tr>
                                            <td colspan="4">Belum ada data</td>
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