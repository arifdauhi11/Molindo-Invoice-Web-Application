<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();				
		$this->load->library('form_validation');		
	}

	public function _cekId()
	{
		if ($this->session->userdata('id_user')) {
            return redirect(base_url('dashboard/'));
        }
	}
	
	public function index()
	{
		$this->_cekId();
		$data["setting"] = $this->m_setting->getSetting('t_pengaturan','id_pengaturan','1')->row();		
		$this->load->view('v_login.php',$data);	
	}	


	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric_spaces',
		['required' => 'Username tidak boleh kosong.',
		 'alpha_numeric_spaces' => 'Username tidak valid.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric_spaces',
		['required' => 'Password tidak boleh kosong.',
		 'alpha_numeric_spaces' => 'Password tidak valid.'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			$getUser = $this->m_user->getByField('username',$u)->row();		
			if ($getUser) {						
				if ($getUser->password == md5($p)) {					
					if ($getUser->status == '1') {
						$karyawan = $this->m_user->getIdKaryawan($getUser->id_user)->row();
						$kd = str_replace("U0","",$getUser->id_user);
						if ($karyawan) {
							$sess = array(
								'id_user' => $getUser->id_user,
								'role' => $getUser->role,
								'kd_invoice' => $kd,
								'id_karyawan' => $karyawan->id
							);							
						}else{
							$sess = array(
								'id_user' => $getUser->id_user,
								'role' => $getUser->role,
								'kd_invoice' => $kd
							);							
						}
						$this->session->set_userdata($sess);								
						log_helper('Login');
						redirect('dashboard');						
					}else{
						$this->session->set_flashdata('alert', 
						'<div class="bs-callout-danger callout-transparent callout-bordered mt-1">
	                        <div class="media align-items-stretch">
	                            <div class="media-left media-middle bg-danger position-relative callout-arrow-left p-2">
	                                <i class="icon-close white font-medium-5"></i>
	                            </div>
	                            <div class="media-body p-1">
	                                <strong>Gagal!</strong>
	                                <p>Akun anda tidak aktif.</p>
	                            </div>
	                        </div>
	                    </div>');
						$this->index();
					}
				}else{
					$this->session->set_flashdata('alert', 
					'<div class="bs-callout-danger callout-transparent callout-bordered mt-1">
                        <div class="media align-items-stretch">
                            <div class="media-left media-middle bg-danger position-relative callout-arrow-left p-2">
                                <i class="icon-close white font-medium-5"></i>
                            </div>
                            <div class="media-body p-1">
                                <strong>Gagal!</strong>
                                <p>Password yang anda masukkan salah.</p>
                            </div>
                        </div>
                    </div>');
					$this->index();	
				}
			}else{
				$this->session->set_flashdata('alert', 
					'<div class="bs-callout-danger callout-transparent callout-bordered mt-1">
                        <div class="media align-items-stretch">
                            <div class="media-left media-middle bg-danger position-relative callout-arrow-left p-2">
                                <i class="icon-close white font-medium-5"></i>
                            </div>
                            <div class="media-body p-1">
                                <strong>Gagal!</strong>
                                <p>Username yang anda masukkan salah.</p>
                            </div>
                        </div>
                    </div>');
				$this->index();
			}
		}
	}

	public function logout()
	{
		log_helper('Logout');
		$this->session->unset_userdata('id_user');            
		redirect('auth');
	}

}
