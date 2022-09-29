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

    $student_sql = "SELECT * FROM `student`  WHERE`status`='not_allowed'";
    $student_result = $conn->query($student_sql);
    if ($student_result->num_rows > 0) {
    ?>
        <main id="main">

            <!-- ======= Voter Section ======= -->
            <section class="team section-bg">
                <div class="container">
                    <h3>BDU Studnet</h3> 
                    <p>All Studnets are the the member of bahir dar unvirsty, bahir dar institute of technology
                    </p>
                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Gender</th>
                                    <th>Department</th>
                                    <th>Year</th>
                                    <th>CGPA</th>
                                    <th>image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                        } else { ?>
                                <section class="team section-bg">
                                    <div class="container">
                                        <h3>Empity List</h3>
                                        <p>All Studnet Information send to Student Voting System, Bahir dar Institute of Technology
                                        </p>
                                    </div>
                                </section>
                                <?php
                            }
                            $x = 0;
                            $student_sql = "SELECT * FROM `student`  WHERE`status`='not_allowed'";
                            $student_result = $conn->query($student_sql);
                            if ($student_result->num_rows > 0) {
                                while ($student_row = $student_result->fetch_assoc()) {
                                    //`stud_id`, `fname`, `lname`, `gender`, `department`, `cgpa`, `year`, `image`
                                    $stud_id = $student_row['stud_id'];
                                    $fname = $student_row['fname'];
                                    $lname = $student_row['lname'];
                                    $gender = $student_row['gender'];
                                    $department = $student_row['department'];
                                    $cgpa = $student_row['cgpa'];
                                    $year = $student_row['year'];
                                    $image = $student_row['image'];

                                    $x++;
                                ?>
                                    <tr>
                                        <td><?php print $x; ?></td>
                                        <td><?php print $stud_id; ?></td>
                                        <td><?php print $fname; ?></td>
                                        <td><?php print $lname; ?></td>
                                        <td><?php print $gender; ?></td>
                                        <td><?php print $department; ?></td>
                                        <td><?php print $cgpa; ?></td>
                                        <td><?php print $year; ?></td>

                                        <td><img style="width: 30px; border-radius: 50%;" src="../assets/img/voter/<?php print $image; ?>" alt=""></td>
                                        <td>
                                            <a href="http://localhost/suv/update/update-stud-status.php?stud_id=<?PHP print $stud_id ?>" title="Send"><i class="bi bi-box-arrow-right">send</i></a> <br>
                                            <a href="http://localhost/suv/update/update-stud-status.php?stud_id=all" title="Send"><i class="bi bi-box-arrow-right">send all</i></a>
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