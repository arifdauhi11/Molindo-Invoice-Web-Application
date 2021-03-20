<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function getAll($table)
	{
        $this->db->order_by('id_role', 'asc');
		return $this->db->get($table);
	}

    public function getByField($field,$record)
    {
        return $this->db->get_where('user', [$field => $record]);
    }    

    public function getIdKaryawan($idUser)
    {
        $this->db->where('id_user', $idUser);
        return $this->db->get('karyawan');
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

	public function tambahUser($table,$data)
	{
		return $this->db->insert($table, $data);		
	}

    public function editUser($table,$id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get($table);
    }

    public function updateUser($table,$id,$data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update($table, $data);
    }

    public function ubahStatusUser($table,$id,$status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id_user', $id);
        return $this->db->update($table, $data);
    }

    public function hapusUser($table,$id)
    {
        $where = array(
            'id_user' => $id
        );        
        $this->db->delete('t_foto_profil', $where);        
        $this->db->delete('t_log', $where);        
        $this->db->delete('t_finance', $where);        
        $this->db->delete('t_kolektor', $where);        
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }    
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */