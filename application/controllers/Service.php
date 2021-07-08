<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        notlogin();
        $this->load->model(['service_m','user_m']);
    }

    public function service_data()
    {
        $data['row'] = $this->service_m->get();
        $this->template->load('template','service/service_in/service_data',$data);
    }

    public function serviceIn_add()
    {   
        $service = new stdClass();
        $service->service_id = NULL;
        $service->customer = NULL;
        $service->no_telp = NULL;
        $service->perangkat = NULL;
        $service->keluhan = NULL;
        $service->status = NULL;
        $service->keterangan = NULL;
        $service->harga = NULL;
        $service->jasa = NULL;
        
        $data = [
            'page' => 'add',
            'row' => $service
        ];
        $this->template->load('template','service/service_in/service_add', $data);
    }

    public function edit($id){
        $query = $this->service_m->get($id);
        if($query->num_rows() > 0){
            $service = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $service
            );
            $this->template->load('template','service/service_in/service_add', $data);
        }else{
            echo "<script>alert('Data Tidak Dserviceukan!')
            window.location = '".site_url('service')."'</script>";
        }
    }


    public function delete()
    {
        $id = $this->input->get('service_id');
        $this->service_m->delete($id);
        if($this->db->affected_rows() > 0 ){
            redirect('service/in');
        }
            
    }

    public function process()
    {
        $post = $this->input->post(NULL, TRUE);
        if(isset($_POST['add'])){
            $this->service_m->addService($post);
        }else if(isset($_POST['edit'])){
            $this->service_m->edit($post);
        }
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan!');
            redirect('service/in');
            }   
    }

    public function cetakTiket()
    {
        $post = new stdClass();
        $post->customer = $this->input->post('customer');
        $post->perangkat = $this->input->post('perangkat');
        $post->notelp = $this->input->post('noTelp');
        $post->keluhan = $this->input->post('keluhan');
        $post->admin = $this->input->post('admin');
        $data = [
            'row' => $post
        ];
        $this->load->view('service/service_in/tiket.php',$data);
    }
  /*  public function cetak_struk() {
        // me-load library escpos
        $this->load->library('escpos');

        // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector("printer a");

        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);

        // membuat fungsi untuk membuat 1 baris tabel, agar dapat dipanggil berkali-kali dgn mudah
        function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 12;
            $lebar_kolom_2 = 8;
            $lebar_kolom_3 = 8;
            $lebar_kolom_4 = 9;

            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
            $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);

            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
            $kolom4Array = explode("\n", $kolom4);

            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));

            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();

            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
                $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);

                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
            }

            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode($hasilBaris) . "\n";
        }   

        // Membuat judul
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_HEIGHT); // Setting teks menjadi lebih besar
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER); // Setting teks menjadi rata tengah
        $printer->text("DMX STORY 4\n");
        $printer->text("\n");

        // Data transaksi
        $printer->initialize();
        $printer->text("Kasir : Badar Wildanie\n");
        $printer->text("Waktu : 13-10-2019 19:23:22\n");

        // Membuat tabel
        $printer->initialize(); // Reset bentuk/jenis teks
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom("Barang", "qty", "Harga", "Subtotal"));
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom("Makaroni 250gr", "2pcs", "15.000", "30.000"));
        $printer->text(buatBaris4Kolom("Telur", "2pcs", "5.000", "10.000"));
        $printer->text(buatBaris4Kolom("Tepung terigu", "1pcs", "8.200", "16.400"));
        $printer->text("----------------------------------------\n");
        $printer->text(buatBaris4Kolom('', '', "Total", "56.400"));
        $printer->text("\n");

         // Pesan penutup
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text("Terima kasih telah berbelanja\n");
        $printer->text("http://badar-blog.blogspot.com\n");

        $printer->feed(5); // mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)
        $printer->close();
    } */
}

