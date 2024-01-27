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
?>

<span class="text">Add School</span>
</div>
<div class="home-content">
    <div class="container">
        <div class="row ">
            <div class="col ">
                <div class="form-input mb-5">
                    <center>
                        <h4 style="margin: 15px; margin-bottom:30px">Add School</h4>
                    </center>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-floating my-3">
                                <input required type="text" name="school" class="form-control" id="floatingInput" placeholder="">
                                <label for="floatingInput">School</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="submid-btn" name="addSchool" value="Submit" class="submid-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php
require_once('../include/footer.php');
?>