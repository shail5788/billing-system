<?php
    //error_reporting(0);
    session_start();
   if(!isset($_SESSION['user']))
         {
          header('Location:login.php');
         }
?>

<?php include "include/header.php"; ?>
  <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
  <!-- Left side column. contains the logo and sidebar -->
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <!--   
  <div class='col-md-12' style='background:lightblue;height:30px;color:black; font-size:12px;  font-weight:bold;'>
  <div class="col-md-1">Complain ID </div><div class="col-md-2">Customer Name</div><div class="col-md-2">Address</div>
  <div class="col-md-2">Location</div><div class="col-md-2">City</div><div class="col-md-1">Date</div><div class="col-md-1">
    Status</div><div class="col-md-1">
    Feedback</div>
  </div> -->
     <?php  
        
       /* include('db/connect.php');
        $emp_id=$_SESSION['empid'];
        $str="select * from complain_temp where emp_id='$emp_id' AND status='P' ";
        $row=$con->query($str);
       
        while($result=$row->fetch_assoc())
        {
           $str1="select customer_fullname,address,location,city from customer where customer_id=(select customer_id from complainregister where complain_id='".$result['complain_id']."')";
           $rr=$con->query($str1);
            $r2=$rr->fetch_assoc();
       echo" <div class='col-md-12'style='background:white; font-family:verdana;font-size:13px; padding:7px;border-bottom: 1px solid lightgray;' class='text-center'>
       <div class='col-md-1'>".$result['complain_id']."</div><div class='col-md-2'>".$r2['customer_fullname']."</div><div class='col-md-2'>".$r2['address']."</div><div class='col-md-2'>".$r2['location']."</div><div class='col-md-2'>".$r2['city']."</div><div class='col-md-1'>".$result['date']."</div><div class='col-md-1'>".$result['status']."</div>
       <div class='col-md-1'><input type='checkbox'  name='cumplain_id[]'' value='".$result['complain_id']."'> </div></div>";    

        }
   
        */   
     ?>
    <!--  <div class="col-md-12">
     <div class="clr-20"></div>
   <div class='col-md-6'>
       </div> 
        <div class='col-md-6'>
            <button class="col-md-12 btn btn-warning" id="assign"> Assign </button>
       </div> 
    </div>-->
 <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
<script language="javascript">
  /*  $('#assign').click(function(){
                 // var assign_to=$('#assign_to').val();
                    var values = new Array();
                    $.each($("input[name='cumplain_id[]']:checked"), function() {
                     values.push($(this).val());
        });
        var data12=values;
                alert(data12);
                  $.ajax({
                   url:"updatingstatus1.php",
                   method:"POST",
                   data:{data12:data12},
                   dataType:"text",
                   success:function(data){
                     alert(data);
                   }
                });
});*/
</script>



      <!-- Small boxes (Stat box) -->
     
          <!-- TO DO List -->
     
          <!-- /.box -->

          <!-- quick email widget -->
        
       
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
          <!-- solid sales graph -->
          
          <!-- Calendar -->
          
    </section>
    <!-- /.content -->
  </div>
   <?php include "include/footer.php"; ?>
