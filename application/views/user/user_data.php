 <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pegawai</h1>
        </div>
        <?php $this->view('alert'); ?>
        <div class="card">
        <div class="card-header">
                <h2 class="section-title">List User</h2>
                </div>
          <div class="card-body">
          <a href="<?= site_url('user/add') ?>" class="btn btn-success mb-1 mr-2 float-right"><i class="fas fa-user-plus"></i> Add</a>
            <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="mytable">
                            <thead>
                                
                                <tr class="table-primary text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                
                            </thead>
                            <tbody>

                                 <?php $i=1;
                                 foreach($row->result() as $data): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->alamat ?></td>
                                        <?php if($data->level == 1):?>
                                    <td><div class="badge badge-success">Admin</div></td>
                                        <?php else: ?>
                                    <td><div class="badge badge-primary">Pegawai</div></td>
                                        <?php endif;?>
                                    <td class="text-center">
                                        <a href="<?=site_url('user/edit/'.$data->user_id) ?>" class="btn btn-info">
                                        <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?=site_url('user/delete?user_id='.$data->user_id) ?>" class="btn btn-danger">
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