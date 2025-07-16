<?php

// include('connect.php');

$sql = "SELECT id,kelompok,isi FROM tujuan_agama";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $agama_array[] = $row;
}
} else {
  echo "0 results";
}


?>