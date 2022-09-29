<?php
$no_post = 2;
$name_of_canidate = "name_of_canidate";
$image = "samson.jpg";

$applicent_candidate_result = $conn->query("SELECT * FROM `applicent_candidate` WHERE `status`='Approve'");
if ($applicent_candidate_result->num_rows > 0) {
    while ($applicent_candidate_row = $applicent_candidate_result->fetch_assoc()) {
        $candidate_id = $applicent_candidate_row['candidate_id'];

        $student_result = $conn->query("SELECT * FROM `student` WHERE `stud_id`='$candidate_id'");
        if ($student_result->num_rows > 0) {
            while ($student_row = $student_result->fetch_assoc()) {
                $image = $student_row['image'];
                $name_of_canidate = $student_row['fname'] . " " . $student_row['lname'];
            }
        }
    }
}

?>

<section id="team" class="team section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Candidate</h2>
            <p>
                All Candidate
            </p>
        </div>

        <div class="row">
            <?php
            $applicent_candidate_result = $conn->query("SELECT * FROM `applicent_candidate` WHERE `status`='Approve' OR `status`='Pending'");
            if ($applicent_candidate_result->num_rows > 0) {
                while ($applicent_candidate_row = $applicent_candidate_result->fetch_assoc()) {
                    $candidate_id = $applicent_candidate_row['candidate_id'];
                    $status = $applicent_candidate_row['status'];


                    $student_result = $conn->query("SELECT * FROM `student` WHERE `stud_id`='$candidate_id'");
                    if ($student_result->num_rows > 0) {
                        while ($student_row = $student_result->fetch_assoc()) {
                            $image = $student_row['image'];
                            $name_of_canidate = $student_row['fname'] . " " . $student_row['lname'];

                            $no_post_result = $conn->query("SELECT * FROM `candidate-posts` WHERE `candidate_id`='$candidate_id'");
                            $no_post = $no_post_result->num_rows;

            ?>

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="member">
                                    <img src="http://localhost/suv/assets/img/voter/<?php print $image; ?>" alt="">
                                    <h4><?php print $name_of_canidate; ?></h4>
                                    <p>
                                        Status <?php print $status; ?> <br>
                                        Number of post <?php print $no_post; ?>
                                    </p>
                                    <div class="social">
                                        <a href="www.twitter.<?php print $name_of_canidate; ?>"><i class="bi bi-twitter"></i></a>
                                        <a href="www.facebook.<?php print $name_of_canidate; ?>"><i class="bi bi-facebook"></i></a>
                                        <a href="www.instagram.<?php print $name_of_canidate; ?>"><i class="bi bi-instagram"></i></a>
                                        <a href="www.linkedin.<?php print $name_of_canidate; ?>"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>


            <?php
                        }
                    }
                }
            }
            ?>
        </div>

    </div>
</section>