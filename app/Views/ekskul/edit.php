<h2>Edit Data Ekskul</h2>

<form action="/ekskul/update/<?= $ekskul['id']; ?>" method="post">

    <label>Murid</label>
    <select name="murid_id">
        <?php foreach ($murid as $m): ?>
            <option value="<?= $m['id']; ?>" 
                <?= $m['id'] == $ekskul['murid_id'] ? 'selected' : '' ?>>
                <?= $m['nama']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Ekskul 1</label>
    <input type="text" name="ekskul1" value="<?= $ekskul['ekskul1']; ?>">

    <label>Nilai 1</label>
    <input type="text" name="nilai1" value="<?= $ekskul['nilai1']; ?>">

    <br><br>

    <label>Ekskul 2</label>
    <input type="text" name="ekskul2" value="<?= $ekskul['ekskul2']; ?>">

    <label>Nilai 2</label>
    <input type="text" name="nilai2" value="<?= $ekskul['nilai2']; ?>">

    <br><br>

    <label>Deskripsi 1</label>
    <textarea name="deskripsi1"><?= $ekskul['deskripsi1']; ?></textarea>

    <label>Deskripsi 2</label>
    <textarea name="deskripsi2"><?= $ekskul['deskripsi2']; ?></textarea>

    <br><br>

    <button type="submit">Update</button>

</form>
