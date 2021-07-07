<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Satuan Barang</h1>
        </div>
        <div class="card card-primary">
        <?php $this->view('alert');?>
        <div class="card-header">
                <h2 class="section-title">List Unit</h2>
        </div>
          <div class="card-body">
          <a href="<?= site_url('unit/add') ?>" class="btn btn-success mb-1 mr-2 float-right"> <i class="fas fa-plus"></i> Add</a>
            <div class="table-responsive">
                      <table class="table table-bordered table-hover text-center" id="mytable">
                            <thead>                            
                                <tr class="table-primary">
                                    <th style="width: 10%;">No</th>
                                    <th>Nama Unit</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                 <?php $i=1;
                                 foreach($row->result() as $data): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data->nama_unit ?></td>
                                    <td class="w-45">
                                        <a href="<?=site_url('unit/edit/'.$data->unit_id) ?>" class="btn btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?=site_url('unit/delete?unit_id='.$data->unit_id) ?>" class="btn btn-danger">
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
              </div>
            </div>
                </div>
              
              
    </section>
</div>