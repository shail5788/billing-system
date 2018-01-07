 $(document).ready(function(){

                 $('#customer-id').keyup(function(){
                 var c_id=$(this).val();
                 var action="searching";
                 var html='';
                // var c_id=$('#customer-id').val();
                if(c_id!='')
                {
                     $.post("ajax.php",{c_id:c_id,action:action},function(data){

                             // console.log(data);
                              $("#result").removeClass('display_none');
                              if(data.length!=0)
                              {
                                   html+="<table class='table table-bordered table-hover' style='background:white; width:98%;margin:auto;'><tr><th>Connection No</th><th>Consumer Name</td><th>Relation Type</td><th>Relative Name</th><th>Gender</th><th>Address</th><th>Mobile no </th><th>Meter Noth</th></tr>";
                                   for(var i=0;i<data.length;i++)
                                   {
                                      
                                      html+="<tr><td><a href='#' class='customer' id='"+data[i].customer_id+"'>"+data[i].customer_id+"</a></td><td>"+data[i].customer_fullname+"</td><td>"+data[i].relation_type+"</td><td>"+data[i].r_name+"</td><td>"+data[i].gender+"</td><td>"+data[i].address+"</td><td>"+data[i].mobile+"</td><td>"+data[i].meter_id+"</td></tr>"; 
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

                                     var customer_id=$(this).attr('id');
                                     var action="gettingIndividualRecord";
                                     var table="";
                                       table+="<table class='table '><tr><th><img src='img/logo/kuidc.png' width='120' height='80'></th><th><h2 style='text-align:center;'>KUIDFC & TWON MUNICIPAL COUNCIL<p>Magadi</p></h2></th><th><img src='img/logo/kuidc.png' width='120' height='80'></th></tr></table>";
                                     table+="<table class='table table-bordered'>";

                                     $.post('ajax.php',{customer_id:customer_id,action:action},function(data){
                                         
                                          console.log(data);
                                          table+="<tr><th>Connection No</th><td>"+data[0].customer_id+"</td><th>Consumer Name</th><td>"+data[0].customer_fullname+"</td><td rowspan='3' colspan='2'><img src='"+data[1].doc_path+"' width='100' height='110'></td></tr><tr><th>Relation Type </th><td>"+data[0].relation_type+"</td><th>Relative Name</th><td>"+data[0].r_name+"</td></tr><tr><th>No Of Family Member</th><td>"+data[0].no_of_family_m+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Adhar No </th><td>"+data[0].adhar_no+"</td><th>Address</th><td>"+data[0].address+"</td><th>Area</th><td width='100'>"+data[0].area+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Land Line No</th><td>"+data[0].landline_no+"</td><th>Mobile</th><td width='100'>"+data[0].mobile+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Connection Issue Date</th><td>"+data[0].issue_date+"</td><th>Meter No</th><td width='100'>"+data[0].meter_id+"</td></tr><tr><th>Address Proof</th><td>"+data[0].addressproof+"</td><th>ID Proof</th><td>"+data[0].idproof+"</td><th>Year</th><td width='100'>"+data[0].year+"</td></tr>"+
                                          "<tr><td>PID NO </td><td>"+data[0].pid+"<td>Ward</td><td>"+data[0].location+"</td><td>Road</td><td>"+data[0].road+"</td></tr></table><table class='table table-bordered'><tr><td conspan='3'><img src='"+data[2].doc_path+"' width='400' height='250'></td><td colspan='5'><img src='"+data[3].doc_path+"' width='400' height='250'></td></tr></table>";
                                           
                                          $("#cunsumer_detail").modal();   
                                          $("#cid").val(data[0].customer_id);    
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
                var action="searchingByName";
                var html="";
                if(consumer_name!='')
                {
                    
                    
                    $.post("ajax.php",{consumer_name:consumer_name,action:action},function(data){

                              console.log(data);
                              $("#result").removeClass('display_none');
                              if(data.length!=0)
                              {
                                   html+="<table class='table table-bordered table-hover' style='background:white; width:98%;margin:auto;'><tr><th>Connection No</th><th>Consumer Name</td><th>Relation Type</td><th>Relative Name</th><th>Gender</th><th>Address</th><th>Mobile no </th><th>Meter Noth</th></tr>";
                                   for(var i=0;i<data.length;i++)
                                   {
                                      
                                      html+="<tr><td><a href='#' class='customer' id='"+data[i].customer_id+"'>"+data[i].customer_id+"</a></td><td>"+data[i].customer_fullname+"</td><td>"+data[i].relation_type+"</td><td>"+data[i].r_name+"</td><td>"+data[i].gender+"</td><td>"+data[i].address+"</td><td>"+data[i].mobile+"</td><td>"+data[i].meter_id+"</td></tr>"; 
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

                                     var customer_id=$(this).attr('id');
                                     var action="gettingIndividualRecord";
                                     var table="";
                                     table+="<table class='table table-bordered'>";
                                     $.post('ajax.php',{customer_id:customer_id,action:action},function(data){
                                          
                                          console.log(data);
                                          table+="<tr><th>Connection No</th><td>"+data[0].customer_id+"</td><th>Consumer Name</th><td>"+data[0].customer_fullname+"</td><td rowspan='3' colspan='2'><img src='"+data[1].doc_path+"' width='100' height='110'></td></tr><tr><th>Relation Type </th><td>"+data[0].relation_type+"</td><th>Relative Name</th><td>"+data[0].r_name+"</td></tr><tr><th>No Of Family Member</th><td>"+data[0].no_of_family_m+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Adhar No </th><td>"+data[0].adhar_no+"</td><th>Address</th><td>"+data[0].address+"</td><th>Area</th><td width='100'>"+data[0].area+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Land Line No</th><td>"+data[0].landline_no+"</td><th>Mobile</th><td width='100'>"+data[0].mobile+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Connection Issue Date</th><td>"+data[0].issue_date+"</td><th>Meter No</th><td width='100'>"+data[0].meter_id+"</td></tr><tr><th>Address Proof</th><td>"+data[0].addressproof+"</td><th>ID Proof</th><td>"+data[0].idproof+"</td><th>Year</th><td width='100'>"+data[0].year+"</td></tr>"+
                                          "<tr><td>PID NO </td><td>"+data[0].pid+"<td>Ward</td><td>"+data[0].location+"</td><td>Road</td><td>"+data[0].road+"</td></tr></table><table class='table table-bordered'><tr><td conspan='3'><img src='"+data[2].doc_path+"' width='400' height='250'></td><td colspan='5'><img src='"+data[3].doc_path+"' width='400' height='250'></td></tr></table>";
                                           
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
     // search By PID NO

      $('#pid_no').keyup(function(){
                
                var pid_no=$(this).val();
                var action="searchingByPIDNo";
                var html="";
                if(pid_no!='')
                {
                    
                    
                    $.post("ajax.php",{pid_no:pid_no,action:action},function(data){

                              console.log(data);
                              $("#result").removeClass('display_none');
                              if(data.length!=0)
                              {
                                   html+="<table class='table table-bordered table-hover' style='background:white; width:98%;margin:auto;'><tr><th>Connection No</th><th>Consumer Name</td><th>Relation Type</td><th>Relative Name</th><th>Gender</th><th>Address</th><th>Mobile no </th><th>Meter Noth</th></tr>";
                                   for(var i=0;i<data.length;i++)
                                   {
                                      
                                      html+="<tr><td><a href='#' class='customer' id='"+data[i].customer_id+"'>"+data[i].customer_id+"</a></td><td>"+data[i].customer_fullname+"</td><td>"+data[i].relation_type+"</td><td>"+data[i].r_name+"</td><td>"+data[i].gender+"</td><td>"+data[i].address+"</td><td>"+data[i].mobile+"</td><td>"+data[i].meter_id+"</td></tr>"; 
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

                                     var customer_id=$(this).attr('id');
                                     var action="gettingIndividualRecord";
                                     var table="";
                                     table+="<table class='table table-bordered'>";
                                     $.post('ajax.php',{customer_id:customer_id,action:action},function(data){
                                          
                                          console.log(data);
                                          table+="<tr><th>Connection No</th><td>"+data[0].customer_id+"</td><th>Consumer Name</th><td>"+data[0].customer_fullname+"</td><td rowspan='3' colspan='2'><img src='"+data[1].doc_path+"' width='100' height='110'></td></tr><tr><th>Relation Type </th><td>"+data[0].relation_type+"</td><th>Relative Name</th><td>"+data[0].r_name+"</td></tr><tr><th>No Of Family Member</th><td>"+data[0].no_of_family_m+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Adhar No </th><td>"+data[0].adhar_no+"</td><th>Address</th><td>"+data[0].address+"</td><th>Area</th><td width='100'>"+data[0].area+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Land Line No</th><td>"+data[0].landline_no+"</td><th>Mobile</th><td width='100'>"+data[0].mobile+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Connection Issue Date</th><td>"+data[0].issue_date+"</td><th>Meter No</th><td width='100'>"+data[0].meter_id+"</td></tr><tr><th>Address Proof</th><td>"+data[0].addressproof+"</td><th>ID Proof</th><td>"+data[0].idproof+"</td><th>Year</th><td width='100'>"+data[0].year+"</td></tr>"+
                                          "<tr><td>PID NO </td><td>"+data[0].pid+"<td>Ward</td><td>"+data[0].location+"</td><td>Road</td><td>"+data[0].road+"</td></tr></table><table class='table table-bordered'><tr><td conspan='3'><img src='"+data[2].doc_path+"' width='400' height='250'></td><td colspan='5'><img src='"+data[3].doc_path+"' width='400' height='250'></td></tr></table>";
                                           
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


      // search By Meter No 

               $('#meter_id').keyup(function(){
                
                var meter_id=$(this).val();
                var action="searchingByMeterNo";
                var html="";

                if(meter_id!='')
                {
                    
                    
                    $.post("ajax.php",{meter_id:meter_id,action:action},function(data){

                              console.log(data);
                              $("#result").removeClass('display_none');
                              if(data.length!=0)
                              {
                                   html+="<table class='table table-bordered table-hover' style='background:white; width:98%;margin:auto;'><tr><th>Connection No</th><th>Consumer Name</td><th>Relation Type</td><th>Relative Name</th><th>Gender</th><th>Address</th><th>Mobile no </th><th>Meter Noth</th></tr>";
                                   for(var i=0;i<data.length;i++)
                                   {
                                      
                                      html+="<tr><td><a href='#' class='customer' id='"+data[i].customer_id+"'>"+data[i].customer_id+"</a></td><td>"+data[i].customer_fullname+"</td><td>"+data[i].relation_type+"</td><td>"+data[i].r_name+"</td><td>"+data[i].gender+"</td><td>"+data[i].address+"</td><td>"+data[i].mobile+"</td><td>"+data[i].meter_id+"</td></tr>"; 
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

                                     var customer_id=$(this).attr('id');
                                     
                                     var action="gettingIndividualRecord";
                                     var table="";
                                     table+="<table class='table table-bordered'>";

                                     $.post('ajax.php',{customer_id:customer_id,action:action},function(data){
                                          
                                          console.log(data);
                                          
                                          table+="<tr><th>Connection No</th><td class='c_id'>"+data[0].customer_id+"</td><th>Consumer Name</th><td>"+data[0].customer_fullname+"</td><td rowspan='3' colspan='2'><img src='"+data[1].doc_path+"' width='100' height='110'></td></tr><tr><th>Relation Type </th><td>"+data[0].relation_type+"</td><th>Relative Name</th><td>"+data[0].r_name+"</td></tr><tr><th>No Of Family Member</th><td>"+data[0].no_of_family_m+"</td><th>Gender</th><td>"+data[0].gender+"</td></tr><tr><th>Adhar No </th><td>"+data[0].adhar_no+"</td><th>Address</th><td>"+data[0].address+"</td><th>Area</th><td width='100'>"+data[0].area+"</td></tr><tr><th>State</th><td>"+data[0].state+"</td><th>Land Line No</th><td>"+data[0].landline_no+"</td><th>Mobile</th><td width='100'>"+data[0].mobile+"</td></tr><tr><th>Pin</th><td>"+data[0].pin+"</td><th>Connection Issue Date</th><td>"+data[0].issue_date+"</td><th>Meter No</th><td width='100'>"+data[0].meter_id+"</td></tr><tr><th>Address Proof</th><td>"+data[0].addressproof+"</td><th>ID Proof</th><td>"+data[0].idproof+"</td><th>Year</th><td width='100'>"+data[0].year+"</td></tr>"+
                                          "<tr><td>PID NO </td><td>"+data[0].pid+"<td>Ward</td><td>"+data[0].location+"</td><td>Road</td><td>"+data[0].road+"</td></tr></table><table class='table table-bordered'><tr><td conspan='3'><img src='"+data[2].doc_path+"' width='400' height='250'></td><td colspan='5'><img src='"+data[3].doc_path+"' width='400' height='250'></td></tr></table>";
                                           
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
         
              // $("#PrintCustomer").click(function(){

              //     var cid= $("#cid").val();                                       
                  
              //     $.post("new-consumer-application-copy.php",{cid:cid},function(data){


              //     });      

              // });   

             

      });