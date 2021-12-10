<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<h4 class="page-title m-b-20 m-t-0">Create Transaction Fee</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 offset-xl-2">
					<div class="card">
						<div class="card-body">
							<form class="form-horizontal" id="create_fee" method="POST" enctype="multipart/form-data">
								<!-- <div class="form-group">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

									<label class=" control-label">ID</label>
									<input type="number" class="form-control" name="service_num" value="<?= isset($feeAry['name']) ? $feeAry['service_name'] : '' ?>">
								</div> -->
								<div class="form-group">
									<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

									<label class="control-label">Service Name</label>
									<input type="text" class="form-control" name="service_name" value="<?= isset($feeAry['service_name']) ? $feeAry['service_name'] : '' ?>">
								</div>
								<div class="form-group">
									<label class="control-label">Transaction ID</label>
									<input type="text" class="form-control" name="transaction_id" value="<?= isset($feeAry['transaction_id']) ? $feeAry['transaction_id'] : '' ?>">
								</div>
								<div class="form-group">
									<label class=" control-label">Date</label>
									<input type="date" class="form-control" name="transaction_date" placeholder="0.00" value="<?= isset($feeAry['transaction_date']) ? $feeAry['transaction_date'] : '' ?>">
								</div>
								<div class="form-group">
									<label class=" control-label">Currency</label>
									<input type="text" class="form-control" name="currency" placeholder="0.00" value="<?= isset($feeAry['currency']) ? $feeAry['currency'] : '' ?>">
								</div>
								<div class="form-group">
									<label class=" control-label">Amount</label>
									<input type="number" class="form-control" name="amount" placeholder="0.00" value="<?= isset($feeAry['amount']) ? $feeAry['amount'] : '' ?>">
								</div>
								
								<div class="mt-4">
									<?php if ($user_role == 1) { ?>
										<button class="btn btn-primary " name="form_submit" value="submit" type="submit">Submit</button>
									<?php } ?>
									<a href="<?php echo $base_url; ?>admin/transaction" class="btn btn-link">Cancel</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {	

    $('#create_fee').bootstrapValidator({
        fields: {
          	service_name: {
            	validators: {
              		notEmpty: {
                		message: 'Please insert Service Name'
              		}
            	}
          	},
          	transaction_id: {
            	validators: {
              		notEmpty: {
                		message: 'Please insert Transaction Id'
              		}
            	}
          	},
          	transaction_date: {
            	validators: {
              		notEmpty: {
                		message: 'Please insert Transaction Date'
              		}
            	}
          	},
          	currency: {
            	validators: {
              		notEmpty: {
                		message: 'Please enter currency'
              		}
            	}
          	},
          	amount: {
            	validators: {
            		between: {
                        min: 1,
                        max: 100,
                        message: 'Fee Value must be between 0.00 and 100.00'
                    },
              		notEmpty: {
                		message: 'Please insert Fee Value'
              		}
            	}
          	},
        }
    }).on('success.form.bv', function(e) {
        return true;
    });
});
</script>
