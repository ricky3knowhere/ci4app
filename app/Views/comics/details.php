<?= $this ->extend('layout/template'); ?>

<?= $this ->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2 class="mt-2">Comic Details</h2>

      <div class="card mb-3" style="max-width: 540px">
        <div class="row no-gutter">
          <div class="col-md-4">
            <img class="card-img" src="/img/<?= $comic['cover']; ?>" alt="Card image cap">
          </div>

          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $comic['title']; ?></h5>
              <p class="card-text">
                <b>Author : </b><?= $comic['author']; ?>
              </p>
              <p class="card-text">
                <small class="text-muted"><b>Publisher : </b><?= $comic['publisher']; ?></small>
              </p>

              <a href="/comics/edit/<?= $comic['slug']; ?>" class="btn btn-warning">Edit</a>
             
              <form action="/comics/delete/<?= $comic['id']; ?>" method="post" class="d-inline">
               <?= csrf_field(); ?>
               
                <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('Delete data?')">Delete</button>
              </form>
             
             
             <br><br>
              <a href="/comics">Back to Comics List</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this ->endSection(); ?>