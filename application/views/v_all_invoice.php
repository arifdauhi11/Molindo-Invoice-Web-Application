    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Invoice <?= $pelanggan->nama_pelanggan ?></h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Invoice
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
        <div class="row">
          <div class="col-md-12">
            <div class="card buatInvoice" id="cardBuatInvoice">
              <div class="card-header">
                <button class="customizer-toggle btn btn-warning pull-right"><i class="ft-filter"></i> Filter</button>
                <h4 class="card-title">Daftar Invoice</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>                
              </div>
              <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table display nowrap table-bordered scroll-horizontal dataTable no-footer">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Bulan</th>
                          <th>Tahun</th>
                          <th>Status Tagihan</th>
                          <!-- <th>Jumlah Download</th> -->
                          <!-- <th>Jumlah Send Link</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($invoice as $key) { ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $key->periode ?></td>                          
                          <td><?php echo $key->tahun_tagihan ?></td>                          
                          <td>
                            <?php if ($key->status_tagihan == 'paid') { ?>
                              <div class="badge badge-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lunas">Lunas</div>                              
                            <?php } else if($key->status_tagihan == 'transfer'){ ?>
                              <div class="badge badge-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lunas Transfer">Lunas Transfer</div>                              
                            <?php } else { ?>
                              <div class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pending">Pending</div>                              
                            <?php }?>                              
                          </td>                          
                          <!-- <td><?php if ($key->jumlah_download == 0) {
                            echo "Belum pernah di download.";
                          }else{
                            echo $key->jumlah_download." Kali";
                          } ?></td>                           -->
                          <!-- <td><?php if ($key->jumlah_kirim == 0) {
                            echo "Belum pernah di send link.";
                          }else{
                            echo $key->jumlah_kirim." Kali";
                          } ?></td>                           -->
                          <td style="width: 200px">
                            <button class="btn btn-primary btn-sm" onclick="preview('<?php echo $key->id_tagihan ?>')"><i class="ft-airplay"></i> Preview</button>                            
                            <?php if ($this->session->userdata('role') != 'Komisaris') { ?>
                            | 
                            <button class="btn btn-warning btn-square btn-sm" onclick="edit('<?php echo $key->id_tagihan ?>')" data-toggle="modal" data-target="#defaultSize"> Ubah Status Tagihan</button> 
                            <?php if ($key->status_tagihan == 'transfer') { ?>
                            | 
                            <?php if ($key->bukti_transfer) { ?>
                            <button class="btn btn-success btn-square btn-sm" onclick="transfer('<?php echo $key->id_tagihan ?>','<?php echo $key->bukti_transfer ?>')" data-toggle="modal"> Lihat Bukti Transfer</button>  
                            <?php } else { ?>                            
                            <button class="btn btn-info btn-square btn-sm" onclick="tambah('<?php echo $key->id_tagihan ?>')" data-toggle="modal"> Tambah Bukti Transfer</button>
                            <?php } }?>
                            <?php if ($this->session->userdata('role') == "Direktur") { ?> 
                            |                             
                            <button class="btn btn-danger btn-square btn-sm" onclick="hapusData('<?php echo $key->id_tagihan?>','<?php echo $key->nama_invoice?>','invoice/hapus/')"><i class="ft-delete"></i> Hapus</button>
                            <?php } else if ($this->session->userdata('role') == 'Finance' || $this->session->userdata('role') == 'Kolektor' || $this->session->userdata('role') == 'Customer Service') { ?>
                            |
                            <button class="btn btn-danger btn-square btn-sm" onclick="hapusInv('<?php echo $key->id_tagihan?>','<?php echo $key->nama_pelanggan.' bulan '.$key->periode.' tahun '.$key->tahun_tagihan?>','<?php echo $userData->nama_user ?>')"><i class="ft-delete"></i> Hapus</button>
                            <?php } ?>
                            <?php } ?>
                          </td>                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
              </div>
              <div class="card-body">
                <button class="btn btn-primary" onclick="goBack()">Kembali</button>
              </div>
            </div>
          </div>          
          <div class="col-md-12">
            <embed id="preInvoice" type="application/pdf" width="100%" height="800px"></embed>
          </div>                  
        </div>      
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel18"><i class="ft-edit"></i> Ubah Status Tagihan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="form">
            <div class="form-body">
              <div class="form-group row">
                <label class="col-md-4 label-control" for="projectinput1">Status Tagihan</label>
                <input type="hidden" name="modalIdTagihan">
                <input type="hidden" name="modalOldName">
                <input type="hidden" name="modalOldStatus">
                <input type="hidden" name="modalBulan">
                <input type="hidden" name="modalTahun">
                <div class="col-md-8">
                  <select class="form-control" name="modalStatus" id="statusTagihan">
                    <option id="pending" value="pending">Pending</option>
                    <option id="paid" value="paid">Lunas</option>
                    <option id="transfer" value="transfer">Lunas Transfer</option>
                  </select>
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

    <div class="modal fade text-left" id="defaultSizeTransfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
      <div class="modal-lg modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel18"><i class="ft-edit"></i> Bukti Transfer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <center><img id="buktiTF" width="350px" height="500px"></center>          
          <form class="form" method="POST" action="<?php echo site_url('invoice/update_bukti') ?>" enctype="multipart/form-data">
            <div class="form-body">
              <div class="form-group">
                <label for="eventRegInput1">Ubah Bukti Transfer</label>
                <input type="hidden" name="idInvoiceUbah" id="idInvoiceUbah">
                <input name="buktiTFubah" class="form-control border-primary" type="file" placeholder="Nama Pelanggan" onchange="loadFileUpdate(event)" required="">
              </div>
            </div>            
            <center>
              <button type="submit" class="btn btn-info btn-square">
                <i class="ft-edit"></i> Ubah
              </button>            
            </center>
          </form>                  
        </div>
        <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="ft-arrow-left"></i> Batal</button>
        </div>
      </div>
      </div>
    </div>

    <div class="modal fade text-left" id="defaultSizeTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
      <div class="modal-lg modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel18"><i class="ft-plus"></i> Tambah Bukti Transfer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
          <form class="form" method="POST" action="<?php echo site_url('invoice/add_bukti') ?>" enctype="multipart/form-data">
            <div class="form-body">
              <div class="form-group">
                <label for="eventRegInput1">Pilih Bukti Transfer</label>
                <input type="hidden" name="idInvoice" id="idInvoice">
                <input name="buktiTF" class="form-control border-primary" type="file" placeholder="Nama Pelanggan" onchange="loadFile(event)" required="">
              </div>
            </div>
            <div class="form-body" id="divPreNPWP">
              <div class="form-group">
                <center>
                <img id="preview" width="350px" height="500px">                          
                </center>
              </div>
            </div>
            <center>
              <button type="submit" class="btn btn-info btn-square">
                <i class="ft-plus"></i> Tambah
              </button>            
            </center>
          </form>                  
        </div>
        <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal"><i class="ft-arrow-left"></i> Batal</button>
        </div>
      </div>
      </div>
    </div>

    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a>
      <!-- <a class="customizer-toggle bg-danger box-shadow-3" href="#"><i class="ft-settings font-medium-3 spinner white"></i></a> -->
        <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">Filter berdasarkan</h4>
        <hr>
        <div>
          <fieldset class="radio">   
              <h4>Tahun</h4>
              <?php foreach ($tahun as $key) { ?>
                <label>
                  <input type="radio" name="radioFilter1" value="<?php echo $key->tahun_tagihan ?>">
                  <?php echo $key->tahun_tagihan ?>
                </label>
                <br>
              <?php } ?>              
          </fieldset>
          <br>
          <center><button class="btn btn-blue" onclick="getByFilter()">Terapkan</button></center>          
        </div>      
      </div>
    </div>
    <script type="text/javascript">      
      function goBack() {
        // window.location.href = "<?php echo site_url('pelanggan') ?>";
        window.history.back();
      }

      function tambah(id) {
        $('#idInvoice').val(id);                
        $('#defaultSizeTambah').modal('show');        
      }

      function transfer(id,bukti) {
        var base = '<?php echo base_url()?>assets/images/transfer/';
        $('#idInvoiceUbah').val(id);                
        $('#buktiTF').attr("src", base+bukti);        
        $('#defaultSizeTransfer').modal('show');        
      }   

      function loadFile(event){
        var image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]);
        $('#divPreNPWP').delay('slow').slideDown('slow').delay(4100);
      }

      function loadFileUpdate(event){
        var image = document.getElementById('buktiTF');
        image.src = URL.createObjectURL(event.target.files[0]);
        $('#divPreNPWP').delay('slow').slideDown('slow').delay(4100);
      }

      function edit(id) {
        $('#form')[0].reset();        
        $.ajax({
         url: "<?php echo site_url('invoice/edit/')?>"+id,
         type: "GET",
         dataType: "JSON",
         success: function(data) {
           console.log(data);
           $('[name="modalIdTagihan"]').val(data.id_tagihan);
           $('[name="modalOldName"]').val(data.nama_pelanggan);
           $('[name="modalOldStatus"]').val(data.status_tagihan);
           $('[name="modalBulan"]').val(data.periode);
           $('[name="modalTahun"]').val(data.tahun_tagihan);
           $('[name="modalStatus"]').val(data.status_tagihan);
           if (data.status_tagihan == 'paid') {
            document.getElementById("paid").selected = "true";
            document.getElementById("paid").disabled = "true";            
           }else if (data.status_tagihan == 'transfer') {
            document.getElementById("transfer").selected = "true";
            document.getElementById("transfer").disabled = "true";
           }else{
            document.getElementById("pending").selected = "true";
            document.getElementById("pending").disabled = "true";            
           }
         },
         error: function(jqXHR, textStatus, errorThrown) {
           swal("Gagal", "Gagal mendapatkan data.", "error");
         }
        });
      }

      function save() {
        url = '<?php echo site_url('invoice/update/') ?>';
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

      function preview(id) {
        // alert(id);
        var base = '<?php echo base_url()?>assets/pdf/';
        $.ajax({
         url: "<?php echo site_url('invoice/getPdf/')?>"+id,
         type: "GET",
         dataType: "JSON",
         success: function(data) {
            $('#preInvoice').show();        
            $('#preInvoice').attr("src", base+data);
         },
         error: function(jqXHR, textStatus, errorThrown) {
           swal("Gagal", "Data gagal dihapus.", "error");
         }
        });
      }   

      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const tahun = urlParams.get('tahun')      

      function getByFilter() {        
        var radioValue = $("input[name='radioFilter1']:checked").val();  
        if($('[name="radioFilter1"]').is(':checked')){
          if (radioValue == 'Ya') {
            window.location = '<?php echo base_url('invoice/allById/'.$this->uri->segment(3).'/?tahun=') ?>'+radioValue;
          }else{
            window.location = '<?php echo base_url('invoice/allById/'.$this->uri->segment(3).'/?tahun=') ?>'+radioValue;
          }  
        }else{
          alert('Silahkan Pilih Salah Satu Tahun.');
        }        
      }

      function hapusInv(id,namaData,namaKaryawan) {
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
                   url: "<?php echo site_url()?>/notifikasi/hapusByKaryawan/"+id+"/"+namaData+'/'+namaKaryawan+'/invoice',
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
    </script>