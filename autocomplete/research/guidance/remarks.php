<?php

$conn = mysqli_connect("localhost", "root", "jrtalent", "faculty_profile_db");

if (!$conn)
  die("Unable to connect to database");


  function get($conn , $term){ 
    $query = "SELECT DISTINCT remarks FROM faculty_profile_research WHERE rtype = 'g' AND remarks LIKE '%".$term."%' ORDER BY remarks ASC";

    $result = mysqli_query($conn, $query); 
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $data; 
   } 


   if (isset($_GET['term'])) {
    $results = get($conn, $_GET['term']);
    $jnames = array();
    foreach($results as $row){
    $jnames[] = $row['remarks'];
    }
    echo json_encode($jnames);
   }   


?> 