<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_finance extends CI_Model {

	public function getAll($table)
	{
		return $this->db->get($table);
	}

	public function getByRole($table)
	{
		$this->db->where('id_role', '4');
		return $this->db->get($table);
	}

	public function tambahFinance($table,$data)
	{
		return $this->db->insert($table, $data);		
	}

	public function updateFinance($table,$id,$data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update($table, $data);
    }

}

/* End of file m_finance.php */
/* Location: ./application/models/m_finance.php */