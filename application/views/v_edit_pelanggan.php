    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Edit Data Pelanggan</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Data Pelanggan
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
            <div class="card buatInvoice" id="cardTambahPH">
               <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <form id="formInvoicePersonal" class="form" method="POST" action="<?php echo site_url('pelanggan/edit_personal') ?>">
                      <h5>Data Pelanggan</h5> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No KTP</label>
                              <input type="hidden" name="idPelangganPersonal" value="<?= $dataPL->id_pelanggan;?>">
                              <input name="noKtp" class="form-control border-primary" type="number" placeholder="Masukkan No KTP" value="<?= $dataPL->no_ktp ?>">
                              <?php echo form_error('noKtp', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>                                      
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Tanggal Pemasangan</label>
                              <input name="tanggalPemasanganPersonal" class="form-control border-primary" type="date" placeholder="Masukkan Tanggal Pemasangan" value="<?= $dataPL->tanggal_pemasangan ?>">
                              <?php echo form_error('tanggalPemasanganPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>                                      
                        </div>
                      </div>                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Nama Pelanggan</label>
                              <input name="namaPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Nama Pelanggan" value="<?= $dataPL->nama_pelanggan ?>">
                              <?php echo form_error('namaPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Nama Panggilan</label>
                              <input name="namaPersonalPanggilan" class="form-control border-primary" type="text" placeholder="Masukkan Nama Panggilan" value="<?= $dataPL->nama_panggilan ?>">
                              <?php echo form_error('namaPersonalPanggilan', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Alamat Pemasangan</label>
                              <input name="alamatPemasanganPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Alamat Pemasangan" value="<?= $dataPL->alamat_pelanggan ?>">
                              <?php echo form_error('alamatPemasanganPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Pekerjaan</label>
                              <input name="pekerjaan" class="form-control border-primary" type="text" placeholder="Masukkan Pekerjaan" value="<?= $dataPL->pekerjaan ?>">
                              <?php echo form_error('pekerjaan', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                      </div>                      
                      <div class="row">
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kelurahan/Desa</label>
                              <input name="kelurahanDesaPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Kelurahan/Desa" value="<?= $dataPL->kelurahan_desa ?>">
                              <?php echo form_error('kelurahanDesaPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kecamatan</label>
                              <input name="kecamatanPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Kecamatan" value="<?= $dataPL->kecamatan ?>">
                              <?php echo form_error('kecamatanPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kabupaten/Kota</label>
                              <input name="kabupatenKotaPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Kabupaten/Kota" value="<?= $dataPL->kabupaten_kota ?>">
                              <?php echo form_error('kabupatenKotaPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>                          
                        </div>
                        <div class="col-md-6">                                                    
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Provinsi</label>
                              <input name="provinsiPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Provinsi" value="<?= $dataPL->provinsi ?>">
                              <?php echo form_error('provinsiPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>                        
                      </div>
                      <?php $n = 1; 
                            $indexNoHP = 0;
                            $indexKet = 0;
                      foreach ($noHP as $key) { ?>                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon <?php echo $n++ ?></label>
                              <input type="hidden" name="idNoHP[<?php echo $key->id_no_hp ?>]" value="<?php echo $key->id_no_hp ?>">
                              <input name="noHP[<?php echo $indexNoHP++; ?>]" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 1" value="<?= $key->no_hp ?>">
                              <?php echo form_error('noTelp1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                                                                              
                        </div> 
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoHP[<?php echo $indexKet++; ?>]" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 1" value="<?= $key->ket ?>">
                              <?php echo form_error('ketNoTelp1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>                        
                      </div>  
                      <?php } ?>                                                                
                      <hr>
                      <h5>Informasi Paket</h5>                                           
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Paket Internet</label>
                              <input name="paketInternetPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Paket Internet" value="<?= $dataPL->paket_internet ?>">
                              <?php echo form_error('paketInternetPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Iuran</label>
                              <input name="iuranPersonal" class="form-control border-primary" id="iuranPersonal" type="text" placeholder="Masukkan Iuran" value="<?= $dataPL->iuran ?>">
                              <?php echo form_error('iuranPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                      </div>   
                      <hr>
                      <h5>Informasi Biaya</h5>
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Biaya Pemasangan</label>
                          <input id="biayaPemasanganPersonal" name="biayaPemasanganPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Pemasangan" value="<?= $dataPL->biaya_pemasangan ?>">
                          <?php echo form_error('biayaPemasanganPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                        </div>                        
                      </div>
                      <?php $no1 = 1; 
                            $no2 = 1; 
                            $no3 = 1; 
                            $no4 = 1;
                            $indexBiaya = 0;
                            $indexBT = 0;
                      foreach ($dataBT as $key) { ?>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan <?php echo $no1++ ?></label>
                              <input type="hidden" name="idBT[<?php echo $key->id_biaya_tambahan ?>]" value="<?php echo $key->id_biaya_tambahan ?>">
                              <input name="biayaTambahanPH[<?php echo $indexBT++ ?>]" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan <?php echo $no2++ ?>" value="<?php echo $key->biaya_tambahan ?>">
                              <?php echo form_error('biayaTambahan1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahanPH<?php echo $no4++ ?>" name="bTambahanPH[<?php echo $indexBiaya++ ?>]" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan <?php echo $no3++ ?>" value="<?php echo $key->biaya ?>">
                              <?php echo form_error('bTambahan1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                      </div>                         
                      <?php } ?>
                      <div class="form-actions center">                        
                        <button type="button" class="btn btn-primary mr-1" onclick="goBack()">
                          <i class="ft-arrow-left"></i> Kembali
                        </button>                                              
                        <button type="submit" id="btnSave" class="btn btn-success mr-1" onclick="return confirm('Anda yakin ingin mengubah data ini?')">
                          <i class="ft-save"></i> Simpan
                        </button>                                              
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card buatInvoice" id="cardTambahInstansi">              
              <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <form id="formInvoiceInstansi" class="form" method="POST" action="<?php echo site_url('pelanggan/edit_instansi') ?>" enctype="multipart/form-data">                      
                      <h5>Data Instansi</h5> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Nama Instansi</label>
                              <input type="hidden" name="idPelangganInstansi" value="<?= $dataPL->id_pelanggan;?>">
                              <input name="namaInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Instansi" value="<?= $dataPL->nama_pelanggan ?>">
                              <?php echo form_error('namaInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                                      
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Tanggal Pemasangan</label>
                              <input name="tanggalPemasanganInstansi" class="form-control border-primary" type="date" placeholder="Masukkan Tanggal Pemasangan" value="<?= $dataPL->tanggal_pemasangan ?>">
                              <?php echo form_error('tanggalPemasanganInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                                      
                        </div>
                      </div>                                          
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Alamat Pemasangan</label>
                              <input name="alamatPemasanganInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Alamat Pelanggan" value="<?= $dataPL->alamat_pelanggan ?>">
                              <?php echo form_error('alamatPemasanganInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                      </div>                      
                      <div class="row">
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kelurahan/Desa</label>
                              <input name="kelurahanDesaInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Kelurahan/Desa" value="<?= $dataPL->kelurahan_desa ?>">
                              <?php echo form_error('kelurahanDesaInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kecamatan</label>
                              <input name="kecamatanInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Kecamatan" value="<?= $dataPL->kecamatan ?>">
                              <?php echo form_error('kecamatanInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kabupaten/Kota</label>
                              <input name="kabupatenKotaInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Kabupaten/Kota" value="<?= $dataPL->kabupaten_kota ?>">
                              <?php echo form_error('kabupatenKotaInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                          
                        </div>
                        <div class="col-md-6">                                                    
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Provinsi</label>
                              <input name="provinsiInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Provinsi" value="<?= $dataPL->provinsi ?>">
                              <?php echo form_error('provinsiInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>          
                            </div>              
                          </div>
                        </div>                        
                      </div>
                      <?php $n = 1; 
                            $no = 1; 
                            $no1 = 1; 
                            $indexNoHPInstansi = 0;
                            $indexKetInstansi = 0;
                      foreach ($noHP as $key) { ?>                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon <?php echo $n++ ?></label>
                              <input type="hidden" name="idNoHPInstansi[<?php echo $key->id_no_hp ?>]" value="<?php echo $key->id_no_hp ?>">
                              <input name="noHPInstansi[<?php echo $indexNoHPInstansi++; ?>]" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 1" value="<?= $key->no_hp ?>">
                              <?php echo form_error('noTelp1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                                                                              
                        </div> 
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoHPInstansi[<?php echo $indexKetInstansi++; ?>]" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 1" value="<?= $key->ket ?>">
                              <?php echo form_error('ketNoTelp1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>                        
                      </div>  
                      <?php } ?>                                                                
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Foto NPWP</label>
                          <input type="hidden" name="oldNPWP" value="<?php echo $dataPL->npwp ?>">
                          <input name="npwp" class="form-control border-primary" type="file" placeholder="Nama Pelanggan" onchange="loadFile(event)">
                        </div>                        
                      </div>
                      <div class="form-body">
                        <div class="form-group">
                          <center>
                          <img id="preview" width="500px" height="240px" src="<?php echo base_url('assets/images/npwp/'.$dataPL->npwp) ?>">
                          </center>
                        </div>
                      </div>
                      <hr>
                      <h5>Informasi Paket</h5>                                           
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Paket Internet</label>
                              <input name="paketInternetInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Paket Internet" value="<?= $dataPL->paket_internet ?>">
                              <?php echo form_error('paketInternetInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Iuran</label>
                              <input name="iuranInstansi" id="iuranInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Iuran" value="<?= $dataPL->iuran ?>">
                              <?php echo form_error('iuranInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                      </div>   
                      <hr>
                      <h5>Informasi Biaya</h5>
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Biaya Pemasangan</label>
                          <input id="biayaPemasanganInstansi" name="biayaPemasanganInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Pemasangan" value="<?= $dataPL->biaya_pemasangan ?>">
                          <?php echo form_error('biayaPemasanganInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>                        
                      </div>
                      <?php $no1 = 1; 
                      $no2 = 1; 
                      $no3 = 1;
                      $no4 = 1;
                      $indexBTInstansi = 0;
                      $indexBiayaInstansi = 0;
                      foreach ($dataBT as $key) { ?>                                              
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan <?php echo $no1++ ?></label>
                              <input type="hidden" name="idBTInstansi[<?php echo $key->id_biaya_tambahan ?>]" value="<?php echo $key->id_biaya_tambahan ?>">
                              <input name="biayaTambahanInstansi[<?php echo $indexBTInstansi++ ?>]" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan <?php echo $no2++ ?>" value="<?php echo $key->biaya_tambahan ?>">
                              <?php echo form_error('biayaTambahan1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahanInstansi<?php echo $no4++ ?>" name="bTambahanInstansi[<?php echo $indexBiayaInstansi++ ?>]" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan <?php echo $no3++ ?>" value="<?php echo $key->biaya ?>">
                              <?php echo form_error('bTambahan1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                      </div>                         
                      <?php } ?>
                      <div class="form-actions center">                        
                        <button type="button" class="btn btn-primary mr-1" onclick="goBack()">
                          <i class="ft-arrow-left"></i> Kembali
                        </button>                                              
                        <button type="submit" id="btnSaveInstansi" class="btn btn-success mr-1" onclick="return confirm('Anda yakin ingin mengubah data ini?')">
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

      function getUrl() {
        var instansi = "<?php echo $this->uri->segment(2) ?>";
        console.log(instansi);
      }

      function goBack() {
        window.location.href = "<?php echo site_url('pelanggan') ?>";
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