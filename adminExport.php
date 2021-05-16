<?php
require_once 'core/init.php';
//echo $token;
$user = new User();

/*   token validification not working for multiple forms on same page 
  token validification working and verified for single form on a page
  - just uncomment the if Token::check Input::get if there is only one form on the page
 */
if ($user->isLoggedIn()) {
  if($user->data()->prog!="admin")
  {
    echo "yes";
    //Redirect::to('index.php');
  }
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
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <script>
      function hideDepartment(){
      if ($("#department").is(":checked")) {
          $("#select_department").removeAttr("disabled");
      }
      if ($("#institute").is(":checked")) {
          $("#select_department").attr("disabled","disabled");
      }

      }
  </script>

      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2 fixed-top">
        <div class="container">
          <a href="landingpage.php" class="navbar-brand">Homepage</a>
          

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
        </div>
      </nav>

      <br><br>
      
    


    
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
                    <h4>Admin Export</h4>
                  </div>
                  <br>
                  <form action="adminExportDepartment.php" method="post">

                    <div class="form-group">
                      <!-- <label>Name of the Awards<span class="m-1 text-primary">*</span></label> -->
                      <!-- <input type="text" class="form-control" name="nameOfAward" placeholder="Name of the Awards" required> -->

                      <!-- <label for="year">Export on the basis of: </label>
                      <select name="exportAdmin" id="exportAdmin">
                        <option value="pdf">Department</option>
                        <option value="text">Institute</option>
                      </select><br><br> -->

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
                      <br><br>



                      <!-- <label for="cars">Choose a car:</label>

                      <select name="dept" id="cars">
                        <option value="CS">CS</option>
                        <option value="ME">ME</option>
                        <option value="EE">EE</option>
                        <option value="CE">CE</option>
                      </select> -->



                      <!-- Export on the basis of:&nbsp;&nbsp;&nbsp;<input type="radio" name="select_basis" id="department" value="department" onclick="hideDepartment()" required>Department&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="select_basis" id="institute" value="institute" onclick="hideDepartment()" required>Institute
                      <br><br> -->

                      <label for="dept">Department &nbsp;&nbsp;&nbsp;</label>
                      <select id="select_department" name="dept" class="required"  required>
                            <option value="" disabled="disabled" selected>--Choose--</option>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");
                      
                            if (!$conn)
                            die("Unable to connect to database");

                        // echo $roll;
                          $stmt ="Select distinct(department) from studentinfo order by department asc"; 
                  
                        // echo $stmt;
                        $result = mysqli_query($conn, $stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <?php 
                            $val= $row['department'];
                            ?>
                            <option value="<?php echo $val ?>"><?php echo $row['department']; ?></option>
                            <!-- <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                            <option value="Chemical Engineering">Chemical Engineering</option> -->
                            <?php
                          }
                          ?>
                    </select>
                    <br><br>
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