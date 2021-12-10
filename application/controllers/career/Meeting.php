<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting extends CI_Controller {

   public $data;
 
   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'meeting';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('MeetingModel','meeting');

         $this->user_latitude=(!empty($this->session->userdata('user_latitude')))?$this->session->userdata('user_latitude'):'';
         $this->user_longitude=(!empty($this->session->userdata('user_longitude')))?$this->session->userdata('user_longitude'):'';

         $this->currency= settings('currency');

         $this->load->library('ajax_pagination'); 
         $this->perPage = 12; 
         
    }

    
    public function index()
    {
        
        $this->data['page'] = 'index';    
           
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function contact_info() {
      $this->data['page'] = 'contact_info';       
      $business_name = $this->input->post('business_name');
      $employee = $this->input->post('employee_num');
      $country = $this->input->post('country');

      $this->data['business_name'] = $business_name;
      $this->data['employee'] = $employee;
      $this->data['country'] = $country;

    
          

      $this->load->vars($this->data);
      $this->load->view($this->data['theme'].'/template');
    
    }

    public function purpose() {
      $this->data['page'] = 'purpose';       
      $business_name = $this->input->post('business_name');
      $employee = $this->input->post('employee');
      $country = $this->input->post('country');
      $first_name = $this->input->post('first_name');
      $last_name = $this->input->post('last_name');
      $your_email = $this->input->post('your_email');
      

      $this->data['business_name'] = $business_name;
      $this->data['employee'] = $employee;
      $this->data['country'] = $country;

      $this->data['first_name'] = $first_name;
      $this->data['last_name'] = $last_name;
      $this->data['your_email'] = $your_email;
          

      $this->load->vars($this->data);
      $this->load->view($this->data['theme'].'/template');
    
    }

    public function select_time() {
          $this->data['page'] = 'select_time'; 
          $business_name = $this->input->post('business_name');
          $employee = $this->input->post('employee');
          $country = $this->input->post('country');
          $first_name = $this->input->post('first_name');
          $last_name = $this->input->post('last_name');
          $your_email = $this->input->post('your_email');  
          $meeting_type = $this->input->post('meeting_type'); 
          $meeting_title = $this->input->post('meeting_title'); 

          $this->data['business_name'] = $business_name;
          $this->data['employee'] = $employee;
          $this->data['country'] = $country;    
          $this->data['first_name'] = $first_name;
          $this->data['last_name'] = $last_name;
          $this->data['your_email'] = $your_email;
          $this->data['meeting_type'] = $meeting_type;
          $this->data['meeting_title'] = $meeting_title;

          $time_zone_list = $this->meeting->get_time_zone();
          $time_zone_list = DateTimeZone::listIdentifiers();
              
          $this->data['time_zone_list'] = $time_zone_list;

          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
        
    }

    public function next_book() {

          $this->data['page'] = 'confirm_meeting';       
          $email = $this->input->post('email');
          $meeting_duration = $this->input->post('meeting_duration');
          $time_zone = $this->input->post('time_zone');
          $meeting_time = $this->input->post('meeting_time');

          $time_zone_text = $this->meeting->get_time_zone_text($time_zone);
          
          $this->data['email'] = $email;
          $this->data['meeting_duration'] = $meeting_duration;
          $this->data['time_zone'] = $time_zone_text['name'];
          $this->data['meeting_time'] = $meeting_time;

          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
     }

     public function confirm_book() {
          $this->data['page'] = 'complete_book';       
          $data = array();    
          
          $data['business_name'] = $this->input->post('business_name');
          $data['employee'] =$this->input->post('employee');
          $data['country'] = $this->input->post('country');    
          $data['first_name'] = $this->input->post('first_name');
          $data['last_name'] = $this->input->post('last_name');
          $data['your_email'] =  $this->input->post('your_email');
          $data['meeting_type'] = $this->input->post('meeting_type');
          $data['meeting_title'] = $this->input->post('meeting_title');   
          $data['meeting_duration'] = $this->input->post('meeting_duration');
          $data['time_zone'] = $this->input->post('time_zone');
          $data['meeting_time'] = $this->input->post('meeting_time');
   
          if ($this->meeting->add($data)) {               
               $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
          }
          $this->session->set_flashdata('message', $message);  
            
          $time_zone = $this->db->where('code',$data['time_zone'])->get('time_zone')->result_array();             
          $data['time_zone'] = $time_zone [0]['name'];
          $country = $this->db->where('country_code',$data['country'])->get('country_table')->result_array();           
          $data['country'] =  $country[0]['country_name'];
          $from = $data['email'] ;
          $to_super = "Meeting@tazzergroup.com";
          $to_other = $data['business_name'] ;
          $subject = $data['meeting_title'];
          $message = "<h1>You are invited by ".$data['first_name']."  ".$data['last_name']."</h1> <br> \n\r";
          $message .="<h4> Meeting Purpose : ".$data['meeting_type']."</h4><br>";
          $message .= "<h4>Meeting Time :".$data['meeting_time']."</h4><br> \n\r";
          $message .="<h4>Timezone :".$data['time_zone']."</h4><br>";
          $message .="<h4>Country :".$data['country']."</h4><br>";
          $message .="<h4>Title :".$data['meeting_title']."</h4><br>";
          $message .="<h4>Number of employees:".$data['employee']."</h4><br>";
          $message .="<h4>First Name :".$data['first_name']."</h4><br>";
          $message .="<h4>Last Name :".$data['last_name']."</h4><br>";            
                         
          $headers = "From:" . $from;            
             
          $phpmail_config = settingValue('mail_config');
            
          if (isset($phpmail_config) && !empty($phpmail_config))
            {
              if ($phpmail_config == "phpmail")
              {
                $from_email = settingValue('email_address');
              }
              else
              {
                $from_email = settingValue('smtp_email_address');
              }
            }         
          
       
            $config = [        
              'protocol' => 'smtp',
              'smtp_host' => 'smtp.office365.com',
              'smtp_user' => 'info@tazzergroup.com',
              'smtp_pass' => 'admin12345!@#',
              'smtp_crypto' => 'tls',    //tls
              'newline' => "\r\n", //REQUIRED! Notice the double quotes!
              'smtp_port' => 587,
              'mailtype' => 'html',
              'smtp_timeout' => 60,   
              'crlf' => '\r\n', 
          ];            

          $from_email = "info@tazzergroup.com";          
              
          $this->load->library('email',$config);
            if (!empty($from_email) && isset($from_email))
            {
              $mail = $this->email->from($from_email)->to($to_other)->subject($subject)->message($message)->send();
              $mail = $this->email->from($from_email)->to($to_super)->subject($subject)->message($message)->send();
            }

            /*
        
            if ($mail) 
              {
                  echo 'OK';
                  
              } else {
                  echo $this->email->print_debugger();
              }

            exit;

            */
           
          $this->load->vars($this->data);
          $this->load->view($this->data['theme'].'/template');
        
     }

     public function calendar()
    {
        $this->data['page'] = 'calendar';              
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }
 
}
