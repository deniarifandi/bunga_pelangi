<?= $this->include('layouts/header.php') ?>

<main class="app-main">
  <div class="container-fluid">
    <h3 class="mb-3">Data Ekskul</h3>

    <a href="<?= base_url('ekskul/create') ?>" class="btn btn-primary mb-3">+ Tambah Ekskul</a>

    <div class="card">
      <div class="card-body">

        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Nama Murid</th>
              <th>Ekskul 1</th>
              <th>Nilai</th>
              <th>Ekskul 2</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($ekskul as $e): ?>
            <tr>
              <td><?= $e['id'] ?></td>
              <td><?= esc($e['murid_nama']) ?></td>
              <td><?= esc($e['ekskul1']) ?></td>
              <td><?= esc($e['nilai1']) ?></td>
              <td><?= esc($e['ekskul2']) ?></td>
              <td><?= esc($e['nilai2']) ?></td>
              <td class="text-center">
                <a href="<?= base_url('ekskul/edit/'.$e['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('ekskul/delete/'.$e['id']) ?>" class="btn btn-danger btn-sm"
                  onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
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
