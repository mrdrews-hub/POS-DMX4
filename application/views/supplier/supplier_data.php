<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Supplier</h1>
        </div>
        <?php $this->view('alert'); ?>
        <div class="card card-primary">
        <div class="card-header">
                <h2 class="section-title">List Supplier</h2>
        </div>
          <div class="card-body">
          <a href="<?= site_url('supplier/add') ?>" class="btn btn-success mb-1 mr-2 float-right"> <i class="fas fa-plus"></i> Add</a>
            <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="mytable">
                            <thead>                            
                                <tr class="table-success text-center">
                                    <th>No</th>
                                    <th>Nama Supplier</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                 <?php $i=1;
                                 foreach($row->result() as $data): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data->nama_supplier ?></td>
                                    <td><?= $data->no_telp ?></td>
                                    <td><?= $data->alamat ?></td>
                                    <td><?= $data->keterangan ?></td>
                                    <td class="text-center">
                                        <a href="<?=site_url('supplier/edit/'.$data->supplier_id) ?>" class="btn btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?=site_url('supplier/delete?supplier_id='.$data->supplier_id) ?>" class="btn btn-danger">
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