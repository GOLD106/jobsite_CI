<div class="page-wrapper">
	<div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Delivery Categories</h3>
				</div>
				<div class="col-auto text-right">
					<a class="btn btn-white filter-btn mr-3" href="javascript:void(0);" id="filter_search">
						<i class="fa fa-filter"></i>
					</a>
					
					<a href="<?php echo $base_url; ?>add-delivery-category" class="btn btn-primary add-button"><i class="fa fa-plus"></i></a>
				
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Search Filter -->
		<form action="<?php echo base_url()?>delivery-categories" method="post" id="filter_inputs">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    
			<div class="card filter-card">
				<div class="card-body pb-0">
					<div class="row filter-row">
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>Category</label>
								<select class="form-control" name="category">
									<option value="">Select category</option>
									<?php foreach ($list_filter as $cat) { ?>
									<option value="<?=$cat['id']?>"><?php echo $cat['category_name']?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>From Date</label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text" name="from">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<label>To Date</label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text" name="to">
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-3">
							<div class="form-group">
								<button class="btn btn-primary btn-block" name="form_submit" value="submit" type="submit">Submit</button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
		<!-- /Search Filter -->
				
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover table-center mb-0 categories_table" >
								<thead>
									<tr>
										<th>#</th>
										<th>Unique Id</th>
										<th>Category</th>
										<th>Description</th>
										<th>Date</th>
										
										<th class="text-right">Action</th>
									  
									</tr>
								</thead>
								<tbody>
								<?php
								$i=1;
								if(!empty($list)){
								foreach ($list as $rows) {
								if($rows['status']==1) {
									$val='checked';
								}
								else {
									$val='';
								}
								if(!empty($rows['created_at'])){
									$date=date('d-m-Y',strtotime($rows['created_at']));
								}else{
									$date='-';
								}
						   
								echo'<tr>
								<td>'.$i++.'</td>
								<td>'.$rows['unique_id'].'</td>
								<td><img class="avatar-sm rounded mr-1" src="'.base_url().$rows['thumb_image'].'" alt="Category Image"> '.$rows['category_name'].'</td>
								<td>'.$rows['description'].'</td>
								<td>'.$date.'</td>
								<td class="text-right">
									<a href="'.base_url().'edit-delivery-category/'.$rows['id'].'" class="btn btn-sm bg-success-light mr-2">
										<i class="fa fa-edit mr-1"></i> Edit
									</a>
									<a href="javascript:void(0);" onClick="delete_categories($(this).attr(\'data-id\'));" class="on-default remove-row btn btn-sm bg-danger-light mr-2 delete_categories" id="Onremove_'.$rows['id'].'" data-id="'.$rows['id'].'"><i class="fa fa-trash-alt mr-1"></i> Delete</a>
								</td>
								</tr>';
							
								}
								}
								else {
								echo '<tr><td colspan="4"><div class="text-center text-muted">No records found</div></td></tr>';
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
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
      // $('.delete_categories').on('click', function () {
      //   var id = $(this).attr('data-id');
      //   delete_categories(id);
      // });
      BASE_URL = $('#base_url').val();
    });

    function delete_categories(val) {
      bootbox.confirm("Deleting category will also delete its Services! ", function (result) {
        if (result == true) {
          var url = BASE_URL + 'admin/delivery_categories/delete_category';
          var keyname="<?php echo $this->security->get_csrf_token_name(); ?>";
          var keyvalue="<?php echo $this->security->get_csrf_hash(); ?>";
          var category_id = val;
          var data = { 
            category_id: category_id
          };
          data[keyname] = keyvalue;
          $.ajax({
            url: url,
            data: data,
            type: "POST",
            success: function (res) {
              if (res == 1) {
                $("#flash_success_message").show();
                window.location = BASE_URL + 'delivery-categories';
              } else {
                window.location = BASE_URL + 'delivery-categories';
              }
            }
          });
        }
      });
    }
</script>