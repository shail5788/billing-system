$(document).ready(function(){

	 $("#FindBill").click(function(){

	 	    
	 	    var customer_id=$("#customer_id").val();
	 	    var meter_id=$("#meter_id").val();
	 	    var month=$("#month").val();
	 	    var year=$("#year").val();
	 	    var action="EditBillInformation";
            var param={customer_id:customer_id,meter_id:meter_id,year:year,month:month};
               
             $("#billEditing").modal();
               
            $.post('ajax.php',{param:param,action:action},function(data){
              
                console.log(data);
                var previousReading=data[0].meterReading-data[0].reading;
                
                $("#c_id").val(data[0].customer_id);
                $("#c_name").val(data[0].customer_fullname);
                $("#address").val(data[0].address);
                $("#zone").val(data[0].area);
                $("#ward").val(data[0].location);
                $("#road").val(data[0].road);
                $("#bill_id").val(data[0].bill_id);
                $("#bmonth").val(data[0].month);
                $("#byear").val(data[0].year);
                $("#p_reading").val(previousReading);
                $("#c_reading").val(data[0].meterReading);
                $("#a_reading").val(data[0].reading);
                $("#ctype").val(data[0].bill_type);
                $("#amt").val(data[0].total);
                $("#ugd").val(data[0].ugd_connection_fee);
                $("#borwell").val(data[0].borwell_charge);

         

            },'json');

            $("#c_reading").change(function(){

            	   var mread=$(this).val();
            	   var previous_m=$("#p_reading").val();
                 var type=$("#ctype").val();
            	   var aReading=mread-previous_m;
                 $("#a_reading").val(aReading);
                 
                 $.post("total.php",{mread:mread,type:type,previous_m:previous_m},function(data){
                        
                         console.log(data);
                        $("#amt").val(data);
                 });
            
            });

            $("#up").change(function(){

                   
                   var up=$(this).val();
                   var aReading=$("#a_reading").val();
                   var amount= up*aReading;
				           $("#amt").val(amount);
				   

			});  


	 });

     $("#changeBill").click(function(){

               
        
               var customer_id=$("#c_id").val();
               var customer_name=$("#c_name").val();
               // var address=$("#address").val();
               // var zone=$("#zone").val();
               // var ward=$("#ward").val();
               // var road=$("#road").val();
               var bill_id=$("#bill_id").val();
               var bmonth=$("#bmonth").val();
               var year=$("#byear").val();
               var p_reading=$("#p_reading").val();
               var c_reading=$("#c_reading").val();
               var a_reading=$("#a_reading").val();
               var ctype=$("#ctype").val();
               var amount=$("#amt").val();
               var ugd=$("#ugd").val();
               var borwell=$("#borwell").val();
               var action ="goingBIllForApproval";
               var data={customer_id:customer_id,customer_name:customer_name,bill_id:bill_id,bmonth:bmonth,year:year,c_reading:c_reading,
                a_reading:a_reading,ctype:ctype,amount:amount,ugd:ugd,borwell:borwell};

                $.post('ajax.php',{data:data,action:action},function(data){

                        alert(data);

                });
               


     });

});
