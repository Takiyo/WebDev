<?php
class Product_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_product($name = FALSE)
        {
                // If no name passed in, get all tables from 'lab_products'
                if ($name === FALSE)
                {
                        $query = $this->db->get('lab_products');
                        return $query->result_array();
                }

                $query = $this->db->get_where('lab_products', array('test2' => $name));
                return $query->row_array();
        }

        public function set_product()
        {
                $this->load->helper('url');

                // Url_title sanitizes url and makes sure all are lowercase
                //$slug = url_title($this->input->post('title'), 'dash', TRUE);

                // Post() sanitizes data before we insert
                $data = array(
                        'test2' => $this->input->post('test2'),
                        'test3' => $this->input->post('test3'),
                        'test4' => $this->input->post('test4')
                );

                return $this->db->insert('lab_products', $data);
        }
}