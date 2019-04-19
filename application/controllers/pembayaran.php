<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_pembayaran','pembayaran');
  }

  public function index()
  {
      $data['DataPembayaran'] = $this->pembayaran->getDataPembayaran();
      $data['judul'] = "PPOB | Halaman Data Pembayaran";
      $data['konten'] = "admin/v_pembayaran";
      $this->load->view('v_template', $data);
  }

  public function data_pembayaran($id){
    $data=$this->pembayaran->data_pembayaran($id);
    echo json_encode($data);
  }

  public function konfirmasi_pembayaran(){
      $data=$this->pembayaran->konfirmasi_pembayaran();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Mengonfirmasi Pembayaran');
      redirect('pembayaran');
  }

  public function tolak_pembayaran(){
    $data=$this->pembayaran->tolak_pembayaran();
    $this->session->set_flashdata('pesan_sukses', 'Sukses Menolak Pembayaran');
    redirect('pembayaran');
  }

}
