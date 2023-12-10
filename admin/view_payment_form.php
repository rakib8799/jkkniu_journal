<?php include("admin_header.php") ?>
<?php include("../mail_sending.php") ?>

<?php
if (isset($_POST['update'])) {
    extract($_POST);
    $sql = "SELECT * FROM `payment_form`";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row["payment_status"] == "1") {
            $receiver = $row["email"];
            $subject = "Conference Joining Invitation";
            $body = '<p>Your payment form is successfully verified. You are invited to join our conference.. Thanks...</p>';
            $send_mail = send_mail($receiver, $subject, $body);
        }

        $update_sql = "UPDATE `payment_form` SET `payment_status`='$payment_status' WHERE id='$status_id'";
        $run_update_qry = mysqli_query($conn, $update_sql);
        if ($run_update_qry) {
            if ($payment_status == "1") {
                echo '<script>
                    alert("A Mail is sent to your email address");
                    window.location.href="view_payment_form.php";
              </script>';
            } else {
                echo '<script>
                        window.location.href="view_payment_form.php";
                  </script>';
            }
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
        }
    }
}
?>
<div class="container-fluid mt-5">
    <h3 class="text-center text-secondary fw-bold">All Payment Details</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <?php
                $select_from_new_paper = "SELECT * FROM `payment_form` ";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $serial_no = 1;
                $count = mysqli_num_rows($run_select_from_new_paper);
                $amount_in_tk = 0;
                $amount_in_dollar = 0;
                $total_in_tk = 0;
                $total_in_dollar = 0;
                ?>
                <p>Total Count: <?php echo $count ?></p>
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Track</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>Category</th>
                            <th>Amount To Pay</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Captcha</th>
                            <th>Payment Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $serial_no; ?></td>
                                    <td><?php echo $paper_id ?></td>
                                    <td><?php echo $paper_title ?></td>
                                    <td><?php echo $track ?></td>
                                    <td><?php echo $author_name ?></td>
                                    <td><?php echo $author_address ?></td>
                                    <td><?php echo $author_country ?></td>
                                    <td><?php echo $author_category ?></td>
                                    <td><?php
                                        if ($author_category == "Local Professional (author/co-author)") {
                                            $amount_in_tk = 1500;
                                            $total_in_tk += $amount_in_tk;
                                            echo "$amount_in_tk taka";
                                        } else if ($author_category == "International Professional (author/co-author)") {
                                            $amount_in_dollar = 30;
                                            $total_in_dollar += $amount_in_dollar;
                                            echo "$amount_in_dollar USD";
                                        } else if ($author_category == "Local Student (author/co-author)") {
                                            $amount_in_tk = 1000;
                                            $total_in_tk += $amount_in_tk;
                                            echo "$amount_in_tk taka";
                                        } else if ($author_category == "International Student (author/co-author)") {
                                            $amount_in_dollar = 15;
                                            $total_in_dollar += $amount_in_dollar;
                                            echo "$amount_in_dollar USD";
                                        } else if ($author_category == "Student from JKKNIU (author/co-author)") {
                                            $amount_in_tk = 500;
                                            $total_in_tk += $amount_in_tk;
                                            echo "$amount_in_tk taka";
                                        } else if ($author_category == "Local Professional outside JKKNIU as participant") {
                                            $amount_in_tk = 2000;
                                            $total_in_tk += $amount_in_tk;
                                            echo "$amount_in_tk taka";
                                        } else if ($author_category == "International Professional outside JKKNIU as participant") {
                                            $amount_in_dollar = 40;
                                            $total_in_dollar += $amount_in_dollar;
                                            echo "$amount_in_dollar USD";
                                        } else if ($author_category == "Local Student outside JKKNIU as participant") {
                                            $amount_in_tk = 1500;
                                            $total_in_tk += $amount_in_tk;
                                            echo "$amount_in_tk taka";
                                        } else if ($author_category == "International Student outside JKKNIU as participant") {
                                            $amount_in_dollar = 30;
                                            $total_in_dollar += $amount_in_dollar;
                                            echo "$amount_in_dollar USD";
                                        } else if ($author_category == "Professional from JKKNIU as participant") {
                                            $amount_in_tk = 1500;
                                            $total_in_tk += $amount_in_tk;
                                            echo "$amount_in_tk taka";
                                        } else if ($author_category == "Student from JKKNIU as participant") {
                                            $amount_in_tk = 500;
                                            $total_in_tk += $amount_in_tk;
                                            echo "$amount_in_tk taka";
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $phone_number ?></td>
                                    <td><a href="../Images/payment_form_images/<?php echo $payment_form_image ?>" target="_blank"><img src="../Images/payment_form_images/<?php echo $payment_form_image ?>" width='50px' height='50px'></a></td>
                                    <td><?php echo $captcha ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="status_id" value="<?php echo $id ?>">
                                            <select name="payment_status" id="payment_status" class="form-select" required>
                                                <option value="">Select an option</option>
                                                <option value="0" <?php if (isset($payment_status) && $payment_status === "0") {
                                                                        echo "selected";
                                                                    } ?>>Not Payed yet</option>
                                                <option value="1" <?php if (isset($payment_status) && $payment_status === "1") {
                                                                        echo "selected";
                                                                    } ?>>Payed
                                                </option>
                                            </select>
                                            <input type="submit" value="Update" name="update" class="btn btn-outline-primary mt-2">
                                        </form>
                                    </td>
                                    <td>
                                        <a href="edit_payment_form.php?payment_id=<?php echo $id ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="delete_payment_form.php?id=<?php echo $id ?>&&image=<?php echo $payment_form_image; ?>" class="btn btn-primary" onclick="return confirmSubmission()">Delete</a>
                                    </td>
                                </tr>
                        <?php
                                $serial_no++;
                            }
                        }
                        ?>
                        <p>Total Amount (Taka): <?php echo $total_in_tk ?>&#2547;</p>
                        <p>Total Amount (Dollar): <?php echo $total_in_dollar ?>$</p>
                    </tbody>
                </table>
            </div>
            <script>
                function confirmSubmission() {
                    return confirm("Are you sure you want to confirm your submission?");
                }
            </script>
        </div>
    </div>
</div>

<?php include("admin_footer.php") ?>