<?php

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        include 'views/user/index.php';
        break;
    case '/login':
        include 'views/user/login.php';
        break;
    case '/register':
        include 'views/user/register.php';
        break;
    case '/forgetPassword':
        include 'views/user/forgetPassword.php';
        break;
    case '/admin':
        include 'views/admin/dashboard.php';
        break;
    case '/admin/artikel':
        include 'views/admin/pages/artikel/artikel.php';
        break;
    case '/admin/artikel/add':
        include 'views/admin/pages/artikel/artikel_add.php';
        break;
    case '/admin/lomba':
        include 'views/admin/pages/lomba/lomba.php';
        break;
    case '/admin/lomba/add':
        include 'views/admin/pages/lomba/lomba_add.php';
        break;
    case '/admin/faq':
        include 'views/admin/pages/faq/faq.php';
        break;
    case '/admin/faq/add':
        include 'views/admin/pages/faq/faq_add.php';
        break;
    case '/admin/pengajuan':
        include 'views/admin/pages/pengajuan/pengajuan.php';
        break;
    default:
        include 'views/user/404.php';
        break;
}
?>