<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel_model extends CI_Model{
    public function ambil()
    {
        return $this->db->get('carousel')->result();
    }

    public function hapus($foto)
    {
        $this->db->where('foto',$foto);
        return $this->db->delete('carousel');
    }

    public function update($where,$data)
    {
        return $this->db->update('carousel',$where,$data);
    }

}