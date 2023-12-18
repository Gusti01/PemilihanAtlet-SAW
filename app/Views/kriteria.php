<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kriteria</h1>
    </div>
    <div class="row shadow py-3">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Tambah Sabuk <strong>Karate</strong>
                </div>
                <form action="/tambahKriteria" method="post" class="form-horizontal">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Nama Kriteria</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="nama_kriteria" placeholder="Nama Kriteria..." class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Bobot</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="bobot" placeholder="Bobot..." class="form-control">
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
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Sabuk</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($kriteria as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['nama_kriteria']; ?></td>
                                        <td><?= $row['bobot']; ?></td>
                                        <td><a href="/deleteDataKriteria/<?= $row['id_kriteria']; ?>">Hapus</a></td>
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