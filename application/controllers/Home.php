<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
    }

	public function index()
	{
		$this->load->view('home/index');
	}

	// function login() {
	// 	$result = $this->M_User->auth();
	// 		if ($result) {
	// 			$sess_array = array();
	// 			foreach ($result as $row) {
	// 			$sess_array = array(
	// 				'id_user' => $row->id_user,
	// 				'user' => $row->user,
	// 				'nm_user' => $row->nm_user,
	// 				'level' => $row->level
	// 			);
	// 			$this->session->set_userdata('logged_in', $sess_array);
	// 			}
	// 			redirect('Home'); 
				
	// 		} else {
	// 			echo "alert('Hello! I am an alert box!')";ds
	// 			message_dialog('danger', 'Error!', 'username atau password yang dimasukan salah.');
	// 			redirect('User');
	// 		}
	// }
}