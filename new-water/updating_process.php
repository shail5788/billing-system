<?php
  session_start();
        include_once("db/connect.php");
        include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api=new apiFunction($db,$con); // object apiFunction class

     $_SESSION['msg']='';
    if(isset($_POST['update']))
    {

         $first_in=$_POST['fi'];
         $firstname=$_POST['fname'];
         $middlename=$_POST['mname1'];
         $lastname=$_POST['lname2'];
         
         $fullname=$firstname." ".$middlename." ".$lastname;
     
        $data=array('customer_id'=>$_POST['customer_id'],
                    'C_name'=>ucfirst($_POST['fname']),
                    'C_mid_name'=>ucfirst($_POST['mname1']),
                    'C_lname'=>ucfirst($_POST['lname2']),
                    'customer_fullname'=>$fullname,
                    'relation_type'=>$_POST['relation'],
                    'r_name'=>ucfirst($_POST['rel_name']),
                    'no_of_family_m'=>$_POST['no_of_family'],
                    'adhar_no'=>$_POST['adharNo'],
                    'gender'=>$_POST['gen'], 
                    'type_of_customer'=>$_POST['c_type'],
                    'address'=>ucwords($_POST['address']),
                    'location'=>$_POST['location'],
                    'city'=>$_POST['city'],
                    'state'=>ucwords($_POST['state']),
                    'landline_no'=>$_POST['landline'],
                    'mobile'=>$_POST['mobile'], 
                    'pin'=>$_POST['pin'],
                    'addressproof'=>$_POST['addressProof'],
                    'idproof'=>$_POST['idProof'],
                    'meter_id'=>$_POST['meterA'],
                    'pid'=>$_POST['pid'],
                    'area'=>$_POST['zone'],
                    'location'=>$_POST['ward'],
                    'road'=>$_POST['road'],
                    'status'=>'0'
                    
                   ); 
        
          $response=$api->sendForApprovel('temp_table',$data);
     
      
          if($response)
          {

            
                  $str1="<font color='lightgray'>Going for Approval ....</font><font color='red'><b></b></font>";
                   
                  header('Location:amendments.php?msg='.$str1);
          }
          else{

            
                  $str1="<font color='lightgray'>Sorry Some technical Problem occured </font><font color='red'><b></b></font>";
                  $_SESSION['str']=$str1;
                  header('Location:amendments.php?msg='.$str1);
           }


         
     }   
  

?>


