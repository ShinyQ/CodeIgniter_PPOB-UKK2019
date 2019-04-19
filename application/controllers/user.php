<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct() {
			 parent::__construct();
			 $this->load->model('m_user','user');
	}

	public function login()
	{
		if ($this->session->userdata('login')==TRUE){
				redirect('dashboard','refresh');
		}
		else{
			 $data['DataTarif'] = $this->user->getDataTarif();
			 $this->load->view('user/v_login',$data);
		}
	}

	public function proses_login(){
            $this->form_validation->set_rules('username','username', 'trim|required');
            $this->form_validation->set_rules('password','password', 'trim|required');
            if($this->form_validation->run() ==TRUE){
               if($this->user->get_login()->num_rows()>0){
                   $data=$this->user->get_login()->row();
                    $array=array(
                        'login'=> TRUE,
                        'nama_pelanggan'=>$data->nama_pelanggan,
                        'id_pelanggan'=>$data->id_pelanggan,
                        'id_tarif'=>$data->id_tarif
                    );
                    $this->session->set_userdata($array);
                    $this->session->set_flashdata('pesan_sukses', 'Sukses Masuk Ke Akun');
                    redirect('dashboard','refresh');
                }else{
                    $this->session->set_flashdata('pesan_gagal','Username Atau Password Salah');
                    redirect('user/login','refresh');
                }
            }else{
                $this->session->set_flashdata('pesan_gagal',validation_errors());
                 redirect('user/login','refresh');
            }
    }

		public function register()
		{
			  $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'trim|required');
				$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
				$this->form_validation->set_rules('nomor_kwh', 'nomor_kwh', 'trim|required');
				$this->form_validation->set_rules('username', 'username', 'trim|required');
			  $this->form_validation->set_rules('password', 'password', 'trim|required');
				$this->form_validation->set_rules('id_tarif', 'id_tarif', 'trim|required');
		 	if ($this->form_validation->run() == TRUE) {

			 if($this->user->registrasi_akun()==TRUE){
				 $this ->session->set_flashdata('pesan_sukses', 'Sukses Mendaftarkan Akun, Silahkan Login');
				 redirect('user/login','refresh');
			 }

			 else{
				 $this->session->set_flashdata('pesan_gagal', 'Gagal Mendaftarkan Akun');
				 $this->load->view('user/register','refresh');
			 }
		 }
	 }

	 public function logout()
	 {
		 $this->session->sess_destroy();
		 $this->session->set_flashdata('pesan_sukses', 'Sukses Keluar Akun');
		 redirect('user/login','refresh');
	 }




}
