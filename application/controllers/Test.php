<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$data[] = array('November','Desember');
		$count = count($data);
		echo $count;
		echo "<br>";
		echo $data[0][0];
		echo "<br>";

		for ($i=0; $i <= $count; $i++) { 
			echo $data[0][$i];			
		}
	}

	public function time()
	{
		// session_start();
		date_default_timezone_set('Asia/Jakarta');
		if(!isset($_SESSION['expire'])){
		      $_SESSION['expire'] = time()+3600;
		}
		$time_remaining = $_SESSION['expire'] - time();
		// echo $time_remaining;
		echo round(abs($time_remaining) / 60, 2) . ' minutes to go ...';
	}

	public function backupSql()
	{
		$this->load->dbutil();
		$backup = '';
		$pref = array(
			'format' => 'zip',
			'filename' => 'db_backup.sql'
		);

		$backup = $this->dbutil->backup($pref);
		$db_name = 'backup-sql'.'.zip';
		$save = FCPATH.'backup/sql/'.$db_name;
		$this->load->helper('file');
		$simpan = write_file($save, $backup);		
		if ($simpan) {
			echo "Sukses";
		}else{
			echo "Gagal";
		}
	}

	public function backupFile()
	{
		$this->load->library('zip');
		$assetsFolder = FCPATH.'assets/';
		$this->zip->read_dir($assetsFolder.'/images/');
		$this->zip->read_dir($assetsFolder.'/pdf/');
		$simpan = $this->zip->archive(FCPATH.'/backup/assets/assets.zip');
		if ($simpan) {
			echo "Sukses";
		}else{
			echo "Gagal";
		}	
	}

	public function pass()
	{
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => "https://md5-reverse-search.p.rapidapi.com/API/md5.php?hash=494c1d47c671e393732e9e33d32eac0a",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: md5-reverse-search.p.rapidapi.com",
				"x-rapidapi-key: dcac6f7006msh84aa441192d60b8p1cf8afjsn205127d1b39d"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$len = strlen($response);
			echo $len;
			if ($len < 0) {
				echo $response;				
			}else{
				echo "Password terlalu rumit untuk di reverse.";
			}
		}
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */