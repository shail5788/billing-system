<?php
     include('db/connect.php');
     session_start();
     
     echo $customer_id=$_POST['customer_id'];
     $msg="";
     $target_dir = "photo/";
 function GetImageExtension($imagetype)
 {  

       			if(empty($imagetype)) return false;

            		switch($imagetype)
         			{
           				case 'image/bmp': return '.bmp';
						case 'image/gif': return '.gif';
						case 'image/jpeg': return '.jpg';
						case 'image/png': return '.png';
          				default: return false;

        			}
}   			
               foreach ($_FILES['picture']['tmp_name'] as $key => $tmp_name) {
               
             

      			if (!empty($_FILES["picture"]["name"][$key])) {

					$file_name=$_FILES["picture"]["name"][$key];

					$imgtype=$_FILES["picture"]["type"][$key];
					$size=$_FILES["picture"]["size"][$key];
					$ext= GetImageExtension($imgtype);
					$name_type=array("photo","IdPtoof","AddressProof");
					for($i=0;$i<3;$i++)
					{
							
							
							  $imagename=$customer_id.$name_type[$i].$ext;
							   $target_path = "photo/".$imagename;

							  $temp_name=$_FILES["picture"]["tmp_name"][$i];

                  			

                             

					if(move_uploaded_file($temp_name, $target_path)) 	
					 {
					 	
						$query_upload= "INSERT into document(customer_id,doc_name,doc_path) VALUES('$customer_id','$imagename','$target_path')";
						$con->query($query_upload) or die("error in $query_upload == ----> ".mysql_error());
						$msg="file uploaded"; 
					    $_SESSION['message']=$msg;
					  
					}
					else
					{
						exit("Error While uploading image on the server");
					}

                

			   }
			 }  
         header('Location:document-management.php');


 }


//output


			  
/*

 

$select_query = "SELECT * FROM document where img_id=$customer_id";

$sql = $con->query($select_query) or die(mysql_error());   

$row = $sql->fetch_array();

 $imag='photo/'.$row['image_name'];
     ?>


<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">

<tbody><tr>

<td>

<?php
//header("Content-type: image/jpeg");
 echo"<img src=".$imag.">"; 
 ?>


</td>

</tr>

</tbody></table>


*/



     
 
    

