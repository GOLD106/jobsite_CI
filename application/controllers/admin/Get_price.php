<?php

/**
 * @author: Leo 
 * @desc: Get Price list
 * @created: 
*/

class Get_price extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->data['theme']  = 'admin';
        $this->data['model'] = 'get_price';
        $this->load->model('admin_model');
        $this->load->model('GetPriceServiceModel');
        $this->data['base_url'] = base_url();
        $this->data['admin_id']  = $this->session->userdata('id');
        $this->user_role         = !empty($this->session->userdata('user_role')) ? $this->session->userdata('user_role') : 0;
        $this->data['main_menu'] = $this->admin_model->get_all_footer_menu();
        $this->load->helper('ckeditor');
        $this->load->helper('common_helper');
        // Array with the settings for this instance of CKEditor (you can have more than one)
        $this->data['ckeditor_editor1'] = array(
            //id of the textarea being replaced by CKEditor
            'id' => 'ck_editor_textarea_id',
            // CKEditor path from the folder on the root folder of CodeIgniter
            'path' => 'assets/js/ckeditor',
            // optional settings
            'config' => array(
                'toolbar' => "Full",
                'filebrowserBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html?Type=Images',
                'filebrowserFlashBrowseUrl' => base_url() . 'assets/js/ckfinder/ckfinder.html?Type=Flash',
                'filebrowserUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                'filebrowserImageUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                'filebrowserFlashUploadUrl' => base_url() . 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
            )
        );
    }
    public function index($offset = 0)
    {
        $this->data['page']  = 'index';
        $list = $this->GetPriceServiceModel->list();
        $this->data['lists'] = $list;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit($id)
    {
        $this->data['page'] = 'edit';
        $blog = $this->BlogModel->getBlog($id);
        $this->data['datalist'] = $blog;
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/blog');
        } else {
            if ($this->input->post('image')) {
                // code... blog image upload
                $data = $this->input->post('image');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name = $this->input->post('name');
                $imageName = "blog_".time().'.png';
                $imagePath = 'uploads/blog_images/'.$imageName;
                file_put_contents($imagePath, $data);

                $result = [
                    'status' => "ok",
                    'msg' => "Blog Image Uploaded Successfully!",
                    'response' => base_url().$imagePath,
                    'image_name' => $imageName,
                    'image_path' => $imagePath
                ];
                echo json_encode($result);
                exit;
            }
            if ($this->input->post('form_submit')) {
                $data = array();
                $data['author'] = $this->input->post('author');
                $data['title'] = $this->input->post('title');
                if ($this->input->post('blog_image') !== "") {
                    // code...
                    $data['image'] = $this->input->post('blog_image');
                }
                $data['content'] = $this->input->post('content'); 
                $data['status'] = $this->input->post('status');
                
                if ($this->BlogModel->updateBlog($id, $data)) {
                    $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>blog edited successfully.</div>";
                }
                $this->session->set_flashdata('message', $message);
                redirect(base_url() . 'admin/blog');
            }
        }
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function delete()
    {
        if ($this->data['admin_id'] > 1) {
            $this->session->set_flashdata('message', '<p class="alert alert-danger">Permission Denied</p>');
            redirect(base_url() . 'admin/get_price');
        } else {
            $id = $this->input->post('tbl_id');
            if (!empty($id)) {
                $this->GetPriceServiceModel->delete($id);
                $message = " <div class='alert alert-success text-center fade in' id='flash_succ_message'>deleted successfully.</div>";
                echo 1;
            }
            $this->session->set_flashdata('message', $message);
        }
    }

}
