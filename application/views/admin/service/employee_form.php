<?php
$country_list=$this->db->where('status',1)->order_by('country_name',"ASC")->get('country_table')->result_array();
?>
<style type="text/css">
    a.dropdown-item {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="<?=base_url()?>assets/css/<?=TEMPLATE_THEME?>/style.css">
<div class="page-wrapper">
	<div class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title m-b-20 m-t-0">Employee List</h4>
                </div>
                <div class="col-sm-4 text-right m-b-20">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_employee_modal">Add Employee</button>
                    <!-- <a href="<?php echo base_url($theme . '/' . $model . '/create'); ?>" class="btn btn-primary add-button"><i class="fa fa-plus"></i></a> -->
                </div>
            </div>
            <?php
            if ($this->session->userdata('message')) {
                echo $this->session->userdata('message');
            }
            ?>
            <div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions-bar categories_table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>House name</th>
                                    <th>Street Address</th>
                                    <th>City</th>
                                    <!-- <th>Status</th> -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!empty($employees)){
                                        foreach ($employees as $employee) {
                                    ?>
                                <tr>
                                    <td><lable><?php echo $employee['name']." ".$employee['l_name']; ?></lable></td>
                                    <td><lable><?php echo $employee['email']; ?></lable></td>
                                    <td><lable><?php echo $employee['mobileno']; ?></lable></td>
                                    <td><lable><?php echo $employee['house_name']; ?></lable></td>
                                    <td><lable><?php echo $employee['street_address']; ?></lable></td>
                                    <td><lable><?php echo $employee['city']; ?></lable></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top" title="" data-original-title="Actions"></i>
                                            Action
                                        </button>  
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="">
                                            <a class="dropdown-item edit-employee" data-target="#add_employee_modal" employee_id='<?php echo $employee['id'] ?>' ><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                                            <a class="dropdown-item text-danger" onclick='remove_employee_info(<?php echo $employee["id"] ?>)'><i class="bx bxs-trash mr-2"></i> Remove</a>
                                        </div>                        
                                    </td>
                                </tr>
                                    <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- employee add modal -->
<div class="modal account-modal fade multi-step" id="add_employee_modal" data-keyboard="false" data-backdrop="static">
    <div class=" modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-0 border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <div class="header-content-blk text-center">
                <div class="alert alert-success text-center" id="flash_succ_message2" ></div>
            </div> -->
            <div class="modal-body step-1" data-step="1">
                <div class="account-content">
                    <div class="account-box">
                        <div class="login-right">
                            <div class="login-header">
                                <h3></h3>
                            </div>
                            <form method='post' id="add_employee_form">
                                <h3><strong>Personal Details</strong></h3>
                                <div class="row">
                                   <div class="form-group col-md-6 mt-3">
                                        <label>First Name</label>
                                        <input type="text" class="form-control border-dark" name="userName" minlength="3">
                                    </div>
                                   <div class="form-group col-md-6 mt-3">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control border-dark" name="last_name" minlength="3">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label>Email</label>
                                        <input type="email" class="form-control border-dark" name="userEmail">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label>Password</label>
                                        <input type="password" class="form-control border-dark" name="userPassword">
                                    </div>

                                    <div class="form-group col-md-6 mt-3">
                                        <label>Postal Code/zipcode</label>
                                        <input type="text" name="postal_code" class="form-control border-dark" Placeholder="Enter Postal Code">
                                    </div>

                                    <input type="hidden" class="form-control" name="you_are_appling_as" value="<?=C_YOUARE_EMPLOYEE?>" >

                                    <h3 class="col-md-12 mt-3"><strong>Mailing Address</strong></h3>
                                    <div class="form-group col-md-4 mt-3">
                                        <label>House name</label>
                                        <input type="text" name="house_name" value="" placeholder="Enter Street Address" class="form-control border-dark">
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label>House or flat number</label>
                                        <input type="text" name="house_number" value="" placeholder="House or flat number" class="form-control border-dark">
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label>Street Address</label>
                                        <input type="text" name="street_address" value="" placeholder="Enter Street Address" class="form-control border-dark">
                                    </div>

                                    <div class="form-group col-md-4 mt-3">
                                        <label>City</label>
                                         <input type="text" name="city" value="" placeholder="Enter City" class="form-control border-dark">
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label>County/ Province</label>
                                        <input type="text" name="province" value="" placeholder="Enter Province" class="form-control border-dark">
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label>Postal Code</label>
                                        <input type="text" name="postal_code2" value="" placeholder="Enter Postal Code" class="form-control border-dark">
                                    </div>
                                    <div class="form-group col-md-4 mt-3">
                                        <label>Mobile Code</label>
                                        <select name="countryCode" class="form-control countryCode final_country_code">
                                            <?php
                                                foreach ($country_list as $key => $country) {
                                                    ?>
                                            <option data-countryCode="<?=$country['country_code'];?>" value="<?=$country['country_id'];?>"><?=$country['country_name'];?></option>
                                                    <?php 
                                                } 
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label>Mobile Number</label>
                                        <input type="text" class="form-control user_final_no user_mobile border-dark" placeholder="Enter Mobile No" name="userMobile">
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="hidden" name="employee_id" >
                                        <input type="hidden" name="user_id" >
                                        <button id="registration_submit_employee" type="submit" class="login-btn btn">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script type="text/javascript">

//remove_employee_info
function remove_employee_info(employee_id)
{
    var csrf_token = $('#admin_csrf').val();
    if( !confirm('Are you sure?'))  return false;
    $.ajax({
        type: "POST",
        url: base_url + "admin/service/ajax_remove_employee",
        data: {
            csrf_token_name: csrf_token,
            employee_id : employee_id
        },
        success: function(data) {
            data = JSON.parse(data);
            if(data.result=='ok'){
                // alert("employee has been removed successfully.");
                toaster_msg('info', "employee has been removed successfully.");
                window.location.reload();
            }else{
                // alert("Failed. employee has not been removed.");
                toaster_msg("error", "Failed. employee has not been removed.");
                window.location.reload();
            }
        }
    });
}

function update_status(obj){
    var status = 1;
    if(obj.checked) {
        status = 1;
    } else {
        status = 2;
    }
    var employee_id = $(obj).attr('data-id');
    var user_id = $(obj).attr('data-userid');

    var csrf_token = $('#csrf_token').val();
    $.ajax({
        type:'POST',
        url: '<?php echo base_url(); ?>organization/employee/update_employee_status',
        data :  {
                employee_id:employee_id,
                user_id:user_id,
                status:status,
                csrf_token_name: csrf_token,
            },
        dataType:'json',
        success:function(response)
        {                  
            if(response.success) { 
                alert("Updated Success.");
            } else {    
                alert('Update Status Failed');
            }
        }
    }); 
}

var keep_stsff_information_flag = 0;
$(document).ready(function(){   

    $('#add_employee_modal').on('show.bs.modal', function (e) {
        // console.log('Showing employee\'s Information Modal');

        if(keep_stsff_information_flag==0)
        {
            $('.login-header h3').html('Add Employee');
            $('#add_employee_form')[0].reset();
            $('#add_employee_form').bootstrapValidator('enableFieldValidators',  'userPassword', 'notEmpty');
        }
        else
        {
            $('.login-header h3').html('Edit Employee');
            $('#add_employee_form').bootstrapValidator('enableFieldValidators',  'userPassword', false, 'notEmpty');
        }
            
        keep_stsff_information_flag = 0;
    });

    $('.edit-employee').click( function(e) {
        var employee_id = $(this).attr('employee_id');
       // return e.preventDefault() // stops modal from being shown
       
       $.ajax({
            type: "POST",
            url: base_url + "admin/service/ajax_employee_info",
            //dataType:'json',
            data: {
                employee_id : employee_id,
                csrf_token_name: csrf_token,
            },
            beforeSend: function() {
            },
            success: function(data) {
                try{
                    data = JSON.parse(data);
                    
                    if(data.result=='ok'){
                        // console.log(data.data);
                        $('[name="employee_id"]').val(data.data.id);
                        $('[name="user_id"]').val(data.data.id);
                        $('[name="userName"]').val(data.data.name);
                        $('[name="last_name"]').val(data.data.l_name);
                        $('[name="userEmail"]').val(data.data.email);
                        $('[name="house_name"]').val(data.data.house_name);
                        $('[name="street_address"]').val(data.data.street_address);
                        $('[name="city"]').val(data.data.city);
                        $('[name="userMobile"]').val(data.data.mobileno);
                        $('[name="province"]').val(data.data.province);
                        $('[name="postal_code"]').val(data.data.postal_code);
                        $('[name="postal_code2"]').val(data.data.postal_code2);
                        $('[name="house_number"]').val(data.data.house_number);
                        $('[name="userPassword"]').val('');
                        $('[name="countryCode"]  option[value="'+data.data.country_code+'"]').prop('selected', true);
                        // -- you_are_appling_as
                    }else{
                        alert("The employee information could not get.");
                        return;
                    }
                }
                catch(ee)
                {
                    console.log(ee);
                    return;
                }

                keep_stsff_information_flag = 1;
                $('#add_employee_modal').modal('show');
            },
            error: function(obj, error, description) {

            }
        });
        
    });

    var checked = ''; 
    var base_url = $('#base_url').val();
    var csrf_token = $('#admin_csrf').val();
    
    $('#add_employee_form').bootstrapValidator({
        excluded: ':disabled',
        fields: {
            userName: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter your name ..'
                    }
                }
            },
            userEmail: {
                validators: {
                    remote: {
                        url: base_url + 'user/login/email_chk_user',
                        data: function(validator) {
                            return {
                                userEmail: validator.getFieldElements('userEmail').val(),
                                user_id : $('[name="user_id"]').val(),
                                csrf_token_name: csrf_token
                            };
                        },
                        message: 'This email is already exist...',
                        type: 'POST'
                    },
                    notEmpty: {
                        message: 'Please Enter Email Address...'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    },
                }
            },
            userPassword: {
                validators: {
                    notEmpty: {
                        message: 'Please Enter the employee\'s password ..'
                    }
                }
            },
            userMobile: {
                validators: {
                    remote: {
                        url: base_url + 'user/login/mobileno_chk_user',
                        data: function(validator) {
                            return {
                                user_id : $('[name="user_id"]').val(),
                                userMobile: validator.getFieldElements('userMobile').val(),
                                countryCode: validator.getFieldElements('countryCode').val(),
                                csrf_token_name: csrf_token
                            };
                        },
                        message: 'This mobile number is already exist or invalid..',
                        type: 'POST'
                    },
                    notEmpty: {
                        message: 'Please Enter Mobile Number'
                    },
                    regexp: {
                        regexp: /^[1-9][0-9]{5,15}$/,
                        message: "Invalid Mobile Number"
                    },
                }
            },
        }
    }).on('success.form.bv', function(e) {
        
        var userName = $('[name="userName"]').val();
        var last_name = $('[name="last_name"]').val();
        var userEmail = $('[name="userEmail"]').val();
        var userPassword = $('[name="userPassword"]').val();
        var postal_code = $('[name="postal_code"]').val();
        var you_are_appling_as = $('[name="you_are_appling_as"]').val();
        var house_name = $('[name="house_name"]').val();
        var house_number = $('[name="house_number"]').val();
        var street_address = $('[name="street_address"]').val();
        var city = $('[name="city"]').val();
        var province = $('[name="province"]').val();
        var postal_code2 = $('[name="postal_code2"]').val();
        var userMobile = $('[name="userMobile"]').val();
        var countryCode = $('[name="countryCode"]').val();

        var employee_id = $('[name="employee_id"]').val();
        var user_id = $('[name="user_id"]').val();
        // console.log(user_id);
        $.ajax({
            type: "POST",
            url: base_url + "admin/service/add_employee",
            dataType:'json',
            data: {
                'name': userName,
                'l_name': last_name,
                'email': userEmail,
                'password': userPassword,
                'postal_code': postal_code,
                'you_are_appling_as': you_are_appling_as,
                'house_name': house_name,
                'house_number': house_number,
                'street_address': street_address,
                'city': city,
                'province': province,
                'postal_code2': postal_code2,
                'country_code': countryCode,
                'csrf_token_name': csrf_token,
                'mobileno': userMobile,
                "employee_id" : employee_id,
                "user_id" : user_id
            },
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                hideLoader();
                // data = JSON.parse(data);
                // console.log(data)
                if(data.result == "ok" || data.result == true){
                    // alert("Regist Success.");
                    toaster_msg("info", "employee Registed successfully")
                    window.location.reload();
                }else{
                    // alert("Failed.");
                    toaster_msg("error", "Register Failed")
                    window.location.reload();
                }
            }
        });
        
        return false;
    });

});
</script>