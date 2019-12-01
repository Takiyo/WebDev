<?php
class Forms extends CI_Controller {

        // Loads parent controller methods, our models, and url_helper which contains useful methods for views
        public function __construct()
        {
                parent::__construct();
                $this->load->model('product_model');
                // $this->load->model('tools_model');
                // $this->load->model('electronics_model');
                $this->load->helper('url_helper'); //helps 
        }

        // Sets title and calls the view's get_product method that displays product 
        // Also loads all views
        public function index()
        {
                $data['product'] = $this->product_model->get_product();
                $data['title'] = 'Product';

                $this->load->view('templates/header', $data);
                $this->load->view('forms/index', $data);
                $this->load->view('templates/footer');
        }

        // Loads specific clicked article
        public function view($slug = NULL)
        {
                $data['product_item'] = $this->product_model->get_product($slug);

                // if (empty($data['product_item']))
                {
                        show_404();
                }
        
                $data['title'] = $data['product_item']['title'];
        
                $this->load->view('templates/header', $data);
                $this->load->view('forms/view', $data);
                $this->load->view('templates/footer');
        }

        // Creates form and validates data.
        //TODO add parameters for product types
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
        
            $data['title'] = 'Submit a Product';
        
            // Params: input name attribute, human name for error display, validation rules sepparated by |. Can use any
            $this->form_validation->set_rules('toolsName', "Tool's name", 'is_string|max_length[50]');
            $this->form_validation->set_rules('toolsShipper', "Shipper", 'is_string|max_length[10]');
            $this->form_validation->set_rules('toolsWeight', "Weight", 'is_numeric');

            $this->form_validation->set_rules('electronicsName', "Electronics name", 'max_length[50]');
            $this->form_validation->set_rules('electronicsRecyclable', "Recylable", "trim");
        
            // Check if form submitted and did not pass validation
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('forms/create');
                $this->load->view('templates/footer');
        
            }
            // Load on success at forms/success
            else
            {
                $this->product_model->set_product();

                $this->load->view('templates/header', $data);
                $this->load->view('forms/success');
                $this->load->view('templates/footer');
            }
        }
}