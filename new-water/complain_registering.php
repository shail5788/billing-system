<?php 
     session_start();
        
        include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        
        $api= new apiFunction($db,$con); // object apiFunction class
        
        $msg="";
     // $customer_id=$_POST['customer_id'];
     // $address=$_POST['address'];
     // $location=$_POST['location'];
     // $problem=$_POST['problem'];
      $date1=$_POST['date2'];
     
      $status="0";
   
      $insertdate = date('Y-m-d', strtotime($date1));
     
      $date2=explode('-', $insertdate);
      
      $year=$date2[0];
      
      
      $month=$date2[1];
      

     if(isset($_POST['submit']))
     {
         
         $chack_customer=$db->select_colum_where('customer',['isActive'],['customer_id'=>$_POST['customer_id1']]);
           
         if( $chack_customer[0]['isActive']==0)
         {
            
            $msg=" Sorry This customer has Deactivated !";
            
             $_SESSION['message']=$msg;
            
            header('Location:complain-register.php');
                

         }
         else
         {

                $complain_id =rand(1000000,9999999);
                $mobile_no= $_POST['mobile'];
                $data=array('complain_id'=>$complain_id,'customer_id'=>$_POST['customer_id1'],
                    'month'=>$month,'year'=>$year,'date'=>$insertdate,'complain_type'=>$_POST['complain_type'],'discription'=>$_POST['discript'],'status'=>$status);

                  $response=$api->generateComplain($data);  
                
                 if($response)
                 {
                    
                    $message=urlencode("Your Complaint has been generated Complaint No-".$complain_id."Complaint Type-".$_POST['complain_type']."CustomerID".$_POST['customer_id1']."Complain discription-".$_POST['discript']."date".$insertdate."mobile-".$_POST['mobile']
                     );
                    $status=$api->sendMessage($message,$mobile_no);
                    $msg=" Your Complain has been Registerd. Complain Id is...".$complain_id;
                    
                     $_SESSION['message']=$msg;
                    
                    header('Location:complain-register.php');

                 }
                 else{
                    
                    $msg="sorry";
                    
                    $_SESSION['message']=$msg;
                    
                    header('Location:complain-register.php');
                 }
         
         }
        


     }


?>