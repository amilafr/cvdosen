<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <form action="/admin/simpan" method="POST">
        <?= csrf_field(); ?>
        <h1 class="h3 mb-4 text-gray-800">Tambah Data Admin</h1>
        <h6 class="m-0 font-weight-bold text-primary">Username</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Password</h6>
        <div class="form-group">
            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="email">
        </div>
        <div style="display: flex; justify-content: center;">
            <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambah" style="width: 250px;">
        </div>
    </form>
</div>

<?= $this->endSection(); ?>