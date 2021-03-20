<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model {

	public function getSetting($table,$field,$value)
	{
		return $this->db->get_where($table, [$field => $value]);
	}

}

/* End of file m_setting.php */
/* Location: ./application/models/m_setting.php */