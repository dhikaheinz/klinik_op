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
        $data['data_pasien'] = $this->M_Pasien->get_data_pasien()->row();
        $data['data_kunjungan'] = $this->M_Pasien->get_data_riwayat_kunjungan()->result_array();
        $this->load->view('home/riwayat_kunjungan', $data);
    }

    function create_kunjungan(){
        $data_kunjungan = array(
            'no_rm' => $this->input->post('no_rm'),
            'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
            'waktu_kunjungan' => $this->input->post('waktu_kunjungan'),
            'nama_saksi' => $this->input->post('nama_saksi'),
            'hubungan' => $this->input->post('hubungan'),
            'status' => 'Proses',
            'updated_by' => $this->session->userdata('id_user'),
            'updated_date' => date('Y-m-d')
            );
            
            $this->M_Pasien->insert_kunjungan($data_kunjungan);
            redirect('home');
    }
}