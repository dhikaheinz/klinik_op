<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pasien extends CI_Model {

    function insert_pasien($data){
        $this->db->insert('pasien', $data);
      }
      
    function insert_pasien_penanggung($data){
        $this->db->insert('penanggung_jawab', $data);
    }

    function get_data_pasien(){
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('no_rm', $this->session->userdata('no_rm'));

        return $query = $this->db->get();
    }

    function insert_kunjungan($data){
        $this->db->insert('pasien_kunjungan', $data);
    }

    function get_data_riwayat_kunjungan(){
        $this->db->select('*');
        $this->db->from('pasien_kunjungan');
        $this->db->where('no_rm', $this->session->userdata('no_rm'));

        return $query = $this->db->get();
    }

    function get_data_riwayat_kunjungan_aktif(){
        $this->db->select('*');
        $this->db->from('pasien_kunjungan');
        $where = "no_rm='".$this->session->userdata('no_rm')."' AND status='Proses'";
        $this->db->order_by("tgl_kunjungan", "asc");
        $this->db->where($where);

        return $query = $this->db->get();
    }
}