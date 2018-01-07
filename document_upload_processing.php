<?php
     include('db/connect.php');
     session_start();
     
     $customer_id=$_POST['customer_id'];
     $file=$_FILES['picture'];
     $msg="";
     // $target_dir = "photo/";

       include_once("db/connect.php");
       include_once('resource/api_function.php');

          $db=new database($con);   //object of query builder
          $api= new apiFunction($db,$con); // object apiFunction class

          $getDoc=$db->select('document',['customer_id'=>$customer_id]);
          $array=array();
          foreach ($getDoc as $key => $value) {
          	array_push($array, $value['doc_id']);
          }

          if(!empty($getDoc)){
            echo "hii";
           echo $res=$api->multiImageUpdate($_FILES['picture'],$customer_id,$array);
           
          }else{
          	 echo"nooo";
          	$res=$api->multiImage($_FILES['picture'],$customer_id);
          }
		
		  
		  
		  if($res)
		  {
		  	    
		  	header('Location:new-consumer-application-copy.php');  
		  
		  }
		  else
		  {
		  	  
		  	  $massege="Sorry Some Technical Problem Occured !";
		      header('Location:document_upload_processing.php?massege='.$massege); 
		  
		  }   			
        
       
       

