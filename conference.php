<?php
require_once 'core/init.php';

$user = new User();

/* user redirect  */
if ($user->isLoggedIn()) {
} else {
  Redirect::to('index.php');
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
                <a href="teaching.php">Teaching</a>
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
                <a href="fellowProfessional.php">Fellow - Professional Body</a>
              </li>
              <li>
                <a href="memberProfessional.php">Member - Professional Body</a>
              </li>
              <li>
                <a href="memberEditorial.php">Member - Editorial Body</a>
              </li>
              <li>
                <a href="awards.php">Awards</a>
              </li>
              <li>
                <a href="fellowships.php">Fellowships</a>
              </li>
              <li>
                <a href="invitedLectures.php">Invited Lectures</a>
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
                <a href="studentActivities.php">Student Activities</a>
              </li>
              <li>
                <a href="departmentalActivities.php">Departmental Activities</a>
              </li>
              <li>
                <a href="instituteActivites.php">Institute Activities</a>
              </li>
              <li>
                <a href="professionalActivities.php">Professional Activities</a>
              </li>
              <li>
                <a href="seminar.php">Seminar, Conference, Workshops</a>
              </li>
              <li>
                <a href="shortTerm.php">Short Term Course</a>
              </li>
              <li>
                <a href="Activities_VA.php">Visit Abroad</a>
              </li>
              <li>
                <a href="otherAcademic.php">Other Academic Activity</a>
              </li>
              <li>
                <a href="anyOther.php">Any Other Information</a>
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

              <!-- CONFERENCES EDIT/INSERT form -->
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
                    $stmt = "SELECT * FROM faculty_profile_publications WHERE roll='$roll' AND ptype='c' ORDER BY lastUpdated DESC;";
                    // echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['authors']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                        <td><?php echo $row['pdate']; ?></td>
                        <td><?php echo $row['onlineLink']; ?></td>
                        <td><?php echo $row['duration']; ?></td>

                        <!-- EDIT -->
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
                        <!-- EDIT ends -->
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



              <!-- Search Functions -->
              <div class="card">
                <div class="card-header">
                  <h4><i class="fa fa-search mr-3"></i>Search Conferences</h4>
                </div>
                <br>
                <br>

                <!-- Search 1- by CONFERENCE name -->
                <form action="conference.php">
                  <div class="input-group">
                    <input type="text" required name="CnameS" class="form-control" placeholder="Search By Conference Paper Title">
                    <input type="submit" name="CnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('CnameS')) > 0) {
                    $cnames = DB::getInstance();
                    $cname = Input::get('CnameS');

                    $cnames->query("SELECT fname,dept,title,authors, publisher,CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day, duration FROM faculty_profile_publications WHERE ptype = 'c' AND title LIKE '%$cname%' ORDER BY pdate DESC");

                    if ($cnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Conference Name</th><th>Year</th><th>Duration</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($cnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publisher</td><td>$row->day</td><td>$row->duration</td> </tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 1- by CONFERENCE name ends -->

                <br>
                
                <!-- Search 2 - by publisher name -->
                <form action="conference.php">
                  <div class="input-group">
                    <input type="text" name="CpnameS" required class="form-control" placeholder="Search By Conference Name">
                    <input type="submit" name="JpnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('CpnameS')) > 0) {
                    $cpnames = DB::getInstance();
                    $cpname = Input::get('CpnameS');

                    $cpnames->query("SELECT fname,dept,title,authors, publisher,CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day, duration FROM faculty_profile_publications WHERE ptype = 'c' AND publisher LIKE '%$cpname%' ORDER BY pdate DESC");

                    if ($cpnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publisher</th><th>Year</th> <th>Duration</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($cpnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publisher</td><td>$row->day</td><td>$row->duration</td></tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 2 - by publisher name ends -->
                <br>
                

                <!-- Search 3 - by year -->
                <form action="conference.php">
                  <div class="input-group">
                    <input type="text" name="cyearS" required class="form-control" placeholder="Search By Conference Paper published in last X years">
                    <input type="submit" name="jyearSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('cyearS') && is_numeric(Input::get('cyearS'))) > 0) {
                    $cyears = DB::getInstance();
                    $cyear = Input::get('cyearS');

                    $cyears->query("SELECT fname,dept,title,authors, publisher, CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day, duration  FROM faculty_profile_publications WHERE ptype = 'c' AND DATEDIFF(CURRENT_DATE, pdate)/365 < $cyear ORDER BY pdate DESC");

                    if ($cyears->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publisher</th><th>Year</th><th>Duration</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($cyears->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publisher</td><td>$row->day</td><td>$row->duration</td></tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 3 - by year ends-->

                <br>
                

                <!-- Search 4 - by faculty name -->
                <form action="conference.php">
                  <div class="input-group">
                    <input type="text" name="CfnameS" required class="form-control" placeholder="Search By Faculty Name">
                    <input type="submit" name="CfnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('CfnameS')) > 0) {
                    $cfnames = DB::getInstance();
                    $cfname = Input::get('CfnameS');
                    $cfnames->query("SELECT fname,dept,title,authors,  publisher,CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day, duration FROM faculty_profile_publications WHERE ptype = 'c' AND fname LIKE '%$cfname%' ORDER BY pdate DESC");

                    if ($cfnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publisher</th><th>Year</th><th>Duration</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($cfnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publisher</td><td>$row->day</td><td>$row->duration</td></tr>\n";
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
  <script src="js/publications/conference.js"></script>
</body>

</html>