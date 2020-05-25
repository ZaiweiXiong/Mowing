$(document).ready(function() {
    
   

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar =  $('#calendar').fullCalendar({
        header: {
            left: 'title',
            center: 'month',
            right: 'prev,next today'
        },
        eventSources: [
            {
                url:"http://localhost/mowing/CodeIgniter/index.php/lawn/load"
            }
           ],
        selectable:true,
        selectHelper:true,
       
       });

});