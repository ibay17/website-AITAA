<?php
require_once('../include/header.php');
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="../auth"</script>';
}
?>
<section id="alumniProfile">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="banner"></div>
            </div>
        </div>
        <div class="row text-center justify-content-center">
            <div class="col-md-3 mb-5">
                <div class="img-profile">
                    <?php

                    $path = '../assets/imgAlumni';
                    $nama_file = $a->photo;
                    $lokasi_file = $path . '/' . $nama_file;
                    if (file_exists($lokasi_file) && $a->photo != '' && $a->photo != NULL) {
                    ?>
                        <img src="../assets/imgAlumni/<?php echo $a->photo ?>" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">

                    <?php
                    } else {
                    ?>
                        <img src="../assets/imgAlumni/alumni_photo.jpg" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">

                    <?php
                    }
                    ?>
                    <h4><?php echo $a->nameAlumni ?></h4>
                    <p><?php echo $p->nama ?>, Indonesia</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <form method="POST">
            <div class="row align-items-center">
                <div class="col-md-12  d-flex justify-content-center mt-3">
                    <input type="password" name="oldPass" style="width: 50%;" class="input-field" placeholder="Old Password">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12  d-flex justify-content-center mt-3">
                    <input type="password" name="newPass" style="width: 50%;" class="input-field" placeholder="New Password">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12  d-flex justify-content-center mt-3">
                    <input type="password" name="confirmPass" style="width: 50%;" class="input-field" placeholder="Confirm Password">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12  d-flex justify-content-center mt-5">
                    <button type="submit" name="changePass" class="btn-submit px-3 py-2">Change Password</button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
require_once('../include/footer.php');
?>