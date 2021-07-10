<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= ucfirst($page) ?> Supplier</h1>
        </div>
        <div class="card">
        <div class="card-header">
                <h2 class="section-title">Form Supplier</h2>
        </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-5">                       
                        <form action="<?= site_url('supplier/process') ?>" method="post">
                                <input type="hidden" name="supplier_id" value="<?=$row->supplier_id ?> ">
                            <div class="form-group">
                                <label for="nama_supplier">Nama Supplier*</label>
                                <input type="text" class="form-control shadow-sm" name="nama_supplier" value="<?= $row->nama_supplier?>" required>
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
                                    <input type="text" class="form-control phone-number" name="no_telp" value="<?= $row->no_telp ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control shadow-sm" name="alamat" value="<?= $row->alamat ?>">
                                <strong style="color: tomato;"></strong>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control shadow-sm" name="keterangan" value="<?= $row->keterangan ?>" placeholder="Ex:Supplier kuota,Supplier murah Etc.." required>
                                <strong style="color: tomato;"></strong>
                            </div>

                            <div class="form-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-3" name="<?= $page ?>">
                            <i class="fas fa-location-arrow"></i> Tambah
                            </button>
                            <a href="<?= site_url('supplier') ?>" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>