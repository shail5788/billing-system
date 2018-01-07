<?php 
    // echo "hello";
      $area=$_POST['area'];


      include("db/connect.php");

      $str="select employee.emp_id,employee.emp_name from employee join assign_zone ON employee.emp_id=assign_zone.emp_id where assign_zone.zone='$area' AND employee.emp_type='5'";
      
      $row=$con->query($str);
      echo"<option value='0'>Select Employee</option>";
      while($result=$row->fetch_assoc())
      {
         echo "<option value='".$result['emp_id']."'>".$result['emp_name']."</option>"; 
      
      }
          
     


?>