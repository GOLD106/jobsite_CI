<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {

   public $data;
 
   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'user';
        $this->data['module']    = 'career';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('CareerModel','career');

         $this->user_latitude=(!empty($this->session->userdata('user_latitude')))?$this->session->userdata('user_latitude'):'';
         $this->user_longitude=(!empty($this->session->userdata('user_longitude')))?$this->session->userdata('user_longitude'):'';

         $this->currency= settings('currency');

         $this->load->library('ajax_pagination'); 
         $this->perPage = 12; 
    }

    
     public function index()
     {
         $this->data['page'] = 'index';
         // $this->data['country_list']=$this->career->get_location();
         $this->data['country_list'] = getCountryList();
         $this->data['total_service_count']=$this->career->get_total_service();
         $this->data['category_list']=$this->career->get_category();         
         $this->data['services']=$this->career->get_services();
     
         $this->load->vars($this->data);
         $this->load->view($this->data['theme'].'/template');
     }

    public function change_location(){

     $selected_location = $this->input->post('selected_location');

     $datas = $this->career->get_services_location($selected_location);
     $category_list = $this->career->get_category_detail($selected_location); 
     $service_count=$this->career->get_service_count($selected_location);

     
     
     $html = '';
          foreach ($datas as $service) {
               $html .= '<div class = "role-content" >  ';
               $html .= '<a href="'.base_url().'career/career/detail/'.$service[id].'" >' ;
               $html .= '<span class ="h2-title" >'.$service['service_title'] .'</span> ';
               $html .= '</a>';
               $html .= '<span  class ="h2-title" style = "float:right">></span> ';
               $html .= '<p class= "p-text">'.$service['about'].'</p>';
               $html .= '</div>';
          } 
     $category_html = '';
     $category_html .= '<div class = "h3-title" >All Opportunity(' ;
     $category_html .= $service_count.') </div>' ;
     $category_html .= '<ul class ="service-list">';
     foreach ($category_list as $category) {
          $category_html .= '<li><a href = "javascript:select_service('.$category['id'].')">'.$category['category_name'].'('.$category['count_id'].')';
          $category_html .= '</a></li>' ;
     }
     $category_html .= '</ul>';

                  
    echo json_encode(array("category" => $category_html,"content" =>$html)) ;


   }

   public function select_category() {
     $selected_location = $this->input->post('selected_location');
     $category_id = $this->input->post('category_id');
     $service_list = $this->career->get_services_detail($selected_location,$category_id);
     
     
     $html = '';
     foreach ($service_list as $service) {
          $html .= '<div class = "role-content" >  ';
          $html .= '<a href="'.base_url().'career/career/detail/'.$service[id].'" >' ;
          $html .= '<span class ="h2-title" >'.$service['service_title'] .'</span> ';
          $html .= '</a>';
          $html .= '<span  class ="h2-title" style = "float:right">></span> ';
          $html .= '<p class= "p-text">'.$service['about'].'</p>';
          $html .= '</div>';
     } 
     echo $html;

   }

    
    public function detail($id)
    {
        
         $this->data['page'] = 'detail';
         $this->data['service']=$this->career->get_service($id);
         $this->load->vars($this->data);
         $this->load->view($this->data['theme'].'/template');
    }



    public function apply_job($id)
    {
        
         $this->data['page'] = 'apply_job';
         $this->data['service_id'] = $id;
                 
     
         $this->load->vars($this->data);
         $this->load->view($this->data['theme'].'/template');
    }

    public function insert_career() {
          $data = array();
          $data['service_id'] = $this->input->post('serviceId');
          $data['name'] = $this->input->post('name');
          $data['email'] = $this->input->post('email');
          $data['country_code'] = $this->input->post('countryCode');
          $data['phone_number'] = $this->input->post('phone_number');
          $data['skill_name'] = $this->input->post('skill_name');
          $data['user_address'] = $this->input->post('user_address');
          $data['appling_as'] = $this->input->post('appling_as');
          // $data['upload_file'] = $this->input->post('your_file');
          if (!empty($_FILES['your_file']['name']))
          {
               $config['upload_path'] = './assets/img/';
               $config['allowed_types'] = 'jpg|jpeg|png|gif';
               $config['your_file'] = $_FILES['your_file']['name'];

               //Load upload library and initialize configuration
               $this->load->library('upload', $config);
               $this->upload->initialize($config);

               if ($this->upload->do_upload('your_file'))
               {
                    $uploadData = $this->upload->data();
                    $your_file = $_FILES['your_file']['name'];
               }
               else
               {
                    echo $this->data['error'] = $this->upload->display_errors();
               }
          }
          else
          {
               $your_file = '';
          }
           $data['upload_file'] = $your_file;          
           
                  
          if ($this->career->add($data)) {
              
               $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
                }

          $this->session->set_flashdata('message', $message);

          $to_mail =  $data['email'];
          $message = "Your job is successfully posted." ;
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



          redirect(base_url() . 'career');
    }

    public function email_duplicate_check()
     {
          $user_data = $this->input->post();

          $input['email'] = $user_data['userEmail'];
         
          $is_available = $this->career->check_email($input['email']);

         
          
          if ( $is_available > 0 )
          {
               $isAvailable = false;
          }
          else
          {
               $isAvailable = true;
          }

        

          echo json_encode(array(
               'valid' => $isAvailable
          ));
     }

      
    
   
}
