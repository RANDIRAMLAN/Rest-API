<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title><?= $judul; ?></title>
</head>

<body>
    <div class="col col-md-12 mt-5">
        <?php if (session()->getFlashData('pesan')) { ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <?= session()->getFlashData('pesan'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }; ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#exampleModalTambah">
            Tambah Data
        </button>
        <!-- Modal -->
        <form action="/rest/simpan" method="post">
            <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">NPM</label>
                                <input type="text" class="form-control" name="nrp">
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center" scope="col">Nomor</th>
                    <th scope="col">NPM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                    <th class="text-center" colspan="2" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $m) { ?>
                    <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td><?= $m['nrp']; ?></td>
                        <td><?= $m['nama']; ?></td>
                        <td><?= $m['email']; ?></td>
                        <td><?= $m['jurusan']; ?></td>
                        <td width="30px">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModalUbah<?= $i; ?>">
                                Ubah
                            </button>
                            <!-- Modal -->
                            <form action="/rest/ubah/<?= $m['id']; ?>" method="post">
                                <div class="modal fade" id="exampleModalUbah<?= $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Mahasiswa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">NPM</label>
                                                    <input type="text" class="form-control" name="nrp" value="<?= $m['nrp']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?= $m['nama']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $m['email']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Jurusan</label>
                                                    <input type="text" class="form-control" name="jurusan" value="<?= $m['jurusan']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info btn-sm">Ubah Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td width="30px">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalHapus<?= $i; ?>">
                                Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalHapus<?= $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Yakin Ingin Hapus Data ?
                                        </div>
                                        <form action="/rest/hapus/<?= $m['id']; ?>" method="post">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php }; ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>