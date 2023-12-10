<?php include("admin_header.php") ?>
<?php include_once("functions/countryList.php") ?>

<?php
if (isset($_POST['edit_committee'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $committee_image_name = $_FILES['image']['name'];
        $committee_image_tmp_name = $_FILES['image']['tmp_name'];

        $path_info = strtolower(pathinfo($committee_image_name, PATHINFO_EXTENSION));

        $committee_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must of type jpg, jpeg or png</p>";
        } else {
            unlink('../Images/committee_images/' . $current_image);
            $timestamps = date("Y-m-d h:i:s", time());

            $update_sql = "UPDATE `committee` SET `committee_name`='$name',`committee_university`='$university',`committee_designation`='$designation',`committee_country`='$country',`committee_email`='$email',`committee_image`='$committee_image_name',`committee_status`='$committee_status',`created_at`='$timestamps' WHERE committee_id='$id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($committee_image_tmp_name, '../Images/committee_images/' . $committee_image_name);
                header("location: view_committee_details.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
            }
        }
    } else {
        $timestamps = date("Y-m-d h:i:s", time());

        $update_sql = "UPDATE `committee` SET `committee_name`='$name',`committee_university`='$university',`committee_designation`='$designation',`committee_country`='$country',`committee_email`='$email',`committee_status`='$committee_status',`created_at`='$timestamps' WHERE committee_id='$id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_committee_details.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
        }
    }
}
?>

<?php
if (isset($_GET['committee_id'])) {
    $id = $_GET['committee_id'];
    $select_from_new_paper = "SELECT * FROM committee WHERE committee_id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit committee Details</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mt-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $committee_name; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="university">University</label>
                        <input type="text" name="university" id="university" class="form-control" value="<?php echo $committee_university; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" id="designation" class="form-control" value="<?php echo $committee_designation; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="country">Country</label>
                        <select class="form-select" id="country" name="country">
                            <option>Select a Country</option>
                            <?php
                            foreach ($country_list as $country_n) {
                            ?>
                                <option value="<?php echo $country_n['name']; ?>" <?php if (isset($country_n['name']) && $country_n['name'] === $committee_country) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $country_n['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $committee_email; ?>">
                    </div>
                    <div class="mt-3">
                        <label>Previous Image</label><br>
                        <img src="../Images/committee_images/<?php echo $committee_image ?>" width="50px" alt="committee_image">
                        <input type="hidden" name="current_image" value="<?php echo $committee_image; ?>" />
                    </div>
                    <div class="my-3">
                        <label for="image">New Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <label for="committee_status">Select Committee</label>
                    <select name="committee_status" id="committee_status" class="form-select">
                        <option value="0" <?php if (isset($committee_status) && $committee_status === "0") {
                                                echo "selected";
                                            } ?>>Local</option>
                        <option value="1" <?php if (isset($committee_status) && $committee_status === "1") {
                                                echo "selected";
                                            } ?>>International</option>
                    </select>
                    <div class="mt-3">
                        <input type="submit" name="edit_committee" value="Edit" class="btn btn-primary">
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