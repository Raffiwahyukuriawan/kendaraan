<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna');
        $this->load->model('welcome_model');
		if (!$this->session->userdata('user')) {
            $this->session->set_flashdata('message', 'Untuk berkomentar anda harus login terlebih dahulu.');
			redirect('auth');
		}
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
			'foto' => $this->session->userdata('foto_user'),
		);
        // var_dump($data);
        // die;
		
		if ($this->welcome_model->komentar($data)) {
			$this->session->set_flashdata('success', 'Berhasil memberi komentar');
		} else {
			$this->session->set_flashdata('error', 'Gagal memberi komentar');
		}
		$id_konten = $this->session->userdata('id_mobil');
		  // Pastikan ID mobil ada di session
		//   var_dump($id_konten);
		//   die;
		redirect('welcome/detail/'.$id_konten);
	}
}