<?php
include('connect.php');

$id = $_GET['id'];

$sql = "SELECT * FROM murid where murid_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $list_hasil_array[] = $row;
}
} else {
  echo "0 results";
}

include('connect.php');

$sql = "SELECT detail_rapot.* FROM detail_rapot
where detail_rapot.murid_id = ".$_GET['id'];

// echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	header("Location: ./edit_rapot.php?id=".$_GET['id']);
die();
} else {
	
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
			<form method="POST" action="submit_detail_rapot.php" enctype="multipart/form-data">
			<br>
			<h4>Isi Detail Rapot <a href="index_rapot.php" class="btn btn-warning" style="float:right">Back</a></h4> 	
			<br>
			<h3>Nama Murid : <?php echo $list_hasil_array[0]['murid_nama']; ?></h3>
			<input type="hidden" name="murid_id" readonly value="<?php echo $_GET['id']; ?>">
			<br>
			<br>
			<h3>1. Profil Pelajar Pancasila</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<th style="width:25%">Project Profil Pelajar Pancasila</th>
						<td colspan="3"><textarea name="pp" rows="5" style="width:100%" class="form-control" placeholder="Project Profil Peljar"></textarea></td>

					</tr>
				<!-- 	<tr>
						<th style="width:25%">Foto Profil Pelajar Pancasila</th>
						<td>Foto 1:
	  					<input type="file" name="photo1" id="photo1">
						</td>
						<td>Foto 1:
							<input type="file" name="photo2" id="photo2">
						</td>
						<td>Foto 1:
							<input type="file" name="photo3" id="photo3">
						</td>
					</tr> -->
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
						<td><input type="radio" id="bm1" name="mulok1" value="0" checked="checked"><label for="bm1" style="margin-left: 10px;"> Belum Muncul</label></td>
						<td><input type="radio" id="mm1" name="mulok1" value="1"><label for="mm1" style="margin-left: 10px;"> Mulai Muncul</label></td>
						<td><input type="radio" id="sm1" name="mulok1" value="2"><label for="sm1" style="margin-left: 10px;"> Sudah Muncul</label></td>
					</tr>
						<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Kerapian</th>
						<td><input type="radio" id="bm2" name="mulok2" value="0" checked="checked"><label for="bm2" style="margin-left: 10px;"> Belum Muncul</label></td>
						<td><input type="radio" id="mm2" name="mulok2" value="1"><label for="mm2" style="margin-left: 10px;"> Mulai Muncul</label></td>
						<td><input type="radio" id="sm2" name="mulok2" value="2"><label for="sm2" style="margin-left: 10px;"> Sudah Muncul</label></td>
					</tr>
						<tr>
						<th style="width:5%">3</th>
						<th style="width:25%">Kesesuaian Tema</th>
						<td><input type="radio" id="bm3" name="mulok3" value="0" checked="checked"><label for="bm3" style="margin-left: 10px;"> Belum Muncul</label></td>
						<td><input type="radio" id="mm3" name="mulok3" value="1"><label for="mm3" style="margin-left: 10px;"> Mulai Muncul</label></td>
						<td><input type="radio" id="sm3" name="mulok3" value="2"><label for="sm3" style="margin-left: 10px;"> Sudah Muncul</label></td>
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
						<th><input type="text" class="form-control" name="mata" placeholder="Contoh: Rada Burem"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Pendengaran (Telinga)</th>
						<th><input type="text" class="form-control" name="telinga" placeholder="Contoh: Rada-rada Budi"></th>
					</tr>
					<tr>
						<th style="width:5%">3</th>
						<th style="width:25%">Kesehatan Gigi & Mulut</th>
						<th><input type="text" class="form-control" name="mulut" placeholder="Contoh: Tidak Pernah sikat gigi"></th>
					</tr>
					<tr>
						<th style="width:5%">4</th>
						<th style="width:25%">Kerapian dalam berpakaian</th>
						<th><input type="text" class="form-control" name="pakaian" placeholder="Contoh: Sering tidak rapi"></th>
					</tr>
					<tr>
						<th style="width:5%">5</th>
						<th style="width:25%">Berat Badan</th>
						<th><input type="number" class="form-control" name="berat" placeholder="angka saja. Contoh:26"></th>
					</tr>
					<tr>
						<th style="width:5%">6</th>
						<th style="width:25%">Tinggi Badan</th>
						<th><input type="number" class="form-control" name="tinggi" placeholder="angka saja. Contoh: 120"></th>
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
						<th><input type="number" class="form-control" name="sakit" placeholder="5"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Ijin</th>
						<th><input type="number" class="form-control" name="ijin" placeholder="3"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Alpha</th>
						<th><input type="number" class="form-control" name="alpha" placeholder="1"></th>
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
						<th><textarea name="refleksi" placeholder="Isikan Refleksi dari guru" rows="5" class="form-control"></textarea></th>
					</tr>

				</thead>
			</table>

	<input class="btn btn-success" type="submit" id="submit_button">
</form>
</main>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


	</body>
	</html>
