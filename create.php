<?php
include('connect.php');
include('select_setting.php');
include('select_nama_guru.php');
include('select_kelompok.php');
include('select_agama.php');
include('select_jati.php');
include('select_literasi.php');
include('select_topik.php');
include('select_subtopik.php');
include('select_peta.php')
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

div.editable {
    width: 300px;
    height: 200px;
    border: 1px solid #ccc;
    padding: 5px;
}


	</style>


</head>
<body>
	


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
						<td class="condensed">
							<select name="nama_guru_1" id="nama_guru_1" class="form-control" onchange="selectGuru();">
							  <option value="0">-- Pilih Nama --</option>		
								<?php
								for ($i=0; $i < count($nama_guru_array); $i++) { 
									?>
									<option value="<?php echo $nama_guru_array[$i]["id"] ?>;<?php echo $nama_guru_array[$i]["kelompok"] ?>;<?php echo $nama_guru_array[$i]["jumlah"] ?>;<?php echo $nama_guru_array[$i]["nama"] ?>;<?php echo $nama_guru_array[$i]["deskripsi"] ?>"><?php echo $nama_guru_array[$i]["nama"] ?></option>		
									<?php
								}
								
								?>  
							</select>
							
						</td>

					</tr>
					<tr>
						<th class="condensed">Kelompok Usia</th>
						<td class="condensed">:</td>
						<td class="condensed">

							<select name="select_kelompok" id="select_kelompok" class="form-control" disabled>
							  <option value="0">-- Pilih Kelompok --</option>		
								<?php
								for ($i=0; $i < count($kelompok_array); $i++) { 
									?>
									<option value="<?php echo $kelompok_array[$i]["id"] ?>"><?php echo $kelompok_array[$i]["deskripsi"] ?> ( <?php echo $kelompok_array[$i]["judul"] ?> )</option>		
									<?php
								}
								
								?>  
							</select>

						</td>
					</tr>
					<tr>
						<th class="condensed">Jumlah Anak</th>
						<td class="condensed">:</td>
						<td class="condensed" id="jumlah_anak"></td>
					</tr>
				</tbody>
			</table>
		</div>


		<h6>B. Peta Konsep</h6>
		<div class="col-lg-10 offset-lg-1">
			
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  			Pilih Peta Konsep
</button>
		</div>

		<h6>C. Tujuan Pembelajaran</h6>
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered table-sm border-dark">
				<h6>Nilai Agama Moral dan Budi Pekerti:</h6>
				<tbody>
					
					<tr>
						<td class="condensed">
						
									<select name="tujuan_agama_1" id="tujuan_agama_1" style="width:100%" class="form-control">
							  		<option value="0">-- Pilih Tujuan Agama --</option>		
										<?php
										for ($i=0; $i < count($agama_array); $i++) { 
											?>
											<option style="display:none;" class="<?php echo $agama_array[$i]["kelompok"] ?>" value="<?php echo $agama_array[$i]["isi"] ?>"><p><?php echo $agama_array[$i]["isi"] ?></p></option>		
											<?php
										}
								
								?>  
							</select>
						</td>
					</tr>
					
					<tr>
						<td class="condensed">
						
									<select name="tujuan_agama_2" id="tujuan_agama_2" style="width:100%" class="form-control">
							  		<option value="0">-- Pilih Tujuan Agama --</option>		
										<?php
										for ($i=0; $i < count($agama_array); $i++) { 
											?>
											<option style="display:none;" class="<?php echo $agama_array[$i]["kelompok"] ?>" value="<?php echo $agama_array[$i]["isi"] ?>"><p><?php echo $agama_array[$i]["isi"] ?></p></option>		
											<?php
										}
									
									?>  
								</select>
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
							
							<select name="tujuan_jati_1" id="tujuan_jati_1" style="width:100%" class="form-control">
							  		<option value="0">-- Pilih Tujuan Jati Diri --</option>		
										<?php
										for ($i=0; $i < count($jati_array); $i++) { 
											?>
											<option style="display:none;" class="<?php echo $jati_array[$i]["kelompok"] ?>" value="<?php echo $jati_array[$i]["isi"] ?>"><p><?php echo $jati_array[$i]["isi"] ?></p></option>		
											<?php
										}
									
									?>  
							</select>

						</td>

					</tr>
					<tr>
						<td class="condensed">
							
							<select name="tujuan_jati_2" id="tujuan_jati_2" style="width:100%" class="form-control">
							  		<option value="0">-- Pilih Tujuan Jati Diri --</option>		
										<?php
										for ($i=0; $i < count($jati_array); $i++) { 
											?>
											<option style="display:none;" class="<?php echo $jati_array[$i]["kelompok"] ?>" value="<?php echo $jati_array[$i]["isi"] ?>"><p><?php echo $jati_array[$i]["isi"] ?></p></option>		
											<?php
										}
									
									?>  
							</select>

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
							
							<select name="tujuan_literasi_1" id="tujuan_literasi_1" style="width:100%" class="form-control">
							  		<option value="0">-- Pilih Tujuan Literasi/STEAM --</option>		
										<?php
										for ($i=0; $i < count($literasi_array); $i++) { 
											?>
											<option style="display:none;" class="<?php echo $literasi_array[$i]["kelompok"] ?>" value="<?php echo $literasi_array[$i]["isi"] ?>"><p><?php echo $literasi_array[$i]["isi"] ?></p></option>		
											<?php
										}
									
									?>  
							</select>

						</td>
						
					</tr>
					<tr>
						<td class="condensed">
							
							<select name="tujuan_literasi_2" id="tujuan_literasi_2" style="width:100%" class="form-control">
							  		<option value="0">-- Pilih Tujuan Literasi/STEAM --</option>		
										<?php
										for ($i=0; $i < count($literasi_array); $i++) { 
											?>
											<option style="display:none;" class="<?php echo $literasi_array[$i]["kelompok"] ?>" value="<?php echo $literasi_array[$i]["isi"] ?>"><p><?php echo $literasi_array[$i]["isi"] ?></p></option>		
											<?php
										}
									
									?>  
							</select>

						</td>
						
					</tr>
				</tbody>
			</table>
		</div>
		
		
		<h6>D. Alat dan Bahan</h6>
		<div class="col-lg-10 offset-lg-1">
			
			<textarea style="width: 100%;" rows="10" name="alat"></textarea>
		</div>

		<p style="page-break-after: always;">&nbsp;</p>


<!-- /////////////////////////////// -->

		
		<div class="col-lg-10 offset-lg-1">

			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" colspan="2">A.Identitas Program</th>
						
					</tr>
					<tr>
						<th class="condensed" style="width:30%">Semester / Minggu ke- :</th>
						<td class="condensed">
							<select class="form-control" name="semester">
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						</td>
					</tr>
					<tr>
						<th class="condensed">Minggu Ke-</th>
						<td class="condensed"><input type="text" class="form-control" name="minggu"></td>
					</tr>
					
					
					<tr>
						<th class="condensed">Topik Kegiatan</th>
						<td class="condensed">
							<select name="topik" id="topik" class="form-control" onchange="selectTopik()">
								<option value="0">-- Pilih Topik --</option>		
								  		<?php
								  		for ($i=0; $i < count($topik_array); $i++) { 
											?>
											<option value="<?php echo $topik_array[$i]["id"] ?>"><p><?php echo $topik_array[$i]["isi"] ?></p></option>		
											<?php
										}?>
								</select>
						</td>
					</tr>
					<tr>
						<th class="condensed">SUB-Topik</th>
						<td class="condensed">
							<select name="subtopik" id="subtopik" class="form-control" onchange="selectSubtopik()" >
								<option value="0">-- Pilih Subtopik --</option>		
								  		<?php
								  		for ($i=0; $i < count($subtopik_array); $i++) { 
											?>
											<option style="display:none" class="subtopik topik<?php echo $subtopik_array[$i]["topik"] ?>" value="<?php echo $subtopik_array[$i]["id"] ?>"><p><?php echo $subtopik_array[$i]["subtopik"] ?></p></option>		
											<?php
										}?>
								</select>
						</td>

						
					</tr>
				</tbody>
			</table>
		</div>

<!-- /////////////////////////////// -->

		
		<div class="col-lg-10 offset-lg-1">
			<table class="table table-bordered border-dark">

				<tbody>
					<tr>
						<th class="condensed" style="width:30%">B.Pembiasaan Pagi</th>
						<td class="condensed">
						<textarea style="width: 100%; text-align: left;" rows="6" name="b">
<?php 
echo $setting_array[0]["pembiasaan"];
?>
						</textarea>
					</td>
					</tr>
					<tr>
						<th class="condensed">C. Kegiatan Pembuka</th>
						<td class="condensed">
							<textarea style="width: 100%; text-align: left;" rows="2" name="c">
<?php 
echo $setting_array[0]["pembuka"];
?>
							</textarea>
						</td>
					</tr>



					<tr>
						<th class="condensed">D. Kegiatan Inti Senin</th>
						<td class="condensed">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
									
										<select name="tanggal" id="tanggal" style="width: 10%;" class="form-control">
										  		<?php for ($i=1; $i <= 31; $i++) { 
										  			?>
										  			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										  			<?php
										  		} ?>
										</select>
								
										<select name="bulan" id="bulan" style="width: 10%;" class="form-control">
										  		<option value="0">Bulan</option>
										  		<option value="Januari">Januari</option>
										  		<option value="Februari">Februari</option>
										  		<option value="Maret">Maret</option>
										  		<option value="April">April</option>
										  		<option value="Mei">Mei</option>
										  		<option value="Juni">Juni</option>
										  		<option value="Juli">Juli</option>
										  		<option value="Agustus">Agustus</option>
										  		<option value="September">September</option>
										  		<option value="Oktober">Oktober</option>
										  		<option value="November">November</option>
										  		<option value="Desember">Desember</option>
										</select>
									
										<select name="tahun" id="tahun" style="width: 10%;" class="form-control">
										  		<option value="2024">2024</option>
										  		<option value="2025">2025</option>
										  		<option value="2026">2026</option>
										</select>
									</div>
								</div>
							</div>
							<textarea style="width: 100%; text-align: left;" rows="10" name="d">
<?php 
echo $setting_array[0]["inti"];
?>
							</textarea>
						</td>
					</tr>

					<tr>
						<th class="condensed">D. Kegiatan Inti Selasa</th>
						<td class="condensed">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
									
										<select name="tanggal2" id="tanggal2" style="width: 10%;" class="form-control">
										  		<?php for ($i=1; $i <= 31; $i++) { 
										  			?>
										  			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										  			<?php
										  		} ?>
										</select>
								
										<select name="bulan2" id="bulan2" style="width: 10%;" class="form-control">
										  		<option value="0">Bulan</option>
										  		<option value="Januari">Januari</option>
										  		<option value="Februari">Februari</option>
										  		<option value="Maret">Maret</option>
										  		<option value="April">April</option>
										  		<option value="Mei">Mei</option>
										  		<option value="Juni">Juni</option>
										  		<option value="Juli">Juli</option>
										  		<option value="Agustus">Agustus</option>
										  		<option value="September">September</option>
										  		<option value="Oktober">Oktober</option>
										  		<option value="November">November</option>
										  		<option value="Desember">Desember</option>
										</select>
									
										<select name="tahun2" id="tahun2" style="width: 10%;" class="form-control">
										  		<option value="2024">2024</option>
										  		<option value="2025">2025</option>
										  		<option value="2026">2026</option>
										</select>
									</div>
								</div>
							</div>
							<textarea style="width: 100%; text-align: left;" rows="10" name="d2">
<?php 
echo $setting_array[0]["inti"];
?>
							</textarea>
						</td>
					</tr>

					<tr>
						<th class="condensed">D. Kegiatan Inti Rabu</th>
						<td class="condensed">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
									
										<select name="tanggal3" id="tanggal3" style="width: 10%;" class="form-control">
										  		<?php for ($i=1; $i <= 31; $i++) { 
										  			?>
										  			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										  			<?php
										  		} ?>
										</select>
								
										<select name="bulan3" id="bulan3" style="width: 10%;" class="form-control">
										  		<option value="0">Bulan</option>
										  		<option value="Januari">Januari</option>
										  		<option value="Februari">Februari</option>
										  		<option value="Maret">Maret</option>
										  		<option value="April">April</option>
										  		<option value="Mei">Mei</option>
										  		<option value="Juni">Juni</option>
										  		<option value="Juli">Juli</option>
										  		<option value="Agustus">Agustus</option>
										  		<option value="September">September</option>
										  		<option value="Oktober">Oktober</option>
										  		<option value="November">November</option>
										  		<option value="Desember">Desember</option>
										</select>
									
										<select name="tahun3" id="tahun3" style="width: 10%;" class="form-control">
										  		<option value="2024">2024</option>
										  		<option value="2025">2025</option>
										  		<option value="2026">2026</option>
										</select>
									</div>
								</div>
							</div>
							<textarea style="width: 100%; text-align: left;" rows="10" name="d3">
<?php 
echo $setting_array[0]["inti"];
?>
							</textarea>
						</td>
					</tr>

					<tr>
						<th class="condensed">D. Kegiatan Inti Kamis</th>
						<td class="condensed">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
									
										<select name="tanggal4" id="tanggal4" style="width: 10%;" class="form-control">
										  		<?php for ($i=1; $i <= 31; $i++) { 
										  			?>
										  			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										  			<?php
										  		} ?>
										</select>
								
										<select name="bulan4" id="bulan4" style="width: 10%;" class="form-control">
										  		<option value="0">Bulan</option>
										  		<option value="Januari">Januari</option>
										  		<option value="Februari">Februari</option>
										  		<option value="Maret">Maret</option>
										  		<option value="April">April</option>
										  		<option value="Mei">Mei</option>
										  		<option value="Juni">Juni</option>
										  		<option value="Juli">Juli</option>
										  		<option value="Agustus">Agustus</option>
										  		<option value="September">September</option>
										  		<option value="Oktober">Oktober</option>
										  		<option value="November">November</option>
										  		<option value="Desember">Desember</option>
										</select>
									
										<select name="tahun4" id="tahun4" style="width: 10%;" class="form-control">
										  		<option value="2024">2024</option>
										  		<option value="2025">2025</option>
										  		<option value="2026">2026</option>
										</select>
									</div>
								</div>
							</div>
							<textarea style="width: 100%; text-align: left;" rows="10" name="d4">
<?php 
echo $setting_array[0]["inti"];
?>
							</textarea>
						</td>
					</tr>

						<tr>
						<th class="condensed">D. Kegiatan Inti Jumat</th>
						<td class="condensed">
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
									
										<select name="tanggal5" id="tanggal5" style="width: 10%;" class="form-control">
										  		<?php for ($i=1; $i <= 31; $i++) { 
										  			?>
										  			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										  			<?php
										  		} ?>
										</select>
								
										<select name="bulan5" id="bulan5" style="width: 10%;" class="form-control">
										  		<option value="0">Bulan</option>
										  		<option value="Januari">Januari</option>
										  		<option value="Februari">Februari</option>
										  		<option value="Maret">Maret</option>
										  		<option value="April">April</option>
										  		<option value="Mei">Mei</option>
										  		<option value="Juni">Juni</option>
										  		<option value="Juli">Juli</option>
										  		<option value="Agustus">Agustus</option>
										  		<option value="September">September</option>
										  		<option value="Oktober">Oktober</option>
										  		<option value="November">November</option>
										  		<option value="Desember">Desember</option>
										</select>
									
										<select name="tahun5" id="tahun5" style="width: 10%;" class="form-control">
										  		<option value="2024">2024</option>
										  		<option value="2025">2025</option>
										  		<option value="2026">2026</option>
										</select>
									</div>
								</div>
							</div>
							<textarea style="width: 100%; text-align: left;" rows="10" name="d5">
<?php 
echo $setting_array[0]["inti"];
?>
							</textarea>
						</td>
					</tr>



					<tr>
						<th class="condensed">E. Istirahat</th>
						<td class="condensed">
							<textarea style="width: 100%; text-align: left;" rows="5" name="e">
<?php 
echo $setting_array[0]["istirahat"];
?>
							</textarea>
						</td>
					</tr>
					<tr>
						<th class="condensed">F. Kegiatan Penutup</th>
						<td class="condensed">
							<textarea style="width: 100%; text-align: left;" rows="5" name="f">
<?php 
echo $setting_array[0]["penutup"];
?>
							</textarea>
						</td>
					</tr>
					<tr>
						<th class="condensed">G. Asessmen / Penilaian</th>
						<td class="condensed">
							<textarea style="width: 100%; text-align: left;" rows="3" name="g">
<?php 
echo $setting_array[0]["asesment"];
?>
							</textarea>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		 <input type="hidden" name="peta_konsep" id="peta_konsep_input" value="wadefak">

		 <input type="hidden" name="topiktext" id="topiktext" value="wadefak">
		 <input type="hidden" name="subtopiktext" id="subtopiktext" value="wadefak">
		 <br>



		<input class="btn btn-success" type="submit" disabled id="submit_button">

	</form>

	</main>
	<footer class="pt-5 my-5 text-body-secondary border-top">
		Created by the Distudiomalang team &middot; &copy; 2024
	</footer>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        	<table class="table table-bordered table-sm border-dark">
				
				<tbody>
					
					<?php
					for ($i=0; $i < count($peta_konsep_array); $i++) { 
						?>

						<tr>
							<td >
								<img src="img/<?php echo $peta_konsep_array[$i]["image_address"] ?>" style="max-height: 250px;">	
							</td>
							<td>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="peta_konsep_radio" value="<?php echo $peta_konsep_array[$i]["image_address"] ?>" id="flexRadioDefault<?php echo $i; ?>" onchange="selectPeta()">
								  <label class="form-check-label" for="flexRadioDefault<?php echo $i; ?>">
							    pilihan 1
							  </label>


							</div>
							</td>
						</tr>

						<?php
					}
					?>
					
				
				</tbody>
			</table>

      </div>
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script type="text/javascript">
	
	function selectPeta(){
		console.log(document.querySelector('input[name="peta_konsep_radio"]:checked').value);
		document.getElementById('peta_konsep_input').value=document.querySelector('input[name="peta_konsep_radio"]:checked').value;
	}

	function selectTopik(){

		var e = document.getElementById("topik");
		document.getElementById('subtopik').value = 0;
		var value = e.value;
		
		var topikValue = 'topik'+value;
		console.log(topikValue);
		var topiktext = e.options[e.selectedIndex].text;
		document.getElementById("topiktext").value = topiktext;


		var subtopiklist = document.getElementsByClassName("subtopik");

		for (var i = 0; i < subtopiklist.length; i++) {

				document.getElementsByClassName("subtopik")[i].style.display="none";	

			}

			var subtopikpilihan = document.getElementsByClassName(topikValue);

		for (var i = 0; i < subtopikpilihan.length; i++) {

				document.getElementsByClassName(topikValue)[i].style.display="block";	

			}

	}

	function selectSubtopik(){

		var e = document.getElementById("subtopik");
		var value = e.value;
		var subtopiktext = e.options[e.selectedIndex].text;
		document.getElementById("subtopiktext").value = subtopiktext;
	}

	function selectGuru(){
		console.log("halo");
		document.getElementById('tujuan_agama_1').value = 0;
		document.getElementById('tujuan_agama_2').value = 0;
		document.getElementById('tujuan_literasi_1').value = 0;
		document.getElementById('tujuan_literasi_2').value = 0;
		document.getElementById('tujuan_jati_1').value = 0;
		document.getElementById('tujuan_jati_2').value = 0;

		document.getElementById('submit_button').disabled = false;
		var e = document.getElementById("nama_guru_1");

	
			const guruArray = e.value.split(";");
			document.getElementById('select_kelompok').value=guruArray[1];
			document.getElementById('jumlah_anak').innerHTML = guruArray[2];
			// document.getElementById('nama_guru_2').innerHTML = e.options[e.selectedIndex].text;
			
			// console.log(document.getElementsByClassName(guruArray[1])[0]);

			var pilihan1 = document.getElementsByClassName("1");
			var pilihan2 = document.getElementsByClassName("2");
			var pilihan3 = document.getElementsByClassName("3");


			for (var i = 0; i < pilihan1.length; i++) {

				document.getElementsByClassName("1")[i].style.display="none";	

			}
			for (var i = 0; i < pilihan2.length; i++) {

				document.getElementsByClassName("2")[i].style.display="none";	

			}
			for (var i = 0; i < pilihan3.length; i++) {

				document.getElementsByClassName("3")[i].style.display="none";	

			}

			var arraypilihan = document.getElementsByClassName(guruArray[1]);

			console.log(arraypilihan.length);

			for (var i = 0; i < arraypilihan.length; i++) {

				document.getElementsByClassName(guruArray[1])[i].style.display="block";	

			}
			
			
		
	}

</script>

</body>
</html>
