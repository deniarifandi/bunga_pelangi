<?php

// include('connect.php');

$sql = "SELECT id,kelompok,isi FROM tujuan_literasi";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $literasi_array[] = $row;
}
} else {
  echo "0 results";
}


?>