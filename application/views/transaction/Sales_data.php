<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>
        <?php $this->view('alert'); ?>
        <div class="row">
            <!-- Pilih Service -->
            <div class="col-lg-4 col-md-5 col-sm-6 col-12 ">
                <div class="card card-primary">
                    <div class="card-body">
                    <form action="<?= site_url('Sales/add')?>" method="post">
                    <div id="formserv">
                        <div class="form-group">
                        <label for="">Pilih Service</label>
                        <div class="input-group">

                                <input type="text" class="form-control" name="service" id="perangkat" aria-describedby="basic-addon2" placeholder="Cari...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary has-icon" type="button" data-toggle="modal" data-target="#modal-service"><i class="fas fa-search"></i> </button>
                                </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="keterangan">keterangan</label>
                        <input type="text" class="form-control" name="itemServ" id="keterangan" readonly>
                        </div>
                        

                        <input type="hidden" class="form-control" name="hargaServ" id="harga" readonly>

                        <input type="hidden" name="service_id" id="service_id">

                        <button type="submit" name="submitServ" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add</button>
                    </div>                       
                    </form>
                    </div>
                </div>
            </div>


            <!-- Pilih Item -->
            <div class="col-lg-4 col-md-5 col-sm-6 col-12 ">
                <div class="card card-primary">
                   <div class="card-body">
                    <form action="<?= site_url('Sales/add')?> " method="post">
                    <div id="formitem">

                        <div class="form-group">
                        <label for="item">Pilih Item</label>
                        <div class="input-group">
                                <input type="text" class="form-control" name="item" id="item" aria-describedby="basic-addon2" placeholder="Cari..." value="">
                                <div class="input-group-append">
                                    <button class="btn btn-primary has-icon" type="button" data-toggle="modal" data-target="#modal-items"><i class="fas fa-search"></i> </button>
                                </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input type="number" name="qty" id="qty" class="form-control" value="1">
                        </div>
                        <input type="hidden" name="harga" id="price" class="form-control" value="">
                        <input type="hidden" name="item_id" id="item_id" class="form-control" value="">
                        <button type="submit" name="submit" class="btn btn-primary float-right"><i class="fas fa-cart-plus"></i> Add</button>
                        </form>
                    </div>
                   </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-12 col-12">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="item">Tanggal</label>
                        <input type="text" class="form-control"  value="<?= date('d/m/Y') ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                        <label for="item">Kasir</label>
                        <input type="text" class="form-control"  value="<?= $this->fungsi->userLogin()->nama;?>" readonly>
                        </div>
                </div>
            </div>
            </div>

        </div>

        <div class="row">
        <div class="col-12">
            <div class="card card-primary">
            <div class="card-header">
            <h2 class="section-title">Keranjang</h2>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Qty</th>
                                <th class="text-right">Sub Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach ($this->cart->contents() as $items): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $items['name'] ?></td>
                                    <td class="text-center"><?= rupiah( $items['price'] ) ?></td>
                                    <td class="text-center"><?= $items['qty'] ?></td>
                                    <td class="text-right"><?= rupiah( $items['subtotal'] ) ?></td>
                                    <td class="text-center"><a href="<?= site_url('sales/remove/'.$items['rowid'].'/'.$items['qty'].'/'.$items['id'].'/'.$items['kode']) ?>" class="btn btn-warning"><i class="fas fa-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                                <tr class="bg-light">
                                <td colspan="4"> <b>Total</b></td>
                                <td class="text-right"> <b><?= rupiah($this->cart->total())?></b></td>
                                </tr>
                            </tbody>
                                
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end mb-3 mr-4">
                

                    <?php if ($this->cart->contents()!=NULL) :?>
                    <button type="submit" class="btn btn-success checkout" data-toggle="modal" data-target="#modal-proses"> <i class="fas fa-paper-plane"></i> Checkout</button>
                    <?php endif; ?>

                </div>
            </div>
        </div>   
        </div>
        
    </section>
</div>

<!-- MODAL ITEMS AREA -->
<div class="modal fade" id="modal-items" tabindex="-1" role="dialog" aria-labelledby="modal-itemLabel" aria-hidden="true">
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
                                    <th>Kategori</th>
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
                                    <td><?= $data->nama_category ?></td>
                                    <td><?= rupiah($data->price) ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td>
                                    <?php if($data->stock <= 0) :?>
                                        <button class="btn btn-danger btn-sm" disabled><i class="fas fa-times"></i>Stok Habis </button>
                                    <?php else : ?>
                                        <button class="btn btn-success btn-sm" 
                                        id="selectitem"
                                        data-id="<?= $data->item_id ?>"
                                        data-item="<?= $data->nama_item ?>"
                                        data-price="<?= $data->price ?>"
                                        >
                                        <i class="fas fa-check"></i>Select</button>
                                        <?php endif;?>
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
$(document).on('click','#selectitem',function(){
        let item_id = $(this).data('id');
        let item = $(this).data('item');
        let price = $(this).data('price');

        
        $('#formitem #item_id').val(item_id);
        $('#formitem #item').val(item);
        $('#formitem #price').val(price);

        $('#modal-items').modal('hide');

    })
</script>
<!-- MODAL ITEMS END -->

<!-- MODAL SERVICE AREA -->
<div class="modal fade" id="modal-service" tabindex="-1" role="dialog" aria-labelledby="modal-serviceLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-serviceLabel">Data Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
      <table class="table table-bordered table-hover text-center" id="mytable2">
                            <thead>                            
                                <tr class="table-primary">
                                    <th>Kode Service</th>
                                    <th>Customer</th>
                                    <th>Perangkat</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($service as $key => $data) : ?>
                                <tr>
                                    <td><?= $data->kode_service ?></td>
                                    <td><?= $data->customer ?></td>
                                    <td><?= $data->perangkat ?></td>
                                    <td><?= $data->keterangan ?></td>
                                    <td><?=rupiah($data->harga + $data->jasa)?></td>
                                    <td>
                                        <button class="btn btn-success btn-sm" id="select"
                                        data-sid="<?= $data->kode_service ?>"
                                        data-harga="<?= $data->harga + $data->jasa ?>"
                                        data-keterangan="<?= $data->keterangan ?>"
                                        data-perangkat="<?= $data->perangkat ?>"
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
    $('#mytable2').DataTable();
    $(document).on('click','#select',function(){
            let service_id = $(this).data('sid');
            let keterangan = $(this).data('keterangan');
            let harga = $(this).data('harga');
            let perangkat = $(this).data('perangkat')

            
            $('#formserv #service_id').val(service_id);
            $('#formserv #keterangan').val(keterangan);
            $('#formserv #harga').val(harga);
            $('#formserv #perangkat').val(perangkat);

            $('#modal-service').modal('hide');

        })
})
</script>
</script>

<!-- MODAL SERVICE END -->

<!-- MODAL PROSES -->

<div class="modal fade d-print-none" id="modal-proses" tabindex="-1" role="dialog" aria-labelledby="modal-prosesLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-prosesLabel">Proses Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <form action="<?= site_url('Sales/proses')?>" method="post">
        <?php $no=1; foreach ($this->cart->contents() as $items): ?>
                        <input type="hidden" class="form-control" name="item[]" value="<?= $items['name'] ?>"  readonly>
                        <input type="hidden" class="form-control" name="price[]" value="<?= $items['price'] ?>"  readonly>
                        <input type="hidden" class="form-control" name="qty[]" value="<?= $items['qty'] ?>"  readonly>
                        <input type="hidden" class="form-control" name="subtotal[]" value="<?= $items['subtotal'] ?>"  readonly>
                    <?php endforeach; ?>
            <div class="row">
                    <div class="form-group col-md-12">
                      <label for="invoice">INVOICE NO.</label>
                        <input type="text" class="form-control" name="invoice" id="invoice" value="<?= $invoice ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tgl">Tanggal</label>
                        <input type="text" class="form-control" name="tgl" id="tgl" value="<?= date("d-m-Y")?>" readonly>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="kasir">Kasir</label>
                        <input type="text" class="form-control" name="kasir" id="kasir" value="<?= $this->fungsi->userLogin()->nama;?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="total">Total Harga</label>
                        <input type="text" class="form-control" value="<?= rupiah( $this->cart->total() ) ?>" readonly>
                        <input type="hidden" class="form-control" name="total" id="total" value="<?= $this->cart->total() ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="bayar">Bayar*</label>
                        <input type="number" class="form-control" name="bayar" id="bayar" value="" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="kembalian">Kembalian</label>
                        <input type="text" class="form-control" name="kembalian" id="kembalian" value="" readonly>
                        <input type="hidden" class="form-control" name="kembalian2" id="kembalian2" value="" readonly>
                    </div>
            </div>
                              
      </div>
      <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-success">Simpan</button>
    </form> 
      </div>
    </div>
  </div>
</div>

<script>
function number_format (number, decimals, decPoint, thousandsSep) { 
 number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
 var n = !isFinite(+number) ? 0 : +number
 var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
 var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
 var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
 var s = ''

 var toFixedFix = function (n, prec) {
  var k = Math.pow(10, prec)
  return '' + (Math.round(n * k) / k)
    .toFixed(prec)
 }

 // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
 s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
 if (s[0].length > 3) {
  s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
 }
 if ((s[1] || '').length < prec) {
  s[1] = s[1] || ''
  s[1] += new Array(prec - s[1].length + 1).join('0')
 }

 return s.join(dec)
}

$('#bayar').on('keyup',function(){
  const raw = $('#total').val().split("");
  const jadi = raw.filter(function(number){
      return number >= 0;
  })
  const bayar = $("#bayar").val();
  const total = jadi.join("");
  $("#kembalian").val(function(){
      $hasil = bayar-total
      if($hasil < 0 ){
          $('#submit').hide()
          return "Uang Kurang"
      }else{
          $('#submit').show()
      return number_format($hasil,0,',','.');
      }
  });
  $("#kembalian2").val(function(){
      $hasil = bayar-total;
      return $hasil
  });
})

</script>
<!-- MODAL PROSES END -->