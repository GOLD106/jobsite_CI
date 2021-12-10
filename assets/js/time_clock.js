(function($) {
  "use strict";

  var base_url = $('#base_url').val();
  var csrf_token = $('#csrf_token').val();
  var csrfName = $('#csrfName').val();
  var csrfHash = $('#csrfHash').val();
  var placeSearch, autocomplete;

  // $(document).ready(function() {
  //   init();
  // });
  //TimeCycle
  // startTime();
  //Today
  // var today = new Date();
  // var dd = String(today.getDate()).padStart(2, '0');
  // var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  // var yyyy = today.getFullYear();

  // today = yyyy + '-' + mm + '-' + dd;
  const pauseBtn = document.querySelector("#pause");
  const timer = document.getElementById("stopwatch");

  let hr = 0;
  let min = 0;
  let sec = 0;
  let stoptime = true;
  let h, m, s;
  
  function display() {
    h = hr;
    m = min;
    s = sec;
    if (hr < 10) {
      h = "0" + hr;
    }
    if (min < 10) {
      m = "0" + min;
    }
    if (sec < 10) {
      s = "0" + sec;
    }
    timer.textContent = `${h}:${m}:${s}`;
  }
  
  let timeCycle;
  timeCycle = setInterval(() => {
    sec += 1;
    if (sec == 60) {
      min += 1;
      sec = 0;
    }
    if (min == 60) {
      hr += 1;
      min = 0;
      sec = 0;
    }
    display();
  }, 1000);

  stoptime = false;

  function pauseTimer() {

    stoptime = true;
    clearInterval(timeCycle);
  }

  var d = new Date(),
  minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
  hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
  ampm = d.getHours() >= 12 ? 'pm' : 'am',
  months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
  days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];

  let clock_in = hours+':'+minutes+ampm;
  let today = days[d.getDay()]+' '+months[d.getMonth()]+' '+d.getDate()+' '+d.getFullYear()
  document.getElementById('today').innerHTML = today;
  let location = $("#location").text();
  let job_title = $('.project-title').text();

  pauseBtn.addEventListener("click", () => {
    if (!stoptime) {
      pauseTimer();
      stoptime = true;
      let textarea = document.getElementById('add_note');
      
      var d = new Date()
      minutes = d.getMinutes().toString().length == 1 ? '0'+d.getMinutes() : d.getMinutes(),
      hours = d.getHours().toString().length == 1 ? '0'+d.getHours() : d.getHours(),
      ampm = d.getHours() >= 12 ? 'pm' : 'am';

      let clock_out = hours + ':'+ minutes + ampm;
      $.ajax({
        type: "POST",
        url: "../../employee/time_detail",
        data: {
          pauseTime: `${h}:${m}:${s}`,
          clock_in: clock_in,
          clock_out: clock_out,
          today: today,
          note: textarea.value,
          location: location,
          job_title: job_title,
          csrf_token_name: csrf_token
        },
        success: function(data) {
          window.location.href = '../../employee/time-clocked-detail';
        }
      });
    }
  });

})(jQuery);