<div class="page-wrapper">
	<div class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title m-b-20 m-t-0">User Permission</h4>
                </div>
                <div class="col-sm-4 text-right m-b-20">
                    <a href="<?php echo base_url($theme . '/' . $model . '/create'); ?>" class="btn btn-primary add-button"><i class="fa fa-plus"></i></a>
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
                        <table class="table table-striped table-actions-bar categories_table"  >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style = "padding-right: 90px">User</th>
                                    <th>Phone</th>
                                    <th>Email id</th>
                                    <th>Appling AS</th>
                                    <th>Subscription</th>
                                    <th>Location</th>
                                    <th>Permission</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (!empty($lists)) {
                                    $sno = 1;
                                    foreach ($lists as $row) {
                                        $_id = isset($row['id']) ? $row['id'] : '';
                                        if (!empty($_id)) {

                                            $profile_img = $rows['profile_img'];
                                            if(empty($profile_img)){
                                                $profile_img ='assets/img/user.jpg';
                                            }
                                       
                                            $image = $row['image'];
                                            $title = $row['title'];
                                            $name = substr($row ['name'],0,5);
                                            $phone = $row ['mobileno'];
                                            $email  = $row ['email'];
                                            $location = $row ['country_name'];
                                            $permission = $row ['permission_name'];
                                            $subscription = $row['subscription_name'];
                                            $appling_as = $row['you_are_appling_as'];
                                            $appling = ((empty($appling_as) || !isset(C_APPLINGAS[intval($appling_as)]))?"User":C_APPLINGAS[intval($appling_as)]);
                                            $use_status = 'Inactive';
                                            if (isset($row['status']) && $row['status'] == 1) {
                                                $use_status = 'Active';
                                            }
                                            $created_on = '-';
                                            if (isset($row['created_at'])) {
                                                if (!empty($row['created_at']) && $row['created_at'] != "0000-00-00 00:00:00") {
                                                    $created_on = '<span >' . date('d M Y', strtotime($row['created_at'])) . '</span>';
                                                }
                                            }
                                ?>
                                            <tr>
                                                <td> <?php echo $sno ?></td>
                                                <td style="padding-left: 0px">
                                                    <h2 class="table-avatar">
                                                        <a href="#" class="avatar avatar-sm mr-2">
                                                          <img class="avatar-img rounded-circle" alt="" src="<?php echo base_url().$profile_img ?>"> <?php echo $name ; ?>  </a>
                                                                                                         
                                                    </h2>
                                                </td>
                                                
                                                <td> <?php echo $phone; ?></td>
                                                <td> <?php echo $email; ?></td>
                                                <td> <?php echo $appling; ?></td>
                                                <td> <?php echo $subscription; ?></td>
                                                <td> <?php echo $location; ?></td>
                                                <td> <?php echo $permission; ?></td>                                                       
                                                <td class="text-right">
                                                    <a href="<?php echo base_url().'admin/'.$model.'/edit/' . $_id; ?>" class="btn btn-sm bg-success-light mr-2"><i class="fa fa-edit mr-1"></i> Edit</a>&nbsp;
                                                 
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                        $sno = $sno + 1;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="11">
                                            <p class="text-danger text-center m-b-0">No Records Found</p>
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script type="text/javascript">

    function delete_item(val) {
        bootbox.confirm("Are you sure want to Delete ? ", function(result) {
        if(result == true) {
          var url = base_url + 'admin/<?=$model?>/delete';
          var keyname = "<?php echo $this->security->get_csrf_token_name(); ?>";
          var keyvalue = "<?php echo $this->security->get_csrf_hash(); ?>";
          var tbl_id = val;
          var data = {
            tbl_id: tbl_id
          };
          data[keyname] = keyvalue;
          $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function(res) {
              if(res == 1) {
                window.location = base_url + 'admin/<?=$model?>';
              } else {
                window.location = base_url + 'admin/<?=$model?>';
              }
            }
          });
        }
      });
    }
    $(document).ready(function() {
      $('.delete_item').on('click', function() {
        var id = $(this).attr('data-id');
        delete_item(id);
      });
    });
</script>