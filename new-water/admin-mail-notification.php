 <?php 
ini_set('SMTP','myserver');
ini_set('smtp_port',25);
 include('db/connect.php');
 $complain_id=$_POST['complain_id'];
 $str="select * from complainregister where complain_id='$complain_id'";
 $row=$con->query($str);
 $result=$row->fetch_assoc();
 $customer_id=$result['customer_id'];
 $str1="select * from customer where customer_id='$customer_id'";
 $row1=$con->query($str1);
 $result1=$row1->fetch_assoc();

 $str_notif ="select * from notification ";
 $row_notif=$con->query($str_notif);
  while($result_notif=$row_notif->fetch_assoc())
  {
   
     $email[]=$result_notif['email'];




  }
        $mail=implode(',', $email);  
    
          # code...
        
     
    
 

 $to = $mail;
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers  .= "From: NO-REPLY<no-reply@mydomain.com>" . "\r\n";
$subject = "Request for Escalation of my Complian";
$message = "<html>
                <body>
                    <p>Dear Sir,  </p>
                    <p>
                        I have complained four days before from today but no one processed my complian so for. 
                        
                    </p>
                    <p>
                         Name  ".$result1['customer_fullname']."
                    </p>
                    <p>
                         Address-".$result1['address']." 
                    </p>
                      <p> Complian ID" .$result['complain_id']."</p>
                      <p> Customer ID " .$result['customer_id']."</p>
                         <p> Complain Date " .$result['date']."</p>
                  
                        
                </body>
            </html>";


if( mail( $to, $subject, $message, $headers ))
{
  echo "Mail has been send ";
} 
else
echo "Sorry ";
?>
           


