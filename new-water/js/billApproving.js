
    $(document).ready(function(){

        $('.seen #seeData').click(function(){

             var id=$(this).attr("Ide");
             
             var action ="gettingTempData";
            
              $.post('billApproving.php',{id:id,action:action},function(data){
        
                $(".result").html(data); 
                 
          });


       });


      
       $('.seen #approve1').click(function(){

         var id=$(this).attr("Ide");
         var action="billGoingToApprove";
          $.post('ajax.php',{id:id,action:action},function(data){
          console.log(data); 
          alert(data);
          location.reload();   
         });
       
       });




       $('#reject').click(function(){
         
           var id=$(this).attr("ide");
           var action="RejectBillUpdateRequest";
           var response=confirm("Do you want to reject ?");
           if(response)
           {
               $.post('ajax.php',{id:id,action:action},function(data){
               alert(data);  
               window.location.reload(); 
              });
           }
           

       });

       // this code for searching module........
           

       $("#customer_id").keyup(function(){

             var customer_id=$(this).val();
             
             var action="searchBillForApproval";
             
             if(customer_id!='')
             {
                   
                   $("#approvalResult").hide();
                   $(".searchResult").show();
                   
                   var html="";
                   var j=0;
                   html+="<table class='table table-bordered' style='background:white;'>";
                   html+="<tr><th>Id</th><th>Name</th><th>Bill Id</th><th>Operation</th><th>Reject</th></tr>";

                   $.post("ajax.php",{customer_id:customer_id,action:action},function(data){
                               
                      console.log(data);
                      
                      for(var i=0;i<data.length;i++)
                      {
                         j++;
                         html+="<tr class='accordion-toggle table-hover1'><td>"+data[i].customer_id+"</td><td>"+data[i].customer_name+
                          "</td><td>"+data[i].bill_id+"</td><td data-toggle='collapse' data-target='#demo''"+j+"' class='seen'><a href='#' id='seeData'  Ide='"+data[i].bill_id+"'>See</a>|"+
                          "<a href='#' class='approve' id='approve1' Ide='"+data[i].bill_id+"'>Approve</a></td>"+
                          "<td><a href='#' id='reject' Ide='"+data[i].bill_id+"'>Reject</a></td></tr>";  
                          html+="<tr><td colspan='6' class='hiddenRow'><div class='col-md-10 col-md-offset-2 accordian-body collapse result' id='demo''"+j+"' style='margin-left: 100px;'> "+
                          "</td></tr>";
                      }
                      html+="</table>";
                      $(".searchResult").html(html);
                      
                      // start Operation on Data 

                      $('.seen #seeData').click(function(){

                         var id=$(this).attr("Ide");
                      
                         var action ="gettingTempData";
                        
                         $.post('billApproving.php',{id:id,action:action},function(data){
                    
                         $(".result").html(data); 
                             
                      });
                     
                     });
                      // code for approving spacific row 
                     $('.seen #approve1').click(function(){

                       var id=$(this).attr("Ide");
                        // alert(id);
                        $.post('approving_process.php',{id:id},function(data){
                        console.log(data); 
                        
                        location.reload();   
                       });
                     
                     });
                     // code for reject module 
                     $('#reject').click(function(){
         
                         var id=$(this).attr("ide");
                         var action="RejectRequest";
                         var response=confirm("Do you want to reject ?");
                         if(response)
                         {
                            $.post('ajax.php',{id:id,action:action},function(data){
                               
                               alert(data);  
                               window.location.reload();

                            });
                         }
                     });
      
 

                          
                   },'json'); 
             }
             else
             {
               
               $(".searchResult").hide();
               $("#approvalResult").show();
             
             }
            
             


       });

       // search bill to approve by bill id 

       $("#bill_id").keyup(function(){

             var bill_id=$(this).val();
             
             var action="searchBillForApprovalUsingBillId";
             
             if(bill_id!='')
             {
                   
                   $("#approvalResult").hide();
                   $(".searchResult").show();
                   
                   var html="";
                   var j=0;
                   html+="<table class='table table-bordered' style='background:white;'>";
                   html+="<tr><th>Id</th><th>Name</th><th>Bill Id</th><th>Operation</th><th>Reject</th></tr>";

                   $.post("ajax.php",{bill_id:bill_id,action:action},function(data){
                               
                      console.log(data);
                      
                      for(var i=0;i<data.length;i++)
                      {
                         j++;
                         html+="<tr class='accordion-toggle table-hover1'><td>"+data[i].customer_id+"</td><td>"+data[i].customer_name+
                          "</td><td>"+data[i].bill_id+"</td><td data-toggle='collapse' data-target='#demo''"+j+"' class='seen'><a href='#' id='seeData'  Ide='"+data[i].bill_id+"'>See</a>|"+
                          "<a href='#' class='approve' id='approve1' Ide='"+data[i].bill_id+"'>Approve</a></td>"+
                          "<td><a href='#' id='reject' Ide='"+data[i].bill_id+"'>Reject</a></td></tr>";  
                          html+="<tr><td colspan='6' class='hiddenRow'><div class='col-md-10 col-md-offset-2 accordian-body collapse result' id='demo''"+j+"' style='margin-left: 100px;'> "+
                          "</td></tr>";
                      }
                      html+="</table>";
                      $(".searchResult").html(html);
                      
                      // start Operation on Data 

                      $('.seen #seeData').click(function(){

                         var id=$(this).attr("Ide");
                      
                         var action ="gettingTempData";
                        
                         $.post('billApproving.php',{id:id,action:action},function(data){
                    
                         $(".result").html(data); 
                             
                      });
                     
                     });
                      // code for approving spacific row 
                     $('.seen #approve1').click(function(){

                       var id=$(this).attr("Ide");
                        // alert(id);
                        $.post('approving_process.php',{id:id},function(data){
                        console.log(data); 
                        
                        location.reload();   
                       });
                     
                     });
                     // code for reject module 
                     $('#reject').click(function(){
         
                         var id=$(this).attr("ide");
                         var action="RejectRequest";
                         var response=confirm("Do you want to reject ?");
                         if(response)
                         {
                            $.post('ajax.php',{id:id,action:action},function(data){
                               
                               alert(data);  
                               window.location.reload();
                                
                            });
                         }
                     });
      
 

                          
                   },'json'); 
             }
             else
             {
               
               $(".searchResult").hide();
               $("#approvalResult").show();
             
             }
            
             


       });
});