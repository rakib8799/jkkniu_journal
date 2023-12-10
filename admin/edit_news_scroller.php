<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_news_scroller'])) {
    extract($_POST);

    $timestamps = date("Y-m-d h:i:s", time());

    $update_sql = "UPDATE `news_scroller` SET `title`='$title',`details`='$long_desc',`created_at`='$timestamps' WHERE id='$id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_news_scroller.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
    }
}
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_from_new_paper = "SELECT * FROM news_scroller WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">Edit News Scroller Details</h2>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="long_desc">Details</label>
                        <textarea name="long_desc" id="long_desc"><?php echo $details ?></textarea>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_news_scroller" value="Edit" class="btn btn-primary">
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