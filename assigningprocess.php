<?php error_reporting(0); ?>

  <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<?php
  $date1=$_POST['date1']; 
   $date2=explode('-',$date1);
   $day=$date2[0];
   $month=$date2[1];
   $year=$date2[2];
   $date3=$year."-".$month."-".$day;

  //$month=$_POST['month'];
  include('db/connect.php');
  $query1="select * from complainregister where date='$date3'";
  $row=$con->query($query1);
  echo"<div class='col-md-12 bg bg-head'>";
  echo"<div class='col-md-1'>Complain Id</div>
     <div class='col-md-1'>Customer_Id </div>
     <div class='col-md-2'>Name</div>
     <div class='col-md-2'>Address</div>
     <div class='col-md-1'>Zone</div>
     <div class='col-md-1'>Date</div>
     <div class='col-md-1'>Desc</div>
     <div class='col-md-1'>type</div>
     <div class='col-md-1'>Status</div>
     <div class='col-md-1'>Select</div></div>";
  while ($result=$row->fetch_assoc()) {
      $customer_id=$result['customer_id'];
      $qery1= "select * from customer where customer_id='$customer_id'";
      $row1=$con->query($qery1);
      $result1=$row1->fetch_assoc();

  	echo"
    <div class=col-md-12 style='background:white; font-family:verdana;font-size:13px; padding:7px;border-bottom: 1px solid lightgray;' >
    <div class='col-md-1'>".$result['complain_id']."</div>
    <div class='col-md-1'>".$result['customer_id']."</div>
    <div class='col-md-2'>".$result1['customer_fullname']."</div>
    <div class='col-md-2'>".$result1['address']."</div>
    <div class='col-md-1'>".$result1['area']."</div>
    <div class='col-md-1'>".$result['date']."</div>
    <div class='col-md-1'>".$result['discription']."</div>
    <div class='col-md-1'>".$result['complain_type']."</div>
    <div class='col-md-1'>".$result['status']."</div> 
    <div class='col-md-1'><input type='checkbox' class='checkbox' id='".$result1['area']."'  name='cumplain_id[]'' value='".$result['complain_id']."' required='required'> </div> </div>";
  }
  ?>
  	<div class="col-md-12">
     <div class="clr-20"></div>
        <div class='col-md-6' >
             <div class="col-md-12" id="assign1"></div>  
       </div> 
		<div class='col-md-6'>
         
           <select name="assign_to" id="assign_to">
		      <option>Select Employee</option>
          
			 
			  
		  </select>	  
       </div> 
    </div>


  	<div class="col-md-12">
     <div class="clr-20"></div>
	 <div class='col-md-6'>
       </div> 
        <div class='col-md-6'>
            <button class="col-md-12 btn btn-warning" id="assign"> Assign </button>
       </div> 
    </div>
 </table>
   <div id="div1"></div>
 <script language="javascript">

    $(document).on('change' , '.checkbox' , function(){

    if(this.checked) {
        var val=$(this).val();
        var area=$(this).attr('id');
       
        $.post("check_assign.php",{val:val},function(data){
          
          
          
              $("#div1").html(data);   
          
        
           
          

        });
         
        $.post('find_employee_byarea.php',{area:area},function(data){
            
           $("#assign_to").html(data);

        });


    }

});

    $('#assign').click(function(){
	                var assign_to=$('#assign_to').val();
                    var values = new Array();
                    $.each($("input[name='cumplain_id[]']:checked"), function() {
                     values.push($(this).val());
                    

				});
				var data12=values;
               if(data12.length=== 0)
               {
                  alert("Select Check Box first ");
               }
              
                else{
                  $.ajax({
                   url:"assignprocess1.php",
                   method:"POST",
                   data:{assign_to:assign_to,data12:data12},
                   dataType:"text",
                   success:function(data){
                     alert(data);
                     location.reload();
                   }
                
                });
                }
});
</script>
         

 