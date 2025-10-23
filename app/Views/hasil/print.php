<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Modul Pembelajaran - Hasil Observasi</title>
  <style>
    /* ======= PAGE LAYOUT ======= */
    @page {
      size: A4;
      margin: 20mm;
    }

    body {
      font-family: "Segoe UI", Arial, sans-serif;
      color: #222;
      font-size: 13.8px;
      line-height: 1.6;
      margin: 0;
      background: #fff;
    }

    /* ======= CONTAINER ======= */
    .page {
      width: 100%;

      box-sizing: border-box;
    }

    /* ======= HEADER ======= */
    .header {
      text-align: center;
      margin-bottom: 25px;
      padding-bottom: 10px;
      border-bottom: 3px solid #007bff;
    }
    .header h2 {
      margin: 0;
      font-size: 26px;
      color: #007bff;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .header p {
      margin-top: 4px;
      font-size: 12px;
      color: #666;
    }

    /* ======= INFORMATION TABLE ======= */
    .info table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .info td {
      padding: 6px 10px;
      vertical-align: top;
    }
    .info td:first-child {
      width: 120px;
    }

    /* ======= SECTION HEADINGS ======= */
    h3 {
      font-size: 17px;
      color: #007bff;
      margin-top: 35px;
      margin-bottom: 10px;
      border-bottom: 2px solid #007bff;
      padding-bottom: 3px;
      display: inline-block;
      text-transform: uppercase;
    }

    /* ======= DATA TABLE ======= */
    table.data {
      width: 100%;
      border-collapse: collapse;
      margin-top: 8px;
      font-size: 13.5px;
      page-break-inside: avoid;
    }
    table.data th, table.data td {
      border: 1px solid #aaa;
      padding: 8px 10px;
      vertical-align: top;
    }
    table.data th {
      background: #f0f5ff;
      font-weight: 600;
    }
    table.data tr:nth-child(even) td {
      background: #fafafa;
    }

    /* ======= ASSESSMENT SECTION ======= */
    .section p {
      text-align: justify;
    }

    /* ======= FOOTER ======= */
    .footer {
      margin-top: 40px;
      text-align: right;
      font-size: 11.5px;
      color: #555;
      border-top: 1px solid #ccc;
      padding-top: 6px;
    }

    /* ======= PAGE BREAK RULES ======= */
    .section {
      page-break-inside: avoid;
      margin-bottom: 20px;
    }
    .page-break {
      page-break-before: always;
    }

    /* ======= PRINT RULES ======= */
    @media print {
      body {
        background: white;
        margin: 0;
      }
      .page {
        box-shadow: none;
        padding: 0 25px;
      }
      .footer {
        page-break-after: avoid;
      }
    }
  </style>
</head>
<body>

  <div class="page">
    <div class="header">
      <h2>Modul Pembelajaran</h2>
      <p><em>Dicetak pada: <?= date('d M Y H:i') ?></em></p>
    </div>

    <div class="info">
      <table>
        <tr>
          <td><b>Guru</b></td>
          <td>: <?= esc($hasil->guru_nama) ?></td>
          <td><b>Kelompok</b></td>
          <td>: <?= esc($hasil->kelompok) ?></td>
        </tr>
        <tr>
          <td><b>Semester</b></td>
          <td>: <?= esc($hasil->semester) ?></td>
          <td><b>Topik</b></td>
          <td>: <?= esc($unit[0]->unit_nama ?? '-') ?></td>
        </tr>
        <tr>
          <td><b>Sub Topik</b></td>
          <td colspan="3">: <?= esc($subunit[0]->subunit_nama ?? '-') ?></td>
        </tr>
      </table>
    </div>

      <div class="info">
     <table class="data" style="width:100%;">
      <tr>
        <th><b>Peta Konsep</b></th>
      </tr>
      <tr>
        <td style="text-align: center;">
          <img src="<?= base_url('uploads/'.$petakonsep[0]->url) ?>" style="max-width: 200px;">
        </td>
      </tr>
    </table>
    </div>

    <div class="section">
      <h3>Nilai & Tujuan</h3>
      <table class="data">
        <tr>
          <th>Kategori</th>
          <th>Tujuan Pembelajaran</th>
        </tr>
        <tr>
          <td>Agama</td>
          <td>
            <?php foreach($agama as $a): ?>
              • <?= $a->tujuan_nama ?><br>
            <?php endforeach; ?>
            <?php foreach($agama2 as $a): ?>
              • <?= $a->tujuan_nama ?><br>
            <?php endforeach; ?>
          </td>
        </tr>
        <tr>
          <td>Jati Diri</td>
          <td>
            <?php foreach($jati as $j): ?>
              • <?= $j->tujuan_nama ?><br>
            <?php endforeach; ?>
            <?php foreach($jati2 as $j): ?>
              • <?= $j->tujuan_nama ?><br>
            <?php endforeach; ?>
          </td>
        </tr>
        <tr>
          <td>Literasi</td>
          <td>
            <?php foreach($literasi as $l): ?>
              • <?= $l->tujuan_nama ?><br>
            <?php endforeach; ?>
            <?php foreach($literasi2 as $l): ?>
              • <?= $l->tujuan_nama ?><br>
            <?php endforeach; ?>
          </td>
        </tr>
      </table>
    </div>

    <div class="section">
      <h3>Rencana Harian</h3>
      <table class="data">
        <tr><th>Kegiatan</th><th>Deskripsi</th></tr>
        <tr><td>Pembiasaan</td><td><?= nl2br(esc($hasil->pembiasaan)) ?></td></tr>
        <tr><td>Pembuka</td><td><?= nl2br(esc($hasil->pembuka)) ?></td></tr>
        <tr><td>Senin</td><td><?= nl2br(esc($hasil->senin)) ?></td></tr>
        <tr><td>Selasa</td><td><?= nl2br(esc($hasil->selasa)) ?></td></tr>
        <tr><td>Rabu</td><td><?= nl2br(esc($hasil->rabu)) ?></td></tr>
        <tr><td>Kamis</td><td><?= nl2br(esc($hasil->kamis)) ?></td></tr>
        <tr><td>Jumat</td><td><?= nl2br(esc($hasil->jumat)) ?></td></tr>
        <tr><td>Istirahat</td><td><?= nl2br(esc($hasil->istirahat)) ?></td></tr>
        <tr><td>Penutup</td><td><?= nl2br(esc($hasil->penutup)) ?></td></tr>
      </table>
    </div>

    <div class="section">
      <h3>Assessment</h3>
      <p><?= nl2br(esc($hasil->assessment)) ?></p>
    </div>

    <div class="footer">
      <p><em>Dibuat pada: <?= esc($hasil->created_at) ?> | Terakhir diubah: <?= esc($hasil->updated_at) ?></em></p>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
