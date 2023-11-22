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
                    <h5 class="card-title fw-semibold mb-4">Edit Lomba</h5>
                    <p class="mb-5">Ini adalah halaman untuk mengedit Lomba</p>

                    <form class="row" action="/admin/MasterLomba/update" method="POST">
                        <input type="hidden" name="id" value="<?=$data[0]['id']?>">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" id="" name="nama" value="<?= $data[0]['nama_lomba'] ?>"
                                oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control" id="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="" rows="1" class="form-control"><?= $data[0]['deskripsi'] ?></textarea>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="" onchange="loadFile(event)">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Preview</label>
                            <img id="output" width="350" height="160" class="img-thumbnail">
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