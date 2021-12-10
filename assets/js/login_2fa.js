$(document).ready(function() {

  $('#user_2fa_resend').on("click", function() {
    var csrf_token = $('#csrf_token').val();
    // console.log(csrf_token)
    $.ajax({
      type: "POST",
      url: base_url + "home/resend_2fa_code",
      data: {
        'csrf_token_name': csrf_token
      },
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        hideLoader();

        var obj = JSON.parse(data);

        if (obj.response == 'ok') {
          toaster_msg("success","Verification Code Send Success !.");
        } else {
          toaster_msg("error","Verification Code Send Failed !");
        }
      }
    });
  });

  $("#2fa_code").on("keydown", function(e) {
    if (e.keyCode == 13) {
      verifyTwoFA();
    }
  });

  $("#verify-2fa-btn").on("click", function() {
    verifyTwoFA();
  });
});

function verifyTwoFA() {
  var csrf_token = $('#csrf_token').val();
  var code = $("#2fa_code").val();
  if (code == "") {
    toaster_msg("error", "please enter code !");
    $("#2fa_code").focus();
    return;
  }
  // console.log(csrf_token)
  $.ajax({
    type: "POST",
    url: base_url + "user/login/verify_2fa_code",
    data: {
      'csrf_token_name': csrf_token,
      'code': code
    },
    beforeSend: function() {
      // showLoader();
      button_loading();
    },
    success: function(data) {
      // hideLoader();

      var obj = JSON.parse(data);

      if (obj.response == 'ok') {
        window.location.href = base_url;
      } else {
        button_unloading();
        toaster_msg("error", obj.msg);
        $("#error").text(obj.msg).css('color', 'red');
      }
      
    }
  });
}

function button_loading() {
  var $this = $('#verify-2fa-btn');
  var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Checking...';
  console.log("button_loading");
  if ($this.html() !== loadingText) {
    $this.data('original-text', $this.html());
    $this.html(loadingText).prop('disabled', true).bind('click', false);
  }
}

function button_unloading() {
  var $this = $('#verify-2fa-btn');
  console.log("button_unloading");
  $this.html($this.data('original-text')).prop('disabled', false);
}