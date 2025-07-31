<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Picqer\Barcode\BarcodeGeneratorPNG;

class Barcode extends CI_Controller {

    public function __Construct() {
		parent::__construct();
		$this->own_link = admin_url('qrcode');
        $this->load->database(); // Load MySQL db config
	}

    public function index()
    {
        $data['title'] = 'QR CODE';

        // Ambil semua data dari tabel qr_data
        $query = $this->db->get('qr_data');
        $data['datatable'] = $query->result_array();

        // Load view dengan data
        $this->template->_v('qrcode/index', $data);
    }

    public function create()
    {
        $data['title'] = 'QR GENERATE';
        // Ambil data item dari private function
        $data['items'] = $this->getKarkasBroilerAItems();
        // dd($data['items']);
        // Kirim data ke view
        $this->template->_v('qrcode/create', $data);
    }

    public function generate()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();

            // Load helper jika perlu
            $this->load->helper('date');

            try {
                $code = $post['code'] ?? null;
                $item = $post['item'] ?? null;
                $prod = $post['prod'] ?? null;
                $exp  = $post['exp'] ?? null;

                if (!$code || !$item || !$prod || !$exp) {
                    throw new Exception("Data input tidak lengkap.");
                }

                // Format data untuk QR Code
                $qr_content = "Item: {$item}\nProd: {$prod}\nExp: {$exp}";

                $qr = new QrCode($qr_content);
                $qr->setSize(300);
                $qr->setMargin(10);
                $qr->setForegroundColor(['r' => 255, 'g' => 0, 'b' => 0]); // Warna merah

                $filename = 'qr_' . time() . '.png';
                $path = FCPATH . 'uploads/' . $filename;

                // Simpan QR ke file
                file_put_contents($path, $qr->writeString());

                // Format tanggal ke Y-m-d
                $prod_date = date('Y-m-d', strtotime(str_replace('/', '-', $prod)));
                $exp_date  = date('Y-m-d', strtotime(str_replace('/', '-', $exp)));

                // Cek apakah data sudah ada berdasarkan 'code'
                $this->db->where('code', $code);
                $existing = $this->db->get('qr_data')->row();

                $data = [
                    'code'        => $code,
                    'item'        => $item,
                    'prod_date'   => $prod_date,
                    'exp_date'    => $exp_date,
                    'qr_filename' => $filename
                ];

                if ($existing) {
                    // Update data
                    $this->db->where('code', $code);
                    $update = $this->db->update('qr_data', $data);
                    if (!$update) {
                        throw new Exception("Gagal update data QR.");
                    }
                } else {
                    // Insert data baru
                    $insert = $this->db->insert('qr_data', $data);
                    if (!$insert) {
                        throw new Exception("Gagal simpan data QR.");
                    }
                }

                $this->session->set_flashdata('success', 'Data QR Code berhasil disimpan.');
                redirect('dashboard/qr-code');

            } catch (Exception $e) {
                log_message('error', $e->getMessage());
                $this->session->set_flashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
                redirect('dashboard/qr-code');
            }
        }

        $this->session->set_flashdata('error', 'Akses tidak valid.');
        redirect('dashboard/qr-code');
    }

    public function barcode()
    {
        $data['title'] = 'BARCODE';

        // Ambil semua data dari tabel qr_data
        $query = $this->db->get('barcode_data');
        $data['datatable'] = $query->result_array();

        // Load view dengan data
        $this->template->_v('barcode/index', $data);
    }

    public function create_barcode()
    {
        $data['title'] = 'BARCODE GENERATE';
        // Ambil data item dari private function
        $data['items'] = $this->getKarkasBroilerAItems();
        // dd($data['items']);
        // Kirim data ke view
        $this->template->_v('barcode/create', $data);
    }

    public function generate_barcode()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $post = $this->input->post();

            $code = $post['code'] ?? null;
            $item = $post['item'] ?? null;
            $prod = $post['prod'] ?? null;
            $exp  = $post['exp'] ?? null;

            if (!$code || !$item || !$prod || !$exp) {
                $this->session->set_flashdata('error', 'Data input tidak lengkap.');
                redirect('dashboard/barcode');
            }

            try {
                $generator = new BarcodeGeneratorPNG();

                // Generate barcode PNG data (format CODE 128)
                $barcodeData = $generator->getBarcode($code, $generator::TYPE_CODE_128);

                $filename = 'barcode_' . time() . '.png';
                $path = FCPATH . 'uploads/' . $filename;

                // Simpan barcode ke file
                file_put_contents($path, $barcodeData);

                // Simpan data ke DB (sesuaikan kolom di tabelmu)
                $prod_date = date('Y-m-d', strtotime(str_replace('/', '-', $prod)));
                $exp_date  = date('Y-m-d', strtotime(str_replace('/', '-', $exp)));

                $data = [
                    'code'        => $code,
                    'item'        => $item,
                    'prod_date'   => $prod_date,
                    'exp_date'    => $exp_date,
                    'barcode_filename' => $filename
                ];

                $this->db->where('code', $code);
                $existing = $this->db->get('barcode_data')->row();

                if ($existing) {
                    $this->db->where('code', $code);
                    $this->db->update('barcode_data', $data);
                } else {
                    $this->db->insert('barcode_data', $data);
                }

                $this->session->set_flashdata('success', 'Barcode berhasil disimpan.');
                redirect('dashboard/barcode');

            } catch (Exception $e) {
                log_message('error', $e->getMessage());
                $this->session->set_flashdata('error', 'Error saat generate barcode: ' . $e->getMessage());
                redirect('dashboard/barcode');
            }
        }

        $this->session->set_flashdata('error', 'Akses tidak valid.');
        redirect('dashboard/barcode');
    }

    private function getKarkasBroilerAItems()
    {
        return [
            [
                'item' => 'Karkas Broiler A - 800-899',
                'code' => '860201003',
            ],
            [
                'item' => 'Karkas Broiler A - 900-999',
                'code' => '860201004',
            ],
            [
                'item' => 'Karkas Broiler A - 1000-1099',
                'code' => '860201005',
            ],
            [
                'item' => 'Karkas Broiler A - 1500-1599',
                'code' => '860201010',
            ],
        ];
    }
}
