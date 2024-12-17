<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model{
    public function ambil()
    {
        return $this->db->get('blog')->result();
    }

    public function hapus($foto)
    {
        $this->db->where('foto',$foto);
        return $this->db->delete('blog');
    }

    public function update($where,$data)
    {
        $this->db->where('id_blog',$where);
        return $this->db->update('carousel',$data);
    }
}