<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $_SESSION['access-denied'] =
        $info =  "<div class='alert alert-danger'>
                        <strong>Error!</strong>
                        Please login firste to perform these action !!!
                    </div>";

    header("Location:http://localhost/SUV/form/login.php");
} else {

    include("..//connection.php");

    $user_id = $_SESSION['user_id'];
    $action = $_GET['action'];
    $post_id = $_GET['post_id'];
    $id = $_GET['id'];

    if (isset($_GET['candidate_id'])) {
        $candidate_id = $_GET['candidate_id'];
    }

    print $action;
    print $post_id;

    if ($action == 'cancel') {

        if ($conn->query(" DELETE FROM `candidate-posts` WHERE id = '$post_id'") && $conn->query(" DELETE FROM `like-dislike` WHERE post_id = '$post_id'")) {
            print "succ";
        } else {
            print "Error" . $conn->error;
        }
    }

    if ($action == 'follow') {

        $sql_action = "SELECT * FROM `follower` WHERE `follower_id` = '$user_id' AND candidate_id = '$candidate_id'";
        $result_action = $conn->query($sql_action);
        if ($result_action->num_rows > 0) {
            while ($row_action = $result_action->fetch_assoc()) {

                $action_db = $row_action["action"];

                if ($action_db == 'follow') {
                    $conn->query("UPDATE `follower` SET `action`='unfollow' WHERE candidate_id = '$candidate_id' AND follower_id = '$user_id'");
                } else {
                    $conn->query("UPDATE `follower` SET `action`='follow' WHERE candidate_id = '$candidate_id' AND follower_id = '$user_id'");
                }
            }
        } else {
            if ($conn->query("INSERT INTO `follower` (`follower_id`, `candidate_id`) VALUES ('$user_id', '$candidate_id')")) {
                print "action of d $action";
            } else {

                print $conn->error;
            }
        }
    }

    if ($action == 'dislike' || $action == 'like') {

        $sql_action = "SELECT * FROM `like-dislike` WHERE stud_id = '$user_id' AND post_id = '$post_id'";
        $result_action = $conn->query($sql_action);
        if ($result_action->num_rows > 0) {
            while ($row_action = $result_action->fetch_assoc()) {
                $action_db = $row_action["action"];

                if ($action_db == 'like') {
                    $conn->query("UPDATE `like-dislike` SET `action`='dislike' WHERE stud_id = '$user_id' AND post_id = '$post_id'");
                } else {
                    $conn->query("UPDATE `like-dislike` SET `action`='like' WHERE stud_id = '$user_id' AND post_id = '$post_id'");
                }
            }
        } else {
            if ($conn->query("INSERT INTO `like-dislike` (`post_id`, `stud_id`, `action`) VALUES ('$post_id', '$user_id', '$action')")) {
                print "action of d $action";
            } else {

                print $conn->error;
            }
        }
    }
if(isset($_GET['my_post'])){
    header("Location:http://localhost/suv/view/my-post.php#$id");
}else{
    header("Location:http://localhost/suv/view/candidate-post.php#$id");
}
    
}
