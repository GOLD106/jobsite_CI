<style>

 .subscription-container {
	 display: flex;
	 justify-content: space-between;
	 width: 100%;
}
 .subscription__title, .subscription__main-feature, .subscription__price {
	 text-transform: uppercase;
	 font-family: 'Open Sans', sans-serif;
	 margin-top: 0;
	 margin-bottom: 0;
	 color: #85a9c1;
}
 .subscription__main-feature {
	 font-size: 50px;
}
 .subscription__price {
	 text-transform: lowercase;
}
.subscription__button {
	display: flex;
	flex-direction: column;
	align-items: center;
	width: 170px;
	border-radius: 5px;
	background: #FFFBFB;
	box-shadow: 0px 0px 20px -10px rgb(0 0 0 / 40%);
	transition: transform 0.5s;
}
.subscription__button:before {
	display: block;
	width: 24px;
	height: 24px;
	border-radius: 50%;
	border: solid 3px #cdd1d5;
	transform: translateY(-30%);
}

/* Signature */
 .signature {
	 color: #85a9c1;
	 font-family: Roboto, sans-serif;
	 padding-top: 25px;
}
 .signature__name {
	 transition: 0.5s;
	 color: #6e8ca0;
	 text-decoration: none;
}
 .signature__name:hover {
	 color: #1e6583;
	 text-decoration: underline;
	 transition: 0.5s;
}
 .svg-icon {
	 width: 1em;
	 height: 1em;
	 animation: pulse-animation 0.5s alternate infinite;
	 fill: #ba2632;
}
 @keyframes pulse-animation {
	 to {
		 transform: scale(1.2);
	}
}
.subscription {
	width: 100%;
	background: #fff;
	border-radius: 10px;
	padding: 20px;
	display: table;
	box-shadow: 0 0 7px 0 #a3a3a3;
}
.container {
	padding-top: 5%;
}
.subscription-pentagon {
	width: 170px;
	height: 134px;
	background: #6D2C77;
	position: relative;
}
.subscription-pentagon:before {
	content: '';
	position: absolute;
	top: 100%;
	border-left: 85px solid transparent;
	border-right: 85px solid transparent;
	border-top: 45px solid #6D2C77;
}

.radio {
	margin: 1rem;
}
.radio input[type="radio"] {
	position: absolute;
	opacity: 0;
}
.radio input[type="radio"] + .radio-label:before {
	background: #f4f4f4;
	border-radius: 100%;
	border: 1px solid green;
	display: inline-block;
	width: 150px;
	height: 150px;
	position: relative;
	top: -0.2em;
	margin-right: 1em;
	vertical-align: top;
	cursor: pointer;
	text-align: center;
	transition: all 250ms ease;
}
.radio input[type="radio"]:checked + .radio-label:before {
	background-color: green;
	box-shadow: inset 0 0 0 4px #f4f4f4;
}
.radio input[type="radio"]:focus + .radio-label:before {
	outline: none;
	border-color: green;
}
.radio input[type="radio"]:disabled + .radio-label:before {
	box-shadow: inset 0 0 0 4px #f4f4f4;
	border-color: green;
	background: green;
}
.radio input[type="radio"] + .radio-label:empty:before {
	margin-right: 0;
	
}
.checkbox-group {
	text-align: center;
	padding-top:20%;
}
.rounded-checkbox {
	width: 50px;
	height: 20px;
	cursor: pointer;
}
.fa-check {
	color: green;
	padding: 3%;
}
.fa-remove {
	padding:3%;
}
.plan-time {
	margin-top: 2%;
	width: 379px;
	height: 51px;
	background: #F9F9F9 0% 0% no-repeat padding-box;
	opacity: 1;
	padding-top: 4%;
	padding-left: 4%;

}
</style>

<section class="hero-section" style="position: sticky">
    <div class="layer">
        <div class="subscription-banner"></div>	
				<div class="Rectangle-banner"></div>
        <div class="container">
            <div class="row">          
                <div class="col-lg-9 con" style="text-align: center; color: white; padding-top: 10%">
                  <h1>Subscription</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
	<div class="subscription">
		<div style="text-align:center; padding: 3%;">
			<h2> Choose Tazzer Group Subscribe Plan </h2>
		</div>
		<div class="subscription-container">
			<div>
				<h2 style="padding-bottom: 30%"> Tazzer Group Subscribe Plan </h2>
				<div class="plan-time" style="margin-bottom: 10%"> <h3>Plans Time</h3> </div>
				<div class="plan-time"> <h3>Plans Table Slides for PowerPoint</h3> </div>
				<div class="plan-time"> <h3>Plans Table Slides for PowerPoint</h3> </div>
				<div class="plan-time"> <h3>Plans Table Slides for PowerPoint</h3> </div>
				<div class="plan-time"> <h3>Plans Table Slides for PowerPoint</h3> </div>
			</div>
			<?php
				if (!empty($list)) {
					foreach ($list as $subscription) {

						$str = $subscription['fee_description'];
						$description = (explode(" ", $str));
						$description = $description[1];
						switch ($description) {
								case "Month":
										$drt= "Monthly";
										break;
								case "Months":
										$drt= "Monthly";
										break;
								case "Year":
										$drt= "Yearly";
										break;
								case "Years":
										$drt= "Yearly";
										break;
								default:
										$drt= "Monthly";
					}
			?>

				<label for="<?php echo $subscription['id']; ?>" class="subscription__button">
					<div class="subscription-pentagon">
						<h3 style="padding-top: 10%; color:white; text-align: center" class="heading2 price"><?php echo currency_code_sign(settings('currency')).$subscription['fee']; ?></h3>
						<h3 style="padding-top: 5%; color:white; text-align: center"><?php echo $subscription['subscription_name']; ?></h3>
						<div style="z-index:999" class="checkbox-group">
							<a href="javascript:void(0);" class="pay_by_paypal" data-list-id="<?php echo $subscription['id'];?>"target="_blank">
								<input class="rounded-checkbox pay_by_paypal" name="lnk2"  value="link"  type="radio" >
								</input>
							</a>
						</div>
					</div>
					<h5 style="padding-top: 50%; padding-bottom: 10%"><?php echo $subscription['fee_description']; ?></h5>
					<?php if($description == 'Month') {?>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-remove"></i>
						<i class="fa fa-remove"></i>
						<i class="fa fa-remove"></i>
						<i class="fa fa-remove"></i>
						<i class="fa fa-remove"></i>
					<?php } ?>
					<?php if($description == 'Months') {?>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-remove"></i>
						<i class="fa fa-remove"></i>
						<i class="fa fa-remove"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
					<?php } ?>
					<?php if($description == 'Year') {?>
						<i class="fa fa-check"  aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
					<?php } ?>
					<?php if($description == 'Years') {?>
						<i class="fa fa-check"  aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
					<?php } ?>
				</label>
					<?php
					}
				}
			?>
		</div>
		<div style="text-align: right; padding-top: 3%;">
			<a style="color: #6D2C77; cursor: pointer; font-size: 20px;" href="<?php echo $base_url.'login' ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> Skip For Now</a>
		</div>
	</div>
</div>