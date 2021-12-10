<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobmatch extends CI_Controller {

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
        if (!empty($this->session->userdata('id'))) {
            $this->data['page'] = 'jobmatch';         
            $this->data['job_list']= $this->jobmodel->get_job_list();     
            $this->load->vars($this->data);
            $this->load->view($this->data['theme'].'/template');
        }
        else {
            redirect(base_url() . 'login');
        }
       
    }

    public function search() {

        $inputs = array();        
        $this->data['page'] = 'jobmatch'; 

        if (isset($_POST) && !empty($_POST))
        {
            $inputs['job_search'] = $this->input->post('job_search');
            
        }

        $job_search = $inputs['job_search'];
        $this->data['job_list']= $this->jobmodel->get_job_list_search($job_search);  
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function subscribe() {
           
        $this->data['page'] = 'subscribe'; 
          //  $this->data['job_list']= $this->jobmodel->get_job_list();  
        
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function load_more() {
       
        $job_list = $this->jobmodel->get_job_list_all();
        $html = '';
       
        foreach ($job_list as $key => $job) { 
            if($job['job_type'] == 'hourly') {
                switch ($job['job_price']) {
                    case "0":
                        $price = "$100/hr";
                    case "1":
                        $price = "$50/hr";
                    case "2":
                        $price = "$50/hr";
                    case "3":
                        $price = "$25/hr";
                    case "4":
                        $price = "$10/hr";        

                }
            }

            if($job['job_type'] == 'fixed'){
                switch ($job['job_price']) {
                    case "0":
                        $price = "$100 -$500";
                    case "1":
                        $price = "$200-$300";
                    case "2":
                        $price = "$700-$1000";
                    case "3":
                        $price = "$10-$50";
                    case "4":
                        $price = "$50-$100";        

                }
            }

            $html .= '<div class = "job-content-detail">';
            $html .= '<a href="'.base_url().'job/jobmatch/detail/'.$job['id'].'"><h2>'.$job['title'].'</h2></a>';
            $html .= '   <div class = "job-content-type">';
            $html .= '        <div class = "job-type-price">';
            $html .= '            <img src="/assets/img/job/clock.png" alt="">';
            $html .= '                 <span>'.$job['job_type'].'Job</span>';                                    
            $html .= '                    <img src="/assets/img/job/dollar.png" alt=""> ';
            $html .= '                    <span>'.$price.'</span>';
            $html .= '               </div>';
            $html .= '               <div class = "job-content-location">';
            $html .= '                   <img src="/assets/img/job/location.png" alt="">';
            $html .= '                   <span>'.$job['location'].'</span>';
            $html .= '               </div>';
            $html .= '         </div>';
            $html .= '          <div class = "job-content-detail-text">';
            $html .= '               <p>'.$job['description'].'</p>';
            $html .= '           </div>';
            $html .= '           <div class = "job-content-skill">';
            $html .= '               <img src="/assets/img/job/skills.png" alt="">';
            $html .= '               <span class= "skill-text">Skills</span>';
            $html .= '               <div>'. $job['category_name'] . '</div>';
            $html .= '   </div>';
            $html .= '</div>' ;
        }                
        
       
        echo $html;
   
    }

    public function refresh_content() {
       
        $job_list = $this->jobmodel->get_job_list();
        $html = '';
       
        foreach ($job_list as $key => $job) { 
            if($job['job_type'] == 'hourly') {
                switch ($job['job_price']) {
                    case "0":
                        $price = "$100/hr";
                    case "1":
                        $price = "$50/hr";
                    case "2":
                        $price = "$50/hr";
                    case "3":
                        $price = "$25/hr";
                    case "4":
                        $price = "$10/hr";        

                }
            }

            if($job['job_type'] == 'fixed'){
                switch ($job['job_price']) {
                    case "0":
                        $price = "$100 -$500";
                    case "1":
                        $price = "$200-$300";
                    case "2":
                        $price = "$700-$1000";
                    case "3":
                        $price = "$10-$50";
                    case "4":
                        $price = "$50-$100";        

                }
            }

            $html .= '<div class = "job-content-detail">';
            $html .= '<a href="'.base_url().'job/jobmatch/detail/'.$job['id'].'"><h2>'.$job['title'].'</h2></a>';
            $html .= '   <div class = "job-content-type">';
            $html .= '        <div class = "job-type-price">';
            $html .= '            <img src="/assets/img/job/clock.png" alt="">';
            $html .= '                 <span>'.$job['job_type'].'Job</span>';                                    
            $html .= '                    <img src="/assets/img/job/dollar.png" alt=""> ';
            $html .= '                    <span>'.$price.'</span>';
            $html .= '               </div>';
            $html .= '               <div class = "job-content-location">';
            $html .= '                   <img src="/assets/img/job/location.png" alt="">';
            $html .= '                   <span>'.$job['location'].'</span>';
            $html .= '               </div>';
            $html .= '         </div>';
            $html .= '          <div class = "job-content-detail-text">';
            $html .= '               <p>'.$job['description'].'</p>';
            $html .= '           </div>';
            $html .= '           <div class = "job-content-skill">';
            $html .= '               <img src="/assets/img/job/skills.png" alt="">';
            $html .= '               <span class= "skill-text">Skills</span>';
            $html .= '               <div>'. $job['category_name'] . '</div>';
            $html .= '   </div>';
            $html .= '</div>' ;
        }            
           
        echo $html;
    }

    public function detail($id) {
               
        $this->data['page'] = 'bidding';         
        $this->data['detail_job']= $this->jobmodel->get_detail_job($id);
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }

    public function insert_bid() {
        $data = array();
        $data['job_id'] = $this->input->post('job_id');     
        $data['proposal'] = $this->input->post('proposal');
        $data['amount'] = $this->input->post('amount');
        $data['work_time'] = $this->input->post('work_time');
        $data['user_id'] = $this->session->userdata('id');
      
        if ($this->jobmodel->add_bidding_data($data)) {
         
            $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
        }
        $this->session->set_flashdata('message', $message);
        redirect(base_url() . 'job/jobmatch/detail/'.$data['job_id']);

    } 

    public function proposal($job_id) {
          
        $this->data['page'] = 'proposal';   
        $this->data ['job_id'] = $job_id;      
        $this->data['p_list']= $this->jobmodel->get_proposal_data($job_id);
        $this->data['count_bid'] = $this->jobmodel->get_count_bid($job_id);
     
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'].'/template');
    }
      
   
}
