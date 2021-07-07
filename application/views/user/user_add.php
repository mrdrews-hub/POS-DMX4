<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pegawai</h1>
        </div>
        
                <div class="card">
                <div class="card-header">
                <h2 class="section-title">Form Tambah</h2>
                </div>
                    <div class="card-body">
                        <div class="row d-flex justify-content-center">
                        <div class="col-md-5">
                        
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama*</label>
                                <input type="text" class="form-control shadow-sm <?=form_error('nama') ? 'is-invalid': NULL ?>" name="nama" id="nama" value="<?=set_value('nama')?>">
                                <strong style="color: tomato;"><?=form_error('nama')?></strong>
                            </div>
                            <div class="form-group">
                                <label for="username">Username*</label>
                                <input type="text" class="form-control shadow-sm <?=form_error('username') ? 'is-invalid': NULL ?>" name="username" id="username" value="<?=set_value('username')?>">
                                <strong style="color: tomato;"><?=form_error('username')?></strong>
                            </div>
                            <div class="form-group">
                                <label for="password">Password*</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input type="password" class="form-control shadow-sm <?=form_error('password') ? 'is-invalid': NULL ?>" name="password" id="password" value="<?=set_value('password')?>">
                            </div>
                                <strong style="color: tomato;"><?=form_error('password')?></strong>
                            </div>
                            <div class="form-group">
                                <label for="passconf">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input type="password" class="form-control shadow-sm <?=form_error('passconf') ? 'is-invalid': NULL ?>" name="passconf" id="passconf" value="<?=set_value('passconf')?>">
                            </div>
                                <strong style="color: tomato;"><?=form_error('passconf')?></strong>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control shadow-sm" name="alamat" id="alamat">
                                    <?=set_value('alamat')?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="level">Level*</label>
                                <select name="level" id="level" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1"<?=set_value('level') == 1 ? "selected" : NULL ?>>Admin</option>
                                <option value="2"<?=set_value('level') == 2 ? "selected" : NULL ?>>Pegawai</option>
                                </select>
                                <strong style="color: tomato;"><?=form_error('level')?></strong>
                            </div>
                            <div class="form-group mt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mr-3">
                            <i class="fas fa-location-arrow"></i> Tambah
                            </button>
                            <a href="<?= site_url('user') ?>" class="btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>