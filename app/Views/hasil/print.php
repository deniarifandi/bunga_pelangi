<!DOCTYPE html>
<html>
<head>
    <title>Hasil Observasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info table {
            width: 100%;
            border-collapse: collapse;
        }
        .info td {
            padding: 6px 10px;
        }
        h3 {
            margin-top: 30px;
            margin-bottom: 10px;
            font-size: 18px;
            border-bottom: 2px solid #555;
            display: inline-block;
        }
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.data th, table.data td {
            border: 1px solid #999;
            padding: 8px 10px;
            font-size: 14px;
        }
        table.data th {
            background: #f2f2f2;
            text-align: left;
        }
        .section {
            margin-bottom: 30px;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 12px;
            color: #555;
        }
        .highlight {
            background: #eef;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Hasil Observasi Kegiatan</h2>
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

<div class="section">
    <h3>Nilai & Tujuan</h3>
    <table class="data">
        <tr>
            <th>Kategori</th>
            <th>Pilihan</th>
        </tr>
        <tr>
            <td>Agama</td>
            <td>
                <?php foreach($agama as $a): ?>
                    <?= $a->tujuan_nama ?> <br>
                <?php endforeach; ?>
                 <?php foreach($agama2 as $a): ?>
                    <?= $a->tujuan_nama ?> <br>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td>Jati Diri</td>
            <td>
                <?php foreach($jati as $j): ?>
                    <?= $j->tujuan_nama ?> <br>
                <?php endforeach; ?>
                <?php foreach($jati2 as $j): ?>
                    <?= $j->tujuan_nama ?> <br>
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td>Literasi</td>
            <td>
                <?php foreach($literasi as $l): ?>
                    <?= $l->tujuan_nama ?> <br>
                <?php endforeach; ?>
                  <?php foreach($literasi2 as $l): ?>
                    <?= $l->tujuan_nama ?> <br>
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
    <p><?= esc($hasil->assessment) ?></p>
</div>

<div class="footer">
    <p><em>Dibuat pada: <?= esc($hasil->created_at) ?> | Terakhir diubah: <?= esc($hasil->updated_at) ?></em></p>
</div>

<script>
    window.print();
</script>

</body>
</html>
