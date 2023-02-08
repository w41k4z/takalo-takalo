<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Meta Responsive tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-4.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/fonts/fontawesome-5/css/all.min.css") ?>">


    <title>Log In</title>
</head>

<body class="login-body">

    <!--Login Wrapper-->

    <div class="container-fluid login-wrapper">
        <div class="login-box">
            <h1 class="text-center mb-5"><i class="fas fa-handshake"></i> TAKALO</h1>
            <div class="row">
                <div
                    class="flex-column justify-content-center align-items-center col-md-6 col-sm-6 col-12 login-box-info">
                    <h3 class="mb-4">Sign up</h3>
                    <p class="mb-4">Exchange is a powerful law that leads to happiness</p>
                    <p class="text-center"><a href="<?= base_url("index.php/connection/register") ?>"
                            class="btn btn-light">Register
                            here</a>
                    </p>
                </div>
                <div class="col-md-6 col-sm-6 col-12 login-box-form p-4">
                    <h4 class="text-center text-danger">
                        <?= $error ?>
                    </h4>
                    <h3 class=" mb-2">Login</h3>
                    <form action="<?= base_url("index.php/connection/authenticate/") ?>" class="mt-2" method="post">
                        <div class=" input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="mail" class="form-control mt-0" placeholder="user@gmail.com"
                                aria-label="Username" aria-describedby="basic-addon1" name="mail">
                        </div>

                        <div class=" input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="text" class="form-control mt-0" placeholder="Password" aria-label="Password"
                                aria-describedby="basic-addon1" name="password">
                        </div>

                        <div class=" form-group">
                            <button class="btn btn-theme btn-block p-2 mb-1">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>