    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Log</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Log
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
            <div class="<?php if($this->session->userdata('role') == 'Kolektor' || $this->session->userdata('role') == 'Direktur'){ 
              echo "col-md-12";
              } else {
              echo "col-md-9";  
              } ?>">
              <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Role</th>
                              <th>Aksi</th>
                              <th>Waktu</th>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;                       
                                $tgl = date('d');          
                                foreach ($log as $key) { ?>                          
                                <tr>
                                  <td style="width: 1px"><?php echo $no++ ?></td>
                                  <td><?php echo $key->nama_user ?></td>
                                  <td><?php echo $key->role ?></td>
                                  <td><?php echo $key->aksi ?></td>
                                  <td style="width: 250px">
                                  <?php 
                                  $date = date_create($key->waktu,timezone_open("Asia/Makassar"));
                                  if (date("F") == date_format($date,"F")) {
                                    $fix = date_format($date,'d') - $tgl;
                                    if ($fix == 0) {
                                      echo "Hari ini jam ".date_format($date,'h:i');
                                    } else if ( $fix == -1) {
                                      echo "Kemarin jam ".date_format($date,'h:i');
                                    } else {
                                      echo abs($fix)." Hari yang lalu jam ".date_format($date,'h:i');
                                    }
                                  }else{                                    
                                    echo date_format($date,'j F Y').' jam '.date_format($date,'h:i');
                                  }
                                  ?>                                    
                                  </td>
                                </tr>
                                <?php } ?>
                            </tbody>                              
                        </table>
                    </div>
                </div>
              </div>
            </div>
            <?php if ($this->session->userdata('role') == 'Finance') { ?>                              
            <div class="col-md-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Tambah Data Nama Biaya</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form" method="POST" action="<?php echo site_url('biaya/add') ?>">
                      <div class="form-body">

                        <div class="form-group">
                          <label for="eventRegInput1">Nama Biaya</label>
                          <input type="text" id="eventRegInput1" class="form-control" placeholder="Masukkan Nama Biaya" name="namaBiaya" value="<?= set_value('namaBiaya');?>">
                          <?php echo form_error('namaBiaya', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                        </div>

                        <button type="submit" class="btn btn-info btn-square">
                          <i class="ft-save"></i> Simpan
                        </button>
                      <!-- <div class="form-actions center">                          
                        
                      </div> -->
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </section>
        </div>         
      </div>
    </div>
    
    <!-- ////////////////////////////////////////////////////////////////////////////-->    