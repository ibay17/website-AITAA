<?php
error_reporting(0);
require_once('../config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--========== BOOTSTRAP ==========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!--CKeditor 4-->
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

    <!--========== DATAT TABLE ==========-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <!-- SweetAlert -->
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Choses -->
    <link rel="stylesheet" href="../../vendor/chosen/chosen.min.css">

    <link rel="icon" ztype="image/png" href="../../assets/image/icon.png" />
    <title>AITAA - IC</title>

    <link rel="stylesheet" href="../assets/css/side.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />

</head>

<body>
    <div id="preloader"></div>
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../assets/image/icon.png" alt="ICON" class="bx icon p-3 pt-4">
            <span class="logo_name">AITAA - IC</span>
        </div>
        <ul class="nav-links">
            <li>
                <div class="iocn-link">
                    <a href="../home/">
                        <i class=""></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../home">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../alumni">
                        <i class=""></i>
                        <span class="link_name">Alumni</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../alumni">Alumni</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../user">
                        <i class=""></i>
                        <span class="link_name">User</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../user">User</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../event">
                        <i class=""></i>
                        <span class="link_name">Event</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../event">Event</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../school">
                        <i class=""></i>
                        <span class="link_name">School</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../school">School</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../program">
                        <i class=""></i>
                        <span class="link_name">Program</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../program">Program</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../degree">
                        <i class=""></i>
                        <span class="link_name">Degree</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../degree">Degree</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="../../home" target="_blank">
                        <i class=''></i>
                        <span class="link_name">Back To Website</span>
                    </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="../../home">Back To Website</a></li>
                </ul>
            </li>
            <!-- <li>
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li> -->
            <?php
            $user = mysqli_query($conn, "SELECT * FROM user WHERE id = '" . $_SESSION['id'] . "'");
            $c = mysqli_fetch_object($user);
            ?>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="../../assets/image/icon.png" alt="profileImg">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">
                            tester
                        </div>
                        <div class="job">
                            admin
                        </div>
                    </div>
                    <a href="../../auth/logout.php" id="logout"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="title">
            <img src="../../assets/image/icon.png" alt="ICON" class="bx iconMin">