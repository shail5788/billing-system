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
                                          
                                          //console.log(data);
                                          table+="<tr><th>Connection No</th><td><input type='text' name='emp_id1' id='emp_id1' value='"+data[0].emp_id+"' class='form-control' readonly></td><th>Employee Name</th><td><input type='text' name='emp_name' id='emp_name' value='"+data[0].emp_name+"' class='form-control' readonly></td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td><input type='text' name='emp_type' id='emp_type' value='"+data[0].emp_type+"' class='form-control' readonly></td><th>Date Of Birth</th><td><input type='text' name='dob"+data[0].emp_id+"' id='dob"+data[0].emp_id+"' value='"+data[0].dob+"' class='form-control' readonly></td></tr><tr><th>Date Of Join</th><td><input type='text' name='doj"+data[0].emp_id+"' id='doj"+data[0].emp_id+"' value='"+data[0].doj+"' class='form-control' readonly></td><th>Gender</th><td><input type='text' name='gender"+data[0].emp_id+"' id='gender"+data[0].emp_id+"' value='"+data[0].gender+"' class='form-control' readonly></td></tr><tr><th>Mobile No</th><td><input type='text' name='mobile' id='mobile' value='"+data[0].contactNo+"' class='form-control' readonly></td><th>Address</th><td><input type='text' name='address' id='address' value='"+data[0].address+"' class='form-control' readonly></td><th>City</th><td width='100'><input type='text' name='city' id='city' value='"+data[0].city+"' class='form-control' readonly></td></tr><tr><th>State</th><td><input type='text' name='state' id='state' value='"+data[0].state+"' class='form-control' readonly></td><th>Assign Area</th><td><input type='text' name='area1' id='area1' value='"+data[0].assign_area+"' class='form-control' readonly></td><th>Meter Reader Type</th><td width='100'><input type='text' name='mr_type' id='mr_type' value='"+data[0].mr_type+"' class='form-control' readonly></td></tr><tr><th>Pin</th><td><input type='text' name='pin' id='pin' value='"+data[0].pin+"' class='form-control' readonly></td><th>Email ID</th><td><input type='text' name='email' id='email' value='"+data[0].emailId+"' class='form-control' readonly></td></tr>"
                                          +"<tr><td><select class='form-control' id='ctype'>"+
                                          "<option value=''>Choose user Type</option><option value='2'>Admin</option><option value='3'>Employee</option><option value='5'>Service Man</option><option value='6'> Meter Reader</option></select></td>"
                                          +"<td><select class='form-control' id='Getarea'></select></td>"+
                                          "<td colspan='4'><select name='mr_type1' id='mr_type1' class='form-control' style='width:388px;'>"+
                                          "<option value=''>Select ReaderType </option><option value='Commercial'>Commercial</option><option value='Domestic'>Domestic</option><option value='Non Commercial'>Non Commercial</option></select></td></tr></table>";                                  
                                          $("#cunsumer_detail").modal();       
                                          $(".detail").html(table);
                                             
                                             // get area 
                                              getArea("Getarea");
                                              
                                              $("#ctype").change(function(){
                                                
                                                var type= $(this).val();
                                                
                                                    if(type=='2' || type =="3")
                                                    {
                                                        
                                                         $("#Getarea").prop('disabled', 'disabled');
                                                         $("#mr_type1").prop('disabled', 'disabled');

                                                    }
                                                    else if( type=='5')
                                                    {
                                                        
                                                        $("#Getarea").removeAttr('disabled', 'disabled');
                                                         $("#mr_type1").prop('disabled', 'disabled');
                                                    
                                                    }
                                                    else if(type=="6")
                                                    {
                                                       
                                                       
                                                       $("#Getarea").prop('disabled', 'disabled');
                                                       $("#mr_type1").removeAttr('disabled', 'disabled');
                                                    
                                                    }
                                                    else
                                                    {
                                                         $("#mr_type1").removeAttr('disabled', 'disabled');
                                                         $("#Getarea").prop('disabled', 'disabled');
                                                    }
                                                    $("#emp_type").val(type);
                                              
                                              });
                                              $("#Getarea").change(function(){
                                                  var area=$(this).val();
                                                  
                                                  $("#area1").val(area);
                                              }); 

                                              $("#mr_type1").change(function(){
                                                  var mrType=$(this).val();
                                                  
                                                  $("#mr_type").val(mrType);
                                              });

                                              $("#modal-product-update").click(function(){
                                                 
                                                 
                                                 var emp_type=$("#emp_type").val();
                                                 var emp_id=$("#emp_id1").val();
                                                 var area=$("#area1").val();
                                                 var mrReaderType=$("#mr_type").val();
                                                 var action="ManageUser";
                                                
                                                 $.post('ajax.php',
                                                  {emp_id:emp_id,emp_type:emp_type,
                                                  area:area,mrReaderType:mrReaderType,action:action},
                                                  function(data){

                                                    alert(data);
                                                 
                                                 });

                                              
                                              });
                                    
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
                                          
                                          //console.log(data);
                                          table+="<tr><th>Connection No</th><td><input type='text' name='emp_id1' id='emp_id1' value='"+data[0].emp_id+"' class='form-control' readonly></td><th>Employee Name</th><td><input type='text' name='emp_name' id='emp_name' value='"+data[0].emp_name+"' class='form-control' readonly></td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td><input type='text' name='emp_type' id='emp_type' value='"+data[0].emp_type+"' class='form-control' readonly></td><th>Date Of Birth</th><td><input type='text' name='dob"+data[0].emp_id+"' id='dob"+data[0].emp_id+"' value='"+data[0].dob+"' class='form-control' readonly></td></tr><tr><th>Date Of Join</th><td><input type='text' name='doj"+data[0].emp_id+"' id='doj"+data[0].emp_id+"' value='"+data[0].doj+"' class='form-control' readonly></td><th>Gender</th><td><input type='text' name='gender"+data[0].emp_id+"' id='gender"+data[0].emp_id+"' value='"+data[0].gender+"' class='form-control' readonly></td></tr><tr><th>Mobile No</th><td><input type='text' name='mobile' id='mobile' value='"+data[0].contactNo+"' class='form-control' readonly></td><th>Address</th><td><input type='text' name='address' id='address' value='"+data[0].address+"' class='form-control' readonly></td><th>City</th><td width='100'><input type='text' name='city' id='city' value='"+data[0].city+"' class='form-control' readonly></td></tr><tr><th>State</th><td><input type='text' name='state' id='state' value='"+data[0].state+"' class='form-control' readonly></td><th>Assign Area</th><td><input type='text' name='area1' id='area1' value='"+data[0].assign_area+"' class='form-control' readonly></td><th>Meter Reader Type</th><td width='100'><input type='text' name='mr_type' id='mr_type' value='"+data[0].mr_type+"' class='form-control' readonly></td></tr><tr><th>Pin</th><td><input type='text' name='pin' id='pin' value='"+data[0].pin+"' class='form-control' readonly></td><th>Email ID</th><td><input type='text' name='email' id='email' value='"+data[0].emailId+"' class='form-control' readonly></td></tr>"
                                          +"<tr><td><select class='form-control' id='ctype'>"+
                                          "<option value=''>Choose user Type</option><option value='2'>Admin</option><option value='3'>Employee</option><option value='5'>Service Man</option><option value='6'> Meter Reader</option></select></td>"
                                          +"<td><select class='form-control' id='Getarea'></select></td>"+
                                          "<td colspan='4'><select name='mr_type1' id='mr_type1' class='form-control' style='width:388px;'>"+
                                          "<option value=''>Select ReaderType </option><option value='Commercial'>Commercial</option><option value='Domestic'>Domestic</option><option value='Non Commercial'>Non Commercial</option></select></td></tr></table>";                                  
                                          $("#cunsumer_detail").modal();       
                                          $(".detail").html(table);
                                             
                                             // get area 
                                              getArea("Getarea");
                                              
                                              $("#ctype").change(function(){
                                                
                                                var type= $(this).val();
                                                
                                                    if(type=='2' || type =="3")
                                                    {
                                                        
                                                         $("#Getarea").prop('disabled', 'disabled');
                                                         $("#mr_type1").prop('disabled', 'disabled');

                                                    }
                                                    else if( type=='5')
                                                    {
                                                        
                                                        $("#Getarea").removeAttr('disabled', 'disabled');
                                                         $("#mr_type1").prop('disabled', 'disabled');
                                                    
                                                    }
                                                    else if(type=="6")
                                                    {
                                                       
                                                       
                                                       $("#Getarea").prop('disabled', 'disabled');
                                                       $("#mr_type1").removeAttr('disabled', 'disabled');
                                                    
                                                    }
                                                    else
                                                    {
                                                         $("#mr_type1").removeAttr('disabled', 'disabled');
                                                         $("#Getarea").prop('disabled', 'disabled');
                                                    }
                                                    $("#emp_type").val(type);
                                              
                                              });
                                              $("#Getarea").change(function(){
                                                  var area=$(this).val();
                                                  
                                                  $("#area1").val(area);
                                              }); 

                                              $("#mr_type1").change(function(){
                                                  var mrType=$(this).val();
                                                  
                                                  $("#mr_type").val(mrType);
                                              });

                                              $("#modal-product-update").click(function(){
                                                 
                                                 
                                                 var emp_type=$("#emp_type").val();
                                                 var emp_id=$("#emp_id1").val();
                                                 var area=$("#area1").val();
                                                 var mrReaderType=$("#mr_type").val();
                                                 var action="ManageUser";
                                                
                                                 $.post('ajax.php',
                                                  {emp_id:emp_id,emp_type:emp_type,
                                                  area:area,mrReaderType:mrReaderType,action:action},
                                                  function(data){

                                                    alert(data);
                                                 
                                                 });

                                              
                                              });
                                    
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
                                          table+="<tr><th>Connection No</th><td>"+data[0].emp_id+"</td><th>Employee Name</th><td>"+data[0].emp_name+"</td><td rowspan='3' colspan='2'><img src='"+data[1].pic_path+"' width='100' height='110'></td></tr><tr><th>Employee Type </th><td>"+data[0].emp_type+"</td><th>Date Of Birth</th><td>"+data[0].dob+"</td></tr><tr><th>Date Of Join</th><td>"+data[0].doj+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Mobile No</th><td>"+data[0].contactNo+"</td><th>Address</th><td>"+data[0].address+"</td><th>City</th><td width='100'>"+data[0].city+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Assign Area</th><td>"+data[0].assign_area+"</td><th>Meter Reader Type</th><td width='100'>"+data[0].mr_type+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Email ID</th><td>"+data[0].emailId+"</td></tr></table>";
                                           
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

          // getting area 

          function getArea($get)
          {

                  var action ="getArea";

                  $.post('ajax.php',{action:action},function(data){
                 
                    $("#"+$get).html(data);
                
                 });

          }

      });