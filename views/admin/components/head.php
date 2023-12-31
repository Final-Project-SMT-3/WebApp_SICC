<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedIn']) && !$_SESSION['loggedIn'] === true) {
    header('Location: /login');
    exit;
}
?>
<!doctype html>
<html lang="en_US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page | SICC</title>
    <link rel="shortcut icon" type="image/png" href="/public/assets/landing_page/img/logo.png" />
    <link rel="stylesheet" href="/public/assets/admin_page/css/styles.min.css" />
    <link rel="stylesheet" href="/public/assets/admin_page/css/myStyles.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>