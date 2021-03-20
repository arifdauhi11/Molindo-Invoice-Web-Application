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
              <div class="col-md-8">
                  <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data User</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>                              
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table display nowrap table-striped table-bordered scroll-horizontal dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th style="widows: 10px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($user as $key) { ?>
                                    <?php if ($key->role != "Developer") { ?>                                    
                                    <tr>
                                        <td style="width: 10px"><?php echo $no++ ?></td>
                                        <td><?php echo $key->nama_user ?></td>
                                        <td><?php echo $key->username ?></td>
                                        <td id="tdPassword"><?php $this->md5decrypt->decrypt($key->password) ?></td>
                                        <td><?php echo $key->role ?></td>
                                        <td>
                                          <?php if ($key->status == '0') { ?>
                                            <?php if ($key->role == 'Direktur' || $key->role == 'Komisaris') { ?>
                                              <button class="btn btn-dark btn-square btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tidak Aktif"><i class="ft-x"></i></button>
                                            <?php } else { ?>
                                              <button class="btn btn-dark btn-square btn-sm" onclick="ubahStatus('<?php echo $key->id_user?>','user/upStatus/','<?php echo $key->status?>','<?php echo $key->nama_user ?>')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tidak Aktif"><i class="ft-x"></i></button>  
                                            <?php } ?>
                                          <?php } else { ?>
                                            <?php if ($key->role == 'Direktur' || $key->role == 'Komisaris') { ?>
                                              <button class="btn btn-success btn-square btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Akun Direktur atau Komisaris selalu aktif"><i class="ft-check"></i></button>
                                            <?php } else { ?>
                                              <button class="btn btn-success btn-square btn-sm" onclick="ubahStatus('<?php echo $key->id_user?>','user/upStatus/','<?php echo $key->status?>','<?php echo $key->nama_user ?>')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Aktif"><i class="ft-check"></i></button>
                                            <?php } ?>
                                          <?php } ?>
                                        </td>
                                        <td><a class="btn btn-warning btn-square btn-sm" href="<?php echo site_url('user/edit/'.$key->id_user) ?>"><i class="ft-edit"></i> Edit</a> | 
                                          <?php if ($key->role == 'Direktur' || $key->role == 'Komisaris') { ?>
                                            <button class="btn btn-danger btn-square btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Akun Direktur atau Komisaris tidak dapat dihapus" readonly=""><i class="ft-delete"></i> Hapus</button>
                                          <?php } else { ?>
                                            <button class="btn btn-danger btn-square btn-sm" onclick="konfir('<?php echo $key->id_user?>','<?php echo $key->nama_user?>')"><i class="ft-delete"></i> Hapus</button>
                                          <?php } ?>
                                    </tr>
                                    <?php } ?>                                                                      
                                    <?php } ?>
                                </tbody>                              
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Tambah Data User</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form" method="POST" action="<?php echo site_url('user/add') ?>">
                        <div class="form-body">

                          <div class="form-group">
                            <label for="eventRegInput1">Nama User</label>
                            <input type="text" id="eventRegInput1" class="form-control" placeholder="Masukkan Nama User" name="nama" value="<?= set_value('nama');?>">
                            <?php echo form_error('nama', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                          </div>
                          <div class="form-group">
                            <label for="eventRegInput">Role</label>          
                            <select class="form-control" name="role">
                              <option selected="" disabled="" value="">-- Pilih Role --</option>
                              <?php foreach ($role as $key) { ?>
                                <?php if ($key->role != "Developer") { ?>
                                  <option value="<?php echo $key->id_role ?>"><?php echo $key->role ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>                                                    
                            <?php echo form_error('role', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="eventRegInput2">Username</label>                            
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="username" value="<?= set_value('username');?>">
                            <?php echo form_error('username', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                          </div>               
                          <div class="form-group">
                            <label for="eventRegInput2">Password</label>                            
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                            <?php echo form_error('password', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
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
<script type="text/javascript">
  function ubahStatus(id,url,status,nama) {   
    $.ajax({
     url: "<?php echo site_url()?>/"+url+id+"/"+status+"/"+nama,
     type: "POST",
     dataType: "JSON",
     success: function(data) {
       location.reload();
     },
     error: function(jqXHR, textStatus, errorThrown) {
      alert("Akun gagal diaktivasi.");       
     }
    });
  }

  function konfir(id,nama) {
    var konf = confirm("Seluruh data user beserta invoicenya akan terhapus, Anda yakin?");
    if(konf == true){
      hapusData(id,nama,'user/hapus/')        
    }        
  }
</script>