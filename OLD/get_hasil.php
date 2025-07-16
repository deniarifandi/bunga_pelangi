<?php

// include('connect.php');

$id=$_GET['id'];

$sql = "SELECT * FROM hasil WHERE id = $id";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $list_hasil_array[] = $row;
}
} else {
  echo "0 results";
}

// print_r($hasil_array);

?>