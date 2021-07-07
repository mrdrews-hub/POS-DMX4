<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RStock extends CI_Controller {


    public function __construct(){
		parent::__construct();
        notlogin();
		$this->load->model('RStock_m');
	}

	public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Barang Masuk Tanggal '.date('d-M-Y', strtotime($tgl));
                $url_cetak = 'RStock/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->RStock_m->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di RStock_m
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Barang Masuk Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'RStock/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->RStock_m->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di RStock_m
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'RStock/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->RStock_m->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di report_m
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Barang Masuk Hari Ini';
            $url_cetak = 'RStock/cetak';
            $transaksi = $this->RStock_m->view_all(); // Panggil fungsi view_all yang ada di RStock_m
        }

		$data['ket'] = $ket;
		$data['url_cetak'] = base_url('index.php/'.$url_cetak);
		$data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->RStock_m->option_tahun();
		$this->template->load('template','report/reportStock', $data);
	}

	public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Barang Masuk Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->RStock_m->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di RStock_m
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Barang Masuk Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->RStock_m->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di RStock_m
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Barang Masuk Tahun '.$tahun;
                $transaksi = $this->RStock_m->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di RStock_m
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Barang Masuk Hari Ini';
            $transaksi = $this->RStock_m->view_all(); // Panggil fungsi view_all yang ada di RStock_m
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

		ob_start();
		$this->load->view('report/printStock', $data);
		$html = ob_get_contents();
        ob_end_clean();

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output('Data Barang Masuk.pdf', 'I');
	}

}