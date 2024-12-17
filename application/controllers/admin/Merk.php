<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Merk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('merk_model');
		$this->load->model('welcome_model');
		if (!$this->session->userdata('useradmin')) {
			redirect('admin/auth');
		}
	}

	public function index()
	{
		$nama = $this->session->userdata('useradmin');
		$cek = $this->merk_model->get_nama($nama);
		if($cek) {
			$data2['nama_user'] = $cek->nama;
		} else {
			$data2['nama_user'] = 'Nama Kamu Siapa?';
		}
		$judul = array(
			'judul_halaman' => 'Merk - Admin',
			'alamat1'	=> 'Dashboard',
			'alamat2'	=> 'Merk',
			'merk'	=> $this->merk_model->ambil(),
			'user' => $this->welcome_model->get_foto($cek->nama),
		);
        $this->load->view('admin/template/header',$judul);
		$this->load->view('admin/template/sidebar',$data2);
		$this->load->view('admin/merkk',$judul);
		$this->load->view('admin/template/footer');
	}

    public function tambah()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']    = 'AdminLTE-3.1.0/assets/merk/';
        $config['max_size']     = 2250 * 4000;
        $config['file_name']    = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if ($_FILES['logo']['size'] >= 2250 * 4000) {
            $this->session->set_flashdata('message', 'Ukuran Foto Terlalu Besar! upload ulang foto dengan ukuran kurang dari 2 mb..');
            redirect('admin/merk');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $this->db->from('merk');
        $this->db->where('merk', $this->input->post('merk'));
        $cek = $this->db->get()->row();
        if ($cek == NULL) {
            $data = array(
                'merk'     => $this->input->post('merk'),
                'logo'        => $namafoto,
            );
			// var_dump($data);
			// die;
            if ($this->merk_model->tambah($data)) {
                $this->session->set_flashdata('success', 'Merk berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan merk.');
            }
        } else {
            $this->session->set_flashdata('message', 'Merk Sudah Ada! Silakan ganti dengan merk yang lain.');
        }
        redirect('admin/merk');
    }

	public function hapus($logo)
	{
		$filename = FCPATH . 'AdminLTE-3.1.0/assets/merk/' . $logo;
		if (file_exists($filename)) {
			unlink($filename);
		}
		if ($this->merk_model->hapus($logo)) {
			$this->session->set_flashdata('success', 'Berhasil Menghapus! mek berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Menghapus! gagal menghapus merk.');
		}
		redirect('admin/merk');
	}

	public function update()
	{
		$namafoto = $this->input->post('logo');
		$config['upload_path'] = 'AdminLTE-3.1.0/assets/merk/';
		$config['max_size'] = 1024; // Batas maksimal 1 MB
		$config['file_name'] = time() . '_' . $namafoto; // Tambahkan timestamp agar nama unik
		$config['overwrite'] = true;
		$config['allowed_types'] = '*'; // Batasi hanya tipe gambar tertentu

		$this->load->library('upload', $config);

		if ($_FILES['logo']['size'] >= 1024 * 1024) { // Pengecekan ukuran dalam byte
			$this->session->set_flashdata('message', 'Upload ulang foto dengan ukuran kurang dari 1 MB.');
			redirect('admin/merk');
		} elseif (!$this->upload->do_upload('logo')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', 'Error: ' . implode(' ', $error));
			redirect('admin/merk');
		} else {
			$data = $this->upload->data();
			$foto = $data['file_name']; // Dapatkan nama file yang diupload
		}

		$where = array(
			'id_merk' => $this->input->post('id_merk') // Sesuaikan dengan primary key id_konten
		);

		$data = array(
			'merk' => $this->input->post('merk'),
			'logo' => isset($foto) ? $foto : $this->input->post('foto_lama'), // Gunakan foto lama jika tidak ada upload baru
		);
		// var_dump($data, $where);
		// die;
		if ($this->db->update('merk', $data, $where)) {
			$this->session->set_flashdata('success', 'Merk berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengedit merk.');
		}
		redirect('admin/merk');
	}
}
