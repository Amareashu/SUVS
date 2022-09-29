<?php

include("connection.php");

$information = "";

$election = $conn->query("SELECT * FROM `election-day`");
if ($election->num_rows > 0) {
    while ($election_row = $election->fetch_assoc()) {
        $election_day = $election_row['date'];
    }
}

$date = date("Y-m-d");
if ($election_day < $date) {
}

$sql = $conn->query("SELECT * FROM `applicent_candidate`");
if ($sql->num_rows > 0) {
    while ($sql_row = $sql->fetch_assoc()) {
        $cand_id = $sql_row['candidate_id'];

        $rr = $conn->query("SELECT * FROM `voting` WHERE `Candidate_id`='$cand_id'");
        $number_of_voter = $rr->num_rows;

        $sql_check = $conn->query("SELECT * FROM `voting_result` WHERE `candidate_id`='$cand_id'");
        if ($sql_check->num_rows > 0) {
            while ($sql_row_check = $sql_check->fetch_assoc()) {
                $conn->query("UPDATE `voting_result` SET `no_voter`='$number_of_voter' WHERE candidate_id='$cand_id'");
            }
        } else {
            $conn->query("INSERT INTO `voting_result`(`candidate_id`, `no_voter`) VALUES ('$cand_id','$number_of_voter')");
        }
    }
}

$post_1 = $conn->query("SELECT `id`, `message`, `subject`, `date`, `status` FROM `notice` ORDER BY `date` DESC limit 1");
if ($post_1->num_rows > 0) {
    while ($post_1_row = $post_1->fetch_assoc()) {
        $info_1 = "<div class='alert alert-success'>
            <div class='col-md-12'>
                  <b><u>Notice</u></b> 
                </div><br>
                <div class='col-md-12' style='text-align: right; padding-right: 4%;'>
                " . $post_1_row['date'] . " 
                </div>
                <div class='col-md-12' style='text-align: left; padding-left: 6%;'>
                 <u> " . $post_1_row['subject'] . " </u>
                </div>
                <div class='col-md-12' style='text-align: left; padding-left: 0%;'>
                " . $post_1_row['message'] . "
                </div>
            </div>";
    }
}

$post_2 = $conn->query("SELECT `id`, `message`, `subject`, `date`, `status` FROM `notice` ORDER BY `date` DESC limit 2");
if ($post_2->num_rows > 0) {
    while ($post_2_row = $post_2->fetch_assoc()) {
        $info_2 = "<div class='alert alert-success'>
    <div class='col-md-12'>
          <b><u>Notice</u></b>
        </div><br>
        <div class='col-md-12' style='text-align: right; padding-right: 4%;'>
        " . $post_2_row['date'] . " 
        </div>
        <div class='col-md-12' style='text-align: left; padding-left: 6%;'>
         <u> " . $post_2_row['subject'] . " </u>
        </div>
        <div class='col-md-12' style='text-align: left; padding-left: 0%;'>
        " . $post_2_row['message'] . "
        </div>
    </div>";
    }
}

$post_3 = $conn->query("SELECT `id`, `message`, `subject`, `date`, `status` FROM `notice` ORDER BY `date` DESC limit 3");
if ($post_3->num_rows > 0) {
    while ($post_3_row = $post_3->fetch_assoc()) {
        $info_3 = "<div class='alert alert-success'>
    <div class='col-md-12'>
          <b><u>Notice</u></b>
        </div> <br>
        <div class='col-md-12' style='text-align: right; padding-right: 4%;'>
        " . $post_3_row['date'] . " 
        </div>
        <div class='col-md-12' style='text-align: left; padding-left: 6%;'>
         <u> " . $post_3_row['subject'] . " </u>
        </div>
        <div class='col-md-12' style='text-align: left; padding-left: 0%;'>
        " . $post_3_row['message'] . "
        </div>
    </div>";
    }
}

?>

<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-3.png)">
                <div class="carousel-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">

                                <?php
                                $date = date("Y-m-d");
                                if ($election_day < $date) {
                                    $sql_winer = $conn->query("SELECT * FROM `voting_result` ORDER BY `voting_result`.`no_voter` DESC limit 1");
                                    if ($sql_winer->num_rows > 0) {
                                        while ($sql_row_winer = $sql_winer->fetch_assoc()) {
                                            $candidate_id = $sql_row_winer['candidate_id'];
                                            $student_result = $conn->query("SELECT * FROM `student` WHERE `stud_id`='$candidate_id'");
                                            if ($student_result->num_rows > 0) {
                                                while ($student_row = $student_result->fetch_assoc()) {
                                                    $image = $student_row['image'];
                                                    $name_of_canidate = $student_row['fname'] . " " . $student_row['lname'];
                                                    $information = "<i><h2>Congeratulation to $name_of_canidate He is The Winner of The Elaction !!</h2> </i>";
                                                }
                                            }
                                        }
                                    }
                                } else {
                                ?>
                                    <h2>Election day "<i><?php print  $election_day; ?></i>"</h2>
                                <?php
                                }
                                print $information;
                                ?>
                                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Students’ Union Web Based Voting System</span></h2>
                                <p class="animate__animated animate__fadeInUp">This Bahir Dar University / BIT Students’ Union Web Based Voting System</p>
                            </div>

                            <div class="col-md-4">
                                <?php
                                print $info_1;
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.png)">
                <div class="carousel-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="animate__animated animate__fadeInDown">Students’ Union Web Based Voting System</h2>
                                <p class="animate__animated animate__fadeInUp">This web based voting system is mainly designed for the Bahir Dar University students’ union.
                                    The system is easy, fast and efficient. And it can be performed simply with a little knowledge of computer.</p>

                            </div>
                            <div class="col-md-4">
                                <?php
                                print $info_2;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url(assets/img/slide/slide-1.png)">
                <div class="carousel-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="animate__animated animate__fadeInDown">Students’ Union Web Based Voting System</h2>
                                <p class="animate__animated animate__fadeInUp">Web based voting system helps its users (students) to vote their own representatives.
                                    Generally these and other detailed features of this system make it so interesting to be used by the Students’ union office.</p>
                            </div>
                            <div class="col-md-4">
                                <?php
                                print $info_3;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section>