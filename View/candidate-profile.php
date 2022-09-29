<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SUVS Candidate's Profile</title>
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
    include("../connection.php");
    $info = "";
    $candidate_id = $_GET['candidate_id'];

    $x = 1;
    $student_sql = "SELECT * FROM `student` WHERE stud_id='$candidate_id'";
    $student_result = $conn->query($student_sql);
    if ($student_result->num_rows > 0) {
        while ($student_row = $student_result->fetch_assoc()) {
            //`stud_id`, `fname`, `lname`, `gender`, `department`, `cgpa`, `year`, `image`
            $stud_id = $student_row['stud_id'];
            $name = $student_row['fname'] . " " . $student_row['lname'];
            $lname = $student_row['lname'];
            $gender = $student_row['gender'];
            $department = $student_row['department'];
            $cgpa = $student_row['cgpa'];
            $year = $student_row['year'];
            $image = $student_row['image'];
            $phone = $student_row['phone'];
            $discipline = $student_row['discipline'];
            $email = $student_row['email'];
            $status = $student_row['status'];
            //$status = "Pending";

            $x++;
        }
    }

   

    ?>
    <main id="main">

        <section id="contact" class="contact">
            <div class="container">
                <div style="margin-left: 10%;">
                    <h3>Candidate's Profile</h3>
                </div>
                <div class="row">

                    <div class="col-lg-10 d-flex align-items-stretch" style="margin-left: 5%;">

                        <div class="info">
                            <div>
                                <a href="http://localhost/suv/candidate.php" style="color: whitesmoke;">
                                    <b><i class="bi bi-arrow-left" title="Back"></i></b>
                                </a>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4><img style="width: 70px; border-radius: 10%;" src="../assets/img/voter/<?php print $image; ?>" alt=""> </h4>
                                    <h4>Name:</h4>
                                    <p><?php print $name; ?></p>
                                    <h4>Phon Number:</h4>
                                    <p><?php print $phone; ?></p>
                                    <h4>Year:</h4>
                                    <p><?php print $year; ?></p>
                                </div>

                                <div class="col-lg-6">

                                    <h4>Department:</h4>
                                    <p><?php print $department; ?></p>
                                    <h4>GPA:</h4>
                                    <p><?php print $cgpa; ?></p>
                                    <h4>Discipline case:</h4>
                                    <p><?php print $discipline; ?></p>
                                    <h4>Status:</h4>
                                    <p><?php print $status; ?></p>
                                </div>

                            </div>
                            <div class="row text-center text-dark">
                                <div class="col-lg-6 bg-success">
                                    <a href="http://localhost/suv/process/approve-candidate.php?action=Approve&candidate_id=<?PHP print $candidate_id?>" style="color: whitesmoke;">Approve</a>
                                </div>
                                <div class="col-lg-6 bg-danger">
                                    <a href="http://localhost/suv/process/approve-candidate.php/?action=Reject&candidate_id=<?PHP print $candidate_id?>" style="color: whitesmoke;">Reject</a>
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