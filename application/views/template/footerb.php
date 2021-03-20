
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; <?php echo date('Y') ?> <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank"><?php echo $setting->nickname ?></a>, All rights reserved. </span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/extensions/sweetalert.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/extensions/transition.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/extensions/zoom.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/core/app.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/customizer.min.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/modal/components-modal.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/forms/select/form-select2.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/extensions/sweet-alerts.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/tooltip/tooltip.min.js"></script>
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);</script>
    <script type="text/javascript">

      function hapusData(id,nama,url) {
            // console.log(id);
            swal({
            title: "Anda yakin?",
            text: "Data yang anda hapus tidak dapat dikembalikan lagi!",
            icon: "warning",
            showCancelButton: true,
            buttons: {
                        cancel: {
                            text: "Tidak, batalkan!",
                            value: null,
                            visible: true,
                            className: "btn-warning",
                            closeModal: false,
                        },
                        confirm: {
                            text: "Ya, hapus data ini!",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: false
                        }
                }
            }).then(isConfirm => {
                if (isConfirm) {
                    swal({
                      title: "Terhapus!",
                      text: "Data berhasil dihapus.",
                      icon: "success",
                      buttons : {
                        confirm: {
                            text: "Ok",
                            value: true,
                            visible: true,
                            className: "",
                            closeModal: false
                        }
                      }
                    }).then(isConfirm => {
                      $.ajax({
                       url: "<?php echo site_url()?>/"+url+id+"/"+nama,
                       type: "POST",
                       dataType: "JSON",
                       success: function(data) {
                         location.reload();
                       },
                       error: function(jqXHR, textStatus, errorThrown) {
                         swal("Gagal", "Data gagal dihapus.", "error");
                       }
                      });    
                    });
                    
                } else {
                    swal("Dibatalkan", "Data anda aman. :)", "error");
                }
            });
      }        
    </script>
  </body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2020 13:35:04 GMT -->
</html>