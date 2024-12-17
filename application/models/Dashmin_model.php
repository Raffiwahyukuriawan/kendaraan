<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashmin_model extends CI_Model
{
    public function hitung_konten() {
        return $this->db->count_all('konten'); // Menghitung semua baris di tabel konten
    }

    public function hitung_user() {
        return $this->db->count_all('users'); // Menghitung semua baris di tabel konten
    }

    public function hitung_komen() {
        return $this->db->count_all('komentar'); // Menghitung semua baris di tabel konten
    }

    public function ambil_komen()
    {
        return $this->db->get('komentar')->result();
    }

    public function komentar($data)
    {
        return $this->db->insert('komentar',$data);
    }

    public function get_konten()
    {
        return $this->db->get('konten')->result();
    }

    public function get_inden()
    {
        return $this->db->get('mobil_inden')->result();
    }
    
    public function get_carousel($id)
    {
        $this->db->where('id_carousel',$id);
        return $this->db->get('carousel')->row();
    }

    public function get_komen()
    {
        return $this->db->get('komentar')->result();
    }
}