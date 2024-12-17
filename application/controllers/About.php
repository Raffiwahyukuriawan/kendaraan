<?php defined('BASEPATH') or exit('gak oleh mlebu');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna');
        $this->load->model('konfigurasi_model');
        $this->load->model('welcome_model');
        $this->load->model('artikel_model');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Carbook | About',
            'footer' => $this->welcome_model->footer(),
            'pengunjung' => $this->session->userdata('pengunjung'),
            'jumlah_car' => $this->welcome_model->jumlah_car(),
            'jumlah_komen' => $this->welcome_model->jumlah_komen(),
            'about' => $this->welcome_model->about(11),
            'konfigurasi' => $this->welcome_model->get_konfigurasi(),
            'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
        );
        $this->load->view('template/header', $data);
        $this->load->view('about');
        $this->load->view('template/footer');
    }

    public function service()
    {
        $data = array(
            'footer' => $this->welcome_model->footer(),
            'judul' => 'Carbook | Service',
            'service' => $this->welcome_model->service(9),
            'konfigurasi' => $this->welcome_model->get_konfigurasi(),
            'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
        );
        $this->load->view('template/header', $data);
        $this->load->view('service');
        $this->load->view('template/footer', $data);
    }

    public function car()
    {
        $halamanAktif = $this->input->get('page', TRUE) ?: 1; // Nomor halaman, default 1 jika tidak ada di URL
        $kontenPerHalaman = 4; // Jumlah konten per halaman

        // Hitung offset
        $offset = ($halamanAktif - 1) * $kontenPerHalaman;

        // Ambil data dari model dengan limit dan offset
        $data = array(
            'judul' => 'Carbook | Car',
            'mobil' => $this->artikel_model->ambil1($kontenPerHalaman, $offset),
            'footer' => $this->welcome_model->footer(),
            'konfigurasi' => $this->welcome_model->get_konfigurasi(),
            'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
            'halamanAktif' => $halamanAktif,
            'totalHalaman' => ceil($this->artikel_model->hitung_total_mobil() / $kontenPerHalaman),
        );

        $this->load->view('template/header', $data);
        $this->load->view('cars', $data);
        $this->load->view('template/footer', $data);
    }


    public function contact()
    {
        $data = array(
            'judul' => 'Carbook | contact',
            'footer' => $this->welcome_model->footer(),
            'kontak' => $this->konfigurasi_model->get(),
            'konfigurasi' => $this->welcome_model->get_konfigurasi(),
            'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
        );
        // var_dump($data);
        // die;
        $this->load->view('template/header', $data);
        $this->load->view('contact', $data);
        $this->load->view('template/footer', $data);
    }
}
