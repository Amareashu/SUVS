<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SUVS</title>
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
    input {
      height: 43px;
    }

    label {
      font-size: 20px;
    }

    p {
      font-size: 18px;
    }

    input {
      padding-bottom: 8px;
    }

    form {
      width: 100%;
      border-top: 3px solid #5cb874;
      border-bottom: 3px solid #5cb874;
      padding: 30px;
      background: #fff;
      box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
    }
  </style>

</head>

<body>
  <!-- ======= Header ======= -->
  <?php
  include("../topbar.php");
  include("../menu.php");
  include("../connection.php");
  $info = "";
  $x = 0;

  $member_sql = "SELECT * FROM `account` WHERE `role` = 'Admin' ";
  $member_result = $conn->query($member_sql);
  if ($member_result->num_rows > 0) {
    while ($member_row = $member_result->fetch_assoc()) {

      $user_id = $member_row['user_id'];
      $role = $member_row['role'];

      $student_sql = "SELECT * FROM `student`  WHERE `stud_id`='$user_id'";
      $student_result = $conn->query($student_sql);
      if ($student_result->num_rows > 0) {

        while ($student_row = $student_result->fetch_assoc()) {
          $stud_id = $student_row['stud_id'];
          $fname = $student_row['fname'];
          $lname = $student_row['lname'];

          $x++;
        }
      }
    }
  }

  $sql_winer = $conn->query("SELECT * FROM `voting_result` ORDER BY `voting_result`.`no_voter` DESC limit 1");
  if ($sql_winer->num_rows > 0) {
    while ($sql_row_winer = $sql_winer->fetch_assoc()) {
      $candidate_id = $sql_row_winer['candidate_id'];
      $student_result = $conn->query("SELECT * FROM `student` WHERE `stud_id`='$candidate_id'");
      if ($student_result->num_rows > 0) {
        while ($student_row = $student_result->fetch_assoc()) {
          $name_of_canidate = $student_row['fname'] . " " . $student_row['lname'];
        }
      }
    }
  }

  $stud_id = $_GET['stud_id'];

  if (isset($_POST['submit'])) {

    $conn->query("UPDATE `account` SET `role`='Admin' WHERE `user_id`='$candidate_id'");
    $conn->query("UPDATE `account` SET `role`='Previous_Admin' WHERE `user_id`='$stud_id'");
    $info = "<div class='alert alert-success'>
    <strong>Successful!</strong>!!
</div>";
  }

  ?>
  <main id="main">

    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Admin Replacemet</h2>
        </div>
        <div class="row">

          <div class="col-lg-4 d-flex align-items-stretch">
            <?php
            include("../left-side.php");
            ?>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="POST">
              <div class="row">
<?php
                  print $info;
                  ?>
                <div class="form-group mt-3">
                  
                  <label for="name">Previous Admin</label>
                  <input class="form-control" name="p_admin" value='<?php print $fname . " " . $lname ?>'>
                  <label for="name">New Admin</label>
                  <input class="form-control" name="c_admin" value='<?php print $name_of_canidate ?>'>
                </div>
                <br>
              </div>
              <br>
              <div class="text-center col-md-12">
                <button class="btn btn-primary" type="submit" name="submit" style="width: 100%;">Submit</button>
              </div>

            </form>
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