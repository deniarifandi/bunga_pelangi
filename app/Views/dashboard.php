<?php 
  echo view('layouts/header.php');
  echo view('layouts/sidebar.php');
?>

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

        <?php if ($presence < 1): ?>
        <div class="alert alert-danger mt-3" role="alert">
          Anda Belum Absen Hari ini. 
          <a href="<?= base_url() ?>showstatus?id=<?= $nama ?>">Klik disini untuk absen sekarang</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <!--end::App Content Header-->

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">

      <!-- Section: Human Resource -->
          
        <?php if (session()->get('guru_id') <= 1): ?>
        <div class="mb-3"><h4>📁 Human Resource</h4></div>
        <div class="row">
          <?= card('Karyawan', 'Kelola Karyawan', 'Personel', 'bi-person-badge', '#82adf3') ?>
          <?= card('Divisi/Cabang', 'Kelola Divisi', 'Divisi', 'bi-diagram-3', '#b2dfdb') ?>
          <?= card('Jabatan', 'Kelola Jabatan', 'Jabatan', 'bi-shield-lock', '#fdd835') ?>
          <?= card('Divisi Karyawan', 'Kelola Divisi', 'Gurudivisi', 'bi-diagram-3', '#aed581') ?>
          <?= card('Jabatan Karyawan', 'Kelola Jabatan', 'Gurujabatan', 'bi-person-lines-fill', '#90caf9') ?>
          <?= card('Form Absensi', '', 'showform', 'bi-journal-text', '#edab86') ?>
          <?= card('Daftar Absensi', '', 'Presensidata', 'bi-geo-alt', '#d6d9dd') ?>    
        </div>
        
      

      <!-- Section: School Management -->
      <div class="mt-5 mb-3"><h4>🏫 Kelola Sekolah</h4></div>
      <div class="row">
        <?= card('Kelas', 'Kelola Kelas', 'Kelompok', 'bi-people', '#fdfe9c') ?>
        <?= card('Murid', 'Kelola Murid', 'Murid', 'bi-mortarboard', '#c5f1dc') ?>
        <?= card('Subjek', 'Kelola Subjek', 'Subjek', 'bi-folder', '#adfbcf') ?>
        <?= card('Tipe Aktifitas Harian', 'Kelola Aktifitas', 'Tipeaktifitas', 'bi-check-circle', '#e9b5fb') ?>
      </div>
      <?php endif ?>
      <!-- Section: Class Management -->
      <div class="mt-5 mb-3"><h4>🧑‍🏫 Kelola Kelas</h4></div>
      <div class="row">
        <?= card('Absensi', 'Student Absence List', 'absensi', 'bi-person-check', '#ffc5e5') ?>
      </div>

      <!-- Section: Subject Management -->
      <div class="mt-5 mb-3"><h4>📖 Kelola Subjek</h4></div>
      <div class="row">
        <?= card('Topik', 'Kelola Topik', 'Unit', 'bi-file-earmark-text', '#a9b9f1') ?>
        <?= card('Sub-Topik', 'Kelola Subtopik', 'Subunit', 'bi-file-earmark-text', '#ffb8b8') ?>
        <?= card('Tujuan Pembelajaran', 'Kelola Tujuan', 'Tujuan', 'bi-flag', '#6de9b2') ?>
        <?= card('Aktifitas Harian', 'Kelola Aktifitas Harian', 'Aktifitas', 'bi-calendar-check', '#a2e4fb') ?>
      </div>

    </div>
  </div>
  <!--end::App Content-->

</main>
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