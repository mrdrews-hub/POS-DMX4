<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= ucfirst($page)  ?> Service</h1>
        </div>
        <div class="card">
        <div class="card-header">
                <h2 class="section-title">Form Service</h2>
        </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-5">                       
                        <form action="<?= site_url('service/process') ?>" method="post">
                                <input type="hidden" name="service_id" value="<?= $row->service_id ?>">
                            
                            <div class="form-group">
                                <label for="customer">Nama Customer</label>
                                <input type="text" class="form-control shadow-sm" name="customer" value="<?= $row->customer ?>"  required>
                                <strong style="color: tomato;"></strong>
                            </div>

                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    </div>
                                    <input type="number" class="form-control phone-number" name="no_telp" value="<?= $row->no_telp ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="perangkat">Perangkat</label>
                                <input type="text" class="form-control shadow-sm" name="perangkat" value="<?= $row->perangkat ?>" required>
                                <strong style="color: tomato;"></strong>
                            </div>

                            <div class="form-group">
                                <label for="keluhan">Keluhan</label>
                                <input type="text" class="form-control shadow-sm" name="keluhan" value="<?= $row->keluhan ?>"  required>
                                <strong style="color: tomato;"></strong>
                            </div>
                            <?php if ($page =='edit') : ?>
                            <div class="form-group">
                                <label for="keterangan">Keterangan service</label>
                                <input type="text" class="form-control shadow-sm" name="keterangan" value="<?= $row->keterangan ?>">
                                <strong style="color: tomato;"></strong>
                            </div>

                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="harga">Harga Sparepart</label>
                                <input type="number" class="form-control shadow-sm" name="harga" value="<?= $row->harga ?>">
                                <strong style="color: tomato;"></strong>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="jasa">Biaya Service</label>
                                <input type="number" class="form-control shadow-sm" name="jasa" value="<?= $row->jasa ?>">
                                <strong style="color: tomato;"></strong>
                            </div>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="selectgroup w-100 bg-primary">
                                    <label class="selectgroup-item">
                                        <input type="radio" class="selectgroup-input" name="status" value="pending" <?= ($row->status == 'pending') ? 'checked' : NULL?>>
                                        <span class="selectgroup-button"><i class="fas fa-hourglass-start"></i> Pending</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" class="selectgroup-input" name="status" value="proses" <?= ($row->status == 'proses') ? 'checked' : NULL?>>
                                        <span class="selectgroup-button"><i class="fas fa-tools"></i> Proses</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" class="selectgroup-input" name="status" value="selesai" <?= ($row->status == 'selesai') ? 'checked' : NULL?>>
                                        <span class="selectgroup-button"><i class="fas fa-check-circle"></i> Selesai</span>
                                    </label>
                                </div>
                            </div>

                            <?php endif; ?>

                            <div class="form-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-3" name="<?= $page ?>">
                            <i class="fas fa-location-arrow"></i> Tambah
                            </button>
                            <a href="<?= site_url('service/in') ?>" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>