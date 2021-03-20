    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Tambah Pemasukkan</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Tambah Pemasukkan
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
                <h4 class="card-title">Tambah Pemasukkan</h4>
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
                    <form id="formInvoice" class="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url('pemasukkan/add_action/') ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Nama Pemasukkan</label>
                          <input name="namaPemasukkan" class="form-control border-primary" type="text" placeholder="Masukkan Nama Pemasukkan" value="<?= set_value('namaPemasukkan') ?>">
                          <?php echo form_error('namaPemasukkan', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Tahap</label>
                              <select class="select2 form-control border-primary" name="tahap" value="<?= set_value('tahap');?>">
                                <option selected="" disabled=""> --- Pilih Tahap --- </option>
                                  <option value="Tahap 1" <?php echo set_select('tahap','Tahap 1', ( !empty($tahap) && $tahap == "Tahap 1" ? TRUE : FALSE )); ?>>Tahap 1</option>                                  
                                  <option value="Tahap 2" <?php echo set_select('tahap','Tahap 2', ( !empty($tahap) && $tahap == "Tahap 2" ? TRUE : FALSE )); ?>>Tahap 2</option>
                                  <option value="Tahap 3" <?php echo set_select('tahap','Tahap 3', ( !empty($tahap) && $tahap == "Tahap 3" ? TRUE : FALSE )); ?>>Tahap 3</option>
                                  <option value="Tahap 4" <?php echo set_select('tahap','Tahap 4', ( !empty($tahap) && $tahap == "Tahap 4" ? TRUE : FALSE )); ?>>Tahap 4</option>
                                  <option value="Tahap 5" <?php echo set_select('tahap','Tahap 5', ( !empty($tahap) && $tahap == "Tahap 5" ? TRUE : FALSE )); ?>>Tahap 5</option>
                                  <option value="Tahap 6" <?php echo set_select('tahap','Tahap 6', ( !empty($tahap) && $tahap == "Tahap 6" ? TRUE : FALSE )); ?>>Tahap 6</option>                                  
                                  <option value="Tahap 7" <?php echo set_select('tahap','Tahap 7', ( !empty($tahap) && $tahap == "Tahap 7" ? TRUE : FALSE )); ?>>Tahap 7</option>
                                  <option value="Tahap 8" <?php echo set_select('tahap','Tahap 8', ( !empty($tahap) && $tahap == "Tahap 8" ? TRUE : FALSE )); ?>>Tahap 8</option>
                                  <option value="Tahap 9" <?php echo set_select('tahap','Tahap 9', ( !empty($tahap) && $tahap == "Tahap 9" ? TRUE : FALSE )); ?>>Tahap 9</option>
                                  <option value="Tahap 10" <?php echo set_select('tahap','Tahap 10', ( !empty($tahap) && $tahap == "Tahap 10" ? TRUE : FALSE )); ?>>Tahap 10</option>
                              </select>                  
                              <?php echo form_error('tahap', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Anggaran</label>
                          <input id="anggaran" name="anggaran" class="form-control border-primary" type="text" placeholder="Masukkan Anggaran" value="<?= set_value('anggaran') ?>">
                          <?php echo form_error('anggaran', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Bulan</label>
                              <select class="select2 form-control border-primary" name="bulan" value="<?= set_value('bulan');?>">
                                <option selected="" disabled=""> --- Pilih Bulan --- </option>
                                  <option value="Januari" <?php echo set_select('bulan','Januari', ( !empty($bulan) && $bulan == "Januari" ? TRUE : FALSE )); ?>>Januari</option>
                                  <option value="Februari" <?php echo set_select('bulan','Februari', ( !empty($bulan) && $bulan == "Februari" ? TRUE : FALSE )); ?>>Februari</option>
                                  <option value="Maret" <?php echo set_select('bulan','Maret', ( !empty($bulan) && $bulan == "Maret" ? TRUE : FALSE )); ?>>Maret</option>
                                  <option value="April" <?php echo set_select('bulan','April', ( !empty($bulan) && $bulan == "April" ? TRUE : FALSE )); ?>>April</option>
                                  <option value="Mei" <?php echo set_select('bulan','Mei', ( !empty($bulan) && $bulan == "Mei" ? TRUE : FALSE )); ?>>Mei</option>
                                  <option value="Juni" <?php echo set_select('bulan','Juni', ( !empty($bulan) && $bulan == "Juni" ? TRUE : FALSE )); ?>>Juni</option>
                                  <option value="Juli" <?php echo set_select('bulan','Juli', ( !empty($bulan) && $bulan == "Juli" ? TRUE : FALSE )); ?>>Juli</option>
                                  <option value="Agustus" <?php echo set_select('bulan','Agustus', ( !empty($bulan) && $bulan == "Agustus" ? TRUE : FALSE )); ?>>Agustus</option>
                                  <option value="September" <?php echo set_select('bulan','September', ( !empty($bulan) && $bulan == "September" ? TRUE : FALSE )); ?>>September</option>
                                  <option value="Oktober" <?php echo set_select('bulan','Oktober', ( !empty($bulan) && $bulan == "Oktober" ? TRUE : FALSE )); ?>>Oktober</option>
                                  <option value="November" <?php echo set_select('bulan','November', ( !empty($bulan) && $bulan == "November" ? TRUE : FALSE )); ?>>November</option>
                                  <option value="Desember" <?php echo set_select('bulan','Desember', ( !empty($bulan) && $bulan == "Desember" ? TRUE : FALSE )); ?>>Desember</option>          
                              </select>                  
                              <?php echo form_error('bulan', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>                                        
                        <div class="form-group">
                          <label for="userinput5">Tahun</label>
                          <input name="tahun" class="form-control border-primary" type="number" placeholder="Masukkan Tahun anggaran" value="<?= set_value('tahun') ?>">
                          <?php echo form_error('tahun', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Bukti Kwitansi</label>                          
                          <input class="form-control" type="file" id="fileBukti" placeholder="Masukkan Nama User" name="image" onchange="loadFile(event)" value="<?= set_value('image') ?>">
                          <?php echo form_error('image', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>                        
                        <div class="form-group" id="divPre">
                          <label for="userinput5">Preview</label>
                          <br>
                          <center>
                          <img id="preview" width="100%" height="450px">
                          </center>
                        </div>                        
                      </div>

                      <div class="form-actions right">
                        <a href="<?php echo site_url('pemasukkan/?tahun='.date("Y")) ?>" class="btn btn-blue mr-1">
                          <i class="ft-arrow-left"></i> Kembali
                        </a>                        
                        <button type="submit" class="btn btn-success mr-1">
                          <i class="ft-save"></i> Simpan
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
      
      window.onload = function () {
        $('#divPre').hide();        
      }

      var rupiah = document.getElementById('anggaran');
      rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });

      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split       = number_string.split(','),
        sisa        = split[0].length % 3,
        rupiah        = split[0].substr(0, sisa),
        ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
   
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
   
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }

      function loadFile(event){
        var image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]);
        $('#divPre').delay('slow').slideDown('slow').delay(4100);
      }      
    </script>