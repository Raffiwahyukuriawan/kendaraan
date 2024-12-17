<?php defined('BASEPATH') or exit('gak oleh mlebu');

class Mobil_inden extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('inden_model');
		$this->load->model('welcome_model');
		$this->load->model('pengguna');
		$this->load->library('tcpdf');
		if (!$this->session->userdata('useradmin')) {
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

		$aa = array(
			'judul_halaman' => 'Halaman Daftar Mobil Diinden',
			'alamat1' 		=> 'Dashboard',
			'alamat2'		=> 'Mobil Inden',
			'status'          => $this->inden_model->get(),
			'user' => $this->welcome_model->get_foto($cek->nama),
		);

		$this->load->view('admin/template/header', $aa);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mobil_inden', $aa);
		$this->load->view('admin/template/footer');
	}

	public function hapus($id)
	{
		if ($this->inden_model->hapus($id)) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus');
		}
		redirect('admin/mobil_inden');
	}

	public function generate_pdf()
	{
		// Ambil data kas buku
		$data['inden'] = $this->inden_model->get_all_data();

		// Membuat objek PDF
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// Set informasi dokumen
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Nama Anda');
		$pdf->SetTitle('Data Inden Mobil');
		$pdf->SetSubject('Laporan Inden Mobil');
		$pdf->SetKeywords('inden, mobil, pdf, laporan');

		// Set margin
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// Tambahkan halaman baru
		$pdf->AddPage();

		// Konten HTML untuk ditampilkan dalam PDF
		$html = '<h1>Laporan Inden Mobil</h1>';
		$html .= '<table border="1" cellpadding="5">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Tanggal</th>
							<th>Waktu</th>
                            <th>Status</th>
                            <th>Nama Mobil</th>
							<th>Merk</th>
                            <th>Kategori</th>
                            <th>Nama Pemesan</th>
							<th>Tanggal Kunjungan</th>
                            <th>No Telephon</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>';

		// Isi tabel dengan data kas buku
		$no = 1;
		foreach ($data['inden'] as $row) {
			$html .= '<tr>
                        <td>' . $no++ . '</td>
                        <td>' . $row->tanggal . '</td>
                        <td>' . $row->waktu . '</td>
                        <td>' . $row->status_inden . '</td>
                        <td>' . $row->nama_mobil . '</td>
                        <td>' . $row->merk . '</td>
                        <td>' . $row->kategori . '</td>
                        <td>' . $row->nama_pemesan . '</td>
                        <td>' . $row->tanggal_kunjungan . '</td>
                        <td>' . $row->kontak_pemesan . '</td>
                        <td>' . $row->email . '</td>
                      </tr>';
		}

		$html .= '</tbody></table>';

		// Tulis HTML ke dalam PDF
		$pdf->writeHTML($html, true, false, true, false, '');

		// Output file PDF
		$pdf->Output('Laporan_Inden_Mobil.pdf', 'I');
	}
}
