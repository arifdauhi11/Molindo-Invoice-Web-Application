<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pelanggan');
		if (!$this->session->userdata('id_user')) {
            return redirect(base_url('auth/'));
        }	
	}

	public function index()
	{
		$data["title"] = "Pemberitahuan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["biaya"] = $this->m_biaya->getAll('t_biaya')->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_notifikasi', $data);
		$this->load->view('template/footer', $data);		
	}

	public function hapusByKaryawan($id,$namaData,$namaKaryawan,$tipe)
	{
		$idUser = $this->session->userdata('id_user');
		$namaFix = str_replace("%20"," ",$namaData);
		$namaK = str_replace("%20"," ",$namaKaryawan);
		$cekNotif = $this->m_notifikasi->cekNotifByIdUserAndIdData($idUser,$id,'delete')->row();
		if ($cekNotif) {
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-warning callout-border-left mt-1 p-1">
                <strong>Gagal!</strong>
                <p>Permintaan untuk menghapus data '.$namaFix.' yang sebelumnya belum di konfirmasi .</p>
            </div>');
            echo json_encode(array("status" => true));        			
		}else{
			if ($tipe == 'pelanggan') {
				$gtlotz = new DateTimeZone('Asia/Makassar');		
				$waktu = new DateTime();
				$waktu->setTimezone($gtlotz);
				$data = array(
					'id_data' => $id,
					'id_user' => $idUser,
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'inactive',
					'action' => 'delete',
					'is_confirm' => 'null',
					'notifikasi' => 'Data pelanggan '.$namaFix.' ingin dihapus oleh '.$namaK,
					'waktu' => $waktu->format('Y-m-d\TH:i:s.u'),
					'data' => $tipe
				);						
			}

			if ($tipe == 'pengeluaran') {
				$gtlotz = new DateTimeZone('Asia/Makassar');		
				$waktu = new DateTime();
				$waktu->setTimezone($gtlotz);
				$data = array(
					'id_data' => $id,
					'id_user' => $idUser,
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'inactive',
					'action' => 'delete',
					'is_confirm' => 'null',
					'notifikasi' => 'Data pengeluaran '.$namaFix.' ingin dihapus oleh '.$namaK,
					'waktu' => $waktu->format('Y-m-d\TH:i:s.u'),
					'data' => $tipe
				);						
			}

			if ($tipe == 'pemasukkan') {
				$gtlotz = new DateTimeZone('Asia/Makassar');		
				$waktu = new DateTime();
				$waktu->setTimezone($gtlotz);
				$data = array(
					'id_data' => $id,
					'id_user' => $idUser,
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'inactive',
					'action' => 'delete',
					'is_confirm' => 'null',
					'notifikasi' => 'Data pemasukkan '.$namaFix.' ingin dihapus oleh '.$namaK,
					'waktu' => $waktu->format('Y-m-d\TH:i:s.u'),
					'data' => $tipe
				);						
			}

			if ($tipe == 'invoice') {
				$gtlotz = new DateTimeZone('Asia/Makassar');		
				$waktu = new DateTime();
				$waktu->setTimezone($gtlotz);
				$data = array(
					'id_data' => $id,
					'id_user' => $idUser,
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'inactive',
					'action' => 'delete',
					'is_confirm' => 'null',
					'notifikasi' => 'Data invoice '.$namaFix.' ingin dihapus oleh '.$namaK,
					'waktu' => $waktu->format('Y-m-d\TH:i:s.u'),
					'data' => $tipe
				);						
			}			
			$this->m_notifikasi->tambahNotifikasi($data);
			echo json_encode(array("status" => true));        			
		}
	}

	public function editByKaryawan($id,$namaData,$namaKaryawan,$tipe)
	{
		$idUser = $this->session->userdata('id_user');
		$namaFix = str_replace("%20"," ",$namaData);
		$namaK = str_replace("%20"," ",$namaKaryawan);
		$cekNotif = $this->m_notifikasi->cekNotifByIdUserAndIdData($idUser,$id,'update')->row();
		if ($cekNotif) {
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-warning callout-border-left mt-1 p-1">
                <strong>Gagal!</strong>
                <p>Permintaan untuk mengedit data '.$namaFix.' yang sebelumnya belum di konfirmasi .</p>
            </div>');
            echo json_encode(array("status" => true));
		} else {
			if ($tipe == 'pemasukkan') {
				$gtlotz = new DateTimeZone('Asia/Makassar');		
				$waktu = new DateTime();
				$waktu->setTimezone($gtlotz);
				$data = array(
					'id_data' => $id,
					'id_user' => $idUser,
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'inactive',
					'action' => 'update',
					'is_confirm' => 'null',
					'notifikasi' => 'Data pemasukkan '.$namaFix.' ingin diedit oleh '.$namaK,
					'waktu' => $waktu->format('Y-m-d\TH:i:s.u'),
					'data' => $tipe,
					'url' => 'pemasukkan/edit/'.$id
				);						
			}

			if ($tipe == 'pengeluaran') {
				$gtlotz = new DateTimeZone('Asia/Makassar');		
				$waktu = new DateTime();
				$waktu->setTimezone($gtlotz);
				$data = array(
					'id_data' => $id,
					'id_user' => $idUser,
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'inactive',
					'action' => 'update',
					'is_confirm' => 'null',
					'notifikasi' => 'Data pengeluaran '.$namaFix.' ingin diedit oleh '.$namaK,
					'waktu' => $waktu->format('Y-m-d\TH:i:s.u'),
					'data' => $tipe,
					'url' => 'pengeluaran/edit/'.$id
				);						
			}

			if ($tipe == 'pelanggan') {
				$gtlotz = new DateTimeZone('Asia/Makassar');		
				$waktu = new DateTime();
				$waktu->setTimezone($gtlotz);
				$data = array(
					'id_data' => $id,
					'id_user' => $idUser,
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'inactive',
					'action' => 'update',
					'is_confirm' => 'null',
					'notifikasi' => 'Data pelanggan '.$namaFix.' ingin diedit oleh '.$namaK,
					'waktu' => $waktu->format('Y-m-d\TH:i:s.u'),
					'data' => $tipe,
					'url' => 'pelanggan/edit_pelanggan/'.$id
				);						
			}
			$this->m_notifikasi->tambahNotifikasi($data);
			echo json_encode(array("status" => true));
		}
	}

	public function batalHapusByKaryawan($id,$idData,$tipe)
	{								
		if ($tipe == 'pelanggan') {
			$dataPL = $this->m_pelanggan->getPelangganById($idData)->row();			
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'no',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pelanggan '.$dataPL->nama_pelanggan.' yang ingin anda hapus tidak dikonfirmasi oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}

		if ($tipe == 'invoice') {
			$dataInv = $this->m_invoice->getInvoiceByIdInvoice($idData)->row();	
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'no',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data invoice pelanggan '.$dataInv->nama_pelanggan.' bulan '.$dataInv->periode.' tahun '.$dataInv->tahun_tagihan.' yang ingin anda hapus tidak dikonfirmasi oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}

		if ($tipe == 'pemasukkan') {
			$dataMasuk = $this->m_pemasukkan->getById($idData)->row();	
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'no',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pemasukkan '.$dataMasuk->masuk.' '.$dataMasuk->tahap.' bulan '.$dataMasuk->bulan.' tahun '.$dataMasuk->tahun_anggaran.' yang ingin anda hapus tidak dikonfirmasi oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}

		if ($tipe == 'pengeluaran') {
			$dataKeluar = $this->m_pengeluaran->getById($idData)->row();	
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'no',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pengeluaran '.$dataKeluar->keluar.' '.$dataKeluar->tahap.' bulan '.$dataKeluar->bulan.' tahun '.$dataKeluar->tahun_anggaran.' yang ingin anda hapus tidak dikonfirmasi oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}
		$this->m_notifikasi->batalNotifikasi($id,$data);
		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Hapus data pelanggan telah dibatalkan.</p>
        </div>');
        redirect('notifikasi');
	}

	public function batalEditByKaryawan($id,$idData,$tipe)
	{								
		if ($tipe == 'pelanggan') {
			$dataPL = $this->m_pelanggan->getPelangganById($idData)->row();			
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'no',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pelanggan '.$dataPL->nama_pelanggan.' yang ingin anda edit tidak diizinkan oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}
		
		if ($tipe == 'pemasukkan') {
			$dataMasuk = $this->m_pemasukkan->getById($idData)->row();	
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'no',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pemasukkan '.$dataMasuk->masuk.' '.$dataMasuk->tahap.' bulan '.$dataMasuk->bulan.' tahun '.$dataMasuk->tahun_anggaran.' yang ingin anda edit tidak diizinkan oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}

		if ($tipe == 'pengeluaran') {
			$dataKeluar = $this->m_pengeluaran->getById($idData)->row();	
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'no',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pengeluaran '.$dataKeluar->keluar.' '.$dataKeluar->tahap.' bulan '.$dataKeluar->bulan.' tahun '.$dataKeluar->tahun_anggaran.' yang ingin anda edit tidak diizinkan oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}
		$this->m_notifikasi->batalNotifikasi($id,$data);
		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Edit data pelanggan tidak diizinkan.</p>
        </div>');
        redirect('notifikasi');
	}

	public function confirmHapus($id)
	{
		$notif = $this->m_notifikasi->getNotifById($id)->row();		
		$dataUser = $this->m_user->getIdKaryawan($notif->id_user)->row();		
		$gtlotz = new DateTimeZone('Asia/Makassar');		
		$waktu = new DateTime();
		$waktu->setTimezone($gtlotz);		
		if ($notif->data == 'pelanggan') {
			$dataPL = $this->m_pelanggan->getPelangganById($notif->id_data)->row();
			$getById = $this->m_invoice->getInvoiceById($dataPL->id_pelanggan)->result();					
			if ($getById) {
				$pending = array();
				$base = FCPATH . 'assets/';									
				$baseInvoice = '';
				$baseBukti = '';
				$delete = '';
				foreach ($getById as $key) {
					if ($key->status_tagihan == 'pending') {
						array_push($pending, $key->status_tagihan);
					}else{
						$delete = $this->m_invoice->deleteByIdPelanggan($dataPL->id_pelanggan);
						if ($delete) {
							$baseInvoice = $base.'pdf/'.$key->nama_invoice;				
							unlink($baseInvoice);					
							if ($key->bukti_transfer == '') {							
							}else{
								$baseBukti = $base.'images/transfer/'.$key->bukti_transfer;
								unlink($baseBukti);											
							}
						}
					}
				}
				$pending = count($pending);
				if ($pending == '0') {
					$data = array(			
						'is_confirm'  => 'yes',
						'status_notif'  => 'active',
						'status_notif_karyawan'  => 'active',
						'notifikasi_karyawan' => 'Data pelanggan '.$dataPL->nama_pelanggan.' yang ingin anda hapus telah dikonfirmasi oleh Direktur',
						'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
					);
					$this->m_notifikasi->confirmNotifikasi($id,$data);
					log_helper('Mengkonfirmasi '.$dataUser->nama_user.' menghapus '.$dataPL->nama_pelanggan.' dari data pelanggan.');
					$this->m_pelanggan->hapusPelanggan('t_pelanggan',$dataPL->id_pelanggan);
					// $this->m_notifikasi->hapusByIdPelanggan($id);
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-success callout-border-left mt-1 p-1">
			            <strong>Success!</strong>
			            <p>Berhasil mengkonfirmasi hapus data pelanggan.</p>
			        </div>');       
			        redirect('notifikasi');
				}else{
					$data = array(			
						'is_confirm'  => 'no',
						'status_notif'  => 'active',
						'status_notif_karyawan'  => 'active',
						'notifikasi_karyawan' => 'Pelanggan '.$dataPL->nama_pelanggan.' masih memiliki '.$pending.' invoice yang belum dibayar.',
						'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
					);
					$this->m_notifikasi->confirmNotifikasi($id,$data);
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-warning callout-border-left mt-1 p-1">
			            <strong>Warning!</strong>
			            <p>Pelanggan masih memiliki '.$pending.' invoice yang belum dibayar.</p>
			        </div>');       
			        redirect('notifikasi');
				}
			} else {
				$data = array(			
					'is_confirm'  => 'yes',
					'status_notif'  => 'active',
					'status_notif_karyawan'  => 'active',
					'notifikasi_karyawan' => 'Data pelanggan '.$dataPL->nama_pelanggan.' yang ingin anda hapus telah dikonfirmasi oleh Direktur',
					'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
				);
				$this->m_notifikasi->confirmNotifikasi($id,$data);
				log_helper('Mengkonfirmasi '.$dataUser->nama_user.' menghapus '.$dataPL->nama_pelanggan.' dari data pelanggan.');
				$this->m_pelanggan->hapusPelanggan('t_pelanggan',$dataPL->id_pelanggan);
				// $this->m_notifikasi->hapusByIdPelanggan($id);
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil mengkonfirmasi hapus data pelanggan.</p>
		        </div>');       
		        redirect('notifikasi');
			}		
		}	

		if ($notif->data == 'pemasukkan') {
			$dataMasuk = $this->m_pemasukkan->getById($notif->id_data)->row();		
			$base = FCPATH . 'assets/images/kwitansi/'.$dataMasuk->bukti_kwitansi;					
			$data = array(			
				'is_confirm'  => 'yes',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pemasukkan '.$dataMasuk->masuk.' '.$dataMasuk->tahap.' bulan '.$dataMasuk->bulan.' tahun '.$dataMasuk->tahun_anggaran.' yang ingin anda hapus telah dikonfirmasi oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
			$this->m_notifikasi->confirmNotifikasi($id,$data);
			$deletePemasukkan = $this->m_pemasukkan->hapusPemasukkan('t_anggaran',$dataMasuk->id_anggaran);
			if ($deletePemasukkan) {
				if (file_exists($base)) {
					unlink($base);
				}
			}
			log_helper('Mengkonfirmasi '.$dataUser->nama_user.' menghapus '.$dataMasuk->masuk.' '.$dataMasuk->tahap.' bulan '.$dataMasuk->bulan.' tahun '.$dataMasuk->tahun_anggaran.' dari data pemasukkan.');
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Berhasil mengkonfirmasi hapus data pemasukkan.</p>
	        </div>');       
	        redirect('notifikasi');			
		}

		if ($notif->data == 'pengeluaran') {
			$dataKeluar = $this->m_pengeluaran->getById($notif->id_data)->row();
			$data = array(			
				'is_confirm'  => 'yes',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pengeluaran '.$dataKeluar->keluar.' '.$dataKeluar->tahap.' bulan '.$dataKeluar->bulan.' tahun '.$dataKeluar->tahun_anggaran.' yang ingin anda hapus telah dikonfirmasi oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
			$this->m_notifikasi->confirmNotifikasi($id,$data);
			$this->m_pengeluaran->hapusPengeluaran('t_anggaran',$dataKeluar->id_anggaran);
			log_helper('Mengkonfirmasi '.$dataUser->nama_user.' menghapus '.$dataKeluar->keluar.' '.$dataKeluar->tahap.' bulan '.$dataKeluar->bulan.' tahun '.$dataKeluar->tahun_anggaran.' dari data pengeluaran.');
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Berhasil mengkonfirmasi hapus data pengeluaran.</p>
	        </div>');       
	        redirect('notifikasi');						
		}	

		if ($notif->data == 'invoice') {
			$dataInv = $this->m_invoice->getInvoiceByIdInvoice($notif->id_data)->row();	
			$base = FCPATH . 'assets/';									
			$baseInvoice = '';
			$baseBukti = '';
			$deleteInv = $this->m_invoice->deleteByIdInvoice($dataInv->id_tagihan);
			if ($deleteInv) {
				$baseInvoice = $base.'pdf/'.$dataInv->nama_invoice;
				if (file_exists($baseInvoice)) {
					unlink($baseInvoice);					
					if ($dataInv->bukti_transfer == '') {							
					}else{
						$baseBukti = $base.'images/transfer/'.$dataInv->bukti_transfer;
						unlink($baseBukti);											
					}							
				}

			}
			$data = array(			
				'is_confirm'  => 'yes',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data invoice pelanggan '.$dataInv->nama_pelanggan.' bulan '.$dataInv->periode.' tahun '.$dataInv->tahun_tagihan.' yang ingin anda hapus telah dikonfirmasi oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
			$this->m_notifikasi->confirmNotifikasi($id,$data);
			log_helper('Mengkonfirmasi '.$dataUser->nama_user.' menghapus invoice pelanggan '.$dataInv->nama_pelanggan.' bulan '.$dataInv->periode.' tahun '.$dataInv->tahun_tagihan.' dari data invoice.');
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Berhasil mengkonfirmasi hapus data invoice.</p>
	        </div>');       
	        redirect('notifikasi');
		}			
	}

	public function confirmEdit($id,$idData,$tipe)
	{								
		if ($tipe == 'pelanggan') {
			$dataPL = $this->m_pelanggan->getPelangganById($idData)->row();			
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'yes',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pelanggan '.$dataPL->nama_pelanggan.' yang ingin anda edit telah diizinkan oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}
		
		if ($tipe == 'pemasukkan') {
			$dataMasuk = $this->m_pemasukkan->getById($idData)->row();	
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'yes',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pemasukkan '.$dataMasuk->masuk.' '.$dataMasuk->tahap.' bulan '.$dataMasuk->bulan.' tahun '.$dataMasuk->tahun_anggaran.' yang ingin anda edit telah diizinkan oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}

		if ($tipe == 'pengeluaran') {
			$dataKeluar = $this->m_pengeluaran->getById($idData)->row();	
			$gtlotz = new DateTimeZone('Asia/Makassar');		
			$waktu = new DateTime();
			$waktu->setTimezone($gtlotz);
			$data = array(			
				'is_confirm'  => 'yes',
				'status_notif'  => 'active',
				'status_notif_karyawan'  => 'active',
				'notifikasi_karyawan' => 'Data pengeluaran '.$dataKeluar->keluar.' '.$dataKeluar->tahap.' bulan '.$dataKeluar->bulan.' tahun '.$dataKeluar->tahun_anggaran.' yang ingin anda edit telah diizinkan oleh Direktur',
				'waktu_karyawan' => $waktu->format('Y-m-d\TH:i:s.u')
			);
		}
		$this->m_notifikasi->batalNotifikasi($id,$data);
		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Edit data pelanggan telah diizinkan.</p>
        </div>');
        redirect('notifikasi');
	}

	public function waktu()
	{
		$gtlotz = new DateTimeZone('Asia/Makassar');		
		$waktu = new DateTime();
		$waktu->setTimezone($gtlotz);

		// echo date($waktu['date']);
		$date=date_create("2013-05-25",timezone_open("Indian/Kerguelen"));
		echo date_format($date,"H:i a");		
	}
}

/* End of file notifikasi.php */
/* Location: ./application/controllers/notifikasi.php */