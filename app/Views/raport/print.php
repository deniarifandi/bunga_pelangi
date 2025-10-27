<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Raport Siswa</title>
<style>
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        color: #333;
        background: #fff;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .header img {
        height: 60px;
        display: block;
        margin: 0 auto 10px;
    }
    .header h1 {
        margin: 0;
        font-size: 24px;
    }
    .header h4 {
        margin: 5px 0 0 0;
        font-weight: normal;
        color: #555;
    }

    .box {
        border: 1px solid #444;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }
    .box h3 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 18px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }
    .box .content {
        font-size: 15px;
        line-height: 1.4;
    }

    .images-row {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 10px 0;
    }
    .images-row img {
        max-width: 120px;
        max-height: 100px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .table-box {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
    }
    .table-box th, .table-box td {
        border: 1px solid #444;
        padding: 6px 10px;
        text-align: left;
    }
    .table-box th {
        background: #f0f0f0;
    }

    .signatures {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }
    .signatures div {
        text-align: center;
        font-size: 16px;
    }
    .signatures .line {
        margin-top: 60px;
        border-top: 1px solid #000;
        width: 180px;
        margin-left: auto;
        margin-right: auto;
    }

    @media print {
        body { background: #fff; }
        .container { border: none; }
        button { display: none; }
    }

    .btn-print {
        margin: 20px 0;
        display: inline-block;
        padding: 10px 15px;
        background: #444;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        cursor: pointer;
    }
</style>
<style>
/* Container for images in 3 columns */
.images-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 columns */
    gap: 10px;
    justify-items: center; /* center-align images horizontally */
    margin: 10px 0;
}

/* Style images */
.images-row img {
    max-width: 100%;
    max-height: 120px;
    object-fit: cover;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Divider line between sections */
.section-divider {
    border-top: 2px solid #007BFF; /* blue line for professional look */
    margin: 20px 0;
}
.section-title {
    font-weight: bold;
    color: #007BFF;
    margin-top: 20px;
    margin-bottom: 10px;
}
</style>

<style>
body::before {
    content: "";
    position: fixed;
    top: 50%;
    left: 50%;
    width: 70%;
    height: auto;
    aspect-ratio: 1 / 1; /* keep it square */
    background: url('<?= base_url("assets/img/bg aba.png") ?>') no-repeat center center;
    background-size: contain;
    opacity: 0.3; /* watermark transparency */
    transform: translate(-50%, -50%);
    z-index: -1;
}

/* Make sure it prints too */
@media print {
    body::before {
        background: url('<?= base_url("assets/img/bg aba.png") ?>') no-repeat center center;
        background-size: contain;
        opacity: 0.3;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}
</style>



</head>
<body>

<div class="container">
    <div class="header" style="text-align:center; margin-bottom:20px;">
    <div style="display:flex; align-items:center; justify-content:center; gap:15px;">
      
        <div>
            <h1 style="margin:0; font-size:24px;">Aisyiyah Bustanul Athfal</h1>
            <h4 style="margin:0; font-size:16px;">Raport Siswa</h4>
        </div>
    </div>

    <hr style="border:2px solid #000; margin:10px 0;">

    <div>
        <strong>KB AISYIYAH PURWOSARI</strong><br>
        <strong>LAPORAN CAPAIAN HASIL BELAJAR</strong><br>
        <strong>SEMESTER <?= esc($raport->raport_semester) ?> TAHUN PELAJARAN <?= esc($raport->raport_tahun) ?></strong>
    </div>

    <hr style="border:2px solid #000; margin:10px 0;">
</div>


    <div class="box">
    <h3>Data Siswa</h3>
    <table border="1" cellspacing="0" cellpadding="6" style="width:100%; border-collapse: collapse;">
        <tr>
            <th style="text-align:left; width:30%; background-color:white">Nama</th>
            <td style="background-color:white"><?= esc($murid->murid_nama) ?></td>
        </tr>
        <tr>
            <th style="text-align:left; background-color:white">ID</th>
            <td style="background-color:white"> <?= esc($murid->murid_id) ?></td>
        </tr>
        <tr>
            <th style="text-align:left; ; background-color:white">Semester</th>
            <td style="background-color:white"><?= esc($raport->raport_semester) ?></td>
        </tr>
        <tr>
            <th style="text-align:left; ; background-color:white">Tahun Ajaran</th>
            <td style="background-color:white"><?= esc($raport->raport_tahun) ?></td>
        </tr>
    </table>
</div>


    <div class="box">
        <h3>📏 Kehadiran & Kesehatan</h3>
        <table class="table-box">
            <tr>
                <th>Tinggi (cm)</th><td style="background-color:white"><?= esc($raport->tinggi) ?></td>
                <th>Berat (kg)</th><td style="background-color:white"><?= esc($raport->berat) ?></td>
            </tr>
            <tr>
                <th>Lingkar Kepala (cm)</th><td style="background-color:white"><?= esc($raport->kepala) ?></td>
                <th>Sakit (hari)</th><td style="background-color:white"><?= esc($raport->sakit) ?></td>
            </tr>
            <tr>
                <th>Ijin (hari)</th><td style="background-color:white"><?= esc($raport->ijin) ?></td>
                <th>Alpha (hari)</th><td style="background-color:white"><?= esc($raport->alpha) ?></td>
            </tr>
        </table>
    </div>

    <div class="box">
        <h3>🎯 Ekstrakurikuler</h3>
        <table class="table-box">
            <tr>
                <th>Hari</th><td style="background-color:white"><?= esc($raport->ekskulhari) ?></td>
                <th>Jenis</th><td style="background-color:white"><?= esc($raport->ekskuljenis) ?></td>
                <th>Nilai</th><td style="background-color:white"><?= esc($raport->ekskulnilai) ?></td>
            </tr>
        </table>
    </div>

    <div class="box">
        <h3>Perkembangan Siswa</h3>
        <div class="content" style="background-color:white"><?= nl2br(esc($raport->perkembangan)) ?></div>
    </div>

    <div style="page-break-before: always;"></div>

    <div class="box">
        
      <h3>Nilai Agama dan Budi Pekerti</h3>
<table border="1" cellspacing="0" cellpadding="6" style="width:100%; border-collapse: collapse; text-align:center; background-color:white">
    <tr>
        <?php for ($i=1; $i<=3; $i++): 
            $img = $raport->{'img'.$i} ?? null;
        ?>
        <td style="width:33%;">
            <?php if ($img): ?>
                <img src="<?= base_url('uploads/raport/'.$img) ?>" alt="img<?= $i ?>" style="max-width:100%; max-height:150px; display:block; margin:auto;">
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </td>
        <?php endfor; ?>
    </tr>
</table>

<!-- Keterangan -->
<table border="1" cellspacing="0" cellpadding="6" style="width:100%; border-collapse: collapse;  background-color:white">
    <tr>
        <td><?= esc($raport->ketagama ?? '-') ?></td>
    </tr>
</table>

<div class="section-divider"></div>
    </div>

    <div class="box">
       <div class="section-title">B. Jati Diri</div>
<div class="images-row">
    <?php for ($i=4; $i<=6; $i++):
        $img = $raport->{'img'.$i} ?? null;
        if ($img): ?>
            <img src="<?= base_url('uploads/raport/'.$img) ?>" alt="img<?= $i ?>">
    <?php endif; endfor; ?>
</div>
<p style="background-color:white"><?= esc($raport->ketjati ?? '') ?></p>
<div class="section-divider"></div>
    </div>

    <div class="box">
      <div class="section-title">C. Literasi</div>
<div class="images-row">
    <?php for ($i=7; $i<=9; $i++):
        $img = $raport->{'img'.$i} ?? null;
        if ($img): ?>
            <img src="<?= base_url('uploads/raport/'.$img) ?>" alt="img<?= $i ?>">
    <?php endif; endfor; ?>
</div>
<p style="background-color:white"><?= esc($raport->ketliterasi ?? '') ?></p>
<div class="section-divider"></div>
    </div>

    

    <div class="signatures">
        <div>
            Guru Wali
            <div class="line"></div>
        </div>
        <div>
            Kepala Sekolah
            <div class="line"></div>
        </div>
    </div>

</div>

</body>
</html>
