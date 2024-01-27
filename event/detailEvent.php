<?php
require_once('../include/header.php');
$event = mysqli_query($conn,  "SELECT * FROM `event` where id = '" . $_GET['ide'] . "'  ");
$e = mysqli_fetch_object($event);
?>
<section id="alumniProfile">
    <div class="container">
        <div class="row  text-center align-items-start">
            <div class="col-md-12">
                <div class="imgEvent">
                    <img src="../assets/event/<?php echo $e->ImageEvent ?>" alt="">
                </div>
                <div class="eventTitle">
                    <h1><?php echo $e->TitleEvent ?></h1>
                    <p><?php echo $e->date ?></p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="eventDescription backgroundColor p-4 mb-3">
                    <p><?php echo $e->Description ?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="register backgroundColor p-3">
                    <h6 style="margin-bottom: 25px;">Are you interested in?</h6>
                    <form method="post">
                        <input type="submit" class="btn-submit" name="registerEvent" value="Register">
                    </form>
                    <!-- <a href="registerEvent.php?ide=<?php echo $e->id ?>" class="btn-submit">Register Here</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container">
        <div class="row d-flex justify-content-center">
            <img src="../assets/image/Image (1).png" class="eventImg shadow-1-strong rounded mb-4" />
            <img src="../assets/image/Image.png" class="eventImg shadow-1-strong rounded mb-4" />
            <img src="../assets/image/Image (2).png" class="eventImg shadow-1-strong rounded mb-4" />
            <img src="../assets/image/alumni1.png" class="eventImg shadow-1-strong rounded mb-4" />
            <img src="../assets/image/alumni2.png" class="eventImg shadow-1-strong rounded mb-4" />
            <img src="../assets/image/alumni3.png" class="eventImg shadow-1-strong rounded mb-4" />
            <img src="../assets/image/title.png" class="eventImg shadow-1-strong rounded mb-4" />
            <img src="../assets/image/banner1.jpg" class="eventImg shadow-1-strong rounded mb-4" />
        </div>
    </div> -->
</section>
<?php
require_once('../include/footer.php');
?>