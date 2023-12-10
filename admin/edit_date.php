<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_date'])) {
    extract($_POST);

    $update_sql = "UPDATE `important_dates` SET `topic`='$topic',`date`='$date' WHERE id='$id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_date.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
    }
}
?>

<?php
if (isset($_GET['date_id'])) {
    $id = $_GET['date_id'];
    $select_from_new_paper = "SELECT * FROM important_dates WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit Important Dates</h2>
                <form action="" method="post">
                    <div class="mt-3">
                        <label for="topic">Topic</label>
                        <input type="text" name="topic" id="topic" class="form-control" value="<?php echo $topic; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="date">Date</label>
                        <input type="text" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_date" value="Edit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data found</p>";
    }
}
?>
<?php include_once("admin_footer.php") ?>