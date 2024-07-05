<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $mobile = mysqli_real_escape_string($conn, trim($_POST['mobile']));
    $gender = mysqli_real_escape_string($conn, trim($_POST['gender']));
    $experience = $_POST['experience'];

    if (empty($name) || empty($email) || empty($mobile) || empty($gender)) {
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit;
    }

    // Add user detail into user table 
    $query_insert_user = "INSERT INTO user (name, email, mobile, gender) VALUES ('$name', '$email', '$mobile', '$gender')";
    if (mysqli_query($conn, $query_insert_user)) {

        $user_id = mysqli_insert_id($conn);

        // Add Experinces into experience table
        foreach ($experience as $exp) {
            $company = mysqli_real_escape_string($conn, $exp['company']);
            $years = mysqli_real_escape_string($conn, $exp['year']);
            $months = mysqli_real_escape_string($conn, $exp['months']);

            $query_insert_exp = "INSERT INTO experiences (user_id, company, years, months) VALUES ('$user_id', '$company', '$years', '$months');";
            if (mysqli_query($conn, $query_insert_exp)) {
                header("Location: dash.php");
            } else {
                echo "error: " . $query_insert_exp . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        echo "Error: " . $query_insert_user . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
