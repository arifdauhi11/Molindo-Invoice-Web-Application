    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Invoice</h3>
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
                <h4 class="card-title">Buat Invoice</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>                
              </div>
              <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <form id="formInvoice" class="form" method="POST" action="<?php echo base_url('invoice/add_action/'.$pelanggan->id_pelanggan) ?>" enctype="multipart/form-data">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">No. Invoice</label>
                          <div class="row">
                            <div class="col-md-6">
                              <input name="invoice1" class="form-control border-primary pull-right" type="text" placeholder="M2N-GTO.<?php echo date('Y') ?>.INV." disabled="">
                            </div>
                            <div class="col-md-3">
                              <input name="invoice2" class="form-control border-primary pull-right" type="number" value="<?php echo $this->session->userdata('kd_invoice'); ?>" readonly>
                            </div>
                            <div class="col-md-3">
                              <input name="invoice3" class="form-control border-primary pull-right" type="number" value="<?= $jumlahInvoice; ?>" readonly>
                            </div>
                          </div>
                          <?php echo form_error('invoice3', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Nama Pelanggan</label>
                          <input name="namaPL" class="form-control border-primary" type="text" placeholder="Nama Pelanggan" readonly="" value="<?= $pelanggan->nama_pelanggan ?>">
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Alamat Pelanggan</label>
                          <input name="alamatPL" class="form-control border-primary" type="text" placeholder="Alamat Pelanggan" readonly="" value="<?= $pelanggan->alamat_pelanggan ?>">
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Tanggal</label>
                          <input name="tanggal" class="form-control border-primary" type="date" placeholder="Tanggal" value="<?= set_value('tanggal') ?>">
                          <?php echo form_error('tanggal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Tahun</label>
                          <input name="tahun" class="form-control border-primary" type="number" placeholder="Tahun" value="<?= set_value('tahun') ?>">
                          <?php echo form_error('tahun', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Total Tagihan</label>
                          <input type="hidden" id="oldTagihan" value="<?= $pelanggan->iuran; ?>" name="iuranOld">
                          <input id="tagihan" name="tagihan" class="form-control border-primary" type="text" placeholder="Contoh : Rp. 1.000.000" value="<?= $pelanggan->iuran; ?>" readonly>
                          <?php echo form_error('tagihan', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Bulan</label>
                              <select class="select2 form-control border-primary" id="idBulan" multiple="multiple" name="bulan[]" value="<?= set_value('bulan[]');?>" onchange="test()">
                                <optgroup label="Pilih Bulan">
                                  <option value="Januari">Januari</option>
                                  <option value="Februari">Februari</option>
                                  <option value="Maret">Maret</option>
                                  <option value="April">April</option>
                                  <option value="Mei">Mei</option>
                                  <option value="Juni">Juni</option>
                                  <option value="Juli">Juli</option>
                                  <option value="Agustus">Agustus</option>
                                  <option value="September">September</option>
                                  <option value="Oktober">Oktober</option>
                                  <option value="November">November</option>
                                  <option value="Desember">Desember</option>
                                </optgroup>                        
                              </select>                  
                              <?php echo form_error('bulan[]', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>                
                        <div class="form-group">
                          <label for="userinput5">Status Tagihan</label>
                          <fieldset class="radio">
                              <label>
                                <input type="radio" id="radioPending" name="radioPL" value="pending">
                                Pending
                              </label>
                              <br>
                              <label>
                                <input type="radio" id="radioPaid" name="radioPL" value="paid">
                                Lunas
                              </label>
                              <br>
                              <label>
                                <input type="radio" id="radioTransfer" name="radioPL" value="transfer">
                                Lunas Transfer
                              </label>
                          </fieldset>
                          <?php echo form_error('radioPL', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group" id="divBukti">                        
                          <center><h6>Tambah Bukti Transfer</h6></center>
                          <input id="buktiTF" name="buktiTF" class="form-control border-primary" type="file" placeholder="Nama Pelanggan" onchange="loadFile(event)" required="">
                          <p class="badge-default badge-danger block-tag text-left"><small class="block-area white">format gambar harus .png, .jpg, atau .jpeg</small></p>
                        </div>
                        <div class="form-body" id="divPreNPWP">
                          <div class="form-group">
                            <center>
                            <img id="preview" width="350px" height="500px">                          
                            </center>
                          </div>
                        </div>
                      </div>

                      <div class="form-actions right">
                        <button id="idSave" class="btn btn-success mr-1">
                          <i class="ft-save"></i> Save
                        </button>                        
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <script type="text/javascript">   
      
      function test() {
        var oldTagihan = $('#oldTagihan').val();   
        var bu = $('#idBulan').val();
        var tagihan = $('#tagihan').val();
        var count = 0;
        for (i = 0; i < bu.length; i++) {
            count = count + 1;
        }
        $('#tagihan').val(oldTagihan * count);        
      }

      var radios = document.querySelectorAll('input[type=radio][name="radioPL"]');

      function changeHandler(event) {
         if ( this.value === 'transfer' ) {
           $('#buktiTF').attr('required', 'required');
           $('#divBukti').delay('slow').slideDown('slow').delay(4100);
           if ($('#buktiTF').get(0).files.length === 0) {
           } else {
           $('#divPreNPWP').delay('slow').slideDown('slow').delay(4100);            
           }
         } else {
           $('#buktiTF').removeAttr('required');
           $('#divBukti').delay('slow').slideUp('slow').delay(4100);
           $('#divPreNPWP').delay('slow').slideUp('slow').delay(4100);
         }  
      }

      Array.prototype.forEach.call(radios, function(radio) {
         radio.addEventListener('change', changeHandler);
      }); 

      function loadFile(event){
        var image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]);
        $('#divPreNPWP').delay('slow').slideDown('slow').delay(400);
      }     
      
    </script>