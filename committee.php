<h2 class="text-uppercase fw-bold text-center" data-aos="fade-up"><span class="secondary_color">Committee </span>Members</h2>
<p class="fw-bold text-center text-danger fs-3">Yet to be published</p>


<div class="container mt-3" data-aos="fade-up-right">
    <?php
    $select_from_new_paper = "SELECT * FROM `committee` ";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
    ?>
        <h4 class="fw-bold text-center" data-aos="fade-up">International Advisory Committee</h4>
        <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-center" style="min-height: 60vh;">
            <?php
            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                extract($row);
                if ($committee_status == "1") {
            ?>
                    <div class="col-md-3">
                        <div class="card committee_hover" style="height:100%">
                            <img src="Images/committee_images/<?php echo $committee_image ?>" class="card-img-top" alt="committee_image" style="height:30vh;object-fit:contain;">
                            <div class="card-body">
                                <h5 class="card-title primary_color"><?php echo $committee_name ?></h5>
                                <p class="card-text"><?php echo $committee_designation ?></p>
                                <p class="card-text"><?php echo $committee_university ?>, <?php echo $committee_country ?></p>
                            </div>
                        </div>
                    </div>

        <?php
                }
            }
        }
        ?>
        </div>
        <!-- <?php
                $select_from_new_paper = "SELECT * FROM `committee` ";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                ?>
            <h4 class="mt-3 fw-bold text-center" data-aos="fade-up">National Advisory Committee</h4>
            <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-center">
                <?php
                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                        extract($row);
                        if ($committee_status == "0") {
                ?>
                        <div class="col-md-3">
                            <div class="card committee_hover" style="height:100%">
                                <img src="Images/committee_images/<?php echo $committee_image ?>" class="card-img-top" alt="committee_image" style="height:30vh;object-fit:contain;">
                                <div class="card-body">
                                    <h5 class="card-title primary_color"><?php echo $committee_name ?></h5>
                                    <p class="card-text"><?php echo $committee_designation ?></p>
                                    <p class="card-text"><?php echo $committee_university ?>, <?php echo $committee_country ?></p>
                                </div>
                            </div>
                        </div>

            <?php
                        }
                    }
                }
            ?> -->
</div>
</div>