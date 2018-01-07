<?php 
 include("db/connect.php");

   $str="select * from area ";
   $row=$con->query($str);
   echo" <table class='table table-bordered table-hover' style='margin-top:12px;'>
          <tr class='info'> 
            <th>Zone</th>
            <th>Ward</th>
            <th>Road</th>
            <th>Operation</th>
        </tr>";
   while($result=$row->fetch_assoc())
   {
  ?>
  
        <tr>
            <td> <?php echo $result['area']; ?> </td> 
            <td> <?php echo $result['locality'];?> </td>
            <td> <?php echo $result['pin']; ?> </td>
            <td><a href="#" id="<?php echo $result['id'] ?>" Ide="<?php echo $result['id'] ?>" class="btn btn-sm btn-warning location_edit">Edit</a>| <a href="#"  id="<?php echo $result['id'] ?>" Ide="<?php echo $result['id'] ?>" class="btn btn-sm btn-danger location_delete">Delete</a></td>

        </tr>
       
<?php } ?>
   </table>




