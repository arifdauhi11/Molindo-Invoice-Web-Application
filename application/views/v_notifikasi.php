    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Pemberitahuan</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Pemberitahuan
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <ul>
                          <li class="scrollable-container media-list">
                            <?php if ($this->session->userdata('role') == 'Direktur' || $this->session->userdata('role') == 'Komisaris') { ?>
                              <?php if (count($notif) == 0) { ?>                  
                                <center class='mt-3'>Tidak ada notifikasi.</center>
                              <?php } else { ?>
                                <?php foreach ($notif as $key) { ?>
                                  <?php if (date('d') == date('d',strtotime($key->waktu))) { ?> 
                                  <?php if ($key->action == 'delete') { ?>
                                  <!-- <a href="<?php echo site_url('confirm') ?>"> -->
                                  <hr>
                                  <div class="media">
                                    <div class="media-left mr-2 align-self-center"><i class="ft-trash-2 icon-bg-circle bg-red"></i></div>
                                    <div class="media-body">
                                      <h5 class="media-heading">Hapus data! <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> --></h5>
                                      <p class="notification-text font-small-4 text-muted"><?php echo $key->notifikasi ?>.</p>
                                      <?php if ($key->is_confirm == 'no') { ?>
                                        <div class="badge badge-info">Tidak Dikonfirmasi</div>
                                      <?php } else if ($key->is_confirm == 'yes') { ?>                        
                                        <div class="badge badge-success">Telah Dikonfirmasi</div>
                                      <?php } else { ?>
                                        <br>                                      
                                        <a href="<?php echo site_url('notifikasi/confirmHapus/'.$key->id_notifikasi) ?>" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                                        <a class="btn btn-sm btn-warning mt-1 pull-right" href="<?php echo site_url('notifikasi/batalHapusByKaryawan/'.$key->id_notifikasi.'/'.$key->id_data.'/'.$key->data) ?>">Tidak</a>
                                      <?php } ?>
                                      <br>                                      
                                      <small>
                                      <time class="timeago font-small-3 media-meta text-muted" datetime="<?php echo $key->waktu ?>"></time></small>                                      
                                    </div>
                                  </div>
                                  <hr>
                                <!-- </a>                         -->
                                  <?php } else { ?>
                                  <hr>
                                  <div class="media">
                                    <div class="media-left mr-2 align-self-center"><i class="ft-edit icon-bg-circle bg-green"></i></div>
                                    <div class="media-body">
                                      <h5 class="media-heading">Edit data! <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> --></h5>
                                      <p class="notification-text font-small-4 text-muted"><?php echo $key->notifikasi ?>.</p>
                                      <?php if ($key->is_confirm == 'no') { ?>
                                        <div class="badge badge-info">Tidak Diizinkan</div>
                                      <?php } else if ($key->is_confirm == 'yes') { ?>                        
                                        <div class="badge badge-success">Telah Diizinkan</div>
                                      <?php } else { ?>
                                        <br>                                      
                                        <a href="<?php echo site_url('notifikasi/confirmEdit/'.$key->id_notifikasi.'/'.$key->id_data.'/'.$key->data) ?>" class="btn btn-sm btn-primary mt-1">Izinkan</a>
                                        <a class="btn btn-sm btn-warning mt-1 pull-right" href="<?php echo site_url('notifikasi/batalEditByKaryawan/'.$key->id_notifikasi.'/'.$key->id_data.'/'.$key->data) ?>">Tidak</a>
                                      <?php } ?>
                                      <br>                                      
                                      <small>
                                      <time class="timeago font-small-3 media-meta text-muted" datetime="<?php echo $key->waktu ?>"></time></small>                                      
                                    </div>
                                  </div>
                                  <hr>
                                  <?php } ?>                                             
                                <?php } } ?>
                              <?php } ?>                                          
                          <?php } else { ?>
                            <?php if (count($notif) == 0) { ?>                  
                              <center class='mt-3'>Tidak ada notifikasi.</center>
                            <?php } else { ?>
                              <?php foreach ($notif as $key) { 
                                  if (date('d') == date('d', strtotime($key->waktu_karyawan))) { ?>
                                  <?php if ($key->action == 'delete') { ?>
                                  <!-- <a href="<?php echo site_url('confirm') ?>"> -->
                                  <hr>
                                  <div class="media">
                                    <div class="media-left mr-2 align-self-center"><i class="ft-trash-2 icon-bg-circle bg-red"></i></div>
                                    <div class="media-body">
                                      <h5 class="media-heading">Hapus data! <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> --></h5>
                                      <p class="notification-text font-small-4 text-muted"><?php echo $key->notifikasi_karyawan ?>.</p><small>
                                        <?php if ($key->is_confirm == 'no') { ?>
                                        <div class="badge badge-info">Tidak Dikonfirmasi</div>
                                        <?php } else if ($key->is_confirm == 'yes') { ?>                                      
                                          <div class="badge badge-success">Telah Dikonfirmasi</div>
                                        <?php }?>
                                        <br>
                                        <time class="timeago font-small-3 media-meta text-muted" datetime="<?php echo $key->waktu_karyawan ?>"></time></small>
                                        <br>                                      
                                    </div>
                                  </div>
                                  <hr>
                                <!-- </a>                         -->
                                  <?php } else { ?>
                                  <hr>
                                  <div class="media">
                                    <div class="media-left mr-2 align-self-center"><i class="ft-edit icon-bg-circle bg-green"></i></div>
                                    <div class="media-body">
                                      <h5 class="media-heading">Edit data! 
                                        <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> -->
                                      </h5>
                                      <p class="notification-text font-small-4 text-muted"><?php echo $key->notifikasi_karyawan ?>.</p><small>
                                        <?php if ($key->is_confirm == 'no') { ?>
                                        <div class="badge badge-info">Tidak Diizinkan</div>
                                        <?php } else if ($key->is_confirm == 'yes') { ?>                                      
                                          <div class="badge badge-success">Telah Diizinkan</div>
                                          <br>
                                          <a class="btn btn-sm btn-warning mt-1 pull-right" href="<?php echo site_url(''.$key->url) ?>">Edit Sekarang</a>
                                        <?php }?>
                                        <br>
                                        <time class="timeago font-small-3 media-meta text-muted" datetime="<?php echo $key->waktu_karyawan ?>"></time></small>
                                        <br>                                      
                                    </div>
                                  </div>
                                  <hr>
                                  <?php } ?>                                             
                                <?php } }?>
                            <?php } ?>
                          <?php } ?>
                          </li>
                        </ul>
                    </div>
                </div>
              </div>
            </div>            
          </section>
        </div>         
      </div>
    </div>
    <script type="text/javascript">      
    </script>