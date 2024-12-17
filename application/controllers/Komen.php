<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Komen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('welcome_model');
        if (!$this->session->userdata('user')) {
            $this->session->set_flashdata('message', 'Untuk berkomentar anda harus login terlebih dahulu.');
            redirect('auth');
        }
    }

    public function komentar()
    {
        $nama_mobil = $this->input->post('judul');
        $data = array(
            'judul' => $nama_mobil,
            'nama' => $this->session->userdata('user'),
            'tanggal' => date('y-m-d'),
            'keterangan' => $this->input->post('keterangan'),
        );
        // var_dump($data);
        // die;
        $this->welcome_model->komentar($data);
        redirect('cari/cari');
    }
}