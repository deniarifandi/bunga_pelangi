<?php
include('connect.php');

$sql = "SELECT * FROM murid 
join kelompok on murid.murid_kelompok = kelompok.id
join nama_guru on kelompok.id = nama_guru.kelompok
group by murid.murid_id
order by murid.murid_kelompok";

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
			<h1>Print Rapot <a href="index.php" class="btn btn-warning" style="float:right">Back</a></h1> 	
			
			<br>
			<table class="table table-bordered border-dark">

				<thead>
					<tr>
						<th style="width:5%">No.</th>
						<th style="width: 15%;">Kelompok</th>
						<!-- <th style="width: 15%;">Nama Guru</th> -->
						<th style="width: 55%;">Nama Murid</th>
						
						<th colspan="2">Action</th>
					</tr>
				</thead>

				<tbody>
					<?php
					
					for ($i=0; $i < count($list_hasil_array); $i++) { 
						?>
						<tr>
							<td><?php echo count($list_hasil_array)-$i; ?></td>
							<td class="condensed"><?php echo $list_hasil_array[$i]['judul']; ?></td>
							<!-- <td class="condensed"><?php echo $list_hasil_array[$i]['nama']; ?></td> -->
							<td class="condensed"><?php echo $list_hasil_array[$i]['murid_nama']; ?></td>
						<td class="condensed"><a href="detail_rapot.php?id=<?php echo $list_hasil_array[$i]['murid_id'];?>" class="btn btn-success">Isi Detail</a></td>

						<td class="condensed"><a href="print_rapot.php?id=<?php echo $list_hasil_array[$i]['murid_id'];?>" class="btn btn-primary" target="_blank">Print Rapot</a></td>

						</tr>
						<?php
					}
					
					?>	
				</tbody>
			</table>

	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


	</body>
	</html>
