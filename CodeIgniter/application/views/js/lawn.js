// insert into residentavailability table
$(document).ready(function(){

    $("#insert").click(function(){ 

        var suburb  =  $('#suburb').val();
        var postcode = $('#postcode').val();
        var address =  $('#address').val();
        var time  =    $('#datepicker').val();

        var startTime = $('#startTime').val();
        var endTime =   $('#endTime').val();

        var pay =  $('#pay').val();
        console.log( "st and end "+time)
      
        $.ajax({
          type: 'POST',
          data: {suburb:suburb,postcode:postcode,address:address,time:time,startTime:startTime,endTime:endTime,pay:pay},
          url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/inserInto', 
          error: function(){
            alert('failed ....creating')
            location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php")  
          },
          success: function(result){
            var t = JSON.stringify(result) 
            alert(t)
            location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php")  
          }
      } );
  
    } );
  });

function delete_user(id){
    alert('this is '+id)
    $.ajax({
      type: 'POST',
      data: {id:id},
      url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/deleteOne', 
      error: function(){
        alert('failed delete user....')
        location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php") 
      },
      success: function(result){
        location.reload();
      }
  } );
}

$(document).ready(function(){
  var id  =  $('#suburb').val();
  detail_user(id)
});

function detail_user(id){

  $.ajax({
    type: 'GET',
    data: {id:id},
    url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/detailUser', 
    error: function(){
      alert('failed post....edit it')
      location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php") 
    },
    success: function(result){
      
      var obj = JSON.parse(result)
      var postcode =obj.m[0].postcode
      var address=obj.m[0].address
      $("#postcode").val(postcode);
      $("#address").val(address);
     
    }
  });
}


$(document).ready(function(){

  $("#edit").click(function(){ 

    var suburb  =  $('#suburb').val();
    var postcode = $('#postcode').val();
    var address =  $('#address').val();
    var time  =    $('#datepicker').val();
    var startTime = $('#startTime').val();
    var endTime =   $('#endTime').val();
    var pay =  $('#pay').val();
    
    alert('Edit.... '+suburb)
    $.ajax({
      type: 'POST',
      data: {suburb:suburb,postcode:postcode,address:address,time:time,startTime:startTime,endTime:endTime,pay:pay},
      url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/editIt', 
      error: function(){
        alert('failed post....edit it')
        location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php") 
      },
      success: function(result){
        window.location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php");
      }
  } );
});

});

$(document).ready(function(){

  $("#datepicker_").change(function(){

    var time = $('#datepicker_').val();
    
    var table_search=''

    console.log(time)
    $.ajax({
      type: 'POST',
      data: {time:time},
      url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/search', 
      error: function(){
        alert('failed post....serarch')
      },
      success: function(result){
        
           var obj = JSON.parse(result)
           var c   = Object.keys(obj.m).length;
           table_search+= "<div id='page-container'>"+"<div class='container-fluid'>"+"<div style='overflow-x:auto;'>";
           table_search+= "<table class='table table-hover table-responsive table-bordered'>";
           table_search+="<tr style='background-color: #C0C0C0;'>"+
           "<th>Suburb</th>"+
           "<th>Date</th>"+
           "<th>Start Time</th>"+
           "<th>End Time</th>"+
           "<th>Pay</th>"+
           "<th></th>"+
           "</tr>";

      for(var i=0;i<c;i++){

        table_search+='<tr style="background-color: #9ACD32;">';
        var s=''
        var d=''
        var st=''
        var et=''
        var pay=''
        for (var j=0;j<5;j++){

            if (j==0){
                        
                table_search +='<td>';
                table_search +=obj.m[i].suburb
                s = obj.m[i].suburb;
                table_search +='</td>';
            }
            if (j==1){
              table_search +='<td>';
              table_search +=obj.m[i].date
              d=obj.m[i].date

              table_search +='</td>';
            }
            if (j==2){
              table_search +='<td>';
              table_search +=obj.m[i].startTime
              st=obj.m[i].startTime
              table_search +='</td>';
            }
            if (j==3){
              table_search +='<td>';
              table_search +=obj.m[i].endTime
              et=obj.m[i].endTime
              table_search +='</td>';
            }
            if (j==4){
              table_search +='<td>';
              table_search +=obj.m[i].pay
              pay=obj.m[i].pay
              table_search +='</td>';
            }
              
             
          
          }
              table_search+='<td>'
              table_search+='<a href="" id="delete" name="'+s+'" onclick="delete_user(this.name);" class="btn btn-danger">'
              table_search+='Delete</a>'
          

              table_search+='<a href="edit.php?id='+s+'&date='+d+'&st='+st+'&et='+et+'&pay='+pay+'" id="edit" name="'+s+'"  class="btn btn-primary">'
              table_search+='Edit</a>'
            
            
              table_search+='<a href="detail.php?id='+s+'&date='+d+'&st='+st+'&et='+et+'&pay='+pay+'"  id="detail" name="'+s+'" onclick="detail_user(this.name);" class="btn btn-info">'
              table_search+='Detail</a>'
             
             
              table_search+='</td>'

              table_search+='</tr>';
      }
      
              table_search+="</table>";
              table_search+='<a href="http://localhost/mowing/CodeIgniter/lawn/index.php"  id="detail" class="btn btn-danger">'
              table_search+='Back</a>'+'</div>'+'</div>'+'</div>'
              $('#result').html(table_search);
        }
    });
  
  });
});

$(document).ready(function(){
    $( "#datepicker" ).datepicker();
    $( "#datepicker_" ).datepicker();
});


