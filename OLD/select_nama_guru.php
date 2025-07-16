<?php

// include('connect.php');

$sql = "SELECT * FROM nama_guru INNER JOIN kelompok ON nama_guru.kelompok = kelompok.id";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $nama_guru_array[] = $row;
}
} else {
  echo "0 results";
}


?>