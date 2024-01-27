<?php
session_start();
require_once('../config.php');
function writeMsg()
{
    $_SESSION['alert'] = 2;
    $_SESSION['status'] = 'Success';
    $_SESSION['status_icon'] = 'success';
    $_SESSION['status_text'] = 'Delete Data Success';
}

function writeMsg1()
{
    $_SESSION['alert'] = 2;
    $_SESSION['status'] = 'Failed!!';
    $_SESSION['status_icon'] = 'error';
    $_SESSION['status_text'] = 'Failed';
}
if (isset($_GET['ida'])) {
    $user = mysqli_query($conn, "SELECT * FROM user WHERE alumniId = '" . $_GET['ida'] . "' ");
    if (mysqli_num_rows($user) > 0) {
        $deleteUser = mysqli_query($conn, "DELETE FROM user WHERE alumniId = '" . $_GET['ida'] . "' ");
    }
    $deleteGraduation = mysqli_query($conn, "DELETE FROM graduation WHERE alumniId = '" . $_GET['ida'] . "' ");
    $deleteAlumni = mysqli_query($conn, "DELETE FROM alumni WHERE id = '" . $_GET['ida'] . "' ");
    writeMsg();
    echo '<script>window.location="../alumni"</script>';
}

// if (isset($_GET['idtestr'])) {
//     $produk  = mysqli_query($conn, "SELECT product_image FROM product WHERE id = '" . $_GET['idp'] . "' ");
//     $img = mysqli_fetch_object($produk);

//     unlink('../assets/picture/product/' . $img->product_image);

//     $delete = mysqli_query($conn, "DELETE FROM product WHERE id = '" . $_GET['idp'] . "' ");
//     writeMsg();
//     echo '<script>window.location="../product"</script>';
// }

if (isset($_GET['idu'])) {
    $delete = mysqli_query($conn, "DELETE FROM user WHERE id = '" . $_GET['idu'] . "' ");
    if($delete){
        writeMsg();
        echo '<script>window.location="../user"</script>';
    }else{
        writeMsg1();
        echo '<script>window.location="../user"</script>';
    }
}


if (isset($_GET['ids'])) {
    $delete = mysqli_query($conn, "DELETE FROM school WHERE id = '" . $_GET['ids'] . "' ");
    if($delete){
        writeMsg();
        echo '<script>window.location="../school"</script>';
    }else{
        writeMsg1();
        echo '<script>window.location="../school"</script>';
    }
}


if (isset($_GET['idp'])) {
    $delete = mysqli_query($conn, "DELETE FROM fieldofstudy WHERE id = '" . $_GET['idp'] . "' ");
    if($delete){
        writeMsg();
        echo '<script>window.location="../program"</script>';
    }else{
        writeMsg1();
        echo '<script>window.location="../program"</script>';
    }
}


if (isset($_GET['idd'])) {
    $delete = mysqli_query($conn, "DELETE FROM degree WHERE id = '" . $_GET['idd'] . "' ");
    if($delete){
        writeMsg();
        echo '<script>window.location="../degree"</script>';
    }else{
        writeMsg1();
        echo '<script>window.location="../degree"</script>';
    }
}
if (isset($_GET['ide'])) {
    $event = mysqli_query($conn, "SELECT * from event WHERE id = '" . $_GET['ide'] . "'");
    $e=mysqli_fetch_object($event);
    unlink('../../assets/event/' .$e->ImageEvent);
    $delete = mysqli_query($conn, "DELETE FROM event WHERE id = '" . $_GET['ide'] . "' ");
    if($delete){
        writeMsg();
        echo '<script>window.location="../event"</script>';
    }else{
        writeMsg1();
        echo '<script>window.location="../event"</script>';
    }
}



