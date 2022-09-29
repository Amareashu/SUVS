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

    if (isset($_POST['submit'])) {

        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $r_password = $_POST['r_password'];
        $school_id = $_POST['school_id'];
        $role = "Voter";

        $r = $conn->query("SELECT * FROM `student` WHERE stud_id ='$school_id'");
        if ($r->num_rows > 0) {
            $r_a = $conn->query("SELECT * FROM `student` WHERE stud_id ='$school_id' && `status`='Allowed'");
            if ($r_a->num_rows > 0) {
                $r1 =  $conn->query("SELECT * FROM  account  WHERE `user_id`='$school_id'");
                if ($r1->num_rows > 0) {
                    $info = "<div class='alert alert-danger'>
                                    <strong>Error!</strong>Already have an account!!
                                </div>";
                } else {
                    $r1 =  $conn->query("SELECT * FROM  account  WHERE `username`='$user_name'");

                    if ($r1->num_rows > 0) {
                        $info = "<div class='alert alert-danger'>
                                        <strong>Error!</strong>User name taken by another user!!
                                    </div>";
                    }
                }
            } else {
                $info = "<div class='alert alert-danger'>
                                <strong>Error! </strong> Your are not allowed for signup!!
                            </div>";
            }
        } else {
            $info = "<div class='alert alert-danger'>
                            <strong>Error! </strong> Invalid id or you are not the member of this campus!!
                        </div>";
        }


        $unerror = chickString($user_name);
        $passerror = chickMuch($password, $r_password);

        if ($info == "") {
            if ($unerror == "" && $passerror == "") {

                $password = base64_encode($password);

                if ($conn->query("INSERT INTO account (`username`, `password`, `role`, `user_id`) VALUES 
                            ('$user_name','$password','$role','$school_id')")) {
                    $info = "<div class='alert alert-success'>
                                    <strong>Success!</strong> Your Account successful created.
                                </div>";
                } else {
                    print $conn->error;
                }
            } else {
                $info = $passerror;
            }
        }
    }

    function  chickString($data)
    {
        if (!preg_match("/^[a-zA-Z- 0-9]*$/", $data)) {
            return  "<div class='alert alert-danger'>
                            <strong>Error!</strong> Invaild  user name!!
                        </div>";
        } else {
            return "";
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

                    <div class="col-lg-4 d-flex align-items-stretch">
                        <?php
                        include("../left-side.php");
                        ?>

                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">

                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p style="font-weight: bold; font-size: 150%;">Sign Up</p>
                                </div>

                                <?php
                                print $info;
                                ?>

                                <div class="form-group col-md-12">
                                    <label for="id">Enter School ID</label>
                                    <input class="form-control" name="school_id" type="text" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="username">Enter User Name</label>
                                    <input class="form-control" name="username" type="text" required>
                                </div>

                                <div class="form-group col-md-12 mt-3 mt-md-0">
                                    <label for="password">Enter Password</label>
                                    <input class="form-control" name="password" type="password" min="6" max="12" required>
                                </div>

                                <div class="form-group col-md-12 mt-3 mt-md-0">
                                    <label for="password">Re-Enter Password</label>
                                    <input class="form-control" name="r_password" type="password" required>
                                </div>

                            </div>

                            <div class="my-3">
                                <div class="error-message"></div>
                            </div>

                            <div class="text-center col-md-12">
                                <button class="btn btn-primary" type="submit" name="submit" style="width: 100%;">Sign Up</button>
                            </div>
                            <div class="col-md-12 text-center">
                                <br>
                                <p>Already have an account? <a href="http://localhost/suv/form/login.php" class="text-primary" style="font-weight: bold;">Sign In</a></p>
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