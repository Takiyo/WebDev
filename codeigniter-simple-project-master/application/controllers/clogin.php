<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clogin extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      $this->load->model('mlogin');
    
   }

	public function index()
	{
            $data['error']='';
            $this->load->view('vlogin',$data);
	}
        
         // Proses Login
    function masuk(){
    
    $user = $this->input->post('username');
    $pass = $this->input->post('password');
    
    // Cek Inputan Username dan Password
    if (empty($user) || empty($pass)) {
    $data['error']='Username atau Password Kosong!';
    $this->load->view('vlogin',$data);
    } else {
    $password = sha1($pass);    
    // Jika Sudah Terisi Kirim Parameter Username ke Model Login
    $result = $this->mlogin->login($user, $password);
    if ($result){
    // Simpan Session Username 
    $data = array('user_name' => $result->user, 'login' => TRUE);
    $this->session->set_userdata($data);
    redirect('chome');
    
    } else {
    $password = sha1($pass);    
    // Jika Sudah Terisi Kirim Parameter Username ke Model Login
    $result = $this->mlogin->login($user, $password);
    if ($result){
    // Simpan Session Username 
    $data = array('user_name' => $result->user, 'login' => TRUE);
    $this->session->set_userdata($data);
    redirect('chome');
    
    } else {
    $data['error']='Username atau Password Salah!';
    $this->load->view('vlogin',$data);    
    }
    
    
    } // End Jika Pada Tabel User Tidak Ketemu
    } // End else Jika Inputan Valid
    } // End Fungsi

    // Logout
    function logout(){
    $this->session->unset_userdata($data);
    $this->session->sess_destroy();  
    redirect('clogin');
    
    }
        
      
}
