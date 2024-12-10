<?php
include('connect.php');

$sql = "SELECT * FROM murid ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $list_hasil_array[] = $row;
}
} else {
  echo "0 results";
}

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="../assets/js/color-modes.js"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.122.0">
	<title>Starter Template · Bootstrap v5.3</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">



	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

	<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

	<style>
		

	
		.condensed{
			padding-top: 2px !important;
			padding-bottom: 2px !important;
		}
		
		select {
		  width: 100px;
		  overflow: hidden;
		  white-space: pre;
		  text-overflow: ellipsis;
		  -webkit-appearance: none;
		}

	</style>


</head>
<body>
	


<div class="col-lg-8 mx-auto p-4 py-md-5">


		<main>
			<br>
			<h4>Isi Detail Rapot <a href="index.php" class="btn btn-warning" style="float:right">Back</a></h4> 	
			<br>
			<h5>Nama Murid : <?php echo $list_hasil_array[0]['murid_nama']; ?></h5>
			<br>
			<br>
			<h3>1. Profil Pelajar Pancasila</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<th style="width:25%">Project Profil Pelajar Pancasila</th>
						<td><textarea name="pp" rows="5" style="width:100%" placeholder="Project Profil Peljar"></textarea></td>

					</tr>
					<tr>
						<th style="width:25%">Foto Profil Pelajar Pancasila</th>
						<td></td>
					</tr>
				</thead>
			</table>
			<br>

			<h3>2. Muatan Lokal</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<th rowspan="2">No</th>
						<th rowspan="2" style="width:25%">Bidang Pengembangan</th>
						<th colspan="3">Capaian Perkembangan</th>
					</tr>
					<tr>
						
						
						<th>BM</th>
						<th>MM</th>
						<th>SM</th>

					</tr>
					<tr>
						<th style="width:5%">1</th>
						<th style="width:25%">Komposisi Warna</th>
						<td><input type="radio" id="bm" name="warna" value="0"><label for="bm" style="margin-left: 10px;"> Belum Muncul</label></td>
						<td><input type="radio" id="mm" name="warna" value="1"><label for="mm" style="margin-left: 10px;"> Mulai Muncul</label></td>
						<td><input type="radio" id="sm" name="warna" value="2"><label for="sm" style="margin-left: 10px;"> Sudah Muncul</label></td>
					</tr>
				</thead>
			</table>


<br>
	<h3>3. Tumbuh Kembang Anak</h3>
			<table class="table table-bordered border-dark">
				<thead>
					
					<tr>
						<th>No</th>
						<th>Aspek Perkembangan</th>
						<th>Keterangan</th>

					</tr>
					<tr>
						<th style="width:5%">1</th>
						<th style="width:25%">Penglihatan (Mata)</th>
						<th><input type="text" class="form-control" nama="mata" placeholder="Contoh: Rada Burem"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Pendengaran (Telinga)</th>
						<th><input type="text" class="form-control" nama="telinga" placeholder="Contoh: Rada-rada Budi"></th>
					</tr>
					<tr>
						<th style="width:5%">3</th>
						<th style="width:25%">Kesehatan Gigi & Mulut</th>
						<th><input type="text" class="form-control" nama="mulut" placeholder="Contoh: Tidak Pernah sikat gigi"></th>
					</tr>
					<tr>
						<th style="width:5%">4</th>
						<th style="width:25%">Kerapian dalam berpakaian</th>
						<th><input type="text" class="form-control" nama="pakaian" placeholder="Contoh: Sering tidak rapi"></th>
					</tr>
					<tr>
						<th style="width:5%">5</th>
						<th style="width:25%">Berat Badan</th>
						<th><input type="number" class="form-control" nama="berat" placeholder="angka saja. Contoh:26"></th>
					</tr>
					<tr>
						<th style="width:5%">6</th>
						<th style="width:25%">Tinggi Badan</th>
						<th><input type="number" class="form-control" nama="tinggi" placeholder="angka saja. Contoh: 120"></th>
					</tr>

				</thead>
			</table>


<br>
	<h3>4. Presensi Kehadiran</h3>
			<table class="table table-bordered border-dark">
				<thead>
					
					<tr>
						<th>No</th>
						<th>Keterangan</th>
						<th>Semester 1</th>

					</tr>
					<tr>
						<th style="width:5%">1</th>
						<th style="width:25%">Sakit</th>
						<th><input type="number" class="form-control" nama="sakit" placeholder="5"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Ijin</th>
						<th><input type="number" class="form-control" nama="ijin" placeholder="3"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Alpha</th>
						<th><input type="number" class="form-control" nama="alpha" placeholder="1"></th>
					</tr>

				</thead>
			</table>



<br>
	<h3>5. Refleksi</h3>
			<table class="table table-bordered border-dark">
				<thead>
					
					<tr>
						<th>Refleksi Guru</th>
					</tr>
					<tr>
						<th><input type="text" class="form-control" nama="refleksi" placeholder="Isikan Refleksi"></th>
					</tr>

				</thead>
			</table>



	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


	</body>
	</html>
