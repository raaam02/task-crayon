<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="bg-dark">
    <main>

        <?php

        include 'conn.php';

        $query_select = "SELECT u.*, count(e.id) AS total_company, SUM(e.years) as total_years, SUM(e.months) as total_months
        FROM user u 
        LEFT JOIN experiences e 
        ON u.id = e.user_id 
        GROUP BY e.user_id";

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
                        <a class='btn btn-warning' href='edit.php?id={$row['id']}'>EDIT</a>
                        <a class='btn btn-danger' href='delete.php?id={$row['id']}'>DELETE</a>
                    </div>
                </td>
            </tr>
            ";
            }
            echo "
                    </tbody>
                </table>
            </div>
            ";
        }

        ?>

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