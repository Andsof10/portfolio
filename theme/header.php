<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>portfolio</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="css/style.css" type="text/css" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/06a79c3313.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="images/icons8-portfolio-96.png" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    </head>
    <body class="bg-dark">
        <nav class="p-4 navbar navbar-expand-lg bg-dark" data-bs-theme="dark" style="background-color: #1A1A1A !important;">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">HOME</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="users.php">USERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portfolio-editing.php">PORTFOLIO</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <ul class="navbar-nav me-auto align-content-center flex-wrap mb-2 mb-lg-0">
                            <li class="nav-item">
                                <?php 
                                if(!isset($_SESSION['session_id'])){
                                ?>
                                <a class="nav-link " href="login.php">LOGIN</a>
                                <?php } 
                                else { ?>
                                <a class="nav-link" href="logout.php">LOGOUT</a>                               
                                <?php                                                              
                                }
                                ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="register.php">SIGN UP</a>
                            </li>
                        </ul>
                        <img id="logo" src="images/icons8-portfolio-96.png">
                    </div>
                </div>
            </div>
        </nav>
