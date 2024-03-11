<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_journal_issue'])) {
    extract($_POST);

    $update_sql = "UPDATE `journal_issue` SET `volume_id`='$volume',`issue_name`='$issue_name',`issue_no`='$issue_no' WHERE id='$issue_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_issue.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Data is not updated</p>";
    }
}
?>

<?php
if (isset($_GET['journal_issue_id'])) {
    $id = $_GET['journal_issue_id'];

    $select_from_new_paper = "SELECT * FROM journal_issue WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit Issue</h2>
                <form action="" method="post">
                    <input type="hidden" name="issue_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="volume">Volume</label>
                        <select name="volume" id="volume" class="form-select" required>
                            <option value="">Please select a volume name</option>
                            <?php
                            $select_from_new_paper = "SELECT * FROM `journal_volume` ORDER BY `id`";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row1 = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            ?>
                                    <option value="<?php echo $row1['id'] ?>" <?php if ($volume_id == $row1['id']) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?>><?php echo $row1['vol_name'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="issue_name">Issue Name</label>
                        <input type="text" name="issue_name" id="issue_name" placeholder="Enter Issue Name" class="form-control" value="<?php echo $issue_name; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="issue_no">Issue No</label>
                        <input type="number" name="issue_no" id="issue_no" placeholder="Enter Issue Number" class="form-control" value="<?php echo $issue_no; ?>">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_journal_issue" value="Update" class="btn btn-primary">
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