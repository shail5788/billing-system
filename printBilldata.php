<?php  error_reporting(0);
        session_start();
        include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        $api= new apiFunction($db,$con); // object apiFunction class

         $emp_id=$_SESSION['empid'];
        include("db/connect.php");
            $data=$_POST['data'];
            $customer_id=$data['customer_id'];
            // $customer_name=$_POST['name'];
            $customer_type=$data['type'];
            $total1=$data['total'];
            
         
            $date=date('Y-m-d');
            //$date1=date('Y-m-d',strtotime($date));      
            
            $strtariff="select * from tariff where ctype ='$customer_type'";
            $strtariff_row=$con->query($strtariff);
            while($tariff_result=$strtariff_row->fetch_assoc())
            {
               $price[]=$tariff_result['price'];
            }
           $price8=$price[0];
           $price15=$price[1];
           $price25=$price[2];
           $price26=$price[3];

     
          $str="select * from customer where customer_id='$customer_id'";
          $row=$con->query($str);
          $result=$row->fetch_assoc();
          $customer_name=$result['customer_fullname'];
          $address =$result['address'];
          $area=$result['area'];
          $pid=$result['pid'];
          $mobile =$result['mobile'];
          $str1="select * from extra_charge where id='1'";
          $row1=$con->query($str1);
          $result1=$row1->fetch_assoc();
          $sanitry_cost=$result1['sanitary'];
          $meter_cost=$result1['meter_charge'];
          $other_charge=$result1['other_charge'];
          $total_extra_expence=($sanitry_cost+$meter_cost+$other_charge);
         
          
          $date1=$data['feedingDate'];
          $Bdate=explode('-', $date1);
           $day=$Bdate[0];
           $month=$Bdate[1];
           $year=$Bdate[2];
          // $v=count($data2);
          // get previous Due Amount
   
          $pre_amt=$api->getPreAmt($customer_id,$date1);
          

         
    
       // echo "Total \t\t\t\t".$total."\n\n";
           // if($v==1)
           // {
                 
            $str="select * from bill where customer_id=$customer_id AND month='$month' AND year='$year'";
             $row=$con->query($str);
             $result=$row->fetch_assoc();
             $date1=$result['day']."-".$result['month']."-".$result['year'];
             $meterR=$result['meterReading'];
             $reading1=$result['reading'];
             $previousR=$meterR-$reading1;
             $ugd=$result['ugd_connection_fee'];
             $bor=$result['borwell_charge'];
             $total_extra_expence+= $ugd+$bor;
              echo"<div class='invoice_detail'>";   
              echo"<p><span>ಉಪ ವಿಭಾಗ ಹೆಸರು<br>Sub division Name:</span><span>".$area."</p></span>" ;
              echo"<p><span>ಗ್ರಾಹಕರ ಐಡಿ<br>Customer Id</span><span>". $customer_id."</span></p>";
        echo"<p><span>ಹೆಸರು<br>Name</span><span>". $customer_name."</span></p>";   
        echo"<p><span>ಗ್ರಾಹಕ ಪ್ರಕಾರ<br>Customer Type</span><span>".$customer_type."</span></p>";
        echo "<p><span>ಚಿ ಟಟಿ<br>PID No</span><span>". $pid."</span></p>";
       

            
                echo"<p><span>ಬಿಲ್ ಸಂಖ್ಯೆ<br>Bill Number</span><span>". $bill= $result['bill_id']."</span></p>";
                echo"<p><span>ತಿಂಗಳು<br>Month</span><span>".$month=$result['month']."</span></p>";
                echo"<p><span>ಓದುವುದು<br>Reading</span><span>".$reading=$result['reading']."</span></p>";
                echo"<p><span>ಓದುವಿಕೆ ದಿನಾಂಕ<br>Reading Date</span><span>".$date1."</span></p>";
                echo"<p><span>ಹಿಂದಿನ ಓದುವಿಕೆ<br>Previous Reading</span><span>".$previousR."</span></p>";
                echo"-----------------------------------------------------------------";
                echo "<p><span>ನೀರಿನ ಶುಲ್ಕ<br>Water Charge</span><span>".$total1."</span></p>";
                echo "<p><span>ನೈರ್ಮಲ್ಯ ಶುಲ್ಕ<br>senitory charge</span><span>".$sanitry_cost."</span></p>";
                echo "<p><span>ಮೀಟರ್ ಚಾರ್ಜ್<br>Meter charge</span><span>".$meter_cost."</span></p>";
                echo "<p><span>ಇತರೆ ಚಾರ್ಜ್<br>Other Charge</span><span>".$other_charge."</span></p>";
                 echo "<p><span>ಸಂಪರ್ಕ ಶುಲ್ಕ<br>UGD Connection Fee</span><span>".$result['ugd_connection_fee']."</span></p>";
                 echo "<p><span>ಬೊರ್ವೆಲ್<br>Borwell</span><span>".$result['borwell_charge']."</span></p>";
               
                echo"-----------------------------------------------------------------";
                echo "<p><span>Total</span><span>".$total=$result['total']."</span></p>";
                echo "<p><span>Grand Total</span><span>".($total+$total_extra_expence)."</span></p>";
                echo"-----------------------------------------------------------------";
                
              
               /* $str11= "INSERT INTO `billpay` (`bill_id`, `customer_id`, `emp_id`, `date`, `payment_mode`) VALUES('$bill','$customer_id','$emp_id','$date1','$mode')";
                $row11=$con->query($str11);
                 if($row11)
                 {

                       if($mode=='Cheque')
                       {
                        $strchek="INSERT INTO `cheque` (`customer_id`, `cheque_no`) VALUES('$customer_id','$mode2')";

                        $chekrow=$con->query($strchek);

                       }
                   
                      $strupdate="update bill set status='1' where bill_id='$bill'";
                      $updaterow=$con->query($strupdate);

                      $strdue="INSERT INTO `duepayment` ( `customer_id`, `bill_id`, `pay`, `due`) VALUES ('$customer_id', '$bill', '$ppay', '$rpay')";
                      $rowdue=$con->query($strdue);  
                       if($rowdue)
                       echo"Transection is completed";
                 } */
                  echo"</div>";
                  
                  
                  
                  
                      /*    *********** Calculate Consumption ******************     */
            $actual_reading =$reading;
             if($actual_reading<=8){
                $a8=$actual_reading;
                $a15=0;
                $a25=0;
                $a26=0;

             }
             else if($actual_reading<=15){
               
                $a8=8;
                $actual_reading=$actual_reading-$a8;
                $a15=$actual_reading;
                $a25=0;
                $a26=0; 
                
             }
             else if($actual_reading<=25){
                 $a8=8;
                 $actual_reading=$actual_reading-$a8;
                 $a15=7;
                 $actual_reading=$actual_reading-$a15;
                 $a25=$actual_reading;
                 $a26=0;
             }
             else if($actual_reading>25){
             
                 $a8=8;
                 $actual_reading=$actual_reading-$a8;
                 $a15=7;
                 $actual_reading=$actual_reading-$a15;
                 $a25=10;
                 $actual_reading=$actual_reading-$a25;
                 $a26=$actual_reading;
             }




                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
            
          // }
          


      //      else{
      //    echo"<div class='invoice_detail'>"; 
      //    echo"<p><span>ಚಿ ಟಟಿ<br>Sub division Name:".$area."</p></span>" ;
      // echo" <p><span>ಚಿ ಟಟಿ<br>Customer Id</span><span>". $customer_id."</span></p>";
      //   echo"<p><span>ಚಿ ಟಟಿ<br>Name</span><span>". $customer_name."</span></p>";   
      //   echo"<p><span>ಚಿ ಟಟಿ<br>Customer Type</span><span>".$customer_type."</span></p>";
      //   echo "<p><span>ಚಿ ಟಟಿ<br>Mode Of Payment</span><span>". $mode."</span></p>";
      //   echo"<p><span>ಚಿ ಟಟಿ<br>Cheque No</span><span>".  $mode2."</span></p>";

      //   $ppay=$_POST['ppay'];
      //   $rpay=$_POST['rpay'];
      //               for($i=0;$i<count($data2);$i++)
      //               {
      //                       $bill_id=$data2[$i];
      //                       $water_consumed_ammount=0; 
      //                       $str="select * from bill where bill_id='$data2[$i]'";
      //                       $row=$con->query($str);
      //                       $result=$row->fetch_assoc();
      //                       $dtotal=$result['total'];
                       
      //                       echo"<p><span>ಚಿ ಟಟಿ<br>Reciept Number</span><span>". $bill= $result['bill_id']."</span></p>";
      //                       echo"<p><span>ಚಿ ಟಟಿ<br>Month</span><span>". $month=$result['month']."</span></p>";
      //                       echo"<p><span>ಚಿ ಟಟಿ<br>Reading</span><span>". $reading=$result['reading']."</span></p>";
      //                       echo"<p><span>ಚಿ ಟಟಿ<br>Reading Date</span><span>".$date1."</span></p>";
      //                       echo"<p><span>ಚಿ ಟಟಿ<br>Previous Reading</span><span>".$previousR."</span></p>";
      //                       echo "<p><span>ಚಿ ಟಟಿ<br>Water Charge</span><span>".$water_consumed_ammount=$dtotal-$total_extra_expence."</span></p>";
                       
                         
                           
      //                       echo "<p><span>ಚಿ ಟಟಿ<br>Senitory Charge </span><span>".$sanitry_cost."</span></p>";
      //                       echo "<p><span>ಚಿ ಟಟಿ<br>Meter charge</span><span>".$meter_cost."</span></p>";
      //                       echo "<p><span>ಚಿ ಟಟಿ<br>Other Charges</span><span>".$other_charge."</span></p>";
      //                       echo"--------------------------------------------------";
      //                       echo "<p><span>Total</span><span>".$total=$result['total']."</span></p>";
      //                       echo"--------------------------------------------------";

      //                    /*   $str11= "INSERT INTO `billpay` (`bill_id`, `customer_id`, `emp_id`, `date`, `payment_mode`) VALUES('$bill_id','$customer_id','$emp_id','$date1','$mode')";
      //                           $row11=$con->query($str11);
                                  
      //                              if($row11)
      //                               {

      //                                   if($mode=='Cheque')
      //                                   {
      //                                        $strchek="INSERT INTO `cheque` (`customer_id`, `cheque_no`) VALUES('$customer_id','$mode2')";
      //                                           $chekrow=$con->query($strchek);

      //                                   }
                   
      //                                    $strupdate="update bill set status='1' where bill_id='$bill_id'";
      //                                       $updaterow=$con->query($strupdate);
      //                                       $strdue="INSERT INTO `duepayment` ( `customer_id`, `bill_id`, `pay`, `due`) VALUES ('$customer_id', '$bill_id', '$ppay', '$rpay')";
      //                                           $rowdue=$con->query($strdue);  
      //                                           if($rowdue)
      //                                        echo"Transection is completed";
      //                               } 
      //                            */


                     
      //               }
                        
                        
                //}
                 
?>

                 


       <p><span>Consumption Ltrs:</span><p>
                    <table class="table table-bordered" style="font-size:10px;">
                      <thead>
                        <tr>
                          <th>ಐಣಡಿs</th>
                          <th>ಐಣಡಿs</th>
                          <th>ಐಣಡಿs</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>0-8</td>
                          <td><?php echo $a8;?></td>
                          <td><?php echo $price8;?></td>
                          
                        </tr>
                        <tr>
                          <td>8-15</td>
                          <td><?php echo $a15;?></td>
                          <td><?php echo $price15;?></td>
                        </tr>
                        <tr>
                          <td>15-25</td>
                          <td><?php echo $a25;?></td>
                          <td><?php echo $price25;?></td>
                        </tr>
                        <tr>
                          <td> >25</td>
                          <td><?php echo $a26 ;?></td>
                          <td><?php echo $price26;?></td>
                        </tr>
                      </tbody>
                    </table>