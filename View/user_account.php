<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SUVS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="../assets/img/favicon.jpg" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
    <?php
    include("../topbar.php");
    include("../menu.php");
    include("..//connection.php");
    include("../access-denied.php");
    ?>
    <main id="main">

        <!-- ======= Voter Section ======= -->
        <section class="team section-bg">
            <div class="container">
                <h3>Student Union Member</h3>
                <p>All Member are the member of bahir dar unvirsty, bahir dar institute of technology
                </p>
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            $num_per_page = 5;
                            $start_from = ($page - 1) * 5;

                            $x = 0;

                            $member_sql = "SELECT * FROM `account` limit $start_from, $num_per_page";
                            $member_result = $conn->query($member_sql);
                            if ($member_result->num_rows > 0) {
                                while ($member_row = $member_result->fetch_assoc()) {

                                    $stud_id = $member_row['user_id'];
                                    $username = $member_row['username'];
                                    $password = $member_row['password'];
                                    $role = $member_row['role'];

                                    $x++;
                            ?>
                                    <tr>
                                        <td><?php print $x; ?></td>
                                        <td><?php print $stud_id; ?></td>
                                        <td><?php print $username; ?></td>
                                        <td><?php print base64_decode($password); ?></td>
                                        <td><?php print $role; ?></td>
                                        <td>
                                            <a href="" title="block"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }


                            ?>
                            <tr style="text-align: center;">
                                <td colspan="10">

                                    <?php

                                    $pr_query = "SELECT * FROM `account`";

                                    $pr_result = $conn->query($pr_query);

                                    $total_record = $pr_result->num_rows;

                                    $total_page = ceil($total_record / $num_per_page);

                                    if ($page > 1) {
                                        echo "<a href='http://localhost/suv/view/user_account.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous </a>";
                                    }

                                    for ($i = 1; $i < $total_page; $i++) {
                                        echo "<a href='http://localhost/suv/view/user_account.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
                                    }

                                    if ($i > $page) {
                                        echo "<a href='http://localhost/suv/view/user_account.php?page=" . ($page + 1) . "' class='btn btn-danger'> Next</a>";
                                    }

                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </section><!-- End Candidate Section -->

    </main><!-- End #main -->

    <?php
    include("../footer.php");
    ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- SVS Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>