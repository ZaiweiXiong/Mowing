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
    alert('Are sure delete it !')
    $.ajax({
      type: 'POST',
      data: {id:id},
      url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/deleteOne', 
      error: function(){
        alert('failed delete user....')
        location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php") 
      },
      success: function(result){
        location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php") 
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
      //var postcode =obj.m[0].postcode
      //var address=obj.m[0].address
      //$("#postcode").val(postcode);
      //$("#address").val(address);
     
    }
  });
}


$(document).ready(function(){

  $("#edit").click(function(){ 

    var id =  $('#id').val();

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
      data: {id:id,suburb:suburb,postcode:postcode,address:address,time:time,startTime:startTime,endTime:endTime,pay:pay},
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
        var id=''
        for (var j=0;j<5;j++){

            if (j==0){
                        
                table_search +='<td>';
                table_search +=obj.m[i].suburb
                s = obj.m[i].suburb;
                id= obj.m[i].id
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
              table_search +=obj.m[i].time_from
              st=obj.m[i].time_from
              table_search +='</td>';
            }
            if (j==3){
              table_search +='<td>';
              table_search +=obj.m[i].time_to
              et=obj.m[i].time_to
              table_search +='</td>';
            }
            if (j==4){
              table_search +='<td>';
              table_search +=obj.m[i].hourly_rate
              pay=obj.m[i].hourly_rate
              table_search +='</td>';
            }
              
             
          
          }
              table_search+='<td>'
              table_search+='<a href="" id="'+id+'" name="'+s+'" onclick="delete_user(this.id);" class="btn btn-danger">'
              table_search+='Delete</a>'
          

              table_search+='<a href="edit.php?id='+id+'&suburb='+s+'&date='+d+'&st='+st+'&et='+et+'&pay='+pay+'" id="edit" name="'+s+'"  class="btn btn-primary">'
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

// index.php

$(document).ready(function(){

    var obj=''
    var c=0

    $.ajax({

      type: 'Get',
      data: '',
      url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/booking', 
      error: function(){
        alert('failed delete user....')
        location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php") 
      },
      success: function(result){
        obj = JSON.parse(result)
        c   = Object.keys(obj.m).length;
     
       

      }
  } );

  $.ajax({

    type: 'GET',
    data: '',
    url:  'http://localhost/mowing/CodeIgniter/index.php/lawn/load', 
    error: function(){
      //alert('failed post load ....')
      location.replace("http://localhost/mowing/CodeIgniter/lawn/index.php") 
    },
    success: function(result){
      
      var obj_ = JSON.parse(result)
      var table_search=''

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


      for (var i=0;i<obj_.length;i++){

       
        var s=''
        var id=''
        var d='data'
        var st=''
        var et=''
        var pay='pay'
        //alert('loading page....wait...'+obj_[i].id);
            
          for (var j=0;j<c;j++){

                table_search+='<tr style="background-color: #9ACD32;">'

                if (obj_[i].id_==obj.m[j].r_id){

                  alert('loading page....wait...');

                      

                        for (var t=0;t<5;t++){

                          if (t==0){

                            table_search +='<td >';
                            table_search +=obj_[i].id
                            s = obj_[i].id;
                            id= obj_[i].id_
                            table_search +='</td>';
  
                          }
                          if (t==1){
                            
                            table_search +='<td>';
                            table_search +=obj_[i].start
                            d=obj_[i].start
                            table_search +='</td>';
  
                          }
                          if (t==2){
                            
                            table_search +='<td>';
                            table_search +=obj_[i].st
                            st=obj_[i].st
                            table_search +='</td>';
  
                          }
                          if (t==3){
                            
                            table_search +='<td>';
                            table_search +=obj_[i].et
                            et=obj_[i].et
                            table_search +='</td>';
  
                          }
                          if (t==4){
                            
                            table_search +='<td>';
                            table_search +=obj_[i].pay
                            pay=obj_[i].pay
                            table_search +='</td>';
  
                          }
                        
                        

                        }
                        
                       
                        table_search+='<td>'

                        table_search+='<a  href="detail.php?id='+s+'&date='+d+'&st='+st+'&et='+et+'&pay='+pay+'"  id="detail" name="'+s+'" onclick="detail_user(this.name);" class="btn btn-danger">'
                        table_search+='Booked</a>'
                        table_search+='</td>'
                        table_search+='</tr>'
                        
                        break;

               }


                else {


                  for (var t=0;t<5;t++){

                    if (t==0){

                      table_search +='<td>';
                      table_search +=obj_[i].id
                      s = obj_[i].id;
                      id= obj_[i].id_
                      table_search +='</td>';

                    }
                    if (t==1){
                      
                      table_search +='<td>';
                      table_search +=obj_[i].start
                      d=obj_[i].start
                      table_search +='</td>';

                    }
                    if (t==2){
                      
                      table_search +='<td>';
                      table_search +=obj_[i].st
                      st=obj_[i].st
                      table_search +='</td>';

                    }
                    if (t==3){
                      
                      table_search +='<td>';
                      table_search +=obj_[i].et
                      et=obj_[i].et
                      table_search +='</td>';

                    }
                    if (t==4){
                      
                      table_search +='<td>';
                      table_search +=obj_[i].pay
                      pay=obj_[i].pay
                      table_search +='</td>';

                    }
                   

                  }

                  table_search+='<td>'

                  table_search+='<a href="edit.php?id='+id+'&suburb='+s+'&date='+d+'&st='+st+'&et='+et+'&pay='+pay+'" id="edit" name="'+s+'"  class="btn btn-primary">'
                  table_search+='Edit</a>'
                  
                  table_search+='<a href="" id="'+id+'" name="'+s+'" onclick="delete_user(this.id);" class="btn btn-info">'
                  
                  table_search+='Delete</a>'
                  table_search+='</td>'
                  //table_search+='</tr>'
                  break;


               }

        }
                  table_search+='</tr>';

      }
                  
                  table_search+="</table>";
                  table_search+='<a href="http://localhost/mowing/CodeIgniter/lawn/create.php"  id="detail" class="btn btn-info">'
                  table_search+='Create Availability</a>'+'</div>'+'</div>'+'</div>'
                  $('#myrd').html(table_search);
       
    }
  });
});

