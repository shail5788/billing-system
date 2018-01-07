<?php

    include("db/connect.php");
    $val=$_POST['val'];
    $str="select * from complainasingnbook where complain_id ='$val'";
    $row=$con->query($str);
    $result=$row->fetch_assoc();
    $emp=$result['emp_id'];
     if($emp!="")
     {

     	echo "<script>alert('Sorry this complain already assigned to'+".$emp.")</script>";
     }  
     else
     {
     	echo"";
     }
     


 ?>

