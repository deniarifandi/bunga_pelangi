<?php

// include('connect.php');

$sql = "SELECT id,isi FROM topik";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $topik_array[] = $row;
}
} else {
  echo "0 results";
}


?>