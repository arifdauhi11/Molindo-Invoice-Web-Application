    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Laporan Tagihan</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Laporan Tagihan
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
                  <button class="customizer-toggle btn btn-warning pull-right"><i class="ft-filter"></i> Filter</button>
                </div>
                <div class="card-header">                    
                    <h3 class="text-center">
                      <b>
                        <?php if ($id_karyawan) {
                          foreach ($karyawan as $key) {
                            if ($key->id == $id_karyawan) {
                              echo "LAPORAN TAGIHAN ".strtoupper($key->nama_user)." BULAN ".strtoupper($bulan)." ".$thn;
                            }
                          }
                        } else {
                              echo "LAPORAN TAGIHAN BULAN ".strtoupper($bulan)." ".$thn;
                        } ?>
                        <br>
                        <br>
                        MOLINDO NETWORK
                      </b>
                    </h3>                    
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <br>
                    <!-- <center><button class="btn btn-blue" onclick="showBulan()"><i class="ft-clipboard"></i> Laporan Bulanan</button></center>
                    <br> -->
                    <!-- <center><button class="btn btn-blue" onclick="showTahun()"><i class="ft-clipboard"></i> Lihat Laporan</button></center> -->
                </div>
                <div class="card-content">
                    <div class="card-body">                      
                      <table class="table display nowrap table-bordered scroll-horizontal dataTable no-footer">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">No Invoice</th>
                          <th class="text-center">Nama Pelanggan</th>                          
                          <th class="text-center">Bulan</th>
                          <th class="text-center">Iuran</th>
                          <th class="text-center">Ket</th>
                        </tr>
                      </thead>
                      <tbody>      
                      <?php 
                        $no = 1; 
                        $total = 0;
                        foreach ($tagihan as $key) { 
                        $total = $total + $key->iuran;
                        $iuran = "Rp. " . number_format($key->iuran,0,',','.'); ?>                                              
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $key->kd_tagihan ?></td>
                          <td><?php echo $key->nama_pelanggan ?></td>                                                    
                          <td><?php echo $key->periode." ".$key->tahun_tagihan ?></td>                                                    
                          <td><?php echo $iuran ?></td>                                                    
                          <td><?php if ($key->status_tagihan == 'paid') {
                            echo "Lunas";
                          } else if ($key->status_tagihan == 'transfer') {
                            echo "Lunas Transfer";
                          } else {
                            echo "Pending";
                          }  ?></td>                                                    
                        </tr>
                      <?php } $totalIuran = "Rp. " . number_format($total,0,',','.'); ?> 
                        <!-- <tr>
                          <td></td>
                          <td class="text-center" colspan="3"><b>Total<b></td>
                          <td class="text-center"><b><?php echo $totalIuran ?></b></td>
                          <td></td>                          
                        </tr> -->
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th class="text-center" colspan="3">Total</th>
                          <th class="text-center"><b><?php echo $totalIuran ?></b></th>                          
                          <th></th>
                        </tr>
                      </tfoot>
                    </table>
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
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a>
      <!-- <a class="customizer-toggle bg-danger box-shadow-3" href="#"><i class="ft-settings font-medium-3 spinner white"></i></a> -->
        <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">Filter berdasarkan</h4>
        <hr>
        <div>
          <fieldset class="radio">   
              <h4>Bulan</h4>
              <label>
                <input type="radio" name="radioFilter" value="Januari" id="Januari">
                Januari
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Februari">
                Februari
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Maret">
                Maret
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="April">
                April
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Mei">
                Mei
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Juni">
                Juni
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Juli">
                Juli
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Agustus">
                Agustus
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="September">
                September
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Oktober">
                Oktober
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="November">
                November
              </label>
              <br>
              <label>
                <input type="radio" name="radioFilter" value="Desember">
                Desember
              </label>
              <br><br>              
          </fieldset>
          <fieldset class="radio">
            <h4>Tahun</h4>
            <?php foreach ($tahun as $key) { ?>                      
              <label>
                <input type="radio" name="radioFilterTahun" value="<?php echo $key->tahun_anggaran ?>" id="tahunFilter">
                <?php echo $key->tahun_anggaran ?>
              </label>
              <br>
            <?php } ?>
            <br>
          </fieldset>          
          <fieldset class="radio">
            <h4>Karyawan</h4>
            <?php 
              foreach ($karyawan as $key) { 
                if ($this->session->userdata('role') == 'Direktur' || $this->session->userdata('role') == 'Komisaris') { ?>
              <label>
                <input type="radio" name="radioFilterKaryawan" value="<?php echo $key->id ?>" id="karyawanFilter">
                <?php echo $key->nama_user ?>
              </label>
              <br>
            <?php } else {
              if ($userData->nama_user == $key->nama_user) { ?>
              <label>
                <input type="radio" name="radioFilterKaryawan" value="<?php echo $key->id ?>" id="karyawanFilter">
                <?php echo $key->nama_user ?>
              </label>
              <br>
            <?php } } } ?>
          </fieldset>
          <br>
          <center><button class="btn btn-blue" onclick="getByFilter()">Terapkan</button></center>          
        </div>      
      </div>
    </div>
    <script type="text/javascript">
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const bulan = urlParams.get('bulan');      
      const tahun = urlParams.get('tahun');      
      const id = urlParams.get('id_karyawan');      

      function getByFilter() {          
        var radioValue = $("input[name='radioFilter']:checked").val();
        var radioValueTahun = $("input[name='radioFilterTahun']:checked").val();  
        var radioValueKaryawan = $("input[name='radioFilterKaryawan']:checked").val();  
        if ($('[name="radioFilter"]').is(':checked') && $('[name="radioFilterTahun"]').is(':checked') && $('[name="radioFilterKaryawan"]').is(':checked')) {
            window.location = '<?php echo base_url('laporankolektor/laporan_perbulan?bulan=') ?>'+radioValue+'&tahun='+radioValueTahun+'&id_karyawan='+radioValueKaryawan;
          } else if ($('[name="radioFilterKaryawan"]').is(':checked')) {
            window.location = '<?php echo base_url('laporankolektor/laporan_perbulan?bulan=') ?>'+bulan+'&tahun='+tahun+'&id_karyawan='+radioValueKaryawan;
          } else if ($('[name="radioFilter"]').is(':checked') && $('[name="radioFilterTahun"]').is(':checked')) {
            window.location = '<?php echo base_url('laporankolektor/laporan_perbulan?bulan=') ?>'+radioValue+'&tahun='+radioValueTahun;
          } else if ($('[name="radioFilterTahun"]').is(':checked')) {
            window.location = '<?php echo base_url('laporankolektor/laporan_perbulan?bulan=') ?>'+bulan+'&tahun='+radioValueTahun;          
          } else if ($('[name="radioFilter"]').is(':checked')) {
            window.location = '<?php echo base_url('laporankolektor/laporan_perbulan?bulan=') ?>'+radioValue+'&tahun='+tahun;
          }                
      }
    </script>