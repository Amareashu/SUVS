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

  $post_id = $_GET['post_id'];
  $my_post_sql = "SELECT * FROM `candidate-posts` WHERE id='$post_id'";

  $my_post_result = $conn->query($my_post_sql);
  if ($my_post_result->num_rows > 0) {
    while ($my_post_row = $my_post_result->fetch_assoc()) {
      //`candidate_id`, `posted_text`, `image_video_post`, `post_date`, `like_post`, `dislike_post`,
      $id = $my_post_row['id'];
      $posted_text = $my_post_row['posted_text'];
      $image_video_post = $my_post_row['image_video_post'];
    }
  }

  if (isset($_POST['update'])) {

    $posting_text = $_POST['posting_text'];
    $post_date = date("Y-m-d");

    if (empty($_POST['new_img_video'])) {
      $img_video = "$image_video_post";
    } else {
      $img_video = $_POST['new_img_video'];
    }

    $post_sql = "UPDATE `candidate-posts` SET `posted_text`='$posting_text', `image_video_post`='$img_video' WHERE id='$post_id'";
    if ($conn->query($post_sql)) {
      $info = "<div class='alert alert-success col-lg-12'>
                          <strong>Successful!</strong>
                      </div>";
    }else{
      //print $conn->error;
    }
  }

  ?>
  <main id="main">

    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Update Your Post</h2>
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

                <div class="form-group mt-3">
                  <?php
                  print $info;
                  ?>
                  <label for="name">Privous Campaign Text</label> <a style="margin-left: 55%;" href="http://localhost/suv/view/my-post.php" title="back"><i class="bi bi-arrow-left"></i>Back</a>
                  <input class="form-control" name="posting_text" value="<?php print $posted_text; ?>" required></input>
                </div>
                <div class="form-group col-md-12">
                  <label for="username">Privous Image</label>
                </div>
                <img width="50%" style="border-radius: 0%; margin-top: 0%;" height="200px" src="../collaction/c-image/<?php print $image_video_post; ?>" alt="">

                <div class="form-group col-md-12">
                  <label for="username">Uplade Image</label>
                  <input class="form-control" name="new_img_video" placeholder="Change" type="file">
                </div>


              </div>

              <br>
              <div class="text-center col-md-12">
                <button class="btn btn-primary" type="submit" name="update" style="width: 100%;">Update</button>
              </div>

            </form>
          </div>

        </div>

      </div>

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