<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inden_model');
    }
    public function index($id)
    {
        // var_dump($id);
        // die;
        // $data = array(
        //     'data_inden' => $this->inden_model->inden($id)
        // );
        // $this->load->view('inden',$data);
    }

    public function inden($id)
    {
        $cek = $this->inden_model->inden($id);
        $this->session->set_userdata('inden', $cek->id_konten);
        $data['data_inden'] = $cek;
        // echo "<pre>";
        // print_r($ce);
        // echo "</pre>";
        $this->load->view('inden', $data);
    }

    public function sdank()
    {
        $this->load->view('sdank');
    }

    public function kembali()
    {
        $id = $this->session->userdata('inden'); // Mengambil ID dari session
        if ($id) {
            redirect('pesan/inden/' . $id); // Sertakan ID dalam URL
        } else {
            // Handle jika $id kosong atau null
            redirect('pesan/inden'); // Redirect tanpa parameter
        }
    }

    public function sekarang()
    {
        $data = array(
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'kontak_pemesan' => $this->input->post('kontak_pemesan'),
            'email' => $this->input->post('email'),
            'tanggal' => date('y-m-d'),
            'waktu' => date('H:i:s'), // Mengisi waktu dengan jam:menit:detik saat ini
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'nama_mobil' => $this->input->post('nama_mobil'),
            'merk' => $this->input->post('merk'),
            'kategori' => $this->input->post('kategori'),
            'status_inden' => 'diinden'
        );
        // var_dump($data);
        // die;
        $id_inden = $this->inden_model->simpan($data);
        redirect('pesan/nota/' . $id_inden);
    }

    public function nota($id_inden)
    {
        // var_dump($id_inden);
        // die;
        $data = array(
            'inden' => $this->inden_model->ambil_inden($id_inden)
        );
        // var_dump($data);
        // die;
        $this->load->view('nota', $data);
    }

    public function konfirmasi($id_inden)
    {
        $inden = $this->inden_model->konfirmasi($id_inden);
        // var_dump($inden);
        // die;
        if ($inden) {
            $this->inden_model->update_status_inden($id_inden, 'diinden');
            $cek = $this->inden_model->update_status_konten($inden->nama_mobil, 'diinden');
            // var_dump($cek);
            // die;
            $this->session->set_flashdata('success', 'Mobil Berhasil Anda Inden, Jangan Lupa Datang Sesuai Jadwal Kunjungan');
            redirect('');
        }
    }

    public function batal($id_inden)
    {
        if ($this->inden_model->hapus_inden($id_inden)) {
            $this->session->set_flashdata('success', 'Inden berhasil Kengsel!');
        } else {
            $this->session->set_flashdata('error', 'Inden gagal dikengsel');
        }
        redirect('');
    }
}
