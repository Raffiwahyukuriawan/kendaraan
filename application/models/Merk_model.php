<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merk_model extends CI_Model
{
    public function ambil()
    {
        return $this->db->get('merk')->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('merk', $data);
    }

    public function hapus($logo)
    {
        $this->db->where('logo', $logo);
        return $this->db->delete('merk');
    }

    public function get_nama($nama)
    {
        $this->db->where('nama', $nama);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function get_berdasar_merk($id_merk)
    {
        $this->db->from('konten a');
        $this->db->join('merk b', 'a.id_merk=b.id_merk', 'left');
        $this->db->where('a.id_merk', $id_merk);
        $this->db->order_by('a.id_konten', 'DESC');
        return $this->db->get('')->result();
    }
}
