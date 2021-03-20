<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kolektor extends CI_Model {

	public function getAll($table)
	{
		return $this->db->get($table);
	}	

	public function getByRole($table)
	{
		$this->db->where('id_role', '5');
		return $this->db->get($table);
	}

	public function tambahKolektor($table,$data)
	{
		return $this->db->insert($table, $data);		
	}

	public function updateKolektor($table,$id,$data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update($table, $data);
    }
}

/* End of file M_kolektor.php */
/* Location: ./application/models/M_kolektor.php */