<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Add Sub Category</h3>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                    
                <div class="card">
                    <div class="card-body">
                        <form id="add_subcategory" method="post" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select" name="category" id="category">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $rows) { ?>
                                    <option value="<?php echo $rows['id'];?>"><?php echo $rows['category_name'];?></option>
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <input class="form-control" type="text"  name="subcategory_name" id="subcategory_name">
                            </div>
                            <div class="form-group">
                                <label>Sub Category Image</label>
                                <input class="form-control" type="file"  name="subcategory_image" id="subcategory_image">
                            </div>
                            <div class="form-group">
                                <?php 
                                    $uniqueId = hexdec(uniqid());
                                ?>
                                <label>Unique Identification Number</label>
                                <input type="text" name="unique_id" class="form-control" value="<?=$uniqueId?>">
                            </div>
                            <div class="mt-4">
                                <?php if($user_role==1){?>
                                <button class="btn btn-primary" name="form_submit" value="submit" type="submit">Add Subcategory</button>
                                <?php }?>
                                     
                                <a href="<?php echo $base_url; ?>subcategories" class="btn btn-link">Cancel</a>
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
        $('#add_subcategory').bootstrapValidator({
          fields: {
            subcategory_name:   {
              validators: {
                remote: {
                  url: base_url + 'categories/check_subcategory_name',
                  data: function(validator) {
                    return {
                      category: validator.getFieldElements('category').val(),
                      csrf_token_name:csrf_token,
                      subcategory_name: validator.getFieldElements('subcategory_name').val()
                    };
                  },
                  message: 'This sub category name is already exist',
                  type: 'POST'
                },
                notEmpty: {
                  message: 'Please enter sub category name'
                }
              }
            },
            unique_id:   {
              validators: {
                remote: {
                  url: base_url + 'categories/check_subcategory_unique_id',
                  data: function(validator) {
                    return {
                      unique_id: validator.getFieldElements('unique_id').val(),
                      csrf_token_name: csrf_token
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
            subcategory_image: {
               validators: {
                file: {
                  extension: 'jpeg,png,jpg',
                  type: 'image/jpeg,image/png,image/jpg',
                  message: 'The selected file is not valid. Only allowed jpeg,jpg,png files'
                },
                notEmpty:               {
                  message: 'Please upload category image'
                }
              }
            },
            category: {
              validators: {
                notEmpty: {
                  message: 'Please select category'
                }
              }
            }                  
          }
        }).on('success.form.bv', function(e) {
          return true;
        });
    });
</script>