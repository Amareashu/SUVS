<?php

$stud_id = $_GET['stud_id'];
include("../connection.php");

if ($stud_id == "all") {
  $conn->query("UPDATE `student` SET `status`='Allowed'");
} else {
  $stud_id = $_GET['stud_id'];
  $conn->query("UPDATE `student` SET `status`='Allowed' WHERE stud_id='$stud_id'");
}

header("Location:http://localhost/suv/process/send-stud-info.php");
