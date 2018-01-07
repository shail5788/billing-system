<?php
error_reporting(0);
  session_start();
    
    include_once("db/connect.php");
    include_once('resource/api_function.php');
    
    $db=new database($con);   //object of query builder
    $api= new apiFunction($db,$con); // object apiFunction class
    $_SESSION['msg']='';
    $customer_id=$_POST['id'];
    $row_id=$_POST['row_id'];
 
    $result=$db->select('temp_table',['customer_id'=>$customer_id,'id'=>$row_id]);

     $firstname=$result[0]['C_name'];
     $middlename=$result[0]['C_mid_name'];
     $lastname=$result[0]['C_lname'];

     $customer_fullname=$firstname." ".$middlename." ".$lastname;

      $record=array('C_name'=>$result[0]['C_name'],'C_mid_name'=>$result[0]['C_mid_name'],
                    'C_lname'=>$result[0]['C_lname'],'customer_fullname'=>$customer_fullname,'relation_type'=>$result[0]['relation_type'],'r_name'=>$result[0]['r_name'],'no_of_family_m'=>$result[0]['no_of_family_m'],'adhar_no'=>$result[0]['adhar_no'],'gender'=>$result[0]['gender'],'address'=>$result[0]['address'],'location'=>$result[0]['location'],'city'=>$result[0]['city'],'state'=>$result[0]['state'],'landline_no'=>$result[0]['landline_no'],'mobile'=>$result[0]['mobile'],'pin'=>$result[0]['pin'],'addressproof'=>$result[0]['addressproof'],'idproof'=>$result[0]['idproof'],'meter_id'=>$result[0]['meter_id'],'area'=>$result[0]['area'],'pid'=>$result[0]['pid'],'road'=>$result[0]['road']);

      


         $response=$api->approvingProcess('customer',$record,['customer_id'=>$customer_id]);

          
          $msg="Record has updataed.... "; 
        
          if($response)
          {
             
              $_SESSION['msg']=$msg; 
        
               $res=$api->dataRemove('temp_table',['customer_id'=>$customer_id,'id'=>$row_id]);
            
              if($res)
              {
                  
                  header('Location:approval.php');

              }
              else
              {

              }
            

          }
          else{
               

               $msg='sorry...  '.$customer_id;
               $_SESSION['msg']=$msg ; 
          
          }


     ?>