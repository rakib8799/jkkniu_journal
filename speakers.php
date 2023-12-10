<h2 class="text-uppercase fw-bold text-center" data-aos="fade-up"><span class="secondary_color">Honorable </span>Speakers</h2>
<p class="fw-bold text-center text-danger fs-3">Yet to be published</p>

<div class="container mt-3 " data-aos="fade-up-right">
    <?php
    $select_from_new_paper = "SELECT * FROM `speakers` ";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
    ?>
        <div class="row row-cols-1 row-cols-md-4 g-4 d-flex justify-content-center" style="min-height:70vh;">
            <?php
            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                extract($row);
            ?>
                <div class="col-md-4">
                    <div class="card speaker_hover our-team" style="height:100%">
                        <div class="picture">
                            <img src="Images/speaker_images/<?php echo $speaker_image ?>" class="card-img-top" alt="..." style="height:40vh;object-fit:contain;background:white;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title primary_color"><?php echo $speaker_name ?></h5>
                            <p class="card-text"><?php echo $speaker_university ?>, <?php echo $speaker_country ?><br>
                                Speaking on<br> <b class="secondary_color"><?php echo $speaker_topic ?></b></p>
                        </div>
                        <ul class="social">
                            <li>
                                <a class="facebook" href="#fb">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="#twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <!-- <li>
                                <a class="dribbble" href="#dribble">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </li> -->
                            <li>
                                <a class="linkedin" href="#linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>