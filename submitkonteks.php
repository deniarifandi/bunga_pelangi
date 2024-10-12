<?php
include('connect.php');

$konteks_1 = $_POST['konteks_1'];
$konteks_2 = $_POST['konteks_2'];
$konteks_3 = $_POST['konteks_3'];
$konteks_4 = $_POST['konteks_4'];
$konteks_5 = $_POST['konteks_5'];
$konteks_6 = $_POST['konteks_6'];

$id_hasil = $_POST['id_hasil'];

$radio_1 = null;
$radio_2 = null;
$radio_3 = null;
$radio_4 = null;
$radio_5 = null;
$radio_6 = null;

 $sql = "UPDATE hasil SET 
 	konteks1 = '$konteks_1',
 	konteks2 = '$konteks_2',
 	konteks3 = '$konteks_3',
 	konteks4 = '$konteks_4',
 	konteks5 = '$konteks_5',
 	konteks6 = '$konteks_6'
 	WHERE id = '$id_hasil'";

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
