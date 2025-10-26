<?php 
echo view('layouts/header.php');

$title = "Raport";
$table = "Raport";
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
                    <a href="<?= $table ?>/new" class="btn btn-primary">Add <?= $title ?></a>
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
                          <th>Semester</th>
                          <th>AY</th>
                          <th>Murid</th>
                          <th>Action</th>
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
                url: "<?= base_url('Raport/data') ?>",
                type: "POST"
            },
            columns: [
                { data: 'raport_id' },
                { data: 'raport_semester' },
                { data: 'raport_tahun' },
                { data: 'murid_nama' },
                {
                data: null,
                render: function(data, type, row) {
                    // Check if penilaian_id exists
                    
                    return `
                      <a href="<?= base_url() ?>Raport/editraport/${row.raport_id}" 
                         class="btn btn-sm btn-warning edit-btn" data-id="${row.raport_id}">
                        <i class="bi bi-pencil"></i> Edit
                      </a>
                       <a href="<?= base_url() ?>Raport/printraport/${row.raport_id}" 
                         class="btn btn-sm btn-success add-btn" data-id="${row.raport_id}">
                        <i class="bi bi-plus"></i> Print
                      </a>
                      <button class="btn btn-sm btn-danger delete-btn" data-id="${row.raport_id}">
                          <i class="bi bi-trash"></i> Delete
                      </button>
                    `;
                },
                orderable: false,
                searchable: false
              }

            ]
        });

     
    });
    </script>


<script>
  
  // Delete button handler
$(document).on('click', '.delete-btn', function() {
    const id = $(this).data('id');
    if (confirm('Are you sure you want to delete this raport?')) {
        $.ajax({
            url: "<?= base_url('Raport/delete') ?>/" + id,
            type: "POST",
            data: {
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>' // for CSRF protection
            },
            success: function(response) {
                alert('Raport deleted successfully!');
                location.reload(); 
            },
            error: function(xhr, status, error) {
                alert('Error deleting raport: ' + xhr.responseText);
            }
        });
    }
});

</script>