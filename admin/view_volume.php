<?php include('admin_header.php') ?>
<div class="container-fluid">
    <a href="add_volume.php" class="btn btn-success mt-3">Add Volume</a>
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">View Volume</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width="30%">Volume Name</th>
                                    <th>Volume Number</th>
                                    <!-- <th>View Details</th> -->
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select paper information
                                $select_from_journal_volume = "SELECT * FROM `journal_volume`";
                                $run_select_from_journal_volume = mysqli_query($conn, $select_from_journal_volume);
                                $serial_no = 1;
                                while ($row = mysqli_fetch_assoc($run_select_from_journal_volume)) {
                                    extract($row);
                                ?>
                                    <tr>
                                        <td><?php echo $serial_no; ?></td>
                                        <td><?php echo $vol_name; ?></td>
                                        <td><?php echo $vol_no; ?></td>
                                        <td>
                                            <a href="edit_volume.php?journal_volume_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="delete_volume.php?id=<?php echo $id ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
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
                            return confirm(" Do you really want to delete the volume?");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('admin_footer.php') ?>