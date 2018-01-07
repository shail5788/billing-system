

<?php 
     error_reporting(0);
       $complain_id=$_POST['complain_id'];
       $complain_id;
       include('db/connect.php');
        $date=date("Y-m-d");
        $date1=explode('-', $date);
        $year=$date1[0];
        $month=$date1[1];
        $day=$date1[2];
        $day1=$day-4;   
        $date2=$year."-".$month."-".$day1;
        if($complain_id=="")
        {
      			$str="select * from complainregister where status='0' AND date='$date2' ";
        		$row=$con->query($str);
          		echo"<section> <div class='col-md-12 bg bg-head'>";
 	     		echo "<div class='col-md-1'>Complain Id</div><div class='col-md-1'>Customer Id </div><div class='col-md-2'>Name</div><div class='col-md-2'>Address</div><div class='col-md-1'>Date</div>
 				<div class='col-md-3'>Description</div><div class='col-md-1'>Status</div>
 				<div class='Process'> Process</div></div></section>";
        		while($result=$row->fetch_assoc())
       				 {
            			$customer_id=$result['customer_id'];
            			$complain_id1=$result['complain_id'];
        				$str1="select * from customer where customer_id='$customer_id'";
            			$row1=$con->query($str1);
            			$result1=$row1->fetch_assoc();
            			echo"
      						<div class='col-md-12 gradi' id='box'  style='background:white; font-family:verdana;font-size:13px; padding:7px;border-bottom: 1px solid #f3f3f3;box-shadow:3px 1px 2px 3px lightgray; ' class='text-center'>
    							<div class='col-md-1'>".$result['complain_id']."</div><div class='col-md-1'>".$result['customer_id']."</div><div class='col-md-2'>".$result1['customer_fullname']."</div><div class='col-md-2'>".$result1['address']."</div>
    								<div class='col-md-1'>".$result['date']."</div><div class='col-md-3'>".$result['discription']."</div><div class='col-md-1'>".$result['status']."</div>
    								<div class='col-md-1'> <a Ide='".$result['complain_id']."' href='#' class='escalate'>
    							<span class='glyphicon glyphicon-refresh'></span></a></div></div>";
  					 }
        
      	}
      	else{

            
             
              	$str="select * from complainregister where status='0' AND date='$date2' AND complain_id LIKE '%".$complain_id."%' ";
        		$row=$con->query($str);
        		   
        		  
          		echo" <div class='col-md-12 bg bg-head'>";
 	     		echo "<div class='col-md-1'>Complain Id</div><div class='col-md-1'>Customer Id </div><div class='col-md-2'>Name</div><div class='col-md-2'>Address</div><div class='col-md-1'>Date</div>
 				<div class='col-md-3'>Description</div><div class='col-md-1'>Status</div>
 				<div class='Process'> Process</div></div>";
                		while($result=$row->fetch_assoc())
        				{
            					$customer_id=$result['customer_id'];
        						$str1="select * from customer where customer_id='$customer_id' ";
            					$row1=$con->query($str1);
            					$result1=$row1->fetch_assoc();
            				echo"
      							<div class='col-md-12 gradi' id='box'  style='background:white; font-family:verdana;font-size:13px; padding:7px;border-bottom: 1px solid #f3f3f3;box-shadow:3px 1px 2px 3px lightgray;' class='text-center'>
    								<div class='col-md-1'>".$result['complain_id']."</div><div class='col-md-1'>".$result['customer_id']."</div><div class='col-md-2'>".$result1['customer_fullname']."</div><div class='col-md-2'>".$result1['address']."</div>
    									<div class='col-md-1'>".$result['date']."</div><div class='col-md-3'>".$result['discription']."</div><div class='col-md-1'>".$result['status']."</div>
    									<div class='col-md-1'> <a Ide='".$result['complain_id']."' href='#' class='escalate'>
    									<span class='glyphicon glyphicon-refresh'></span></a></div></div>";
  

              

        
       					 }


       		 }

       					 if($complain_id!='')
       					 {
                          	
                          $str="select * from complainregister where status='0' AND complain_id LIKE '%".$complain_id."%' ";

                            $row =$con->query($str);
                          while($result=$row->fetch_assoc())
        				{
            					$customer_id=$result['customer_id'];
        						$str1="select * from customer where customer_id='$customer_id' ";
            					$row1=$con->query($str1);
            					$result1=$row1->fetch_assoc();
            				echo"
      							<div class='col-md-12 gradi' id='box'  style='background:white; font-family:verdana;font-size:13px; padding:7px;border-bottom: 1px solid #f3f3f3;box-shadow:3px 1px 2px 3px lightgray; ' class='text-center'>
    								<div class='col-md-1'>".$result['complain_id']."</div><div class='col-md-1'>".$result['customer_id']."</div><div class='col-md-2'>".$result1['customer_fullname']."</div><div class='col-md-2'>".$result1['address']."</div>
    									<div class='col-md-1'>".$result['date']."</div><div class='col-md-3'>".$result['discription']."</div><div class='col-md-1'>".$result['status']."</div>
    									<div class='col-md-1'> <a Ide='".$result['complain_id']."' href='#' class='escalate'>
    									<span class='glyphicon glyphicon-refresh'></span></a></div></div>";
  

              

        
       					 }

       					 }

       					 





      




        
  
?>
<script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<script type="text/javascript">
 	$(".escalate").click(function(){
         
          var complain_id=$(this).attr("Ide");
          alert(complain_id);
          $.post('admin-mail-notification.php',{complain_id:complain_id},function(data){
              alert(data);
          });

 	});

 
</script>
