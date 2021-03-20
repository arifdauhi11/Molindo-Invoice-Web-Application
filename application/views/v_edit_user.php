    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">User</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">User
                  </li>
                </ol>
              </div>
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-md-12">
            <div id="myalert">
            <?php if ($this->session->flashdata('alert')) {
              echo $this->session->flashdata('alert');
            } ?>
            </div>
          </div>
        </div>        
        <br>
          <div class="content-body">
            <section class="row">                
              <div class="col-md-4">
                  <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data User</h4>                        
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <form class="form" method="POST" action="<?php echo site_url('user/updateUser/'.$this->uri->segment(3)) ?>">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="eventRegInput1">Nama User</label>
                                  <input type="text" id="eventRegInput1" class="form-control" placeholder="Masukkan Nama User" name="nama" value="<?= $user->nama_user ?>">
                                  <?php echo form_error('nama', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                                </div>
                                <div class="form-group">
                                  <label for="eventRegInput2">Role</label>          
                                  <select class="form-control" name="role" <?php if ($this->session->userdata('role') != 'Direktur') {
                                    echo "readonly";
                                  } ?> value="<?= $user->id_role ?>">
                                    <option disabled="" value="">-- Pilih Role --</option>
                                    <?php foreach ($role as $key) { ?>
                                      <?php if ($key->role != "Developer") { ?>
                                      <option value="<?php echo $key->id_role ?>" <?php if ($user->id_role == $key->id_role) {
                                        echo "selected";
                                      } ?>><?php echo $key->role ?></option>
                                      <?php } ?>
                                    <?php } ?>
                                  </select>                                                    
                                  <?php echo form_error('role', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                                </div>
                                <div class="form-group">
                                  <label for="eventRegInput2">Username</label>                            
                                  <input type="text" id="eventRegInput2" class="form-control" placeholder="Masukkan Username" name="username" value="<?= $user->username ?>">
                                  <?php echo form_error('username', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                                </div>                                               
                              </div>
                              <div class="form-actions center">                          
                                <button type="submit" class="btn btn-info btn-square">
                                  <i class="ft-save"></i> Simpan
                                </button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edit Password User</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" method="POST" action="<?php echo site_url('user/updatePassword/'.$this->uri->segment(3)).'/'.$user->nama_user ?>">
                        <div class="form-body">
                          <div class="form-group">
                            <label for="eventRegInput1">Password Lama</label>
                            <input type="text" id="eventRegInput1" class="form-control" placeholder="Masukkan Nama User" name="passwordLama" value="<?php echo $this->md5decrypt->decrypt($user->password) ?>" disabled>
                            <?php echo form_error('nama', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                          </div>
                          <div class="form-group">
                            <label for="eventRegInput2">Password Baru</label>                            
                            <input type="password" id="eventRegInput2" class="form-control" placeholder="Masukkan Password Baru" name="passwordBaru">
                            <?php echo form_error('passwordBaru', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                          </div>               
                          <div class="form-group">
                            <label for="eventRegInput2">Konfirmasi Password Baru</label>                            
                            <input type="password" id="eventRegInput2" class="form-control" placeholder="Masukkan Konfirmasi Password Baru" name="kpasswordBaru">
                            <?php echo form_error('kpasswordBaru', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                          </div>
                        </div>

                        <div class="form-actions center">                          
                          <button type="submit" class="btn btn-info btn-square">
                            <i class="ft-save"></i> Simpan
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Edit Foto Profil</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" method="POST" action="<?php echo site_url('user/updateImage/'.$this->uri->segment(3).'/'.$userData->foto_profil) ?>" enctype="multipart/form-data">
                        <div class="form-body">
                          <div class="card">
                              <div class="text-center">
                                  <div class="card-body">
                                      <img src="<?php echo base_url('assets/images/profil/'.$user->foto_profil) ?>" class="rounded-circle  height-150" alt="Card image">
                                  </div>
                                  <div class="form-group">
                                    <label for="eventRegInput1">Pilih Foto</label>
                                    <input type="file" id="eventRegInput1" class="form-control" placeholder="Masukkan Nama User" name="image">
                                  </div>                                  
                              </div>
                          </div>                                                                              
                        </div>
                        <div class="form-actions center">                          
                          <button type="submit" class="btn btn-info btn-square">
                            <i class="ft-save"></i> Simpan
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>            
      </div>
    </div>    
    <!-- ////////////////////////////////////////////////////////////////////////////-->