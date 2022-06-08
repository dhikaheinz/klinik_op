<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
    }

	public function index()
	{
		$this->load->view('home/daftar_kunjungan');
	}

    function daftar()
    {
        $this->load->view('home/daftar_kunjungan');
    }
    
    function riwayat()
    {
        $this->load->view('home/riwayat_kunjungan');
    }
}