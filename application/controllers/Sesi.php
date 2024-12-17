<?php defined('BASEPATH') OR exit ('gak oleh mlebu');

class Sesi extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('welcome_model');
    }

    public function index()
    {
        $cek = $this->session->userdata('user');
        $data = array(
            'inden' => $this->welcome_model->get_Inden($cek),
        );
        $this->load->view('sesi_saya',$data);
    }
}