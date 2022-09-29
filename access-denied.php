<?php
if (!isset($_SESSION['user_id'])) {

    $_SESSION['access-denied'] =
        $info =  "<div class='alert alert-danger'>
                        <strong>Error!</strong>
                        Please login Firste to access this page !!!
                    </div>";

    header("Location:http://localhost/SUV/form/login.php");
}
