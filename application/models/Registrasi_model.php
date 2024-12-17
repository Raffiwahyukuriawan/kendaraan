<?php defined('BASEPATH') OR exit ('gak oleh mlebu');

class Registrasi_Model extends CI_Model{
    public function registrasi($data)
    {
        return $this->db->insert('users',$data);
    }
}