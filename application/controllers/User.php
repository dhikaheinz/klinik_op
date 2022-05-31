<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
    }

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			redirect('home/index');
		}
		$this->load->view('login/index_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->db->get_where('users', array('user' => $username, 'pass' => $password));
		if($result->num_rows() > 0){
 
			$data_session = array(
				'user' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('home/index');
 
		}else{
			redirect('user/index');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}