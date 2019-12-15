<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mpenjualan extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($tgl, $kode, $jumlah, $satuan, $harga){   
    $data = array(
        'tanggal'=>$tgl,
        'kodebarang'=>$kode,
        'jumlah'=>$jumlah,
        'hargasatuan'=>$satuan,
        'totalharga'=>$harga
    );    
    $query = $this->db->insert('penjualan', $data);
    
    return $query;
    }
    
    function tampilkan(){
         
        $query = $this->db->get('penjualan');
        return $query->result();    
        
    }
    
    function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('penjualan');
        return $query->result();   
        
    }
    
    function hapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('penjualan');
        return $query;
    }
    
    
   function perbarui($tgl, $kode, $jumlah, $satuan, $harga, $id){   
    $data = array(
        'tanggal'=>$tgl,
        'kodebarang'=>$kode,
        'jumlah'=>$jumlah,
        'hargasatuan'=>$satuan,
        'totalharga'=>$harga
    );    
        $this->db->where('id', $id);
        return $this->db->update('penjualan', $data); 
    
    }
    
    
}
