<?php
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
      echo "<script type=\"text/javascript\">alert(\"Journal added\");</script>";
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

  $validatec = new Validate();
  //echo "Here1";


  $validationC = $validatec->checkfreg($user->data()->email);
  if ($validationC->passed()) {
    try {
      //echo "Here4";

      // we'll run query on this instance
      $cins = DB::getInstance();

      // fetch variables that are already stored in User from studentinfo table 
      $fname = $validatec->getname();
      $roll = $validatec->getroll();
      $prog = $validatec->getprog();
      $dept = $validatec->getdept();
      $email = $validatec->getemail();
      $aemail = $validatec->getaemail();
      // echo $fid;

      // columns from the form input 
      $cname = Input::get('cname');
      $cauthors = Input::get('cauthors');
      $ctitle = Input::get('ctitle');
      $cyear = Input::get('cyear');
      $clink = Input::get('clink');
      $clocation = Input::get('clocation');

      // run insert query
      $jins->query("INSERT INTO `faculty_profile_publications` (`sno`, `fname`, `roll`, `dept`, `prog`, `ptype`, `title`, `authors`, `publication`, `publisher`, `pdate`, `location`, `pages`, `onlineLink`, `duration`, `impactFactor`, `bookTitle`, `bookType`, `editedVolume`, `eduPackageType`, `eduPackageLevel`, `patentNo`, `projectBudget`, `projectSponser`, `projectRole`, `projectStatus`, `email`, `aemail`) VALUES (NULL, $fname, $roll, $dept, $prog, 'c', $ctitle, $cauthors, NULL, $cname, $cyear, $clocation, NULL, $clink, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $email, $aemail)");

      // echo if conference added successfully 
      echo "<script type=\"text/javascript\">alert(\"Conference added\");</script>";
    } catch (Exception $e) {
      //echo "Here8";
      die($e->getMessage());
    }
  } else {
    $err3 = $validationC->errors()[0] . '\n' . $validationC->errors()[1];
    echo "<script type='text/javascript'>alert('$err3');</script>";
  }
}

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

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Homepage</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/datepicker.css">
  <style>
    #confselect:focus option:first-of-type {
      display: none;
    }

    #jourselect:focus option:first-of-type {
      display: none;
    }

    #proselect:focus option:first-of-type {
      display: none;
    }

    #prostatus:focus option:first-of-type {
      display: none;
    }
  </style>

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

  <!-- HEADER -->
  <header id="main-header" class="py-5 bg-info text-white mt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1><i class="fa fa-gear"></i> Dashboard</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <a href="#" class="btn btn-block btn-outline-dark" data-toggle="modal" data-target="#addProjectModal">
            <i class="fa fa-plus"></i> Add Project
          </a>
        </div>
        <div class="col-md-4">
          <a href="#" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addConferenceModal">
            <i class="fa fa-plus"></i> Add Conference
          </a>
        </div>
        <div class="col-md-4">
          <a href="#" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addJournalModal">
            <i class="fa fa-plus"></i> Add Journal
          </a>
        </div>
      </div>
    </div>
  </section>



  <!-- MAIN AND SIDEBAR -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <!-- MAIN  -->
        <div class="col-md-9">
          <!-- JOURNALS -->
          <div class="card">
            <div class="card-header">
              <h4>Latest Journals</h4>
            </div>

            <div class="table-responsive">
              <?php
              // $s = DB::getInstance();
              // $s->query("SELECT f_name,f_dept,fac_rank,fac_publisher,j_title, j_year FROM faculty, fac_publication, journals WHERE faculty.f_id = fac_publication.fac_fid AND fac_publication.fac_jid = journals.j_id ORDER BY journals.j_year DESC, fac_publication.fac_rank LIMIT 5");

              // if ($s->count()) {
              //   echo "<table class=\"table table-striped table-hover\">";
              //   echo "<thead class=\"thead-inverse\">";
              //   echo "<tr><th>Name</th><th>Dept</th><th>Author Rank</th><th>Publisher</th><th>Title</th><th>Year</th></tr></thead>";
              //   echo "<tbody>";

              //   foreach ($s->results() as $row) {
              //     echo "<tr><td>$row->f_name</td><td>$row->f_dept</td><td>$row->fac_rank</td><td>$row->fac_publisher</td><td>$row->j_title</td><td>$row->j_year</td></tr>\n";
              //   }
              //   echo "</tbody></table>";
              // }
              ?>
            </div>
          </div>
          <br>
          <!-- SEARCH JOURNALS -->
          <div class="card">
            <div class="card-header">
              <h4><i class="fa fa-search mr-3"></i>Search Journals</h4>
            </div>
            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="JnameS" class="form-control" placeholder="Search By Journal Name">
                <input type="submit" name="JnameSearch" class="btn btn-secondary">
              </div>
            </form>
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

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" name="JpnameS" required class="form-control" placeholder="Search By Publisher Name">
                <input type="submit" name="JpnameSearch" class="btn btn-secondary">
              </div>
            </form>
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

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" name="JyearS" required class="form-control" placeholder="Search By Journals published in last X years">
                <input type="submit" name="JyearSearch" class="btn btn-secondary">
              </div>
            </form>
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

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" name="JfieldS" required class="form-control" placeholder="Search By Field of Publication">
                <input type="submit" name="JfieldSearch" class="btn btn-secondary">
              </div>
            </form>

            <div class="table-responsive">
              <?php
              // if (strlen(Input::get('JfieldS')) > 0) {
              //   $jfields = DB::getInstance();
              //   $jfield = Input::get('JfieldS');

              //   $jfields->query("SELECT f_name,f_dept, fac_field, fac_rank,fac_publisher,j_title, j_year FROM faculty, fac_publication, journals WHERE faculty.f_id = fac_publication.fac_fid AND fac_publication.fac_jid = journals.j_id AND fac_publication.fac_field LIKE '%$jfield%' ORDER BY journals.j_year DESC, fac_publication.fac_rank ASC LIMIT 20");

              //   if ($jfields->count()) {
              //     echo "<table class=\"table table-striped table-hover\">";
              //     echo "<thead class=\"thead-inverse\">";
              //     echo "<tr><th>Name</th><th>Dept</th><th>Author Rank</th><th>Publisher</th><th>Title</th><th>Year</th></tr></thead>";
              //     echo "<tbody>";

              //     foreach ($jfields->results() as $row) {
              //       echo "<tr><td>$row->f_name</td><td>$row->f_dept</td><td>$row->fac_rank</td><td>$row->fac_publisher</td><td>$row->j_title</td><td>$row->j_year</td></tr>\n";
              //     }
              //     echo "</tbody></table>";
              // }
              //}
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" name="JfnameS" required class="form-control" placeholder="Search By Faculty Name">
                <input type="submit" name="JfnameSearch" class="btn btn-secondary">
              </div>
            </form>
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
          </div>
          <br>
          <!-- CONFERENCES -->
          <div class="card">
            <div class="card-header">
              <h4>Latest Conferences</h4>
            </div>

            <div class="table-responsive">
              <?php
              // $c = DB::getInstance();
              // $c->query("SELECT f_name,f_dept,fac_rank, fac_publisher,c_title, c_year FROM faculty, fac_publication, conferences WHERE faculty.f_id = fac_publication.fac_fid AND fac_publication.fac_cid = conferences.c_id ORDER BY conferences.c_year DESC, fac_publication.fac_rank LIMIT 5");

              // if ($c->count()) {
              //   echo "<table class=\"table table-striped table-hover\">";
              //   echo "<thead class=\"thead-inverse\">";
              //   echo "<tr><th>Name</th><th>Dept</th><th>Author Rank</th><th>Publisher</th><th>Title</th><th>Year</th></tr></thead>";
              //   echo "<tbody>";

              //   foreach ($c->results() as $row) {
              //     echo "<tr><td>$row->f_name</td><td>$row->f_dept</td><td>$row->fac_rank</td><td>$row->fac_publisher</td><td>$row->c_title</td><td>$row->c_year</td></tr>\n";
              //   }
              //   echo "</tbody></table>";
              // }
              ?>
            </div>
          </div>
          <br>
          <!-- SEARCH CONFERENCES -->
          <div class="card">
            <div class="card-header">
              <h4><i class="fa fa-search mr-3"></i>Search Conferences</h4>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="CnameS" class="form-control" placeholder="Search By Conference Paper Title">
                <input type="submit" name="CnameSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('CnameS')) > 0) {
                $cnames = DB::getInstance();
                $cname = Input::get('CnameS');
                $cnames->query("SELECT fname,dept,title,authors, publication,CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day FROM faculty_profile_publications WHERE ptype = 'c' AND title LIKE '%$cname%' ORDER BY pdate DESC");

                if ($cnames->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Year</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($cnames->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->day</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="CcnameS" class="form-control" placeholder="Search By Conference Name / Publication Name ">
                <input type="submit" name="CcnameSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('CcnameS')) > 0) {
                $ccnames = DB::getInstance();
                $ccname = Input::get('CcnameS');
                $ccnames->query("SELECT fname,dept,title,authors, publication, CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day FROM faculty_profile_publications WHERE ptype = 'c' AND publication LIKE '%$ccname%' ORDER BY pdate DESC");

                if ($ccnames->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Year</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($ccnames->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->day</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="CyearS" class="form-control" placeholder="Search By Conference published in last X years ">
                <input type="submit" name="CyearSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('CyearS')) > 0 && is_numeric(Input::get('CyearS'))) {
                $cyears = DB::getInstance();
                $cyear = Input::get('CyearS');
                $cyears->query("SELECT fname,dept,title,authors, publication, CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day FROM faculty_profile_publications WHERE ptype = 'c' AND DATEDIFF(CURRENT_DATE,pdate)/356 <= $cyear ORDER BY pdate DESC");

                if ($cyears->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Year</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($cyears->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->day</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="CfieldS" class="form-control" placeholder="Search By Field of Publication ">
                <input type="submit" name="CfieldSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              // if (strlen(Input::get('CfieldS')) > 0) {
              //   $cfields = DB::getInstance();
              //   $cfield = Input::get('CfieldS');
              //   $cfields->query("SELECT f_name,f_dept, fac_rank,fac_field, fac_publisher,c_title, c_year FROM faculty, fac_publication, conferences WHERE faculty.f_id = fac_publication.fac_fid AND fac_publication.fac_cid = conferences.c_id AND fac_publication.fac_field = '$cfield' ORDER BY conferences.c_year DESC, fac_publication.fac_rank LIMIT 20");

              //   if ($cfields->count()) {
              //     echo "<table class=\"table table-striped table-hover\">";
              //     echo "<thead class=\"thead-inverse\">";
              //     echo "<tr><th>Name</th><th>Dept</th><th>Author Rank</th><th>Publisher</th><th>Title</th><th>Year</th></tr></thead>";
              //     echo "<tbody>";

              //     foreach ($cfields->results() as $row) {
              //       echo "<tr><td>$row->f_name</td><td>$row->f_dept</td><td>$row->fac_rank</td><td>$row->fac_publisher</td><td>$row->c_title</td><td>$row->c_year</td></tr>\n";
              //     }
              //     echo "</tbody></table>";
              //   }
              // }
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="CfnameS" class="form-control" placeholder="Search By Faculty name ">
                <input type="submit" name="CfnameSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('CfnameS')) > 0) {
                $cfnames = DB::getInstance();
                $cfname = Input::get('CfnameS');
                $cfnames->query("SELECT fname,dept,title,authors, publication, CONCAT_WS('-', MONTH(pdate), YEAR(pdate)) AS day FROM faculty_profile_publications WHERE ptype = 'c' AND `fname` LIKE '%$cfname%' ORDER BY pdate DESC");

                if ($cfnames->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Authors</th><th>Publication</th><th>Year</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($cfnames->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->authors</td><td>$row->publication</td><td>$row->day</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>
          </div>
          <!-- PROJECTS -->
          <br>
          <div class="card">
            <div class="card-header">
              <h4>Latest Projects</h4>
            </div>
            <div class="table-responsive">
              <?php
              // $p = DB::getInstance();
              // $p->query("SELECT p_title, p_sponsor, f_name,f_dept,fp_position, p_id FROM faculty, faculty_project, projects WHERE faculty.f_id = faculty_project.fp_fid AND faculty_project.fp_pid = projects.p_id ORDER BY projects.p_id DESC LIMIT 10");

              // if ($p->count()) {
              //   echo "<table class=\"table table-striped table-hover\">";
              //   echo "<thead class=\"thead-inverse\">";
              //   echo "<tr><th>Title</th><th>Sponsor</th><th>Faculty</th><th>Dept</th><th>Position</th></tr></thead>";
              //   echo "<tbody>";

              //   foreach ($p->results() as $row) {
              //     echo "<tr><td>$row->p_title</td><td>$row->p_sponsor</td><td>$row->f_name</td><td>$row->f_dept</td><td>$row->fp_position</td></tr>\n";
              //   }
              //   echo "</tbody></table>";
              // }
              ?>
            </div>
          </div>
          <!-- SEARCH PROJECTS -->
          <br>
          <div class="card">
            <div class="card-header">
              <h4><i class="fa fa-search mr-3"></i>Search Projects</h4>
            </div>
            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="PnameS" class="form-control" placeholder="Search By Project Name">
                <input type="submit" name="PnameSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('PnameS')) > 0) {
                $pnames = DB::getInstance();
                $pname = Input::get('PnameS');
                $pnames->query("SELECT fname, dept, title, projectSponsor, projectBudget, projectRole FROM faculty_profile_publications WHERE ptype = 'pr' AND title LIKE '%$pname%'");

                if ($pnames->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Sponsor</th><th>Budget</th><th>Role</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($pnames->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->projectSponsor</td><td>$row->projectBudget</td><td>$row->projectRole</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="PsnameS" class="form-control" placeholder="Search By Sponsor name ">
                <input type="submit" name="PsnameSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('PsnameS')) > 0) {
                $psnames = DB::getInstance();
                $psname = Input::get('PsnameS');
                $psnames->query("SELECT fname, dept, title, projectSponsor, projectBudget, projectRole FROM faculty_profile_publications WHERE ptype = 'pr' AND projectSponsor LIKE '%$psname%'");

                if ($psnames->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Sponsor</th><th>Budget</th><th>Role</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($psnames->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->projectSponsor</td><td>$row->projectBudget</td><td>$row->projectRole</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="PfnameS" class="form-control" placeholder="Search By Faculty name ">
                <input type="submit" name="PfnameSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('PfnameS')) > 0) {
                $pfnames = DB::getInstance();
                $pfname = Input::get('PfnameS');
                $pfnames->query("SELECT fname, dept, title, projectSponsor, projectBudget, projectRole FROM faculty_profile_publications WHERE ptype = 'pr' AND fname LIKE '%$pfname%'");

                if ($pfnames->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Sponsor</th><th>Budget</th><th>Role</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($pfnames->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td><td>$row->projectSponsor</td><td>$row->projectBudget</td><td>$row->projectRole</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>

            <br>
            <form action="landingpage.php">
              <div class="input-group">
                <input type="text" required name="PbudgetS" class="form-control" placeholder="Search By Budget greater than = X">
                <input type="submit" name="PbudgetSearch" class="btn btn-secondary">
              </div>
            </form>
            <div class="table-responsive">
              <?php
              if (strlen(Input::get('PbudgetS')) > 0) {
                $pbudgets = DB::getInstance();
                $pbudget = Input::get('PbudgetS');
                $pbudgets->query("SELECT fname, dept, title, projectSponsor, projectBudget, projectRole FROM faculty_profile_publications WHERE ptype = 'pr' AND projectBudget >= $pbudget");

                if ($pbudgets->count()) {
                  echo "<table class=\"table table-striped table-hover\">";
                  echo "<thead class=\"thead-inverse\">";
                  echo "<tr><th>Name</th><th>Dept</th><th>Title</th><th>Sponsor</th><th>Budget</th><th>Role</th></tr></thead>";
                  echo "<tbody>";

                  foreach ($pbudgets->results() as $row) {
                    echo "<tr><td>$row->fname</td><td>$row->dept</td><td>$row->title</td> <td>$row->projectSponsor</td><td>$row->projectBudget</td><td>$row->projectRole</td></tr>\n";
                  }
                  echo "</tbody></table>";
                }
              }
              ?>
            </div>
          </div><br>
        </div>

        <!-- SIDEBAR -->
        <div class="col-md-3">
          <div class="card text-center bg-light text-black mb-3">
            <div class="card-body">
              <h5>My</h5>
              <h5>Journals</h5>
              <h1 class="display-5">
                <i class="fa fa-pencil py-2"></i>
              </h1>
              <a href="journals.php" class="btn btn-outline-dark btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-light text-dark mb-3">
            <div class="card-body">
              <h5>My</h5>
              <!-- dont change this to conferences -->
              <h5>Conference</h5>
              <h1 class="display-5">
                <i class="fa fa-folder-open-o py-2"></i>
              </h1>
              <a href="conferences.php" class="btn btn-outline-dark btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-light text-dark mb-3">
            <div class="card-body">
              <h5>My</h5>
              <h5>Projects</h5>
              <h1 class="display-5">
                <i class="fa fa-users py-2"></i>
              </h1>
              <a href="projects.php" class="btn btn-outline-dark btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-light text-dark mb-3">
            <div class="card-body">
              <h5>Funds </h5>
              <h5>Received</h5>
              <h2 class="display-5">
                <i class="fa fa-inr"></i>
              </h2><br>
              <div class="table-responsive">
                <?php
                $q = DB::getInstance();

                // $user = new User();
                // $web = $user->data()->l_webmail;
                // $getdept = DB::getInstance();
                // $res = $getdept->get('faculty', 'f_webmail', '=', $web);
                // $dept = $res->first()->f_dept;

                $q->query("SELECT dept, SUM(p_budget) AS 'budget' FROM faculty_profile_publications WHERE projectBudget IS NOT NULL AND ptype = 'pr' GROUP BY dept");

                echo "<table class=\"table table-striped table-hover\">";
                echo "<thead class=\"thead-inverse\">";
                echo "<tr><th>Dept</th><th>Budget</th></tr></thead>";
                echo "<tbody>";

                foreach ($q->results() as $row) {
                  echo "<tr><td>$row->dept</td><td>$row->budget</td></tr>\n";
                }
                echo "</tbody></table>";
                ?>
              </div>
            </div>
          </div>

          <div class="card text-center bg-light text-dark mb-3">
            <div class="card-body text-center">
              <h5>Faculties</h5>
              <h5>with most</h5>
              <h5>Conference</h5>
              <h1 class="display-5">
                <i class="fa fa-pencil"></i>
              </h1>
              <div class="table table-responsive">
                <?php
                // $q = DB::getInstance();

                // $q->query("SELECT fname, Count(fac_cid) AS 'Conferences' FROM faculty, fac_publication WHERE faculty.f_id = fac_publication.fac_fid GROUP BY faculty.f_name ORDER BY COUNT(fac_cid)  DESC LIMIT 3");

                // echo "<table class=\"table table-striped table-hover no-cellpadding\">";
                // echo "<thead class=\"thead-inverse\">";
                // echo "<tr><th>Faculty</th><th>Conferences</th></tr></thead>";
                // echo "<tbody>";

                // foreach ($q->results() as $row) {
                //   echo "<tr><td>$row->Name</td><td>$row->Conferences</td></tr>\n";
                // }
                // echo "</tbody></table>";
                ?>
              </div>
            </div>
          </div>

          <div class="card text-center bg-light text-dark mb-3">
            <div class="card-body text-center">
              <h5>Most Active</h5>
              <h5>Faculties</h5>
              <h5>Journals</h5>
              <h1 class="display-5">
                <i class="fa fa-folder-open-o"></i>
              </h1>
              <div class="table-responsive">
                <?php
                // $q = DB::getInstance();

                // $q->query("SELECT f_name AS 'Name', Count(fac_jid) AS 'Journals' FROM faculty, fac_publication WHERE faculty.f_id = fac_publication.fac_fid GROUP BY faculty.f_name ORDER BY COUNT(fac_jid)  DESC LIMIT 3");

                // echo "<table class=\"table table-striped table-hover no-cellpadding\">";
                // echo "<thead class=\"thead-inverse\">";
                // echo "<tr><th>Faculty</th><th>Journals</th></tr></thead>";
                // echo "<tbody>";

                // foreach ($q->results() as $row) {
                //   echo "<tr><td>$row->Name</td><td>$row->Journals</td></tr>\n";
                // }
                // echo "</tbody></table>";
                ?>
              </div>
            </div>
          </div>

          <div class="card text-center bg-light text-dark mb-3">
            <div class="card-body text-center">
              <h5>Most Active</h5>
              <h5>Faculties</h5>
              <h5>Projects</h5>
              <h1 class="display-5">
                <i class="fa fa-folder-open-o"></i>
              </h1>
              <div class="table-responsive">
                <?php
                // $q = DB::getInstance();

                // $q->query("SELECT f_name AS 'Name', Count(fp_pid) AS 'Projects' FROM faculty, faculty_project WHERE faculty.f_id = faculty_project.fp_fid GROUP BY faculty.f_name ORDER BY COUNT(fp_fid)  DESC LIMIT 3");

                // echo "<table class=\"table table-striped table-hover no-cellpadding\">";
                // echo "<thead class=\"thead-inverse\">";
                // echo "<tr><th>Faculty</th><th>Projects</th></tr></thead>";
                // echo "<tbody>";

                // foreach ($q->results() as $row) {
                //   echo "<tr><td>$row->Name</td><td>$row->Projects</td></tr>\n";
                // }
                // echo "</tbody></table>";
                ?>
              </div>
            </div>
          </div>

          <div class="card text-center bg-light text-dark mb-3">
            <div class="card-body text-center">
              <h5>Most Active</h5>
              <h5>Department</h5>
              <h1 class="display-5">
                <i class="fa fa-folder-open-o"></i>
              </h1>
              <div class="table-responsive">
                <?php
                // $q = DB::getInstance();

                // $q->query("SELECT f_dept AS 'Dept', Count(f_dept) AS 'Publications' FROM faculty, fac_publication WHERE faculty.f_id = fac_publication.fac_fid GROUP BY faculty.f_dept ORDER BY COUNT(f_dept)  DESC LIMIT 3");

                // echo "<table class=\"table table-striped table-hover no-cellpadding\">";
                // echo "<thead class=\"thead-inverse\">";
                // echo "<tr><th>Dept</th><th>Publications</th></tr></thead>";
                // echo "<tbody>";

                // foreach ($q->results() as $row) {
                //   echo "<tr><td>$row->Dept</td><td>$row->Publications</td></tr>\n";
                // }
                // echo "</tbody></table>";
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer id="main-footer" class="bg-dark text-white mt-5 pt-3">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="text-muted text-center">Profile Dashboard</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- PROJECT MODAL -->
  <div class="modal fade" id="addProjectModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">Add Project</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>

        <div class="modal-body">
          <form action="landingpage.php" method="post">

            <!-- <div class="form-group">
              <label>Faculty ID<span class="m-1 text-primary">*</span> </label>
              <input type="text" class="form-control" name="fregid" required>
            </div> -->
            <div class="form-group">
              <label>Position in project<span class="m-1 text-primary">*</span></label>
              <select name="projectpos" id="proselect" class="form-control" required>
                <option>Position</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Co-supervisor">Co-supervisor</option>
              </select>
            </div>
            <div class="form-group">
              <label>Project Title<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="ptitle" required>
            </div>
            <div class="form-group">
              <label>Project Duration</label>
              <input type="text" class="form-control" name="pduration" placeholder="2010-2014">
            </div>
            <div class="form-group">
              <label>Project Budget</label>
              <input type="text" class="form-control" name="pbudget">
            </div>
            <div class="form-group">
              <label>Project Sponsor<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="psponsor" required>
            </div>
            <div class="form-group">
              <label>Project Status<span class="m-1 text-primary">*</span></label>
              <select name="prostat" id="prostatus" class="form-control" required>
                <option>Select current status</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
              </select>
            </div>

            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-info" name="psubmit">

          </form>
        </div>

      </div>
    </div>
  </div>


  <!-- CONFERENCE MODAL -->
  <div class="modal fade" id="addConferenceModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">Add Conference Publications</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>

        <div class="modal-body">
          <form action="landingpage.php" method="post">

            <!-- <div class="form-group">
              <label>Faculty ID<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="fregid" required>
            </div> -->
            <div class="form-group">
              <label>Name of Conference<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="cname" required>
            </div>
            <!-- <div class="form-group">
              <label>Conference Year<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="cyear" required>
            </div> -->

            <!-- <div class="form-group">

              <label>Conference Year<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control input-append date" id="datepicker" data-date-format="yyyy-mm" name="cyear" placeholder="click on icon to select month-year" required>
              <span class="add-on ">
                <i class="icon-th"></i>
              </span>


            </div> -->

            <div class="form-group">
              <div id="datepicker" class="input-append date">
                <input type="text" name="cyear" placeholder="select month and year" required data-date-format="yyyy-mm">
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                </span>
              </div>
            </div>


            <!-- <div id="datetimepicker1" class="input-append date">
      <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
      <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
    </div> -->


            <div class="form-group">
              <label>Authors<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="cauthors" required>
            </div>
            <!-- <div class="form-group">
              <label>Field<span class="m-1 text-primary">*</span></label>
              <select name="facfield" id="confselect" class="form-control" required>
                <option>Choose a Field</option>
                <option value="CSE">CSE</option>
                <option value="EE">EE</option>
                <option value="ME">ME</option>
                <option value="HS">HS</option>
                <option value="MSE">MSE</option>
              </select>
            </div> -->
            <div class="form-group">
              <label>Conference Paper Title<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="ctitle" required>
            </div>
            <div class="form-group">
              <label>Location</label>
              <input type="text" class="form-control" name="clocation">
            </div>
            <!-- <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" name="ccity">
            </div> -->
            <!-- <div class="form-group">
              <label>Conference Proceedings Volume</label>
              <input type="text" class="form-control" name="cvolume">
            </div>
            <div class="form-group">
              <label>Conference Proceedings Issue</label>
              <input type="text" class="form-control" name="cissue">
            </div>
            <div class="form-group">
              <label>Conference Proceedings Pages</label>
              <input type="text" class="form-control" name="cpages">
            </div> -->
            <div class="form-group">
              <label>Conference/paper Link</label>
              <input type="text" class="form-control" name="clink">
            </div>
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-info" name="csubmit">

          </form>
        </div>

      </div>
    </div>
  </div>
  <!--JOURNAL MODAL -->
  <div class="modal fade" id="addJournalModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">Add Journal Publication</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>

        <div class="modal-body">
          <form action="landingpage.php" method="post">
            <!-- <div class="form-group">
              <label>Faculty ID<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="fregid" required>
            </div> -->
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
            <div class="form-group">
              <div class="input-append date" id="datepicker" data-date="02-2012" data-date-format="yyyy-mm">
                <label>Published Year<span class="m-1 text-primary">*</span></label>
                <input type="text" readonly="readonly" class="form-control" name="jyear" placeholder="click on icon to select month-year" required>
                <span class="add-on"><i class="icon-th"></i></span>
              </div>
            </div>
            <!-- <div class="form-group">
              <label>Publisher ISSN</label>
              <input type="text" class="form-control" name="facissn">
            </div>
            <div class="form-group">
              <label>Author Rank<span class="m-1 text-primary">*</span></label>
              <input type="text" class="form-control" name="facrank" required>
            </div> -->
            <!-- <div class="form-group">
              <label>Field<span class="m-1 text-primary">*</span></label>
              <select name="facfield" id="jourselect" class="form-control" required>
                <option>Choose a Field</option>
                <option value="CSE">CSE</option>
                <option value="EE">EE</option>
                <option value="ME">ME</option>
                <option value="HS">HS</option>
                <option value="MSE">MSE</option>
              </select>
            </div> -->
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
            <!-- <input type="hidden" name="token" value="<?php echo Token::generate(); ?>"> -->
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- floating to the top button -->
  <a href="#" id="scroll" style="display: none;"><span></span></a>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/others.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script>

  </head>

</body>

</html>