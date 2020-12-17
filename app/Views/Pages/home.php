<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h2>Home</h2>
      <?php d($id) ?>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
