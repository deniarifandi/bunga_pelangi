<?php
echo view('layouts/header.php');

$title = 'Penilaian';
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

<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
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
            <li class="breadcrumb-item active" aria-current="page">
              <?= esc($title) ?>
            </li>
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
            <h3 class="card-title">Penilaian Baru</h3>
          </div>

          <div class="card-body">
            <form action="<?= base_url('Penilaian/simpan_nilai') ?>" method="POST">

              <!-- Aktivitas Info -->
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
                <thead class="table-light">
                  <tr>
                    <th style="width:5%">No</th>
                    <th style="width:40%">Nama Siswa</th>
                    <th>Kelompok</th>
                    <th class="text-center">MB</th>
                    <th class="text-center">B</th>
                    <th class="text-center">BSH</th>
                    <th class="text-center">SB</th>
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
                        <td><?= esc($row->kelompok_nama) ?></td>

                        <?php foreach ($options as $opt): ?>
                          <?php
                            $id      = 'nilai_' . $row->murid_id . '_' . $opt;
                            $checked = ($opt === 'BSH') ? 'checked' : '';
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
                        Tidak ada data siswa
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>

              <!-- Submit -->
              <div class="text-end">
                <button type="submit" class="btn btn-success px-4">
                  Simpan Nilai
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
