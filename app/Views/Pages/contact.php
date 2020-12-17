<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2>Contact</h2>
      
        <?php foreach ($alamat as $data): ?>
          
          <ul>
            <li><?= $data['tipe']; ?></li>
            <li><?= $data['alamat']; ?></li>
            <li><?= $data['kota']; ?></li>
          </ul>

        <?php endforeach; ?>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>