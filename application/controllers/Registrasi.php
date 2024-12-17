<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Registrasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('registrasi_model');
    }

    public function index()
    {
        $this->load->view('registrasii');
    }

    public function registrasi()
    {
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path']    = 'AdminLTE-3.1.0/assets/foto_user/';
        $config['max_size']     = 2250 * 4000;
        $config['file_name']    = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if ($_FILES['foto_user']['size'] >= 2250 * 4000) {
            $this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h5><i class="icon fas fa-ban"></i> Alert!</h5>
					<strong>Ukuran Foto Terlalu Besar!</strong> upload ulang foto dengan ukuran kurang dari 500 KB.
				</div>
			');
            redirect('registrasi');
        } elseif (!$this->upload->do_upload('foto_user')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        $level = 'user';
        $data = array(
            'nama'    => $this->input->post('nama'),
            'username'      => $this->input->post('username'),
            'email'         => $this->input->post('email'),
            'password'      => md5($this->input->post('password')),
            'level'         => $level,
            'foto_user'     => $namafoto,
        );
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die;
        if ($this->registrasi_model->registrasi($data)) {
            $this->session->set_flashdata('success', 'Anda Berhasil Registrasi');
        } else {
            $this->session->set_flahdata('error', 'Registrasi Gagal');
        }
        redirect('auth');
    }
}
