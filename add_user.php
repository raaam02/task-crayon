<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $mobile = mysqli_real_escape_string($conn, trim($_POST['mobile']));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));

    if (empty($name) || empty($email) || empty($mobile) || empty($gender)) {
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit;
    }

    $query_insert = "INSERT INTO user (name, email, mobile, gender) VALUES ('$name', '$email', '$mobile', '$gender')";
    $inserted = mysqli_query($conn, $query_insert);
    if ($inserted) {
        // header("location: add_experience.php");
        $user_id = mysqli_insert_id($conn);
        echo $user_id
        ;
    }
}
