<?php
include('connect.php');

$sql = "SELECT nama_guru.*, murid.*, penilaian.*, kelompok.*, detail_rapot.* FROM murid
left join kelompok on kelompok.id = murid.murid_kelompok
left join penilaian on penilaian.murid_id = murid.murid_id
left join nama_guru On nama_guru.kelompok = murid.murid_kelompok
left join detail_rapot on detail_rapot.murid_id = murid.murid_id

where murid.murid_id = ".$_GET['id']."  
group by penilaian.penilaian_id
order by detail_rapot.id asc
"
;

// echo $sql;

$result = $conn->query($sql);

// echo json_encode($result->fetch_assoc());

if ($result->num_rows > 0) {

	while( $row = $result->fetch_assoc()){
		$list_hasil_array[] = $row;

	}
} else {
	// echo "0 results";
}


$sql = "SELECT tabel_foto.*
FROM tabel_foto
where tabel_foto.murid_id = ".$_GET['id']."  
order by tabel_foto.id desc
"
;

// echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {

	while( $row = $result->fetch_assoc()){
		$list_foto[] = $row;
	}
} else {
	// echo "0 results";
}

// print_r($list_hasil_array);
// echo json_encode($list_hasil_array);
$tanggalrapot = "";
for ($i=0; $i < count($list_hasil_array); $i++) { 
	if ($list_hasil_array[$i]['kelompok'] == 1) {
		$tanggalrapot = "2 Juni 2025";
		$list_hasil_array[$i]['nama'] = "Erik Susanti, S.Pd AUD";
	}else if($list_hasil_array[$i]['kelompok'] == 2){
		$tanggalrapot = "20 Juni 2025";
		$list_hasil_array[$i]['nama'] = "Tri Pudji Astutik";
	}else if($list_hasil_array[$i]['kelompok'] == 3){
		$tanggalrapot = "2 Juni 2025";
		$list_hasil_array[$i]['nama'] = "Eny Dwi Astutiningsih, S.Pd";
	}
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

	<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet" media="screen,print">

<style type="text/css">
  @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
  }
</style>

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
					<td colspan="3">
						<textarea style="white-space:normal; width: 100%;" rows="<?php echo count($list_hasil_array)+2 ?>" class="form-control">
<?php for ($i=0; $i < count($list_hasil_array); $i++) { 
echo $list_hasil_array[$i]['amati_1'];
echo $list_hasil_array[$i]['amati_2']."\n";
} ?>
					</textarea>
					</td>
				</tr>
				<tr class="">
					<td colspan="3">FOTO KEGIATAN:</td>
				</tr>
				<tr class="">
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotoagama1'] ?>" style="max-width:90%; max-height: 225px;"></td>
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotoagama2'] ?>" style="max-width:90%; max-height: 225px;" alt="foto"></td>
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotoagama3'] ?>" style="max-width:90%; max-height: 225px;"></td>
				</tr>

			</table>

			 <div > </div>
			<br>
			<br>
			<table class="" style="width: 100%;">
				<tr class="">
					<th colspan="4" style="text-align: center; background-color: green; color: white;">Nilai Jati Diri</th>

				</tr>
				<tr class="">
					<td colspan="3">

						<textarea style="white-space:pre-wrap; width: 100%;" rows="5" class="form-control"><?php for ($i=0; $i < count($list_hasil_array); $i++) { 
echo $list_hasil_array[$i]['amati_3'];
echo $list_hasil_array[$i]['amati_4']."\n";
} ?>
						</textarea>

					</td>
				</tr>
				<tr class="">
					<td colspan="3">FOTO KEGIATAN:</td>
				</tr>
				<tr class="">
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotojati1'] ?>" style="max-width:90%; max-height: 225px;"></td>
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotojati2'] ?>" style="max-width:90%; max-height: 225px;" alt="foto"></td>
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotojati3'] ?>" style="max-width:90%; max-height: 225px;" alt="foto"></td>
				</tr>

			</table>
			<br>
			<br>
			<table class="" style="width: 100%;">
				<tr class="">
					<th colspan="4" style="text-align: center; background-color: green; color: white;">Nilai dasar-dasar literasi, Matematika, Sains, Teknologi, Rekayasa dan Seni</th>

				</tr>
				<tr class="">
					<td colspan="3">
						<textarea style="width:100%" class="form-control" rows="5"><?php for ($i=0; $i < count($list_hasil_array); $i++) { 
echo $list_hasil_array[$i]['amati_5'];
echo $list_hasil_array[$i]['amati_6']."\n";
} ?>
						</textarea>
					</td>
				</tr>
				<tr class="">
					<td colspan="3">FOTO KEGIATAN:</td>
				</tr>
				<tr class="">
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotoliterasi1'] ?>" style="max-width:90%; max-height: 225px;"></td>
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotoliterasi2'] ?>" style="max-width:90%; max-height: 225px;"></td>
					<td style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotoliterasi3'] ?>" style="max-width:90%; max-height: 225px;"></td>
				</tr>

			</table>
		
		<br>
		 <div > </div>

		<br>
			<table class="" style="width: 100%;">
				<tr class="">
					<th colspan="4" style="text-align: center; background-color: green; color: white;">Project Profil Pelajar Pancasila</th>

				</tr>
				<tr class="">
					<td colspan="3">
						<textarea style="width:100%" class="form-control" rows="5"><?php echo $list_hasil_array[0]['pp']; ?></textarea>
					</td>
				</tr>
				<tr class="">
					<td colspan="3">FOTO KEGIATAN:</td>
				</tr>
				<tr class="">
					<td style="width:33%" ><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotopp1'] ?>" style="max-width:100%; max-height: 225px;"></td>
					<td style="width:33%" ><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotopp2'] ?>" style="max-width:100%; max-height: 225px;"></td>
					<td  style="width:33%"><img onerror="this.style.display='none'" src="rapot/<?php echo $list_foto[0]['fotopp3'] ?>" style="max-width:100%; max-height: 225px;"></td>
				</tr>

			</table>
		<br>
		
		<br>
			<table class="" style="width: 100%; text-align: center;">
				<tr class="">
					<th colspan="5" style="text-align: center; background-color: green; color: white;">Muatan Lokal</th>
				</tr>
					<tr>
						<th rowspan="2">No</th>
						<th rowspan="2" style="width:25%">Bidang Pengembangan</th>
						<th colspan="3">Capaian Perkembangan</th>
					</tr>
					<tr>
						
						
						<th>BM</th>
						<th>MM</th>
						<th>SM</th>

					</tr>
					<tr>
						<td>1</td>
						<td>Komposisi Warna</td>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok1'] != 0) {
							?>display: none<?php
						} ?>"></th>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok1'] != 1) {
							?>display: none<?php
						} ?>"></th>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok1'] != 2) {
							?>display: none<?php
						} ?>"></th>
					</tr>
					<tr>
						<td>2</td>
						<td>Kerapian</td>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok2'] != 0) {
							?>display: none<?php
						} ?>"></th>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok2'] != 1) {
							?>display: none<?php
						} ?>"></th>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok2'] != 2) {
							?>display: none<?php
						} ?>"></th>
					</tr>
					<tr>
						<td>3</td>
						<td>Kesesuaian Tema</td>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok3'] != 0) {
							?>display: none<?php
						} ?>"></th>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok3'] != 1) {
							?>display: none<?php
						} ?>"></th>
						<th><img src="img/centang2.png" style="max-width:15px; <?php if ($list_hasil_array[0]['mulok3'] != 2) {
							?>display: none<?php
						} ?>"></th>
					</tr>

			</table>
		<br>
		
		<table class="" style="width: 100%; text-align: center;">
				<tr class="">
					<th colspan="5" style="text-align: center; background-color: green; color: white;">Tumbuh Kembang</th>
				</tr>
					<tr>
						<th>No</th>
						<th style="width:25%">Aspek Perkembangan</th>
						<th>Keterangan</th>
					</tr>
					
					<tr>
						<td>1</td>
						<td>Pengelihatan (Mata)</td>
						<td><?php echo $list_hasil_array[0]['mata'];?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Pendengaran (Telinga)</td>
						<td><?php echo $list_hasil_array[0]['telinga'];?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Kesehatan Gigi & Mulut</td>
						<td><?php echo $list_hasil_array[0]['mulut'];?></td>
					</tr>
					<tr>
						<td>4</td>
						<td>Kerapian dalam Berpakaian</td>
						<td><?php echo $list_hasil_array[0]['pakaian'];?></td>
					</tr>
					<tr>
						<td>5</td>
						<td>Berat Badan</td>
						<td><?php echo $list_hasil_array[0]['berat'];?></td>
					</tr>
					<tr>
						<td>6</td>
						<td>Tinggi Badan</td>
						<td><?php echo $list_hasil_array[0]['tinggi'];?></td>
					</tr>
			</table>
			<div > </div>
			<br>
			<table class="" style="width: 100%; text-align: center;">
				<tr class="">
					<th colspan="5" style="text-align: center; background-color: green; color: white;">Presensi</th>
				</tr>
					<tr>
						<th>No</th>
						<th style="width:25%">Keterangan</th>
						<th>Semester 1</th>
					</tr>
					
					<tr>
						<td>1</td>
						<td>Sakit</td>
						<td><?php echo $list_hasil_array[0]['sakit'];?></td>
					</tr>
					<tr>
						<td>2</td>
						<td>Ijin</td>
						<td><?php echo $list_hasil_array[0]['ijin'];?></td>
					</tr>
					<tr>
						<td>3</td>
						<td>Alpha</td>
						<td><?php echo $list_hasil_array[0]['alpha'];?></td>
					</tr>
			
			</table>
			<br>

			<table class="borderless" style="width:100%; text-align:center">
				<thead>
					<tr>
						<th class="borderless" style="width:20%"></th>
						<th class="borderless" style="width:10%"></th>
						<th class="borderless" style="width:10%"></th>
						<th class="borderless" style="width:10%"></th>
						
						
						<th class="borderless" style="width:10%"></th>

						<th class="borderless" style="width: 20%; text-align: right;">Malang, <?php echo $tanggalrapot ?></th>

						<th class="borderless" style="width:10%"></th>
					</tr>
					<tr>
					
					<tr>
						<th class="borderless">Orang Tua/Wali Murid</th>
						<th class="borderless"></th>
						<th class="borderless"></th>
						<th class="borderless"></th>
						
						<th class="borderless"></th>
						<th class="borderless">Wali Kelas</th>
						<th class="borderless"></th>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>

					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless">______________________</td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						
						<td class="borderless"><?php echo $list_hasil_array[0]['nama'] ?></td>
						<td class="borderless"></td>
					</tr>
				</tbody>
			</table>

			<table class="borderless" style="width:100%; text-align:center">
				<thead>
					<tr>
						<th class="borderless" style="width:20%"></th>
						<th class="borderless" style="width:10%"></th>
						<th class="borderless" style="width:0%"></th>
						<th class="borderless" style="width: 30%; text-align: left; padding-left: 20px;">Mengetahui</th>
						<th class="borderless" style="width:10%"></th>
						<th class="borderless" style="width:10%"></th>
						<th class="borderless" style="width:10%"></th>
					</tr>
					<tr class="borderless">
						<th class="borderless"></th>
						<th class="borderless"></th>
						<th class="borderless"></th>
						<th class="borderless">Kepala Sekolah PP Bunga Pelangi</th>
						<th class="borderless"></th>
						<th class="borderless"></th>
						<th class="borderless"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<th class="borderless"></th>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>

					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
					<tr>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless">Siti Maghfiroh, S.Kom</td>
						<td class="borderless"></td>
						<td class="borderless"></td>
						<td class="borderless"></td>
					</tr>
				</tbody>
			</table>
			<br>
			<br>
		<table style="width: 100%;">
			<thead>
				<tr>
					<th class="borderless">Refleksi Guru</th>
				</tr>
				<tr>
					<th class="">
					<textarea style="width:100%" rows="10"><?php echo $list_hasil_array[0]['refleksi'] ?>
					</textarea></th>	
				</tr>
				
			</thead>
			<tbody>
				<tr>
					<th class="borderless">Refleksi Orang Tua</th>
				</tr>
				<tr>
					<td class="">
						<textarea style="width:100%" rows="10">
						
					</textarea></th>	
					</td>	
				</tr>
				
			</tbody>
		</table>

			
		</main>

		
	</div>
</div>
</div>




<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
