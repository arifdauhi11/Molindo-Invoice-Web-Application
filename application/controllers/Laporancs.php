<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporancs extends CI_Controller {

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
		$data["title"] = "Laporan";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();						
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		$data["pelanggan"] = $this->m_pelanggan->getPelangganByStatus('active')->result();
		$data["tahun"] = $this->m_pemasukkan->getTahun()->result();
		$data["thn"] = $this->input->get('tahun');
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_laporan_kolektor', $data);
		$this->load->view('template/footer', $data);		
	}

	public function detail_perbulan()
	{
		$data["thn"] = $this->input->get('tahun');
		$data["bln"] = $this->input->get('bulan');
		$data["title"] = "Laporan Bulan ".$data['bln'];
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();						
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		$pelangganAll = $this->m_pelanggan->getPelangganByStatus('active')->result();
		$tagihan = $this->m_invoice->getByBulanTahun($data['bln'],$data['thn'])->result();		
		$data["pelanggan"] = array();
		foreach ($pelangganAll as $key) {
			$bulan = $this->m_invoice->getByPlDanBulanDanTahun($key->id_pelanggan,$data["bln"],$data["thn"])->row();
			if ($bulan) {
				array_push($data["pelanggan"], array("nama_pelanggan" => $key->nama_pelanggan, "iuran" => $bulan->iuran));
			} else {
				array_push($data["pelanggan"], array("nama_pelanggan" => $key->nama_pelanggan, "iuran" => $key->iuran));				
			}
		}
		$data["tahun"] = $this->m_pemasukkan->getTahun()->result();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_laporan_cs', $data);
		$this->load->view('template/footer', $data);
	}

}

/* End of file laporankolektor.php */
/* Location: ./application/controllers/laporankolektor.php */