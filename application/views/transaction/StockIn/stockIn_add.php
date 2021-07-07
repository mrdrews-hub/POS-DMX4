<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1>Barang Masuk</h1>
        </div>
        <?php $this->view('alert');?>
        <div class="card">
        <div class="card-header">
                <h2 class="section-title">Stock In</h2>
        </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-5">                       
                        <form action="<?= site_url('stock/process') ?>" method="post">

                                <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control shadow-sm" name="date" id="date" value="<?= date('Y-m-d') ?>" required>
                                <strong style="color: tomato;"></strong>
                                </div>

                                <div class="form-group my-0">
                                <label for="barcode">Barcode</label>
                                </div>
                                <div class="input-group mb-3">
                                <input type="hidden" name="item_id" id="item_id">
                                <input type="text" class="form-control" name="barcode" id="barcode" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary has-icon" type="button" data-toggle="modal" data-target="#modal-item"><i class="fas fa-search"></i> </button>
                                </div>
                                </div>

                                <div class="form-group">
                                <label for="nama_item">Nama item</label>
                                <input type="text" class="form-control shadow-sm" name="nama_item" id="nama_item" value="" required>
                                <strong style="color: tomato;"></strong>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12">
                                            <label for="nama_unit">Item Unit</label>
                                            <input type="text" name="nama_unit" id="nama_unit" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <label for="stock">Initial Stock</label>
                                            <input type="text" name="stock" id="stock" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                <label for="detail">Detail</label>
                                <input type="text" class="form-control shadow-sm" name="detail" id="detail" value="" required>
                                <strong style="color: tomato;"></strong>
                                </div>

                                <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <select name="supplier" id="supplier" class="form-control">
                                <option value="">- pilih -</option>
                                    <?php foreach($supplier as $key => $data) {
                                            echo '<option value="'.$data->supplier_id.'">'.$data->nama_supplier.'</option>';
                                    } ?>
         
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="number" class="form-control shadow-sm" name="qty" id="qty" value="" required>
                                <strong style="color: tomato;"></strong>
                                </div>

                            <div class="form-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-3" name="in_add">
                            <i class="fas fa-location-arrow"></i> Tambah
                            </button>
                            <a href="<?= site_url('stock/in') ?>" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="modal-itemLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-itemLabel">Data Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
      <table class="table table-bordered table-hover text-center" id="mytable">
                            <thead>                            
                                <tr class="table-primary">
                                    <th>Barcode</th>
                                    <th>Nama Barang</th>
                                    <th>Unit</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($item as $key => $data) : ?>
                                <tr>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= $data->nama_item ?></td>
                                    <td><?= $data->nama_unit ?></td>
                                    <td><?= rupiah($data->price) ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm" id="select"
                                        data-id="<?= $data->item_id ?>"
                                        data-barcode="<?= $data->barcode ?>"
                                        data-nama_item="<?= $data->nama_item ?>"
                                        data-nama_unit="<?= $data->nama_unit ?>"
                                        data-stock="<?= $data->stock ?>"
                                        >
                                        <i class="fas fa-check"></i> Select</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $(document).on('click','#select',function(){
        let item_id = $(this).data('id');
        let barcode = $(this).data('barcode');
        let nama_item = $(this).data('nama_item');
        let nama_unit = $(this).data('nama_unit');
        let stock = $(this).data('stock');

        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#nama_item').val(nama_item);
        $('#nama_unit').val(nama_unit);
        $('#stock').val(stock);

        $('#modal-item').modal('hide');

    })
})

</script>






                                <!-- <div class="form-group">
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
                                </div> -->