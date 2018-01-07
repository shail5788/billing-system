<?php
error_reporting(0);
include_once("db/connect.php");
include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api=new apiFunction($db,$con); // object apiFunction class

          $emp_id=$_POST['assign_to'];
          $complain=$_POST['data12'];
          include("db/connect.php");
          $slag=false;
      //$emp_id;
        //print_r($complain);
   $slag=false;
    $date2=date("Y-m-d");
    $date3=date('Y-m-d',strtotime($date2));
    for($i=0;$i<count($complain);$i++)
    { 
       
       // getting customer mobile no   
       $complain_id=$complain[$i];
       $query="select customer.* complainregister.complain_type from customer JOIN complainregister ON  complainregister.customer_id=customer.customer_id  where complainregister.complain_id='$complain_id'";
       $row= $con->query($query); 
       $result=$row->fetch_assoc();
       $mobile=$result['mobile'];
       $address=$result['address'];
       $customerName=$result['customer_fullname'];
       $zone=$result['area'];
       $ward=$result['city'];
       $road=$result['road'];
       $complain_type['complain_type'];

       // getting emp_name 

       $emp=$db->select_colum_where("employee",['emp_name','contactNo'],['emp_id'=>$emp_id]);
       $emp_name=$emp[0]['emp_name'];
       $emp_mobile=$emp[0]['contactNo'];
 
       $compaint=array(
                 
                 "emp_id"=>$emp_id,
                 'complain_id'=>$complain[$i],
                 'date'=>$date3,
                 'status'=>'U'
                 
                 );
       $status=$db->insert('complainasingnbook',$compaint);

        // if($status){
              
              $slag=true;
           // sending message to customer 
              $customerMessage=urlencode("Your Complain has been assigned to-".$emp_name."Contact no of service person is-".$emp_mobile."Complain Id-".$complain[$i]."service person track your problem shortly thank you");

             // sending message to service man 
              $serviceManMessage=urlencode("A complaint assigned to you Complain Id-".$complain[$i]."Consumer name is-".$customerName."Complain Type-".$complain_type."Address-".$address." Zone-".$zone."Ward-".$ward."Road-".$road."Contactno-".$mobile);

             $msg=$api->sendMessage($customerMessage,$mobile);
             $smsg=$api->sendMessage($serviceManMessage,$emp_mobile);

        // }
        
          
           
           

  }
  if($slag){
           echo "complaint has assigned";
        }else{
          echo "compaint did not assign ";
        }
     

       
         
     
    
      
     
     
       	
       
      
      
         
?>