<?php
include 'conn.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

if (isset($_POST['add_experience'])) {
    $company_name = $_POST['company'];
    $years = $_POST['years'];
    $months = $_POST['months'];

    $query = "INSERT INTO experiences (user_id, company, years, months) VALUES ('$user_id', '$company_name', '$years', '$months')";
    if (mysqli_query($conn, $query)) {
        header("Location: edit_user.php?id=$user_id");
    } else {
        echo "Error adding record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Add Experience</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h2>Add Experience</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company" required>
            </div>
            <div class="mb-3">
                <label for="years" class="form-label">Years</label>
                <input type="number" class="form-control" id="years" name="years" required>
            </div>
            <div class="mb-3">
                <label for="months" class="form-label">Months</label>
                <input type="number" class="form-control" id="months" name="months" required>
            </div>
            <button type="submit" name="add_experience" class="btn btn-primary">Add</button>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>