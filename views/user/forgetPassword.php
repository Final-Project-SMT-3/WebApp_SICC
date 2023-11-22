<?php
include("components/head.php");
?>

<div id="forgetPass" class="container-fluid">
    <div class="row vh-100">
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <form action="/admin" method="POST" class="card-form">
                <div class="title-forms">
                    <h3 class="title">Forget Password</h3>
                    <div style="width: 350px;" class="underline mb-4"></div>
                    <p>Tenang, kami akan membantu mengembalikan akunmu
                        <br>Silahkan cantumkan e-mailmu
                    </p>
                </div>
                <div class="inputGroup mt-4">
                    <div class="input">
                        <input name="username" type="text" class="input-field" required />
                        <label class="input-label">Username</label>
                    </div>
                    <div class="input mb-5">
                        <input name="password" type="password" class="input-field" required />
                        <label class="input-label">Password</label>
                    </div>
                    <button type="submit" name="submit" class="btn">Sign In</button>
                    <p class="mt-2">Belum punya akun? Ayo <a href="/register">daftar disini</a></p>
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