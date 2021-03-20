<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_foto extends CI_Model {

	public function tambahFotoProfil($data)
	{
		return $this->db->insert('t_foto_profil', $data);
	}

}

/* End of file m_foto.php */
/* Location: ./application/models/m_foto.php */