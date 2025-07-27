<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Formulir Data Anak</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      margin: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    td {
      vertical-align: top;
      padding: 6px;
      border: 1px solid #000;
    }
    .section-title {
      font-weight: bold;
      background-color: #f0f0f0;
      border: none;
    }
    .label {
      width: 40%;
      font-weight: bold;
    }
    .photo {
      max-width: 150px;
      max-height: 150px;
    }
  </style>
</head>
<body>

  <h2 style="text-align:center;">Buku Induk : Data Anak</h2>

  <table>
    <tr><td colspan="2" class="section-title">A. Identitas Anak</td></tr>
    <tr><td class="label">1. Nomor Induk / NIS:</td><td><?= $anak->anak_nis ?></td></tr>
    <tr><td class="label">2. Nama Lengkap:</td><td><?= $data[0]['murid_nama']?></td></tr>
    <tr><td class="label">3. Nama Panggilan:</td><td><?= $anak->anak_panggilan ?></td></tr>
    <tr><td class="label">4. Jenis Kelamin:</td><td><?= $anak->anak_jk ?></td></tr>
    <tr><td class="label">5. Tempat, Tanggal Lahir:</td><td><?= $anak->anak_ttl ?></td></tr>
    <tr><td class="label">6. Agama:</td><td><?= $anak->anak_agama ?></td></tr>
    <tr><td class="label">7. Kewarganegaraan:</td><td><?= $anak->anak_kewarganegaraan ?></td></tr>
    <tr><td class="label">8. Anak ke (dari berapa bersaudara):</td><td><?= $anak->anak_ke ?></td></tr>
    <tr><td class="label">9. Status dalam keluarga:</td><td><?= $anak->anak_status ?></td></tr>
    <tr><td class="label">10. Bahasa sehari-hari:</td><td><?= $anak->anak_bahasa ?></td></tr>
    <tr><td class="label">11. Alamat Lengkap:</td><td><?= $anak->anak_alamat ?></td></tr>

    <tr><td colspan="2" class="section-title">B. Data Orang Tua/Wali</td></tr>
    <tr><td class="label">1. Nama Ayah:</td><td><?= $anak->anak_ayahnama ?></td></tr>
    <tr><td class="label">2. Pendidikan Ayah:</td><td><?= $anak->anak_ayahsekolah ?></td></tr>
    <tr><td class="label">3. Pekerjaan Ayah:</td><td><?= $anak->anak_ayahkerja ?></td></tr>
    <tr><td class="label">4. Nama Ibu:</td><td><?= $anak->anak_ibunama ?></td></tr>
    <tr><td class="label">5. Pendidikan Ibu:</td><td><?= $anak->anak_ibusekolah ?></td></tr>
    <tr><td class="label">6. Pekerjaan Ibu:</td><td><?= $anak->anak_ibukerja ?></td></tr>
    <tr><td class="label">7. Nama Wali (jika ada):</td><td><?= $anak->anak_wali ?></td></tr>
    <tr><td class="label">8. Hubungan dengan anak:</td><td><?= $anak->anak_hubungan ?></td></tr>
    <tr><td class="label">9. Alamat Orang Tua/Wali:</td><td><?= $anak->anak_alamatortu ?></td></tr>
    <tr><td class="label">10. No. HP Orang Tua/Wali:</td><td><?= $anak->anak_hportu ?></td></tr>

    <tr><td colspan="2" class="section-title">C. Kesehatan dan Perkembangan</td></tr>
    <tr><td class="label">1. Golongan Darah:</td><td><?= $anak->anak_darah ?></td></tr>
    <tr><td class="label">2. Berat dan Tinggi saat masuk PAUD:</td><td><?= $anak->anak_berat ?></td></tr>
    <tr><td class="label">3. Riwayat kesehatan:</td><td><?= $anak->anak_rawayat ?></td></tr>
    <tr><td class="label">4. Status imunisasi:</td><td><?= $anak->anak_imunisasi ?></td></tr>
    <tr><td class="label">5. Perkembangan bicara dan motorik:</td><td><?= $anak->anak_bicara ?></td></tr>
    <tr><td class="label">6. Kondisi khusus:</td><td><?= $anak->anak_kondisi ?></td></tr>

    <tr><td colspan="2" class="section-title">D. Data Masuk & Keluar</td></tr>
    <tr><td class="label">1. Tanggal Diterima di PAUD:</td><td><?= $anak->anak_tanggalmasuk ?></td></tr>
    <tr><td class="label">2. Usia saat masuk:</td><td><?= $anak->anak_usiamasuk ?></td></tr>
    <tr><td class="label">3. Asal kelompok bermain:</td><td><?= $anak->anak_kelompok ?></td></tr>
    <tr><td class="label">4. Tanggal Keluar:</td><td><?= $anak->anak_tanggalkeluar ?></td></tr>
    <tr><td class="label">5. Alasan Keluar:</td><td><?= $anak->anak_alasan ?></td></tr>
    <tr><td class="label">6. Melanjutkan ke:</td><td><?= $anak->anak_melanjutkan ?></td></tr>

    <tr><td colspan="2" class="section-title">E. Catatan Khusus</td></tr>
    <tr><td class="label">1. Prestasi / Penghargaan:</td><td><?= $anak->anak_prestasi ?></td></tr>
    <tr><td class="label">2. Perkembangan selama di PAUD:</td><td><?= $anak->anak_perkembangan ?></td></tr>
    <tr><td class="label">3. Catatan guru:</td><td><?= $anak->anak_catatan ?></td></tr>
    <tr><td class="label">4. Foto anak:</td><td>
      <?php if (!empty($anak->anak_foto)): ?>
        <img src="<?= base_url('uploads/foto/' . $anak->anak_foto) ?>" alt="Foto Anak" class="photo">
      <?php else: ?>
        (Tidak ada foto)
      <?php endif; ?>
    </td></tr>
  </table>

</body>
</html>
