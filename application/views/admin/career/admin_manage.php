<div class="page-wrapper">
	<div class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title m-b-20 m-t-0">Career Management</h4>
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
                                    <th>Country Name</th>
                                    <th>Phone</th>
                                    <th>Skill</th>
                                    <th>User Address</th>
                                    <th>Appling</th>
                                    <th>Upload File</th>
                                    <th>Service</th>
                                    <th>Created Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($lists)) {

                                 
                                 
                                    $sno = 1;
                                    foreach ($lists as $row) {
                                        $_id = isset($row['id']) ? $row['id'] : '';
                                        if (!empty($_id)) {
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $country_name = $row['country_name'];
                                            $phone = $row['phone_number'];
                                            $skill_name = $row['skill_name'];
                                            $address = $row['user_address'];
                                            $appling_as = $row['appling_as'];
                                            $upload_file = $row['upload_file'];
                                            $service_title = $row['service_title'];
                                           

                                           
                                            
                                            if (isset($row['active']) && $row['active'] == 1) {
                                                $use_status = 'Active';
                                            }  

                                            if (isset($row['active']) && $row['active'] == 0) {
                                                $use_status = 'Deactive';
                                            }

                                            $created_on = '-';
                                            if (isset($row['created_date'])) {
                                                if (!empty($row['created_date']) && $row['created_date'] != "0000-00-00 00:00:00") {
                                                    $created_on = '<span >' . date('d M Y', strtotime($row['created_date'])) . '</span>';
                                                }
                                            }
                                ?>
                                            <tr>
                                                <td> <?php echo $sno ?></td>
                                                <td> <?php echo $name; ?></td>
                                                <td> <?php echo $email; ?></td>
                                                <td> <?php echo $country_name; ?></td>
                                                <td> <?php echo $phone; ?></td>
                                                <td> <?php echo $skill_name; ?></td>
                                                <td> <?php echo $address; ?></td>
                                                <td> <?php echo $appling_as; ?></td>
                                                <td> <?php echo $upload_file; ?></td>
                                                <td> <?php echo $service_title; ?></td>
                                                <td> <?php echo $created_on; ?></td>
                                                
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
