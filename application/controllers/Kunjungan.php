<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('M_User');
        $this->load->model('M_Pasien');
        $this->load->library('pdf');
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
    
    function riwayat_kunjungan_detail($id)
    {
        $data['data_pasien'] = $this->M_Pasien->get_data_pasien()->row();
        $data['data_kunjungan'] = $this->M_Pasien->get_data_riwayat_kunjungan_detail($id)->row();
        $this->load->view('home/detail_kunjungan', $data);
    }

    public function pdf()
    {
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
        <td>Nama      : </td>
        </tr>
        <tr style="text-align:left;">
        <td>Alamat    : </td>
        </tr>
        <tr style="text-align:left;">
        <td>Pekerjaan : </td>
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
        <td>Nama : </td>
        </tr>
        <tr style="text-align:left;">
        <td>Umur : </td>
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
}