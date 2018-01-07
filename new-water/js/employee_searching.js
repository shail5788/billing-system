 $(document).ready(function(){

             $('#emp_id').keyup(function(){
                 var emp_id=$(this).val();
                 var action="EmployeeSearching";
                 var html='';
                // var c_id=$('#customer-id').val();
                if(emp_id!='')
                {
                     $.post("ajax.php",{emp_id:emp_id,action:action},function(data){

                             console.log(data);
                              $("#result").removeClass('display_none');
                              if(data.length!=0)
                              {
                                   html+="<table class='table table-bordered table-hover' style='background:white; width:98%;margin:auto;'><tr><th>Employee ID</th><th>Employee Name</td><th>Type</td><th>Date Of Birth</th><th>Date Of Join</th><th>Address</th><th>Mobile no </th><th>Email ID</th></tr>";
                                   for(var i=0;i<data.length;i++)
                                   {
                                      
                                      html+="<tr><td><a href='#' class='customer' id='"+data[i].emp_id+"'>"+data[i].emp_id+"</a></td><td>"+data[i].emp_name+"</td><td>"+data[i].emp_type+"</td><td>"+data[i].dob+"</td><td>"+data[i].doj+"</td><td>"+data[i].address+"</td><td>"+data[i].contactNo+"</td><td>"+data[i].emailId+"</td></tr>"; 
                                   }
                                   html+="</table>";
                                   $('#msag').html("");
                                   $('#result').html(html);
                             
                              }
                              else
                              {
                                 
                                  $("#result").addClass('display_none');
                                  $('#msag').html("Sorry No Record Found !");
                              
                              }
                               
                               // getting click row customer id for full detail 
                                 
                                 $(".customer").click(function(){

                                     var emp_id=$(this).attr('id');
                                     var action="gettingIndividualEmployeeRecord";
                                     var table="";
                                     table+="<table class='table table-bordered'>";
                                     $.post('ajax.php',{emp_id:emp_id,action:action},function(data){
                                          
                                          console.log(data);
                                          if(data[0].emp_type=='6')
                                          {
                                               
                                               table+="<tr><th>Connection No</th><td>"+data[0].emp_id+"</td><th>Employee Name</th><td>"+data[0].emp_name+"</td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td>"+data[0].emp_type+"</td><th>Date Of Birth</th><td>"+data[0].dob+"</td></tr><tr><th>Date Of Join</th><td>"+data[0].doj+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Mobile No</th><td>"+data[0].contactNo+"</td><th>Address</th><td>"+data[0].address+"</td><th>City</th><td width='100'>"+data[0].city+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Assign Area</th><td>"+data[0].assign_area+"</td><th>Meter Reader Type</th><td width='100'>"+data[0].mr_type+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Email ID</th><td>"+data[0].emailId+"</td>"+
                                               "<th>Device Type</th><td>"+data[2].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[2].brand+"</td>"+
                                               "<th>Serial No</th><td>"+data[2].asset_id+"</td><th>Device Type</th><td>"+data[3].asset_name+"</td></tr>"+
                                               "<tr><th>Barnd</th><td>"+data[3].brand+"</td><th>Serial No</th><td>"+data[3].asset_id+"</td><th>Device Type</th><td>"+data[4].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[4].brand+"</td><th>Serial No</th><td>"+data[4].asset_id+"</td>"+
                                               "<th>Device Type</th><td>"+data[5].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[5].brand+"</td><th>Serial No</th><td>"+data[5].asset_id+"</td><td></td><td></td></tr></table>";
                                          }
                                          else
                                          {
                                              table+="<tr><th>Connection No</th><td>"+data[0].emp_id+"</td><th>Employee Name</th><td>"+data[0].emp_name+"</td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td>"+data[0].emp_type+"</td><th>Date Of Birth</th><td>"+data[0].dob+"</td></tr><tr><th>Date Of Join</th><td>"+data[0].doj+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Mobile No</th><td>"+data[0].contactNo+"</td><th>Address</th><td>"+data[0].address+"</td><th>City</th><td width='100'>"+data[0].city+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Assign Area</th><td>"+data[0].assign_area+"</td><th>Meter Reader Type</th><td width='100'>"+data[0].mr_type+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Email ID</th><td>"+data[0].emailId+"</td><td></td><td></td></tr></table>";
                                          }
                                        
                                           
                                          $("#cunsumer_detail").modal();       
                                           $(".detail").html(table);
                                     },'json');
                                 }); 

                    },'json');
                
               }
               else
               {
                  $('#result').html("");
                  $('#msag').html("");
               }



             });


             

             $('#consumer_name').keyup(function(){
                
                var consumer_name=$(this).val();
                var action="searchingByEmployeeName";
                var html="";
                if(consumer_name!='')
                {
                    
                    
                    $.post("ajax.php",{consumer_name:consumer_name,action:action},function(data){

                              console.log(data);
                              $("#result").removeClass('display_none');
                              if(data.length!=0)
                              {
                                  html+="<table class='table table-bordered table-hover' style='background:white; width:98%;margin:auto;'><tr><th>Employee ID</th><th>Employee Name</td><th>Type</td><th>Date Of Birth</th><th>Date Of Join</th><th>Address</th><th>Mobile no </th><th>Email ID</th></tr>";
                                   for(var i=0;i<data.length;i++)
                                   {
                                      
                                       html+="<tr><td><a href='#' class='customer' id='"+data[i].emp_id+"'>"+data[i].emp_id+"</a></td><td>"+data[i].emp_name+"</td><td>"+data[i].emp_type+"</td><td>"+data[i].dob+"</td><td>"+data[i].doj+"</td><td>"+data[i].address+"</td><td>"+data[i].contactNo+"</td><td>"+data[i].emailId+"</td></tr>"; 
                                   }
                                   html+="</table>";
                                   $('#msag').html("");
                                   $('#result').html(html);
                             
                              }
                              else
                              {
                                 
                                  $("#result").addClass('display_none');
                                  $('#msag').html("Sorry No Record Found !");
                              
                              } 
                              // getting individual clicked consumer detail   
                              $(".customer").click(function(){

                                     var emp_id=$(this).attr('id');
                                     var action="gettingIndividualEmployeeRecord";
                                     var table="";
                                     table+="<table class='table table-bordered'>";
                                     $.post('ajax.php',{emp_id:emp_id,action:action},function(data){
                                          
                                          console.log(data);
                                        if(data[0].emp_type=='6')
                                          {
                                               
                                               table+="<tr><th>Connection No</th><td>"+data[0].emp_id+"</td><th>Employee Name</th><td>"+data[0].emp_name+"</td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td>"+data[0].emp_type+"</td><th>Date Of Birth</th><td>"+data[0].dob+"</td></tr><tr><th>Date Of Join</th><td>"+data[0].doj+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Mobile No</th><td>"+data[0].contactNo+"</td><th>Address</th><td>"+data[0].address+"</td><th>City</th><td width='100'>"+data[0].city+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Assign Area</th><td>"+data[0].assign_area+"</td><th>Meter Reader Type</th><td width='100'>"+data[0].mr_type+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Email ID</th><td>"+data[0].emailId+"</td>"+
                                               "<th>Device Type</th><td>"+data[2].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[2].brand+"</td>"+
                                               "<th>Serial No</th><td>"+data[2].asset_id+"</td><th>Device Type</th><td>"+data[3].asset_name+"</td></tr>"+
                                               "<tr><th>Barnd</th><td>"+data[3].brand+"</td><th>Serial No</th><td>"+data[3].asset_id+"</td><th>Device Type</th><td>"+data[4].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[4].brand+"</td><th>Serial No</th><td>"+data[4].asset_id+"</td>"+
                                               "<th>Device Type</th><td>"+data[5].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[5].brand+"</td><th>Serial No</th><td>"+data[5].asset_id+"</td><td></td></td></tr></table>";
                                          }
                                          else
                                          {
                                              table+="<tr><th>Connection No</th><td>"+data[0].emp_id+"</td><th>Employee Name</th><td>"+data[0].emp_name+"</td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td>"+data[0].emp_type+"</td><th>Date Of Birth</th><td>"+data[0].dob+"</td></tr><tr><th>Date Of Join</th><td>"+data[0].doj+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Mobile No</th><td>"+data[0].contactNo+"</td><th>Address</th><td>"+data[0].address+"</td><th>City</th><td width='100'>"+data[0].city+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Assign Area</th><td>"+data[0].assign_area+"</td><th>Meter Reader Type</th><td width='100'>"+data[0].mr_type+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Email ID</th><td>"+data[0].emailId+"</td><td></td><td></td></tr></table>";
                                          }
                                           
                                          $("#cunsumer_detail").modal();       
                                           $(".detail").html(table);
                                     },'json');
                                 }); 

                        
                     
                     },'json');
              }
              else
              {
                 $("#result").addClass('display_none');
              }

        });

       
        // searching by mobile no 
        $('#mobile').keyup(function(){
                
                var mobile=$(this).val();
                var action="searchingByEmployeemobile";
                var html="";
                if(mobile!='')
                {
                    
                    
                    $.post("ajax.php",{mobile:mobile,action:action},function(data){

                              console.log(data);
                              $("#result").removeClass('display_none');
                              if(data.length!=0)
                              {
                                  html+="<table class='table table-bordered table-hover' style='background:white; width:98%;margin:auto;'><tr><th>Employee ID</th><th>Employee Name</td><th>Type</td><th>Date Of Birth</th><th>Date Of Join</th><th>Address</th><th>Mobile no </th><th>Email ID</th></tr>";
                                   for(var i=0;i<data.length;i++)
                                   {
                                      
                                       html+="<tr><td><a href='#' class='customer' id='"+data[i].emp_id+"'>"+data[i].emp_id+"</a></td><td>"+data[i].emp_name+"</td><td>"+data[i].emp_type+"</td><td>"+data[i].dob+"</td><td>"+data[i].doj+"</td><td>"+data[i].address+"</td><td>"+data[i].contactNo+"</td><td>"+data[i].emailId+"</td></tr>"; 
                                   }
                                   html+="</table>";
                                   $('#msag').html("");
                                   $('#result').html(html);
                             
                              }
                              else
                              {
                                 
                                  $("#result").addClass('display_none');
                                  $('#msag').html("Sorry No Record Found !");
                              
                              } 
                              // getting individual clicked consumer detail   
                              $(".customer").click(function(){

                                     var emp_id=$(this).attr('id');
                                     var action="gettingIndividualEmployeeRecord";
                                     var table="";
                                     table+="<table class='table table-bordered'>";
                                     $.post('ajax.php',{emp_id:emp_id,action:action},function(data){
                                          
                                          console.log(data);
                                    if(data[0].emp_type=='6')
                                          {
                                               
                                               table+="<tr><th>Connection No</th><td>"+data[0].emp_id+"</td><th>Employee Name</th><td>"+data[0].emp_name+"</td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td>"+data[0].emp_type+"</td><th>Date Of Birth</th><td>"+data[0].dob+"</td></tr><tr><th>Date Of Join</th><td>"+data[0].doj+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Mobile No</th><td>"+data[0].contactNo+"</td><th>Address</th><td>"+data[0].address+"</td><th>City</th><td width='100'>"+data[0].city+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Assign Area</th><td>"+data[0].assign_area+"</td><th>Meter Reader Type</th><td width='100'>"+data[0].mr_type+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Email ID</th><td>"+data[0].emailId+"</td>"+
                                               "<th>Device Type</th><td>"+data[2].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[2].brand+"</td>"+
                                               "<th>Serial No</th><td>"+data[2].asset_id+"</td><th>Device Type</th><td>"+data[3].asset_name+"</td></tr>"+
                                               "<tr><th>Barnd</th><td>"+data[3].brand+"</td><th>Serial No</th><td>"+data[3].asset_id+"</td><th>Device Type</th><td>"+data[4].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[4].brand+"</td><th>Serial No</th><td>"+data[4].asset_id+"</td>"+
                                               "<th>Device Type</th><td>"+data[5].asset_name+"</td></tr>"+
                                               "<tr><th>Brand</th><td>"+data[5].brand+"</td><th>Serial No</th><td>"+data[5].asset_id+"</td><td></td><td></tr></table>";
                                          }
                                          else
                                          {
                                              table+="<tr><th>Connection No</th><td>"+data[0].emp_id+"</td><th>Employee Name</th><td>"+data[0].emp_name+"</td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td>"+data[0].emp_type+"</td><th>Date Of Birth</th><td>"+data[0].dob+"</td></tr><tr><th>Date Of Join</th><td>"+data[0].doj+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Mobile No</th><td>"+data[0].contactNo+"</td><th>Address</th><td>"+data[0].address+"</td><th>City</th><td width='100'>"+data[0].city+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Assign Area</th><td>"+data[0].assign_area+"</td><th>Meter Reader Type</th><td width='100'>"+data[0].mr_type+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Email ID</th><td>"+data[0].emailId+"</td><td></td><td></td></tr></table>";
                                          }
                                           
                                          $("#cunsumer_detail").modal();       
                                           $(".detail").html(table);
                                     },'json');
                                 }); 

                        
                     
                     },'json');
              }
              else
              {
                 $("#result").addClass('display_none');
              }

        });



      });