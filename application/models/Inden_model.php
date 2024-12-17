<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inden_model extends CI_Model
{
    public function inden($id)
    {
        $this->db->from('konten a');
        $this->db->join('merk b', 'a.id_merk=b.id_merk', 'left');
        $this->db->join('kategori c', 'a.id_kategori=c.id_kategori', 'left');
        $this->db->where('id_konten', $id);
        $this->db->order_by('a.id_konten');
        return $this->db->get()->row();
    }

    public function simpan($data)
    {
        $this->db->insert('mobil_inden', $data);
        return $this->db->insert_id();
    }

    public function ambil_inden($id_inden)
    {
        $this->db->where('id_inden', $id_inden);
        return $this->db->get('mobil_inden')->row();
    }

    public function update_status_inden($id_inden, $status)
    {
        $this->db->update('mobil_inden', ['status_inden' => $status], ['id_inden' => $id_inden]);
    }

    public function update_status_konten($nama_mobil, $status)
    {
        // var_dump($nama_mobil, $status);
        // die;
        return $this->db->update('konten', ['status' => $status], ['judul' => $nama_mobil]);
    }

    public function konfirmasi($id_inden)
    {
        $this->db->where('id_inden', $id_inden);
        return $this->db->get('mobil_inden')->row();
    }

    public function hapus_inden($id_inden)
    {
        $this->db->where('id_inden', $id_inden);
        return $this->db->delete('mobil_inden');
    }

    public function get()
    {
        return $this->db->get('mobil_inden')->result();
    }

    public function hapus($id)
    {
        $this->db->where('id_inden', $id);
        return $this->db->delete('mobil_inden');
    }

    public function update($data, $where)
    {
        // var_dump($where,$data);
        // die;
        $this->db->where($where);
        $this->db->update('mobil_inden', $data);
        return $this->db->insert_id();
    }

    public function get_all_data()
    {
        return $this->db->get('mobil_inden')->result();
    }
}
