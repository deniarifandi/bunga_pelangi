<?= $this->include('layouts/header.php') ?>

<?php 
$title = isset($ekskul) ? "Edit Ekskul" : "Tambah Ekskul";
?>

<main class="app-main">
  <div class="container-fluid">

    <h3 class="mb-3"><?= $title ?></h3>

    <form 
      action="<?= isset($ekskul) ? base_url('ekskul/update/'.$ekskul['murid_id']) : base_url('ekskul/store'); ?>" 
      method="post"
    >

      <!-- BASIC INFO -->
      <div class="card mb-3">
        <div class="card-header">🧑‍🎓 Data Murid</div>
        <div class="card-body row g-3">

          <div class="col-md-6">
            <label class="form-label">ID Murid</label>
            <input 
              type="text" 
              name="murid_id" 
              class="form-control" 
              readonly 
              value="<?= esc($data[0]->murid_id ?? '') ?>"
            >
          </div>

          <div class="col-md-6">
            <label class="form-label">Nama Murid</label>
            <input 
              type="text" 
              name="murid_nama" 
              class="form-control" 
              readonly  
              value="<?= esc($data[0]->murid_nama ?? '') ?>"
            >
          </div>

        </div>
      </div>

      <!-- EKSKUL 1 -->
      <div class="card mb-3">
        <div class="card-header">🎯 Ekstrakurikuler 1</div>
        <div class="card-body row g-3">

          <div class="col-md-4">
            <label class="form-label">Jenis Ekskul</label>
            <input 
              type="text" 
              class="form-control" 
              name="ekskul1" 
              value="Menari" readonly 
            >
          </div>

          <div class="col-md-4">
            <label class="form-label">Nilai</label>
            <input 
              type="number" 
              class="form-control" 
              name="nilai1" 
               value="<?= isset($ekskul) ? esc($ekskul['nilai1']) : '' ?>" 
              placeholder=""
            >
          </div>

          <div class="col-md-12">
            <label class="form-label">Deskripsi</label>
            <textarea 
              class="form-control" 
              name="deskripsi1" 
              rows="3" 
              placeholder="Tulis deskripsi perkembangan ekskul Menari..."
            ><?= isset($ekskul) ? esc($ekskul['deskripsi1']) : '' ?></textarea>
          </div>

        </div>
      </div>

      <!-- EKSKUL 2 -->
      <div class="card mb-3">
        <div class="card-header">🎯 Ekstrakurikuler 2</div>
        <div class="card-body row g-3">

          <div class="col-md-4">
            <label class="form-label">Jenis Ekskul</label>
            <input 
              type="text" 
              class="form-control" 
              name="ekskul2" 
               value="Mewarnai" readonly 
            >
          </div>

          <div class="col-md-4">
            <label class="form-label">Nilai</label>
            <input 
              type="number" 
              class="form-control" 
              name="nilai2" 
              value="<?= isset($ekskul) ? esc($ekskul['nilai2']) : '' ?>" 
              placeholder=""
            >
          </div>

          <div class="col-md-12">
            <label class="form-label">Deskripsi</label>
            <textarea 
              class="form-control" 
              name="deskripsi2" 
              rows="3" 
              placeholder="Tulis deskripsi perkembangan ekskul Mewarnai..."
            ><?= isset($ekskul) ? esc($ekskul['deskripsi2']) : '' ?></textarea>
          </div>

        </div>
      </div>

      <!-- BUTTON -->
      <div class="text-end mb-5">
        <a href="<?= base_url('ekskul/murid') ?>" class="btn btn-secondary me-2">Cancel</a>

        <button type="submit" class="btn btn-primary">
          <?= isset($ekskul) ? 'Update Ekskul' : 'Save Ekskul' ?>
        </button>
      </div>

    </form>

  </div>
</main>

<?= $this->include('layouts/footer.php') ?>
