<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password | SICC</title>
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
    <div id="forgetPass" class="container-fluid">
        <div class="row vh-100">
            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                <form action="../admin/dashboard.php" method="POST" class="card-form">
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
                        <p class="mt-2">Belum punya akun? Ayo <a href="register.php">daftar disini</a></p>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 illustration d-flex justify-content-center align-items-center">
                <img class="img-fluid" src="../../assets/img/illustration_forgetpass.png" alt="gambar login">
            </div>
        </div>
    </div>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>