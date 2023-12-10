<?php include_once("admin_header.php") ?>
<?php include_once("functions/uploadImage.php") ?>

<?php
if (isset($_POST['add_call_for_paper'])) {
    extract($_POST);


    if (isset($_FILES['image1'], $_FILES['image2'], $_FILES['image3'], $_FILES['image4'], $_FILES['pdf_file'], $_FILES['doc_file'])) {
        $image1_name = $_FILES['image1']['name'];
        $image1_tmp_name = $_FILES['image1']['tmp_name'];
        $image1_size = $_FILES['image1']['size'];
        $image2_name = $_FILES['image2']['name'];
        $image2_tmp_name = $_FILES['image2']['tmp_name'];
        $image3_name = $_FILES['image3']['name'];
        $image3_tmp_name = $_FILES['image3']['tmp_name'];
        $image4_name = $_FILES['image4']['name'];
        $image4_tmp_name = $_FILES['image4']['tmp_name'];
        $image2_size = $_FILES['image2']['size'];
        $image3_size = $_FILES['image3']['size'];
        $image4_size = $_FILES['image4']['size'];
        $pdf_file_name = $_FILES['pdf_file']['name'];
        $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
        $doc_file_name = $_FILES['doc_file']['name'];
        $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];

        $path_info1 = strtolower(pathinfo($image1_name, PATHINFO_EXTENSION));
        $path_info2 = strtolower(pathinfo($image2_name, PATHINFO_EXTENSION));
        $path_info5 = strtolower(pathinfo($image3_name, PATHINFO_EXTENSION));
        $path_info6 = strtolower(pathinfo($image4_name, PATHINFO_EXTENSION));
        $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
        $path_info4 = strtolower(pathinfo($doc_file_name, PATHINFO_EXTENSION));

        $image1_name = uniqid() . ".$path_info1";
        $image2_name = uniqid() . ".$path_info2";
        $image3_name = uniqid() . ".$path_info5";
        $image4_name = uniqid() . ".$path_info6";
        $pdf_file_name = uniqid() . ".$path_info3";
        $doc_file_name = uniqid() . ".$path_info4";

        $arr1 = array("jpg", "png", "jpeg");
        $arr2 = array("jpg", "png", "jpeg");
        $arr5 = array("jpg", "png", "jpeg");
        $arr6 = array("jpg", "png", "jpeg");
        $arr3 = array("pdf");
        $arr4 = array("doc", "docx");

        if (!in_array($path_info1, $arr1) || !in_array($path_info2, $arr2) || !in_array($path_info5, $arr5) || !in_array($path_info6, $arr6)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image format is not supported</p>";
        } else if ($image1_size >= 5242880 || $image2_size >= 5242880 || $image3_size >= 5242880 || $image4_size >= 5242880) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image size cannot be larger than 5 MB</p>";
        } else if (!in_array($path_info3, $arr3) || !in_array($path_info4, $arr4)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File format is not supported</p>";
        } else {
            $timestamps = date("Y-m-d h:i:s", time());
            $insert_sql = "INSERT INTO `call_for_paper`(`image1`,`image2`,`image3`,`image4`,`pdf_file`,`doc_file`,`created_at`) VALUES('$image1_name','$image2_name','$image3_name','$image4_name','$pdf_file_name','$doc_file_name','$timestamps')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($image1_tmp_name, '../Images/call_for_paper/' . $image1_name);
                move_uploaded_file($image2_tmp_name, '../Images/call_for_paper/' . $image2_name);
                move_uploaded_file($image3_tmp_name, '../Images/call_for_paper/' . $image3_name);
                move_uploaded_file($image4_tmp_name, '../Images/call_for_paper/' . $image4_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/call_for_paper/' . $pdf_file_name);
                move_uploaded_file($doc_file_tmp_name, '../Files/call_for_paper/' . $doc_file_name);
                header("location: view_call_for_paper.php");
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
        <h2 class="text-capitalize text-center">Add Call For Paper</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="image1">Image-1</label>
                <input type="file" name="image1" id="image1" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="image2">Image-2</label>
                <input type="file" name="image2" id="image2" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="image3">Image-3</label>
                <input type="file" name="image3" id="image3" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="image4">Image-4</label>
                <input type="file" name="image4" id="image4" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="pdf_file">PDF File</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="doc_file">DOC File</label>
                <input type="file" name="doc_file" id="doc_file" class="form-control" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_call_for_paper" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>