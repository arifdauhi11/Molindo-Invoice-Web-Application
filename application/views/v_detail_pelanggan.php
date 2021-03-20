    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Detail Pelanggan <?= $dataPL->nama_pelanggan ?></h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Detail Pelanggan
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
            <div class="card">                
                <div class="text-center">
                    <div class="card-body">
                        <?php if ($dataPL->informasi_pemasang == 'instansi') { ?>
                          <h4 class="card-title">Nama Instansi : <?= $dataPL->nama_pelanggan ?></h4>
                        <?php } else { ?>
                          <h4 class="card-title">Nama Lengkap : <?= $dataPL->nama_pelanggan ?></h4>                          
                          <h6 class="card-subtitle">Nama Panggilan : <?= $dataPL->nama_panggilan ?></h6>
                          <br>
                        <?php } ?>                        
                        <h6 class="card-subtitle text-muted"><?php if ($dataPL->informasi_pemasang == 'instansi') {
                          echo "Instansi";
                        } else {
                          echo "Personal Home";
                        } ?></h6>
                    </div>                    
                </div>
                <div class="list-group list-group-flush">                    
                    <a data-toggle="collapse" href="#collapse12" aria-expanded="false" aria-controls="collapse12" class="list-group-item">
                      <?php if ($dataPL->informasi_pemasang == 'instansi') { ?>
                        <i class="ft-briefcase">
                      <?php } else { ?>
                        <i class="icon-home">
                      <?php } ?>
                      </i> Informasi <?php if ($dataPL->informasi_pemasang == 'instansi') {
                          echo "Instansi";
                        } else {
                          echo "Pelanggan";
                        } ?></a>
                    <div id="collapse12" role="tabpanel" aria-labelledby="headingCollapse12" class="collapse" aria-expanded="false">
                      <div class="card-content">
                        <div class="card-body">                          
                          <?php if ($dataPL->informasi_pemasang == 'personal') { ?>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">No. KTP</label>
                                  <h4 class="ml-2"><?= $dataPL->no_ktp ?></h4>
                                </div>                        
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Pekerjaan</label>
                                  <h4 class="ml-2"><?= $dataPL->pekerjaan ?></h4>
                                </div>                        
                              </div>                                      
                            </div>
                          </div>    
                          <?php } ?>                                                                
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Alamat Pemasangan</label>
                                  <h4 class="ml-2"><?= $dataPL->alamat_pelanggan ?></h4>
                                </div>                        
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Tanggal Pemasangan</label>
                                  <?php $month = date('n',strtotime($dataPL->tanggal_pemasangan));
                                    if ($month == '1') {
                                      $month = 'Januari';
                                    } else if ($month == '2') {
                                      $month = 'Februari';
                                    } else if ($month == '3') {
                                      $month = 'Maret';
                                    } else if ($month == '4') {
                                      $month = 'April';
                                    } else if ($month == '5') {
                                      $month = 'Mei';
                                    } else if ($month == '6') {
                                      $month = 'Juni';
                                    } else if ($month == '7') {
                                      $month = 'Juli';
                                    } else if ($month == '8') {
                                      $month = 'Agustus';
                                    } else if ($month == '9') {
                                      $month = 'September';
                                    } else if ($month == '10') {
                                      $month = 'Oktober';
                                    } else if ($month == '11') {
                                      $month = 'November';
                                    } else if ($month == '12') {
                                      $month = 'Desember';
                                    } ?>
                                  <h4 class="ml-2"><?php echo date('j ',strtotime($dataPL->tanggal_pemasangan)).$month.date(' Y',strtotime($dataPL->tanggal_pemasangan));?></h4>
                                </div>                        
                              </div>                                      
                            </div>
                          </div>                                                                    
                          <div class="row">
                            <div class="col-md-6">                          
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Kelurahan/Desa</label>
                                  <h4 class="ml-2"><?= $dataPL->kelurahan_desa ?></h4>
                                </div>                        
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Kecamatan</label>
                                  <h4 class="ml-2"><?= $dataPL->kecamatan ?></h4>
                                </div>                        
                              </div>                          
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Kabupaten/Kota</label>
                                  <h4 class="ml-2"><?= $dataPL->kabupaten_kota ?></h4>
                                </div>                        
                              </div>                          
                            </div>
                            <div class="col-md-6">                                                    
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Provinsi</label>
                                  <h4 class="ml-2"><?= $dataPL->provinsi ?></h4>
                                </div>              
                              </div>
                            </div>                        
                          </div>
                          <?php $hpNO = 1; foreach ($noHP as $key) { ?>                                              
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">No Telepon <?= $hpNO++ ?></label>
                                  <h4 class="ml-2"><?= $key->no_hp ?></h4>
                                </div>                        
                              </div>                                                                              
                            </div> 
                            <div class="col-md-6">                          
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Ket</label>
                                  <h4 class="ml-2"><?= $key->ket ?></h4>
                                </div>                        
                              </div>
                            </div>                        
                          </div>                            
                          <?php } ?>
                          <?php if ($dataPL->informasi_pemasang == 'instansi') { ?>
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5" class="ml-2">Foto NPWP</label>                          
                            </div>                        
                          </div>
                          <div class="form-body">
                            <div class="form-group">
                              <img class="ml-1" width="500px" height="240px" src="<?php echo base_url('assets/images/npwp/'.$dataPL->npwp) ?>">
                            </div>
                          </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <a data-toggle="collapse" href="#collapse13" aria-expanded="false" aria-controls="collapse13" class="list-group-item"><i class="ft-package"></i> Informasi Paket</a>
                    <div id="collapse13" role="tabpanel" aria-labelledby="headingCollapse13" class="collapse" aria-expanded="false">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Paket Internet</label>
                                  <h4 class="ml-2"><?= $dataPL->paket_internet ?></h4>
                                </div>                        
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Iuran</label>
                                  <h4 class="ml-2"><?php $iuran = "Rp. " . number_format($dataPL->iuran,0,',','.'); echo $iuran; ?></h4>
                                </div>                        
                              </div>
                            </div>
                          </div>   
                        </div>
                      </div>
                    </div>
                    <a data-toggle="collapse" href="#collapse14" aria-expanded="false" aria-controls="collapse14" class="list-group-item"> <i class="ft-credit-card"></i> Informasi Biaya</a>
                    <div id="collapse14" role="tabpanel" aria-labelledby="headingCollapse14" class="collapse" aria-expanded="false" style="height: 0px;">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Biaya Pemasangan</label>                                  
                                </div>                        
                              </div>  
                            </div>
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <h4 class="ml-2"><?php $bp = "Rp. " . number_format($dataPL->biaya_pemasangan,0,',','.'); echo $bp; ?></h4>
                                </div>                        
                              </div>
                            </div>
                          </div>                                                  
                          <?php $noBT = 1; foreach ($dataBT as $key) { ?>                                              
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Biaya Tambahan <?= $noBT++ ?></label>
                                  <?php if ($key->biaya_tambahan == '') { ?>
                                    <h4 class="ml-2">Tidak Ada</h4>
                                  <?php } else { ?>
                                    <h4 class="ml-2"><?= $key->biaya_tambahan ?></h4>
                                  <?php } ?>
                                </div>                        
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-body">
                                <div class="form-group">
                                  <label for="userinput5" class="ml-2">Biaya</label>
                                  <h4 class="ml-2"><?php $biaya = "Rp. " . number_format($key->biaya,0,',','.'); echo $biaya; ?></h4>
                                </div>                        
                              </div>
                            </div>
                          </div>                         
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card-body">
                  <button class="btn btn-primary" onclick="goBack()">Kembali</button>
                </div>
            </div>            
          </div>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <script type="text/javascript">   

      function getUrl() {
        var instansi = "<?php echo $this->uri->segment(2) ?>";
        console.log(instansi);
      }

      function goBack() {
        // window.location.href = "<?php echo site_url('pelanggan') ?>";
        window.history.back();
      }
      
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

      function loadFile(event){
        var image = document.getElementById('preview');
        image.src = URL.createObjectURL(event.target.files[0]);
        $('#divPreNPWP').delay('slow').slideDown('slow').delay(4100);
      }

      function loadForm() {
        var info = $('#pilihInfoPemasang').find(":selected").text();
        $('#infoPemasangInstansi').val(info);
        if (info == 'Instansi') {
          $('#cardTambahPH').delay('slow').slideUp('slow').delay(4100);
          $('#cardTambahPH').hide();
          $('#cardTambahInstansi').delay('slow').slideDown('slow').delay(4100);
        }else{
          $('#cardTambahInstansi').delay('slow').slideUp('slow').delay(4100);
          $('#cardTambahInstansi').hide();
          $('#cardTambahPH').delay('slow').slideDown('slow').delay(4100);
        }
      }

    </script>