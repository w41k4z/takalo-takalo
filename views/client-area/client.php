<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Album example · Bootstrap v5.3</title>

    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/bootstrap/css/bootstrap.min.css") ?>">

    <link href="<?= base_url("assets/fonts/fontawesome-5/css/all.min.css") ?>" rel="stylesheet">





    <style>
    body {
        height: 100vh;
    }

    .userState {
        padding-right: 10px;
        border: 1px solid black;
        border-radius: 30px;
    }

    .userImg {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        overflow: hidden;
        display: block;
        width: 30px;
        min-width: 30px;
        height: 30px;
        border-radius: 50%;
    }

    .navbar-collapse>ul li {
        color: aliceblue;
        transition: 0.2s;
        -webkit-transition: 0.2s;
        -moz-transition: 0.2s;
        -ms-transition: 0.2s;
        -o-transition: 0.2s;
    }

    .navbar-collapse>ul li:hover {
        transform: scale(1.05);
        -webkit-transform: scale(1.05);
        -moz-transform: scale(1.05);
        -ms-transform: scale(1.05);
        -o-transform: scale(1.05);
        color: white;
        font-weight: bold;
    }

    .navbar-collapse>ul li i {
        font-size: x-large;
        color: black;
    }
    </style>


</head>

<body>

    <header>
        <nav class="navbar navbar-expand-sm container-fluid p-0 px-2" style="background-color: #091b2f;">

            <p class="d-flex justify-content-center align-items-center navbar-brand m-0 me-5 text-white">
                <i class="fas fa-handshake me-3" style="font-size: 35px;">
                </i> TAKALO
            </p>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse pb-3 pb-md-0" id="navbars">

                <form action="<?= base_url("index.php/page/client/search") ?>" method="post"
                    class="d-flex justify-content-between align-items-center me-auto mt-4 mt-md-0 mb-4 mb-md-0">
                    <input type="search" style="border-radius: 10px;" placeholder="Mot cle..." name="motif" required>
                    <select class="ms-2" style="border-radius: 10px;" name="category" id="select">
                        <option value="all">Categorie</option>
                        <?php foreach($all_category as $categ) { ?>
                        <option value="<?= $categ->category_id ?>">
                            <?= $categ->category ?>
                        </option>
                        <?php } ?>
                    </select>
                </form>

                <ul class="navbar-nav ms-1 ms-md-0">
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex align-items-center"
                            href="<?= base_url("index.php/page/client/home" ) ?>"><i class="fas fa-home mx-2"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex align-items-center"
                            href="<?= base_url("index.php/page/client/request" ) ?>"><i
                                class="fas fa-comment-dots mx-2"></i>
                            Requettes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex align-items-center"
                            href="<?= base_url("index.php/page/client/profil" ) ?>"><i class="fas fa-users mx-2"></i>
                            Profil</a>
                    </li>
                </ul>

                <div class="dropdown userState d-flex align-items-center ms-auto my-3" data-bs-toggle="dropdown">
                    <p class="userImg m-0"
                        style="background-image: url('<?= base_url("assets/img/client/usr.png") ?>')">
                    </p>
                    <p class="m-0 ms-1 text-white">
                        <?= $_SESSION['user']->first_name." ".$_SESSION['user']->name ?>
                    </p>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown">
                        <li class="d-flex dropdown-item d-flex align-items-center">
                            <i class="fas fa-door-open me-2 text-danger"></i>
                            <a href="<?= base_url("index.php/page/deconnection") ?>" class="text-white m-0">Log out</a>
                        </li>
                    </ul>
                </div>

            </div>

        </nav>
    </header>