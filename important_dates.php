<div class="container">
    <h2 class="text-uppercase fw-bold text-center mb-3" data-aos="fade-up">
        Important <span class="secondary_color">Dates</span>
    </h2>
    <?php
    $select_from_new_paper = "SELECT * FROM `important_dates` ";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
    ?>
        <div class="card-group rounded shadow text-center" data-aos="fade-up-right">
            <?php
            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                extract($row);
            ?>
                <div class="card" style="min-height: 15vh;">

                    <div class="card-body">
                        <h5 class="card-title primary_color fw-bold fs-4" style="min-height: 10vh;">
                            <?php
                            // echo $topic;
                            if (strlen($topic) < 20 && str_word_count($topic) > 1) {
                                $arr = explode(" ", $topic);
                                $lines = array_chunk($arr, 1);
                                foreach ($lines as $line)
                                    echo implode(" ", $line) . "<br/>";
                            } else {
                                echo $topic;
                            }
                            ?>
                        </h5>
                        <?php
                        $date_format = date("Y-m-d", strtotime($date));
                        $date_now = date("Y-m-d");
                        if (strtotime($date_format) > strtotime($date_now)) {
                        ?>
                            <p class="card-text fw-bold fs-5"><?php echo $date; ?></p>
                        <?php
                        } else {
                        ?>
                            <p class="card-text fw-bold fs-5" style="font-size: 1.5rem;text-decoration:line-through;text-decoration-color:red;"><?php echo $date; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        <?php
    }
        ?>
        </div>
</div>