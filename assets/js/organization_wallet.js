$(document).ready(function() {
    var csrf_token = $('#csrf_token').val();
    $('#stripe_wallet').hide();
    $('#pay_by_stripe').click(function(){
        if($("#wallet_amt").val() > 0)
        {
            var wallet_amt = $("#wallet_amt").val();
            showLoader();
            $.ajax({
                url: base_url+'organization/dashboard/create_stripe_user_wallet',
                type: 'post',
                dataType: 'json',
                data: {csrf_token_name: csrf_token, wallet_amt: wallet_amt},
                success: function (session) {
                    stripe.redirectToCheckout({ sessionId: session.id });
                },
                error: function (error) {
                    hideLoader();
                    // console.error(error.status, error.statusText);
                    alert(error.responseText);
                }
            });
        }
        else
        {
            alert("Please enter wallet amount");
            $("#wallet_amt").focus();
            return false;
        }
    });

    $("#pay_by_paypal").click(function(event) {
        window.location.href = base_url+'organization/dashboard/paypal_add_wallet';
    });

    $('#stripe').click(function(){
        $stripe= $(this).val();
       
        if($stripe == 'stripe'){
            $('#stripe_wallet').show();
            $('#stripe_wallet').css('background','#6772E5');
            $('#stripe_wallet').css('border','1px solid #6772E5');
            
        }else{
            $('#stripe_wallet').hide();
        }
    });
    $('#paypal').click(function(){
        $paypal= $(this).val();
       
        if($paypal == 'paypal'){
            $('#stripe_wallet').show();
            $('#stripe_wallet').css('background','#143b85');
            $('#stripe_wallet').css('border','1px solid #143b85');
        }else{
            $('#stripe_wallet').hide();
        }
    });
    
    $('#razorpay').click(function(){
        $razorpay= $(this).val();
       
        if($razorpay == 'razorpay'){
            $('#stripe_wallet').show();
            $('#stripe_wallet').css('background','rgb(18 18 19)');
            $('#stripe_wallet').css('border','1px solid #143b85');
        }else{
            $('#stripe_wallet').hide();
        }
    });
    
    $('#paytabs').click(function(){
        $paytabs= $(this).val();
       
        if($paytabs == 'paytabs'){
            $('#stripe_wallet').show();
            $('#stripe_wallet').css('background','rgb(89 89 252)');
            $('#stripe_wallet').css('border','1px solid #143b85');
        }else{
            $('#stripe_wallet').hide();
        }
    });
});