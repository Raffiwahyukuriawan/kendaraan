<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
        $this->load->model('client_model');
        $this->load->model('welcome_model');
        if(!$this->session->userdata('useradmin')) {
            redirect('admin/auth');
        }
    }

    public function index()
    {
        $nama = $this->session->userdata('useradmin');
		$cek = $this->artikel_model->get_nama($nama);
		if ($cek) {
			$data1['nama_user'] = $cek->nama;
		} else {
			$data1['nama_user'] = 'Nama Kamu Siapa?';
		}
		$data = array(
			'judul_halaman' => 'Halaman Daftar Client',
			'alamat1'	=> 'Dashboard',
			'alamat2'	=> 'Client',
            'client' => $this->client_model->ambil(),
			'user' => $this->welcome_model->get_foto($cek->nama),
		);
		// var_dump($data);
		// die;

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data1);
		$this->load->view('admin/clientt', $data);
		$this->load->view('admin/template/footer');
    }

	public function tambah()
	{
		$namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']    = 'AdminLTE-3.1.0/assets/client/';
        $config['max_size']     = 2250 * 4000;
        $config['file_name']    = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 2250 * 4000) {
            $this->session->set_flashdata('message', 'Ukuran Foto Terlalu Besar! upload ulang foto dengan ukuran kurang dari 2 mb..');
            redirect('admin/client');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
		$data = array(
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'foto' => $namafoto,
		);

		if($this->db->insert('client',$data)) {
			$this->session->set_flashdata('success', 'Client Berhasil Ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Menambahkan Client.');
		}
		redirect('admin/client');
	}

	public function update()
	{
		$namafoto = $this->input->post('foto');
		$config['upload_path'] = 'AdminLTE-3.1.0/assets/client/';
		$config['max_size'] = 1024; // Batas maksimal 1 MB
		$config['file_name'] = time() . '_' . $namafoto; // Tambahkan timestamp agar nama unik
		$config['overwrite'] = true;
		$config['allowed_types'] = '*'; // Batasi hanya tipe gambar tertentu

		$this->load->library('upload', $config);

		if ($_FILES['foto']['size'] >= 1024 * 1024) { // Pengecekan ukuran dalam byte
			$this->session->set_flashdata('message', 'Upload ulang foto dengan ukuran kurang dari 1 MB.');
			redirect('admin/carousel');
		} elseif (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'Error: ' . implode(' ', $error));
			redirect('admin/client');
		} else {
			$data = $this->upload->data();
			$foto = $data['file_name']; // Dapatkan nama file yang diupload
		}

		$where = array(
			'id_client' => $this->input->post('id_client') // Sesuaikan dengan primary key id_konten
		);

		$data = array(
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'foto' => isset($foto) ? $foto : $this->input->post('foto_lama'), // Gunakan foto lama jika tidak ada upload baru
		);

		if ($this->db->update('client', $data, $where)) {
			$this->session->set_flashdata('success', 'Client Berhasil Diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Mengedit Client.');
		}
		redirect('admin/client');
	}

	public function hapus($foto)
    {
        $filename = FCPATH . 'AdminLTE-3.1.0/assets/client/' . $foto;
        if (file_exists($filename)) {
            if (!unlink($filename)) {
                echo "Gagal menghapus file: " . $filename;
            }
        } else {
            echo "File tidak ditemukan: " . $filename;
        }
        if ($this->client_model->hapus($foto)) {
            $this->session->set_flashdata('success', 'Data Client Berhasil Dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data Client Gagal Dihapus!');
        }
        redirect('admin/client');
    }
}