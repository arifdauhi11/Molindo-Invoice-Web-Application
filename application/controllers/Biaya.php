<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya extends CI_Controller {

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
		$data["title"] = "Nama Biaya";
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
		if ($this->session->userdata('role') != 'Direktur' && $this->session->userdata('role') != 'Komisaris' && $this->session->userdata('role') != 'Finance') {
			$this->load->view('v_blocked');
		} else {
			$this->load->view('v_biaya', $data);
		}
		$this->load->view('template/footer', $data);		
	}

	public function add()
	{
		$this->form_validation->set_rules('namaBiaya', 'Nama Biaya', 'trim|required|alpha_numeric_spaces|is_unique[t_biaya.nama_biaya]',
			['required' => 'Nama Biaya tidak boleh kosong.',
			 'is_unique' => 'Nama Biaya sudah ada.',
			 'alpha_numeric_spaces' => 'Nama Biaya tidak valid.'
			]);
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$nama = $this->input->post("namaBiaya");
			$kode = $this->m_biaya->auto_increment('t_biaya','id_biaya','B');
			$data = array(
				'id_biaya' => $kode,
				'nama_biaya' => $nama
			);
			$this->m_biaya->tambahBiaya('t_biaya',$data);
			log_helper('Menambah biaya dengan nama '.$nama.'.');
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
                <strong>Success!</strong>
                <p>Berhasil menambah data biaya.</p>
            </div>');
            redirect('biaya');
		}
	}

	public function edit($id)
	{
		$data = $this->m_biaya->editBiaya('t_biaya',$id)->row();
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post("modalIdBiaya");
		$oldName = $this->input->post("modalOldName");
		$nama = $this->input->post("modalNamaBiaya");
		$data = array(
			'nama_biaya' => $nama
		);
		$this->m_biaya->updateBiaya('t_biaya',$id,$data);
		log_helper('Mengubah nama '.$oldName.' menjadi '.$nama.'.');
		$this->session->set_flashdata('alert', 
		'<div class="bs-callout-success callout-border-left mt-1 p-1">
            <strong>Success!</strong>
            <p>Berhasil mengedit nama biaya.</p>
        </div>');       
        echo json_encode(array("status" => true));
	}

	public function hapus($id,$nama)
	{
		$pengeluaran = $this->m_biaya->getPengeluaranByIdBiaya($id)->result();
		if ($pengeluaran) {
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-danger callout-border-left mt-1 p-1">
	            <strong>Gagal!</strong>
	            <p>Nama Biaya tidak dapat dihapus karena sedang digunakan pada data pengeluaran.</p>
	        </div>');       
	        echo json_encode(array("status" => true));
		} else {
			$this->m_biaya->hapusBiaya('t_biaya',$id);
			log_helper('Menghapus '.$nama.' dari nama biaya.');
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Berhasil menghapus nama biaya.</p>
	        </div>');       
	        echo json_encode(array("status" => true));        
		}		
	}
}

/* End of file biaya.php */
/* Location: ./application/controllers/biaya.php */