<?php
require_once 'core/init.php';

$user = new User();

/* user redirect  */
if ($user->isLoggedIn()) {
} else {
  Redirect::to('index.php');
}

/* submit */
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
    $title = Input::get('title');
    // $other = Input::get('other');
    $refn = Input::get('refn');
    $projectStatus = Input::get('projectStatus');
    $cyear = Input::get('cyear');
    // $juri = Input::get('juri');


    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // insert query
    $stmt = "INSERT INTO `faculty_profile_research` (`fname`, `roll`, `dept`, `prog`, `email`, `aemail`, `rtype`, `title`, `other`, `rpi`, `rcopi`, `rlevel`, `remarks`, `funds`, `projectStatus`, `juri`, `ref`,`pdate`) VALUES ('$fname', '$roll', '$dept', '$prog', '$email', '$aemail', 'pat', '$title', NULL, NULL, NULL, NULL, NULL, NULL, '$projectStatus', NULL, '$refn','$cyear');";
    // echo $stmt;
    // run insert query
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {
    die($e->getMessage());
  }
}

/* fill */
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
    $title = Input::get('title');
    // $other = Input::get('other');
    $refn = Input::get('refn');
    $projectStatus = Input::get('projectStatus');
    $cyear = Input::get('cyear');
    // $juri = Input::get('juri');


    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // insert query
    $stmt = "INSERT INTO `faculty_profile_research` (`fname`, `roll`, `dept`, `prog`, `email`, `aemail`, `rtype`, `title`, `other`, `rpi`, `rcopi`, `rlevel`, `remarks`, `funds`, `projectStatus`, `juri`, `ref`,`pdate`) VALUES ('$fname', '$roll', '$dept', '$prog', '$email', '$aemail', 'pat', '$title', NULL, NULL, NULL, NULL, NULL, NULL, '$projectStatus', NULL, '$refn','$cyear');";
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
    $title = Input::get('title');
    // $other = Input::get('other');
    $projectStatus = Input::get('projectStatus');
    $cyear = Input::get('cyear');
    $refn = Input::get('refn');
    // $juri = Input::get('juri');




    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // delete query
    $stmt = "DELETE FROM `faculty_profile_research` WHERE roll='$roll' AND rtype='pat' AND title=$title  AND projectStatus=$projectStatus AND ref=$refn AND pdate=$cyear;";
    //echo $stmt;
    // run delete query
    $result = mysqli_query($conn, $stmt);
  } catch (Exception $e) {

    die($e->getMessage());
  }
}

/* edit */
if (Input::exists() && isset($_POST['edit'])) {
  try {

    $roll = $user->data()->{'Roll No'};

    // new input
    $title = Input::get('title');
    // $other = Input::get('other');
    $projectStatus = Input::get('projectStatus');
    $cyear = Input::get('cyear');
    // $juri = Input::get('juri');
    $refn = Input::get('refn');


    // prev input
    $titlePrev = Input::get('titlePrev');
    // $otherPrev = Input::get('otherPrev');
    $projectStatusPrev = Input::get('projectStatusPrev');
    $cyearPrev = Input::get('cyearPrev');
    // $juriPrev = Input::get('juriPrev');
    $refnPrev = Input::get('refnPrev');



    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // update query
    $stmt = "UPDATE `faculty_profile_research` SET title='$title', projectStatus='$projectStatus', ref='$refn', pdate='$cyear' WHERE roll='$roll' AND rtype='pat' AND  title=$titlePrev AND projectStatus=$projectStatusPrev AND ref=$refnPrev AND pdate=$cyearPrev;";

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

  <title>Patents</title>

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

              <!--  EDIT/INSERT form -->
              <?php if (Input::exists() && isset($_POST['edit_entry'])) {

                $title = Input::get('title');
                // $other = Input::get('other');
                // $juri = Input::get('juri');
                $projectStatus = Input::get('projectStatus');
                $refn = Input::get('refn');
                $cyear = Input::get('cyear');

              ?>
                <!--  EDIT FORM -->
                <div class="card">
                  <!--  EDIT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Edit Patents</h4>
                  </div>
                  <br>
                  <!-- EDIT FORM - HEADER ends -->

                  <!--  EDIT FORM - BODY -->
                  <form action="patent.php" method="post">

                    <input type="hidden" name="titlePrev" value="<?php echo $title ?>">

                    <input type="hidden" name="projectStatusPrev" value="<?php echo $projectStatus ?>">
                    <input type="hidden" name="refnPrev" value="<?php echo $refn ?>">
                    <input type="hidden" name="cyearPrev" value="<?php echo $cyear ?>">

                    <div class="form-group">
                      <label> Title<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="title" id="title" required value=<?php echo "$title" ?>>
                    </div>



                    <div class="form-group">
                      <label> Ref. No.<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="refn" id="refn" required value=<?php echo "$refn" ?>>
                    </div>


                    <div class="form-group">
                      <label> Status</label>
                      <input type="text" class="form-control" name="projectStatus" id="projectStatus" value=<?php echo "$projectStatus" ?>>
                    </div>

                    <div class="form-group">
                      <label for="cyear"> Date</label>
                      <input type="date" id="cyear" name="cyear" value=<?php echo "$cyear" ?>>
                    </div>



                    <input type="submit" class="btn btn-info" name="edit" value="Edit">

                  </form>
                  <!--  EDIT FORM - BODY ends -->
                </div>
                <br>
                <!--  EDIT FORM ends -->
              <?php } else if (Input::exists() && isset($_POST['fill_entry'])) {

                $title = Input::get('title');
                // $other = Input::get('other');
                // $juri = Input::get('juri');
                $projectStatus = Input::get('projectStatus');
                $refn = Input::get('refn');
                $cyear = Input::get('cyear');

              ?>
                <!--  Fill FORM -->
                <div class="card">
                  <!--  EDIT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Insert Patents</h4>
                  </div>
                  <br>
                  <!-- EDIT FORM - HEADER ends -->

                  <!--  EDIT FORM - BODY -->
                  <form action="patent.php" method="post">

                    <div class="form-group">
                      <label> Title<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="title" id="title" required value=<?php echo "$title" ?>>
                    </div>

                    <div class="form-group">
                      <label> Ref. No.<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="refn" id="refn" required value=<?php echo "$refn" ?>>
                    </div>


                    <div class="form-group">
                      <label> Status</label>
                      <input type="text" class="form-control" name="projectStatus" id="projectStatus" value=<?php echo "$projectStatus" ?>>
                    </div>

                    <div class="form-group">
                      <label for="cyear"> Date</label>
                      <input type="date" id="cyear" name="cyear" value=<?php echo "$cyear" ?>>
                    </div>

                    <input type="submit" class="btn btn-info" name="cfill" value="Insert">

                  </form>
                  <!--  EDIT FORM - BODY ends -->
                </div>
                <br>
                <!--  Fill FORM ends -->
              <?php
              } else { ?>
                <!--  INSERT FORM -->
                <div class="card">
                  <!--  INSERT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Insert Patents</h4>
                  </div>
                  <br>
                  <!--  INSERT FORM - HEADER ends -->

                  <!--  INSERT FORM - BODY -->
                  <form action="patent.php" method="post">

                    <div class="form-group">
                      <label> Title<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="title" id="title" required>
                    </div>


                    <div class="form-group">
                      <label> Ref. No.<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="refn" id="refn" required>
                    </div>



                    <div class="form-group">
                      <label> Status</label>
                      <input type="text" class="form-control" name="projectStatus" id="projectStatus" placeholder="Submitted, Filed, Granted etc">
                    </div>

                    <div class="form-group">
                      <label for="cyear"> Date</label>
                      <input type="date" id="cyear" name="cyear" value=<?php echo "$cyear" ?>>
                    </div>



                    <div class="form-group">
                      <label> Online link</label>
                      <input type="text" class="form-control" name="clink">
                    </div>

                    <!-- <div class="form-group">
                      <label> Jurisdiction</label>
                      <input type="text" class="form-control" name="juri" placeholder="India, Foreign, International etc">
                    </div> -->

                    <input type="submit" class="btn btn-info" name="csubmit" value="Submit">

                  </form>
                  <!--  INSERT FORM - BODY ends -->
                </div>
                <br>
                <!--  INSERT FORM ends -->
              <?php } ?>
              <!--  EDIT/INSERT form ends -->

              <!-- VIEW ADDED  -->
              <div class="card">
                <div class="card-header">
                  <h4><i class="fa fa-file-text"></i> Added Records</h4>
                </div>
                <table class="table table-striped table-hover">
                  <thead class="thead-inverse">
                    <tr>
                      <th>Title</th>
                      <th>Date</th>
                      <th>Ref. No.</th>
                      <th>Status</th>
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
                    $stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='pat' ORDER BY lastUpdated DESC;";
                    // echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['pdate']; ?></td>
                        <td><?php echo $row['ref']; ?></td>
                        <td><?php echo $row['projectStatus']; ?></td>



                        <!-- EDIT -->
                        <td>
                          <form action="patent.php" method="post">
                            <input type="hidden" name="title" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="refn" value="<?php echo "'";
                                                                    echo $row['ref'];
                                                                    echo "'"; ?>">
                            <input type="hidden" name="cyear" value="<?php echo "'";
                                                                      echo $row['pdate'];
                                                                      echo "'"; ?>">



                            <input type="hidden" name="projectStatus" value="<?php echo "'";
                                                                              echo $row['projectStatus'];
                                                                              echo "'"; ?>">



                            <input type="submit" class="btn btn-primary" name="edit_entry" value="Edit" style="background-color: green">
                          </form>
                        </td>
                        <!-- EDIT ends -->
                        <!-- DELETE -->
                        <td>
                          <form action="patent.php" method="post">
                            <input type="hidden" name="title" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="refn" value="<?php echo "'";
                                                                    echo $row['ref'];
                                                                    echo "'"; ?>">
                            <input type="hidden" name="cyear" value="<?php echo "'";
                                                                      echo $row['pdate'];
                                                                      echo "'"; ?>">




                            <input type="hidden" name="projectStatus" value="<?php echo "'";
                                                                              echo $row['projectStatus'];
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
              <!-- VIEW ADDED ends -->

              <!-- Search 1 - by conference paper title  -->
              <div class="card">
                <div class="card-header">
                  <form action="patent.php">
                    <h4><i class="fa fa-search mr-3"></i>Search by Title</h4>
                    <div class="input-group">
                      <input type="text" name="CnameS" required class="form-control" placeholder="Search By Title">
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
                      <th>Status</th>
                      <th>Refn</th>
                      <th>Date</th>

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
                      $stmt = "SELECT fname,dept,title,projectStatus, ref, pdate FROM faculty_profile_research WHERE rtype = 'pat' AND title LIKE '%$cname%' ORDER BY pdate DESC";
                      // echo $stmt;
                      $result = mysqli_query($conn, $stmt);
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                          <td><?php echo $row['fname']; ?></td>
                          <td><?php echo $row['dept']; ?></td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['projectStatus']; ?></td>
                          <td><?php echo $row['ref']; ?></td>
                          <td><?php echo $row['pdate']; ?></td>

                          <!-- Fill -->
                          <td>
                            <form action="patent.php" method="post">
                              <input type="hidden" name="title" value="<?php echo "'";
                                                                        echo $row['title'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cyear" value="<?php echo "'";
                                                                        echo $row['pdate'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="projectStatus" value="<?php echo "'";
                                                                                echo $row['projectStatus'];
                                                                                echo "'"; ?>">
                              <input type="hidden" name="refn" value="<?php echo "'";
                                                                      echo $row['ref'];
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
              <!-- Search 1 - by  title -->
              <br>

              <!-- Search 2 - by status  -->
              <div class="card">
                <div class="card-header">
                  <form action="patent.php">
                    <h4><i class="fa fa-search mr-3"></i>Search by Status</h4>
                    <div class="input-group">
                      <input type="text" name="CstatusS" required class="form-control" placeholder="Search By Status">
                      <input type="submit" name="CstatusSearch" class="btn btn-secondary">
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
                      <th>Status</th>
                      <th>Refn</th>
                      <th>Date</th>

                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    if (strlen(Input::get(CstatusS)) > 0) {
                      $roll = $user->data()->{'Roll No'};
                      $cstatus = Input::get('CstatusS');
                      $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
                      if (!$conn)
                        die("Unable to connect to database");

                      // echo $roll;
                      $stmt = "SELECT fname,dept,title,projectStatus, ref, pdate FROM faculty_profile_research WHERE rtype = 'pat' AND projectStatus LIKE '%$cstatus%' ORDER BY pdate DESC";
                      // echo $stmt;
                      $result = mysqli_query($conn, $stmt);
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                          <td><?php echo $row['fname']; ?></td>
                          <td><?php echo $row['dept']; ?></td>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['projectStatus']; ?></td>
                          <td><?php echo $row['ref']; ?></td>
                          <td><?php echo $row['pdate']; ?></td>

                          <!-- Fill -->
                          <td>
                            <form action="patent.php" method="post">
                              <input type="hidden" name="title" value="<?php echo "'";
                                                                        echo $row['title'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="cyear" value="<?php echo "'";
                                                                        echo $row['pdate'];
                                                                        echo "'"; ?>">
                              <input type="hidden" name="projectStatus" value="<?php echo "'";
                                                                                echo $row['projectStatus'];
                                                                                echo "'"; ?>">
                              <input type="hidden" name="refn" value="<?php echo "'";
                                                                      echo $row['ref'];
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
              <!-- Search 2 - by  status -->
              



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
  <script src="js/research/patent.js"></script>
</body>

</html>