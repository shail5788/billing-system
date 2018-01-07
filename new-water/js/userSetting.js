$(document).ready(function(){

       
       $("#oldPassword").change(function(){
                                
       	     var oldPassword=$(this).val();

       	      if(oldPassword!='')
       	      {
       	              
       	               $(".msgdiv").show();
		       	        
		       	        var action="MatchPrevUserPassword";
		                
		                $.post('ajax.php',{action:action,oldPassword:oldPassword},function(data){
		                   
		                     if(data.status=='true')
		                     {
		                          
		                          $("#flag").val(data.status); 
		                          $(".msgdiv").show();
		                          $("#newPassword").removeAttr('readonly');
		                          $("#msgdiv span").addClass('alert-sccess');
		                          $("#masge").html("Match Password");


		                     }
		                     else
		                     {
		                          
		                          $("#flag").val(data.status);
		                          $("#newPassword").prop('readonly','readonly');
		                          $(".msgdiv").show();
		                          $("#msgdiv span").addClass('alert-danger');
		                          $("#masge").html("Sorry ! Password did not match ");

		                     }
		                
		                },'json');

		                $("#changePassword").click(function(){

		                	 var newPassword=$("#newPassword").val();
		                	 
		                	 var action="userChangePassword";
		                	
		                	 var flag=$("#flag").val();
		                	 console.log(flag);
		                     if(flag=="true")
		                     {

		                     	$.post('ajax.php',{newPassword:newPassword,action:action},function(data){

		                          if(data.status=='true')
		                          {
		                          	  $("#masge").html("Success! Password has been changed !"); 
		                          	  $("#oldPassword").val('');
		                          	  $("#newPassword").val('');  
		                          }
		                          else
		                          {
		                          	  $("#masge").html("Sorry ! Some Technical Proble Occured ");
		                          }  
		                              

		                      
		                		 },'json');

		                     }
		                     else
		                     {
		                     	  $("#masge").html("Sorry ! Password did not match ");
		                     }
		                	 
                });

       	      }
       	      else
       	      {

       	      	    $(".msgdiv").show();
    				$("#masge").html("");
       	      }

       	      
                

       });

});