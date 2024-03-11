<?php include('reviewer_header.php')?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-12">
            <div class="card mt-2 shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class = "text-center text-secondary fw-bold">Accepted Papers</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class = "table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th width = "30%">Paper Title</th>
                                    <th>Submission Date</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // select paper information
                                    $select_from_new_paper = "SELECT * FROM `new_paper` WHERE  `paper_status` = '100'";
                                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                    $serial_no = 1;
                                    while($row = mysqli_fetch_assoc($run_select_from_new_paper))
                                    {
                                        // new_paper table e onk reviewer_id thake. oita ke array te convert kore then in_array diye search korbo. tar fole je reviewer login korse se sudhu take assign kora paper dekhte parbe.
                                        
                                        $all_reviewer_id = explode(",",$row['reviewer_id']);
                                        if(in_array($_SESSION['reviewer_id'],$all_reviewer_id))
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $serial_no;?></td>
                                                <td><?php echo $row['paper_title']?></td>
                                                <td><?php echo date('d-M-Y', strtotime($row['timestamps']))?></td>
                                                <td><a class = "form-control btn btn-primary fw-bold" href="view_paper_details_r.php?paper_id=<?php echo $row['paper_id']?>&r_id=<?php echo $row['reviewer_id'] ?>">View Details</a></td>
                                                <?php 
                                                if($row['paper_status']==100)
                                                {
                                                    ?>
                                                        <td class = "text-success fw-bold"><?php echo "Accepted"?></td>
                                                    <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php 
                                            $serial_no++;
                                        }       
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
<?php include('reviewer_footer.php')?>