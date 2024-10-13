<?php
include('connect.php');
include('list_hasil.php');

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
		<a href="create.php" class="btn btn-success" >Buat Modul Ajar</a>

		<br>
		<br>

		<table class="table table-bordered border-dark">

				<thead>
					<tr>
						<th>No.</th>
						<th style="width: 15%;">Nama Guru</th>
						<th style="width: 15%">Topik</th>
						<th style="width: 15%">Subtopik</th>
						<th style="width: 10%">Tanggal</th>
						<th>Kelola</th>
						<th>Penilaian</th>
						<th colspan="2">Print</th>
						
						<th>Hapus</th>
					</tr>
				

</thead>

				<tbody>
					<?php
					
					for ($i=0; $i < count($list_hasil_array); $i++) { 
						?>
						<tr>
							<td><?php echo count($list_hasil_array)-$i; ?></td>
						<td class="condensed"><?php echo $list_hasil_array[$i]['nama_guru']; ?></td>
						<td class="condensed"><?php echo $list_hasil_array[$i]['topik_kegiatan']; ?></td>
						<td class="condensed"><?php echo $list_hasil_array[$i]['subtopik']; ?></td>
						
						
						<td class="condensed"><?php echo $list_hasil_array[$i]['tanggal']."-".$list_hasil_array[$i]['bulan']."-".$list_hasil_array[$i]['tahun']; ?></td>
						<td class="condensed"><a href="edit.php?id=<?php echo $list_hasil_array[$i]['id'];?>" class="btn btn-warning" >Edit</a></td>
					
						<td class="condensed"><a href="penilaian_konteks.php?id=<?php echo $list_hasil_array[$i]['id'];?>" class="btn btn-success" >Isi Konteks</a>
							<a href="list_murid_nilai.php?id=<?php echo $list_hasil_array[$i]['id'];?>" class="btn btn-danger" style="background-color:blueviolet;" >Isi Nilai</a>
						
						</td>
						
						<td class="condensed"><a href="print.php?id=<?php echo $list_hasil_array[$i]['id'];?>" class="btn btn-primary" target="_blank">Modul</a></td>
						<td class="condensed"><a href="print_penilaian.php?id=<?php echo $list_hasil_array[$i]['id'];?>" class="btn btn-primary" >Nilai</a></td>
						
						
						<td class="condensed"><a href="remove.php?id=<?php echo $list_hasil_array[$i]['id'];?>" class="btn btn-danger" >Hapus</a></td>
						</tr>
						<?php
					}
					
					?>
					
				</tbody>
			</table>
<h4>Menu Admin : </h4>
<a href="upload_peta.php" class="btn btn-danger" >Upload Peta Konsep Baru</a>
<a href="setting.php" class="btn btn-danger" >Setting</a>
	</main>
	
	<footer class="pt-5 my-5 text-body-secondary border-top">
		Created by the Distudiomalang team &middot; &copy; 2024
	</footer>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
