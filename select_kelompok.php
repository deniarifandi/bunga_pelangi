<?php

// include('connect.php');

$sql = "SELECT id,judul,deskripsi FROM kelompok";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $kelompok_array[] = $row;
}
} else {
  echo "0 results";
}


?>