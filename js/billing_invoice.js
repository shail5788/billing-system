$(document).on('change' , '.checkbox' , function(){

    var values = new Array(); 
    if(this.checked) {

        var val=$(this).val();
        var action ="CheckBillStatus";
            
            $.post('ajax.php',{val:val,action:action},function(data){
            
            $("#sms").html(data);
             
            });   
            
                 
                $.each($("input[name='checkbox[]']:checked"), function() {
                 values.push($(this).val());
               });
                var data1=values;
                       //alert(data1); 
        //var area=$(this).attr('id');
       
        var action1="getBillingTotal";
        
        $.post("ajax.php",{data1:data1,action1:action1},function(data){
         
        
         console.log(data);
        $("#sumtotal").val(data);}); 
        }
        });    

      $(document).ready(function(){

         $("#model").click(function(){
          var customer_id=$("#customer_id").val();
          var name=$("#name").val();
          var customer_type=$("#customer_type").val();
          var total=$("#sumtotal").val();
          var mode=$("#mode").val();
          var mode2=$("#mode2").val();
          var ppay=$("#ppay").val();
          var rpay=$("#rpay").val();
         
          var values = new Array(); 
          $.each($("input[name='checkbox[]']:checked"), function() {
                     values.push($(this).val());
                   });
                    var data1=values;
                     if(data1.length===0)
                      {
                        alert("Please Select Any unpaid month");
                      }
                      
                   
                   else{
                    $.post('invoice.php',{customer_id:customer_id,
                                name:name,
                                customer_type:customer_type,
                                total:total,
                                mode:mode,
                                mode2:mode2,
                                ppay:ppay,
                                rpay:rpay,
                                data1:data1},function(data){
                                $(".invoice_popup").html(data);
                                });


       }  }); 


                $("#mode").change(function(){
            
                var mode1=$("#mode").val();
                 if(mode1=='Cheque')
                 {
                    $("#mode2").removeAttr("readonly","readonly");
                    $("#mode2").attr("placeholder","Enter the cheque Number");
                     
                 }
                 else if(mode1=='Cash')
                 {
                   $("#mode2").attr("readonly","readonly");
                   $("#mode2").removeAttr("placeholder");
                   $("#mode2").val('');
                 }
                 else{
                    $("#mode2").attr("readonly","readonly");
                   $("#mode2").removeAttr("placeholder");
                   $("#mode2").val('');
                 }
                 });

                $("#ppay").blur(function(){
                 var gtotal=$("#sumtotal").val();
                 var amount=$("#ppay").val();
                 var remaining=(gtotal-amount);
                 
                 $("#rpay").val(remaining);
                  });

      });
