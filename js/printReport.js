 $(document).ready(function(){
                

      $('#year').change(function(){

            var year=$('#year').val();

           var action ="getMonthName";
           
           $.post('ajax.php',{year:year,action:action},function(data){
            
            $('#month').html(data);
         
         });

       
      });

       $('#year').change(function(){

          var year=$('#year').val();
          
          var html="";

          $('#month').change(function(){

            
             var month=$('#month').val();
             $("#smonth").val(month);
             $("#syear").val(year);             
             var action="getBillList";
               
              $.post('ajax.php',{year:year,month:month,action:action},function(data){
                
                 html+="<table class='table table-bordered table-hover' style='background:white;'>"+
                 "<tr><th colspan='8'><img src='img/logo/kuidc.png' style='height:50px; text-align:center;'><h3 style='text-align:center;'>KUIDFC & TOWN MUNICIPAL COUNCIL<p>Magadi</p> </h3></th></tr>"+ 
                 "<tr><th>Bill Id</th><th> Customer Id </th><th>Customer Name</th><th>Reading</th>"+
                 "<th>Amount</th><th>Bill Date</th><th>Customer Type</th><th>Status</th></tr>"; 
                 
                 console.log(data);
                 var status='';
                 var totalAmount=0;
                 var totalReading=0;
                 for(var i =0;i<data.length;i++)
                 {

                      if(data[i].status==0)
                      {
                         status="Unpaid";
                      }
                      else{
                        status="Paid";
                      }
                        
                      totalAmount+=parseInt(data[i].total);
                      totalReading+=parseInt(data[i].reading); 

                      var date=data[i].day+"-"+data[i].month+"-"+data[i].year;
                     html+="<tr><td>"+data[i].bill_id+"</td><td><a href='#' class='cust_info' id='"+data[i].customer_id+"'>"+data[i].customer_id+"</a></td><td>"+data[i].customer_fullname+"</td>"+
                     "<td>"+data[i].reading+"</td><td>"+data[i].total+"</td>"+
                     "<td>"+date+"</td><td>"+data[i].bill_type+"</td>"+
                     "<td>"+status+"</td></tr>";  
                  
                 }
                  html+="<tr style='background:lightgray;'><th colspan='3'>Total</th><td>"+totalReading+"</td><td>"+totalAmount+"</td><td colspan='3'>&nbsp;</td></tr>";
                 html+="</table>";
                 
                 $('#list').html(html); 
                  $("#printDiv").show(); 
                 
                             $(".cust_info").click(function(){

                              var customer_id=$(this).attr('id');
                              var table="";
                              var action="getBillToCustomer";

                              $.post('ajax.php',{action:action,customer_id:customer_id},function(data){
                                      
                                    table+="<table class='table table-hover table-bordered'>"+
                                    "<tr><th>Customer ID</th><td>"+data[0].customer_id+"</td></tr>"+
                                    "<tr><th>Name</th><td>"+data[0].customer_fullname+"</td></tr>"+
                                    "<tr><th>Address</th><td>"+data[0].address+"</td></tr>"+
                                    "<tr><th>Mobile</th><td>"+data[0].mobile+"</td></tr>"+
                                    "<tr><th>Meter ID</th><td>"+data[0].meter_id+"</td></table>";
                                     console.log(data);
                                     
                                    $("#myModal").modal(); 
                                    $(".list_info").html(table);

                              },'json');

                                 // var action="generatePdf";
                               
                                 // $.post('pdf_invoice.php',{data:data},function(data){
                                  
                                 //  $('#list').html(data);  

                                 // });
                             });


                 
              },'json');
              html="";  
         });
                
       });


       $("#datep").change(function(){
        
          
          var date1=$(this).val();
          var html="";
          var action="billListSearchByDate";       
          
           $.post('ajax.php',{date1:date1,action:action},function(data){
                        
              html+="<table class='table table-bordered table-hover' style='background:white;'>"+
                 "<tr><th colspan='7'><img src='img/logo/kuidc.png' style='height:50px; text-align:center;'><h3 style='text-align:center;'>KUIDFC & TOWN MUNICIPAL COUNCIL<p>Magadi</p> </h3></th></tr>"+ 
                 "<tr><th>Bill Id</th><th> Customer Id </th><th>Reading</th>"+
                 "<th>Amount</th><th>Bill Date</th><th>Customer Type</th><th>Status</th></tr>";
                 
                // console.log(data);
                   var status='';
                   var totalAmount=0;
                   var totalReading=0;

                   for (var i=0;i<data.length;i++)
                   {

                        
                        if(data[i].status==0)
                        {
                           status="Unpaid";
                        }
                        else{
                          status="Paid";
                        }
                        
                        totalAmount+=parseInt(data[i].total);
                        totalReading+=parseInt(data[i].reading); 

                        var date=data[i].day+"-"+data[i].month+"-"+data[i].year;
                      
                       html+="<tr><td>"+data[i].bill_id+"</td><td><a href='#' class='cust_info' id='"+data[i].customer_id+"'>"+data[i].customer_id+"</a></td>"+
                       "<td>"+data[i].reading+"</td><td>"+data[i].total+"</td>"+
                       "<td>"+date+"</td><td>"+data[i].bill_type+"</td>"+
                       "<td>"+status+"</td></tr>";  

                   }
                    
                    html+="<tr style='background:lightgray;'><th colspan='3'>Total</th><td>"+totalReading+"</td><td>"+totalAmount+"</td><td colspan='3'>&nbsp;</td></tr>";
             
             
                    html+="</table>";


            
                      
                      $("#list").html(html);
                        $("#printDiv").show();      
                         $(".cust_info").click(function(){

                              
                              var customer_id=$(this).attr('id');
                              var table="";
                              var action="getBillToCustomer";

                              $.post('ajax.php',{action:action,customer_id:customer_id},function(data){
                                      
                                    table+="<table class='table table-hover table-bordered'>"+
                                    "<tr><th>Customer ID</th><td>"+data[0].customer_id+"</td></tr>"+
                                    "<tr><th>Name</th><td>"+data[0].customer_fullname+"</td></tr>"+
                                    "<tr><th>Address</th><td>"+data[0].address+"</td></tr>"+
                                    "<tr><th>Mobile</th><td>"+data[0].mobile+"</td></tr>"+
                                    "<tr><th>Meter ID</th><td>"+data[0].meter_id+"</td></table>";
                                     console.log(data);
                                     
                                    $("#myModal").modal(); 
                                    $(".list_info").html(table);

                              },'json');
                         
                         
                         });    
                       
                  },'json');
          });

  


       //print Document 
       $("#billStatus").change(function(){
             
               var status=$(this).val();
               var month=$("#smonth").val();
               var year=$("#syear").val(); 
               var action="getBillList"; 
               var html="";
               
                $.post('ajax.php',{year:year,month:month,status:status,action:action},function(data){
                      
                 html+="<table class='table table-bordered table-hover' style='background:white;'>"+
                 "<tr><th colspan='8'><img src='img/logo/kuidc.png' style='height:50px; text-align:center;'><h3 style='text-align:center;'>KUIDFC & TOWN MUNICIPAL COUNCIL<p>Magadi</p> </h3></th></tr>"+ 
                 "<tr><th>Bill Id</th><th> Customer Id </th><th>Customer Name</th><th>Reading</th>"+
                 "<th>Amount</th><th>Bill Date</th><th>Customer Type</th><th>Status</th></tr>"; 
                 
                   var status='';   
                   var totalReading=0;
                   var totalAmount=0; 

                 
                   if(data!=null)
                   {

                          for (var i=0;i<data.length;i++)
                          {


                                if(data[i].status==0)
                                {
                                   status="Unpaid";
                                }
                                else{
                                  status="Paid";
                                }
                        
                                  totalAmount+=parseInt(data[i].total);
                                  totalReading+=parseInt(data[i].reading); 
                                  
                                  var date=data[i].day+"-"+data[i].month+"-"+data[i].year;
                                
                                 html+="<tr><td>"+data[i].bill_id+"</td><td><a href='#' class='billSt' id='"+data[i].customer_id+"'>"+data[i].customer_id+"</a></td><td>"+data[i].customer_fullname+"</td>"+
                                 "<td>"+data[i].reading+"</td><td>"+data[i].total+"</td>"+
                                 "<td>"+date+"</td><td>"+data[i].bill_type+"</td>"+
                                 "<td>"+status+"</td></tr>"; 

                          }
                    
                              html+="<tr style='background:lightgray;'><th colspan='3'>Total</th><td>"+totalReading+"</td><td>"+totalAmount+"</td><td colspan='3'>&nbsp;</td></tr>";
                       
                              html+="</table>";


            
                      
                              $("#list").html(html);
                              $("#printDiv").show(); 
                                    
                                 $(".billSt").click(function(){

                                      
                                      var customer_id=$(this).attr('id');
                                      var table="";
                                      var action="getBillToCustomer";

                                      $.post('ajax.php',{action:action,customer_id:customer_id},function(data){
                                              
                                            table+="<table class='table table-hover table-bordered'>"+
                                            "<tr><th>Customer ID</th><td>"+data[0].customer_id+"</td></tr>"+
                                            "<tr><th>Name</th><td>"+data[0].customer_fullname+"</td></tr>"+
                                            "<tr><th>Address</th><td>"+data[0].address+"</td></tr>"+
                                            "<tr><th>Mobile</th><td>"+data[0].mobile+"</td></tr>"+
                                            "<tr><th>Meter ID</th><td>"+data[0].meter_id+"</td></table>";
                                             console.log(data);
                                             
                                            $("#myModal").modal(); 
                                            $(".list_info").html(table);

                                      },'json');
                                 
                                 
                                 }); 
                   }else{
                       
                        html="Sorry no record is found ";
                        $("#list").html(html);
                   }
                              
                      
                       
                  },'json');   // close first $.post()     
       });




    });

