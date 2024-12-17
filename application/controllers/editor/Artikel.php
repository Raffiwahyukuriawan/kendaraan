<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artikel_model');
		$this->load->model('pengguna');
		if (!$this->session->userdata('editor')) {
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
			'judul_halaman' => 'Halaman Artikel-Admin',
			'alamat1'	=> 'Dashboard',
			'alamat2'	=> 'Artikel',
			'kategori' 	=> $this->artikel_model->ambil_kategori(),
			'artikel' 	=> $this->artikel_model->ambil1(),
			'merk' 		=> $this->artikel_model->ambil_merk()
		);
		// var_dump($data);
		// die;

		$this->load->view('editor/template/header', $data);
		$this->load->view('editor/template/sidebar', $data1);
		$this->load->view('editor/artikell', $data);
		$this->load->view('editor/template/footer');
	}

	public function tambah()
	{
		$namafoto = date('YmdHis') . '.jpg';
		$config['upload_path']	= 'AdminLTE-3.1.0/assets/upload/';
		$config['max_size'] 	= 2250 * 4000;
		$config['file_name']	= $namafoto;
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
		if ($_FILES['foto']['size'] >= 2250 * 4000) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					<strong>Ukuran Foto Terlalu Besar!</strong> upload ulang foto dengan ukuran kurang dari 500 KB.
				</div>
			');
			redirect('admin/artikel');
		} elseif (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}

		$this->db->from('konten');
		$this->db->where('judul', $this->input->post('judul'));
		$cek = $this->db->get()->row();
		if ($cek == NULL) {
			$harga = str_replace('.', '', $this->input->post('harga')); // Hapus titik pada harga
			$data = array(
				'judul' 		=> $this->input->post('judul'),
				'id_kategori' 	=> $this->input->post('id_kategori'),
				'id_merk'		=> $this->input->post('id_merk'),
				'harga_murah' 		=> $this->input->post('harga_murah'),
				'harga_mahal' 		=> $this->input->post('harga_mahal'),
				'deskripsi' 	=> $this->input->post('deskripsi'),
				'tanggal'		=> date('Y-m-d'),
				'username'		=> $this->session->userdata('useradmin'),
				'foto'			=> $namafoto,
				'slug'			=> str_replace(' ', '-', $this->input->post('judul'))
			);
			// var_dump($data);
			// die;
			if ($this->db->insert('konten', $data)) {
				$this->session->set_flashdata('success', 'kategori berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error', 'gagal menambahkan kategori.');
			}
		} else {
			$this->session->set_flashdata('message', 'Judul Artikel Sudah Ada! Silakan ganti judul artikel dengan yang lain.');
		}
		redirect('admin/artikel');
	}

	public function hapus($foto)
	{
		$filename = FCPATH . 'AdminLTE-3.1.0/assets/upload/' . $foto;
		if (file_exists($filename)) {
			unlink($filename);
		}
		if ($this->artikel_model->hapus($foto)) {
			$this->session->set_flashdata('success', 'Berhasil Menghapus! artikel berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Menghapus! gagal menghapus artikel.');
		}
		redirect('editor/artikel');
	}

	public function update()
	{
		$namafoto = $this->input->post('foto');
		$config['upload_path'] = 'AdminLTE-3.1.0/assets/upload/';
		$config['max_size'] = 1024; // Batas maksimal 1 MB
		$config['file_name'] = time() . '_' . $namafoto; // Tambahkan timestamp agar nama unik
		$config['overwrite'] = true;
		$config['allowed_types'] = '*'; // Batasi hanya tipe gambar tertentu

		$this->load->library('upload', $config);

		if ($_FILES['foto']['size'] >= 1024 * 1024) { // Pengecekan ukuran dalam byte
			$this->session->set_flashdata('message', 'Upload ulang foto dengan ukuran kurang dari 1 MB.');
			redirect('admin/artikel');
		} elseif (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'Error: ' . implode(' ', $error));
			redirect('admin/artikel');
		} else {
			$data = $this->upload->data();
			$foto = $data['file_name']; // Dapatkan nama file yang diupload
		}

		$where = array(
			'id_konten' => $this->input->post('id_konten') // Sesuaikan dengan primary key id_konten
		);

		$harga = str_replace('.', '', $this->input->post('harga')); // Hapus titik pada harga

		$data = array(
			'judul' 		=> $this->input->post('judul'),
			'id_kategori' 	=> $this->input->post('id_kategori'),
			'id_merk'		=> $this->input->post('id_merk'),
			'harga_murah' 	=> $this->input->post('harga_murah'),
			'harga_mahal' 	=> $this->input->post('harga_mahal'),
			'deskripsi' 	=> $this->input->post('deskripsi'),
			'foto' 			=> isset($foto) ? $foto : $this->input->post('foto_lama'), // Gunakan foto lama jika tidak ada upload baru
			'slug' 			=> str_replace(' ', '-', strtolower($this->input->post('judul')))
		);

		if ($this->db->update('konten', $data, $where)) {
			$this->session->set_flashdata('success', 'Konten berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Mengupdate konten.');
		}

		redirect('editor/artikel');
	}

	public function update_status()
	{
		$where = array(
			'id_konten' => $this->input->post('id_konten') // Sesuaikan dengan primary key id_konten
		);

		$data = array(
			'status' => $this->input->post('status'),
		);
		if ($this->db->update('konten', $data, $where)) {
			$this->session->set_flashdata('success', 'Status berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Status Gagal Diupdate.');
		}

		redirect('editor/artikel');
	}

	public function fitur($id)
	{
		// var_dump($id);
		// die;
		$nama = $this->session->userdata('useradmin');
		$user = $this->pengguna->get_id($nama);
		if ($user) {
			$data12['nama_user'] = $user->nama;
		} else {
			$data12['nama_user'] = 'Nama kamu siapa';
		}
		$data = array(
			'judul_halaman' => 'Halaman Artikel-Admin',
			'alamat1'	=> 'Artikel',
			'alamat2'	=> 'Fitur',
			'artikel' 	=> $this->artikel_model->ambil1(),
			'fitur' 	=> $this->artikel_model->ambil_fitur($id),
		);
		// var_dump($data);
		// die;
		$this->load->view('editor/template/sidebar', $data12);
		$this->load->view('editor/fitur', $data);
		$this->load->view('editor/template/footer', $data);
	}

	public function tambah_fitur()
	{
		$data = array(
			'judul' => $this->input->post('judul'),
			'transmisi' => $this->input->post('transmisi'),
			'seat' => $this->input->post('seat'),
			'air_bag' => $this->input->post('air_bag'),
			'bbm' => $this->input->post('bbm'),
			'cc' => $this->input->post('cc'),
		);
		$id_fitur = $this->artikel_model->tambah_fitur($data);

		if ($id_fitur) {
			// Ambil ID konten yang ingin diperbarui
			$id_konten = $this->input->post('id_konten'); // Sesuaikan dengan data dari form
			// var_dump($id_konten);
			// die;
			// Update id_fitur di tabel konten
			$result = $this->artikel_model->update_id_fitur_konten($id_konten, $id_fitur);
			if ($result) {
				$this->session->set_flashdata('success', 'Berhasil Menambahkan Fitur');
			} else {
				$this->session->set_flashdata('error', 'Gagal Menambahkan Fitur');
			}
			redirect('admin/artikel');
		}
	}

	public function fitur_tambah($id)
	{
		// var_dump($id);
		// die;
		$nama = $this->session->userdata('useradmin');
		$user = $this->pengguna->get_id($nama);
		if ($user) {
			$data12['nama_user'] = $user->nama;
		} else {
			$data12['nama_user'] = 'Nama kamu siapa';
		}
		$data = array(
			'judul_halaman' => 'Halaman Artikel-Tambah_Fitur',
			'judul' 		=> $this->artikel_model->ambil_judul($id),
			'alamat1'		=> 'Artikel',
			'alamat2'		=> 'Tambah Fitur',
		);
		// var_dump($data);
		// die;
		$this->load->view('editor/template/sidebar', $data12);
		$this->load->view('editor/fitur_tambah', $data);
		$this->load->view('editor/template/footer', $data);
	}


	public function update_fitur()
	{
		$where = array(
			'id_fitur' => $this->input->post('id_fitur'),
		);
		$data = array(
			'judul' => $this->input->post('judul'),
			'cc' => $this->input->post('cc'),
			'transmisi' => $this->input->post('transmisi'),
			'seat' => $this->input->post('seat'),
			'bbm' => $this->input->post('bbm'),
			'air_bag' => $this->input->post('air_bag')
		);
		// var_dump($where,$data);
		// die;
		if ($this->db->update('fitur', $data, $where)) {
			$this->session->set_flashdata('success', 'Berhasil Mengupdate Fitur');
		} else {
			$this->session->set_flashdata('error', 'Gagal Mengupdate Fitur');
		}
		redirect('editor/artikel');
	}
}
