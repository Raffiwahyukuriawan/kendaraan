<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function ambil()
    {
        return $this->db->get('kategori')->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function hapus($foto_kategori)
    {
        $this->db->where('foto_kategori', $foto_kategori);
        return $this->db->delete('kategori');
    }

    public function get_nama($nama)
    {
        $this->db->where('nama', $nama);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function get_berdasar_kategori($id_kategori)
    {
        $this->db->from('konten a');
        $this->db->join('merk b', 'a.id_merk=b.id_merk', 'left');
        $this->db->where('a.id_kategori', $id_kategori);
        $this->db->order_by('a.id_konten', 'DESC');
        return $this->db->get('')->result();
    }
}
