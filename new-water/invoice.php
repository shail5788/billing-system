<?php  error_reporting(0);
        session_start();
        include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        $api= new apiFunction($db,$con); // object apiFunction class

         $emp_id=$_SESSION['empid'];
        include("db/connect.php");
            $customer_id=$_POST['customer_id'];
            $customer_name=$_POST['name'];
            $customer_type=$_POST['customer_type'];
            $total1=$_POST['total'];
            $mode=$_POST['mode'];
            $amt=$_POST['ppay'];
            $mode2=strtoupper($_POST['mode2']);
            $date=date('Y-m-d');
            $date1=date('Y-m-d',strtotime($date));      
            
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
          $address =$result['address'];
          $area=$result['area'];
          $mobile =$result['mobile'];
          $str1="select * from extra_charge where id='1'";
          $row1=$con->query($str1);
          $result1=$row1->fetch_assoc();
          $sanitry_cost=$result1['sanitary'];
          $meter_cost=$result1['meter_charge'];
          $other_charge=$result1['other_charge'];
          $total_extra_expence=($sanitry_cost+$meter_cost+$other_charge);
         
          
          $data2=$_POST['data1'];
          $v=count($data2);
          // get previous Due Amount
   
          $pre_amt=$api->getPreAmt($customer_id,$date1);
          

        
    
       // echo "Total \t\t\t\t".$total."\n\n";
           if($v==1)
           {
                 
             $str="select * from bill where bill_id='$data2[0]'";
             $row=$con->query($str);
             $result=$row->fetch_assoc();
             $date1=$result['day']."-".$result['month']."-".$result['year'];
             $bmonth=$result['month'];
             $year=$result['year'];
             $meterR=$result['meterReading'];
             $reading1=$result['reading'];
             $bill=$result['bill_id'];
             $previousR=$meterR-$reading1;
             $payment_Date=date('d-m-Y');
             $receipt_no=rand(111111,999999);
              echo"<div><table calss='table table-bordered' style='width:100%;background:#ecf0f1;'>";   
              echo "<tr><th><p><span>Receipt Date</span</p></th><td>".$payment_Date."</td>";
              echo"<tr><th><p><span>ಉಪ ವಿಭಾಗ ಹೆಸರು<br>Sub division Name:</p></span></th><td>".$area."</td>" ;
              echo"<th><p><span>ಗ್ರಾಹಕರ ಐಡಿ<br>Customer Id</span></p></th><td>". $customer_id."</td></tr>";
              echo"<tr><th><p><span>ಗ್ರಾಹಕ ಹೆಸರು<br>Customer Name</span></p></th><td>". $customer_name."</td>";   
              echo"<th><p><span>ಗ್ರಾಹಕ ಪ್ರಕಾರ<br>Customer Type</span></p></th><td>".$customer_type."</td></tr>";
              echo "<tr><th><p><span>ಪಾವತಿಯ ಮೋಡ್<br>Mode Of Payment</span></p></th><td>". $mode."</td>";
              echo"<th><p><span>ಇಲ್ಲ ಪರಿಶೀಲಿಸಿ<br>Cheque No</span></p></th><td>".  $mode2."</td></tr>";

            
                echo"<tr><th><p><span>ರಸೀತಿ ಸಂಖ್ಯೆ<br>Reciept Number</span></p></th><td>".$receipt_no."</td>";
                echo"<th><p><span>ತಿಂಗಳು<br>Month</span></p></th><td>".$month=$result['month']."</td></tr>";
                echo"<tr><th><p><span>ಚಿ ಟಟಿ<br>Reading</span></p></th><td>".$reading=$result['reading']."</td>";
                
                
               
              
                echo"<th><p><span>ಚಿ ಟಟಿ<br>Amount</span></p></th><td>". $ppay=$_POST['ppay']."</td></tr></table>";
                echo "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------";
                echo " <table class='table table-bordered'><tr><td width='200'>
                 <img src='img/logo/logo.png' height='80' width='100'></td><td>
                 <h5 class='modal-title' style='font-size: 30px; text-align:center;''>KUIDFC & TMC Billing Invoice</h5></td><td width='200' style='text-align: right;'><img src='img/logo/kuidc.png' height='80' width='100'></td></tr></table>";
                echo"<table calss='table table-bordered' style='width:100%;background:#ecf0f1;'>";  
                echo "<tr><th colspan='3'></th></tr>"; 
              echo"<tr><th><p><span>ಉಪ ವಿಭಾಗ ಹೆಸರು<br>Sub division Name:</p></span></th><td>".$area."</td>" ;
              echo"<th><p><span>ಗ್ರಾಹಕರ ಐಡಿ<br>Customer Id</span></p></th><td>". $customer_id."</td></tr>";
              echo"<tr><th><p><span>ಗ್ರಾಹಕ ಹೆಸರು<br>Customer Name</span></p></th><td>". $customer_name."</td>";   
              echo"<th><p><span>ಗ್ರಾಹಕ ಪ್ರಕಾರ<br>Customer Type</span></p></th><td>".$customer_type."</td></tr>";
              echo "<tr><th><p><span>ಪಾವತಿಯ ಮೋಡ್<br>Mode Of Payment</span></p></th><td>". $mode."</td>";
              echo"<th><p><span>ಇಲ್ಲ ಪರಿಶೀಲಿಸಿ<br>Cheque No</span></p></th><td>".  $mode2."</td></tr>";

            
                echo"<tr><th><p><span>ರಸೀತಿ ಸಂಖ್ಯೆ<br>Reciept Number</span></p></th><td>".$receipt_no."</td>";
                echo"<th><p><span>ತಿಂಗಳು<br>Month</span></p></th><td>".$month=$result['month']."</td></tr>";
                echo"<tr><th><p><span>ಚಿ ಟಟಿ<br>Reading</span></p></th><td>".$reading=$result['reading']."</td>";
                
                
               
              
                echo"<th><p><span>ಚಿ ಟಟಿ<br>Amount</span></p></th><td>". $ppay=$_POST['ppay']."</td></tr></table>";
               // check for payment done of perticular bill or not 
                $status =$api->checking_payment_done($bmonth,$customer_id,$year);
                if($status)
                {
                    echo "paid";
                }
                else
                {
                   echo "unpaid";
                      
                     $data=array('receipt_no' =>$receipt_no,'bill_id'=>$bill,
                                 'customer_id'=>$customer_id,'emp_id'=>$emp_id,
                                 'date'=>$payment_Date,'bill_month'=>$bmonth,
                                 'bill_year'=>$year,'payment_mode'=>$mode 
                                 );

                      $message=urlencode("Your Transection has done Your Reciept No".$receipt_no.
                       "Bill No".$bill."CustomerID".$customer_id.
                       "payment date".$payment_Date."Month".$bmonth.
                       "Amount-Rs".$amt);

                 
                     $response=$api->make_bill_payment($data);
                     if($response)
                     {
                         
                        if($mode=="Cheque")
                        {
                           $this->db->insert('cheque',['customer_id'=>$customer_id,'cheque_no'=>$mode2]);
                        }
                        $res=$api->update_bill_status(['status'=>'1'],['bill_id'=>$bill]); 
                         if($res){
                          echo "<script>alert('Payment Successfully Done ')</script>";
                        }else{
                          echo "<script>alert('Something Went Wrong ')</script>";
                        }
                        
                         $sms=$api->sendMessage($message,$mobile);
                         echo $sms; 
                     }
                     else
                     {
                        echo "<script>alert('Sorry')</script>";
                     }
                }
          


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
            // $actual_reading =$reading;
            //  if($actual_reading<=8){
            //     $a8=$actual_reading;
            //     $a15=0;
            //     $a25=0;
            //     $a26=0;

            //  }
            //  else if($actual_reading<=15){
               
            //     $a8=8;
            //     $actual_reading=$actual_reading-$a8;
            //     $a15=$actual_reading;
            //     $a25=0;
            //     $a26=0; 
                
            //  }
            //  else if($actual_reading<=25){
            //      $a8=8;
            //      $actual_reading=$actual_reading-$a8;
            //      $a15=7;
            //      $actual_reading=$actual_reading-$a15;
            //      $a25=$actual_reading;
            //      $a26=0;
            //  }
            //  else if($actual_reading>25){
             
            //      $a8=8;
            //      $actual_reading=$actual_reading-$a8;
            //      $a15=7;
            //      $actual_reading=$actual_reading-$a15;
            //      $a25=10;
            //      $actual_reading=$actual_reading-$a25;
            //      $a26=$actual_reading;
            //  }




                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
            
           }
          


           else{
         echo"<div class='invoice_detail'>"; 
         echo"<p><span>ಚಿ ಟಟಿ<br>Sub division Name:".$area."</p></span>" ;
      echo" <p><span>ಚಿ ಟಟಿ<br>Customer Id</span><span>". $customer_id."</span></p>";
        echo"<p><span>ಚಿ ಟಟಿ<br>Name</span><span>". $customer_name."</span></p>";   
        echo"<p><span>ಚಿ ಟಟಿ<br>Customer Type</span><span>".$customer_type."</span></p>";
        echo "<p><span>ಚಿ ಟಟಿ<br>Mode Of Payment</span><span>". $mode."</span></p>";
        echo"<p><span>ಚಿ ಟಟಿ<br>Cheque No</span><span>".  $mode2."</span></p>";

        $ppay=$_POST['ppay'];
        $rpay=$_POST['rpay'];
                    for($i=0;$i<count($data2);$i++)
                    {
                            $bill_id=$data2[$i];
                            $water_consumed_ammount=0; 
                            $str="select * from bill where bill_id='$data2[$i]'";
                            $row=$con->query($str);
                            $result=$row->fetch_assoc();
                            $dtotal=$result['total'];
                       
                            echo"<p><span>ಚಿ ಟಟಿ<br>Reciept Number</span><span>". $bill= $result['bill_id']."</span></p>";
                            echo"<p><span>ಚಿ ಟಟಿ<br>Month</span><span>". $month=$result['month']."</span></p>";
                            echo"<p><span>ಚಿ ಟಟಿ<br>Reading</span><span>". $reading=$result['reading']."</span></p>";
                            echo"<p><span>ಚಿ ಟಟಿ<br>Reading Date</span><span>".$date1."</span></p>";
                            echo"<p><span>ಚಿ ಟಟಿ<br>Previous Reading</span><span>".$previousR."</span></p>";
                            echo "<p><span>ಚಿ ಟಟಿ<br>Water Charge</span><span>".$water_consumed_ammount=$dtotal-$total_extra_expence."</span></p>";
                       
                         
                           
                            echo "<p><span>ಚಿ ಟಟಿ<br>Senitory Charge </span><span>".$sanitry_cost."</span></p>";
                            echo "<p><span>ಚಿ ಟಟಿ<br>Meter charge</span><span>".$meter_cost."</span></p>";
                            echo "<p><span>ಚಿ ಟಟಿ<br>Other Charges</span><span>".$other_charge."</span></p>";
                            echo"--------------------------------------------------";
                            echo "<p><span>Total</span><span>".$total=$result['total']."</span></p>";
                            echo"--------------------------------------------------";

                         /*   $str11= "INSERT INTO `billpay` (`bill_id`, `customer_id`, `emp_id`, `date`, `payment_mode`) VALUES('$bill_id','$customer_id','$emp_id','$date1','$mode')";
                                $row11=$con->query($str11);
                                  
                                   if($row11)
                                    {

                                        if($mode=='Cheque')
                                        {
                                             $strchek="INSERT INTO `cheque` (`customer_id`, `cheque_no`) VALUES('$customer_id','$mode2')";
                                                $chekrow=$con->query($strchek);

                                        }
                   
                                         $strupdate="update bill set status='1' where bill_id='$bill_id'";
                                            $updaterow=$con->query($strupdate);
                                            $strdue="INSERT INTO `duepayment` ( `customer_id`, `bill_id`, `pay`, `due`) VALUES ('$customer_id', '$bill_id', '$ppay', '$rpay')";
                                                $rowdue=$con->query($strdue);  
                                                if($rowdue)
                                             echo"Transection is completed";
                                    } 
                                 */


                     
                    }
                        echo "<p><span>Grand Total</span><span>".$total1."</span></p>";
                        echo"<p><span>ಚಿ ಟಟಿ<br>Amount</span><span>". $ppay=$_POST['ppay']."</span></p>";
                        echo "<p><span>ಚಿ ಟಟಿ<br>Due</span><span>".$rpay=$_POST['rpay']."</span></p>";
                        
                }
                 
?>

                 


     <!--   <p><span>Consumption Ltrs:</span><p>
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
                    </table> -->