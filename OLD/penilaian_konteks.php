<?php
include('connect.php');
// include('penilaian_list_data.php');

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
			<form action="submitkonteks.php" method="POST">

				<input type="text" name="id_hasil" value="<?php echo $_GET['id']; ?> " style="display:none;">
				<table class="table table-bordered border-dark">

					<thead>
						<tr>
							<th rowspan="2"></th>
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
							<th><textarea rows="7" name="konteks_1"><?php echo $list_nilai_array[0]['konteks1'] ?></textarea></th>
							<th><textarea rows="7" name="konteks_2"><?php echo $list_nilai_array[0]['konteks2'] ?></textarea></th>
							<th><textarea rows="7" name="konteks_3"><?php echo $list_nilai_array[0]['konteks3'] ?></textarea></th>
							<th><textarea rows="7" name="konteks_4"><?php echo $list_nilai_array[0]['konteks4'] ?></textarea></th>
							<th><textarea rows="7" name="konteks_5"><?php echo $list_nilai_array[0]['konteks5'] ?></textarea></th>
							<th><textarea rows="7" name="konteks_6"><?php echo $list_nilai_array[0]['konteks6'] ?></textarea></th>

						</tr>


					</thead>

					
				</table>
				
				<input class="btn btn-success" type="submit" id="submit_button" style="float: right;">
				<a href="index.php" class="btn btn-warning" type="button" style="float: right;  margin-right: 15px;">Back</a>
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
