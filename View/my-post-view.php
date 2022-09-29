<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SUV</title>
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
    include("..//connection.php");
    ?>
    <main id="main">

        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Candidate Post</h2>
                </div>

                <div class="row">

                    <div class="col-lg-4 d-flex align-items-stretch">
                        <?php
                        include("../left-side.php");
                        ?>

                    </div>

                    <div class="col-lg-8" style="height: 460px;  overflow-y: scroll; overflow-x: hidden;">

                        <?php

                        $id = $_GET['post_id'];
                        $candidate_id = $_SESSION['user_id'];
                        $my_post_sql = "SELECT * FROM `candidate-posts` WHERE id='$id'";

                        $follower = 0;
                        $sql_action = "SELECT * FROM `follower` WHERE candidate_id = '$candidate_id' AND `action`='follow'";
                        $result_action = $conn->query($sql_action);
                        $follower = $result_action->num_rows;

                        $my_post_result = $conn->query($my_post_sql);
                        if ($my_post_result->num_rows > 0) {
                            while ($my_post_row = $my_post_result->fetch_assoc()) {
                                //`candidate_id`, `posted_text`, `image_video_post`, `post_date`, `like_post`, `dislike_post`,

                                $id = $my_post_row['id'];
                                $posted_text = $my_post_row['posted_text'];
                                $image_video_post = $my_post_row['image_video_post'];
                                $post_date = $my_post_row['post_date'];

                                $my_like = $conn->query("SELECT * FROM `like-dislike` where `post_id`='$id' and `action`='like'");
                                $like_post = $my_like->num_rows;

                                $my_dislike = $conn->query("SELECT * FROM `like-dislike` where `post_id`='$id' and `action`='dislike'");
                                $dislike_post = $my_dislike->num_rows;
                            }
                        }
                        $candidate_name_result = $conn->query("SELECT * FROM `student` WHERE`stud_id`='$candidate_id'");
                        if ($candidate_name_result->num_rows > 0) {
                            while ($candidate_name_row = $candidate_name_result->fetch_assoc()) {
                                $candidate_name = $candidate_name_row['fname'] . " " . $candidate_name_row['lname'];
                            }
                        }
                        ?>

                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="info">
                                <div class="name">

                                    <div>
                                        <p>
                                            <img width="8%" style="border-radius: 50%; margin-top: 0%;" height="40px" src="../collaction/c-image/<?php print $image_video_post; ?>" alt="">
                                            <b style="font-size: 25px;">Candidate Name <?php print $candidate_name; ?></b> <br>
                                        <h6 style="font-size: 15px; margin-left: 17%; margin-top: -5%;"><?php print $follower; ?> followers </h6>

                                        </p>
                                    </div>

                                    <div style="margin-left: 25px;">
                                        <h5><?php print  $posted_text ?></h5>
                                        <img width="80% border-radius: 10%;" height="250px" style="margin-top: 0%;" src="../collaction/c-image/<?php print $image_video_post; ?>" alt="">
                                        <div class="col-lg-12" style="margin-left: 25px; margin-top: 20px;">
                                            <a href="http://localhost/suv/view/my-post-view.php?post_id=<?php print $id ?>" title="view"><i class="bi bi-eye-fill"></i></a> &nbsp;&nbsp;
                                            <a href="http://localhost/suv/update/my-post-edit.php?post_id=<?php print $id ?>" title="edit"><i class="bi bi-pencil-fill"></i></a> &nbsp;&nbsp;
                                            <a href="http://localhost/suv/view/my-post.php" title="back"><i class="bi bi-arrow-left"></i></a> &nbsp;&nbsp;
                                        </div>
                                    </div>
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