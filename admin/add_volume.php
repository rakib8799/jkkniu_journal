<?php
include('admin_header.php');
include('../mail_sending.php');
?>

<!-- End of prvious php form (new_paper_submission) submission -->
<form action="" method="POST">
    <div class="container-fluid col-lg-10 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h3 class="text-center text-secondary fw-bold">Add Volume</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="mt-3">
                            <label for="vol_name">Volume Name</label>
                            <input type="text" name="vol_name" id="vol_name" placeholder="Enter Volume Name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="vol_no">Volume No</label>
                            <input type="number" name="vol_no" id="vol_no" placeholder="Enter Volume Number" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="mt-3">
                            <input type="submit" name="submit" class="form-control btn btn-success fw-bold" value="Add">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
if (isset($_POST['submit'])) {
    extract($_POST);

    // paper_status = 1 mane hocche paper paper ta matro submit hoyse.
    $insert_qry = "INSERT INTO `journal_volume`(`vol_name`, `vol_no`) VALUES ('$vol_name','$vol_no')";

    $run_insert_qry = mysqli_query($conn, $insert_qry);
    if ($run_insert_qry) {
?>
        <script>
            window.alert("Volume is added Successfully");
            window.location = "view_volume.php";
        </script>
<?php
    }
}
?>
<?php include('admin_footer.php') ?>