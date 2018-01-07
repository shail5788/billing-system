<?php //error_reporting(0);
    
session_start();
    
     //include('db/connect.php');
     include_once("db/connect.php");
     include_once('resource/api_function.php');
        
      $db=new database($con);   //object of query builder
      $api= new apiFunction($db,$con); //object apiFunction class

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

      // get Mobile No 
      $data=$db->select_colum_where("customer",['mobile'],['customer_id'=>$customer_id]);
      $mobile=$data[0]['mobile'];

       if(isset($_POST['submit']))
       {
           $bill_id=rand(10000,999999);

           $dataSet=array("bill_id"=>$bill_id,"customer_id"=>$customer_id,
                          "day"=>$day,"month"=>$month,'year'=>$year,
                          "bill_type"=>$type,"meterReading"=>$meterReading,
                          "total"=$total,"status"=>$status,"reading"=>$actual_meter_reading);
           //$getResponse=$db->insert('bill',$dataSet);

           if($getResponse==true){
             
              $message="Your Bill has been generated successfully. Bill No - $bill_id <br>Month- $month Year-$year <br> Current Reading- $meterReading<br> Acutual Reading- $actual_meter_reading Amount- $total<br> Thank You !";

              $response=$api->sendMessage($message,$mobile);

              $msg="Bill Generated ...Your Bill Id is --->".$bill_id;
              $_SESSION['message']=$msg;
              header('Location:bill-feeding.php');
           }else{
          
              $msg="Sorry Some Technical Problem Occured";
              $_SESSION['message']=$msg;
              header('Location:bill-feeding.php');
           }  

             // $query1="INSERT INTO `bill` (`bill_id`, `customer_id`, `day`,`month`, `year`, `bill_type`, `meterReading`, `total`, `status`,`reading`) VALUES ('$bill_id','$customer_id','$day','$month','$year','$type','$meterReading','$total','$status','$actual_meter_reading')";
            // if($con->query($query1)===TRUE)
            // {
                

                

            // }
             

      }
?>


       
