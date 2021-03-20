    <!-- ////////////////////////////////////////////////////////////////////////////-->    

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Sales stats -->
    <div class="row">
      <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
              <div class="card-content">
                  <div class="card-body">
                      <div class="media">
                          <div class="media-body text-left">
                              <h3 class="success"><?php echo count($finance) ?></h3>
                              <span>Finance</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="ft-credit-card success font-large-2 float-right"></i>
                          </div>
                      </div>                      
                  </div>
              </div>
          </div>          
      </div>
      <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
              <div class="card-content">
                  <div class="card-body">
                      <div class="media">
                          <div class="media-body text-left">
                              <h3 class="success"><?php echo count($cs) ?></h3>
                              <span>Customer Service</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="ft-phone-call success font-large-2 float-right"></i>
                          </div>
                      </div>                      
                  </div>
              </div>
          </div>          
      </div>
      <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
              <div class="card-content">
                  <div class="card-body">
                      <div class="media">
                          <div class="media-body text-left">
                              <h3 class="deep-orange"><?php echo count($kolektor) ?></h3>
                              <span>Kolektor</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="ft-package deep-orange font-large-2 float-right"></i>
                          </div>
                      </div>                      
                  </div>
              </div>
          </div>          
      </div>
      <div class="col-xl-3 col-lg-12 col-md-12">
          <div class="card">
              <div class="card-content">
                  <div class="card-body">
                      <div class="media">
                          <div class="media-body text-left">
                              <h3 class="info"><?php echo count($pelanggan) ?></h3>
                              <span>Pelanggan</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="ft-users info font-large-2 float-right"></i>
                          </div>
                      </div>                      
                  </div>
              </div>
          </div>
      </div>      
    </div>
<!-- Konten -->
        <div class="row">
          <?php if ($this->session->userdata('role') == 'Direktur') { ?>                      
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-header">
                  <h4 class="card-title">5 Log Terakhir</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>                  
                </div>  
                <div class="card-content collapse show">
                  <div class="card-body">
                    <table class="table table-bordered">
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
                            echo date_format($date,'j F Y h:i');
                          }
                          ?>                                    
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <div class="text-center">
                    <a class="btn btn-primary" href="<?php echo site_url('log/') ?>">Lihat Semua</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <?php } ?>          
        </div>
      </div>
     </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
</div>