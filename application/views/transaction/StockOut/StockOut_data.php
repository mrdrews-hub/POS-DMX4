<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Retur</h1>
        </div>
        <div class="card card-primary">
        <div class="card-header">
                <h2 class="section-title">Data Retur</h2>
        </div>
          <div class="card-body">
          <a href="<?= site_url('stock/out/add') ?>" class="btn btn-success mb-1 mr-2 float-right"> <i class="fas fa-plus"></i> Add Retur</a>
            <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="mytable">
                            <thead>                            
                                <tr class="table-success text-center">
                                    <th>No</th>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;
                                 foreach($row as $key => $data): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td class="text-center"><?= $data->barcode ?></td>
                                    <td class="text-center"><?= $data->nama_item ?></td>
                                    <td class="text-right"><?= $data->qty ?></td>
                                    <td class="text-center"><?= indoDate( $data->date )?></td>
                                    <td class="text-center w-25">
                                        <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-detail" id="details"
                                        data-barcode="<?= $data->barcode ?>"
                                        data-nama_item="<?= $data->nama_item ?>"
                                        data-qty="<?= $data->qty ?>"
                                        data-date="<?= indoDate( $data->date )?>"
                                        data-detail="<?= $data->detail ?>"
                                        >
                                        <i class="fas fa-info"></i> Detail
                                        </a>
                                        <a href="<?=site_url('stock/out/delete/'.$data->stock_id.'/'.$data->item_id) ?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                endforeach;?>
                            </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer">
                  <div class="div"></div>
                  </div>
                </div>
                          
    </section>
</div>

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modal-itemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-itemLabel">Tanggal Retur : <span id="date"></span></h5><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 text-center">
            <canvas id="showbarcode"></canvas>
            </div>

            <div class="col-md-8">
            <div class="form-group">
            <label for="nama_item">Nama Item</label>
            <input class="form-control" type="text" id="nama_item" disabled>
            </div>
            </div>

            <div class="col-md-4">
            <div class="form-group">
            <label for="qty">Qty</label>
            <input class="form-control" type="text" id="qty" disabled>
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
            <label for="detail">Keterangan</label>
            <input class="form-control" type="text" id="detail" disabled>
            </div>
            </div>

            </div>
        </div>
      <div class="modal-footer">
         <p> <span id="date"></span></p>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click','#details',function(){
        let barcode = $(this).data('barcode');
        let nama_item = $(this).data('nama_item');
        let qty = $(this).data('qty');
        let date = $(this).data('date');
        let detail = $(this).data('detail');

        $('#showbarcode').JsBarcode(barcode);
        $('#nama_item').val(nama_item);
        $('#detail').val(detail);
        $('#qty').val(qty);
        $('#date').html(date);

        $('#modal-item').modal('hide');

    })
})

</script>