  <div class="container text-center">

    <main style="padding-top: 5%; padding-bottom: 10%">
        <form action="employee/timesheet" method="POST">
            <div class="form-group row">
            <div class="col-8">
                <label class="sr-only" for="datePicker">Date</label>
                <input type="text" class="form-control mb-2 mr-sm-2 col-4" name="datePicker_date" id="datePicker" placeholder="week commencing">
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>Day</th>
                <th>Date</th>
                <th>Job</th>
                <th>Start Time</th>
                <th>Finish Time</th>
                <th>Location</th>
                <th>Hours Worked</th>
            </tr>
            </thead>
            <tbody id="tBody">
            </tbody>
        </table>
        <div class="row bottom d-none" style="width: 100%">
            <!-- <div class="col-6">
                <button type="button" id="submit" class="btn btn-success">Submit</button>
            </div> -->
            <div class="col-12">
                <h2 id="hoursWorkedText" class="text-right">Total Hours Worked: <span id="totalHours">0</span></h2>
            </div>
        </div>
    </main>
  </div>
<script>
$(document).ready(function(){
    let csrf_token = $('#csrf_token').val();
    let result = [];
    const weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    $('#tBody').append( `
        <tr>
            <td style="border-bottom: solid 1px #ccc"> -- </td>
            <td style="border-bottom: solid 1px #ccc"> -- </td>
            <td style="border-bottom: solid 1px #ccc"> -- </td>
            <td style="border-bottom: solid 1px #ccc"> -- </td>
            <td style="border-bottom: solid 1px #ccc"> -- </td>
            <td style="border-bottom: solid 1px #ccc"> -- </td>
            <td style="border-bottom: solid 1px #ccc"> -- </td>
        </tr>
    ` );
    $('#datePicker').datepicker({ //initiate JQueryUI datepicker
        showAnim: 'fadeIn',
        dateFormat: "dd/mm/yy",
        firstDay: 1, //first day is Monday
        beforeShowDay: function(date) {
            //only allow Mondays to be selected
            return [date.getDay() == 1,""];
        },
        onSelect: populateDates
    });
    
    function populateDates() {
        
        const weekDates = [];
        let result = [];
        $('#tBody').empty(); //clear table
        $('.bottom').removeClass('d-none'); //display total hours worked
        let chosenDate = $('#datePicker').datepicker('getDate'); //get chosen date from datepicker
        let newDate;
        
        const monStartWeekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        for(let i = 0; i < weekDays.length; i++) { //iterate through each weekday
            newDate = new Date(chosenDate); //create date object
            newDate.setDate(chosenDate.getDate() + i); //increment set date

            months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
            let weekly_date = days[newDate.getDay()]+' '+months[newDate.getMonth()]+' '+newDate.getDate()+' '+newDate.getFullYear()
            weekDates.push(weekly_date);

            $('#tBody').append( `
                <tr>
                    <td class="day">${weekDays[newDate.getDay()].slice(0,3)}</td>
                    <td class="date">${newDate.getDate()} / ${newDate.getMonth() + 1} / ${newDate.getFullYear()}</td>
                    <td class="Job" id="job${monStartWeekDays[i]}"></td>
                    <td class="start-time" id="startTime${monStartWeekDays[i]}"></td>
                    <td class="finish-time" id="finishTime${monStartWeekDays[i]}"></td>
                    <td class="location" id="location${monStartWeekDays[i]}"></td>              
                    <td class="hours-worked" id="hoursWorked${monStartWeekDays[i]}">
                        0
                    </td>
                </tr>
            ` );
        }
        $.ajax({
            type: "POST",
            url: "../../employee/timesheet/get_data",
            data: {
                weekDates: weekDates,
                csrf_token_name: csrf_token
            },
            success: function(response) {
                temp = [];
                temp = JSON.parse(response);
                for(let i=0; i<7; i++) {
                    if(temp[i].length > 0){
                        $(`#startTime` + monStartWeekDays[i]).text(temp[i][0].clocked_in);
                        $(`#finishTime` + monStartWeekDays[i]).text(temp[i][0].clocked_out);
                        $(`#location` + monStartWeekDays[i]).text(temp[i][0].location);
                        $(`#job` + monStartWeekDays[i]).text(temp[i][0].job_title);
                        work_hour = ((parseInt(temp[i][0].clocked_out.split(":")[0]) - parseInt(temp[i][0].clocked_in.split(":")[0])) + 
                                    Math.abs(parseInt(temp[i][0].clocked_out.split(":")[1].slice(0,-2)) - parseInt(temp[i][0].clocked_in.split(":")[1].slice(0,-2)))/60).toFixed(2);
                        $(`#hoursWorked` + monStartWeekDays[i]).text(work_hour);         
                    }
                }           
                updateTotal()
            }
        });
        
    
        $('.start-time input').timepicker({ 'timeFormat': 'H:i', 'step': 15, 'scrollDefault': '09:00' });
        $('.finish-time input').timepicker({ 'timeFormat': 'H:i', 'step': 15, 'scrollDefault': '17:00' });

        function updateTotal() { //function to update the total hours worked
            let totalHoursWorked = 0;
            let hrs = document.querySelectorAll('.hours-worked');
            console.log(hrs, '====');
            hrs.forEach(function(val) {
                totalHoursWorked += Number(val.innerHTML);
            });
            document.querySelector('#totalHours').innerHTML = totalHoursWorked;
        }
    }

});
</script>