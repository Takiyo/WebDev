<?php
class Electronics_model extends Product_model {
    function __construct(){
        parent::__construct();
    }

    public function get_product($name = FALSE)
    {
            // If no name passed in, get all tables from 'product_db'
            if ($name === FALSE)
            {
                    $query = $this->db->get('product_db');
                    return $query->result_array();
            }
            
            if ($this->db->get_where('product_db', array('toolsName' => $name))){
                    $query = $this->db->get_where('product_db', array('toolsName' => $name));
            }
            else if ($this->db->get_where('product_db', array('electronicsName' => $name))){
                    $query = $this->db->get_where('product_db', array('electronicsName' => $name));
            }

            return $query->row_array();
    }

    public function set_product()
    {
            $this->load->helper('url');

            // Url_title sanitizes url and makes sure all are lowercase
            //$slug = url_title($this->input->post('title'), 'dash', TRUE);
            
            
            // Post() sanitizes data before we insert
            $data = array(
                    'toolsName' => $this->input->post('toolsName'),
                    'toolsShipper' => $this->input->post('toolsShipper'),
                    'toolsWeight' => $this->input->post('toolsWeight'),
                    'electronicsName' => $this->input->post('electronicsName'),
                    'electronicsRecyclable' => $this->input->post('electronicsRecyclable')
            );
            
            if ($data['electronicsRecyclable'] == "Yes"){
                    $data['electronicsRecyclable'] = 1;
            } else if ($data['electronicsRecyclable'] == "No"){
                    $data['electronicsRecyclable'] = 0;
            }

            return $this->db->insert('product_db', $data);
    }
}