<?php defined('BASEPATH') OR exit('No direct script access allowed');

class komentar_model extends CI_Model {
    public function ambil()
    {
        return $this->db->get('komentar')->result();
    }

    public function hapus($id_komen)
    {
        $this->db->where('id_komen',$id_komen);
        return $this->db->delete('komentar');
    }

    public function komentar($judul)
    {
        // var_dump($judul); // Cek apakah judul diterima dengan benar
        // die();
        $this->db->where('judul',$judul);
        return $this->db->get('komentar')->result();
    }

    public function ambil_pesan()
    {
        return $this->db->get('kontak')->result();
    }

    public function hapus_pesan($id)
    {
        $this->db->where('id_kontak',$id);
        return $this->db->delete('kontak');
    }

}