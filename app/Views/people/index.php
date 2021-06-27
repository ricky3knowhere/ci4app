<?= $this -> extend('layout/template'); ?>

<?= $this -> section('content'); ?>

<div class="container">
  <h2 class="mt-2">People List</h2>

  <div class="row">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="form-control"
          placeholder="Search name or adreess here...."
          name="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-light" type="submit">
              <i class="fa fa-search"></i>
              Search
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          
          ?>
          <?php foreach ($people as $person): ?>
          <tr>
            <th scope="row"><?= $currentPage++; ?></th>
            <td><?= $person['name']; ?></td>
            <td><?= $person['address']; ?></td>
            <td>
              <a href="/people/<?= $person['id']; ?>" class="btn btn-success">Details</a>
            </td>
          </tr>

          <?php endforeach; ?>
        </tbody>
      </table>
      <?= $pager->links('people', 'people_pagination'); ?>
    </div>
  </div>
</div>

<?= $this -> endSection(); ?>