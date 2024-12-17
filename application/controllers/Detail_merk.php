<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Detail_merk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('merk_model');
        $this->load->model('welcome_model');
    }

    public function merk($id_merk)
    {
        $data = array(
            'judul' => 'Carbook - Car',
            'mobil' => $this->merk_model->get_berdasar_merk($id_merk),
            'footer' => $this->welcome_model->footer(),
            'konfigurasi' => $this->welcome_model->get_konfigurasi(),
            'data' => $this->welcome_model->ambil(),// Ambil hanya 5 item pertama
            'nama_merk' => $this->welcome_model->ambil_nama_merk($id_merk),
        );
        $this->load->view('template/header', $data);
        $this->load->view('daftar_mobil', $data);
        $this->load->view('template/footer', $data);
    }
}
