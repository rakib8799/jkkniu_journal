<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_call_for_paper'])) {
    extract($_POST);

    if (!empty($_FILES['image1']) && !empty($_FILES['image2']) && !empty($_FILES['image3']) && !empty($_FILES['image4']) && !empty($_FILES['pdf_file']) && !empty($_FILES['doc_file'])) {
        $image1_name = $_FILES['image1']['name'];
        $image1_tmp_name = $_FILES['image1']['tmp_name'];
        $image2_name = $_FILES['image2']['name'];
        $image2_tmp_name = $_FILES['image2']['tmp_name'];
        $image3_name = $_FILES['image3']['name'];
        $image3_tmp_name = $_FILES['image3']['tmp_name'];
        $image4_name = $_FILES['image4']['name'];
        $image4_tmp_name = $_FILES['image4']['tmp_name'];

        $pdf_file_name = $_FILES['pdf_file']['name'];
        $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
        $doc_file_name = $_FILES['doc_file']['name'];
        $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];

        $path_info1 = strtolower(pathinfo($image1_name, PATHINFO_EXTENSION));
        $path_info2 = strtolower(pathinfo($image1_name, PATHINFO_EXTENSION));
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

        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info1, $arr) || !in_array($path_info2, $arr) || !in_array($path_info3, $arr) || !in_array($path_info4, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must of type jpg, jpeg or png</p>";
        } else {
            unlink('../Images/call_for_paper/' . $current_image1);
            unlink('../Images/call_for_paper/' . $current_image2);
            unlink('../Images/call_for_paper/' . $current_image3);
            unlink('../Images/call_for_paper/' . $current_image4);
            unlink('../Files/call_for_paper/' . $current_pdf_file);
            unlink('../Files/call_for_paper/' . $current_doc_file);
            $timestamps = date("Y-m-d h:i:s", time());
            $update_sql = "UPDATE `call_for_paper` SET `image1`='$image1_name',`image2`='$image2_name',`image3`='$image3_name',`image4`='$image4_name',`pdf_file`='$pdf_file_name',`doc_file`='$doc_file_name',`created_at`='$timestamps' WHERE id='$id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($image1_tmp_name, '../Images/call_for_paper/' . $image1_name);
                move_uploaded_file($image2_tmp_name, '../Images/call_for_paper/' . $image2_name);
                move_uploaded_file($image3_tmp_name, '../Images/call_for_paper/' . $image3_name);
                move_uploaded_file($image4_tmp_name, '../Images/call_for_paper/' . $image4_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/call_for_paper/' . $pdf_file_name);
                move_uploaded_file($doc_file_tmp_name, '../Files/call_for_paper/' . $doc_file_name);
                header("location: show_all_call_for_papers.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
            }
        }
    } else {
        header("location: show_all_call_for_papers.php");
        ob_end_flush();
    }
}
?>

<?php
if (isset($_GET['call_for_paper_id'])) {
    $id = $_GET['call_for_paper_id'];

    $select_from_new_paper = "SELECT * FROM call_for_paper WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);

    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit Call For Paper Details</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mt-3">
                        <label>Previous Image-1</label><br>
                        <img src="../Images/call_for_paper/<?php echo $image1 ?>" width="50px" alt="image1">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="hidden" name="current_image1" value="<?php echo $image1; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image1">New Image-1</label>
                        <input type="file" name="image1" id="image1" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous Image-2</label><br>
                        <img src="../Images/call_for_paper/<?php echo $image2 ?>" width="50px" alt="image2">
                        <input type="hidden" name="current_image2" value="<?php echo $image2; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image2">New Image-2</label>
                        <input type="file" name="image2" id="image2" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous Image-3</label><br>
                        <img src="../Images/call_for_paper/<?php echo $image3 ?>" width="50px" alt="image3">
                        <input type="hidden" name="current_image3" value="<?php echo $image3; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image3">New Image-3</label>
                        <input type="file" name="image3" id="image3" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous Image-4</label><br>
                        <img src="../Images/call_for_paper/<?php echo $image4 ?>" width="50px" alt="image4">
                        <input type="hidden" name="current_image4" value="<?php echo $image4; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image4">New Image-4</label>
                        <input type="file" name="image4" id="image4" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous PDF File</label><br>
                        <a href="../Files/call_for_paper/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                        <input type="hidden" name="current_pdf_file" value="<?php echo $pdf_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="pdf_file">New PDF File</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>Previous DOC File</label><br>
                        <a href="../Files/call_for_paper/<?php echo $doc_file ?>"><?php echo $doc_file ?></a>
                        <input type="hidden" name="current_doc_file" value="<?php echo $doc_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="doc_file">New DOC File</label>
                        <input type="file" name="doc_file" id="doc_file" class="form-control">
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="edit_call_for_paper" value="Edit" class="btn btn-primary">
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