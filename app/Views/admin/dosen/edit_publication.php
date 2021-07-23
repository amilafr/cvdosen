<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Edit Publication</h1>
    <form action="/dosen/update_publication/<?= $publikasi['id_publication']; ?>/<?= $publikasi['id_dosen']; ?>" method="POST">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $publikasi['id_publication']; ?>">

        <h6 class="m-0 font-weight-bold text-primary">Title</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="title" value="<?= $publikasi['title']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Link Publication</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="link" value="<?= $publikasi['link']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Authors</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="authors" value="<?= $publikasi['authors']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Publish At</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="publish_at" value="<?= $publikasi['publish_at']; ?>">
        </div>
    
        <!-- <input type="submit" class="btn btn-primary btn-user btn-block btn-warning" value="Update" style="width: 200px; color:black;"> -->

        <button type="submit" class="btn btn-primary btn-user btn-block btn-warning" onclick="return confirm('Apakah anda yakin ingin mengubah data?');" style="width: 200px; color:black;">Update</button>
    </form>

</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>