<?php 
  echo view('layouts/header.php');
  echo view('layouts/sidebar.php');
?>

 <?php if (session()->get('guru_id') >= 7): ?>
  <main class="app-main">

  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">
            <img src="<?= base_url() ?>assets/img/class.svg" style="max-width: 35px;"> 
            Dashboard <?= $data->kelompok_nama ?>

          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>

      
      </div>
    </div>
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">
     
        <div class="mb-3"><h4>📁 Human Resource</h4></div>
        <div class="row">
          <?= card('Ekstra', 'Nilai Ekstra', 'Raport', 'bi-person-badge', '#82adf3') ?>
         
        </div>
  
    </div>
  </div>
  <!--end::App Content-->
</main>
<?php else: ?>

<!--begin::App Main-->
<main class="app-main">

  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">
            <img src="<?= base_url() ?>assets/img/class.svg" style="max-width: 35px;"> 
            Dashboard <?= $data->kelompok_nama ?>

          </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>

      
      </div>
    </div>
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">

      <!-- Section: Human Resource -->
       
        <?php if (session()->get('guru_id') == 0): ?>
        <div class="mb-3"><h4>📁 Human Resource</h4></div>
        <div class="row">
          <?= card('Karyawan', 'Kelola Karyawan', 'Personel', 'bi-person-badge', '#82adf3') ?>
          <?= card('Divisi/Cabang', 'Kelola Divisi', 'Divisi', 'bi-diagram-3', '#b2dfdb') ?>
          <?= card('Jabatan', 'Kelola Jabatan', 'Jabatan', 'bi-shield-lock', '#fdd835') ?>
          <?= card('Divisi Karyawan', 'Kelola Divisi', 'Gurudivisi', 'bi-diagram-3', '#aed581') ?>
          <?= card('Jabatan Karyawan', 'Kelola Jabatan', 'Gurujabatan', 'bi-person-lines-fill', '#90caf9') ?>
       
          <?= card('Daftar Absensi', '', 'Presensidata', 'bi-geo-alt', '#d6d9dd') ?>    
        </div>
        
      <?php endif ?>

      <!-- Section: School Management -->
      <div class="mt-5 mb-3"><h4>🏫 Kelola Sekolah</h4></div>
      <div class="row">
        <?php if (session()->get('guru_id') == 0): ?>
        <?= card('Kelas', 'Kelola Kelas', 'Kelompok', 'bi-people', '#fdfe9c') ?>
      <?php endif ?>
        <?= card('Murid', 'Kelola Murid', 'Murid', 'bi-mortarboard', '#c5f1dc') ?>
        <?= card('Buku Induk', 'Kelola Buku Induk', 'bukuinduk', 'bi-file-earmark-text', '#ffb8b8') ?>
        
      </div>
      
      <div class="row">
         <div class="col-md-6 mb-4">
          <a href="<?= base_url('Aktifitas') ?>" class="text-decoration-none">
            <div class="info-box">
              <span class="info-box-icon shadow-sm" style="background-color:#a2e4fb !important">
                <i class="bi-calendar-check" style="color: black;"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Modul Pembelajaran</span>
                <span class="info-box-number"><small>Buat Modul</small></span>
              </div>
            </div>
          </a>
        </div>

         <div class="col-md-6 mb-4">
          <a href="<?= base_url('listpenilaian') ?>" class="text-decoration-none">
            <div class="info-box">
              <span class="info-box-icon shadow-sm" style="background-color:#c9f7a5 !important">
                <i class="bi-journal-text" style="color: black;"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Penilaian </span>
                <span class="info-box-number"><small>Isi Penilaian </small></span>
              </div>
            </div>
          </a>
        </div>

      </div>
    <div class="row">
  <div class="col-md-12 mb-4">
    <a href="<?= base_url('Raport') ?>" class="text-decoration-none">
      <div class="info-box">
        <span class="info-box-icon shadow-sm" style="background-color:#ffe5b4 !important;">
          <i class="bi-journal-bookmark" style="color: black;"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Raport</span>
          <span class="info-box-number"><small>Isi dan Cetak Raport</small></span>
        </div>
      </div>
    </a>
  </div>
</div>



        <hr>

      <!-- Section: Class Management -->
        
      <div class="" style="margin-top:40px"><h4>🧑‍🏫 Kelola Kelas</h4></div>
      <div class="row">
        <?= card('Absensi Murid', 'Absensi Murid', 'absensi', 'bi-person-check', '#ffc5e5') ?>
        <?php if (session()->get('guru_id') == 0): ?>
         <?= card('Absensi Guru', 'Absensi Guru', 'absensiguru', 'bi-person-check', '#ffc5e5') ?>
       <?php endif ?>
         <?= card('Laporan Absensi Murid', 'Absensi Murid', 'absensi/front', 'bi-file-earmark-text', '#a9b9f1') ?>
         <?php if (session()->get('guru_id') == 0): ?>
          <?= card('Laporan Absensi Guru', 'Absensi Guru', 'absensiguru/frontguru', 'bi-file-earmark-text', '#90caf9') ?>
        <?php endif ?>
      </div>  
      <div class="mt-2 mb-3"><h4>📖 Kelola Subjek</h4></div>

        <?= card('Capaian Pembelajaran', 'Kelola Capaian', 'Subjek', 'bi-folder', '#adfbcf') ?>
    

      <!-- Section: Subject Management -->
    
      <div class="row">
        <?= card('Peta Konsep', 'Kelola Peta Konsep', 'Petakonsep', 'bi-diagram-3', '#f7c46c') ?>
        <?= card('Topik', 'Kelola Topik', 'Unit', 'bi-file-earmark-text', '#6de9b2') ?>
        <?= card('Sub-Topik', 'Kelola Subtopik', 'Subunit', 'bi-file-earmark-text', '#ffb8b8') ?>
      
        <?= card('Tujuan Pembelajaran', 'Kelola Tujuan', 'Tujuan', 'bi-flag', '#6de9b2') ?>
        <?= card('Tipe Aktifitas Harian', 'Kelola Aktifitas', 'Tipeaktifitas', 'bi-check-circle', '#e9b5fb') ?>
      
      </div>

    </div>
  </div>
  <!--end::App Content-->
</main>

<?php endif ?>
<!--end::App Main-->

<?php 
  echo view('layouts/footer.php');
?>

<?php
function card($title, $subtitle, $url, $icon, $bgColor) {
  return '
    <div class="col-md-3 mb-4">
      <a href="' . base_url($url) . '" class="text-decoration-none">
        <div class="info-box">
          <span class="info-box-icon shadow-sm" style="background-color:' . $bgColor . '!important">
            <i class="bi ' . $icon . '" style="color: #524f4f;"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">' . $title . '</span>
            <span class="info-box-number"><small>' . $subtitle . '</small></span>
          </div>
        </div>
      </a>
    </div>
  ';
}
?>