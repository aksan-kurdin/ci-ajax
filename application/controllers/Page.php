<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('My_model', 'm');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "CRUD CI-AJAX | xnCorner";
        $this->load->view('home', $data);
    }

    public function ambilData()
    {
        $dataBarang = $this->m->ambildata('tb_barang')->result();
        echo json_encode($dataBarang);
    }

    public function tambahdata()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        if ($kode_barang == '') {
            $result['pesan'] = "Kode barang harus diisi";
        } elseif ($nama_barang == '') {
            $result['pesan'] = "Nama barang harus diisi";
        } elseif ($harga == '') {
            $result['pesan'] = "Harga barang harus diisi";
        } elseif ($stok == '') {
            $result['pesan'] = "Stok barang harus diisi";
        } else {
            $result['pesan'] = "";

            $data = array(
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'stok' => $stok
            );

            $this->m->tambahdata($data, 'tb_barang');
        }
        echo json_encode($result);
    }

    function ambilId()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $databarang = $this->m->ambilId('tb_barang', $where)->result();

        echo json_encode($databarang);
    }

    public function ubahdata()
    {
        $id = $this->input->post('id');
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');

        if ($kode_barang === '') {
            $result['pesan'] = "Kode barang harus diisi";
        } elseif ($nama_barang === '') {
            $result['pesan'] = "Nama barang harus diisi";
        } elseif ($harga === '') {
            $result['pesan'] = "Harga barang harus diisi";
        } elseif ($stok === '') {
            $result['pesan'] = "Stok barang harus diisi";
        } else {
            $result['pesan'] = "";

            $where = array('id' => $id);

            $data = array(
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'harga' => $harga,
                'stok' => $stok
            );

            $this->m->updatedata($where, $data, 'tb_barang');
        }
        echo json_encode($result);
    }

    function hapusdata()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $this->m->hapusdata($where, 'tb_barang');
    }
}

/* End of file Page.php */
