<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
		$this->load->model('komentar_model');
		$this->load->model('blog_model');
		$this->load->model('merk_model');
	}

	public function index()
	{
		if (!$this->session->userdata('pengunjung')) {
			$this->session->set_userdata('pengunjung', 1);
		} else {
			$this->session->set_userdata('pengunjung', $this->session->userdata('pengunjung') + 1);
		}

		$aaa = $this->welcome_model->get_konten();
		// echo '<pre>';
		// print_r($status);
		// echo '</pre>';
		// die;
		$data = array(
			'judul' => 'Carbook',
			'merk' => $this->welcome_model->ambil_merk(),
			'kategori' => $this->welcome_model->ambil_tipe(),
			'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
			'footer' => $this->welcome_model->footer(),
			'pengunjung' => $this->session->userdata('pengunjung'),
			'jumlah_car' => $this->welcome_model->jumlah_car(),
			'jumlah_komen' => $this->welcome_model->jumlah_komen(),
			'client' => $this->welcome_model->ambil_client(),
			'blog' => $this->blog_model->ambil(),
			'carousel' => $this->welcome_model->carousel(7),
			'service' => $this->welcome_model->service(9),
			'about' => $this->welcome_model->about(11),
			'konfigurasi' => $this->welcome_model->get_konfigurasi(),
		);
		// var_dump($data);
		// die;
		$this->load->view('template/header', $data);
		$this->load->view('welcome_message', $data);
		$this->load->view('template/footer', $data);
	}

	public function komentar()
	{	
		$id_konten = $this->input->post('id_konten');
		// var_dump($id_konten);
		// die;
		$nama_mobil = $this->input->post('judul');
		$data = array(
			'judul' => $nama_mobil,
			'nama' => $this->session->userdata('user'),
			'tanggal' => date('y-m-d'),
			'keterangan' => $this->input->post('keterangan'),
		);
        // var_dump($data);
        // die;
		
		if ($this->welcome_model->komentar($data)) {
			$this->session->set_flashdata('success', 'Berhasil memberi komentar');
		} else {
			$this->session->set_flashdata('error', 'Gagal memberi komentar');
		}
		$id_konten = $this->session->userdata('id_konten');  // Pastikan ID mobil ada di session
		redirect('welcome/detail/'.$id_konten);
	}

	public function detail($id_konten)
	{

		$mobil = $this->welcome_model->detail($id_konten);
		// var_dump($mobil);
		// die;
		$this->session->set_userdata('nama_mobil', $mobil->judul);
		$this->session->set_userdata('id_mobil', $mobil->id_konten);
		$merk = $this->welcome_model->get_merk($mobil->id_merk, $id_konten);
		// var_dump($cek);
		// die; 

		$data = array(
			'halaman' => 'Detail',
			'judul' => 'Carbook  |  Details',
			'mobil' => $mobil,
			'merk' => $merk,
			'komentar' => $this->komentar_model->komentar($mobil->judul),
			'fitur' => $this->welcome_model->fitur($id_konten),
			'footer' => $this->welcome_model->footer(),
			'blog' => $this->blog_model->ambil(),
			'komen' => $this->welcome_model->jumlah_komen_detail($mobil->judul),
			'status' => $this->welcome_model->ambil_konten(),
			'id_konten' => $this->welcome_model->get_by_id($id_konten)->id_konten,
			'konfigurasi' => $this->welcome_model->get_konfigurasi(),
			'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
		);
		// var_dump($data);
		// die;
		$this->load->view('template/header', $data);
		$this->load->view('detail', $data);
		$this->load->view('template/footer', $data);
	}

	public function hapus_komen($id_komen)
	{
		// var_dump($id_komen);
		// die;
		if ($this->welcome_model->delete_komen($id_komen)) {
			$this->session->set_flashdata('success', 'Komentar berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Komentar gagal dihapus');
		}
		$id_konten = $this->session->userdata('id_mobil');
		// var_dump($id_konten);
		// die;
		redirect('welcome/detail/'. $id_konten);
	}

	public function kontak()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'subjek' => $this->input->post('subjek'),
			'email' => $this->input->post('email'),
			'message' => $this->input->post('message'),
		);
		
		if ($this->db->insert('kontak', $data)) {
			$this->session->set_flashdata('success', 'berhasil Mengirim Pesan.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Mengirim Pesan.');
		}
		redirect('about/contact');
	}
}
