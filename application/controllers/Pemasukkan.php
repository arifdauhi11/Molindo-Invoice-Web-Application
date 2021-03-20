<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukkan extends CI_Controller {

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
		$data["title"] = "Pemasukkan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["thn"] = $this->input->get('tahun');
		$data["bulan"] = $this->input->get('bulan');
		$data["tahap"] = $this->input->get('tahap');
		if ($data["bulan"] != '') {
			$data["pemasukkan"] = $this->m_pemasukkan->getByTahunDanBulan($data["thn"],$data["bulan"],$data["tahap"])->result();					
		}else{
			$data["pemasukkan"] = $this->m_pemasukkan->getByTahun($data["thn"])->result();		
		}
		$data["tahun"] = $this->m_pemasukkan->getTahun()->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();	
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		if ($this->session->userdata('role') != 'Direktur' && $this->session->userdata('role') != 'Finance' && $this->session->userdata('role') != 'Komisaris') {
			$this->load->view('v_blocked');
		} else {
			$this->load->view('v_pemasukkan', $data);
		}
		$this->load->view('template/footer', $data);		
	}

	public function add()
	{
		$data["title"] = "Tambah Pemasukkan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();	
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_add_pemasukkan', $data);
		$this->load->view('template/footer', $data);
	}

	public function add_action()
	{
		$this->form_validation->set_rules('namaPemasukkan', 'Nama Pemasukkan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Nama Pemasukkan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Nama Pemasukkan tidak valid.'
			]);
		$this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required',
			['required' => 'Anggaran tidak boleh kosong.']);
		$this->form_validation->set_rules('tahap', 'Tahap', 'trim|required',
			['required' => 'Silahkan pilih salah satu tahap.']);
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required',
			['required' => 'Silahkan pilih salah satu bulan.']);
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|exact_length[4]',
			['required' => 'Tahun tidak boleh kosong.',
			 'exact_length' => 'Tahun tidak boleh kurang atau lebih dari empat angka.']);
		if (empty($_FILES["image"]["name"])) {
			$this->form_validation->set_rules('image', 'Bukti Kwitansi', 'required',
			['required' => 'Silahkan pilih gambar Bukti Kwitansi.']);
		}

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$nama = $this->input->post('namaPemasukkan');
			$anggaranOld = str_replace("Rp. ","",$this->input->post('anggaran'));
			$anggaran = str_replace(".","",$anggaranOld);		
			$tahap = $this->input->post('tahap');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$bukti = $_FILES["image"];

			$anggaranByName = $this->m_pemasukkan->getByName($nama,$bulan,$tahun)->row();
			if ($anggaranByName != "") {							
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p> Pemasukkan '.$nama.' '.$bulan.' '.$tahun.' sudah ada.</p>
		        </div>');
		        return $this->add();
			}
			$config['upload_path'] = './assets/images/kwitansi/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '1024';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {				
				$kode = $this->m_pemasukkan->auto_increment('t_anggaran','id_anggaran','ANG');
				$buktiName = $this->upload->data('file_name');					

				$data = array(
					'id_anggaran' => $kode,
					'anggaran' => $anggaran,
					'masuk' => $nama,
					'bulan' => $bulan,
					'tahun_anggaran' => $tahun,
					'bukti_kwitansi' => $buktiName,
					'tahap' => $tahap
				);
				$this->m_pemasukkan->tambahPemasukkan($data);
				log_helper('Pemasukkan '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil ditambahkan.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p> Pemasukkan '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil ditambahkan.</p>
		        </div>');
		        redirect('pemasukkan/?tahun='.$tahun);
			} else {
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Gagal menambahkan pemasukkan.</p>
		        </div>');       
		        redirect('pemasukkan/?tahun='.$tahun);		        
			}
		}
	}

	public function edit($id)
	{
		$data["title"] = "Edit Pemasukkan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();	
		$data["pemasukkanData"] = $this->m_pemasukkan->getById($id)->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_edit_pemasukkan', $data);
		$this->load->view('template/footer', $data);
	}

	public function edit_action($id)
	{
		$this->form_validation->set_rules('namaPemasukkan', 'Nama Pemasukkan', 'trim|required|alpha_numeric_spaces',
			['required' => 'Nama Pemasukkan tidak boleh kosong.',
			 'alpha_numeric_spaces' => 'Nama Pemasukkan tidak valid.'
			]);
		$this->form_validation->set_rules('tahap', 'Tahap', 'trim|required',
			['required' => 'Tahap tidak boleh kosong.']);
		$this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required',
			['required' => 'Anggaran tidak boleh kosong.']);
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required',
			['required' => 'Silahkan pilih salah satu bulan.']);
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|exact_length[4]',
			['required' => 'Tahun tidak boleh kosong.',
			 'exact_length' => 'Tahun tidak boleh kurang atau lebih dari empat angka.']);		

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$nama = $this->input->post('namaPemasukkan');
			$tahap = $this->input->post('tahap');			
			$anggaranOld = str_replace("Rp. ","",$this->input->post('anggaran'));
			$anggaran = str_replace(".","",$anggaranOld);		
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$getById  = $this->m_pemasukkan->getById($id)->row();
			if (empty($_FILES["image"]["name"])) {
				$data = array(
				'anggaran' => $anggaran,
				'masuk' => $nama,
				'tahap' => $tahap,				
				'bulan' => $bulan,
				'tahun_anggaran' => $tahun
				);
			} else {
				$exist = file_exists(FCPATH . 'assets/images/kwitansi/'.$getById->bukti_kwitansi);			
				if ($exist) {
					unlink(FCPATH . 'assets/images/kwitansi/'.$getById->bukti_kwitansi);
					$bukti = $_FILES["image"];
					$config['upload_path'] = './assets/images/kwitansi/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size']	= '10000';
					$this->load->library('upload', $config);
						
					if ($this->upload->do_upload('image')) {				
						$buktiName = $this->upload->data('file_name');										
						$data = array(
							'anggaran' => $anggaran,
							'tahap' => $tahap,
							'masuk' => $nama,
							'bulan' => $bulan,
							'tahun_anggaran' => $tahun,
							'bukti_kwitansi' => $buktiName
						);
					} else {
						$this->session->set_flashdata('alert', 
						'<div class="bs-callout-warning callout-border-left mt-1 p-1">
				            <strong>Gagal!</strong>
				            <p>Gagal mengubah pemasukkan.</p>
				        </div>');       
				        redirect('pemasukkan/?tahun='.$tahun);		        
					}
				} else {
					$bukti = $_FILES["image"];
					$config['upload_path'] = './assets/images/kwitansi/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size']	= '10000';
					$this->load->library('upload', $config);
						
					if ($this->upload->do_upload('image')) {				
						$buktiName = $this->upload->data('file_name');										
						$data = array(
							'anggaran' => $anggaran,
							'tahap' => $tahap,
							'masuk' => $nama,
							'bulan' => $bulan,
							'tahun_anggaran' => $tahun,
							'bukti_kwitansi' => $buktiName
						);
					} else {
						$this->session->set_flashdata('alert', 
						'<div class="bs-callout-warning callout-border-left mt-1 p-1">
				            <strong>Gagal!</strong>
				            <p>Gagal mengubah pemasukkan.</p>
				        </div>');       
				        redirect('pemasukkan/?tahun='.$tahun);		        
					}
				}
			}
			
			$save = $this->m_pemasukkan->updatePemasukkan($id,$data);
			if ($save) {
				log_helper('Pemasukkan '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil diedit.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p> Pemasukkan '.$nama.' Bulan '.$bulan.' Tahun '.$tahun.' berhasil diedit.</p>
		        </div>');
		        redirect('pemasukkan/?tahun='.$tahun);
			}else{
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Gagal mengubah pemasukkan.</p>
		        </div>');       
		        redirect('pemasukkan/?tahun='.$tahun);		        
			}			
			
		}
	}

	public function hapus($id,$nama)
	{		
		$getById  = $this->m_pemasukkan->getById($id)->row();
		$namaFix = str_replace("%20"," ",$nama);
		$base = FCPATH . 'assets/images/kwitansi/'.$getById->bukti_kwitansi;
		if ($getById != "") {
			if (file_exists($base)) {				
				$delete = unlink($base);
				if ($delete) {
					$this->m_pemasukkan->hapusPemasukkan('t_anggaran',$id);
				}
			}
		}
		log_helper('Menghapus '.$namaFix.' dari data pemasukkan.');
		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Berhasil menghapus data pemasukkan.</p>
        </div>');       
        echo json_encode(array("status" => true));        
	}
}

/* End of file pemasukkan.php */
/* Location: ./application/controllers/pemasukkan.php */