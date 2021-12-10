<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Time_Detail extends MY_Controller {

	public $data;

   public function __construct() {

        parent::__construct();
				if (empty($this->session->userdata('id')))
        {
            $this->session->set_flashdata('history_uri',$this->uri->uri_string());
            redirect(base_url()."login");
        }
        error_reporting(0);
        $this->data['theme']     = 'employee';
        $this->data['module']    = 'time_detail';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('home_model','home');
				$this->load->model('User_model','user_model');

         $this->user_latitude=(!empty($this->session->userdata('user_latitude')))?$this->session->userdata('user_latitude'):'';
         $this->user_longitude=(!empty($this->session->userdata('user_longitude')))?$this->session->userdata('user_longitude'):'';

         $this->currency= settings('currency');

         $this->load->library('ajax_pagination'); 
         $this->perPage = 12;
         
    }

	
	public function index()
	{
		$user_id = $this->session->userdata('id');
		if($this->input->post('pauseTime') !== null && $this->input->post('location') !== null) {
			$data['work_hour'] = $this->input->post('pauseTime');
			$data['clocked_in'] = $this->input->post('clock_in');
			$data['clocked_out'] = $this->input->post('clock_out');
			$data['work_date'] = $this->input->post('today');
			$data['note'] = $this->input->post('note');
			$data['location'] = $this->input->post('location');
			$data['job_title'] = $this->input->post('job_title');
			$data['user_id'] = $user_id;
			$res = $this->db->insert('shift_detail', $data);
		}
		$this->data['page'] = 'index';
		$this->data['lists'] = $this->db->order_by('id','desc')->limit(1)->where('user_id', $user_id)->get('shift_detail')->result_array();
		$this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	}
	
	public function contact_user()
	{
		$myClientList = $this->user_model->get_myclient_list();
		$this->data['users'] = $myClientList;
		$this->data['toFlag'] = 'user';
		$this->data['page'] = 'contact';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	}
	
	public function contact()
	{
		$this->data['toFlag'] = 'admin';
		$this->data['page'] = 'contact';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
    }

	
	public function insert_contact_admin()
	{
		$this->load->model("Admin_model");
		$admin = $this->Admin_model->admin_details(1);
		$this->insert_contact($admin['email']);
	} 

	public function insert_contact_user()
	{
		$user_id = $this->input->post('userId');

		$this->form_validation->set_rules('userId', $this->lang->line('userId'), 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
			echo 0;
			return;
		}
		else
		{
			$user = $this->User_model->get_user($user_id);
			$this->insert_contact($user['email']);
		}
	} 

    public function insert_contact($to_email = '')
	{
		
		$query = $this->db->query("select * from system_settings WHERE status = 1");
		$result = $query->result_array();
		$mail_config='';
		$email_address='';
		$smtp_email_address='';
		$tomail='';
		foreach ($result as $res) {
			if($res['key'] == 'mail_config'){
				$mail_config = $res['value'];
			} 
			if($res['key'] == 'email_address'){
				$email_address = $res['value'];
			} 

			if($res['key'] == 'smtp_email_address'){
				$smtp_email_address = $res['value'];
			}

		}
		
		if($mail_config=='smtp')
		{
			$tomail=$smtp_email_address;
		}
		else
		{
			$tomail=$email_address;
		}
		if( !empty( $to_email) )  $tomail = $to_email;

		 $table_datas['name']=$this->input->post('name');
		 $table_datas['email']=$this->input->post('email');
		 $table_datas['message']=$this->input->post('message');
		 $result=$this->db->insert('contact_form_details', $table_datas);
		 if ($result) {
            $this->data['user'] = $this->session->userdata();
            
			//$this->data['contact_det'] = //$this->db->where('id', $id)->from('contact_reply')->get()->row_array();
            $body = $this->load->view('user/email/contact_form', $table_datas, true);
            $phpmail_config = settingValue('mail_config');
            if (isset($phpmail_config) && !empty($phpmail_config)) {
                if ($phpmail_config == "phpmail") {
                    $from_email = settingValue('email_address');
                } else {
                    $from_email = settingValue('smtp_email_address');
                }
            }
            $this->load->library('email');
            if (!empty($from_email) && isset($from_email)) {
                $mail = $this->email
                        ->from($from_email)
                        ->to($tomail)
                        ->subject('User Contact Form Details')
                        ->message($body)
                        ->send();
            }
			
			//print_r($mail);exit;
            $message = 'Mail Sent Successfully';
            $this->session->set_flashdata('success_message', $message);
			echo 1;
        } else {
            $message = 'Sorry, something went wrong';
            $this->session->set_flashdata('error_message', $message);
			echo 0;
        }
		 
	} 
    
}
