<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mobile = trim($_POST['phone']);

    $query_check_number = "SELECT * FROM user WHERE mobile='$mobile'";
    $result = mysqli_query($conn, $query_check_number);
    if (mysqli_num_rows($result) > 0) {
        echo 'exists';
    } else {
        echo 'not exists';
    }
}
