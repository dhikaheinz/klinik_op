<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_Admin');
		$this->load->model('M_Pasien');
		$this->load->library('pdf');

        require APPPATH.'libraries/phpmailer/src/Exception.php';
		require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH.'libraries/phpmailer/src/SMTP.php';
    }

    public function index()
	{
		if ($this->session->userdata('status') != 'admin') {
			redirect('user/index');
		}else{
            $data['detail_admin'] = $this->M_Admin->get_row_admin()->row();
			$data['data_riwayat'] = $this->M_Admin->get_data_riwayat_kunjungan_all();
			$this->load->view('admin/index', $data);
		}
	}
	
    function riwayat_kunjungan_detail($id, $id2)
    {
		// $id_kunjungan =  $this->uri->segment(3);
		// $no_rm =  $this->uri->segment(4);
        $data['data_pasien'] = $this->M_Admin->get_data_pasien($id, $id2)->row();
        $data['data_kunjungan'] = $this->M_Admin->get_data_riwayat_kunjungan_detail($id, $id2)->row();
        $this->load->view('admin/detail_kunjungan', $data);
    }

	function update_kunjungan($id) {
		$id_kunjungan = $id;
		$data_kunjungan = array(
            'status' =>  $this->input->post('status'),
            'updated_by' => $this->session->userdata('id_user'),
            'updated_date' => date('Y-m-d')
            );

        $no_rm = $this->input->post('no_rm');
        $data['dt_pasien'] = $this->M_Admin->get_data_pasien_satu($no_rm)->row();

        //sendMail
        $fromEmail = "klinik.op@poltekkesjakarta1.ac.id";
        $mailContent = "<p>Hallo <b>".$this->input->post('nama_pasien')."</b>, Berikut adalah status dari kunjungan anda<br></p>
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
                            <td>Status Kunjungan</td>
                            <td>:</td>
                            <td><b>".$this->input->post('status')."</b></td>
                            </tr>
                        </table>
                        <p><br> Terima Kasih <b>".$this->input->post('nama_pasien')."</b>, Salam Sehat <br> <b>Poltekkes Jakarta I</b>.</p>"; // isi email
                        
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

        $email = $data['dt_pasien']->email;
        $toEmail = strval($data['dt_pasien']->email); // siapa yg menerima email ini
        $mail->AddAddress($toEmail);
        $mail->Send();
            
        $this->M_Admin->update_kunjungan($data_kunjungan, $id_kunjungan);
        redirect('admin');
	}

	function delete_kunjungan($id){
		$this->M_Admin->delete_kunjungan($id);
		redirect('admin');
	}

	public function pdf_gc($id, $id2)
    {
        $query = $this->M_Admin->get_data_riwayat_kunjungan_detail($id, $id2);
        $query2 = $this->M_Admin->get_data_pasien($id, $id2);
        $data['data_kunjungan'] = $query->row();
        $data['data_pasien'] = $query2->row();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        $pdf->AddPage('');
        $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');
 
        $tabel = '
        <table cellpadding="1" cellspacing="1" style="text-align:center;">

        <tr>
        <td><b>General Consent</b></td>
        </tr>
        <tr>
        <td><b>(Surat Persetujuan Umum Penerimaan Pelayanan)</b></td>
        </tr>
        <tr>
        <td><b>Di Laboratorium Klinik Jurusan Ortotik Prostetik Kemenkes Jakarta I</b></td>
        </tr>
        <tr style="text-align:left;">
        <td></td>
        </tr>
        <tr style="text-align:left;">
        <td>Dengan Ini saya bertandatangan dibawah ini : </td>
        </tr>
        <tr style="text-align:left;">
        <td></td>
        </tr>
        <tr style="text-align:left;">
        <td>Nama      : '.$data['data_pasien']->nama_pasien.'</td>
        </tr>
        <tr style="text-align:left;">
        <td>Alamat    : '.$data['data_pasien']->alamat.'</td>
        </tr>
        <tr style="text-align:left;">
        <td>Pekerjaan : '.$data['data_pasien']->pekerjaan.'</td>
        </tr>
        <tr style="text-align:left;">
        <td></td>
        </tr>
        <tr style="text-align:left;">
        <td>Saya Memahami dan menyetujui bahwa pelayanan yang diberikan kepada saya atau orang lain yang berada dalam tanggungan saya
        dilaksanakan oleh mahasiswa/instruktur/dosen dibawah pengawasan dosen supervisor.</td>
        </tr>
        <tr style="text-align:left;">
        <td>Pelayanan dari Laboratorium Klinik Jurusan Ortotik Prostetik Poltekkes Jakarta I hanya dapat di jalankan jika saya 
        mengikuti saran-saran yang diberikan oleh mahasiswa/instruktur/dosen Laboratorium Pendidikan Jurusan Ortotik Prostetik 
        Jakarta I sebagaimana tercantum dalam peryataan - pernyataan berikut :</td>
        </tr>
        <tr style="text-align:left;">
        <td></td>
        </tr>

        <tr style="text-align:left;">
        <td style="margin-left:3px;">- Saya memahami dan mengikuti aturan penggunaan alat serta latihan penunjang yang diperlukan sesuai instruksi yang diberikan
        oleh mahasiswa/instruktur/dosen Laboratorium Pendidikan Jurusan Ortotik Prostetik 
        Jakarta I yang menangani pasien :</td>
        </tr>
        <tr style="text-align:left;">
        <td>Nama : '.$data['data_pasien']->nama_pasien.'</td>
        </tr>
        <tr style="text-align:left;">
        <td>Tanggal Lahir : '.$data['data_pasien']->tgl_lahir.'</td>
        </tr>
        <tr style="text-align:left;">
        <td>- Saya akan menghubungi nomor kontak yang diberikan pada kartu pasien untuk meminta saran, jadwal pertemuan, maupun pertemuan 
        tindak lanjut yang berkaitan dengan penanganan Ortotik /atau Prostetik</td>
        </tr>
        <tr style="text-align:left;">
        <td>Saya harus menghubungi pihak Laboratorium Klinik Jurusan Ortotik Prostetik Poltekkes Jakarta I, apabila ada kerusakan atau
        ketidakstabilan pada alat yang saya miliki dan dibuat sebelumnya di Laboratorium Klinik Jurusan Ortotik Prostetik Poltekkes Jakarta I</td>
        </tr>
        <tr style="text-align:left;">
        <td>- Saya setuju bahwa alat yang saya terima dibiayai oleh donatur dan saya tidak berhak untuk menyalahgunakannya 
        (tidak dipatahkan, tidak diperjualbelikan, serta tidak diperlakukan diluar aturan penggunaan yang diberikan)</td>
        </tr>
        <tr style="text-align:left;">
        <td>- Saya memberikan persetujuan/izin terhadap segala aktivitas terkait seperti pengambilan gambar dan video untuk 
        untuk tindakan ortotik dan/atau prostetik yang di perlukan menurut standar profesi terhadap pasien</td>
        </tr>
        <tr style="text-align:left;">
        <td></td>
        </tr>

        <tr style="text-align:left;">
        <td>Saya Telah Membaca dan menyatakan bahwa saya menyetujui persyaratan yang diajukan agar saya mendapatkan 
        pelayanan ortotik dan/atau prostetik dari Laboratorium Pendidikan Jurusan Ortotik Prostetik</td>
        </tr>

        <tr style="text-align:right;">
        <td>Jakarta, ... / .... / ....</td>
        </tr>
        <tr style="text-align:right;">
        <td></td>
        </tr>
        <tr style="text-align:right;">
        <td></td>
        </tr>
        <tr style="text-align:right;">
        <td>Argianto</td>
        </tr>

        </table>
        ';
        $pdf->writeHTML($tabel);
        $pdf->Output('file_general_consent.pdf', 'I');
    }

    public function pdf_ic($id, $id2)
    {
        $query = $this->M_Admin->get_data_riwayat_kunjungan_detail($id, $id2);
        $query2 = $this->M_Admin->get_data_pasien($id, $id2);
        $data['data_kunjungan'] = $query->row();
        $data['data_pasien'] = $query2->row();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        $pdf->AddPage('');
        $pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');

        $tabel = '
        <table border="0" cellspacing="1" cellpadding="1">
        <tr>
            <td colspan="3" align="center"><b>Lembar Persetujuan</b></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><b>(Informed Consent)</b></td>
        </tr>
        <tr>
            <td colspan="3" align="center"></td>
        </tr>
        <tr>
            <td colspan="3" align="left">Saya yang bertanda tangan di bawah ini :</td>
        </tr>
        <tr>
            <td colspan="3" align="left">Nama : '.$data['data_pasien']->nama_pasien.'</td>
        </tr>
        <tr>
            <td colspan="3" align="left">Tgl Lahir : '.$data['data_pasien']->tgl_lahir.'</td>
        </tr>
        <tr>
            <td colspan="3" align="left">Pekerjaan : '.$data['data_pasien']->pekerjaan.'</td>
        </tr>
        <tr>
            <td colspan="3" align="left">Alamat : '.$data['data_pasien']->alamat.'</td>
        </tr>
        <tr>
            <td colspan="3" align="left">Telepon : '.$data['data_pasien']->no_hp.'</td>
        </tr>
        <tr>
            <td colspan="3" align="left"></td>
        </tr>
        <tr>
            <td colspan="3" align="left">Menyatakan bersedia memberikan informasi yang sebenarnya untuk digunakan dalam 
            Penelitian Rancang Bangun Aplikasi Layanan Pendaftaran Pasien di Klinik Ortotik Prostetik Poltekkes Jakarta I. 
            Pernyataan ini dibuat dalam keadaan sadar dan sehat serta tidak ada paksaan.</td>
        </tr>
        <tr>
            <td colspan="3" align="left"></td>
        </tr>
        <tr>
            <td colspan="3" align="left">Kami sangat mengharapkan partisipasi Bapak/Ibu dalam penelitian ini. 
            Informasi yang Bapak/Ibu berikan akan membantu pemerintah Indonesia. Penelitian ini akan memakan waktu tidak lebih dari 60 menit. 
            Informasi yang Bapak/Ibu berikan akan dijaga kerahasiaannya. Bapak/Ibu akan diwawancara oleh pewawancara yang layak dan tidak ada prosedur medis lainnya yang diperlukan. 
            Bapak/Ibu tidak akan dibebani biaya apapun juga, dan dapat menghentikan keikutsertaan dalam penelitian ini tanpa adanya paksaan apapun. Keikutsertaan dalam penelitian ini bersifat sukarela, 
            tetapi kami sangat berharap Bapak/Ibu dapat berpartisipasi karena informasi yang Bapak/Ibu berikan sangat berharga.</td>
        </tr>
        <tr>
            <td colspan="3" align="left">Apakah ada yang ingin ditanyakan berkenaan dengan penelitian ini?</td>
        </tr>
        <tr>
            <td colspan="3" align="left">Apakah saya dapat mulai mewawancara Bapak/Ibu sekarang?</td>
        </tr>
        <tr>
            <td colspan="3" align="left"></td>
        </tr>

        <tr>
            <td align="left">Peneliti</td>
            <td></td>
            <td align="left">Jakarta, ... / .... / ....</td>
        </tr>

        <tr>
            <td colspan="3" align="left"></td>
        </tr>
        <tr>
            <td colspan="3" align="left"></td>
        </tr>
        <tr>
            <td colspan="3" align="left"></td>
        </tr>

        <tr>
            <td align="left">(..........................)</td>
            <td></td>
            <td align="left">(..........................)</td>
        </tr>

        <tr>
        <td colspan="3" align="left"></td>
        </tr>

        <tr>
            <td align="left">Saksi</td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="3" align="left"></td>
        </tr>
        <tr>
            <td colspan="3" align="left"></td>
        </tr>
        <tr>
            <td colspan="3" align="left"></td>
        </tr>

        <tr>
        <td>(..........................)</td>
        <td></td>
        <td></td>
        </tr>

        </table>
        ';
        $pdf->writeHTML($tabel);
        $pdf->Output('file_general_consent.pdf', 'I');
    }

    function daftarAdmin(){
        $data['detail_admin'] = $this->M_Admin->get_row_admin()->row();
        $data['data_admin'] = $this->M_Admin->get_data_admin();
        $this->load->view('admin/daftar_admin', $data);
    }

    function createAdmin(){
        $data['detail_admin'] = $this->M_Admin->get_row_admin()->row();
        $this->load->view('admin/form_admin', $data);
    }

    function tambahAdmin(){
        $data_admin = array(
            'nm_user' => $this->input->post('nm_user'),
            'user' => $this->input->post('user'),
            'pass' => $this->input->post('pass')
            );
            
            $this->M_Admin->insert_admin($data_admin);
            $this->session->set_flashdata('success', '<p class="text-center text-white bg-sky-500 my-2 p-2 rounded-md">Data Sudah Di Simpan</p>');
            redirect('admin/daftarAdmin');
    }

    function detailAdmin(){
        $data['detail_admin'] = $this->M_Admin->get_row_admin()->row();
        $data['data_detail'] = $this->M_Admin->get_row_admin()->row();
        $this->load->view('admin/detail_admin', $data);
    }

    function updateAdmin($id){
        $id_admin = $id;
		$data_admin = array(
            'nm_user' => $this->input->post('nm_user'),
            // 'user' => $this->input->post('user'),
            'pass' => $this->input->post('pass')
            );
            
        $this->session->set_flashdata('success', '<p class="text-center text-white bg-sky-500 my-2 p-2 rounded-md">Data Sudah Di Update</p>');
        $this->M_Admin->update_admin($id_admin, $data_admin);
        redirect('admin/daftarAdmin');
    }

    function deleteAdmin($id){
		$this->M_Admin->delete_admin($id);
        $this->session->set_flashdata('success', '<p class="text-center text-white bg-red-500 my-2 p-2 rounded-md">Data Sudah Di Delete</p>');
		redirect('admin/daftarAdmin');
	}
}