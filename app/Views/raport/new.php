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
            <textarea class="form-control" id="<?= $fieldName ?>" name="<?= $fieldName ?>" rows="3" placeholder="Tulis keterangan untuk <?= $sectionName ?>"><?= isset($raport) ? esc($raport->$fieldName) : '' ?></textarea>
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

const PROMPT_PERKEMBANGAN = `Tuliskan ringkasan perkembangan anak PAUD berdasarkan data berikut. 
Gunakan gaya bahasa yang positif, hangat, dan profesional. 
Jangan gunakan kalimat "berikut ini", "secara keseluruhan", atau kalimat pembuka formal lainnya. 
Langsung mulai dengan deskripsi perkembangan anak.

Fokuskan pada:
- kemampuan sosial emosional,
- kemandirian,
- interaksi dengan teman,
- kemampuan mengikuti instruksi,
- minat belajar,
- perkembangan umum selama periode penilaian.

Gunakan 2–3 paragraf yang singkat namun jelas.
Hindari penilaian negatif yang terlalu keras; gunakan bahasa membangun.
Data anak:
{{DATA}}
`

const PROMPT_AGAMA = `Tuliskan deskripsi perkembangan nilai agama dan spiritual anak berdasarkan data berikut. 
Gunakan paragraf ringkas dan positif.

Fokuskan pada:
- kebiasaan berdoa,
- sikap syukur,
- kemampuan mengikuti kegiatan keagamaan,
- sikap sopan santun,
- perilaku menghargai teman dan lingkungan.

Gunakan 1 paragraf yang berisi 3–5 kalimat.
Hindari istilah terlalu berat atau bersifat evaluatif ekstrem.
Data anak:
{{DATA}}

`;

const PROMPT_JATI = `Tuliskan deskripsi perkembangan jati diri anak berdasarkan data berikut.

Fokuskan pada:
- rasa percaya diri,
- kemampuan mengungkapkan pendapat,
- cara anak mengenali emosi diri,
- kemandirian dalam aktivitas sederhana,
- ketekunan dalam menyelesaikan tugas.

Gunakan 1 paragraf agak panjang.
Gunakan bahasa positif dan membangun.
Data anak:
{{DATA}}
`;

const PROMPT_LITERASI =  `Tuliskan deskripsi perkembangan literasi anak berdasarkan data berikut.

Fokuskan pada:
- minat terhadap buku,
- kemampuan mengenali huruf/angka,
- kemampuan memahami instruksi sederhana,
- kemampuan menceritakan kembali gambar atau cerita,
- perkembangan komunikasi verbal.

Gunakan 1 paragraf agak panjang.
Jangan menyertakan angka capaian atau istilah teknis.
Bahasa harus sederhana dan mudah dipahami orang tua.
Data anak:
{{DATA}}
`;

$(document).ready(function () {

  function processAI(targetField, extraInstruction) {
    let muridId = $('#raport_murid_id').val();

    if (!muridId) {
      $(targetField).val('');
      return;
    }

    // Tampilkan loading
    $(targetField)
      .val("⏳ Sedang memproses data dengan ChatGPT...")
      .prop("disabled", true);

    // Step 1: Ambil data murid
    $.ajax({
      url: "<?= base_url('raport/getPerkembangan') ?>",
      type: "GET",
      data: { id: muridId },
      dataType: "json",
      success: function (response) {
        if (!response.success) {
          $(targetField)
            .val("❌ Data murid tidak ditemukan.")
            .prop("disabled", false);
          return;
        }

        // Step 2: Bangun prompt
        const muridData = response.data;
        const textData = JSON.stringify(muridData, null, 2);

        const prompt = `
Tanpa intro atau kata pembuka, langsung buatkan satu sampai tiga paragraf rekap raport PAUD.
${extraInstruction}
Data murid:
${textData}
        `;

        // Step 3: Kirim ke backend (AMAN)
        $.ajax({
          url: "<?= base_url('raport/generateRaport') ?>",
          type: "POST",
          data: { prompt: prompt },
          dataType: "json",
          success: function (aiResponse) {

            const result = aiResponse?.choices?.[0]?.message?.content
              || "❌ Tidak ada hasil dari ChatGPT.";

            $(targetField)
              .val(result)
              .prop("disabled", false);
          },
          error: function () {
            $(targetField)
              .val("❌ Gagal memproses data dari ChatGPT.")
              .prop("disabled", false);
          }
        });
      },
      error: function () {
        $(targetField).val("❌ Gagal mengambil data murid.");
      }
    });
  }

  // Ketika murid berubah → proses semua bidang otomatis
  $('#raport_murid_id').on('change', function () {
    processAI('#perkembangan', PROMPT_PERKEMBANGAN);
    processAI('#ketagama', PROMPT_AGAMA);
    processAI('#ketjati', PROMPT_JATI);
    processAI('#ketliterasi', PROMPT_LITERASI);
});


});
</script>
