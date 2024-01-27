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
$user = mysqli_query($conn, " SELECT * FROM user INNER JOIN role on user.roleId=role.id WHERE .user.id = '" . $_GET['idu'] . "'");
$u = mysqli_fetch_object($user);

$alumni = mysqli_query($conn, " SELECT * FROM alumni WHERE id = '" . $u->alumniId. "'");
$al = mysqli_fetch_object($alumni);


?>

<span class="text">Edit User</span>
</div>
<div class="home-content">
    <div class="container">
        <div class="row ">
            <div class="col ">
                <div class="form-input mb-5">
                    <center>
                        <h4 style="margin: 15px; margin-bottom:30px">Edit User</h4>
                    </center>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-floating my-3">
                                <select name="alumniId" data-placeholder="Choose a Alumni" class="my_select_box" tabindex="4" disabled >
                                    <option value="<?php echo $u->alumniId ?>"><?php echo $al->nameAlumni ?></option>
                                    <?php
                                    $alumni = mysqli_query($conn, "SELECT * FROM alumni ORDER BY date ASC");
                                    while ($a = mysqli_fetch_array($alumni)) {
                                    ?>
                                        <option value="<?php echo $a['id'] ?>"><?php echo $a['nameAlumni'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-floating my-3">
                                <select name="role" data-placeholder="Choose a Role" class="my_select_box">
                                    <option value="<?php echo $u->roleId ?>"><?php echo $u->roleName ?></option>
                                    <?php
                                    $role = mysqli_query($conn, "SELECT * FROM role");
                                    while ($r = mysqli_fetch_array($role)) {
                                    ?>
                                        <option value="<?php echo $r['id'] ?>"><?php echo $r['roleName'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="text" name="username" class="form-control" id="floatingInput" value="<?php echo $u->username?>" placeholder="">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="password" name="password" class="form-control" id="floatingInput" value="<?php echo $u->password ?>" placeholder="">
                                <label for="floatingInput">Password</label>
                            </div>
                            <select name="status" data-placeholder="Status" class="my_select_box">
                                <option value="<?php echo $u->status?>"><?php echo $u->status?></option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <div class="form-group">
                                <input type="submit" class="submid-btn" name="editUser" value="Submit" class="submid-btn">
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