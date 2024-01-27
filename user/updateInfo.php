<?php
require_once('../include/header.php');
if($_SESSION['status_login'] != true){
    echo'<script>window.location="../auth"</script>';
}
$no = 0;
?>
<section id="alumniProfile">
    <form method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="banner"></div>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-md-3 mb-5">
                    <div class="img-profile">
                        <div class="img">
                            <?php
                            $path = '../assets/imgAlumni';
                            $nama_file = $a->photo;
                            $lokasi_file = $path . '/' . $nama_file;
                            if (file_exists($lokasi_file) && $a->photo != '' && $a->photo != NULL) {
                            ?>
                                <img id="image" src="../assets/imgAlumni/<?php echo $a->photo ?>" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">

                            <?php
                            } else {
                            ?>
                                <img id="image" src="../assets/imgAlumni/alumni_photo.jpg" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">

                            <?php
                            }
                            ?>
                            <input type="hidden" name="foto" value="<?php echo $a->photo ?>">
                            <input type="file" name="img" id="myImage" style="display: none;" />
                            <!-- <input type="file" name="img" class="input-field"> -->
                        </div>
                        <i class='bx bxs-edit' style="font-size: 1.5rem; position: absolute; top: 80px; left: 75px; "></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h5>A. Information available to the public</h5>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h6>Full Name <?php echo $p->nama ?></h6>
                    <input type="text" name="name" value="<?php echo $a->nameAlumni ?>" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h6>Title</h6>
                    <div class="input-group">
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
                </div>
            </div>
            <?php
            $list = ['First', 'Second'];
            $no = 0;
            if (mysqli_num_rows($data) > 0) {
                while ($d = mysqli_fetch_array($data)) {
            ?>
                    <div class="row mt-3 justify-content-center">
                        <div class="container no-margin">
                            <div class="degree">
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <h5><?php echo $list[$no] ?> Degree from AIT</h5>
                                    </div>
                                </div>
                                <div class="row  align-items-center py-1">
                                    <div class="col-lg-4">
                                        <h6 class="text-uppercase">Graduated from School/Division </h6>
                                    </div>
                                    <div class="col-lg-7 mt-0">
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
                                </div>
                                <div class="row  align-items-center py-1">
                                    <div class="col-lg-4">
                                        <h6 class="text-uppercase">Program/Field of Study</h6>
                                    </div>
                                    <div class="col-lg-7 mt-0">
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
                                </div>
                                <div class="row  align-items-center py-1">
                                    <div class="col-lg-4">
                                        <h6 class="text-uppercase">Degree</h6>
                                    </div>
                                    <div class="col-lg-7 mt-0">
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
                                </div>
                                <div class="row  align-items-center py-1">
                                    <div class="col-lg-4">
                                        <h6 class="text-uppercase">Graduation Year</h6>
                                    </div>
                                    <div class="col-lg-7 mt-0">
                                        <input type="number" name="year<?php echo $no ?>" min="1900" max="2099" value="<?php echo $d['year'] ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row  align-items-center py-1">
                                    <div class="col-lg-4">
                                        <h6 class="text-uppercase">Graduation Month</h6>
                                    </div>
                                    <div class="col-lg-7 mt-0">
                                        <input type="text" name="month<?php echo $no ?>" value="<?php echo $d['month'] ?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    $no++;
                }
            }

            ?>
            <button type="button" class="btn-submit px-3 py-2 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Degree</button>
        </div>
        <div class="container">
            <h5>B. Restricted Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <h6>Birthday</h6>
                    <input type="date" name="date" class="form-control" value="<?php echo $a->birthday ?>">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <h6>Province</h6>
                    <select name="province" data-placeholder="Choose a Province..." class="my_select_box" tabindex="4" required >
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
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="container no-margin">
                    <div class="degree">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <h5>Address</h5>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Address</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <textarea name="address" class="form-control" placeholder="Address"><?php echo $a->address ?></textarea>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Telp</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="text" name="telp" value="<?php echo $a->telp ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Email</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="text" name="email" value="<?php echo $a->email ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Fax</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="text" name="fax" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="container no-margin">
                    <div class="degree">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <h5>Office Address</h5>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Address</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <textarea name="addressOffice" class="form-control" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Telp</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="text" name="telpOffice" class="form-control">
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Email</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="text" name="emailOffice" class="form-control">
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Fax</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="text" name="faxOffice" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex justify-content-end">
                    <button type="submit" name="updateInfo" class="btn-submit px-5 py-2">Update</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <form method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <h5><?php echo $list[$no] ?> Degree from AIT</h5>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Graduated from School/Division </h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <select name="addschool" data-placeholder="Choose a School..." class="my_select_box" tabindex="4">
                                    <option value=""></option>
                                    <?php
                                    $school = mysqli_query($conn, "SELECT * FROM school ORDER BY School ASC");
                                    while ($p = mysqli_fetch_array($school)) {
                                    ?>
                                        <option value="<?php echo $p['id'] ?>"><?php echo $p['School'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Program/Field of Study</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <select name="addprogram" data-placeholder="Choose a Field Of Study..." class="my_select_box" tabindex="4">
                                    <option value=""></option>
                                    <?php
                                    $field = mysqli_query($conn, "SELECT * FROM fieldofstudy ORDER BY FieldOfStudy ASC");
                                    while ($f = mysqli_fetch_array($field)) {
                                    ?>
                                        <option value="<?php echo $f['id'] ?>"><?php echo $f['FieldOfStudy'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Degree</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <select name="adddegree" data-placeholder="Choose a Degree..." class="my_select_box" tabindex="4">
                                    <option value=""></option>
                                    <?php
                                    $degree = mysqli_query($conn, "SELECT * FROM degree ORDER BY degree ASC");
                                    while ($de = mysqli_fetch_array($degree)) {
                                    ?>
                                        <option value="<?php echo $de['id'] ?>"><?php echo $de['degree'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Graduation Year</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="number" name="addyear" min="1900" max="2099" value="" class="form-control">
                            </div>
                        </div>
                        <div class="row  align-items-center py-1">
                            <div class="col-lg-4">
                                <h6 class="text-uppercase">Graduation Month</h6>
                            </div>
                            <div class="col-lg-7 mt-0">
                                <input type="text" name="addmonth" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="addDegree" class="btn-submit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<?php
require_once('../include/footer.php');
?>