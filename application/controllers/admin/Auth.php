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
        $this->load->view('admin/auth');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->pengguna->cek_login($username, $password);
        if ($user) {
            $this->session->set_userdata('useradmin', $user->nama);

            if ($user->level == 'admin') {
                redirect('admin/dashmin');
            } else {
                $this->session->set_flashdata('error', '<div
                class="alert alert-danger
                    alert-dismissible fade show" role="alert">
                    Level Tidak Valid!
                </div>');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('error', '<div
                class="alert alert-danger
                    alert-dismissible fade show" role="alert">
                    Username atau Password yang anda masukkan salah!
                </div>');
            redirect('admin/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('useradmin');
        redirect('admin/auth');
    }
}
