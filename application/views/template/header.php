<?php header('Access-Control-Allow-Origin: *'); ?>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2020 13:35:04 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title><?php echo $title." | ".$setting->nickname ?></title>
  <link rel="apple-touch-icon" href="<?php echo base_url('assets/app-assets/') ?>images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'.$setting->foto) ?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/vendors.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>vendors/css/forms/selects/select2.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>vendors/css/extensions/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>vendors/css/extensions/zoom.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/app.min.css">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/core/menu/menu-types/vertical-menu.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/core/colors/palette-gradient.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/core/colors/palette-callout.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/pages/users.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/core/colors/palette-tooltip.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/plugins/animate/animate.min.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/') ?>css/style.css">
  <!-- END Custom CSS-->
  <script type="text/javascript">
    var bln;
  </script>
</head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="<?php site_url('') ?>"><img class="brand-logo" alt="robust admin logo" src="<?php echo base_url('assets/') ?><?php echo $setting->foto ?>">
                <h3 class="brand-text"><?php echo $setting->nickname ?></h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>                            
              <!-- <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
                <div class="search-input">
                  <input class="input" type="text" placeholder="Cari ...">
                </div>
              </li> -->
            </ul>
            <ul class="nav navbar-nav float-right">               
              <li class="dropdown dropdown-notification nav-item">
                <?php if ($this->session->userdata('role') != 'Komisaris') { ?>
                <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <?php $jNotif = 0; ?>                  
                  <?php foreach ($notif as $keyNotif) {
                    if ($this->session->userdata('role') == 'Kolektor' || $this->session->userdata('role') == 'Finance' || $this->session->userdata('role') == 'Customer Service') {
                      if (date('d') == date('d', strtotime($keyNotif->waktu_karyawan))) {
                        $jNotif = $jNotif + 1;
                      }                                        
                    } else {                        
                      if ($keyNotif->is_confirm == 'null') {                        
                        $jNotif = $jNotif + 1;
                      }
                    }                      
                  } if ($jNotif != 0) { ?>
                  <span class="badge badge-pill badge-default badge-success badge-default badge-up"><?php 
                      echo $jNotif; 
                  ?>                  
                  </span>
                <?php } ?>
                </a>
                <?php } ?>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Pemberitahuan</span></h6>
                    <?php if ($jNotif != 0) { ?>
                      <span class="notification-tag badge badge-default badge-success float-right m-0"><?php echo $jNotif;?> New</span>
                      </span>
                    <?php } ?>                    
                  </li>
                  <li class="scrollable-container media-list w-100">
                    <?php if ($this->session->userdata('role') == 'Direktur' || $this->session->userdata('role') == 'Komisaris') { ?>
                      <?php if ($jNotif == 0) { ?>                  
                        <center class='mt-3'>Tidak ada pemberitahuan.</center>
                      <?php } else { ?>
                        <?php foreach ($notif as $key) { ?> 
                          <?php if (date('d') == date('d',strtotime($key->waktu))) { ?>
                          <?php if ($key->action == 'delete') { ?>
                          <!-- <a href="<?php echo site_url('confirm') ?>"> -->
                          <div class="media">
                            <div class="media-left align-self-center"><i class="ft-trash-2 icon-bg-circle bg-red"></i></div>
                            <div class="media-body">
                              <h6 class="media-heading">Hapus data! <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> --></h6>
                              <p class="notification-text font-small-3 text-muted"><?php echo $key->notifikasi ?>.</p><small>
                                <time class="timeago media-meta text-muted" datetime="<?php echo $key->waktu ?>"></time></small>
                                <br>
                                <br>
                              <?php if ($key->is_confirm == 'no') { ?>
                                <div class="badge badge-info">Tidak Dikonfirmasi</div>
                              <?php } else if ($key->is_confirm == 'yes') { ?>
                                <br>                                      
                                <div class="badge badge-success">Telah Dikonfirmasi</div>
                              <?php } else { ?>
                                <br>                                      
                                <a href="<?php echo site_url('notifikasi/confirmHapus/'.$key->id_notifikasi) ?>" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                                <a class="btn btn-sm btn-warning mt-1 pull-right" href="<?php echo site_url('notifikasi/batalHapusByKaryawan/'.$key->id_notifikasi.'/'.$key->id_data.'/'.$key->data) ?>">Tidak</a>
                              <?php } ?>                              
                            </div>
                          </div>
                        <!-- </a>                         -->
                          <?php } else { ?>
                          <div class="media">
                            <div class="media-left align-self-center"><i class="ft-edit icon-bg-circle bg-green"></i></div>
                            <div class="media-body">
                              <h6 class="media-heading">Edit data! <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> --></h6>
                              <p class="notification-text font-small-3 text-muted"><?php echo $key->notifikasi ?>.</p><small>
                                <time class="timeago media-meta text-muted" datetime="<?php echo $key->waktu ?>"></time></small>
                                <br>
                                <br>
                              <?php if ($key->is_confirm == 'no') { ?>
                                <div class="badge badge-info">Tidak Diizinkan</div>
                              <?php } else if ($key->is_confirm == 'yes') { ?>
                                <br>                                      
                                <div class="badge badge-success">Telah Diizinkan</div>
                              <?php } else { ?>
                                <br>                                      
                                <a href="<?php echo site_url('notifikasi/confirmEdit/'.$key->id_notifikasi.'/'.$key->id_data.'/'.$key->data) ?>" class="btn btn-sm btn-primary mt-1">Izinkan</a>
                                <a class="btn btn-sm btn-warning mt-1 pull-right" href="<?php echo site_url('notifikasi/batalHapusByKaryawan/'.$key->id_notifikasi.'/'.$key->id_data.'/'.$key->data) ?>">Tidak</a>
                              <?php } ?>                              
                            </div>
                          </div>
                          <?php } } ?>                                             
                        <?php } ?>
                      <?php } ?>                                          
                  <?php } else { ?>
                    <?php if ($jNotif == 0) { ?>                  
                      <center class='mt-3'>Tidak ada pemberitahuan.</center>
                    <?php } else { ?>
                      <?php foreach ($notif as $key) { 
                          if (date('d', strtotime($key->waktu_karyawan)) == date('d')) {
                          ?>
                          <?php if ($key->action == 'delete') { ?>
                          <!-- <a href="<?php echo site_url('confirm') ?>"> -->
                          <div class="media">
                            <div class="media-left align-self-center"><i class="ft-trash-2 icon-bg-circle bg-red"></i></div>
                            <div class="media-body">
                              <h6 class="media-heading">Hapus data! <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> --></h6>
                              <p class="notification-text font-small-3 text-muted"><?php echo $key->notifikasi_karyawan ?>.</p><small>
                                <?php if ($key->is_confirm == 'no') { ?>
                                <div class="badge badge-info">Tidak Dikonfirmasi</div>
                                <?php } else if ($key->is_confirm == 'yes') { ?>                                      
                                  <div class="badge badge-success">Telah Dikonfirmasi</div>
                                <?php }?>
                                <br>
                                <br>                                
                                <time class="timeago font-small-3 media-meta text-muted" datetime="<?php echo $key->waktu_karyawan ?>"></time></small>
                            </div>
                          </div>
                        <!-- </a>                         -->
                          <?php } else { ?>
                          <div class="media">
                            <div class="media-left align-self-center"><i class="ft-edit icon-bg-circle bg-green"></i></div>
                            <div class="media-body">
                              <h6 class="media-heading">Edit data! <!-- <?php echo date("Y-m-d",strtotime($key->waktu)); ?> --></h6>
                              <p class="notification-text font-small-3 text-muted"><?php echo $key->notifikasi_karyawan ?>.</p><small>
                                <?php if ($key->is_confirm == 'no') { ?>
                                <div class="badge badge-info">Tidak Diizinkan</div>
                                <?php } else if ($key->is_confirm == 'yes') { ?>                                      
                                  <div class="badge badge-success">Telah Diizinkan</div>
                                  <br>
                                  <a class="btn btn-sm btn-warning mt-1 pull-right" href="<?php echo site_url(''.$key->url) ?>">Edit Sekarang</a>
                                <?php } ?>
                                <br>
                                <br>                                
                                <time class="timeago font-small-3 media-meta text-muted" datetime="<?php echo $key->waktu_karyawan ?>"></time></small>
                            </div>
                          </div>
                          <?php } } ?>                                             
                        <?php } ?>
                    <?php } ?>
                  <?php } ?>
                  </li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="<?php echo site_url('notifikasi') ?>">Lihat semua pemberitahuan</a></li>
                </ul>
              </li>                                   
              <li class="dropdown dropdown-user nav-item"><a class="nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="<?php echo base_url('assets/images/profil/'.$userData->foto_profil) ?>" alt="avatar"><i></i></span><span class="user-name"><?= $userData->nama_user ?></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo site_url('user/edit/'.$this->session->userdata('id_user')) ?>"><i class="ft-user"></i> Edit Profile</a>                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo site_url('logout') ?>"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

