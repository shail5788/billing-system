<?php
error_reporting(0);
  session_start();
     include('db/connect.php');

        include_once("db/connect.php");
        include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api=new apiFunction($db,$con); // object apiFunction class
        
          $bill_id=$_POST['id'];

          $getBill=$db->select('bill',['bill_id'=>$bill_id]);
          $customer_id=$getBill[0]['customer_id'];
          $getCustomer=$db->select_colum_where('customer',['customer_fullname'],['customer_id'=>$customer_id]);
          $customer_name=$getCustomer[0]['customer_fullname'];

          // After update data 

           $uBill=$db->select('temp_bill',['bill_id'=>$bill_id]);

     


     
     

   
     

    ?>
<div class="col-md-6">
     <table  class="table table-bordered" style="width:100%;margin-top:20px;height:40% "  >
      <tr>
         <th colspan="6"  >Original Data </th>             
      </tr>
       <tr >
           <td class="tr2">Customer ID</td>
           <td class="tr1"><?php echo $customer_id; ?></td>
           <td class="tr2">Customer Name</td>
           <td class="tr1"><?php echo $customer_name;?></td>
       </tr> 

      <tr >
           <td class="tr2">Bill ID</td>
           <td class="tr1"><?php echo $getBill[0]['bill_id']; ?></td>
           <td class="tr2">Bill Type</td>
           <td class="tr1"><?php echo $getBill[0]['bill_type']?></td>
      </tr> 

      <tr>
           <td class="tr2">Month</td>
           <td class="tr1"><?php echo $getBill[0]['month']; ?></td>
           <td class="tr2">Year</td>
           <td class="tr1"><?php echo $getBill[0]['year'];?></td>
      </tr> 

       <tr>
          <td class="tr2">Currect Reading</td>
          <td class="tr1"><?php echo $getBill[0]['meterReading']; ?></td>
          <td class="tr2">Actual Reading</td>
          <td class="tr1"><?php echo $getBill[0]['reading'];?></td>
      </tr> 

      <tr>
          <td class="tr2">Amount</td>
          <td class="tr1"><?php echo $getBill[0]['total']; ?></td>
          <td class="tr2">UGD Connection Fee</td>
          <td class="tr1"><?php echo $getBill[0]['ugd_connection_fee']?></td>
      </tr> 
      <tr >
          <td class="tr2">Borwell Charge</td>
          <td class="tr1"><?php echo $getBill[0]['borwell_charge'] ?></td>
          <td class="tr2">Billing Date</td>
          <td class="tr1"><?php echo$getBill[0]['month']."-".$getBill[0]['month']."-". $getBill[0]['year'] ?></td>
      </tr> 
         


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
         
          <td class="tr2">Customer ID </td>
          <td class="tr1"><?php if(strcmp($customer_id,$uBill[0]['customer_id'])==0) echo $uBill[0]['customer_id'];
          else echo"<font style=color:red;font-weight:bold;>".$uBill[0]['customer_id']."</font>";?></td>

         <td class="tr2">Customer Name</td>
         <td class="tr1">
           <?php if(strcmp($uBill[0]['customer_name'],$customer_name)==0) 
                 echo $uBill[0]['customer_name'];
                else
                 echo"<font style=color:red;font-weight:bold;>". $uBill[0]['customer_name']."</font>";?>
                   
         </td>
       </tr> 

      <tr >
         <td class="tr2">Bill ID</td>
         
         <td class="tr1">
            <?php 
            if(strcmp($uBill[0]['bill_id'],$getBill[0]['bill_id'])==0) 
                  echo $uBill[0]['bill_id'];
            else
                  echo"<font style=color:red;font-weight:bold;>".$uBill[0]['bill_id']."</font>";
            ?>
                    
         </td>

         <td class="tr2">Bill Type</td>
         
         <td class="tr1">
           <?php 

                  if(strcmp($uBill[0]['type'],$getBill[0]['bill_type'])==0) 
                  echo $uBill[0]['type'];
                  else echo"<font style=color:red;font-weight:bold;>".$uBill[0]['type']."</font>";
           ?>
                  
         </td>
      </tr> 

        <tr > 
            <td class="tr2">Month</td>
            <td class="tr1">
                <?php
                  
                  if(strcmp($uBill[0]['month'],$getBill[0]['month'])==0) 
                    echo $uBill[0]['month'];
                  else
                    echo"<font style=color:red;font-weight:bold;>".$uBill[0]['month']."</font>"; 
                ?>
            </td>
            <td class="tr2">Year</td>
            <td class="tr1">
               <?php
                  if(strcmp($uBill[0]['year'],$getBill[0]['year'])==0)
                    echo $uBill[0]['year'];
                  else 
                    echo"<font style=color:red;font-weight:bold;>".$uBill[0]['year']."</font>";
                ?>
            </td>
         </tr> 

         <tr>
            <td class="tr2">Current Reading</td>
            <td class="tr1">
              <?php
                
                if(strcmp($uBill[0]['c_reading'],$getBill[0]['meterReading'])==0)
                    
                    echo $uBill[0]['c_reading'];
                else
                    echo"<font style=color:red;font-weight:bold;>".$uBill[0]['c_reading']."</font>";
              ?>
            </td>
            <td class="tr2">Actual Reading</td>
            <td class="tr1">
                <?php
                  if(strcmp($uBill[0]['a_reading'],$getBill[0]['reading'])==0)
                     echo $uBill[0]['a_reading'];
                  else
                    echo"<font style=color:red;font-weight:bold;>".$uBill[0]['a_reading']."</font>";?>
            </td>
        </tr> 

         <tr>
               <td class="tr2">Amount</td>
               <td class="tr1">
                  <?php
                     
                     if(strcmp($uBill[0]['amount'],$getBill[0]['amount'])==0)
                         echo $uBill[0]['amount'];
                     else
                       echo"<font style=color:red;font-weight:bold;>".$uBill[0]['amount']."</font>"; 
                  ?>
               </td>
               <td class="tr2">UGD Connection Fee</td>
               <td class="tr1">
                  <?php

                    if(strcmp($uBill[0]['ugd'],$getBill[0]['ugd_connection_fee'])==0)
                       echo $uBill[0]['ugd'];
                    else
                       echo"<font style=color:red;font-weight:bold;>".$uBill[0]['ugd']."</font>";
                  ?>
              </td>
        </tr> 
         <tr>
             <td class="tr2">Borwell Charge </td>
             <td class="tr1">
                <?php
                   if(strcmp($uBill[0]['borwell'],$getBill[0]['borwell_charge'])==0)
                     echo $uBill[0]['borwell'];
                   else
                     echo"<font style=color:red;font-weight:bold;>".$uBill[0]['borwell']."</font>"; 
                ?>
              </td>
              <td class="tr2">ID Proof</td>
              <td class="tr1">
                
            </td>
        </tr> 

        


     </table>

   </div>

   

