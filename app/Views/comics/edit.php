<?= $this ->extend('layout/template'); ?>

<?= $this ->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2 class="my-3">Edit Comic Form</h2>
      <form action="/comics/update/<?= $comic['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <input type="hidden" name="slug" value="<?= $comic['slug']; ?>">
        <input type="hidden" name="old_cover" value="<?= $comic['cover']; ?>">

        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation ->hasError('title')) ? 'is-invalid' : ''; ?>"
            id="title" name="title" autofocus value="<?= (old('title')) ? old('title') : $comic['title']; ?>">
            <div class="invalid-feedback">
              <?= $validation ->getError('title'); ?>
            </div>
          </div>

        </div>

        <div class="form-group row">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="author" name="author" value="<?= (old('author')) ? old('author') : $comic['author']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="publisher" name="publisher" value="<?= (old('publisher')) ? old('publisher') : $comic['publisher']; ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="cover" class="col-sm-2 col-form-label">Cover</label>
          <div class="col-sm-3">
            <img src="/img/<?= $comic['cover']; ?>" alt="<?= $comic['cover']; ?>" class="img-thumbnail picture" width="200px">
          </div>
          <div class="col-sm-7">
            <div class="custom-file">
              <input type="file" class="custom-file-input <?= ($validation ->hasError('cover')) ? 'is-invalid' : ''; ?>"
              id="cover" name="cover" onchange="cover_preview()">

              <div class="invalid-feedback">
                <?= $validation ->getError('cover'); ?>
              </div>
              <label class="custom-file-label" for="cover"><?= $comic['cover']; ?></label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Edit Data</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?= $this ->endSection(); ?>