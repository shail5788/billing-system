$(document).ready(function(){

     $("#customer_id").keyup(function(){

     	 var customer_id=$(this).val();
         
         if(customer_id!='')
         {

                 var action ="searchCustomerWithAutoload";
         
		         var nameList="";

		         nameList+="<ul class='getName'>"; 
		     	 
		     	 $.post('ajax.php',{customer_id:customer_id,action:action},function(data){

                
                 // console.log(data);
                  
                  for(var i=0;i<data.length;i++)
                  {

                  	  nameList+="<li id='cname' Ide='"+data[i].customer_id+"'>"+data[i].customer_fullname+"</li>";
                  
                  }
     	 	      
     	 	     nameList+="</ul>";
     	 	      
     	 	     $("#names").fadeIn(500);

     	 	     $("#names").html(nameList);

                   // Get Individual Record 

	     	 	     $(".getName #cname").click(function(){
	                   
	                   		var customer_id= $(this).attr('Ide');

	                   		var action="getIndividualCustomerById";
	                        
	                        $("#customer_id").val(customer_id);

	                        $.post('ajax.php',{action:action,customer_id:customer_id},function(data){

	                             console.log(data);

	                             $("#customer_id1").val(customer_id);

	                             $("#name").val(data[0].customer_fullname);

	                             $("#address").val(data[0].address);

	                             $("#location").val(data[0].location);

	                             $("#city").val(data[0].city);

	                             $("#contact").val(data[0].mobile);

	                             $("#pin").val(data[0].pin);
	                        },'json');
	                       
	                       $("#names").fadeOut();

	     	 	     });


     		 },'json');
     	
         }
         else
         {

            $("#names").fadeOut();	  
         
         }
     	 

     });


});