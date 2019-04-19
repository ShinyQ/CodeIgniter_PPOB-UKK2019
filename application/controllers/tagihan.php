<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tagihan extends CI_Controller {

	public function __construct() {
			 parent::__construct();
			 if ($this->session->userdata('login')!=TRUE) {
						$this->session->set_flashdata('pesan_gagal','Anda Harus Login Dahulu');
					 redirect('user/login','refresh');
			 }
			 elseif ($this->session->userdata('id_level')==TRUE) {
					 redirect('dashboard_admin','refresh');
			 }

       $this->load->model('m_tagihan','tagihan');
	 }

	public function index()
	{
    $data['DataTagihan'] = $this->tagihan->getDataTagihan();
		$data['judul'] = 'PPOB | Halaman Tagihan Pelanggan';
    $data['konten'] = 'user/v_tagihan';
		$this->load->view('v_template', $data);
	}


	public function upload_bukti()
	{
	    $config['upload_path'] = './assets/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '20000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('bukti')){
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('tagihan','refresh');
			}
			else{
				$update=$this->tagihan->update_bayar();
				if($update == TRUE){
					$this->session->set_flashdata('pesan_sukses', 'Berhasil Mengupload Bukti Bayar');
				} else {
					$this->session->set_flashdata('pesan_gagal', 'Gagal Mengupload Bukti');
				}
				redirect('tagihan','refresh');
			}
	}

}
