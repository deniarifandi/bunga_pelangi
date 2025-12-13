<?php
echo view('layouts/header.php');

$title = 'Edit Penilaian';
?>

<style>
  .clickable-cell {
    cursor: pointer;
  }
  .clickable-cell:hover {
    background-color: #e9ecef;
  }
  .clickable-cell input[type="radio"] {
    cursor: pointer;
  }
</style>

<main class="app-main">
  <!-- Header -->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0"><?= esc($title) ?></h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item">
              <a href="<?= base_url() ?>">Home</a>
            </li>
            <li class="breadcrumb-item active">
              <?= esc($title) ?>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Content -->
  <div class="app-content">
    <div class="container-fluid">
      <div class="row">
        <div class="card">

          <div class="card-header">
            <h3 class="card-title">Edit Nilai Siswa</h3>
          </div>

          <div class="card-body">
            <form action="<?= base_url('Penilaian/simpan_nilai') ?>" method="POST">

              <!-- Aktivitas -->
              <h4 class="mb-3 fw-bold text-primary">
                Judul Aktivitas:
                <span class="text-dark">
                  <?= esc($aktifitas->tipeaktifitas_nama) ?>
                </span>
              </h4>

              <input type="hidden"
                     name="tipeaktifitas_id"
                     value="<?= esc($aktifitas->tipeaktifitas_id) ?>">

              <!-- Table -->
              <table class="table table-bordered table-striped align-middle">
                <thead class="table-light text-center">
                  <tr>
                    <th style="width:5%">No</th>
                    <th style="width:40%">Nama Siswa</th>
                    <th>Kelompok</th>
                    <th>MB</th>
                    <th>B</th>
                    <th>BSH</th>
                    <th>SB</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($data)): ?>
                    <?php
                      $no = 1;
                      $options = ['MB', 'B', 'BSH', 'SB'];
                    ?>
                    <?php foreach ($data as $row): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row->murid_nama) ?></td>
                        <td><?= esc($row->kelompok_nama ?? '-') ?></td>

                        <?php foreach ($options as $opt): ?>
                          <?php
                            // Pre-check existing nilai
                            if ($row->hasil_id) {
                                $checked = ($row->hasil_id === $opt) ? 'checked' : '';
                            } else {
                                // default if no nilai yet
                               $checked = '';
                            }

                            $id = 'nilai_' . $row->murid_id . '_' . $opt;
                          ?>
                          <td class="text-center clickable-cell">
                            <input type="radio"
                                   id="<?= esc($id) ?>"
                                   name="nilai[<?= esc($row->murid_id) ?>]"
                                   value="<?= esc($opt) ?>"
                                   class="form-check-input"
                                   <?= $checked ?>
                                   required>
                          </td>
                        <?php endforeach; ?>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" class="text-center text-muted">
                        Tidak ada data penilaian
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>

              <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary px-4">
                  Update Nilai
                </button>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<?php echo view('layouts/footer.php'); ?>

<script>
document.querySelectorAll('.clickable-cell').forEach(cell => {
  cell.addEventListener('click', function () {
    const radio = this.querySelector('input[type="radio"]');
    if (radio && !radio.checked) {
      radio.checked = true;
    }
  });
});
</script>

</body>
</html>
