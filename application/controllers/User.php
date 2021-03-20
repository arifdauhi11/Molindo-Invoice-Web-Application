<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
            return redirect(base_url('auth/'));
        }
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data["title"] = "User";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["role"] = $this->m_role->getAllRole()->result();
		$data["user"] = $this->m_user->getAll('user')->result();
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		if ($this->session->userdata('role') != 'Direktur') {
			$this->load->view('v_blocked');
		} else {
			$this->load->view('v_user', $data);
		}
		$this->load->view('template/footer', $data);		
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'trim|required|is_unique[t_user.nama_user]',[
			'required' => 'Nama User tidak boleh kosong',
			'is_unique' => 'Nama User sudah ada.'
		]);
		$this->form_validation->set_rules('role', 'Role', 'trim|required',['required' => 
			'Silahkan pilih role.'
		]);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[t_user.username]|alpha_numeric_spaces',['required' => 
			'Username tidak boleh kosong',
			'is_unique' => 'Username sudah ada.',
		 	'alpha_numeric_spaces' => 'Username hanya mengandung huruf dan angka.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_spaces',['required' => 'Password tidak boleh kosong',
		 	'alpha_numeric_spaces' => 'Password hanya mengandung huruf dan angka.']);
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$nama = $this->input->post('nama');
			$role = $this->input->post('role');
			$username = $this->input->post('username');
			$pass = $this->input->post('password');
			$kodeUser = $this->m_user->auto_increment('t_user','id_user','U');
			$getRole = $this->m_role->getRoleById($role)->row();
			if ($getRole->role == 'Finance') {
				$kodeFinance = $this->m_user->auto_increment('t_finance','id_finance','F');
				$dataFinance = array(
				'id_finance' => $kodeFinance,
				'id_user' => $kodeUser				
				);
				$dataFoto = array(				
				'id_user' => $kodeUser,			
				'foto_profil' => 'user.png'
				);
				$this->m_foto->tambahFotoProfil($dataFoto);
				$this->m_finance->tambahFinance('t_finance',$dataFinance);
			} else if ($getRole->role == 'Kolektor') {
				$kodeKolektor = $this->m_user->auto_increment('t_kolektor','id_kolektor','K');	
				$dataKolektor = array(
				'id_kolektor' => $kodeKolektor,
				'id_user' => $kodeUser
				);
				$dataFoto = array(				
				'id_user' => $kodeUser,			
				'foto_profil' => 'user.png'
				);
				$this->m_foto->tambahFotoProfil($dataFoto);
				$this->m_kolektor->tambahKolektor('t_kolektor',$dataKolektor);
			} else if ($getRole->role == 'Customer Service') {
				$kodeCS = $this->m_user->auto_increment('t_customer_service','id_customer_service','CS');	
				$dataCS = array(
				'id_customer_service' => $kodeCS,
				'id_user' => $kodeUser
				);
				$dataFoto = array(				
				'id_user' => $kodeUser,			
				'foto_profil' => 'user.png'
				);
				$this->m_foto->tambahFotoProfil($dataFoto);
				$this->m_customerservice->tambahCS('t_customer_service',$dataCS);
			} else {
				$dataFoto = array(				
				'id_user' => $kodeUser,			
				'foto_profil' => 'user.png'
				);
				$this->m_foto->tambahFotoProfil($dataFoto);
			}

			$dataUser = array(
				'id_user' => $kodeUser,
				'id_role' => $role,
				'nama_user' => $nama,
				'username' => $username,
				'password' => md5($pass)
			);			
			$this->m_user->tambahUser('t_user',$dataUser);			
			log_helper('Menambah '.$nama.' sebagai user baru.');			
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
                <strong>Success!</strong>
                <p>Berhasil menambah data user.</p>
            </div>');
            redirect('user');			
		}
	}

	public function edit($id)
	{
		$data["title"] = "Edit User";
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();				
		$data["role"] = $this->m_role->getAllRole()->result();
		$data["user"] = $this->m_user->editUser('user',$id)->row();		
		$data["userData"] = $this->m_user->getByField('id_user',$this->session->userdata('id_user'))->row();
		if ($this->session->userdata('role') == 'Direktur') {
			$data["notif"] = $this->m_notifikasi->getAllNotif()->result();			
		} else {
			$data["notif"] = $this->m_notifikasi->getNotifByIdUser($this->session->userdata('id_user'))->result();
		}
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('v_edit_user', $data);
		$this->load->view('template/footer', $data);		
	}

	public function updateUser($id)
	{
		$this->form_validation->set_rules('nama', 'Nama User', 'trim|required',[
			'required' => 'Nama User tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('role', 'Role', 'trim|required',[
			'required' => 'Role tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('username', 'Nama User', 'trim|required',[
			'required' => 'Username tidak boleh kosong.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = array(
				'nama_user' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'id_role' => $this->input->post('role')
			);
			$this->m_user->updateUser('t_user',$id,$data);
			log_helper('Mengubah data user.');						
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Data user berhasil diubah.</p>
	        </div>');       
	        redirect('user/edit/'.$this->uri->segment(3));
		}
	}

	public function updatePassword($id,$nama)
	{
		$namaFix = str_replace("%20"," ",$nama);
		$this->form_validation->set_rules('passwordBaru', 'Password Baru', 'trim|required',[
			'required' => 'Password Baru tidak boleh kosong.'
		]);
		$this->form_validation->set_rules('kpasswordBaru', 'Konfirmasi Password Baru', 'trim|required|matches[passwordBaru]',[
			'required' => 'Konfirmasi Password Baru tidak boleh kosong.',
			'matches' => 'Konfirmasi Password tidak sama.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = array(
				'password' => md5($this->input->post('passwordBaru'))
			);

			$this->m_user->updateUser('t_user',$id,$data);
			log_helper('Mengubah password '.$namaFix.'.');			
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Password berhasil diubah.</p>
	        </div>');       
	        redirect('user/edit/'.$this->uri->segment(3));
		}
	}

	public function updateImage($id,$lama)
	{
		$image = $_FILES["image"];				
		if ($image) {
			$dataU = $this->m_user->getByField('id_user',$id)->row();		
			$exist = file_exists(FCPATH . 'assets/images/profil/'.$dataU->foto_profil);			
			if ($exist == '1') {
				$config['upload_path'] = './assets/images/profil/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']	= '10000';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('image')) {
					$old = $dataU->foto_profil;									
					if ($old != 'user.png') {
						unlink(FCPATH . 'assets/images/profil/' . $old);
					}
					$new = $this->upload->data('file_name');					
					$data = array(
						'foto_profil' => $new
					);
					$this->m_user->updateUser('t_foto_profil',$id,$data);
					log_helper('Mengubah foto profil.');
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-success callout-border-left mt-1 p-1">
			            <strong>Success!</strong>
			            <p>Foto profil berhasil diubah.</p>
			        </div>');       
			        redirect('user/edit/'.$this->uri->segment(3));
				} else {
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-warning callout-border-left mt-1 p-1">
			            <strong>Gagal!</strong>
			            <p>Silahkan pilih foto profil baru.</p>
			        </div>');       
			        redirect('user/edit/'.$this->uri->segment(3));
				}												
			} else {
				$config['upload_path'] = './assets/images/profil/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']	= '10000';
				$this->load->library('upload', $config);				
				if ( ! $this->upload->do_upload('image')){
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-warning callout-border-left mt-1 p-1">
			            <strong>Gagal!</strong>
			            <p>Silahkan pilih foto profil baru.</p>
			        </div>');       
			        redirect('user/edit/'.$this->uri->segment(3));
				} else {
					$this->upload->data();
					$new = $this->upload->data('file_name');					
					$data = array(
						'foto_profil' => $new
					);
					$this->m_user->updateUser('t_foto_profil',$id,$data);
					log_helper('Mengubah foto profil.');
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-success callout-border-left mt-1 p-1">
			            <strong>Success!</strong>
			            <p>Foto profil berhasil diubah.</p>
			        </div>');       
			        redirect('user/edit/'.$this->uri->segment(3));
				}
			}
		}		
	}

	public function upStatus($id,$status,$nama)
	{
		$namaFix = str_replace("%20"," ",$nama);
		if ($status == '0') {
			$status = '1';
			$this->m_user->ubahStatusUser('t_user',$id,$status);
			log_helper('Mengaktifkan akun '.$namaFix.'.');						
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Akun '.$namaFix.' berhasil diaktifkan.</p>
	        </div>');       
	        echo json_encode(array("status" => true));	
		} else {
			$status = '0';
			$this->m_user->ubahStatusUser('t_user',$id,$status);
			log_helper('Menonaktifkan akun '.$namaFix.'.');									
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-success callout-border-left mt-1 p-1">
	            <strong>Success!</strong>
	            <p>Akun '.$namaFix.' berhasil dinonaktifkan.</p>
	        </div>');       
	        echo json_encode(array("status" => true));
		}
	}

	public function hapus($id,$nama)
	{		
		$namaFix = str_replace("%20"," ",$nama);
		$getByIdUser = $this->m_user->getIdKaryawan($id)->row();	
		if ($getByIdUser) {
			$base = FCPATH . 'assets/';									
			$fp = '';
			$sg = '';
			if ($getByIdUser->foto_profil == 'user.png') {
				$fp = 'user.png';
			}else{
				$fp = $getByIdUser->foto_profil;
				$baseProfil = $base.'images/profil/'.$fp;
				unlink($baseProfil);				
			}
			if ($getByIdUser->signature == 'default.png') {				
				$sg = 'default.png';
			}else{
				$sg = $getByIdUser->signature;
				$baseTtd = $base.'images/ttd/'.$sg;
				unlink($baseTtd);				
			}

			$getByIdKaryawan = $this->m_invoice->getInvoiceByIdKaryawan($getByIdUser->id)->result();			
			if ($getByIdKaryawan != "") {				
				$baseInvoice = '';
				$baseBukti = '';
				$delete = '';				
				for ($i=0; $i < count($getByIdKaryawan); $i++) { 
					$delete = $this->m_invoice->deleteByIdKaryawan($getByIdKaryawan[$i]->id_tagihan);
					if ($delete) {
						$baseInvoice = $base.'pdf/'.$getByIdKaryawan[$i]->nama_invoice;					
						unlink($baseInvoice);					
						if ($getByIdKaryawan[$i]->bukti_transfer == '') {								
						}else{
							$baseBukti = $base.'images/transfer/'.$getByIdKaryawan[$i]->bukti_transfer;
							unlink($baseBukti);											
						}						
					}
				}
				$this->m_user->hapusUser('t_user',$id);
				log_helper('Menghapus '.$namaFix.' dari data user.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil menghapus data user.</p>
		        </div>');       
		        
		        echo json_encode(array("status" => true));
			}else{
				$this->m_user->hapusUser('t_user',$id);
				log_helper('Menghapus '.$namaFix.' dari data user.');
				$this->session->set_flashdata('alert', 
				'<div class="bs-callout-success callout-border-left mt-1 p-1">
		            <strong>Success!</strong>
		            <p>Berhasil menghapus data user.</p>
		        </div>');       
		        echo json_encode(array("status" => true));
			}					
		}else{
			$this->session->set_flashdata('alert', 
			'<div class="bs-callout-danger callout-border-left mt-1 p-1">
	            <strong>Gagal!</strong>
	            <p>Gagal menghapus data user.</p>
	        </div>');       
	        echo json_encode(array("status" => true));
		}				       
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */