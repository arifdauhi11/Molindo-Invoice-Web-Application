<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
            return redirect(base_url('auth/'));
        }
	}

	public function index()
	{
		$data["title"] = "Finance";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();		
		$data["finance"] = $this->m_finance->getByRole('finance')->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();	
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		if ($this->session->userdata('role') != 'Direktur') {
			$this->load->view('v_blocked');
		} else {
			$this->load->view('v_finance', $data);
		}
		$this->load->view('template/footer', $data);		
	}

	public function updateSignature($id,$lama,$nama)
	{
		$image = $_FILES["image"];		
		if ($image) {
			$config['upload_path'] = './assets/images/ttd/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '1024';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('image')) {
				$old = $lama;
									
				if ($old != 'default.png') {
					unlink(FCPATH . 'assets/images/ttd/' . $old);
				}
				$new = $this->upload->data('file_name');					
				$data = array(
					'signature' => $new
				);
				$this->m_finance->updateFinance('t_finance',$id,$data);
				log_helper('Mengubah gambar tanda tangan '.$nama.'.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Gambar tanda tangan berhasil diubah.</p>
		        </div>');       
		        redirect('finance');
			} else {
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-warning callout-border-left mt-1 p-1">
		            <strong>Gagal!</strong>
		            <p>Silahkan pilih gambar tanda tangan baru.</p>
		        </div>');       
		        redirect('finance');
			}								
		}
	}

}

/* End of file finance.php */
/* Location: ./application/controllers/finance.php */