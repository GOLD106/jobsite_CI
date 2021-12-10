<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<h4 class="page-title m-b-20 m-t-0">Create Gift and Points</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<div class="card">
						<div class="card-body">
							<form class="form-horizontal" id="edit_fee" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

									<label class=" control-label">Gift Title</label>
									<input type="text" class="form-control" name="title" value="">
								</div>
								<div class="form-group">
									<label>Gift Image</label>
									<input class="form-control" type="file"  name="gift_image" id="gift_image">
								</div>
								<div class="mt-4">
									<button class="btn btn-primary " name="form_submit" value="submit" type="submit">Submit</button>
									<a href="<?php echo $base_url; ?>admin/gift" class="btn btn-link">Cancel</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
