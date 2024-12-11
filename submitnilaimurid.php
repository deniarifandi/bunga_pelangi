<?php
include('connect.php');



$radio_1 = $_POST['konteks1'];
$radio_2 = $_POST['konteks2'];
$radio_3 = $_POST['konteks3'];
$radio_4 = $_POST['konteks4'];
$radio_5 = $_POST['konteks5'];
$radio_6 = $_POST['konteks6'];

$id_hasil = $_POST['id_hasil'];
$murid_id = $_POST['murid_id'];

$amati_1 = $_POST['amati1'];
$amati_2 = $_POST['amati2'];
$amati_3 = $_POST['amati3'];
$amati_4 = $_POST['amati4'];
$amati_5 = $_POST['amati5'];
$amati_6 = $_POST['amati6'];

 



$nilai = "SELECT * FROM penilaian where hasil_id = ".$_POST['id_hasil'];
$resultmurid = $conn->query($nilai);

if ($resultmurid->num_rows > 0) {

	while( $row = $resultmurid->fetch_assoc()){
		$list_hasil_array[] = $row;
	}

$penilaian_id = $list_hasil_array[0]['penilaian_id'];
		
	 $sql = "UPDATE penilaian SET
 				hasil_id = '$id_hasil',
 				murid_id = '$murid_id',
 				amati_1 = '$amati_1',
 				amati_2 = '$amati_2',
 				amati_3 = '$amati_3',
 				amati_4 = '$amati_4',
 				amati_5 = '$amati_5',
 				amati_6 = '$amati_6',
 				check_1 = '$radio_1',
 				check_2 = '$radio_2',
 				check_3 = '$radio_3',
 				check_4 = '$radio_4',
 				check_5 = '$radio_5',
 				check_6 = '$radio_6'
 				WHERE penilaian_id = '$penilaian_id';
 ";

} else {

	$sql = "INSERT INTO penilaian (
			hasil_id,
			murid_id,
		 	amati_1,
		 	amati_2,
		 	amati_3,
		 	amati_4,
		 	amati_5,
		 	amati_6,
		 	check_1,
		 	check_2,
		 	check_3,
		 	check_4,
		 	check_5,
		 	check_6

 	)
 VALUES (
 		'$id_hasil',
 		'$murid_id',
	 	'$amati_1',
	 	'$amati_2',
	 	'$amati_3',
	 	'$amati_4',
	 	'$amati_5',
	 	'$amati_6',
	 	'$radio_1',
	 	'$radio_2',
	 	'$radio_3',
	 	'$radio_4',
	 	'$radio_5',
	 	'$radio_6'

 )";

}

echo $sql;

if ($conn->query($sql) === TRUE) {
  echo "DATA BERHASIL DISIMPAN";

  ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sukses Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
      	<a class="btn btn-success" href=".\list_murid_nilai.php?id=<?php echo $id_hasil ?>">back</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>





  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
