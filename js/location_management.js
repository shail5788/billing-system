$(document).ready(function(){
        
      $("#area").blur(function(){
          
         
         var area=$("#area").val();
        
         var action ="getLocationArea";  
         
         $.post('ajax.php',{area:area,action:action},function(data){
          
             $("#reslt").html(data);
             
         });


      });
    
      $("#locality").blur(function(){
        
           
           var area=$("#area").val();
           
           var action="GetLocality"
           
           var locality=$("#locality").val();
          
           $.post('ajax.php',{locality:locality,area:area,action:action},function(data){
                
             $("#reslt").html(data);
           
           }); 

       }); 


       $("#add_pin").blur(function(){

               var pin =$("#add_pin").val();
               
               var area=$("#area").val();

               var action="CheckPin";
               
               $.post('ajax.php',{pin:pin,area:area,action:action},function(data){
                
                 $("#reslt").html(data);
             
             }); 

       });

       $("#assign_area").click(function(data){
         
              var pin=$("#add_pin").val();
              var area=$("#area").val();
              var locality=$("#locality").val();
              var action ="AddLocation";

              if(area=="")
              {
                alert("Enter area");

              }
              else if(locality=="")
              {
                alert("Enter Locality");
              }
              else if(pin=="")
              {
                alert("Enter Pin");

              }
              else
              {

                  $.post('ajax.php',
                    {
                        pin:pin,
                        area:area,
                        locality:locality,action:action},
                        function(data){

                        $("#reslt").html(data);
                       
                       fetchData();
                  });
            
              }

       });
                  
        function fetchData()
        {

        
            $.post('fetch_location.php',function(data){
         
             $("#locationData").html(data);
             

                 $(".location_edit").click(function(){

                     var location_id=$(this).attr('Ide');
                     
                     var action ="EditLocation";
                      
                   
                     $("#location_detail").modal();

                     $.post('ajax.php',{location_id:location_id,action:action},function(data){
                      
                         console.log(data);

                          $("#zone").val(data[0].area);
                          $("#ward").val(data[0].locality);
                          $("#road").val(data[0].pin);
                          $("#id").val(data[0].id);

  
                     },'json');

                 }); 

                 $(".location_delete").click(function(){

                      
                      var id=$(this).attr("id");

                      var action ="DeleteExistingLocation";  
                      var response=confirm("Do You want to delete this location ");
                      if(response)
                      {
                           
                           $.post("ajax.php",{action:action,id:id},function(data){

                            alert(data);

                            window.location.href="location_management.php";

                           });   
                      }

                         
                 });
            }); 
            
            $("#changeLocaiton").click(function(){
                  
              
                  var zone =$("#zone").val();
                  var ward=$("#ward").val();
                  var road=$("#road").val();
                  var id=$("#id").val();
                  var action="UpdateLocation";
                    
                  $.post("ajax.php",{action:action,zone:zone,ward:ward,road:road,id:id},function(data){

                         alert(data);

                         window.location.href="location_management.php";

                  });


                  
            });  
        }
      fetchData();
});