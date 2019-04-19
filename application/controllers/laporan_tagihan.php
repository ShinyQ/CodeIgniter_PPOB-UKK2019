<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_tagihan extends CI_Controller {

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
    $data['DataTagihan'] = $this->tagihan->getDataLaporanTagihan();
		$data['judul'] = 'PPOB | Generate Laporan Tagihan Pelanggan';
    $data['konten'] = 'user/v_laporan_tagihan';
		$this->load->view('v_template', $data);
	}

}
