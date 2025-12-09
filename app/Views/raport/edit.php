<?= $this->include('layouts/header.php') ?>


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
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h3>Edit Raport</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Raport'); ?>">Raport</a></li>
            <li class="breadcrumb-item active">Edit Raport</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <form action="<?= base_url('Raport/update/' . $raport->raport_id) ?>" method="post" enctype="multipart/form-data">

        <!-- Basic Info Card -->
        <div class="card mb-3" <?php if (session()->get('guru_id') >= 7): ?>
          style="display: none;"
        <?php endif ?>>
          <div class="card-header">📝 Basic Info</div>
          <div class="card-body row g-3">
            <div class="col-md-4">
              <label class="form-label">Semester</label>
              <select name="raport_semester" class="form-control" required>
                <option value="">-- Pilih Semester --</option>
                <option value="1" <?= ($raport->raport_semester=='1')?'selected':'' ?>>1</option>
                <option value="2" <?= ($raport->raport_semester=='2')?'selected':'' ?>>2</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Tahun Ajaran</label>
              <select name="raport_tahun" class="form-control" required>
                <?php foreach($tahunOptions as $tahun): ?>
                  <option value="<?= $tahun ?>" <?= ($raport->raport_tahun==$tahun)?'selected':'' ?>><?= $tahun ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Nama Murid</label>
              <select class="form-control" id="raport_murid_id" name="raport_murid_id" required>
                  <option value="">-- Pilih Murid --</option>
                  <?php foreach ($muridList as $murid): ?>
                      <option value="<?= esc($murid->murid_id) ?>" <?= ($raport->raport_murid_id == $murid->murid_id) ? 'selected' : '' ?>>
                          <?= esc($murid->murid_nama) ?> (ID: <?= esc($murid->murid_id) ?>)
                      </option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <!-- Perkembangan Siswa Card -->
        <div class="card mb-3" <?php if (session()->get('guru_id') >= 7): ?>
          style="display: none;"
        <?php endif ?>>
          <div class="card-header">🖊️ Perkembangan Siswa</div>
          <div class="card-body">
            <textarea class="form-control" id="perkembangan" name="perkembangan" rows="3"><?= esc($raport->perkembangan ?? '') ?></textarea>
            <div id="loadingSpinner" style="display:none;">🔄 Sedang memproses...</div>
          </div>
        </div>

        <!-- Nilai Sections Card -->
        <div class="card mb-3" <?php if (session()->get('guru_id') >= 7): ?>
          style="display: none;"
        <?php endif ?>>
          <div class="card-header">📸 Nilai & Keterangan</div>
          <div class="card-body">
            <?php
            $sections = [
              'A. Nilai Agama dan Budi Pekerti' => [1,2,3,'ketagama'],
              'B. Jati Diri' => [4,5,6,'ketjati'],
              'C. Literasi' => [7,8,9,'ketliterasi']
            ];
            foreach($sections as $title => $vals):
              $imgStart = $vals[0];
              $imgEnd = $vals[2];
              $ketField = $vals[3];
            ?>
            <h6 class="mt-3"><?= $title ?></h6>
            <div class="row">
              <?php for($i=$imgStart; $i<=$imgEnd; $i++):
                  $imgField = "img$i";
                  $imgPath = !empty($raport->$imgField) ? base_url('uploads/raport/' . $raport->$imgField) : null;
              ?>
              <div class="col-md-4 mb-3">
                <label class="form-label">Image <?= $i ?></label>
                <?php if($imgPath): ?>
                  <div class="mb-2">
                    <img src="<?= $imgPath ?>" alt="img<?= $i ?>" class="img-thumbnail" style="max-height:150px;">
                  </div>
                <?php endif; ?>
                <input type="file" class="form-control" name="img<?= $i ?>">
              </div>
              <?php endfor; ?>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan</label>
              <textarea class="form-control" name="<?= $ketField ?>" rows="3"><?= esc($raport->$ketField ?? '') ?></textarea>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Measurements & Attendance Card -->
        <div class="card mb-3" style="display: none;">
          <div class="card-header">📏 Measurements & Attendance</div>
          <div class="card-body row g-3">
            <?php
            $measurements = ['tinggi'=>'Tinggi (cm)','berat'=>'Berat (kg)','kepala'=>'Lingkar Kepala (cm)','sakit'=>'Sakit (hari)','ijin'=>'Ijin (hari)','alpha'=>'Alpha (hari)'];
            foreach($measurements as $field => $label): ?>
            <div class="col-md-2">
              <label class="form-label"><?= $label ?></label>
              <input type="number" name="<?= $field ?>" class="form-control" value="<?= esc($raport->$field) ?>">
            </div>
            <?php endforeach; ?>
          </div>
        </div>


         <div class="card">
        <div class="card-header">
          Refleksi
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <label class="form-label">Refleksi Guru</label>
                <input type="text" class="form-control" name="refleksiguru" value="<?= isset($raport)?esc($raport->refleksiguru):'' ?>">
              </div>
          </div>  
        </div>
        
      </div>
      <br>

        <!-- Submit Buttons -->
        <div class="text-end mb-5">
          <button type="submit" class="btn btn-success">💾 Update</button>
          <a href="<?= base_url('Raport') ?>" class="btn btn-secondary">Cancel</a>
        </div>

      </form>
    </div>
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

    // Get data from CodeIgniter controller
    $.ajax({
      url: "<?= base_url('raport/getPerkembangan') ?>",
      type: "GET",
      data: { id: muridId },
      dataType: "json",
      success: function(response) {
        if (response.success) {
          const muridData = response.data;
          const textData = JSON.stringify(muridData, null, 2);
          const prompt = `
          Buatkan satu paragraf rekap untuk raport sekolah PAUD berdasarkan data berikut:
          ${textData}
          `;

          // Gemini API request
          const apiKey = "AIzaSyCsxLYoasut5slzq3TNHxff3UIDMOvXHKU"; // ⚠️ Move to backend in production
          const payload = {
            contents: [
              { parts: [{ text: prompt }] }
            ]
          };

          fetch(`https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKey}`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload)
          })
          .then(res => res.json())
          .then(data => {
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
