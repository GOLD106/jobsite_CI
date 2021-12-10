<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller        # upgrade maksimU for whitelabel using MY_Controller
{

    public $data;

    public function __construct()
    {

        parent::__construct();
        error_reporting(0);
        $this->data['theme'] = 'teamcollab';
        $this->data['module'] = 'home';
        $this->data['page'] = '';
        $this->data['base_url'] = base_url();
        $this->data['base_uri'] = $_SERVER['HTTP_HOST'];
        
        $this->load->model('home_model', 'home');
        $this->load->model('Api_model', 'api');
        $this->load->model('Stripe_model');

        $this->user_latitude = (!empty($this->session->userdata('user_latitude'))) ? $this->session->userdata('user_latitude') : '';
        $this->user_longitude = (!empty($this->session->userdata('user_longitude'))) ? $this->session->userdata('user_longitude') : '';

        $this->currency = settings('currency');
        $this->load->library('ajax_pagination');
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
    public function index()
    {
        $this->data['page'] = 'landing';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function about_us()
    {
        $this->data['page'] = 'about_us';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function employee_time_clock()
    {
        $this->data['page'] = 'emp_time_clock';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function employee_scheduling()
    {
        $this->data['page'] = 'employee_scheduling';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function digital_form()
    {
        $this->data['page'] = 'digital_form';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function task_management()
    {
        $this->data['page'] = 'task_management';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function employee_communication()
    {
        $this->data['page'] = 'employee_communication';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function client_management()
    {
        $this->data['page'] = 'client_management';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function pricing() {    
        $this->data['page'] = 'pricing';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function customers() {
        $this->data['page'] = 'customers';
        $this->data['module'] = 'home';             
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    

    
    
    
}
    
   

    

    


   
    

  
