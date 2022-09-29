<?php
session_start();
include("../connection.php");

$candidate_id = $_GET['candidate_id'];
$action = $_SESSION['user_id'];

$vote_status ="";

$log_id = $_SESSION['user_id'];

$voter_status_sql = "SELECT * FROM `voting` WHERE `voter_id`='$log_id'";
$voter_status_result = $conn->query($voter_status_sql);
if ($voter_status_result->num_rows > 0) {
    while ($voter_status_row = $voter_status_result->fetch_assoc()) {
        if ($voter_status_row['trial'] == 1) {
            if($conn->query("UPDATE `voting` SET `trial`='vot' WHERE Candidate_id='$candidate_id' AND voter_id='$log_id'")){
                $vote_status = "NB: Already you are vot ! You have remain one trial !";
            }
            $vote_status = "Error".$conn->error;
           
        } else {
            $vote_status = "NB: Already you are vot !";
        }
    }
}else{
    $conn->query("INSERT INTO `voting`(`Candidate_id`,`voter_id`,`trial`) VALUES('$candidate_id','$log_id','1')");
    $vote_status = "NB: not vot! You have remain one trial !";
}

print $vote_status;

print $_GET['candidate_id'];
print  $_SESSION['user_id'];


header("Location:http://localhost/suv/process/vote.php");