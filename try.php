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

</head>

<body>
  <!-- ======= Header ======= -->
  <?php
  include("../topbar.php");
  include("../menu.php");
  include("../connection.php");
  $info = "";

  $status = "Pending";

  ?>
  <main id="main">

    <section id="contact" class="contact">
      <?php
      $color_pike = 1;
      $number_of_voter = 0;
      $color = array("bg-primary", "bg-success", "bg-info", "bg-warning", "bg-danger", "bg-secondary", "bg-light", "bg-light", "bg-light", "bg-light", "bg-light");

      for ($x = 0; $x <= 10; $x++) {
        //echo "The number is: $color[$x] <br>";
      }


      $image = "fana.jpg";
      ?>

      <div class="container">
        <div style="margin-left: 10%;">
          <div class="container">
            <h2>Voting Status</h2>
            <p>All information about the Election Day, to announce who the winner is, and to get other related information about the union.</p>
            <br>
            <?php
            $voting_result = $conn->query("SELECT DISTINCT Candidate_id FROM `voting`");
            $number_of_voter = $voting_result->num_rows > 0;
            if ($voting_result->num_rows > 0) {
              while ($voting_result_row = $voting_result->fetch_assoc()) {
                $candidate_id = $voting_result_row['Candidate_id'];

                $student_result = $conn->query("SELECT * FROM `student` WHERE `stud_id`='$candidate_id'");
                if ($student_result->num_rows > 0) {
                  while ($student_row = $student_result->fetch_assoc()) {
                    $image = $student_row['image'];
                    $name_of_canidate = $student_row['fname'] . " " . $student_row['lname'];
                  }
                }
            ?>
                <div style="height: 70px; width: 75%;" class="card <?php print $color[$color_pike]; ?> text-dark row">
                  <div class="col-md-3">
                    <img src="http://localhost/suv/assets/img/voter/<?php print $image; ?>" width="25%" style="border-radius: 50%; margin-top: 2%; margin-left: 25%;" height="50px" alt="">
                  </div>
                  <div class="col-md-9" style="margin-top: 5px;">
                    <b style="font-size: 20px;"> <?php print $name_of_canidate; ?> </b> <br>
                    <b style="font-size: 20px;"><?php print $number_of_voter; ?> </b>
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