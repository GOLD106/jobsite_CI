<?php
  $user_currency = get_user_currency();
  $user_currency_code = $user_currency['user_currency_code'];
  $service_amount = get_gigs_currency($subscription['fee'], $subscription['currency_code'], $user_currency_code);
?>

<script src="https://www.paypal.com/sdk/js?client-id=<?=$client_id;?>&vault=true&intent=subscription"></script>

<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
  <div class="row">
    <div class="col-md-1 col-lg-1 col-xl-1"></div>
    <div class="col-md-5 col-lg-5 col-xl-5">
      <a href="<?php echo $base_url.'self-employed-subscription'?>" style="color:#6c2c78; font-size: 20px; display: flex; cursor: pointer">
        <i class="fa fa-angle-left" style="padding-top:0.8%" aria-hidden="true"></i>
        <p style="padding-left: 2%;">Back</p>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1 col-lg-1 col-xl-1"></div>
    <div class="col-md-5 col-lg-5 col-xl-5" style="padding:3%">
      <h3>Subscription</h3>
    </div>
  </div>

  <div class="row paypal-payment-box">
    <div class="col-md-1 col-lg-1 col-xl-1"></div>
    <div class="col-md-5 col-lg-5 col-xl-5">
      <div class="card">
        <div class="card-body">
            <div class="pricing-header">
                <h2><?php echo $subscription['subscription_name'] ?></h2>
                <p>Monthly Price</p>
            </div>              
            <div class="pricing-card-price">
                <h3 class="heading2 price"><?php echo currency_code_sign(settings('currency')).$subscription['fee']; ?></h3>
                <p>Duration: <span><?php echo $subscription['duration'] ?> Months</span></p>
            </div>
            <ul class="pricing-options">
                <li><i class="fa fa-check-circle"></i> <?= $subscription['duration'] * 30; ?> days expiration</li>
            </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-md-5 col-xl-5" style="margin-top: 50px;">
      <div id="paypal-button-container"></div>
    </div>
  </div>
  
</div>

<!-- Add the checkout buttons, set up the order and approve the order -->
<script>
  var plan_id = "<?php echo $plan_id; ?>";
  var subscription_id = "<?php echo $subscription_id; ?>";

  $(document).ready(function() {
    var csrf_token = $('#csrf_token').val();

    paypal.Buttons({
      createSubscription: function(data, actions) {
        return actions.subscription.create({
          'plan_id': "<?php echo $plan_id; ?>" // Creates the subscription
        });
      },
      onApprove: function(data, actions) {
        console.log(data);
        var postParams = {csrf_token_name: csrf_token, plan_id: plan_id, subscription_id: subscription_id, billingToken: data.billingToken, facilitatorAccessToken: data.facilitatorAccessToken, orderID: data.orderID, paymentID: data.paymentID, subscriptionID: data.subscriptionID};
        $.post(base_url+'paypal-pro-subscription-success', postParams, function(response) {
          window.location.href = base_url+'self-employed-subscription';
        });
      }
    }).render('#paypal-button-container'); // Renders the PayPal button
  });
</script>