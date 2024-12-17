<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('artikel_model');
        $this->load->model('carousel_model');
        $this->load->model('welcome_model');
        if (!$this->session->userdata('useradmin')) {
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
            'judul_halaman' => 'Carousel',
            'alamat1'    => 'Dashboard',
            'alamat2'    => 'Carousel',
            'carousel'   => $this->carousel_model->ambil(),
            // 'kategori'     => $this->artikel_model->ambil_kategori(),
            'user' => $this->welcome_model->get_foto($cek->nama),
        );
        // var_dump($ada); // Atau print_r($data['kategori']);
        // exit; // Berhenti di sini untuk melihat hasil debug
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data1);
        $this->load->view('admin/carousell', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']    = 'AdminLTE-3.1.0/assets/carousel/';
        $config['max_size']     = 2250 * 4000;
        $config['file_name']    = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if ($_FILES['foto']['size'] >= 2250 * 4000) {
            $this->session->set_flashdata('message', 'Ukuran Foto Terlalu Besar! upload ulang foto dengan ukuran kurang dari 2 mb..');
            redirect('admin/carousel');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $this->db->from('carousel');
        $this->db->where('judul', $this->input->post('judul'));
        $cek = $this->db->get()->row();
        if ($cek == NULL) {
            $data = array(
                'judul'     => $this->input->post('judul'),
                'tanggal'    => date('Y-m-d'),
                'username'    => $this->session->userdata('useradmin'),
                'foto'        => $namafoto,
            );
            if ($this->db->insert('carousel', $data)) {
                $this->session->set_flashdata('success', 'Carousel berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'gagal menambahkan Carousel.');
            }
        } else {
            $this->session->set_flashdata('message', 'Judul Carousel Sudah Ada! Silakan ganti judul Carousel dengan yang lain.');
        }
        redirect('admin/carousel');
    }

    public function hapus($foto)
    {
        $filename = FCPATH . 'AdminLTE-3.1.0/assets/carousel/' . $foto;
        if (file_exists($filename)) {
            if (!unlink($filename)) {
                echo "Gagal menghapus file: " . $filename;
            }
        } else {
            echo "File tidak ditemukan: " . $filename;
        }
        if ($this->carousel_model->hapus($foto)) {
            $this->session->set_flashdata('success', 'Carousel berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Carousel gagal dihapus!');
        }
        redirect('admin/carousel');
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
		redirect('admin/carousel');
	}
}
