<?php
class Progress_model extends CI_Model {

    public function getByUser($user_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->get('progress')
            ->result();
    }
}