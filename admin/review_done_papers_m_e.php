<?php include('admin_header.php') ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="text-center text-secondary fw-bold">All Papers Status</h3>
                    <!-- <h5 class="text-danger text-center "><i>AE = Associative Editor, ME = Main Editor</i></h5> -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width="30%">Paper Title</th>
                                    <th>Submission Date</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select paper information
                                $select_from_new_paper = "SELECT * FROM `new_paper` WHERE `paper_status` = '6'";
                                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                $serial_no = 1;
                                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                ?>
                                    <tr>
                                        <td><?php echo $serial_no; ?></td>
                                        <td><?php echo $row['paper_title'] ?></td>
                                        <td><?php echo date('d-M-Y', strtotime($row['created_at'])) ?></td>
                                        <td><a class="form-control btn btn-primary fw-bold" href="view_paper_details_m_e.php?paper_id=<?php echo $row['paper_id'] ?>">View Details</a></td>
                                        <?php
                                        if ($row['paper_status'] == 6) {
                                        ?>
                                            <td class="all_review_done fw-bold"><?php echo "All Review Done" ?></td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                <?php
                                    $serial_no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('admin_footer.php') ?>