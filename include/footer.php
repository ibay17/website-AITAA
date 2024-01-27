<div class="footer">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-md-5 mb-5">
                <img src="../assets/image/iconNavbar.png" height="75px" width="auto" alt="icon">
            </div>
            <div class="col-md-3 mb-5">
                <h4>Follow us</h4>
                <i class='bx bxl-linkedin'></i>
                <i class='bx bxl-instagram'></i>
                <i class='bx bxl-facebook'></i>
                <i class='bx bxl-twitter'></i>
            </div>
            <div class="col-md-2 mb-5">
                <h4>Usefull Link</h4>
                <ul>
                    <li>Our Projects</li>
                    <li>FAQ’s</li>
                    <li>News and Updates</li>
                </ul>
            </div>
            <div class="col-md-2 mb-5">
                <h4>Contacts</h4>
                <ul style="list-style-type:none">
                    <li>Address</li>
                    <li>Email</li>
                    <li>Phone Number</li>
                </ul>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <div class="copyright ">
                    <p>All Copyrights reserved</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../assets/js/script.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    if ($_SESSION['alert'] == 2) {
?>
        <script>
            Swal.fire({
                icon: '<?php echo $_SESSION['status_icon'] ?>',
                title: '<?php echo $_SESSION['status'] ?>',
                text: '<?php echo $_SESSION['status_text'] ?>',
                // timer:2000
            })
        </script>
<?php
    }
    $_SESSION['alert']++;
}
?>
<script>
    $(document).ready(function(){
      $("#image").click(function(){
        $("#myImage").click()
      });
    });
    </script>

<script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function(){
        loader.style.display= "none";
    }) 
</script>
</body>
</html>