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

    $user_id = $_SESSION['user_id'];

    $x = 1;
    $info = "";
    $voter_sql = "SELECT * FROM `student` WHERE `stud_id`='$user_id'";

    $voter_result = $conn->query($voter_sql);
    if ($voter_result->num_rows > 0) {
        while ($voter_row = $voter_result->fetch_assoc()) {
            //`stud_id`, `fname`, `lname`, `gender`, `department`, `cgpa`, `year`, `image`
            $stud_id = $voter_row['stud_id'];
            $fname = $voter_row['fname'];
            $lname = $voter_row['lname'];
            $gender = $voter_row['gender'];
            $department = $voter_row['department'];
            $cgpa = $voter_row['cgpa'];
            $year = $voter_row['year'];
            $image = $voter_row['image'];

            $x++;
        }
    }

    $name = $fname . " " . $lname;
    $email = "candidate@gmail.com";
    $department = $department;
    $gpa = $cgpa;
    $gender = $gender;
    $year = $year;
    $phone = $department;
    $discipline = "free from any way";
    $status = $department;
    //print $gpa;

    if (isset($_POST['applay'])) {
        if ($gpa >= 3.00) {
            $post_sql = "INSERT INTO  `applicent_candidate`(`candidate_id`)VALUES ('$user_id')";
            if ($conn->query($post_sql)) {
                $info =  "<div class='alert alert-success col-lg-8 text-center' style='margin-left: 10%;'>
            <strong>Successful !</strong> Your Application is Successfuly Send!!
        </div>";
            }
        } else {
            $info =  "<div class='alert alert-danger col-lg-8 text-center' style='margin-left: 10%;'>
            <strong>Warning !</strong> Your CGPA must be greater than or equal 3.00!!
        </div>";
        }
    }
    ?>
    <main id="main">

        <section id="contact" class="contact">
            <div class="container">
                <div style="margin-left: 10%;">
                    <h3>Your Profile</h3>
                </div>

                <div class="row">

                    <div class="col-lg-10 d-flex align-items-stretch" style="margin-left: 10%;">

                        <div class="info">
                            <?php
                            print $info;
                            ?>
                            <div>
                                <a href="http://localhost/suv/index.php" style="color: whitesmoke;">
                                    <b><i class="bi bi-arrow-left" title="Back"></i></b>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Name:</h4>
                                    <p><?php print $name; ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>Department:</h4>
                                    <p><?php print $department; ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>Gender:</h4>
                                    <p><?php print $gender; ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>GPA:</h4>
                                    <p><?php print $gpa; ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>Phon Number:</h4>
                                    <p><?php print $phone; ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>Year:</h4>
                                    <p><?php print $year; ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>Discipline case:</h4>
                                    <p><?php print $discipline; ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <h4>Status:</h4>
                                    <p><?php print $status; ?></p>
                                </div>

                            </div>
                            <div class="row text-center text-dark">
                                <div class="col-lg-12 bg-success" style="margin-right: 0%;">

                                    <?php
                                    $sql = $conn->query("SELECT * FROM `applicent_candidate`WHERE `candidate_id`='$user_id'");
                                    $user = $sql->num_rows;
                                    if ($sql->num_rows > 0) {
                                        while ($row_sql = $sql->fetch_assoc()) {
                                        }
                                    }
                                    if ($user > 0) {
                                    ?>
                                        <a href="http://localhost/suv/index.php" style="color: whitesmoke; margin-right: 0%;">
                                            <b><i class="bi bi-arrow-left" title="Back"></i></b>
                                        </a>
                                        <?php
                                    } else {
                                        $ap_date = "SELECT * FROM `application-day`";

                                        $app_result = $conn->query($ap_date);
                                        if ($app_result->num_rows > 0) {
                                            while ($app_row = $app_result->fetch_assoc()) {
                                                $start_date = $app_row['start_date'];
                                                $end_date = $app_row['end_date'];

                                                $x++;
                                            }
                                        }
                                        $date = date("Y-m-d");

                                        if ($start_date > $date || $end_date < $date) {
                                            print " <h3>Application send is not allowed !!</h3>";
                                        } else {
                                        ?>
                                            <form action="" method="POST">
                                                <button type="submit" name="applay" class="btn btn-success">Applay </button>
                                            </form>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div>

                            <div class="bg-success" style="width: 50%;">

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

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