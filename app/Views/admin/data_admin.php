<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Data Admin</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <td><a class="btn btn-info" href="/admin/tambah"><i class="fas fa-plus"></i>Tambah Admin</a></td>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Tombol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($admin as $a) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $a['username']; ?></td>
                                <td><?= $a['password']; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td>
                                    <!-- <a class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-success" href="edit_data.php"><i class="fas fa-edit"></i></a> -->
                                    <!-- <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> -->
                                    <form action="/admin/<?= $a['id_admin']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus admin ini?');"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>