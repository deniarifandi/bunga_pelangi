<?php
include('connect.php');

$konteks_1 = $_POST['konteks_1'];
$konteks_2 = $_POST['konteks_2'];
$konteks_3 = $_POST['konteks_3'];
$konteks_4 = $_POST['konteks_4'];
$konteks_5 = $_POST['konteks_5'];
$konteks_6 = $_POST['konteks_6'];

$radio_1 = null;
$radio_2 = null;
$radio_3 = null;
$radio_4 = null;
$radio_5 = null;
$radio_6 = null;

echo $konteks_1;
$amati1 = null;

echo $_POST['amati1_1'];

// for ($i=0; $i < 100; $i++) { 
// 	if (isset($_POST['amati_'.$i])) {
// 		$amatiTotal = $amatiTotal."~".$_POST['amati_'.$i];
// 	}
// }
// echo $amatiTotal;;

for ($x=1; $x <= 6; $x++) { 
	$radio_array[$x] = null;
	$amati_array[$x] = null;
	echo "start array $x";
	for ($i=0; $i < 1000; $i++) { 
		if (isset($_POST[$i.'konteks'.$x])) {
			$radio_array[$x] = $radio_array[$x].$_POST[$i.'konteks'.$x];
			$amati_array[$x] = $amati_array[$x].$_POST['amati'.$x."_".$i]."~";
		}else{
			break;
		}	
	}
}
$id_hasil = $_POST['id_hasil'];
$murid_id = $_POST['murid_id'];

 $sql = "INSERT INTO penilaian (
			hasil_id,
			murid_id,
		 	konteks_1,
		 	konteks_2,
		 	konteks_3,
		 	konteks_4,
		 	konteks_5,
		 	konteks_6,
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
	 	'$konteks_1',
	 	'$konteks_2',
	 	'$konteks_3',
	 	'$konteks_4',
	 	'$konteks_5',
	 	'$konteks_6',
	 	'$amati_array[1]',
	 	'$amati_array[2]',
	 	'$amati_array[3]',
	 	'$amati_array[4]',
	 	'$amati_array[5]',
	 	'$amati_array[6]',
	 	'$radio_array[1]',
	 	'$radio_array[2]',
	 	'$radio_array[3]',
	 	'$radio_array[4]',
	 	'$radio_array[5]',
	 	'$radio_array[6]'

 )";

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
    
      	<a class="btn btn-success" href=".\">back</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>





  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
