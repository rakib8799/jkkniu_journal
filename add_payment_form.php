<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>
<?php include_once('mail_sending.php') ?>
<?php include_once("admin/functions/countryList.php") ?>

<?php
if (isset($_POST['add_payment_form'])) {
    $matched = 0;
    if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
        if (strcmp($_SESSION['captcha'], $_POST['captcha']) != 0) {
            $status = "<p class='text-danger text-bold text-center fs-5 mt-3'>
         Entered captcha code does not match! 
         Kindly try again.</p>";
            $matched = 0;
        } else {
            $status = "<p class='text-success text-bold text-center fs-5 mt-3'>Your captcha code is matched.</p>";
            $matched = 1;
        }

        if ($matched === 1) {
            extract($_POST);
            if (isset($_FILES['image']['name'])) {
                $payment_form_image_name = $_FILES['image']['name'];
                $payment_form_image_tmp_name = $_FILES['image']['tmp_name'];
                $path_info = strtolower(pathinfo($payment_form_image_name, PATHINFO_EXTENSION));

                $payment_form_image_name = uniqid() . ".$path_info";
                $manuscript_pdf_file_type = $_FILES['image']['type'];

                $arr = array("jpg", "png", "jpeg");
                if (!in_array($path_info, $arr)) {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must of type jpg, jpeg or png</p>";
                } else {
                    $insert_sql = "INSERT INTO payment_form 
                                    (paper_id,paper_title,track,author_name,author_address,author_country,author_category,email,phone_number,payment_form_image,captcha,created_at) 
                                    VALUES
                                    ('$paper_id','$paper_title','$track','$author_name','$author_address','$author_country','$author_category','$author_email','$phone','$payment_form_image_name','$captcha','$timestamps')";
                    $run_insert_qry = mysqli_query($conn, $insert_sql);

                    if ($run_insert_qry) {
                        move_uploaded_file($payment_form_image_tmp_name, 'Images/payment_form_images/' . $payment_form_image_name);

                        $receiver = $author_email;

                        $subject = "Payment Form Submission";
                        $body = '<p>Your payment form is successfully submitted. You will get confirmation mail when our admin will approve your payment status.</p>';
                        $send_mail = send_mail($receiver, $subject, $body);

                        echo '<script>
                                        alert("A Mail is sent to your email address");
                                        </script>';
                        echo "<p class='text-success text-bold text-center fs-5 mt-3'>Form is successfully submitted</p>";
                    } else {
                        die($run_insert_qry);
                        echo $run_insert_qry;
                        echo '<pre>' . $_POST . '</pre>';
                        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
                    }
                }
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image is not found</p>";
            }
        } else {
            echo $status;
        }
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-6 col-12">
        <h2 class="text-capitalize text-center">Add Payment Form</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="card shadow px-5 py-3">
                    <div class="mt-3">
                        <label for="paper_id"><b>Paper ID <span class="text-danger">* (If you are a participant, write "Participant" as paper id)</span></b></label>
                        <input type="text" name="paper_id" id="paper_id" class="form-control" placeholder="Please Type Your Paper ID" required>
                    </div>
                    <div class="mt-3">
                        <label for="paper_title"><b>Paper Title <span class="text-danger">* (If you are a participant, write "Participant" as paper title)</span></b></label>
                        <input type="text" name="paper_title" id="paper_title" class="form-control" placeholder="Please Type Your Paper Title" required>
                    </div>
                    <div class="mt-3">
                        <label for="track"><b>Track <span class="text-danger">*</span></b></label>
                        <select class="form-select" name="track" id="track" required>
                            <option value="">Please select a track</option>
                            <option value="Arts">Arts</option>
                            <option value="Fine Arts">Fine Arts</option>
                            <option value="Social Sciences">Social Sciences</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="author_name"><b>Author Name: <span class="text-danger">*</span></b></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="author_name" id="author_name" placeholder="Please Type Your Name" required>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="author_address"><b>Author Address: <span class="text-danger">*</span></b></label>
                        <textarea class="form-control" name="author_address" id="author_address" cols="30" rows="5" placeholder="Please Type Your Address" required></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="author_country"><b>Author Country: <span class="text-danger">*</span></b></label>
                        <select class="form-select" id="author_country" name="author_country" required>
                            <option>Select a Country</option>
                            <?php
                            foreach ($country_list as $country) {
                            ?>
                                <option value="<?php echo $country['name']; ?>"><?php echo $country['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="author_category"><b>Author Category <span class="text-danger">*</span></b></label>
                        <select name="author_category" id="author_category" class="form-select">
                            <option value="">Please Select an option</option>
                            <!-- <option value="Student(Visitor)">Student(Visitor) - 1500 taka</option>
                            <option value="Professional(Visitor)">Professional(Visitor) - 3000 taka</option> -->
                            <option value="Local Professional (author/co-author)">Local Professional (author/co-author) - 1500 taka</option>
                            <option value="International Professional (author/co-author)">International Professional (author/co-author) - 30 USD</option>
                            <option value="Local Student (author/co-author)">Local Student (author/co-author) - 1000 taka</option>
                            <option value="International Student (author/co-author)">International Student (author/co-author) - 15 USD</option>
                            <option value="Student from JKKNIU (author/co-author)">Student from JKKNIU (author/co-author) - 500 taka</option>
                            <option value="Local Professional outside JKKNIU as participant">Local Professional outside JKKNIU as participant - 2000 taka</option>
                            <option value="International Professional outside JKKNIU as participant">International Professional outside JKKNIU as participant - 40 USD</option>
                            <option value="Local Student outside JKKNIU as participant">Local Student outside JKKNIU as participant - 1500 taka</option>
                            <option value="International Student outside JKKNIU as participant">International Student outside JKKNIU as participant - 30 USD</option>
                            <option value="Professional from JKKNIU as participant">Professional from JKKNIU as participant - 1500 taka</option>
                            <option value="Student from JKKNIU as participant">Student from JKKNIU as participant - 500 taka</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="image"><b>Payment Receipt Image <span class="text-danger">*</span></b></label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="author_email"><b>Email Address <span class="text-danger">*</span></b></label>
                        <input type="email" name="author_email" id="author_email" class="form-control" placeholder="Please Type Your Email Address" required>
                    </div>
                    <div class="mt-3">
                        <label for="phone"><b>Mobile Number <span class="text-danger">*</span></b></label>
                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Please Type Your Phone Number" required>
                    </div>
                    <div class="mt-3">
                        <label for="captcha"><b>Enter Captcha <span class="text-danger">*</span></b></label><br />
                        <input type="text" class="form-control" name="captcha" id="captcha" placeholder="Captcha Code From Below Image" required />
                        <p class="mt-1">
                            <img src="captcha.php?rand=<?php echo rand(); ?>" id="captcha_image" />
                        </p>
                        <p>Can't read the image?
                            <a href='javascript: refreshCaptcha();'>click here</a>
                            to refresh
                        </p>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="add_payment_form" value="Add" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
        <script>
            function refreshCaptcha() {
                let img = document.images['captcha_image'];
                img.src = img.src.substring(
                    0, img.src.lastIndexOf("?")
                ) + "?rand=" + Math.random() * 1000;
            }
        </script>
    </div>
</div>

<?php include("footer.php") ?>