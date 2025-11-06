<?= $this->include('layouts/header.php') ?>

<?php 
$title = "Add Raport";


?>

<?php
  $currentYear = date('Y');
  $month = date('n'); // 1–12

  $prevYear = $currentYear - 1;
  $nextYear = $currentYear + 1;

  // Determine academic year based on month
  if ($month >= 8) {
      // August–December → currentYear/nextYear
      $firstYear = $currentYear;
      $secondYear = $nextYear;
  } else {
      // January–July → previousYear/currentYear
      $firstYear = $prevYear;
      $secondYear = $currentYear;
  }

  // Options: current academic year & next academic year
  $tahunOptions = [
      "$firstYear/$secondYear",
      "$secondYear/" . ($secondYear + 1)
  ];

  // Default selection (the current active school year)
  $defaultTahun = "$firstYear/$secondYear";

  // If editing existing raport, use stored value
  if (isset($raport) && !empty($raport->raport_tahun)) {
      $defaultTahun = $raport->raport_tahun;
  }
?>

<main class="app-main">
  <div class="container-fluid">
    <h3 class="mb-3"><?= $title ?></h3>

    <form action="<?= isset($raport) ? base_url('Raport/update/'.$raport->raport_id) : base_url('Raport/create'); ?>" method="post" enctype="multipart/form-data">

      <!-- Basic Info -->
      <div class="card mb-3">
        <div class="card-header">📝 Basic Info</div>
        <div class="card-body row g-3">
          <div class="col-md-4">
            <label class="form-label">Semester</label>
            <select class="form-control" name="raport_semester" required>
              <option value="">-- Pilih Semester --</option>
              <option value="1" <?= (isset($raport) && $raport->raport_semester=='1')?'selected':'' ?>>1</option>
              <option value="2" <?= (isset($raport) && $raport->raport_semester=='2')?'selected':'' ?>>2</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Tahun Ajaran</label>
            <select class="form-control" name="raport_tahun" required>
              <?php foreach ($tahunOptions as $tahun): ?>
                <option value="<?= $tahun ?>" <?= (isset($raport) && $raport->raport_tahun==$tahun)?'selected':($tahun==$defaultTahun?'selected':'') ?>><?= $tahun ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label">Nama Murid</label>
            <select class="form-control" id="raport_murid_id" name="raport_murid_id" required>
              <option value="">-- Pilih Murid --</option>
              <?php foreach ($muridList as $murid): ?>
                <option value="<?= esc($murid->murid_id) ?>" <?= (isset($raport) && $raport->raport_murid_id==$murid->murid_id)?'selected':'' ?>>
                  <?= esc($murid->murid_nama) ?> (ID: <?= esc($murid->murid_id) ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <!-- Perkembangan Siswa -->
      <div class="card mb-3">
        <div class="card-header">📖 Perkembangan Siswa</div>
        <div class="card-body">
          <textarea class="form-control" id="perkembangan" name="perkembangan" rows="3" placeholder="Tulis keterangan untuk perkembangan siswa"><?= isset($raport) ? esc($raport->perkembangan) : '' ?></textarea>
          <div id="loadingSpinner" style="display:none;">🔄 Sedang memproses...</div>
        </div>
      </div>

      <!-- Nilai Sections -->
      <?php 
      $sections = [
        'Agama dan Budi Pekerti'=>'ketagama',
        'Jati Diri'=>'ketjati',
        'Literasi'=>'ketliterasi'
      ];
      $imgRanges = [
        'Agama dan Budi Pekerti'=>[1,3],
        'Jati Diri'=>[4,6],
        'Literasi'=>[7,9]
      ];
      ?>

      <?php foreach($sections as $sectionName => $fieldName): ?>
      <div class="card mb-3">
        <div class="card-header">📸 <?= $sectionName ?></div>
        <div class="card-body">
          <div class="row g-3 mb-3">
            <?php for($i=$imgRanges[$sectionName][0]; $i<=$imgRanges[$sectionName][1]; $i++): ?>
            <div class="col-md-4">
              <label class="form-label">Image <?= $i ?></label>
              <input type="file" class="form-control" name="img<?= $i ?>">
              <?php if(isset($raport) && !empty($raport->{'img'.$i})): ?>
                <small>Current: <a href="<?= base_url('uploads/raport/'.$raport->{'img'.$i}) ?>" target="_blank"><?= $raport->{'img'.$i} ?></a></small>
              <?php endif; ?>
            </div>
            <?php endfor; ?>
          </div>

          <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea class="form-control" name="<?= $fieldName ?>" rows="3" placeholder="Tulis keterangan untuk <?= $sectionName ?>"><?= isset($raport) ? esc($raport->$fieldName) : '' ?></textarea>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

      <!-- Measurements & Attendance -->
      <div class="card mb-3">
        <div class="card-header">📏 Measurements & Attendance</div>
        <div class="card-body row g-3">
          <?php 
          $measures = ['tinggi'=>'Tinggi (cm)','berat'=>'Berat (kg)','kepala'=>'Lingkar Kepala (cm)',
                      'sakit'=>'Sakit (hari)','ijin'=>'Ijin (hari)','alpha'=>'Alpha (hari)'];
          foreach($measures as $name=>$label): ?>
            <div class="col-md-2">
              <label class="form-label"><?= $label ?></label>
              <input type="number" class="form-control" name="<?= $name ?>" value="<?= isset($raport)?esc($raport->$name):'' ?>">
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Ekstrakurikuler -->
      <div class="card mb-3">
        <div class="card-header">🎯 Ekstrakurikuler</div>
        <div class="card-body row g-3">
          <div class="col-md-4">
            <label class="form-label">Hari</label>
            <input type="text" class="form-control" name="ekskulhari" value="<?= isset($raport)?esc($raport->ekskulhari):'Senin' ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label">Jenis</label>
            <input type="text" class="form-control" name="ekskuljenis" value="<?= isset($raport)?esc($raport->ekskuljenis):'Menari' ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label">Nilai</label>
            <input type="text" class="form-control" name="ekskulnilai" value="<?= isset($raport)?esc($raport->ekskulnilai):'' ?>">
          </div>
        </div>
        <div class="card-body row g-3">
          <div class="col-md-4">
            <label class="form-label">Hari</label>
            <input type="text" class="form-control" name="ekskulhari2" value="<?= isset($raport)?esc($raport->ekskulhari2):'Kamis' ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label">Jenis</label>
            <input type="text" class="form-control" name="ekskuljenis2" value="<?= isset($raport)?esc($raport->ekskuljenis2):'Tahfidz' ?>">
          </div>
          <div class="col-md-4">
            <label class="form-label">Nilai</label>
            <input type="text" class="form-control" name="ekskulnilai2" value="<?= isset($raport)?esc($raport->ekskulnilai2):'' ?>">
          </div>
        </div>
      </div>

      <div class="text-end mb-5">
        <a href="<?= base_url('Raport'); ?>" class="btn btn-secondary me-2">Cancel</a>
        <button type="submit" class="btn btn-primary"><?= isset($raport)?'Update Raport':'Save Raport' ?></button>
      </div>

    </form>
  </div>
</main>




<?= $this->include('layouts/footer.php') ?>
<script>
$(document).ready(function() {
  $('#raport_murid_id').on('change', function() {
    let muridId = $(this).val();

    if (!muridId) {
      $('#perkembangan').val('');
      return;
    }

    // Show loading text
    $('#perkembangan')
      .val('⏳ Sedang memproses data dari Gemini...')
      .prop('disabled', true);

    // Step 1: Get data from your CodeIgniter controller
    $.ajax({
      url: "<?= base_url('raport/getPerkembangan') ?>",
      type: "GET",
      data: { id: muridId },
      dataType: "json",
      success: function(response) {
        if (response.success) {
          // Step 2: Build prompt text
          const muridData = response.data;
          const textData = JSON.stringify(muridData, null, 2);
          const prompt = `
          Tanpa perlu intro atau kata2 "berikut", langsung tuliskan hasilnya untuk perintah ini:
          Buatkan satu atau dua atau tiga paragraf efektif rekap untuk raport sekolah PAUD berdasarkan data berikut:
          ${textData}
          `;

          // Step 3: Send to Gemini API
          const apiKey = "AIzaSyCsxLYoasut5slzq3TNHxff3UIDMOvXHKU"; // ⚠️ Move to backend in production
          const payload = {
            contents: [
              {
                parts: [
                  { text: prompt }
                ]
              }
            ]
          };

          fetch(`https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json"
            },
            body: JSON.stringify(payload)
          })
          .then(res => res.json())
          .then(data => {
            // Step 4: Show Gemini result in textarea
            const result = data?.candidates?.[0]?.content?.parts?.[0]?.text || "Tidak ada hasil.";
            $('#perkembangan')
              .val(result)
              .prop('disabled', false);
          })
          .catch(err => {
            console.error(err);
            $('#perkembangan')
              .val('❌ Gagal memproses data dari Gemini.')
              .prop('disabled', false);
          });

        } else {
          $('#perkembangan')
            .val('❌ Data murid tidak ditemukan.')
            .prop('disabled', false);
        }
      },
      error: function() {
        alert('Terjadi kesalahan saat mengambil data.');
        $('#perkembangan').prop('disabled', false);
      }
    });
  });
});
</script>
