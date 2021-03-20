<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model {

	public function getAllRole()
	{
		return $this->db->get('t_role');
	}

	public function getRoleById($id)
	{
		$this->db->where('id_role', $id);
		return $this->db->get('t_role');
	}
}

/* End of file m_role.php */
/* Location: ./application/models/m_role.php */