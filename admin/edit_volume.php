<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_journal_volume'])) {
    extract($_POST);

    $update_sql = "UPDATE `journal_volume` SET `vol_name`='$volume_name',`vol_no`='$volume_no' WHERE id='$volume_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_volume.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Data is not updated</p>";
    }
}
?>

<?php
if (isset($_GET['journal_volume_id'])) {
    $id = $_GET['journal_volume_id'];

    $select_from_new_paper = "SELECT * FROM journal_volume WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit volume</h2>
                <form action="" method="post">
                    <input type="hidden" name="volume_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="volume_name">volume Name</label>
                        <input type="text" name="volume_name" id="volume_name" placeholder="Enter volume Name" class="form-control" value="<?php echo $vol_name; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="volume_no">volume No</label>
                        <input type="number" name="volume_no" id="volume_no" placeholder="Enter volume Number" class="form-control" value="<?php echo $vol_no; ?>">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_journal_volume" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is found</p>";
    }
}
?>
<?php include_once("admin_footer.php") ?>