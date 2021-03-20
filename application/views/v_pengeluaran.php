    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Pengeluaran</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Pengeluaran
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
              echo "col-md-12";  
              } ?>">
              <div class="card">
                <div class="card-header">
                    <button class="customizer-toggle btn btn-warning pull-right"><i class="ft-filter"></i> Filter</button>
                    <h4 class="card-title">Data Pengeluaran Tahun <?php echo $thn;?></h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <br>
                    <?php if ($this->session->userdata('role') == 'Finance') { ?>                      
                      <a class="btn btn-blue" href="<?php echo site_url('pengeluaran/add') ?>"><i class="ft-plus-square"></i> Tambah Pengeluaran</a>
                    <?php } ?>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                      <div class="text-center">                        
                        <?php if ($pengeluaran) { ?>
                          <h4><blockquote>Pilih tahun lainnya :</blockquote></h4>
                          <center>
                            <div class="col-sm-2">
                              <input type="number" class="form-control" onchange="getByTahun(this.value)">
                            </div>                            
                          </center>
                        <?php } else { ?>
                          <h4>
                            <blockquote class="blockquote">
                              <?php if ($bulan) {
                                if ($idBiaya) {
                                  echo "Belum ada data pengeluaran tahun ".$thn." bulan ".$bulan." ".$tahap." dengan nama biaya ".$namaBiaya;
                                } else {
                                  echo "Belum ada data pengeluaran tahun ".$thn." bulan ".$bulan." ".$tahap." untuk dana yang tidak teranggarkan.";
                                }
                              } else {
                                echo "Belum ada data pengeluaran tahun ".$thn.".";
                              }  ?>
                            </blockquote>
                          </h4>
                          <br>                          
                          <h4><blockquote>Pilih tahun lainnya :</blockquote></h4>
                          <center>
                            <div class="col-sm-2">
                              <input type="number" class="form-control" onchange="getByTahun(this.value)">
                            </div>                            
                          </center>
                        <?php } ?>
                      </div>                      
                    </div>
                </div>
              </div>
            </div>            
          </section>
          <div class="row">
            <?php $no = 1; foreach ($pengeluaran as $key) {
              $anggaran = "Rp. " . number_format($key->anggaran,2,',','.');
              $terpakai = "Rp. " . number_format($key->terpakai,2,',','.');
            ?>                                    
            <div class="col-lg-6 col-md-12 mt-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="card-title text-center" style="font-size: 20px"><?php if ($key->takteranggarkan == 'Ya') {
                              echo 'Dana Terpakai Yang Tidak Teranggarkan';
                            } else {
                              $biaya = '';
                              foreach ($biayaData as $keyBiaya) {
                                if ($key->id_biaya == $keyBiaya->id_biaya) {
                                  $biaya = $keyBiaya->nama_biaya;
                                }
                              }
                              echo $biaya;
                            } ?></h3>
                            <hr>
                            <h4 class="card-title text-center" style="font-size: 16px"><?php echo $key->keluar ?></h4>
                            <p class="card-text" style="font-size: 16px">Anggaran : <span class="float-right badge border-left-success badge-striped" style="font-size: 16px"><?php echo $anggaran ?></span></p>
                            <p class="card-text" style="font-size: 16px">Anggaran Terpakai : <span class="float-right badge border-left-success badge-striped" style="font-size: 16px"><?php echo $terpakai ?></span></p>
                            <p class="card-text" style="font-size: 16px">Tahap : <span class="float-right badge border-left-success badge-striped" style="font-size: 16px"><?php echo $key->tahap ?></span></p>
                            <p class="card-text" style="font-size: 16px">Bulan : <span class="float-right badge border-left-success badge-striped" style="font-size: 16px"><?php echo $key->bulan ?></span></p>
                            <p class="card-text" style="font-size: 16px">Tahun : <span class="float-right badge border-left-success badge-striped" style="font-size: 16px"><?php echo $key->tahun_anggaran ?></span></p>
                        </div>
                    </div>          
                    <?php if ($this->session->userdata('role') == "Direktur" || $this->session->userdata('role') == 'Finance') { ?>                      
                    <div class="card-footer text-muted">
                        <?php if ($this->session->userdata('role') == "Direktur") { ?>                                                  
                        <a class="btn btn-warning btn-sm" href="<?php echo site_url('pengeluaran/edit/'.$key->id_anggaran) ?>"><i class="ft-edit"></i> Edit</a>
                        <button class="float-right btn btn-danger btn-sm" onclick="hapusData('<?php echo $key->id_anggaran?>','<?php echo $key->keluar?>','pengeluaran/hapus/')"><i class="ft-trash"></i> Hapus</button>
                        <?php } else { ?>
                        <button class="btn btn-warning btn-sm" onclick="editP('<?php echo $key->id_anggaran?>','<?php echo $key->keluar.' '.$key->tahap.' bulan '.$key->bulan.' tahun '.$key->tahun_anggaran?>','<?php echo $userData->nama_user ?>')"><i class="ft-edit"></i> Edit</button>
                        <button class="float-right btn btn-danger btn-sm" onclick="hapusP('<?php echo $key->id_anggaran?>','<?php echo $key->keluar.' '.$key->tahap.' bulan '.$key->bulan.' tahun '.$key->tahun_anggaran?>','<?php echo $userData->nama_user ?>')"><i class="ft-delete"></i> Hapus</button>
                        <?php } ?>
                    </div>
                    <?php } ?>                      
                </div>
            </div>
            <?php } ?>
          </div>                        
        </div>         
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel18"><i class="ft-edit"></i> Edit Nama Biaya</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="form">
            <div class="form-body">
              <div class="form-group row">
                <label class="col-md-4 label-control" for="projectinput1">Nama Biaya</label>
                <input type="hidden" name="modalIdBiaya">
                <input type="hidden" name="modalOldName">
                <div class="col-md-8">
                  <input type="text" id="projectinput1" class="form-control" placeholder="Masukkan Nama Biaya" name="modalNamaBiaya" id="modalNamaBiaya">
                </div>
              </div>              
            </div>
          </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="ft-arrow-left"></i> Batal</button>
        <button type="submit" class="btn btn-outline-success" onclick="save()"><i class="ft-save"></i> Simpan</button>
        </div>
      </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a>
      <!-- <a class="customizer-toggle bg-danger box-shadow-3" href="#"><i class="ft-settings font-medium-3 spinner white"></i></a> -->
        <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">Filter berdasarkan</h4>
        <hr>
        <div>
          <fieldset class="radio">   
              <h4>Tahap</h4>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 1">
                Tahap 1 
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 2">
                Tahap 2
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 3">
                Tahap 3
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 4">
                Tahap 4
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 5">
                Tahap 5
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 6">
                Tahap 6
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 7">
                Tahap 7
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 8">
                Tahap 8
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 9">
                Tahap 9
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilterTahap" value="Tahap 10">
                Tahap 10
              </label>
              <br>              
          </fieldset>
          <fieldset class="radio">   
              <h4>Nama Biaya</h4>
              <?php foreach ($biayaData as $key) { ?>
                <label>
                  <input type="radio" name="radioFilter1" value="<?php echo $key->id_biaya ?>">
                  <?php echo $key->nama_biaya ?>
                </label>
                <br>
              <?php } ?>
              <h4>Bulan</h4>
              <label>
                <input type="radio" name="radioFilter" value="Januari" id="Januari">
                Januari
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Februari">
                Februari
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Maret">
                Maret
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="April">
                April
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Mei">
                Mei
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Juni">
                Juni
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Juli">
                Juli
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Agustus">
                Agustus
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="September">
                September
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Oktober">
                Oktober
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="November">
                November
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Desember">
                Desember
              </label>
              <br><br>
              <label>
                <input type="radio" name="radioFilter1" value="Ya">
                Dana Terpakai Yang Tidak Teranggarkan
              </label>          
          </fieldset>
          <br>
          <center><button class="btn btn-blue" onclick="getByFilter()">Terapkan</button></center>          
        </div>      
      </div>
    </div>
    <script type="text/javascript">
      
      function getByTahun(tahun) {
        if (tahun.length > 4 || tahun.length < 4) {
          alert("Tahun tidak boleh kurang atau lebih dari 4 angka!");
        }else{
          window.location = '<?php echo base_url('pengeluaran/?tahun=') ?>'+tahun;
        }
      }
      
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const tahun = urlParams.get('tahun')      

      function getByFilter() {        
        var radioValue = $("input[name='radioFilter1']:checked").val();  
        var radioValue1 = $("input[name='radioFilter']:checked").val();  
        var radioValueTahap = $("input[name='radioFilterTahap']:checked").val();  
        if($('[name="radioFilter"]').is(':checked')){
          if($('[name="radioFilterTahap"]').is(':checked')){
            if($('[name="radioFilter1"]').is(':checked')){
              if (radioValue == 'Ya') {
                window.location = '<?php echo base_url('pengeluaran/?tahun=') ?>'+tahun+'&bulan='+radioValue1+'&tahap='+radioValueTahap+'&takteranggarkan='+radioValue;
              }else{
                window.location = '<?php echo base_url('pengeluaran/?tahun=') ?>'+tahun+'&bulan='+radioValue1+'&tahap='+radioValueTahap+'&idBiaya='+radioValue;
              }
            }else{
              alert('Silahkan Pilih Salah Satu Nama Biaya atau Dana Terpakai Yang Tidak Teranggarkan.');  
            }            
          }else{
            alert('Silahkan Pilih Salah Satu Tahap.');  
          }            
        }else{
          alert('Silahkan Pilih Salah Satu Bulan.');
        }        
      }

      function hapusP(id,namaData,namaKaryawan) {
        swal({
            title: "Anda yakin?",
            text: "Data yang anda hapus tidak dapat dikembalikan lagi!\n Data akan terhapus setelah di konfirmasi oleh Direktur.",
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
                  $.ajax({
                   url: "<?php echo site_url()?>/notifikasi/hapusByKaryawan/"+id+"/"+namaData+'/'+namaKaryawan+'/pengeluaran',
                   type: "POST",
                   dataType: "JSON",
                   success: function(data) {
                    swal({
                      title: "Sukses",
                      text: "Tunggu notifikasi bahwa data yang dihapus telah dikonfirmasi.",
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
                      location.reload();
                    });                    
                     // console.log(data);                    
                   },
                   error: function(jqXHR, textStatus, errorThrown) {
                     swal("Gagal", "Data gagal dihapus.", "error");
                   }
                  });                        
                } else {
                    swal("Dibatalkan", "Data anda aman. :)", "error");
                }
            });

        $('#' + id). attr("disabled", true);
        $('#btn' + id). hide();

        console.log(id);
      }

      function editP(id,namaData,namaKaryawan) {
        $.ajax({
         url: "<?php echo site_url()?>/notifikasi/editByKaryawan/"+id+"/"+namaData+'/'+namaKaryawan+'/pengeluaran',
         type: "POST",
         dataType: "JSON",
         success: function(data) {
          swal({
            title: "Sukses",
            text: "Tunggu notifikasi bahwa data yang ingin diedit telah dikonfirmasi.",
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
            location.reload();
          });                    
           // console.log(data);                    
         },
         error: function(jqXHR, textStatus, errorThrown) {
           swal("Gagal", "Permintaan edit data gagal.", "error");
         }
        });
      }
    </script>