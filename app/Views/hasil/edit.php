<?php 
echo view('./layouts/header.php');
echo view('./layouts/sidebar.php');
?>


<div class="card shadow-sm p-4">
    <h3 class="mb-4">Edit Data Hasil</h3>

    <form action="<?= site_url('Hasil2/update/' . $hasil->hasil_id) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="old_peta_konsep" value="<?= esc($hasil->peta_konsep) ?>">

        <!-- Nama Guru -->
        <div class="mb-3">
            <label for="guru_nama" class="form-label">Nama Guru</label>
            <input type="text" 
                   class="form-control bg-light text-muted" 
                   id="guru_nama" 
                   name="guru_nama" 
                   value="<?= old('guru_nama', esc($hasil->guru_nama)) ?>" 
                   readonly>
        </div>

        <!-- Kelompok -->
        <div class="mb-3">
            <label for="kelompok" class="form-label">Kelompok</label>
            <input type="text" 
                   class="form-control" 
                   id="kelompok" 
                   name="kelompok" 
                   value="<?= old('kelompok', esc($hasil->kelompok)) ?>">
        </div>

        <!-- Peta Konsep -->
        <div class="mb-3">
            <label for="peta_konsep" class="form-label">Peta Konsep</label>
            <input type="file" class="form-control" id="peta_konsep" name="peta_konsep">
            <?php if ($hasil->peta_konsep): ?>
                <small class="text-muted">File sekarang: <?= esc($hasil->peta_konsep) ?></small>
            <?php endif; ?>
        </div>

        <!-- Nilai Agama -->
        <div class="row mb-3">
            <div class="col">
                <label for="nilai_agama_1" class="form-label">Nilai Agama 1</label>
                <select class="form-select" name="nilai_agama_1" id="nilai_agama_1">
                    <option value="">- pilih -</option>
                    <?php foreach ($agama as $a): ?>
                        <option value="<?= $a->tujuan_id ?>"
                            <?= old('nilai_agama_1', $hasil->nilai_agama_1) == $a->tujuan_id ? 'selected' : '' ?>>
                            <?= esc($a->tujuan_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="nilai_agama_2" class="form-label">Nilai Agama 2</label>
                <select class="form-select" name="nilai_agama_2" id="nilai_agama_2">
                    <option value="">- pilih -</option>
                    <?php foreach ($agama as $a): ?>
                        <option value="<?= $a->tujuan_id ?>"
                            <?= old('nilai_agama_2', $hasil->nilai_agama_2) == $a->tujuan_id ? 'selected' : '' ?>>
                            <?= esc($a->tujuan_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Jati Diri -->
        <div class="row mb-3">
            <div class="col">
                <label for="jati_diri_1" class="form-label">Jati Diri 1</label>
                <select class="form-select" name="jati_diri_1" id="jati_diri_1">
                    <option value="">- pilih -</option>
                    <?php foreach ($jati as $j): ?>
                        <option value="<?= $j->tujuan_id ?>"
                            <?= old('jati_diri_1', $hasil->jati_diri_1) == $j->tujuan_id ? 'selected' : '' ?>>
                            <?= esc($j->tujuan_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="jati_diri_2" class="form-label">Jati Diri 2</label>
                <select class="form-select" name="jati_diri_2" id="jati_diri_2">
                    <option value="">- pilih -</option>
                    <?php foreach ($jati as $j): ?>
                        <option value="<?= $j->tujuan_id ?>"
                            <?= old('jati_diri_2', $hasil->jati_diri_2) == $j->tujuan_id ? 'selected' : '' ?>>
                            <?= esc($j->tujuan_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Literasi -->
        <div class="row mb-3">
            <div class="col">
                <label for="literasi_1" class="form-label">Literasi 1</label>
                <select class="form-select" name="literasi_1" id="literasi_1">
                    <option value="">- pilih -</option>
                    <?php foreach ($literasi as $l): ?>
                        <option value="<?= $l->tujuan_id ?>"
                            <?= old('literasi_1', $hasil->literasi_1) == $l->tujuan_id ? 'selected' : '' ?>>
                            <?= esc($l->tujuan_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="literasi_2" class="form-label">Literasi 2</label>
                <select class="form-select" name="literasi_2" id="literasi_2">
                    <option value="">- pilih -</option>
                    <?php foreach ($literasi as $l): ?>
                        <option value="<?= $l->tujuan_id ?>"
                            <?= old('literasi_2', $hasil->literasi_2) == $l->tujuan_id ? 'selected' : '' ?>>
                            <?= esc($l->tujuan_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Alat dan Bahan -->
        <div class="mb-3">
            <label for="alat_bahan" class="form-label">Alat dan Bahan</label>
            <textarea class="form-control" name="alat_bahan" id="alat_bahan"><?= old('alat_bahan', esc($hasil->alat_bahan)) ?></textarea>
        </div>

        <!-- Semester -->
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select class="form-select" name="semester" id="semester">
                <option value="1" <?= old('semester', $hasil->semester) == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?= old('semester', $hasil->semester) == 2 ? 'selected' : '' ?>>2</option>
            </select>
        </div>

        <!-- Topik dan Subtopik -->
        <div class="row mb-3">
            <div class="col">
                <label for="topik" class="form-label">Topik</label>
                <select class="form-select" name="topik" id="topik">
                    <option value="">- pilih -</option>
                    <?php foreach ($topik as $t): ?>
                        <option value="<?= $t->unit_id ?>"
                            <?= old('topik', $hasil->topik) == $t->unit_id ? 'selected' : '' ?>>
                            <?= esc($t->unit_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="subtopik" class="form-label">Sub Topik</label>
                <select class="form-select" name="subtopik" id="subtopik">
                    <option value="">- pilih -</option>
                    <?php foreach ($subtopik as $s): ?>
                        <option value="<?= $s->subunit_id ?>"
                            <?= old('subtopik', $hasil->subtopik) == $s->subunit_id ? 'selected' : '' ?>>
                            <?= esc($s->subunit_nama) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Pembiasaan -->
        <div class="mb-3">
            <label for="pembiasaan" class="form-label">Pembiasaan Pagi</label>
            <textarea class="form-control" name="pembiasaan" id="pembiasaan"><?= old('pembiasaan', esc($hasil->pembiasaan)) ?></textarea>
        </div>

        <!-- Pembuka -->
        <div class="mb-3">
            <label for="pembuka" class="form-label">Pembuka</label>
            <textarea class="form-control" name="pembuka" id="pembuka"><?= old('pembuka', esc($hasil->pembuka)) ?></textarea>
        </div>

        <!-- Jadwal Harian -->
        <?php foreach (['senin','selasa','rabu','kamis','jumat','istirahat'] as $hari): ?>
            <div class="mb-3">
                <label for="<?= $hari ?>" class="form-label"><?= ucfirst($hari) ?></label>
                <textarea class="form-control" name="<?= $hari ?>" id="<?= $hari ?>"><?= old($hari, esc($hasil->$hari)) ?></textarea>
            </div>
        <?php endforeach; ?>

        <!-- Penutup -->
        <div class="mb-3">
            <label for="penutup" class="form-label">Penutup</label>
            <textarea class="form-control" name="penutup" id="penutup"><?= old('penutup', esc($hasil->penutup)) ?></textarea>
        </div>

        <!-- Assessment -->
        <div class="mb-3">
            <label for="assessment" class="form-label">Assessment</label>
            <textarea class="form-control" name="assessment" id="assessment"><?= old('assessment', esc($hasil->assessment)) ?></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= site_url('hasil') ?>" class="btn btn-danger">Batal</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>

<?php 
echo view('layouts/footer.php');
?>
