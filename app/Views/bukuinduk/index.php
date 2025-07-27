    <?php 
      echo view('layouts/header.php');
      echo view('layouts/sidebar.php');
    ?>

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0"></h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
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
                  <h3 class="card-title"> list</h3>
                  <div class="card-tools">
                    
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                  <table id="Table" class="display">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Murid Nama</th>
                              <th>Kelompok</th>
                              <th>Action</th>
                              <!-- Add more columns if needed -->
                          </tr>
                      </thead>
                  </table>
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
    $(document).ready(function() {
        $('#Table').DataTable({
            "ajax": "<?= base_url('bukuinduk/getdata') ?>",
             "order": [[2, "asc"]], // Sort by the 2nd column (index 1), ascending
            "columns": [
                { "data": "murid_id" },
                { "data": "murid_nama" },
                { "data": "kelompok_nama" },
                {
                "data": null,
                "render": function(data, type, row) {
                    return `
                        <a href="<?= base_url('bukuinduk/edit/') ?>${row.murid_id}" class="btn btn-sm btn-warning">Identitas Anak</a>
                      
                    `;
                }
                }
                
            ]
        });
    });
    </script>