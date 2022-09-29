<?php
session_start();
$role = "";
if (isset($_SESSION['role'])) {
  $role = $_SESSION['role'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SUVS</title>
</head>

<body>
  <header id="header" class="d-flex align-items-center bg-dark">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="http://localhost/suv/index.php">STUDENT UNION VOTING SYSTEM</a></h1>

      <nav id="navbar" class="navbar">
        <ul class="bg-dark">

          <li><a class="nav-link scrollto active text-light" href="http://localhost/suv/index.php">Home</a></li>
          <li><a class="nav-link scrollto active text-light" href="http://localhost/suv/view/news.php">News</a></li>

          <?php
          // Admin page 
          if ($role == 'Admin') {
          ?>
            <li><a class="nav-link scrollto active text-light" href="http://localhost/suv/view/contact.php">Feedback</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/user_account.php">Account</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/su_member.php">SU member</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/generat-report.php">Report</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/voting-status.php">Voting</a></li>
          <?php
          }

          if ($role == 'Main-registrars') {
          ?>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/process/send-stud-info.php">Send Student information</a></li>
          <?php
          }

          // Committee Page 
          if ($role == 'Committee') {
          ?>

            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/candidate.php#candidate">Candidate</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/generat-report.php">Report</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/voting-status.php">Voting</a></li>
            <li class="dropdown"><a href="#" class="text-light"><span>Action</span> <i class="bi bi-chevron-down text-light"></i></a>
              <ul class="bg-dark">
                <li><a class="text-light" href="http://localhost/suv/post/post-notice.php">New Notice</a></li>
                <li><a class="text-light" href="http://localhost/suv/view/view-notice.php">View Notice</a></li>
                <li><a class="text-light" href="http://localhost/suv/post/post-election-day.php">Post Election Day</a></li>
                <li><a class="text-light" href="http://localhost/suv/post/post-application-day.php">Applcation Sending Date</a></li>
              </ul>
            </li>

          <?php
          }
          // Candidate page 
          if ($role == 'Candidate') {
          ?>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/process/vote.php">Vote</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/post/post-campaign.php">Post Campaign</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/my-post.php">My Post</a></li>
          <?php
          }

          //  Voter page 
          if ($role == 'Voter') {
          ?>

            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/my-profile.php">Applay For Candidate</a></li>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/process/vote.php">Vote</a></li>

          <?php
          }

          ?>
          <!-- posible page -->
          <li><a class="nav-link scrollto text-light" href="http://localhost/suv/view/candidate-post.php">Post</a></li>
          <?php
          if (!isset($_SESSION['role'])) {
          ?>
            <li><a class="nav-link scrollto text-light" href="http://localhost/suv/form/contact.php">Contact</a></li>
          <?php
          }
          ?>
          <li><a class="nav-link scrollto text-light" href="http://localhost/suv/index.php#team">Candidate List</a></li>

          <li class="dropdown"><a href="#" class="text-light"><span>Menu</span> <i class="bi bi-chevron-down text-light"></i></a>
            <ul class="bg-dark">
              <?php
              if (isset($_SESSION['role'])) {
              ?>
                <li><a class="text-light" href="http://localhost/suv/form/update-account.php">Update Account</a></li>
                <?php
                if ($role == "Main-registrars" || $role == "Admin") {
                } else {
                ?>
                  <li><a class="text-light" href="http://localhost/suv/view/my-profile.php">My Profile</a></li>
                <?php
                }
                ?>
                <li><a class="text-light" href="http://localhost/suv/form/logout.php#">Logout</a></li>
              <?php
              } else {
              ?>
                <li><a class="text-light" href="http://localhost/suv/form/login.php#">Login</a></li>
                <li><a class="text-light" href="http://localhost/suv/form/sign-up.php">Sign UP</a></li>
              <?php
              }
              ?>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle text-light" style="background-color: black;"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
</body>

</html>