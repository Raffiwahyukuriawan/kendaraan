<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Dashtor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengguna');
        $this->load->model('dashmin_model');
        if (!$this->session->userdata('editor')) {
            redirect('editor/auth');
        }
    }

    public function index()
    {
        $nama = $this->session->userdata('editor');
        $user = $this->pengguna->get_id($nama);
        if ($user) {
            $data12['nama_user'] = $user->nama;
        } else {
            $data12['nama_user'] = 'Nama kamu siapa';
        }
        $judul = array(
            'judul_halaman'    => 'Halaman Dashboard-Editor',
            'alamat1'        => 'Dashboard',
            'alamat2'        => 'Dashboard',
            'jumlah_konten' => $this->dashmin_model->hitung_konten(),
            'registrasi' => $this->dashmin_model->hitung_user(),
            'komentar' => $this->dashmin_model->hitung_komen(),
            'pengunjung' => $this->session->userdata('pengunjung'),
            'komentarr' => $this->dashmin_model->ambil_komen(),
            'artikel' => $this->dashmin_model->get_konten(),
            'inden' => $this->dashmin_model->get_inden(),
            'bg_utama' => $this->dashmin_model->get_carousel(7),
            'messages' => $this->dashmin_model->get_komen(),
        );
        $this->load->view('editor/template/header', $judul);
        $this->load->view('editor/template/sidebar', $data12);
        $this->load->view('editor/dashtor', $judul);
        $this->load->view('editor/template/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('');
    }

    public function komentar()
    {
        $data = array(
            'nama' => $this->session->userdata('editor'),
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal' => date('y-m-d'),
            'waktu' => time(),
        );
        if ($this->dashmin_model->komentar($data)) {
            $this->session->set_flashdata('success', 'Berhasil Memberi Komentar');
        } else {
            $this->session->set_flashdata('error', 'Gagal Memberi Komentar');
        }
        redirect('editor/dashtor');
    }
}
