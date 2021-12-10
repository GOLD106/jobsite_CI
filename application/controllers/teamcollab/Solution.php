<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solution extends MY_Controller        # upgrade maksimU for whitelabel using MY_Controller
{
    public $data;

    public function __construct()
    {

        parent::__construct();
        error_reporting(0);
        $this->data['theme'] = 'teamcollab';
        $this->data['module'] = 'solution';
        $this->data['page'] = '';
        $this->data['base_url'] = base_url();
        $this->data['base_uri'] = $_SERVER['HTTP_HOST'];
       
        $this->perPage = 12;
        $this->data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name() ,
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->helper('form');
        $this->load->helper('user_timezone_helper');  
        $this->load->model('templates_model');      

    }

    /**
     *@ Vadim: Tazzer Group Team-Collabs Landing Page
    */
    public function cleaning()
    {
        $this->data['page'] = 'cleaning';
        $this->data['module'] = 'solution';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

   

    




}
