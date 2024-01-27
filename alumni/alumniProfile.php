<?php
require_once('../include/header.php');
$alumni = mysqli_query($conn, "SELECT * FROM alumni WHERE id = '" . $_GET['id'] . "'");
$a = mysqli_fetch_object($alumni);

$provinsi = mysqli_query($conn, "SELECT * FROM t_provinsi WHERE id = '" . $a->provinsiId . "'");
$p = mysqli_fetch_object($provinsi);


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
                        WHERE alumni.id = '" . $_GET['id'] . "'
                        ORDER BY graduation.year ASC
                        ");

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
                    <h4><?php echo $a->title;
                        echo " ";
                        echo $a->nameAlumni ?></h4>
                    <p><?php echo $p->nama ?>, Indonesia</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (mysqli_num_rows($data) > 0) {
        while ($d = mysqli_fetch_array($data)) {
    ?>

            <div class="container" style="margin-top: 150px;">
                <div class="degree">
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <h5>Graduated from AIT</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="text-uppercase">Graduated from School/Division </h6>
                        </div>
                        <div class="col-lg-7 mt-0">
                            <p><?php echo $d['School'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="text-uppercase">Program/Field of Study</h6>
                        </div>
                        <div class="col-lg-7 mt-0">
                            <p><?php echo $d['FieldOfStudy'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="text-uppercase">Degree</h6>
                        </div>
                        <div class="col-lg-7 mt-0">
                            <p><?php echo $d['degree'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="text-uppercase">Graduation Year</h6>
                        </div>
                        <div class="col-lg-7 mt-0">
                            <p><?php echo $d['year'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="text-uppercase">Graduation Month</h6>
                        </div>
                        <div class="col-lg-7 mt-0">
                            <p><?php echo $d['month'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }

    ?>
</section>
<?php
require_once('../include/footer.php');
?>