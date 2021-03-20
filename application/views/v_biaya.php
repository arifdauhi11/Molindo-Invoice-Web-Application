    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Nama Biaya</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Nama Biaya
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
                <div class="card-header">
                    <h4 class="card-title">Data Nama Biaya</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>                    
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th>Nama Biaya</th>
                                    <?php if ($this->session->userdata('role') == 'Finance' || $this->session->userdata('role') == 'Direktur') { ?>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($biaya as $key) { ?>                                    
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $key->nama_biaya ?></td>
                                    <?php if ($this->session->userdata('role') == 'Finance' || $this->session->userdata('role') == 'Direktur') { ?>
                                    <td>
                                      <button class="btn btn-warning btn-square btn-sm" onclick="edit('<?php echo $key->id_biaya ?>')" data-toggle="modal" data-target="#defaultSize"><i class="ft-edit"></i> Edit</button>
                                       | 
                                      <button class="btn btn-danger btn-square btn-sm" onclick="hapusData('<?php echo $key->id_biaya?>','<?php echo $key->nama_biaya?>','biaya/hapus/')"><i class="ft-delete"></i> Hapus</button>
                                    </td>
                                    <?php } ?>
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
    <script type="text/javascript">
      window.onload = function () {
        $('#cardBuatInvoice').hide();        
      }
      function edit(id) {
        $('#form')[0].reset();        
        $.ajax({
         url: "<?php echo site_url('biaya/edit/')?>"+id,
         type: "GET",
         dataType: "JSON",
         success: function(data) {
           // location.reload();
           $('[name="modalIdBiaya"]').val(data.id_biaya);
           $('[name="modalOldName"]').val(data.nama_biaya);
           $('[name="modalNamaBiaya"]').val(data.nama_biaya);
         },
         error: function(jqXHR, textStatus, errorThrown) {
           swal("Gagal", "Gagal mendapatkan data.", "error");
         }
        });
      }

      function save() {
        url = '<?php echo site_url('biaya/update/') ?>';
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
    </script>