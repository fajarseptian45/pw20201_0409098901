<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function searchRole()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('role', $keyword);
        return $this->db->get('user_role')->result_array();
    }
}
