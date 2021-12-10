<div class="page-wrapper">
	<div class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title m-b-20 m-t-0">Company Management</h4>
                </div>
                <!-- <div class="col-sm-4 text-right m-b-20">
                    <a href="<?php echo base_url($theme . '/' . $model . '/create'); ?>" class="btn btn-primary add_whitelabel">Add</a>
                </div> -->
            </div>
            <?php
            if ($this->session->userdata('message')) {
                echo $this->session->userdata('message');
            }
            ?>
            <div class="panel pt-4">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-actions-bar categories_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name/Company</th>
                                    <th>Subscription</th>
                                    <th>Price</th>
                                    <!-- <th>Payment Method</th> -->
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i=0;
                                    foreach($lists as $list) {
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $list['name'] ?></td>
                                    <td><?php echo $list['subscription_name']?></td>
                                    <td><?php echo $list['subscription_fee'].' '.$list['subscription_currency']?></td>
                                    <!-- <td>
                                        <?php if($list['subscription_type'] == 1) { ?>
                                            <?php echo 'Stripe'?>
                                        <?php 
                                            } 
                                        if($list['subscription_type'] == 2) {?>
                                            <?php echo 'PayPal'?>
                                        <?php }?>
                                    </td> -->
                                    <td><?php echo $list['subscription_expiry_date_time']?></td>
                                    <td>
                                        <?php if($list['subscription_type'] == 1 || $list['subscription_type'] == 2) { ?>
                                            <?php echo 'Confirmed'?>
                                        <?php 
                                                }
                                        else { ?>
                                            <?php echo '' ?>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align:center">
                                        <input onclick="permitFun(<?php echo $list['id'] ?>)" type="checkbox" id="status<?php echo $list['id'] ?>" value="second_checkbox" >
                                    </td>
                                   
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        let csrf_token=$('#admin_csrf').val();
    });
    
    <?php 
        foreach($status as $sta) {
    ?>
        $('#status<?php echo $sta['user_id'] ?>')[0].checked = true;
    <?php } ?>

    function permitFun(id) {
        let csrf_token = $('#admin_csrf').val();
        let checkbox = $('#status'+id);
        if (checkbox[0].checked != false) {
            toaster_msg("info", "You gave a permission to company successfully!");
            $("input[name='promo_code']").focus();
            $.ajax({
                url: '../../admin/companymanagement/permission_management',
                type: 'POST',
                data: {
                    status: true,
                    id: id,
                    csrf_token_name: csrf_token
                },
                success: function(response) {
                    temp = JSON.parse(response)
                    
                }               
            });
        }else{
            $.ajax({
                url: '../../admin/companymanagement/permission_management',
                type: 'POST',
                data: {
                    status: false,
                    id, id,
                    csrf_token_name: csrf_token
                },
                success: function(response) {
                    let temp = JSON.parse(response)
                }               
            });
        }
    }
    function toaster_msg(status, msg) {

        setTimeout(function() {
            Command: toastr[status](msg);

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "3000",
                "hideDuration": "5000",
                "timeOut": "6000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }, 300);
    }
</script>    
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toaster/toastr.min.css">
<script src="<?php echo base_url();?>assets/plugins/toaster/toastr.min.js"></script>

