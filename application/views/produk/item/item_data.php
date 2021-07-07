<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Barang</h1>
        </div>
        <div class="card card-primary">
        <?php $this->view('alert');?>
        <div class="card-header">
                <h2 class="section-title">List Items</h2>
        </div>
          <div class="card-body">
          <a href="<?= site_url('item/add') ?>" class="btn btn-success mb-1 mr-2 float-right"> <i class="fas fa-plus"></i> Add</a>
            <div class="table-responsive">
                      <table class="table table-bordered table-hover text-center" id="mytable" style="width: 100%;">
                            <thead>                            
                                <tr class="table-primary">
                                    <th style="width: 10%;">No</th>
                                    <th>Barcode</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Unit</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                 <!-- <?php $i=1;
                                 foreach($row->result() as $data): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data->barcode ?>
                                    <a href="<?=site_url('item/barcode/'.$data->item_id) ?>" class="btn d-block barcode">
                                        <i class="fas fa-barcode"></i> Generate
                                        </a>
                                    </td>
                                    <td><?= $data->nama_item ?></td>
                                    <td><?= $data->nama_category ?></td>
                                    <td><?= $data->nama_unit ?></td>
                                    <td><?= $data->price ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td class="w-45">
                                        <a href="<?=site_url('item/edit/'.$data->item_id) ?>" class="btn btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?=site_url('item/delete?item_id='.$data->item_id) ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                endforeach;?> -->
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

<div class="modal fade" id="ModalBarcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Barcode</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <canvas id="barcode">
        
        </canvas>
      </div>
    </div>
  </div>
</div>




<script>
$(document).ready(function(){
$('#mytable').DataTable({
    serverSide: true,
    processing : true,
    ajax: {
        url: '<?= site_url('item/get_ajax') ?>',
        type: 'POST'
    },
    "columnDefs" :[
      {
        "targets":[0,-1],
        "orderable" : false
      }
    ]
    
});
$(document).on('click','#btnbarcode',function(){
    let barcode = $(this).data('barcode');
    $('.modal #barcode').JsBarcode(barcode);
})

})
</script>