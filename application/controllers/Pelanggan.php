<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
            return redirect(base_url('auth/'));
        }
		$this->load->library('form_validation');				
	}
	
	public function index()
	{
		$data["title"] = "Pelanggan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["pelanggan"] = $this->m_pelanggan->getPelangganByStatus('active')->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_pelanggan', $data);
		$this->load->view('template/footer', $data);		
	}

	public function putus()
	{		
		$data["title"] = "Pelanggan Putus";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["pelanggan"] = $this->m_pelanggan->getPelangganByStatus('inactive')->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();		
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_pelanggan_putus', $data);
		$this->load->view('template/footer', $data);		
	}

	public function add_pelanggan()
	{
		$data["title"] = "Tambah Data Pelanggan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["pelanggan"] = $this->m_pelanggan->getAll('t_pelanggan')->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$data['dataPL'] = '';
		$data['dataBT'] = '';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_add_pelanggan', $data);
		$this->load->view('template/footer', $data);		
	}

	public function edit_pelanggan($id)
	{
		$data["title"] = "Edit Data Pelanggan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["dataPL"] = $this->m_pelanggan->getPelangganById($id)->row();
		$data["noHP"] = $this->m_pelanggan->getNoHP($id)->result();
		$data["dataBT"] = $this->m_pelanggan->getBT($id)->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_edit_pelanggan', $data);
		$this->load->view('template/footer', $data);
	}

	public function detailInstansi($id)
	{
		$data["title"] = "Detail Pelanggan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["dataPL"] = $this->m_pelanggan->getPelangganById($id)->row();
		$data["noHP"] = $this->m_pelanggan->getNoHP($id)->result();
		$data["dataBT"] = $this->m_pelanggan->getBT($id)->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_detail_pelanggan', $data);
		$this->load->view('template/footer', $data);
	}

	public function detailPH($id)
	{
		$data["title"] = "Detail Pelanggan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["dataPL"] = $this->m_pelanggan->getPelangganById($id)->row();
		$data["noHP"] = $this->m_pelanggan->getNoHP($id)->result();
		$data["dataBT"] = $this->m_pelanggan->getBT($id)->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_detail_pelanggan', $data);
		$this->load->view('template/footer', $data);
	}

	public function add_instansi()
	{
		$this->form_validation->set_rules('namaMarketingInstansi', 'Nama Merketing', 'trim|required|alpha_numeric_spaces',
			['required' => 'Nama Marketing tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Nama Marketing tidak valid.'
			]);
		$this->form_validation->set_rules('namaInstansi', 'Nama Instansi', 'trim|required|alpha_numeric_spaces|is_unique[t_pelanggan.nama_pelanggan]',
			['required' => 'Nama Instansi tidak boleh kosong.',
			 'is_unique' => 'Nama Instansi sudah ada.',
			 'alpha_numeric_spaces' => 'Nama Instansi tidak valid.'
			]);		
		$this->form_validation->set_rules('tanggalPemasanganInstansi', 'Tanggal Pemasangan', 'trim|required',
			['required' => 'Tanggal Pemasangan tidak boleh kosong.']);
		$this->form_validation->set_rules('alamatPemasanganInstansi', 'Alamat Pemasangan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Alamat Pemasangan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Alamat Pemasangan tidak valid.'
			]);
		$this->form_validation->set_rules('kelurahanDesaInstansi', 'Kelurahan/Desa', 'trim|required|alpha_numeric_spaces',
			['required' => 'Kelurahan/Desa tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Kelurahan/Desa tidak valid.'
			]);
		$this->form_validation->set_rules('kecamatanInstansi', 'Kecamatan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Kecamatan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Kecamatan tidak valid.'
			]);
		$this->form_validation->set_rules('kabupatenKotaInstansi', 'Kabupaten/Kota', 'trim|required|alpha_numeric_spaces',
			['required' => 'Kabupaten/Kota tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Kabupaten/Kota tidak valid.'
			]);
		$this->form_validation->set_rules('provinsiInstansi', 'Provinsi', 'trim|required|alpha_numeric_spaces',
			['required' => 'Provinsi tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Provinsi tidak valid.'
			]);
		$this->form_validation->set_rules('noTelp1Instansi', 'No Telepon 1', 'trim|required|alpha_numeric_spaces|min_length[12]|max_length[13]',
			['required' => 'No Telepon 1 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'No Telepon 1 tidak valid.',
			 'min_length' => 'No Telepon 1 minimal harus 12 karakter.',
			 'max_length' => 'No Telepon 1 tidak boleh lebih dari 13 karakter.'
			]);
		$this->form_validation->set_rules('noTelp2Instansi', 'No Telepon 2', 'trim|required|alpha_numeric_spaces|min_length[12]|max_length[13]',
			['required' => 'No Telepon 2 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'No Telepon 2 tidak valid.',
			 'min_length' => 'No Telepon 2 minimal harus 12 karakter.',
			 'max_length' => 'No Telepon 2 tidak boleh lebih dari 13 karakter.'
			]);
		$this->form_validation->set_rules('noTelp3Instansi', 'No Telepon 3', 'trim|required|alpha_numeric_spaces|min_length[12]|max_length[13]',
			['required' => 'No Telepon 3 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'No Telepon 3 tidak valid.',
			 'min_length' => 'No Telepon 3 minimal harus 12 karakter.',
			 'max_length' => 'No Telepon 3 tidak boleh lebih dari 13 karakter.'
			]);		
		$this->form_validation->set_rules('ketNoTelp1Instansi', 'Keterangan Pemilik No Telepon 1', 'trim|required|alpha_numeric_spaces',
			['required' => 'Keterangan Pemilik No Telepon 1 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Keterangan Pemilik No Telepon 1 tidak valid.'
			]);
		$this->form_validation->set_rules('ketNoTelp2Instansi', 'Keterangan Pemilik No Telepon 2', 'trim|required|alpha_numeric_spaces',
			['required' => 'Keterangan Pemilik No Telepon 2 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Keterangan Pemilik No Telepon 2 tidak valid.'
			]);
		$this->form_validation->set_rules('ketNoTelp3Instansi', 'Keterangan Pemilik No Telepon 3', 'trim|required|alpha_numeric_spaces',
			['required' => 'Keterangan Pemilik No Telepon 3 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Keterangan Pemilik No Telepon 3 tidak valid.'
			]);		
		$this->form_validation->set_rules('paketInternetInstansi', 'Paket Internet', 'trim|required|alpha_numeric_spaces',
			['required' => 'Paket Internet tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Paket Internet tidak valid.'
			]);
		$this->form_validation->set_rules('iuranInstansi', 'Iuran', 'trim|required',
			['required' => 'Iuran tidak boleh kosong.'
			]);
		$this->form_validation->set_rules('biayaPemasanganInstansi', 'Biaya Pemasangan', 'trim|required',
			['required' => 'Biaya Pemasangan tidak boleh kosong.'
			]);		
		if ($this->form_validation->run() == FALSE) {
			$this->add_pelanggan();
		} else {
			$namaMarketing = $this->input->post("namaMarketingInstansi");
			$namaInstansi = $this->input->post("namaInstansi");
			$tanggalPemasangan = $this->input->post("tanggalPemasanganInstansi");
			$alamatPemasangan = $this->input->post("alamatPemasanganInstansi");
			$kelurahanDesa = $this->input->post("kelurahanDesaInstansi");
			$kecamatan = $this->input->post("kecamatanInstansi");
			$kabupatenKota = $this->input->post("kabupatenKotaInstansi");
			$provinsi = $this->input->post("provinsiInstansi");
			$noTelp1 = $this->input->post("noTelp1Instansi");
			$noTelp2 = $this->input->post("noTelp2Instansi");
			$noTelp3 = $this->input->post("noTelp3Instansi");
			$ketNoTelp1 = $this->input->post("ketNoTelp1Instansi");
			$ketNoTelp2 = $this->input->post("ketNoTelp2Instansi");
			$ketNoTelp3 = $this->input->post("ketNoTelp3Instansi");
			$paketInternet = $this->input->post("paketInternetInstansi");
			$iuran = $this->input->post("iuranInstansi");
			$biayaPemasangan = $this->input->post("biayaPemasanganInstansi");
			$biayaTambahan1 = $this->input->post("biayaTambahan1Instansi");
			$biayaTambahan2 = $this->input->post("biayaTambahan2Instansi");
			$biayaTambahan3 = $this->input->post("biayaTambahan3Instansi");
			$bTambahan1 = $this->input->post("bTambahan1Instansi");
			$bTambahan2 = $this->input->post("bTambahan2Instansi");
			$bTambahan3 = $this->input->post("bTambahan3Instansi");
			$npwp = $_FILES["npwp"];
			if ($npwp["name"] != '') {
				$config['upload_path'] = './assets/images/npwp/';
				$config['allowed_types'] = 'jpg|png|jpeg';	
				$config['max_size']  = '10000';	
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('npwp')) {
					$kode = $this->m_pelanggan->auto_increment('t_pelanggan','id_pelanggan','PL');
					$dataPL = array(
						'id_pelanggan' => $kode,
						'nama_marketing' => $namaMarketing,
						'nama_pelanggan' => $namaInstansi,
						'alamat_pelanggan' => $alamatPemasangan,
						'tanggal_pemasangan' => $tanggalPemasangan,
						'informasi_pemasang' => 'instansi',
						'kelurahan_desa' => $kelurahanDesa,
						'kecamatan' => $kecamatan,
						'kabupaten_kota' => $kabupatenKota,
						'provinsi' => $provinsi,
						'paket_internet' => $paketInternet,
						'biaya_pemasangan' => str_replace('.', '', $biayaPemasangan),
						'iuran' => str_replace('.', '', $iuran),
						'npwp' => $npwp["name"],
						'status_pelanggan' => 'active'
					);
					$this->m_pelanggan->tambahPelanggan('t_pelanggan',$dataPL);
					if ($biayaTambahan1) {
						$dataBT1 = array(
							'id_pelanggan' => $kode,
							'biaya_tambahan' => $biayaTambahan1,
							'biaya' => $bTambahan1
						);
					} else {
						$dataBT1 = array(
							'id_pelanggan' => $kode
						);
					}
					$this->m_pelanggan->tambahBiayaTambahan('t_biaya_tambahan',$dataBT1);						
					if ($biayaTambahan2) {
						$dataBT2 = array(
							'id_pelanggan' => $kode,
							'biaya_tambahan' => $biayaTambahan2,
							'biaya' => $bTambahan2
						);
					}else {
						$dataBT2 = array(
							'id_pelanggan' => $kode
						);
					}
					$this->m_pelanggan->tambahBiayaTambahan('t_biaya_tambahan',$dataBT2);						
					if ($biayaTambahan3) {
						$dataBT3 = array(
							'id_pelanggan' => $kode,
							'biaya_tambahan' => $biayaTambahan3,
							'biaya' => $bTambahan3
						);						
					} else {
						$dataBT3 = array(
							'id_pelanggan' => $kode
						);
					}
					$this->m_pelanggan->tambahBiayaTambahan('t_biaya_tambahan',$dataBT3);
					if ($noTelp1) {
						$dataHP1 = array(
						'id_pelanggan' => $kode,
						'no_hp' => $noTelp1,
						'ket' => $ketNoTelp1
						);
					} else {
						$dataHP1 = array(
						'id_pelanggan' => $kode
						);
					}
					$this->m_pelanggan->tambahNoTelp('t_no_hp',$dataHP1);	
					if ($noTelp2) {
						$dataHP2 = array(
							'id_pelanggan' => $kode,
							'no_hp' => $noTelp2,
							'ket' => $ketNoTelp2
						);						
					} else {
						$dataHP1 = array(
						'id_pelanggan' => $kode
						);
					}
					$this->m_pelanggan->tambahNoTelp('t_no_hp',$dataHP2);				
					if ($noTelp3) {
						$dataHP3 = array(
							'id_pelanggan' => $kode,
							'no_hp' => $noTelp3,
							'ket' => $ketNoTelp3
						);
					} else {
						$dataHP1 = array(
						'id_pelanggan' => $kode
						);
					}
					$this->m_pelanggan->tambahNoTelp('t_no_hp',$dataHP3);																
					
					log_helper('Menambah pelanggan dengan nama '.$namaInstansi.'.');
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-success callout-border-left mt-1 p-1">
		                <strong>Success!</strong>
		                <p>Berhasil menambah data pelanggan.</p>
		            </div>');
		            redirect('pelanggan');
				} else {
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-danger callout-border-left mt-1 p-1">
		                <strong>Gagal!</strong>
		                <p>'.$this->upload->display_errors().'</p>
		            </div>');
		            redirect('pelanggan');	
				}
			}			
		}
	}

	public function add_personal()
	{
		$this->form_validation->set_rules('namaMarketingPersonal', 'Nama Merketing', 'trim|required|alpha_numeric_spaces',
			['required' => 'Nama Marketing tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Nama Marketing tidak valid.'
			]);
		$this->form_validation->set_rules('noKtp', 'No KTP', 'trim|required|alpha_numeric_spaces|min_length[16]|max_length[16]',
			['required' => 'No KTP tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'No KTP tidak valid.',
			 'min_length' => 'No KTP minimal harus 16 karakter.',
			 'max_length' => 'No KTP tidak boleh lebih dari 16 karakter.'
			]);
		$this->form_validation->set_rules('namaPersonal', 'Nama Pelanggan', 'trim|required|alpha_numeric_spaces|is_unique[t_pelanggan.nama_pelanggan]',
			['required' => 'Nama Pelanggan tidak boleh kosong.',
			 'is_unique' => 'Nama Pelanggan sudah ada.',
			 'alpha_numeric_spaces' => 'Nama Pelanggan tidak valid.'
			]);		
		$this->form_validation->set_rules('namaPersonalPanggilan', 'Nama Panggilan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Nama Panggilan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Nama Panggilan tidak valid.'
			]);		
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Pekerjaan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Pekerjaan tidak valid.'
			]);		
		$this->form_validation->set_rules('tanggalPemasanganPersonal', 'Tanggal Pemasangan', 'trim|required',
			['required' => 'Tanggal Pemasangan tidak boleh kosong.']);
		$this->form_validation->set_rules('alamatPemasanganPersonal', 'Alamat Pemasangan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Alamat Pemasangan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Alamat Pemasangan tidak valid.'
			]);
		$this->form_validation->set_rules('kelurahanDesaPersonal', 'Kelurahan/Desa', 'trim|required|alpha_numeric_spaces',
			['required' => 'Kelurahan/Desa tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Kelurahan/Desa tidak valid.'
			]);
		$this->form_validation->set_rules('kecamatanPersonal', 'Kecamatan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Kecamatan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Kecamatan tidak valid.'
			]);
		$this->form_validation->set_rules('kabupatenKotaPersonal', 'Kabupaten/Kota', 'trim|required|alpha_numeric_spaces',
			['required' => 'Kabupaten/Kota tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Kabupaten/Kota tidak valid.'
			]);
		$this->form_validation->set_rules('provinsiPersonal', 'Provinsi', 'trim|required|alpha_numeric_spaces',
			['required' => 'Provinsi tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Provinsi tidak valid.'
			]);
		$this->form_validation->set_rules('noTelp1Personal', 'No Telepon 1', 'trim|required|alpha_numeric_spaces|min_length[12]|max_length[13]',
			['required' => 'No Telepon 1 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'No Telepon 1 tidak valid.',
			 'min_length' => 'No Telepon 1 minimal harus 12 karakter.',
			 'max_length' => 'No Telepon 1 tidak boleh lebih dari 13 karakter.'
			]);
		$this->form_validation->set_rules('noTelp2Personal', 'No Telepon 2', 'trim|required|alpha_numeric_spaces|min_length[12]|max_length[13]',
			['required' => 'No Telepon 2 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'No Telepon 2 tidak valid.',
			 'min_length' => 'No Telepon 2 minimal harus 12 karakter.',
			 'max_length' => 'No Telepon 2 tidak boleh lebih dari 13 karakter.'
			]);
		$this->form_validation->set_rules('noTelp3Personal', 'No Telepon 3', 'trim|required|alpha_numeric_spaces|min_length[12]|max_length[13]',
			['required' => 'No Telepon 3 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'No Telepon 3 tidak valid.',
			 'min_length' => 'No Telepon 3 minimal harus 12 karakter.',
			 'max_length' => 'No Telepon 3 tidak boleh lebih dari 13 karakter.'
			]);		
		$this->form_validation->set_rules('ketNoTelp1Personal', 'Keterangan Pemilik No Telepon 1', 'trim|required|alpha_numeric_spaces',
			['required' => 'Keterangan Pemilik No Telepon 1 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Keterangan Pemilik No Telepon 1 tidak valid.'
			]);
		$this->form_validation->set_rules('ketNoTelp2Personal', 'Keterangan Pemilik No Telepon 2', 'trim|required|alpha_numeric_spaces',
			['required' => 'Keterangan Pemilik No Telepon 2 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Keterangan Pemilik No Telepon 2 tidak valid.'
			]);
		$this->form_validation->set_rules('ketNoTelp3Personal', 'Keterangan Pemilik No Telepon 3', 'trim|required|alpha_numeric_spaces',
			['required' => 'Keterangan Pemilik No Telepon 3 tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Keterangan Pemilik No Telepon 3 tidak valid.'
			]);		
		$this->form_validation->set_rules('paketInternetPersonal', 'Paket Internet', 'trim|required|alpha_numeric_spaces',
			['required' => 'Paket Internet tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Paket Internet tidak valid.'
			]);
		$this->form_validation->set_rules('iuranPersonal', 'Iuran', 'trim|required',
			['required' => 'Iuran tidak boleh kosong.'
			]);
		$this->form_validation->set_rules('biayaPemasanganPersonal', 'Biaya Pemasangan', 'trim|required',
			['required' => 'Biaya Pemasangan tidak boleh kosong.'
			]);		
		if ($this->form_validation->run() == FALSE) {
			$this->add_pelanggan();
		} else {
			$namaMarketing = $this->input->post("namaMarketingPersonal");
			$namaPersonal = $this->input->post("namaPersonal");
			$namaPersonalPanggilan = $this->input->post("namaPersonalPanggilan");
			$noKtp = $this->input->post("noKtp");
			$pekerjaan = $this->input->post("pekerjaan");
			$tanggalPemasangan = $this->input->post("tanggalPemasanganPersonal");
			$alamatPemasangan = $this->input->post("alamatPemasanganPersonal");
			$kelurahanDesa = $this->input->post("kelurahanDesaPersonal");
			$kecamatan = $this->input->post("kecamatanPersonal");
			$kabupatenKota = $this->input->post("kabupatenKotaPersonal");
			$provinsi = $this->input->post("provinsiPersonal");
			$noTelp1 = $this->input->post("noTelp1Personal");
			$noTelp2 = $this->input->post("noTelp2Personal");
			$noTelp3 = $this->input->post("noTelp3Personal");
			$ketNoTelp1 = $this->input->post("ketNoTelp1Personal");
			$ketNoTelp2 = $this->input->post("ketNoTelp2Personal");
			$ketNoTelp3 = $this->input->post("ketNoTelp3Personal");
			$paketInternet = $this->input->post("paketInternetPersonal");
			$iuran = $this->input->post("iuranPersonal");
			$biayaPemasangan = $this->input->post("biayaPemasanganPersonal");
			$biayaTambahan1 = $this->input->post("biayaTambahan1Personal");
			$biayaTambahan2 = $this->input->post("biayaTambahan2Personal");
			$biayaTambahan3 = $this->input->post("biayaTambahan3Personal");
			$bTambahan1 = $this->input->post("bTambahan1Personal");
			$bTambahan2 = $this->input->post("bTambahan2Personal");
			$bTambahan3 = $this->input->post("bTambahan3Personal");

			$kode = $this->m_pelanggan->auto_increment('t_pelanggan','id_pelanggan','PL');
			$dataPL = array(
				'id_pelanggan' => $kode,
				'nama_marketing' => $namaMarketing,
				'nama_pelanggan' => $namaPersonal,
				'nama_panggilan' => $namaPersonalPanggilan,
				'no_ktp' => $noKtp,
				'pekerjaan' => $pekerjaan,
				'alamat_pelanggan' => $alamatPemasangan,
				'tanggal_pemasangan' => $tanggalPemasangan,
				'informasi_pemasang' => 'personal',
				'kelurahan_desa' => $kelurahanDesa,
				'kecamatan' => $kecamatan,
				'kabupaten_kota' => $kabupatenKota,
				'provinsi' => $provinsi,
				'paket_internet' => $paketInternet,
				'biaya_pemasangan' => str_replace('.', '', $biayaPemasangan),
				'iuran' => str_replace('.', '', $iuran),
				'status_pelanggan' => 'active'
			);
			$this->m_pelanggan->tambahPelanggan('t_pelanggan',$dataPL);
			if ($biayaTambahan1) {
				$dataBT1 = array(
					'id_pelanggan' => $kode,
					'biaya_tambahan' => $biayaTambahan1,
					'biaya' => $bTambahan1
				);
			} else {
				$dataBT1 = array(
					'id_pelanggan' => $kode
				);
			}
			$this->m_pelanggan->tambahBiayaTambahan('t_biaya_tambahan',$dataBT1);						
			if ($biayaTambahan2) {
				$dataBT2 = array(
					'id_pelanggan' => $kode,
					'biaya_tambahan' => $biayaTambahan2,
					'biaya' => $bTambahan2
				);
			}else {
				$dataBT2 = array(
					'id_pelanggan' => $kode
				);
			}
			$this->m_pelanggan->tambahBiayaTambahan('t_biaya_tambahan',$dataBT2);						
			if ($biayaTambahan3) {
				$dataBT3 = array(
					'id_pelanggan' => $kode,
					'biaya_tambahan' => $biayaTambahan3,
					'biaya' => $bTambahan3
				);						
			} else {
				$dataBT3 = array(
					'id_pelanggan' => $kode
				);
			}
			$this->m_pelanggan->tambahBiayaTambahan('t_biaya_tambahan',$dataBT3);
			if ($noTelp1) {
				$dataHP1 = array(
				'id_pelanggan' => $kode,
				'no_hp' => $noTelp1,
				'ket' => $ketNoTelp1
				);
			} else {
				$dataHP1 = array(
				'id_pelanggan' => $kode
				);
			}
			$this->m_pelanggan->tambahNoTelp('t_no_hp',$dataHP1);	
			if ($noTelp2) {
				$dataHP2 = array(
					'id_pelanggan' => $kode,
					'no_hp' => $noTelp2,
					'ket' => $ketNoTelp2
				);						
			} else {
				$dataHP1 = array(
				'id_pelanggan' => $kode
				);
			}
			$this->m_pelanggan->tambahNoTelp('t_no_hp',$dataHP2);				
			if ($noTelp3) {
				$dataHP3 = array(
					'id_pelanggan' => $kode,
					'no_hp' => $noTelp3,
					'ket' => $ketNoTelp3
				);
			} else {
				$dataHP1 = array(
				'id_pelanggan' => $kode
				);
			}
			$this->m_pelanggan->tambahNoTelp('t_no_hp',$dataHP3);
			log_helper('Menambah pelanggan dengan nama '.$namaPersonal.'.');
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
                <strong>Success!</strong>
                <p>Berhasil menambah data pelanggan.</p>
            </div>');
            redirect('pelanggan');
		}	
	}

	public function edit_personal()
	{				
		$indexBT = 0;		
		$indexB = 0;
		$indexNoHP = 0;		
		$indexKet = 0;					
		$id = $this->input->post("idPelangganPersonal");
		$namaPersonal = $this->input->post("namaPersonal");
		$namaPersonalPanggilan = $this->input->post("namaPersonalPanggilan");
		$noKtp = $this->input->post("noKtp");
		$pekerjaan = $this->input->post("pekerjaan");
		$tanggalPemasangan = $this->input->post("tanggalPemasanganPersonal");
		$alamatPemasangan = $this->input->post("alamatPemasanganPersonal");
		$kelurahanDesa = $this->input->post("kelurahanDesaPersonal");
		$kecamatan = $this->input->post("kecamatanPersonal");
		$kabupatenKota = $this->input->post("kabupatenKotaPersonal");
		$provinsi = $this->input->post("provinsiPersonal");		
		$paketInternet = $this->input->post("paketInternetPersonal");
		$iuran = $this->input->post("iuranPersonal");
		$biayaPemasangan = $this->input->post("biayaPemasanganPersonal");
		$idNoHp = $this->input->post("idNoHP");				
		$NoHp = $this->input->post("noHP");				
		$ketNoHp = $this->input->post("ketNoHP");				
		$idBT = $this->input->post("idBT");				
		$BT = $this->input->post("biayaTambahanPH");				
		$biaya = $this->input->post("bTambahanPH");	
		$BT1 = '';
		$biaya1= '';
		$noHP1 = '';
		$ketHP1 = '';
		foreach ($idBT as $key) {
			$BT1 = $BT[$indexBT++];
			$biaya1 = str_replace('.', '', $biaya[$indexB++]);
			if ($BT != '') {
				if ($biaya1 != '') {
					$dataBT = array(
						'biaya_tambahan' => $BT1,
						'biaya' => $biaya1
					);
				} else {
					$dataBT = array(
						'biaya_tambahan' => $BT1,
						'biaya' => '0'
					);				
				}
			} else {
				if ($biaya1 != '') {
					$dataBT = array(
						'biaya_tambahan' => $BT1,
						'biaya' => $biaya1
					);
				} else {
					$dataBT = array(
						'biaya_tambahan' => $BT1,
						'biaya' => '0'
					);				
				}
			}
			$this->m_pelanggan->updateBT('t_biaya_tambahan',$key,$dataBT);											
		}

		foreach ($idNoHp as $key1) {
			$noHP1 = $NoHp[$indexNoHP++];
			$ketHP1 = $ketNoHp[$indexKet++];
			if ($noHP1 != '') {
				$dataHP = array(
					'no_hp' => $noHP1,
					'ket' => $ketHP1
				);				
			} else {
				$dataHP = array(
					'no_hp' => $noHP1,
					'ket' => $ketHP1
				);
			}
			$this->m_pelanggan->updateHP('t_no_hp',$key1,$dataHP);												
		}
		
		$dataPL = array(
			'nama_pelanggan' => $namaPersonal,
			'nama_panggilan' => $namaPersonalPanggilan,
			'no_ktp' => $noKtp,
			'pekerjaan' => $pekerjaan,
			'alamat_pelanggan' => $alamatPemasangan,
			'tanggal_pemasangan' => $tanggalPemasangan,
			'kelurahan_desa' => $kelurahanDesa,
			'kecamatan' => $kecamatan,
			'kabupaten_kota' => $kabupatenKota,
			'provinsi' => $provinsi,
			'paket_internet' => $paketInternet,
			'biaya_pemasangan' => str_replace('.', '', $biayaPemasangan),
			'iuran' => str_replace('.', '', $iuran),
		);
		$this->m_pelanggan->updatePelanggan('t_pelanggan',$id,$dataPL);		
		log_helper('Mengubah data pelanggan '.$namaPersonal.'.');
		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Berhasil mengubah data pelanggan.</p>
        </div>');
        redirect('pelanggan');
	}

	public function edit_instansi()
	{				
		$indexBT = 0;		
		$indexB = 0;
		$indexNoHP = 0;		
		$indexKet = 0;					
		$id = $this->input->post("idPelangganInstansi");
		$namaInstansi = $this->input->post("namaInstansi");
		$tanggalPemasangan = $this->input->post("tanggalPemasanganInstansi");
		$alamatPemasangan = $this->input->post("alamatPemasanganInstansi");
		$kelurahanDesa = $this->input->post("kelurahanDesaInstansi");
		$kecamatan = $this->input->post("kecamatanInstansi");
		$kabupatenKota = $this->input->post("kabupatenKotaInstansi");
		$provinsi = $this->input->post("provinsiInstansi");		
		$paketInternet = $this->input->post("paketInternetInstansi");
		$iuran = $this->input->post("iuranInstansi");
		$biayaPemasangan = $this->input->post("biayaPemasanganInstansi");
		$idNoHp = $this->input->post("idNoHPInstansi");				
		$NoHp = $this->input->post("noHPInstansi");				
		$ketNoHp = $this->input->post("ketNoHPInstansi");				
		$idBT = $this->input->post("idBTInstansi");				
		$BT = $this->input->post("biayaTambahanInstansi");				
		$biaya = $this->input->post("bTambahanInstansi");	
		$npwp = $_FILES['npwp'];	
		$oldNpwp = $this->input->post("oldNPWP");	
		$BT1 = '';
		$biaya1= '';
		$noHP1 = '';
		$ketHP1 = '';
		if ($npwp["name"] != '') {
			$config['upload_path'] = './assets/images/npwp/';
			$config['allowed_types'] = 'jpg|png|jpeg';				
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('npwp')){
				unlink(FCPATH . 'assets/images/npwp/' . $oldNpwp);
				foreach ($idBT as $key) {
					$BT1 = $BT[$indexBT++];
					$biaya1 = str_replace('.', '', $biaya[$indexB++]);
					if ($BT != '') {
						if ($biaya1 != '') {
							$dataBT = array(
								'biaya_tambahan' => $BT1,
								'biaya' => $biaya1
							);
						} else {
							$dataBT = array(
								'biaya_tambahan' => $BT1,
								'biaya' => '0'
							);				
						}
					} else {
						if ($biaya1 != '') {
							$dataBT = array(
								'biaya_tambahan' => $BT1,
								'biaya' => $biaya1
							);
						} else {
							$dataBT = array(
								'biaya_tambahan' => $BT1,
								'biaya' => '0'
							);				
						}
					}
					$this->m_pelanggan->updateBT('t_biaya_tambahan',$key,$dataBT);											
				}

				foreach ($idNoHp as $key1) {
					$noHP1 = $NoHp[$indexNoHP++];
					$ketHP1 = $ketNoHp[$indexKet++];
					if ($noHP1 != '') {
						$dataHP = array(
							'no_hp' => $noHP1,
							'ket' => $ketHP1
						);				
					} else {
						$dataHP = array(
							'no_hp' => $noHP1,
							'ket' => $ketHP1
						);
					}
					$this->m_pelanggan->updateHP('t_no_hp',$key1,$dataHP);												
				}

				$dataPL = array(
					'nama_pelanggan' => $namaInstansi,
					'alamat_pelanggan' => $alamatPemasangan,
					'tanggal_pemasangan' => $tanggalPemasangan,
					'kelurahan_desa' => $kelurahanDesa,
					'kecamatan' => $kecamatan,
					'kabupaten_kota' => $kabupatenKota,
					'provinsi' => $provinsi,
					'paket_internet' => $paketInternet,
					'biaya_pemasangan' => str_replace('.', '', $biayaPemasangan),
					'iuran' => str_replace('.', '', $iuran),
					'npwp' => $npwp["name"]
				);

				$this->m_pelanggan->updatePelanggan('t_pelanggan',$id,$dataPL);		
				log_helper('Mengubah data pelanggan '.$namaInstansi.'.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil mengubah data pelanggan.</p>
		        </div>');
		        redirect('pelanggan');
			} else {
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-danger callout-border-left mt-1 p-1">
	                <strong>Gagal!</strong>
	                <p>Gagal mengubah data pelanggan.</p>
	            </div>');
	            redirect('pelanggan');	
			}
		} else {
			foreach ($idBT as $key) {
				$BT1 = $BT[$indexBT++];
				$biaya1 = str_replace('.', '', $biaya[$indexB++]);
				if ($BT != '') {
					if ($biaya1 != '') {
						$dataBT = array(
							'biaya_tambahan' => $BT1,
							'biaya' => $biaya1
						);
					} else {
						$dataBT = array(
							'biaya_tambahan' => $BT1,
							'biaya' => '0'
						);				
					}
				} else {
					if ($biaya1 != '') {
						$dataBT = array(
							'biaya_tambahan' => $BT1,
							'biaya' => $biaya1
						);
					} else {
						$dataBT = array(
							'biaya_tambahan' => $BT1,
							'biaya' => '0'
						);				
					}
				}
				$this->m_pelanggan->updateBT('t_biaya_tambahan',$key,$dataBT);											
			}

			foreach ($idNoHp as $key1) {
				$noHP1 = $NoHp[$indexNoHP++];
				$ketHP1 = $ketNoHp[$indexKet++];
				if ($noHP1 != '') {
					$dataHP = array(
						'no_hp' => $noHP1,
						'ket' => $ketHP1
					);				
				} else {
					$dataHP = array(
						'no_hp' => $noHP1,
						'ket' => $ketHP1
					);
				}
				$this->m_pelanggan->updateHP('t_no_hp',$key1,$dataHP);												
			}

			$dataPL = array(
				'nama_pelanggan' => $namaInstansi,
				'alamat_pelanggan' => $alamatPemasangan,
				'tanggal_pemasangan' => $tanggalPemasangan,
				'kelurahan_desa' => $kelurahanDesa,
				'kecamatan' => $kecamatan,
				'kabupaten_kota' => $kabupatenKota,
				'provinsi' => $provinsi,
				'paket_internet' => $paketInternet,
				'biaya_pemasangan' => str_replace('.', '', $biayaPemasangan),
				'iuran' => str_replace('.', '', $iuran)
			);	
			$this->m_pelanggan->updatePelanggan('t_pelanggan',$id,$dataPL);		
			log_helper('Mengubah data pelanggan '.$namaInstansi.'.');
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Berhasil mengubah data pelanggan.</p>
	        </div>');
	        redirect('pelanggan');
		}		
	}

	public function putus_action($id, $nama)
	{
		$namaFix = str_replace("%20"," ",$nama);		
		$invoice = $this->m_invoice->getInvoiceById($id)->result();
		if ($invoice) {
			$pending = array();
			foreach ($invoice as $key) {
				if ($key->status_tagihan == 'pending') {
					array_push($pending, $key->status_tagihan);									
				}
			}
			if (count($pending) == '0') {
				$this->m_pelanggan->hapusSementara($id);
				log_helper('Menghapus sementara '.$namaFix.' dari data pelanggan.');
				echo json_encode(array("status" => true, "message" => "success"));        
			} else {    
		        echo json_encode(array("status" => false, "message" => "Pelanggan masih memiliki ".count($pending). " invoice yang belum dibayar."));        	
			}
		} else {
			$this->m_pelanggan->hapusSementara($id);
			log_helper('Menghapus sementara '.$namaFix.' dari data pelanggan.');
			echo json_encode(array("status" => true, "message" => "success"));        
		}
	}

	public function aktif_action($id, $nama)
	{
		$namaFix = str_replace("%20"," ",$nama);
		$this->m_pelanggan->aktif($id);
		log_helper('Mengaktifkan kembali data pelanggan '.$namaFix.'.');
		echo json_encode(array("status" => true));        
	}

	public function edit($id)
	{
		$data = $this->m_pelanggan->editPelanggan('t_pelanggan',$id)->row();
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post("idPelanggan");
		$oldName = $this->input->post("oldName");
		$oldAlamat = $this->input->post("oldAlamat");
		$oldIuran = $this->input->post("oldIuran");
		$nama = $this->input->post("namaPelanggan");
		$alamat = $this->input->post("alamatPelanggan");
		$iuran = $this->input->post("iuranPelanggan");
		$oldIuran2 = "Rp. " . number_format($oldIuran,0,',','.');
		$iuran2 = "Rp. " . number_format($iuran,0,',','.');
		$data = array(
			'nama_pelanggan' => $nama,
			'alamat_pelanggan' => $alamat,
			'iuran' => $iuran
		);
		$this->m_pelanggan->updatePelanggan('t_pelanggan',$id,$data);
		if ($oldName == $nama) {					
		}else{
			log_helper('Mengubah nama '.$oldName.' menjadi '.$nama.'.');			
		}

		if ($oldIuran == $iuran) {					
		}else{
			log_helper('Mengubah iuran '.$oldName.' dari '.$oldIuran2.' menjadi '.$iuran2);			
		}

		if ($oldAlamat == $alamat) {					
		}else{
			log_helper('Mengubah alamat '.$oldName.' dari '.$oldAlamat.' menjadi '.$alamat.'.');			
		}


		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Berhasil mengedit data pelanggan.</p>
        </div>');       
        echo json_encode(array("status" => true));
	}

	public function hapus($id,$nama)
	{
		$base = FCPATH . 'assets/';									
		$namaFix = str_replace("%20"," ",$nama);
		$getById = $this->m_invoice->getInvoiceById($id)->result();		
		$getData = $this->m_pelanggan->getPelangganById($id)->row();		
		$baseNpwp = $base.'images/npwp/'.$getData->npwp;
		if ($getById) {
			$pending = array();			
			$baseInvoice = '';
			$baseBukti = '';			
			$delete = '';				
			foreach ($getById as $key) {
				if ($key->status_tagihan == 'pending') {
					array_push($pending, $key->status_tagihan);
				}else{
					$delete = $this->m_invoice->deleteByIdPelanggan($id);
					if ($delete) {
						$baseInvoice = $base.'pdf/'.$key->nama_invoice;										
						unlink($baseInvoice);	
						if ($getData->npwp) {
							unlink($baseNpwp);											
						}					
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
				log_helper('Menghapus '.$namaFix.' dari data pelanggan.');
				$this->m_pelanggan->hapusPelanggan('t_pelanggan',$id);
				if ($getData->npwp) {
					unlink($baseNpwp);											
				}					
				// $this->m_notifikasi->hapusByIdPelanggan($id);
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil menghapus data pelanggan.</p>
		        </div>');       
		        echo json_encode(array("status" => true));        
			}else{
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Warning!</strong>
		            <p>Pelanggan masih memiliki '.$pending.' invoice yang belum dibayar.</p>
		        </div>');       
		        echo json_encode(array("status" => true));        
			}
		}else{
			log_helper('Menghapus '.$namaFix.' dari data pelanggan.');
			if ($getData->npwp) {
				unlink($baseNpwp);											
			}								
			$this->m_pelanggan->hapusPelanggan('t_pelanggan',$id);
			$this->m_notifikasi->hapusByIdPelanggan($id);
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Berhasil menghapus data pelanggan.</p>
	        </div>');       
	        echo json_encode(array("status" => true));
		}				
	}		
	
	public function generatePelanggan()
	{
		for ($i=0; $i < 5000; $i++) { 
			$kode = $this->m_pelanggan->auto_increment('t_pelanggan','id_pelanggan','PL');
			$data = array(
				'id_pelanggan' => $kode,
				'nama_pelanggan' => 'Arif'.$i++,
				'alamat_pelanggan' => 'Desa Ulanta'
			);
			$this->m_pelanggan->tambahPelanggan('t_pelanggan',$data);
		}
		echo "Sukses";
	}
}

/* End of file pelanggan.php */
/* Location: ./application/controllers/pelanggan.php */