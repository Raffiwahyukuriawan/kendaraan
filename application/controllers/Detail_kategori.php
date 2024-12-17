<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Detail_kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->model('welcome_model');
    }

    public function kategori($id_kategori)
    {
        $data = array(
            'judul' => 'Carbook - Detail_kategori',
            'mobil' => $this->kategori_model->get_berdasar_kategori($id_kategori),
            'footer' => $this->welcome_model->footer(),
            'konfigurasi' => $this->welcome_model->get_konfigurasi(),
            'data' => $this->welcome_model->ambil(), // Ambil hanya 5 item pertama
            'nama_merk' => $this->welcome_model->get_nama_merk($id_kategori),
        );
        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        $this->load->view('template/header', $data);
        $this->load->view('mobil_kategori', $data);
        $this->load->view('template/footer', $data);
    }
}
