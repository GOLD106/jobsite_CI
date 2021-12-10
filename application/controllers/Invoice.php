<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {        # upgrade maksimU for whitelabel using MY_Controller

   public $data;

   public function __construct() {
      parent::__construct();
      error_reporting(0);
      $this->load->model('InvoiceModel','invoice');
              
    }

    public function index()
    {
        $this->load->library('pdf');
        $this->data['invoice_list']=$this->invoice->get_invoice();  
        $this->load->vars($this->data);
      
       // $html = $this->load->view('invoice/index', [], true);        
        
        $html = $this->load->view('invoice/index');
    
       /*   
        $this->pdf->loadHtml($html);
        $this->pdf->set_paper("a4", "portrait");
        $this->pdf->render();
        $this->pdf->stream("".invoice.".pdf", array("Attachment"=>0));

        header('location:'.base_url() . 'user-bookings');
        exit;
        */
    
      //  redirect(base_url() . 'user-bookings'); 
          
    }
	
}
