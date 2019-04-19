<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penggunaan extends CI_Controller {

  public function __construct() {
       parent::__construct();
       if ($this->session->userdata('login')!=TRUE) {
           redirect('admin/login','refresh');
       }elseif ($this->session->userdata('id_level')==FALSE) {
           redirect('dashboard','refresh');
       }
       $this->load->model('m_penggunaan','penggunaan');
  }

  public function index()
    {
        $data['DataPelanggan'] = $this->penggunaan->getDataPelanggan();
        $data['DataTarif'] = $this->penggunaan->getDataTarif();
        $data['judul'] = "PPOB | Halaman Penggunaan Listrik";
        $data['konten'] = "admin/v_penggunaan";
        $this->load->view('v_template', $data);
    }

   public function tambah_penggunaan()
   {
      if($this->penggunaan->cek_penggunaan()==TRUE){
          $this->session->set_flashdata('pesan_gagal', 'Tagihan bulan ini sudah ada');
       }
       else{
        $proses=$this->penggunaan->tambah_penggunaan();
        if($proses){
            $this->session->set_flashdata('pesan_sukses', 'Tambah penggunaan Berhasil');
        } elseif($proses == false) {
            $this->session->set_flashdata('pesan_gagal', 'Meter Akhir Tidak Boleh Lebih Besar Dari Meter Awal');
        }else {
            $this->session->set_flashdata('pesan_gagal', 'Tambah penggunaan gagal');
        }
      }
      redirect('penggunaan');
   }

  public function get_data_pelanggan($id){
      $data=$this->penggunaan->data_pelanggan($id);
      echo json_encode($data);
  }

  public function detail_penggunaan($id)
  {
      $data['DataPenggunaan'] = $this->penggunaan->getDataPenggunaan($id);
      $data['judul'] = "PPOB | Halaman Data Detail Penggunaan";
      $data['konten'] = "admin/v_penggunaan_detail";
      $this->load->view('v_template', $data);
  }

  public function data_penggunaan($id){
      $data=$this->penggunaan->data_penggunaan($id);
      echo json_encode($data);
  }

  public function data_tagihan($id){
      $data=$this->penggunaan->data_tagihan($id);
      echo json_encode($data);
  }

  public function data_tagihan_detail($id){
      $data=$this->penggunaan->data_tagihan_detail($id);
      echo json_encode($data);
  }

  public function edit_penggunaan(){
      $data=$this->penggunaan->edit_penggunaan();
      echo json_encode($data);
      $this->session->set_flashdata('pesan_sukses', 'Sukses Mengedit Penggunaan Pelanggan');
      redirect('penggunaan/detail_penggunaan/'.$this->input->post('id_pelanggan'));
  }

  public function detail_tagihan($id){
    $data['DataTagihan'] = $this->penggunaan->getDataTagihan($id);
    $data['DataTarif'] = $this->penggunaan->getDataTarif();
    $data['judul'] = "PPOB | Halaman Data Tagihan Pelanggan";
    $data['konten'] = "admin/v_tagihan";
    $this->load->view('v_template', $data);
  }

  public function hapus_tagihan(){
    $this->db->where('id_tagihan', $this->input->post('id_tagihan'));
    $this->db->delete('tagihan');

    $this->db->where('id_penggunaan', $this->input->post('id_penggunaan'));
    $this->db->delete('penggunaan');

    $this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Penggunaan Pelanggan');
    redirect('penggunaan');
  }

}
