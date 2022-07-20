<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Pasien');

		require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
    }

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			redirect('home/index');
		}else if ($this->session->userdata('status') == 'admin') {
			redirect('admin/index');
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
			$this->session->set_flashdata('success', '<p class="text-center text-white bg-green-600 my-3 p-2 rounded-md">Berhasil Login</p>');
			redirect('home/index');
 
		}else{
			$this->session->set_flashdata('success', '<p class="text-center text-white bg-red-500 my-3 p-2 rounded-md">Data Username Dan Password Salah</p>');
			redirect('user/index');
		}
	}

	function aksi_login_admin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->db->get_where('users_admin', array('user' => $username, 'pass' => $password));
		$data_user = $result->result();
		if($result->num_rows() > 0){
			foreach ($data_user as $row) {
			
			$data_session = array(
				'username' => $username,
				'id_user' => $username,
				'status' => "admin"
				);
 
			$this->session->set_userdata($data_session);
			}

			redirect('admin');
 
		}else{
			$this->session->set_flashdata('success', '<p class="text-center text-white bg-red-500 my-3 p-2 rounded-md">Data Username Dan Password Salah</p>');
			redirect('user/login_admin');
		}
	}

	function create(){
		$this->load->view('login/daftar_pasien');
	}

	function login_admin(){
		$this->load->view('login/login_admin');
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

		// Send EMail

	    $fromEmail = "klinik.op@poltekkesjakarta1.ac.id";
        $mailContent = "<p>Hallo <b>".$this->input->post('nama_pasien')."</b>, Terima kasih sudah mendaftar akun pasien pada Klinik Ortotik Prostetik 
						Poltekkes Jakarta I. <br> 
						berikut ini adalah informasi akun detail Anda:</p>
						<table>
							<tr>
							<td>Nama</td>
							<td>:</td>
							<td>".$this->input->post('nama_pasien')."</td>
							</tr>
							<tr>
							<td>Nomor Rekap Medik</td>
							<td>:</td>
							<td>".$no_rm."</td>
							</tr>
							<tr>
							<td>Tanggal Lahir</td>
							<td>:</td>
							<td>".$this->input->post('tgl_lahir')."</td>
							</tr>
						</table>
						<p>Untuk login menggunakan Nomor Rekap Medik dan Tanggal Lahir. <br> Terima Kasih <b>".$this->input->post('nama_pasien')."</b>, Salam Sehat <br> <b>Poltekkes Jakarta I</b>.</p>"; // isi email
						
        $mail = new PHPMailer();
        $mail->IsHTML(true);    // set email format to HTML
        $mail->IsSMTP();   // we are going to use SMTP
        $mail->SMTPAuth   = true; // enabled SMTP authentication
        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
        $mail->Host       = "smtp.googlemail.com";      // setting GMail as our SMTP server
        $mail->Port       = 465;                   // SMTP port to connect to GMail
        $mail->Username   = $fromEmail;  // alamat email kamu
        $mail->Password   = "wzltuegaxcpaakrc";            // password GMail

        $mail->setFrom('klinik_op@poltekkesjakarta1.ac.id', 'Ortotik Prostetik Poltekkes Jakarta I');  //Siapa yg mengirim email
        $mail->Subject    = "Account Created - Pasien Klinik OP Poltekkes Jakarta I";
        $mail->Body       = $mailContent;

        $toEmail = $this->input->post('email'); // siapa yg menerima email ini
        $mail->AddAddress($toEmail);
       	$mail->Send();
		$this->session->set_flashdata('success', '<p class="text-center text-white bg-sky-600 my-3 p-2 rounded-md">Data Username Dan Password Akan di Kirim ke Email <br> Pasien Silahkan Check</p>');
		redirect('user');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}


}