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

            echo "<div class='table-responsive bg-dark'>
                    <table class='table table-striped table-hover table-borderless table-dark align-middle border'>
                        <thead class='table-dark'>
                            <tr class='table-dark'>
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
                <tr class='table-dark'>
                <td scope='row'>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['mobile']}</td>
                <td class='ps-5'>$total_company</td>
                <td>$totalYear years , $totalMonth months</td>
                <td>
                    <div>
                        <a class='btn btn-warning' href='edit_user.php?id={$row['id']}'>EDIT</a>
                        <a class='btn btn-danger' href='delete.php?id={$row['id']}'>DELETE</a>
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
        <nav>
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