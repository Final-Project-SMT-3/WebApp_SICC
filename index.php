<?php

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        include 'view/user/index.php';
        break;
    case '/login':
        include 'view/user/login.php';
        break;
    case '/register':
        include 'view/user/register.php';
        break;
    case '/forgetPassword':
        include 'view/user/forgetPassword.php';
        break;
    case '/admin':
        include 'view/admin/dashboard.php';
        break;
    case '/admin/artikel':
        include 'view/admin/artikel.php';
        break;
    default:
        include 'view/user/404.php';
        break;
}
?>