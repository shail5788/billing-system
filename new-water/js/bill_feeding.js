
          $(document).ready(function(){
            
                
            $('#date1').change(function(){
              
                
                var date2=$(this).val();
                
                var customer_id=$('#c_id').val();
                
                var action ="getPreviousReading";
              
                $.post('ajax.php',{date2:date2,customer_id:customer_id,action:action},function(data){
                  
                   console.log(data);
                   $('#p_reading').val(data);  
                
                });

            });



              $('#mreading').blur(function(){
                   var mread= $('#mreading').val();
                   var type=  $('#type').val();
                   var previous_m=$('#p_reading').val();
                  // alert(previous_m);
                   $.post('total.php',{mread:mread,type:type,previous_m:previous_m},function(data){

                      $('#total').val(data);
                   });

              });
      });