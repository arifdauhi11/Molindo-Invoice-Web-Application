<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
		$data["thn"] = $this->input->get('tahun');
		$data["bulan"] = $this->input->get('bulan');
		$data["tahap"] = $this->input->get('tahap');
		$data["tahun"] = $this->m_pemasukkan->getTahun()->result();
		$data["biaya"] = $this->m_biaya->getAll('t_biaya')->result();
		$data["pengeluaranIdBiaya"] = $this->m_pengeluaran->getByIdBiaya()->result();		
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		if ($data["bulan"]) {
			$data["pemasukkan"] = $this->m_pemasukkan->getByTahunDanBulan($data["thn"],$data["bulan"],$data["tahap"])->result();

			$data["pengeluaran"] = $this->m_pengeluaran->getByTahunDanBulan($data["thn"],$data["bulan"],$data["tahap"])->result();

			$data["pengeluaranTakteranggar"] = $this->m_pengeluaran->getByTahunDanBulan2($data["thn"],$data["bulan"],$data["tahap"])->result();		
		} else {
			$data["pemasukkan"] = array();

			$data["pengeluaran"] = array();

			$data["pengeluaranTakteranggar"] = array();
		}

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		if ($this->session->userdata('role') != 'Direktur' && $this->session->userdata('role') != 'Finance' && $this->session->userdata('role') != 'Komisaris') {
			$this->load->view('v_blocked');
		} else {
			$this->load->view('v_laporan', $data);
		}
		$this->load->view('template/footer', $data);		
	}

}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */