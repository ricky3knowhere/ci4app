<?= $this -> extend('layout/template'); ?>

<?= $this -> section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <a href="/comics/create" class="btn btn-primary mt-3">Add Comic</a>
      <h2 class="mt-2">Comics List</h2>
    
      <?php if (session() ->getFlashData('notif')): ?>

        <div class="alert alert-success" role="alert">
          <?= session() ->getFlashData('notif'); ?>
        </div>
   
      <?php endif; ?>
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cover</th>
            <th scope="col">Title</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $i = 1; ?>
          <?php foreach ($comics as $comic): ?>
          <!-- html... -->
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td>
              <img src="/img/<?= $comic['cover']; ?>" alt="cover" class="cover">
            </td>
            <td><?= $comic['title']; ?></td>
            <td>
              <a href="/comics/<?= $comic['slug']; ?>" class="btn btn-success">Details</a>
            </td>
          </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this -> endSection(); ?>