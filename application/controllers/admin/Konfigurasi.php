<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Konfigurasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
        $this->load->model('welcome_model');
        if (!$this->session->userdata('useradmin')) {
            redirect('admin/auth');
        }
    }

    public function index()
    {
        $nama = $this->session->userdata('useradmin');
        $user = $this->konfigurasi_model->get_id($nama);
        if ($user) {
            $data2['nama_user'] = $user->nama;
        } else {
            $data2['nama_user'] = 'Nama Kamu Siapa';
        }

        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row();

        $data = array(
            'judul_halaman' => 'Halaman Konfigurasi',
            'alamat1'       => 'Dashboard',
            'alamat2'       => 'Konfigurasi',
            'konfig'        => $konfig,
            'user' => $this->welcome_model->get_foto($user->nama),
        );
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data2);
        $this->load->view('admin/konfigurasi', $data);
        $this->load->view('admin/template/footer');
    }

    public function update()
    {
        $where = array('id' => 2);
        $data = array(
            'video' => $this->input->post('video'),
            'deskripsi_1' => $this->input->post('deskripsi_1'),
            'deskripsi_2' => $this->input->post('deskripsi_2'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp')
        );
        if ($this->db->update('konfigurasi', $data, $where)) {
            $this->session->set_flashdata('success', 'Konfigurasi berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Konfigurasi gagal diupdate.');
        }
        redirect('admin/konfigurasi');
    }
}
