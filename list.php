<?php
require_once 'core/init.php';
//echo $token;
$user = new User();

/*   token validification not working for multiple forms on same page 
  token validification working and verified for single form on a page
  - just uncomment the if Token::check Input::get if there is only one form on the page
 */
if ($user->isLoggedIn()) {
    if($user->data()->prog=="admin")
      Redirect::to('adminExport.php');
} else {
  Redirect::to('index.php');
}

/*  PHP FOR JOURNAL SUBMIT - MULTIPLE AUTHORS PER JOURNALS verified*/
if (Input::exists() && isset($_POST['jsubmit'])) {

  // checks and stores the row with the current user's email, name etc
  $validatej = new Validate();
  $validationJ = $validatej->checkfreg($user->data()->email);

  if ($validationJ->passed()) {
    try {

      // instance of DB -> this will be used to run query
      $jins = DB::getInstance();

      // fetch variables that are already stored in User from studentinfo table 
      $fname = $validatej->getname();
      $roll = $validatej->getroll();
      $prog = $validatej->getprog();
      $dept = $validatej->getdept();
      $email = $validatej->getemail();
      $aemail = $validatej->getaemail();

      // columns that we get from form input
      $jtitle = Input::get('jtitle');
      $jauthors = Input::get('jauthors');
      $jimpact = Input::get('jimpact');
      $jpublication = Input::get('jpublication');
      $jpublisher = Input::get('jpublisher');
      $jyear = Input::get('jyear');
      $jpages = Input::get('jpages');
      $jlink = Input::get('jlink');

      // run insert query
      // either write the query or use insert function of DB class
      $jins->query("INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `email`, `aemail`) VALUES (NULL, $fname, $roll, $dept, $prog, 'j', $jtitle, $jauthors, $jpublication, $jpublisher, $jyear, NULL, $jpages, $jlink, NULL, $jimpact, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $email, $aemail)");

      // echo if journal added successfully 
      // echo "<script type=\"text/javascript\">alert(\"Journal added\");</script>";
    } catch (Exception $e) {
      die($e->getMessage());
    }
  } else {
    $errJ = $validationJ->errors()[0] . '\n' . $validationJ->errors()[1];
    echo "<script type='text/javascript'>alert('$errJ');</script>";
  }
}

/*  PHP FOR CONFERENCES SUBMIT */
if (Input::exists() && isset($_POST['csubmit'])) {

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

      $nameOfAward=Input::get('nameOfAward');
      $year=Input::get('year');
      $activityDate=Input::get('activityDate');
      // run insert query
      $conn=mysqli_connect("127.0.0.1","root","jrtalent","faculty_profile_db");
      if(!$conn)
      die("Unable to connect to database");

      // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
      
      $stmt="INSERT INTO `faculty_profile_honours_a` (`sno`, `name`, `roll`, `dept`, `nameOfAward`,`year`, `activityDate`, `lastUpdated`) VALUES (NULL, '$fname', '$roll', '$dept', '$nameOfAward', $year, '$activityDate',NULL)";
      // echo "<br><br><br><br><br><br><br>";
      // echo $stmt;
      $result=mysqli_query($conn,$stmt);
      // // echo if conference added successfully 
      // echo "<script type=\"text/javascript\">alert(\"Visit Abroad Added successfully\");</script>";
    } catch (Exception $e) {
      //echo "Here8";
      die($e->getMessage());
    }
  } 


  if (Input::exists() && isset($_POST['delete_entry'])) {

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

      $nameOfAward=Input::get('nameOfAward');
      $year=Input::get('year');
      $activityDate=Input::get('activityDate');
      // run insert query
      $conn=mysqli_connect("127.0.0.1","root","jrtalent","faculty_profile_db");
      if(!$conn)
      die("Unable to connect to database");

      // echo "<br><br><br><br><br><br><br><br>";

      // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
      $stmt="Delete from `faculty_profile_honours_a` where nameOfAward='$nameOfAward' and year=$year and roll='$roll' and activityDate = '$activityDate'";
      $result=mysqli_query($conn,$stmt);
      // // // echo if conference added successfully 
      // echo "<script type=\"text/javascript\">alert(\"Entry Deleted successfully\");</script>";
    } catch (Exception $e) {
      //echo "Here8";
      die($e->getMessage());
    }
  } 



  if (Input::exists() && isset($_POST['edit'])) {

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

      $nameOfAward=Input::get('nameOfAward');
      $year=Input::get('year');
      $activityDate=Input::get('activityDate');

      $prev_nameOfTheBody=Input::get('prev_nameOfTheBody');
      $prev_yearAwarded=Input::get('prev_yearAwarded');
      $prev_activityDate=Input::get('prev_activityDate');



      // run insert query
      $conn=mysqli_connect("localhost","root","","faculty_profile_db");
      if(!$conn)
      die("Unable to connect to database");

      // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
      $stmt="Update `faculty_profile_honours_a` set nameOfAward='$nameOfAward', year=$year, activityDate='$activityDate' where nameOfAward='$prev_nameOfTheBody' and year=$prev_yearAwarded and roll='$roll' and activityDate = '$prev_activityDate'";
      
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
      $result=mysqli_query($conn,$stmt);
      // // // echo if conference added successfully 
      // echo "<script type=\"text/javascript\">alert(\"Entry Deleted successfully\");</script>";
    } catch (Exception $e) {
      //echo "Here8";
      die($e->getMessage());
    }
  } 



    // else {
//     $err3 = $validationC->errors()[0] . '\n' . $validationC->errors()[1];
//     echo "<script type='text/javascript'>alert('$err3');</script>";
//   }
// }

/*  PHP FOR PROJECT SUBMISSION */
if (Input::exists() && isset($_POST['psubmit'])) {
  //if (Token::check(Input::get('token'))) {
  $validatepr = new Validate();
  $validationPR = $validatepr->checkfreg($user->data()->email);
  if ($validationPR->passed()) {
    try {

      // we'll run query on this instance
      $prins = DB::getInstance();

      // fetch variables that are already stored in User from studentinfo table 
      $fname = $validatepr->getname();
      $roll = $validatepr->getroll();
      $prog = $validatepr->getprog();
      $dept = $validatepr->getdept();
      $email = $validatepr->getemail();
      $aemail = $validatepr->getaemail();
      // echo $fid;

      // columns from the form input 
      $prname = Input::get('ptitle');
      $prole = Input::get('projectpos');
      $prbudget = Input::get('pbudget');
      $prsponsor = Input::get('psponsor');
      $prduration = Input::get('pduration');
      $prostat = Input::get('prostat');

      // run insert query
      $jins->query("INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `email`, `aemail`) VALUES (NULL, $fname, $roll, $dept, $prog, 'pr', $prname, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $prduration, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $prbudget, $prsponsor, $prole, $prostat, $email, $aemail)");

      //echo "Here7";
      echo "<script type=\"text/javascript\">alert(\"Project entered\");</script>";
    } catch (Exception $e) {
      //echo "Here8";
      die($e->getMessage());
    }
  } else {
    $err5 = $validationPR->errors()[0] . '\n' . $validationPR->errors()[1];
    echo "<script type='text/javascript'>alert('$err5');</script>";
  }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Export</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
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
                <a href="Activities_IA.php">Institute Activities</a>
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
              <!-- JOURNALS -->
              <!-- Add Visit Abroad -->
              <?php if (Input::exists() && isset($_POST['edit_entry'])){

                $nameOfAward=Input::get('nameOfAward');
                $year=Input::get('year');
                $activityDate=Input::get('activityDate');
                ?>

              <div class="card">
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i>Edit Information</h4>
                  </div>
                  <br>
                  <form action="Honours_A.php" method="post">
                    <input type='hidden' name='prev_nameOfTheBody' value=<?php echo "'$nameOfAward'" ?> >
                    <input type='hidden' name='prev_yearAwarded' value=<?php echo "'$year'" ?> >
                    <input type='hidden' name='prev_activityDate' value=<?php echo "'$activityDate'" ?> >
                    <div class="form-group">
                      <label>Name of the Awards<span class="m-1 text-primary">*</span></label>
                      <input type="text" value=<?php echo "'$nameOfAward'"?> class="form-control" name="nameOfAward" placeholder="Name of the Awards" required>
                    </div>
                    <div class="form-group">
                      <label>Year<span class="m-1 text-primary">*</span></label>
                      <input type="number" value=<?php echo "'$year'"?> class="form-control" name="year" placeholder="Year" required>
                    </div>
                    <div class="form-group">
                      <label for="student_activity_date">Activity Date:</label>
                      <input type="date" id="student_activity_date" value=<?php echo "'$activityDate'"?> name="activityDate">
                    </div>
                    <input type="submit" class="btn btn-info" name="edit" value="Submit">
                  </form>

                </div>
                <br>
              <?php
            }
            else
              {?>
            <div class="card">
                  <div class="card-header">
                    <h4>Select the Fields to export</h4>
                  </div>
                  <br>
                  <form action="facultyExport.php" method="post">

                    <div class="form-group">
                      <!-- <label>Name of the Awards<span class="m-1 text-primary">*</span></label> -->
                      <!-- <input type="text" class="form-control" name="nameOfAward" placeholder="Name of the Awards" required> -->

                      <label for="year">Select the file format: </label>
                      <select name="format" id="format">
                        <option value="pdf">pdf file</option>
                        <option value="text">text file</option>
                      </select><br><br>
                      

                      <label for="year">Select the year</label>&nbsp;&nbsp;&nbsp;
                      <label for="year">From :</label>
                      <select name="startyear" id="startyear">
                        <?php
                        $year=(int)date("Y")-1;
                        while($year>=1965)
                        {
                          $val=(string)$year;
                          echo "<option value='$val'>$val</option>";
                          $year=$year-1;
                        }
                        ?>
                      </select>
                      <label for="year">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To :</label>
                      <select name="endyear" id="endyear">
                        <?php
                        $year=(int)date("Y");
                        while($year>=1965)
                        {
                          $val=(string)$year;
                          echo "<option value='$val'>$val</option>";
                          $year=$year-1;
                        }
                        ?>
                      </select>
                    </div>

                    <label>AREA</label>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="RA" name="RA" value="Research Area">
                      <label>Research Area<span class="m-1 text-primary"></span></label>
                    </div>

                    <label>TEACHING</label>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="T" name="T" value="Teaching">
                      <label>Teaching<span class="m-1 text-primary"></span></label>
                    </div>

                    <label>RESEARCH</label>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="G" name="G" value="Guidance">
                      <label>Guidance<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="OSRP" name="OSRP" value="Ongoing Sponsored Research Project">
                      <label>Ongoing Sponsored Research Project<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="OCP" name="OCP" value="Ongoing Consultancy Project">
                      <label>Ongoing Consultancy Project<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="DW" name="DW" value="Development Work">
                      <label>Development Work<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="P" name="P" value="P">
                      <label>Patents <span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="C" name="C" value="C">
                      <label>Copyrights <span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="TT" name="TT" value="TT">
                      <label>Technology Transfers <span class="m-1 text-primary"></span></label>
                    </div>

                    <label>HONOURS</label>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="FPB" name="FPB" value="FPB">
                      <label>Fellow - Professional Body <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="MPB" name="MPB" value="MPB">
                      <label>Member - Professional Body <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="MEBJ" name="MEBJ" value="MEBJ">
                      <label>Member Editorial Board of Journal <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="A" name="A" value="A">
                      <label>Awards<span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="F" name="F" value="F">
                      <label>Fellowship (Only for year 2020-21)<span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="IL" name="IL" value="IL">
                      <label>Invited Lectures during 2020-21 <span class="m-1 text-primary"></span></label>
                    </div>



                    <label>PUBLICATION</label>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="J" name="J" value="J">
                      <label>Journal<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="CON" name="CON" value="CON">
                      <label>Conference <span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="TB" name="TB" value="TB">
                      <label>Text Books <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="BC" name="BC" value="BC">
                      <label>Book Chapter<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="EV" name="EV" value="EV">
                      <label>Edited Volumes <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="EP" name="EP" value="EP">
                      <label>Educational Packages <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="OP" name="OP" value="OP">
                      <label>Other Publications <span class="m-1 text-primary"></span></label>
                    </div>



                    <label>ACTIVITY</label>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="SA" name="SA" value="SA">
                      <label>Student Activities<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="DA" name="DA" value="DA">
                      <label>Departmental Activities <span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="IA" name="IA" value="IA">
                      <label>Institute Activities <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="PA" name="PA" value="PA">
                      <label>Professional Activities<span class="m-1 text-primary"></span></label>
                    </div>
                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="SCW" name="SCW" value="SCW">
                      <label>Seminar, Conferences and Workshops <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="STC" name="STC" value="STC">
                      <label>Short Term Courses <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="VA" name="VA" value="VA">
                      <label>Visit Abroad <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="OAA" name="OAA" value="OAA">
                      <label>Other Academic Activities <span class="m-1 text-primary"></span></label>
                    </div>

                    <div class="form-group">
                      <input type="checkbox" checked="checked" id="AOI" name="AOI" value="AOI">
                      <label>Any Other Information <span class="m-1 text-primary"></span></label>
                    </div>

                    <input type="submit" class="btn btn-info" name="export" value="Export">
                  </form>

                </div>
                <br>
              <?php }?>

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
  </body>
</html>