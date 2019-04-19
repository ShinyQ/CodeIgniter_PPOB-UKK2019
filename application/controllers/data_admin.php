<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_admin extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }
       $this->load->model('m_data_admin','admin');
  }

   public function index()
   {
     $data['konten'] = 'admin/v_admin';
     $data['judul'] = 'PPOB | Halaman Data Admin';
     $data['DataAdmin'] = $this->admin->getDataAdmin();
     $data['DataLevel'] = $this->admin->getDataLevel();
     $this->load->view('v_template',$data);
   }

   public function tambah_admin()
  {
       $this->admin->tambah_admin();
       $this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Admin');
       redirect('data_admin');
  }

  public function detail_admin($id)
  {
       $data = $this->admin->detail_admin($id);
       echo json_encode($data);
  }

  public function edit_admin()
  {
       $this->admin->edit_admin();
       $this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Admin');
       redirect('data_admin');
  }

  public function hapus_admin()
  {
       $this->admin->hapus_admin();
       $this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Admin');
       redirect('data_admin');
  }


}
