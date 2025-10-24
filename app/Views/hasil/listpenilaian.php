<?php 
echo view('layouts/header.php');

$title = "Penilaian";
$table = "Penilaian";
?>

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
                  <h3 class="card-title"><?= $title ?> list</h3>
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

                  <table id="<?php $table ?>Table" class="display">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Aktifitas</th>
                          <th>Nilai</th>
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


     <?php 
        echo view('layouts/footer.php');
      ?>

      <script>
    $(document).ready(function () {
        $('#<?php $table ?>Table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url('Penilaian/data') ?>",
                type: "POST"
            },
            columns: [
                { data: 'aktifitas_id' },
                { data: 'aktifitas_nama' },
                {
                data: null,
                render: function(data, type, row) {
                  // Check if penilaian_id exists
                  if (row.penilaian_id && row.penilaian_id !== null && row.penilaian_id !== '') {
                    // Show EDIT button
                    return `
                      <a href="<?= base_url() ?>Penilaian/edit_nilai/${row.aktifitas_id}" 
                         class="btn btn-sm btn-warning edit-btn" data-id="${row.aktifitas_id}">
                        <i class="bi bi-pencil"></i> Edit
                      </a>
                    `;
                  } else {
                    // Show ADD button
                    return `
                      <a href="<?= base_url() ?>Penilaian/newpenilaian/${row.aktifitas_id}" 
                         class="btn btn-sm btn-primary add-btn" data-id="${row.aktifitas_id}">
                        <i class="bi bi-plus"></i> Add
                      </a>
                    `;
                  }
                },
                orderable: false,
                searchable: false
              }

            ]
        });

     
    });
    </script>

