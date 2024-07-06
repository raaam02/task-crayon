<?php
include 'conn.php';

if (isset($_GET['id']) && isset($_GET['user_id'])) {
    $experience_id = $_GET['id'];
    $user_id = $_GET['user_id'];

    $query = "DELETE FROM experiences WHERE id = $experience_id";
    if (mysqli_query($conn, $query)) {
        header("Location: edit_user.php?id=$user_id");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

