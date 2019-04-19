<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class level extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_level','level');
  }


	 public function index()
	 {
			 $data['DataLevel'] = $this->level->getDataLevel();
			 $data['judul'] = "PPOB | Halaman Data Level Admin";
			 $data['konten'] = "admin/v_level";
			 $this->load->view('v_template', $data);
	 }

	 public function detail_level($id)
	 {
				$data = $this->level->detail_level($id);
				echo json_encode($data);
	 }


	 public function tambah_level()
	 {
				$this->level->tambah_level();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Level Admin');
				redirect('level');
	 }

	 public function edit_level()
	 {
				$this->level->edit_level();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Level Admin');
				redirect('level');
	 }

	 public function hapus_level()
	 {
				$this->level->hapus_level();
				$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Level Admin');
				redirect('level');
	 }



}
