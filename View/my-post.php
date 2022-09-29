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
    include("../connection.php");

    $candidate_id = $_SESSION['user_id'];

    ?>
    <main id="main">

        <!-- ======= Your Post ======= -->
        <section class="team section-bg">
            <div class="container">
                <h3>Your Post</h3>
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Date</th>
                                <th>Post Text</th>
                                <th>Image/Video</th>
                                <th>Like</th>
                                <th>Dislike</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $x = 0;
                            $my_post_sql = "SELECT * FROM `candidate-posts` where `candidate_id`='$candidate_id' ORDER BY `post_date` DESC";
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

                                    $x++;
                            ?>
                                    <td><?php print $x; ?></td>
                                    <td><?php print $post_date; ?></td>
                                    <td><?php print $posted_text; ?></td>
                                    <td><img style="width: 70px; border-radius: 10%;" src="../collaction/c-image/<?php print $image_video_post; ?>" alt=""> </td>
                                    <td><?php print $like_post; ?></td>
                                    <td><?php print $dislike_post; ?></td>
                                    <td>
                                        <a href="http://localhost/suv/view/my-post-view.php?post_id=<?php print $id ?>" title="view">
                                        <i class="bi bi-eye-fill"></i></a> &nbsp;&nbsp;
                                        <a href="http://localhost/suv/update/my-post-edit.php?post_id=<?php print $id ?>" title="edit">
                                        <i class="bi bi-pencil-fill"></i></a> &nbsp;&nbsp;
                                        <a href="http://localhost/suv/process/action.php?action=cancel&post_id=<?php print $id; ?>&id=<?php print $x; ?>&my_post=mm"> 
                                        <i class="bi bi-trash-fill"></i> </a>
                                    </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>

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