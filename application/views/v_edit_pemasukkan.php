  <?php $anggaran = "Rp. " . number_format($pemasukkanData->anggaran,0,',','.'); ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Edit Pemasukkan</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Pemasukkan
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
                <h4 class="card-title">Edit Pemasukkan</h4>
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
                    <form id="formInvoice" class="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url('pemasukkan/edit_action/'.$pemasukkanData->id_anggaran) ?>">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Nama Pemasukkan</label>
                          <input name="namaPemasukkan" class="form-control border-primary" type="text" placeholder="Masukkan Nama Pemasukkan" value="<?= $pemasukkanData->masuk ?>">
                          <?php echo form_error('namaPemasukkan', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Tahap</label>
                              <select class="select2 form-control border-primary" name="tahap" value="<?= $pemasukkanData->tahap ?>">
                                <option selected="" disabled=""> --- Pilih Tahap --- </option>
                                  <option value="Tahap 1" <?php echo set_select('tahap','Tahap 1', ( !empty($tahap) && $tahap == "Tahap 1" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 1') {
                                    echo "selected";
                                  } ?>>Tahap 1</option>                                  
                                  <option value="Tahap 2" <?php echo set_select('tahap','Tahap 2', ( !empty($tahap) && $tahap == "Tahap 2" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 2') {
                                    echo "selected";
                                  } ?>>Tahap 2</option>
                                  <option value="Tahap 3" <?php echo set_select('tahap','Tahap 3', ( !empty($tahap) && $tahap == "Tahap 3" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 3') {
                                    echo "selected";
                                  } ?>>Tahap 3</option>
                                  <option value="Tahap 4" <?php echo set_select('tahap','Tahap 4', ( !empty($tahap) && $tahap == "Tahap 4" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 4') {
                                    echo "selected";
                                  } ?>>Tahap 4</option>
                                  <option value="Tahap 5" <?php echo set_select('tahap','Tahap 5', ( !empty($tahap) && $tahap == "Tahap 5" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 5') {
                                    echo "selected";
                                  } ?>>Tahap 5</option>
                                  <option value="Tahap 6" <?php echo set_select('tahap','Tahap 6', ( !empty($tahap) && $tahap == "Tahap 6" ? TRUE : FALSE )); ?><?php if ($pemasukkanData->tahap == 'Tahap 6') {
                                    echo "selected";
                                  } ?>>Tahap 6</option>                                  
                                  <option value="Tahap 7" <?php echo set_select('tahap','Tahap 7', ( !empty($tahap) && $tahap == "Tahap 7" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 7') {
                                    echo "selected";
                                  } ?>>Tahap 7</option>
                                  <option value="Tahap 8" <?php echo set_select('tahap','Tahap 8', ( !empty($tahap) && $tahap == "Tahap 8" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 8') {
                                    echo "selected";
                                  } ?>>Tahap 8</option>
                                  <option value="Tahap 9" <?php echo set_select('tahap','Tahap 9', ( !empty($tahap) && $tahap == "Tahap 9" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 9') {
                                    echo "selected";
                                  } ?>>Tahap 9</option>
                                  <option value="Tahap 10" <?php echo set_select('tahap','Tahap 10', ( !empty($tahap) && $tahap == "Tahap 10" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->tahap == 'Tahap 10') {
                                    echo "selected";
                                  } ?>>Tahap 10</option>
                              </select>                  
                              <?php echo form_error('tahap', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Anggaran</label>
                          <input id="anggaran" name="anggaran" class="form-control border-primary" type="text" placeholder="Masukkan Anggaran" value="<?= $anggaran ?>">
                          <?php echo form_error('anggaran', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="userinput5">Bulan</label>
                              <select class="select2 form-control border-primary" id="bulan" name="bulan" value="<?= $pemasukkanData->bulan ?>">
                                <option selected="" disabled=""> --- Pilih Bulan --- </option>
                                  <option value="Januari" <?php echo set_select('bulan','Januari', ( !empty($bulan) && $bulan == "Januari" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Januari') {
                                    echo "selected";
                                  } ?>>Januari</option>
                                  <option value="Februari" <?php echo set_select('bulan','Februari', ( !empty($bulan) && $bulan == "Februari" ? TRUE : FALSE )); ?><?php if ($pemasukkanData->bulan == 'Februari') {
                                    echo "selected";
                                  } ?>>Februari</option>
                                  <option value="Maret" <?php echo set_select('bulan','Maret', ( !empty($bulan) && $bulan == "Maret" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Maret') {
                                    echo "selected";
                                  } ?>>Maret</option>
                                  <option value="April" <?php echo set_select('bulan','April', ( !empty($bulan) && $bulan == "April" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'April') {
                                    echo "selected";
                                  } ?>>April</option>
                                  <option value="Mei" <?php echo set_select('bulan','Mei', ( !empty($bulan) && $bulan == "Mei" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Mei') {
                                    echo "selected";
                                  } ?>>Mei</option>
                                  <option value="Juni" <?php echo set_select('bulan','Juni', ( !empty($bulan) && $bulan == "Juni" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Juni') {
                                    echo "selected";
                                  } ?>>Juni</option>
                                  <option value="Juli" <?php echo set_select('bulan','Juli', ( !empty($bulan) && $bulan == "Juli" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Juli') {
                                    echo "selected";
                                  } ?>>Juli</option>
                                  <option value="Agustus" <?php echo set_select('bulan','Agustus', ( !empty($bulan) && $bulan == "Agustus" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Agustus') {
                                    echo "selected";
                                  } ?>>Agustus</option>
                                  <option value="September" <?php echo set_select('bulan','September', ( !empty($bulan) && $bulan == "September" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'September') {
                                    echo "selected";
                                  } ?>>September</option>
                                  <option value="Oktober" <?php echo set_select('bulan','Oktober', ( !empty($bulan) && $bulan == "Oktober" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Oktober') {
                                    echo "selected";
                                  } ?>>Oktober</option>
                                  <option value="November" <?php echo set_select('bulan','November', ( !empty($bulan) && $bulan == "November" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'November') {
                                    echo "selected";
                                  } ?>>November</option>
                                  <option value="Desember" <?php echo set_select('bulan','Desember', ( !empty($bulan) && $bulan == "Desember" ? TRUE : FALSE )); ?> <?php if ($pemasukkanData->bulan == 'Desember') {
                                    echo "selected";
                                  } ?>>Desember</option>          
                              </select>                  
                              <?php echo form_error('bulan', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>                                        
                        <div class="form-group">
                          <label for="userinput5">Tahun</label>
                          <input name="tahun" class="form-control border-primary" type="number" placeholder="Masukkan Tahun anggaran" value="<?= $pemasukkanData->tahun_anggaran ?>">
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
                          <img src="<?php echo base_url('assets/images/kwitansi/'.$pemasukkanData->bukti_kwitansi) ?>" id="preview" width="1000px" height="450px">
                          </center>
                        </div>                        
                      </div>

                      <div class="form-actions right">
                        <a href="<?php echo site_url('pemasukkan/?tahun='.date("Y")) ?>" class="btn btn-blue mr-1">
                          <i class="ft-arrow-left"></i> Kembali
                        </a>                        
                        <button type="submit" class="btn btn-success mr-1" onclick="return confirm('Anda yakin ingin mengubah data ini?')">
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
        $('#divPre').delay('slow').slideDown('slow').delay(4100);
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
        $('#divPre').delay('slow').slideUp('slow').slideDown('slow').delay(3000);        
        setTimeout(function(){ 
          var image = document.getElementById('preview');
          image.src = URL.createObjectURL(event.target.files[0]); 
        }, 2000);
      }   
    </script>