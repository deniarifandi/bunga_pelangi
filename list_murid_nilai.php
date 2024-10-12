<?php
include('connect.php');
// include('penilaian_list_data.php');

$sql = "SELECT * FROM murid
left join kelompok on murid.murid_kelompok = kelompok.id
order by murid_nama
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
							<th width="50%">Nama Murid</th>
						
							<th >Beri Nilai</th>
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
										<a href="isi_nilai.php?id=<?php echo $_GET['id']; ?>&murid_id=<?php echo $list_hasil_array[$i]['murid_id'] ?>" class="btn btn-primary btn-sm">Isi Nilai</a>
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
