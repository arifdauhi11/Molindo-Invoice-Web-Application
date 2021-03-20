<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	public function getAll($table)
	{
		return $this->db->get($table);
	}

    public function getPelangganByStatus($status)
    {
        $this->db->where('status_pelanggan', $status);
        return $this->db->get('t_pelanggan');
    }

    public function getPelangganById($id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->get('t_pelanggan');
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

	public function tambahPelanggan($table,$data)
	{
		return $this->db->insert($table, $data);		
	}

    public function editPelanggan($table,$id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->get($table);
    }

    public function updatePelanggan($table,$id,$data)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->update($table, $data);
    }

    public function updateBT($table,$id,$data)
    {
        $this->db->where('id_biaya_tambahan', $id);
        return $this->db->update($table, $data);
    }

    public function updateHP($table,$id,$data)
    {
        $this->db->where('id_no_hp', $id);
        return $this->db->update($table, $data);
    }

    public function hapusPelanggan($table,$id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->delete($table);
    } 

    public function tambahBiayaTambahan($table,$data)
    {
        return $this->db->insert($table, $data);        
    }   

    public function tambahNoTelp($table,$data)
    {
        return $this->db->insert($table, $data);        
    }

    public function getNoHP($id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->get('t_no_hp');
    }

    public function getBT($id)
    {
        $this->db->where('id_pelanggan', $id);
        return $this->db->get('t_biaya_tambahan');
    }

    public function hapusSementara($id)
    {
        $data = array('status_pelanggan' => 'inactive');
        $this->db->where('id_pelanggan', $id);
        return $this->db->update('t_pelanggan', $data);
    }

    public function aktif($id)
    {
        $data = array('status_pelanggan' => 'active');
        $this->db->where('id_pelanggan', $id);
        return $this->db->update('t_pelanggan', $data);
    }
}

/* End of file m_pelanggan.php */
/* Location: ./application/models/m_pelanggan.php */