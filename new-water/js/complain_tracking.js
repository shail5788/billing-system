$(document).ready(function(){
                     
       $("#customer_id").keyup(function(){
             
             
             var customer_id=$(this).val();
             
              if(customer_id!='')
              {

                     var action="trackCompalinByCustomerId";

                     var html="";
                     var status="";
                     html+="<table class='table table-bordered table-hover' style='background:white;'>"+
                     "<tr><th>complain_id</th><th>Customer Id</th><th>Employee Id</th>"+
                     "<th>Name</th><th>Address</th><th>Date</th><th>Discription</th><th>Status</th>";

                     $.post('ajax.php',{customer_id:customer_id,action:action},function(data){

                            console.log(data);
                            
                            for(var i=0;i<data.length;i++)
                            {
                                 
                                 if(data[i].status=='0')
                                 {
                                   status="UnProcessed";
                                 }
                                 else
                                 {
                                   status="Processed";
                                 }
                                 html+="<tr><td>"+data[i].complain_id+"</td><td>"+data[i].customer_id+"</td>"+
                                 "<td><a href='#' class='getEmp' id='"+data[i].emp_id+"'>"+data[i].emp_id+"</a></td>"+
                                 "<td>"+data[i].customer_fullname+"</td>"+
                                 "<td>"+data[i].address+"</td><td>"+data[i].date+"</td>"+
                                 "<td>"+data[i].discription+"</td><td>"+status+"</td></tr>";  
                            }

                            html+="</table>";

                           $('#list').html(html);

                           html="";

                           if(data.length==0)
                           {
                                 html+="<tr><td>Sorry No Record Found !</td></tr>";
                                 $('#list').html(html);     
                           }

                           $(".getEmp").click(function(){

                                 
                                 var emp = $(this).attr('id');
                                 
                                 var action1="GetAssignEmployee";
                                  
                                 var table="";
                                
                                 table+="<table class='table table-borderd table-hover'>";
                                   
                                 $.post('ajax.php',{action1:action1,emp:emp},function(data){
                                     
                                   table+="<tr><th>Name</th><td>"+data[0].emp_id+"</td></tr>"+
                                   "<tr><th>Name</th><td>"+data[0].emp_name+"</td></tr>"+
                                   "<tr><th>Area</th><td>"+data[0].assign_area+"</td></tr>"+
                                   "<tr><th>Mobile</th><td>"+data[0].contactNo+"</td></tr>"; 
                                   
                                   $("#comp_track").modal();
                                   $(".list_info").html(table);
                                  console.log(data);


                                 },'json');
                           
                           });

                     },'json'); 




              }
              else
              {
                  $('#list').html('');
              } 
               
             
       
       });

       
       $("#complain_id").keyup(function(){

             
             
             var complain_id=$(this).val();
             if(complain_id!='')
             {

                 
                 var action="trackCompalinByComplainId";

                 var html="";
                 var status="";        
                  html+="<table class='table table-bordered table-hover' style='background:white;'>"+
                  "<tr><th>complain_id</th><th>Customer Id</th><th>Employee Id</th>"+
                  "<th>Name</th><th>Address</th><th>Date</th><th>Discription</th><th>Status</th>";

                 $.post('ajax.php',{complain_id:complain_id,action:action},function(data){

                        console.log(data);
                         for(var i=0;i<data.length;i++)
                          {
                               if(data[i].status=='0')
                               {
                                  status="UnProcessed";
                               }
                               else
                               {
                                  status="Processed";
                               }
                               html+="<tr><td>"+data[i].complain_id+"</td><td>"+data[i].customer_id+"</td>"+
                               "<td><a href='#' class='getEmp' id='"+data[i].emp_id+"'>"+data[i].emp_id+"</a></td>"+
                               "<td>"+data[i].customer_fullname+"</td>"+
                               "<td>"+data[i].address+"</td><td>"+data[i].date+"</td>"+
                               "<td>"+data[i].discription+"</td><td>"+status+"</td></tr>";  
                          }

                                html+="</table>";

                               $('#list').html(html);

                               html="";

                               if(data.length==0)
                               {
                                     html+="<tr><td>Sorry No Record Found !</td></tr>";
                                     $('#list').html(html);     
                               }

                               $(".getEmp").click(function(){

                                     
                                     var emp = $(this).attr('id');
                                     
                                     var action1="GetAssignEmployee";
                                      
                                     var table="";

                                     table+="<table class='table table-borderd table-hover'>";
                                       
                                     $.post('ajax.php',{action1:action1,emp:emp},function(data){
                                         
                                       table+="<tr><th>Name</th><td>"+data[0].emp_id+"</td></tr>"+
                                       "<tr><th>Name</th><td>"+data[0].emp_name+"</td></tr>"+
                                       "<tr><th>Area</th><td>"+data[0].assign_area+"</td></tr>"+
                                       "<tr><th>Mobile</th><td>"+data[0].contactNo+"</td></tr>"; 
                                       
                                       $("#comp_track").modal();
                                       $(".list_info").html(table);
                                      console.log(data);


                                     },'json');
                               
                               });
                        


                 },'json');   

             }
             else
             {
                 $('#list').html('');
             }
       });


      $('#year').change(function(){

            
            var year=$('#year').val();
           
            var action="getComplainMonth";
           
            $.post('ajax.php',{year:year,action:action},function(data){
           
             console.log(data);
           
            $('#month').html(data);
          
          
          });

      });

       $('#year').change(function(){

          var year=$('#year').val();

              $('#month').change(function(){

                  var month=$('#month').val();
                    
                    var action ="getcomplaintMonthly";
                    
                    var html="";
                    var status="";     
                   html+="<table class='table table-bordered table-hover' style='background:white;'>"+
                    "<tr><th>complain_id</th><th>Customer Id</th><th>Employee Id</th>"+
                    "<th>Name</th><th>Address</th><th>Date</th><th>Discription</th><th>Status</th>";

                    $.post('ajax.php',{year:year,month:month,action:action},function(data){
                      
                         console.log(data);
                         
                         for(var i=0;i<data.length;i++)
                         {
                              
                               if(data[i].status=='0')
                               {
                                 
                                 status="UnProcessed";

                               }
                               else
                               {
                                  
                                  status="Processed";

                               }

                               html+="<tr><td>"+data[i].complain_id+"</td><td>"+data[i].customer_id+"</td>"+
                               "<td><a href='#' class='getEmp' id='"+data[i].emp_id+"'>"+data[i].emp_id+"</a></td>"+
                               "<td>"+data[i].customer_fullname+"</td>"+
                               "<td>"+data[i].address+"</td><td>"+data[i].date+"</td>"+
                               "<td>"+data[i].discription+"</td><td>"+status+"</td></tr>";  
                          }

                           html+="</table>";


                         
                         $('#list').html(html);  
                            html="";

                               if(data.length==0)
                               {
                                     html+="<tr><td>Sorry No Record Found !</td></tr>";
                                     $('#list').html(html);     
                               }

                               $(".getEmp").click(function(){

                                     
                                     var emp = $(this).attr('id');
                                     
                                     var action1="GetAssignEmployee";
                                      
                                     var table="";
                                    
                                     table+="<table class='table table-borderd table-hover'>";
                                       
                                     $.post('ajax.php',{action1:action1,emp:emp},function(data){
                                         
                                       table+="<tr><th>Name</th><td>"+data[0].emp_id+"</td></tr>"+
                                       "<tr><th>Name</th><td>"+data[0].emp_name+"</td></tr>"+
                                       "<tr><th>Area</th><td>"+data[0].assign_area+"</td></tr>"+
                                       "<tr><th>Mobile</th><td>"+data[0].contactNo+"</td></tr>"; 
                                       
                                       $("#comp_track").modal();
                                       $(".list_info").html(table);
                                      console.log(data);


                                     },'json');
                               
                               });
                        

                    },'json');

                
              });

       });

       $("#date1").blur(function(){
       	
              var date1=$("#date1").val();

              var action ="getComplainByDatewise";
         	    
               var html="";
                         
               html+="<table class='table table-borderd table-hover' style='background:white;'>"+
                "<tr><th>complain_id</th><th>Customer Id</th><th>Employee Id</th>"+
                "<th>Name</th><th>Address</th><th>Date</th><th>Discription</th><th>Status</th>";
              
              $.post('ajax.php',{date1:date1,action:action},function(data){
           	  	  
                  console.log(data);

                   for(var i=0;i<data.length;i++)
                   {
                        
                         html+="<tr><td>"+data[i].complain_id+"</td><td>"+data[i].customer_id+"</td>"+
                         "<td><a href='#' class='getEmp' id='"+data[i].emp_id+"'>"+data[i].emp_id+"</a></td>"+
                         "<td>"+data[i].customer_fullname+"</td>"+
                         "<td>"+data[i].address+"</td><td>"+data[i].date+"</td>"+
                         "<td>"+data[i].discription+"</td><td>"+data[i].status+"</td></tr>";  
                    }

                           html+="</table>";


                         
                           $('#list').html(html);  
                            
                            html="";

                               if(data.length==0)
                               {
                                     html+="<tr><td>Sorry No Record Found !</td></tr>";
                                     $('#list').html(html);     
                               }

                               $(".getEmp").click(function(){

                                     
                                     var emp = $(this).attr('id');
                                     
                                     var action1="GetAssignEmployee";
                                      
                                     var table="";
                                    
                                     table+="<table class='table table-borderd table-hover'>";
                                       
                                     $.post('ajax.php',{action1:action1,emp:emp},function(data){
                                         
                                       table+="<tr><th>Name</th><td>"+data[0].emp_id+"</td></tr>"+
                                       "<tr><th>Name</th><td>"+data[0].emp_name+"</td></tr>"+
                                       "<tr><th>Area</th><td>"+data[0].assign_area+"</td></tr>"+
                                       "<tr><th>Mobile</th><td>"+data[0].contactNo+"</td></tr>"; 
                                       
                                       $("#comp_track").modal();
                                       $(".list_info").html(table);
                                      console.log(data);


                                     },'json');
                               
                               });
                        
                  
                  // $("#list").html(html);
           	  
              },'json');

       });

   });