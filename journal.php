<?php
require_once 'core/init.php';

$user = new User();

/* user redirect  */
if ($user->isLoggedIn()) {
} else {
  Redirect::to('index.php');
}

/* journal submit */
if (Input::exists() && isset($_POST['jsubmit'])) {
  try {

    // fetch variables that are already stored in User from studentinfo table 
    $fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    //$ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;

    // columns that we get from form input
    $jtitle = Input::get('jtitle');
    $jauthors = Input::get('jauthors');
    $jimpact = Input::get('jimpact');
    $jpublication = Input::get('jpublication');
    $jpublisher = Input::get('jpublisher');
    $jyear = Input::get('jyear');
    $jpages = Input::get('jpages');
    $jlink = Input::get('jlink');

    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // insert query
    $stmt = "INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `email`, `aemail`) VALUES (NULL, '$fname', '$roll', '$dept', '$prog', 'j', '$jtitle', '$jauthors', '$jpublication', '$jpublisher', '$jyear', NULL, '$jpages', '$jlink', NULL, '$jimpact', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$email', '$aemail');";

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
    $jtitle = Input::get('jtitle');
    $jauthors = Input::get('jauthors');
    $jimpact = Input::get('jimpact');
    $jpublication = Input::get('jpublication');
    $jpublisher = Input::get('jpublisher');
    $jyear = Input::get('jyear');
    $jpages = Input::get('jpages');
    $jlink = Input::get('jlink');



    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // delete query
    $stmt = "DELETE FROM `faculty_profile_publications` WHERE roll='$roll' AND ptype='j' AND title=$jtitle AND authors=$jauthors AND publication=$jpublication AND publisher=$jpublisher AND pdate=$jyear;";
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

    $stmt = "select * from faculty_profile_publications where sno>$SNO and roll='$roll' and ptype='j' order by sno asc limit 1";
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
    $jtitle = Input::get('jtitle');
    $jauthors = Input::get('jauthors');
    $jimpact = Input::get('jimpact');
    $jpublication = Input::get('jpublication');
    $jpublisher = Input::get('jpublisher');
    $jyear = Input::get('jyear');
    $jpages = Input::get('jpages');
    $jlink = Input::get('jlink');

    // prev input
    $jtitlePrev = Input::get('jtitlePrev');
    $jauthorsPrev = Input::get('jauthorsPrev');
    $jimpactPrev = Input::get('jimpactPrev');
    $jpublicationPrev = Input::get('jpublicationPrev');
    $jpublisherPrev = Input::get('jpublisherPrev');
    $jyearPrev = Input::get('jyearPrev');
    $jpagesPrev = Input::get('jpagesPrev');
    $jlinkPrev = Input::get('jlinkPrev');


    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // update query
    $stmt = "UPDATE `faculty_profile_publications` SET title='$jtitle', authors='$jauthors', publication='$jpublication', publisher='$jpublisher', pdate='$jyear', pages='$jpages', onlineLink='$jlink', impactFactor='$jimpact' WHERE roll='$roll' AND ptype='j' AND  title=$jtitlePrev AND authors=$jauthorsPrev AND publication=$jpublicationPrev AND publisher=$jpublisherPrev AND pdate=$jyearPrev AND pages=$jpagesPrev AND onlineLink=$jlinkPrev AND impactFactor=$jimpactPrev;";
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

  <title>Journal</title>

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

              <!-- JOURNALS EDIT/INSERT form -->
              <?php if (Input::exists() && isset($_POST['edit_entry'])) {

                $jtitle = Input::get('jtitle');
                $jauthors = Input::get('jauthors');
                $jimpact = Input::get('jimpact');
                $jpublication = Input::get('jpublication');
                $jpublisher = Input::get('jpublisher');
                $jyear = Input::get('jyear');
                $jpages = Input::get('jpages');
                $jlink = Input::get('jlink');

              ?>
                <!-- JOURNAL EDIT FORM -->
                <div class="card">
                  <!-- JOURNAL EDIT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Edit Your Journal</h4>
                  </div>
                  <br>
                  <!-- JOURNAL EDIT FORM - HEADER ends -->

                  <!-- JOURNAL EDIT FORM - BODY -->
                  <form action="journal.php" method="post">

                    <input type="hidden" name="jtitlePrev" value="<?php echo $jtitle ?>">
                    <input type="hidden" name="jauthorsPrev" value="<?php echo $jauthors ?>">
                    <input type="hidden" name="jimpactPrev" value="<?php echo $jimpact ?>">
                    <input type="hidden" name="jpublicationPrev" value="<?php echo $jpublication ?>">
                    <input type="hidden" name="jpublisherPrev" value="<?php echo $jpublisher ?>">
                    <input type="hidden" name="jyearPrev" value="<?php echo $jyear ?>">
                    <input type="hidden" name="jpagesPrev" value="<?php echo $jpages ?>">
                    <input type="hidden" name="jlinkPrev" value="<?php echo $jlink ?>">



                    <div class="form-group">
                      <label> Title of Paper<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jtitle" name="jtitle" required value=<?php echo "$jtitle" ?>>
                    </div>

                    <div class="form-group">
                      <label> Authors<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jauthors" name="jauthors" required value=<?php echo "$jauthors" ?>>
                    </div>

                    <div class="form-group">
                      <label> Name of journal<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jpublication" name="jpublication" required value=<?php echo "$jpublication" ?>>
                    </div>

                    <div class="form-group">
                      <label> Name of Publisher<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jpublisher" name="jpublisher" required value=<?php echo "$jpublisher" ?>>
                    </div>

                    <div class="form-group">
                      <label for="jyear"> Published Date</label>
                      <input type="date" value=<?php echo "$jyear" ?> id="jyear" name="jyear">
                    </div>

                    <div class="form-group">
                      <label> Journal Volume Pages</label>
                      <input type="text" class="form-control" name="jpages" value=<?php echo "$jpages" ?>>
                    </div>

                    <div class="form-group">
                      <label> Journal Online link</label>
                      <input type="text" class="form-control" name="jlink" value=<?php echo "$jlink" ?>>
                    </div>

                    <div class="form-group">
                      <label> Journal Impact factor</label>
                      <input type="text" class="form-control" name="jimpact" value=<?php echo "$jimpact" ?>>
                    </div>

                    <input type="submit" class="btn btn-info" name="edit" value="Edit">

                  </form>
                  <!-- JOURNAL EDIT FORM - BODY ends -->
                </div>
                <br>
                <!-- JOURNAL EDIT FORM ends -->
              <?php
              } else { ?>
                <!-- JOURNAL INSERT FORM -->
                <div class="card">
                  <!-- JOURNAL INSERT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Insert Journal</h4>
                  </div>
                  <br>
                  <!-- JOURNAL INSERT FORM - HEADER ends -->

                  <!-- JOURNAL INSERT FORM - BODY -->
                  <form action="journal.php" method="post">

                    <div class="form-group">
                      <label> Title of Paper<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jtitle" name="jtitle" required>
                    </div>

                    <div class="form-group">
                      <label> Authors<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jauthors" name="jauthors" required>
                    </div>

                    <div class="form-group">
                      <label> Name of journal<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jpublication" name="jpublication" required>
                    </div>

                    <div class="form-group">
                      <label> Name of Publisher<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" id="jpublisher" name="jpublisher" required>
                    </div>

                    <div class="form-group">
                      <label for="jyear"> Published Date</label>
                      <input type="date" id="jyear" name="jyear">
                    </div>

                    <div class="form-group">
                      <label> Journal Volume Pages</label>
                      <input type="text" class="form-control" name="jpages">
                    </div>

                    <div class="form-group">
                      <label> Journal Online link</label>
                      <input type="text" class="form-control" name="jlink">
                    </div>

                    <div class="form-group">
                      <label> Journal Impact factor</label>
                      <input type="text" class="form-control" name="jimpact">
                    </div>

                    <input type="submit" class="btn btn-info" name="jsubmit" value="Submit">

                  </form>
                  <!-- JOURNAL INSERT FORM - BODY ends -->
                </div>
                <br>
                <!-- JOURNAL INSERT FORM ends -->
              <?php } ?>
              <!-- JOURNALS EDIT/INSERT form ends -->

              <!-- VIEW ADDED JOURNALS -->
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
                      <th>Publication</th>
                      <th>Publisher</th>
                      <th>Pages</th>
                      <th>Date</th>
                      <th>Online Link</th>
                      <th>Impact Factor</th>
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
                    $stmt = "SELECT * FROM faculty_profile_publications WHERE roll='$roll' AND ptype='j' order by sno desc";
                    // echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td>
                          <form action="journal.php" method="post">
                            <input type="hidden" name="jtitle" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="jauthors" value="<?php echo "'";
                                                                        echo $row['authors'];
                                                                        echo "'"; ?>">
                            <input type="hidden" name="jimpact" value="<?php echo "'";
                                                                        echo $row['impactFactor'];
                                                                        echo "'"; ?>">
                            <input type="hidden" name="jpublication" value="<?php echo "'";
                                                                            echo $row['publication'];
                                                                            echo "'"; ?>">
                            <input type="hidden" name="jpublisher" value="<?php echo "'";
                                                                          echo $row['publisher'];
                                                                          echo "'"; ?>">
                            <input type="hidden" name="jyear" value="<?php echo "'";
                                                                      echo $row['pdate'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="jpages" value="<?php echo "'";
                                                                      echo $row['pages'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="jlink" value="<?php echo "'";
                                                                      echo $row['onlineLink'];
                                                                      echo "'"; ?>">

                            <input type="submit" class="btn btn-primary" name="edit_entry" value="Edit" style="background-color: green">
                          </form>
                        </td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['authors']; ?></td>
                        <td><?php echo $row['publication']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                        <td><?php echo $row['pages']; ?></td>
                        <td><?php echo $row['pdate']; ?></td>
                        <td><?php echo $row['onlineLink']; ?></td>
                        <td><?php echo $row['impactFactor']; ?></td>
                        <!-- EDIT -->

                        <!-- EDIT ends -->
                        <!-- DELETE -->
                        <td>

                          <form action="journal.php" method="post">
                            <input type='hidden' name='sno' value=<?php echo $row['sno']; ?>>
                            <input type="image" name="upgrade_entry" value="Upgrade" src="./Images/upward_arrow.png" height="50" width="60">
                          </form>

                        </td>
                        <td>
                          <form action="journal.php" method="post">
                            <input type="hidden" name="jtitle" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="jauthors" value="<?php echo "'";
                                                                        echo $row['authors'];
                                                                        echo "'"; ?>">
                            <input type="hidden" name="jimpact" value="<?php echo "'";
                                                                        echo $row['impactFactor'];
                                                                        echo "'"; ?>">
                            <input type="hidden" name="jpublication" value="<?php echo "'";
                                                                            echo $row['publication'];
                                                                            echo "'"; ?>">
                            <input type="hidden" name="jpublisher" value="<?php echo "'";
                                                                          echo $row['publisher'];
                                                                          echo "'"; ?>">
                            <input type="hidden" name="jyear" value="<?php echo "'";
                                                                      echo $row['pdate'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="jpages" value="<?php echo "'";
                                                                      echo $row['pages'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="jlink" value="<?php echo "'";
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
              <!-- VIEW ADDED JOURNALS ends -->



              <!-- Search Functions -->
              <div class="card">
                <div class="card-header">
                  <h4><i class="fa fa-search mr-3"></i>Search Journals</h4>
                </div>
                <br>
                <br>

                <!-- Search 1- by journal name -->
                <form action="journal.php">
                  <div class="input-group">
                    <input type="text" required name="JnameS" class="form-control" placeholder="Search By Journal Name">
                    <input type="submit" name="JnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('JnameS')) > 0) {
                    $jnames = DB::getInstance();
                    $jname = Input::get('JnameS');

                    $jnames->query("SELECT fname,dept,title,authors, publication, publisher,CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day FROM faculty_profile_publications WHERE ptype = 'j' AND title LIKE '%$jname%' ORDER BY pdate DESC");

                    if ($jnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Publisher</th><th>Year</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($jnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->publisher</td><td>$row->day</td></tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 1- by journal name ends -->

                <br>
                <br>
                <!-- Search 2 - by publisher name -->
                <form action="journal.php">
                  <div class="input-group">
                    <input type="text" name="JpnameS" required class="form-control" placeholder="Search By Publisher Name">
                    <input type="submit" name="JpnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('JpnameS')) > 0) {
                    $jpnames = DB::getInstance();
                    $jpname = Input::get('JpnameS');

                    $jpnames->query("SELECT fname,dept,title,authors, publication, publisher,CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day FROM faculty_profile_publications WHERE ptype = 'j' AND publisher LIKE '%$jpname%' ORDER BY pdate DESC");

                    if ($jpnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Publisher</th><th>Year</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($jpnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->publisher</td><td>$row->day</td></tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 2 - by publisher name ends -->
                <br>
                <br>

                <!-- Search 3 - by year -->
                <form action="journal.php">
                  <div class="input-group">
                    <input type="text" name="JyearS" required class="form-control" placeholder="Search By Journals published in last X years">
                    <input type="submit" name="JyearSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('JyearS') && is_numeric(Input::get('JyearS'))) > 0) {
                    $jyears = DB::getInstance();
                    $jyear = Input::get('JyearS');

                    $jyears->query("SELECT fname,dept,title,authors, publication, publisher, CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day  FROM faculty_profile_publications WHERE ptype = 'j' AND DATEDIFF(CURRENT_DATE, pdate)/365 < $jyear ORDER BY pdate DESC");

                    if ($jyears->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Publisher</th><th>Year</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($jyears->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->publisher</td><td>$row->day</td></tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 3 - by year ends-->

                <br>
                <br>

                <!-- Search 4 - by faculty name -->
                <form action="journal.php">
                  <div class="input-group">
                    <input type="text" name="JfnameS" required class="form-control" placeholder="Search By Faculty Name">
                    <input type="submit" name="JfnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('JfnameS')) > 0) {
                    $jfnames = DB::getInstance();
                    $jfname = Input::get('JfnameS');
                    $jfnames->query("SELECT fname,dept,title,authors, publication, publisher,CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day FROM faculty_profile_publications WHERE ptype = 'j' AND fname LIKE '%$jfname%' ORDER BY pdate DESC");

                    if ($jfnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Publisher</th><th>Year</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($jfnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->publisher</td><td>$row->day</td></tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 4 ends - by faculty name -->
              </div>
              <br>
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
  <script src="js/publications/journal.js"></script>

</body>

</html>