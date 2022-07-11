<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

    function get_data_riwayat_kunjungan_all(){
        $this->db->select('*');
        $this->db->from('pasien_kunjungan');
        $this->db->order_by("tgl_kunjungan", "desc");

        return $query = $this->db->get();
    }

    function get_data_riwayat_kunjungan_detail($id, $no_rm){
        $this->db->select('*');
        $this->db->from('pasien_kunjungan');
        $where = "no_rm='".$no_rm."' AND id_kunjungan='$id'";
        $this->db->where($where);

        return $query = $this->db->get();
    }

    function get_data_pasien($id, $no_rm){
        $this->db->select('*');
        $this->db->from('pasien');
        $this->db->where('no_rm', $no_rm);

        return $query = $this->db->get();
    }

    function update_kunjungan($data, $id_kunjungan) {
        $this->db->where('id_kunjungan', $id_kunjungan);
        $this->db->update('pasien_kunjungan', $data);
    }

    function delete_kunjungan($id){
        $this->db->delete('pasien_kunjungan', array('id_kunjungan' => $id));
    }

}