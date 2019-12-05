<?php
class News extends CI_Controller {

        // Loads parent controller methods, our models, and url_helper which contains useful methods for views
        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        // Sets title and calls the view's get_news method that displays news 
        // Also loads all views
        public function index()
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }

        // Loads specific clicked article
        public function view($slug = NULL)
        {
                $data['news_item'] = $this->news_model->get_news($slug);

                if (empty($data['news_item']))
                {
                        show_404();
                }
        
                $data['title'] = $data['news_item']['title'];
        
                $this->load->view('templates/header', $data);
                $this->load->view('news/view', $data);
                $this->load->view('templates/footer');
        }

        // Create form
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
        
            $data['title'] = 'Create a news item';
        
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');
        
            // Check if form submitted and did not pass validation
            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');
        
            }
            // Load on success at news/success
            else
            {
                $this->news_model->set_news();
                $this->load->view('news/success');
            }
        }
}