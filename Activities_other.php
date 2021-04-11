<?php
$code = 'OA';
$activity_type = 'Information';
$field = 'Information';

require_once 'core/init.php';
//echo $token;
$user = new User();

/*   token validification not working for multiple forms on same page 
  token validification working and verified for single form on a page
  - just uncomment the if Token::check Input::get if there is only one form on the page
 */
if ($user->isLoggedIn()) {
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

      $activity=Input::get('activity');
      $activityDate=Input::get('activityDate');
      // run insert query
      $conn=mysqli_connect("127.0.0.1","root","","faculty_profile_db");
      if(!$conn)
      die("Unable to connect to database");

      // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
      
      $stmt="INSERT INTO `faculty_profile_activities` (`sno`, `name`, `roll`, `dept`,`activityId`,`activity`, `activityDate`, `lastUpdated`) VALUES (NULL, '$fname', '$roll', '$dept', '$code', '$activity', '$activityDate',NULL)";
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

      $activity=Input::get('activity');
      $activityDate=Input::get('activityDate');
      // run insert query
      $conn=mysqli_connect("127.0.0.1","root","","faculty_profile_db");
      if(!$conn)
      die("Unable to connect to database");

      // echo "<br><br><br><br><br><br><br><br>";

      // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
      $stmt="Delete from `faculty_profile_activities` where activity='$activity' and roll='$roll' and activityDate = '$activityDate' and activityId='$code'";
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

      $prev_activity=Input::get('prev_activity');
      $prev_activityDate=Input::get('prev_activityDate');

      $activity=Input::get('activity');
      $activityDate=Input::get('activityDate');


      // run insert query
      $conn=mysqli_connect("localhost","root","","faculty_profile_db");
      if(!$conn)
      die("Unable to connect to database");

      // $stmt="insert into discussion values('$email','$dateTime','$club_id','$text');";
      $stmt="Update `faculty_profile_activities` set activity='$activity',activityDate='$activityDate' where activity='$prev_activity' and roll='$roll' and activityDate = '$prev_activityDate'";
      
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
    <title>Sidebar 02</title>
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
          <a href="landingpage.php" class="navbar-brand">Homepage</a>
          <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item px-2">
                <a href="projects.php" class="nav-link">Projects</a>
              </li>
              <li class="nav-item px-2">
                <a href="conferences.php" class="nav-link">Conferences</a>
              </li>
              <li class="nav-item px-2">
                <a href="journals.php" class="nav-link">Journals</a>
              </li>
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  More items  </a>
          <ul class="dropdown-menu">
          <!-- <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li> -->
          <li><a class="dropdown-item dropdown-toggle" href="#"> Publications </a>
             <ul class="submenu dropdown-menu">
              <li><a class="dropdown-item" href="">Submenu item 1</a></li>
              <li><a class="dropdown-item" href="">Submenu item 2</a></li>
              <li><a class="dropdown-item" href="">Submenu item 3</a></li>
           </ul>
          </li>
          <li><a class="dropdown-item dropdown-toggle" href="#"> Activities </a>
             <ul class="submenu dropdown-menu">
              <li><a class="dropdown-item" href="Student_Activity.php?activity=Student Activity">Student Activities</a></li>
              <li><a class="dropdown-item" href="Student_Activity.php?activity=Departmental Activities">Departmental Activities</a></li>
              <li><a class="dropdown-item" href="Student_Activity.php?activity=Institute Activities">Institute Activities</a></li>
              <li><a class="dropdown-item" href="Student_Activity.php?activity=Professional Activities">Professional Activities</a></li>
              <li><a class="dropdown-item" href="Activities_SCW.php">Seminar, Conference, Workshop</a></li>
              <li><a class="dropdown-item" href="Activities_STC.php">Short Term Course</a></li>
              <li><a class="dropdown-item" href="Activities_VA.php">Visit Abroad</a></li>
              <li><a class="dropdown-item" href="Student_Activity.php?activity=Other Academic Activity">other Academic Activity</a></li>
              <li><a class="dropdown-item" href="Student_Activity.php?activity=Any Other Information">Any Other Information</a></li>
           </ul>
          </li>
          <li><a class="dropdown-item dropdown-toggle" href="#"> Dropdown item 4 </a>
             <ul class="submenu dropdown-menu">
              <li><a class="dropdown-item" href="">Another submenu 1</a></li>
              <li><a class="dropdown-item" href="">Another submenu 2</a></li>
              <li><a class="dropdown-item" href="">Another submenu 3</a></li>
              <li><a class="dropdown-item" href="">Another submenu 4</a></li>
           </ul>
          </li>
          <li><a class="dropdown-item" href="#"> Dropdown item 4 </a></li>
          <li><a class="dropdown-item" href="#"> Dropdown item 5 </a></li>
          </ul>
      </li>
            </ul>

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
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4 pt-5">
          <h1><a href="#" class="logo">Dashboard</a></h1>
          <ul class="list-unstyled components mb-5">

            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Publication</a>
              <ul class="collapse list-unstyled show" id="home">
                
              </ul>
            </li>

            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Activity</a>
              <ul class="collapse list-unstyled show" id="homeSubmenu">
                <li>
                    <a href="#">Student Activities</a>
                </li>
                <li>
                    <a href="#">Departmental Activities</a>
                </li>
                <li>
                    <a href="#">Institute Activities</a>
                </li>
                <li>
                    <a href="#">Professional Activities</a>
                </li>
                <li>
                    <a href="Activities_SCW.php">Seminar, Conference, Workshops</a>
                </li>
                <li>
                    <a href="Activities_STC">Short Term Course</a>
                </li>
                <li>
                    <a href="Activities_VA.php">Visit Abroad</a>
                </li>
                <li>
                    <a href="#">Other Academic Activity</a>
                </li>
                <li>
                    <a href="#">Any Other Information</a>
                </li>
              </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse show in list-unstyled" id="pageSubmenu">
                <li>
                    <a href="test.html">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">Portfolio</a>
            </li>
            <li>
              <a href="#">Contact</a>
            </li>
          </ul>

          <!-- <div class="mb-5">
            <h3 class="h6">Subscribe for newsletter</h3>
            <form action="#" class="colorlib-subscribe-form">
              <div class="form-group d-flex">
                <div class="icon"><span class="icon-paper-plane"></span></div>
                <input type="text" class="form-control" placeholder="Enter Email Address">
              </div>
            </form>
          </div> -->


        </div>
      </nav>

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

                $activity=Input::get('activity');
                $activityDate=Input::get('activityDate');
                ?>

              <div class="card">
                  <div class="card-header">
                    <h4><i class='fa fa-edit'></i>Edit <?php echo "$activity_type"?></h4>
                  </div>
                  <br>
                  <form action="Activities_OAA.php" method="post">
                    <input type='hidden' name='prev_activity' value=<?php echo "'$activity'" ?> >
                    <input type='hidden' name='prev_activityDate' value=<?php echo "'$activityDate'" ?> >
                    <div class="form-group">
                      <label><?php echo "$field"?><span class="m-1 text-primary">*</span></label>
                      <input type="text" value=<?php echo "'$activity'"?> class="form-control" name="activity" placeholder="<?php echo "$field"?>" required>
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
                    <h4><i class="fa fa-plus"></i> <?php echo "$activity_type"?></h4>
                  </div>
                  <br>
                  <form action="Activities_OAA.php" method="post">

                    <div class="form-group">
                      <label><?php echo "$field"?><span class="m-1 text-primary">*</span></label>
                      <input type="text" class="form-control" name="activity" placeholder="<?php echo "$field"?>" required>
                    </div>
                    <div class="form-group">
                      <label for="student_activity_date">Activity Date:</label>
                      <input type="date" id="student_activity_date" name="activityDate">
                    </div>
                    <input type="submit" class="btn btn-info" name="csubmit" value="Submit">
                  </form>

                </div>
                <br>
              <?php }?>


            <div class="card">
                  <div class="card-header">
                    <h4><i class="fa fa-file-text"></i> Added Records</h4>
                  </div>
                  <table class=\"table table-striped table-hover\">
                    <thead class=\"thead-inverse\">
                      <tr>
                        <th></th>
                        <th><?php echo "$field"?></th>
                        <th>Activity Date</th>
                      </tr></thead>
                      
                      <tbody>

                      <?php
                      $roll = $user->data()->{'Roll No'};
                      $conn=mysqli_connect("127.0.0.1","root","","faculty_profile_db");
                      if(!$conn)
                      die("Unable to connect to database");
                      // echo $roll;
                        $stmt="select * from faculty_profile_activities where roll='$roll' and activityId='$code';";
                        // echo $stmt;
                        $result=mysqli_query($conn,$stmt);
                        while($row=mysqli_fetch_assoc($result))
                        {
                      ?>
                      <tr><td>

                        <form action="Activities_OAA.php" method="post">
                            <input type='hidden' name='activity' value=<?php echo "'"; echo $row['activity']; echo "'";?> >
                            <input type='hidden' name='activityDate' value=<?php echo "'"; echo $row['activityDate']; echo "'";?> >
                            <input type="submit" class="btn btn-info" name="edit_entry" value="Edit" style="background-color: green">
                        </form>
                      </td>
                      <td><?php echo $row['activity']?></td>
                      <td><?php echo $row['activityDate']?></td>
                      <td>
                        
                       <form action="Activities_OAA.php" method="post">
                            <input type='hidden' name='activity' value=<?php echo "'"; echo $row['activity']; echo "'";?> >
                            <input type='hidden' name='activityDate' value=<?php echo "'"; echo $row['activityDate']; echo "'";?> >
                            <input type="submit" class="btn btn-info" name="delete_entry" value="Delete" style="background-color: red">
                      </form>

                      </td></tr>
                      <?php
                    } ?>

                      </tbody></table>

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
  </body>
</html>