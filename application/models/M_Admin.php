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

    function get_data_admin(){
        $this->db->select('*');
        $this->db->from('users_admin');
        
        return $query = $this->db->get();
    }

    function get_row_admin(){
        $this->db->select('*');
        $this->db->from('users_admin');
        $this->db->where('user', $this->session->userdata('username'));

        return $query = $this->db->get();
    }

    function insert_admin($data){
        $this->db->insert('users_admin', $data);
    }

    function update_admin($id_user, $data) {
        $this->db->where('id_user', $id_user);
        $this->db->update('users_admin', $data);
    }

    
    function delete_admin($id){
        $this->db->delete('users_admin', array('id_user' => $id));
    }
}