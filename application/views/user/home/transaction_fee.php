<style>

.transaction {
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
.thead {
	color: #6D2C77;
	height: 73px;
	background:  0% 0% no-repeat padding-box;
	border-radius: 10px 10px 0px 0px;
	opacity: 1;
	background-color: #F9F9F9;
}
.transaction-container {
	text-align: center;
	padding: 3%;
	padding-left: 10%;
	padding-right: 10%;
	font-size: 15px;
}
.table-content {
	background-color:#F9F9F9;
	color: #8B8B8B
}
.cal-content {
	display: flex; 
	width: 100%; 
	justify-content: space-between;
}
</style>

<section class="hero-section" style="position: sticky">
    <div class="layer">
        <div class="transaction-banner"></div>
				<div class="Rectangle-banner"></div>

        <div class="container">
            <div class="row">          
                <div class="col-lg-9 con" style="text-align: center; color: white; padding-top: 10%">
                  <h1>Transaction Fees</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
	<div class="transaction">
		<div style="text-align:center;">
			<h2> Tazzer Group Transaction Fees </h2>
		</div>
			<div class="transaction-container">
				<table style="width: 100%;">
					<thead>
						<tr class="thead">
							<th>Sr.No.</th>
							<th>Date</th>
							<th>Transaction Id</th>
							<th>Service Name</th>
							<th>Amount</th>
						</tr>
					</thead>
				</table>
				<div style="padding:3%; border: solid 1px #E6E5E5">
					<table style="width: 100%">
						<tbody>
							<?php 
								if(!empty($list)) {
									$sub_total = 0;
									foreach($list as $transaction) {
										$sub_total = $sub_total + $transaction['amount'];
										$offer_discount = ((int)$sub_total / 100) * 10;
										$total_cost = $sub_total + $offer_discount / 10;
										$total_payable_amount = $total_cost + 1.1;
							?>
							<tr class="table-content">
								<td style="width: 14%;padding-left: 2%;text-align: left;"><?php echo $transaction['id']; ?></td>
								<td style="width: 19%;text-align: left;"><?php echo $transaction['date']; ?></td>
								<td style="width: 32%;text-align: left;"><?php echo $transaction['transaction_id']; ?></td>
								<td style="width: 22%;text-align: left;"><?php echo $transaction['service_name']; ?></td>
								<td style="color: #6D2C77;"><?php echo $transaction['currency_code']; ?> <?php echo $transaction['amount']; ?></td>
							</tr>
							<?php 
									}
								}
							?>
							</tr>
						<thead>
					</table>
					<div style="text-align: right; padding-top: 5%; display: grid; justify-content: flex-end;padding-right: 5%;">
						<div class="cal-content">
							<p style="font-weight: bold">Sub Total &nbsp&nbsp&nbsp</p>
							<p style="color: #6D2C77;"><?php echo $transaction['currency_code']; ?> <?php echo $sub_total; ?></p>
						</div>
						<div class="cal-content">
							<p style="font-weight: bold">10% offer discount &nbsp&nbsp&nbsp</p>
							<p style="color: #6D2C77;"><?php echo $transaction['currency_code']; ?> <?php echo $offer_discount?></p>
						</div>
						<div class="cal-content">
							<p style="font-weight: bold">Service Commission &nbsp&nbsp&nbsp</p>
							<p style="color: #6D2C77;">10%</p>
						</div>
						<div class="cal-content">
							<p style="font-weight: bold">Totoal Cost &nbsp&nbsp&nbsp</p>
							<p style="color: #6D2C77;"><?php echo $transaction['currency_code']; ?> <?php echo $total_cost; ?></p>
						</div>
						<div class="cal-content">
							<p style="font-weight: bold; color: #6D2C77;">Transaction Fees &nbsp&nbsp&nbsp</p>
							<p style="color: #6D2C77;">1.10%</p>
						</div>
						<hr style="width: 100%"></hr>
						<div class="cal-content">
							<p style="font-weight: bold;">Total Payable Amount &nbsp&nbsp&nbsp</p>
							<p style="color: #6D2C77;"><?php echo $transaction['currency_code']; ?> <?php echo $total_payable_amount; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
