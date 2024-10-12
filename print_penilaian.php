<?php
include('connect.php');

$sql = "SELECT * FROM penilaian INNER JOIN hasil ON penilaian.hasil_id = hasil.id  where hasil_id = ".$_GET['id'];

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

$exploded_murid = explode("~",$list_hasil_array[0]['murid_id']);
$exploded_radio_1 = str_split($list_hasil_array[0]['check_1']);
$exploded_radio_2 = str_split($list_hasil_array[0]['check_2']);
$exploded_radio_3 = str_split($list_hasil_array[0]['check_3']);
$exploded_radio_4 = str_split($list_hasil_array[0]['check_4']);
$exploded_radio_5 = str_split($list_hasil_array[0]['check_5']);
$exploded_radio_6 = str_split($list_hasil_array[0]['check_6']);
$exploded_amati_1 = explode("~",$list_hasil_array[0]['amati_1']);
$exploded_amati_2 = explode("~",$list_hasil_array[0]['amati_2']);
$exploded_amati_3 = explode("~",$list_hasil_array[0]['amati_3']);
$exploded_amati_4 = explode("~",$list_hasil_array[0]['amati_4']);
$exploded_amati_5 = explode("~",$list_hasil_array[0]['amati_5']);
$exploded_amati_6 = explode("~",$list_hasil_array[0]['amati_6']);

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
<body onload="window.print()">
	



	<div class="col-lg-8 mx-auto p-4 py-md-5">

		
		<main>

			<?php for ($i=1; $i < count($exploded_murid); $i++) { 
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
					<th class="borderless">: <?php echo $exploded_murid[$i] ?></th>
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
					<tr>
						<td><?php echo $list_hasil_array[0]['tujuan_agama_1']; ?></td>
						<td><?php echo $list_hasil_array[0]['konteks_1']; ?></td>
						<td style="text-align:center"><?php if ($exploded_radio_1[$i-1] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($exploded_radio_1[$i-1] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $exploded_amati_1[$i-1]; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $list_hasil_array[0]['tujuan_agama_2']; ?></td>
						<td><?php echo $list_hasil_array[0]['konteks_2']; ?></td>
						<td style="text-align:center"><?php if ($exploded_radio_2[$i-1] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($exploded_radio_2[$i-1] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $exploded_amati_2[$i-1]; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $list_hasil_array[0]['tujuan_jati_1']; ?></td>
						<td><?php echo $list_hasil_array[0]['konteks_3']; ?></td>
						<td style="text-align:center"><?php if ($exploded_radio_3[$i-1] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($exploded_radio_3[$i-1] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $exploded_amati_3[$i-1]; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $list_hasil_array[0]['tujuan_jati_2']; ?></td>
						<td><?php echo $list_hasil_array[0]['konteks_4']; ?></td>
						<td style="text-align:center"><?php if ($exploded_radio_4[$i-1] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($exploded_radio_4[$i-1] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $exploded_amati_4[$i-1]; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $list_hasil_array[0]['tujuan_literasi_1']; ?></td>
						<td><?php echo $list_hasil_array[0]['konteks_5']; ?></td>
						<td style="text-align:center"><?php if ($exploded_radio_5[$i-1] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($exploded_radio_5[$i-1] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $exploded_amati_5[$i-1]; ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $list_hasil_array[0]['tujuan_jati_2']; ?></td>
						<td><?php echo $list_hasil_array[0]['konteks_6']; ?></td>
						<td style="text-align:center"><?php if ($exploded_radio_6[$i-1] == 0) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?></td>
						<td style="text-align: center;">
							<?php if ($exploded_radio_6[$i-1] == 1) {
							?><img src="img/centang.png" style="max-width:15px"><?php
						} ?>
						</td>
						<td>
							<?php echo $exploded_amati_6[$i-1]; ?>
						</td>
					</tr>
					
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
		
		Siti Maghfiroh, S.Kom&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <?php echo "guru"; ?>
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
