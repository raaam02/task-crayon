<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    $exp_query = "SELECT * FROM experiences WHERE user_id = $user_id";
    $exp_result = mysqli_query($conn, $exp_query);
}

if (isset($_POST['update_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $query = "UPDATE user SET name = '$name', email = '$email', mobile = '$mobile' WHERE id = $user_id";
    if (mysqli_query($conn, $query)) {
        header("Location: dash.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Edit User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>"
                    required>
            </div>
            <button type="submit" name="update_user" class="btn btn-primary">Update</button>
        </form>

        <h2 class="mt-5">Experiences</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Years</th>
                    <th>Months</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($experience = mysqli_fetch_assoc($exp_result)) { ?>
                    <tr>
                        <td><?php echo $experience['company']; ?></td>
                        <td><?php echo $experience['years']; ?></td>
                        <td><?php echo $experience['months']; ?></td>
                        <td>
                            <a class="btn btn-warning" href="edit_exp.php?id=<?php echo $experience['id']; ?>">Edit</a>
                            <a class="btn btn-danger"
                                href="delete_exp.php?id=<?php echo $experience['id']; ?>&user_id=<?php echo $user_id; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a class="btn btn-success mt-3" href="add_exp.php?user_id=<?php echo $user_id; ?>">Add New Experience</a>
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