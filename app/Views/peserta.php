<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peserta</h1>
        <?php
        // print_r($peserta);
        // die;
        ?>

    </div>
    <div class="row my-5">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Tambah Data <strong>Peserta</strong>
                </div>
                <form action="/tambahPeserta" method="post" class="form-horizontal">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Nama Peserta</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="nama" placeholder="Nama" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Usia</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="usia" placeholder="Usia" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="alamat" placeholder="Alamat" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Perguruan Karate</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="perguruan_karate" placeholder="Perguruan Karate" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Sabuk Karate</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_sabuk" id="hf-email" class="form-control">
                                    <?php foreach ($sabuk as $row) : ?>
                                        <option value="<?= $row['id_sabuk']; ?>"><?= $row['sabuk_karate']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <!-- DataTales Example -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Peserta</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Usia</th>
                                    <th>Alamat</th>
                                    <th>Perguruan Karate</th>
                                    <th>Sabuk Karate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($peserta as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['usia']; ?></td>
                                        <td><?= $row['alamat']; ?></td>
                                        <td><?= $row['perguruan_karate']; ?></td>
                                        <td><?= $row['sabuk_karate']; ?></td>
                                        <td><a href="/deleteDataPeserta/<?= $row['id_peserta']; ?>">Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
<!-- /.container-fluid -->