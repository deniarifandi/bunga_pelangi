<?php
include('connect.php');

$sql = "SELECT nama_guru.*, murid.*, penilaian.*, kelompok.* FROM murid
left join kelompok on kelompok.id = murid.murid_kelompok
left join penilaian on penilaian.murid_id = murid.murid_id
left join nama_guru On nama_guru.kelompok = murid.murid_kelompok

where murid.murid_id = ".$_GET['id']."  
group by penilaian.penilaian_id
order by murid.murid_nama
"
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

			<img src="KOP SURAT PPBP.jpg" style="width:100%">
			<br>
			
		<br>
			<table class="" style="width: 100%;">
				<tr class="">
					<th colspan="4" style="text-align: center; background-color: yellow; font-size:18px">Laporan Perkembangan Anak Didik</th>

				</tr>
				<tr class="">
					<th class="">Nama Sekolah</th>
					<th class="">Pos Paud Bunga Pelangi</th>
					<th class="">Kelas</th>
					<th class=""><?php echo $list_hasil_array[0]['judul']; ?></th>
				</tr>
				</tr>
				<tr class="">
					<th class="">Nama Siswa</th>
					<th class=""><?php echo $list_hasil_array[0]['murid_nama']; ?></th>
					<th class="">FASE</th>
					<th class="">PAUD</th>
				</tr>
				<tr>
					<th class="">Semester</th>
					<th class="">1</th>
					<th class="">TB</th>
					<th></th>
				</tr>
				<tr>
					<th class="">Guru Kelas</th>
					<th class=""><?php echo $list_hasil_array[0]['nama'] ?></th>
					<th class="">BB</th>
					<th></th>
				</tr>

			</table>
			<br>


			<table class="" style="width: 100%;">
				<tr class="">
					<th colspan="4" style="text-align: center; background-color: green; color: white;">Nilai Agama Dan Budi Pekerti</th>

				</tr>
				<tr class="">
					<td>
						<?php for ($i=0; $i < count($list_hasil_array); $i++) { 
							echo $list_hasil_array[$i]['amati_1']."<br>";
							echo $list_hasil_array[$i]['amati_2']."<br>";
						} ?>
					</td>
				</tr>
				<tr class="">
					<td>FOTO KEGIATAN:</td>
				</tr>

			</table>
			<br>
			<br>
			<table class="" style="width: 100%;">
				<tr class="">
					<th colspan="4" style="text-align: center; background-color: green; color: white;">Nilai Jati Diri</th>

				</tr>
				<tr class="">
					<td>
						<?php for ($i=0; $i < count($list_hasil_array); $i++) { 
							echo $list_hasil_array[$i]['amati_3']."<br>";
							echo $list_hasil_array[$i]['amati_4']."<br>";
						} ?>
					</td>
				</tr>
				<tr class="">
					<td>FOTO KEGIATAN:</td>
				</tr>

			</table>
			<br>
			<br>
			<table class="" style="width: 100%;">
				<tr class="">
					<th colspan="4" style="text-align: center; background-color: green; color: white;">Nilai dasar-dasar literasi, Matematika, Sains, Teknologi, Rekayasa dan Seni</th>

				</tr>
				<tr class="">
					<td>
						<?php for ($i=0; $i < count($list_hasil_array); $i++) { 
							echo $list_hasil_array[$i]['amati_5']."<br>";
							echo $list_hasil_array[$i]['amati_6']."<br>";
						} ?>
					</td>
				</tr>
				<tr class="">
					<td>FOTO KEGIATAN:</td>
				</tr>

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
		
		Siti Maghfiroh, S.Kom&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <?php echo $list_hasil_array[0]['nama'] ?>
	</div>
	<div class="pagebreak"> </div>
	<div class="col-lg-2">
			
		</main>

		
	</div>
</div>
</div>




<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
