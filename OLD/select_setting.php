<?php

// include('connect.php');

$sql = "SELECT * FROM setting_bunga_pelangi";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $setting_array[] = $row;
}
} else {
  echo "0 results";
}


?>