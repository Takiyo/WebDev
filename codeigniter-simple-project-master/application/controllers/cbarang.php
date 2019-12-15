<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cbarang extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mbarang');
    
   }
	
	public function tambah()
	{
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $jumlah = $this->input->post('jumlah');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');
    
            if ($this->input->post('kode')==''){
                echo "<script>alert('Ups, Kode Masih Kosong !'); history.go(-1);</script>";   
            }else if ($this->input->post('nama')==''){
                echo "<script>alert('Ups, Nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('jumlah')==''){
                echo "<script>alert('Ups, Jumlah Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('satuan')==''){
                echo "<script>alert('Ups, Satuan Masih Kosong !'); history.go(-1);</script>";   
            } else if ($this->input->post('harga')==''){
                echo "<script>alert('Ups, Harga Masih Kosong !'); history.go(-1);</script>";   
            }
                    // Simpan Data
                   $result = $this->mbarang->simpan($kode, $nama, $jumlah, $satuan, $harga);
                   if ($result){
                   echo "<script>alert('Data Barang Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	
        
        public function perbarui()
	{
            $id = $this->input->post('id');
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $jumlah = $this->input->post('jumlah');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');
    
            if ($this->input->post('kode')==''){
                echo "<script>alert('Ups, Kode Masih Kosong !'); history.go(-1);</script>";   
            }else if ($this->input->post('nama')==''){
                echo "<script>alert('Ups, Nama Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('jumlah')==''){
                echo "<script>alert('Ups, Jumlah Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('satuan')==''){
                echo "<script>alert('Ups, Satuan Masih Kosong !'); history.go(-1);</script>";   
            }
            else if ($this->input->post('harga')==''){
                echo "<script>alert('Ups, Harga Masih Kosong !'); history.go(-1);</script>";   
            }
            // Simpan Data
                   $result = $this->mbarang->perbarui($kode, $nama, $jumlah, $satuan, $harga, $id);
                   if ($result){
                   echo "<script>alert('Data Barang Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	
 
        function delete(){
            
        $this->mbarang->hapus($this->uri->segment(3));
        
        redirect('chome/databarang');    

    }
}
