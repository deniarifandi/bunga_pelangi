<?php
include('connect.php');
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
	

<?php

$sql2 = "SELECT tabel_foto.*, murid.* FROM tabel_foto
join murid on murid.murid_id = tabel_foto.murid_id
where tabel_foto.murid_id = ".$_GET['id'];

// echo $sql;

$result2 = $conn->query($sql2);

$hasil_rapot = $result2->fetch_assoc();

// // $result = $conn->query($sql);

// if ($result2->num_rows > 0) {
// 	header("Location: ./edit_foto.php?id=".$_GET['id']);
// die();
// } else {
	
// }

 ?>

<div class="col-lg-8 mx-auto p-4 py-md-5">


		<main>
			<form method="POST" action="upload_foto_kegiatan.php" enctype="multipart/form-data">
			<br>
			<h4>Isi Foto Rapot <a href="index_rapot.php" class="btn btn-warning" style="float:right">Back</a></h4> 	
			<h2 class="text-danger"><?php echo $hasil_rapot['murid_nama']; ?></h2>
			<br>

			<input type="hidden" name="murid_id" value="<?php echo $_GET['id']; ?>" readonly>
			

			<h3>0. Project Pelajar Pancasila</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotopp1'] ?>" style="max-width:50%">
							<br>
							<br>
	  					<input type="file" name="pp1" id="pp1" >
	  					<input type="hidden" name="pp1alt" value="<?php echo $hasil_rapot['fotopp1']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotopp2'] ?>" style="max-width:50%">
							<br>
							<br>
							<input type="file" name="pp2" id="pp2" value="<?php echo $hasil_rapot['fotopp2']; ?>">
							<input type="hidden" name="pp2alt" value="<?php echo $hasil_rapot['fotopp2']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotopp3'] ?>" style="max-width:50%">
							<br>
							<br>
							<input type="file" name="pp3" id="pp3" value="<?php echo $hasil_rapot['fotopp3']; ?>">
							<input type="hidden" name="pp3alt" value="<?php echo $hasil_rapot['fotopp3']; ?>">
						</td>
					</tr>
				</thead>
			</table>
			<br>

			<h3>1. Kegiatan Agama</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotoagama1'] ?>" style="max-width:50%">
	  					<input type="file" name="photo1" id="photo1">
	  					<input type="hidden" name="photo1alt" value="<?php echo $hasil_rapot['fotoagama1']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotoagama2'] ?>" style="max-width:50%">
							<input type="file" name="photo2" id="photo2">
							<input type="hidden" name="photo2alt" value="<?php echo $hasil_rapot['fotoagama2']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotoagama3'] ?>" style="max-width:50%">
							<input type="file" name="photo3" id="photo3">
							<input type="hidden" name="photo3alt" value="<?php echo $hasil_rapot['fotoagama3']; ?>">
						</td>
					</tr>
				</thead>
			</table>
			<br>
					<h3>2. Kegiatan Jati Diri</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotojati1'] ?>" style="max-width:50%">
	  					<input type="file" name="photo4" id="photo4">
	  					<input type="hidden" name="photo4alt" value="<?php echo $hasil_rapot['fotojati1']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotojati2'] ?>" style="max-width:50%">
							<input type="file" name="photo5" id="photo5">
							<input type="hidden" name="photo5alt" value="<?php echo $hasil_rapot['fotojati2']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotojati3'] ?>" style="max-width:50%">
							<input type="file" name="photo6" id="photo6">
							<input type="hidden" name="photo6alt" value="<?php echo $hasil_rapot['fotojati3']; ?>">
						</td>
					</tr>
				</thead>
			</table>
			<br>
					<h3>3. Kegiatan Literasi</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotoliterasi1'] ?>" style="max-width:50%">
	  					<input type="file" name="photo7" id="photo7">
	  					<input type="hidden" name="photo7alt" value="<?php echo $hasil_rapot['fotoliterasi1']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotoliterasi2'] ?>" style="max-width:50%">
							<input type="file" name="photo8" id="photo8">
							<input type="hidden" name="photo8alt" value="<?php echo $hasil_rapot['fotoliterasi2']; ?>">
						</td>
						<td>Foto 1:
							<img src="rapot/<?php echo $hasil_rapot['fotoliterasi3'] ?>" style="max-width:50%">
							<input type="file" name="photo9" id="photo9">
							<input type="hidden" name="photo9alt" value="<?php echo $hasil_rapot['fotoliterasi3']; ?>">
						</td>
					</tr>
				</thead>
			</table>


	<input class="btn btn-success" type="submit" id="submit_button">
</form>
</main>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


	</body>
	</html>
