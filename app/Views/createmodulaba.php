<?php 
echo view('layouts/header.php');
echo view('layouts/sidebar.php');

$title = "modul ajar";
$table = "hasil";
?>

<style>
.custom-select {
  position: relative;
 
}
.selected {
  border: 1px solid #ccc;
  padding: 8px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
}
.option-list {
  display: none;
  position: absolute;
  width: 100%;
  border: 1px solid #ccc;
  background: white;
  z-index: 10;
}
.option {
  padding: 8px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
}
.option:hover {
  background: #f0f0f0;
}
.option img {
  width: 24px;
  height: 24px;
  border-radius: 50%;
}
</style>


<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0"><?= esc($title) ?></h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc($title) ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add <?= esc($title) ?></h3>
          </div>

          <div class="card-body">
            <?php if (session('errors')) : ?>
              <div style="color:red;">
                <ul>
                  <?php foreach (session('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <form action="<?= base_url() ?>Aktifitas/create" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Nama Guru -->
    <div class="mb-3">
        <label for="guru_nama" class="form-label">Nama Guru:</label>
        <input 
          type="text" 
          class="form-control bg-light" 
          id="guru_nama" 
          name="guru_nama" 
          value="<?= old('guru_nama', esc($data['guru_nama'])) ?>" readonly>
    </div>

    <!-- Kelompok -->
    <div class="mb-3">
        <label for="kelompok" class="form-label">Kelompok</label>
        <input type="text" class="form-control bg-light" id="kelompok" name="kelompok" value="<?= old('kelompok_nama', esc($data['kelompok'][0]->kelompok_nama)) ?>" readonly>
    </div>

    <!-- Peta Konsep -->
  
 <hr>
     <label for="" class="form-label"><h4>A. Peta Konsep</h4></label>
     <div class="row">
    <div class="col-md-12 mb-3">
      <label for="guru_nama" class="form-label">Peta Konsep</label>

      <div class="custom-select" style="max-width:100%; position:relative;">
        <div class="selected" style="border:1px solid #ccc; padding:10px; cursor:pointer;">
          Pilih Peta Konsep
        </div>
        <div class="option-list" style="display:none; border:1px solid #ccc; position:absolute; background:white; width:100%; max-height:200px; overflow-y:auto; z-index:10;">
          <?php foreach ($data['petakonsep'] as $row): ?>
            <div class="option" 
                 data-value="<?= $row->petakonsep_id ?>" 
                 style="padding:5px; cursor:pointer; display:flex; align-items:center; gap:10px;">
              <img src="<?= base_url('uploads/'.$row->url) ?>" alt="petakonsep" style="max-width:80px; border:1px solid #ddd;"> 
              <?= esc($row->judul) ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
    <input type="hidden" name="petakonsep" id="selectedValue">
  </div>

    <hr>
     <label for="" class="form-label"><h4>B. Capaian & Tujuan Belajar</h4></label>

    <!-- Nilai Agama Moral dan Budi Pekerti -->
    <div class="row">
       <div class="col-md-6 mb-3">
          <label for="nilai_agama_1" class="form-label">Nilai Agama Moral dan Budi Pekerti 1</label>
          <select class="form-control" id="nilai_agama_1" name="nilai_agama_1">
              <option value="">-- Pilih --</option>
              <?php foreach ($data['agama'] as $row): ?>
                  <option value="<?= esc($row->tujuan_id) ?>" 
                      <?= old('nilai_agama_1') == $row->tujuan_id ? 'selected' : '' ?>>
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
                      <?= old('nilai_agama_2') == $row->tujuan_id ? 'selected' : '' ?>>
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
                      <?= old('jati_diri_1') == $row->tujuan_id ? 'selected' : '' ?>>
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
                      <?= old('jati_diri_2') == $row->tujuan_id ? 'selected' : '' ?>>
                      <?= esc($row->tujuan_nama) ?>
                  </option>
              <?php endforeach; ?>
          </select>
      </div>
    </div>

    <!-- Literasi dan STEAM -->
    <div class="row">
        <div class="col-md-6 mb-3">
          <label for="literasi_1" class="form-label">Literasi & STEAM 1</label>
          <select class="form-control" id="literasi_1" name="literasi_1">
              <option value="">-- Pilih --</option>
              <?php foreach ($data['literasi'] as $row): ?>
                  <option value="<?= esc($row->tujuan_id) ?>" 
                      <?= old('literasi_1') == $row->tujuan_id ? 'selected' : '' ?>>
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
                      <?= old('literasi_2') == $row->tujuan_id ? 'selected' : '' ?>>
                      <?= esc($row->tujuan_nama) ?>
                  </option>
              <?php endforeach; ?>
          </select>
      </div>
    </div>

    <!-- Alat dan Bahan -->
    <div class="mb-3">
        <label for="alat_bahan" class="form-label">Alat dan Bahan</label>
        <textarea class="form-control" id="alat_bahan" name="alat_bahan"><?= old('alat_bahan') ?></textarea>
    </div>

    <!-- Semester -->
    <div class="mb-3">
        <label for="semester" class="form-label">Semester</label>
        <select class="form-control" id="semester" name="semester">
            <option value="">-- Pilih Semester --</option>
            <option value="1" <?= old('semester') == '1' ? 'selected' : '' ?>>1</option>
            <option value="2" <?= old('semester') == '2' ? 'selected' : '' ?>>2</option>
        </select>
    </div>

    <!-- Topik & Sub Topik -->
  <div class="row">
    <div class="col-md-6 mb-3">
        <label for="topik" class="form-label">Topik</label>
        <select class="form-control" id="topik" name="topik">
            <option value="">-- Pilih --</option>
            <?php foreach ($data['topik'] as $row): ?>
                <option value="<?= esc($row->unit_id) ?>" 
                    <?= old('topik') == $row->unit_id ? 'selected' : '' ?>>
                    <?= esc($row->unit_nama) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="subtopik" class="form-label">Subtopik</label>
        <select class="form-control" id="subtopik" name="subtopik" disabled>
            <option value=""><?= old('topik') ? '-- Pilih --' : '-- Pilih Topik Terlebih Dahulu --' ?></option>

            <?php foreach ($data['subtopik'] as $row): ?>
                <!-- data-topik links subtopik to topik -->
                <option value="<?= esc($row->subunit_id) ?>" data-topik="<?= esc($row->unit_id) ?>"
                    <?= old('subtopik') == $row->subunit_id ? 'selected' : '' ?>>
                    <?= esc($row->subunit_nama) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


    <!-- Pembiasaan Pagi -->
    <div class="mb-3">
        <label for="pembiasaan" class="form-label">Pembiasaan Pagi</label>
        <textarea rows="7" class="form-control" id="pembiasaan" name="pembiasaan"><?= old('pembiasaan') ?? '
        - SOP Penyambutan Kedatangan Anak
        - Bermain Bersama
        - Senam Bersama
        - Pembiasaan Minum Air Putih
                        '?></textarea>
    </div>

    <!-- Kegiatan Pembuka -->
    <div class="mb-3">
        <label for="pembuka" class="form-label">Kegiatan Pembuka</label>
        <textarea class="form-control" id="pembuka" name="pembuka"><?= old('pembuka') ?? '-Masuk Kelas , Berdoa, membuat kesepakatan bersama  '?></textarea>
    </div>

  <?php 
$hari = ['senin','selasa','rabu','kamis','jumat'];
foreach ($hari as $h): ?>
    <div class="mb-3">
        <label class="form-label">Kegiatan <?= ucfirst($h) ?></label>

        <?php for ($i = 0; $i < 3; $i++): ?>
            <select class="form-control mb-2" name="<?= $h ?>[]">
                <option value="">-- Pilih Kegiatan --</option>
                <?php foreach ($data['tipeaktifitas'] as $row): ?>
                    <option value="<?= esc($row[0]) ?>"
                        <?= (old($h.'.'.$i) == $row[0]) ? 'selected' : '' ?>>
                        <?= esc($row[1]) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php endfor; ?>

    </div>
<?php endforeach; ?>

    <!-- Istirahat -->
    <div class="mb-3">
        <label for="istirahat" class="form-label">Istirahat</label>
        <textarea class="form-control" id="istirahat" name="istirahat"><?= old('istirahat') ?? '- Pembiasaan Cuci Tangan Sebelum dan Sesudah Makan
- Makan Bekal Bersama
- Bermain   '?></textarea>
    </div>

    <!-- Penutup -->
    <div class="mb-3">
        <label for="penutup" class="form-label">Kegiatan Penutup</label>
        <textarea class="form-control" id="penutup" name="penutup"><?= old('penutup') ?? '- Recalling
- Doa, salam, pulang  ' ?></textarea>
    </div>

    <!-- Assessment -->
    <div class="mb-3">
        <label for="assessment" class="form-label">Assessment</label>
        <textarea class="form-control" id="assessment" name="assessment"><?= old('assessment') ?? 'Ceklis, Foto Berseri' ?></textarea>
    </div>

    <a href="<?= site_url($table) ?>" class="btn btn-danger">Cancel</a>
    <button type="submit" class="btn btn-success float-end">Submit</button>
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

    // Build a map of topikId => [{value,text,selected}, ...]
    const map = {};
    Array.from(subtopikEl.querySelectorAll('option[data-topik]')).forEach(opt => {
        const topikId = opt.dataset.topik;
        if (!map[topikId]) map[topikId] = [];
        map[topikId].push({
            value: opt.value,
            text: opt.textContent.trim(),
            // note which one was pre-selected on server-side (old value)
            selected: opt.hasAttribute('selected')
        });
    });

    // Remove all actual subtopic option nodes; we'll rebuild on demand
    subtopikEl.innerHTML = '';
    // Add initial placeholder
    const placeholder = document.createElement('option');
    placeholder.value = '';
    placeholder.textContent = '-- Pilih Topik Terlebih Dahulu --';
    subtopikEl.appendChild(placeholder);
    subtopikEl.disabled = true;

    function populateFor(topikId) {
        // clear, leave placeholder
        subtopikEl.innerHTML = '';
        const first = document.createElement('option');
        first.value = '';
        first.textContent = '-- Pilih --';
        subtopikEl.appendChild(first);

        if (!topikId) {
            // no topik selected -> disable and show instruction
            subtopikEl.innerHTML = '';
            const instruct = document.createElement('option');
            instruct.value = '';
            instruct.textContent = '-- Pilih Topik Terlebih Dahulu --';
            subtopikEl.appendChild(instruct);
            subtopikEl.disabled = true;
            return;
        }

        const list = map[topikId] || [];
        if (list.length === 0) {
            subtopikEl.innerHTML = '';
            const noOpt = document.createElement('option');
            noOpt.value = '';
            noOpt.textContent = '-- Tidak Ada Subtopik --';
            subtopikEl.appendChild(noOpt);
            subtopikEl.disabled = true;
            return;
        }

        // create option elements (new nodes) so we don't move original nodes
        list.forEach(item => {
            const o = document.createElement('option');
            o.value = item.value;
            o.textContent = item.text;
            if (item.selected) o.selected = true; // preserve server-side 'old' selection
            subtopikEl.appendChild(o);
        });
        subtopikEl.disabled = false;
    }

    // On change: populate
    topikEl.addEventListener('change', () => {
        populateFor(topikEl.value);
    });

    // If page loaded with an already-selected topik (form repopulation)
    // then populate subtopik accordingly
    if (topikEl.value) {
        populateFor(topikEl.value);
    }
})();
</script>

<script>
const select = document.querySelector('.custom-select');
const selected = select.querySelector('.selected');
const options = select.querySelector('.option-list');
const input = document.querySelector('#selectedValue');

selected.addEventListener('click', () => {
  options.style.display = options.style.display === 'block' ? 'none' : 'block';
});

options.querySelectorAll('.option').forEach(opt => {
  opt.addEventListener('click', () => {
    selected.innerHTML = opt.innerHTML;
    input.value = opt.dataset.value;
    options.style.display = 'none';
  });
});

document.addEventListener('click', (e) => {
  if (!select.contains(e.target)) options.style.display = 'none';
});
</script>

<?php 
echo view('layouts/footer.php');
?>
