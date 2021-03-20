    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Tambah Data Pelanggan</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Tambah Data Pelanggan
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
          <div class="col-md-6">
            <div class="card">  
              <div class="card-content">                
                <div class="card-body card-dashboard">
                  <h4 class="card-title">Informasi Pemasangan</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>                
                  <select class="select2 form-control border-primary" onchange="loadForm()" id="pilihInfoPemasang">
                    <option selected="" disabled="">Pilih Informasi Pemasangan</option>
                    <option>Instansi</option>
                    <option>Personal Home</option>
                  </select>                  
                </div>
              </div>
            </div>            
          </div>
          <div class="col-md-12">
            <div class="card buatInvoice" id="cardPH">
              <div class="card-header">
                <h3 class="text-center">Tambah Data Pelanggan Personal Home</h3>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>                
              </div>
              <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <form id="formInvoicePersonal" class="form" method="POST" action="<?php echo site_url('pelanggan/add_personal') ?>">
                      <h5>Informasi Marketing</h5>
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Nama Marketing</label>
                          <input name="namaMarketingPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Nama Marketing" value="<?= set_value('namaMarketingPersonal') ?>">
                          <?php echo form_error('namaMarketingPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                        </div>                        
                      </div>                                            
                      <hr>
                      <h5>Data Pelanggan</h5> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No KTP</label>
                              <input name="noKtp" class="form-control border-primary" type="number" placeholder="Masukkan No KTP" value="<?= set_value('noKtp') ?>">
                              <?php echo form_error('noKtp', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>                                      
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Tanggal Pemasangan</label>
                              <input name="tanggalPemasanganPersonal" class="form-control border-primary" type="date" placeholder="Masukkan Tanggal Pemasangan" value="<?= set_value('tanggalPemasanganPersonal') ?>">
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
                              <input name="namaPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Nama Pelanggan" value="<?= set_value('namaPersonal') ?>">
                              <?php echo form_error('namaPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Nama Panggilan</label>
                              <input name="namaPersonalPanggilan" class="form-control border-primary" type="text" placeholder="Masukkan Nama Panggilan" value="<?= set_value('namaPersonalPanggilan') ?>">
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
                              <input name="alamatPemasanganPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Alamat Pemasangan" value="<?= set_value('alamatPemasanganPersonal') ?>">
                              <?php echo form_error('alamatPemasanganPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Pekerjaan</label>
                              <input name="pekerjaan" class="form-control border-primary" type="text" placeholder="Masukkan Pekerjaan" value="<?= set_value('pekerjaan') ?>">
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
                              <input name="kelurahanDesaPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Kelurahan/Desa" value="<?= set_value('kelurahanDesaPersonal') ?>">
                              <?php echo form_error('kelurahanDesaPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kecamatan</label>
                              <input name="kecamatanPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Kecamatan" value="<?= set_value('kecamatanPersonal') ?>">
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
                              <input name="kabupatenKotaPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Kabupaten/Kota" value="<?= set_value('kabupatenKotaPersonal') ?>">
                              <?php echo form_error('kabupatenKotaPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>                          
                        </div>
                        <div class="col-md-6">                                                    
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Provinsi</label>
                              <input name="provinsiPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Provinsi" value="<?= set_value('provinsiPersonal') ?>">
                              <?php echo form_error('provinsiPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>                        
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon 1</label>
                              <input name="noTelp1Personal" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 1" value="<?= set_value('noTelp1Personal') ?>">
                              <?php echo form_error('noTelp1Personal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>                                                                              
                        </div> 
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoTelp1Personal" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 1" value="<?= set_value('ketNoTelp1Personal') ?>">
                              <?php echo form_error('ketNoTelp1Personal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>                        
                      </div>                                            
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon 2</label>
                              <input name="noTelp2Personal" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 2" value="<?= set_value('noTelp2Personal') ?>">
                              <?php echo form_error('noTelp2Personal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>                        
                        <div class="col-md-6"> 
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoTelp2Personal" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 2" value="<?= set_value('ketNoTelp2Personal') ?>">
                              <?php echo form_error('ketNoTelp2Personal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>                        
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon 3</label>
                              <input name="noTelp3Personal" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 3" value="<?= set_value('noTelp3Personal') ?>">
                              <?php echo form_error('noTelp3Personal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>                        
                        <div class="col-md-6"> 
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoTelp3Personal" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 3" value="<?= set_value('ketNoTelp3Personal') ?>">
                              <?php echo form_error('ketNoTelp3Personal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>                        
                      </div> 
                      <hr>
                      <h5>Informasi Paket</h5>                                           
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Paket Internet</label>
                              <input name="paketInternetPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Paket Internet" value="<?= set_value('paketInternetPersonal') ?>">
                              <?php echo form_error('paketInternetPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Iuran</label>
                              <input name="iuranPersonal" class="form-control border-primary" id="iuranPersonal" type="text" placeholder="Masukkan Iuran" value="<?= set_value('iuranPersonal') ?>">
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
                          <input id="biayaPemasanganPersonal" name="biayaPemasanganPersonal" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Pemasangan" value="<?= set_value('biayaPemasanganPersonal') ?>">
                          <?php echo form_error('biayaPemasanganPersonal', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                        </div>                        
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan 1</label>
                              <input name="biayaTambahan1Personal" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan 1" value="<?= set_value('biayaTambahan1Personal') ?>">
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahan1Personal" name="bTambahan1Personal" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan 1" value="<?= set_value('bTambahan1Personal') ?>">
                            </div>                        
                          </div>
                        </div>
                      </div>   
                      <div class="row">
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan 2</label>
                              <input name="biayaTambahan2Personal" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan 2" value="<?= set_value('biayaTambahan2Personal') ?>">
                            </div>                        
                          </div>                          
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahan2Personal" name="bTambahan2Personal" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan 2" value="<?= set_value('bTambahan2Personal') ?>">
                            </div>                        
                          </div>
                        </div>
                      </div>   
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan 3</label>
                              <input name="biayaTambahan3Personal" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan 3" value="<?= set_value('biayaTambahan3Personal') ?>">
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahan3Personal" name="bTambahan3Personal" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan 3" value="<?= set_value('bTambahan3Personal') ?>">
                            </div>                        
                          </div>
                        </div>
                      </div>                         
                      <div class="form-actions center">                        
                        <button type="button" class="btn btn-primary mr-1" onclick="goBack()">
                          <i class="ft-arrow-left"></i> Kembali
                        </button>                                              
                        <button type="submit" id="btnSave" class="btn btn-success mr-1">
                          <i class="ft-save"></i> Simpan
                        </button>                                              
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card buatInvoice" id="cardInstansi">
              <div class="card-header">
                <h3 class="text-center">Tambah Data Pelanggan Instansi</h3>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>                
              </div>
              <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <form id="formInvoiceInstansi" class="form" method="POST" action="<?php echo site_url('pelanggan/add_instansi') ?>" enctype="multipart/form-data">
                      <h5>Informasi Marketing</h5>
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Nama Marketing</label>
                          <input name="namaMarketingInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Marketing" value="<?= set_value('namaMarketingInstansi') ?>">
                          <?php echo form_error('namaMarketingInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>                        
                        </div>
                      </div>                                            
                      <hr>
                      <h5>Data Instansi</h5> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Nama Instansi</label>
                              <input name="namaInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Instansi" value="<?= set_value('namaInstansi'); ?>">
                              <?php echo form_error('namaInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                                      
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Tanggal Pemasangan</label>
                              <input name="tanggalPemasanganInstansi" class="form-control border-primary" type="date" placeholder="Masukkan Tanggal Pemasangan" value="<?= set_value('tanggalPemasanganInstansi') ?>">
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
                              <input name="alamatPemasanganInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Alamat Pelanggan" value="<?= set_value('alamatPemasanganInstansi') ?>">
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
                              <input name="kelurahanDesaInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Kelurahan/Desa" value="<?= set_value('kelurahanDesaInstansi') ?>">
                              <?php echo form_error('kelurahanDesaInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Kecamatan</label>
                              <input name="kecamatanInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Kecamatan" value="<?= set_value('kecamatanInstansi') ?>">
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
                              <input name="kabupatenKotaInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Kabupaten/Kota" value="<?= set_value('kabupatenKotaInstansi') ?>">
                              <?php echo form_error('kabupatenKotaInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                          
                        </div>
                        <div class="col-md-6">                                                    
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Provinsi</label>
                              <input name="provinsiInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Provinsi" value="<?= set_value('provinsiInstansi') ?>">
                              <?php echo form_error('provinsiInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>          
                            </div>              
                          </div>
                        </div>                        
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon 1</label>
                              <input name="noTelp1Instansi" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 1" value="<?= set_value('noTelp1Instansi') ?>">
                              <?php echo form_error('noTelp1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                                                                              
                        </div> 
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoTelp1Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 1" value="<?= set_value('ketNoTelp1Instansi') ?>">
                              <?php echo form_error('ketNoTelp1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>                        
                      </div>                                            
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon 2</label>
                              <input name="noTelp2Instansi" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 2" value="<?= set_value('noTelp2Instansi') ?>">
                              <?php echo form_error('noTelp2Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>                        
                        <div class="col-md-6"> 
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoTelp2Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 2" value="<?= set_value('ketNoTelp2Instansi') ?>">
                              <?php echo form_error('ketNoTelp2Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>                        
                      </div> 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">No Telepon 3</label>
                              <input name="noTelp3Instansi" class="form-control border-primary" type="number" placeholder="Masukkan No Telepon 3" value="<?= set_value('noTelp3Instansi') ?>">
                              <?php echo form_error('noTelp3Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>                        
                        <div class="col-md-6"> 
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Ket</label>
                              <input name="ketNoTelp3Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Keterangan Pemilik No Telepon 3" value="<?= set_value('ketNoTelp3Instansi') ?>">
                              <?php echo form_error('ketNoTelp3Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>                        
                      </div> 
                      <div class="form-body">
                        <div class="form-group">
                          <label for="userinput5">Foto NPWP</label>
                          <input name="npwp" class="form-control border-primary" type="file" placeholder="Nama Pelanggan" onchange="loadFile(event)" required="">
                        </div>                        
                      </div>
                      <div class="form-body" id="divPreNPWP">
                        <div class="form-group">
                          <center>
                          <img id="preview" width="500px" height="240px">                          
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
                              <input name="paketInternetInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Paket Internet" value="<?= set_value('paketInternetInstansi') ?>">
                              <?php echo form_error('paketInternetInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Iuran</label>
                              <input name="iuranInstansi" id="iuranInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Iuran" value="<?= set_value('iuranInstansi') ?>">
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
                          <input id="biayaPemasanganInstansi" name="biayaPemasanganInstansi" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Pemasangan" value="<?= set_value('biayaPemasanganInstansi') ?>">
                          <?php echo form_error('biayaPemasanganInstansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                        </div>                        
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan 1</label>
                              <input name="biayaTambahan1Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan 1" value="<?= set_value('biayaTambahan1Instansi') ?>">
                              <?php echo form_error('biayaTambahan1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahan1Instansi" name="bTambahan1Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan 1" value="<?= set_value('bTambahan1Instansi') ?>">
                              <?php echo form_error('bTambahan1Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                      </div>   
                      <div class="row">
                        <div class="col-md-6">                          
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan 2</label>
                              <input  name="biayaTambahan2Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan 2" value="<?= set_value('biayaTambahan2Instansi') ?>">
                              <?php echo form_error('biayaTambahan2Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>                          
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahan2Instansi" name="bTambahan2Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan 2" value="<?= set_value('bTambahan2Instansi') ?>">
                              <?php echo form_error('bTambahan2Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                      </div>   
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya Tambahan 3</label>
                              <input name="biayaTambahan3Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Nama Biaya Tambahan 3" value="<?= set_value('biayaTambahan3Instansi') ?>">
                              <?php echo form_error('biayaTambahan3Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-body">
                            <div class="form-group">
                              <label for="userinput5">Biaya</label>
                              <input id="bTambahan3Instansi" name="bTambahan3Instansi" class="form-control border-primary" type="text" placeholder="Masukkan Jumlah Biaya Tambahan 3" value="<?= set_value('bTambahan3Instansi') ?>">
                              <?php echo form_error('bTambahan3Instansi', '<p class="badge-default badge-danger block-tag text-left"><small class="block-area white">', '</small></p>'); ?>
                            </div>                        
                          </div>
                        </div>
                      </div>                         
                      <div class="form-actions center">                        
                        <button type="button" class="btn btn-primary mr-1" onclick="goBack()">
                          <i class="ft-arrow-left"></i> Kembali
                        </button>                                              
                        <button type="submit" id="btnSaveInstansi" class="btn btn-success mr-1">
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
          $('#cardPH').delay('slow').slideUp('slow').delay(4100);
          $('#cardPH').hide();
          $('#cardInstansi').delay('slow').slideDown('slow').delay(4100);
        }else{
          $('#cardInstansi').delay('slow').slideUp('slow').delay(4100);
          $('#cardInstansi').hide();
          $('#cardPH').delay('slow').slideDown('slow').delay(4100);
        }
      }

    </script>