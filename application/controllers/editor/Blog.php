<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
        $this->load->model('blog_model');
        if(!$this->session->userdata('editor')) {
            redirect('editor/auth');
        }
    }

    public function index()
    {
        $nama = $this->session->userdata('editor');
		$cek = $this->artikel_model->get_nama($nama);
		if ($cek) {
			$data1['nama_user'] = $cek->nama;
		} else {
			$data1['nama_user'] = 'Nama Kamu Siapa?';
		}
		$data = array(
			'judul_halaman' => 'Halaman Daftar Blog',
			'alamat1'	=> 'Dashboard',
			'alamat2'	=> 'Blog',
            'blog' => $this->blog_model->ambil(),
		);
		// var_dump($data);
		// die;

		$this->load->view('editor/template/header', $data);
		$this->load->view('editor/template/sidebar', $data1);
		$this->load->view('editor/blogg', $data);
		$this->load->view('editor/template/footer');
    }

	public function tambah()
	{
		$namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']    = 'AdminLTE-3.1.0/assets/blog/';
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
            'tanggal' => date('y-m-d'),
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
            'username' => $this->session->userdata('useradmin'),
			'foto' => $namafoto,
		);

		if($this->db->insert('blog',$data)) {
			$this->session->set_flashdata('success', 'Blog Berhasil Ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Menambahkan BLog.');
		}
		redirect('editor/blog');
	}

	public function update()
	{
		$namafoto = $this->input->post('foto');
		$config['upload_path'] = 'AdminLTE-3.1.0/assets/blog/';
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
			redirect('admin/blog');
		} else {
			$data = $this->upload->data();
			$foto = $data['file_name']; // Dapatkan nama file yang diupload
		}

		$where = array(
			'id_blog' => $this->input->post('id_blog') // Sesuaikan dengan primary key id_konten
		);

		$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'foto' => isset($foto) ? $foto : $this->input->post('foto_lama'), // Gunakan foto lama jika tidak ada upload baru
		);

		if ($this->db->update('blog',$data, $where)) {
			$this->session->set_flashdata('success', 'Blog Berhasil Diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Mengedit Blog.');
		}
		redirect('editor/blog');
	}

	public function hapus($foto)
    {
        $filename = FCPATH . 'AdminLTE-3.1.0/assets/blog/' . $foto;
        if (file_exists($filename)) {
            if (!unlink($filename)) {
                echo "Gagal menghapus file: " . $filename;
            }
        } else {
            echo "File tidak ditemukan: " . $filename;
        }
        if ($this->blog_model->hapus($foto)) {
            $this->session->set_flashdata('success', 'Blog Berhasil Dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Blog Gagal Dihapus!');
        }
        redirect('editor/blog');
    }
}