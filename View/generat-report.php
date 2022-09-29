<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SUVS generate report</title>
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

    <script>
        function printDiv() {
            var divContents = document.getElementById("print_area").innerHTML;
            var a = window.open('', '', 'height=600, width=800');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>

</head>

<body>
    <!-- ======= Header ======= -->
    <?php
    include("../topbar.php");
    include("../menu.php");
    include("../connection.php");
    
    $info = "";

    $election = $conn->query("SELECT * FROM `election-day`");
    if ($election->num_rows > 0) {
        while ($election_row = $election->fetch_assoc()) {
            $election_day = $election_row['date'];
        }
    }

    $date = date("Y-m-d");
    if ($election_day < $date) {
        $sql_winer = $conn->query("SELECT * FROM `voting_result` ORDER BY `voting_result`.`no_voter` DESC limit 1");
        if ($sql_winer->num_rows > 0) {
            while ($sql_row_winer = $sql_winer->fetch_assoc()) {
                $candidate_id = $sql_row_winer['candidate_id'];
                $student_result = $conn->query("SELECT * FROM `student` WHERE `stud_id`='$candidate_id'");
                if ($student_result->num_rows > 0) {
                    while ($student_row = $student_result->fetch_assoc()) {
                        $image = $student_row['image'];
                        $status =  $student_row['fname'] . " " . $student_row['lname'];
                    }
                }
            }
        }
    } else {
        $status = "Pending";
    }



    ?>
    <main id="main">

        <section id="contact" class="contact">
            <div class="container" id="print_area">
                <div style="margin-left: 16%;">
                    <h5>Generating Report</h5>
                    <p>All information about the Election Day, to announce who the winner is, and to get other related information about the union.</p>
                </div>
                <div class="row">

                    <div class="col-lg-8 d-flex align-items-stretch" style="margin-left: 15%;">

                        <div class="info">

                            <div class="table-responsive-sm">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <h5>Who is The Winer</h5>
                                        </td>
                                        <td><?php print $status ?></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5>Election Day</h5>
                                        </td>
                                        <td><?php print date('Y-m-d') ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Number of Requseted Candidate</h5>
                                        </td>
                                        <td><?php print $conn->query("SELECT * FROM `applicent_candidate`")->num_rows; ?></td>
                                    </tr>
                                    <tr>

                                    <tr>
                                        <td>
                                            <h5>Number of Approved Candidate</h5>
                                        </td>
                                        <td><?php print $conn->query("SELECT * FROM `applicent_candidate` WHERE `status`='Approve'")->num_rows; ?></td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>
                                            <h5>Number of Rejected Candidate</h5>
                                        </td>
                                        <td><?php print $conn->query("SELECT * FROM `applicent_candidate` WHERE `status`='Reject' ")->num_rows; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h5>Number of Voter</h5>
                                        </td>
                                        <td><?php print $conn->query("SELECT * FROM `student`")->num_rows; ?></td>
                                    </tr>

                                </table>
                            </div>

                            <div class="row text-center text-dark" style="text-align: right;">
                                <div class="col-lg-12 bg-success">
                                    <button class="btn btn-success" onclick="printDiv()">Print</button> 
                                </div>
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