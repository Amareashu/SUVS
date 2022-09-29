<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SUV</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
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
    
    $x = 1;
    $ap_date = "SELECT * FROM `application-day`";

    $app_result = $conn->query($ap_date);
    if ($app_result->num_rows > 0) {
        while ($app_row = $app_result->fetch_assoc()) {
            $start_date = $app_row['start_date'];
            $end_date = $app_row['end_date'];

            $x++;
        }
    }
    ?>
    <main id="main">

        <section id="contact" class="contact">
            <div class="container">
                <div style="margin-left: 10%;">
                    <h3>Application Submitting Date:</h3>
                </div>
<hr>
                <div class="row">

                    <div class="col-lg-10 d-flex align-items-stretch" style="margin-left: 10%;">

                        <div class="info">

                            <div class="col-lg-8">
                                <h4>Start Date:</h4>
                                <p><?php print $start_date; ?></p>
                            </div>
                            <hr>
                            <div class="col-lg-6">
                                <h4>End Date:</h4>
                                <p><?php print $end_date; ?></p>
                            </div>
                            <hr>
                        </div>

                        <div class="bg-success" style="width: 50%;">

                        </div>
                    </div>

                </div>

            </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
<br><br><br>
    <?php
    include("..//footer.php");
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