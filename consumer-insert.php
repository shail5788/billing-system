<?php
     include_once("db/connect.php");
     include_once('resource/api_function.php');
      
      
      $firstname=ucfirst($_POST['fname']);
      $middlename=ucfirst($_POST['mname1']);
      $lastname=ucfirst($_POST['lname1']);
      $date1=$_POST['date1'];
      
     //$address2=$address." ".$address1;
      $customer_id=rand(10,100000000000);
      $fullname=$firstname." ".$middlename." ".$lastname;
      $date2= date("Y-m-d",strtotime($date1));
      $day=explode("-", $date2);
      
      $year=$day[0];
      $month=$day[1];
      $day=$day[2];
       
            //Create Object of apiFunction class

          $db=new database($con);   //object of query builder
          $api= new apiFunction($db,$con); // object apiFunction class

          $data=array('customer_id'=>$customer_id,'fi'=>$_POST['fi'], 
          'C_name'=>ucfirst($_POST['fname']),'C_mid_name'=>ucfirst($_POST['mname1']),
          'C_lname'=>ucfirst($_POST['lname1']), 'customer_fullname'=>$fullname,
          'relation_type'=>$_POST['relation'], 'r_name'=>ucfirst($_POST['rel_name']),
          'no_of_family_m'=>$_POST['no_of_family'],'adhar_no'=>$_POST['adharNo'],
          'gender'=>$_POST['gen'], 'type_of_customer'=>$_POST['c_type'],
          'address'=>ucwords($_POST['address']),'location'=>$_POST['location'],
          'area'=>$_POST['zone'],'road'=>$_POST['road'],'city'=>$_POST['city'],
          'state'=>ucwords($_POST['state']),'landline_no'=>$_POST['landline'],
          'mobile'=>$_POST['mobile'], 'pin'=>$_POST['pin'],
          'addressproof'=>$_POST['addressProof'],'idproof'=>$_POST['idProof'],
          'meter_id'=>$_POST['meterA'],'pid'=>$_POST['pid'],'issue_date'=>$date2,
          'day'=>$day,'month'=>$month,'year'=>$year); 
          print_r($data);
          $response=$api->create_customer($data);
          if($response)
          {
            $_SESSION['customer_id']=$customer_id; 
            header('location:upload-document.php');
          
          }
          else
          {
            
            echo "Success !";
            //header('location:new-connection.php');
          }


 

 ?>     