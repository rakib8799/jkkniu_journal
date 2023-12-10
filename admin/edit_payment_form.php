<?php include("admin_header.php") ?>
<?php include_once("functions/countryList.php") ?>

<?php
if (isset($_POST['edit_payment_form'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $payment_form_image_name = $_FILES['image']['name'];
        $payment_form_image_tmp_name = $_FILES['image']['tmp_name'];

        $path_info = strtolower(pathinfo($payment_form_image_name, PATHINFO_EXTENSION));

        $payment_form_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must of type jpg, jpeg or png</p>";
        } else {
            unlink('../Images/payment_form_images/' . $current_image);
            $update_sql = "UPDATE `payment_form` SET `paper_id`='$paper_id',`paper_title`='$paper_title',`track`='$track',`author_name`='$author_name',`author_address`='$author_address',`author_country`='$author_country',`author_category`='$author_category',`email`='$author_email',`phone_number`='$phone',`payment_form_image`='$payment_form_image_name' WHERE id='$payment_form_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($payment_form_image_tmp_name, '../Images/payment_form_images/' . $payment_form_image_name);
                header("location: view_payment_form.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
            }
        }
    } else {
        $update_sql = "UPDATE `payment_form` SET `paper_id`='$paper_id',`paper_title`='$paper_title',`track`='$track',`author_name`='$author_name',`author_address`='$author_address',`author_country`='$author_country',`author_category`='$author_category',`email`='$author_email',`phone_number`='$phone' WHERE id='$payment_form_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_payment_form.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
        }
    }
}
?>


<?php
if (isset($_GET['payment_id'])) {
    $id = $_GET['payment_id'];
    $select_from_new_paper = "SELECT * FROM payment_form WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit Payment Details</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="payment_form_id" value="<?php echo $id; ?>" />

                    <div class="mt-3">
                        <label for="paper_id"><b>Paper ID <span class="text-danger">* (If you are a visitor, write "Visitor" as paper id)</span></b></label>
                        <input type="text" name="paper_id" id="paper_id" class="form-control" placeholder="Please Type Your Paper ID" value="<?php echo $paper_id ?>">
                    </div>
                    <div class="mt-3">
                        <label for="paper_title"><b>Paper Title <span class="text-danger">* (If you are a visitor, write "Visitor" as paper title)</span></b></label>
                        <input type="text" name="paper_title" id="paper_title" class="form-control" placeholder="Please Type Your Paper Title" value="<?php echo $paper_title ?>">
                    </div>
                    <div class="mt-3">
                        <label for="track"><b>Track <span class="text-danger">*</span></b></label>
                        <select class="form-select" name="track" id="track">
                            <option value="">Please select a track</option>
                            <option value="Arts" <?php if (isset($track) && $track === "Arts") {
                                                        echo "selected";
                                                    } ?>>Arts</option>
                            <option value="Fine Arts" <?php if (isset($track) && $track === "Fine Arts") {
                                                            echo "selected";
                                                        } ?>>Fine Arts</option>
                            <option value="Social Sciences" <?php if (isset($track) && $track === "Social Sciences") {
                                                                echo "selected";
                                                            } ?>>Social Sciences</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="author_name"><b>Author Name: <span class="text-danger">*</span></b></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="author_name" id="author_name" placeholder="Please Type Your Name" value="<?php echo $author_name ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="author_address"><b>Author Address: <span class="text-danger">*</span></b></label>
                        <textarea class="form-control" name="author_address" id="author_address" cols="30" rows="5" placeholder="Please Type Your Address"><?php echo $author_address ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="author_country"><b>Author Country: <span class="text-danger">*</span></b></label>
                        <select class="form-select" id="author_country" name="author_country">
                            <option>Select a Country</option>
                            <?php
                            foreach ($country_list as $country) {
                            ?>
                                <option value="<?php echo $country['name']; ?>" <?php if (isset($country['name']) && $country['name'] === $author_country) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $country['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="author_category"><b>Author Category <span class="text-danger">*</span></b></label>
                        <select name="author_category" id="author_category" class="form-select">
                            <option value="">Please Select an option</option>
                            <option value="Local Professional (author/co-author)" <?php if (isset($author_category) && $author_category === "Local Professional (author/co-author)") {
                                                                                        echo "selected";
                                                                                    } ?>>Local Professional (author/co-author) - 1500 taka</option>
                            <option value="International Professional (author/co-author)" <?php if (isset($author_category) && $author_category === "International Professional (author/co-author)") {
                                                                                                echo "selected";
                                                                                            } ?>>International Professional (author/co-author) - 30 USD</option>
                            <option value="Local Student (author/co-author)" <?php if (isset($author_category) && $author_category === "Local Student (author/co-author)") {
                                                                                    echo "selected";
                                                                                } ?>>Local Student (author/co-author) - 1000 taka</option>
                            <option value="International Student (author/co-author)" <?php if (isset($author_category) && $author_category === "International Student (author/co-author)") {
                                                                                            echo "selected";
                                                                                        } ?>>International Student (author/co-author) - 15 USD</option>
                            <option value="Student from JKKNIU (author/co-author)" <?php if (isset($author_category) && $author_category === "Student from JKKNIU (author/co-author)") {
                                                                                        echo "selected";
                                                                                    } ?>>Student from JKKNIU (author/co-author) - 500 taka</option>
                            <option value="Local Professional outside JKKNIU as participant" <?php if (isset($author_category) && $author_category === "Local Professional outside JKKNIU as participant") {
                                                                                                    echo "selected";
                                                                                                } ?>>Local Professional outside JKKNIU as participant - 2000 taka</option>
                            <option value="International Professional outside JKKNIU as participant" <?php if (isset($author_category) && $author_category === "International Professional outside JKKNIU as participant") {
                                                                                                            echo "selected";
                                                                                                        } ?>>International Professional outside JKKNIU as participant - 40 USD</option>
                            <option value="Local Student outside JKKNIU as participant" <?php if (isset($author_category) && $author_category === "Local Student outside JKKNIU as participant") {
                                                                                            echo "selected";
                                                                                        } ?>>Local Student outside JKKNIU as participant - 1500 taka </option>
                            <option value="International Student outside JKKNIU as participant" <?php if (isset($author_category) && $author_category === "International Student outside JKKNIU as participant") {
                                                                                                    echo "selected";
                                                                                                } ?>>International Student outside JKKNIU as participant - 30 USD</option>
                            <option value="Professional from JKKNIU as participant" <?php if (isset($author_category) && $author_category === "Professional from JKKNIU as participant") {
                                                                                        echo "selected";
                                                                                    } ?>>Professional from JKKNIU as participant - 1500 taka</option>
                            <option value="Student from JKKNIU as participant" <?php if (isset($author_category) && $author_category === "Student from JKKNIU as participant") {
                                                                                    echo "selected";
                                                                                } ?>>Student from JKKNIU as participant - 500 taka</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Previous Payment Receipt Image</label><br>
                        <img src="../Images/payment_form_images/<?php echo $payment_form_image ?>" width="100px" alt="payment_form_image">
                        <input type="hidden" name="current_image" value="<?php echo $payment_form_image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">New Payment Receipt Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="author_email"><b>Email Address <span class="text-danger">*</span></b></label>
                        <input type="email" name="author_email" id="author_email" class="form-control" placeholder="Please Type Your Email Address" value="<?php echo $email ?>">
                    </div>
                    <div class="mt-3">
                        <label for="phone"><b>Mobile Number <span class="text-danger">*</span></b></label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Please Type Your Phone Number" value="<?php echo $phone_number ?>">
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="edit_payment_form" value="Update" class="btn btn-primary">
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