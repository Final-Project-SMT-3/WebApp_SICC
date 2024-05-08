<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/user/components/head.php');
session_start();
?>

<div id="forgetPass" class="container-fluid">
    <div class="row vh-100">
        <div class="col-lg-6 illustration-daftar d-flex justify-content-center align-items-center">

        </div>
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <form action="/register/cekOtp" method="POST" class="card-form">
                <div class="title-forms">
                    <h3 class="title">Daftar Lomba</h3>
                    <div style="width: 350px;" class="underline mb-4"></div>
                </div>
                <div class="inputGroup mt-4">
                    <!-- Steps -->
                    <div class="tab">
                        <h3>Step 1: Membuat Password</h3>
                        <!-- Input fields for leader's biodata -->
                        <div class="input">
                            <input class="input-field" type="number" min="0" max="99999" name="otp" required />
                            <label class="input-label">Kode OTP</label>
                        </div>
                        <input type="hidden" name="id" value="<?= $_SESSION['id_register']; ?>">
                        <div class="input">
                            <input class="input-field" type="text" min="0" max="99999" name="password" required />
                            <label class="input-label">Password</label>
                        </div>
                        <!-- Next and Previous buttons -->
                        <button type="button" class="prevBtn btn" onclick="nextPrev(-1)">
                            Previous
                        </button>
                        <button type="button" class="nextBtn btn" onclick="nextPrev(1)">
                            Next
                        </button>
                    </div>
                    <div class="tab">
                        <h3>Step 2: Pilih Lomba</h3>
                        <!-- Input fields for leader's biodata -->
                        <select name="id_detail_lomba" id="" class="form-control">
                            <option value="">Pilih Lomba</option>
                            <?php foreach ($data as $key => $item) { ?>
                                <option value="<?= $item['id'] ?>">
                                    <?= $item['nama_lomba'] ?>
                                </option>
                            <?php } ?>

                        </select>
                        <!-- Next and Previous buttons -->
                        <button type="button" class="nextBtn btn" onclick="nextPrev(1)">
                            Next
                        </button>
                    </div>

                    <div class="tab">
                        <h3>Step 3: Pilih Lomba</h3>
                        <div class="input">
                            <input class="input-field" type="text" id="namaTim" name="nama_tim" required />
                            <label for="memberName" class="input-label">Nama Tim</label>
                        </div>

                        <button type="button" class="prevBtn btn" onclick="nextPrev(-1)">
                            Previous
                        </button>
                        <button type="button" class="prevBtn btn" onclick="nextPrev(1)">
                            Next
                        </button>
                    </div>

                    <div class="tab">
                        <h3>Step 4: Biodata Kelompok</h3>
                        <!-- Input fields for member's biodata -->
                        <label for="memberName">Nama Ketua:</label>
                        <input class="form-control" type="text" id="memberName" name="namaKetua" required />
                        <label for="memberEmail">NIM Ketua:</label>
                        <input class="form-control" type="text" id="memberName" name="nimKetua" required />
                        <label for="memberName">Nama Anggota 1:</label>
                        <input class="form-control" type="text" id="memberName" name="namaAnggota[]" required />
                        <label for="memberEmail">NIM Anggota 1:</label>
                        <input class="form-control" type="text" id="memberEmail" name="nimAnggota[]" required />
                        <label for="memberName">Nama Anggota 2:</label>
                        <input class="form-control" type="text" id="memberName" name="namaAnggota[]" required />
                        <label for="memberEmail">NIM Anggota 2:</label>
                        <input class="form-control" type="text" id="memberEmail" name="nimAnggota[]" required />
                        <label for="memberName">Nama Anggota 3:</label>
                        <input class="form-control" type="text" id="memberName" name="namaAnggota[]" required />
                        <label for="memberEmail">NIM Anggota 3:</label>
                        <input class="form-control" type="text" id="memberEmail" name="nimAnggota[]" required />

                        <!-- Next and Previous buttons -->
                        <button type="button" class="prevBtn btn" onclick="nextPrev(-1)">
                            Previous
                        </button>
                        <button type="submit" class="nextBtn btn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/user/components/scripts.php');
?>