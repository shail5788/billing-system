<?php
  session_start();
        include_once("db/connect.php");
        include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api=new apiFunction($db,$con); // object apiFunction class

    $_SESSION['msg']='';
    if(isset($_POST['update']))
    {

          $emp_id=$_POST['emp_id'];
          $status=false;    
          $records=$db->select('assets',['emp_id'=>$emp_id]);
          $j=0;
          foreach($records as $record) {
              
              $j++;         
              
              $id=$record['id'];
              
              $data=array('asset_name'=>$_POST['device_type'.$j],'brand'=>$_POST['dbrand'.$j],
              'asset_id'=>$_POST['sr_no'.$j]);
              
              $response=$api->updateAssetInfo('assets',$data,$id);
              $status=true;

          }

          
        if($status)
          {

            
                  $str1="<font color='lightgray'>Asset Information Updated Successfully </font><font color='red'><b></b></font>";
                   
                  header('Location:asset_management.php?msg='.$str1);
          
          }
          else
          {

            
                  $str1="<font color='lightgray'>Sorry Some technical Problem occured </font><font color='red'><b></b></font>";
                  $_SESSION['str']=$str1;

                  header('Location:asset_management.php?msg='.$str1);
           
           }


         
     } 