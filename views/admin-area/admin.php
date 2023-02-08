<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-4.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/fonts/fontawesome-5/css/all.min.css") ?>">
    <title>Admin</title>
</head>

<body class="d-flex">

    <div class=" d-flex flex-column flex-shrink-0 text-bg-dark"
        style="width: 280px; height: 100vh; background-color: #f8fafd">
        <div style="background-color: #0d47a1; width: 100%; height: 40px; font-size: 25px"
            class="d-flex justify-content-center align-items-center">
            <i class="fas fa-handshake me-1"></i>
            TAKALO
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center mt-4 mb-3 px-3">
            <div
                style="width: 70px; height: 70px; background: url('<?= base_url("assets/img/client/usr.png") ?>') center no-repeat; border: 5px solid white; border-radius: 50%;">
            </div>
            <p class="m-0 mt-3">
                <?= $_SESSION['user']->first_name." ".$_SESSION['user']->name ?>
            </p>
        </div>
        <ul class="mt-5 nav nav-pills flex-column mb-auto px-3" style="font-size: 14px;">
            <li class="nav-item">
                <a href="<?= base_url("index.php/page/admin/home") ?>" class="nav-link text-white" aria-current="page">
                    <i class="fas fa-newspaper me-2"></i>
                    Gestion des categories
                </a>
            </li>
            <li>
                <a href="<?= base_url("index.php/page/admin/users") ?>" class="nav-link text-white">
                    <i class="fas fa-user-friends me-2"></i>
                    Liste d'utilisateur
                </a>
            </li>
            <li>
                <a href="<?= base_url("index.php/page/admin/exchange") ?>" class="nav-link text-white">
                    <i class="fas fa-history me-2"></i>
                    Historique des echanges
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= base_url("assets/img/client/user.png") ?>" alt="" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="<?= base_url("index.php/page/deconnection") ?>">Sign out</a></li>
            </ul>
        </div>
    </div>
    <script src="<?= base_url("assets/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>