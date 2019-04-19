<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class data_pelanggan extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_pelanggan','pelanggan');
  }


  public function index()
    {
        $data['DataPelanggan'] = $this->pelanggan->getDataPelanggan();
        $data['DataTarif'] = $this->pelanggan->getDataTarif();
        $data['judul'] = "PPOB | Halaman Data Pelanggan";
        $data['konten'] = "admin/v_pelanggan";
        $this->load->view('v_template', $data);
    }

    public function get_data_pelanggan($id){
        $data=$this->pelanggan->data_pelanggan($id);
        echo json_encode($data);
    }

    public function tambah_pelanggan(){
        $data=$this->pelanggan->tambah_pelanggan();
        $this->session->set_flashdata('pesan_sukses', 'Sukses Menambahkan Data Pelanggan');
        redirect('data_pelanggan');
    }

    public function edit_pelanggan()
    {
      $this->pelanggan->edit_pelanggan();
      $this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Data Pelanggan');
      redirect('data_pelanggan');
    }

    public function hapus_pelanggan()
    {
        $this->pelanggan->hapus_pelanggan();
        $this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Pelanggan');
        redirect('data_pelanggan');
    }

}
