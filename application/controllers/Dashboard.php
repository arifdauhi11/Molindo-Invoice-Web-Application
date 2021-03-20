<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
            return redirect(base_url('auth/'));
        }        
	}

	public function index()
	{
		$data["title"] = "Dashboard";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();		
		$data["pelanggan"] = $this->m_pelanggan->getAll('t_pelanggan')->result();
		$data["kolektor"] = $this->m_user->getByField('role','kolektor')->result();		
		$data["finance"] = $this->m_user->getByField('role','finance')->result();		
		$data["cs"] = $this->m_user->getByField('role','customer service')->result();		
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$data["log"] = $this->m_log->getLog()->result();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_dashboard', $data);
		$this->load->view('template/footer', $data);		
	}	
	
	public function aaa()
	{
		// 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
		$bu[] = array(
			'Mei','Juni','Juli'
		);
		$aa = array();
		$bb = array();
		$cc = "";
		$dd = "";
		// die;
		for ($i=0; $i < count($bu[0]); $i++) { 
			$user = $this->m_invoice->getInvoiceByIdPelanggan('PL001',$bu[0][$i],'2020')->result();			
			if ($user) {
				// echo "<pre>";
				// print_r ($user);
				// echo "</pre>";				
				array_push($aa, $bu[0][$i]);
				$cc = "Sudah ada";
			}else{
				array_push($bb, $bu[0][$i]);
				$dd = "Belum ada";
			}
		}
		echo "<pre>";
		print_r ($aa);
		echo "</pre>";
		echo "<br>";
		echo "<pre>";
		print_r ($bb);
		echo "</pre>";
		echo "<br>";
		echo $cc;
		echo "<br>";
		echo $dd;
	}	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */