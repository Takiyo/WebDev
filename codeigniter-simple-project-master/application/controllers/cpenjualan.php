<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cpenjualan extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mpenjualan');
    
   }
	
	public function tambah()
	{
            $tgl = $this->input->post('tanggal');
            $kode = $this->input->post('kode');
            $jumlah = $this->input->post('jumlah');
            $hsatuan = $this->input->post('hsatuan');
            $tharga = $this->input->post('tharga');
    
            if ($this->input->post('tanggal')==''){
                echo "<script>alert('Ups, Tanggal Masih Kosong !'); history.go(-1);</script>";   
            }else if ($this->input->post('kode')==''){
                echo "<script>alert('Ups, Kode Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('jumlah')==''){
                echo "<script>alert('Ups, Jumlah Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('hsatuan')==''){
                echo "<script>alert('Ups, Harga Satuan Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('tharga')==''){
                echo "<script>alert('Ups, Total Harga Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mpenjualan->simpan($tgl, $kode, $jumlah, $hsatuan, $tharga);
                   if ($result){
                   echo "<script>alert('Data Penjualan Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
        
        public function perbarui()
	{
            $id = $this->input->post('id');
            $tgl = $this->input->post('tanggal');
            $kode = $this->input->post('kode');
            $jumlah = $this->input->post('jumlah');
            $hsatuan = $this->input->post('hsatuan');
            $tharga = $this->input->post('tharga');
    
            if ($this->input->post('tanggal')==''){
                echo "<script>alert('Ups, Tanggal Masih Kosong !'); history.go(-1);</script>";   
            }else if ($this->input->post('kode')==''){
                echo "<script>alert('Ups, Kode Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('jumlah')==''){
                echo "<script>alert('Ups, Jumlah Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('hsatuan')==''){
                echo "<script>alert('Ups, Harga Satuan Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('tharga')==''){
                echo "<script>alert('Ups, Total Harga Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->mpenjualan->perbarui($tgl, $kode, $jumlah, $hsatuan, $tharga, $id);
                   if ($result){
                   echo "<script>alert('Data Penjualan Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
 
        function delete(){
            
        $this->mpenjualan->hapus($this->uri->segment(3));
        
        redirect('chome/datapenjualan');    

    }
}
