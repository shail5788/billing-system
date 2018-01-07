<?php //error_reporting(0);
    
session_start();
    
     include('db/connect.php');
     $customer_id=$_POST['customer_id'];
     //echo $customer_id;
      $fullname=$_POST['fullname'];
      $type=$_POST['type'];
      $date=$_POST['date1'];
      $previous_month_reading=$_POST['p_reading'];
      $meterReading=$_POST['reading'];
      $msg="";
      $insertdate = date('Y-m-d', strtotime($date));
      $date2 =explode('-', $insertdate); 
      $year= $date2[0];
      $month=$date2[1];
      $day=$date2[2];
      $total=$_POST['total'];
      $status=$_POST['status'];
      $actual_meter_reading=$meterReading-$previous_month_reading;
       if(isset($_POST['submit']))
       {
         $bill_id=rand(10000,999999);
         $query1="INSERT INTO `bill` (`bill_id`, `customer_id`, `day`,`month`, `year`, `bill_type`, `meterReading`, `total`, `status`,`reading`) VALUES ('$bill_id','$customer_id','$day','$month','$year','$type','$meterReading','$total','$status','$actual_meter_reading')";
        if($con->query($query1)===TRUE)
        {

            $msg="Bill Generated ...Your Bill Id is --->".$bill_id;
            $_SESSION['message']=$msg;
            header('Location:bill-feeding.php');

        }
        else{
        	$msg="Sorry Some Technical Problem Occured";
        	$_SESSION['message']=$msg;
        	header('Location:bill-feeding.php');
        }    

      }
?>


       
