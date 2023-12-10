<?php include_once("admin_header.php") ?>
<?php include_once("functions/countryList.php") ?>

<?php
if (isset($_POST['add_committee'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {

        $committee_image_name = $_FILES['image']['name'];
        $committee_image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];

        $path_info = strtolower(pathinfo($committee_image_name, PATHINFO_EXTENSION));
        echo $path_info;
        $committee_image_name = uniqid() . ".$path_info";
        $manuscript_pdf_file_type = $_FILES['image']['type'];

        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image format is not supported</p>";
        } else if ($image_size >= 5242880) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image size cannot be larger than 5 MB</p>";
        } else {
            $timestamps = date("Y-m-d h:i:s", time());
            $insert_sql = "INSERT INTO `committee`(`committee_name`,`committee_university`,`committee_designation`,`committee_country`,`committee_email`,
            `committee_image`, `committee_status`,`created_at`) VALUES('$name','$university','$designation','$country','$email','$committee_image_name','$committee_status','$timestamps')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($committee_image_tmp_name, '../Images/committee_images/' . $committee_image_name);
                header("location: view_committee_details.php");
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
        <h2 class="text-capitalize text-center">Add New Committee Member</h2>
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
            <div class="my-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="my-3">
                <label for="committee_status">Select Committee</label>
                <select name="committee_status" id="committee_status" class="form-select">
                    <option value="0">Local</option>
                    <option value="1">International</option>
                </select>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_committee" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>