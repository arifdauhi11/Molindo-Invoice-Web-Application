<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_biaya extends CI_Model {

	public function getAll($table)
	{
		return $this->db->get($table);
	}

    public function getById($id)
    {
        $this->db->where('id_biaya', $id);
        return $this->db->get('t_biaya');
    }

    public function getPengeluaranByIdBiaya($id)
    {
        $this->db->where('id_biaya', $id);
        return $this->db->get('t_anggaran');
    }

    public function tambahBiaya($table,$data)
    {
        return $this->db->insert($table, $data);        
    }

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

    public function editBiaya($table,$id)
    {
        $this->db->where('id_biaya', $id);
        return $this->db->get($table);
    }

    public function updateBiaya($table,$id,$data)
    {
        $this->db->where('id_biaya', $id);
        return $this->db->update($table, $data);
    }

    public function hapusBiaya($table,$id)
    {
        $this->db->where('id_biaya', $id);
        return $this->db->delete($table);
    }
    
}

/* End of file m_biaya.php */
/* Location: ./application/models/m_biaya.php */