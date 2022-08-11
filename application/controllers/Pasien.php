<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
			redirect('user/index');
		}
		$this->load->model('M_User');
        $this->load->model('M_Pasien');
        $this->load->library('pdf');
    }

    function detail()
    {
        $data['data_pasien'] = $this->M_Pasien->get_data_pasien()->row();
        $this->load->view('home/detail_pasien', $data);
    }

    function update(){
        $id_pasien = $this->input->post('id_pasien');
        $no_rm = $this->input->post('no_rm');
		$data_pasien = array(
            'nama_pasien' =>  $this->input->post('nama_pasien'),
            'nik' =>  $this->input->post('nik'),
            'no_hp' =>  $this->input->post('no_hp'),
            'jk' =>  $this->input->post('jk'),
            'email' =>  $this->input->post('email'),
            'tempat_lahir' =>  $this->input->post('tempat_lahir'),
            'tgl_lahir' =>  $this->input->post('tgl_lahir'),
            'alamat' =>  $this->input->post('alamat'),
            'kabupaten' =>  $this->input->post('kabupaten'),
            'provinsi' =>  $this->input->post('provinsi'),
            'kodepos' =>  $this->input->post('kodepos'),
            'pekerjaan' =>  $this->input->post('pekerjaan'),
            'updated_by' => $this->session->userdata('id_user'),
            'updated_date' => date('Y-m-d')
            );
            
        $this->M_Pasien->update_pasien($id_pasien, $data_pasien);

		$data_users = array(
            'nm_user' =>  $this->input->post('nama_pasien'),
            'tanggal_lahir' =>  $this->input->post('tgl_lahir'),
            'updated_by' => $this->session->userdata('id_user'),
            'updated_date' => date('Y-m-d')
            );
            
        $this->M_Pasien->update_users($id_pasien, $no_rm, $data_users);
        $this->session->set_flashdata('success', '<p class="text-center text-white bg-sky-500 my-2 p-2 rounded-md">Data Berhasil Di Update</p>');
        redirect('home');
    }
}