<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('welcome_model');
        $this->load->model('komentar_model');
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
            'judul_halaman' => 'Halaman Message',
            'alamat1'         => 'Dashboard',
            'alamat2'        => 'Message',
            'user' => $this->welcome_model->get_foto($cek->nama),
        );
        $data['komentar'] = $this->komentar_model->ambil_pesan();
        // var_dump($data);
        // die;
        $this->load->view('admin/template/header', $judul);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/messagee',$data);
        $this->load->view('admin/template/footer');
    }

    public function hapus_pesan($id)
    {
        // var_dump($id_komen);
        // die;
        if($this->komentar_model->hapus_pesan($id)) {
            $this->session->set_flashdata('success','Message berhasil dihapus');
        } else {
            $this->session->set_flashdata('error','Message gagal dihapus');
        }
        redirect('admin/message');
    }
}
