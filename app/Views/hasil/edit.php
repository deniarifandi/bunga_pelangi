<?php
echo view('layouts/header.php');
echo view('layouts/sidebar.php');

$title = "Modul Ajar";
$table = "hasil";
$hasil = $data['hasil'];
?>

<style>
.custom-select{position:relative}
.selected{border:1px solid #ccc;padding:8px;cursor:pointer;display:flex;gap:8px}
.option-list{display:none;position:absolute;width:100%;border:1px solid #ccc;background:#fff;z-index:10;max-height:200px;overflow:auto}
.option{padding:8px;cursor:pointer;display:flex;gap:8px}
.option:hover{background:#f0f0f0}
</style>

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card">
<div class="card-header">
  <h3>Edit <?= esc($title) ?></h3>
</div>

<div class="card-body">

<form action="<?= base_url('Aktifitas/update/'.$hasil->hasil_id) ?>" method="post">
<?= csrf_field() ?>

<!-- Guru -->
<div class="mb-3">
  <label>Nama Guru</label>
  <input class="form-control bg-light"
         value="<?= esc($data['guru_nama']) ?>" readonly>
</div>

<!-- Kelompok -->
<div class="mb-3">
  <label>Kelompok</label>
  <input class="form-control bg-light"
         value="<?= esc($data['kelompok'][0]->kelompok_nama) ?>" readonly>
</div>

<!-- WAJIB: kirim ke update -->
<input type="hidden" name="kelompok"
       value="<?= esc($data['kelompok'][0]->kelompok_nama) ?>">

<hr>
<h4>A. Peta Konsep</h4>

<div class="custom-select">
  <div class="selected">Pilih Peta Konsep</div>
  <div class="option-list">
    <?php foreach ($data['petakonsep'] as $row): ?>
      <div class="option"
           data-value="<?= $row->petakonsep_id ?>"
           data-url="<?= base_url('uploads/'.$row->url) ?>">
        <img src="<?= base_url('uploads/'.$row->url) ?>" width="60">
        <?= esc($row->judul) ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<input type="hidden" name="petakonsep" id="selectedValue"
       value="<?= old('petakonsep',$hasil->peta_konsep) ?>">

<hr>
<h4>B. Capaian & Tujuan</h4>

<?php
$selects = [
 'nilai_agama_1'=>'agama','nilai_agama_2'=>'agama',
 'jati_diri_1'=>'jati','jati_diri_2'=>'jati',
 'literasi_1'=>'literasi','literasi_2'=>'literasi'
];
foreach ($selects as $field=>$src):
?>
<div class="mb-3">
<label><?= ucwords(str_replace('_',' ',$field)) ?></label>
<select class="form-control" name="<?= $field ?>">
<option value="">-- Pilih --</option>
<?php foreach ($data[$src] as $row): ?>
<option value="<?= $row->tujuan_id ?>"
 <?= old($field,$hasil->$field)==$row->tujuan_id?'selected':'' ?>>
 <?= esc($row->tujuan_nama) ?>
</option>
<?php endforeach; ?>
</select>
</div>
<?php endforeach; ?>

<!-- Alat -->
<div class="mb-3">
<label>Alat dan Bahan</label>
<textarea class="form-control"
          name="alat_bahan"><?= old('alat_bahan',$hasil->alat_bahan) ?></textarea>
</div>

<!-- Semester -->
<div class="mb-3">
<label>Semester</label>
<select class="form-control" name="semester">
<option value="1" <?= old('semester',$hasil->semester)==1?'selected':'' ?>>1</option>
<option value="2" <?= old('semester',$hasil->semester)==2?'selected':'' ?>>2</option>
</select>
</div>

<!-- Topik -->
<div class="mb-3">
<label>Topik</label>
<select class="form-control" name="topik">
<?php foreach ($data['topik'] as $row): ?>
<option value="<?= $row->unit_id ?>"
 <?= old('topik',$hasil->topik)==$row->unit_id?'selected':'' ?>>
 <?= esc($row->unit_nama) ?>
</option>
<?php endforeach; ?>
</select>
</div>

<!-- Subtopik -->
<div class="mb-3">
<label>Subtopik</label>
<select class="form-control" name="subtopik">
<?php foreach ($data['subtopik'] as $row): ?>
<option value="<?= $row->subunit_id ?>"
 <?= old('subtopik',$hasil->subtopik)==$row->subunit_id?'selected':'' ?>>
 <?= esc($row->subunit_nama) ?>
</option>
<?php endforeach; ?>
</select>
</div>

<!-- Pembiasaan -->
<div class="mb-3">
<label>Pembiasaan</label>
<textarea class="form-control"
          name="pembiasaan"><?= old('pembiasaan',$hasil->pembiasaan) ?></textarea>
</div>

<!-- Pembuka -->
<div class="mb-3">
<label>Pembuka</label>
<textarea class="form-control"
          name="pembuka"><?= old('pembuka',$hasil->pembuka) ?></textarea>
</div>

<!-- KEGIATAN HARIAN -->
<?php
$hari=['senin','selasa','rabu','kamis','jumat'];
foreach ($hari as $h):
?>
<div class="mb-3">
<label>Kegiatan <?= ucfirst($h) ?></label>

<?php for($i=0;$i<3;$i++):
$val = old($h.'.'.$i)
    ?? ($kegiatan[$h][$i] ?? ($hasil->{$h.'_'.($i+1)} ?? ''));
?>
<select class="form-control mb-2" name="<?= $h ?>[]">
<option value="">-- Pilih --</option>
<?php foreach ($data['tipeaktifitas'] as $row): ?>
<option value="<?= $row[0] ?>" <?= $val==$row[0]?'selected':'' ?>>
<?= esc($row[1]) ?>
</option>
<?php endforeach; ?>
</select>
<?php endfor; ?>

</div>
<?php endforeach; ?>

<!-- Istirahat -->
<div class="mb-3">
<label>Istirahat</label>
<textarea class="form-control"
          name="istirahat"><?= old('istirahat',$hasil->istirahat) ?></textarea>
</div>

<!-- Penutup -->
<div class="mb-3">
<label>Penutup</label>
<textarea class="form-control"
          name="penutup"><?= old('penutup',$hasil->penutup) ?></textarea>
</div>

<!-- Assessment -->
<div class="mb-3">
<label>Assessment</label>
<textarea class="form-control"
          name="assessment"><?= old('assessment',$hasil->assessment) ?></textarea>
</div>

<a href="<?= site_url($table) ?>" class="btn btn-danger">Cancel</a>
<button class="btn btn-primary float-end">Update</button>

</form>
</div>
</div>

</div>
</div>
</main>

<script>
document.addEventListener('DOMContentLoaded',()=>{
 const sel=document.querySelector('.custom-select');
 const cur=sel.querySelector('.selected');
 const list=sel.querySelector('.option-list');
 const input=document.querySelector('#selectedValue');

 list.querySelectorAll('.option').forEach(o=>{
   if(o.dataset.value===input.value){cur.innerHTML=o.innerHTML;}
   o.onclick=()=>{
     cur.innerHTML=o.innerHTML;
     input.value=o.dataset.value;
     list.style.display='none';
   };
 });

 cur.onclick=()=>list.style.display='block';
 document.onclick=e=>!sel.contains(e.target)&&(list.style.display='none');
});
</script>

<?php echo view('layouts/footer.php'); ?>
