<?php 
   		include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        $api= new apiFunction($db,$con); // object apiFunction class
        
        session_start();

    if($_POST['action']=="createNewAdminUser")
    {

         $data=$_POST['data'];
       
         $str="select * from login ";
         
         $row=$con->query($str);

         $num=$row->num_rows;

         $emp_id=rand(100000,999999);   
         
         $user=array('emp_id'=>$emp_id,'emp_name'=>$data['fname'],'gender'=>$data['gen'],
         'dob'=>$data['dob'],'emailId'=>$data['email']);
         

         $array=array('user_id'=>$data['username'],'password'=>$data['password'],'login_type'=>'1');

         if($num==0)
         {
            
            $db->insert('employee',$user);
            
            $db->insert('login',$array);
           
            echo json_encode(array('status'=>'ture'));
         } 
         else
         {
           echo json_encode(array('status'=>'false'));
         }


    }

    if($_POST['action']=='searching')
    {
    	   
    	   $customer_id=$_POST['c_id'];
    	   
    	   $condition=array('customer_id'=>$customer_id);
    	   
    	   $data=$db->LikeQuery('customer',$condition);
    	 
    	   echo json_encode($data);


    }
    if($_POST['action']=="searchingByMeterId")
    {

           $meter_id=$_POST['m_id'];
           
           $condition=array('meter_id'=>$meter_id);
           
           $data=$db->LikeQuery('customer',$condition);
         
           echo json_encode($data);


    }
    if($_POST['action']=="searchingByName")
    {
    	   
    	   $consumer_name=$_POST['consumer_name'];

    	   $condition=array('C_name'=>$consumer_name);
    	   
    	   $data= $db->LikeQuery('customer',$condition);
    	   
    	   echo json_encode($data);
    

    }
     if($_POST['action']=="searchingByPIDNo"){

          $pid_no=$_POST['pid_no'];

           $condition=array('pid'=>$pid_no);
           
           $data= $db->LikeQuery('customer',$condition);
           
           echo json_encode($data);
    }
    if($_POST['action']=='searchingByMeterNo')
    {
 
           $meter_id=$_POST['meter_id'];

           $condition=array('meter_id'=>$meter_id);
           
           $data= $db->LikeQuery('customer',$condition);
           
           echo json_encode($data);
    }

    if($_POST['action']=="gettingIndividualRecord")
    {
    	  

    	  $customer_id=$_POST['customer_id'];

    	  $array=array();

    	  $data=$api->getCustomerInfo($customer_id);
          
          $doc=$api->getPhoto($customer_id);
          
          $array =array_merge($data,$doc);
          
          echo json_encode($array);


    }
    if($_POST['action']=="EmployeeSearching")
    {

    	   $emp_no=$_POST['emp_id'];
    	   
    	   $condition=array('emp_id'=>$emp_no);
    	   
    	   $data=$db->LikeQuery('employee',$condition);
    	   
    	   //echo $data;
    	   echo json_encode($data);
    
    } 
    if($_POST['action']=="gettingIndividualEmployeeRecord")
    {
    	  

    	  $emp_id=$_POST['emp_id'];

    	  $array=array();

    	  $data=$api->getEmployeeInfo($emp_id);
          
          $doc=$api->getEmployeePhoto($emp_id);
          
          if($data[0]['emp_type']=='6')
          {
            
               $asset_info=$api->getEmployeeAsset($emp_id);
               
               $array =array_merge($data,$doc,$asset_info);
          }
          else
          {
              $array =array_merge($data,$doc);
          }
        
          
          echo json_encode($array);


    } 

    if($_POST['action']=="searchingByEmployeeName")
    {

    	   
    	   $consumer_name=$_POST['consumer_name'];

    	   $condition=array('emp_name'=>$consumer_name);
    	   
    	   $data= $db->LikeQuery('employee',$condition);
    	   
    	   echo json_encode($data);
    

    }

    if($_POST['action']=="searchingByEmployeemobile")
    {


    	   $mobile=$_POST['mobile'];

    	   $condition=array('contactNo'=>$mobile);
    	   
    	   $data= $db->LikeQuery('employee',$condition);
    	   
    	   echo json_encode($data);
    

    }
    if($_POST['action']=="NotificationMail")
    {
    	  
    	  
    	  $email=$_POST['email'];
    	  
    	  $array=array('email'=>$email);

    	  $check=$db->select_colum_where('notification',['email'],$array);   
          
          if(empty($check))
    	  {
    	  	  
    	  	  $status=$api->saveMail('notification',$array);
    	  	  
    	  	  if($status)
    	  	  {
    	  	  	 echo "Email has been added !";
    	  	  }
    	  	  else
    	  	  {
    	  	  	 echo  " Sorry !";
    	  	  }
    	  	 
    	  
    	  }
    	  else
    	  {
    	  	 
    	  	  echo "This Email already exist !";
    	  
    	  }

    }

    if($_POST['action']=="getArea")
    {

    	   $area=$db->getDistict('area');
    	   
    	   $option.="<option>Select Area</option>";
    	   
    	   foreach($area as $key =>$value)
    	   {
             
             $option.="<option value='".$value['area']."'>".$value['area']."</option>";
    	   
    	   }
    	   
    	   echo $option;

    }

    if($_POST['action']=="ManageUser")
    {
    	   
    	   
    	   $emp_id=$_POST['emp_id'];
    	   
    	   $emp_type=$_POST['emp_type'];
    	   
    	   $area=$_POST['area'];
    	   
    	   $mrType=$_POST['mrReaderType'];

    	   if($emp_type=="2" || $emp_type=="3")
    	   {
               
               $param=array('emp_id'=>$emp_id,'emp_type'=>$emp_type);   
    	   	   
    	   	   $manage=$api->managingEmployee($param);
               
	              
	               if($manage)
	               {

	               	 echo "Congrates.. Your Power Has Been Change !";
	               
	               }
	               else 
	               {

	               	 echo " Sorry !";
	               
	               }

    	   }
    	   else if ($emp_type=="5")
    	   {
    	     
    	       
    	       $param=array('emp_id'=>$emp_id,'emp_type'=>$emp_type,'area'=>$area); 
               
               $manage=$api->managingEmployee($param);   

               	   if($manage)
	               {

	               	 echo "Congrates.. Your Power Has Been Change !";
	               
	               }
	               else 
	               {

	               	 echo " Sorry !";
	               
	               } 

    	   }
    	   else
    	   {

    	   	  $param=array('emp_id'=>$emp_id,'emp_type'=>$emp_type,'mrType'=>$mrType); 

    	   	  $manage=$api->managingEmployee($param);
                  
                  
    	   	  	   if($manage)
	               {

	               	 echo "Congrates.. Your Power Has Been Change !";
	               
	               }
	               else 
	               {

	               	 echo " Sorry !";
	               
	               }
    	   
    	   }


    	  
    	  
    }

    if($_POST['action']=="GetTariff")
    {


    	   $ctype=$_POST['ctype'];

           $result=$db->select_colum_where('tariff',['consumption'],['ctype'=>$ctype]);
		   
		   echo"<option value='0'> select Slab</option>";
		   
           foreach($result as $key =>$value)
		   {

		   	 	 echo"<option value=".$value['consumption'].">".$value['consumption']."</option>";
		   }

    }

    if($_POST['action']=="getLocationArea")
    {

            
             $area=ucfirst($_POST['area']);
         
             if($area!='')
             {
                
                    $area=$db->select_colum_where('area',['area'],['area'=>$area]); 
                 
                     if(!empty($area))
                     {

                        echo " <script> alert('Sorry! Area Exit')</script>";
                     
                     }
                    

             }
             
             

    }
    if($_POST['action']=="GetLocality")
    {

             $area=ucfirst($_POST['area']);
           
             $locality=ucwords($_POST['locality']);
             
             $result=$db->select_colum_where('area',['locality'],['area'=>$area,'locality'=>$locality]);
             
             if(!empty($result))
             {
                
                echo "<script>alert('this locality allready Exist in this Area')</script>";
             }
             

    }
    if($_POST['action']=="CheckPin")
    {

             $pin=$_POST['pin'];
            
             $area=$_POST['area'];
             
             
             $result=$db->select("area",['pin'=>$pin]);
             
             
             if($result[0]['area']!=$area)
             {
                // echo "<script>alert('same pin can not assign to multiple area'); </script>";
             }
    }
    if($_POST['action']=="AddLocation")
    {

                
                $pin=$_POST['pin'];
                
                $area=$_POST['area'];
                
                $locality=$_POST['locality'];
                
                $data=array('pin'=>$pin,'area'=>$area,'locality'=>$locality);
                
                $row=$api->addArea('area',$data);
            
                if($row){
                    
                    echo"<script>alert('Sucessul! Add Location');</script>";
                }
                else
                {

                    echo "<script>alert('Sorry! Some technical problem occured');</script> ";
                }


    }
    if($_POST['action']=="gettingTempData")
    {

            $customer_id=$_POST['id'];

            $data=$api->getTempData('temp_table',$customer_id);

            print_r($data);
    }
    if($_POST['action']=="getNotification")
    {

            $notification=$api->gettingNewNotification();

            echo $notification;
    }

    if($_POST['action']=="getPreviousReading")
    {

                 
                 


                 $customer_id=$_POST['customer_id'];

                 $date2=$_POST['date2'];

                 $emp_id=$_SESSION['emp_id'];
                 
                 if(empty($emp_id))
                 {
                     
                     $pReading=$api->previousReading($customer_id,$date2);

                     echo $pReading;

                 }
                 else
                 {

                     $pReading=$api->getPreviousReading($customer_id,$date2);

                     echo $pReading;
                 
                 }
                


        

    }
    if($_POST['action']=="FindAmount")
    {

            
            $c_reading=$_POST['mread'];
            
            $type=$_POST['type'];

            $previous_m=$_POST['previous_m'];

            if($previous_m==0 || $previous_m=="")
            {

                 $actualReading=$c_reading;     
            }
            else 
            {

                $actualReading=$c_reading-$previous_m;
            }

            $UnitPrice=$api->getUnitPrice($type);

            $Price =$api->findAmount($UnitPrice,$actualReading);

            echo $Price ;

    }

    if($_POST['action']=="getMonthName")
    {
          

          
             $year=$_POST['year'];
            
             $data=$db->selectDistinct('bill',['month'],['year'=>$year]);
         
             echo"<option value='0'> Select Month </option>";
            
             foreach ($data as $key => $value) {
              
                 echo "<option value='".$value['month']."'>".$value['month']."</option>";
             }
            
           

    }
    if($_POST['action']=="getBillList")
    {

          $year=isset($_POST['year'])?$_POST['year']:"";
          $month=isset($_POST['month'])?$_POST['month']:"";
          $status=isset($_POST['status'])?$_POST['status']:"";
          
         $str="select b.*, c.customer_fullname from bill as b INNER JOIN customer as c ON b.customer_id=c.customer_id where b.month='$month' AND b.year='$year' ";
         if($status!='')
         {
             $str.=" AND status= '$status'";
         }
         $row=$con->query($str);

          while($result=$row->fetch_assoc())
          {
              
              $array[]=$result;
         
          }
         
          echo json_encode($array);

    }

    if($_POST['action']=="billListSearchByDate")
    {

           

           $date=$_POST['date1'];

           $date2=explode('-', $date);
            
           $day=$date2[0];
          
           $month=$date2[1];
          
           $year=$date2[2];

           $list=$api->getBillListByDate('bill',['day'=>$day,'month'=>$month,'year'=>$year]);

           echo json_encode($list);


    }
    if($_POST['action']=="getBillToCustomer")
    {
  
         
         $customer_id=$_POST['customer_id'];

         $customer= $api->getCustomerInfo($customer_id);

         echo json_encode($customer);


    }
    if($_POST['action']=="CheckBillStatus")
    {

          
          $val=$_POST['val'];

          $data=$db->select('bill',['status'=>$val]);
          
          if($data[0]['status']=='1')
          {
             
             echo "<script>alert('Select only Unpaid row');</script> ";
          
          }


    }
    if($_POST['action1']=="getBillingTotal")
    {

          $bill_id=$_POST['data1'];
          
           $amount=0;
        
        for($i=0;$i<count($bill_id);$i++)
        {  
           

            $str="select total from bill where bill_id='$bill_id[$i]'";
            
            $row=$con->query($str);
            
            $result=$row->fetch_assoc();
            
            $amount+=$result['total'];
        
       
        }   
        
        echo $amount;
    }
    if($_POST['action']=="trackCompalinByCustomerId")
    {

          
          $customer_id=$_POST['customer_id'];

          $array=array();

          $LikeQuery="select complainregister.*,customer.customer_fullname, customer.address,complainasingnbook.emp_id from customer right join complainregister on customer.customer_id=complainregister.customer_id
              right join complainasingnbook on complainregister.complain_id=complainasingnbook.complain_id where complainregister.customer_id like '%".$customer_id."%' GROUP BY customer.customer_id";

          $row=$con->query($LikeQuery);

          while($result=$row->fetch_assoc())
          {
              
              $array[]=$result;
         
          }
         
          echo json_encode($array);



    }
    if($_POST['action']=="trackCompalinByComplainId")
    {

          
        
        $complain_id=$_POST['complain_id'];

       

        $LikeQuery="select complainregister.*,customer.customer_fullname, customer.address,complainasingnbook.emp_id from customer right join complainregister on customer.customer_id=complainregister.customer_id
              right join complainasingnbook on complainregister.complain_id=complainasingnbook.complain_id where complainregister.complain_id like '%".$complain_id."%' GROUP BY customer.customer_id";

          $row=$con->query($LikeQuery);
         $array=array();
          while($result=$row->fetch_assoc())
          {
              
              $array[]=$result;
         
          } 
         
         echo json_encode($array);


    }

    if($_POST['action1']=="GetAssignEmployee")
    {

            
            $emp_id= $_POST['emp'];
            
            $employee=$db->select('employee',['emp_id'=>$emp_id]);
             
            echo json_encode($employee);

   }
   if($_POST['action']=="getcomplaintMonthly")
   {

         $month=$_POST['month'];
         
         $year=$_POST['year'];

         $data= $api->getComplainList($year,$month);

         echo json_encode($data); 
  
   }
  

    if($_POST['action']=="getComplainMonth")
    {
          

          
            echo  $year=$_POST['year'];
            
             $data=$db->selectDistinct('complainregister',['month'],['year'=>$year]);
         
             echo"<option value='0'> Select Month </option>";
            
             foreach ($data as $key => $value) {
              
              echo "<option value='".$value['month']."'>".$value['month']."</option>";
             }
            
           
   }
   if($_POST['action']=="getComplainByDatewise")
   {

           
            $date=$_POST['date1'];  
             
            $result =$api->getComplaintBydate($date);

            echo json_encode($result);

   }
   if($_POST['action']=="seachCompalinByCustomerId")
    {
         $customer_id=$_POST['customer_id'];

          $array=array();

          $LikeQuery=" SELECT complainregister .*,customer.customer_fullname,customer.address from customer join complainregister 
            on complainregister.customer_id=customer.customer_id join complainasingnbook on complainasingnbook.complain_id != complainregister.complain_id  Where complainregister.customer_id like '%".$customer_id."%' and complainregister.status ='0' GROUP BY complainregister.customer_id";

          $row=$con->query($LikeQuery);

          while($result=$row->fetch_assoc())
          {
              
              $array[]=$result;
         
          }
         
          echo json_encode($array);

   }
   if($_POST['action']=="searchCompalinByComplainId")
    {
         $complain_id=$_POST['complain_id'];

          $array=array();

          $LikeQuery=" SELECT complainregister .*,customer.customer_fullname,customer.address from customer join complainregister 
            on complainregister.customer_id=customer.customer_id join complainasingnbook on complainasingnbook.complain_id != complainregister.complain_id  Where complainregister.complain_id like '%".$complain_id."%' AND complainregister.status ='0' GROUP BY complainregister.customer_id";

          $row=$con->query($LikeQuery);

          while($result=$row->fetch_assoc())
          {
              
              $array[]=$result;
         
          }
         
          echo json_encode($array);

   }

   if($_POST['action']=="searchComplaintMonthly")
   {
         
          
          $month=$_POST['month'];
          $year=$_POST['year'];
          $data=array();

          $str="select complainregister.*,customer.customer_fullname,customer.address from complainregister JOIN customer ON complainregister.customer_id=customer.customer_id where complainregister.month='$month' AND complainregister.year='$year' AND complainregister.status='0'";

          $row=$con->query($str);

          while($result=$row->fetch_assoc())
          {

             $data[]=$result;     
          }
   
         echo json_encode($data);

       
    }
   
   
   if($_POST['action']=="searchCustomerWithAutoload")
   {

         $customer_id=$_POST['customer_id'];

         $data=$api->get_customerById('customer',['customer_id'=>$customer_id]);
         
         echo json_encode($data);

   }
   if($_POST['action']=="getIndividualCustomerById")
   {

        
         $customer_id=$_POST['customer_id'];

         $data=$api->getCustomerInfo($customer_id);

         echo json_encode($data);


   }
   if($_POST['action']=="getWard")
   {

        $zone=$_POST['zone'];

        $data=$api->getWard($zone);
      
       
        echo "<option value=''>Select Ward</option>";

         foreach ($data as $key => $value) {
             
             echo "<option value='".$value['locality']."'>".$value['locality']."</option>";
         }

   }

   if($_POST['action']=="getRoad")
   {

        $zone=$_POST['zone'];
        $ward=$_POST['ward'];

        $data=$api->getRoad($zone,$ward);
      
        echo "<option value=''>Select Road</option>";

         foreach ($data as $key => $value) {
             
             echo "<option value='".$value['pin']."'>".$value['pin']."</option>";
         }

   }

   if($_POST['action']=="getAllcomplain")
   {

       $date=$_POST['date1'];

       $complain=$api->getAllComplainByDate($date);

       echo json_encode($complain);

   }
   if($_POST['action']=="complainMonth")
   {

        
        $year=$_POST['year'];

        $month=$db->selectDistinct('complainregister',['month'],['year'=>$year]);

        echo json_encode($month);


   }


   if($_POST['getData']=="GetcomplainData")
   {
 
           
           $year=$_POST['year'];

           $getMonth=$db->selectDistinct('complainregister',['month'],['year'=>$year]);
           $dataset=array();
           
           foreach($getMonth as $key=> $month){

               
               $allComplain=$db->rowCount('complainregister',['year'=>$year,'month'=>$month['month']]);
               
               $processed_comp=$db->rowCount('complainregister',['year'=>$year,'month'=>$month['month'],'status'=>1]);

               $unprocessed_comp=$db->rowCount('complainregister',['year'=>$year,'month'=>$month['month'],'status'=>'0']);

               $array=array("month"=>$month['month'],"Total_Complain"=>$allComplain,"process_comp"=>$processed_comp,'unprocessed_comp'=>$unprocessed_comp);

               $dataset[]=$array;

           }
          
           echo json_encode($dataset);



   }
   if($_POST['action']=="getComplainByType")
   {

          

          $type=$_POST['type'];
          $date1=date('Y-m-d');
          $date2=date('Y-m-d',strtotime($date1));
          $d=explode('-', $date2);
          $year=$d[0];


           $getMonth=$db->selectDistinct('complainregister',['month'],['year'=>$year]);
           $dataset=array();
           
           foreach($getMonth as $key=> $month){

                 
               $allComplain=$db->rowCount('complainregister',['complain_type'=>$type,'month'=>$month['month'] ]);

               $processed_comp=$db->rowCount('complainregister',['complain_type'=>$type,'month'=>$month['month'],'status'=>'1']);

               $unProcessed_comp=$db->rowCount('complainregister',['complain_type'=>$type,'month'=>$month['month'],'status'=>'0']);

               $array=array('month'=>$month['month'],'total_complain'=>$allComplain,'process_comp'=>$processed_comp,'unProcessed_comp'=>$unProcessed_comp);
               
               $dataset[]=$array;

          }
       
         echo json_encode($dataset);



   }

   if($_POST['action']=="getbillYearly")
   {

         $year=$_POST['year'];
        
         $getMonth=$db->selectDistinct('bill',['month'],['year'=>$year]);
          
         $dataset=array();

         foreach($getMonth as $key =>$month)
         {

             
             $allbill=$db->rowCount('bill',['month'=>$month['month']]);
             
             $allUnPaidBill=$db->rowCount('bill',['month'=>$month['month'],'status'=>'0']);
             
             $allPaidBill=$db->rowCount('bill',['month'=>$month['month'],'status'=>'1']);

            $array=array('total_bill'=>$allbill,'unpaid_bill'=>$allUnPaidBill,'paidBill'=>$allPaidBill,'month'=>$month['month']);

            $dataset[]=$array;


         }

        echo json_encode($dataset);


   }

   if($_POST['action1']=="getBillAmountYearly")
   {


       
         $year=$_POST['year'];

         $tBill=$api->getTotalBillAmt($year);
         
         $pBill=$api->paidYearlyBill($year);
         
         $upBill=$api->unpaidYearlyBill($year);
         
         $array=array("year"=>$year,'totalBill'=>$tBill,'paidBill'=>$pBill,'unpaidBill'=>$upBill);

         echo json_encode($array);


    


   }

   if($_POST['getMonth']=="GetMonthOfActiveYear")
   {


           $year =$_POST['year'];

           $data=$api->getBillMonth($year);
           
           $array=array();
       
           echo "<option> Select Month </option>";

           foreach ($data as $key => $value) {
             
              
                $mnth=$value['month'];

                $month_name=$api->getMonth($mnth);

                $array[]=$month_name;

                echo "<option value='".$mnth."' >".$month_name."</option>";

           }
              
          

   }
   if($_POST['action']=="getMonthDetails")
   {

          
          $year=$_POST['year'];

          $month=$_POST['month'];

          $tBill=$api->getTotalMBillAmt($year,$month);
         
          $pBill=$api->paidMBill($year,$month);
         
          $upBill=$api->unpaidMBill($year,$month);
         
          $array=array("month"=>$month,'totalBill'=>$tBill,'paidBill'=>$pBill,'unpaidBill'=>$upBill);

         echo json_encode($array);


          
                       
   }
   if($_POST['action']=="noOfConnection")
   {

            $year=$_POST['year'];

            $allactCon=$db->rowCount('customer',['year'=>$year,'isActive'=>'1']);
            $alldactCon=$db->rowCount('customer',['year'=>$year,'isActive'=>'0']);

            $array=array('total_connection'=>$allactCon,'deActive'=>$alldactCon);

            echo json_encode($array);




   }
   if($_POST['action1']=="GetAllConnectionYear")
   {


          $data=$db->selectDistinctAll('customer','year');
          
        
          echo json_encode($data);
   }

   if($_POST['action']=="customerDeactivate")
   {
        
         $customer_id=$_POST['id'];
         $data=$api->customerDeactivate($customer_id);

         if($data)
         {
            echo  json_encode(array('status'=>"true"));
          }
         else
         {
           
           echo  json_encode(array('status'=>"false"));
         }


   }

   if($_POST['action']=="customerActivate")
   {
         


         $customer_id=$_POST['id'];

         $data=$api->customerActivate($customer_id);

         if($data)
         {
            
            echo  json_encode(array('status'=>"true"));
        
         }
         else
         {
           
           echo  json_encode(array('status'=>"false"));
         
         }


   }

  if($_POST['action']=="getNoOfConnectionYearly")
  {

         $year=$_POST['year'];

         $total=$db->rowCount('customer',['year'=>$year]);
         $total_Con=$db->rowCount('customer',['year'=>$year,'isActive'=>'1']);
         $total_DCon=$db->rowCount('customer',['year'=>$year,'isActive'=>'0']);

         $data=array('year'=>$year,'total'=>$total,'total_Con'=>$total_Con,'total_DCon'=>$total_DCon);
         
         echo json_encode($data);


  }

  if($_POST['action']=="MatchPrevUserPassword")
  {

        
          $username=$_SESSION['user'];
          $password=$_POST['oldPassword'];

          $response=$db->select('login',['user_id'=>$username,'password'=>$password]);
          
          if($response)
          {
              
              echo json_encode(array('status'=>'true'));
          
          }
          else
          {

              echo json_encode(array('status'=>'false'));
          
          }

          


  }
  if($_POST['action']=="userChangePassword")
  {

          
          $username=$_SESSION['user'];

          $password=$_POST['newPassword'];

          $res=$db->row_update('login',['password'=>$password],['user_id'=>$username]);

          if($res)
          {
              echo json_encode(array('status'=>'true'));
          }
          else
          {
              echo json_encode(array('status'=>'false'));
          }






  }

  if($_POST['getyearlyBillingData']=="getYearlyBillingData")
  {

      
        $year=$_POST['year'];

        $str ="select bill.*,customer.customer_fullname from bill INNER JOIN customer ON bill.customer_id=customer.customer_id where bill.year ='$year'";

        $rows=$con->query($str);

        $array=array();

        foreach ($rows as$row) {
          
          $array[]=$row;

        }

        echo json_encode($array);




  }

  if($_POST['action']=="generatePdf")
  {
       $data=$_POST['data'];

      for ($i=0; $i < count($data); $i++) { 
        # code...
      }
  }


  if($_POST['action']=="EditLocation")
  {

       $location_id=$_POST['location_id'];

       $data=$db->select('area',['id'=>$location_id]);

       echo json_encode($data);

  }

  if($_POST['action']=="UpdateLocation")
  {
 
       
           $id=$_POST['id'];

           $data=array('area'=>$_POST['zone'],'locality'=>$_POST['ward'],'pin'=>$_POST['road']);

           $response=$db->row_update('area',$data,['id'=>$id]); 
           
           if($response)
           {

               echo "Location Modified !";
           
           }
           else
           {
              echo "Sorry ! ";
           }

  }
  if($_POST['action']=="DeleteExistingLocation")
  {

        
        $id=$_POST['id'];

        $response=$db->delete('area',['id'=>$id]);

        if($response)
        {
             echo " Location has been deleted ! ";
        }
        else
        {
             echo " Sorry ! ";
        }


  }
  if($_POST['action']=="RejectRequest")
  {

         $customer_id=$_POST['id'];

         $response=$db->delete('temp_table',['customer_id'=>$customer_id]);  

         if($response)
         {
              
              echo "Approval request has rejected !";
         
         }

  }
  if($_POST['action']=="RejectBillUpdateRequest")
  {

         $bill_id=$_POST['id'];

         $response=$db->delete('temp_bill',['bill_id'=>$bill_id]);  

         if($response)
         {
              
              echo "Approval request has rejected !";
         
         }
 
  }
  if($_POST['action']=="searchCustomerFromApproval")
  {

       

           $customer_id=$_POST['customer_id'];

           $data=$db->LikeQuery('temp_table',['customer_id'=>$customer_id]);

           echo json_encode($data);
    
 }
  if($_POST['action']=="searchBillForApproval")
  {

           $customer_id=$_POST['customer_id'];

           $data=$db->LikeQuery('temp_bill',['customer_id'=>$customer_id]);

           echo json_encode($data);
    
 }
 if($_POST['action']=="searchBillForApprovalUsingBillId")
 {

        $bill_id=$_POST['bill_id'];

        $data=$db->LikeQuery('temp_bill',['bill_id'=>$bill_id]);

        echo json_encode($data);
        
 }
 if($_POST['action']=="getEmailListData")
 {

        $data=$db->fetch_all('notification');
        echo json_encode($data);

 }
 if($_POST['action']=="getSpacificEmail")
 {
     

     $id=$_POST['id'];
     
     $data=$db->select('notification',['id'=>$id]);
     
     echo json_encode($data);  


 }
 if($_POST['action']=="UpdateEmailId")
 {

        $id=$_POST['id'];
        $email=$_POST['email'];
        $response =$db->row_update('notification',['email'=>$email],['id'=>$id]);
        if($response)
        {
             echo "Email Id Updated Successfully !";
        }
        else
        {
            echo "Sorry !";
        }

 }
 if($_POST['action']=="removeEmail")
 {

        $id=$_POST['id'];
        
        $response =$db->delete('notification',['id'=>$id]);
        if($response)
        {
             echo "Email Id Deleted Successfully !";
        }
        else
        {
            echo "Sorry !";
        }

 }

 if($_POST['action']=='EditBillInformation')
 {

       
       $param=$_POST['param'];
       
       $param1=array("customer_id"=>$param['customer_id'],"meter_id"=>$$param['meter_id'],"month"=>$param['month'],"year"=>$param['year']);
       
       $data=$api->getBillDetail($param1);

       echo json_encode($data);

 }

if($_POST['action']=="billFeedingProcess")
{

     
     $data=$_POST['data'];
     $billFeedDate=$data['feedingDate'];
     $previous_month_reading=$data['p_reading'];
     $meterReading=$data['reading'];
     $insertdate=date('Y-m-d', strtotime($billFeedDate));
     $date2 =explode('-',$insertdate); 

     $year=$date2[0];
     $month=$date2[1];
     $day=$date2[2];
       // get Mobile number 
     $get=$db->select_colum_where('customer',['mobile'],['customer_id'=>$data['customer_id']]);
     $mobile_no=$get[0]['mobile'];
    
    
     $actual_meter_reading=$meterReading-$previous_month_reading;
     $bill_id=rand(10000,999999);

     $bill=array('bill_id'=>$bill_id,'customer_id'=>$data['customer_id'],'day'=>$day,'month'=>$month,'year'=>$year,'bill_type'=>$data['type'],'meterReading'=>$meterReading,'total'=>$data['total'],'status'=>$data['status'],'reading'=>$actual_meter_reading,
        'ugd_connection_fee'=>$data['ugd_connection'],'borwell_charge'=>$data['borwell']);
 
     $checkBill=$db->select('bill',['customer_id'=>$data['customer_id'],'month'=>$month,'year'=>$year]);
     if(empty($checkBill))
     {
          
          $response=$api->billFeeding('bill',$bill);
          
          if($response)
          {
               echo " Bill has been generated !";
               //new code attached
               $message=urlencode("Your Bill has been generated Your Bill No".$bill_id."CustomerID".$data['customer_id'].
                       "Meter Reading".$meterReading." Actual Reading-".$actual_meter_reading."Month".$month.
                       "Amount-Rs".$data['total']); 
               $status=$api->sendMessage($message,$mobile_no);
               echo $status;

                 
          }
          else
          {
               
               echo " Sorry !";
          
          }
     }
     else
     {
          echo "Bill Already Generated !"; 
     }
 
     
}
if($_POST['action']=="goingBIllForApproval")
{

        
        $data=$_POST['data'];

        $record=array( 'customer_id'=>$data['customer_id'],'customer_name'=>$data['customer_name'],
                       'bill_id'=>$data['bill_id'],'month'=>$data['bmonth'],'year'=>$data['year'],
                       'c_reading'=>$data['c_reading'],'a_reading'=>$data['a_reading'],
                       'type'=>$data['ctype'],'amount'=>$data['amount'],'ugd'=>$data['ugd'],
                       'borwell'=>$data['borwell']);
      
       $response=$db->insert('temp_bill',$record);
        
        if($response)
        {
             echo "Bill change has been send for Approval !";
        }
        else
        {
             echo " Sorry !";
        }

}

if($_POST['action']=="billGoingToApprove")
{
       
       $bill_id=$_POST['id'];
       
       $data=$db->select('temp_bill',['bill_id'=>$bill_id]);
       
       $ugd=$data[0]['ugd'];
       $borwell=$data[0]['borwell'];
       $total=$data[0]['amount']+$ugd+$borwell;

       $record=array('meterReading'=>$data[0]['c_reading'],'reading'=>$data[0]['a_reading'],
                     'total'=>$total,'ugd_connection_fee'=>$ugd,'borwell_charge'=>$borwell);

       $response=$api->approvingProcess('bill',$record,['bill_id'=>$bill_id]);
       if($response)
       {
           
           echo "Bill has been updated !";
           
           $res=$api->dataRemove('temp_bill',['bill_id'=>$bill_id]);
           
           
       }
       else
       {
          echo "Sorry !";
       }

            
              
}

if($_POST['action']=="GetResultByStatus"){


        $status=$_POST['status'];

        $str="select b.*, c.customer_fullname from bill as b INNER JOIN customer as c ON b.customer_id=c.customer_id where b.status='$status'";
        $row=$con->query($str);

          while($result=$row->fetch_assoc())
          {
              
              $array[]=$result;
         
          }
         
          echo json_encode($array);

        //$list=$api->getBillList('bill',['status'=>$status]);

        // echo json_encode($list);

}

 ?>
