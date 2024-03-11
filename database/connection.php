<?php ob_start(); ?>
<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
$host = 'localhost';
// $username = 'asqpkina_journal_user';
$username = 'root';
// $password = 'journal';
$password = '';
// $database = 'asqpkina_journal';
$database = 'jkkniu_journal';
$conn = mysqli_connect($host, $username, $password);
mysqli_select_db($conn, $database);
mysqli_query($conn, 'SET CHARACTER SET utf8');
mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");
if (!$conn)
    echo mysqli_connect_error();
return $conn;
