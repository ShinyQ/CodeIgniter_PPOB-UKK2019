<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

  public function __construct() {
       parent::__construct();
       $this->load->model('m_admin','admin');
  }

  public function login()
  {
    if ($this->session->userdata('login')==TRUE) {
        redirect('dashboard_admin','refresh');
    }
    else{
       $this->load->view('admin/v_login');
    }
  }

  public function proses_login(){
          $this->form_validation->set_rules('username','username', 'trim|required');
          $this->form_validation->set_rules('password','password', 'trim|required');
          if($this->form_validation->run() ==TRUE){
             if($this->admin->get_login()->num_rows()>0){
                 $data=$this->admin->get_login()->row();
                  $array=array(
                      'login'=> TRUE,
                      'nama_admin'=>$data->nama_admin,
                      'id_admin'=>$data->id_admin,
                      'id_level'=>$data->id_level
                  );
                  $this->session->set_userdata($array);
                  $this->session->set_flashdata('pesan_sukses', 'Sukses Masuk Ke Akun');
                  redirect('dashboard_admin','refresh');
              }else{
                  $this->session->set_flashdata('pesan_gagal','Username Atau Password Salah');
                  redirect('admin/login','refresh');
              }
          }else{
              $this->session->set_flashdata('pesan_gagal',validation_errors());
               redirect('admin/login','refresh');
          }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->session->set_flashdata('pesan_sukses', 'Sukses Keluar Akun');
    redirect('admin/login');
  }


}
