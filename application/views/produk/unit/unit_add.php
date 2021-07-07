<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= ucfirst($page) ?> Unit</h1>
        </div>
        <div class="card">
        <div class="card-header">
                <h2 class="section-title">Form Unit</h2>
        </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-5">                       
                        <form action="<?= site_url('unit/process') ?>" method="post">
                                <input type="hidden" name="unit_id" value="<?=$row->unit_id ?> ">
                            <div class="form-group">
                                <label for="nama_unit">Nama Unit*</label>
                                <input type="text" class="form-control shadow-sm" name="nama_unit" value="<?= $row->nama_unit?>" required>
                                <strong style="color: tomato;"></strong>
                            </div>

                            <div class="form-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-3" name="<?= $page ?>">
                            <i class="fas fa-location-arrow"></i> Tambah
                            </button>
                            <a href="<?= site_url('unit') ?>" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>