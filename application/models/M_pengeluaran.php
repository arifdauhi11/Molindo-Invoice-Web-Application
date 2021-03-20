<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {

	public function auto_increment($table,$field,$kode) { 
        $q = $this->db->query("SELECT MAX(RIGHT(".$field.", 3)) AS idmax FROM ".$table);
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; 
                $kd = sprintf("%06s", $tmp);
            }
        }else{ 
            $kd = "0001";
        }
        return $kode.$kd;
    }

    public function getAll($table)
	{
		return $this->db->get($table);
	}

	public function getByName($nama,$bulan,$tahun)
	{
		$this->db->where('keluar', $nama);
		$this->db->where('bulan', $bulan);
		$this->db->where('tahun_anggaran', $tahun);
		return $this->db->get('t_anggaran');
	}

	public function getByTahun($tahun)
	{
		$this->db->where('tahun_anggaran', $tahun);
		$this->db->order_by('bulan', 'asc');
		return $this->db->get('pengeluaran');
	}

	public function getByTahunDanTakteranggar($tahun,$bulan,$takteranggarkan,$tahap)
	{
		$this->db->where('tahun_anggaran', $tahun);
		$this->db->where('takteranggarkan', $takteranggarkan);
		$this->db->where('bulan', $bulan);
		$this->db->where('tahap', $tahap);
		$this->db->order_by('bulan', 'asc');
		return $this->db->get('pengeluaran');
	}

	public function getByTahunDanBiaya($tahun,$bulan,$biaya,$tahap)
	{
		$this->db->where('tahun_anggaran', $tahun);
		$this->db->where('id_biaya', $biaya);
		$this->db->where('bulan', $bulan);		
		$this->db->where('tahap', $tahap);		
		$this->db->order_by('bulan', 'asc');
		$this->db->order_by('id_biaya', 'asc');
		return $this->db->get('pengeluaran');
	}	

	public function getByTahunDanBulan($tahun,$bulan, $tahap)
	{
		$this->db->where('tahun_anggaran', $tahun);
		$this->db->where('bulan', $bulan);
		$this->db->where('tahap', $tahap);
		$this->db->where('takteranggarkan', 'Tidak');		
		$this->db->order_by('bulan', 'asc');
		return $this->db->get('pengeluaran');
	}

	public function getByIdBiaya()
	{
		$this->db->select('DISTINCT (id_biaya)');
		$this->db->where('id_biaya !=', "NULL");
		return $this->db->get('pengeluaran');
	}

	public function getByTahunDanBulan2($tahun,$bulan,$tahap)
	{
		$this->db->where('tahun_anggaran', $tahun);
		$this->db->where('bulan', $bulan);
		$this->db->where('tahap', $tahap);
		$this->db->where('takteranggarkan', 'Ya');		
		$this->db->order_by('bulan', 'asc');
		return $this->db->get('pengeluaran');
	}

	public function getTahun()
	{
		$this->db->select('DISTINCT (tahun_anggaran)');
		return $this->db->get('t_anggaran');
	}

	public function tambahPengeluaran($data)
	{
		return $this->db->insert('t_anggaran', $data);		
	}

	public function updatePengeluaran($id,$data)
	{
		$this->db->where('id_anggaran', $id);
		return $this->db->update('t_anggaran', $data);		
	}

	public function hapusPengeluaran($table,$id)
    {
        $this->db->where('id_anggaran', $id);
        return $this->db->delete($table);
    }

    public function getById($id)
    {
    	$this->db->where('id_anggaran', $id);
    	return $this->db->get('pengeluaran');
    }

}

/* End of file m_pengeluaran.php */
/* Location: ./application/models/m_pengeluaran.php */