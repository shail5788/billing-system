<?php 

 include_once("db/connect.php");
 include_once('resource/api_function.php');

     $db=new database($con);   //object of query builder
     $api=new apiFunction($db,$con); // object apiFunction class
     
     $data12=$_POST['data12'];
     $response=false;

     for ($i=0;$i<count($data12);$i++)
     {
               
           $res=$db->row_update('complainasingnbook',['status'=>'P'],['complain_id'=>$data12[$i]]);

           $res1=$db->row_update('complainregister',['status'=>'1'],['complain_id'=>$data12[$i]]);


           if($res && $res1){

           	   $response=true;
           	   
           }

                 
     }
 
     if($response){
     	echo "success";
     }
     else{
     	echo "fail";
     }
 

?> 