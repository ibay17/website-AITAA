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

<span class="text">Add Alumni</span>
</div>
<div class="home-content">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="form-input mb-5">
                    <center>
                        <h4 style="margin: 15px; margin-bottom:30px">Form Add Alumni</h4>
                    </center>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-floating mb-3">
                                <input required type="text" name="id" class="form-control" id="floatingInput" placeholder="ID">
                                <label for="floatingInput">Alumni ID</label>
                            </div>
                            <h6>Title</h6>
                            <div class="input-group mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio1" value="Dr.">
                                    <label class="form-check-label" for="inlineRadio1">Dr.</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio2" value="Mr.">
                                    <label class="form-check-label" for="inlineRadio2">Mr.</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio3" value="Mrs.">
                                    <label class="form-check-label" for="inlineRadio3">Mrs.</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio4" value="Miss">
                                    <label class="form-check-label" for="inlineRadio4">Miss</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio5" value="">
                                    <label class="form-check-label" for="inlineRadio5">Other </label>
                                </div>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukan Name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="province" data-placeholder="Choose a Province..." class="my_select_box" tabindex="4">
                                    <?php
                                    $province = mysqli_query($conn, "SELECT * FROM  t_provinsi WHERE id = '" .  $a->provinsiId . "'");
                                    $p = mysqli_fetch_object($province);
                                    ?>
                                    <option value=""></option>
                                    <?php
                                    $province = mysqli_query($conn, "SELECT * FROM t_provinsi ORDER BY nama ASC");
                                    while ($p = mysqli_fetch_array($province)) {
                                    ?>
                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="email" name="email" class="form-control" id="floatingInput" placeholder="">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="school" data-placeholder="Choose a School..." class="my_select_box" tabindex="4">
                                    <option value=""></option>
                                    <?php
                                    $school = mysqli_query($conn, "SELECT * FROM school ORDER BY School ASC");
                                    while ($p = mysqli_fetch_array($school)) {
                                    ?>
                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['School'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <select required name="program" data-placeholder="Choose a Field Of Study..." class="my_select_box" tabindex="4">
                                    <option value=""></option>
                                    <?php
                                    $field = mysqli_query($conn, "SELECT * FROM fieldofstudy ORDER BY FieldOfStudy ASC");
                                    while ($f = mysqli_fetch_array($field)) {
                                    ?>
                                        <option value="<?php echo $f['id'] ?>"><?php echo $f['FieldOfStudy'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <select required name="degree" data-placeholder="Choose a Degree..." class="my_select_box" tabindex="4">
                                    <option value=""></option>
                                    <?php
                                    $degree = mysqli_query($conn, "SELECT * FROM degree ORDER BY degree ASC");
                                    while ($de = mysqli_fetch_array($degree)) {
                                    ?>
                                        <option value="<?php echo $de['id'] ?>"><?php echo $de['degree'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="number" name="year" min="1900" max="2099" name="nama" class="form-control" id="floatingInput" placeholder="Year">
                                <label for="floatingInput">Year</label>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="text" name="month" class="form-control" id="floatingInput" placeholder="Masukan Name">
                                <label for="floatingInput">Month</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="submid-btn" name="addAlumni" value="Submit" class="submid-btn">
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