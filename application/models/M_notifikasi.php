<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model {

	public function getAllNotif()
	{
		$this->db->where('status_notif', 'active');
		$this->db->order_by('waktu', 'desc');
		return $this->db->get('t_notifikasi');
	}

	public function getNotifById($id)
	{
		$this->db->where('id_notifikasi', $id);
		$this->db->order_by('waktu', 'desc');
		return $this->db->get('t_notifikasi');
	}

	public function getNotifByIdUser($id)
	{
		$this->db->where('id_user', $id);
		$this->db->where('status_notif_karyawan', 'active');
		$where = "is_confirm!='null'";
		$this->db->where($where);
		$this->db->order_by('waktu_karyawan', 'desc');
		return $this->db->get('t_notifikasi');
	}

	public function cekNotifByIdUserAndIdData($idUser,$idData,$action)
	{
		$this->db->where('id_user', $idUser);
		$this->db->where('id_data', $idData);
		$this->db->where('action', $action);
		$this->db->where('is_confirm', 'null');
		return $this->db->get('t_notifikasi');
	}

	public function tambahNotifikasi($data)
    {
        return $this->db->insert('t_notifikasi', $data);
    }

    public function batalNotifikasi($id,$data)
    {
    	$this->db->where('id_notifikasi', $id);
    	return $this->db->update('t_notifikasi', $data);
    }

    public function confirmNotifikasi($id,$data)
    {
    	$this->db->where('id_notifikasi', $id);
    	return $this->db->update('t_notifikasi', $data);
    }

    public function hapusByIdPelanggan($id)
    {
    	$this->db->where('id_data', $id);
    	return $this->db->delete('t_notifikasi');
    }

}

/* End of file m_notifikasi.php */
/* Location: ./application/models/m_notifikasi.php */