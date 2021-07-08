<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Penjualan</h1>
        </div>
        <div class="card card-primary">
        <div class="card-header">
                <h2 class="section-title"><?php

use function PHPSTORM_META\type;

echo $ket; ?></h2>
        </div>
          <div class="card-body">
                    <form method="GET" action="">
            <div class="row">
                      <div class="form-group col-md-2 mb-4">
                        <label>Filter Berdasarkan</label>
                        <select name="filter" id="filter" class="form-control form-control-sm">
                            <option value="">Pilih</option>
                            <option value="1">Per Tanggal</option>
                            <option value="2">Per Bulan</option>
                            <option value="3">Per Tahun</option>
                        </select>
                      </div>

                      <div class="form-group col-md-2 mb-4">
                        <div id="form-tanggal">
                            <label>Tanggal</label>
                            <input type="text" name="tanggal" class="form-control border-primary input-tanggal" id="filterTgl">
                        </div>
                      </div>
            </div>

            <div class="row">
                      <div class="form-group col-md-2 mb-4">
                        <div id="form-bulan">
                            <label>Bulan</label>
                              <select class="form-control" name="bulan" id="filterBln">
                                  <option value="">Pilih</option>
                                  <option value="1">Januari</option>
                                  <option value="2">Februari</option>
                                  <option value="3">Maret</option>
                                  <option value="4">April</option>
                                  <option value="5">Mei</option>
                                  <option value="6">Juni</option>
                                  <option value="7">Juli</option>
                                  <option value="8">Agustus</option>
                                  <option value="9">September</option>
                                  <option value="10">Oktober</option>
                                  <option value="11">November</option>
                                  <option value="12">Desember</option>
                              </select>
                        </div>
                      </div>
                      <div class="form-group mb-4">
                      <div id="form-tahun">
                          <label>Tahun</label><br>
                          <select name="tahun" class="form-control" id="filterThn">
                              <option value="">Pilih</option>
                              <?php
                              foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                  echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                              }
                              ?>
                          </select>
                      </div>
                      </div>

    </div>
                      <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> Tampilkan</button>
              </form>
    <a class="btn btn-primary btn-sm float-right" target="_blank" href="<?php echo $url_cetak; ?>"><i class="fas fa-file-pdf"></i> CETAK PDF</a>
            <div class="table-responsive">
                      <table class="table table-bordered table-hover" id="mytable">
                            <thead>                            
                                <tr class="table-success text-center">
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Item</th>
                                  <th>harga</th>
                                  <th>qty</th>
                                  <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if( ! empty($transaksi)):?>
                                
                               <?php  
                               $no = 1;
                               foreach($transaksi as $data): $tgl = date('d-m-Y', strtotime($data->created));?>
                                      
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $tgl ?></td>
                                    <td><?= $data->item ?></td>
                                    <td><?= $data->price ?></td>
                                    <td><?= $data->qty ?></td>
                                    <td><?= $data->subtotal ?></td>
                                </tr>

                                <?php endforeach; ?>
                              <?php endif; ?>
                              
                            </tbody>

                            <script src="<?=base_url()?>admin/node_modules/jquery-ui-dist/jquery-ui.min.js"></script>
                            <script>
                            $(document).ready(function(){ // Ketika halaman selesai di load
                            $('.input-tanggal').datepicker({
                                dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                            });

                            $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

                            $('#filter').change(function(){ // Ketika user memilih filter
                                if($(this).val() == ''){
                                  $('#form-tanggal, #form-bulan, #form-tahun').removeAttr('required',true);
                                  $('#form-tanggal, #form-bulan, #form-tahun').hide();
                                }
                                else if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                                  $('#form-bulan, #form-tahun').removeAttr('required',true); // Sembunyikan required
                                    $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                                    $('#form-tanggal').show()// Tampilkan form tanggal
                                    $('#filterTgl').attr('required',true);//tambah required
                                }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                                    $('#form-tanggal').hide(); // Sembunyikan form tanggal
                                    $('#filterTgl').removeAttr('required',true);//hapus required
                                    $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                                    $('#filterBln, #filterThn').attr('required',true);//tambah required
                                }else{ // Jika filternya 3 (per tahun)
                                  $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                                  $('#form-tanggal, #form-bulan').removeAttr('required',true)// Hapus required form tanggal dan bulan
                                    $('#filterThn').attr('required',true); // Tampilkan form tahun
                                    $('#form-tahun').show(); // Tampilkan form tahun
                                }

                                $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                            })
                        })
                        </script>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer">
                  </div>
                </div>
                        
    </section>
</div>
