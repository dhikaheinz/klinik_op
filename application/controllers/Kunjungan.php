<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
        $this->load->model('M_Pasien');
    }

	public function index()
	{
		if ($this->session->userdata('status') != 'login') {
			redirect('user/index');
		}else{
			$this->load->view('home/daftar_kunjungan');
		}
	}

    function daftar()
    {
        $data['data_pasien'] = $this->M_Pasien->get_data_pasien()->row();
        $this->load->view('home/daftar_kunjungan', $data);
    }
    
    function riwayat()
    {
        $this->load->view('home/riwayat_kunjungan');
    }
}