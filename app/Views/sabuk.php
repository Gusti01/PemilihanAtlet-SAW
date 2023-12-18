<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sabuk Karate</h1>
    </div>
    <div class="row shadow py-3">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Tambah Sabuk <strong>Karate</strong>
                </div>
                <form action="/tambahSabuk" method="post" class="form-horizontal">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Sabuk Karate</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="sabuk_karate" placeholder="Sabuk Karate..." class="form-control">
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
                                    <th>Sabuk Karate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($sabuk as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['sabuk_karate']; ?></td>
                                        <td><a href="/deleteDataSabuk/<?= $row['id_sabuk']; ?>">Hapus</a> | <a href="">Edit</a></td>
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