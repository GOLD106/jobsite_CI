<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reqforquote extends CI_Controller {

	public $data;

   public function __construct() {

        parent::__construct();
        error_reporting(0);
        $this->data['theme']     = 'b2b';
        $this->data['module']    = 'rfq';
        $this->data['page']     = '';
        $this->data['base_url'] = base_url();
        $this->load->model('home_model','home');
		$this->load->model('RfqModel','rfq_model');
		$this->load->model('Categories_model', 'CategoryModel');
		$this->load->model('SubcategoryModel');
		$this->load->model('Service_model');
	  
        $this->load->library('ajax_pagination'); 
        $this->perPage = 12;
         
    }

	 
	public function index()

	{		
		$this->data['page'] = 'index';
		$this->data['category']=$this->CategoryModel->get_category();		
		$all_subcategory=$this->SubcategoryModel->List();
		$subCategoryList = array();
      
		if (count($all_subcategory) > 0)
        {
            foreach ($all_subcategory as $key => $subcategory)
            {
                $cateId = "cate_" . $subcategory['category'];
                if (!array_key_exists($cateId, $subCategoryList))
                {
                    $subCategoryList[$cateId] = array();
                }
                $subcategory["id"] = $subcategory["id"];
                $subcategory['service_title'] = ucfirst($subcategory['subcategory_name']);
                array_push($subCategoryList[$cateId], $subcategory);
            }
        }
      	
	    $this->data['subcategoryList']=$subCategoryList;
        $this->load->vars($this->data);
	    $this->load->view($this->data['theme'].'/template');
	}
	
	
	public function rfq()
	
	{
		$this->data['page'] = 'rfq';
        $this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
    }

	public function get_service_price() {

		$this->data['page'] = 'complete';
		$data = array();
		$data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone_number'] = $this->input->post('phone_number');
		$data['category'] = $this->input->post('category');
		$data['address'] = $this->input->post('user_address');
		$data['sub_category'] = $this->input->post('subcategory');
		$data['comment'] = $this->input->post('comment');	

		if ($this->rfq_model->add($data)) {
			$message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>new data created successfully.</div>";
		}

		$this->session->set_flashdata('message', $message);
        $service_list = $this->Service_model->get_service_sub($data['sub_category']);

	
		$this->data['service_list'] = $service_list;
		$this->data['subcategory_name'] = $service_list[0]['subcategory_name'];

		$this->load->vars($this->data);
		$this->load->view($this->data['theme'].'/template');
	
	}  
	 
   
}
