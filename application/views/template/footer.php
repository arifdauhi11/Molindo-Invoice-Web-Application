
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; <?php echo date('Y') ?> <a class="text-bold-800 grey darken-2"><?php echo $setting->nickname ?></a>, All rights reserved. </span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>vendors/js/extensions/sweetalert.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/core/app.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/customizer.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/jquery.timeago.js"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/tables/datatables/datatable-basic.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/forms/select/form-select2.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/extensions/sweet-alerts.min.js"></script>
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/tooltip/tooltip.min.js"></script>
    <!-- Auto Numerik 2 -->
    <script src="<?php echo base_url('assets/app-assets/') ?>js/scripts/jquery.number.js"></script>
    <!-- END PAGE LEVEL JS-->
    <script type="text/javascript">$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);</script>
    <script type="text/javascript">
      window.onload = function () {
        jQuery("time.timeago").timeago();  
        getUrl();            
        $('#divPre').hide();                          
        $('#divBukti').hide();                          
        $('#cardTambahPH').hide();      
        $('#cardTambahInstansi').hide();      
        $('#cardDetailPH').hide();      
        $('#cardDetailInstansi').hide();      
        $('#divPreNPWP').hide();        
        $('#iuranPelanggan').number( true, 0, ',', '.' );     
        $('#iuranInstansi').number( true, 0, ',', '.' );     
        $('#iuranPersonal').number( true, 0, ',', '.' );     
        $('#biayaPemasanganInstansi').number( true, 0, ',', '.' );     
        $('#biayaPemasanganPersonal').number( true, 0, ',', '.' );     
        $('#bTambahan1Personal').number( true, 0, ',', '.' );     
        $('#bTambahan2Personal').number( true, 0, ',', '.' );     
        $('#bTambahan3Personal').number( true, 0, ',', '.' );     
        $('#bTambahan1Instansi').number( true, 0, ',', '.' );     
        $('#bTambahan2Instansi').number( true, 0, ',', '.' );     
        $('#bTambahan3Instansi').number( true, 0, ',', '.' );     
        <?php 
        if ($this->uri->segment(2) == 'edit_pelanggan') {          
        if ($dataBT > 0) {          
        $no4 = 1;
        $no5 = 1;
        foreach ($dataBT as $key) { ?>
        $('#bTambahanPH<?php echo $no4++ ?>').number( true, 0, ',', '.' );                       
        $('#bTambahanInstansi<?php echo $no5++ ?>').number( true, 0, ',', '.' );                       
        <?php } } }?>
        $('#tagihan').number( true, 0, ',', '.' );                                          
        $('#bulanDiv').hide();        
        $('#tahapDiv').hide();      
        console.log(tahun); 
        if (tahun) {
          $('#rowData').show();
        } else {
          $('#rowData').hide();
        }
      }       

      function getUrl() {
        var url = "<?php echo $this->uri->segment(2) ?>";     
        console.log(url);
        if (url == 'add_instansi') {
          $('#cardPH').delay('slow').slideUp('slow').delay(4100);
          $('#cardhPH').hide();
          $('#cardInstansi').delay('slow').slideDown('slow').delay(4100);
        } else if (url == 'add_personal') {
          $('#cardInstansi').delay('slow').slideUp('slow').delay(4100);
          $('#cardInstansi').hide();
          $('#cardPH').delay('slow').slideDown('slow').delay(4100);
        } else if (url == 'add_pelanggan') {
          $('#cardPH').hide();
          $('#cardInstansi').hide();
        }      

      }
      function hapusData(id,nama,url) {
            // console.log(nama);
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
                         console.log(data);
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
      <script type="text/javascript">
        <?php 
        if ($this->uri->segment(2) == 'edit_pelanggan') {
          if ($dataPL->informasi_pemasang == 'instansi') { ?>
          $('#cardTambahPH').delay('slow').slideUp('slow').delay(4100);
          $('#cardTambahPH').hide();
          $('#cardTambahInstansi').delay('slow').slideDown('slow').delay(4100);
          <?php } else { ?>
          $('#cardTambahInstansi').delay('slow').slideUp('slow').delay(4100);
          $('#cardTambahInstansi').hide();
          $('#cardTambahPH').delay('slow').slideDown('slow').delay(4100);
          <?php } } ?>                  
      </script>
  </body>

<!-- Mirrored from pixinvent.com/bootstrap-admin-template/robust/html/ltr/vertical-menu-template/dashboard-ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2020 13:35:04 GMT -->
</html>