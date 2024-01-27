<?php
session_start();
if ($_SESSION['status_login'] == true) {
    if ($_SESSION['role_id'] == 1) {
        require_once('../include/header.php');
    } else {
        $_SESSION['alert'] = 1;
        $_SESSION['status'] = 'Failed!!';
        $_SESSION['status_icon'] = 'error';
        $_SESSION['status_text'] = 'Your Not Admin';
        echo '<script>window.location="../../user/"</script>';
    }
} else {
    echo '<script>window.location="../../auth/"</script>';
}
/*
$alumni = mysqli_query($conn, "SELECT * FROM alumni GROUP BY id ORDER BY date DESC");
$a = mysqli_num_rows($alumni);

$user = mysqli_query($conn, "SELECT * FROM user GROUP BY id ORDER BY date DESC");
$u = mysqli_num_rows($user);

$event = mysqli_query($conn, "SELECT * FROM event GROUP BY id ORDER BY date DESC");
$e = mysqli_num_rows($event); */


?>
<span class="text"></span>
<div class="">
   <div class="text">
      <p>Selamat datang di dashboard administrator!</p>
   </div>
</div>
</section> 

<?php
require_once('../include/footer.php');
?>