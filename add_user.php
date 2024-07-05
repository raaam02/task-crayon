<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $mobile = $conn->real_escape_string(trim($_POST['mobile']));
    $gender = $conn->real_escape_string(trim($_POST['gender']));

    if (empty($name) || empty($email) || empty($mobile) || empty($gender)) {
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit;
    }


    $query_check_number = "SELECT * FROM user WHERE mobile='$mobile'";
    $result = mysqli_query($conn, $query_check_number);
    if (mysqli_num_rows($result) > 0) {
        echo "<span class='text-center text-danger' style='font-weight:600'>
                        Number already exists 
                        ";
        exit;
    }

    $query_insert = "INSERT INTO user (name, email, mobile, gender) VALUES ('$name', '$email', '$mobile', '$gender')";
    $inserted = mysqli_query($conn, $query_insert);
    if ($inserted) {
        header("location: add_experience.php");
        ;
    }
}
