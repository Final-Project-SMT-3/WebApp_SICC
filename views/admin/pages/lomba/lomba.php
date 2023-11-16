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
                                <th>Tanggal Pelaksanaan</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>2011-04-25</td>
                                <td><img class="img-fluid rounded-2" src="https://picsum.photos/237/" alt=""></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>2011-07-25</td>
                                <td><img class="img-fluid rounded-2" src="https://picsum.photos/237/" alt=""></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>2009-01-12</td>
                                <td><img class="img-fluid rounded-2" src="https://picsum.photos/237/" alt=""></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>2012-03-29</td>
                                <td class="text-center rounded-2"><img class="img-fluid"
                                        src="https://picsum.photos/237/" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>2008-11-28</td>
                                <td><img class="img-fluid rounded-2" src="https://picsum.photos/237/" alt=""></td>
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