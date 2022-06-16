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
}