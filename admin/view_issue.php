<?php include('admin_header.php') ?>
<div class="container-fluid">
    <a href="add_issue.php" class="btn btn-success mt-3">Add Issue</a>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">View Issue</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Volume ID</th>
                                    <th width="30%">issue Name</th>
                                    <th>issue Number</th>
                                    <!-- <th>View Details</th> -->
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select paper information
                                $select_from_journal_issue = "SELECT * FROM `journal_issue`";
                                $run_select_from_journal_issue = mysqli_query($conn, $select_from_journal_issue);
                                $serial_no = 1;
                                while ($row = mysqli_fetch_assoc($run_select_from_journal_issue)) {
                                    extract($row);
                                ?>
                                    <tr>
                                        <td><?php echo $serial_no; ?></td>
                                        <td><?php echo $volume_id; ?></td>
                                        <td><?php echo $issue_name; ?></td>
                                        <td><?php echo $issue_no; ?></td>
                                        <td>
                                            <a href="edit_issue.php?journal_issue_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="delete_issue.php?id=<?php echo $id ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                    $serial_no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        function confirmSubmission() {
                            return confirm(" Do you really want to delete the issue?");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('admin_footer.php') ?>