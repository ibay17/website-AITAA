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


$event = mysqli_query($conn, " SELECT * FROM event WHERE id = '" . $_GET['ide'] . "'");
$e = mysqli_fetch_object($event);
?>

<span class="text">Edit Event</span>
</div>
<div class="home-content">
    <div class="container">
        <div class="row ">
            <div class="col ">
                <div class="form-input mb-5">
                    <center>
                        <h4 style="margin: 15px; margin-bottom:30px">Edit Event</h4>
                    </center>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="container">
                                <div class="row">
                                    <img src="../../assets/event/<?php echo $e->ImageEvent ?>" height="auto" style="width:; margin-bottom:25px" alt="">
                                </div>
                            </div>
                            <div class="input-group  input-group-lg mb-3">
                                <input type="hidden" name="oldImg" value="<?php echo $e->ImageEvent ?>">
                                <input type="file" name="img" class="form-control" style="height: auto;">
                            </div>
                            <div class="form-floating my-3">
                                <input required type="text" name="title" class="form-control" id="floatingInput" value="<?php echo $e->TitleEvent ?>" placeholder="">
                                <label for="floatingInput">Title Event</label>
                            </div>
                            <div class="form-floating my-3">
                                <h6>Short Description</h6>
                                <textarea required name="shortDeskripsi" placeholder="Deskripsi" id="floatingInput"  class="form-control"><?php echo $e->shortDescription?></textarea>
                            </div>
                            <div class="form-floating my-3">
                                <h6>Description</h6>
                                <textarea required name="deskripsi" placeholder="Deskripsi" id="floatingInput" class="form-control"><?php echo $e->Description?></textarea>
                            </div>
                            <div class="form-floating my-3">
                                <input type="date" name="date" value="<?php echo $e->date ?>" class="form-control">
                                <label for="floatingInput">Date</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="submid-btn" name="editEvent" value="Submit" class="submid-btn">
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