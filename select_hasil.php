<?php

// include('connect.php');

$id_laporan = $_GET['id'];

$sql = "SELECT * FROM hasil where `id` = '$id_laporan'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $hasil_array[] = $row;
}
} else {
  echo "0 results";
}

// print_r($hasil_array);

?>