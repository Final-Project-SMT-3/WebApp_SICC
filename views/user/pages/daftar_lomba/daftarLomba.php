<?php
include($_SERVER['DOCUMENT_ROOT'] . '/views/user/components/head.php');
?>

<div id="forgetPass" class="container-fluid">
    <div class="row vh-100">
        <div class="col-lg-6 illustration-daftar d-flex justify-content-center align-items-center">

        </div>
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <form action="/admin" method="POST" class="card-form">
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
                        <div class="input">
                            <input class="input-field" type="text" min="0" max="99999" name="otp" required />
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
                        <?php foreach ($data as $key => $item) { ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioLomba" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <?= $item['nama_lomba']; ?>
                                </label>
                            </div>
                        <?php } ?>
                        <!-- Next and Previous buttons -->
                        <button type="button" class="nextBtn btn" onclick="nextPrev(1)">
                            Next
                        </button>
                    </div>

                    <div class="tab">
                        <h3>Step 3: Pilih Lomba</h3>
                        <div class="input">
                            <input class="input-field" type="text" id="namaTim" name="memberName" required />
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
                        <input type="text" id="memberName" name="namaKetua" required />
                        <label for="memberEmail">NIM Ketua:</label>
                        <input type="text" id="memberEmail" name="nimKetua" required />
                        <label for="memberName">Email Ketua:</label>
                        <input type="email" id="memberName" name="emailKetua" required />
                        <label for="memberName">Nama Anggota 1:</label>
                        <input type="text" id="memberName" name="namaAnggota1" required />
                        <label for="memberEmail">NIM Anggota 1:</label>
                        <input type="text" id="memberEmail" name="nimAnggota1" required />
                        <label for="memberName">Nama Anggota 2:</label>
                        <input type="text" id="memberName" name="namaAnggota2" required />
                        <label for="memberEmail">NIM Anggota 2:</label>
                        <input type="text" id="memberEmail" name="nimAnggota2" required />
                        <label for="memberName">Nama Anggota 3:</label>
                        <input type="text" id="memberName" name="namaAnggota3" required />
                        <label for="memberEmail">NIM Anggota 3:</label>
                        <input type="text" id="memberEmail" name="nimAnggota3" required />

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