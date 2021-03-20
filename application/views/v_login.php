<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  
<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/login-with-bg-image.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2020 13:34:58 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title><?php echo "Login | ".$setting->nickname ?></title>
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/app-assets/') ?>images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/'.$setting->foto) ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/app.min.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/app-assets/') ?>css/pages/login-register.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/') ?>css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <h1>MOLINDO INVOICE</h1>
                        <!-- <img src="<?php echo base_url('assets/'.$setting->foto) ?>" alt="branding logo" style="width: 200px; height: 200px"> -->
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Halaman Login</span></h6>
                </div>
                <div class="card-content">
                    <div id="myalert">
                    <?php if ($this->session->flashdata('alert')) {
                      echo $this->session->flashdata('alert');
                    } ?>
                    </div>                    
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo base_url('auth/login') ?>" novalidate method="POST">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" id="user-name" placeholder="Username" required name="username" value="<?= set_value('username') ?>">
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                                <?php echo form_error('username', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="user-password" placeholder="Password" required name="password">
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                                <?php echo form_error('password', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                            
                            </fieldset>
                            <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/core/app.min.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/forms/form-login-register.min.js"></script>
    <script type="text/javascript">$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);</script>
    <!-- END PAGE LEVEL JS-->
  </body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/login-with-bg-image.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2020 13:35:03 GMT -->
</html>