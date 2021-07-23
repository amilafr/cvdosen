<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Dosen</h1>

    <form action="/dosen/simpan" method="POST">
        <?= csrf_field(); ?>
        <h6 class="m-0 font-weight-bold text-primary">NIK</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="NIK" autofocus required>
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Name</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="name" required>
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Photo Link</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="foto">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="email" required>
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Department</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="department" required>
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Lecture Expertise</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="lecture_expertise" required>
        </div>
        <h6 class="m-0 font-weight-bold text-primary">SINTA Link</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="link_sinta" required>
        </div>

        <div style="display: flex; justify-content: center;">
            <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambah" style="width: 250px;">
        </div>
    </form>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>