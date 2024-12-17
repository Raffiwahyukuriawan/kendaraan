<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('komentar_model');
        $this->load->model('welcome_model');
        $this->load->model('pengguna');
        if(!$this->session->userdata('useradmin')) {
            redirect('admin/auth');
        }
    }
    public function index()
    {
        $nama = $this->session->userdata('useradmin');
        $cek = $this->pengguna->get_id($nama);
        if ($cek) {
            $data['nama_user'] = $cek->nama;
        } else {
            $data['nama_user'] = 'Nama Kamu Siapa?';
        }
        $judul = array(
            'judul_halaman' => 'Halaman Komentar',
            'alamat1'         => 'Dashboard',
            'alamat2'        => 'Komentar',
            'user' => $this->welcome_model->get_foto($cek->nama),
        );
        $data['komentar'] = $this->komentar_model->ambil();
        // var_dump($data);
        // die;
        $this->load->view('admin/template/header', $judul);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/komentarr',$data);
        $this->load->view('admin/template/footer');
    }

    public function hapus($id_komen)
    {
        // var_dump($id_komen);
        // die;
        if($this->komentar_model->hapus($id_komen)) {
            $this->session->set_flashdata('success','Komentar berhasil dihapus');
        } else {
            $this->session->set_flashdata('error','Komentar gagal dihapus');
        }
        redirect('admin/komentar');
    }
}
