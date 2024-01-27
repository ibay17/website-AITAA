<?php
error_reporting(0);
require_once('../config.php');
if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['status_login'])) {
    $_SESSION['status_login'] = false;
}

?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AIT</title>

    <link rel="shortcut icon" href="../assets/image/icon.png" type="image/x-icon">

    <!-- SweetAlert -->
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


    <link rel="stylesheet" href="../vendor/chosen/chosen.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <center>
        <div id="preloader"></div>
    </center>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand me-auto" href="#"><img src="../assets/image/iconNavbar.png" alt="Icon AIT"></a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="../assets/image/iconNavbar.png" height="50" alt="Icon AIT"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../home/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://ait.ac.th/about/">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../event/">Event</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Alumni
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item disabled" href="#">Alumni Affairs</a></li>
                                <li><a class="dropdown-item" href="../alumni/">Alumni Directory</a></li>
                                <li><a class="dropdown-item disabled" href="#">Alumni Chapters</a></li>
                                <li><a class="dropdown-item disabled" href="#">Alumni Service</a></li>
                                <li><a class="dropdown-item disabled" href="#">Alumni Giving</a></li>
                                <li><a class="dropdown-item disabled" href="#">Alumni Stories</a></li>
                                <li><a class="dropdown-item" href="https://apps.ait.ac.th/transcript/">Online academic record</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            if ($_SESSION['status_login'] == true) {
                $cek = mysqli_query($conn, "SELECT * FROM  user WHERE id = '" .  $_SESSION['id'] . "'");
                $id = mysqli_fetch_object($cek);
                $alumni = mysqli_query($conn, "SELECT * FROM  alumni WHERE id = '" . $id->alumniId . "'");
                $a = mysqli_fetch_object($alumni);

                if ($a->photo != "") {
            ?>

                    <a href="../user"><img src="../assets/imgAlumni/<?php echo $a->photo ?>" height="40" width="40" style="border-radius: 50%;"></i></a>

                <?php
                } else {
                ?>

                    <a href="../user"><i class='bx bx-user-circle'></i></a>

                <?php
                }
                ?>
            <?php
            } else {
            ?>
                <a href="../auth" class="btn-submit me-2 px-3 py-1">Sign In</a>
            <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon m-5n"></span>
            </button>
        </div>
    </nav>

    <?php

    ?>