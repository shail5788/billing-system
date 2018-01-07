<?php 

    	include_once("db/connect.php");
        include_once('resource/api_function.php');
        
        $db=new database($con);   //object of query builder
        $api= new apiFunction($db,$con); // object apiFunction class

	     if(isset($_POST['addData']))
	     {
           
                  
                  $check=$db->select('employee',['emp_id'=>$_POST['emp_id']]);

                  if($check[0]['emp_type']=="6")
                  {
                       $status=false;

			     	      for($i=0;$i<4;$i++)
			     	      {
		                
		                      $j=$i+1;

		                      $data=array("emp_id"=>$_POST['emp_id'],"asset_name"=>$_POST['device_type'.$j],"brand"=>$_POST['dbrand'.$j],'asset_id'=>$_POST['sr_no'.$j]);

		                      $res=$db->insert('assets',$data);

		                      if($res)
		                      {
		                      	 $status=true;
		                      }
		                      else
		                      {
		                      	 $status=false;
		                      }  

			     	      }
			     	      if($status)
			     	      {

		                    $str1="<font color='lightgray'>Asset Assigned Successfully </font><font color='red'><b></b></font>";
		                   
		                    header('Location:asset_management.php?msg='.$str1);
			     	      }
			     	      else
			     	      {

			                  $str1="<font color='lightgray'>Sorry Some technical Problem occured </font><font color='red'><b></b></font>";
			                  // $_SESSION['str']=$str1;

			                  header('Location:asset_management.php?msg='.$str1);
			     	      }

                  }
                  else
                  {

			            $str1="<font color='lightgray'>Sorry this employee is not meter reader  </font><font color='red'><b></b></font>"; 
			            header('Location:asset_management.php?msg='.$str1);
                  }

                  
	     }
?>