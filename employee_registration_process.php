<?php
      
      session_start();
      include('db/connect.php');
      include('resource/api_function.php');
      $msg="";
      $empname=ucfirst($_POST['ename']);
      $dob=$_POST['dob'];
      $doj=$_POST['doj']; 
      $gender=$_POST['gender'];
      $address=ucwords($_POST['address1']);
      $email1=$_POST['email'];
      $city=ucfirst($_POST['city']);
      $state=ucwords($_POST['state']);
      $pin=$_POST['pin'];
      $contact=$_POST['contact_no'];
      $emp_type=$_POST['emptype'];
      $assign_areapin=$_POST['area'];
      $meter_reader=$_POST['mtype'];
      $emp_id=rand(100000,999999);   
      $name=explode(" ", $empname);
      $fname=$name[0];
      $date1=date("Y-m-d",strtotime($dob));
      $date2=date("Y-m-d",strtotime($doj));

      //  for the meter reader 

     


       
      $db=new database($con);
      $api= new apiFunction($db,$con);
      
      if(isset($_POST['submit']))
      {
            
            
            
             $data=array('emp_id'=>$emp_id, 'emp_name'=>$empname,
                          'gender'=>$gender,'dob'=>$date1, 'doj'=>$date2,
                          'contactNo'=>$contact, 'emailId'=>$email1,
                          'address'=>$address,'city'=>$city,
                          'state'=>$state, 'pin'=>$pin, 'emp_type'=>$emp_type,
                          'assign_area'=>$assign_areapin,'mr_type'=>$meter_reader
                          ); 

             $res=$db->insert('employee',$data); 
             
             $zones=explode(',', $assign_areapin);
          
             for($i=0;$i<count($zones);$i++){

               $array=array("emp_id"=>$emp_id,'zone'=>$zones[$i]);

               $zone_status=$db->insert('assign_zone',$array);

             }


               if($emp_type==6)
               {
                   
                   for($i=0;$i<4;$i++)
                   {
                      
                      $j=$i+1;
                      
                      $data1=array('emp_id'=>$emp_id,'asset_name'=>$_POST['device_type'.$j],
                                  'brand'=>$_POST['device_brand'.$j],'asset_id'=>$_POST['sr_no'.$j]);

                     $res1=$db->insert('assets',$data1);

                   }
              }

            if($res)
            {
            	
               $username= $fname."@".rand(100,999);
               $dob1=explode('-',$dob);
               $dob2=implode('',$dob1);
               $password=$dob2;
               
               $login_info=array('user_id' =>$username,'password'=>$password,'login_type'=>$emp_type,'emp_id'=>$emp_id );

               $feed=$db->insert('login',$login_info);


                    if($feed)
                    {
                       

                        
                          $response=$api->empImageUpload($_FILES['picture'],$emp_id);
                           
                           if(!empty($response))
                           {
                                
                                
                                $imagename=$response['pic_name'];
                                $target_path=$response['path'];

                                $docs=array('emp_id'=>$emp_id,'pic_name'=>$imagename,'pic_path'=>$target_path);

                                $db->insert('employeephoto1',$docs);    
                           
                           }
                           else
                           {

                           }


                           $msg="Wellcome in this Company ....Your Employee Id ->" .$emp_id."and  Username ->".$username."password->".$password;
                           $_SESSION['message']=$msg;
                           header('location:employee-registration.php');
                    }
                    else{

                    	 $msg=" Sorry! something worng with create your Username and Password ";
                    	 $_SESSION['message']=$msg;
                       header('location:employee-registration.php');
                    }

              
            }
            else
            {
               $msg="Sorry For Inconvenient";
               $_SESSION['message']=$msg;
              header('location:employee-registration.php');
            }

 
  }




?>