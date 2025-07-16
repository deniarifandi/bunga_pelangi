<?php
include('connect.php');

//echo $_POST['nama_guru_1'];

$guruEXP = explode(";", $_POST['nama_guru_1']);

// echo $guruEXP[3];
// echo $guruEXP[4];
// echo $guruEXP[2];


 //echo $_POST['tujuan_agama_1'];
// echo $_POST['tujuan_agama_2'];
// echo $_POST['tujuan_jati_1'];
// echo $_POST['tujuan_jati_2'];
// echo $_POST['tujuan_literasi_1'];
// echo $_POST['tujuan_literasi_2'];
// echo $_POST['alat'];
// echo $_POST['semester'];
// echo $_POST['minggu'];
// echo $_POST['tanggal'];
// echo $_POST['bulan'];
// echo $_POST['tahun'];
// echo $_POST['topik'];
// echo $_POST['b'];
// echo $_POST['c'];
// echo $_POST['d'];
// echo $_POST['e'];
// echo $_POST['f'];
// echo $_POST['g'];
$tujuan_agama_1 = $_POST['tujuan_agama_1'];
$tujuan_agama_2 = $_POST['tujuan_agama_2'];
$tujuan_jati_1 = $_POST['tujuan_jati_1'];
$tujuan_jati_2 = $_POST['tujuan_jati_2'];
$tujuan_literasi_1 = $_POST['tujuan_literasi_1'];
$tujuan_literasi_2 = $_POST['tujuan_literasi_2'];
$alat = $_POST['alat'];
$semester = $_POST['semester'];
$minggu = $_POST['minggu'];
$tanggal = $_POST['tanggal'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];

$tanggal2 = $_POST['tanggal2'];
$bulan2 = $_POST['bulan2'];
$tahun2 = $_POST['tahun2'];

$tanggal3 = $_POST['tanggal3'];
$bulan3 = $_POST['bulan3'];
$tahun3 = $_POST['tahun3'];

$tanggal4 = $_POST['tanggal4'];
$bulan4 = $_POST['bulan4'];
$tahun4 = $_POST['tahun4'];

$tanggal5 = $_POST['tanggal5'];
$bulan5 = $_POST['bulan5'];
$tahun5 = $_POST['tahun5'];

$topik_kegiatan = $_POST['topiktext'];
$subtopik = $_POST['subtopiktext'];

$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];


$e = $_POST['e'];
$f = $_POST['f'];
$g = $_POST['g'];
$peta_konsep = $_POST['peta_konsep'];


 $sql = "INSERT INTO hasil (
 	nama_guru,
 	kelompok_usia,
 	jumlah_anak,
 	tujuan_agama_1,
 	tujuan_agama_2,
 	tujuan_jati_1,
 	tujuan_jati_2,
 	tujuan_literasi_1,
 	tujuan_literasi_2,
 	id_peta,
 	alat,
 	semester,
 	minggu,
 	tanggal,
 	bulan,
 	tahun,
 	tanggal2,
 	bulan2,
 	tahun2,
 	tanggal3,
 	bulan3,
 	tahun3,
 	tanggal4,
 	bulan4,
 	tahun4,
 	tanggal5,
 	bulan5,
 	tahun5,
 	topik_kegiatan,
 	subtopik,
 	b,
 	c,
 	d,
 	d2,
 	d3,
 	d4,
 	d5,
 	e,
 	f,
 	g
 	)
 VALUES (
 	'$guruEXP[3]', 
 	'$guruEXP[4]', 
 	'$guruEXP[2]',
 	'$tujuan_agama_1', 
	'$tujuan_agama_2', 
	'$tujuan_jati_1', 
	'$tujuan_jati_2', 
	'$tujuan_literasi_1', 
	'$tujuan_literasi_2',
	'$peta_konsep',
	'$alat', 
	'$semester', 
	'$minggu', 
	'$tanggal', 
	'$bulan', 
	'$tahun',
	'$tanggal2', 
	'$bulan2', 
	'$tahun2',
	'$tanggal3', 
	'$bulan3', 
	'$tahun3',
	'$tanggal4', 
	'$bulan4', 
	'$tahun4',
	'$tanggal5', 
	'$bulan5', 
	'$tahun5', 
	'$topik_kegiatan',
	'$subtopik' ,
	'$b', 
	'$c', 
	'$d', 
	'$d2',
	'$d3',
	'$d4',
	'$d5',
	'$e', 
	'$f', 
	'$g'


 )";

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
