<?php
error_reporting(0);
  session_start();
     include('db/connect.php');
     $_SESSION['msg']='';
     $customer_id=$_POST['id'];
     $row_id=$_POST['row_id'];


  
      
     $str2="select * from customer where customer_id='$customer_id'";
     $row2=$con->query($str2);
     $result1=$row2->fetch_assoc();


     //echo "shailendra ";
     //$first_in=$_POST['fi'];
     $firstname=$result1['C_name'];
     $middlename=$result1['C_mid_name'];
     $lastname=$result1['C_lname'];
     $customer_fullname=$firstname." ".$middlename." ".$lastname;
     
     $relation=$result1['relation_type'];
     $relativeName=$result1['r_name'];
     $no_of_family=$result1['no_of_family_m'];
     $adhar_no=$result1['adhar_no'];
     $gender=$result1['gender'];
     $address=$result1['address'];
     $location=$result1['location'];
     $city=$result1['city'];
     $state=$result1['state'];
     $landline=$result1['landline_no'];
     $mobile=$result1['mobile'];
     $pin=$result1['pin'];
                       //$address1=$_POST['address'];
     $addressproof=$result1['addressproof'];
     $idProof=$result1['idproof'];
     $meter_id=$result1['meter_id'];  
     $area=$result1['area'];
     $road=$result1['road'];
     $pid=$result1['pid'];




   // After update data 

     $str1="select * from temp_table where customer_id='$customer_id'  AND id='$row_id'";
     $row1=$con->query($str1);
     $result=$row1->fetch_assoc();


     //echo "shailendra ";
     //$first_in=$_POST['fi'];
     $firstname1=$result['C_name'];
     $middlename1=$result['C_mid_name'];
     $lastname1=$result['C_lname'];
     $customer_fullname1=$firstname." ".$middlename." ".$lastname;
     
     $relation1=$result['relation_type'];
     $relativeName1=$result['r_name'];
     $no_of_family1=$result['no_of_family_m'];
     $adhar_no1=$result['adhar_no'];
     $gender1=$result['gender'];
     $address1=$result['address'];
     $location1=$result['location'];
     $city1=$result['city'];
     $state1=$result['state'];
     $landline1=$result['landline_no'];
     $mobile1=$result['mobile'];
     $pin1=$result['pin'];
                       //$address1=$_POST['address'];
     $addressproof1=$result['addressproof'];
     $idProof1=$result['idproof'];
     $meter_id1=$result['meter_id'];
     $area1=$result['area'];
     $road1=$result['road'];
     $pid1=$result['pid'];
     

   
     

    ?>
<div class="col-md-6">
     <table  class="table table-bordered" style="width:100%;margin-top:20px;height:40% "  >
      <tr>
         <th colspan="6"  >Original Data </th>             
         

      </tr>
       <tr >
       <td class="tr2">Fisrt Name</td>
       <td class="tr1"><?php echo $firstname; ?></td><td class="tr2">Middle Name</td><td class="tr1"><?php echo $middlename;?></td>
       <td class="tr2" >Last Name</td  ><td class="tr1"><?php echo $lastname; ?></td></tr> 

      <tr > <td class="tr2">Relation Type</td><td class="tr1"><?php echo $relation; ?></td><td class="tr2">Relative Name</td><td class="tr1"><?php echo $relativeName;?></td>
       <td class="tr2">No Of Family Member</td><td class="tr1"><?php echo $no_of_family; ?></td></tr> 

        <tr > <td class="tr2">Adhar No</td><td class="tr1"><?php echo $adhar_no; ?></td><td class="tr2">Gender</td><td class="tr1"><?php echo $gender;?></td>
         <td class="tr2">Address</td><td class="tr1"><?php echo $address; ?></td></tr> 

         <tr > <td class="tr2">Location</td><td class="tr1"><?php echo $location; ?></td><td class="tr2">City</td><td class="tr1"><?php echo $city;?></td>
         <td class="tr2">State</td><td class="tr1"><?php echo $state; ?></td></tr> 

         <tr > <td class="tr2">Landline No</td><td class="tr1"><?php echo $landline; ?></td><td class="tr2">Mobile No</td><td class="tr1"><?php echo $mobile;?></td>
         <td class="tr2">Pin No</td><td class="tr1"><?php echo $pin; ?></td></tr> 
         <tr > <td class="tr2">Address Proof</td><td class="tr1"><?php echo $addressproof ?></td><td class="tr2">ID Proof</td><td class="tr1"><?php echo $idProof;?></td>
         <td class="tr2">Meter ID</td><td class="tr1"><?php echo $meter_id; ?></td></tr> 
         <tr><td>PID No</td><td><?php echo $pid ?></td><td>Zone</td><td><?php echo $area ?></td><td>Road</td><td><?php echo $road ?></td></tr>


     </table>


</div>











<?php






     ?>
      <style type="text/css">
         /* .tr1{
            background: white;
            font-family: verdana;
            font-size: 12px;
            color: black;
            padding:10px;
            border-bottom: 1px solid lightgray;
          }*/
          .tr2{
            // background:lightblue;
            // font-family: verdana;
            // font-size: 12px;
            // color: black;
            // padding:10px;
            // border-top: 1px solid lightgray;
            font-weight: bold;
            width: 200px;
          }

         table{
          float: left;
         }
      </style>
      <div class="col-md-6">
     <table class="table table-bordered" style="width:100%;margin-top:20px;height: 40% "  >
      <tr>
         <th colspan="6"  >After Correction Data </th>             
         

      </tr>
       <tr >
       <td class="tr2">Fisrt Name</td><td class="tr1"><?php if(strcmp($firstname1,$firstname)==0) echo $firstname1;
         else echo"<font style=color:red;font-weight:bold;>".$firstname1."</font>";?></td><td class="tr2">Middle Name</td><td class="tr1"><?php if(strcmp($middlename1,$middlename)==0) echo $middlename1;
         else echo"<font style=color:red;font-weight:bold;>".$middlename1."</font>";?></td>
       <td class="tr2" >Last Name</td  ><td class="tr1"><?php if(strcmp($lastname1,$lastname)==0) echo $lastname1;
         else echo"<font style=color:red;font-weight:bold;>".$lastname1."</font>";?></td></tr> 

      <tr >
       <td class="tr2">Relation Type</td>
       
       <td class="tr1"><?php if(strcmp($relation1,$relation)==0) echo $relation1;
       else echo"<font style=color:red;font-weight:bold;>".$relation1."</font>";?></td>

       <td class="tr2">Relative Name</td>
       
       <td class="tr1"><?php if(strcmp($relativeName1,$relativeName)==0) echo $relativeName1;
        else echo"<font style=color:red;font-weight:bold;>".$relativeName1."</font>";?></td>


       <td class="tr2">No Of Family Member</td>

        <td class="tr1"><?php if(strcmp($no_of_family1,$no_of_family)==0) echo $no_of_family1;
        else echo"<font style=color:red;font-weight:bold;>".$no_of_family1."</font>";?></td>

      </tr> 

        <tr > <td class="tr2">Adhar No</td><td class="tr1"><?php if(strcmp($adhar_no1,$adhar_no)==0) echo $adhar_no1;
         else echo"<font style=color:red;font-weight:bold;>".$adhar_no1."</font>"; ?></td><td class="tr2">Gender</td><td class="tr1"><?php if(strcmp($gender1,$gender)==0) echo $gender1;
         else echo"<font style=color:red;font-weight:bold;>".$gender1."</font>";?></td>
         <td class="tr2">Address</td><td class="tr1"><?php if(strcmp($address,$address1)==1) echo $address1;
         else echo"<font style=color:red;font-weight:bold;>".$address1."</font>";?></td></tr> 

         <tr > <td class="tr2">Location</td><td class="tr1"><?php if(strcmp($location1,$location)==0) echo $location1;
         else echo"<font style=color:red;font-weight:bold;>".$location1."</font>"; ?></td><td class="tr2">City</td><td class="tr1"><?php if(strcmp($city1,$city)==0) echo $city1;
         else echo"<font style=color:red;font-weight:bold;>".$city1."</font>";?></td>
         <td class="tr2">State</td><td class="tr1"><?php if(strcmp($state1,$state)==0) echo $state1;
         else echo"<font style=color:red;font-weight:bold;>".$state1."</font>"; ?></td></tr> 

         <tr > <td class="tr2">Landline No</td><td class="tr1"><?php if(strcmp($landline1,$landline)==0) echo $landline1;
         else echo"<font style=color:red;font-weight:bold;>".$landline1."</font>"; ?></td><td class="tr2">Mobile No</td><td class="tr1"><?php if(strcmp($mobile1,$mobile)==0) echo $mobile1;
         else echo"<font style=color:red;font-weight:bold;>".$mobile1."</font>";?></td>
         <td class="tr2">Pin No</td><td class="tr1"><?php if(strcmp($pin1,$pin)==0) echo $pin1;
         else echo"<font style=color:red;font-weight:bold;>".$pin1."</font>"; ?></td></tr> 
         <tr > <td class="tr2">Address Proof</td><td class="tr1"><?php if(strcmp($addressproof1,$addressproof)==0) echo $addressproof1;
         else echo"<font style=color:red;font-weight:bold;>".$addressproof1."</font>"; ?></td><td class="tr2">ID Proof</td><td class="tr1"><?php if(strcmp($idProof1,$idProof)==0) echo $idProof1;
         else echo"<font style=color:red;font-weight:bold;>".$idProof1."</font>";?></td>
         <td class="tr2">Meter ID</td><td class="tr1"><?php if(strcmp($meter_id1,$meter_id)==0) echo $meter_id1;
         else echo"<font style=color:red;font-weight:bold;>".$meter_id1."</font>"; ?></td></tr> 

         <tr > <td class="tr2">PID NO</td><td class="tr1"><?php if(strcmp($pid1,$pid)==0) echo $pid1;
         else echo"<font style=color:red;font-weight:bold;>".$pid1."</font>"; ?></td><td class="tr2">Zone</td><td class="tr1"><?php if(strcmp($area1,$area)==0) echo $area1;
         else echo"<font style=color:red;font-weight:bold;>".$area1."</font>";?></td>
         <td class="tr2">Road</td><td class="tr1"><?php if(strcmp($road1,$road)==0) echo $road1;
         else echo"<font style=color:red;font-weight:bold;>".$road1."</font>"; ?></td></tr> 


     </table>

   </div>

   

    