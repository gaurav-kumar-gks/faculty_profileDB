

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

	$fname = $user->data()->Name;
    $roll = $user->data()->{'Roll No'};
    $prog = $user->data()->prog;
    $dept = $user->data()->department;
    $ptype = 'j';
    $email = $user->data()->email;
    $aemail = $user->data()->aemail;


	$conn=mysqli_connect("127.0.0.1","root","jrtalent","faculty_profile_db");
    if(!$conn)
    die("Unable to connect to database");

	// https://www.youtube.com/watch?v=pELrw9P5ywM
	if(isset($_POST["export"]) && $_POST['format']=='pdf')
	{
		$year="a";
		if(!empty($_POST['startyear']) && !empty($_POST['endyear'])) {
          $a=(int)$_POST['startyear'];$b=(int)$_POST['endyear'];
          if($b<=$a)
          {
          	echo '<script type="text/javascript">location.href = "list.php";</script>';
          }
          $year="'$a-04-01' and '$b-03-31'";

        } 
		include("multicell.php");
		$pdf=new PDF_MC_TABLE();
		$pdf->AddPage();

		$pdf->setFont('Arial','B',14);
		$first_year=$_POST['startyear'];
		$second_year=$_POST['endyear'];

		$pdf->SetTextColor(100, 0, 0);
		$pdf->Cell(198,10,"IIT Patna-Faculty Self Appraisal $first_year - $second_year",0,1,'C');
		
		$pdf->Ln();
		
		$pdf->SetTextColor(0, 0, 0);

		$pdf->SetWidths(Array(60,40,40,58));
		$pdf->SetLineHeight(5);
		$pdf->setFont('Arial','B',14);		
		$pdf->Row(Array(
			"Full Name",
			"Employee Code",
			"Designation",
			"Department/Centre",
		),0);

		$pdf->setFont('Arial','',14);
		$pdf->Row(Array(
			$fname,
			$roll,
			$prog,
			$dept
		),0);

		$pdf->Ln();
		$x=$pdf->GetX();
		$y=$pdf->GetY();
		$pdf->Line(10, $y, 198, $y);
		// $pdf->cell(0,2,"--------------------------------------------------------------------------------------------------------------------");
		// $pdf->Ln();
		// $pdf->Row(Array(
		// 	"Designation",
		// 	"Assistant Professor",
		// 	"Department/Centre",
		// 	"Computer Science and Engineering"
		// ));
		
		
		// $pdf->SetLineWidth(10);
		// $pdf->Line(10, 60, 200, 60);


		if(!empty($_POST["RA"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='rarea' AND pdate between $year order by pdate desc";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Research Area',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$pdf->Row(Array(
					"$count.",
					"$title"
				),1);
				$count=$count+1;
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}


		if(!empty($_POST["T"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_teaching where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Teaching',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,25,20,20,30,93));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Semester",
					"Subject Code",
					"L-T-P",
					"No of Students",
					"Additional Information"
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$pdf->Row(Array(
					$count,
					$row['semester'],
					$row['subCode'],
					$row['ltp'],
					$row['numOfStudents'],
					$row['additionalInformation']
				),0);
            }
   //          if(mysqli_num_rows($result) > 0)
			// {
			// 	$pdf->Ln();
	  //           $x=$pdf->GetX();
			// 	$y=$pdf->GetY();
			// 	$pdf->Line(10, $y, 198, $y);
			// }
		}











		if(!empty($_POST["G"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='g' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Guidance',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,25,62,38,38,25));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Level",
					"Title of Project",
					"Name of Students",
					"Name of Co-Supervisor",
					"Remarks"
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$other=$row['other'];
            	$co_supervisor=$row['rcopi'];
            	$level=$row['rlevel'];
            	$remarks=$row['remarks'];
            	$date=$row['pdate'];
            	$pdf->Row(Array(
					$count,
					$level,
					$title,
					$other,
					$co_supervisor,
					$remarks
				),0);
				$count=$count+1;
            }
   //          if(mysqli_num_rows($result) > 0)
			// {
			// 	$pdf->Ln();
	  //           $x=$pdf->GetX();
			// 	$y=$pdf->GetY();
			// 	$pdf->Line(10, $y, 198, $y);
			// }
		}


		if(!empty($_POST["OSRP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='orp' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Sponsored Research',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				// $pdf->Row(Array(
				// 	"SI",
				// 	"Level",
				// 	"Title of Project",
				// 	"Name of Students",
				// 	"Name of Co-Supervisor",
				// 	"Remarks"
				// ),0);
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$sponsor=$row['other'];
            	$PI=$row['rpi'];
            	$CO_PI=$row['rcopi'];
            	$funds=$row['funds'];
            	$date=$row['pdate'];
            	$pdf->Row(Array(
					"$count.",
					"$title ($sponsor, $funds Lakhs) PI: $PI ; CO-PIs: $CO_PI"
				),1);
				$count=$count+1;
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}


		if(!empty($_POST["OCP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='ocp' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Consultancy Projects',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				// $pdf->Row(Array(
				// 	"SI",
				// 	"Level",
				// 	"Title of Project",
				// 	"Name of Students",
				// 	"Name of Co-Supervisor",
				// 	"Remarks"
				// ),0);
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$sponsor=$row['other'];
            	$PI=$row['rpi'];
            	$CO_PI=$row['rcopi'];
            	$funds=$row['funds'];
            	$date=$row['pdate'];
            	$pdf->Row(Array(
					"$count.",
					"$title ($sponsor, $funds Lakhs) PI: $PI ; CO-PIs: $CO_PI"
				),1);
				$count=$count+1;
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["DW"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='dw' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Development Work',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$date=$row['pdate'];
            	$pdf->Row(Array(
					"$count.",
					"$title"
				),1);
				$count=$count+1;
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}


		if(!empty($_POST["P"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='pat' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Patents',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,90,49,49));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Patent Title",
					"Ref. Number",
					"Status",
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$ref=$row['ref'];
            	$projectstatus=$row['projectStatus'];
            	$date=$row['pdate'];
            	$pdf->Row(Array(
					$count,
					$title,
					$ref,
					$projectstatus
				),0);
				$count=$count+1;
            }
            if(mysqli_num_rows($result) > 0)
			{
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["C"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='cpr' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Copyrights',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,60,30,30,34,34));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Title",
					"Authors",
					"Ref No",
					"Status",
					"Jurisdictions"
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$authors=$row['other'];
            	$juri=$row['juri'];
            	$ref=$row['ref'];
            	$status=$row['projectStatus'];
            	$date=$row['pdate'];
            	$pdf->Row(Array(
					$count,
					$title,
					$authors,
					$ref,
					$status,
					$juri
				),0);
				$count=$count+1;
            }
            if(mysqli_num_rows($result) > 0)
			{
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}


		if(!empty($_POST["TT"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='tt' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Technology Transfer',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,98));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				// $pdf->Row(Array(
				// 	"SI",
				// 	"Title",
				// 	"Authors",
				// 	"Ref No",
				// 	"Status",
				// 	"Jurisdictions"
				// ),0);
			}
			$pdf->setFont('Arial','',14);
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$funds=$row['funds'];
            	$client=$row['other'];
            	$date=$row['pdate'];
            	$pdf->Row(Array(
					"$count.",
					"$title ($client, $funds Lakhs)"
				),1);
				$count=$count+1;
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}








		


		if(!empty($_POST["FPB"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_fpb where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Fellow - Professional Body',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,150,38));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Name of the Body",
					"Year Awarded",
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$pdf->Row(Array(
					$count,
					$row['nameOfTheBody'],
					$row['yearAwarded'],
				),0);
            }
		}

		if(!empty($_POST["MPB"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_mpb where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Member - Professional Body',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,90,60,38));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Name of the Body",
					"Membership Status",
					"Year Awarded",
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$pdf->Row(Array(
					$count,
					$row['nameOfTheBody'],
					$row['membershipStatus'],
					$row['yearAwarded'],
				),0);
            }
		}

		if(!empty($_POST["MEBJ"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_mebj where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Member Editorial Board of Journal',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,70,50,40,28));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Name of Journal",
					"Name of Publisher",
					"Position Held",
					"Year",
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$pdf->Row(Array(
					$count,
					$row['nameOfJournel'],
					$row['nameOfPublisher'],
					$row['positionHeld'],
					$row['year'],
				),0);
            }
		}

		if(!empty($_POST["A"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_a where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Awards',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,150,38));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Name of Award",
					"Year",
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$pdf->Row(Array(
					$count,
					$row['nameOfAward'],
					$row['year'],
				),0);
            }
		}

		if(!empty($_POST["F"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_f where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Fellowship',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,150,38));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Fellowship Title",
					"Year",
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$pdf->Row(Array(
					$count,
					$row['fellowshipTitle'],
					$row['year'],
				),0);
            }
		}


		if(!empty($_POST["IL"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_il where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Invited Lectures',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
			$sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$lt=$row['lectureTitle'];
            	$pov=$row['placeOfVisit'];
            	$dur=$row['duration'];
            	$pdf->Row(Array(
					"$sno.",
					"$lt at $pov ($dur days)."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}




		if(!empty($_POST["J"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='j' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Journals',0,1,'L');
			    
			    $pdf->SetWidths(Array(198));
			    $pdf->setAligns(Array('L'));
			    // $pdf->SetWidths(Array(10,38,30,25,25,20,30,20));
				// $pdf->SetLineHeight(5);
				// $pdf->setFont('Arial','B',14);		
				// $pdf->Row(Array(
				// 	"SI",
				// 	"Title",
				// 	"Authors",
				// 	"Publication",
				// 	"Publisher",
				// 	"Pages",
				// 	"Online Link",
				// 	"Impact Factor"
				// ),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$publication=$row['publication'];
            	$publisher=$row['publisher'];
            	$pages=$row['pages'];
            	$onlineLink=$row['onlineLink'];
            	$impactFactor=$row['impactFactor'];

    //         	$pdf->Row(Array(
				// 	$count,
				// 	$title,
				// 	$authors,
				// 	$publication,
				// 	$publisher,
				// 	$pages,
				// 	$onlineLink,
				// 	$impactFactor
				// ),0);
				$date=substr($row['pdate'],0,4);
                if($onlineLink!="")
                $pdf->Row(Array(
                    "$count.  $authors, $title, $publication, $publisher, $onlineLink ($date)"
                ),1);
                else
                $pdf->Row(Array(
                    "$count.  $authors, $title, $publication, $publisher ($date)"
                ),1);
            }
            if(mysqli_num_rows($result) > 0)
            {
                $pdf->Ln();
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->Line(10, $y, 198, $y);
            }
		}


		if(!empty($_POST["CON"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='c' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Conference',0,1,'L');
				$pdf->SetWidths(Array(198));
			    
			    
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$name=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$duration=$row['duration'];

            	$date=substr($row['pdate'],0,4);

                if($onlineLink!="")
                $pdf->Row(Array(
                    "$count. $authors, $title, $name, $onlineLink ($date)" 
                ),1);
                else $pdf->Row(Array(
                    "$count. $authors, $title, $name, duration-$duration Days ($date)" 
                ),1);
            }
            if(mysqli_num_rows($result) > 0)
            {
                $pdf->Ln();
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->Line(10, $y, 198, $y);
            }
		}

		if(!empty($_POST["TB"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='tb' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Text Books',0,1,'L');
			    
			    $pdf->SetWidths(Array(198));
				// $pdf->SetLineHeight(5);
				// $pdf->setFont('Arial','B',14);		
				// $pdf->Row(Array(
				// 	"SI",
				// 	"Title",
				// 	"Authors",
				// 	"Publisher",
				// 	"Online Link",
				// 	"Book Type"
				// ),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$publisher=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$bookType=$row['bookType'];
            	$date=substr($row['pdate'],0,4);
                if($onlineLink!="")
                $pdf->Row(Array(
                    "$count. $authors : $title Published by $publisher, $onlineLink ($date)"
                ),1);
                else $pdf->Row(Array(
                    "$count. $authors : $title Published by $publisher, $onlineLink ($date)"
                ),1);
            }
            if(mysqli_num_rows($result) > 0)
            {
                $pdf->Ln();
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->Line(10, $y, 198, $y);
            }
		}

		if(!empty($_POST["BC"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='bc' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Book Chapters Published',0,1,'L');
			    
			    $pdf->SetWidths(Array(198));
				// $pdf->SetLineHeight(5);
				// $pdf->setFont('Arial','B',14);		
				// $pdf->Row(Array(
				// 	"SI",
				// 	"Chapter Title",
				// 	"Book Title",
				// 	"Authors",
				// 	"Publisher",
				// 	"Online Link",
				// 	"Book Type"
				// ),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$bookTitle=$row['bookTitle'];
            	$authors=$row['authors'];
            	$publisher=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$bookType=$row['bookType'];

            	$date=substr($row['pdate'],0,4);
                if($onlineLink!="")
                $pdf->Row(Array(
                    "$count. $authors : $bookTitle: $title Published ($date)"
                ),1);
                else $pdf->Row(Array(
                    "$count. $authors : $bookTitle: $title Published, $onlineLink ($date)"
                ),1);

    //         	$pdf->Row(Array(
				// 	$count,
				// 	$title,
				// 	$bookTitle,
				// 	$authors,
				// 	$publisher,
				// 	$onlineLink,
				// 	$bookType
				// ),0);
            }
            if(mysqli_num_rows($result) > 0)
            {
                $pdf->Ln();
                $x=$pdf->GetX();
                $y=$pdf->GetY();
                $pdf->Line(10, $y, 198, $y);
            }
		}


		if(!empty($_POST["EP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='ep' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Educational Packages',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,60,38,30,30,30));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Title",
					"Level",
					"Authors",
					"Type",
					"Online Link"
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$eduPackageLevel=$row['eduPackageLevel'];
            	$authors=$row['authors'];
            	$eduPackageType=$row['eduPackageType'];
            	$onlineLink=$row['onlineLink'];
            	$pdf->Row(Array(
					$count,
					$title,
					$eduPackageLevel,
					$authors,
					$eduPackageType,
					$onlineLink
				),0);
            }
		}

		if(!empty($_POST["OP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='opub' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Other Publications',0,1,'L');
			    
			    $pdf->SetWidths(Array(10,68,30,30,30,30));
				$pdf->SetLineHeight(5);
				$pdf->setFont('Arial','B',14);		
				$pdf->Row(Array(
					"SI",
					"Title",
					"Authors",
					"Publisher",
					"Online Link",
					"Type"
				),0);
			}
			$pdf->setFont('Arial','',14);
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$publisher=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$bookType=$row['bookType'];
            	$pdf->Row(Array(
					$count,
					$title,
					$authors,
					$publisher,
					$onlineLink,
					$bookType
				),0);
            }
		}


		if(!empty($_POST["SA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='SA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Student Activities',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	$pdf->Row(Array(
					"$sno.",
					"$activity."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["DA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='DA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Departmental Activities',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	$pdf->Row(Array(
					"$sno.",
					"$activity."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["IA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='IA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Institute Activities',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	$pdf->Row(Array(
					"$sno.",
					"$activity."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["PA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='PA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Professional Activities',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	$pdf->Row(Array(
					"$sno.",
					"$activity."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}


		if(!empty($_POST["SCW"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities_scw where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Seminar, Conference and Workshop Organised',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$responsibility=$row['responsibility'];
            	$place=$row['place'];
            	$title=$row['title'];
            	$noOfParticipants=$row['noOfParticipants'];
            	$pdf->Row(Array(
					"$sno.",
					"$responsibility:-$title, $place ($responsibility) Participants: $noOfParticipants."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		

		if(!empty($_POST["STC"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities_stc where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Short Term Courses',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$role=$row['role'];
            	$title=$row['title'];
            	$duration=$row['duration'];
            	$noOfParticipants=$row['noOfParticipants'];
            	$courseBudget=$row['courseBudget'];
            	$type=$row['type'];
            	
            	$pdf->Row(Array(
					"$sno.",
					"$role:-$title, Type: $type, Course Budget: Rs $courseBudget, Duration: $duration, Participants: $noOfParticipants."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["VA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities_va where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Visit Abroad',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$purpose=$row['purpose'];
            	$place=$row['placeOfVisit'];
            	$duration=$row['duration'];
            	$pdf->Row(Array(
					"$sno.",
					"$place ($duration Days), Purpose: $purpose."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["OAA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='OAA' and activityDate between $year  order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Other Academic Activities',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	$pdf->Row(Array(
					"$sno.",
					"$activity."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}

		if(!empty($_POST["AOI"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='AOI' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            $pdf->setFont('Arial','',14);
            if(mysqli_num_rows($result) > 0)
			{	
				$pdf->setFont('Arial','IB',14);
				$pdf->Cell(198,10,'Any Other Information',0,1,'L');
			    $pdf->SetWidths(Array(10,188));
				$pdf->SetLineHeight(5);
			}
			$pdf->setFont('Arial','',14);
			$pdf->setAligns(Array('R',''));
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	$pdf->Row(Array(
					"$sno.",
					"$activity."
				),1);
            }
            if(mysqli_num_rows($result) > 0)
			{
				$pdf->Ln();
	            $x=$pdf->GetX();
				$y=$pdf->GetY();
				$pdf->Line(10, $y, 198, $y);
			}
		}




		$pdf->setFont('Arial','B',14);
		$pdf->Ln(5);
		$pdf->Cell(138,15,'',0,0,'C');
		$pdf->Cell(50,15,'',1,1,'C');
		$pdf->Cell(138,15,'',0,0,'C');
		$pdf->Cell(50,15,'(Signature & Date)',0,1,'C');
		
		$pdf->setFont('Arial','UB',14);

		$pdf->Ln(5);
		$pdf->Cell(0,15,'Forwarded by the Head of Department',0,1,'L');

		$pdf->Ln(5);
		$pdf->Cell(0,15,'Assosciate Dean [Faculty Affairs]',0,1,'L');

		$pdf->Ln(5);
		$pdf->Cell(0,15,'Director',0,1,'L');

		$pdf->Output();
	// 	$pdf= new FPDF();
	// 	$pdf->Addpage();
	// 	$pdf->SetFont("Arial","B",10);
	// 	$pdf->cell(40,10,"Full Name",1,0,"L");
	// 	$pdf->cell(60,10,"Mayank Aggarwal",1,0,"L");
	// 	$pdf->cell(40,10,"Employee Code",1,0,"L");
	// 	$pdf->cell(60,10,"308",1,1,"L");
	// 	$pdf->cell(40,10,"Designation",1,0,"L");
	// 	$pdf->cell(60,10,"Assistant Professor",1,0,"L");
	// 	$pdf->cell(40,10,"Department/Centre",1,0,"L");
	// 	$pdf->cell(60,10,"Computer Science and Engineering",1,1,"L");
		// if(!empty($_POST["A"]))
		// {
		// 	$pdf->cell(0,10,"Awards",1,1,"C");
		// }
		// else
		// {
		// 	$pdf->cell(0,20,"No Awards",1,0,"C");
		// }
	// 	$pdf->output();
	}








	else if(isset($_POST["export"]) && $_POST['format']=='text')
	{
		$year="a";
		if(!empty($_POST['startyear']) && !empty($_POST['endyear'])) {
          $a=(int)$_POST['startyear'];$b=(int)$_POST['endyear'];
          if($b<=$a)
          {
          	echo '<script type="text/javascript">location.href = "list.php";</script>';
          }
          $year="'$a-04-01' and '$b-03-31'";
        }

		


		$first_year=$_POST['startyear'];
		$second_year=$_POST['endyear'];

		
		echo "IIT Patna-Faculty Self Appraisal $first_year - $second_year\n\n";
		
		header("Content-Type: text/plain");
		header('Content-Disposition: attachment; filename="Export.txt"');
		echo "Full Name, Employee Code, Designation, Department Centre\n";
		echo "$fname, $roll, $prog, $dept\n\n";


		if(!empty($_POST["RA"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='rarea' AND pdate between $year  order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Research Area\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
				echo "$count. $title\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
		}


		if(!empty($_POST["T"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_teaching where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);

            if(mysqli_num_rows($result) > 0)
			{
				echo "Teaching\n\n";
				echo "SI, Semester, Subject Code, L-T-P, No of Students, Additional Information\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$semester=$row['semester'];
            	$subCode=$row["subCode"];
            	$numOfStudents=$row['numOfStudents'];
            	$ltp=$row['ltp'];
            	$additionalInformation=$row['additionalInformation'];
            	echo "$count, $semester, $subCode, $ltp, $numOfStudents, $additionalInformation\n";
            }
            if($count!=0)
            	echo "\n\n";
		}






		if(!empty($_POST["G"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='g' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Guidance\n\n";
			    
				echo "SI, Level, Title of Project, Name of Students, Name of Co-Supervisor, Remarks\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$other=$row['other'];
            	$co_supervisor=$row['rcopi'];
            	$level=$row['rlevel'];
            	$remarks=$row['remarks'];
            	$date=$row['pdate'];
            	echo "$count, $level, $title, $other, $co_supervisor, $remarks\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
   //          if(mysqli_num_rows($result) > 0)
			// {
			// 	$pdf->Ln();
	  //           $x=$pdf->GetX();
			// 	$y=$pdf->GetY();
			// 	$pdf->Line(10, $y, 198, $y);
			// }
		}


		if(!empty($_POST["OSRP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='orp' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Sponsored Research\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$sponsor=$row['other'];
            	$PI=$row['rpi'];
            	$CO_PI=$row['rcopi'];
            	$funds=$row['funds'];
            	$date=$row['pdate'];
				echo "$count. $title ($sponsor, $funds Lakhs) PI: $PI ; CO-PIs: $CO_PI\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
		}


		if(!empty($_POST["OCP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='ocp' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Consultancy Projects\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$sponsor=$row['other'];
            	$PI=$row['rpi'];
            	$CO_PI=$row['rcopi'];
            	$funds=$row['funds'];
            	$date=$row['pdate'];
            	echo "$count. $title ($sponsor, $funds Lakhs) PI: $PI ; CO-PIs: $CO_PI\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
		}

		if(!empty($_POST["DW"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='dw' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Development Work\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$date=$row['pdate'];
				echo "$count. $title\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
		}


		if(!empty($_POST["P"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='pat' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Patents\n\n";
		
				echo "SI, Patent Title, Ref. Number, Status\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$ref=$row['ref'];
            	$projectstatus=$row['projectStatus'];
            	$date=$row['pdate'];
            	echo "$count, $title, $ref, $projectstatus\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
		}

		if(!empty($_POST["C"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='cpr' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Copyrights\n\n";
				echo "SI, Title, Authors, Ref No, Status, Jurisdictions\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$authors=$row['other'];
            	$juri=$row['juri'];
            	$ref=$row['ref'];
            	$status=$row['projectStatus'];
            	$date=$row['pdate'];
            	echo "$count, $title, $authors, $ref, $status, $juri\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
		}


		if(!empty($_POST["TT"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt = "SELECT * FROM faculty_profile_research WHERE roll='$roll' AND rtype='tt' AND pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Technology Transfer\n";
			}
			$count=1;
            while($row=mysqli_fetch_assoc($result))
            {
            	$title=$row['title'];
            	$funds=$row['funds'];
            	$client=$row['other'];
            	$date=$row['pdate'];
            	echo "$count. $title ($client, $funds Lakhs)\n";
				$count=$count+1;
            }
            if($count!=1)
            	echo "\n\n";
		}











		if(!empty($_POST["IL"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_il where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Invited Lectures\n";			  
			}
			$sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$lt=$row['lectureTitle'];
            	$pov=$row['placeOfVisit'];
            	$dur=$row['duration'];
            	echo "$sno. $lt at $pov ($dur days).\n";
            }
            if($sno!=0)
            	echo "\n\n";
		}

		


		if(!empty($_POST["FPB"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_fpb where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Fellow - Professional Body\n\n";
				echo "SI, Name of the Body, Year Awarded\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$nameOfTheBody=$row['nameOfTheBody'];
            	$yearAwarded=$row['yearAwarded'];
				echo "$count, $nameOfTheBody, $yearAwarded\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["MPB"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_mpb where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Member - Professional Body\n\n";
				echo "SI, Name of the Body, Membership Status, Year Awarded\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$nameOfTheBody=$row['nameOfTheBody'];
            	$membershipStatus=$row['membershipStatus'];
            	$yearAwarded=$row['yearAwarded'];
            	echo "$count, $nameOfTheBody, $membershipStatus, $yearAwarded\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["MEBJ"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_mebj where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Member Editorial Board of Journal\n\n";
			    
				echo "SI, Name of Journal, Name of Publisher, Position Held, Year\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$nameOfJournel=$row['nameOfJournel'];
            	$nameOfPublisher=$row['nameOfPublisher'];
            	$positionHeld=$row['positionHeld'];
            	$yearAwarded=$row['year'];
				echo "$count, $nameOfJournel, $nameOfPublisher, $positionHeld, $yearAwarded\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["A"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_a where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Awards\n\n";
				echo "SI, Name of Award, Year\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$nameOfAward=$row['nameOfAward'];
            	$yearAwarded=$row['year'];
				echo "$count, $nameOfAward, $yearAwarded\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["F"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_honours_f where roll='$roll' and activityDate between $year order by activityDate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Fellowship\n\n";
				echo "SI, Fellowship Title, Year\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$fellowshipTitle=$row['fellowshipTitle'];
            	$yearAwarded=$row['year'];
            	echo "$count, $fellowshipTitle, $yearAwarded\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}


		if(!empty($_POST["J"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='j' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Journals\n\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$publication=$row['publication'];
            	$publisher=$row['publisher'];
            	$pages=$row['pages'];
            	$onlineLink=$row['onlineLink'];
            	$impactFactor=$row['impactFactor'];

            	$date=substr($row['pdate'],0,4);
                if($onlineLink!="")
                echo "$count. $authors, $title, $publication, $publisher, $onlineLink ($date)\n";
                else echo "$count. $authors, $title, $publication, $publisher ($date)\n";
            }
            if($count!=0)
            	echo "\n\n";
		}


		if(!empty($_POST["CON"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='c' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Conference\n\n";
				// echo "SI, Title, Authors, Name, Online Link, Duration\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$name=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$duration=$row['duration'];

				$date=substr($row['pdate'],0,4);

                if($onlineLink!="")
                 echo   "$count. $authors, $title, $name, $onlineLink ($date)\n"; 
                else 
                 echo  "$count. $authors, $title, $name, duration-$duration Days ($date)\n"; 
            }
            if($count!=0)
            	echo "\n\n";
		}

		if(!empty($_POST["TB"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='tb' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Text Books\n\n";
				// echo "SI, Title, Authors, Publisher, Online Link, Book Type\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$publisher=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$bookType=$row['bookType'];
            	$date=substr($row['pdate'],0,4);
                if($onlineLink!="")
                echo "$count. $authors : $title Published by $publisher, $onlineLink ($date)\n";
                else 
                echo "$count. $authors : $title Published by $publisher, $onlineLink ($date)\n";

				// echo "$count, $title, $authors, $publisher, $onlineLink, $bookType\n";
            }
            if($count!=0)
            	echo "\n\n";
		}

		if(!empty($_POST["BC"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='bc' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Book Chapters Published\n\n";
				// echo "SI, Chapter Title, Book Title, Authors, Publisher, Online Link, Book Type\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$bookTitle=$row['bookTitle'];
            	$authors=$row['authors'];
            	$publisher=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$bookType=$row['bookType'];
				// echo "$count, $title, $bookTitle, $authors, $publisher, $onlineLink, $bookType\n";
				$date=substr($row['pdate'],0,4);
                if($onlineLink!="")
                
                echo   "$count. $authors : $bookTitle: $title Published ($date)\n";
                else 
                    "$count. $authors : $bookTitle: $title Published, $onlineLink ($date)\n";
            }
            if($count!=0)
            	echo "\n\n";
		}


		if(!empty($_POST["EP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='ep' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Educational Packages\n\n";
				echo "SI, Title, Level, Authors, Type, Online Link\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$eduPackageLevel=$row['eduPackageLevel'];
            	$authors=$row['authors'];
            	$eduPackageType=$row['eduPackageType'];
            	$onlineLink=$row['onlineLink'];

				echo "$count, $title, $eduPackageLevel, $authors, $eduPackageType, $onlineLink\n";
            }
            if($count!=0)
            	echo "\n\n";
		}

		if(!empty($_POST["OP"]))
		{
			
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_publications where roll='$roll' and ptype='opub' and pdate between $year order by pdate desc;";
	    	// echo $stmt;
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{
				echo "Other Publications\n\n";
				echo "SI, Title, Authors, Publisher, Online Link, Type\n";
			}
			$count=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$count=$count+1;
            	$title=$row['title'];
            	$authors=$row['authors'];
            	$publisher=$row['publisher'];
            	$onlineLink=$row['onlineLink'];
            	$bookType=$row['bookType'];
				echo "$count, $title, $authors, $publisher, $onlineLink, $bookType\n";
            }
            if($count!=0)
            	echo "\n\n";
		}


		if(!empty($_POST["SA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='SA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Student Activities\n";
			}
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
				echo "$sno. $activity.\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["DA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='DA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Departmental Activities\n";
			}
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	echo "$sno. $activity.\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["IA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='IA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Institute Activities\n";
			}
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	echo "$sno. $activity.\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["PA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='PA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Professional Activities\n";
			}
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	echo "$sno. $activity.\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}


		if(!empty($_POST["SCW"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities_scw where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Seminar, Conference and Workshop Organised\n";
			}
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$responsibility=$row['responsibility'];
            	$place=$row['place'];
            	$title=$row['title'];
            	$noOfParticipants=$row['noOfParticipants'];
            	echo "$sno. $responsibility:-$title, $place ($responsibility) Participants: $noOfParticipants.\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		

		if(!empty($_POST["STC"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities_stc where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Short Term Courses\n";
			}
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$role=$row['role'];
            	$title=$row['title'];
            	$duration=$row['duration'];
            	$noOfParticipants=$row['noOfParticipants'];
            	$courseBudget=$row['courseBudget'];
            	$type=$row['type'];
            	
            	echo 
					"$sno. $role:-$title, Type: $type, Course Budget: Rs $courseBudget, Duration: $duration, Participants: $noOfParticipants.\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["VA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities_va where roll='$roll' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Visit Abroad\n";
			}
			$sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$purpose=$row['purpose'];
            	$place=$row['placeOfVisit'];
            	$duration=$row['duration'];
            	echo "$sno. $place ($duration Days), Purpose: $purpose.\n";				
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["OAA"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='OAA' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				
				echo "Other Academic Activities\n";
			}
			
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	echo "$sno. $activity.\n";
            }
           	if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

		if(!empty($_POST["AOI"]))
		{
			
	    	$roll = $user->data()->{'Roll No'};
	    	$stmt="select * from faculty_profile_activities where roll='$roll' and activityId='AOI' and activityDate between $year order by activityDate desc;";
            // echo $stmt;
            $result=mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result) > 0)
			{	
				echo "Any Other Information\n";
			}
            $sno=0;
            while($row=mysqli_fetch_assoc($result))
            {
            	$sno=$sno+1;
            	$activity=$row['activity'];
            	echo  "$sno. $activity.\n";
            }
            if(mysqli_num_rows($result) > 0)
			{
				echo "\n\n";
			}
		}

	}
?>
