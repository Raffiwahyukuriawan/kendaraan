<?php defined('BASEPATH') OR exit ('gak oleh mlebu');

class Blog extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('welcome_model');
    }


    public function index()
    {

    }

    public function blog($id_blog)
    {
        // $cek = $this->session->userdata('user');
        $data = array(
            'judul' => 'Carbook | Blog',
            'blog' => $this->welcome_model->get_blog($id_blog),
            'footer' => $this->welcome_model->footer(),
            'data' => array_slice($this->welcome_model->ambil(), 0, 5), // Ambil hanya 5 item pertama
			'konfigurasi' => $this->welcome_model->get_konfigurasi(),

        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
        $this->load->view('template/header',$data);
        $this->load->view('blog',$data);
        $this->load->view('template/footer',$data);
    }
}