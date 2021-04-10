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
    //$rtype = 'c';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;

    // columns that we get from form input
    $title = Input::get('title');
    $other = Input::get('other');
    $rpi = Input::get('rpi');
    // $cyear = Input::get('cyear');
    $funds = Input::get('funds');
    $rcopi = Input::get('rcopi');

    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // insert query
    $stmt = "INSERT INTO `faculty_profile_research` (`fname`, `roll`, `dept`, `prog`, `email`, `aemail`, `rtype`, `title`, `other`, `rpi`, `rcopi`, `rlevel`, `remarks`, `funds`, `projectStatus`, `juri`, `ref`) VALUES ('$fname', '$roll', '$dept', '$prog', '$email', '$aemail', 'orp', '$title', '$other', '$rpi', '$rcopi', NULL, NULL, $funds, NULL, NULL, NULL);";
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
    //$rtype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;
    // echo $fid;

    // columns that we get from form input
    $title = Input::get('title');
    $other = Input::get('other');
    $rpi = Input::get('rpi');
    //$cyear = Input::get('cyear');
    $funds = Input::get('funds');
    $rcopi = Input::get('rcopi');



    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // delete 
    $stmt = "DELETE FROM `faculty_profile_research` WHERE roll='$roll' AND rtype='orp' AND title=$title AND other=$other AND rpi =$rpi AND rcopi = $rcopi AND funds=$funds;";
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
    $other = Input::get('other');
    $rpi = Input::get('rpi');
    //$cyear = Input::get('cyear');
    $funds = Input::get('funds');
    $rcopi = Input::get('rcopi');

    // prev input
    $titlePrev = Input::get('titlePrev');
    $otherPrev = Input::get('otherPrev');
    $rpiPrev = Input::get('rpiPrev');
    //$cyearPrev = Input::get('cyearPrev');
    $fundsPrev = Input::get('fundsPrev');
    $rcopiPrev = Input::get('rcopiPrev');


    // connect with localhost
    $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
    if (!$conn)
      die("Unable to connect to database");

    // update query
    $stmt = "UPDATE `faculty_profile_research` SET title='$title', other='$other', rpi='$rpi', rcopi='$rcopi', funds=$funds WHERE roll='$roll' AND rtype='orp' AND  title=$titlePrev AND other=$otherPrev AND rpi=$rpiPrev  AND rcopi=$rcopiPrev AND funds=$fundsPrev;";
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

  <title>Ongoing Research</title>

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

              <!--  EDIT/INSERT form -->
              <?php if (Input::exists() && isset($_POST['edit_entry'])) {

                $title = Input::get('title');
                $other = Input::get('other');
                $funds = Input::get('funds');
                $rpi = Input::get('rpi');
                //$cyear = Input::get('cyear');
                $rcopi = Input::get('rcopi');

              ?>
                <!--  EDIT FORM -->
                <div class="card">
                  <!--  EDIT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Edit Your Ongoing Research Project</h4>
                  </div>
                  <br>
                  <!--  EDIT FORM - HEADER ends -->

                  <!--  EDIT FORM - BODY -->
                  <form action="sponsoredResearch.php" method="post">

                    <input type="hidden" name="titlePrev" value="<?php echo $title ?>">
                    <input type="hidden" name="otherPrev" value="<?php echo $other ?>">
                    <input type="hidden" name="fundsPrev" value="<?php echo $funds ?>">
                    <input type="hidden" name="rpiPrev" value="<?php echo $rpi ?>">

                    <input type="hidden" name="rcopiPrev" value="<?php echo $rcopi ?>">



                    <div class="form-group">
                      <label> Title of Project<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="title" id="title" required value=<?php echo "$title" ?>>
                    </div>

                    <div class="form-group">
                      <label> Sponsor<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="other" id="other" required value=<?php echo "$other" ?>>
                    </div>


                    <div class="form-group">
                      <label> Name of PI</label>
                      <input type="text" class="form-control" name="rpi" id="rpi" value=<?php echo "$rpi" ?>>
                    </div>



                    <div class="form-group">
                      <label> Name of Co-PI</label>
                      <input type="text" class="form-control" name="rcopi" id="rcopi"  value=<?php echo "$rcopi" ?>>
                    </div>

                    <div class="form-group">
                      <label> Funds (In Rs. Lakhs)<span class="m-1 text-primary">*</span></label>
                      <input type="number" value=<?php echo "$funds" ?> class="form-control" name="funds">
                    </div>

                    <input type="submit" class="btn btn-info" name="edit" value="Edit">

                  </form>
                  <!-- EDIT FORM - BODY ends -->
                </div>
                <br>
                <!-- EDIT FORM ends -->
              <?php
              } else { ?>
                <!--  INSERT FORM -->
                <div class="card">
                  <!--  INSERT FORM - HEADER -->
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i> Insert Ongoing Research Projects</h4>
                  </div>
                  <br>
                  <!--  INSERT FORM - HEADER ends -->

                  <!--  INSERT FORM - BODY -->
                  <form action="sponsoredResearch.php" method="post">

                    <div class="form-group">
                      <label> Title of Project<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="title" id="title" required>
                    </div>

                    <div class="form-group">
                      <label> Sponsor<span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="other" id="other" required>
                    </div>

                    <div class="form-group">
                      <label> Name of PI</label>
                      <input type="text" class="form-control" name="rpi" id="rpi">
                    </div>


                    <div class="form-group">
                      <label> Name of Co-PI</label>
                      <input type="text" class="form-control" name="rcopi" id="rcopi">
                    </div>

                    <div class="form-group">
                      <label> Funds (In Rs. Lakhs)</label>

                      <input type="number" class="form-control" name="funds">
                    </div>

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
                      <th>Sponsor</th>
                      <th>PI</th>
                      <th>Co-PI</th>
                      <th>Funds</th>
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
                    $stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='orp' ORDER BY lastUpdated DESC;";
                    // echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['other']; ?></td>
                        <td><?php echo $row['rpi']; ?></td>

                        <td><?php echo $row['rcopi']; ?></td>
                        <td><?php echo $row['funds']; ?></td>

                        <!-- EDIT -->
                        <td>
                          <form action="sponsoredResearch.php" method="post">
                            <input type="hidden" name="title" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="other" value="<?php echo "'";
                                                                      echo $row['other'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="funds" value="<?php echo "'";
                                                                      echo $row['funds'];
                                                                      echo "'"; ?>">

                            <input type="hidden" name="rpi" value="<?php echo "'";
                                                                    echo $row['rpi'];
                                                                    echo "'"; ?>">
                            <input type="hidden" name="rcopi" value="<?php echo "'";
                                                                      echo $row['rcopi'];
                                                                      echo "'"; ?>">

                            <input type="submit" class="btn btn-primary" name="edit_entry" value="Edit" style="background-color: green">
                          </form>
                        </td>
                        <!-- EDIT ends -->
                        <!-- DELETE -->
                        <td>
                          <form action="sponsoredResearch.php" method="post">
                            <input type="hidden" name="title" value="<?php echo "'";
                                                                      echo $row['title'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="other" value="<?php echo "'";
                                                                      echo $row['other'];
                                                                      echo "'"; ?>">
                            <input type="hidden" name="funds" value="<?php echo "'";
                                                                      echo $row['funds'];
                                                                      echo "'"; ?>">

                            <input type="hidden" name="rpi" value="<?php echo "'";
                                                                    echo $row['rpi'];
                                                                    echo "'"; ?>">
                            <input type="hidden" name="rcopi" value="<?php echo "'";
                                                                      echo $row['rcopi'];
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
              <!-- VIEW ADDED  ends -->



              <!-- Search Functions -->
              <div class="card">
                <div class="card-header">
                  <h4><i class="fa fa-search mr-3"></i>Search Ongoing Research Projects</h4>
                </div>
                <br>
                <br>

                <!-- Search 1- by  name -->
                <form action="sponsoredResearch.php">
                  <div class="input-group">
                    <input type="text" required name="CnameS" class="form-control" placeholder="Search By Project Title">
                    <input type="submit" name="CnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('CnameS')) > 0) {
                    $cnames = DB::getInstance();
                    $cname = Input::get('CnameS');

                    $cnames->query("SELECT fname,dept,title,other, rpi, rcopi, funds, lastUpdated FROM faculty_profile_research WHERE rtype = 'orp' AND title LIKE '%$cname%' ORDER BY lastUpdated DESC");

                    if ($cnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Sponsor</th><th>PI</th><th>Co-PI</th><th>Funds</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($cnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->other</td><td>$row->rpi</td><td>$row->rcopi</td><td>$row->funds</td> </tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 1- by  name ends -->

                <br>

                <!-- Search 2 - by sponsor name -->
                <form action="sponsoredResearch.php">
                  <div class="input-group">
                    <input type="text" name="CpnameS" required class="form-control" placeholder="Search By Sponsor Name">
                    <input type="submit" name="JpnameSearch" class="btn btn-secondary">
                  </div>
                </form>
                <br>
                <div class="table-responsive">
                  <?php
                  if (strlen(Input::get('CpnameS')) > 0) {
                    $cpnames = DB::getInstance();
                    $cpname = Input::get('CpnameS');

                    $cpnames->query("SELECT fname,dept,title,other, rpi, rcopi, funds, lastUpdated FROM faculty_profile_research WHERE rtype = 'orp' AND other LIKE '%$cpname%' ORDER BY lastUpdated DESC");

                    if ($cpnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Sponsor</th><th>PI</th><th>Co-PI</th><th>Funds</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($cpnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->other</td><td>$row->rpi</td><td>$row->rcopi</td><td>$row->funds</td> </tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 2 - by rpi name ends -->
                <br>
                <!-- Search 3 - by faculty name -->
                <form action="sponsoredResearch.php">
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
                    $cfnames->query("SELECT fname,dept,title,other, rpi, rcopi, funds, lastUpdated FROM faculty_profile_research WHERE rtype = 'orp' AND fname LIKE '%$cfname%' ORDER BY lastUpdated DESC");

                    if ($cfnames->count()) {
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Sponsor</th><th>PI</th><th>Co-PI</th><th>Funds</th></tr></thead>";
                      echo "<tbody>";

                      foreach ($cfnames->results() as $row) {
                        echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->other</td><td>$row->rpi</td><td>$row->rcopi</td><td>$row->funds</td> </tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                  }
                  ?>
                </div>
                <!-- Search 3 ends - by faculty name -->
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
  <script src="js/research/sponsoredResearch.js"></script>
</body>

</html>