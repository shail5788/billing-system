<?php 
		session_start();
        
        include_once("db/connect.php");
        include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api=new apiFunction($db,$con); // object apiFunction class

          $bill_id=$_POST['bill_id'];

          $billData=$db->select('bill',['bill_id'=>$bill_id]);

          $date=$billData[0]['day']."-".$billData[0]['month']."-".$billData[0]['year'];

          $previousR=$billData[0]['meterReading']-$billData[0]['reading'];

          $customer_id=$billData[0]['customer_id'];

          $customer=$db->select('customer',['customer_id'=>$customer_id]);

          $extra=$db->fetch_all('extra_charge');
         
          $total_extra_expence=$extra[0]['sanitary']+$extra[0]['meter_charge']+$extra[0]['other_charge']+$billData[0]['ugd_connection_fee']+$billData[0]['borwell_charge'];

          $total1=$billData[0]['total']-$total_extra_expence;
              
            echo"<div class='invoice_detail'>";   
            echo"<p><span>ಉಪ ವಿಭಾಗ ಹೆಸರು<br>Sub division Name:</span><span>".$customer[0]['area']."</p></span>" ;
            echo"<p><span>ಗ್ರಾಹಕರ ಐಡಿ<br>Customer Id</span><span>". $customer_id."</span></p>";
	        echo"<p><span>ಹೆಸರು<br>Name</span><span>". $customer[0]['customer_fullname']."</span></p>";   
	        echo"<p><span>ಗ್ರಾಹಕ ಪ್ರಕಾರ<br>Customer Type</span><span>".$customer[0]['type_of_customer']."</span></p>";
	        echo "<p><span>ಚಿ ಟಟಿ<br>PID No</span><span>".$customer[0]['pid']."</span></p>";
	       

            
                echo"<p><span>ಬಿಲ್ ಸಂಖ್ಯೆ<br>Bill Number</span><span>". $bill_id."</span></p>";
                echo"<p><span>ತಿಂಗಳು<br>Month</span><span>".$billData[0]['month']."</span></p>";
                echo"<p><span>ಓದುವುದು<br>Reading</span><span>".$billData[0]['reading']."</span></p>";
                echo"<p><span>ಓದುವಿಕೆ ದಿನಾಂಕ<br>Reading Date</span><span>".$date."</span></p>";
                echo"<p><span>ಹಿಂದಿನ ಓದುವಿಕೆ<br>Previous Reading</span><span>".$previousR."</span></p>";
                echo"-----------------------------------------------------------------";
                echo "<p><span>ನೀರಿನ ಶುಲ್ಕ<br>Water Charge</span><span>".$total1."</span></p>";
                echo "<p><span>ನೈರ್ಮಲ್ಯ ಶುಲ್ಕ<br>senitory charge</span><span>".$extra[0]['sanitary']."</span></p>";
                echo "<p><span>ಮೀಟರ್ ಚಾರ್ಜ್<br>Meter charge</span><span>".$extra[0]['meter_charge']."</span></p>";
                echo "<p><span>ಇತರೆ ಚಾರ್ಜ್<br>Other Charge</span><span>".$extra[0]['other_charge']."</span></p>";
                 echo "<p><span>ಸಂಪರ್ಕ ಶುಲ್ಕ<br>UGD Connection Fee</span><span>".$billData[0]['ugd_connection_fee']."</span></p>";
                 echo "<p><span>ಬೊರ್ವೆಲ್<br>Borwell</span><span>".$billData[0]['borwell_charge']."</span></p>";
               
                echo"-----------------------------------------------------------------";
                echo "<p><span>Total</span><span>".$billData[0]['total']."</span></p>";
                echo"-----------------------------------------------------------------";
                

              echo "</div>";

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





