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

        </table>
        ';
        $pdf->writeHTML($tabel);
        $pdf->Output('file-pdf-codeigniter.pdf', 'I');
    }
}