<!doctype html>
<html lang="en">

<head>
    <title>Add User</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <main>
        <div class="container d-flex align-item-center justify-content-center">
            <div class="w-100 form-box border p-2 p-md-5 my-5 rounded d-flex flex-column align-item-center justify-content-center"
                style="max-width: 500px;">
                <h2 class="text-center m-3">Add New User</h2>
                <div>
                    <form action="add_user.php" method="post" id="userForm">
                        <div class="mb-3">
                            <label for="" class="form-label">Name*</label>
                            <input type="text" class="form-control shadow-none" name="name" id=""
                                aria-describedby="helpId" placeholder="name" required />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email*</label>
                            <input type="email" class="form-control shadow-none" name="email" id=""
                                aria-describedby="emailHelpId" placeholder="abc@mail.com" required />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Number*</label>
                            <input type="tel" class="form-control shadow-none" name="mobile" id=""
                                aria-describedby="helpId" placeholder="9876543210" required />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gender*</label>
                            <select class="form-select form-select-lg shadow-none" name="gender" id="">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="my-3 mt-4">
                            <button type="submit" class="btn submit-btn w-100">
                                Submit
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <script src="assets/script.js"></script>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>