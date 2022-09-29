<?php

$id = $_GET['m_id'];

include("../connection.php");

$conn->query("DELETE FROM `notice` WHERE `id`='$id'");

header("Location:http://localhost/SUV/view/view-notice.php");