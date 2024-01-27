<?php
require_once('../include/header.php');
?>
<section id="alumni">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col">
                <h1>Stay connected with fellow alumni</h1>
            </div>
        </div>
        <form action="alumniDirectory.php">
            <div class="row align-items-center mt-3">
                <div class="col-md-2"></div>
                <div class="col-md-6 me-2">
                    <div class="input-group input-group-lg">
                        <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        <span class="input-group-text" id="basic-addon2"><i class='bx bx-search'></i></span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="search">
                        <button type="submit" class="btn-submit p-3 px-5">Search</button>
                        <!-- <a type="submit" class="btn-submit p-3 px-5">Search</a> -->
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
    </div>

    <div class="container">
        <h3>Explore Alumni Profile</h3>
        <div class="row align-items-center justify-content-center text-center" style="background-color:#380000a9; padding:25px 15px; border-radius:5px; margin:3px">
            <?php
            $alumni = mysqli_query($conn, "SELECT * FROM alumni ORDER BY date DESC LIMIT 4");
            if (mysqli_num_rows($alumni) > 0) {
                while ($a = mysqli_fetch_array($alumni)) {
                    $graduation = mysqli_query($conn, "SELECT * FROM graduation WHERE alumniId = '" . $a['id'] . "' ");
                    $g = mysqli_fetch_object($graduation);
                    $degree = mysqli_query($conn, "SELECT * FROM degree WHERE id = '" . $g->degreeId . "'");
                    $d = mysqli_fetch_object($degree);
            ?>
                    <div class="col-xl-3 col-sm-6 mb-5" style="background-color:#ffffff">
                        <a href="alumniProfile.php?id=<?php echo $a['id'] ?>">
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
                                                    echo $a['nameAlumni'] ?></h5><span class="small text-uppercase text-muted"><?php echo $d->degree ?></span>
                            </div>
                        </a>
                    </div>

                <?php }
            } else { ?>
                <p>Data tidak tersedia</p>
            <?php } ?>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col mt-5">
                <a href="alumniDirectory.php" class="btn-submit px-3 py-2">Load More</a>
            </div>
        </div>
    </div>
</section>
<?php
require_once('../include/footer.php');
?>