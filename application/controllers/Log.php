<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
            return redirect(base_url('auth/'));
        }
	}

	public function index()
	{
		$data["title"] = "Log";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$data["log"] = $this->m_log->getLogAll()->result();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		if ($this->session->userdata('role') != 'Direktur' || $this->session->userdata('role') != 'Komisaris') {
			$this->load->view('v_blocked');
		} else {
			$this->load->view('v_log', $data);
		}
		$this->load->view('template/footer', $data);		
	}

}

/* End of file log.php */
/* Location: ./application/controllers/log.php */