<?php
$title = "Halaman Utama";

$current_url = $_SERVER['REQUEST_URI'];

if (strpos($current_url, '/login') !== false) {
    $title = "Login Page";
} elseif (strpos($current_url, '/register') !== false) {
    $title = "Register Page";
} elseif (strpos($current_url, '/forgetPassword') !== false) {
    $title = "Forget Password Page";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title; ?>
    </title>
    <link rel="stylesheet" href="/assets/landing_page/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/landing_page/css/styles.css">
</head>

<body>