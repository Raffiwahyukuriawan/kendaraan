<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna');
    }
    public function index()
    {
        $this->load->view('auth');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->pengguna->cek_login($username, $password);
        // var_dump($user);
        // die;
        if ($user) {
            $this->session->set_userdata('user', $user->nama);
            $this->session->set_userdata('foto_user', $user->foto_user);
            $this->session->set_userdata('email', $user->email);
            // $cek = $this->session->userdata('email');
            // var_dump($cek);
            // die;
            if ($user->level == 'user') {
                redirect('welcome');
            } else {
                $this->session->set_flashdata('error', 'Level Tidak Valid');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', '<div
            class="alert alert-danger
                alert-dismissible fade show" role="alert">
                Username dan Password yang anda masukkan salah!
            </div>');
            redirect('auth');
        }
    }
}
