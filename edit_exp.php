<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $experience_id = $_GET['id'];
    $query = "SELECT * FROM experiences WHERE id = $experience_id";
    $result = mysqli_query($conn, $query);
    $experience = mysqli_fetch_assoc($result);
    $user_id = $experience['user_id'];
}

if (isset($_POST['update_experience'])) {
    $company = $_POST['company'];
    $years = $_POST['years'];
    $months = $_POST['months'];

    $query = "UPDATE experiences SET company = '$company', years = '$years', months = '$months' WHERE id = $experience_id";
    if (mysqli_query($conn, $query)) {
        header("Location: edit_user.php?id=$user_id");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Edit Experience</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h2>Edit Experience</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company"
                    value="<?php echo $experience['company']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="years" class="form-label">Years</label>
                <input type="number" class="form-control" id="years" name="years"
                    value="<?php echo $experience['years']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="months" class="form-label">Months</label>
                <input type="number" class="form-control" id="months" name="months"
                    value="<?php echo $experience['months']; ?>" required>
            </div>
            <button type="submit" name="update_experience" class="btn btn-primary">Update</button>
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