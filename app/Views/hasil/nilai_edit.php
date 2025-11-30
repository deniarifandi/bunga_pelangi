<?php 
echo view('layouts/header.php');
// print_r($data);
// echo count($data);
// exit();
$title = "Penilaian";



    // Example student data (replace this with your DB query)
    $students = json_encode($data);   ?>


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
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0"><?= $title ?></h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Penilaian list</h3>
                  <div class="card-tools">
                  
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <h4 class="mb-3 fw-bold text-primary">
                      Judul Aktivitas: <span class="text-dark"><?= $aktifitas[0]->tipeaktifitas_nama ?></span>
                    </h4>

                    <input type="hidden" name="tipeaktifitas_id" value="<?= $aktifitas[0]->tipeaktifitas_id ?>">


                   <form action="<?= base_url('Penilaian/update_nilai') ?>" method="POST">
                    <input type="hidden" name="aktifitas_id" value="<?= $aktifitas[0]->tipeaktifitas_id ?>">

                  <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light text-center">
                      <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelompok</th>
                        <th>MB</th>
                        <th>B</th>
                        <th>BSH</th>
                        <th>SB</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $index = 0;
                      foreach ($data as $row): ?>
                        <tr>
                          <td><?= $row->penilaian_id ?></td>
                          <td class="text-start"><?= htmlspecialchars($row->murid_nama) ?>
                          </td>
                          <td><?php echo $row->kelompok_nama ?></td>
                          <?php
                            $options = ['MB', 'B', 'BSH', 'SB'];
                            foreach ($options as $opt):
                              $id = 'hasil_id' . $row->murid_id . '_' . $opt;
                              $checked = ($row->hasil_id === $opt) ? 'checked' : '';
                          ?>
                            <td class="text-center clickable-cell">
                              <input type="radio"
                                     id="<?= $id ?>"
                                     name="nilai[<?= $row->murid_id ?>]"
                                     value="<?= $opt ?>"
                                     class="form-check-input"
                                     <?= $checked ?>
                                     required>
                            </td>
                          <?php endforeach; ?>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                  <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">Update Nilai</button>
                  </div>
                </form>
                   
                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
             
            </div>
            <!-- /.row -->
            <!--begin::Row-->
           


            <!--end::Row-->
            <!--begin::Row-->
           
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
     
      <?php 
        echo view('layouts/footer.php');
      ?>
    

 <script>
  document.querySelectorAll('.clickable-cell').forEach(cell => {
    cell.addEventListener('click', function(e) {
      const radio = this.querySelector('input[type="radio"]');
      if (radio) {
        radio.checked = true;
      }
    });
  });
</script>

</body>
</html>