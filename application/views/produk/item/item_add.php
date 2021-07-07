<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1><?= ucfirst($page) ?> Item</h1>
        </div>
        <?php $this->view('alert');?>
        <div class="card">
        <div class="card-header">
                <h2 class="section-title">Form Tambah</h2>
        </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-5">                       
                        <form action="<?= site_url('item/process') ?>" method="post">
                                <input type="hidden" name="item_id" value="<?=$row->item_id ?>">

                                <div class="form-group">
                                <label for="barcode">Barcode</label>
                                <input type="text" class="form-control shadow-sm" name="barcode" id="barcode" value="<?= $row->barcode?>" required>
                                <strong style="color: tomato;"></strong>
                                </div>

                                <div class="form-group">
                                <label for="nama_item">Nama Item</label>
                                <input type="text" class="form-control shadow-sm" name="nama_item" id="nama_item" value="<?= $row->nama_item?>" required>
                                <strong style="color: tomato;"></strong>
                                </div>

                                <div class="form-group">
                                <label for="category">Kategori</label>

                                <?= form_dropdown('category', $category, $selectedcategory, ['class' => 'form-control','required' => 'required']) ?>

                                
                                <strong style="color: tomato;"></strong>
                                </div>

                                <div class="form-group">
                                <label for="unit">Unit</label>

                                <?= form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control','required' => 'required']) ?>

                                <strong style="color: tomato;"></strong>
                                </div>

                                <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control shadow-sm" name="price" id="price" value="<?= $row->price?>" required>
                                <strong style="color: tomato;"></strong>
                                </div>

                            <div class="form-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-3" name="<?= $page ?>">
                            <i class="fas fa-location-arrow"></i> Tambah
                            </button>
                            <a href="<?= site_url('item') ?>" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>