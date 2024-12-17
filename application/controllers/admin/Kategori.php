<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
		$this->load->model('welcome_model');
		if (!$this->session->userdata('useradmin')) {
			redirect('admin/auth');
		}
	}

	public function index()
	{
		$nama = $this->session->userdata('useradmin');
		$cek = $this->kategori_model->get_nama($nama);
		if ($cek) {
			$data2['nama_user'] = $cek->nama;
		} else {
			$data2['nama_user'] = 'Nama Kamu Siapa?';
		}
		$judul = array(
			'judul_halaman' => 'Halaman Kategori-Admin',
			'alamat1'	=> 'Dashboard',
			'alamat2'	=> 'Kategori',
			'user' => $this->welcome_model->get_foto($cek->nama),
		);
		$data['kategori'] = $this->kategori_model->ambil();
		$this->load->view('admin/template/header', $judul);
		$this->load->view('admin/template/sidebar', $data2);
		$this->load->view('admin/kategori', $data, $judul);
		$this->load->view('admin/template/footer');
	}

	public function tambah()
	{
		$namafoto = date('YmdHis') . '.jpg';
		$config['upload_path']	= 'AdminLTE-3.1.0/assets/kategori/';
		$config['max_size'] 	= 2250 * 4000;
		$config['file_name']	= $namafoto;
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
		if ($_FILES['foto_kategori']['size'] >= 2250 * 4000) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					<strong>Ukuran Foto Terlalu Besar!</strong> upload ulang foto dengan ukuran kurang dari 500 KB.
				</div>
			');
			redirect('admin/artikel');
		} elseif (!$this->upload->do_upload('foto_kategori')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}

		$this->db->from('kategori');
		$this->db->where('kategori', $this->input->post('kategori'));
		$cek = $this->db->get()->row();
		if ($cek == NULL) {
			$data = array(
				'kategori'  => $this->input->post('kategori'),
				'foto_kategori'		=> $namafoto,
			);
			if ($this->kategori_model->tambah($data)) {
				$this->session->set_flashdata('success', 'kategori berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error', 'gagal menambahkan kategori.');
			}
		} else {
			$this->session->set_flashdata('message', 'Kategri sudah ada! Silakan pilih nama kategori yang lain.');
		}
		redirect('admin/kategori');
	}

	public function hapus($foto_kategori)
	{
		$filename = FCPATH . 'AdminLTE-3.1.0/assets/kategori/' . $foto_kategori;
		if (file_exists($filename)) {
			unlink($filename);
		}
		if ($this->kategori_model->hapus($foto_kategori)) {
			$this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Kategori gagal dihapus.');
		}
		redirect('admin/kategori');
	}

	public function update()
	{
		$namafoto = $this->input->post('foto_kategori');
		$config['upload_path'] = 'AdminLTE-3.1.0/assets/kategori/';
		$config['max_size'] = 1024; // Batas maksimal 1 MB
		$config['file_name'] = time() . '_' . $namafoto; // Tambahkan timestamp agar nama unik
		$config['overwrite'] = true;
		$config['allowed_types'] = '*'; // Batasi hanya tipe gambar tertentu

		$this->load->library('upload', $config);

		if ($_FILES['foto_kategori']['size'] >= 1024 * 1024) { // Pengecekan ukuran dalam byte
			$this->session->set_flashdata('message', 'Upload ulang foto dengan ukuran kurang dari 1 MB.');
			redirect('admin/artikel');
		} elseif (!$this->upload->do_upload('foto_kategori')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'Error: ' . implode(' ', $error));
			redirect('admin/kategori');
		} else {
			$data = $this->upload->data();
			$foto = $data['file_name']; // Dapatkan nama file yang diupload
		}

		$where = array(
			'id_kategori' => $this->input->post('id_kategori')
		);
		$data12 = array(
			'kategori'  => $this->input->post('kategori'),
			'foto_kategori' 		=> isset($foto) ? $foto : $this->input->post('file_name'), // Gunakan foto lama jika tidak ada upload baru

		);
		if ($this->db->update('kategori', $data12, $where)) {
			$this->session->set_flashdata('success', 'Nama kategori berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Nama pengelola gagal diupdate.');
		}
		redirect('admin/kategori');
	}
}
