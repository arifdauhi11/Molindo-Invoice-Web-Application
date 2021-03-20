<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporankolektor extends CI_Controller {

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
		$data["pelanggan"] = $this->m_pelanggan->getAll('t_pelanggan')->result();	
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

	public function laporan_perbulan()
	{
		$data["bulan"] = $this->input->get('bulan');
		$data["thn"] = $this->input->get('tahun');		
		$data["karyawan"] = $this->m_kolektor->getAll('karyawan')->result();
		$data["id_karyawan"] = $this->input->get('id_karyawan');		
		if ($data["id_karyawan"]) {
			$data["tagihan"] = $this->m_invoice->getByIdKaryawanBulanDanTahunPembuatan($data["id_karyawan"],$data["bulan"],$data["thn"])->result();
		} else {
			$data["tagihan"] = $this->m_invoice->getByBulanDanTahunPembuatan($data["bulan"],$data["thn"])->result();		
		}
		$data["title"] = "Laporan Tagihan ".$data["bulan"]." ".$data["thn"];
		$data["tahun"] = $this->m_pemasukkan->getTahun()->result();	
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();						
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();				
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_laporan_tagihan', $data);
		$this->load->view('template/footer', $data);	
	}

	public function laporan_pertahun()
	{
		$data["thn"] = $this->input->get('tahun');		
		$data["bulan"] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$data["title"] = "Laporan Tagihan ".$data["thn"];
		$data["tahun"] = $this->m_pemasukkan->getTahun()->result();	
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();						
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();			
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_laporan_tagihan_tahun', $data);
		$this->load->view('template/footer', $data);
	}

}

/* End of file laporankolektor.php */
/* Location: ./application/controllers/laporankolektor.php */