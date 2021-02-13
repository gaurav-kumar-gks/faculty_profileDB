<?php
/* connect to DB */
require_once 'core/init.php';

/* User instance */
$user = new User();

/* check User login status */
if ($user->isLoggedIn()) {
} else {
  Redirect::to('index.php');
}

/* php for journal submit */
if (Input::exists() && isset($_POST['jsubmit'])) {

  // // checks and stores the row with the current user's email, name etc
  // $validatej = new Validate();
  // $validationJ = $validatej->checkfreg($user->data()->email);

  // if ($validationJ->passed()) {
   try {

      // instance of DB -> this will be used to run query
      $jins = DB::getInstance();

      // fetch variables that are already stored in User from studentinfo table 
      $fname = $user->data()->Name;
      $roll = $user->data()->{'Roll No'};
      $prog = $user->data()->prog;
      $dept = $user->data()->department;
      $ptype = 'j';
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

      // run insert query
      // either write the query or use insert function of DB class
      $jins->insert('faculty_profile_publications',
      array(
        'fname' => $fname,
        'roll' => $roll,
        'dept' => $dept,
        'prog' => $prog,
        'ptype' => $ptype,
        'title' => $jtitle,
        'authors' => $jauthors,
        'publication' => $jpublication,
        'publisher' => $jpublisher,
        'pdate' => $jyear,
        'pages' => $jpages,
        'onlineLink' => $jlink,
        'impactFactor' => $jimpact,
        'email' => $email,
        'aemail' => $aemail
      ));
      // $jins->query("INSERT INTO `faculty_profile_publications` (`fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `pages`, `onlineLink`, `impactFactor`,  `email`, `aemail`) VALUES ('$fname', '$roll', '$dept', '$prog', 'j', '$jtitle', '$jauthors', '$jpublication', '$jpublisher', '$jyear', '$jpages', '$jlink', '$jimpact', '$email', '$aemail')");

      // echo if journal added successfully 
      echo "<script type=\"text/javascript\">alert(\"Journal added\");</script>";
    } catch (Exception $e) {
      die($e->getMessage());
    }
  // } else {
  //   $errJ = $validationJ->errors()[0] . '\n' . $validationJ->errors()[1];
  //   echo "<script type='text/javascript'>alert('$errJ');</script>";
  // }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Homepage</title>


  <!-- CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/datepicker.css">
  <link rel="stylesheet" href="css/sidebar.css">

</head>

<body>
  <!-- Main body wrapper -->
  <!-- <div class="d-flex" id="wrapper"> -->
    <!-- 
    
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    
 -->
    <!-- Sidebar -->
    <div class="vertical-nav bg-dark" id="sidebar">

      <!-- Sidebar header -->
      <div class="py-4 px-3 mb-4 bg-dark">
        <div class="media-body">
          <h4 class="font-weight-white text-muted mb-0">
            <a class="nav-link" href="profile.php">
              <i class="fa fa-user"></i> <?php echo escape($user->data()->Name); ?>
            </a>
          </h4>
        </div>
      </div>
      <!-- Sidebar header ends -->

      <!-- Sidebar contents -->
      <!-- Area list -->
      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Area</p>
      <!-- Area list item 1 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Research Area
          </a>
        </li>
      </ul>
      <!-- Area list item 1 ends -->
      <!-- Area list ends -->
      <br>
      <!-- Teaching list -->
      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Teaching</p>
      <!-- Teaching list item 1 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Teaching
          </a>
        </li>
      </ul>
      <!-- Teaching list item 1 ends -->
      <!-- Teaching list ends -->
      <br>
      <!-- Research list -->
      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Research</p>
      <!-- Research list item 1 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Guidance
          </a>
        </li>
      </ul>
      <!-- Research list item 1 ends -->
      <!-- Research list item 2 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Sponsored Research
          </a>
        </li>
      </ul>
      <!-- Research list item 2 ends -->
      <!-- Research list item 3 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Consultancy
          </a>
        </li>
      </ul>
      <!-- Research list item 3 ends -->
      <!-- Research list item 4 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Development Work
          </a>
        </li>
      </ul>
      <!-- Research list item 4 ends -->
      <!-- Research list item 5 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Patent
          </a>
        </li>
      </ul>
      <!-- Research list item 5 ends -->
      <!-- Research list item 6 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            CopyRight
          </a>
        </li>
      </ul>
      <!-- Research list item 6 ends -->
      <!-- Research list item 7 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Technology Transfer
          </a>
        </li>
      </ul>
      <!-- Research list item 7 ends -->
      <!-- Research list ends -->
      <br>
      <!-- Honours List -->
      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Honours</p>
      <!-- Honours list item 1 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Fellow - Professional Body
          </a>
        </li>
      </ul>
      <!-- Honours list item 1 ends -->
      <!-- Honours list item 2 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Member - Professional Body
          </a>
        </li>
      </ul>
      <!-- Honours list item 2 ends -->
      <!-- Honours list item 3 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Member - Editorial Board
          </a>
        </li>
      </ul>
      <!-- Honours list item 3 ends -->
      <!-- Honours list item 4 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Awards
          </a>
        </li>
      </ul>
      <!-- Honours list item 4 ends -->
      <!-- Honours list item 5 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Fellowships
          </a>
        </li>
      </ul>
      <!-- Honours list item 5 ends -->
      <!-- Honours list item 6 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Invited Lectures
          </a>
        </li>
      </ul>
      <!-- Honours list item 6 ends -->
      <!-- Honours List ends -->
      <br>
      <!-- Publications list -->
      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Publications</p>
      <!-- Publications list item 1 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Journal
          </a>
        </li>
      </ul>
      <!-- Publications list item 1 ends -->
      <!-- Publications list item 2 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Conferences
          </a>
        </li>
      </ul>
      <!-- Publications list item 2 ends -->
      <!-- Publications list item 3 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Text Books
          </a>
        </li>
      </ul>
      <!-- Publications list item 3 ends -->
      <!-- Publications list item 4 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Book Chapter
          </a>
        </li>
      </ul>
      <!-- Publications list item 4 ends -->
      <!-- Publications list item 5 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Edited Volumes
          </a>
        </li>
      </ul>
      <!-- Publications list item 5 ends -->
      <!-- Publications list item 6 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Educational Packages
          </a>
        </li>
      </ul>
      <!-- Publications list item 6 ends -->
      <!-- Publications list item 7 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Other Publications
          </a>
        </li>
      </ul>
      <!-- Publications list item 7 ends -->
      <!-- Publications list ends -->
      <br>
      <!-- Activities list -->
      <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Activities</p>
      <!-- Activities list item 1 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Students Activities
          </a>
        </li>
      </ul>
      <!-- Activities list item 1 ends -->
      <!-- Activities list item 2 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Departmental Activities
          </a>
        </li>
      </ul>
      <!-- Activities list item 2 ends -->
      <!-- Activities list item 3 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Institute Activities
          </a>
        </li>
      </ul>
      <!-- Activities list item 3 ends -->
      <!-- Activities list item 4 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Professional Activities
          </a>
        </li>
      </ul>
      <!-- Activities list item 4 ends -->
      <!-- Activities list item 5 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Seminar, Conference, Workshop
          </a>
        </li>
      </ul>
      <!-- Activities list item 5 ends -->
      <!-- Activities list item 6 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Short Term Course
          </a>
        </li>
      </ul>
      <!-- Activities list item 6 ends -->
      <!-- Activities list item 7 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Visit Abroad
          </a>
        </li>
      </ul>
      <!-- Activities list item 7 ends -->
      <!-- Activities list item 8 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Other Academic Activities
          </a>
        </li>
      </ul>
      <!-- Activities list item 8 ends -->
      <!-- Activities list item 9 -->
      <ul class="nav flex-column bg-dark mb-0">
        <li class="nav-item">
          <a href="#" class="nav-link text-light font-italic bg-dark">
            <!-- <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> -->
            Any other information
          </a>
        </li>
      </ul>
      <!-- Activities list item 9 ends -->
      <!-- Activities list ends -->
      <br>
      <!-- Sidebar content ends -->
    </div>
    <!-- Sidebar ends -->


    <!-- Page Content -->
    <div class="page-content py-5" id="content">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark  py-2 fixed-top">
        <!-- Navbar container -->
        <div class="container">

          <!-- Sidebar toggler -->
          <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
          <!-- Sidebar toggler ends-->

          <!-- Homepage btn -->
          <a href="landingpagetest.php" class="navbar-brand">Homepage</a>
          <!-- Homepage btn ends -->

          <!-- Navbar toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Navbar toggler ends -->

          <!-- Navbar menu -->
          <div class="collapse navbar-collapse" id="navbarNav">

            <!--   
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
            </ul>
             -->

            <!-- Navbar menu items -->
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <!-- Username -->
              <li class="nav-item px-2">
                <a class="nav-link" href="profile.php">
                  <i class="fa fa-user"></i> <?php echo escape($user->data()->Name); ?>
                </a>
              </li>
              <!-- Username ends -->

              <!-- Logout -->
              <li class="nav-item px-2">
                <a href="logout.php" class="nav-link">
                  <i class="fa fa-user-times"></i> Logout
                </a>
              </li>
              <!-- Logout ends -->
            </ul>
            <!-- Navbar menu items ends -->

          </div>
          <!-- Navbar menu ends -->
        </div>
        <!-- Navbar container ends -->
      </nav>
      <!-- Navbar ends -->


      <!-- Body -->
      <!-- <div class="container-fluid"> -->

        <!-- Header -->
        <header id="main-header" class="py-5 bg-info text-white mt-0">
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <h1><i class="fa fa-gear"></i> Landing Page Header</h1>
              </div>
            </div>
          </div>
        </header>
        <br>
        <!-- Header ends -->

        <!-- Main section -->
        <section id="posts">
          <div class="container">
            <div class="row">
              <div class="col-md-9">

                <!-- Input Form -->
                <div class="card">
                  <!-- form header -->
                  <div class="card-header">
                    <h4><i class="fa fa-user text-center mx-auto"></i>Insert Journals</h4>
                  </div>
                  <!-- form header ends -->

                  <!-- form body -->
                  <div class="card-body">
                    <form action="landingpagetest.php" method="post">
                      <div class="form-group">
                        <label>Title of Paper<span class="m-1 text-primary">*</span></label>
                        <input type="text" class="form-control" name="jtitle" required>
                      </div>
                      <div class="form-group">
                        <label>Authors<span class="m-1 text-primary">*</span></label>
                        <input type="text" class="form-control" name="jauthors" required>
                      </div>
                      <div class="form-group">
                        <label>Name of journal<span class="m-1 text-primary">*</span></label>
                        <input type="text" class="form-control" name="jpublication" required>
                      </div>
                      <div class="form-group">
                        <label>Name of Publisher<span class="m-1 text-primary">*</span></label>
                        <input type="text" class="form-control" name="jpublisher" required>
                      </div>

                      <!-- month and year picker -->
                      <div class="form-group">
                        
                          <label>Published Year<span class="m-1 text-primary">*</span></label>
                          <input type="text" class="form-control" name="jyear" placeholder="click on icon to select month-year" id="datepicker" required>
                          <!-- <span class="add-on"><i class="icon-th"></i></span> -->
                        
                      </div>
                      <!-- month and year picker ends -->

                      <div class="form-group">
                        <label>Journal Volume Pages</label>
                        <input type="text" class="form-control" name="jpages">
                      </div>
                      <div class="form-group">
                        <label>Journal Online link</label>
                        <input type="text" class="form-control" name="jlink">
                      </div>
                      <div class="form-group">
                        <label>Journal Impact factor</label>
                        <input type="text" class="form-control" name="jimpact">
                      </div>
                      <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-info" name="jsubmit">

                    </form>
                  </div>
                  <!-- form body ends -->
                </div>
                <!-- Input form ends -->

                <!-- Show list of entries -->
                <!-- to do - edit/delete functionality -->
                <br>
                <div class="card">
                  <div class="card-header">
                    <h4>Your Journal Publications</h4>
                  </div>
                  <div class="table-responsive">
                    <?php
                    // instance of DB -> this will be used to run query
                    $q = DB::getInstance();
                    $validateJ2 = new Validate();
                    // fetch variables that are already stored in User from studentinfo table 

                    $email = $validateJ2->getemail();
                    
                    /* query */
                    $q->query("SELECT title, authors, publication, publisher, YEAR(pdate), onlineLink, impactFactor FROM faculty_profile_publications WHERE email='$email' AND ptype='j' ORDER BY pdate DESC");
                    

                    /* query result */
                    if ($q->count()) {

                      /* result table header */
                      echo "<table class=\"table table-striped table-hover\">";
                      echo "<thead class=\"thead-inverse\">";
                      echo "<tr><th>Title</th><th>Authors</th><th>Publication</th><th>Publisher</th><th>Year</th><th>Online Link</th><th>Impact Factor</th></tr></thead>";
                      echo "<tbody>";

                      /* result table rows */
                      foreach ($q->results() as $row) {
                        echo "<tr><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->publisher</td><td>$row->pdate</td><td>$row->onlineLink</td><td> $row->impactFactor</td></tr>\n";
                      }
                      echo "</tbody></table>";
                    }
                    ?>
                  </div>


                </div><br>
                <!-- list of entries ends -->


                <!-- Search Functions -->
                <div class="card">
                  <div class="card-header">
                    <h4><i class="fa fa-search mr-3"></i>Search Journals</h4>
                  </div>
                  <br>
                  <br>

                  <!-- Search 1- by journal name -->
                  <form action="landingpagetest.php">
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
                  <form action="landingpagetest.php">
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
                  <form action="landingpagetest.php">
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
                  <form action="landingpagetest.php">
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
        <!-- Main section ends -->

        <!-- Footer -->
        <footer id="main-footer" class="bg-dark text-white mt-5 pt-3">
          <div class="container">
            <div class="row">
              <div class="col">
                <p class="text-muted text-center">Profile Dashboard</p>
              </div>
            </div>
          </div>
        </footer>

        <!-- Footer ends -->
      <!-- </div> -->
      <!-- Body ends -->
    </div>
    <!-- Page-content ends -->
  <!-- </div> -->
  <!-- Main body wrapper end -->



  <!-- floating to the top button -->
  <a href="#" id="scroll" style="display: none;"><span></span></a>

  <!-- core JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/others.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>