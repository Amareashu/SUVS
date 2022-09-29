<?php

$candidate_id = $_GET['candidate_id'];
$action = $_GET['action'];

include("../connection.php");

$conn->query("UPDATE `applicent_candidate` SET `status`='$action' WHERE candidate_id='$candidate_id'");

$conn->query("UPDATE `account` SET `role`='Candidate' WHERE `user_id`='$candidate_id'");

if ($action == 'Reject') {
    $conn->query("UPDATE `account` SET `role`='Voter' WHERE `user_id`='$candidate_id'");
    $conn->query("DELETE FROM `applicent_candidate` WHERE `candidate_id`='$candidate_id'");
}
if ($action == 'Approve') {
    $conn->query("UPDATE `account` SET `role`='Candidate' WHERE `user_id`='$candidate_id'");
}

header("Location:http://localhost/SUV/candidate.php");