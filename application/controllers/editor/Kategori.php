<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
		if (!$this->session->userdata('editor')) {
			redirect('editor/auth');
		}
	}

	public function index()
	{
		$nama = $this->session->userdata('editor');
		$cek = $this->kategori_model->get_nama($nama);
		if($cek) {
			$data2['nama_user'] = $cek->nama;
		} else {
			$data2['nama_user'] = 'Nama Kamu Siapa?';
		}
		$judul = array(
			'judul_halaman' => 'Halaman Kategori-Admin',
			'alamat1'	=> 'Dashboard',
			'alamat2'	=> 'Kategori',
		);
		$data['kategori'] = $this->kategori_model->ambil();
		$this->load->view('editor/template/header',$judul);
		$this->load->view('editor/template/sidebar',$data2);
		$this->load->view('editor/kategori', $data,$judul);
		$this->load->view('editor/template/footer');
	}

	public function tambah()
	{
		$this->db->from('kategori');
		$this->db->where('kategori',$this->input->post('kategori'));
		$cek = $this->db->get()->row();
		if($cek == NULL){
			$data = array(
				'kategori' => $this->input->post('kategori')
			);
			if ($this->kategori_model->tambah($data)) {
				$this->session->set_flashdata('success', 'kategori berhasil ditambahkan.');
			} else {
				$this->session->set_flashdata('error','gagal menambahkan kategori.');
			}
		} else {
			$this->session->set_flashdata('message', 'Kategri sudah ada! Silakan pilih nama kategori yang lain.');
		}
		redirect('editor/kategori');
	}

	public function hapus($id)
	{
		if ($this->kategori_model->hapus($id)) {
			$this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error','Kategori gagal dihapus.');
		}
		redirect('editor/kategori');
	}

	public function update()
	{
		$where = array(
			'id_kategori' => $this->input->post('id_kategori')
		);
		$data12 = array(
			'kategori' => $this->input->post('kategori')
		);
		if ($this->db->update('kategori', $data12, $where)) {
			$this->session->set_flashdata('success','Nama kategori berhasil diupdate.');
		} else {
			$this->session->set_flashdata('error','Nama pengelola gagal diupdate.');
		}
		redirect('editor/kategori');
	}
}
