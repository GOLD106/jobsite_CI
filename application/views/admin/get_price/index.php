<div class="page-wrapper">
	<div class="content container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h4 class="page-title m-b-20 m-t-0">Guest User Data Store</h4>
                </div>
                <div class="col-sm-4 text-right m-b-20">
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Service</th>
                                    <th>Booking Date</th>
                                    <th>Booking Time</th>
                                    <th>Booking Description</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($lists)) {
                                    $sno = 1;
                                    foreach ($lists as $row) {
                                        $_id = isset($row['id']) ? $row['id'] : '';
                                        if (!empty($_id)) {
                                            $booking_date = date('d M Y', strtotime($row['booking_date']));
                                            $created_on = '-';
                                            if (isset($row['created_at'])) {
                                                if (!empty($row['created_at']) && $row['created_at'] != "0000-00-00 00:00:00") {
                                                    $created_on = '<span >' . date('d M Y H:i:s', strtotime($row['created_at'])) . '</span>';
                                                }
                                            }
                                ?>
                                            <tr>
                                                <td> <?php echo $sno ?></td>
                                                <td> <?php echo $row['name']; ?></td>
                                                <td> <?php echo $row['email']; ?></td>
                                                <td> <?php echo $row['address']; ?></td>
                                                <td> <?php echo $row['phonenumber']; ?></td>
                                                <td><img class="rounded cell-img mr-1" src="<?php echo base_url().$row['service_thumb_image']; ?>" alt=""> <?php echo $row['service_title']; ?></td>
                                                <td> <?php echo $booking_date; ?></td>
                                                <td> <?php echo $row['booking_time']; ?></td>
                                                <td> <?php echo $row['booking_description']; ?></td>
                                                <td> <?php echo $created_on ?></td>
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