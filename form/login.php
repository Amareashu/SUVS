<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SUV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/img/favicon.jpg" rel="icon">
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
  include("../connection.php");
  session_start();
  ?>

  <header id="header" class="d-flex align-items-center bg-dark">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">STUDENT UNION VOTING</a></h1>

      <nav id="navbar" class="navbar">
        <ul class="bg-dark">

          <li><a class="nav-link scrollto active text-light" href="http://localhost/suv/index.php">Home</a></li>
          <li><a class="nav-link scrollto active text-light" href="http://localhost/suv/view/news.php">News</a></li>
          <li><a class="nav-link scrollto text-light" href="http://localhost/suv/form/contact.php">Contact</a></li>
          <li><a class="nav-link scrollto text-light" href="http://localhost/suv/index.php#team">Candidate List</a></li>

          <li class="dropdown"><a href="#" class="text-light"><span>Menu</span> <i class="bi bi-chevron-down text-light"></i></a>
            <ul class="bg-dark">
              <li><a class="text-light" href="http://localhost/suv/form/login.php#">Login</a></li>
              <li><a class="text-light" href="http://localhost/suv/form/sign-up.php">Sign UP</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle text-light" style="background-color: black;"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <?php
  $info = "";
  
  if (isset($_SESSION['access-denied'])) {
    $info = $_SESSION['access-denied'];
  }

  if (isset($_POST['login'])) {

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    $info = $user_name . $password;

    $sql_query = "SELECT * FROM account WHERE username = '$user_name'";

    $result = $conn->query($sql_query);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

        $st = "Deactivated";
        $status = $row['status'];

        if ($st == $status) {
          $info = "<div class='alert alert-danger'>
                        <strong>Error!</strong>You Can't Login,  Your account is out of date !!
                    </div>";
        } else {
          $password = base64_encode($password);
          if ($row['username'] == $user_name && $row['password'] == $password) {

            $_SESSION['role'] = $row['role'];

            $_SESSION['user_id'] = $row['user_id'];

            $user_id = $row['user_id'];


            header("Location:http://localhost/suv/index.php");

            // $info = "<div class='alert alert-success'>
            //                         <strong>Success!</strong> Your are successful signin.
            //                     </div>";

            $login = $row['role'];
          } else {
            $info =  "<div class='alert alert-danger'>
                        <strong>Error!</strong>You Enterd Invalid Password!!
                    </div>";
          }
        }
      }
    } else {
      $info = "<div class='alert alert-danger'>
                        <strong>Error!</strong>You Enterd Inavalid User Name!!
                    </div>";
    }
  }
  ?>
  <main id="main">

    <section id="contact" class="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 d-flex align-items-stretch">
            <?php
            include("../left-side.php");
            ?>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

            <form action="" method="post" role="form">
              <div class="row">
                <div class="col-md-12 text-center">
                  <img src="http://localhost/suv/assets/img/favicon.jpg" style="border-radius: 70%; width: 15%;" alt="">
                  <p style="font-weight: bold; font-size: 150%;">Sign In</p>
                </div>

                <?php
                print $info;
                ?>

                <div class="form-group col-md-12">
                  <label for="username">User Name</label>
                  <input class="form-control" name="username" type="text" required>
                </div>

                <div class="form-group col-md-12 mt-3 mt-md-0">
                  <label for="password">Password</label>
                  <input class="form-control" name="password" type="password" required>
                </div>
              </div>

              <div class="my-3">
              </div>

              <p><a class="text-primary" style="font-weight: bold;" href="">Forget Password?</a></p>

              <div class="text-center col-md-12">
                <button class="btn btn-primary" style="width: 100%;" name="login"> Login</button>
              </div>
              <div class="col-md-12 text-center">
                <br>
                <p>Don't Have an account? <a href="http://localhost/suv/form/sign-up.php" class="text-primary" style="font-weight: bold;">Sign up</a></p>
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