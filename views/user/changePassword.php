<?php
include("components/head.php");
?>

<div id="forgetPass" class="container-fluid">
    <div class="row vh-100">
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <form action="/admin" method="POST" class="card-form">
                <div class="title-forms">
                    <h3 class="title">Change Password</h3>
                    <div style="width: 350px;" class="underline mb-4"></div>
                    <p>Masukkan kode OTP yang sudah kami kirimkan melalui e-mail<br>lalu ubah passwordmu
                    </p>
                </div>
                <div class="inputGroup mt-4">
                    <div class="input">
                        <input name="otp" type="txt" class="input-field" required />
                        <label class="input-label">Kode OTP</label>
                    </div>
                    <div class="input">
                        <input name="newPass" type="password" class="input-field" required />
                        <label class="input-label">Password Baru</label>
                    </div>
                    <div class="input mb-5">
                        <input name="newPassConfirm" type="password" class="input-field" required />
                        <label class="input-label">Konfirmasi Password Baru</label>
                    </div>
                    <button type="submit" name="submit" class="btn">Ganti Password</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 illustration d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="/public/assets/landing_page/img/illustration_forgetpass.png" alt="gambar login">
        </div>
    </div>
</div>

<?php
include("components/scripts.php");
?>