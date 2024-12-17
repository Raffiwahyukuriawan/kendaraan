<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Auth extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna');
    }
    public function index()
    {
        $this->load->view('editor/auth');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $editor = $this->pengguna->cek_login($username, $password);

        if($editor) {
            $this->session->set_userdata('editor',$editor->nama);

            if ($editor->level == 'editor') {
                redirect('editor/dashtor');
            } else {
                $this->session->set_flashdata('error', 'Level Tidak Valid');
                redirect('editor/auth');
            } 
        } else {
            $this->session->set_flashdata('error', '<div
            class="alert alert-danger
                alert-dismissible fade show" role="alert">
                Username dan Password yang anda masukkan salah!
            </div>');
            redirect('editor/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('useradmin');
        redirect('editor/auth');
    }
}