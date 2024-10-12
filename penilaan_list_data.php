<?php

// include('connect.php');



$sql = "SELECT id,nama_guru,kelompok_usia,semester,minggu,tanggal,bulan,tahun,topik_kegiatan,subtopik FROM hasil WHERE removed != '1' ORDER BY id desc";
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