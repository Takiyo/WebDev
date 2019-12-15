<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cadmin extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('madmin');
    
   }
	
	public function tambah()
	{
            $user = $this->input->post('user');
            $pass = $this->input->post('pass');
    
            if ($this->input->post('user')==''){
                echo "<script>alert('Ups, Username Masih Kosong !'); history.go(-1);</script>";   
            }else if ($this->input->post('pass')==''){
                echo "<script>alert('Ups, Password Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->madmin->simpan($user, $pass);
                   if ($result){
                   echo "<script>alert('Data Admin Berhasil disimpan !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
        
        public function perbarui()
	{
            $id = $this->input->post('id');
            $user = $this->input->post('user');
            $pass = $this->input->post('pass');
    
            if ($this->input->post('user')==''){
                echo "<script>alert('Ups, Username Masih Kosong !'); history.go(-1);</script>";   
            }else if ($this->input->post('pass')==''){
                echo "<script>alert('Ups, Password Masih Kosong !'); history.go(-1);</script>";   
            }
            else {
                    // Simpan Data
                   $result = $this->madmin->perbarui($id, $user, $pass);
                   if ($result){
                   echo "<script>alert('Data Admin Berhasil diperbarui !'); history.go(-1)</script>";    
                   } else {
                    echo "<script>alert('Ups, Sepertinya ada Kesalahan :( !'); history.go(-1)</script>";   

                   }   

            }
	}
 
        function delete(){
            
        $this->madmin->hapus($this->uri->segment(3));
        
        redirect('chome/dataadmin');    

    }
}
