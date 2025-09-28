<?php 
echo view('layouts/header.php');
echo view('layouts/sidebar.php');
?>

<!--begin::App Main-->
<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0"><?= esc($title) ?></h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc($title) ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="app-content">
    <div class="container-fluid">
      <div class="row">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add <?= esc($title) ?></h3>
          </div>

          <div class="card-body">
            <?php if (session('errors')) : ?>
              <div style="color:red;">
                <ul>
                  <?php foreach (session('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <form action="<?= site_url($table) ?>" method="post" enctype="multipart/form-data">
              <?= csrf_field() ?>

              <?php for ($i = 0; $i < count($field); $i++): ?>
              <?php
                $type    = $field[$i][0];
                $name    = $field[$i][1];
                $options = $fieldOption[$i] ?? null;

                // Default value
                if (is_array($options)) {
                    // if it's an array of arrays (like select/radio)
                    $firstOption = reset($options);
                    $value = is_array($firstOption) ? $firstOption[0] : $firstOption;
                } else {
                    // if it's a simple string (like "test")
                    $value = $options ?? '';
                }

                $oldValue   = old($name);
                $finalValue = !empty($oldValue) ? $oldValue : $value;
              ?>


                <div class="row mb-3">
                  <label for="<?= esc($name) ?>" class="col-sm-2 col-form-label"><?= esc($fieldName[$i]) ?></label>
                  <div class="col-sm-10">

                    <?php if (in_array($type, ['text', 'date', 'file', 'email'])): ?>
                      <input 
                        type="<?= esc($type) ?>" 
                        class="form-control" 
                        id="<?= esc($name) ?>" 
                        name="<?= esc($name) ?>" 
                        value="<?= esc($finalValue) ?>" 
                      />

                    <?php elseif ($type === 'readonly'): ?>
                      <input 
                          type="text" 
                          class="form-control bg-light text-muted" 
                          id="<?= esc($name) ?>" 
                          name="<?= esc($name) ?>" 
                          value="<?= esc($finalValue) ?>" 
                          readonly
                      />

                    <?php elseif ($type === 'password'): ?>
                      <input 
                        type="password" 
                        class="form-control" 
                        id="<?= esc($name) ?>" 
                        name="<?= esc($name) ?>" 
                      />

                    <?php elseif ($type === 'select'): ?>
                      <select class="form-control" id="<?= esc($name) ?>" name="<?= esc($name) ?>">
                        <option value="">-Select-</option>
                        <?php foreach ($options as $option): ?>
                          <option value="<?= esc($option[0]) ?>" 
                            <?= ($finalValue === $option[0]) ? 'selected' : '' ?>>
                            <?= esc($option[1]) ?>
                          </option>
                        <?php endforeach; ?>
                      </select>

                    <?php elseif ($type === 'radio'): ?>
                      <div class="row">
                        <?php foreach ($options as $option): ?>
                          <div class="form-check col-sm-4 mt-4">
                            <input 
                              class="form-check-input" 
                              type="radio" 
                              name="<?= esc($name) ?>" 
                              id="<?= esc($name . '_' . $option[0]) ?>" 
                              value="<?= esc($option[0]) ?>" 
                              <?= ($finalValue === $option[0]) ? 'checked' : '' ?>
                            >
                            <label class="form-check-label" for="<?= esc($name . '_' . $option[0]) ?>">
                              <?= esc($option[1]) ?><br>
                              <img src="<?= base_url('uploads/' . $option[2]) ?>" style="max-width: 150px;">
                            </label>
                          </div>
                        <?php endforeach; ?>
                      </div>

                    <?php elseif ($type === 'textarea'): ?>
                      <textarea 
                        class="form-control" 
                        id="<?= esc($name) ?>" 
                        name="<?= esc($name) ?>"
                      ><?= esc($finalValue) ?></textarea>
                    <?php endif; ?>

                  </div>
                </div>
              <?php endfor; ?>

              <a href="<?= site_url($table) ?>" class="btn btn-danger">Cancel</a>
              <button type="submit" class="btn btn-success float-end">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

<?php 
echo view('layouts/footer.php');
?>
