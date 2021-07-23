<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <h1 class="h3 mb-4 text-gray-800">Edit Data Dosen</h1>
    <form action="/dosen/update/<?= $dosen['id_dosen']; ?>" method="POST">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $dosen['id_dosen']; ?>">
        <div class="form-group">
            <img src="<?= $dosen['foto']; ?>" alt="" class="foto2">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">NIK</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="NIK" value="<?= $dosen['NIK']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Name</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="name" value="<?= $dosen['name']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Photo Link</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="foto" value="<?= $dosen['foto']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Email</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="email" value="<?= $dosen['email']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Department</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="department" value="<?= $dosen['department']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">Lecture Expertise</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="lecture_expertise" value="<?= $dosen['lecture_expertise']; ?>">
        </div>
        <h6 class="m-0 font-weight-bold text-primary">SINTA Link</h6>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="link_sinta" value="<?= $dosen['link_sinta']; ?>">
        </div>

        <!-- <input type="submit" class="btn btn-primary btn-user btn-block btn-warning" value="Update" style="width: 200px; color:black;"> -->

        <button type="submit" class="btn btn-primary btn-user btn-block btn-warning" onclick="return confirm('Apakah anda yakin ingin mengubah data?');" style="width: 200px; color:black;">Update</button>
    </form>

    <br>
    <hr>
    <br>

    <h2 class="m-0 font-weight-bold text-primary">Publication</h2> <br>

    <form class="form-inline" action="/dosen/tambah_publication/<?= $dosen['id_dosen']; ?>" method="POST">
        <label for="inputTitle" class="sr-only">Title</label>
        <input type="text" class="form-control mb-2 mr-sm-2" name="title" id="inputTitle" placeholder="Title">

        <label for="inputLink" class="sr-only">Link</label>
        <input type="text" class="form-control mb-2 mr-sm-2" name="link" id="inputLink" placeholder="Link Publication">

        <label for="inputAuthors" class="sr-only">Authors</label>
        <input type="text" class="form-control mb-2 mr-sm-2" name="authors" id="inputAuthors" placeholder="Authors">

        <label for="inputPublisAt" class="sr-only">Publish At</label>
        <input type="text" class="form-control mb-2 mr-sm-2" name="publish_at" id="inputPublisAt" placeholder="Publish At">
        <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambah" style="width: 200px;">
    </form>

    <!-- data publikasi -->
    <br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Link Publication</th>
                            <th>Authors</th>
                            <th>Publish At</th>
                            <th>Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($publication as $d) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['title']; ?></td>
                                <td><a href="<?= $d['link']; ?>"><?= $d['link']; ?></a></td>
                                <td><?= $d['authors']; ?></td>
                                <td><?= $d['publish_at']; ?></td>
                                <td>
                                    <a class="btn btn-success" href="/dosen/edit_publikasi/<?= $d['id_publication']; ?>/<?= $d['id_dosen']; ?>"><i class="fas fa-edit"></i></a>
                                    <!-- <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> -->
                                    <form action="/dosen/<?= $d['id_publication']; ?>/<?= $d['id_dosen']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus publikasi ini?');"><i class="fas fa-trash-alt"></i></button>
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

<!-- /.container-fluid -->
<?= $this->endSection(); ?>