<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model {

	public function getAll()
	{
		return $this->db->get('tagihan');
	}

	public function tambahInvoice($table,$data)
	{
		return $this->db->insert($table, $data);		
	}

	public function getInvoiceById($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->order_by('periode', 'asc');
		return $this->db->get('tagihan');
	}

	public function getInvoiceByIdAndTahun($id,$tahun)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->where('tahun_tagihan', $tahun);
		$this->db->order_by('periode', 'asc');
		return $this->db->get('tagihan');
	}

	public function getInvoiceByIdKaryawan($id)
	{
		$this->db->where('id_karyawan', $id);
		$where = "status_tagihan='paid' OR status_tagihan='transfer'";
		$this->db->where($where);
		$this->db->order_by('periode', 'asc');
		return $this->db->get('tagihan');
	}

	public function getInvoiceByBulan($bulan)
	{
		$this->db->where('bulan_tagihan', $bulan);
		return $this->db->get('tagihan');
	}

	public function getByPlDanBulanDanTahun($idPL,$bulan,$tahun)
	{
		$this->db->where('id_pelanggan', $idPL);
		$this->db->where('periode', $bulan);
		$this->db->where('tahun_tagihan', $tahun);
		return $this->db->get('tagihan');
	}

	public function getInvoiceByIdInvoice($id)
	{
		$this->db->where('id_tagihan', $id);
		$this->db->order_by('periode', 'asc');
		return $this->db->get('tagihan');
	}

	public function getInvoiceByIdAndIdKaryawan($id,$idKaryawan)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->where('id_karyawan', $idKaryawan);	
		$this->db->order_by('periode', 'asc');
		$this->db->order_by('tahun_tagihan', 'asc');
		return $this->db->get('tagihan');
	}

	public function getInvoiceByIdAndIdKaryawanAndStatus($id,$idKaryawan,$status)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->where('id_karyawan', $idKaryawan);	
		$this->db->where('status_tagihan', $status);	
		$this->db->order_by('periode', 'asc');
		$this->db->order_by('tahun_tagihan', 'asc');
		return $this->db->get('tagihan');
	}

	public function getInvoiceByIdKaryawanAndPeriode($id)
	{
		$bulan = '';
		if (date("n") == "1") {
			$bulan = 'Januari';
		} else if (date("n") == "2") {
			$bulan = 'Februari';
		} else if (date("n") == "3") {
			$bulan = 'Maret';
		} else if (date("n") == "4") {
			$bulan = 'April';
		} else if (date("n") == "5") {
			$bulan = 'Mei';
		} else if (date("n") == "6") {
			$bulan = 'Juni';
		} else if (date("n") == "7") {
			$bulan = 'Juli';
		} else if (date("n") == "8") {
			$bulan = 'Agustus';
		} else if (date("n") == "9") {
			$bulan = 'September';
		} else if (date("n") == "10") {
			$bulan = 'Oktober';
		} else if (date("n") == "11") {
			$bulan = 'November';
		} else if (date("n") == "12") {
			$bulan = 'Desember';
		}
		$this->db->where('id_karyawan', $id);
		$this->db->where('tahun_pembuatan', date("Y"));
		$this->db->where('bulan_tagihan', $bulan);
		return $this->db->get('t_tagihan2');
	}

	public function getInvoiceByIdTagihan($id)
	{
		$this->db->where('id_tagihan', $id);
		return $this->db->get('tagihan');
	}	

	public function getInvoiceByIdPelanggan($id,$bulan,$tahun)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->where('periode', $bulan);
        $this->db->where('tahun_tagihan', $tahun);
		return $this->db->get('tagihan');
    }  

    public function getInvoiceByTahun($id,$tahun)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->where('tahun_tagihan', $tahun);
		return $this->db->get('tagihan');
	}

	public function getInvoiceByTahunAndIdKaryawan($id,$tahun,$idKaryawan)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->where('tahun_tagihan', $tahun);
		$this->db->where('id_karyawan', $idKaryawan);	
		$this->db->order_by('periode', 'asc');
		$this->db->order_by('tahun_tagihan', 'asc');
		return $this->db->get('tagihan');
	}

	public function getByBulanTahun($bulan,$tahun)
	{
		$this->db->where('periode', $bulan);
		$this->db->where('tahun_tagihan', $tahun);
		return $this->db->get('tagihan');
	}

    public function getTahun()
	{
		$this->db->select('DISTINCT (tahun_tagihan)');
		return $this->db->get('tagihan');
	}

	public function deleteByIdPelanggan($id)
	{		
		$this->db->where('id_pelanggan', $id);
		$where = "status_tagihan='paid' OR status_tagihan='transfer'";
		$this->db->where($where);
		return $this->db->delete('t_tagihan2');		
	}

	public function deleteByIdKaryawan($id)
	{
		$this->db->where('id_tagihan', $id);
		return $this->db->delete('t_tagihan2');
	}

	public function deleteByIdInvoice($id)
	{
		$this->db->where('id_tagihan', $id);
		return $this->db->delete('t_tagihan2');
	}

    public function updateStatusInvoice($id,$status)
	  {
	  	$this->db->where('id_tagihan', $id);
	  	$data = array(
	  		'status_tagihan' => $status
	  	);
	  	return $this->db->update('t_tagihan2', $data);
	  }  

	public function updateStatusInvoiceTransfer($id,$status,$bukti)
	{
	  	$this->db->where('id_tagihan', $id);
	  	$data = array(
	  		'status_tagihan' => $status,
	  		'bukti_transfer' => $bukti
	  	);
		return $this->db->update('t_tagihan2', $data);
	}  

	public function updateBukti($id,$data)
	{
		$this->db->where('id_tagihan', $id);
		return $this->db->update('t_tagihan2', $data);
	}

	public function getTransfer($bulan)
	{
		$this->db->where('tahun_tagihan', date("Y"));
		$this->db->where('periode', $bulan);
		$this->db->where('status_tagihan', 'transfer');
		return $this->db->get('tagihan');
	}

	public function getLunas($bulan)
	{		
		$this->db->where('tahun_tagihan', date("Y"));
		$this->db->where('periode', $bulan);
		$this->db->where('status_tagihan', 'paid');
		return $this->db->get('tagihan');
	}

	public function getPending($bulan)
	{		
		$this->db->where('tahun_tagihan', date("Y"));
		$this->db->where('periode', $bulan);
		$this->db->where('status_tagihan', 'pending');
		return $this->db->get('tagihan');
	}

	public function getDistinctInvoice($bulan)
	{
		$this->db->select('DISTINCT (id_pelanggan)');
		$this->db->where('tahun_tagihan', date("Y"));
		$this->db->where('periode', $bulan);
		return $this->db->get('tagihan');
	}

	public function getByBulanDanTahunPembuatan($bulan,$tahun)
	{
		$where = "status_tagihan!='pending'";
		$this->db->where($where);
		$this->db->where('bulan_tagihan', $bulan);
		$this->db->where('status_pelanggan', 'active');
		$this->db->where('tahun_pembuatan', $tahun);
		return $this->db->get('tagihan');
	}

	public function getByTahunPembuatan($tahun,$bulan)
	{
		$where = "status_tagihan!='pending'";
		$this->db->where($where);
		$this->db->where('bulan_tagihan', $bulan);
		$this->db->where('tahun_pembuatan', $tahun);
		return $this->db->get('tagihan');
	}

	public function getByIdKaryawanBulanDanTahunPembuatan($id,$bulan,$tahun)
	{
		$this->db->where('id_karyawan', $id);
		$where = "status_tagihan!='pending'";
		$this->db->where($where);
		$this->db->where('bulan_tagihan', $bulan);
		$this->db->where('status_pelanggan', 'active');
		$this->db->where('tahun_pembuatan', $tahun);
		return $this->db->get('tagihan');
	}

}

/* End of file m_invoice.php */
/* Location: ./application/models/m_invoice.php */