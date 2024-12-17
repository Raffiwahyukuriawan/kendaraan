<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends CI_Model
{
    public function ambil()
    {
        $this->db->from('konten a');
        $this->db->join('merk b', 'a.id_merk=b.id_merk', 'left');
        $this->db->join('kategori c', 'a.id_kategori=c.id_kategori', 'left');
        $this->db->order_by('a.tanggal', 'DESC');
        return $this->db->get()->result();
    }

    public function get_konten()
    {
        return $this->db->get('konten')->result();
    }

    public function hapus($foto)
    {
        $this->db->where('foto', $foto);
        return $this->db->delete('carousel');
    }

    public function ambil_merk()
    {
        return $this->db->get('merk')->result();
    }

    public function ambil_tipe()
    {
        return $this->db->get('kategori')->result();
    }

    public function update($where, $data)
    {
        return $this->db->update('carousel', $where, $data);
    }

    public function komentar($data)
    {
        return $this->db->insert('komentar', $data);
    }

    public function cari($judul)
    {
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('merk c', 'a.id_merk=c.id_merk', 'left');
        $this->db->like('judul', $judul);
        $this->db->order_by('a.id_konten', 'DESC');
        return $this->db->get()->result();
    }


    public function detail($id_konten)
    {
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left');
        $this->db->join('merk c', 'a.id_merk=c.id_merk', 'left');
        $this->db->where('id_konten', $id_konten);
        $this->db->order_by('a.id_konten', 'DESC');
        return $this->db->get()->row();
    }

    public function fitur($id)
    {
        $this->db->from('konten a');
        $this->db->join('fitur b', 'a.id_fitur=b.id_fitur', 'left');
        $this->db->where('id_konten', $id);
        return $this->db->get('fitur')->row();
    }

    public function footer()
    {
        return $this->db->get('konfigurasi')->result();
    }

    public function ambil_client()
    {
        return $this->db->get('client')->result();
    }

    public function jumlah_car()
    {
        return $this->db->count_all('konten'); // Menghitung semua baris di tabel konten
    }

    public function jumlah_komen()
    {
        return $this->db->count_all('komentar');
    }

    public function jumlah_komen_detail($judul)
    {
        $this->db->where('judul',$judul);
        return $this->db->count_all_results('komentar');
    }

    public function delete_komen($id_komen)
    {
        $this->db->where('id_komen', $id_komen);
        return $this->db->delete('komentar');
    }

    public function ambil_konten()
    {
        return $this->db->get('konten')->result();
    }

    public function carousel($id)
    {
        $this->db->where('id_carousel', $id);
        return $this->db->get('carousel')->row();
    }

    public function service($id)
    {
        $this->db->where('id_carousel', $id);
        return $this->db->get('carousel')->row();
    }

    public function about($id)
    {
        $this->db->where('id_carousel', $id);
        return $this->db->get('carousel')->row();
    }

    public function get_merk($id, $merk)
    {
        $this->db->from('konten a');
        $this->db->join('merk b', 'a.id_merk=b.id_merk', 'left');
        $this->db->where('b.id_merk', $id);
        $this->db->where('a.id_konten !=', $merk);
        $this->db->order_by('a.id_konten','DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id_konten)
    {
        $this->db->where('id_konten',$id_konten);
        return $this->db->get('konten')->row();
    }

    public function get_konfigurasi()
    {
        return $this->db->get('konfigurasi')->row();
    }

    public function get_foto($nama)
    {
        $this->db->where('nama', $nama);
        return $this->db->get('users')->row();
    }

    public function ambil_nama_merk($id_merk)
    {
        $this->db->where('id_merk' ,$id_merk);
        return $this->db->get('merk')->row();
    }

    public function get_nama_merk($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        return $this->db->get('kategori')->row();
    }

    public function get_Inden($cek)
    {
        $this->db->where('username', $cek);
        return $this->db->get('mobil_inden')->result();
    }

    public function get_blog($id_blog)
    {
        $this->db->where('id_blog', $id_blog);
        return $this->db->get('blog')->row();
    }
}
