<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('files', $data);
    }

    public function getByUser($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->order_by('uploaded_at', 'DESC')
            ->get('files')
            ->result();
    }

    public function countByUser($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->count_all_results('files');
    }
    public function getByUserGrouped($user_id)
    {
        $query = $this->db
            ->where('user_id', $user_id)
            ->order_by('fase', 'ASC')
            ->order_by('uploaded_at', 'DESC')
            ->get('files')
            ->result();

        // Kelompokkan berdasarkan fase
        $grouped = [];
        foreach ($query as $row) {
            $grouped[$row->fase][] = $row;
        }

        return $grouped;
    }

}
