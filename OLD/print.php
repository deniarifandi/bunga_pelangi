<?php
include('connect.php');
include('select_hasil.php');

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

			<form action="submit.php" method="POST">

				<h6>A. Informasi Umum</h6>
				<div class="col-lg-10 offset-lg-1">
					<table class="table table-bordered border-dark">

						<tbody>
							<tr>
								<th class="condensed">Nama Guru :</th>
								<td class="condensed">:</td>
								<td class="condensed"><?php echo $hasil_array[0]['nama_guru']; ?>
							</td>

						</tr>
						<tr>
							<th class="condensed">Kelompok Usia</th>
							<td class="condensed">:</td>
							<td class="condensed"><?php echo $hasil_array[0]['kelompok_usia']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Jumlah Anak</th>
						<td class="condensed">:</td>
						<td class="condensed" ><?php echo $hasil_array[0]['jumlah_anak']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>


		<h6>B. Peta Konsep</h6>
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered table-sm border-dark">

				<tbody>
					<tr>
						<th style="height:250px" class="text-center">
							
							<img src="img\<?php echo $hasil_array[0]['id_peta']; ?>" style="max-width: 70%; align:center" >
							
						</th>
					</tr>
				</tbody>
			</table>
		</div>

		<h6>C. Tujuan Pembelajaran</h6>
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered table-sm border-dark">
				<h6>Nilai Agama Moral dan Budi Pekerti:</h6>
				<tbody>
					
					<tr>
						<td class="condensed">
							<?php echo $hasil_array[0]['tujuan_agama_1']; ?>
						</td>
					</tr>
					
					<tr>
						<td class="condensed">
							<?php echo $hasil_array[0]['tujuan_agama_2']; ?>				
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered table-sm border-dark">
				<h6>Jati Diri :</h6>
				<tbody>
					<tr>
						<td class="condensed">
							<?php echo $hasil_array[0]['tujuan_jati_1']; ?>
						</td>

					</tr>
					<tr>
						<td class="condensed">
							<?php echo $hasil_array[0]['tujuan_jati_2']; ?>
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered table-sm border-dark">
				<h6>Literasi dan STEAM:</h6>
				<tbody>
					<tr>
						<td class="condensed">
							<?php echo $hasil_array[0]['tujuan_literasi_1']; ?>
						</td>
						
					</tr>
					<tr>
						<td class="condensed">
							<?php echo $hasil_array[0]['tujuan_literasi_2']; ?>
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>
		
		
		<h6>D. Alat dan Bahan</h6>
		<div class="col-lg-10 offset-lg-1">
			
			<table class="table table-bordered table-sm border-dark">

				<tbody>
					
					<tr>
						<td class="condensed">
							<?php echo $hasil_array[0]['alat']; ?>
						</td>
						
					</tr>
				</tbody>
			</table>
		</div>

		


		<!-- /////////////////////////////// PAGE 1-->
		<p style="page-break-after: always;">&nbsp;</p>
		
		<div class="col-lg-10 offset-lg-1">

			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" colspan="2">A.Identitas Program</th>
						
					</tr>
					<tr>
						<th class="condensed" style="width:30%">Semester / Minggu ke- :</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['semester']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Minggu Ke-</th>
						<td class="condensed"><?php echo $hasil_array[0]['minggu']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Nama Guru</th>
						<td class="condensed"><?php echo $hasil_array[0]['nama_guru']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Kelompok Usia</th>
						<td class="condensed"><?php echo $hasil_array[0]['kelompok_usia']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Hari/Tanggal</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['tanggal']; ?> - <?php echo $hasil_array[0]['bulan']; ?> - <?php echo $hasil_array[0]['tahun']; ?>
						</td>
					</tr>

					<tr>
						<th class="condensed">Topik Kegiatan</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['topik_kegiatan']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Sub-Topik</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['subtopik']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" style="width:30%">B.Pembiasaan Pagi</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['b']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">C. Kegiatan Pembuka</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['c']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">D. Kegiatan Inti Senin</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['d']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">E. Istirahat</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['e']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">F. Kegiatan Penutup</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['f']; ?>

						</td>
					</tr>
					<tr>
						<th class="condensed">G. Asessmen / Penilaian</th>
						<td class="condensed" style="white-space: normal;"><?php echo $hasil_array[0]['g']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- /////////////////////////////// PAGE 2--> 

		<p style="page-break-after: always;">&nbsp;</p>
		
		<div class="col-lg-10 offset-lg-1">

			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" colspan="2">A.Identitas Program</th>
						
					</tr>
					<tr>
						<th class="condensed" style="width:30%">Semester / Minggu ke- :</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['semester']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Minggu Ke-</th>
						<td class="condensed"><?php echo $hasil_array[0]['minggu']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Nama Guru</th>
						<td class="condensed"><?php echo $hasil_array[0]['nama_guru']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Kelompok Usia</th>
						<td class="condensed"><?php echo $hasil_array[0]['kelompok_usia']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Hari/Tanggal</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['tanggal2']; ?> - <?php echo $hasil_array[0]['bulan2']; ?> - <?php echo $hasil_array[0]['tahun2']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Topik Kegiatan</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['topik_kegiatan']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Sub-Topik</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['subtopik']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" style="width:30%">B.Pembiasaan Pagi</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['b']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">C. Kegiatan Pembuka</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['c']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">D. Kegiatan Inti Selasa</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['d2']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">E. Istirahat</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['e']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">F. Kegiatan Penutup</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['f']; ?>

						</td>
					</tr>
					<tr>
						<th class="condensed">G. Asessmen / Penilaian</th>
						<td class="condensed" style="white-space: normal;"><?php echo $hasil_array[0]['g']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- /////////////////////////////// PAGE 3--> 

		<p style="page-break-after: always;">&nbsp;</p>
		
		<div class="col-lg-10 offset-lg-1">

			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" colspan="2">A.Identitas Program</th>
						
					</tr>
					<tr>
						<th class="condensed" style="width:30%">Semester / Minggu ke- :</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['semester']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Minggu Ke-</th>
						<td class="condensed"><?php echo $hasil_array[0]['minggu']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Nama Guru</th>
						<td class="condensed"><?php echo $hasil_array[0]['nama_guru']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Kelompok Usia</th>
						<td class="condensed"><?php echo $hasil_array[0]['kelompok_usia']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Hari/Tanggal</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['tanggal3']; ?> - <?php echo $hasil_array[0]['bulan3']; ?> - <?php echo $hasil_array[0]['tahun3']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Topik Kegiatan</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['topik_kegiatan']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Sub-Topik</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['subtopik']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" style="width:30%">B.Pembiasaan Pagi</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['b']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">C. Kegiatan Pembuka</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['c']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">D. Kegiatan Inti Rabu</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['d3']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">E. Istirahat</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['e']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">F. Kegiatan Penutup</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['f']; ?>

						</td>
					</tr>
					<tr>
						<th class="condensed">G. Asessmen / Penilaian</th>
						<td class="condensed" style="white-space: normal;"><?php echo $hasil_array[0]['g']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- /////////////////////////////// PAGE 4--> 

		<p style="page-break-after: always;">&nbsp;</p>
		
		<div class="col-lg-10 offset-lg-1">

			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" colspan="2">A.Identitas Program</th>
						
					</tr>
					<tr>
						<th class="condensed" style="width:30%">Semester / Minggu ke- :</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['semester']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Minggu Ke-</th>
						<td class="condensed"><?php echo $hasil_array[0]['minggu']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Nama Guru</th>
						<td class="condensed"><?php echo $hasil_array[0]['nama_guru']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Kelompok Usia</th>
						<td class="condensed"><?php echo $hasil_array[0]['kelompok_usia']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Hari/Tanggal</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['tanggal4']; ?> - <?php echo $hasil_array[0]['bulan4']; ?> - <?php echo $hasil_array[0]['tahun4']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Topik Kegiatan</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['topik_kegiatan']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Sub-Topik</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['subtopik']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" style="width:30%">B.Pembiasaan Pagi</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['b']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">C. Kegiatan Pembuka</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['c']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">D. Kegiatan Inti Kamis</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['d4']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">E. Istirahat</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['e']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">F. Kegiatan Penutup</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['f']; ?>

						</td>
					</tr>
					<tr>
						<th class="condensed">G. Asessmen / Penilaian</th>
						<td class="condensed" style="white-space: normal;"><?php echo $hasil_array[0]['g']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<!-- /////////////////////////////// PAGE 5--> 

		<p style="page-break-after: always;">&nbsp;</p>
		
		<div class="col-lg-10 offset-lg-1">

			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" colspan="2">A.Identitas Program</th>
						
					</tr>
					<tr>
						<th class="condensed" style="width:30%">Semester / Minggu ke- :</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['semester']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Minggu Ke-</th>
						<td class="condensed"><?php echo $hasil_array[0]['minggu']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Nama Guru</th>
						<td class="condensed"><?php echo $hasil_array[0]['nama_guru']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Kelompok Usia</th>
						<td class="condensed"><?php echo $hasil_array[0]['kelompok_usia']; ?></td>
					</tr>
					<tr>
						<th class="condensed">Hari/Tanggal</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['tanggal5']; ?> - <?php echo $hasil_array[0]['bulan5']; ?> - <?php echo $hasil_array[0]['tahun5']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Topik Kegiatan</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['topik_kegiatan']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">Sub-Topik</th>
						<td class="condensed">
							<?php echo $hasil_array[0]['subtopik']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" style="width:30%">B.Pembiasaan Pagi</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['b']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">C. Kegiatan Pembuka</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['c']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">D. Kegiatan Inti Jumat</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['d5']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">E. Istirahat</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['e']; ?>
						</td>
					</tr>
					<tr>
						<th class="condensed">F. Kegiatan Penutup</th>
						<td class="condensed" style="white-space: pre-line;"><?php echo $hasil_array[0]['f']; ?>

						</td>
					</tr>
					<tr>
						<th class="condensed">G. Asessmen / Penilaian</th>
						<td class="condensed" style="white-space: normal;"><?php echo $hasil_array[0]['g']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>


		<!-- <input class="btn btn-success" type="submit"> -->

		<!-- <input type="button" value="Print this page" onClick="window.print()"> -->

	</form>
	<br>
	<br>
</main>
<div class="row">
	<div class="col-lg-2">
		Mengetahui,&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Malang, <?php echo date("d-m-Y");?><br>
		Kepala PP Bunga Pelangi&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Guru Kelompok
		<br>
		<br>
		<br>
		
		Siti Maghfiroh, S.Kom&nbsp;&nbsp;&nbsp;&nbsp; &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <?php echo $hasil_array[0]['nama_guru']; ?>
	</div>
	<div class="col-lg-2">
		
		
		<br>
		<br>
		<br>
		
		
	</div>
</div>
</div>




<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
