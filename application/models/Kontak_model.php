<?php defined('BASEPATH') OR exit ('gak oleh mlebu');

class kontak_model extends CI_Model{
    public function ambil()
    {
        return $this->db->get('kontak')->result();
    }
}