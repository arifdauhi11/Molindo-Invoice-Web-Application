<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_log extends CI_Model {

    public function save_log($param)
    {
        $sql        = $this->db->insert_string('t_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function getLog()
    {
        $this->db->order_by('waktu', 'desc');
    	return $this->db->get('log', 5);
    }

    public function getLogAll()
    {
        $this->db->order_by('waktu', 'desc');
        return $this->db->get('log');
    }
}