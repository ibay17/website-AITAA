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

<span class="text">Alumni</span>
</div>
<div class="home-content">
    <div class="container create" style="margin-top:-25px !important">
        <div class="row">
            <div class="col-md-auto mb-3">
                <div class="btn-submit">
                    <a class="button" href="addAlumni.php">Add</a>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="btn-submit">
                    <a class="button" href="../include/exportAlumni.php" target="_blank">Download</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col ">
                <div class="tableProduct">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%; " >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Degree</th>
                                <th>Year</th>
                                <th>Date</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $alumni = mysqli_query($conn, "SELECT *
                                FROM alumni
                                INNER JOIN graduation
                                ON alumni.id = graduation.alumniId 
                                INNER JOIN school
                                ON graduation.schoolId = school.id
                                INNER JOIN fieldofstudy
                                ON graduation.programId = fieldofstudy.id
                                INNER JOIN degree
                                ON graduation.degreeId = degree.id
                                GROUP BY alumni.id
                                ORDER BY alumni.date ASC");

                            if (mysqli_num_rows($alumni) > 0) {
                                while ($row = mysqli_fetch_array($alumni)) {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row['alumniId'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['nameAlumni'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['degree'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['year'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date'] ?>
                                        </td>
                                        <td>
                                            <a class="button-table" href="editAlumni.php?ida=<?php echo $row['alumniId'] ?>"><i class='bx bxs-edit-alt me-1'></i>Edit</a>
                                            <a class="button-table" id="cek" href="https://www.asdu.ait.ac.th/alumni/alumniById.cfm?AlumniID=<?php echo $row['alumniId'] ?>" target='_blank'><i class="fa-solid fa-check"></i>Check</a>
                                            <a class="button-table" id="delete" href="../include/delete.php?ida=<?php echo $row['alumniId'] ?>"><i class='bx bxs-trash me-1'></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="6">Tidak ada data</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php
require_once('../include/footer.php');
?>