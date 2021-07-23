<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">About</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <form action="/admin/update/<?= $_SESSION['id_admin']; ?>" method="POST">
        <?= csrf_field(); ?>
        <h6 class="m-0 font-weight-bold text-primary">Username</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" value="<?= $admin['username']; ?>" disabled>
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Password</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="password" value="<?= $admin['password']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="email" value="<?= $admin['email']; ?>">
        </div>
        <div style="display: flex; justify-content: center;">
            <input type="submit" class="btn btn-primary btn-user btn-block" value="Update" style="width: 250px;" onclick="return confirm('Apakah anda yakin ingin mengubah data?');">
        </div>
    </form>

</div>

<?= $this->endSection(); ?>