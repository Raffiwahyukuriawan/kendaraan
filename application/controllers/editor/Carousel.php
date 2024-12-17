<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
        $this->load->model('carousel_model');
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
            'judul_halaman' => 'Carousel',
            'alamat1'    => 'Dashboard',
            'alamat2'    => 'Background',
            'carousel'   => $this->carousel_model->ambil(),
            // 'kategori'     => $this->artikel_model->ambil_kategori(),
        );
        // var_dump($ada); // Atau print_r($data['kategori']);
        // exit; // Berhenti di sini untuk melihat hasil debug
        $this->load->view('editor/template/header', $data);
        $this->load->view('editor/template/sidebar', $data1);
        $this->load->view('editor/carousell', $data);
        $this->load->view('editor/template/footer');
    }

	public function update()
	{
		$namafoto = $this->input->post('foto');
		$config['upload_path'] = 'AdminLTE-3.1.0/assets/carousel/';
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
			redirect('admin/carousel');
		} else {
			$data = $this->upload->data();
			$foto = $data['file_name']; // Dapatkan nama file yang diupload
		}

		$where = array(
			'id_carousel' => $this->input->post('id_carousel') // Sesuaikan dengan primary key id_konten
		);

		$data = array(
			'judul' => $this->input->post('judul'),
			'foto' => isset($foto) ? $foto : $this->input->post('foto_lama'), // Gunakan foto lama jika tidak ada upload baru
		);

		if ($this->db->update('carousel', $data, $where)) {
			$this->session->set_flashdata('success', 'Carousel berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error', 'Gagal mengedit Carousel.');
		}
		redirect('editor/carousel');
	}
}
