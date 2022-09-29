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
      font-family: 'Times New Roman', Times, serif;
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

    h4 {
      font-family: 'Times New Roman', Times, serif;
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

  if (isset($_POST['submit'])) {
    $candidate_id = $_SESSION['user_id'];
    $posting_text = $_POST['posting_text'];
    $img_vieo = $_POST['img_vieo'];
    $post_date = date("Y-m-d");

    $post_sql = "INSERT INTO `candidate-posts`
    (`candidate_id`, `posted_text`, `image_video_post`, `post_date`)
    VALUES ('$candidate_id','$posting_text','$img_vieo','$post_date')";
    if ($conn->query($post_sql)) {
      $info = "<div class='alert alert-success col-lg-12'>
                          <strong>Successful!</strong>
                      </div>";
    } else {
      $info = "<div class='alert alert-danger col-lg-12'>
                          <strong>Please check your text!</strong>
                      </div>";
    }
  }

  ?>
  <main id="main">

    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Post Your Campaign</h2>
        </div>
        <div class="row">

          <div class="col-lg-4 d-flex align-items-stretch" style="font-family: 'Times New Roman', Times, serif;">
            <?php
            include("../left-side.php");
            ?>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="POST">
              <div class="row" style="font-family: 'Times New Roman', Times, serif;">

                <div class="form-group mt-3">
                  <?php
                  print $info;
                  ?>
                  <label for="name">Your Campaign Text</label>
                  <textarea class="form-control" name="posting_text" rows="4" required></textarea>
                </div>
                <br>

                <div class="form-group col-md-12">
                  <label for="username">Uplade Image/Video</label>
                  <input class="form-control" name="img_vieo" type="file">
                </div>


              </div>

              <div class="my-3">
                <div class="error-message"></div>
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