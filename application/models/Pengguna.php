<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Model{
    // ======================== Admin ==========================================
    public function tambah($data)
    {
        return $this->db->insert('users',$data);
    }

    public function tampil_admin()
    {
        return $this->db->get('users')->result();
    }

    public function hapus($foto)
    {
        $this->db->where('foto_user', $foto);
        return $this->db->delete('users');
    }

    public function cek_login($username,$password) {
        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
        $query = $this->db->get('users');

        if($query->num_rows() >0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_id($nama)
    {
        $this->db->where('nama',$nama);
        $query = $this->db->get('users');
        return $query->row();
    }

}