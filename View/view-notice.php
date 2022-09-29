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
    ?>
    <main id="main">

        <!-- ======= Voter Section ======= -->
        <section class="team section-bg">
            <div class="container">
                <h3> All notice</h3>
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Subect</th>
                                <th>Mesage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $x = 0;
                            $notice_sql = "SELECT * FROM `notice` ORDER BY `date` DESC";
                            $notice_result = $conn->query($notice_sql);
                            if ($notice_result->num_rows > 0) {
                                while ($notice_row = $notice_result->fetch_assoc()) {
                                    $id = $notice_row['id'];
                                    $date = $notice_row['date'];
                                    $subject = $notice_row['subject'];
                                    $message = $notice_row['message'];

                                    $x++;
                            ?>
                                    <tr>
                                        <td><?php print $x; ?></td>
                                        <td><?php print $date; ?></td>
                                        <td><?php print $subject; ?></td>
                                        <td><?php print $message; ?></td>
                                        <td>
                                            <a href="http://localhost/suv/update/update-notice.php?m_id=<?PHP print $id ?>" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="http://localhost/suv/remove/remove-notice.php?m_id=<?PHP print $id ?>" title="Remove"><i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

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