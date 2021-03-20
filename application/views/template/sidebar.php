<div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">          
      <li class=" navigation-header"><span data-i18n="nav.category.layouts">MENU</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="MENU"></i>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'dashboard'){ echo "active"; } ?>"><a href="<?php echo site_url('dashboard') ?>"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.changelog.main">Dashboard</span></a>
      </li>
      <?php if ($this->session->userdata('role') == 'Direktur') { ?>        
      <li class=" nav-item <?php if($this->uri->segment(1) == 'user'){ echo "active"; } ?>"><a href="<?php echo site_url('user') ?>"><i class="icon-people"></i><span class="menu-title" data-i18n="nav.changelog.main">User</span></a>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'finance'){ echo "active"; } ?>"><a href="<?php echo site_url('finance') ?>"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="nav.changelog.main">Finance</span></a>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'customerservice'){ echo "active"; } ?>"><a href="<?php echo site_url('customerservice') ?>"><i class="ft-phone-call"></i><span class="menu-title" data-i18n="nav.changelog.main">Customer Service</span></a>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'kolektor'){ echo "active"; } ?>"><a href="<?php echo site_url('kolektor') ?>"><i class="ft-package"></i><span class="menu-title" data-i18n="nav.changelog.main">Kolektor</span></a>
      </li>
      <?php } ?>      
      <li class=" nav-item <?php if($this->uri->segment(1) == 'pelanggan'){ echo "active"; } ?>">
        <a href="#"><i class="ft-users"></i><span class="menu-title" data-i18n="nav.dash.main">Pelanggan</span></a>
        <ul class="menu-content">
          <li><a class="menu-item" href="<?php echo site_url('pelanggan') ?>" data-i18n="nav.dash.project">Aktif</a>
          </li>
          <li><a class="menu-item" href="<?php echo site_url('pelanggan/putus') ?>" data-i18n="nav.dash.analytics">Putus</a>
          </li>
        </ul>
      </li>      
      <?php if ($this->session->userdata('role') != 'Kolektor') {
            if ($this->session->userdata('role') != 'Customer Service') { ?>            
      <li class=" navigation-header"><span data-i18n="nav.category.layouts">MENU FINANCE</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="MENU KEUANGAN"></i>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'biaya'){ echo "active"; } ?>"><a href="<?php echo site_url('biaya') ?>"><i class="icon-wallet"></i><span class="menu-title" data-i18n="nav.changelog.main">Nama Biaya</span></a>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'pemasukkan'){ echo "active"; } ?>"><a href="<?php echo site_url('pemasukkan/?tahun='.date("Y")) ?>"><i class="ft-file-plus"></i><span class="menu-title" data-i18n="nav.changelog.main">Pemasukkan</span></a>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'pengeluaran'){ echo "active"; } ?>"><a href="<?php echo site_url('pengeluaran/?tahun='.date("Y")) ?>"><i class="ft-file-minus"></i><span class="menu-title" data-i18n="nav.changelog.main">Pengeluaran</span></a>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(1) == 'laporan'){ echo "active"; } ?>"><a href="<?php echo site_url('laporan') ?>"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="nav.changelog.main">Laporan</span></a>
      </li>
      <?php } } if ($this->session->userdata('role') != 'Finance' && $this->session->userdata('role') != 'Kolektor') { ?>
      <li class=" navigation-header"><span data-i18n="nav.category.layouts">MENU CUSTOMER SERVICE</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="MENU KEUANGAN"></i>
      </li> 
      <li class=" nav-item <?php if($this->uri->segment(1) == 'laporancs'){ echo "active"; } ?>"><a href="<?php echo site_url('laporancs?tahun='.date("Y")) ?>"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="nav.changelog.main">Laporan</span></a>
      </li>
      <?php } 
      $index = date('n');
      $bulan = '';
      if ($index == '1') {
        $bulan = 'Januari';
      } else if ($index == '2') {
        $bulan = 'Februari';
      } else if ($index == '3') {
        $bulan = 'Maret';
      } else if ($index == '4') {
        $bulan = 'April';
      } else if ($index == '5') {
        $bulan = 'Mei';
      } else if ($index == '6') {
        $bulan = 'Juni';
      } else if ($index == '7') {
        $bulan = 'Juli';
      } else if ($index == '8') {
        $bulan = 'Agustus';
      } else if ($index == '9') {
        $bulan = 'September';
      } else if ($index == '10') {
        $bulan = 'Oktober';
      } else if ($index == '11') {
        $bulan = 'November';
      } else if ($index == '12') {
        $bulan = 'Desember';
      } ?>
      <li class=" navigation-header"><span data-i18n="nav.category.layouts">MENU KOLEKTOR</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="MENU KEUANGAN"></i>
      </li> 
      <li class=" nav-item <?php if($this->uri->segment(2) == 'laporan_perbulan'){ echo "active"; } ?>"><a href="<?php echo site_url('laporankolektor/laporan_perbulan?bulan='.$bulan.'&tahun='.date("Y")) ?>"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="nav.changelog.main">Laporan Perbulan</span></a>
      </li>
      <li class=" nav-item <?php if($this->uri->segment(2) == 'laporan_pertahun'){ echo "active"; } ?>"><a href="<?php echo site_url('laporankolektor/laporan_pertahun?tahun='.date("Y")) ?>"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="nav.changelog.main">Laporan Pertahun</span></a>
      </li>
    </ul>
  </div>
</div>