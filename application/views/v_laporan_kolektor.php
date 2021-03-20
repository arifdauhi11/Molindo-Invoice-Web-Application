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
                          echo "LAPORAN TAHUN ".$thn;
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
                      <br>
                      <table class="table display nowrap table-bordered scroll-horizontal dataTable no-footer">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pelanggan</th>
                          <th>Iuran</th>
                          <?php for ($i=0; $i < 12; $i++) { 
                            if ($i == 0) { ?>
                              <th class='text-center'>Jan 
                              <button class='btn btn-info btn-sm' onclick='detail("Januari")'>Detail</button></th>
                            <?php } else if ($i == 1) { ?>
                              <th class='text-center'>Feb <button class='btn btn-info btn-sm' onclick='detail("Februari")'>Detail</button></th>
                            <?php } else if ($i == 2) { ?>
                              <th class='text-center'>Mar <button class='btn btn-info btn-sm' onclick='detail("Maret")'>Detail</button></th>
                            <?php } else if ($i == 3) { ?>
                              <th class='text-center'>Apr <button class='btn btn-info btn-sm' onclick='detail("April")'>Detail</button></th>
                            <?php } else if ($i == 4) { ?>
                              <th class='text-center'>Mei <button class='btn btn-info btn-sm' onclick='detail("Mei")'>Detail</button></th>
                            <?php } else if ($i == 5) { ?>
                              <th class='text-center'>Juni <button class='btn btn-info btn-sm' onclick='detail("Juni")'>Detail</button></th>
                            <?php } else if ($i == 6) { ?>
                              <th class='text-center'>Juli <button class='btn btn-info btn-sm' onclick='detail("Juli")'>Detail</button></th>
                            <?php } else if ($i == 7) { ?>
                              <th class='text-center'>Agst <button class='btn btn-info btn-sm' onclick='detail("Agustus")'>Detail</button></th>
                            <?php } else if ($i == 8) { ?>
                              <th class='text-center'>Sept <button class='btn btn-info btn-sm' onclick='detail("September")'>Detail</button></th>
                            <?php } else if ($i == 9) { ?>
                              <th class='text-center'>Okt <button class='btn btn-info btn-sm' onclick='detail("Oktober")'>Detail</button></th>
                            <?php } else if ($i == 10) { ?>
                              <th class='text-center'>Nov <button class='btn btn-info btn-sm' onclick='detail("November")'>Detail</button></th>
                            <?php } else if ($i == 11) { ?>
                              <th class='text-center'>Des <button class='btn btn-info btn-sm' onclick='detail("Desember")'>Detail</button></th>
                            <?php } } ?>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>                        
                        <?php 
                          $totalIuranTahun = 0;
                          $no = 1; foreach ($pelanggan as $key) { 
                          $totalIuranTahun = $totalIuranTahun + $key->iuran;
                          $iuran = "Rp. " . number_format($key->iuran,0,',','.');
                          $iuranByBulan = array();
                          $jan = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Januari',$thn)->row();
                          if ($jan) {
                            if ($jan->iuran) {                              
                              array_push($iuranByBulan, $jan->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $feb = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Februari',$thn)->row();
                          if ($feb) {
                            if ($feb->iuran) {                              
                              array_push($iuranByBulan, $feb->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $mar = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Maret',$thn)->row();
                          if ($mar) {
                            if ($mar->iuran) {                              
                              array_push($iuranByBulan, $mar->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $apr = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'April',$thn)->row();
                          if ($apr) {
                            if ($apr->iuran) {                              
                              array_push($iuranByBulan, $apr->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $mei = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Mei',$thn)->row();
                          if ($mei) {
                            if ($mei->iuran) {                              
                              array_push($iuranByBulan, $mei->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $juni = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Juni',$thn)->row();
                          if ($juni) {
                            if ($juni->iuran) {                              
                              array_push($iuranByBulan, $juni->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $juli = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Juli',$thn)->row();
                          if ($juli) {
                            if ($juli->iuran) {                              
                              array_push($iuranByBulan, $juli->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $ags = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Agustus',$thn)->row();
                          if ($ags) {
                            if ($ags->iuran) {                              
                              array_push($iuranByBulan, $ags->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $sept = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'September',$thn)->row();
                          if ($sept) {
                            if ($sept->iuran) {                              
                              array_push($iuranByBulan, $sept->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $okt = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Oktober',$thn)->row();
                          if ($okt) {
                            if ($okt->iuran) {                              
                              array_push($iuranByBulan, $okt->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $nov = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'November',$thn)->row();
                          if ($nov) {
                            if ($nov->iuran) {                              
                              array_push($iuranByBulan, $nov->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          $des = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,'Desember',$thn)->row();
                          if ($des) {
                            if ($des->iuran) {                              
                              array_push($iuranByBulan, $des->iuran);
                            } else {
                              array_push($iuranByBulan, $key->iuran);
                            }
                          } else {
                            array_push($iuranByBulan, $key->iuran);
                          }
                          ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $key->nama_pelanggan ?></td>
                          <td><?php echo $iuran ?></td>                          
                          <?php for ($i=0; $i < 12; $i++) { 
                            if ($i == 0) {                              
                              if ($jan) {                                
                                if ($jan->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($jan->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($jan->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($jan->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($jan->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 1) {
                              if ($feb) {
                                if ($feb->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($feb->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($feb->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($feb->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($feb->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 2) {
                              if ($mar) {
                                if ($mar->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($mar->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($mar->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($mar->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($mar->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 3) {
                              if ($apr) {
                                if ($apr->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($apr->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($apr->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($apr->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($apr->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 4) {
                              if ($mei) {
                                if ($mei->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($mei->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($mei->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($mei->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($mei->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 5) {
                              if ($juni) {
                                if ($juni->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($juni->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($juni->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($juni->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($juni->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 6) {
                              if ($juli) {
                                if ($juli->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($juli->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($juli->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($juli->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($juli->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 7) {
                              if ($ags) {
                                if ($ags->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($ags->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($ags->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($ags->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($ags->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 8) {
                              if ($sept) {
                                if ($sept->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($sept->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($sept->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($sept->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($sept->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 9) {
                              if ($okt) {
                                if ($okt->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($okt->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($okt->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($okt->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($okt->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 10) {
                              if ($nov) {
                                if ($nov->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($nov->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($nov->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($nov->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($nov->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            } else if ($i == 11) {
                              if ($des) {
                                if ($des->status_tagihan == 'paid') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($des->tgl_tagihan))."<br><badge class='badge badge-success'>Lunas</badge></td>";
                                } else if ($des->status_tagihan == 'transfer') {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($des->tgl_tagihan))."<br><badge class='badge badge-info'>Lunas Transfer</badge></td>";
                                } else {
                                  echo "<td class='text-center'>".date('d F Y',strtotime($des->tgl_tagihan))."<br><badge class='badge badge-warning'>Pending</badge></td>";
                                }                
                              }else{
                                echo "<td class='text-center'><badge class='badge badge-secondary'>Belum Ada Tagihan</badge></td>";
                              }
                            }
                          } ?>
                          <td><?php 
                            $total = 0;
                            foreach ($iuranByBulan as $key) {
                              $total = $total + $key;
                            }
                            $totalIuran = "Rp. " . number_format($total,0,',','.');                            
                            echo $totalIuran; ?></td>                          
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
                          <th colspan="13"></th>                          
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
    <script type="text/javascript">
      function getByThn() {
        var tahun2 = $('#tahunSelect').val();
        window.location = '<?php echo base_url('laporankolektor?tahun=') ?>'+tahun2;
      }

      function detail(bln) {   
        var thn = '<?php echo $thn ?>';
        window.location = '<?php echo base_url('laporancs/detail_perbulan?tahun=') ?>'+thn+'&bulan='+bln;
      }
    </script>