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

    <form action="<?= base_url('bukuinduk/save') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="anak_id" value="<?= $exist['anak_id'] ?? '' ?>">

    <div class="row">
    <div class="col-md-6">  
    
    <div class="mb-2 mt-4">
      <h6><b>A. Identitas Anak</b></h6>
    </div>

    <div class="mb-3">
        <label>NIS</label>
        <input type="text" class="form-control" name="anak_nis" required value="<?= $data[0]['murid_id'] ?? '' ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" class="form-control" name="anak_nama" required value="<?= $data[0]['murid_nama'] ?? '' ?>" readonly>
    </div>

    <div class="mb-3">
        <label>Panggilan</label>
        <input type="text" class="form-control" name="anak_panggilan" value="<?= $exist['anak_panggilan'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select class="form-control" name="anak_jk">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" <?= ($exist['anak_jk'] ?? '') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="Perempuan" <?= ($exist['anak_jk'] ?? '') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Tempat, Tanggal Lahir</label>
        <input type="date" class="form-control" name="anak_ttl" value="<?= $exist['anak_ttl'] ?? '' ?>">
    </div>

     <div class="mb-3">
        <label>Agama</label>
        <select class="form-control" name="anak_agama">
            <option value="">-- Pilih --</option>
            <option value="Islam" <?= ($exist['anak_agama'] ?? '') == 'Islam' ? 'selected' : '' ?>>Islam</option>
            <option value="Kristen" <?= ($exist['anak_agama'] ?? '') == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
            <option value="Katolik" <?= ($exist['anak_agama'] ?? '') == 'Katolik' ? 'selected' : '' ?>>Katolik</option>
            <option value="Budha" <?= ($exist['anak_agama'] ?? '') == 'Budha' ? 'selected' : '' ?>>Budha</option>
            <option value="Hindu" <?= ($exist['anak_agama'] ?? '') == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Kewarganegaraan</label>
        <select class="form-control" name="anak_kewarganegaraan">
            <option value="">-- Pilih --</option>
            <option value="WNI" <?= ($exist['anak_kewarganegaraan'] ?? '') == 'WNI' ? 'selected' : '' ?>>WNI (Warga Negara Indonesia)</option>
            <option value="WNA" <?= ($exist['anak_kewarganegaraan'] ?? '') == 'WNA' ? 'selected' : '' ?>>WNA (Warga Negara Asing)</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Anak ke-</label>
        <input type="text" class="form-control" name="anak_ke" value="<?= $exist['anak_ke'] ?? '' ?>">
    </div>

    <div class="mb-3">
    <label>Status Anak dalam Keluarga</label>
    <select class="form-control" name="anak_status">
        <option value="">-- Pilih --</option>
        <option value="Anak Kandung" <?= ($exist['anak_status'] ?? '') == 'Anak Kandung' ? 'selected' : '' ?>>Anak Kandung</option>
        <option value="Anak Tiri" <?= ($exist['anak_status'] ?? '') == 'Anak Tiri' ? 'selected' : '' ?>>Anak Tiri</option>
        <option value="Anak Angkat" <?= ($exist['anak_status'] ?? '') == 'Anak Angkat' ? 'selected' : '' ?>>Anak Angkat</option>
        <option value="Cucu" <?= ($exist['anak_status'] ?? '') == 'Cucu' ? 'selected' : '' ?>>Cucu</option>
        <option value="Keponakan" <?= ($exist['anak_status'] ?? '') == 'Keponakan' ? 'selected' : '' ?>>Keponakan</option>
        <option value="Saudara Kandung" <?= ($exist['anak_status'] ?? '') == 'Saudara Kandung' ? 'selected' : '' ?>>Saudara Kandung</option>
        <option value="Saudara Sepupu" <?= ($exist['anak_status'] ?? '') == 'Saudara Sepupu' ? 'selected' : '' ?>>Saudara Sepupu</option>
        <option value="Anak Asuh" <?= ($exist['anak_status'] ?? '') == 'Anak Asuh' ? 'selected' : '' ?>>Anak Asuh</option>
        <option value="Lainnya" <?= ($exist['anak_status'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
    </select>
</div>

    <div class="mb-3">
    <label>Bahasa sehari-hari</label>
    <select class="form-control" name="anak_bahasa">
        <option value="">-- Pilih --</option>
        <option value="Indonesia" <?= ($exist['anak_bahasa'] ?? '') == 'Indonesia' ? 'selected' : '' ?>>Bahasa Indonesia</option>
        <option value="Jawa" <?= ($exist['anak_bahasa'] ?? '') == 'Jawa' ? 'selected' : '' ?>>Bahasa Jawa</option>
        <option value="Sunda" <?= ($exist['anak_bahasa'] ?? '') == 'Sunda' ? 'selected' : '' ?>>Bahasa Sunda</option>
        <option value="Madura" <?= ($exist['anak_bahasa'] ?? '') == 'Madura' ? 'selected' : '' ?>>Bahasa Madura</option>
        <option value="Bugis" <?= ($exist['anak_bahasa'] ?? '') == 'Bugis' ? 'selected' : '' ?>>Bahasa Bugis</option>
        <option value="Batak" <?= ($exist['anak_bahasa'] ?? '') == 'Batak' ? 'selected' : '' ?>>Bahasa Batak</option>
        <option value="Lainnya" <?= ($exist['anak_bahasa'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
    </select>
</div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea class="form-control" name="anak_alamat"><?= $exist['anak_alamat'] ?? '' ?></textarea>
    </div>

    </div>
    <div class="col-md-6">  
       <div class="mb-2 mt-4">
      <h6><b>B. Data Orang Tua / Wali</b></h6>
    </div>
    <div class="mb-3">
        <label>Pendidikan Ayah</label>
        <select class="form-control" name="anak_ayahsekolah">
            <option value="">-- Pilih --</option>
            <option value="Tidak Sekolah" <?= ($exist['anak_ayahsekolah'] ?? '') == 'Tidak Sekolah' ? 'selected' : '' ?>>Tidak Sekolah</option>
            <option value="SD" <?= ($exist['anak_ayahsekolah'] ?? '') == 'SD' ? 'selected' : '' ?>>SD</option>
            <option value="SMP" <?= ($exist['anak_ayahsekolah'] ?? '') == 'SMP' ? 'selected' : '' ?>>SMP</option>
            <option value="SMA/SMK" <?= ($exist['anak_ayahsekolah'] ?? '') == 'SMA/SMK' ? 'selected' : '' ?>>SMA/SMK</option>
            <option value="D1/D2/D3" <?= ($exist['anak_ayahsekolah'] ?? '') == 'D1/D2/D3' ? 'selected' : '' ?>>D1/D2/D3</option>
            <option value="S1" <?= ($exist['anak_ayahsekolah'] ?? '') == 'S1' ? 'selected' : '' ?>>S1</option>
            <option value="S2" <?= ($exist['anak_ayahsekolah'] ?? '') == 'S2' ? 'selected' : '' ?>>S2</option>
            <option value="S3" <?= ($exist['anak_ayahsekolah'] ?? '') == 'S3' ? 'selected' : '' ?>>S3</option>
        </select>
    </div>

    <div class="mb-3">
    <label>Pekerjaan Ayah</label>
    <select class="form-control" name="anak_ayahkerja">
        <option value="">-- Pilih --</option>
        <option value="Tidak Bekerja" <?= ($exist['anak_ayahkerja'] ?? '') == 'Tidak Bekerja' ? 'selected' : '' ?>>Tidak Bekerja</option>
        <option value="Petani" <?= ($exist['anak_ayahkerja'] ?? '') == 'Petani' ? 'selected' : '' ?>>Petani</option>
        <option value="Buruh" <?= ($exist['anak_ayahkerja'] ?? '') == 'Buruh' ? 'selected' : '' ?>>Buruh</option>
        <option value="Karyawan Swasta" <?= ($exist['anak_ayahkerja'] ?? '') == 'Karyawan Swasta' ? 'selected' : '' ?>>Karyawan Swasta</option>
        <option value="Wiraswasta" <?= ($exist['anak_ayahkerja'] ?? '') == 'Wiraswasta' ? 'selected' : '' ?>>Wiraswasta</option>
        <option value="PNS" <?= ($exist['anak_ayahkerja'] ?? '') == 'PNS' ? 'selected' : '' ?>>PNS</option>
        <option value="TNI/Polri" <?= ($exist['anak_ayahkerja'] ?? '') == 'TNI/Polri' ? 'selected' : '' ?>>TNI/Polri</option>
        <option value="Lainnya" <?= ($exist['anak_ayahkerja'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
    </select>
</div>

    <div class="mb-3">
        <label>Nama Ibu</label>
        <input type="text" class="form-control" name="anak_ibunama" value="<?= $exist['anak_ibunama'] ?? '' ?>">
    </div>

       <div class="mb-3">
        <label>Pendidikan Ibu</label>
        <select class="form-control" name="anak_ibusekolah">
            <option value="">-- Pilih --</option>
            <option value="Tidak Sekolah" <?= ($exist['anak_ibusekolah'] ?? '') == 'Tidak Sekolah' ? 'selected' : '' ?>>Tidak Sekolah</option>
            <option value="SD" <?= ($exist['anak_ibusekolah'] ?? '') == 'SD' ? 'selected' : '' ?>>SD</option>
            <option value="SMP" <?= ($exist['anak_ibusekolah'] ?? '') == 'SMP' ? 'selected' : '' ?>>SMP</option>
            <option value="SMA/SMK" <?= ($exist['anak_ibusekolah'] ?? '') == 'SMA/SMK' ? 'selected' : '' ?>>SMA/SMK</option>
            <option value="D1/D2/D3" <?= ($exist['anak_ibusekolah'] ?? '') == 'D1/D2/D3' ? 'selected' : '' ?>>D1/D2/D3</option>
            <option value="S1" <?= ($exist['anak_ibusekolah'] ?? '') == 'S1' ? 'selected' : '' ?>>S1</option>
            <option value="S2" <?= ($exist['anak_ibusekolah'] ?? '') == 'S2' ? 'selected' : '' ?>>S2</option>
            <option value="S3" <?= ($exist['anak_ibusekolah'] ?? '') == 'S3' ? 'selected' : '' ?>>S3</option>
        </select>
    </div>

   <div class="mb-3">
    <label>Pekerjaan Ibu</label>
    <select class="form-control" name="anak_ibukerja">
        <option value="">-- Pilih --</option>
        <option value="Tidak Bekerja" <?= ($exist['anak_ibukerja'] ?? '') == 'Tidak Bekerja' ? 'selected' : '' ?>>Tidak Bekerja</option>
        <option value="Petani" <?= ($exist['anak_ibukerja'] ?? '') == 'Petani' ? 'selected' : '' ?>>Petani</option>
        <option value="Buruh" <?= ($exist['anak_ibukerja'] ?? '') == 'Buruh' ? 'selected' : '' ?>>Buruh</option>
        <option value="Karyawan Swasta" <?= ($exist['anak_ibukerja'] ?? '') == 'Karyawan Swasta' ? 'selected' : '' ?>>Karyawan Swasta</option>
        <option value="Wiraswasta" <?= ($exist['anak_ibukerja'] ?? '') == 'Wiraswasta' ? 'selected' : '' ?>>Wiraswasta</option>
        <option value="PNS" <?= ($exist['anak_ibukerja'] ?? '') == 'PNS' ? 'selected' : '' ?>>PNS</option>
        <option value="TNI/Polri" <?= ($exist['anak_ibukerja'] ?? '') == 'TNI/Polri' ? 'selected' : '' ?>>TNI/Polri</option>
        <option value="Lainnya" <?= ($exist['anak_ibukerja'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
    </select>
</div>

    <div class="mb-3">
        <label>Wali</label>
        <input type="text" class="form-control" name="anak_wali" value="<?= $exist['anak_wali'] ?? '' ?>">
    </div>

   <div class="mb-3">
    <label>Hubungan Wali dengan Anak</label>
    <select class="form-control" name="anak_hubungan">
        <option value="">-- Pilih --</option>
        <option value="Kakek" <?= ($exist['anak_hubungan'] ?? '') == 'Kakek' ? 'selected' : '' ?>>Kakek</option>
        <option value="Nenek" <?= ($exist['anak_hubungan'] ?? '') == 'Nenek' ? 'selected' : '' ?>>Nenek</option>
        <option value="Paman" <?= ($exist['anak_hubungan'] ?? '') == 'Paman' ? 'selected' : '' ?>>Paman</option>
        <option value="Bibi" <?= ($exist['anak_hubungan'] ?? '') == 'Bibi' ? 'selected' : '' ?>>Bibi</option>
        <option value="Lainnya" <?= ($exist['anak_hubungan'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
    </select>
</div>


    <div class="mb-3">
        <label>Alamat Orang Tua</label>
        <textarea class="form-control" name="anak_alamatortu"><?= $exist['anak_alamatortu'] ?? '' ?></textarea>
    </div>

    <div class="mb-3">
        <label>No. HP Orang Tua</label>
        <input type="text" class="form-control" name="anak_hportu" value="<?= $exist['anak_hportu'] ?? '' ?>">
    </div>
  </div>
  <!-- end col md -->
  </div>
  <!-- col row -->
  <div class="row">
    <div class="col-md-6">

      <div class="mb-2 mt-4">
        <h6><b>C. Kesehatan dan Perkembangan
      </b></h6>
      </div>

       <div class="mb-3">
        <label>Golongan Darah</label>
        <select class="form-control" name="anak_darah">
            <option value="">-- Pilih --</option>
            <option value="A" <?= ($exist['anak_darah'] ?? '') == 'A' ? 'selected' : '' ?>>A</option>
            <option value="B" <?= ($exist['anak_darah'] ?? '') == 'B' ? 'selected' : '' ?>>B</option>
            <option value="AB" <?= ($exist['anak_darah'] ?? '') == 'AB' ? 'selected' : '' ?>>AB</option>
            <option value="O" <?= ($exist['anak_darah'] ?? '') == 'O' ? 'selected' : '' ?>>O</option>
            <option value="Tidak Tahu" <?= ($exist['anak_darah'] ?? '') == 'Tidak Tahu' ? 'selected' : '' ?>>Tidak Tahu</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Berat Badan</label>
        <input type="text" class="form-control" name="anak_berat" value="<?= $exist['anak_berat'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Riwayat Penyakit</label>
        <input type="text" class="form-control" name="anak_rawayat" value="<?= $exist['anak_rawayat'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Imunisasi</label>
        <input type="text" class="form-control" name="anak_imunisasi" value="<?= $exist['anak_imunisasi'] ?? '' ?>">
    </div>

    <div class="mb-3">
    <label>Kemampuan Bicara</label>
    <select class="form-control" name="anak_bicara">
        <option value="">-- Pilih --</option>
        <option value="Lancar" <?= ($exist['anak_bicara'] ?? '') == 'Lancar' ? 'selected' : '' ?>>Lancar</option>
        <option value="Kurang Lancar" <?= ($exist['anak_bicara'] ?? '') == 'Kurang Lancar' ? 'selected' : '' ?>>Kurang Lancar</option>
        <option value="Tidak Bisa" <?= ($exist['anak_bicara'] ?? '') == 'Tidak Bisa' ? 'selected' : '' ?>>Tidak Bisa</option>
    </select>
</div>

   <div class="mb-3">
    <label>Kondisi Khusus</label>
    <select class="form-control" name="anak_kondisi">
        <option value="">-- Pilih --</option>
        <option value="Tidak Ada" <?= ($exist['anak_kondisi'] ?? '') == 'Tidak Ada' ? 'selected' : '' ?>>Tidak Ada</option>
        <option value="ABK" <?= ($exist['anak_kondisi'] ?? '') == 'ABK' ? 'selected' : '' ?>>ABK</option>
        <option value="Speech Delay" <?= ($exist['anak_kondisi'] ?? '') == 'Speech Delay' ? 'selected' : '' ?>>Speech Delay</option>
        <option value="Lainnya" <?= ($exist['anak_kondisi'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
    </select>
  </div>
</div>
<!-- end md left -->
<div class="col-md-6">
  <!-- begin md right -->
    <div class="mb-2 mt-4">
        <h6><b>D. Data Masuk & Keluar
      </b></h6>
      </div>

    <div class="mb-3">
        <label>Tanggal Masuk</label>
        <input type="date" class="form-control" name="anak_tanggalmasuk" value="<?= $exist['anak_tanggalmasuk'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Usia Masuk</label>
        <input type="text" class="form-control" name="anak_usiamasuk" value="<?= $exist['anak_usiamasuk'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Kelompok</label>
        <input type="text" class="form-control" name="anak_kelompok" value="<?= $exist['anak_kelompok'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Tanggal Keluar</label>
        <input type="date" class="form-control" name="anak_tanggalkeluar" value="<?= $exist['anak_tanggalkeluar'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Alasan Keluar</label>
        <input type="text" class="form-control" name="anak_alasan" value="<?= $exist['anak_alasan'] ?? '' ?>">
    </div>

    <div class="mb-3">
        <label>Melanjutkan ke</label>
        <input type="text" class="form-control" name="anak_melanjutkan" value="<?= $exist['anak_melanjutkan'] ?? '' ?>">
    </div>

  </div>
</div>
    <div class="mb-2 mt-4">
        <h6><b>E. Catatan Khusus
      </b></h6>
      </div>
    <div class="mb-3">
        <label>Prestasi</label>
        <textarea class="form-control" name="anak_prestasi" value="<?= $exist['anak_prestasi'] ?? '' ?>"></textarea>
    </div>

    <div class="mb-3">
        <label>Perkembangan Anak</label>
        <textarea class="form-control" name="anak_perkembangan"><?= $exist['anak_perkembangan'] ?? '' ?></textarea>
    </div>

    <div class="mb-3">
        <label>Catatan</label>
        <textarea class="form-control" name="anak_catatan"><?= $exist['anak_catatan'] ?? '' ?></textarea>
    </div>

     <div class="mb-3">
        <label>Foto</label><br>
        <?php if (!empty($exist['anak_foto'])): ?>
            <img src="<?= base_url('uploads/foto/' . $exist['anak_foto']) ?>" width="100"><br><br>
        <?php endif; ?>
        <input type="file" name="anak_foto" accept="image/*">
    </div>

    </div>
    <!-- //row kanan -->
    <button type="submit" class="btn btn-success">Submit</button>
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
                        <a href="<?= base_url('bukuinduk/delete/') ?>${row.murid_id}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    `;
                }
                }
                
            ]
        });
    });
    </script>