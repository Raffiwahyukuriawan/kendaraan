<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model{
    public function ambil()
    {
        return $this->db->get('client')->result();
    }

    public function hapus($foto)
    {
        $this->db->where('foto',$foto);
        return $this->db->delete('client');
    }

    public function update($where,$data)
    {
        return $this->db->update('carousel',$where,$data);
    }
}