<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SUVS Voting</title>
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
    <style>
        td {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <script>
        setTimeout(function() {
            window.location.reload(1);
        }, 3000);
    </script>

</head>

<body>
    <!-- ======= Header ======= -->
    <?php
    include("../topbar.php");
    include("../menu.php");
    include("../connection.php");
    include("../access-denied.php");
    $info = "";

    $status = "Pending";

    ?>
    <main id="main">

        <section id="contact" class="contact">
            <?php
            $color_pike = 0;

            $number_of_voter = 0;

            $color = array("bg-primary", "bg-success", "bg-info", "bg-warning", "bg-secondary", "bg-light", "bg-light", "bg-light", "bg-light", "bg-light", "bg-danger");

            for ($x = 0; $x <= 10; $x++) {
                //echo "The number is: $color[$x] <br>";
            }

            $candidate_info = array();
            $candidate_voter = array();

            ?>

            <div class="container">
                <div style="margin-left: 10%;">
                    <div class="container">
                        <h2>Voting Status</h2>
                        <p>All information about the Election Day, to announce who the winner is, and to get other related information about the union.</p>
                        <br>
                        <?php

                        $sql = $conn->query("SELECT * FROM `applicent_candidate`");
                        if ($sql->num_rows > 0) {
                            while ($sql_row = $sql->fetch_assoc()) {
                                $cand_id = $sql_row['candidate_id'];

                                $rr = $conn->query("SELECT * FROM `voting` WHERE `Candidate_id`='$cand_id'");
                                $number_of_voter = $rr->num_rows;

                                $sql_check = $conn->query("SELECT * FROM `voting_result` WHERE `candidate_id`='$cand_id'");
                                if ($sql_check->num_rows > 0) {
                                    while ($sql_row_check = $sql_check->fetch_assoc()) {
                                        $conn->query("UPDATE `voting_result` SET `no_voter`='$number_of_voter' WHERE candidate_id='$cand_id'");
                                    }
                                } else {
                                    $conn->query("INSERT INTO `voting_result`(`candidate_id`, `no_voter`) VALUES ('$cand_id','$number_of_voter')");
                                }
                            }
                        }

                        $voting_result = $conn->query("SELECT * FROM `voting_result` ORDER BY `voting_result`.`no_voter` DESC");
                        $number_of_voter = $voting_result->num_rows > 0;

                        if ($voting_result->num_rows > 0) {
                            while ($voting_result_row = $voting_result->fetch_assoc()) {
                                $candidate_id = $voting_result_row['candidate_id'];

                                $student_result = $conn->query("SELECT * FROM `student` WHERE `stud_id`='$candidate_id'");
                                if ($student_result->num_rows > 0) {
                                    while ($student_row = $student_result->fetch_assoc()) {
                                        $image = $student_row['image'];
                                        $name_of_canidate = $student_row['fname'] . " " . $student_row['lname'];
                                    }
                                }

                                $rr = $conn->query("SELECT * FROM `voting` WHERE `Candidate_id`='$candidate_id'");
                                $number_of_voter = $rr->num_rows;

                        ?>
                                <div style="height: 70px; width: 75%;" class="card <?php print $color[$color_pike]; ?> text-dark row"> 
                                    <div class="col-md-3">
                                        <img src="http://localhost/suv/assets/img/voter/<?php print $image; ?>" width="25%" style="border-radius: 50%; margin-top: 5%; margin-left: 25%;" height="50px" alt="">
                                    </div>
                                    <div class="col-md-9" style="margin-top: 5px;">
                                        <table>
                                            <tr>
                                                <td> Name &nbsp;: </td>
                                                <td><?php print $name_of_canidate; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>Sound :</td>
                                                <td><?php print $number_of_voter; ?> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <br>
                        <?php
                                $color_pike++;
                            }
                        }
                        ?>
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