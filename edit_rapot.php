<?php
include('connect.php');

$sql = "SELECT * FROM murid ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $list_hasil_array[] = $row;
}
} else {
  echo "0 results";
}

$sql2 = "SELECT detail_rapot.id as rapot_id, detail_rapot.*, murid.*, kelompok.* FROM detail_rapot
join murid on murid.murid_id = detail_rapot.murid_id
join kelompok on kelompok.id = murid.murid_kelompok
where detail_rapot.murid_id = ".$_GET['id'];

// echo $sql;

$result2 = $conn->query($sql2);

$hasil_rapot = $result2->fetch_assoc();

// echo json_encode($hasil_rapot);



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
			<form method="POST" action="submit_detail_rapot.php" enctype="multipart/form-data">
			<br>
			<h4>Edit Detail Rapot <a href="index_rapot.php" class="btn btn-warning" style="float:right">Back</a></h4> 	
			<br>
			<h5>Nama Murid : <?php echo $hasil_rapot['murid_nama']; ?></h5>
			
			
			ID Murid : <input type="text" name="murid_id" value="<?php echo $hasil_rapot['murid_id'] ?>" readonly>	
			<h3>1. Profil Pelajar Pancasila</h3>
			<table class="table table-bordered border-dark">
				<thead>
					<tr>
						<th style="width:25%">Project Profil Pelajar Pancasila</th>
						<td colspan="3"><textarea name="pp" rows="5" style="width:100%" class="form-control" placeholder="Project Profil Peljar"><?php echo $hasil_rapot['pp'] ?></textarea></td>

					</tr>
					
				</thead>
			</table>
			<br>

			<h3>2. Muatan Lokal</h3>
			<table class="table table-bordered border-dark">
				<thead>
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
						<th style="width:5%">1</th>
						<th style="width:25%">Komposisi Warna</th>
						<td><input type="radio" id="bm1" name="mulok1" value="0" checked="checked"><label for="bm1" style="margin-left: 10px;"> Belum Muncul</label></td>
						<td><input type="radio" id="mm1" name="mulok1" value="1"><label for="mm1" style="margin-left: 10px;"> Mulai Muncul</label></td>
						<td><input type="radio" id="sm1" name="mulok1" value="2"><label for="sm1" style="margin-left: 10px;"> Sudah Muncul</label></td>
					</tr>
						<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Kerapian</th>
						<td><input type="radio" id="bm2" name="mulok2" value="0" checked="checked"><label for="bm2" style="margin-left: 10px;"> Belum Muncul</label></td>
						<td><input type="radio" id="mm2" name="mulok2" value="1"><label for="mm2" style="margin-left: 10px;"> Mulai Muncul</label></td>
						<td><input type="radio" id="sm2" name="mulok2" value="2"><label for="sm2" style="margin-left: 10px;"> Sudah Muncul</label></td>
					</tr>
						<tr>
						<th style="width:5%">3</th>
						<th style="width:25%">Kesesuaian Tema</th>
						<td><input type="radio" id="bm3" name="mulok3" value="0" checked="checked"><label for="bm3" style="margin-left: 10px;"> Belum Muncul</label></td>
						<td><input type="radio" id="mm3" name="mulok3" value="1"><label for="mm3" style="margin-left: 10px;"> Mulai Muncul</label></td>
						<td><input type="radio" id="sm3" name="mulok3" value="2"><label for="sm3" style="margin-left: 10px;"> Sudah Muncul</label></td>
					</tr>
				</thead>
			</table>


<br>
	<h3>3. Tumbuh Kembang Anak</h3>
			<table class="table table-bordered border-dark">
				<thead>
					
					<tr>
						<th>No</th>
						<th>Aspek Perkembangan</th>
						<th>Keterangan</th>

					</tr>
					<tr>
						<th style="width:5%">1</th>
						<th style="width:25%">Penglihatan (Mata)</th>
						<th><input type="text" class="form-control" name="mata" placeholder="Contoh: Rada Burem" value="<?php echo $hasil_rapot['mata'] ?>"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Pendengaran (Telinga)</th>
						<th><input type="text" class="form-control" name="telinga" placeholder="Contoh: Rada-rada Budi" value="<?php echo $hasil_rapot['telinga'] ?>"></th>
					</tr>
					<tr>
						<th style="width:5%">3</th>
						<th style="width:25%">Kesehatan Gigi & Mulut</th>
						<th><input type="text" class="form-control" name="mulut" placeholder="Contoh: Tidak Pernah sikat gigi" value="<?php echo $hasil_rapot['mulut'] ?>"></th>
					</tr>
					<tr>
						<th style="width:5%">4</th>
						<th style="width:25%">Kerapian dalam berpakaian</th>
						<th><input type="text" class="form-control" name="pakaian" placeholder="Contoh: Sering tidak rapi" value="<?php echo $hasil_rapot['pakaian'] ?>"></th>
					</tr>
					<tr>
						<th style="width:5%">5</th>
						<th style="width:25%">Berat Badan</th>
						<th><input type="number" class="form-control" name="berat" placeholder="angka saja. Contoh:26" value="<?php echo $hasil_rapot['berat'] ?>"></th>
					</tr>
					<tr>
						<th style="width:5%">6</th>
						<th style="width:25%">Tinggi Badan</th>
						<th><input type="number" class="form-control" name="tinggi" placeholder="angka saja. Contoh: 120" value="<?php echo $hasil_rapot['tinggi'] ?>"></th>
					</tr>

				</thead>
			</table>


<br>
	<h3>4. Presensi Kehadiran</h3>
			<table class="table table-bordered border-dark">
				<thead>
					
					<tr>
						<th>No</th>
						<th>Keterangan</th>
						<th>Semester 1</th>

					</tr>
					<tr>
						<th style="width:5%">1</th>
						<th style="width:25%">Sakit</th>
						<th><input type="number" class="form-control" name="sakit" placeholder="5" value="<?php echo $hasil_rapot['sakit'] ?>"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Ijin</th>
						<th><input type="number" class="form-control" name="ijin" placeholder="3" value="<?php echo $hasil_rapot['ijin'] ?>"></th>
					</tr>
					<tr>
						<th style="width:5%">2</th>
						<th style="width:25%">Alpha</th>
						<th><input type="number" class="form-control" name="alpha" placeholder="1" value="<?php echo $hasil_rapot['alpha'] ?>"></th>
					</tr>

				</thead>
			</table>



<br>
	<h3>5. Refleksi</h3>
			<table class="table table-bordered border-dark">
				<thead>
					
					<tr>
						<th>Refleksi Guru</th>
					</tr>
					<tr>
						<th><textarea name="refleksi" placeholder="Isikan Refleksi dari guru" rows="5" class="form-control" ><?php echo $hasil_rapot['refleksi'] ?></textarea></th>
					</tr>

				</thead>
			</table>

	<input class="btn btn-success" type="submit" id="submit_button">
</form>
</main>
	<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


	</body>
	</html>
<script type="text/javascript">
	
	window.onload = function() {
  console.log("Page has loaded!");


   mulok1 = <?php echo $hasil_rapot['mulok1'] ?>;
   mulok2 = <?php echo $hasil_rapot['mulok2'] ?>;
   mulok3 = <?php echo $hasil_rapot['mulok3'] ?>;

  if (mulok1 == 0) {
  	const radioButton = document.getElementById('bm1');
  	radioButton.checked = true;	
  }else if(mulok1 == 1){
  	const radioButton = document.getElementById('mm1');
  	radioButton.checked = true;	
  }else if(mulok1 == 2){
  	const radioButton = document.getElementById('sm1');
  	radioButton.checked = true;	
  }

   if (mulok2 == 0) {
  	const radioButton = document.getElementById('bm2');
  	radioButton.checked = true;	
  }else if(mulok2 == 1){
  	const radioButton = document.getElementById('mm2');
  	radioButton.checked = true;	
  }else if(mulok2 == 2){
  	const radioButton = document.getElementById('sm2');
  	radioButton.checked = true;	
  }


  if (mulok3 == 0) {
  	const radioButton = document.getElementById('bm3');
  	radioButton.checked = true;	
  }else if(mulok3 == 1){
  	const radioButton = document.getElementById('mm3');
  	radioButton.checked = true;	
  }else if(mulok3 == 2){
  	const radioButton = document.getElementById('sm3');
  	radioButton.checked = true;	
  }
  
  
  

};



</script>