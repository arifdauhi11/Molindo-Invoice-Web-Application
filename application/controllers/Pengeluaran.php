<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

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
		$data["title"] = "Pengeluaran";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();						
		$data["thn"] = $this->input->get('tahun');			
		$data["idBiaya"] = $this->input->get('idBiaya');
		$data["takteranggarkan"] = $this->input->get('takteranggarkan');
		$data["bulan"] = $this->input->get('bulan');
		$data["tahap"] = $this->input->get('tahap');	
		if ($data["idBiaya"] != '') {
			$dataBiaya = $this->m_biaya->getById($data["idBiaya"])->row();
			$data["namaBiaya"] = $dataBiaya->nama_biaya;
			$data["pengeluaran"] = $this->m_pengeluaran->getByTahunDanBiaya($data["thn"],$data["bulan"],$data["idBiaya"],$data["tahap"])->result();
		} else if ($data["takteranggarkan"] != '') {
			$data["pengeluaran"] = $this->m_pengeluaran->getByTahunDanTakteranggar($data["thn"],$data["bulan"],$data["takteranggarkan"],$data["tahap"])->result();
		}else{
			$data["pengeluaran"] = $this->m_pengeluaran->getByTahun($data["thn"])->result();		
		}
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$data["tahun"] = $this->m_pengeluaran->getTahun()->result();
		$data["biayaData"] = $this->m_biaya->getAll('t_biaya')->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		if ($this->session->userdata('role') != 'Direktur' && $this->session->userdata('role') != 'Finance' && $this->session->userdata('role') != 'Komisaris') {
			$this->load->view('v_blocked');
		} else {
			$this->load->view('v_pengeluaran', $data);
		}
		$this->load->view('template/footer', $data);		
	}

	public function add()
	{
		$data["title"] = "Tambah Pengeluaran";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();	
		$data["biayaData"] = $this->m_biaya->getAll('t_biaya')->result();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_add_pengeluaran', $data);
		$this->load->view('template/footer', $data);
	}

	public function add_action()
	{
		$this->form_validation->set_rules('namaPengeluaran', 'Nama Pengeluaran', 'trim|required|alpha_numeric_spaces',
			['required' => 'Nama Pengeluaran tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Nama Pengeluaran tidak valid.'
			]);
		$this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required',
			['required' => 'Anggaran tidak boleh kosong.']);
		$this->form_validation->set_rules('tahap', 'Tahap', 'trim|required',
			['required' => 'Silahkan pilih salah satu tahap.']);
		// $this->form_validation->set_rules('terpakai', 'Anggaran Terpakai', 'trim|required',
		// 	['required' => 'Anggaran Terpakai tidak boleh kosong.']);
		$this->form_validation->set_rules('biaya', 'Nama Biaya', 'trim|required',
			['required' => 'Silahkan pilih salah satu nama biaya.']);
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required',
			['required' => 'Silahkan pilih salah satu bulan.']);
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|exact_length[4]',
			['required' => 'Tahun tidak boleh kosong.',
			 'exact_length' => 'Tahun tidak boleh kurang atau lebih dari empat angka.']);		

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$nama = $this->input->post('namaPengeluaran');
			$anggaranOld = str_replace("Rp. ","",$this->input->post('anggaran'));
			$anggaran = str_replace(".","",$anggaranOld);		
			$tahap = $this->input->post('tahap');
			$biaya = $this->input->post('biaya');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$terpakaiOld = str_replace("Rp. ","",$this->input->post('terpakai'));
			$terpakai = str_replace(".","",$terpakaiOld);
			$teranggarkan = '';			
			
			$anggaranByName = $this->m_pengeluaran->getByName($nama,$bulan,$tahun)->row();
			if ($anggaranByName != "") {							
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p> Pengeluaran '.$nama.' '.$bulan.' '.$tahun.' sudah ada.</p>
		        </div>');
		        return $this->add();
			}
			$kode = $this->m_pengeluaran->auto_increment('t_anggaran','id_anggaran','ANG');
			if ($biaya == 'takteranggarkan') {
				$teranggarkan = 'Ya';
				$data = array(
					'id_anggaran' => $kode,
					'anggaran' => $anggaran,
					'terpakai' => $terpakai,
					'keluar' => $nama,
					'bulan' => $bulan,
					'tahun_anggaran' => $tahun,
					'takteranggarkan' => $teranggarkan,
					'tahap' => $tahap
				);
			}else{
				$teranggarkan = 'Tidak';
				$data = array(
					'id_anggaran' => $kode,
					'id_biaya' => $biaya,
					'anggaran' => $anggaran,
					'terpakai' => $terpakai,
					'keluar' => $nama,
					'bulan' => $bulan,
					'tahun_anggaran' => $tahun,
					'takteranggarkan' => $teranggarkan,
					'tahap' => $tahap
				);
			}				
			
			$save = $this->m_pengeluaran->tambahPengeluaran($data);
			if ($save) {
				log_helper('Pengeluaran '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil ditambahkan.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p> Pengeluaran '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil ditambahkan.</p>
		        </div>');
		        redirect('pengeluaran/?tahun='.$tahun);				
			}else{
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Gagal menambahkan pengeluaran.</p>
		        </div>');       
		        redirect('pengeluaran/?tahun='.$tahun);		        
			}
		}
	}

	public function edit($id)
	{
		$data["title"] = "Edit Pengeluaran";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();	
		$data["biayaData"] = $this->m_biaya->getAll('t_biaya')->result();
		$data["pengeluaran"] = $this->m_pengeluaran->getById($id)->row();
		
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_edit_pengeluaran', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_action($id)
	{
		$this->form_validation->set_rules('namaPengeluaran', 'Nama Pengeluaran', 'trim|required|alpha_numeric_spaces',
			['required' => 'Nama Pengeluaran tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Nama Pengeluaran tidak valid.'
			]);
		$this->form_validation->set_rules('tahap', 'Tahap', 'trim|required',
			['required' => 'Tahap tidak boleh kosong.']);
		$this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required',
			['required' => 'Anggaran tidak boleh kosong.']);
		$this->form_validation->set_rules('terpakai', 'Anggaran Terpakai', 'trim|required',
			['required' => 'Anggaran Terpakai tidak boleh kosong.']);
		$this->form_validation->set_rules('biaya', 'Nama Biaya', 'trim|required',
			['required' => 'Silahkan pilih salah satu nama biaya.']);
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required',
			['required' => 'Silahkan pilih salah satu bulan.']);
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|exact_length[4]',
			['required' => 'Tahun tidak boleh kosong.',
			 'exact_length' => 'Tahun tidak boleh kurang atau lebih dari empat angka.']);		

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$nama = $this->input->post('namaPengeluaran');
			$anggaranOld = str_replace("Rp. ","",$this->input->post('anggaran'));
			$anggaranTerpakaiOld = str_replace("Rp. ","",$this->input->post('terpakai'));
			$anggaran = str_replace(".","",$anggaranOld);		
			$anggaranTerpakai = str_replace(".","",$anggaranTerpakaiOld);		
			$tahap = $this->input->post('tahap');
			$biaya = $this->input->post('biaya');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$teranggarkan = '';			
												
			if ($biaya == 'takteranggarkan') {
				$teranggarkan = 'Ya';
				$data = array(
					'anggaran' => $anggaran,
					'terpakai' => $anggaranTerpakai,
					'tahap' => $tahap,
					'keluar' => $nama,
					'bulan' => $bulan,
					'tahun_anggaran' => $tahun,
					'takteranggarkan' => $teranggarkan
				);
			}else{
				$teranggarkan = 'Tidak';
				$data = array(
					'id_biaya' => $biaya,
					'anggaran' => $anggaran,
					'terpakai' => $anggaranTerpakai,
					'tahap' => $tahap,
					'keluar' => $nama,
					'bulan' => $bulan,
					'tahun_anggaran' => $tahun,
					'takteranggarkan' => $teranggarkan
				);
			}				
			
			$save = $this->m_pengeluaran->updatePengeluaran($id,$data);
			if ($save) {
				log_helper('Pengeluaran '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil diedit.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p> Pengeluaran '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil diedit.</p>
		        </div>');
		        redirect('pengeluaran/?tahun='.$tahun);				
			}else{
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Gagal mengubah pengeluaran.</p>
		        </div>');       
		        redirect('pengeluaran/?tahun='.$tahun);		        
			}
		}
	}

	public function hapus($id,$nama)
	{		
		$getById  = $this->m_pengeluaran->getById($id)->row();
		$namaFix = str_replace("%20"," ",$nama);
		$this->m_pengeluaran->hapusPengeluaran('t_anggaran',$id);
		log_helper('Menghapus '.$namaFix.' dari data pengeluaran.');
		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Berhasil menghapus data pengeluaran.</p>
        </div>');       
        echo json_encode(array("status" => true));        
	}

}

/* End of file pengeluaran.php */
/* Location: ./application/controllers/pengeluaran.php */