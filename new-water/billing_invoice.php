<?php error_reporting(0);
session_start();
        
        if(!isset($_SESSION['user']))
        {
           
              header('Location:login.php');
         
        }
        if(!empty($_SESSION['message']))
        {
             
             $message=$_SESSION['message'];
             unset($_SESSION['message']);

        }

?>
<?php

  include('db/connect.php');
      $customer_id=$_POST['customer_id'];
      $bill_id=$_POST['bill_id'];
      $mobile=$_POST['mobile'];
      $date2=date("Y-m-d");
      $date3=explode('-', $date2);
      //$month=$date3[1];

      $year=$date3[0];
       $month=$date3[1];
     // $month=$_POST['duemonth'];
      if($customer_id=='' && $bill_id==''&&$mobile=='')
      {
 
         $query1="select * from bill where customer_id='$customer_id' AND year='$year'AND month='$month'  order by month";
         $row=$con->query($query1);

      }

     
 
    else if(isset($_POST['submit'])&&$customer_id!='')
     {
       

        $query2="select * from customer where customer_id='$customer_id'";
        $row1=$con->query($query2);
        $rslt=$row1->fetch_assoc();
        $fullname1=$rslt['customer_fullname'];
        $meter_id=$rslt['meter_id'];
        $ctype= $rslt['type_of_customer'];
       
         $query1="select * from bill where customer_id='$customer_id' AND year='$year' order by month";
         $row=$con->query($query1);

 

     }

     else if(isset($_POST['submit'])&&$bill_id!='')
     {
        
          $query2="select * from customer where customer_id=(select customer_id from bill where bill_id='$bill_id')";
          $row1=$con->query($query2);
          $rslt=$row1->fetch_assoc();
          $fullname1=$rslt['customer_fullname'];
          $meter_id=$rslt['meter_id'];
          $ctype= $rslt['type_of_customer'];
          $customer_id=$rslt['customer_id'];
     
          $query1="select * from bill where bill_id='$bill_id' AND year='$year' order by month";
          $row=$con->query($query1);


     }
     else if(isset($_POST['submit'])&& $mobile!='')
     {
          
          $query2="select * from customer where mobile='$mobile'";
          $row1=$con->query($query2);
          $rslt=$row1->fetch_assoc();
          $fullname1=$rslt['customer_fullname'];
          $meter_id=$rslt['meter_id'];
          $ctype= $rslt['type_of_customer'];
          $customer_id=$rslt['customer_id'];
          $query1="select * from bill where customer_id='$customer_id' AND year='$year' order by month";
          $row=$con->query($query1);
 
          
    /*$str11="select month,total,year from bill where customer_id='$customer_id' OR bill_id='$bill_id' AND status='0'";
    $row23=$con->query($str11);
    $relst=$row23->fetch_assoc();
    $year =$relst['year']; */


         
   /*  $no_due_month=0;
      $strm="select month from bill where customer_id='$customer_id' AND status='0' AND year='$year'";
      $rowm=$con->query($strm);
      while($resultm=$rowm->fetch_assoc())
      {
         $no_due_month=$no_due_month+1;   

      //echo "<script>alert(".$no_due_month.");</script>";  
      }*/
     
     }
 



 ?>

<?php include("include/header.php"); ?>
  <?php 
    $type=$_SESSION['type'];
    if($type==1)
    {
       include("navbar/super-adminheader.php");


    }
    else if($type==2)
    {
      include("navbar/admin-header.php");

    }
    else if($type==3)
    {
      include("navbar/billingheader.php");
    }

 ?>
  <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
  <script type="text/javascript" src="js/billing_invoice.js"></script> 
  <script type="text/javascript">
     function printReport(divName) 
     {
        
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
    }
  </script>
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Dashboard <small>Billing Invoice </small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Accounting</li>
       <li class="active">Billing Invoice </li>
    </ol>
  </section>
  <div class="clr-20"></div>
  <!-- Main content -->
  <section class="content"> 
    <!-- Small boxes (Stat box) --> 
    
    <!-- /.row --> 
    <!-- Main row -->
    <div class="row"> 
      <!-- Left col --> 
      
      <!-- /.Left col --> 
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <div class="container">

       
        <form method="post" action="#">
          <div class="row" >
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Customer Id" id="usr" name="customer_id">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Bill Id" id="usr" name="bill_id">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter You Mobile No." id="usr" name="mobile">
              </div>
            </div>
            <div class="col-md-3">
               <button type="submit" name="submit" class="col-md-12 btn btn-warning" >
              Find Bill
              </button>
            </div>
          </div>
        </form>
        <div class="row">
          <div class="col-md-3">
          
            <div class="form-group">
              <input type="text" class="form-control" readonly placeholder="Customer Id" id="customer_id" value='<?php echo $customer_id; ?>'>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <input type="text" class="form-control" readonly placeholder="Name" id="name"  value='<?php echo $fullname1; ?>'>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <input type="text" class="form-control" readonly placeholder="Type" id="customer_type" value='<?php echo $ctype; ?>'>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <input type="text" class="form-control" readonly placeholder="Meter Id" id="usr" value='<?php echo $meter_id; ?>'>
            </div>
          </div>
        </div>
        <div class="col-md-12 bg bg-head text-center">
          <div class="col-md-1"> <span>Bill Id</span> </div>
          <div class="col-md-1"> <span>Month</span> </div>
          <div class="col-md-2"> <span>Initial Reading</span> </div>
          <div class="col-md-2"> <span>Current Reading</span> </div>
          <div class="col-md-2"> <span>Actual Reading</span> </div>
          <div class="col-md-2"> <span>Amount</span> </div>
          <div class="col-md-1"> <span>Status</span> </div>
          <div class="col-md-1"> <span>Report</span> </div>
        </div>
         <?php $pReading=0;   while($result =$row->fetch_assoc())
         {
             $pReading=$result['meterReading']-$result['reading'];
             
            
             
        ?>
        <div class="col-md-12 bg text-center <?php if($result['status']=='0'){ echo "bgred";}else echo "bg-white";  ?> ">
          <div class="col-md-1 border-right border-bottom">
            <input type="text" readonly name="bill_id" class="form-control" value='<?php echo $result['bill_id'];?>'>         
          </div>
          
            <div class="col-md-1 border-right border-bottom">
              <input type="text" readonly name="bill_id" class="form-control" value='<?php echo $result['month'];?>'>   
            </div>
            <div class="col-md-2 border-right border-bottom">
             <input type="text" readonly name="preading" class='form-control' value='<?php echo $pReading;?>'> 
            </div>
            <div class="col-md-2 border-right border-bottom">
                  <input type="text" readonly name="mreading" class="form-control" value='<?php echo $result['meterReading'];?>'>   
            </div>
            <div class="col-md-2 border-right border-bottom">
                <input type="text" readonly name="reading" class="form-control" value='<?php echo $result['reading'];?>'>      
            </div>
            <div class="col-md-2 border-right border-bottom">
                 <input type="text" readonly name="total" id="total" class="form-control" value='<?php echo $result['total'];?>'>   
            </div>
            <div class="col-md-1 border-bottom">
              <input type="text" readonly name="status" id="status" class="form-control" value='<?php if($result['status']=='1'){echo"Paid";}else{
              echo"Unpaid";}?>'>   
             
            </div>
             
          <div class="col-md-1 border-bottom">
            <input style="margin:7" type="checkbox" class="checkbox" name="checkbox[]" value='<?php echo $result['bill_id']; ?>'>

          </div>
        </div>  
        <?php }?>
      
      <div class="clr-20"></div>
      
      <div class="col-md-12 bg text-center bg-white ">
           <div  class="col-md-2" >
             
             <input type="text" readonly class="form-control" name="sumtotal" id="sumtotal" value='0'>

           </div>
            <div  class="col-md-3" >
             <select id="mode" name="mode" class="form-control">
              <option value="0">Select Payment Mode </option> 
              <option value="Cash">Cash</option>
              <option value="Cheque">Cheque</option>
             </select>

           </div>
           <div class="col-md-3">
           <input type="text" name="mode2" id="mode2" class="form-control" placeholder="Enter the Cheque Number" readonly>

           </div>
            <div class="col-md-2">
           <input type="text" name="ppay" id="ppay" class="form-control" placeholder="Enter the amount">

           </div>
            <div class="col-md-2">
           <input type="text" name="rpay" id="rpay" class="form-control" placeholder="Remaining Payment " readonly>

           </div>

             </div>
           <div id="sms"></div>
          <div class="clr-20"></div>  
      <div class="col-md-12">
        <div class="col-md-4 col-md-offset-4">
          <button type="submit" class="col-md-12 btn btn-warning" data-toggle="modal" data-target="#myModal" name="submit" id="model">Print Statement </button>
        </div>
    
        <!-- Modal -->

        <div class="modal fade" id="myModal" role="dialog" style="margin: auto;">
          <div class="modal-dialog" style="background: white; width:800px;"> 
            
            <!-- Modal content-->
            <div class="modal-content" style="width:800px;  " > 
             <!-- <div class="col-md-6"> -->
              <div class="modal-header">
              <br><br>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
              </div>
              <div class="modal-body" id="printBill">
                 <table class="table table-bordered"><tr><td width="200">
                 <img src="img/logo/logo.png" height="80" width="100"></td><td>
                 <h5 class="modal-title" style="font-size: 30px; text-align:center;">KUIDFC & TMC Billing Invoice</h5></td><td width="200" style="text-align: right;"><img src="img/logo/kuidc.png" height="80" width="100"></td></tr></table>
               <!--  <div class="col-md-12 border pad0 points"  > -->
                <div class="col-md-12" style="margin-top: 20px;">
                 <span>Customer Receipt</span><hr>
                  <div class="invoice_popup" style=" padding: 5px;"></div>
                  </div>
                  
                   
                  <!-- </div> -->
              
             </div>
              </div>
              <div class="clr-20"></div>
              <div class="modal-footer">
                 <button type="submit" class="btn btn-warning" data-dismiss="modal" onclick="printReport('printBill');">Print Statement </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        
      </div>
        <div id="sms"></div>
    <!-- right col -->
    </div>
    <!-- /.row (main row) --> 
    
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper -->
<footer class="main-footer"> <strong>Copyright &copy; 2016.</strong> All rights
  reserved. </footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark"> 
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content"> 
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-birthday-cake bg-red"></i>
          <div class="menu-info">
            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
            <p>Will be 23 on April 24th</p>
          </div>
          </a> </li>
        <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-user bg-yellow"></i>
          <div class="menu-info">
            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
            <p>New phone +1(800)555-1234</p>
          </div>
          </a> </li>
        <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
          <div class="menu-info">
            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
            <p>nora@example.com</p>
          </div>
          </a> </li>
        <li> <a href="javascript:void(0)"> <i class="menu-icon fa fa-file-code-o bg-green"></i>
          <div class="menu-info">
            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
            <p>Execution time 5 seconds</p>
          </div>
          </a> </li>
      </ul>
      <!-- /.control-sidebar-menu -->
      
      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li> <a href="javascript:void(0)">
          <h4 class="control-sidebar-subheading"> Custom Template Design <span class="label label-danger pull-right">70%</span> </h4>
          <div class="progress progress-xxs">
            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
          </div>
          </a> </li>
        <li> <a href="javascript:void(0)">
          <h4 class="control-sidebar-subheading"> Update Resume <span class="label label-success pull-right">95%</span> </h4>
          <div class="progress progress-xxs">
            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
          </div>
          </a> </li>
        <li> <a href="javascript:void(0)">
          <h4 class="control-sidebar-subheading"> Laravel Integration <span class="label label-warning pull-right">50%</span> </h4>
          <div class="progress progress-xxs">
            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
          </div>
          </a> </li>
        <li> <a href="javascript:void(0)">
          <h4 class="control-sidebar-subheading"> Back End Framework <span class="label label-primary pull-right">68%</span> </h4>
          <div class="progress progress-xxs">
            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
          </div>
          </a> </li>
      </ul>
      <!-- /.control-sidebar-menu --> 
      
    </div>
    <!-- /.tab-pane --> 
    
  </div>
</aside>
<!-- /.control-sidebar --> 
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.2.0 --> 
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script> 
<!-- jQuery UI 1.11.4 --> 
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> 
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --> 
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script> 
<!-- Bootstrap 3.3.6 --> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<!-- Morris.js charts --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> 
<script src="plugins/morris/morris.min.js"></script> 
<!-- Sparkline --> 
<script src="plugins/sparkline/jquery.sparkline.min.js"></script> 
<!-- jvectormap --> 
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> 
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> 
<!-- jQuery Knob Chart --> 
<script src="plugins/knob/jquery.knob.js"></script> 
<!-- daterangepicker --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script> 
<script src="plugins/daterangepicker/daterangepicker.js"></script> 
<!-- datepicker --> 
<script src="plugins/datepicker/bootstrap-datepicker.js"></script> 
<!-- Bootstrap WYSIHTML5 --> 
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> 
<!-- Slimscroll --> 
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<!-- FastClick --> 
<script src="plugins/fastclick/fastclick.js"></script> 
<!-- water App --> 
<script src="dist/js/app.min.js"></script> 
<!-- water dashboard demo (This is only for demo purposes) --> 
<script src="dist/js/pages/dashboard.js"></script> 
<!-- water for demo purposes --> 
<script src="dist/js/demo.js"></script> 
<script>
  var waterOptions = {
    //Enable sidebar expand on hover effect for sidebar mini
    //This option is forced to true if both the fixed layout and sidebar mini
    //are used together
    sidebarExpandOnHover: true,
    //BoxRefresh Plugin
    enableBoxRefresh: true,
    //Bootstrap.js tooltip
    enableBSToppltip: true
  };
</script>

</body>
</html>
