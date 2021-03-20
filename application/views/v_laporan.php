<?php $totalTerpakai = 0;
      $jumlahTakteranggar = 0;      
      $jumlahPemasukkan = 0;
 ?>
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
                    <h4 class="card-title">Lihat Laporan berdasarkan Tahun, Bulan dan Tahap.</h4>                    
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <br>
                    <!-- <center><button class="btn btn-blue" onclick="showBulan()"><i class="ft-clipboard"></i> Laporan Bulanan</button></center>
                    <br> -->
                    <!-- <center><button class="btn btn-blue" onclick="showTahun()"><i class="ft-clipboard"></i> Lihat Laporan</button></center> -->
                </div>
                <div class="card-content">
                    <div class="card-body">
                      <div>
                      <h3 class="text-center">
                        <b>
                          <?php if ($thn) { 
                            echo "LAPORAN TAHUN ".$thn." BULAN ".strtoupper($bulan)." ".strtoupper($tahap);
                          } ?>
                          <br>
                        </b>
                      </h3>
                      </div>
                      <div class="text-center" id="tahunDiv">                        
                          <center>                            
                            <h5>Silahkan pilih tahun.</h5>
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
                      <div class="text-center" id="bulanDiv">                        
                          <center>
                            <h4>Silahkan pilih bulan.</h4>
                            <div class="col-md-8">
                              <select class="select2" style="width: 200px" onchange="getByBulan()" id="bulanSelect">
                                <option selected="" disabled="">-- Pilih Bulan --</option>
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
                              </select>
                            </div>                            
                          </center>                        
                      </div>                      
                      <br>
                      <div class="text-center" id="tahapDiv">                        
                          <center>
                            <h4>Silahkan pilih tahap.</h4>
                            <div class="col-md-8">
                              <select class="select2" style="width: 200px" onchange="getByTahap()" id="tahapSelect">
                                <option selected="" disabled="">-- Pilih Tahap --</option>
                                <option value="Tahap 1">Tahap 1</option>
                                <option value="Tahap 2">Tahap 2</option>
                                <option value="Tahap 3">Tahap 3</option>
                                <option value="Tahap 4">Tahap 4</option>
                                <option value="Tahap 5">Tahap 5</option>
                                <option value="Tahap 6">Tahap 6</option>
                                <option value="Tahap 7">Tahap 7</option>
                                <option value="Tahap 8">Tahap 8</option>
                                <option value="Tahap 9">Tahap 9</option>
                                <option value="Tahap 10">Tahap 10</option>
                              </select>
                            </div>                            
                          </center>                        
                      </div>
                    </div>
                </div>
              </div>
            </div>            
          </section>
          <div class="row" id="rowData">
            <?php if ($pemasukkan) { ?>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Pemasukkan</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10%">No</th>
                            <th>Uraian</th>
                            <th>Anggaran</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; foreach ($pemasukkan as $key) {  
                              $jumlahPemasukkan += $key->anggaran;
                              $anggaran = "Rp. " . number_format($key->anggaran,2,',','.');  
                              $juPema = "Rp. " . number_format($jumlahPemasukkan,2,',','.'); ?>                         
                            <tr>                        
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $key->masuk ?></td>
                              <td><?php echo $anggaran ?></td>
                            </tr>
                          <?php }  ?>
                            <tr>
                              <td colspan="2" class="text-center">Jumlah</td>
                              <td><?php echo $juPema ?></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>  
            <?php } else { ?>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Pemasukkan</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      Belum ada data pemasukkan <?php echo 'Tahun '.$thn.' Bulan '.$bulan.' '.$tahap; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php if ($pengeluaran) {?>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Pengeluaran</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">                    
                      <?php                                         
                      foreach ($biaya as $keyBiaya2) { ?> 
                      <?php 
                      $curr_val = '';
                      for ($i = 0; $i < count($pengeluaran); $i++) { 
                        if ($keyBiaya2->id_biaya == $pengeluaran[$i]->id_biaya) {
                          if ($pengeluaran[$i]->id_biaya != $curr_val) { 
                            $curr_val = $pengeluaran[$i]->id_biaya; ?>
                      <h4><?php echo $keyBiaya2->nama_biaya ?></h4>
                      <?php } } } ?>                                                               
                      <table class="table table-bordered">
                        <thead>
                          <?php 
                          $curr_val = '';
                          for ($i = 0; $i < count($pengeluaran); $i++) { 
                            if ($keyBiaya2->id_biaya == $pengeluaran[$i]->id_biaya) {
                              if ($pengeluaran[$i]->id_biaya != $curr_val) { 
                                $curr_val = $pengeluaran[$i]->id_biaya; ?>
                          <tr>
                            <th>No</th>
                            <th>Uraian</th>
                            <th>Anggaran</th>
                            <th>Terpakai</th>
                            <th>Sisa</th>
                          </tr>
                          <?php } } } ?>                          
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1;                          
                            $jumlahAnggaran = 0;
                            $jumlahTerpakai = 0;
                            $jumlahSisa = 0;
                             foreach ($pengeluaran as $key) { 
                              $anggaran = "Rp. " . number_format($key->anggaran,2,',','.');
                              $terpakai = "Rp. " . number_format($key->terpakai,2,',','.');
                              $sisa = $key->anggaran - $key->terpakai;
                              $sisa2 = "Rp. " . number_format($sisa,2,',','.');                            

                              if ($key->id_biaya == $keyBiaya2->id_biaya) {    

                              $jumlahAnggaran += $key->anggaran;
                              $jumlahTerpakai += $key->terpakai;
                              $jumlahSisa += $sisa;

                              $jAnggaran = "Rp. " . number_format($jumlahAnggaran,2,',','.');
                              $jTerpakai = "Rp. " . number_format($jumlahTerpakai,2,',','.');
                              $jSisa = "Rp. " . number_format($jumlahSisa,2,',','.');

                            ?>
                            <tr>                        
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $key->keluar ?></td>
                              <td><?php echo $anggaran ?></td>
                              <td><?php echo $terpakai ?></td>
                              <td><?php echo $sisa2 ?></td>                            
                            </tr>                                 
                          <?php } } ?>                            
                            <?php 
                            $curr_val = '';
                            for ($i = 0; $i < count($pengeluaran); $i++) { 
                              if ($keyBiaya2->id_biaya == $pengeluaran[$i]->id_biaya) {
                                if ($pengeluaran[$i]->id_biaya != $curr_val) { 
                                  $curr_val = $pengeluaran[$i]->id_biaya; ?>
                            <tr>
                              <td colspan="2" class="text-center">Jumlah</td>
                              <td><?php echo $jAnggaran ?></td>
                              <td><?php echo $jTerpakai ?></td>
                              <td><?php echo $jSisa ?></td>
                            </tr>                                                                                           
                            <?php } } } ?>
                        </tbody>
                      </table>
                      <?php } ?>
                      <table class="table table-bordered">
                        <thead>
                          <?php 
                          $totalAnggaran = 0;                          
                          $totalSisa = 0;
                          foreach ($pengeluaran as $key) {
                             $sisa = $key->anggaran - $key->terpakai;
                             $totalAnggaran += $key->anggaran;
                             $totalTerpakai += $key->terpakai;
                             $totalSisa += $sisa;
                             $tAnggaran = "Rp. " . number_format($totalAnggaran,2,',','.');
                             $tTerpakai = "Rp. " . number_format($totalTerpakai,2,',','.');
                             $tSisa = "Rp. " . number_format($totalSisa,2,',','.');
                           } ?>
                          <tr>                          
                            <th colspan="2" class="text-center">Total</th>
                            <th class="text-center"><?php echo $tAnggaran ?></th>
                            <th class="text-center"><?php echo $tTerpakai ?></th>
                            <th class="text-center"><?php echo $tSisa ?></th>
                          </tr>
                        </thead>
                      </table>
                    </div>                      
                    <!-- <div class="card-body">
                      <?php foreach ($pengeluaranIdBiaya as $keyPIB) {
                        foreach ($biaya as $keyB) {
                          if ($keyB->id_biaya == $keyPIB->id_biaya) { 
                            foreach ($pengeluaran as $p) {
                              echo $keyB->nama_biaya;
                            }?>

                          <h4><?php echo $keyB->nama_biaya ?></h4>
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Uraian</th>
                                <th>Anggaran</th>
                                <th>Terpakai</th>
                                <th>Sisa</th>
                              </tr>
                            </thead>
                          </table>      
                      <?php } } } ?>
                    </div> -->
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Pengeluaran</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">                    
                      Belum ada data pengeluaran <?php echo 'Tahun '.$thn.' Bulan '.$bulan.' '.$tahap; ?> 
                    </div>
                  </div>
                </div>
              </div>
            <?php }?>
            <?php if ($pengeluaranTakteranggar) { ?>
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Dana Terpakai Yang Tidak Teranggarkan</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10%">No</th>
                            <th>Uraian</th>
                            <th>Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; foreach ($pengeluaranTakteranggar as $key) { 
                              $jumlahTakteranggar += $key->anggaran;
                              $total = "Rp. " . number_format($jumlahTakteranggar,2,',','.');
                              $anggaran = "Rp. " . number_format($key->anggaran,2,',','.'); ?>

                            <tr>                        
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $key->keluar ?></td>
                              <td><?php echo $anggaran ?></td>
                            </tr>
                          <?php }  ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="2" class="text-center">TOTAL</th>
                            <th><?php echo $total ?></th>
                          </tr>
                        </tfoot>
                      </table>
                      <br>
                      <!-- <?php if ($totalTerpakai && $jumlahTakteranggar) { ?>                                               -->
                      <table class=" table table-bordered">
                        <?php $jPengeluaran = $totalTerpakai + $jumlahTakteranggar; 
                              $jPemasukkan = $jumlahPemasukkan;
                              $saldoAkhir = $jPemasukkan - $jPengeluaran;
                              $totalPengeluaran = "Rp. " . number_format($jPengeluaran,2,',','.');
                              $totalPemasukkan = "Rp. " . number_format($jPemasukkan,2,',','.');
                              $totalSaldo = "Rp. " . number_format($saldoAkhir,2,',','.');
                        ?>
                        <thead>
                          <tr>
                            <th class="text-center">Jumlah Pemasukkan</th>
                            <th class="text-center"><?php echo $totalPemasukkan ?></th>
                          </tr>
                          <tr>
                            <th class="text-center">Jumlah Pengeluaran</th>
                            <th class="text-center"><?php echo $totalPengeluaran ?></th>
                          </tr>
                          <tr>
                            <th class="text-center">Saldo Akhir</th>
                            <th class="text-center"><?php echo $totalSaldo ?></th>
                          </tr>
                        </thead>
                      </table>
                      <!-- <?php } ?> -->
                    </div>
                  </div>
                </div>
              </div>            
            <?php } else { ?>
              <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Dana Terpakai Yang Tidak Teranggarkan</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    Belum ada data dana terpakai yang tidak teranggarkan <?php echo 'Tahun '.$thn.' Bulan '.$bulan.' '.$tahap; ?>
                    <br>
                    <br>
                    <br>
                    <table class=" table table-bordered">
                      <?php $jPengeluaran = $totalTerpakai + $jumlahTakteranggar; 
                            $jPemasukkan = $jumlahPemasukkan;
                            $saldoAkhir = $jPemasukkan - $jPengeluaran;
                            $totalPengeluaran = "Rp. " . number_format($jPengeluaran,2,',','.');
                            $totalPemasukkan = "Rp. " . number_format($jPemasukkan,2,',','.');
                            $totalSaldo = "Rp. " . number_format($saldoAkhir,2,',','.');
                      ?>
                      <thead>
                        <tr>
                          <th class="text-center">Jumlah Pemasukkan</th>
                          <th class="text-center"><?php echo $totalPemasukkan ?></th>
                        </tr>
                        <tr>
                          <th class="text-center">Jumlah Pengeluaran</th>
                          <th class="text-center"><?php echo $totalPengeluaran ?></th>
                        </tr>
                        <tr>
                          <th class="text-center">Saldo Akhir</th>
                          <th class="text-center"><?php echo $totalSaldo ?></th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                </div>
              </div>
              </div>            
            <?php } ?>                                      
          </div>                        
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
      
      function showBulan() {
        $('#bulanDiv').show();              
        $('#tahunDiv').hide();                
      }

      function showTahun() {
        $('#bulanDiv').hide();              
        $('#tahunDiv').show();        
      }

      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const tahun = urlParams.get('tahun');      
      
      function getByTahun(tahun) {
        if (tahun.length > 4 || tahun.length < 4) {
          alert("Tahun tidak boleh kurang atau lebih dari 4 angka!");
        }else{
          window.location = '<?php echo base_url('pengeluaran/?tahun=') ?>'+tahun;
        }
      }

      function getByBulan(){
        $('#tahapDiv').show();        
      }

      function getByThn() {
        $('#bulanDiv').show();
      }

      function getByTahap() {
        var tahun2 = $('#tahunSelect').val();
        var bulan = $('#bulanSelect').val();
        var tahap = $('#tahapSelect').val();
        window.location = '<?php echo base_url('laporan/?tahun=') ?>'+tahun2+'&bulan='+bulan+'&tahap='+tahap;
      }
      

      function getByFilter() {          
        var radioValue = $("input[name='radioFilter1']:checked").val();  
        var radioValue1 = $("input[name='radioFilter']:checked").val();  
        if($('[name="radioFilter"]').is(':checked')){
          if (radioValue == 'Ya') {
            window.location = '<?php echo base_url('pengeluaran/?tahun=') ?>'+tahun+'&bulan='+radioValue1+'&takteranggarkan='+radioValue;
          }else{
            window.location = '<?php echo base_url('pengeluaran/?tahun=') ?>'+tahun+'&bulan='+radioValue1+'&idBiaya='+radioValue;
          }  
        }else{
          alert('Silahkan Pilih Salah Satu Bulan.');
        }        
      }

    </script>