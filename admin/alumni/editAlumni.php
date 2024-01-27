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

$alumni = mysqli_query($conn, " SELECT * FROM alumni WHERE id = '" . $_GET['ida'] . "'");
$a = mysqli_fetch_object($alumni);


$data = mysqli_query($conn, "
SELECT *
FROM alumni
INNER JOIN graduation
ON alumni.id = graduation.alumniId 
INNER JOIN school
ON graduation.schoolId = school.id
INNER JOIN fieldofstudy
ON graduation.programId = fieldofstudy.id
INNER JOIN degree
ON graduation.degreeId = degree.id
WHERE alumni.id = '" . $_GET['ida'] . "'
ORDER BY graduation.year ASC
");
?>

<span class="text">Edit Alumni</span>
</div>
<div class="home-content">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="form-input mb-5">
                    <center>
                        <h4 style="margin: 15px; margin-bottom:30px">Form Edit Alumni</h4>
                    </center>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form">
                            <div class="form-floating mb-3">
                                <input required type="text" name="id" class="form-control" value="<?php echo $a->id ?>" id="floatingInput" placeholder="ID" disabled>
                                <label for="floatingInput">ID</label>
                            </div>
                            <h6>Title</h6>
                            <div class="input-group mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio1" <?php if ($a->title == "Dr.") echo "checked"; ?> value="Dr.">
                                    <label class="form-check-label" for="inlineRadio1">Dr.</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio2" <?php if ($a->title == "Mr.") echo "checked"; ?> value="Mr.">
                                    <label class="form-check-label" for="inlineRadio2">Mr.</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio3" <?php if ($a->title == "Mrs.") echo "checked"; ?> value="Mrs.">
                                    <label class="form-check-label" for="inlineRadio3">Mrs.</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio4" <?php if ($a->title == "Miss") echo "checked"; ?> value="Miss">
                                    <label class="form-check-label" for="inlineRadio4">Miss</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="title" id="inlineRadio5" <?php if ($a->title == "") echo "checked"; ?> value="">
                                    <label class="form-check-label" for="inlineRadio5">Other </label>
                                </div>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="text" name="nama" class="form-control" id="floatingInput" value="<?php echo $a->nameAlumni ?>" placeholder="Masukan Name">
                                <label for="floatingInput">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="province" data-placeholder="Choose a Province..." class="my_select_box" tabindex="4">
                                    <?php
                                    $province = mysqli_query($conn, "SELECT * FROM  t_provinsi WHERE id = '" .  $a->provinsiId . "'");
                                    $p = mysqli_fetch_object($province);
                                    ?>
                                    <option value="<?php echo $a->provinsiId ?>"><?php echo $p->nama ?></option>
                                    <?php
                                    $province = mysqli_query($conn, "SELECT * FROM t_provinsi ORDER BY nama ASC");
                                    while ($p = mysqli_fetch_array($province)) {
                                    ?>
                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-floating my-3">
                                <input required type="email" name="email" class="form-control" id="floatingInput"  value="<?php echo $a->email ?>" placeholder="">
                                <label for="floatingInput">Email</label>
                            </div>
                            <?php
                            $list = ['First', 'Second'];
                            $no = 0;
                            if (mysqli_num_rows($data) > 0) {
                                while ($d = mysqli_fetch_array($data)) {
                            ?>
                                    <h3 class="degree mt-5"><?php echo $list[$no] ?> Degree</h3>
                                    <div class="form-floating mb-3">
                                        <select name="school<?php echo $no ?>" data-placeholder="Choose a School..." class="my_select_box" tabindex="4">
                                            <option value="<?php echo $d['schoolId'] ?>"><?php echo $d['School'] ?></option>
                                            <?php
                                            $school = mysqli_query($conn, "SELECT * FROM school ORDER BY School ASC");
                                            while ($p = mysqli_fetch_array($school)) {
                                            ?>
                                                <option value="<?php echo $p['id'] ?>"><?php echo $p['School'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select name="program<?php echo $no ?>" data-placeholder="Choose a Field Of Study..." class="my_select_box" tabindex="4">
                                            <option value="<?php echo $d['programId'] ?>"><?php echo $d['FieldOfStudy'] ?></option>
                                            <?php
                                            $field = mysqli_query($conn, "SELECT * FROM fieldofstudy ORDER BY FieldOfStudy ASC");
                                            while ($f = mysqli_fetch_array($field)) {
                                            ?>
                                                <option value="<?php echo $f['id'] ?>"><?php echo $f['FieldOfStudy'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select name="degree<?php echo $no ?>" data-placeholder="Choose a Degree..." class="my_select_box" tabindex="4">
                                            <option value="<?php echo $d['degreeId'] ?>"><?php echo $d['degree'] ?></option>
                                            <?php
                                            $degree = mysqli_query($conn, "SELECT * FROM degree ORDER BY degree ASC");
                                            while ($de = mysqli_fetch_array($degree)) {
                                            ?>
                                                <option value="<?php echo $de['id'] ?>"><?php echo $de['degree'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-floating my-3">
                                        <input required type="number" name="year<?php echo $no ?>" min="1900" max="2099" name="nama" class="form-control" value="<?php echo $d['year'] ?>" id="floatingInput" placeholder="Year">
                                        <label for="floatingInput">Year</label>
                                    </div>
                                    <div class="form-floating my-3">
                                        <input required type="text" name="month<?php echo $no ?>" value="<?php echo $d['month'] ?>" class="form-control" id="floatingInput" placeholder="Masukan Name">
                                        <label for="floatingInput">Month</label>
                                    </div>
                            <?php
                                    $no++;
                                }
                            }

                            ?>
                            <div class="form-group">
                                <input type="submit" class="submid-btn" name="editAlumni" value="Submit" class="submid-btn">
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