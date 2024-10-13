<?php
include('connect.php');
// include('penilaian_list_data.php');

$murid_id = $_GET['murid_id'];

$sql = "SELECT * FROM murid
left join kelompok on murid.murid_kelompok = kelompok.id
where murid_id = $murid_id
";
$result = $conn->query($sql);

// $list_nilai_array = [];

if ($result->num_rows > 0) {

	while( $row = $result->fetch_assoc()){
		$list_hasil_array[] = $row;
	}
} else {
	echo "0 results";
}

$nilai = "SELECT * FROM hasil where hasil.id = ".$_GET['id'];
$resultnilai = $conn->query($nilai);

if ($resultnilai->num_rows > 0) {

	while( $row = $resultnilai->fetch_assoc()){
		$list_nilai_array[] = $row;
    // echo $row;
	}
} else {
	echo "0 results";
}

$penilaian = "SELECT * FROM penilaian where murid_id = ".$_GET['murid_id'];
$resultpenilaian = $conn->query($penilaian);

if ($resultpenilaian->num_rows > 0) {

	while( $row = $resultpenilaian->fetch_assoc()){
		$list_penilaian_array[] = $row;
    // echo $row;
	}
} else {
	echo "0 results";
}



// print_r($list_nilai_array);

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
			<!-- <a href="create.php" class="btn btn-success" >Penilaian_list</a> -->

			<br>

			<table class="table table-bordered border-dark">

				<thead>
					<tr>
						<th>Nama Guru</th>
						<th>Kelas</th>
						<th>Topik</th>
						<th>Subtopik</th>
						<th>Tanggal</th>
					</tr>
					

				</thead>

				<tbody>
					<tr>
						<td><?php echo $list_nilai_array[0]['nama_guru'] ?></td>
						<td><?php echo $list_nilai_array[0]['kelompok_usia'] ?></td>
						<td><?php echo $list_nilai_array[0]['topik_kegiatan'] ?></td>
						<td><?php echo $list_nilai_array[0]['subtopik'] ?></td>
						<td><?php echo $list_nilai_array[0]['tanggal']."-".$list_nilai_array[0]['bulan']."-".$list_nilai_array[0]['tahun']; ?></td>
					</tr>
					
				</tbody>
			</table>
			<br>
			<form action="submitnilaimurid.php" method="POST">

				<input type="text" name="id_hasil" value="<?php echo $_GET['id']; ?> " style="display:none;">
				<table class="table table-bordered border-dark">

					<thead>
						<tr>
							<th rowspan="2">Nama Murid</th>
							<th >Tujuan Agama 1</th>
							<th >Tujuan Agama 2</th>
							<th >Tujuan JatiDiri 1</th>
							<th >Tujuan JatiDiri 2</th>
							<th colspan="2">Tujuan Literasi 1</th>
							<th >Tujuan Literasi 2</th>
							
						</tr>
						<tr>
							<th><?php echo $list_nilai_array[0]['tujuan_agama_1']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_agama_2']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_jati_1']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_jati_2']; ?></th>
							<th colspan="2"><?php echo $list_nilai_array[0]['tujuan_literasi_1']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_literasi_2']; ?></th>
						</tr>
						<tr>
							<th>Konteks</th>
							<th><?php echo $list_nilai_array[0]['konteks1']; ?></th>
							<th><?php echo $list_nilai_array[0]['konteks2']; ?></th>
							<th><?php echo $list_nilai_array[0]['konteks3']; ?></th>
							<th><?php echo $list_nilai_array[0]['konteks4']; ?></th>
							<th><?php echo $list_nilai_array[0]['konteks5']; ?></th>
							<th colspan="2"><?php echo $list_nilai_array[0]['konteks6']; ?></th>

						</tr>


					</thead>

					<tbody>

						<?php
						$counter = 0;
						$icounter = 0;
						$murid_id = null;

						for ($i=0; $i < count($list_hasil_array); $i++) { 
							if($list_hasil_array[$i]['deskripsi'] == $list_nilai_array[0]['kelompok_usia']){
								?>

								<tr>
									<td class="condensed"><?php echo $list_hasil_array[$i]['murid_nama']; ?></td>
									<?php $murid_id = $list_hasil_array[$i]['murid_id']; ?>
									
									<?php if (isset($list_penilaian_array[$i])) {
									
									?>
									<td>
										
											<input type="radio" id="konteks1yes" name="konteks1" value="1" <?php if ($list_penilaian_array[$i]['check_1'] == 1) {
												?>
												checked
												<?php } ?>>
											<label for="konteks1yes">Muncul</label><br>
											<input type="radio" id="konteks1no" name="konteks1" value="0" <?php if ($list_penilaian_array[$i]['check_1'] == 0) {
												?>
												checked
												<?php } ?>>
											<label for="konteks1no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati1"><?php echo $list_penilaian_array[$i]['amati_1']; ?></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks2yes" name="konteks2" value="1" <?php if ($list_penilaian_array[$i]['check_2'] == 1) {
												?>
												checked
												<?php } ?>>
											<label for="konteks2yes">Muncul</label><br>
											<input type="radio" id="konteks2no" name="konteks2" value="0" <?php if ($list_penilaian_array[$i]['check_2'] == 0) {
												?>
												checked
												<?php } ?>>
											<label for="konteks2no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati2"><?php echo $list_penilaian_array[$i]['amati_2']; ?></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks3yes" name="konteks3" value="1" <?php if ($list_penilaian_array[$i]['check_3'] == 1) {
												?>
												checked
												<?php } ?>>
											<label for="konteks3yes">Muncul</label><br>
											<input type="radio" id="konteks3no" name="konteks3" value="0" <?php if ($list_penilaian_array[$i]['check_3'] == 0) {
												?>
												checked
												<?php } ?>>
											<label for="konteks3no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati3"><?php echo $list_penilaian_array[$i]['amati_3']; ?></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks4yes" name="konteks4" value="1" <?php if ($list_penilaian_array[$i]['check_4'] == 1) {
												?>
												checked
												<?php } ?>>
											<label for="konteks4yes">Muncul</label><br>
											<input type="radio" id="konteks4no" name="konteks4" value="0" <?php if ($list_penilaian_array[$i]['check_4'] == 0) {
												?>
												checked
												<?php } ?>>
											<label for="konteks4no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati4"><?php echo $list_penilaian_array[$i]['amati_4']; ?></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks5yes" name="konteks5" value="1" <?php if ($list_penilaian_array[$i]['check_5'] == 1) {
												?>
												checked
												<?php } ?>>
											<label for="konteks5yes">Muncul</label><br>
											<input type="radio" id="konteks5no" name="konteks5" value="0" <?php if ($list_penilaian_array[$i]['check_5'] == 0) {
												?>
												checked
												<?php } ?>>
											<label for="konteks5no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati5"><?php echo $list_penilaian_array[$i]['amati_5']; ?></textarea>
									</td>
									<td colspan="2">
										
											<input type="radio" id="konteks6yes" name="konteks6" value="1" <?php if ($list_penilaian_array[$i]['check_6'] == 1) {
												?>
												checked
												<?php } ?>>
											<label for="konteks6yes">Muncul</label><br>
											<input type="radio" id="konteks6no" name="konteks6" value="0" <?php if ($list_penilaian_array[$i]['check_6'] == 0) {
												?>
												checked
												<?php } ?>>
											<label for="konteks6no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati6"><?php echo $list_penilaian_array[$i]['amati_6']; ?></textarea>
									</td>
									<?php 
										}	else{

									?>

									<td>
										
											<input type="radio" id="konteks1yes" name="konteks1" value="1" checked>
											<label for="konteks1yes">Muncul</label><br>
											<input type="radio" id="konteks1no" name="konteks1" value="0">
											<label for="konteks1no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati1"></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks2yes" name="konteks2" value="1" checked>
											<label for="konteks2yes">Muncul</label><br>
											<input type="radio" id="konteks2no" name="konteks2" value="0">
											<label for="konteks2no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati2"></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks3yes" name="konteks3" value="1" checked>
											<label for="konteks3yes">Muncul</label><br>
											<input type="radio" id="konteks3no" name="konteks3" value="0">
											<label for="konteks3no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati3"></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks4yes" name="konteks4" value="1" checked>
											<label for="konteks4yes">Muncul</label><br>
											<input type="radio" id="konteks4no" name="konteks4" value="0">
											<label for="konteks4no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati4"></textarea>
									</td>
									<td>
										
											<input type="radio" id="konteks5yes" name="konteks5" value="1" checked>
											<label for="konteks5yes">Muncul</label><br>
											<input type="radio" id="konteks5no" name="konteks5" value="0">
											<label for="konteks5no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati5"></textarea>
									</td>
									<td colspan="2">
										
											<input type="radio" id="konteks6yes" name="konteks6" value="1" checked>
											<label for="konteks6yes">Muncul</label><br>
											<input type="radio" id="konteks6no" name="konteks6" value="0">
											<label for="konteks6no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati6"></textarea>
									</td>
									
									<?php 
										}
									?>
										
										<?php $counter++ ?>
										<?php $icounter++ ?>
									

								</tr>

								<?php
							}
						}

						?>


					</tbody>
				</table>
				<input type="text" name="murid_id" value="<?php echo $murid_id; ?>" style="display: none;">
				<a href="list_murid_nilai.php?id=<?php echo $_GET['id'] ?>" class="btn btn-danger" type="button" id="submit_button" style="float: right; margin-left: 25px;">Back</a>
				<input class="btn btn-success" type="submit" id="submit_button" style="float: right;">
				<br>
			</form>
		</main>

		<footer class="pt-5 my-5 text-body-secondary border-top">
			Created by the Distudiomalang team &middot; &copy; 2024
		</footer>
	</div>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
