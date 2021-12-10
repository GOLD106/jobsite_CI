<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

   public $data;
 
   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'subscribe';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('JobModel','jobmodel');

        $this->user_latitude=(!empty($this->session->userdata('user_latitude')))?$this->session->userdata('user_latitude'):'';
        $this->user_longitude=(!empty($this->session->userdata('user_longitude')))?$this->session->userdata('user_longitude'):'';

        $this->currency= settings('currency');

        $this->load->library('ajax_pagination'); 
        $this->perPage = 12; 
         
    }

    
    public function index()

    {
        
        $this->data['page'] = 'index'; 
        
      //  $this->data['job_list']= $this->jobmodel->get_job_list();  
           
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    

    

      
   
}
