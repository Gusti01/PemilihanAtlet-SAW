<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penilaian</h1>
        <?php
        // print_r($skala);
        // die;
        ?>

    </div>
    <div class="row my-5">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    Tambah Data <strong>Penilaian</strong>
                </div>
                <form action="/tambahPenilaian" method="post" class="form-horizontal">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Nama Peserta</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="id_peserta" id="hf-email" class="form-control">
                                    <?php foreach ($peserta as $row) : ?>
                                        <option value="<?= $row['id_peserta']; ?>"><?= $row['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Umur</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="umur" placeholder="Umur" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Kedisiplinan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="kedisiplinan" placeholder="Kedisiplinan" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Kesehatan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="kesehatan" placeholder="Kesehatan" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Teknik Pukulan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="teknik_pukulan" placeholder="Teknik Pukulan" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Teknik Tendangan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="teknik_tendangan" placeholder="Teknik Tendangan" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Kekuatan Fisik</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="hf-email" name="kekuatan_fisik" placeholder="Kekuatan Fisik" class="form-control">
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
                    <h6 class="m-0 font-weight-bold text-success">Data Penilaian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Usia</th>
                                    <th>Kedisiplinan</th>
                                    <th>Kesehatan</th>
                                    <th>Teknik Pukulan</th>
                                    <th>Teknik Tendangan</th>
                                    <th>Kekuatan Fisik</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($penilaian as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['umur']; ?></td>
                                        <td><?= $row['kedisiplinan']; ?></td>
                                        <td><?= $row['kesehatan']; ?></td>
                                        <td><?= $row['teknik_pukulan']; ?></td>
                                        <td><?= $row['teknik_tendangan']; ?></td>
                                        <td><?= $row['kekuatan_fisik']; ?></td>
                                        <td><a href="/deleteDataPenilaian/<?= $row['id_penilaian']; ?>">Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row my-5">
        <!-- DataTales Example -->
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Data Penilaian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peserta</th>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($skala as $data => $value) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $value["nama"]; ?></td>
                                        <td><?= $value["nilai_SAW"]; ?></td>
                                        <td><?php if ($i <= 16) {
                                                echo "Lulus";
                                            } else {
                                                echo "Tidak Lulus";
                                            }
                                            ?></td>
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