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

<span class="text">Event</span>
</div>
<div class="home-content">
    <div class="container create" style="margin-top:-25px !important">
        <div class="row">
            <div class="col-md-auto mb-3">
                <div class="btn-submit">
                    <a class="button" href="addEvent.php">Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="col ">
                <div class="tableProduct">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title Event</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $event = mysqli_query($conn, "SELECT * FROM event ORDER BY id");

                            if (mysqli_num_rows($event) > 0) {
                                while ($row = mysqli_fetch_array($event)) {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row['TitleEvent'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['shortDescription'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date'] ?>
                                        </td>
                                        <td>
                                            <a class="button-table" href="editEvent.php?ide=<?php echo $row['id'] ?>"><i class='bx bxs-edit-alt me-1'></i>Edit</a>
                                            <a class="button-table" href="partisipanEvent.php?ide=<?php echo $row['id'] ?>"><i class="fa-solid fa-clipboard-check me-1"></i></i>Partisipan</a>
                                            <a class="button-table" id="delete" href="../include/delete.php?ide=<?php echo $row['id'] ?>"><i class='bx bxs-trash me-1'></i>Delete</a>
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