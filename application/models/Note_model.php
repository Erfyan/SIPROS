<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('notes', $data);
    }

    public function getByUser($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->order_by('created_at', 'DESC')
            ->get('notes')
            ->result();
    }

    public function getById($id, $user_id)
    {
        return $this->db
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->get('notes')
            ->row();
    }

    public function update($id, $user_id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->update('notes', $data);
    }

    public function delete($id, $user_id)
    {
        return $this->db
            ->where('id', $id)
            ->where('user_id', $user_id)
            ->delete('notes');
    }

    public function countByUser($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->count_all_results('notes');
    }
}