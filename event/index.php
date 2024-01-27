<?php
require_once('../include/header.php');
?>
<section id="alumniProfile">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <h1>Event</h1>
            </div>
            <div class="col-md-6">
                <div class="search d-flex">
                    <input type="text" class="form-control me-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    <a href="#" class="btn-submit">Search</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container no-margin">
        <div class="row align-items-center justify-content-center text-center" style="background-color:#380000a9; padding:25px 15px; border-radius:5px; margin:3px">
            <?php
            $event = mysqli_query($conn,  "SELECT * FROM `event` order by date ASC");
            if (mysqli_num_rows($event) > 0) {
                while ($e = mysqli_fetch_array($event)) {
            ?>
                    <div class="col-xl-4 col-sm-6 mb-4">
                        <div class="card">
                            <img src="../assets/event/<?php echo $e['ImageEvent'] ?>" alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $e['TitleEvent'] ?></h5>
                                <p class="card-text"><?php echo $e['shortDescription'] ?></p>
                                <a href="detailEvent.php?ide=<?php echo $e['id'] ?>" class="btn btn-outline-success btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>


                <?php }
            } else { ?>
                <p>Data tidak tersedia</p>
            <?php } ?>

        </div>
        <!-- <div class="row mt-4">
            <div class="col-md-12 d-flex justify-content-center text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div> -->
    </div>
</section>
<?php
require_once('../include/footer.php');
?>