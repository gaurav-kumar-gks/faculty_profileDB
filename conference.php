<?php
require_once 'core/init.php';

$user = new User();

/* user redirect  */
if ($user->isLoggedIn()) {
} else {
  Redirect::to('index.php');
}

/* CONFERENCE fill */
if (Input::exists() && isset($_POST['cfill'])) {
  try {

    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    //$ptype = 'c';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;

    // columns that we get from form input
    $ctitle = Input::get('ctitle');
    $cauthors = Input::get('cauthors');
    $cpublisher = Input::get('cpublisher');
    $cyear = Input::get('cyear');
    $cduration = Input::get('cduration');
    $clink = Input::get('clink');

    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // insert query
    $stmt = "INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `email`, `aemail`) VALUES (NULL, '$fname', '$roll', '$dept', '$prog', 'c', '$ctitle', '$cauthors', NULL, '$cpublisher', '$cyear', NULL, NULL, '$clink', $cduration, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$email', '$aemail');";
    // echo $stmt;
    // run insert query
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {
    die($e->getMessage());
  }
}

/* CONFERENCE submit */
if (Input::exists() && isset($_POST['csubmit'])) {
  try {

    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    //$ptype = 'c';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;

    // columns that we get from form input
    $ctitle = Input::get('ctitle');
    $cauthors = Input::get('cauthors');
    $cpublisher = Input::get('cpublisher');
    $cyear = Input::get('cyear');
    $cduration = Input::get('cduration');
    $clink = Input::get('clink');

    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // insert query
    $stmt = "INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `email`, `aemail`) VALUES (NULL, '$fname', '$roll', '$dept', '$prog', 'c', '$ctitle', '$cauthors', NULL, '$cpublisher', '$cyear', NULL, NULL, '$clink', $cduration, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$email', '$aemail');";
    // echo $stmt;
    // run insert query
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {
    die($e->getMessage());
  }
}

/* delete */
if (Input::exists() && isset($_POST['delete_entry'])) {

  try {

    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    //$ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;
    // echo $fid;

    // columns that we get from form input
    $ctitle = Input::get('ctitle');
    $cauthors = Input::get('cauthors');
    $cpublisher = Input::get('cpublisher');
    $cyear = Input::get('cyear');
    $cduration = Input::get('cduration');
    $clink = Input::get('clink');



    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // delete query
    $stmt = "DELETE FROM `faculty_profile_publications` WHERE roll='$roll' AND ptype='c' AND title=$ctitle AND authors=$cauthors AND publisher=$cpublisher AND pdate=$cyear AND duration=$cduration;";
    //echo $stmt;
    // run delete query
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {

    die($e->getMessage());
  }
}


if (Input::exists() && isset($_POST['upgrade_entry_x'])) {

  // $validatec = new Validate();
  //echo "Here1";


  // $validationC = $validatec->checkfreg($user->data()->email);
  // if ($validationC->passed()) {
  try {
    //echo "Here4";

    // we'll run query on this instance
    // $jins = DB::getInstance();

    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    $ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;
    // echo $fid;

    // columns from the form input 
    // $cname = Input::get('cname');
    // $cauthors = Input::get('cauthors');
    // $ctitle = Input::get('ctitle');
    // $cyear = Input::get('cyear');
    // $clink = Input::get('clink');
    // $clocation = Input::get('clocation');

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

    // echo $SNO;

    $stmt = "select * from faculty_profile_publications where sno>$SNO and roll='$roll' and ptype='c' order by sno asc limit 1";
    $result = mysqli_query($conn, $stmt);
    $count = 0;
    $val = 0;
    while ($row = mysqli_fetch_assoc($result)) {
      $count = $count + 1;
      $val = $row['sno'];
      // echo $row['sno'];
    }
    if ($count != 0) {
      $stmt = "update faculty_profile_publications set sno=-1 where sno=$val";
      $result = mysqli_query($conn, $stmt);
      $stmt = "update faculty_profile_publications set sno=$val where sno=$SNO";
      $result = mysqli_query($conn, $stmt);
      $stmt = "update faculty_profile_publications set sno=$SNO where sno=-1";
      $result = mysqli_query($conn, $stmt);
    }
    // $result=mysqli_query($conn,$stmt);
    // // // echo if conference added successfully 
    // echo "<script type=\"text/javascript\">alert(\"Entry Deleted successfully\");</script>";
  } catch (Exception $e) {
    //echo "Here8";
    die($e->getMessage());
  }
}




/* edit */
if (Input::exists() && isset($_POST['edit'])) {
  try {

    $roll = $user->data()->{'Roll No'};

    // new input
    $ctitle = Input::get('ctitle');
    $cauthors = Input::get('cauthors');
    $cpublisher = Input::get('cpublisher');
    $cyear = Input::get('cyear');
    $cduration = Input::get('cduration');
    $clink = Input::get('clink');

    // prev input
    $ctitlePrev = Input::get('ctitlePrev');
    $cauthorsPrev = Input::get('cauthorsPrev');
    $cpublisherPrev = Input::get('cpublisherPrev');
    $cyearPrev = Input::get('cyearPrev');
    $cdurationPrev = Input::get('cdurationPrev');
    $clinkPrev = Input::get('clinkPrev');


    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // update query
    $stmt = "UPDATE `faculty_profile_publications` SET title='$ctitle', authors='$cauthors', publisher='$cpublisher', pdate='$cyear', onlineLink='$clink', duration=$cduration WHERE roll='$roll' AND ptype='c' AND  title=$ctitlePrev AND authors=$cauthorsPrev AND publisher=$cpublisherPrev AND pdate=$cyearPrev AND onlineLink=$clinkPrev AND duration=$cdurationPrev;";
    //echo $stmt;
    // run query
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {
    //echo "Here8";
    die($e->getMessage());
  }
}

?>


<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Conferences</title>

  <!-- CSS -->
  <link rel="stylesheet" href="css/jqueryui.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
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


    <div id="content" class="p-4 p-md-5 pt-5">

      <!-- MAIN BODY - Page CONTENT  -->
      <section id="posts">
        <div class="container">
          <div class="row">
            <div class="col-md-12" style="width: 65rem;">

              <!-- 
                if edit btn is clicked then edit form will be displayed else insert form will be displayed
               -->

              <!-- CONFERENCES EDIT/INSERT/FILL form -->
              <?php if (Input::exists() && isset($_POST['edit_entry'])) {

                $ctitle = Input::get('ctitle');
                $cauthors = Input::get('cauthors');
                $cduration = Input::get('cduration');
                $cpublisher = Input::get('cpublisher');
                $cyear = Input::get('cyear');
                $clink = Input::get('clink');

              ?>
                <!-- CONFERENCE EDIT FORM -->
                <div class="card">
                  <!-- CONFERENCE EDIT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Edit Your Conference</h4>
                  </div>
                  <br>
                  <!-- CONFERENCE EDIT FORM - HEADER ends -->

                  <!-- CONFERENCE EDIT FORM - BODY -->
                  <form action="conference.php" method="post">

                    <input type="hidden" name="ctitlePrev" value="<?php echo $ctitle ?>">
                    <input type="hidden" name="cauthorsPrev" value="<?php echo $cauthors ?>">
                    <input type="hidden" name="cdurationPrev" value="<?php echo $cduration ?>">
                    <input type="hidden" name="cpublisherPrev" value="<?php echo $cpublisher ?>">
                    <input type="hidden" name="cyearPrev" value="<?php echo $cyear ?>">
                    <input type="hidden" name="clinkPrev" value="<?php echo $clink ?>">



                    <div class="form-group">
                      <label> Title of Paper<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jtitle" name="ctitle" required value=<?php echo "$ctitle" ?>>
                    </div>

                    <div class="form-group">
                      <label> Authors<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jauthors" name="cauthors" required value=<?php echo "$cauthors" ?>>
                    </div>


                    <div class="form-group">
                      <label> Name of Conference<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jpublisher" name="cpublisher" required value=<?php echo "$cpublisher" ?>>
                    </div>

                    <div class="form-group">
                      <label for="cyear"> Published Date</label>
                      <input type="date" value=<?php echo "$cyear" ?> id="cyear" name="cyear">
                    </div>

                    <div class="form-group">
                      <label> Conference Online link</label>
                      <input type="text" class="form-control" name="clink" value=<?php echo "$clink" ?>>
                    </div>

                    <div class="form-group">
                      <label> Duration (In no. of days)<span class="m-1 text-primary">*</span></label>
                      <input type="number" value=<?php echo "$cduration" ?> required class="form-control" name="cduration">
                    </div>

                    <input type="submit" class="btn btn-info" name="edit" value="Edit">

                  </form>
                  <!-- CONFERENCE EDIT FORM - BODY ends -->
                </div>
                <br>
                <!-- CONFERENCE EDIT FORM ends -->
              <?php } else if (Input::exists() && isset($_POST['fill_entry'])) {

                $ctitle = Input::get('ctitle');
                $cauthors = Input::get('cauthors');
                $cduration = Input::get('cduration');
                $cpublisher = Input::get('cpublisher');
                $cyear = Input::get('cyear');
                $clink = Input::get('clink');

              ?>
                <!-- CONFERENCE FILL FORM -->
                <div class="card">
                  <!-- CONFERENCE FILL FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Insert Conference</h4>
                  </div>
                  <br>
                  <!-- CONFERENCE FILL FORM - HEADER ends -->

                  <!-- CONFERENCE FILL FORM - BODY -->
                  <form action="conference.php" method="post">

                    <div class="form-group">
                      <label> Title of Paper<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jtitle" name="ctitle" required value=<?php echo "$ctitle" ?>>
                    </div>

                    <div class="form-group">
                      <label> Authors<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jauthors" name="cauthors" required value=<?php echo "$cauthors" ?>>
                    </div>


                    <div class="form-group">
                      <label> Name of Conference<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jpublisher" name="cpublisher" required value=<?php echo "$cpublisher" ?>>
                    </div>

                    <div class="form-group">
                      <label for="cyear"> Published Date</label>
                      <input type="date" value=<?php echo "$cyear" ?> id="cyear" name="cyear">
                    </div>

                    <div class="form-group">
                      <label> Conference Online link</label>
                      <input type="text" class="form-control" name="clink" value=<?php echo "$clink" ?>>
                    </div>

                    <div class="form-group">
                      <label> Duration (In no. of days)<span class="m-1 text-primary">*</span></label>
                      <input type="number" value=<?php echo "$cduration" ?> required class="form-control" name="cduration">
                    </div>

                    <input type="submit" class="btn btn-info" name="cfill" value="Insert">

                  </form>
                  <!-- CONFERENCE FILL FORM - BODY ends -->
                </div>
                <br>
                <!-- CONFERENCE FILL FORM ends -->
              <?php
              } else { ?>
                <!-- CONFERENCE INSERT FORM -->
                <div class="card">
                  <!-- CONFERENCE INSERT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Insert Conference Paper</h4>
                  </div>
                  <br>
                  <!-- CONFERENCE INSERT FORM - HEADER ends -->

                  <!-- CONFERENCE INSERT FORM - BODY -->
                  <form action="conference.php" method="post">

                    <div class="form-group">
                      <label> Title of Paper<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jtitle" name="ctitle" required>
                    </div>

                    <div class="form-group">
                      <label> Authors<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jauthors" name="cauthors" required>
                    </div>

                    <div class="form-group">
                      <label> Name of Conference<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jpublisher" name="cpublisher" required>
                    </div>

                    <div class="form-group">
                      <label for="cyear"> Published Date</label>
                      <input type="date" id="cyear" name="cyear">
                    </div>



                    <div class="form-group">
                      <label> Conference Online link</label>
                      <input type="text" class="form-control" name="clink">
                    </div>

                    <div class="form-group">
                      <label> Duration (In no. of days)<span class="m-1 text-primary">*</span></label>
                      <input type="number" class="form-control" required name="cduration">
                    </div>

                    <input type="submit" class="btn btn-info" name="csubmit" value="Submit">

                  </form>
                  <!-- CONFERENCE INSERT FORM - BODY ends -->
                </div>
                <br>
                <!-- CONFERENCE INSERT FORM ends -->
              <?php } ?>
              <!-- CONFERENCES EDIT/INSERT form ends -->

              <!-- VIEW ADDED CONFERENCES -->
              <div class="card">
                <div class="card-header">
                  <h4><i class="fa fa-file-text"></i> Added Records</h4>
                </div>
                <table class="table table-striped table-hover">
                  <thead class="thead-inverse">
                    <tr>
                      <th></th>
                      <th>Title</th>
                      <th>Authors</th>

                      <th>Name</th>

                      <th>Date</th>
                      <th>Online Link</th>
                      <th>Duration</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    $roll = $user->data()->{'Roll No'};
                    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
                    if (!$conn)
                      die("Unable to connect to database");

                    // echo $roll;
                    $stmt = "SELECT * FROM faculty_profile_publications WHERE roll='$roll' AND ptype='c' order by sno desc";
                    // echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td>
                          <form action="conference.php" method="post">
                            <input type="hidden" name="ctitle" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="cauthors" value="<?php echo "'";
                                                                        echo $row['authors'];
                                                                        echo "'"; ?>">
                            <input type="hidden" name="cduration" value="<?php echo "'";
                                                                          echo $row['duration'];
                                                                          echo "'"; ?>">

                            <input type="hidden" name="cpublisher" value="<?php echo "'";
                                                                          echo $row['publisher'];
                                                                          echo "'"; ?>">
                            <input type="hidden" name="cyear" value="<?php echo "'";
                                                                      echo $row['pdate'];
                                                                      echo "'"; ?>">

                            <input type="hidden" name="clink" value="<?php echo "'";
                                                                      echo $row['onlineLink'];
                                                                      echo "'"; ?>">

                            <input type="submit" class="btn btn-primary" name="edit_entry" value="Edit" style="background-color: green">
                          </form>
                        </td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['authors']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                        <td><?php echo $row['pdate']; ?></td>
                        <td><?php echo $row['onlineLink']; ?></td>
                        <td><?php echo $row['duration']; ?></td>

                        <td>
                          <form action="conference.php" method="post">
                            <input type='hidden' name='sno' value=<?php echo $row['sno']; ?>>
                            <input type="image" name="upgrade_entry" value="Upgrade" src="./Images/upward_arrow.png" height="50" width="60">
                          </form>

                        </td>

                        <!-- DELETE -->
                        <td>
                          <form action="conference.php" method="post">
                            <input type="hidden" name="ctitle" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="cauthors" value="<?php echo "'";
                                                                        echo $row['authors'];
                                                                        echo "'"; ?>">
                            <input type="hidden" name="cduration" value="<?php echo "'";
                                                                          echo $row['duration'];
                                                                          echo "'"; ?>">

                            <input type="hidden" name="cpublisher" value="<?php echo "'";
                                                                          echo $row['publisher'];
                                                                          echo "'"; ?>">
                            <input type="hidden" name="cyear" value="<?php echo "'";
                                                                      echo $row['pdate'];
                                                                      echo "'"; ?>">

                            <input type="hidden" name="clink" value="<?php echo "'";
                                                                      echo $row['onlineLink'];
                                                                      echo "'"; ?>">

                            <input type="submit" class="btn btn-danger" name="delete_entry" value="Delete">
                          </form>
                        </td>
                        <!-- DELETE ends -->
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>

              </div>
              <br>
              <br>
              <!-- VIEW ADDED CONFERENCES ends -->

              <!-- Search 1 - by conference paper title  -->
              <div class="card">
                <div class="card-header">
                  <form action="conference.php">
                    <h4><i class="fa fa-search mr-3"></i>Search by Conferences Paper Title</h4>
                    <div class="input-group">
                      <input type="text" name="CnameS" required class="form-control" placeholder="Search By Conference Paper Title">
                      <input type="submit" name="CnameSearch" class="btn btn-secondary">
                    </div>
                  </form>
                </div>
              </div>
              <br>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Name</th>
                      <th>Dept</th>
                      <th>Title</th>
                      <th>Authors</th>
                      <th>Conference Name</th>
                      <th>Date</th>
                      <th>Duration</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    if (strlen(Input::get(CnameS)) > 0) {
                      $roll = $user->data()->{'Roll No'};
                      $cname = Input::get('CnameS');
                      $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
                      if (!$conn)
                        die("Unable to connect to database");

                      // echo $roll;
                      $stmt = "SELECT fname,dept,title,authors, publisher, pdate, onlineLink, duration FROM faculty_profile_publications WHERE ptype = 'c' AND title LIKE '%$cname%' ORDER BY pdate DESC";
                      // echo $stmt;
                      $result = mysqli_query($conn, $stmt);
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                          <td><?php echo $row['fname']; ?></td>
                          <td><?php echo $row['dept']; ?></td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['authors']; ?></td>
                          <td><?php echo $row['publisher']; ?></td>
                          <td><?php echo $row['pdate']; ?></td>
                          <td><?php echo $row['duration']; ?></td>

                          <!-- Fill -->
                          <td>
                            <form action="conference.php" method="post">
                              <input type="hidden" name="ctitle" value="<?php echo "'";
                                                                        echo $row['title'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cauthors" value="<?php echo "'";
                                                                          echo $row['authors'];
                                                                          echo "'"; ?>">
                              <input type="hidden" name="cpublisher" value="<?php echo "'";
                                                                            echo $row['publisher'];
                                                                            echo "'"; ?>">
                              <input type="hidden" name="cyear" value="<?php echo "'";
                                                                        echo $row['pdate'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cduration" value="<?php echo "'";
                                                                        echo $row['duration'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="clink" value="<?php echo "'";
                                                                        echo $row['onlineLink'];
                                                                        echo "'"; ?>">

                              <input type="submit" class="btn btn-info" name="fill_entry" value="Fill">
                            </form>
                          </td>
                          <!-- Fill ends -->
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- Search 1 - by conference paper title -->
              <br>
              <!-- Search 2 - by conference name -->
              <div class="card">
                <div class="card-header">
                  <form action="conference.php">
                    <h4><i class="fa fa-search mr-3"></i>Search by Conferences Name</h4>
                    <div class="input-group">
                      <input type="text" name="CpnameS" required class="form-control" placeholder="Search By Conference Name">
                      <input type="submit" name="CpnameSearch" class="btn btn-secondary">
                    </div>
                  </form>
                </div>
              </div>
              <br>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Name</th>
                      <th>Dept</th>
                      <th>Title</th>
                      <th>Authors</th>
                      <th>Conference Name</th>
                      <th>Date</th>
                      <th>Duration</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    if (strlen(Input::get(CpnameS)) > 0) {
                      $roll = $user->data()->{'Roll No'};
                      $cpname = Input::get('CpnameS');
                      $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
                      if (!$conn)
                        die("Unable to connect to database");

                      // echo $roll;
                      $stmt = "SELECT fname,dept,title,authors, publisher, pdate, onlineLink, duration FROM faculty_profile_publications WHERE ptype = 'c' AND publisher LIKE '%$cpname%' ORDER BY pdate DESC";
                      // echo $stmt;
                      $result = mysqli_query($conn, $stmt);
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                          <td><?php echo $row['fname']; ?></td>
                          <td><?php echo $row['dept']; ?></td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['authors']; ?></td>
                          <td><?php echo $row['publisher']; ?></td>
                          <td><?php echo $row['pdate']; ?></td>
                          <td><?php echo $row['duration']; ?></td>

                          <!-- Fill -->
                          <td>
                            <form action="conference.php" method="post">
                              <input type="hidden" name="ctitle" value="<?php echo "'";
                                                                        echo $row['title'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cauthors" value="<?php echo "'";
                                                                          echo $row['authors'];
                                                                          echo "'"; ?>">
                              <input type="hidden" name="cpublisher" value="<?php echo "'";
                                                                            echo $row['publisher'];
                                                                            echo "'"; ?>">
                              <input type="hidden" name="cyear" value="<?php echo "'";
                                                                        echo $row['pdate'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cduration" value="<?php echo "'";
                                                                        echo $row['duration'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="clink" value="<?php echo "'";
                                                                        echo $row['onlineLink'];
                                                                        echo "'"; ?>">

                              <input type="submit" class="btn btn-info" name="fill_entry" value="Fill">
                            </form>
                          </td>
                          <!-- Fill ends -->
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- Search 2 - by conference name ends -->
              <br>
              <!-- Search 3 - by faculty name -->
              <div class="card">
                <div class="card-header">
                  <form action="conference.php">
                    <h4><i class="fa fa-search mr-3"></i>Search by Faculty Name</h4>
                    <div class="input-group">
                      <input type="text" name="CfnameS" required class="form-control" placeholder="Search By Faculty Name">
                      <input type="submit" name="CfnameSearch" class="btn btn-secondary">
                    </div>
                  </form>
                </div>
              </div>
              <br>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Name</th>
                      <th>Dept</th>
                      <th>Title</th>
                      <th>Authors</th>
                      <th>Conference Name</th>
                      <th>Date</th>
                      <th>Duration</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    if (strlen(Input::get(CfnameS)) > 0) {
                      $roll = $user->data()->{'Roll No'};
                      $cfname = Input::get('CfnameS');
                      $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
                      if (!$conn)
                        die("Unable to connect to database");

                      // echo $roll;
                      $stmt = "SELECT fname,dept,title,authors, publisher, pdate, onlineLink, duration FROM faculty_profile_publications WHERE ptype = 'c' AND fname LIKE '%$cfname%' ORDER BY pdate DESC";
                      // echo $stmt;
                      $result = mysqli_query($conn, $stmt);
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                          <td><?php echo $row['fname']; ?></td>
                          <td><?php echo $row['dept']; ?></td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['authors']; ?></td>
                          <td><?php echo $row['publisher']; ?></td>
                          <td><?php echo $row['pdate']; ?></td>
                          <td><?php echo $row['duration']; ?></td>

                          <!-- Fill -->
                          <td>
                            <form action="conference.php" method="post">
                              <input type="hidden" name="ctitle" value="<?php echo "'";
                                                                        echo $row['title'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cauthors" value="<?php echo "'";
                                                                          echo $row['authors'];
                                                                          echo "'"; ?>">
                              <input type="hidden" name="cpublisher" value="<?php echo "'";
                                                                            echo $row['publisher'];
                                                                            echo "'"; ?>">
                              <input type="hidden" name="cyear" value="<?php echo "'";
                                                                        echo $row['pdate'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cduration" value="<?php echo "'";
                                                                        echo $row['duration'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="clink" value="<?php echo "'";
                                                                        echo $row['onlineLink'];
                                                                        echo "'"; ?>">

                              <input type="submit" class="btn btn-info" name="fill_entry" value="Fill">
                            </form>
                          </td>
                          <!-- Fill ends -->
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- Search 3 - by faculty ends -->
              <!-- Search Functions ends -->


            </div>
          </div>
        </div>
      </section>
      <!-- MAIN BODY - PAGE CONTENT ends -->
    </div>

  </div>
  <!-- MAIN BODY CONTENT ends -->

  <!-- floating to the top button -->
  <a href="#" id="scroll" style="display: none;"><span></span></a>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/others.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/jqueryui.js"></script>
  <script src="js/publications/conference.js"></script>
</body>

</html>