<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Data Dosen</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <td><a class="btn btn-info" href="/dosen/tambah"><i class="fas fa-plus"></i>Tambah Data</a></td>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>NIK</th>
                            <th>Name</th>
                            <th>Departement</th>
                            <!-- <th>Email</th>
                            <th>Lecture Expertise</th>
                            <th>Link SINTA</th> -->
                            <th>Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dosen as $d) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= $d['foto']; ?>" alt="" class="foto"></td>
                                <td><?= $d['NIK']; ?></td>
                                <td><?= $d['name']; ?></td>
                                <td><?= $d['department']; ?></td>
                                <!-- <td><?= $d['email']; ?></td>
                                <td><?= $d['lecture_expertise']; ?></td>
                                <td><a href="<?= $d['link_sinta']; ?>"><?= $d['link_sinta']; ?></a></td> -->
                                <td>
                                    <a class="btn btn-info" href="/dosen/<?= $d['id_dosen']; ?>"><i class="fas fa-eye"></i></a>
                                    <!-- <a class="btn btn-success" href=""><i class="fas fa-edit"></i></a> -->
                                    <form action="/dosen/<?= $d['id_dosen']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus dosen ini?');"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <!-- <a class="btn btn-danger" href="/dosen/hapus/<?= $d['id_dosen']; ?>"><i class="fas fa-trash-alt"></i></a> -->
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