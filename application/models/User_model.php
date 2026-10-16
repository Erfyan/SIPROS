<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

    public function getByEmail($email)
    {
        $query = $this->db->get_where('users', ['email' => $email]);
        return ($query && is_object($query)) ? $query->row() : null;
    }
}