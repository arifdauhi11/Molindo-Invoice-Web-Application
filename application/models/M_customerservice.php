<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customerservice extends CI_Model {

	public function getAll($table)
	{
		return $this->db->get($table);
	}	

	public function getByRole($table)
	{
		$this->db->where('id_role', '6');
		return $this->db->get($table);
	}

	public function tambahCS($table,$data)
	{
		return $this->db->insert($table, $data);		
	}

	public function updateCS($table,$id,$data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update($table, $data);
    }
}

/* End of file M_kolektor.php */
/* Location: ./application/models/M_kolektor.php */