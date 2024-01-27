<?php
require_once('../include/header.php');
session_start();
?>
<section id="alumniProfile">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between">
                <div class="title">
                    <h1>Alumni Directory</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-6">
                <a class="btn-submit" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Filter</a>
            </div>
            <div class="col-md-6">
                <form action="alumniDirectory.php">
                    <div class="search d-flex">
                        <input type="text" name="name" class="form-control me-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        <button type="submit" class="btn-submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container no-margin">
        <div class="row align-items-center justify-content-center text-center" style="background-color:#380000a9; padding:25px 15px; border-radius:5px; margin:3px">
            <?php
            if ($_GET['name'] != '' || $_GET['province'] != '' || $_GET['school'] != '' || $_GET['program'] != '' || $_GET['degree'] != '' || $_GET['year'] != '') {
                $where = "WHERE alumni.nameAlumni LIKE '%" . $_GET['name'] . "%' AND alumni.provinsiId LIKE '%" . $_GET['province'] . "%' AND graduation.schoolId LIKE '%" . $_GET['school'] . "%'  AND graduation.programId LIKE '%" . $_GET['program'] . "%'  AND graduation.degreeId LIKE '%" . $_GET['degree'] . "%'  AND graduation.year LIKE '%" . $_GET['year'] . "%' ";
            }
            $alumni = mysqli_query($conn,  "SELECT alumni.*, graduation.*, degree.*
                                            FROM alumni
                                            INNER JOIN graduation ON alumni.id = graduation.alumniId
                                            INNER JOIN degree ON graduation.degreeId = degree.id
                                            $where
                                            GROUP BY alumni.id
                                            ORDER BY alumni.date DESC;
                                            ");
            if (mysqli_num_rows($alumni) > 0) {
                while ($a = mysqli_fetch_array($alumni)) {
            ?>
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <a href="alumniProfile.php?id=<?php echo $a['alumniId'] ?>">
                            <div class="card-img bg-white rounded shadow-lg py-5 px-4" style="height: 300px;">
                                <?php
                                $path = '../assets/imgAlumni';
                                $nama_file = $a['photo'];
                                $lokasi_file = $path . '/' . $nama_file;
                                if (file_exists($lokasi_file) && $a['photo'] != '' && $a['photo'] != NULL) {
                                ?>
                                    <img src="../assets/imgAlumni/<?php echo $a['photo'] ?>" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">

                                <?php
                                } else {
                                ?>
                                    <img src="../assets/imgAlumni/alumni_photo.jpg" alt="" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">

                                <?php
                                }
                                ?>
                                <h5 class="mb-0"><?php echo $a['title'];
                                                    echo " ";
                                                    echo $a['nameAlumni'] ?></h5><span class="small text-uppercase text-muted"><?php echo $a['degree'] ?></span>
                            </div>
                        </a>
                    </div>

                <?php }
            } else { ?>
                <p>Data tidak tersedia</p>
            <?php } ?>
        </div>
    </div>
    <!-- filter -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h2 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Filter</h2>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="alumniDirectory.php">
                <div class="container no-margin">
                    <div class="row px-4">
                        <div class="col">
                            <div class="search">
                                <h6>Name</h6>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-4 mt-5">
                        <h6>Province</h6>
                        <div class="col">
                            <select name="province" data-placeholder="Choose a Province..." class="my_select_box" >
                                <option value=""></option>
                                <?php
                                $province = mysqli_query($conn, "SELECT * FROM t_provinsi ORDER BY nama ASC");
                                while ($p = mysqli_fetch_array($province)) {
                                ?>
                                    <option value="<?php echo $p['id'] ?>"><?php echo $p['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row px-4 mt-3">
                        <h6>School</h6>
                        <div class="col">
                            <select name="school" data-placeholder="Choose a School..." class="my_select_box" >
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
                    <div class="row px-4 mt-3">
                        <h6>Field Of Study</h6>
                        <div class="col">
                            <select name="program" data-placeholder="Choose a Field Of Study..." class="my_select_box" >
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
                    <div class="row px-4 mt-3">
                        <h6>Degree</h6>
                        <div class="col">
                            <select name="degree" data-placeholder="Choose a Degree..." class="my_select_box" >
                                <option value=""></option>
                                <?php
                                $degree = mysqli_query($conn, "SELECT * FROM degree ORDER BY degree ASC");
                                while ($d = mysqli_fetch_array($degree)) {
                                ?>
                                    <option value="<?php echo $d['id'] ?>"><?php echo $d['degree'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row px-4 mt-3">
                        <h6>Graduation Year</h6>
                        <div class="col">
                            <div class="input-group">
                                <input type="number" name="year" min="1900" max="2099" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 text-center">
                        <div class="col">
                            <button type="submit" class="btn-submit px-4 py-2">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
require_once('../include/footer.php');
?>