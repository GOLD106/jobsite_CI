<?php 
	$id = $datalist['id'];
?>
<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h4 class="page-title m-b-20 m-t-0">Edit Blog</h4> </div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="card-box">
						<form class="form-horizontal" id="edit_blog" action="<?php echo base_url('admin/blog/edit/'.$id); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Author</label>
								<div class="col-10">
									<input type="text" class="form-control" name="author" id="author" value="<?=$datalist['author']?>"> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Title</label>
								<div class="col-10">
									<input type="text" class="form-control" name="title" id="title" value="<?=$datalist['title']?>"> 
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Blog Image</label>
								<div class="col-10">
									<input type="file" id="blog-image-file" class="form-control img-upload-input-bs" editor="#img-upload-panel" input-target="#image" target="#blog_image_show" status="#status" passurl="" pshape="square" w=500 h=250 size="{500,250}" style="display: none;" />
									<input type="hidden" name="blog_image" id="image">
									<button type="button" name="blog_image_upload" id="blog-image-upload" class="btn btn-primary">Choose File</button>
        							<img src="<?=base_url().$datalist['image']?>" style="max-width: 100px; max-height: 50px;" alt="" id="blog_image_show"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Content</label>
								<div class="col-12">
									<textarea class="form-control" name="content" id="ck_editor_textarea_id">
										<?=$datalist['content']?>
									</textarea>
									<?php echo display_ckeditor($ckeditor_editor1);  ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-3 control-label">Status</label>
								<div class="col-10">
									<div class="radio radio-primary radio-inline">
										<input type="radio" id="academy_status1" value="1" name="status" <?=$datalist['status']==1?"checked=\"checked\"":""?>>
										<label for="academy_status1">Active</label>
									</div>
									<div class="radio radio-danger radio-inline">
										<input type="radio" id="academy_status2" value="0" name="status" <?=$datalist['status']==0?"checked=\"checked\"":""?>>
										<label for="academy_status2">Inactive</label>
									</div>
								</div>
							</div>
							<div class="m-t-30 text-center">
								<button name="form_submit" type="submit" class="btn btn-primary center-block" value="true">Save Changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Using Bootstrap Modal -->
<div class="modal fade" id="img-upload-panel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Upload Blog Image</h4>
            <button type="button" class="img-remove-btn-bs close">&times;</button>
        </div>
        <div class="modal-body">
            <div class="row container">
            <div class="col">
                <div class="img-edit-container"></div>
            </div>
            </div>
            <div class="row container">
            <div class="col">
                <label>Brightness</label>
                <input type="range" class="form-control-range filter" min=0 max=200 value=100 step=1 filter="brightness"/>
            </div>
            <div class="col">
                <label>Threshold</label>
                <input type="range" class="form-control-range filter" min=0 max=200 value=100 step=1 filter="threshold"/>
            </div>
            </div>
            <div class="row container">
            <div class="col">
                <button type="button" class="btn btn-dark filter" filter="grayscale">Grayscale</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-dark filter" filter="sharpen">Sharpen</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-dark filter" filter="blur">Blur</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-dark img-clear-filter">Clear</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-dark img-rotate-left">Rotate Left</button>
            </div>
            <div class="col">
                <button type="button" class="btn btn-dark img-rotate-right">Rotate Right</button>
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary img-remove-btn-bs">Close</button>
            <button type="button" class="btn btn-primary img-upload-btn-bs">Upload</button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var csrf_token=$('#admin_csrf').val();
		$('#edit_blog').bootstrapValidator({
		  fields: {
		    author:   {
		      validators: {
		        notEmpty: {
		          message: 'Please enter author name'

		        }
		      }
		    },
		    title: {
		      validators: {
		        notEmpty: {
		          message: 'Please enter blog title'
		        }
		      }
		    },
		    image: {
		       validators: {
		        file: {
		          extension: 'jpeg,png,jpg',
		          type: 'image/jpeg,image/png,image/jpg',
		          message: 'The selected file is not valid. Only allowed jpeg,jpg,png files'
		        },
		        // notEmpty: {
		        //   message: 'Please upload Blog image'
		        // }
		      }
		    },
		    content:   {
		      validators: {
		        notEmpty: {
		          message: 'Please enter blog content'
		        }
		      }
		    },

		  }
		}).on('success.form.bv', function(e) {
		  return true;
		});   

		$("#blog-image-upload").on("click", function() {
			$("#blog-image-file").click();
		});
	});
</script>