<?= $this->include('layouts/header.php') ?>

<main class="app-main">
  <div class="container-fluid">
    <h3 class="mb-3">Data Ekskul Murid</h3>

    <div class="card">
      <div class="card-body">

        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Nama Murid</th>
              <th>Nilai Ekskul</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($muridList as $m): ?>
              <tr>
                <td><?= $m['murid_id'] ?></td>
                <td><?= esc($m['murid_nama']) ?></td>

                <td>
                  <?php if ($m['ekskul']): ?>
                    <span class="badge bg-success">Sudah Ada</span>
                  <?php else: ?>
                    <span class="badge bg-danger">Belum Ada</span>
                  <?php endif; ?>
                </td>

                <td class="text-center">
                  <?php if ($m['ekskul']): ?>
                    <a 
                      href="<?= base_url('ekskul/edit/'.$m['ekskul']['murid_id']) ?>" 
                      class="btn btn-warning btn-sm">
                      Edit Ekskul
                    </a>
                  <?php else: ?>
                    <a 
                      href="<?= base_url('ekskul/create?murid='.$m['murid_id']) ?>" 
                      class="btn btn-primary btn-sm">
                      Add Ekskul
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>

      </div>
    </div>
  </div>
</main>

<?= $this->include('layouts/footer.php') ?>
