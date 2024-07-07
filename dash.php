<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/dash.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/dash.css" />
</head>

<body style="background-color: #0e0a2f">
    <main>
        <?php

        include 'conn.php';

        // Determine the total number of records for pagination
        $total_records_query = "SELECT COUNT(*) as total FROM user";
        $total_records_result = mysqli_query($conn, $total_records_query);
        $total_records_row = mysqli_fetch_assoc($total_records_result);
        $total_records = $total_records_row['total'];

        $records_per_page = 5;

        $total_pages = ceil($total_records / $records_per_page);

        $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

        // Starting record for the current page
        $offset = ($current_page - 1) * $records_per_page;

        ?>

        <?php

        $query_select = "SELECT u.*, count(e.id) AS total_company, SUM(e.years) as total_years, SUM(e.months) as total_months
        FROM user u 
        LEFT JOIN experiences e 
        ON u.id = e.user_id 
        GROUP BY e.user_id
        LIMIT $offset, $records_per_page";

        $result = mysqli_query($conn, $query_select);
        if (mysqli_num_rows($result) > 0) {

            echo "<div class='table-responsive'>
                    <table class='table table-striped table-hover table-borderless table-dark align-middle'>
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE NUMBER</th>
                                <th>TOTAL COMPANY SERVED</th>
                                <th>TOTAL EXP</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody class='table-group-divider'>";

            while ($row = mysqli_fetch_assoc($result)) {
                $totalMonth = $row['total_months'];
                $totalYear = $row['total_years'];

                if ($totalMonth >= 12) {
                    $totalYear += (int) ($totalMonth / 12);
                    $totalMonth = $totalMonth % 12;
                    ;
                }

                $total_company = $row['total_company'];
                if ($totalMonth == 0 && $totalYear == 0) {
                    $total_company = 0;
                }
                echo "
                <tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['mobile']}</td>
                <td>$total_company</td>
                <td>$totalYear years , $totalMonth months</td>
                <td>
                    <div>
                        <a class='btn btn-warning m-1 m-md-0 m-lg-0' href='edit_user.php?id={$row['id']}'>EDIT</a>

                        <button class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-userid='{$row['id']}' data-username='{$row['name']}'>DELETE</button>
                    </div>
                </td>
            </tr>
            ";
            }
        }

        ?>
        </tbody>
        </table>
        </div>

        <!-- Pagination links -->
        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                <?php
                if ($current_page > 1) {
                    echo "<li class='page-item'><a class='page-link shadow-none' href='?page=" . ($current_page - 1) . "'>Previous</a></li>";
                }

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $current_page) {
                        echo "<li class='page-item active'><a class='page-link shadow-none' href='?page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link shadow-none' href='?page=$i'>$i</a></li>";
                    }
                }

                if ($current_page < $total_pages) {
                    echo "<li class='page-item'><a class='page-link shadow-none' href='?page=" . ($current_page + 1) . "'>Next</a></li>";
                }
                ?>
            </ul>
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border border-0">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border border-0">
                        Are you sure you want to delete all data for <span class="text-danger" id="userName"></span>?
                    </div>
                    <div class="modal-footer border border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="" id="confirmDelete" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb5U5GO0l4x5SO5F5CIM5kF5a5osFS5Dfj8B5"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var userId = button.data('userid'); // Extract user ID from data-* attributes
                var userName = button.data('username'); // Extract user name from data-* attributes
                var confirmDelete = $('#confirmDelete'); // The delete confirmation button
                var userNameSpan = $('#userName'); // The span where user name will be displayed

                userNameSpan.text(userName); // Set the user name in the modal
                confirmDelete.attr('href', 'delete.php?id=' + userId); // Set the delete link with user ID
            });
        });
    </script>
</body>

</html>