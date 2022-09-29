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

    $user_id = $_SESSION['user_id'];
    $passerror = $info = "";

    if (isset($_POST['submit'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $re_password = $_POST['re_password'];

        $r1 =  $conn->query("SELECT * FROM  account  WHERE `user_id`='$user_id'");
        if ($r1->num_rows > 0) {
            while ($r1_row = $r1->fetch_assoc()) {

                $db_password = base64_decode($r1_row['password']);
                if ($old_password == $db_password) {

                    $passerror = chickMuch($new_password, $re_password);
                    if ($passerror == "") {
                        $new_password = base64_encode($new_password);
                        $post_sql = "UPDATE `account` SET `password`='$new_password' WHERE `user_id`='$user_id'";
                        if ($conn->query($post_sql)) {
                            $info = "<div class='alert alert-success col-lg-12'>
                              <strong>Successful!</strong>
                          </div>";
                        }
                    } else {
                        $info = $passerror;
                    }
                } else {
                    $info = "<div class='alert alert-danger'>
                    <strong>Error!</strong> Invalid Current Password!!
                </div>";
                }
            }
        } else {
            print 0;
        }
    }
    function  chickMuch($data, $data2)
    {
        if ($data == $data2) {
            return  "";
        } else {
            return  "<div class='alert alert-danger'>
                            <strong>Error!</strong> Password is no much!!
                        </div>";
        }
    }
    ?>
    <main id="main">

        <section id="contact" class="contact">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 d-flex align-items-stretch" style="font-family: 'Times New Roman', Times, serif;">
                        <?php
                        include("../left-side.php");
                        ?>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

                        <form action="" method="POST">
                            <div class="row" style="font-family: 'Times New Roman', Times, serif;">
                                <div class="col-md-12 text-center">
                                    <p style="font-weight: bold; font-size: 150%;">Update Account</p>
                                </div>

                                <?php
                                print $info;
                                ?>

                                <div class="form-group col-md-12">
                                    <label for="id">Enter Current Password</label>
                                    <input class="form-control" style="padding-bottom: 8px;" name="old_password" type="text" required>
                                </div>

                                <div class="form-group col-md-12 mt-3 mt-md-0">
                                    <label for="password">Enter New Password</label>
                                    <input class="form-control" style="padding-bottom: 8px;" minlength="6" maxlength="12" name="new_password" type="password" required>
                                </div>

                                <div class="form-group col-md-12 mt-3 mt-md-0">
                                    <label for="password">Re-Enter New Password</label>
                                    <input class="form-control" style="padding-bottom: 8px;" minlength="6" maxlength="12" name="re_password" type="password" required>
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="error-message"></div>
                            </div>

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