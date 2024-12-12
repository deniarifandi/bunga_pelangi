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
	


<div class="col-lg-8 mx-auto p-4 py-md-5">


		<main>
			<form method="POST" action="upload_foto_kegiatan.php" enctype="multipart/form-data">
			<br>
			<h4>Isi Detail Rapot <a href="index_rapot.php" class="btn btn-warning" style="float:right">Back</a></h4> 	
			<br>

			<input type="text" name="murid_id" value="<?php echo $_GET['id']; ?>" readonly>
			

			<h3>1. Kegiatan Agama</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<td>Foto 1:
	  					<input type="file" name="photo1" id="photo1">
						</td>
						<td>Foto 1:
							<input type="file" name="photo2" id="photo2">
						</td>
						<td>Foto 1:
							<input type="file" name="photo3" id="photo3">
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
	  					<input type="file" name="photo4" id="photo4">
						</td>
						<td>Foto 1:
							<input type="file" name="photo5" id="photo5">
						</td>
						<td>Foto 1:
							<input type="file" name="photo6" id="photo6">
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
	  					<input type="file" name="photo7" id="photo7">
						</td>
						<td>Foto 1:
							<input type="file" name="photo8" id="photo8">
						</td>
						<td>Foto 1:
							<input type="file" name="photo9" id="photo9">
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
