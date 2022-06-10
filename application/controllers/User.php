<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Pasien');
    }

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			redirect('home/index');
		}
		$this->load->view('login/index_login');
	}

	function aksi_login(){
		$no_rm = $this->input->post('no_rm');
		$tanggal_lahir = $this->input->post('tanggal_lahir');

		$result = $this->db->get_where('users', array('no_rm' => $no_rm, 'tanggal_lahir' => $tanggal_lahir));
		$data_user = $result->result();
		if($result->num_rows() > 0){
			foreach ($data_user as $row) {
			
			$data_session = array(
				'no_rm' => $no_rm,
				'id_user' => $row->id_user,
				'no_rm' => $row->no_rm,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
			}

			redirect('home/index');
 
		}else{
			redirect('user/index');
		}
	}

	function create(){
		$this->load->view('login/daftar_pasien');
	}
	
	function create_pasien(){
		$query = $this->db->query('select id_pasien from pasien order BY id_pasien desc LIMIT 1')->row();
		$no_rm = $query->id_pasien . date("dmy");

		//input identitas pasien
		$data_pasien = array(
		'no_rm' => $no_rm,
		'nama_pasien' => $this->input->post('nama_pasien'),
		'nik' => $this->input->post('nik'),
		'jk' => $this->input->post('jk'),
		'email' => $this->input->post('email'),
		'no_hp' => $this->input->post('no_hp'),
		'tempat_lahir' => $this->input->post('tempat_lahir'),
		'tgl_lahir' => $this->input->post('tgl_lahir'),
		'alamat' => $this->input->post('alamat'),
		'kabupaten' => $this->input->post('kabupaten'),
		'provinsi' => $this->input->post('provinsi'),
		'kodepos' => $this->input->post('kodepos'),
		'pekerjaan' => $this->input->post('pekerjaan'),
		'updated_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);
		
		$this->M_Pasien->insert_pasien($data_pasien);

		//input penanggung jawab pasien
		$data_penanggung = array(
		'no_rm' => $no_rm,
		'nama_penanggung' => $this->input->post('nama_penanggung'),
		'hubungan' => $this->input->post('hubungan'),
		'jk' => $this->input->post('jk_penanggung'),
		'no_hp' => $this->input->post('no_hp_ppenanggung'),
		'tgl_lahir' => $this->input->post('tgl_lahir_penanggung'),
		'alamat' => $this->input->post('alamat_penanggung'),
		'updated_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);

		$this->M_Pasien->insert_pasien_penanggung($data_penanggung);

		//input user login
		$data_user = array(
		'no_rm' => $no_rm,
		'tanggal_lahir' => $this->input->post('tgl_lahir'),
		'nm_user' => $this->input->post('nama_pasien'),
		'updated_by' => $this->session->userdata('id_user'),
		'updated_date' => date('Y-m-d')
		);
		
		$this->M_User->insert_user($data_user);
		redirect('user');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}
}