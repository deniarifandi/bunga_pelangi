<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Penilaian - <?= esc($aktifitas->aktifitas_nama) ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 20px;
    }
    h2, h3 {
      text-align: center;
      margin: 0;
    }
    h3 {
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #444;
      padding: 6px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    td.name {
      text-align: left;
    }
    .no-print {
      text-align: right;
      margin-bottom: 15px;
    }
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="no-print">
    <button onclick="window.print()">🖨️ Print</button>
    <a href="<?= base_url('Penilaian/edit_nilai/' . $aktifitas->aktifitas_id) ?>" class="btn">⬅️ Back</a>
  </div>

  <h2>Rekap Nilai Aktivitas</h2>
  <h3><?= esc($aktifitas->aktifitas_nama) ?></h3>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Hasil</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; foreach ($data as $row): ?>
        <tr>
          <td><?= $i++ ?></td>
          <td class="name"><?= esc($row->murid_nama) ?></td>
          <td><?= esc($row->hasil_id) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <br><br>
  <div style="text-align:right; margin-top:40px;">
    <p>Malang, <?= date('d F Y') ?></p>
    <p><strong>Guru Penilai</strong></p>
    <br><br><br>
    <p>(...................................)</p>
  </div>
</body>
</html>
