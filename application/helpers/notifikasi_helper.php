<?php 
	
	function deleteData()
	{
		$CI =& get_instance();

	    $param['id_user'] = $CI->session->userdata('id_user');
	}
	
?>