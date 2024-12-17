<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Pengelola extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengguna');
		$this->load->model('welcome_model');
		if (!$this->session->userdata('useradmin')) {
			redirect('admin/auth');
		}
	}

	public function index()
	{
		$nama = $this->session->userdata('useradmin');
		$cek = $this->pengguna->get_id($nama);
		if ($cek) {
			$data['nama_user'] = $cek->nama;
		} else {
			$data['nama_user'] = 'Nama Kamu Siapa?';
		}

		$judul = array(
			'judul_halaman' => 'Halaman Pengelola-Admin',
			'alamat1' 		=> 'Dashboard',
			'alamat2'		=> 'Pengelola',
			'user' => $this->welcome_model->get_foto($cek->nama),

		);
		$data['admin'] = $this->pengguna->tampil_admin();
		$this->load->view('admin/template/header', $judul);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/pengelola', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{
		$namafoto = date('YmdHis') . '.jpg';
		$config['upload_path']	= 'AdminLTE-3.1.0/assets/foto_user/';
		$config['max_size'] 	= 2250 * 4000;
		$config['file_name']	= $namafoto;
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
		if ($_FILES['foto_user']['size'] >= 2250 * 4000) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					<strong>Ukuran Foto Terlalu Besar!</strong> upload ulang foto dengan ukuran kurang dari 500 KB.
				</div>
			');
			redirect('admin/pengelola');
		} elseif (!$this->upload->do_upload('foto_user')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}

		$this->db->from('users');
		$this->db->where('username', $this->input->post('username'));
		$cek = $this->db->get()->row();
		if ($cek == NULL) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'foto_user' => $namafoto,
				'level' => $this->input->post('level'),
			);
			// echo "<pre>";
			// print_r($data);
			// echo "<pre>";
			// die;
			if ($this->pengguna->tambah($data)) {
				$this->session->set_flashdata('success', 'Data berhasil menambah!');
			} else {
				$this->session->set_flashdata('error', 'Gagal menambah data.');
			}
		} else {
			$this->session->set_flashdata('message', ' Silakan pilih username lain.');
		}
		redirect('admin/pengelola');
	}

	public function hapus($foto_user)
	{
		$filename = FCPATH . 'AdminLTE-3.1.0/assets/foto_user/' . $foto_user;
		if (file_exists($filename)) {
			unlink($filename);
		}
		if ($this->pengguna->hapus($foto_user)) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus');
		}
		redirect('admin/pengelola');
	}

	public function update_admin()
	{
		$namafoto = date('YmdHis') . '.jpg';
		$config['upload_path'] = 'AdminLTE-3.1.0/assets/foto_user/';
		$config['max_size'] = 1024; // Batas maksimal 1 MB
		$config['file_name'] = time() . '_' . $namafoto; // Tambahkan timestamp agar nama unik
		$config['overwrite'] = true;
		$config['allowed_types'] = '*'; // Batasi hanya tipe gambar tertentu

		$this->load->library('upload', $config);

		if ($_FILES['foto_user']['size'] >= 1024 * 1024) { // Pengecekan ukuran dalam byte
			$this->session->set_flashdata('message', 'Upload ulang foto dengan ukuran kurang dari 1 MB.');
			redirect('admin/pengelola');
		} elseif (!$this->upload->do_upload('foto_user')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'Error: ' . implode(' ', $error));
			redirect('admin/pengelola');
		} else {
			$data = $this->upload->data();
			$namafoto = $data['file_name']; // Dapatkan nama file yang diupload
		}

		$where = array(
			'id_user' => $this->input->post('id_user')
		);
		$data = array(
			'nama' => $this->input->post('nama'),
			'foto_user' => $namafoto,
		);
		if ($this->db->update('users', $data, $where)) {
			$this->session->set_flashdata('success', 'Nama pengelola berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Nama Pengelola gagal diupdate.');
		}
		redirect('admin/pengelola');
	}
}
