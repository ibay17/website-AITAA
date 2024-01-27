<div class="overlay"></div>
</div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<!-- chosen -->
<script src="../../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>

<script type="module">
    // Chosen 
    $(".my_select_box").chosen({
        disable_search_threshold: 10,
        no_results_text: "Oops, nothing found!",
        width: "100%",
    });
    // Chosen 
</script>
<!-- Custom Theme Scripts -->
<script src="../assets/js/index.js"></script>

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
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function() {
        loader.style.display = "none";
    })
</script>
<script>
      CKEDITOR.replace( 'deskripsi' );
    </script>
</body>

</html>