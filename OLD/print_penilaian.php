<?php
include('connect.php');

$sql = "SELECT * FROM penilaian 
LEFT JOIN hasil ON penilaian.hasil_id = hasil.id
left join murid on penilaian.murid_id = murid.murid_id
where hasil_id = ".$_GET['id']."  
order by murid.murid_nama"
;

// echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	while( $row = $result->fetch_assoc()){
		$list_hasil_array[] = $row;
	}
} else {
	echo "0 results";
}


// print_r($list_hasil_array);
// echo json_encode($list_hasil_array);



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

	<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" media="screen,print">

	<style>
		  @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
		
		table, th, td {
		  border:1px solid black;
		  padding: 5px;
		  font-size: 13px;
		}
		
		.borderless{
			border:0px solid white;
		  	
		}

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

			<?php for ($i=0; $i < count($list_hasil_array); $i++) { 
			?>
			<h3>Penilaian Checklist Bunga Pelangi</h3>
		<br>
			<table class="borderless">
				<tr class="borderless">
					<th class="borderless">Semester</th>
					<th class="borderless">: <?php echo $list_hasil_array[0]['semester']; ?></th>
				</tr>
				<tr>
					<th class="borderless">Kelompok</th>
					<th class="borderless">: <?php echo $list_hasil_array[0]['kelompok_usia']; ?></th>
				</tr>
				<tr>
					<th class="borderless">Nama Anak</th>
					<th class="borderless">: <?php echo $list_hasil_array[$i]['murid_nama'] ?></th>
				</tr>

			</table>
			<br>
			<table style="width:100%">
				<thead>
					<tr>
						<th>Tujuan Pembelajaran</th>
						<th>Konteks / Kegiatan</th>
						<th>Belum Muncul</th>
						<th>Muncul</th>
						<th>Kejadian yang Diamati</th>
					</tr>
				</thead>
				<tbody>
					<?php if($list_hasil_array[$i]['tujuan_agama_1'] != 0) {?>
					<tr>
						<td><?php echo $list_hasil_array[$i]['tujuan_agama_1']; ?></td>
						<td><?php echo $list_hasil_array[$i]['konteks1']; ?></td>
						<td style="text-align:center"><?php if ($list_hasil_array[$i]['check_1'] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($list_hasil_array[$i]['check_1'] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $list_hasil_array[$i]['amati_1']; ?>
						</td>
					</tr>
					<?php } ?>
					<?php if($list_hasil_array[$i]['tujuan_agama_2'] != 0) {?>
					<tr>
						<td><?php echo $list_hasil_array[$i]['tujuan_agama_2']; ?></td>
						<td><?php echo $list_hasil_array[$i]['konteks2']; ?></td>
						<td style="text-align:center"><?php if ($list_hasil_array[$i]['check_2'] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($list_hasil_array[$i]['check_2'] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $list_hasil_array[$i]['amati_2']; ?>
						</td>
					</tr>
					<?php } ?>
					<?php if($list_hasil_array[$i]['tujuan_jati_1'] != 0) {?>
					<tr>
						<td><?php echo $list_hasil_array[$i]['tujuan_jati_1']; ?></td>
						<td><?php echo $list_hasil_array[$i]['konteks3']; ?></td>
						<td style="text-align:center"><?php if ($list_hasil_array[$i]['check_3'] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($list_hasil_array[$i]['check_3'] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $list_hasil_array[$i]['amati_3']; ?>
						</td>
					</tr>
					<?php } ?>
					<?php if($list_hasil_array[$i]['tujuan_jati_2'] != 0) {?>
					<tr>
						<td><?php echo $list_hasil_array[$i]['tujuan_jati_2']; ?></td>
						<td><?php echo $list_hasil_array[$i]['konteks4']; ?></td>
						<td style="text-align:center"><?php if ($list_hasil_array[$i]['check_4'] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($list_hasil_array[$i]['check_4'] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $list_hasil_array[$i]['amati_4']; ?>
						</td>
					</tr>
					<?php } ?>
					<?php if($list_hasil_array[$i]['tujuan_literasi_1'] != 0) {?>
					<tr>
						<td><?php echo $list_hasil_array[$i]['tujuan_literasi_1']; ?></td>
						<td><?php echo $list_hasil_array[$i]['konteks5']; ?></td>
						<td style="text-align:center"><?php if ($list_hasil_array[$i]['check_5'] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($list_hasil_array[$i]['check_5'] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $list_hasil_array[$i]['amati_5'] ?>
						</td>
					</tr>
					<?php } ?>
					<?php if($list_hasil_array[$i]['tujuan_literasi_2'] != 0) {?>
					<tr>
						<td><?php echo $list_hasil_array[$i]['tujuan_literasi_2']; ?></td>
						<td><?php echo $list_hasil_array[$i]['konteks6']; ?></td>
						<td style="text-align:center"><?php if ($list_hasil_array[$i]['check_6'] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($list_hasil_array[$i]['check_6'] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $list_hasil_array[$i]['amati_6'] ?>
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>

		<br>
		<br>
		<br>
		

<div class="row">
	<div class="col-lg-2">
		Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Malang, <?php echo date("d-m-Y");?><br>
		Kepala PP Bunga Pelangi&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Guru Kelompok
		<br>
		<br>
		<br>
		
		Siti Maghfiroh, S.Kom&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <?php echo $list_hasil_array[$i]['nama_guru'] ?>
	</div>
	<div class="pagebreak"> </div>
	<div class="col-lg-2">
			<?php
				}
			?>
		</main>

		
	</div>
</div>
</div>




<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
