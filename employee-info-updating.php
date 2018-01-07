<?php
  session_start();
        include_once("db/connect.php");
        include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api=new apiFunction($db,$con); // object apiFunction class

     $_SESSION['msg']='';
    if(isset($_POST['update']))
    {

         
       
     
        $data=array('emp_id'=>$_POST['emp_id'],
                    'emp_name'=>ucfirst($_POST['emp_name']),
                    'gender'=>$_POST['gender'], 
                    'dob'=>$_POST['dob'],
                    'doj'=>$_POST['doj'],
                    'address'=>$_POST['address'], 
                    'city'=>$_POST['city'],
                    'state'=>ucwords($_POST['state']),
                    'contactNo'=>$_POST['mobile'], 
                    'pin'=>$_POST['pin'],
                    'emailId'=>$_POST['email'],
                    'assign_area'=>$_POST['area']
                    
                   ); 
       
        
         $response=$api->updateEmployeeInfo('employee',$data);

         
      
          if($response)
          {
                
                // update New zone from existing zone   
                   
                 $zones=explode(',', $_POST['area']);

                 $deleteStatus=$db->delete('assign_zone',['emp_id'=>$_POST['emp_id']]);
                 
                 if($deleteStatus){

                     for($i=0;$i<count($zones);$i++){

                        $array=array("emp_id"=>$_POST['emp_id'],'zone'=>$zones[$i]);

                        $zone_status=$db->insert('assign_zone',$array);
                      
                      }

                 }
               
                
            
                  $str1="<font color='lightgray'>Employee Information Updated Successfully </font><font color='red'><b></b></font>";
                   
                  header('Location:employee-amendment.php?msg='.$str1);
          
          }
          else
          {

            
                  $str1="<font color='lightgray'>Sorry Some technical Problem occured </font><font color='red'><b></b></font>";
                  $_SESSION['str']=$str1;

                  header('Location:employee-amendment.php?msg='.$str1);
           
           }


         
     } 