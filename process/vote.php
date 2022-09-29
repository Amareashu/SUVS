<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SUVS vote</title>
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

  $log_id = $_SESSION['user_id'];
  $voter_status_sql = "SELECT * FROM `voting` WHERE `voter_id`='$log_id'";
  $voter_status_result = $conn->query($voter_status_sql);
  if ($voter_status_result->num_rows > 0) {
    while ($voter_status_row = $voter_status_result->fetch_assoc()) {
      if ($voter_status_row['trial'] == 1) {
        $vote_status = "NB: Already you are vot ! You have remain one trial !";
      } else {
        $vote_status = "NB: Already you are vot !";
      }
    }
  } else {
    $vote_status = "NB: You are not vote ! You have two trials !";
  }

  $election = $conn->query("SELECT * FROM `election-day`");
  if ($election->num_rows > 0) {
    while ($election_row = $election->fetch_assoc()) {
      $election_day = $election_row['date'];
    }
  }

  ?>
  <main id="main">

    <!-- ======= Voter Section ======= -->
    <section class="team section-bg">
      <div class="container">
        <h3>Vote Your Best Candidate</h3>
        <p>All Candidate are the the member of bahir dar unvirsty, bahir dar institute of technology
        </p>
        <p class="text-primary"><u><?php print $vote_status; ?></u></p>
        <div class="table-responsive-sm">
          <?php
          $date = date("Y-m-d");
          if ($election_day == $date) {
          ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Follower</th>
                  <th>Number of Post</th>
                  <th>image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

              <tbody>

                <?php
                $x = 0;
                $applicent_candidate_sql = "SELECT * FROM `applicent_candidate` WHERE `status`='Approve'";
                $applicent_candidate_result = $conn->query($applicent_candidate_sql);
                if ($applicent_candidate_result->num_rows > 0) {
                  while ($applicent_candidate_row = $applicent_candidate_result->fetch_assoc()) {
                    $candidate_id = $applicent_candidate_row['candidate_id'];
                    $status = $applicent_candidate_row['status'];

                    $student_sql = "SELECT * FROM `student` WHERE `stud_id`='$candidate_id'";
                    $student_result = $conn->query($student_sql);
                    if ($student_result->num_rows > 0) {
                      while ($student_row = $student_result->fetch_assoc()) {
                        $fname = $student_row['fname'];
                        $lname = $student_row['lname'];
                        $gender = $student_row['gender'];
                        $department = $student_row['department'];
                        $cgpa = $student_row['cgpa'];
                        $year = $student_row['year'];
                        $image = $student_row['image'];

                        $no_post_result = $conn->query("SELECT * FROM `candidate-posts` WHERE `candidate_id`='$candidate_id'");
                        $no_post = $no_post_result->num_rows;

                        $x++;
                ?>
                        <tr>
                          <td><?php print $x; ?></td>
                          <td><?php print $fname . " " . $lname; ?></td>
                          <td><?php print $gender; ?></td>
                          <td><?php print $no_post; ?></td>
                          <td><?php print $conn->query("SELECT * FROM `follower` WHERE `candidate_id`='$candidate_id'")->num_rows; ?></td>

                          <td><img style="width: 30px; border-radius: 50%;" src="../assets/img/voter/<?php print $image; ?>" alt=""></td>
                          <td>
                            <a href="http://localhost/suv/process/vote_process.php?candidate_id=<?PHP print $candidate_id ?>"><button class="btn btn-info" style="height: 35px;">Vote</button></a>
                          </td>
                        </tr>
              <?php
                      }
                    }
                  }
                }
              } else {
                if ($election_day < $date) {
                  print " <h3>Voting date is expired $election_day !!</h3>";
                }
                if ($election_day > $date) {
                  print " <h3>Witing for up to $election_day !!</h3>";
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