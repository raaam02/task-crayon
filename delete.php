<?php

include "conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = mysqli_real_escape_string($conn, trim($_GET['id']));

    if (empty($id)) {
        exit;
    }

    $query_delete_user = "DELETE FROM user WHERE `id` = '$id'";
    if (mysqli_query($conn, $query_delete_user)) {
        header("Location: dash.php");
    }
}