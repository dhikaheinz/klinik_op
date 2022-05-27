<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

    function auth() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->db->get_where('users', array('user' => $username, 'pass' => $password));

        if ($result->num_rows() > 0) {
        return $result->result();
        } else {
        return false;
        }
    }
}