<?php

	function log_helper($aksi){
	    $CI =& get_instance();

	    $param['id_user'] = $CI->session->userdata('id_user');
	    $param['aksi'] = $aksi; //membuat, menambah, menghapus, mengubah,

	    //load model log
	    $CI->load->model('m_log');

	    //save to database
	    $CI->m_log->save_log($param);

	}
?>