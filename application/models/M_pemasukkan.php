<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemasukkan extends CI_Model {
	
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
		$this->db->where('masuk', $nama);
		$this->db->where('bulan', $bulan);
		$this->db->where('tahun_anggaran', $tahun);
		return $this->db->get('t_anggaran');
	}

	public function getByTahun($tahun)
	{
		$this->db->where('tahun_anggaran', $tahun);
		$this->db->order_by('bulan', 'asc');
		return $this->db->get('pemasukkan');
	}

	public function getByTahunDanBulan($tahun,$bulan, $tahap)
	{
		$this->db->where('tahun_anggaran', $tahun);
		$this->db->where('bulan', $bulan);	
		$this->db->where('tahap', $tahap);	
		$this->db->order_by('bulan', 'asc');
		return $this->db->get('pemasukkan');
	}

	public function getTahun()
	{
		$this->db->select('DISTINCT (tahun_anggaran)');
		return $this->db->get('t_anggaran');
	}

	public function tambahPemasukkan($data)
	{
		return $this->db->insert('t_anggaran', $data);
	}

	public function updatePemasukkan($id,$data)
	{
		$this->db->where('id_anggaran', $id);
		return $this->db->update('t_anggaran', $data);		
	}

	public function hapusPemasukkan($table,$id)
    {
        $this->db->where('id_anggaran', $id);
        return $this->db->delete($table);
    }

    public function getById($id)
    {
    	$this->db->where('id_anggaran', $id);
    	return $this->db->get('pemasukkan');
    }
}

/* End of file m_pemasukkan.php */
/* Location: ./application/models/m_pemasukkan.php */