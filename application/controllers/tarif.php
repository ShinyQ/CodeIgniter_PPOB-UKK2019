<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tarif extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_tarif','tarif');
  }


  public function index()
  {
      $data['DataTarif'] = $this->tarif->getDataTarif();
      $data['judul'] = "PPOB | Data Halaman Tarif";
      $data['konten'] = "admin/v_tarif";
      $this->load->view('v_template', $data);
  }

  public function tambah_tarif()
  {
      if($this->input->post('tambah')){
          $this->tarif->tambah_tarif();
          $this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Tarif');
          redirect('tarif');
      }
  }

  public function data_tarif($id){
      $data=$this->tarif->data_tarif($id);
      echo json_encode($data);
  }

  public function hapus_tarif()
  {
      $this->tarif->hapus_tarif();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Tarif');
      redirect('tarif');
  }

  public function aktif_tarif()
  {
    $this->tarif->aktif_tarif();
    $this->session->set_flashdata('pesan_sukses', 'Sukses Mengaktifkan Tarif');
    redirect('tarif');
  }

  public function nonaktif_tarif()
  {
      $this->tarif->nonaktif_tarif();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Menonaktifkan Tarif');
      redirect('tarif');
  }

  public function edit_tarif()
  {
      $this->tarif->edit_tarif();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Tarif');
      redirect('tarif');
  }



}
