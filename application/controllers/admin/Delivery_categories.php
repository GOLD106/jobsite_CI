<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery_categories extends CI_Controller
{

    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model', 'admin');
        $this->load->model('common_model', 'common_model');
        $this->data['theme'] = 'admin';
        $this->data['model'] = 'delivery_categories';
        $this->data['base_url'] = base_url();
        $this->session->keep_flashdata('error_message');
        $this->session->keep_flashdata('success_message');
        $this->load->helper('user_timezone_helper');
        $this->data['user_role'] = $this->session->userdata('role');
    }

    public function index()
    {
        redirect(base_url('delivery-categories'));
    }

    public function categories()
    {
        $this->common_model->checkAdminUserPermission(2);
        $this->data['page'] = 'categories';

        $this->data['list_filter'] = $this->admin->delivery_categories_list();

        if ($this->input->post('form_submit'))
        {
            extract($_POST);
            $category = $this->input->post('category');
            $from_date = $this->input->post('from');
            $to_date = $this->input->post('to');
            $this->data['list'] = $this->admin->delivery_categories_list_filter($category, $from_date, $to_date);
        }
        else
        {
            $this->data['list'] = $this->admin->delivery_categories_list();
        }

        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function add_categories()
    {
        $this->common_model->checkAdminUserPermission(2);
        if ($this->input->post('form_submit'))
        {
            removeTag($this->input->post());

            $uploaded_file_name = '';
            if (isset($_FILES) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
            {
                $uploaded_file_name = $_FILES['image']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'image', time() . $filename);

                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];

                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        $table_data['image'] = $image_url;
                        $table_data['thumb_image'] = image_resize(50, 50, $image_url, 'thu_' . $uploaded_file_name, "delivery_category_images");
                    }
                }
            }

            // Card Image
            if (isset($_FILES) && isset($_FILES['card_image']['name']) && !empty($_FILES['card_image']['name']))
            {
                $uploaded_file_name = $_FILES['card_image']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'card_image', time() . $filename);

                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];

                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        $table_data['card_image'] = $image_url;
                    }
                }
            }

            if (isset($_FILES) && isset($_FILES['mobile_icon']['name']) && !empty($_FILES['mobile_icon']['name']))
            {
                $uploaded_file_name = $_FILES['mobile_icon']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'mobile_icon', time() . $filename);
                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];
                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        // $table_data['mobile_icon'] = image_resize(60, 60, $image_url, 'ic_' . $filename, "delivery_category_images");
                        // @unlink(realpath($image_url));
                        $table_data['mobile_icon'] = $image_url;
                    }
                }
            }

            // Icon
            if (isset($_FILES) && isset($_FILES['icon']['name']) && !empty($_FILES['icon']['name']))
            {
                $uploaded_file_name = $_FILES['icon']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'icon', time() . $filename);
                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];
                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        $table_data['icon'] = $image_url;
                        // $table_data['icon'] = image_resize(60, 60, $image_url, 'icon_' . $filename, "delivery_category_images");
                    }
                }
            }

            $table_data['category_name'] = strip_tags($this->input->post('category_name'));
            $table_data['unique_id'] = $this->input->post('unique_id');
            $table_data['description'] = $this->input->post('description');
            $table_data['status'] = 1;
            $table_data['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('delivery_categories', $table_data);
            $ret_id = $this->db->insert_id();
            if (!empty($ret_id))
            {
                $this->session->set_flashdata('success_message', 'Category added successfully');
                redirect(base_url() . "delivery-categories");
            }
            else
            {
                $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                redirect(base_url() . "add-delivery-category");
            }
        }

        $this->data['page'] = 'add_categories';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function edit_categories($id)
    {
        $this->common_model->checkAdminUserPermission(2);
        $this->load->model('DeliveryCategoriesModel','Categories');
        $category = $this->Categories->get_category(['id'=>$id]);
        $table_data = array();
        if ($this->input->post('form_submit'))
        {
            removeTag($this->input->post());

            $uploaded_file_name = '';
            if (isset($_FILES) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name']))
            {
                $uploaded_file_name = $_FILES['image']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'image', time() . $filename);

                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];

                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        $table_data['image'] = $image_url;
                        $table_data['thumb_image'] = image_resize(50, 50, $image_url, 'thu_' . $uploaded_file_name, "delivery_category_images");
                        @unlink(realpath($category['image']));
                        @unlink(realpath($category['thumb_image']));
                    }
                }
            }

            // Card Image
            if (isset($_FILES) && isset($_FILES['card_image']['name']) && !empty($_FILES['card_image']['name']))
            {
                $uploaded_file_name = $_FILES['card_image']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'card_image', time() . $filename);

                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];

                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        $table_data['card_image'] = $image_url;
                        @unlink(realpath($category['card_image']));
                    }
                }
            }

            if (isset($_FILES) && isset($_FILES['mobile_icon']['name']) && !empty($_FILES['mobile_icon']['name']))
            {
                $uploaded_file_name = $_FILES['mobile_icon']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'mobile_icon', time() . $filename);
                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];
                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        // $table_data['mobile_icon'] = image_resize(60, 60, $image_url, 'ic_' . $uploaded_file_name, "delivery_category_images");
                        // @unlink(realpath($image_url));
                        $table_data['mobile_icon'] = $image_url;
                        @unlink(realpath($category['mobile_icon']));
                    }
                }
            }

            if (isset($_FILES) && isset($_FILES['icon']['name']) && !empty($_FILES['icon']['name']))
            {
                $uploaded_file_name = $_FILES['icon']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/delivery_category_images/', 'icon', time() . $filename);
                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y')
                {
                    $uploaded_file_name = $upload_sts['data']['file_name'];
                    if (!empty($uploaded_file_name))
                    {
                        $image_url = 'uploads/delivery_category_images/' . $uploaded_file_name;
                        $table_data['icon'] = $image_url;
                        // $table_data['icon'] = image_resize(60, 60, $image_url, 'ic_' . $uploaded_file_name, "delivery_category_images");
                        @unlink(realpath($category['icon']));
                    }
                }
            }

            $id = $this->input->post('category_id');
            $table_data['category_name'] = $this->input->post('category_name');
            $table_data['unique_id'] = $this->input->post('unique_id');
            $table_data['description'] = $this->input->post('description');
            $table_data['status'] = 1;
            $this->db->where('id', $id);
            if ($this->db->update('categories', $table_data))
            {
                $this->session->set_flashdata('success_message', 'Category updated successfully');
                redirect(base_url() . "categories");
            }
            else
            {
                $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                redirect(base_url() . "categories");
            }
        }

        $this->data['page'] = 'edit_categories';
        $this->data['categories'] = $this->admin->delivery_categories_details($id);
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function check_category_name()
    {
        $category_name = $this->input->post('category_name');
        $id = $this->input->post('category_id');
        if (!empty($id))
        {
            $this->db->select('*');
            $this->db->where('replace(category_name," ","")=replace("' . $category_name . '"," ","")');

            $this->db->where('id !=', $id);
            $this->db->from('delivery_categories');
            $result = $this->db->get()->num_rows();
        }
        else
        {
            $this->db->select('*');
            $this->db->where('replace(category_name," ","")=replace("' . $category_name . '"," ","")');
            $this->db->from('delivery_categories');
            $result = $this->db->get()->num_rows();
        }
        if ($result > 0)
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

    public function check_unique_id()
    {
        $unique_id = $this->input->post('unique_id');
        $id = $this->input->post('category_id');
        if (!empty($id))
        {
            $this->db->select('*');
            $this->db->where('replace(unique_id," ","")=replace("' . $unique_id . '"," ","")');
            $this->db->where('id !=', $id);
            $this->db->from('delivery_categories');
            $result = $this->db->get()->num_rows();
        }
        else
        {
            $this->db->select('*');
            $this->db->where('replace(unique_id," ","")=replace("' . $unique_id . '"," ","")');
            $this->db->from('delivery_categories');
            $result = $this->db->get()->num_rows();
        }
        if ($result > 0)
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

    public function delete_category()
    {
        $this->common_model->checkAdminUserPermission(2);
        $id = $this->input->post('category_id');
        $this->load->model("DeliveryCategoriesModel");
        if ($this->DeliveryCategoriesModel->delete_category($id))
        {
            $this->load->model("DeliveryServiceModel");

            $result = $this->DeliveryServiceModel->deleteByCategory($id);
            
            $this->session->set_flashdata('success_message', 'Category and Services deleted successfully');
            echo 1;

        }
        else
        {
            $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
            echo 1;
        }
    }

}
