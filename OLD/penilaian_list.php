<?php
include('connect.php');
// include('penilaian_list_data.php');

$sql = "SELECT * FROM murid
left join kelompok on murid.murid_kelompok = kelompok.id
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
			<form action="submitnilai.php" method="POST">

				<input type="text" name="id_hasil" value="<?php echo $_GET['id']; ?> " style="display:none;">
				<table class="table table-bordered border-dark">

					<thead>
						<tr>
							<th rowspan="2">Nama Murid</th>
							<th >Tujuan Agama 1</th>
							<th >Tujuan Agama 2</th>
							<th >Tujuan JatiDiri 1</th>
							<th >Tujuan JatiDiri 2</th>
							<th >Tujuan Literasi 1</th>
							<th >Tujuan Literasi 2</th>
							<th rowspan="3">Kejadian yang diamati</th>
						</tr>
						<tr>
							<th><?php echo $list_nilai_array[0]['tujuan_agama_1']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_agama_2']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_jati_1']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_jati_2']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_literasi_1']; ?></th>
							<th><?php echo $list_nilai_array[0]['tujuan_literasi_2']; ?></th>
						</tr>
						<tr>
							<th>Konteks</th>
							<th><textarea rows="7" name="konteks_1"></textarea></th>
							<th><textarea rows="7" name="konteks_2"></textarea></th>
							<th><textarea rows="7" name="konteks_3"></textarea></th>
							<th><textarea rows="7" name="konteks_4"></textarea></th>
							<th><textarea rows="7" name="konteks_5"></textarea></th>
							<th><textarea rows="7" name="konteks_6"></textarea></th>

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
									<?php $murid_id = $murid_id."~".$list_hasil_array[$i]['murid_nama']; ?>
									<td>
										<?php
										if ($list_nilai_array[0]['tujuan_agama_1'] != 0) {
											?>
											<input type="radio" id="<?php echo $icounter;?>konteks1yes" name="<?php echo $icounter;?>konteks1" value="1" checked>
											<label for="<?php echo $icounter;?>konteks1yes">Muncul</label><br>
											<input type="radio" id="<?php echo $icounter;?>konteks1no" name="<?php echo $icounter;?>konteks1" value="0">
											<label for="<?php echo $icounter;?>konteks1no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati1_<?php echo $counter; ?>"></textarea>

											<?php
										}
										?>
									</td>
									<td>
										<?php
										if ($list_nilai_array[0]['tujuan_agama_2'] != 0) {
											?>
											<input type="radio" id="<?php echo $icounter;?>konteks2yes" name="<?php echo $icounter;?>konteks2" value="1" checked>
											<label for="<?php echo $icounter;?>konteks2yes">Muncul</label><br>
											<input type="radio" id="<?php echo $icounter;?>konteks2no" name="<?php echo $icounter;?>konteks2" value="0">
											<label for="<?php echo $icounter;?>konteks2no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati2_<?php echo $counter; ?>"></textarea>
											<?php
										}
										?>
									</td>
									<td>
										<?php
										if ($list_nilai_array[0]['tujuan_jati_1'] != 0) {
											?>
											<input type="radio" id="<?php echo $icounter;?>konteks3yes" name="<?php echo $icounter;?>konteks3" value="1" checked>
											<label for="<?php echo $icounter;?>konteks3yes">Muncul</label><br>
											<input type="radio" id="<?php echo $icounter;?>konteks3no" name="<?php echo $icounter;?>konteks3" value="0">
											<label for="<?php echo $icounter;?>konteks3no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati3_<?php echo $counter; ?>"></textarea>
											<?php
										}
										?>
									</td>
									<td>
										<?php
										if ($list_nilai_array[0]['tujuan_jati_2'] != 0) {
											?>
											<input type="radio" id="<?php echo $icounter;?>konteks4yes" name="<?php echo $icounter;?>konteks4" value="1" checked>
											<label for="<?php echo $icounter;?>konteks4yes">Muncul</label><br>
											<input type="radio" id="<?php echo $icounter;?>konteks4no" name="<?php echo $icounter;?>konteks4" value="0">
											<label for="<?php echo $icounter;?>konteks4no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati4_<?php echo $counter; ?>"></textarea>
											<?php
										}
										?>
									</td>
									<td>
										<?php
										if ($list_nilai_array[0]['tujuan_literasi_1'] != 0) {
											?>
											<input type="radio" id="<?php echo $icounter;?>konteks5yes" name="<?php echo $icounter;?>konteks5" value="1" checked>
											<label for="<?php echo $icounter;?>konteks5yes">Muncul</label><br>
											<input type="radio" id="<?php echo $icounter;?>konteks5no" name="<?php echo $icounter;?>konteks5" value="0">
											<label for="<?php echo $icounter;?>konteks5no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati5_<?php echo $counter; ?>"></textarea>
											<?php
										}
										?>
									</td>
									<td>
										<?php
										if ($list_nilai_array[0]['tujuan_literasi_2'] != 0) {
											?>
											<input type="radio" id="<?php echo $icounter;?>konteks6yes" name="<?php echo $icounter;?>konteks6" value="1" checked>
											<label for="<?php echo $icounter;?>konteks6yes">Muncul</label><br>
											<input type="radio" id="<?php echo $icounter;?>konteks6no" name="<?php echo $icounter;?>konteks6" value="0">
											<label for="<?php echo $icounter;?>konteks6no">Belum Muncul</label><br>
											<br>
											Kejadian yang diamati:
											<textarea rows="7" name="amati6_<?php echo $counter; ?>"></textarea>
											<?php
										}
										?>
									</td>

									<td>
										
										<?php $counter++ ?>
										<?php $icounter++ ?>
									</td>

								</tr>

								<?php
							}
						}

						?>


					</tbody>
				</table>
				<input type="text" name="murid_id" value="<?php echo $murid_id; ?>">
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
