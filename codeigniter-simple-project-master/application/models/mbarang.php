<?php if (!defined('BASEPATH')) exit ('No Direct Script Access Allowed');

class mbarang extends CI_Model{
    
    
    function __construct() {
        parent::__construct();
    }
    
    function simpan($kode, $nama, $jumlah, $satuan, $harga){   
    $data = array(
        'kode'=>$kode,
        'nama'=>$nama,
        'jumlah'=>$jumlah,
        'satuan'=>$satuan,
        'harga'=>$harga
    );    
    $query = $this->db->insert('barang', $data);
    
    return $query;
    }
    
    function tampilkan(){
         
        $query = $this->db->get('barang');
        return $query->result();    
        
    }
    
    function get_by_id($id){
        $this->db->where('id', $id);
        $query = $this->db->get('barang');
        return $query->result();   
        
    }
    
    function hapus($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('barang');
        return $query;
    }
    
    
     function perbarui($kode, $nama, $jumlah, $satuan, $harga, $id){   
     
         $data = array(
        'kode'=>$kode,
        'nama'=>$nama,
        'jumlah'=>$jumlah,
        'satuan'=>$satuan,
        'harga'=>$harga
    );    
        $this->db->where('id', $id);
        return $this->db->update('barang', $data); 
    
    }
    
    
}
