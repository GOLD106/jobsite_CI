<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require $_SERVER['DOCUMENT_ROOT'].'/stripeonsite/Stripe.php';
use Stripe\Stripe;

require $_SERVER['DOCUMENT_ROOT'] . '/paypal/PayPalClient.php';

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class Dashboard extends MY_Controller
{

    public $data;

    public function __construct()
    {

        parent::__construct();
        error_reporting(0);
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('history_uri', $this->uri->uri_string());
            redirect(base_url() . "login");
        }
        $this->data['theme'] = 'partner';
        $this->data['module'] = 'home';
        $this->data['page'] = '';
        $this->data['base_url'] = base_url();
        $this->load->helper('user_timezone_helper');
        $this->load->model('service_model', 'service');
        $this->load->model('home_model', 'home');
        $this->load->model('Api_model', 'api');
        $this->load->model('Stripe_model');
        $this->load->model('employee');
        $this->load->model('User_model', 'user');
        $this->load->model('User_meta_model', 'user_meta');
        $this->load->model('Partner_department_model', 'partner_department');

        // Load pagination library
        $this->load->library('paypal_lib');
        $this->load->library('ajax_pagination');
        $this->load->helper('form');
        $this->data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        // Load post model
        $this->load->model('booking');
        $this->load->model('User_booking', 'userbooking');

        // Per page limit
        $this->perPage = 6;

        $stripeKeys = stripeKeys();
        \Stripe\Stripe::setApiKey($stripeKeys['secret_key']);
        $this->stripeKeys = $stripeKeys;

        //public $data;
        $this->load->model('common_model', 'common_model');
        $this->data['base_url'] = base_url();
        $this->load->helper('user_timezone');
        $this->data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->helper('ckeditor');
        $this->load->helper('common_helper');
        $this->data['ckeditor_editor252'] = array(
            'id' => 'ck_editor_textarea_id252',
            'path' => 'assets/js/ckeditor',
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

    public function index()
    {
        $this->data['page'] = 'index';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    /**
     * @author Leo: create wallet Checkout Session with stripe
     * @created: 
    */
    public function create_stripe_user_wallet()
    {
        $walletAmt = $_POST['wallet_amt'];
        $user_currency = get_user_currency();

        $redirectPage = base_url() . 'partner-wallet';

        $session = \Stripe\Checkout\Session::create(['customer_email' => $this->session->userdata['email'], 'payment_method_types' => ['card'], 'line_items' => [['price_data' => ['currency' => $user_currency['user_currency_code'], 'product_data' => ['name' => "Add My Wallet", ], 'unit_amount' => 100, ], 'quantity' => intval($walletAmt) , ]], 'mode' => 'payment', 'success_url' => base_url() . 'partner/dashboard/add_wallet_success/{CHECKOUT_SESSION_ID}', 'cancel_url' => $redirectPage, ]);

        echo json_encode(['id' => $session->id]);
        exit;
    }

    /**
     * @author Leo: wallet add checkout success redirection with stripe
     * @created: 
    */
    public function add_wallet_success($sessionId)
    {
        // valid check
        $redirectPage = base_url() . 'partner-wallet';
        $walletRow = $this->db->select()->where('charge_id', $sessionId)->get('wallet_transaction_history')->row_array();
        if (is_array($walletRow) && count($walletRow) > 0)
        {
            redirect($redirectPage);
            return;
        }
        $stripe = new \Stripe\StripeClient($this->stripeKeys['secret_key']);
        $session = $stripe->checkout->sessions->retrieve($sessionId, []);
        if (is_null($session) || !isset($session))
        {
            $this->session->set_flashdata('error_message', 'Invalid Stripe Checkout Session Id!');
            redirect($redirectPage);
        }
        // print_r($session);
        // $all = $stripe->checkout->sessions->all();
        // print_r($all);
        $token = $this->session->userdata('chat_token');
        $user_info = $this->api->get_token_info($token);
        $user_currency = get_user_currency();

        $payment_intent = $stripe->paymentIntents->retrieve($session->payment_intent, []);
        $charges = $payment_intent->charges->data;
        foreach ($charges as $charge)
        {
            $balanceTransactionId = $charge->balance_transaction;
            $balanceTransaction = $stripe->balanceTransactions->retrieve($balanceTransactionId, []);

            $wallet = $this->api->get_wallet($token);
            $amount_total = $balanceTransaction->net / 100;
            if ($wallet['id'] == '')
            {
                $insert_main_wallet = array();
                $insert_main_wallet['token'] = $token;
                $insert_main_wallet['currency_code'] = strtoupper($balanceTransaction->currency);
                $insert_main_wallet['user_provider_id'] = $user_info->id;
                $insert_main_wallet['type'] = $user_info->type;
                $insert_main_wallet['wallet_amt'] = $amount_total;
                $insert_main_wallet['reason'] = 'Added by Stripe';;
                $this->db->insert('wallet_table', $insert_main_wallet);
            }
            else
            {
                $wallet_dat['currency_code'] = $wallet['currency_code'];
                $current_wallet = $wallet['wallet_amt'];
                $wallet_dat['wallet_amt'] = $current_wallet + $amount_total;
                $wallet_dat['updated_on'] = date('Y-m-d H:i:s');
                $WHERE = array(
                    'token' => $token
                );
                $result = $this->api->update_wallet($wallet_dat, $WHERE);
            }
            // transaction history
            $history_pay = array();
            $history_pay['token'] = $token;
            $history_pay['currency_code'] = strtoupper($balanceTransaction->currency);
            $history_pay['user_provider_id'] = $user_info->id;
            $history_pay['type'] = $user_info->type;
            $history_pay['tokenid'] = $token;
            $history_pay['payment_detail'] = json_encode(["id" => $session->id, 'amount_subtotal' => $session->amount_subtotal, 'amount_total' => $session->amount_total, 'customer' => $session->customer, 'currency' => $session->currency, 'customer_email' => $session->customer_email, 'payment_intent' => $session->payment_intent]);
            $history_pay['charge_id'] = $charge->id;
            $history_pay['transaction_id'] = $balanceTransaction->id;
            $history_pay['exchange_rate'] = '';
            $history_pay['paid_status'] = $session->payment_status;
            $history_pay['current_wallet'] = isset($wallet['wallet_amt']) ? $wallet['wallet_amt'] : 0;
            $history_pay['credit_wallet'] = $amount_total;
            $history_pay['debit_wallet'] = 0;
            $history_pay['avail_wallet'] = $amount_total;

            $history_pay['total_amt'] = $balanceTransaction->amount;
            $history_pay['fee_amt'] = $balanceTransaction->fee;
            $history_pay['net_amt'] = $balanceTransaction->net;

            $history_pay['reason'] = 'Added by Stripe';;
            $history_pay['created_at'] = date('Y-m-d H:i:s');
            $this->db->insert('wallet_transaction_history', $history_pay);
        }

        $this->session->set_flashdata('success_message', 'Amount added to wallet successfully');
        redirect($redirectPage);
    }

    /**
     * @author Leo: add wallet page with paypal
     * @created: 
    */
    public function paypal_add_wallet()
    {
        $paypalKeys = paypalKeys();
        $this->data['page'] = 'paypal_add_wallet';
        $this->data['client_id'] = $paypalKeys["client_id"];
        // $data = getPaypalClientToken();
        // $this->data['client_token'] = $data->client_token;
        $this->load->vars($this->data);
        // $this->load->view($this->data['theme'].'/'.$this->data['module'].'/paypal_add_wallet');
        $this->load->view($this->data['theme'] . '/template');
    }

    /**
     * @author Leo: create paypal user wallet
     * @created: 
    */
    public function create_paypal_user_wallet()
    {
        $redirectPage = base_url() . 'partner-wallet';

        $walletAmt = $_POST['wallet_amt'];
        $user_currency = get_user_currency();

        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = array(
            'intent' => 'CAPTURE',
            'application_context' => ['return_url' => $redirectPage,
            'cancel_url' => base_url() . 'partner/dashboard/paypal_add_wallet'],
            'purchase_units' => [['amount' => ['currency_code' => $user_currency['user_currency_code'],
            'value' => $walletAmt]]]
        );
        // 3. Call PayPal to set up a transaction
        $client = PayPalClient::client();
        try
        {
            $response = $client->execute($request);
        }
        catch(\PayPal\Exception\PayPalHttpException $ex)
        {
            echo $ex->getData();
            exit();
        }

        $debug = false;
        if ($debug)
        {
            print "Status Code: {$response->statusCode}\n";
            print "Status: {$response->result->status}\n";
            print "Order ID: {$response->result->id}\n";
            print "Intent: {$response->result->intent}\n";
            print "Links:\n";
            foreach ($response->result->links as $link)
            {
                print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
            }

            // To print the whole response body, uncomment the following line
            // echo json_encode($response->result, JSON_PRETTY_PRINT);
            
        }

        // 4. Return a successful response to the client.
        // print_r($response);
        // return $response;
        echo json_encode($response->result);
    }

    /**
     * @author Leo: capture paypal user wallet
     * @created: 
    */
    public function capture_paypal_user_wallet()
    {

        $orderId = $_POST['order_id'];
        $request = new OrdersCaptureRequest($orderId);
        // 3. Call PayPal to capture an authorization
        $client = PayPalClient::client();
        $response = $client->execute($request);
        // 4. Save the capture ID to your database. Implement logic to save capture to your database for future reference.
        $debug = false;
        if ($debug)
        {
            print "Status Code: {$response->statusCode}\n";
            print "Status: {$response->result->status}\n";
            print "Order ID: {$response->result->id}\n";
            print "Links:\n";
            foreach ($response->result->links as $link)
            {
                print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
            }
            print "Capture Ids:\n";
            foreach ($response->result->purchase_units as $purchase_unit)
            {
                foreach ($purchase_unit->payments->captures as $capture)
                {
                    print "\t{$capture->id}";
                }
            }
            // To print the whole response body, uncomment the following line
            // echo json_encode($response->result, JSON_PRETTY_PRINT);
            
        }

        echo json_encode($response->result, JSON_PRETTY_PRINT);
    }

    /**
     * @author Leo: paypal add wallet success
     * @created: 
    */
    public function paypal_add_wallet_success($orderId)
    {
        $redirectPage = base_url() . 'partner-wallet';
        // valid check
        $walletRow = $this->db->select()->where('charge_id', $orderId)->get('wallet_transaction_history')->row_array();
        if (is_array($walletRow) && count($walletRow) > 0)
        {
            redirect($redirectPage);
            return;
        }
        $client = PayPalClient::client();
        $response = $client->execute(new OrdersGetRequest($orderId));

        // print_r($response); exit;
        $orderObj = $response->result;
        $token = $this->session->userdata('chat_token');
        $user_info = $this->api->get_token_info($token);
        $user_currency = get_user_currency();

        foreach ($orderObj->purchase_units as $purchase_unit)
        {
            foreach ($purchase_unit->payments->captures as $capture)
            {
                // code...
                $wallet = $this->api->get_wallet($token);
                $amount_total = $capture->seller_receivable_breakdown->net_amount->value;
                $currency_code = $capture->seller_receivable_breakdown->net_amount->currency_code;
                if ($wallet['id'] == '')
                {
                    $insert_main_wallet = array();
                    $insert_main_wallet['token'] = $token;
                    $insert_main_wallet['currency_code'] = strtoupper($currency_code);
                    $insert_main_wallet['user_provider_id'] = $user_info->id;
                    $insert_main_wallet['type'] = $user_info->type;
                    $insert_main_wallet['wallet_amt'] = $amount_total;
                    $insert_main_wallet['reason'] = 'Added by Paypal';;
                    $this->db->insert('wallet_table', $insert_main_wallet);
                }
                else
                {
                    $wallet_dat['currency_code'] = $wallet['currency_code'];
                    $current_wallet = $wallet['wallet_amt'];
                    $wallet_dat['wallet_amt'] = $current_wallet + $amount_total;
                    $wallet_dat['updated_on'] = date('Y-m-d H:i:s');
                    $WHERE = array(
                        'token' => $token
                    );
                    $result = $this->api->update_wallet($wallet_dat, $WHERE);
                }
                // transaction history
                $history_pay = array();
                $history_pay['token'] = $token;
                $history_pay['currency_code'] = strtoupper($currency_code);
                $history_pay['user_provider_id'] = $user_info->id;
                $history_pay['type'] = $user_info->type;
                $history_pay['tokenid'] = $token;
                $history_pay['payment_detail'] = json_encode(["capture" => $capture]);
                $history_pay['charge_id'] = $orderId;
                $history_pay['transaction_id'] = $capture->id;
                $history_pay['exchange_rate'] = '';
                $history_pay['paid_status'] = $capture->status;
                $history_pay['current_wallet'] = isset($wallet['wallet_amt']) ? $wallet['wallet_amt'] : 0;
                $history_pay['credit_wallet'] = $amount_total;
                $history_pay['debit_wallet'] = 0;
                $history_pay['avail_wallet'] = $amount_total;

                $history_pay['total_amt'] = floatval($capture->seller_receivable_breakdown->gross_amount->value) * 100;
                $history_pay['fee_amt'] = floatval($capture->seller_receivable_breakdown->paypal_fee->value) * 100;
                $history_pay['net_amt'] = floatval($capture->seller_receivable_breakdown->net_amount->value) * 100;

                $history_pay['reason'] = 'Added by Paypal';;
                $history_pay['created_at'] = date('Y-m-d H:i:s');
                $this->db->insert('wallet_transaction_history', $history_pay);
            }
        }

        $this->session->set_flashdata('success_message', 'Amount added to wallet successfully');

        redirect($redirectPage);
    }

    //Olamide
    public function company_time_clock()
    {
        $shift_data = [];
        $users = $this->db->select('name, id, profile_img')->where('you_are_appling_as', 8)->get('users')->result_array();
        $this->data['page'] = 'partner_time_clock';
        $user_id = $this->session->userdata('id');
        $user_permission = $this->db->select('permission')
                                    ->where('id', $user_id)
                                    ->get('users')
                                    ->result_array();
        $this->data['status'] = $this->db->select('name')
                                    ->where('id', $user_permission[0]['permission'])
                                    ->get('user_permission')
                                    ->result_array();
        $today = date("D M d Y");
        $this->data['clocked_today'] = $this->db->like('work_date', $today)->get('shift_detail')->result_array();

        $this->data['users'] = $users;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }
    public function company_job_scheduling()
    {   
        $shift_data = [];
        $users = $this->db->select('name, id, profile_img')->where('you_are_appling_as', 8)->get('users')->result_array();
        // $shift_data = $this->db->
        $user_id = $this->session->userdata('id');
        $user_permission = $this->db->select('permission')
                                    ->where('id', $user_id)
                                    ->get('users')
                                    ->result_array();
        $this->data['status'] = $this->db->select('name')
                                    ->where('id', $user_permission[0]['permission'])
                                    ->get('user_permission')
                                    ->result_array();        $this->data['lists'] = $this->db->get('categories')->result_array();
        $this->data['users'] = $users;
        $this->data['page'] = 'partner_job_scheduling';
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }
    public function shift_add_data()
    {
        $shift_data['shift_title'] = $this->input->post('shift_title');
        $shift_data['location'] = $this->input->post('shift_location');
        $shift_data['shift_start'] = $this->input->post('shift_start');
        $shift_data['shift_end'] = $this->input->post('shift_end');
        $shift_data['total_hours'] = $this->input->post('shift_end') - $this->input->post('shift_start');
        $shift_data['shift_date'] = $this->input->post('shift_date');
        $shift_data['schedule_job'] = $this->input->post('subcategory');
        $shift_data['schedule_note'] = $this->input->post('schedule_note');
        $shift_data['user_id'] = $this->input->post('user_id');

        if($shift_data !== null && $shift_data['schedule_job'] !== null) {
            $this->db->insert('shift_schedule', $shift_data);
            $shift_data['schedule_job'] = [];
        }
    }
    public function shift_update_data()
    {
        $shift_data['shift_title'] = $this->input->post('shift_title');
        $shift_data['location'] = $this->input->post('shift_location');
        $shift_data['shift_start'] = $this->input->post('shift_start');
        $shift_data['shift_end'] = $this->input->post('shift_end');
        $shift_data['total_hours'] = $this->input->post('shift_end') - $this->input->post('shift_start');
        $shift_data['shift_date'] = $this->input->post('shift_date');
        // $shift_data['schedule_job'] = $this->input->post('subcategory');
        $shift_data['schedule_note'] = $this->input->post('schedule_note');
        $shift_data['user_id'] = $this->input->post('user_id');
        if($shift_data !== null) {
            $this->db->where('shift_start', $shift_data['shift_start'])->where('shift_end', $shift_data['shift_end'])->where('user_id', $shift_data['user_id'])->update('shift_schedule', $shift_data);
            // $shift_data['schedule_job'] = [];
        }
    }
    public function shift_detail_add_data()
    {   
        $shift_data['user_id'] = $this->input->post('user_id');
        $shift_data['work_date'] = $this->input->post('work_date');
        $shift_data['job_title'] = $this->input->post('job_title');
        $shift_data['clocked_in'] = $this->input->post('clocked_in');
        $shift_data['clocked_out'] = $this->input->post('clocked_out');
        $shift_data['work_hour'] = $this->input->post('work_hour');
        $shift_data['note'] = $this->input->post('note');
        $result = $this->db->order_by('id','desc')->limit(1)->where('user_id', $shift_data['user_id'])->like('work_date', $shift_data['work_date'])->get('shift_detail')->result_array();
        if($result) {
            if($shift_data !== null && $shift_data['job_title'] !== null) {
                $this->db->order_by('id','desc')->limit(1)->where('user_id', $shift_data['user_id'])->like('work_date', $shift_data['work_date'])->update('shift_detail', $shift_data);
                $shift_data['job_title'] = [];
            }
        }
    }
    public function shift_get_data()
    {   
        $result = [];
        $i = 0;
        $week_dates = $this->input->post('weekDates');
        foreach($week_dates as $week_date) {
            $temp = $this->db->order_by('id','desc')->limit(1)->like('shift_date', $week_date)->get('shift_schedule')->result_array();
            $result[$i] = $temp;
            $i++;
        }
        if($result) echo json_encode($result);
    }
    public function shift_detail_get_data()
    {
        $result = [];
        $result_absence = [];
        $i = 0;
        $j = 0;
        $week_dates = $this->input->post('weekDates');
        $post_dates = $this->input->post('postDates');
        $user_id = $this->input->post('userID');

        foreach($week_dates as $week_date) {
            $temp = $this->db->order_by('id','desc')->limit(1)->where('user_id', $user_id)->like('work_date', $week_date)->get('shift_detail')->result_array();
            $result['shift_detail'][$i] = $temp;
            $i++;
        }

        foreach($post_dates as $post_date) {
            $from_date = $this->db->order_by('id','desc')->limit(1)->where('user_id', $user_id)->like('absence_from', $post_date)->get('employee_absence')->result_array();
            $to_date = $this->db->order_by('id','desc')->limit(1)->where('user_id', $user_id)->like('absence_to', $post_date)->get('employee_absence')->result_array();
            $result['from_date'][$j] = $from_date;
            $result['to_date'][$j] = $to_date;
            $j++;
        }

        if($result) echo json_encode($result);
    }
    //End Olamide

    public function partner_wallet()
    {
        if (empty($this->session->userdata('id'))) {
            redirect(base_url());
        }
        if($this->session->userdata('you_are_appling_as') != C_YOUARE_PARTNER){
            redirect(base_url());
        }
        $this->data['page'] = 'partner_wallet';
        $this->data['wallet'] = $this->api->get_wallet($this->session->userdata('chat_token'));
        $this->data['wallet_history'] = $this->api->get_wallet_history_info($this->session->userdata('chat_token'));
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    // ===================================================================================================
    public function razorpay_details()
    {
        //echo "hi";exit;
        removeTag($this->input->post());
        $params = $this->input->post();
        $user_id = $this->session->userdata('id');

        $query = $this->db->query("select * from system_settings WHERE status = 1");
        $result = $query->result_array();
        if (!empty($result)) {
            foreach ($result as $data1) {
                if ($data1['key'] == 'razorpay_apikey') {
                    $apikey = $data1['value'];
                }

                if ($data1['key'] == 'razorpay_secret_key') {
                    $apisecret = $data1['value'];
                }

                if ($data1['key'] == 'live_razorpay_apikey') {
                    $apikey = $data1['value'];
                }

                if ($data1['key'] == 'live_razorpay_secret_key') {
                    $apisecret = $data1['value'];
                }
            }
        }

        // $razor_option = settingValue('razor_option');
        // if($razorpay_option == 1){
        // $apikey = settingValue('razorpay_apikey');
        // $apisecret = settingValue('razorpay_secret_key');
        // }else if($razorpay_option == 2){
        // $apikey = settingValue('live_razorpay_apikey');
        // $apisecret = settingValue('live_razorpay_secret_key');
        // }
        $user_currency = 'INR';
        if (!empty($params)) {
            $url = "https://api.razorpay.com/v1/contacts";
            $unique = strtoupper(uniqid());
            $data = ' {
              "name":"' . $params['name'] . '",
              "email":"' . $params['email'] . '",
              "contact":"' . $params['contact'] . '",
              "type":"employee",
              "reference_id":"' . $unique . '",
              "notes":{}
            }';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_USERPWD, $apikey . ":" . $apisecret);
            $headers = array(
                'Content-Type:application/json'
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                $result = 'Error:' . curl_error($ch);
                echo json_encode(array(
                    'status' => false,
                    'msg' => $result
                ));
            }

            $results = json_decode($result);
            $user_id = $this->session->userdata('id');
            $cnotes = $results->notes;
            $serializedcnotes = serialize($cnotes);
            $contact_data = array(
                'user_id' => $user_id,
                'rp_contactid' => $results->id,
                'entity' => $results->entity,
                'name' => $results->name,
                'contact' => $results->contact,
                'email' => $results->email,
                'type' => $results->type,
                'reference_id' => $results->reference_id,
                'batch_id' => $results->batch_id,
                'active' => $results->active,
                'accountnumber' => $params['accountnumber'],
                'mode' => $params['mode'],
                'purpose' => $params['purpose'],
                'notes' => $serializedcnotes,
                'created_at' => $results->created_at
            );

            $createcontact = $this->db->insert('razorpay_contact', $contact_data);
            if (!empty($createcontact)) {
                $faurl = "https://api.razorpay.com/v1/fund_accounts";
                $faunique = strtoupper(uniqid());
                $fadata = ' {
                  "contact_id": "' . $results->id . '",
                  "account_type": "bank_account",
                  "bank_account": {
                    "name": "' . $params['bank_name'] . '",
                    "ifsc": "' . $params['ifsc'] . '",
                    "account_number":"' . $params['accountnumber'] . '"
                  }
                }';

                $fach = curl_init();
                curl_setopt($fach, CURLOPT_URL, $faurl);
                curl_setopt($fach, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($fach, CURLOPT_POSTFIELDS, $fadata);
                curl_setopt($fach, CURLOPT_POST, 1);
                curl_setopt($fach, CURLOPT_USERPWD, $apikey . ":" . $apisecret);
                $faheaders = array(
                    'Content-Type:application/json'
                );
                curl_setopt($fach, CURLOPT_HTTPHEADER, $faheaders);
                $faresult = curl_exec($fach);

                if (curl_errno($fach)) {
                    $faresult = 'Error:' . curl_error($fach);
                    echo json_encode(array(
                        'status' => false,
                        'msg' => $faresult
                    ));
                }
                $faresults = json_decode($faresult);

                $fa_data = array(
                    'fund_account_id' => $faresults->id,
                    'entity' => $faresults->entity,
                    'contact_id' => $faresults->contact_id,
                    'account_type' => $faresults->account_type,
                    'ifsc' => $faresults->bank_account->ifsc,
                    'bank_name' => $faresults->bank_account->bank_name,
                    'name' => $faresults->bank_account->name,
                    'account_number' => $faresults->bank_account->account_number,
                    'active' => $faresults->active,
                    'batch_id' => $faresults->batch_id,
                    'created_at' => $faresults->created_at
                );

                $facreatecontact = $this->db->insert('razorpay_fund_account', $fa_data);

                if ($facreatecontact) {
                    $purl = "https://api.razorpay.com/v1/payouts";
                    $punique = strtoupper(uniqid());
                    $pdata = ' {
                      "account_number": "2323230032510196",
                      "fund_account_id": "' . $faresults->id . '",
                      "amount": "' . $params['amount'] . '",
                      "currency": "INR",
                      "mode": "' . $params['mode'] . '",
                      "purpose": "' . $params['purpose'] . '",
                      "queue_if_low_balance": true,
                      "reference_id": "' . $punique . '",
                      "narration": "",
                      "notes": {}
                    }';

                    $pch = curl_init();
                    curl_setopt($pch, CURLOPT_URL, $purl);
                    curl_setopt($pch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($pch, CURLOPT_POSTFIELDS, $pdata);
                    curl_setopt($pch, CURLOPT_POST, 1);
                    curl_setopt($pch, CURLOPT_USERPWD, $apikey . ":" . $apisecret);
                    $pheaders = array(
                        'Content-Type:application/json'
                    );
                    curl_setopt($pch, CURLOPT_HTTPHEADER, $pheaders);
                    $presult = curl_exec($pch);

                    if (curl_errno($pch)) {
                        $presult = 'Error:' . curl_error($pch);
                        echo json_encode(array(
                            'status' => false,
                            'msg' => $presult
                        ));
                    }
                    $presults = json_decode($presult);

                    $pydata = array(
                        'payout_id' => $presults->id,
                        'entity' => $presults->entity,
                        'fund_account_id' => $presults->fund_account_id,
                        'amount' => $presults->amount,
                        'currency' => $presults->currency,
                        'fees' => $presults->fees,
                        'tax' => $presults->tax,
                        'status' => $presults->status,
                        'utr' => $presults->utr,
                        'mode' => $presults->mode,
                        'purpose' => $presults->purpose,
                        'reference_id' => $presults->reference_id,
                        'narration' => $presults->narration,
                        'batch_id' => $presults->batch_id,
                        'failure_reason' => $presults->failure_reason,
                        'created_at' => $presults->created_at
                    );
                    $payouts = $this->db->insert('razorpay_payouts', $pydata);
                    if ($payouts) {
                        $wdata = array(
                            'user_id' => $user_id,
                            'amount' => $presults->amount,
                            'currency_code' => $presults->currency,
                            'transaction_status' => 1,
                            'transaction_date' => date('Y-m-d'),
                            'request_payment' => 'RazorPay',
                            'status' => 1,
                            'created_by' => $user_id,
                            'created_at' => $presults->created_at
                        );

                        $payoutins = $this->db->insert('wallet_withdraw', $wdata);
                        if ($payoutins) {
                            $amount = $presults->amount;
                            $user_id = $this->session->userdata('id');
                            $user = $this->db->where('id', $user_id)->get('providers')->row_array();
                            $user_name = $user['name'];
                            $user_token = $user['token'];
                            $currency_type = $user['currency_code'];
                            $wallet = $this->db->where('user_provider_id', $user_id)->where('type', 1)->get('wallet_table')->row_array();
                            $wallet_amt = $wallet['wallet_amt']; //echo json_encode($wallet_amt);exit;
                            $history_pay['token'] = $user_token;
                            $history_pay['user_provider_id'] = $user_id;
                            $history_pay['currency_code'] = 'INR';
                            $history_pay['credit_wallet'] = 0;
                            $history_pay['debit_wallet'] = $amount;

                            $history_pay['transaction_id'] = $presults->id;
                            $history_pay['paid_status'] = '1';
                            $history_pay['total_amt'] = $presults->amount;
                            if ($wallet_amt) {
                                $current_wallet = $wallet_amt - $amount;
                            } else {
                                $current_wallet = $amount;
                            }
                            $history_pay['current_wallet'] = $wallet_amt;
                            $history_pay['avail_wallet'] = $current_wallet;
                            $history_pay['reason'] = 'Withdrawn Wallet Amt';
                            $history_pay['created_at'] = date('Y-m-d H:i:s');
                            if ($this->db->insert('wallet_transaction_history', $history_pay)) {
                                $this->db->where('user_provider_id', $user_id)->update('wallet_table', array(
                                    'currency_code' => 'INR',
                                    'wallet_amt' => $current_wallet
                                ));
                            }
                            $message = "Amount Withdrawn Successfully";
                            echo json_encode(array(
                                'status' => true,
                                'msg' => $message
                            ));
                        } else {
                            $message = "Payout details not Inserted";
                            echo json_encode(array(
                                'status' => false,
                                'msg' => $message
                            ));
                        }
                    } else {
                        $message = "Payout details not Inserted";
                        echo json_encode(array(
                            'status' => false,
                            'msg' => $message
                        ));
                    }
                }
            }
        } else {
            $message = (!empty($this->user_language[$this->user_selected]['lg_something_went_wrong'])) ? $this->user_language[$this->user_selected]['lg_something_went_wrong'] : $this->default_language['en']['lg_something_went_wrong'];
            echo json_encode(array(
                'status' => false,
                'msg' => $message
            ));
        }
    }
    // ===================================================================================================
    public function bank_details()
    {
        removeTag($this->input->post());
        $params = $this->input->post();
        $user_id = $this->session->userdata('id');
        $user_currency = 'INR';
        if (!empty($params)) {
            $check_bank = $this->db->where('user_id', $user_id)->get('bank_account')->num_rows();
            $user_det = $this->db->where('id', $user_id)->get('providers')->row_array();
            $data = array(
                'user_id' => $user_id,
                'account_number' => $params['account_no'],
                'account_holder_name' => $user_det['name'],
                'bank_name' => $params['bank_name'],
                'bank_address' => $params['bank_address'],
                'sort_code' => $params['sort_code'],
                'routing_number' => $params['routing_number'],
                'account_ifsc' => $params['ifsc_code'],
                'pancard_no' => $params['pancard_no'],
                'paypal_account' => $params['paypal_id'],
                'paypal_email_id' => $params['paypal_email_id']
            );
            if ($check_bank > 0) {
                $result = $this->db->where('user_id', $user_id)->update('stripe_bank_details', $data);
            } else {
                $result = $this->db->insert('stripe_bank_details', $data);
            }
            if ($result == true) {
                $wallet_data = array(
                    'user_id' => $user_id,
                    'amount' => $params['amount'],
                    'currency_code' => $user_currency,
                    'status' => 1,
                    'transaction_status' => 0,
                    'request_payment' => $params['payment_type'],
                    'created_by' => $user_id,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $amount = $this->db->insert('wallet_withdraw', $wallet_data);

                //echo json_encode($user_id);exit;
                if ($amount == true) {
                    $amount_withdraw = $this->Stripe_model->wallet_withdraw_flow($params['amount'], $user_currency, $user_id, 1);
                }
                $message = 'Amount Withdrawn Successfully';
                echo json_encode(array(
                    'status' => true,
                    'msg' => $message
                ));
            } else {
                $message = (!empty($this->user_language[$this->user_selected]['lg_something_went_wrong'])) ? $this->user_language[$this->user_selected]['lg_something_went_wrong'] : $this->default_language['en']['lg_something_went_wrong'];
                echo json_encode(array(
                    'status' => false,
                    'msg' => $message
                ));
            }
        }
    }
    // ===================================================================================================

    public function partner_settings()
    {
        if (empty($this->session->userdata('id'))) {
            redirect(base_url());
        }
        if($this->session->userdata('you_are_appling_as') != C_YOUARE_PARTNER){
            redirect(base_url());
        }

        $this->data['page'] = 'partner_settings';
        $this->data['details'] = $this->user->getUserInfo($this->session->userdata('id'));
        $this->data['country'] = $this->db->select('id,country_name')->from('country_table')->get()->result_array();
        $this->data['city'] = $this->db->select('id,name')->from('city')->get()->result_array();
        $this->data['state'] = $this->db->select('id,name')->from('state')->get()->result_array();
        $this->data['user_address'] = $this->db->where('user_id', $this->session->userdata('id'))->get('user_address')->row_array();
        $this->data['profile'] = $this->service->get_profile($this->session->userdata('id'));
        $this->data['wallet'] = $this->api->get_wallet($this->session->userdata('chat_token'));
        $this->data['wallet_history'] = $this->api->get_wallet_history_info($this->session->userdata('chat_token'));

        $this->user_meta->register_meta($this->session->userdata('id'));
        $where = "um.user_id = ".$this->session->userdata('id');
        $user_meta = $this->user_meta->get_meta_data($where);        
        $this->data['selected_department'] = $user_meta[0]['department_id'];
        $department_list = $this->partner_department->getDepartmentList();     
        $this->data['department_list'] = $department_list;

        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    /**
     * @author Leo: Partner Security Setting
    */
    public function partner_security()
    {
        $this->data['page'] = 'partner_security';
        $this->load->model("User_model");

        // save security settings
        if ($this->input->post()) {
            $two_factor_auth = 0;
            if ($this->input->post("two_factor_auth") && $this->input->post("two_factor_auth") == "on") {
                // code...
                $two_factor_auth = 1;
            }

            $settings = [
                'user_id' => $this->session->userdata('id'),
                'two_factor_auth' => $two_factor_auth
            ];
            if ($this->User_model->updateUser($settings)) {
                // code...
                $this->session->set_flashdata("success_message", "Updated Security Setting Successfully !");
            }
        }
        
        $this->data['user_address'] = $this->db->where('user_id', $this->session->userdata('id'))->get('user_address')->row_array();
        $user_details = $this->User_model->get_user_details($this->session->userdata('id'));
        $this->data['user_details'] = $user_details;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }

    public function update_user()
    {
        if (!empty($_POST)) {
            removeTag($this->input->post());
            $uploaded_file_name = '';
            if (isset($_FILES) && isset($_FILES['profile_img']['name']) && !empty($_FILES['profile_img']['name'])) {
                $uploaded_file_name = $_FILES['profile_img']['name'];
                $uploaded_file_name_arr = explode('.', $uploaded_file_name);
                $filename = isset($uploaded_file_name_arr[0]) ? $uploaded_file_name_arr[0] : '';
                $this->load->library('common');
                $upload_sts = $this->common->global_file_upload('uploads/profile_img/', 'profile_img', time() . $filename);
                if (isset($upload_sts['success']) && $upload_sts['success'] == 'y') {
                    $uploaded_file_name = $upload_sts['data']['file_name'];
                    if (!empty($uploaded_file_name)) {
                        $image_url = 'uploads/profile_img/' . $uploaded_file_name;
                        $table_data['profile_img'] = $this->image_resize(100, 100, $image_url, $filename);
                    }
                }
            }
            $id = $this->session->userdata('id');
            $table_data['mobileno'] = $this->input->post('mobileno');
            if (!empty($this->input->post('dob'))) {
                $table_data['dob'] = date('Y-m-d', strtotime($this->input->post('dob')));
            } else {
                $table_data['dob'] = NULL;
            }

            $table_data['postal_code'] = $this->input->post('pincode');

            $this->db->where('id', $id);

            // Leo: check profile fill up status
            if (!empty($_POST['dob']) && !empty($_POST['address']) && !empty($_POST['country_id']) && !empty($_POST['state_id']) && !empty($_POST['city_id']) && !empty($_POST['pincode'])) {
                // code...
                $table_data['fill_up_profile'] = 1;
                $this->session->set_userdata('fill_up_profile', 1);
            }
            
            if ($this->db->update('users', $table_data)) {
                $table_datas['address'] = $_POST['address'];
                if (!empty($_POST['state_id'])) {
                    $table_datas['state_id'] = $_POST['state_id'];
                }
                if (!empty($_POST['city_id'])) {
                    $table_datas['city_id'] = $_POST['city_id'];
                }
                if (!empty($_POST['country_id'])) {
                    $table_datas['country_id'] = $_POST['country_id'];
                }
                if (!empty($_POST['pincode'])) {
                    $table_datas['pincode'] = $_POST['pincode'];
                }

                if (!empty($_POST['department_id'])) {
                    $skill_data = array();
                    $skill_data['user_id'] = $id;
                    $skill_data['department_id'] = $_POST['department_id'];
                    $this->user_meta->update_meta_data($skill_data); 
                }

                $user_count = $this->db->where('user_id', $id)->count_all_results('user_address');

                if (count($table_datas) > 0) {
                    if ($user_count == 1) {
                        $this->db->where('user_id', $id);
                        $this->db->update('user_address', $table_datas);
                    } else {
                        $table_datas['user_id'] = $id;
                        $this->db->insert('user_address', $table_datas);
                    }
                    $this->session->set_flashdata('success_message', 'Profile updated successfully');
                    redirect(base_url() . "partner-settings");
                } else {
                    $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                    redirect(base_url() . "partner-settings");
                }
            } else {
                $this->session->set_flashdata('error_message', 'Something wrong, Please try again');
                redirect(base_url() . "partner-settings");
            }
        }
    }

    public function getStateId()
    {
        $country_id = $_POST['country_id'];
        echo $country_id;
        exit();
        $result =  $this->db->select('id,name')->from('city')->where('country_id', $country_id)->get()->result_object();
        return $result;
    }

    public function partner_subscription()
    {
        if (empty($this->session->userdata('id'))) {
            redirect(base_url());
        }
        if($this->session->userdata('you_are_appling_as') != C_YOUARE_PARTNER){
            redirect(base_url());
        }
        $user_id = $this->session->userdata('id');
        $this->data['page'] = 'partner_subscription';
        $this->data['user_details'] = $user = $this->db->where('users.id', $user_id)->join('user_address', 'user_address.user_id=users.id', 'left')->get('users')->row_array();
        $this->data['paypal_gateway'] = settingValue('paypal_gateway');
        $this->data['braintree_key'] = settingValue('braintree_key');
        $razor_option = settingValue('razor_option');

        //echo "<pre>";print_r($razorpay_apikey);exit;
        if ($razor_option == 1)
        {
            $this->data['razorpay_apikey'] = settingValue('razorpay_apikey');
            $this->data['razorpay_apisecret'] = settingValue('razorpay_apisecret');
        }
        else if ($razor_option == 2)
        {
            $this->data['razorpay_apikey'] = settingValue('live_razorpay_apikey');
            $this->data['razorpay_apisecret'] = settingValue('live_razorpay_secret_key');
        }

        $this->data['wallet'] = $this->api->get_wallet($this->session->userdata('chat_token'));
        $this->data['wallet_history'] = $this->api->get_wallet_history_info($this->session->userdata('chat_token'));
        $this->load->vars($this->data);

        $this->load->view($this->data['theme'] . '/template');
    }

    /**
     * @author Leo: create subscription with stripe
     * @created: 
    */
    public function create_stripe_partner_subscription()
    {

        $subscriptionId = $_POST['subscription_id'];
        $this->load->model('SubscriptionFee');
        $data = $this->SubscriptionFee->getData($subscriptionId);
        $quantity = intval($data['fee']);
        if ($quantity == 0) {
            // code...
            $quantity = 1;
        }

        $session = \Stripe\Checkout\Session::create(['customer_email' => $this->session->userdata['email'], 'payment_method_types' => ['card'], 'line_items' => [['price_data' => ['currency' => $data['currency_code'], 'product_data' => ['name' => $data['subscription_name'], ], 'unit_amount' => 100, ], 'quantity' => $quantity, ]], 'mode' => 'payment', 'success_url' => base_url() . 'partner-subscription-success/{CHECKOUT_SESSION_ID}?sub_id=' . $subscriptionId, 'cancel_url' => base_url() . 'partner-subscription', ]);

        echo json_encode(['id' => $session->id]);
        exit;
    }

    /**
     * @author Leo: subscription success redirection
     * @created: 
    */
    public function partner_subscription_success($sessionId)
    {
        // valid check
        $row = $this->db->select()->where('tokenid', $sessionId)->get('subscription_payment')->row_array();
        if (is_array($row) && count($row) > 0)
        {
            redirect(base_url() . 'partner-subscription');
            return;
        }

        $stripe = new \Stripe\StripeClient($this->stripeKeys['secret_key']);
        $session = $stripe->checkout->sessions->retrieve($sessionId, []);
        if (is_null($session) || !isset($session))
        {
            redirect(base_url() . 'partner-subscription');
        }

        $token = $this->session->userdata('chat_token');
        // $user_info           =   $this->api->get_token_info($token);
        // $wallet          =   $this->api->get_wallet($token);
        // $curren_wallet       =   get_gigs_currency($wallet['wallet_amt'], $wallet['currency_code'], "USD");
        // $user_currency       =   get_user_currency();
        $user_data['token'] = $token;
        $user_data['subscription_id'] = $_REQUEST['sub_id'];
        $user_data['transaction_id'] = $session->id;

        $result = $this->api->subscription_success($user_data);

        $this->session->set_flashdata('success_message', 'Subscribed successfully');

        redirect(base_url() . 'partner-subscription');
    }
    
    /**
     * @author Leo: provider subscription with paypal
     * @created: 
    */
    public function paypal_partner_subscription($subscription_id, $plan_id)
    {
        $paypalKeys = paypalKeys();
        $this->load->model('SubscriptionFee');
        $this->data['subscription'] = $this->SubscriptionFee->getData($subscription_id);
        $this->data['page'] = 'paypal_partner_subscription';
        $this->data['client_id'] = $paypalKeys["client_id"];
        $this->data['subscription_id'] = $subscription_id;
        $this->data['plan_id'] = $plan_id;
        $this->load->vars($this->data);
        $this->load->view($this->data['theme'] . '/template');
    }
}
