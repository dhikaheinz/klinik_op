<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

    function auth() {
        $result = $this->db->get_where('users', array('user' => $username, 'pass' => $password));

        if ($result->num_rows() > 0) {
        return $result->result();
        } else {
        return false;
        }
    }

    function insert_user($data){
        $this->db->insert('users', $data);
    }

    function insert_fb($data){
        $this->db->insert('feedback', $data);
    }

}