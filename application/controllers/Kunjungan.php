<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {

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

        $no_rm = $this->input->post('no_rm');
        $tgl_kunjungan = $this->input->post('tgl_kunjungan');
        $nama_pasien = $this->input->post('nama_pasien');

        $kodeqr = $no_rm . $tgl_kunjungan;

        // $dataqr = 
        // "\n NoRM : ".$no_rm."
        // \n Tgl Kunjungan : ".$tgl_kunjungan."
        // \n Nama : ".$nama_pasien."
        // \n Poltekkes Jakarta I";

        // if($kodeqr){
        //     $filename = 'upload/qr/'.$kodeqr;
        //     if (!file_exists($filename)) { 
        //             $this->load->library('ciqrcode');
        //             $params['data'] = $dataqr;
        //             $params['level'] = 'M';
        //             $params['size'] = 4;
        //             $params['savename'] = FCPATH.'upload/qr/'.$kodeqr.".png";
        //             $this->ciqrcode->generate($params);
        //     }
        // }

        $code = "No RM : $no_rm %0A%0ANama : $nama_pasien %0A%0ATgl Kunjungan : $tgl_kunjungan";
        $dataqr = "https://quickchart.io/qr?text=$code&centerImageUrl=http://bigdata.poltekkesjakarta1.ac.id/assets/img/logo.png&centerImageWidth=45&centerImageHeight=55";

        $data_kunjungan = array(
            'no_rm' => $no_rm,
            'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
            'waktu_kunjungan' => $this->input->post('waktu_kunjungan'),
            'nama_saksi' => $this->input->post('nama_saksi'),
            'hubungan' => $this->input->post('hubungan'),
            'status' => 'Proses',
            'qrcode' => $dataqr,
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

    public function pdf_gc($id)
    {
        $query = $this->M_Pasien->get_data_riwayat_kunjungan_detail($id);
        $query2 = $this->M_Pasien->get_data_pasien();
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

    public function pdf_ic($id)
    {
        $query = $this->M_Pasien->get_data_riwayat_kunjungan_detail($id);
        $query2 = $this->M_Pasien->get_data_pasien();
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
        <table border="0" cellspacing="1" cellpadding="1" style="text-align: justify;
        text-justify: inter-word;">
        <tr>
            <td colspan="3" align="center"><b><h3>Lembar Persetujuan</h3></b></td>
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
}