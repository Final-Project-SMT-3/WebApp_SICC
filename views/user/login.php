<?php
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    if ($_SESSION['userType'] === 'mahasiswa') {
        header('Location: /verified');
        exit;
    } else if ($_SESSION['userType'] === 'dosen') {
        header('Location: /admin');
        exit;
    } else if ($_SESSION['userType'] === 'admin') {
        header('Location: /admin');
        exit;
    }
}

include("components/head.php");
?>

<div id="login" class="container-fluid">
    <div class="row vh-100">
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <form action="/login/login" method="POST" class="card-form">
                <div class="title-forms">
                    <h3 class="title">Sign In</h3>
                    <div class="underline mb-4"></div>
                    <p>Selamat datang kembali, silahkan Login untuk mengakses SI CC<br> Apakah kamu <a
                            href="/forgetPassword">Lupa
                            Kata Sandi?</a></p>
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
            <img class="img-fluid" src="/public/assets/landing_page/img/illustration_login.png" alt="gambar login">
        </div>
    </div>
</div>

<?php
include("components/scripts.php");
?>