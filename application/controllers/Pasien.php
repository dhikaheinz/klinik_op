<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

        require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
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

            //sendMail
            $fromEmail = "klinik.op@poltekkesjakarta1.ac.id";
            $mailContent = "<p>Hallo <b>".$this->input->post('nama_pasien')."</b>, Terdapat perubahan atau update data akun pasien Klinik Orotik Prostetik<br> 
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
            $mail->Subject    = "Account Data Updated - Pasien Klinik OP Poltekkes Jakarta I";
            $mail->Body       = $mailContent;
    
            $toEmail = $this->input->post('email'); // siapa yg menerima email ini
            $mail->AddAddress($toEmail);
            $mail->Send();
            
        $this->M_Pasien->update_users($id_pasien, $no_rm, $data_users);
        $this->session->set_flashdata('success', '<p class="text-center text-white bg-sky-500 my-2 p-2 rounded-md">Data Berhasil Di Update</p>');
        redirect('home');
    }
}