<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobpost extends CI_Controller {

   public $data;
 
   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'job';
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
        
        $this->data['page'] = 'jobpost'; 
        
        $this->data['category_list']=$this->jobmodel->get_category();  
           
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }



    public function get_sub_category() {
     $selected_category = $this->input->post('selected_category');
     $category_text = $this->input->post('category_text');
     
     $sub_category_list = $this->jobmodel->get_sub_category($selected_category);
     
     
     
     $html = '<div class= "job-name-title">'.$category_text.'</div>';
     $html .= '<select class = "form-control" id = "subcategory_list" name = "job_subcategory"> ';

     foreach ($sub_category_list as $subcategory) {
          $html .= '<option  value ="'.$subcategory['id'] .'">'.$subcategory['subcategory_name'].'</option> ';
       
     } 

     $html .= '</select>';
     echo $html;
   
   }

   public function get_service_list() {
     $selected_subcategory = $this->input->post('selected_subcategory');
     $subcategory_text = $this->input->post('subcategory_text');     
     $service_list = $this->jobmodel->get_service_list($selected_subcategory);
     
     
     
     $html = '<div class= "job-name-title">'.$subcategory_text.'</div>';
     $html .= '<select class = "form-control" id = "service_title" name = "job_service"> ';

     foreach ($service_list as $service) {
          $html .= '<option  value ="'.$service['id'] .'">'.$service['service_title'].'</option> ';
       
     } 

     $html .= '</select>';
     echo $html;
   
   }

   
   function create_post() {

     $data = array();
     $data['title'] = $this->input->post('name');     
     $data['description'] = $this->input->post('job-description-content');
     $data['email'] = $this->input->post('email');
     $data['phone_number'] = $this->input->post('phone_number');
     $data['location'] = $this->input->post('location');
     
     $data['category'] = $this->input->post('job_category');
     $data['sub_category'] = $this->input->post('job_subcategory');
     $data['service'] = $this->input->post('job_service');

    if ($this->input->post('fixed_value') == 0) {
     $data['job_type'] = "hourly";
     $data['job_price'] = $this->input->post('hourly_value');
    } else {
     $data['job_type'] = "fixed";
     $data['job_price'] = $this->input->post('fixed_value');
    }
     
     // $data['upload_file'] = $this->input->post('your_file');
     if (!empty($_FILES['job_upload_file']['name']))
     {
          $config['upload_path'] = './assets/img/';
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['job_upload_file'] = $_FILES['job_upload_file']['name'];

          //Load upload library and initialize configuration
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          if ($this->upload->do_upload('job_upload_file'))
          {
               $uploadData = $this->upload->data();
               $job_upload_file = $_FILES['job_upload_file']['name'];
          }
          else
          {
               echo $this->data['error'] = $this->upload->display_errors();
          }
     }
     else
     {
          $job_upload_file = '';
     }
     $data['job_upload_file'] = $job_upload_file;   
             
     if ($this->jobmodel->add_jobpost($data)) {
         
          $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
          }
          $this->session->set_flashdata('message', $message);
          
          // mail notification part
          
          $to_mail =  $data['email'];
          $message = "Your job is successfully posted." ;
          $subject = "Job Posting";
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
          $this->load->library('email');
          
          if (!empty($from_email) && isset($from_email))
               {
               $mail = $this->email->from($from_email)->to($to_mail)->subject($subject)->message($message)->send();
               
               }
          if ($mail) 
               {
                     echo 'OK';
                    
               } else {
                    echo $this->email->print_debugger();
                    exit;
               }
          

          redirect(base_url() . 'job/jobpost');
   }

  
    
   

       
    
   
}
