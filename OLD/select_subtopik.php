<?php

// include('connect.php');

$sql = "SELECT * FROM subtopik";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $subtopik_array[] = $row;
}
} else {
  echo "0 results";
}


?>