    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Pelanggan Putus</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Pelanggan Putus
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
                <div class="card-header">
                    <h4 class="card-title">Data Pelanggan Putus</h4>
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
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Informasi Pemasang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($pelanggan as $key) { ?>                                    
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $key->nama_pelanggan ?></td>
                                    <td><?php if($key->informasi_pemasang == 'instansi'){
                                      echo "Instansi";
                                    } else {
                                      echo "Personal Home";
                                    } ?></td>
                                    <td>                                      
                                      <?php if ($key->informasi_pemasang == 'instansi') { ?>
                                      <a class="btn btn-info btn-square btn-sm" href="<?php echo site_url('pelanggan/detailInstansi/'.$key->id_pelanggan) ?>"><i class="ft-briefcase"></i> Detail Pelanggan</a>
                                      <?php } else { ?>
                                      <a class="btn btn-info btn-square btn-sm" href="<?php echo site_url('pelanggan/detailPH/'.$key->id_pelanggan) ?>"><i class="ft-briefcase"></i> Detail Pelanggan</a> 
                                      <?php } ?>                                      
                                      <?php if ($this->session->userdata('role') == 'Direktur' || $this->session->userdata('role') == 'Finance') { ?>                                        
                                        |
                                      <button class="btn btn-success btn-square btn-sm" onclick="aktif('<?php echo $key->id_pelanggan ?>','<?php echo $key->nama_pelanggan ?>')"><i class="ft-toggle-right"></i> Aktifkan</button>
                                        |
                                      <?php } if ($this->session->userdata('role') == 'Direktur') { ?>
                                      <button class="btn btn-danger btn-square btn-sm" onclick="konfir('<?php echo $key->id_pelanggan?>','<?php echo $key->nama_pelanggan?>')"><i class="ft-delete"></i> Hapus</button>
                                      <?php } else if ($this->session->userdata('role') == 'Finance') { ?>
                                      <button class="btn btn-danger btn-square btn-sm" onclick="hapusPL('<?php echo $key->id_pelanggan?>','<?php echo $key->nama_pelanggan?>','<?php echo $userData->nama_user ?>')"><i class="ft-delete"></i> Hapus</button>
                                      <?php } ?>                                      
                                    </td>
                                </tr>                                  
                                <?php } ?>
                            </tbody>                              
                        </table>
                    </div>
                </div>
              </div>
            </div>            
          </section>
        </div>         
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel18"><i class="ft-edit"></i> Edit Data Pelanggan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="form">
            <div class="form-body">
              <div class="form-group row">
                <label class="col-md-4 label-control" for="projectinput1">Nama Pelanggan</label>
                <input type="hidden" name="idPelanggan">
                <input type="hidden" name="oldName">
                <input type="hidden" name="oldAlamat">
                <input type="hidden" name="oldIuran">
                <div class="col-md-8">
                  <input type="text" id="projectinput1" class="form-control" placeholder="Masukkan Nama Pelanggan" name="namaPelanggan" id="namaPelanggan">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 label-control" for="projectinput1">Alamat Pelanggan</label>
                <div class="col-md-8">
                  <textarea class="form-control" placeholder="Masukkan Alamat Pelanggan" name="alamatPelanggan" id="alamat"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 label-control" for="projectinput1">Iuran</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" placeholder="Masukkan Iuran Pelanggan" name="iuranPelanggan" id="iuranPelanggan">
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
    <script type="text/javascript">

      function edit(id) {
        $('#form')[0].reset();        
        $.ajax({
         url: "<?php echo site_url('pelanggan/edit/')?>"+id,
         type: "GET",
         dataType: "JSON",
         success: function(data) {
           // location.reload();           
           $('[name="idPelanggan"]').val(data.id_pelanggan);
           $('[name="oldName"]').val(data.nama_pelanggan);
           $('[name="oldAlamat"]').val(data.alamat_pelanggan);
           $('[name="oldIuran"]').val(data.iuran);
           $('[name="namaPelanggan"]').val(data.nama_pelanggan);
           $('[name="iuranPelanggan"]').val(data.iuran);
           $('[name="alamatPelanggan"]').val(data.alamat_pelanggan);            
         },
         error: function(jqXHR, textStatus, errorThrown) {
           swal("Gagal", "Gagal mendapatkan data.", "error");
         }
        });
      }

      function save() {
        url = '<?php echo site_url('pelanggan/update/') ?>';
        $.ajax({
          url: url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data) {
            $('#defaultSize').modal('hide');            
            location.reload();
          }, 
        });
      }

      function showCreate(id) {
        $('#formInvoice')[0].reset();        
        $.ajax({
         url: "<?php echo site_url('pelanggan/edit/')?>"+id,
         type: "GET",
         dataType: "JSON",
         success: function(data) {
           // location.reload();
           $('[name="idPL"]').val(data.id_pelanggan);
           $('[name="namaPL"]').val(data.nama_pelanggan);
           $('[name="alamatPL"]').val(data.alamat_pelanggan);
           $('#cardBuatInvoice').show();
         },
         error: function(jqXHR, textStatus, errorThrown) {
           swal("Gagal", "Data gagal dihapus.", "error");
         }
        });        
      }

      function konfir(id,nama) {
        var konf = confirm("Seluruh data pelanggan beserta invoicenya akan terhapus, Anda yakin?");
        if(konf == true){
          hapusData(id,nama,'pelanggan/hapus/')        
        }        
      }    

      function hapusPL(id,namaPL,namaKaryawan) {
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
                   url: "<?php echo site_url()?>/notifikasi/hapusByKaryawan/"+id+"/"+namaPL+'/'+namaKaryawan+'/pelanggan',
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

      function aktif(id,namaPL) {
        $.ajax({
         url: "<?php echo site_url()?>/pelanggan/aktif_action/"+id+"/"+namaPL,
         type: "POST",
         dataType: "JSON",
         success: function(data) {
          swal({
            title: "Sukses",
            text: "Pelanggan telah diaktifkan kembali.",
            icon: "success",                 
            buttons : {
              cancel: {
                  text: "Tidak",
                  value: null,
                  visible: true,
                  className: "btn-warning",
                  closeModal: false,
              },
              confirm: {
                  text: "Lihat",
                  value: true,
                  visible: true,
                  className: "",
                  closeModal: false
              }
            }     
          }).then(isConfirm => {
            if (isConfirm) {
              window.location = '<?php echo site_url('pelanggan/') ?>';
            } else {
              location.reload();
            }
          });                    
          console.log(data);                    
         },
         error: function(jqXHR, textStatus, errorThrown) {
           swal("Gagal", "Data gagal dihapus.", "error");
         }
        });                        
      }           

      function tambahData() {
         window.location = '<?php echo site_url('pelanggan/add_pelanggan') ?>';
       } 

    </script>