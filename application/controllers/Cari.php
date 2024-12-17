<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
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

    }

    public function index()
    {
        $data = array(
            'judul' => 'Carbook - Search',
            'merk' => $this->welcome_model->ambil_merk(),
            'kategori' => $this->welcome_model->ambil_tipe(),
            'data' => $this->welcome_model->ambil()
        );
        // var_dump($data);
        // die;
        $this->load->view('template/header', $data);
        $this->load->view('welcome_message', $data);
        $this->load->view('template/footer');
    }

    public function cari()
    {
        $judul = $this->input->post('judul');

        $mobil = $this->welcome_model->cari($judul);
        $this->session->set_userdata('nama_mobil', $mobil[0]->judul);
        // Cek apakah data ditemukan
        if (empty($mobil)) {
            // Jika data tidak ditemukan, beri pesan dan tetap di halaman dashboard
            $this->session->set_flashdata('message', 'Tidak ada mobil yang ditemukan.');
            redirect('');
        } else {
            // Jika data ditemukan, arahkan ke halaman hasil dan kirim data
            $data = array(
                'judul' => 'Carbook - Search',
                'komentar' => $this->komentar_model->komentar($mobil[0]->judul),
                'footer' => $this->welcome_model->footer(),
                'mobil' => $mobil,
                'komen' => $this->welcome_model->jumlah_komen(),
                'konfigurasi' => $this->welcome_model->get_konfigurasi(),
                'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
            );
            // var_dump($data);
            // die;
            $this->load->view('template/header', $data);
            $this->load->view('cari_mobil', $data);
            $this->load->view('template/footer', $data);
        }
    }
}
