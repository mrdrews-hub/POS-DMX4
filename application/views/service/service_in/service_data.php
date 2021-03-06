<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Service</h1>
        </div>
        <?php $this->view('alert');?>
        <div class="card card-primary">
        <div class="card-header">
                <h2 class="section-title">Data Service</h2>
        </div>
          <div class="card-body">
          <a href="<?= site_url('service/in/add') ?>" class="btn btn-success mb-1 mr-2 float-right"> <i class="fas fa-plus"></i>Add Service</a>
            <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="mytable">
                            <thead>                            
                                <tr class="table-success text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Telp</th>
                                    <th>Perangkat</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;
                            foreach($row->result() as $data) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->customer ?></td>
                                    <td><?= $data->no_telp ?></td>
                                    <td><?= $data->perangkat ?></td>
                                    <td><?= $data->keluhan ?></td>

                                    <td class="text-center">
                                    <?php if( $data-> status == 'pending' ): ?>
                                      <div class="badge badge-secondary"><?= $data->status ?></div>
                                    <?php elseif( $data-> status == 'proses' ): ?>
                                      <div class="badge badge-primary"><?= $data->status ?></div>
                                    <?php elseif( $data-> status == 'selesai' ): ?>
                                      <div class="badge badge-success"><?= $data->status ?></div>
                                    <?php endif; ?>
                                    </td>
                                    <td class="w-25 text-center">
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-detail" id="details"
                                      data-kodeService="<?= $data->kode_service ?>"
                                      data-customer="<?= $data->customer ?>"
                                      data-no_telp="<?= $data->no_telp ?>"
                                      data-perangkat="<?= $data->perangkat ?>"
                                      data-keluhan="<?= $data->keluhan ?>"
                                      data-keterangan="<?= $data->keterangan ?>"
                                      data-harga="<?= rupiah( $data->harga ) ?>"
                                      data-jasa="<?= rupiah($data->jasa) ?>"
                                      data-created="<?= indoDate($data->created) ?>"
                                      data-admin="<?= $data->nama ?>">
                                     <i class="fas fa-info"></i> Detail</a>
                                    <a href="<?=site_url('service/edit/'.$data->service_id) ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?=site_url('service/delete?service_id='.$data->service_id) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
                        
    </section>
</div>

<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modal-itemLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <div class="row">
        <h5 class="modal-title" id="modal-itemLabel">Tanggal Masuk : <span id="date"></span></h5><br>
      </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('Service/cetakTiket')?>" method="POST">
        <div class="row">
              <input type="hidden" name="admin" id="adminHide">
              
            <div class="col-md-12">
            <div class="form-group">
            <label for="kodeServis">Kode Service</label>
            <input class="form-control" type="text" id="kodeServis" name="kodeServis" readonly>
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
            <label for="customer">Nama Customer</label>
            <input class="form-control" type="text" id="customer" name="customer" readonly>
            </div>
            </div>
           
            <div class="col-md-7">
            <div class="form-group">
            <label for="perangkat">Perangkat</label>
            <input class="form-control" type="text" id="perangkat" name="perangkat" readonly>
            </div>

            </div>
            <div class="col-md-5">
            <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input class="form-control" type="number" id="no_telp" name="noTelp" readonly>
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
            <label for="keluhan">Keluhan</label>
            <input class="form-control" type="text" id="keluhan" name="keluhan" readonly>
            </div>
            </div>

            <div class="col-md-12">
            <div class="form-group">
            <label for="keterangan">Keterangan Service</label>
            <input class="form-control" type="text" id="keterangan" readonly>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
            <label for="harga">Harga Sparepart</label>
            <input class="form-control" type="text" id="harga" readonly>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
            <label for="jasa">Biaya Service</label>
            <input class="form-control" type="text" id="jasa" readonly>
            </div>
            </div>
            <div class="col-md-12">
            <div id="emailHelp" class="form-text"><i>*Kami akan menghubungi anda kembali apabila proses service sudah selesai</i></div>
            </div>
            </div>
        </div>
      <div class="modal-footer d-flex justify-content-between">
         <h6>Nama Admin : <span id="admin"></span></h6>
         <button type="submit" class="btn btn-success" name="submitTiket"
         data-toggle="tooltip" 
         data-placement="top" title="Print Tiket" data-original-title="Print Tiket">
         <i class="fas fa-print"></i>
        </button>
      </div>
      </form>                                
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click','#details',function(){
        let customer = $(this).data('customer')
        let no_telp = $(this).data('no_telp')
        let perangkat = $(this).data('perangkat')
        let keluhan = $(this).data('keluhan')
        let keterangan = $(this).data('keterangan')
        let harga = $(this).data('harga')
        let jasa = $(this).data('jasa')
        let created = $(this).data('created')
        let admin = $(this).data('admin')
        let kodeServ = $(this).data('kodeservice')

        
        $('#customer').val(customer);
        $('#no_telp').val(no_telp);
        $('#perangkat').val(perangkat);
        $('#keluhan').val(keluhan);
        $('#keterangan').val(keterangan);
        $('#harga').val(harga);
        $('#jasa').val(jasa);
        $('#kodeServis').val(kodeServ);
        $('#adminHide').val(admin);
        $('#date').html(created);
        $('#admin').html(admin);

        $('#modal-item').modal('hide');

    })
})

</script>