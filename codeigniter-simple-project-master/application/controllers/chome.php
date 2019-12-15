<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chome extends CI_Controller {

    public function __construct()
   {
      parent::__construct();
      
     $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
     $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
     $this->output->set_header('Pragma: no-cache');
     $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
     
      $this->load->library('cfpdf');
      $this->load->model('madmin');
      $this->load->model('mbarang');
      $this->load->model('mpenjualan');
    
   }

	public function index()
	{
            if ($this->session->userdata('login') == TRUE){
            $data['barang']= $this->mbarang->tampilkan();  
            $isi =  $this->template->display('admin/content/vdatabarang',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function databarang()
	{
            if ($this->session->userdata('login') == TRUE){
            $data['barang']= $this->mbarang->tampilkan();    
            $isi =  $this->template->display('admin/content/vdatabarang',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function dataadmin()
	{ 
            
        if ($this->session->userdata('login') == TRUE){
            $data['admin']= $this->madmin->tampilkan();  
            $isi =  $this->template->display('admin/content/vdataadmin',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function datapenjualan()
	{
            
        if ($this->session->userdata('login') == TRUE){
            $data['penjualan']= $this->mpenjualan->tampilkan();   
            $isi =  $this->template->display('admin/content/vdatapenjualan',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function tambahpenjualan()
	{
            
        if ($this->session->userdata('login') == TRUE){
            $isi =  $this->template->display('admin/content/vtambahpenjualan');
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function editpenjualan()
	{
            
        if ($this->session->userdata('login') == TRUE){
            $data['penjualan'] = $this->mpenjualan->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/vtambahpenjualan',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function tambahbarang()
	{ 
            
        if ($this->session->userdata('login') == TRUE){
            $isi =  $this->template->display('admin/content/vtambahbarang');
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}

        public function editbarang()
	{ 
            
        if ($this->session->userdata('login') == TRUE){
            $data['barang'] = $this->mbarang->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/vtambahbarang',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
        public function tambahadmin()
	{
            
        if ($this->session->userdata('login') == TRUE){
            $isi =  $this->template->display('admin/content/vtambahadmin');
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}

        public function editadmin()
	{
            
        if ($this->session->userdata('login') == TRUE){
            $data['admin'] = $this->madmin->get_by_id($this->uri->segment(3));
            $isi =  $this->template->display('admin/content/vtambahadmin',$data);
            $this->load->view('admin/vutama',$isi);
            } else { redirect('clogin'); }
	}
        
    public function laporanpenjualan(){
        
    if ($this->session->userdata('login') == TRUE){
        
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(45);
        $pdf->Cell(100,0,'Laporan Data Penjualan',0,0,'C');
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',10);
        $pdf->SetFillColor(100,0,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0,0,0);
        $header = array('No', 'Tanggal', 'Kode Barang', 'Jumlah', 'Harga Satuan', 'Total Harga');
        // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(8, 35, 27, 45, 40, 35);
        for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $pdf->Ln();
        // Data
        $fill = false;
        $pdf->SetFillColor(224,235,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
    foreach ($this->mpenjualan->tampilkan() as $row):
        $pdf->Cell($w[0],6,$row->id,'LR',0,'L',$fill); 
        $pdf->Cell($w[1],6,$row->tanggal,'LR',0,'L',$fill);
        $pdf->Cell($w[2],6,$row->kodebarang,'LR',0,'L',$fill);
        $pdf->Cell($w[3],6,$row->jumlah,'LR',0,'L',$fill);
        $pdf->Cell($w[4],6,$row->hargasatuan,'LR',0,'L',$fill);
        $pdf->Cell($w[5],6,$row->totalharga,'LR',0,'L',$fill);
        $pdf->Ln();
        $fill = !$fill;
    endforeach;
    $pdf->Cell(array_sum($w),0,'','T');
        
        $pdf->Output();
        
    } else { redirect('clogin'); }
    }
    
}
