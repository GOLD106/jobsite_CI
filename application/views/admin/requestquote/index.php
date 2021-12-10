<div class="page-wrapper">
	<div class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title m-b-20 m-t-0">Request for Quote</h4>
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Category</th> 
                                    <th>Address</th>
                                    <th>Skills</th>
                                    <th>Comment</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $applyingAs = C_APPLINGAS;
                                asort($applyingAs, SORT_STRING);

                                 
                           

                                if (!empty($lists)) {
                                    $sno = 1;
                                    foreach ($lists as $row) {
                                        $_id = isset($row['id']) ? $row['id'] : '';
                                        
                                                                                 
                                ?>
                                            <tr>
                                                <td> <?php echo $sno ?></td>
                                                <td> <?php echo $row['name']; ?></td>
                                                <td> <?php echo $row['email']; ?></td>
                                                <td> <?php echo $row['phone_number'] ?></td>
                                                <td> <?php echo $row['category_name']; ?></td>
                                                <td> <?php echo $row['address']; ?></td>
                                                <td> <?php echo $row['skills']; ?></td>
                                                <td> <?php echo $row['comment']; ?></td>
                                                <td class="text-right">
                                                    <a href="javascript:void(0)" class="on-default remove-row btn btn-sm bg-danger-light mr-2 delete_item" id="Onremove_<?php echo $_id; ?>" data-id="<?php echo $_id; ?>"><i class="fa fa-trash-alt mr-1"></i> Delete</a>
                                                </td>
                                            </tr>
                                    <?php
                                        
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
          var url = base_url + 'admin/requestQuote/delete';
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
                window.location = base_url + 'admin/requestQuote';
              } else {
                window.location = base_url + 'admin/requestQuote';
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