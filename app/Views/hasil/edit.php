<?php 
echo view('layouts/header.php');
// echo view('layouts/sidebar.php');

$title = "modul ajar";
$table = "hasil";
$hasil = $data['hasil']; // shortcut
?>

<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Edit <?= esc($title) ?></h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= esc($title) ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!--begin::App Content-->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit <?= esc($title) ?></h3>
          </div>

          <div class="card-body">
            <?php if (session('errors')) : ?>
              <div class="alert alert-danger">
                <ul class="mb-0">
                  <?php foreach (session('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <form action="<?= base_url('Aktifitas/update/' . esc($hasil->hasil_id)) ?>" method="post" enctype="multipart/form-data">
              <?= csrf_field() ?>

              <!-- Nama Guru -->
              <div class="mb-3">
                <label for="guru_nama" class="form-label">Nama Guru</label>
                <input type="text" class="form-control bg-light" id="guru_nama" 
                       name="guru_nama" value="<?= esc($data['guru_nama']) ?>" readonly>
              </div>

              <!-- Kelompok -->
              <div class="mb-3">
                <label for="kelompok" class="form-label">Kelompok</label>
                <input type="text" class="form-control bg-light" id="kelompok" 
                       name="kelompok" value="<?= esc($data['kelompok'][0]->kelompok_nama ?? '') ?>" readonly>
              </div>

              <!-- Nilai Agama Moral dan Budi Pekerti -->
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="nilai_agama_1" class="form-label">Nilai Agama Moral dan Budi Pekerti 1</label>
                  <select class="form-control" id="nilai_agama_1" name="nilai_agama_1">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['agama'] as $row): ?>
                      <option value="<?= esc($row->tujuan_id) ?>"
                        <?= ($hasil->nilai_agama_1 ?? '') == $row->tujuan_id ? 'selected' : '' ?>>
                        <?= esc($row->tujuan_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="nilai_agama_2" class="form-label">Nilai Agama Moral dan Budi Pekerti 2</label>
                  <select class="form-control" id="nilai_agama_2" name="nilai_agama_2">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['agama'] as $row): ?>
                      <option value="<?= esc($row->tujuan_id) ?>"
                        <?= ($hasil->nilai_agama_2 ?? '') == $row->tujuan_id ? 'selected' : '' ?>>
                        <?= esc($row->tujuan_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Jati Diri -->
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="jati_diri_1" class="form-label">Jati Diri 1</label>
                  <select class="form-control" id="jati_diri_1" name="jati_diri_1">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['jati'] as $row): ?>
                      <option value="<?= esc($row->tujuan_id) ?>"
                        <?= ($hasil->jati_diri_1 ?? '') == $row->tujuan_id ? 'selected' : '' ?>>
                        <?= esc($row->tujuan_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="jati_diri_2" class="form-label">Jati Diri 2</label>
                  <select class="form-control" id="jati_diri_2" name="jati_diri_2">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['jati'] as $row): ?>
                      <option value="<?= esc($row->tujuan_id) ?>"
                        <?= ($hasil->jati_diri_2 ?? '') == $row->tujuan_id ? 'selected' : '' ?>>
                        <?= esc($row->tujuan_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Literasi & STEAM -->
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="literasi_1" class="form-label">Literasi & STEAM 1</label>
                  <select class="form-control" id="literasi_1" name="literasi_1">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['literasi'] as $row): ?>
                      <option value="<?= esc($row->tujuan_id) ?>"
                        <?= ($hasil->literasi_1 ?? '') == $row->tujuan_id ? 'selected' : '' ?>>
                        <?= esc($row->tujuan_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="literasi_2" class="form-label">Literasi & STEAM 2</label>
                  <select class="form-control" id="literasi_2" name="literasi_2">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['literasi'] as $row): ?>
                      <option value="<?= esc($row->tujuan_id) ?>"
                        <?= ($hasil->literasi_2 ?? '') == $row->tujuan_id ? 'selected' : '' ?>>
                        <?= esc($row->tujuan_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Alat dan Bahan -->
              <div class="mb-3">
                <label for="alat_bahan" class="form-label">Alat dan Bahan</label>
                <textarea class="form-control" id="alat_bahan" name="alat_bahan"><?= esc($hasil->alat_bahan ?? '') ?></textarea>
              </div>

              <!-- Semester -->
              <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select class="form-control" id="semester" name="semester">
                  <option value="">-- Pilih Semester --</option>
                  <option value="1" <?= ($hasil->semester ?? '') == '1' ? 'selected' : '' ?>>1</option>
                  <option value="2" <?= ($hasil->semester ?? '') == '2' ? 'selected' : '' ?>>2</option>
                </select>
              </div>

              <!-- Topik & Subtopik -->
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="topik" class="form-label">Topik</label>
                  <select class="form-control" id="topik" name="topik">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['topik'] as $row): ?>
                      <option value="<?= esc($row->unit_id) ?>"
                        <?= ($hasil->topik ?? '') == $row->unit_id ? 'selected' : '' ?>>
                        <?= esc($row->unit_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="subtopik" class="form-label">Subtopik</label>
                  <select class="form-control" id="subtopik" name="subtopik">
                    <option value="">-- Pilih --</option>
                    <?php foreach ($data['subtopik'] as $row): ?>
                      <option value="<?= esc($row->subunit_id) ?>" data-topik="<?= esc($row->unit_id) ?>"
                        <?= ($hasil->subtopik ?? '') == $row->subunit_id ? 'selected' : '' ?>>
                        <?= esc($row->subunit_nama) ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Dynamic Textareas -->
              <?php
              $textareas = [
                'pembiasaan' => 'Pembiasaan Pagi',
                'pembuka' => 'Kegiatan Pembuka',
                'senin' => 'Kegiatan Senin',
                'selasa' => 'Kegiatan Selasa',
                'rabu' => 'Kegiatan Rabu',
                'kamis' => 'Kegiatan Kamis',
                'jumat' => 'Kegiatan Jumat',
                'istirahat' => 'Istirahat',
                'penutup' => 'Kegiatan Penutup',
                'assessment' => 'Assessment'
              ];
              foreach ($textareas as $name => $label): ?>
                <div class="mb-3">
                  <label for="<?= $name ?>" class="form-label"><?= esc($label) ?></label>
                  <textarea class="form-control" id="<?= $name ?>" name="<?= $name ?>"><?= esc($hasil->$name ?? '') ?></textarea>
                </div>
              <?php endforeach; ?>

              <a href="<?= site_url($table) ?>" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-primary float-end">Update</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<script>
(function () {
  const topikEl = document.getElementById('topik');
  const subtopikEl = document.getElementById('subtopik');
  const map = {};

  Array.from(subtopikEl.querySelectorAll('option[data-topik]')).forEach(opt => {
    const topikId = opt.dataset.topik;
    if (!map[topikId]) map[topikId] = [];
    map[topikId].push({
      value: opt.value,
      text: opt.textContent.trim(),
      selected: opt.hasAttribute('selected')
    });
  });

  function populateFor(topikId) {
    subtopikEl.innerHTML = '<option value="">-- Pilih --</option>';
    const list = map[topikId] || [];
    list.forEach(item => {
      const o = document.createElement('option');
      o.value = item.value;
      o.textContent = item.text;
      if (item.selected) o.selected = true;
      subtopikEl.appendChild(o);
    });
    subtopikEl.disabled = list.length === 0;
  }

  topikEl.addEventListener('change', () => populateFor(topikEl.value));
  if (topikEl.value) populateFor(topikEl.value);
})();
</script>
