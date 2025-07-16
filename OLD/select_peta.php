<?php

// include('connect.php');

$sql = "SELECT id,image_address FROM peta_konsep";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $peta_konsep_array[] = $row;
}
} else {
  echo "0 results";
}


?>