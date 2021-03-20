
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Finance</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Finance
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
            <section id="simple-user-cards" class="row">
              <div class="col-12">
                  <h4 class="text-uppercase">List Finance</h4>        
              </div>
              <?php foreach ($finance as $key) { ?>                              
              <div class="col-xl-3 col-md-6 col-12">
                  <div class="card">
                      <div class="text-center">
                          <div class="card-body">
                              <img src="<?php echo base_url('assets/images/profil/'.$key->foto_profil) ?>" class="rounded-circle  height-150" alt="Card image">                              
                              <h4 class="card-title mt-1">Nama : <?php echo $key->nama_user ?></h4>                              
                          </div>
                          <div class="card-body">
                              <img src="<?php echo base_url('assets/images/ttd/'.$key->signature) ?>" class="rounded-circle  height-150" alt="Card image">
                              <?php if ($key->signature == 'default.png') { ?>                                
                              <label>Tanda Tangan belum ada</label>
                              <?php } else { ?>
                              <label>Tanda Tangan sudah ada</label>                              
                              <?php } ?>                              
                          </div>   
                          <div class="card-footer">
                              <?php if ($key->signature == 'default.png') { ?>
                              <p class="mt-1">Silahkan pilih gambar tanda tangan.</p>
                              <?php } else { ?>
                              <p class="mt-1">Ubah gambar tanda tangan.</p>
                              <?php } ?>
                              <br>                                                            
                              <form class="form" method="POST" action="<?php echo site_url('finance/updateSignature/'.$key->id_user."/".$key->signature."/".$key->nama_user) ?>" enctype="multipart/form-data">
                              <input type="file" name="image" required="">
                              <?php if ($key->signature == 'default.png') { ?>
                              <button type="submit" class="btn btn-primary btn-sm mt-1">Simpan</button>
                              <?php } else { ?>
                              <button type="submit" class="btn btn-success btn-sm mt-1">Ubah</button>
                              <?php } ?>                              
                            </form>
                          </div>                       
                      </div>
                  </div>
              </div>
              <?php  } ?>
            </section>
          </div>            
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->    