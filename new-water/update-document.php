<?php 
 	 session_start();
     $customer_id=$_POST['customer_id'];
     $file=$_FILES['picture'];
   
     $target_dir = "photo/";

       include_once("db/connect.php");
       include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api= new apiFunction($db,$con); // object apiFunction class
		
		  $res=$api->multiImageUpdate($_FILES['picture'],$customer_id);
		  if($res)
		  {
		  	  $massege="Document Updated Successfully!";
		  	  header('Location:document-management.php?massege='.$massege);  
		  
		  }
		  else
		  {
		  	  
		  	  $massege="Sorry Some Technical Problem Occured !";
		      header('Location:document-management.php?massege='.$massege); 
		  
		  } 

?>