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
                                <th>Anggota Kelompok</th>
                                <th>Judul</th>
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
                                            <?= $item['nama_kelompok'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            $namaAnggota = explode(', ', $item['nama_anggota']);
                                            $nimAnggota = explode(', ', $item['nim_anggota']);

                                            // Menggabungkan nama anggota dengan NIM anggota
                                            $combinedData = array_map(function ($nama, $nim) {
                                                return "$nama ($nim)";
                                            }, $namaAnggota, $nimAnggota);

                                            // Menampilkan nama dan NIM anggota dalam satu kolom
                                            echo implode('<br>', $combinedData);
                                            ?>
                                        </td>
                                        <td>
                                            <?= $item['judul'] ?>
                                        </td>
                                        <td><a href="#"><button class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#modalTinjauan"><i class="ti ti-clipboard-text"
                                                        style="font-size: 1rem;"></i></button></a>
                                        </td>
                                    </tr>
                                    <!-- Modal -->

                                    <div class="modal fade" id="modalTinjauan" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tinjauan Judul
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="PengajuanJudul/updateJudul/<?= $item['id']; ?>" method="POST">
                                                    <div class="modal-body">
                                                        <div class="mb-3 col-md-12">
                                                            <label class="form-label">Tanggapan terkait pengajuan Judul</label>
                                                            <textarea placeholder="Tulis tanggapan disini.."
                                                                name="tanggapanJudul" id="" rows="3"
                                                                class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label class="form-label">Tindak lanjut</label>
                                                            <div class="form-check">
                                                                <input class="form-check-input" value="Accept" type="radio"
                                                                    name="radio" id="radio1">
                                                                <label class="form-check-label" for="radio1">
                                                                    Disetujui
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" value="Revision" type="radio"
                                                                    name="radio" id="radio2">
                                                                <label class="form-check-label" for="radio2">
                                                                    Revisi
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" value="Decline" type="radio"
                                                                    name="radio" id="radio3">
                                                                <label class="form-check-label" for="radio3">
                                                                    Ditolak
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary">Proses</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada pengajuan Judul</td>
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