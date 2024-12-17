<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
    public function ambil1($limit, $offset)
    {
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('merk c', 'a.id_merk=c.id_merk', 'left');
        $this->db->order_by('a.id_konten', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get()->result();
    }

    public function hitung_total_mobil()
    {
        $this->db->from('konten');
        return $this->db->count_all_results();
    }

    public function ambil_merk()
    {
        return $this->db->get('merk')->result();
    }

    public function ambil_kategori()
    {
        $query = $this->db->get('kategori'); // Sesuaikan dengan nama tabel kategori
        return $query->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('konten', $data);
    }

    public function hapus($foto)
    {
        $this->db->where('foto', $foto);
        return $this->db->delete('konten');
    }

    public function get_nama($nama)
    {
        $this->db->where('nama', $nama);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function tambah_fitur($data)
    {
        $this->db->insert('fitur', $data);
        return $this->db->insert_id();
    }

    public function update_id_fitur_konten($id_konten, $id_fitur)
    {
        $this->db->set('id_fitur', $id_fitur);
        $this->db->where('id_konten', $id_konten);
        return $this->db->update('konten');
    }

    public function ambil_fitur($id)
    {
        $this->db->from('konten a');
        $this->db->join('fitur b', 'a.id_fitur=b.id_fitur', 'left');
        $this->db->where('id_konten', $id);
        $this->db->order_by('a.id_konten');
        return $this->db->get()->row();
    }

    public function ambil_judul($id)
    {
        $this->db->where('id_konten', $id);
        $query =  $this->db->get('konten');
        return $query->row();
    }

    public function fitur_edit($id)
    {
        $this->db->where('id_fitur', $id);
        return $this->db->get('fitur')->row();
    }
}
