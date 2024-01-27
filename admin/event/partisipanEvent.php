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

$event = mysqli_query($conn, "SELECT * FROM event where id = '" . $_GET['ide'] . "' ");
$e = mysqli_fetch_object($event);
?>

<span class="text">Partisipan Event</span>
</div>
<div class="home-content">
    <div class="container create" style="margin-top:-25px !important">
        <div class="row  text-center align-items-start">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <img src="../../assets/event/<?php echo $e->ImageEvent ?>" height="auto" style="width:; margin-bottom:25px" alt="">
                    </div>
                </div>
                <div class="eventTitle">
                    <h1><?php echo $e->TitleEvent ?></h1>
                    <p><?php echo $e->date ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-auto">
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
                                <th>Alumni Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $event = mysqli_query($conn, "SELECT * FROM participant INNER JOIN event on participant.eventId = event.id INNER JOIN alumni ON participant.alumniId = alumni.id WHERE event.id = '" . $_GET['ide'] . "' ");

                            if (mysqli_num_rows($event) > 0) {
                                while ($row = mysqli_fetch_array($event)) {
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
                                            <?php echo $row['email'] ?>
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