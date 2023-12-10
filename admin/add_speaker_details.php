<?php include_once("admin_header.php") ?>
<?php include_once("functions/countryList.php") ?>

<?php
if (isset($_POST['add_speaker'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $speaker_image_name = $_FILES['image']['name'];
        $speaker_image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];

        $path_info = strtolower(pathinfo($speaker_image_name, PATHINFO_EXTENSION));
        echo $path_info;
        $speaker_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image format is not supported</p>";
        } else if ($image_size >= 5242880) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image size cannot be larger than 5 MB</p>";
        } else {
            $timestamps = date("Y-m-d h:i:s", time());

            $insert_sql = "INSERT INTO `speakers`(`speaker_name`,`speaker_university`,`speaker_designation`,`speaker_topic`,`speaker_country`,`speaker_email`,`speaker_image`,`speaker_status`,`created_at`) VALUES('$name','$university','$designation','$long_desc','$country','$email','$speaker_image_name','$speaker_status','$timestamps')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($speaker_image_tmp_name, "../Images/speaker_images/" . $speaker_image_name);
                header("location: view_speaker_details.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
            }
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image is not found</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">Add New Speaker</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="university">University</label>
                <input type="text" name="university" id="university" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="designation">Designation</label>
                <input type="text" name="designation" id="designation" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="long_desc">Topic</label>
                <textarea name="long_desc" id="long_desc" required></textarea>
            </div>
            <div class="mt-3">
                <label for="country">Country</label>
                <select class="form-select" id="country" name="country" required>
                    <option>Select a Country</option>
                    <?php
                    foreach ($country_list as $country_n) {
                    ?>
                        <option value="<?php echo $country_n['name']; ?>"><?php echo $country_n['name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="my-3">
                <label for="speaker_status">Select Speaker</label>
                <select name="speaker_status" id="speaker_status" class="form-control">
                    <option value="0">Local</option>
                    <option value="1">International</option>
                </select>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_speaker" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>