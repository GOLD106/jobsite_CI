<div class="page-wrapper">
	<div class="content container-fluid">
	
		<div class="row">
			<div class="col-xl-8 offset-xl-2">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Edit Category</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<div class="card">
					<div class="card-body">
                        <form id="update_category" method="post" autocomplete="off" enctype="multipart/form-data">
                        	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" type="text" value="<?php echo $categories['category_name'];?>"  name="category_name" id="category_name" >
								<input class="form-control" type="hidden" value="<?php echo $categories['id'];?>"  name="category_id" id="category_id">
                            </div>
                            <div class="form-group">
                                <label>Category Image</label>
                                <input class="form-control" type="file"  name="category_image" id="category_image">
                            </div>
                            <div class="form-group">
								<div class="avatar">
									<img class="avatar-img rounded" alt="" src="<?php echo base_url().$categories['category_image'];?>">
								</div>
                            </div>
                            <div class="form-group">
                                <label>Card Image</label>
                                <input class="form-control" type="file"  name="card_image" id="card_image">
                            </div>
                            <div class="form-group">
								<div class="avatar">
									<img class="avatar-img rounded" alt="" src="<?php echo base_url().$categories['card_image'];?>">
								</div>
                            </div>
                            <div class="form-group">
                                <label>Category Icon</label>
                                <input class="form-control" type="file"  name="icon" id="icon">
                            </div>
                            <div class="form-group">
								<div class="avatar">
									<img class="avatar-img rounded" alt="" src="<?php echo base_url().$categories['icon'];?>">
								</div>
                            </div>
                            <div class="form-group">
                                <label>Category Mobile Icon</label>
                                <input class="form-control" type="file"  name="category_mobile_icon" id="category_mobile_icon">
                            </div>
                            <div class="form-group">
								<div class="avatar">
									<img class="avatar-img rounded" alt="" src="<?php echo base_url().$categories['category_mobile_icon'];?>">
								</div>
                            </div>
                            <div class="form-group">
								<label>Unique Identification Number</label>
								<input type="text" name="unique_id" value="<?php echo $categories['unique_id'];?>" class="form-control">
							</div>
							<div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control"  name="description" id="description" style="height:60px;"><?php echo $categories['description'];?></textarea>
                            </div>
                            <div class="mt-4">
                            	<?php if($user_role==1){?>
                                <button class="btn btn-primary" name="form_submit" value="submit" type="submit">Save Changes</button>
                                <?php }?>

								<a href="<?php echo $base_url; ?>categories"  class="btn btn-link">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var csrf_token=$('#admin_csrf').val();
		$('#update_category').bootstrapValidator({
		  fields: {
		    category_name:   {
		      validators: {
		        remote: {
		          url: base_url + 'categories/check_category_name',
		          data: function(validator) {
		            return {
		              category_name: validator.getFieldElements('category_name').val(),
		              csrf_token_name:csrf_token,
		              category_id: validator.getFieldElements('category_id').val()
		            };
		          },
		          message: 'This category name is already exist',
		          type: 'POST'
		        },
		        notEmpty: {
		          message: 'Please enter category name'

		        }
		      }
		    },
		    unique_id:   {
		      validators: {
		        remote: {
		          url: base_url + 'categories/check_unique_id',
		          data: function(validator) {
		            return {
		              unique_id: validator.getFieldElements('unique_id').val(),
		              csrf_token_name:csrf_token,
		              category_id: validator.getFieldElements('category_id').val()
		            };
		          },
		          message: 'This Unique Id is already exist',
		          type: 'POST'
		        },
		        notEmpty: {
		          message: 'Please enter Unique Id'
		        }
		      }
		    },
		    category_image: {
		       validators: {
		        file: {
		          extension: 'jpeg,png,jpg',
		          type: 'image/jpeg,image/png,image/jpg',
		          message: 'The selected file is not valid. Only allowed jpeg,jpg,png files'
		        },
		        // notEmpty: {
		        //   message: 'Please upload category image'
		        // }
		      }
		    },
		    icon: {
		       validators: {
		        file: {
		          extension: 'jpeg,png,jpg',
		          type: 'image/jpeg,image/png,image/jpg',
		          message: 'The selected file is not valid. Only allowed jpeg,jpg,png files'
		        },
		        // notEmpty: {
		        //   message: 'Please upload category icon'
		        // }
		      }
		    },
		    card_image: {
		       validators: {
		        file: {
		          extension: 'jpeg,png,jpg',
		          type: 'image/jpeg,image/png,image/jpg',
		          message: 'The selected file is not valid. Only allowed jpeg,jpg,png files'
		        },
		      }
		    },
		    category_mobile_icon: {
		       validators: {
		        file: {
		          extension: 'jpeg,png,jpg',
		          type: 'image/jpeg,image/png,image/jpg',
		          message: 'The selected file is not valid. Only allowed jpeg,jpg,png files'
		        },
		      }
		    },

		  }
		}).on('success.form.bv', function(e) {
		  return true;
		});   
	});
</script>