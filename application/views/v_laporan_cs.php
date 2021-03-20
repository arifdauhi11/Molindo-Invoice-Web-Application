    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Laporan</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Laporan
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
              echo "col-md-12";  
              } ?>">
              <div class="card">
                <div class="card-header">
                    <br>                    
                    <h3 class="text-center">
                      <b>
                        <?php if ($thn) { 
                          echo "DETAIL TAGIHAN TAHUN ".$thn." BULAN ".strtoupper($bln);
                        } ?>
                      </b>
                    </h3>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <!-- <center><button class="btn btn-blue" onclick="showBulan()"><i class="ft-clipboard"></i> Laporan Bulanan</button></center>
                    <br> -->
                    <!-- <center><button class="btn btn-blue" onclick="showTahun()"><i class="ft-clipboard"></i> Lihat Laporan</button></center> -->
                </div>
                <div class="card-content">
                    <div class="card-body">
                      <div class="text-center" id="tahunDiv">                        
                          <center>                            
                            <h5>Lihat tahun lainnya.</h5>
                            <div class="col-md-8">
                              <select class="select2" style="width: 200px" onchange="getByThn()" id="tahunSelect">
                                <option selected="" disabled="">-- Pilih Tahun --</option>
                                <?php foreach ($tahun as $key) { 
                                  echo "<option value='$key->tahun_anggaran'>$key->tahun_anggaran</option>";
                                } ?>
                              </select>
                            </div>                            
                          </center>                        
                      </div>
                      <br>
                      <table class="table table-striped table-bordered zero-configuration dataTable">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Nama Pelanggan</th>
                          <th class="text-center">Iuran</th>                          
                        </tr>
                      </thead>
                      <tbody>                        
                        <?php 
                          $totalIuranTahun = 0;
                          $no = 1; foreach ($pelanggan as $key) { 
                          $totalIuranTahun = $totalIuranTahun + $key["iuran"];
                          $iuran = "Rp. " . number_format($key["iuran"],0,',','.');                          
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $no++ ?></td>
                          <td class="text-center"><?php echo $key["nama_pelanggan"] ?></td>
                          <td class="text-center"><?php echo $iuran ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th class="text-center">Total</th>
                          <th class="text-center"><b><?php 
                          $totalIuranTahunFix = "Rp. " . number_format($totalIuranTahun,0,',','.');
                          echo $totalIuranTahunFix ?></b></th>                                                   
                        </tr>
                      </tfoot>
                    </table>
                    </div>
                    <div class="card-body">
                      <button class="btn btn-primary" onclick="goBack()">Kembali</button>
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
      function getByThn() {
        var tahun2 = $('#tahunSelect').val();
        window.location = '<?php echo base_url('laporankolektor?tahun=') ?>'+tahun2;
      }

      function goBack() {
        // window.location.href = "<?php echo site_url('pelanggan') ?>";
        window.history.back();
      }

      function detail() {
        alert('AA');
      }
    </script>