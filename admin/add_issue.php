<?php
include('admin_header.php');
include('../mail_sending.php');
?>

<!-- End of prvious php form (new_paper_submission) submission -->
<form action="" method="POST">
    <div class="container-fluid col-lg-10 col-12">
        <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h3 class="text-center text-secondary fw-bold">Add Issue</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="mt-3">
                            <label for="volume">Volume</label>
                            <select name="volume" id="volume" class="form-select" required>
                                <option value="">Please select a volume name</option>
                                <?php
                                $select_from_new_paper = "SELECT * FROM `journal_volume` ORDER BY `id`";
                                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                        extract($row);
                                ?>
                                        <option value="<?php echo $id ?>"><?php echo $vol_name ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="issue_name">Issue Name</label>
                            <input type="text" name="issue_name" id="issue_name" placeholder="Enter Issue Name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="issue_no">Issue No</label>
                            <input type="number" name="issue_no" id="issue_no" placeholder="Enter Issue Number" class="form-control">
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
    $insert_qry = "INSERT INTO `journal_issue`(`volume_id`,`issue_name`, `issue_no`) VALUES ('$volume','$issue_name','$issue_no')";

    $run_insert_qry = mysqli_query($conn, $insert_qry);
    if ($run_insert_qry) {
?>
        <script>
            window.alert("issue is added Successfully");
            window.location = "view_issue.php";
        </script>
<?php
    }
}
?>
<?php include('admin_footer.php') ?>