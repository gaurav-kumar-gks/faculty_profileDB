<?php

$conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");

if (!$conn)
  die("Unable to connect to database");


  function get($conn , $term){ 
    $query = "SELECT DISTINCT placeOfVisit FROM faculty_profile_honours_il WHERE  placeOfVisit LIKE '%".$term."%' ORDER BY placeOfVisit ASC";
    $result = mysqli_query($conn, $query); 
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $data; 
   } 
   
   if (isset($_GET['term'])) {
    $results = get($conn, $_GET['term']);
    $jnames = array();
    foreach($results as $row){
    $jnames[] = $row['placeOfVisit'];
    }
    echo json_encode($jnames);
   }   


?>