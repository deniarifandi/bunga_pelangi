<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Modul Pembelajaran</title>

  <style>
    /* ===== PAGE ===== */
    @page {
      size: A4;
      margin: 22mm;
    }

    body {
      font-family: "Segoe UI", Arial, sans-serif;
      font-size: 13.5px;
      color: #222;
      line-height: 1.6;
      margin: 0;
      background: #fff;
    }

    /* ===== HEADINGS ===== */
    h1 {
      font-size: 22px;
      text-align: center;
      margin: 0;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    h2 {
      font-size: 15px;
      margin: 30px 0 10px;
      padding-bottom: 4px;
      border-bottom: 2px solid #333;
      text-transform: uppercase;
    }

    /* ===== HEADER ===== */
    .doc-header {
      text-align: center;
      margin-bottom: 25px;
    }

    .doc-header small {
      display: block;
      font-size: 11px;
      color: #666;
      margin-top: 4px;
    }

    /* ===== INFO TABLE ===== */
    .info {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      font-size: 13px;
    }

    .info td {
      padding: 4px 6px;
      vertical-align: top;
    }

    .info td.label {
      width: 140px;
      font-weight: 600;
      color: #333;
    }

    /* ===== DATA TABLE ===== */
    table.data {
      width: 100%;
      border-collapse: collapse;
      margin-top: 8px;
      font-size: 13px;
    }

    table.data th,
    table.data td {
      border: 1px solid #bbb;
      padding: 8px 10px;
      vertical-align: top;
    }

    table.data th {
      background: #f4f6f8;
      font-weight: 600;
      text-align: left;
    }

    /* ===== LIST ===== */
    ol {
      margin: 0;
      padding-left: 18px;
    }

    /* ===== IMAGE ===== */
    .image-box {
      border: 1px solid #bbb;
      padding: 10px;
      text-align: center;
    }

    .image-box img {
      max-width: 240px;
    }

    /* ===== FOOTER ===== */
    .footer {
      margin-top: 40px;
      font-size: 11px;
      color: #555;
      text-align: right;
      border-top: 1px solid #ccc;
      padding-top: 6px;
    }

    /* ===== PRINT ===== */
    @media print {
      body { background: #fff; }
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <div class="doc-header">
    <h1>Modul Pembelajaran</h1>
    <small>Dicetak pada <?= date('d M Y H:i') ?></small>
  </div>

  <!-- INFO -->
  <table class="info">
    <tr>
      <td class="label">Guru</td>
      <td>: <?= esc($hasil->guru_nama) ?></td>
      <td class="label">Kelompok</td>
      <td>: <?= esc($hasil->kelompok) ?></td>
    </tr>
    <tr>
      <td class="label">Semester</td>
      <td>: <?= esc($hasil->semester) ?></td>
      <td class="label">Topik</td>
      <td>: <?= esc($hasil->unit_nama ?? '-') ?></td>
    </tr>
    <tr>
      <td class="label">Sub Topik</td>
      <td colspan="3">: <?= esc($hasil->subunit_nama ?? '-') ?></td>
    </tr>
  </table>

  <!-- PETA KONSEP -->
  <h2>Peta Konsep</h2>
  <div class="image-box">
    <?php if (!empty($petakonsep) && !empty($petakonsep[0]->url)): ?>
      <img src="<?= base_url('uploads/'.$petakonsep[0]->url) ?>">
    <?php else: ?>
      <em>Tidak ada peta konsep</em>
    <?php endif; ?>
  </div>

  <!-- NILAI & TUJUAN -->
  <h2>Nilai & Tujuan Pembelajaran</h2>
  <table class="data">
    <tr>
      <th width="180">Kategori</th>
      <th>Tujuan</th>
    </tr>
    <tr>
      <td>Agama</td>
      <td>
        <?php foreach ($agama as $a): ?>• <?= esc($a->tujuan_nama) ?><br><?php endforeach; ?>
        <?php foreach ($agama2 as $a): ?>• <?= esc($a->tujuan_nama) ?><br><?php endforeach; ?>
      </td>
    </tr>
    <tr>
      <td>Jati Diri</td>
      <td>
        <?php foreach ($jati as $j): ?>• <?= esc($j->tujuan_nama) ?><br><?php endforeach; ?>
        <?php foreach ($jati2 as $j): ?>• <?= esc($j->tujuan_nama) ?><br><?php endforeach; ?>
      </td>
    </tr>
    <tr>
      <td>Literasi</td>
      <td>
        <?php foreach ($literasi as $l): ?>• <?= esc($l->tujuan_nama) ?><br><?php endforeach; ?>
        <?php foreach ($literasi2 as $l): ?>• <?= esc($l->tujuan_nama) ?><br><?php endforeach; ?>
      </td>
    </tr>
  </table>

  <!-- RENCANA HARIAN -->
  <h2>Rencana Harian</h2>
  <table class="data">
    <tr>
      <th width="180">Kegiatan</th>
      <th>Deskripsi</th>
    </tr>

    <tr><td>Pembiasaan</td><td><?= nl2br(esc($hasil->pembiasaan)) ?></td></tr>
    <tr><td>Pembuka</td><td><?= nl2br(esc($hasil->pembuka)) ?></td></tr>

    <?php
    $hariLabel = [
      'senin'  => 'Senin',
      'selasa' => 'Selasa',
      'rabu'   => 'Rabu',
      'kamis'  => 'Kamis',
      'jumat'  => 'Jumat',
    ];
    foreach ($hariLabel as $key => $label):
    ?>
      <tr>
        <td><?= $label ?></td>
        <td>
          <ol>
            <?php foreach ($kegiatan[$key] as $item): ?>
              <li><?= esc($item) ?></li>
            <?php endforeach; ?>
          </ol>
        </td>
      </tr>
    <?php endforeach; ?>

    <tr><td>Istirahat</td><td><?= nl2br(esc($hasil->istirahat)) ?></td></tr>
    <tr><td>Penutup</td><td><?= nl2br(esc($hasil->penutup)) ?></td></tr>
  </table>

  <!-- ASSESSMENT -->
  <h2>Assessment</h2>
  <p><?= nl2br(esc($hasil->assessment)) ?></p>

  <!-- FOOTER -->
  <div class="footer">
    Dibuat: <?= esc($hasil->created_at) ?> |
    Diperbarui: <?= esc($hasil->updated_at) ?>
  </div>

  <script>
    window.print();
  </script>

</body>
</html>
