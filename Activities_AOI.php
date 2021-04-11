<?php
$code = 'AOI';
$activity_type = 'Any Other Information';
$field = 'Activity';
$url = 'Activities_AOI.php';
require_once 'core/init.php';
$user = new User();


if ($user->isLoggedIn()) {
} else {
  Redirect::to('index.php');
}


/*  SUBMIT */
if (Input::exists() && isset($_POST['csubmit'])) {
  try {

    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    $ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;

    $activity = Input::get('activity');
    $activityDate = Input::get('activityDate');
    // run insert query
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";

    $stmt = "INSERT INTO `faculty_profile_activities` (`sno`, `name`, `roll`, `dept`,`activityId`,`activity`, `activityDate`, `lastUpdated`) VALUES (NULL, '$fname', '$roll', '$dept', '$code', '$activity', '$activityDate',NULL)";

    // echo $stmt;
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {

    die($e->getMessage());
  }
}


if (Input::exists() && isset($_POST['delete_entry'])) {

  try {
    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    $ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;



    $activity = Input::get('activity');
    $activityDate = Input::get('activityDate');
    // run insert query
    $conn = mysqli_connect("127.0.0.1", "root", "", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");



    // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
    $stmt = "Delete from `faculty_profile_activities` where activity='$activity' and roll='$roll' and activityDate = '$activityDate' and activityId='$code'";
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {
    //echo "Here8";
    die($e->getMessage());
  }
}


if (Input::exists() && isset($_POST['upgrade_entry_x'])) {

  try {
    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    $ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;
    // echo $fid;

    $SNO = Input::get('sno');
    // $ltp=Input::get('ltp');
    // $numOfStudents=Input::get('numOfStudents');
    // $additionalInformation=Input::get('additionalInformation');
    // $semester=Input::get('semester');
    // $date=Input::get('student_activity_date');
    // // run insert query
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    // if(!$conn)
    // die("Unable to connect to database");

    // // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
    // $stmt="Delete from `faculty_profile_teaching` where subCode='$subCode' and ltp='$ltp' and roll='$roll' and numOfStudents=$numOfStudents and activityDate = '$date' and additionalInformation='$additionalInformation' and semester=$semester";



    $stmt = "select * from faculty_profile_Activities where activityID='AOI' and sno>$SNO and roll=$roll order by sno asc limit 1";
    // echo $stmt;
    $result = mysqli_query($conn, $stmt);
    $count = 0;
    $val = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $count = $count + 1;
      $val = $row['sno'];
      // echo $row['sno'];
    }
    // echo $val;
    if ($count != 0) {
      $stmt = "update faculty_profile_Activities set sno=-1 where sno=$val";
      $result = mysqli_query($conn, $stmt);
      $stmt = "update faculty_profile_activities set sno=$val where sno=$SNO";
      $result = mysqli_query($conn, $stmt);
      $stmt = "update faculty_profile_activities set sno=$SNO where sno=-1";
      $result = mysqli_query($conn, $stmt);
    }
    // $result=mysqli_query($conn,$stmt);
    // // // echo if conference added successfully 
  } catch (Exception $e) {
    die($e->getMessage());
  }
}

if (Input::exists() && isset($_POST['edit'])) {

  try {

    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    $ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;

    $prev_activity = Input::get('prev_activity');
    $prev_activityDate = Input::get('prev_activityDate');

    $activity = Input::get('activity');
    $activityDate = Input::get('activityDate');


    // run insert query
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
    $stmt = "Update `faculty_profile_activities` set activity='$activity',activityDate='$activityDate' where activity='$prev_activity' and roll='$roll' and activityDate = '$prev_activityDate'";

    // echo "<br><br><br><br><br><br><br><br>";
    // echo $stmt;
    // echo $pov;
    // echo $purpose;
    // echo $duration;
    // echo $date;
    // echo "<br>";
    // echo $prev_pov;
    // echo $prev_purpose;
    // echo $prev_duration;
    // echo $prev_date;
    // echo "<br>";
    // echo $stmt;
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {
    die($e->getMessage());
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <title>Any Other Activities</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/jqueryui.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2 fixed-top">
    <div class="container">
      <a href="journal.php" class="navbar-brand">Homepage</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- NAVBAR collapse -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <!-- SHOW USERNAME -->
          <li class="nav-item px-2">
            <a href="profile.php" class="nav-link">
              <i class="fa fa-user"></i> <?php echo escape($user->data()->Name); ?>
            </a>
          </li>

          <li class="nav-item px-2">
            <a href="logout.php" class="nav-link">
              <i class="fa fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
      <!-- NAVBAR collapse ends -->
    </div>
  </nav>
  <!-- NAVBAR ends -->

  <br><br>

  <!-- MAIN BODY CONTENT -->
  <div class="wrapper d-flex align-items-stretch">

    <!-- MAIN BODY - SIDEBAR  -->
    <nav id="sidebar">

      <!-- SIDEBAR TOGGLER -->
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
      </div>
      <!-- SIDEBAR TOGGLER ends -->

      <!-- SIDEBAR CONTENT -->
      <div class="p-4 pt-5">

        <!-- SIDEBAR HEADER -->
        <h1><a href="#" class="logo">Dashboard</a></h1>
        <!-- SIDEBAR HEADING ends -->

        <!-- SIDEBAR LISTS -->
        <ul class="list-unstyled components mb-5">

          <!-- AREA list -->
          <li>
            <a href="#areaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              Area
            </a>
            <ul class="collapse list-unstyled show" id="areaSubmenu">
              <li>
                <a href="researchArea.php">Research Area</a>
              </li>
            </ul>
          </li>
          <!-- AREA list ends -->

          <!-- TEACHING list -->
          <li>
            <a href="#teachingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              Teaching
            </a>
            <ul class="collapse list-unstyled show" id="teachingSubmenu">
              <li>
                <a href="Teaching.php">Teaching</a>
              </li>
            </ul>
          </li>
          <!-- TEACHING list ends -->

          <!-- RESEARCH list -->
          <li>
            <a href="#researchSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              Research
            </a>
            <ul class="collapse list-unstyled show" id="researchSubmenu">
              <li>
                <a href="guidance.php">Guidance</a>
              </li>
              <li>
                <a href="sponsoredResearch.php">Sponsored Research</a>
              </li>
              <li>
                <a href="consultancy.php">Consultancy</a>
              </li>
              <li>
                <a href="developmentWork.php">Development Work</a>
              </li>
              <li>
                <a href="patent.php">Patent</a>
              </li>
              <li>
                <a href="copyright.php">CopyRight</a>
              </li>
              <li>
                <a href="technologyTransfer.php">Technology Transfer</a>
              </li>
            </ul>
          </li>
          <!-- RESEARCH list ends -->

          <!-- Honours list -->
          <li>
            <a href="#honoursSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              Honours
            </a>
            <ul class="collapse list-unstyled show" id="honoursSubmenu">
              <li>
                <a href="Honours_FPB.php">Fellow - Professional Body</a>
              </li>
              <li>
                <a href="Honours_MPB.php">Member - Professional Body</a>
              </li>
              <li>
                <a href="Honours_MEBJ.php">Member - Editorial Body</a>
              </li>
              <li>
                <a href="Honours_A.php">Awards</a>
              </li>
              <li>
                <a href="Honours_F.php">Fellowships</a>
              </li>
              <li>
                <a href="Honours_IL.php">Invited Lectures</a>
              </li>
            </ul>
          </li>
          <!-- HONOURS list ends -->

          <!-- PUBLICATIONS list -->
          <li class="active">
            <a href="#publicationsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              Publications
            </a>
            <ul class="collapse list-unstyled show" id="publicationsSubmenu">
              <li>
                <a href="journal.php">Journals</a>
              </li>
              <li>
                <a href="conference.php">Conference</a>
              </li>
              <li>
                <a href="textBooks.php">Text Books</a>
              </li>
              <li>
                <a href="bookChapter.php">Book Chapter</a>
              </li>
              <li>
                <a href="editedVolumes.php">Edited Volumes</a>
              </li>
              <li>
                <a href="educationalPackages.php">Educational Packages</a>
              </li>
              <li>
                <a href="otherPublications.php">Other Publications</a>
              </li>
            </ul>
          </li>
          <!-- PUBLICATIONS ends -->

          <!-- ACTIVITIES list -->
          <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Activity</a>
            <ul class="collapse list-unstyled show" id="homeSubmenu">
              <li>
                <a href="Activities_SA.php">Student Activities</a>
              </li>
              <li>
                <a href="Activities_DA.php">Departmental Activities</a>
              </li>
              <li>
                <a href="Activites_IA.php">Institute Activities</a>
              </li>
              <li>
                <a href="Activities_PA.php">Professional Activities</a>
              </li>
              <li>
                <a href="Activities_SCW.php">Seminar, Conference, Workshops</a>
              </li>
              <li>
                <a href="Activities_STC.php">Short Term Course</a>
              </li>
              <li>
                <a href="Activities_VA.php">Visit Abroad</a>
              </li>
              <li>
                <a href="Activities_OAA.php">Other Academic Activity</a>
              </li>
              <li>
                <a href="Activities_AOI.php">Any Other Information</a>
              </li>
            </ul>
          </li>
          <!-- ACTIVITIES list ends -->
        </ul>
        <!-- SIDEBAR LISTS ends -->
      </div>
      <!-- SIDEBAR CONTENT ends -->
    </nav>
    <!-- MAIN BODY - SIDEBAR ends -->



    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">

      <section id="posts">
        <div class="container">
          <div class="row">
            <!-- MAIN  -->
            <div class="col-md-12" style="width: 65rem;">

              <!-- Add Visit Abroad -->
              <?php if (Input::exists() && isset($_POST['edit_entry'])) {

                $activity = Input::get('activity');
                $activityDate = Input::get('activityDate');
              ?>

                <div class="card">

                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i>Edit <?php echo "$activity_type" ?></h4>
                  </div>

                  <br>

                  <form action="<?php echo "$url" ?>" method="post">

                    <input type='hidden' name='prev_activity' value=<?php echo "'$activity'" ?>>
                    <input type='hidden' name='prev_activityDate' value=<?php echo "'$activityDate'" ?>>

                    <div class="form-group">
                      <label><?php echo "$field" ?><span class="m-1 text-primary">*</span></label>
                      <input type="text" value=<?php echo "'$activity'" ?> class="form-control" name="activity" id="activity" placeholder="<?php echo "$field" ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="student_activity_date">Activity Date:</label>
                      <input type="date" id="student_activity_date" value=<?php echo "'$activityDate'" ?> name="activityDate">
                    </div>
                    <input type="submit" class="btn btn-info" name="edit" value="Submit">
                  </form>

                </div>
                <br>
              <?php
              } else { ?>

                <div class="card">

                  <div class="card-header">
                    <h4><i class="fa fa-plus"></i> <?php echo "$activity_type" ?></h4>
                  </div>

                  <br>

                  <form action="<?php echo "$url" ?>" method="post">

                    <div class="form-group">
                      <label><?php echo "$field" ?><span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="activity" id="activity" placeholder="<?php echo "$field" ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="student_activity_date">Activity Date:</label>
                      <input type="date" id="student_activity_date" name="activityDate">
                    </div>

                    <input type="submit" class="btn btn-info" name="csubmit" value="Submit">
                  </form>

                </div>
                <br>
              <?php } ?>


              <div class="card">
                <div class="card-header">
                  <h4><i class="fa fa-file-text"></i> Added Records</h4>
                </div>
                <table class="table table-striped table-hover">
                  <thead class="thead-inverse">
                    <tr>
                      <th></th>
                      <th><?php echo "$field" ?></th>
                      <th>Activity Date</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    $roll = $user->data()->{'Roll No'};
                    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
                    if (!$conn)
                      die("Unable to connect to database");
                    // echo $roll;
                    $stmt = "select * from faculty_profile_activities where roll='$roll' and activityId='$code' order by sno desc;";
                    // echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td>

                          <form action="<?php echo "$url" ?>" method="post">
                            <input type='hidden' name='activity' value=<?php echo "'";
                                                                        echo $row['activity'];
                                                                        echo "'"; ?>>
                            <input type='hidden' name='activityDate' value=<?php echo "'";
                                                                            echo $row['activityDate'];
                                                                            echo "'"; ?>>
                            <input type="submit" class="btn btn-info" name="edit_entry" value="Edit" style="background-color: green">
                          </form>
                        </td>
                        <td><?php echo $row['activity'] ?></td>
                        <td><?php echo $row['activityDate'] ?></td>

                        <td>

                          <form action="Activities_AOI.php" method="post">
                            <input type='hidden' name='sno' value=<?php echo $row['sno']; ?>>
                            <input type="image" name="upgrade_entry" value="Upgrade" src="./Images/upward_arrow.png" height="50" width="60">
                          </form>

                        </td>
                        <td>



                          <form action="<?php echo "$url" ?>" method="post">
                            <input type='hidden' name='activity' value=<?php echo "'";
                                                                        echo $row['activity'];
                                                                        echo "'"; ?>>
                            <input type='hidden' name='activityDate' value=<?php echo "'";
                                                                            echo $row['activityDate'];
                                                                            echo "'"; ?>>
                            <input type="submit" class="btn btn-info" name="delete_entry" value="Delete" style="background-color: red">
                          </form>

                        </td>
                      </tr>
                    <?php
                    } ?>

                  </tbody>
                </table>

              </div>
              <br>

              <!-- SEARCH JOURNALS -->
            </div>

            <!-- SIDEBAR -->


          </div>
        </div>
      </section>

    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/others.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jqueryui.js"></script>
  <script src="js/activities/Activities_AOI.js"></script>
</body>

</html>