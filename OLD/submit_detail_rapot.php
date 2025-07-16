<?php
include('connect.php');



//////////////UPLOAD PHOOTOOOO


$murid_id = $_POST['murid_id'];
$pp = $_POST['pp'];
$mulok1 = $_POST['mulok1'];
$mulok2 = $_POST['mulok2'];
$mulok3 = $_POST['mulok3'];
$mata = $_POST['mata'];
$telinga = $_POST['telinga'];
$mulut = $_POST['mulut'];
$pakaian = $_POST['pakaian'];
$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$sakit = $_POST['sakit'];
$ijin = $_POST['ijin'];
$alpha = $_POST['alpha'];
$refleksi = $_POST['refleksi'];

 $sql = "INSERT INTO detail_rapot (
 	murid_id,
 	pp,
 	mulok1,
 	mulok2,
 	mulok3,
 	mata,
 	telinga,
 	mulut,
 	pakaian,
 	berat,
 	tinggi,
 	sakit,
 	ijin,
 	alpha,
 	refleksi
 	)
 VALUES (
 	'$murid_id',
 	'$pp',
 	'$mulok1',
 	'$mulok2',
 	'$mulok3',
 	'$mata',
 	'$telinga',
 	'$mulut',
 	'$pakaian',
 	'$berat',
 	'$tinggi',
 	'$sakit',
 	'$ijin',
 	'$alpha',
 	'$refleksi'
 ) ON DUPLICATE KEY UPDATE

murid_id = '$murid_id',
pp = '$pp',
mulok1 = '$mulok1',
mulok2 = '$mulok2',
mulok3 = '$mulok3',
mata = '$mata',
telinga = '$telinga',
mulut = '$mulut',
pakaian = '$pakaian',
berat = '$berat',
tinggi = '$tinggi',
sakit = '$sakit',
ijin = '$ijin',
alpha = '$alpha',
refleksi = '$refleksi'
 ";

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
    
      	<a class="btn btn-success" href="index_rapot.php">back</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>





  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
